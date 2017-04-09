<?php

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;


class SignPresenter extends Nette\Application\UI\Presenter
{

    protected function createComponentSignInForm()
    {
        $form = new Form;
        $form->addText('username', 'Username:')
            ->setRequired('Please enter your username.');

        $form->addPassword('password', 'Password:')
            ->setRequired('Please enter your password.');

        $form->addSubmit('send', 'Sign in');

        $form->onSuccess[] = [$this, 'signInFormSucceeded'];
        return $form;
    }
	
	public function signInFormSucceeded($form, $values)
{
    try {
        $this->getUser()->login($values->username, $values->password);
        $this->redirect('Homepage:');

    } catch (Nette\Security\AuthenticationException $e) {
        $form->addError('Incorrect Login. Please Try again');
    }
}
	
	public function actionCreate()
{
    if (!$this->getUser()->isLoggedIn()) {
        $this->redirect('Sign:in');
    }
}
	
	public function actionEdit($ideaID)
{
    if (!$this->getUser()->isLoggedIn()) {
        $this->redirect('Sign:in');
    }
	}
		
		public function postFormSucceeded($idea)
		{
    if (!$this->getUser()->isLoggedIn()) {
        $this->error('You need to log in to create or edit posts');
    } }
			
			public function actionOut()
{
    $this->getUser()->logout();
    $this->flashMessage('You have been signed out.');
    $this->redirect('Homepage:');
}
}