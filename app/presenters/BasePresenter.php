<?php

namespace App\Presenters;

use Nette,
	App\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter 
{
    private $acl=null;

        public function startup() {
          parent::startup();

          if(!$this->getUser()->isLoggedIn()){
              if($this->name!="Sign" && $this->action!="in"){

              $this->redirect("Sign:in");
                }
              } else {
                  $this->acl = new \AclModel();
                  $roles=$this->getUser()->getRoles();
                  $role=array_shift($roles);
              } 
        }

        /**
         * Function validate flash messages.
         */
        public function afterRender()
        {
            if ($this->isAjax() && $this->hasFlashSession())
                $this->invalidateControl('flashes');
        }

}
