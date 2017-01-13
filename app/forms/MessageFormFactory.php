<?php

namespace App\Forms;

use Nette,
	Nette\Application\UI\Form,
        PDOException;

/**
 * Factory allow adding a message into the messages table by forms.
 */
class MessageFormFactory extends Nette\Object
{
	/** @var Database */
        private $database;

	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

	/**
         * Function represents the form for add values of a message.
	 * @param  int
	 * @param  int
	 * @return Form
	 */
	public function create($roomId, $userId)
	{
            $form = new Form;
            $form->getElementPrototype()->class("ajax");

            $form->addHidden('id_rooms')->setValue($roomId);
            $form->addHidden('id_user')->setValue($userId);
            $form->addTextArea('message', '')->setRequired();
            $form->addHidden('id_users_from')->setDefaultValue($userId);

            // select only users in actual room
            $users = $this->database->query('
            SELECT in_room.id_users,users.login  FROM in_room
            JOIN users ON in_room.id_users = users.id_users
            WHERE in_room.id_rooms=?', $roomId); 

            // default value
            $allUsers = array($userId => 'All');   

            foreach ($users as $user){
                if($user->id_users!=$userId){
                 $allUsers[$user->id_users] =  $user->login;
                }
            }

            $form->addSelect('id_users_to', '', $allUsers);
            $form->addSubmit('send', 'Send')
                 ->setAttribute("class","ajax");

            $form->addProtection('Timeout, send the form again');

            $form->onSuccess[] = array($this, 'formSucceeded');
            return $form;
	}

	/**
         * Function insert new values from the previous creation of form for add message.
	 */
	public function formSucceeded($form, $values)
	{
            try {   
                $this->database->table('messages')->insert(array(
                    'id_rooms' => $values->id_rooms,
                    'id_users_from' => $values->id_user,
                    'id_users_to' => $values->id_users_to,
                    'message' => $values->message,
                ));

                $this->database->table('in_room')->where('id_rooms=?', $values->id_rooms)->update(array(
                    'last_message' => time(),
                ));
                $form->setValues(array(), TRUE);
                
            } catch (PDOException $e) {
                $form->addError($e->getMessage());
            } 
	}
}
