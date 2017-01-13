<?php

namespace App\Forms;

use Nette,
	Nette\Application\UI\Form,
        PDOException;

/**
 * Factory allow editing a user in the users table by forms.
 */
class EditUserFormFactory extends Nette\Object
{
	/** @var Database */
        private $database;

	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

	/**
         * Function represents the form for change values of a user.
	 * @param  Selection 
	 * @return Form
	 */
	public function create($user)
	{
            $form = new Form;
            $form->addHidden('user_id')->setValue($user->id_users);
            
            $form->addText('login', 'Login *')
                ->setDefaultValue($user->login)
                ->setRequired('Type your login');

            $form->addPassword('password', 'New Password *');

            $form->addPassword('passwordVerify', 'New Password *')
                ->addRule(Form::EQUAL, 'Passwords must equals', $form['password']);

            $form->addText('email', 'Email *')
                ->setRequired('Type your email')
                ->setDefaultValue($user->email)
                ->addRule(FORM::EMAIL,"This is not email");

            $form->addText('name', 'Name')
                ->setDefaultValue($user->name);

            $form->addText('surname', 'Surname')
                ->setDefaultValue($user->surname);

            $sex = array(
                'm' => 'man',
                'f' => 'woman',
            );
            $form->addRadioList('gender', 'Gender', $sex)
                ->setDefaultValue($user->gender);

            $form->addSubmit('send', 'Accept');

            $form->addProtection('Timeout, send the form again');

            $form->onSuccess[] = array($this, 'formSucceeded');
            return $form;
	}

	/**
         * Function insert new values from the previous creation of form for edit user.
	 */
	public function formSucceeded($form, $values)
	{
            $user = $this->database->table('users')->get($values->user_id);
            if ($values->password==''){
                $userPassword = $user->password;
            }else{
                $userPassword = sha1($values->password);
            }   
            
            try {                  
                $this->database->table('users')->where('id_users = ?', $values->user_id)->update(array(
                    'login' => $values->login,
                    'password' => $userPassword,
                    'email' => $values->email,
                    'name' => $values->name,
                    'surname' => $values->surname,
                    'gender' => $values->gender,
                ));
                
            } catch (PDOException $e) {
                $form->addError($e->getMessage());
            } 
	}
}
