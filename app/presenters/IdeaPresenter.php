<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;


class IdeaPresenter extends Nette\Application\UI\Presenter
{
	
	private $database;
	
	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}
	
	public function renderShow($ideaID)
	{
		$idea =$this->database->table('ideas')->get($ideaID);
		
		$this->template->idea = $idea;
		$this->template->comments = $idea->related('comments')->order('create_date');
			
	}
	
	protected function createComponentCommentForm(){
		$form = new Form;
		$form->addText('name', 'Your Name:')
			->setRequired();
		
		$form->addText('email', 'Email:');
		
		$form->addText('body', 'Body:')
			->setRequired();
		
		$form->addSubmit('send', 'Publish Comment');
		
		$form->onSuccess[] = [$this, 'commentFormSucceeded'];
		
		return $form;
	}
	
	public function commentFormSucceeded($form, $values){
		$ideaID = $this->getParameter('ideaID');
		$this->database->table('comments')->insert([
			'idea_id' => $ideaID,
			'name'    => $values->name,
			'email'   => $values->email,
			'body'   => $values->body
		
		]);
		
		$this->flashMessage('Thank you for your feedback', 'success');
		$this->redirect('this');
	}
	
	protected function createComponentIdeaForm(){
		 	$form = new Form;
		
			$form->addText('title', 'Title:')
				->setRequired();
		
			$form->addTextarea('description', 'Description');
		
			$form->addText('time_estimate', 'Time Estimate');
		
			$form->addText('cost_estimate', 'Cost Estimate');
				
			$form->addSubmit('send', 'Save and publish');
		
			$form->onSuccess[] = [$this, 'ideaFormSucceeded'];

			return $form;
	}
	
	public function ideaFormSucceeded($form, $values){
		$ideaId = $this->getParameter('ideaId');
		
		if($ideaId){
			$idea = $this->database->table('ideas')->get($ideaId);
			$idea->update($values);
		}else{
			$idea = $this->database->table('ideas')->insert($values);
		}
		
		$this->flashmessage('Idea Published', 'success');
		$this->redirect('show', $idea->id);
	}
	
	public function actionEdit($ideaId)
	{
		$idea = $this->database->table('ideas')->get($ideaId);
		if (!$idea) {
			$this->error('Idea not found');
		}
		$this['ideaForm']->setDefaults($idea->toArray());
	}
	
}
