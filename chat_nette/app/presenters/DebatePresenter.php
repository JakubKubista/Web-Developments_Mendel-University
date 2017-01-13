<?php

namespace App\Presenters;

use Nette,
        Nette\Application\UI\Form,
        App\Model;


/**
 * Homepage presenter.
 */
class DebatePresenter extends BasePresenter
{
    /** @var Nette\Database\Context */
    private $database;
       
    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }
    
      public function renderGroups()
    {
        $this->template->posts = $this->database->table('posts')
            ->order('id ASC')
            ->limit(3);
    }
    
    public function renderRoom($roomId)
    {
        $userId = $this->user->getIdentity()->getId();
        $this->template->rooms = $this->database->table('rooms');
        $message = $this->database->table('messages');
        $this->template->thisUserID =  $userId;
        $this->template->thisUser =  $this->database->table('users')->get($userId);   
        $this->template->thisRoomID = $roomId;
        $this->template->thisRoomLock = count($this->database->table('rooms')->where('id_rooms=? AND lock=?', $roomId,'f'));
        $this->template->isRename = count($this->database->table('rooms')->where('id_rooms=? AND rename=?', $roomId,'t'));
        $this->template->thisRoom =  $this->database->table('rooms')->get($roomId);
        
        $this->template->messages = $this->database->query('
            SELECT * FROM messages
            JOIN users ON messages.id_users_from = users.id_users
            WHERE messages.id_rooms = ?', $roomId, ' ORDER BY id_messages DESC'); 

        $this->template->thisOwner = count($this->database->table('rooms')->where('id_rooms=? AND id_users_owner=?', $roomId,$userId));
        $this->database->table('in_room')->where('id_users=?',$userId)->delete();
        $this->database->table('in_room')->insert(array(
            'id_rooms' => $roomId,
            'id_users' => $userId,
        )); 
        
        $this->template->admins = $this->database->query('
        SELECT in_room.id_users,users.login  FROM in_room
        JOIN users ON in_room.id_users = users.id_users
        WHERE in_room.id_rooms=? AND users.role=?', $roomId,'admin'); 
        
        $this->template->members = $this->database->query('
        SELECT in_room.id_users,users.login  FROM in_room
        JOIN users ON in_room.id_users = users.id_users
        WHERE in_room.id_rooms=? AND users.role!=?', $roomId,'admin'); 
        
        $this->template->users = $this->database->query('
        SELECT in_room.id_users,users.login  FROM in_room
        JOIN users ON in_room.id_users = users.id_users
        WHERE in_room.id_rooms=?', $roomId); 
    }
    
    
    public function renderInfo($roomId)
    {
        $userId = $this->user->getIdentity()->getId();
        $this->template->rooms = $this->database->table('rooms');
        $this->template->actualRoom = $this->database->query('
            SELECT * FROM rooms
            JOIN users ON rooms.id_users_owner = users.id_users
            WHERE rooms.id_rooms = ?', $roomId); 
        $this->template->thisUserID =  $userId;
        $this->template->thisUser =  $this->database->table('users')->get($userId);   
        $this->template->thisRoomID = $roomId;
        $this->template->thisRoomLock = count($this->database->table('rooms')->where('id_rooms=? AND lock=?', $roomId,'f'));
        $this->template->isRename = count($this->database->table('rooms')->where('id_rooms=? AND rename=?', $roomId,'t'));
        $this->template->thisRoom =  $this->database->table('rooms')->get($roomId);
        $this->template->thisOwner = count($this->database->table('rooms')->where('id_rooms=? AND id_users_owner=?', $roomId,$userId));
    
        $this->database->table('in_room')->where('id_users=?',$userId)->delete();
        $this->database->table('in_room')->insert(array(
            'id_rooms' => $roomId,
            'id_users' => $userId,
        )); 
        
        $this->template->admins = $this->database->query('
        SELECT in_room.id_users,users.login  FROM in_room
        JOIN users ON in_room.id_users = users.id_users
        WHERE in_room.id_rooms=? AND users.role=?', $roomId,'admin'); 
        
        $this->template->members = $this->database->query('
        SELECT in_room.id_users,users.login  FROM in_room
        JOIN users ON in_room.id_users = users.id_users
        WHERE in_room.id_rooms=? AND users.role!=?', $roomId,'admin'); 
        
        $this->template->users = $this->database->query('
        SELECT in_room.id_users,users.login  FROM in_room
        JOIN users ON in_room.id_users = users.id_users
        WHERE in_room.id_rooms=?', $roomId); 
    } 
   
	public function actionLock($roomId)
	{
            $userId = $this->user->getIdentity()->getId();
            $thisUser =  $this->database->table('users')->get($userId); 
            $thisOwner = count($this->database->table('rooms')->where('id_rooms=? AND id_users_owner=?', $roomId,$userId));
            $isLocked = count($this->database->table('rooms')->where('id_rooms=? AND lock=?', $roomId,'f'));
            if (($thisOwner >0)||($thisUser->role == 'admin')){
                if($isLocked >0){
                    $this->database->table('rooms')->where('id_rooms = ?', $roomId)->update(array(
                        'lock' => 't',
                    ));
                            $this->flashMessage('You locked room');
                            $this->redirect("Debate:room", $roomId);  
                }else{
                    $this->database->table('rooms')->where('id_rooms = ?', $roomId)->update(array(
                        'lock' => 'f',
                    ));
                            $this->flashMessage('You unlocked room');
                            $this->redirect("Debate:room", $roomId);
                }
            }else{
                $this->flashMessage('You do not have permission');
                $this->redirect("Debate:room", $roomId);
            }
	}
        
	public function actionDelete($roomId)
	{
            $userId = $this->user->getIdentity()->getId();
            $thisUser =  $this->database->table('users')->get($userId); 
            $thisOwner = count($this->database->table('rooms')->where('id_rooms=? AND id_users_owner=?', $roomId,$userId));
            if (($thisOwner >0)||($thisUser->role == 'admin')){
                $this->database->table('rooms')->where('id_rooms = ?', $roomId)->delete();
                        $this->flashMessage('You deleted room');
                        $this->redirect("Homepage:default");    
            }else{
                $this->flashMessage('You do not have permission');
                $this->redirect("Debate:room", $roomId);
            }
	}
        
	public function actionRename($roomId)
	{
            $userId = $this->user->getIdentity()->getId();
            $thisUser =  $this->database->table('users')->get($userId); 
            $thisOwner = count($this->database->table('rooms')->where('id_rooms=? AND id_users_owner=?', $roomId,$userId));
            if (($thisOwner >0)||($thisUser->role == 'admin')){
                    $this->database->table('rooms')->where('id_rooms = ?', $roomId)->update(array(
                        'rename' => 't',
                    ));
                    $this->redirect("Debate:room", $roomId);
            }else{
                $this->flashMessage('You do not have permission');
                $this->redirect("Debate:room", $roomId);
            }
	}
      
    protected function createComponentRenameForm()
    {
        $form = new Form;

        $roomId = $_GET['roomId'];
        
        $form->addText('title', 'Name:');

        $form->addSubmit('send', 'Rename');
        
        $this->database->table('rooms')->where('id_rooms = ?', $roomId)->update(array(
            'rename' => 'f',
        ));
        
        $form->addProtection('Timeout, send the form again');
        
        $form->onSuccess[] = array($this, 'renameFormSucceeded');
        
        return $form;
    } 
    
    public function renameFormSucceeded($form, $values)
    {   
        $roomId = $_GET['roomId'];
        $this->database->table('rooms')->where('id_rooms = ?', $roomId)->update(array(
            'title' => $values->title,
        ));
        $this->flashMessage('Rename successfully', 'success');
        $this->redirect("Debate:room", $roomId);
    }
        
        
        
   protected function createComponentMessageForm()
    {
        $form = new Form;
        $form->getElementPrototype()->class('ajax');
        $form->addTextArea('message', '')
            ->setRequired();
        $form->addHidden('id_rooms')->setDefaultValue($_GET['roomId']);
        $form->addHidden('id_users_from')->setDefaultValue($this->user->getIdentity()->getId());
        
        $users = $this->database->query('
        SELECT in_room.id_users,users.login  FROM in_room
        JOIN users ON in_room.id_users = users.id_users
        WHERE in_room.id_rooms=?', $_GET['roomId']); 
        
        $allUsers = array(
            $this->user->getIdentity()->getId() => 'All',
          );   
         
        foreach ($users as $user){
            if($user->id_users!=$this->user->getIdentity()->getId()){
             $allUsers[$user->id_users] =  $user->login;
            }
        }
        
        $form->addSelect('id_users_to', '', $allUsers);
        
        $form->addSubmit('send', 'Send');
         //   ->setAttribute('onclick', 'sendChatText()');
           
    //    $json = json_encode($_GET['thisMessage']);
        $form->onSuccess[] = array($this, 'messageFormSucceeded');

    //  cross site
        $form->addProtection();
        return $form;
    }
   
    public function messageFormSucceeded($form, $values)
    {
      
        $this->database->table('messages')->insert(array(
            'id_rooms' => $_GET['roomId'],
            'id_users_from' => $this->user->getIdentity()->getId(),
            'id_users_to' => $values->id_users_to,
            'message' => $values->message,
        ));
        
        $this->database->table('in_room')->where('id_rooms=?', $_GET['roomId'])->update(array(
            'last_message' => time(),
        ));
        
        
        $this->flashMessage('Message has been send', 'success');
    if (!$this->isAjax())
        $this->redirect('this');
    else {
        
        $this->invalidateControl('list');
        $this->invalidateControl('form');
        $form->setValues(array(), TRUE);
   }
    }  
}