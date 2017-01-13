<?php

namespace App\Forms;

use Nette,
	Nette\Application\UI\Form,
	Nette\Security\User;

/**
 * Factory allow sign a user from table users into the application by forms.
 * The form cooperates with the model UserManager, represents security of login.
 */
class SignFormFactory extends Nette\Object
{
	/** @var User */
	private $user;


	public function __construct(User $user)
	{
		$this->user = $user;
	}


	/**
         * Function represents the form for login.
	 * @return Form
	 */
	public function create()
	{
		$form = new Form;
		$form->addText('login', 'Name:')           
			->setRequired('Please enter your name.');

		$form->addPassword('password', 'Password:')
			->setRequired('Please enter your password.');

		$form->addCheckbox('remember', 'Keep me signed in');

		$form->addSubmit('send', 'Sign in');

                $form->addProtection('Timeout, send the form again');
                
		$form->onSuccess[] = array($this, 'formSucceeded');
		return $form;
	}

	/**
         * Function sign in user with authentication by the previous creation of form.
	 */
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
