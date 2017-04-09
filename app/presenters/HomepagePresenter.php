<?php

namespace App\Presenters;

use Nette;


class HomepagePresenter extends Nette\Application\UI\Presenter
{
	
	private $database;
	
	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}
	
	public function renderDefault()
	{
		$this->template->ideas = $this->database->table('ideas')
			->order('create_date DESC')
			->limit(20);
	}
}
