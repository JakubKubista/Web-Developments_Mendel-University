<?php

namespace App\Presenters;

use Nette,
	App\Forms\EditUserFormFactory,
        App\Core\RoomManager;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
    /** @var Nette\Database\Context */
    private $database;  
    
    /** @var EditUserFormFactory @inject */
    public $editUserFactory;
    
    private $roomManager;

        public function __construct(Nette\Database\Context $database, RoomManager $roomManager)
        {
            $this->database = $database;
            $this->roomManager = $roomManager;
        }

        /**
         * Function for render home page. 
         * Include selections of table rooms.
         * @return void
         */
        public function renderDefault()
        {
            $this->template->rooms = $this->database->table('rooms');
            $this->template->localUser  = $this->user->getIdentity();
        }  

        /**
         * Function for render profile of local user. 
         * Include selections of table rooms.
         * @param  int
         * @return void
         */
         public function renderProfile($userId)
        {
            $this->template->rooms = $this->database->table('rooms');
            $this->template->localUser  = $this->user->getIdentity();
            // Authority check (for changes).
            $this->template->profileAuthority = ($userId == $this->template->localUser->getId());
        } 

        /**
         * Function for render profile editation of local user. 
         * Include selections of table rooms.
         * @return void
         */
        public function renderEdit()
        {
            $this->template->rooms = $this->database->table('rooms');
        }

        /**
         * Function represents the component of form for edit local user. 
	 * @return Form
         */
        protected function createComponentEditForm()
        {
            $userId = $this->user->getIdentity()->getId();
            $user = $this->database->table('users')->get($userId);
            $form = $this->editUserFactory->create($user);
            $form->onSuccess[] = function ($form) {
                    $this->flashMessage('Edited successfully', 'success');
                    $form->getPresenter()->redirect('Homepage:');
            };
            return $form; 

        }  
        
        /**
         * Action function for create new room.
         */
        public function actionCreate()
        {   
            $userId = $this->user->getIdentity()->getId();
            $this->roomManager->createRoom($userId); 

            $this->flashMessage('You created room');
            $this->redirect("Homepage:default");    
        } 
        
}