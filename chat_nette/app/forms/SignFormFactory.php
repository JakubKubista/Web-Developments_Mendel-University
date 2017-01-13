<?php

namespace App\Forms;

use Nette,
	Nette\Application\UI\Form,
	Nette\Security\User;


class SignFormFactory extends Nette\Object
{
	/** @var User */
	private $user;


	public function __construct(User $user)
	{
		$this->user = $user;
	}


	/**
	 * @return Form
	 */
	public function create()
	{
		$form = new Form;
		$form->addText('login', 'Name:')           
			->setRequired('Please enter your name.');
                        /*    
                        ->addRule(FORM::EMAIL,"This is not email");
                        */
		$form->addPassword('password', 'Password:')
			->setRequired('Please enter your password.');
                /*
                        ->addRule(FORM::MIN_LENGTH,"Heslo musi byt min %d",6);
                */
		$form->addCheckbox('remember', 'Keep me signed in');

		$form->addSubmit('send', 'Sign in');

                $form->addProtection('Timeout, send the form again');
                
		$form->onSuccess[] = array($this, 'formSucceeded');
		return $form;
	}


	public function formSucceeded($form, $values)
	{
		if ($values->remember) {
			$this->user->setExpiration('14 days', FALSE);
		} else {
			$this->user->setExpiration('20 minutes', TRUE);
		}

		try {   
			$this->user->login($values->login, $values->password);
		} catch (Nette\Security\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}

}
