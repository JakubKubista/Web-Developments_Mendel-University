<?php

namespace App\Forms;

use Nette,
	Nette\Application\UI\Form,
        PDOException;

/**
 * Factory allow reguster a new user into the table users by forms.
 */
class RegisterFormFactory extends Nette\Object
{
	/** @var Database */
        private $database;

	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

	/**
         * Function represents the form for register.
	 * @return Form
	 */
	public function create()
	{
            $form = new Form;

            $form->addText('login', 'Login *')
                ->setRequired('Type your login');

            $form->addPassword('password', 'Password *')
                ->setRequired('Type your password')
                ->addRule(FORM::MIN_LENGTH,"Password must be min %d",6)
                ->addRule(Form::PATTERN, 'Must contain a digit', '.*[0-9].*');

            $form->addPassword('passwordVerify', 'Password *')
                ->setRequired('Type your password for check')
                ->addRule(Form::EQUAL, 'Passwords must equals', $form['password']);

            $form->addText('email', 'Email *')
                ->setRequired('Type your email')
                ->addRule(FORM::EMAIL,"This is not email");

            $form->addText('name', 'Name');

            $form->addText('surname', 'Surname');

            $sex = array(
                'm' => 'man',
                'f' => 'woman',
            );
            $form->addRadioList('gender', 'Gender', $sex);
           //     ->getSeparatorPrototype()->setName(NULL);

            $form->addSubmit('send', 'Sing up');

            $form->addProtection('Timeout, send the form again');

            $form->onSuccess[] = array($this, 'formSucceeded');
            return $form;
	}

	/**
         * Function register user with by the previous creation of form.
	 */
	public function formSucceeded($form, $values)
	{
            try {                  
                $this->database->table('users')->insert(array(
                    'login' => $values->login,
                    'password' => sha1($values->password),
                    'email' => $values->email,
                    'name' => $values->name,
                    'surname' => $values->surname,
                    'gender' => $values->gender,
                    'role' => "guest",
                ));

            } catch (PDOException $e) {
                $form->addError($e->getMessage());
            } 
	}
}
