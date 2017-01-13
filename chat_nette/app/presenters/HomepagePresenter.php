<?php

namespace App\Presenters;

use Nette,
        Nette\Application\UI\Form,
        App\Model;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
    /** @var Nette\Database\Context */
    private $database;
       
    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }
    
      public function renderDefault()
    {
        $this->template->rooms = $this->database->table('rooms');
        $this->template->thisUserID  = $this->user->getIdentity()->getId();
        $this->template->thisUser = $this->database->table('users')->get($this->template->thisUserID);
    }  
    
      public function renderProfile($userId)
    {
        $this->template->rooms = $this->database->table('rooms');
        $this->template->thisUserID  = $this->user->getIdentity()->getId();
        $this->template->users = $this->database->table('users')->where('id_users=?', $userId);
        $this->template->thisOwner = ($userId == $this->template->thisUserID);
    } 
    
      public function renderEdit()
    {
        $this->template->rooms = $this->database->table('rooms');
        $userId = $this->user->getIdentity()->getId();
        $this->template->thisUserID  = $userId;
        $this->template->users = $this->database->table('users')->where('id_users=?', $userId);
    }
    
    
    protected function createComponentEditForm()
    {
        $form = new Form;
        $userId = $this->user->getIdentity()->getId();
        $user = $this->database->table('users')->get($userId);
        $form->addText('login', 'Login*:')
            ->setDefaultValue($user->login)
            ->setRequired('Type your login');
        
        $form->addPassword('password', 'New Password*:');
        
        $form->addPassword('passwordVerify', 'New Password*:')
            ->addRule(Form::EQUAL, 'Passwords must equals', $form['password']);
        
        $form->addText('email', 'Email*:')
            ->setRequired('Type your email')
            ->setDefaultValue($user->email)
            ->addRule(FORM::EMAIL,"This is not email");
        
        $form->addText('name', 'Name:')
            ->setDefaultValue($user->name);
        
        $form->addText('surname', 'Surname:')
            ->setDefaultValue($user->surname);
        
        $sex = array(
            'm' => 'man',
            'f' => 'woman',
        );
        $form->addRadioList('gender', 'Gender:', $sex)
            ->setDefaultValue($user->gender);

        $form->addSubmit('send', 'Accept');

        $form->addProtection('Timeout, send the form again');
        
        $form->onSuccess[] = array($this, 'editFormSucceeded');
        
        return $form;
    } 
    
    public function editFormSucceeded($form, $values)
    {
        $userId = $this->user->getIdentity()->getId();
        $user = $this->database->table('users')->get($userId);
        if ($values->password==''){
            $userPassword = $user->password;
        }else{
            $userPassword = sha1($values->password);
        }
        $this->database->table('users')->where('id_users = ?', $userId)->update(array(
            'login' => $values->login,
            'password' => $userPassword,
            'email' => $values->email,
            'name' => $values->name,
            'surname' => $values->surname,
            'gender' => $values->gender,
        ));

        $this->flashMessage('Edit successfully', 'success');
        $this->redirect('Homepage:');
    }
    
    
    
	public function actionCreate()
	{   
                $roomId = rand(3, 50);;
                $this->database->table('rooms')->insert(array(
                    'title' => 'Room' . $roomId,
                    'id_users_owner' => $this->user->getIdentity()->getId(),
                    'lock' => 'f',
                ));
                        $this->flashMessage('You created room');
                        $this->redirect("Homepage:default");    
	} 
        
}