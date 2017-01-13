<?php

namespace App\Presenters;

use Nette,
	App\Forms\MessageFormFactory,   
	App\Forms\EditRoomFormFactory,     
        App\Model\Room, 
        App\Core\RoomManager;

/**
 * Debate presenter accepts inputs of data manipulation from Debate templates.
 * Render data from all tables from database (supported by Room model),
 * such as information about room, users, messages etc.
 * Sending commands to change database by Room Manager, MessageFormFactory and EditRoomFormFactory.
 */
class DebatePresenter extends BasePresenter
{
    /** @var Nette\Database\Context */
    private $database;

    /** @var MessageFormFactory @inject */
    public $messageFactory;
    
    /** @var EditRoomFormFactory @inject */
    public $editRoomFactory;
    
    private $roomModel;
    private $roomManager;
       
        public function __construct(Nette\Database\Context $database, Room $roomModel, RoomManager $roomManager)
        {
            $this->database = $database;
            $this->roomModel = $roomModel;
            $this->roomManager = $roomManager;
        }

        /**
         * Function for render Room template.
         * Include views on selections of table from database (selected by Room model).
         * @param  int
	 * @return void
         */
        public function renderRoom($roomId)
        {
            $user = $this->user->getIdentity();
            $room = $this->database->table('rooms')->get($roomId);

            // Check if room exists and transfer local user inside.
            if($this->roomManager->enterRoom($user->getId(), $roomId)==FALSE){
                $this->flashMessage('The room does not exist');
                $this->redirect("Homepage:default");  
            }
            
            // All variables relate only to local room.
            $this->template->localUser = $user;     
            $this->template->localRoom = $room; 
            $this->template->rooms = $this->database->table('rooms');
            $this->template->owner = $this->roomModel->getOwner($roomId); 

            $this->template->messages = $this->roomModel->getMessages($roomId);  
            $this->template->admins = $this->roomModel->getAdmins($roomId);  
            $this->template->members = $this->roomModel->getMembers($roomId);
            $this->template->users =  $this->roomModel->getUsers($roomId); 
        }

        /**
         * Handler function for lock local room. Ajax support.
         * @param  int
         */
	public function handleLock($roomId)
	{
            $user = $this->user->getIdentity();
            $owner = $this->roomModel->getOwner($roomId);
            
            // Can be solved by AclModel as well.
            if (($owner->id_users == $user->getId())||($user->role != 'guest')){
                
                if(!$this->roomManager->isLocked($roomId)){
                    $this->roomManager->lockRoom($roomId); 
                    $lockString = "locked";
                }else{
                    $this->roomManager->unlockRoom($roomId); 
                    $lockString = "unlocked";
                }
                
                if ($this->isAjax()){
                    $this->redrawControl("roomSnip");

                }else{
                    $this->flashMessage('You '.$lockString.' room');
                    $this->redirect('this'); 
                }
                
            }else{
                $this->flashMessage('You do not have permission');
                $this->redirect('this');
            }
	}

        /**
         * Handler function for delete local room. 
         * @param  int
         */
	public function handleDelete($roomId)
	{
            $user = $this->user->getIdentity();
            $owner = $this->roomModel->getOwner($roomId);
            if (($owner->id_users == $user->getId())||($user->role != 'guest')){
                $this->roomManager->deleteRoom($roomId);
                        $this->flashMessage('The room has been deleted');
                        $this->redirect("Homepage:default");    
            }else{
                $this->flashMessage('You do not have permission');
                $this->redirect('this');
            }
	}

        /**
         * Handler function for rename local room. Ajax support.
         * @param  int
         */
	public function handleRename($roomId)
	{
            $user = $this->user->getIdentity();
            $owner = $this->roomModel->getOwner($roomId);
            if (($owner->id_users == $user->getId())||($user->role != 'guest')){
                // Show form for rename local room.
                $this->roomManager->enableRenameRoom($roomId);
                    if ($this->isAjax()) {
                        $this->redrawControl("roomSnip");

                    }else{
                        $this->redirect('this'); 
                    }
            }else{
                $this->flashMessage('You do not have permission');
                $this->redirect('this');
            }
	}

        /**
         * Function represents the component of form for rename local room. Ajax support.
	 * @return Form
         */
        protected function createComponentRenameForm()
        {       
            // Solved by GET method to try HTTP request.
            $roomId = $_GET['roomId'];
            $this->roomManager->disableRenameRoom($roomId);
                // Hide form for rename local room.
            $form = $this->editRoomFactory->create($roomId);
            $form->onSuccess[] = function ($form) {
                if ($this->isAjax()) {
                    $this->redrawControl("roomSnip");
                }else{
                    $this->flashMessage('The name of the room has been changed', 'success');
                    $this->redirect('this');
                }
            };
            return $form;           
        }  

        /**
         * Function represents the component of form for create new message in local room. Ajax support.
	 * @return Form
         */
       protected function createComponentMessageForm()
        {
            $roomId = $_GET['roomId'];
            $userId = $this->user->getIdentity()->getId();   
            $form = $this->messageFactory->create($roomId, $userId);
            $form->onSuccess[] = function ($form) {
                if ($this->isAjax()) {
                    $this->redrawControl("roomSnip");
                }else{
                    $this->flashMessage('Your message has been send', 'success');
                    $this->redirect('this');
                }
            };
            return $form;
        }  
}