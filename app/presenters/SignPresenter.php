<?php

namespace App\Presenters;

use Nette,
	App\Forms\SignFormFactory,  
	App\Forms\RegisterFormFactory;


/**
 * Sign in/out presenters.
 */
class SignPresenter extends BasePresenter
{
	/** @var SignFormFactory @inject */
	public $signFactory;
	/** @var RegisterFormFactory @inject */
	public $registerFactory;
        
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
		$form = $this->signFactory->create();
		$form->onSuccess[] = function ($form) {
                        $this->flashMessage('Signed successfully', 'success');
			$form->getPresenter()->redirect('Homepage:');
		};
		return $form;
	}

	/**
         * Action function for log out.
	 */
	public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('You have been signed out');
		$this->redirect('in');
	}

        /**
         * Function represents the component of form for register new user. 
	 * @return Form
         */
        protected function createComponentRegistrationForm()
        {
                $form = $this->registerFactory->create();
                $form->onSuccess[] = function ($form) {
                        $this->flashMessage('Registered successfully', 'success');
                        $form->getPresenter()->redirect('Homepage:');
                };
                return $form;
        } 
}
