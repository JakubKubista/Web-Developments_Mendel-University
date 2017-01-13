<?php

namespace App\Presenters;

use Nette,
        Nette\Application\UI\Form,
	App\Forms\SignFormFactory,       
        App\Model;


/**
 * Sign in/out presenters.
 */
class SignPresenter extends BasePresenter
{
	/** @var SignFormFactory @inject */
	public $factory;
        private $database;

        public function __construct(Nette\Database\Context $database)
        {
            $this->database = $database;
        }

	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
        
	protected function createComponentSignInForm()
	{
		$form = $this->factory->create();
		$form->onSuccess[] = function ($form) {
			$form->getPresenter()->redirect('Homepage:');
		};
		return $form;
	}


	public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('You have been signed out');
		$this->redirect('in');
	}
        
    protected function createComponentRegistrationForm()
    {
        $form = new Form;

        $form->addText('login', 'Login*:')
            ->setRequired('Type your login');

        $form->addPassword('password', 'Password*:')
            ->setRequired('Type your password');
                /*
            ->addRule(FORM::MIN_LENGTH,"Password must be min %d",6)
            ->addRule(Form::PATTERN, 'Must contain a digit', '.*[0-9].*');
                 */
        $form->addPassword('passwordVerify', 'Password:')
            ->setRequired('Type your password for check')
            ->addRule(Form::EQUAL, 'Passwords must equals', $form['password']);
        
        $form->addText('email', 'Email*:')
            ->setRequired('Type your email')
            ->addRule(FORM::EMAIL,"This is not email");
        
        $form->addText('name', 'Name:');
        
        $form->addText('surname', 'Surname:');
        
        $sex = array(
            'm' => 'man',
            'f' => 'woman',
        );
        $form->addRadioList('gender', 'Gender:', $sex);
       //     ->getSeparatorPrototype()->setName(NULL);

        $form->addSubmit('send', 'Sing up');

        $form->addProtection('Timeout, send the form again');
        
        $form->onSuccess[] = array($this, 'registrationFormSucceeded');
        
        return $form;
    } 
    
    public function registrationFormSucceeded($form, $values)
    {
        $roleMember = "guest";
        $this->database->table('users')->insert(array(
            'login' => $values->login,
            'password' => sha1($values->password),
            'email' => $values->email,
            'name' => $values->name,
            'surname' => $values->surname,
            'gender' => $values->gender,
            'role' => $roleMember,
        ));

        $this->flashMessage('Registered successfully', 'success');
        $this->redirect('Homepage:');
    }

}
