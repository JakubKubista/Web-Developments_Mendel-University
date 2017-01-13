<?php

namespace App\Forms;

use Nette,
	Nette\Application\UI\Form,
        PDOException;

/**
 * Factory allow editing a room in the room table by forms.
 */
class EditRoomFormFactory extends Nette\Object
{
	/** @var Database */
        private $database;

	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

	/**
         * Function represents the form for change name of a room. Ajax support.
	 * @param  int
	 * @return Form
	 */
	public function create($roomId)
	{
            $form = new Form;
            $form->getElementPrototype()->class("ajax");

            $form->addHidden('id_room')->setValue($roomId);
            
            $form->addText('title', 'Name')
                ->setRequired('Please enter the name of room.')
                ->addRule(FORM::MIN_LENGTH,"Please enter min 4 characters %d",4)
                ->addRule(FORM::MAX_LENGTH,"Please enter max 10 characters %d",10);
        
            $form->addSubmit('send', 'Rename')
                 ->setAttribute("class","ajax");

            $form->addProtection('Timeout, send the form again');

            $form->onSuccess[] = array($this, 'formSucceeded');
            return $form;
	}

	/**
         * Function insert new values from the previous creation of form for edit room.
	 */
	public function formSucceeded($form, $values)
	{
            try {                  
                $this->database->table('rooms')->where('id_rooms = ?', $values->id_room)->update(array(
                    'title' => $values->title,
                ));
                
            } catch (PDOException $e) {
                $form->addError($e->getMessage());
            } 
	}
}
