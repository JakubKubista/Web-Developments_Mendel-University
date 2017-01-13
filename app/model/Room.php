<?php

namespace App\Model;

use Nette;

/**
 * Model Room manages the data about room.
 * Contains get methods represented selections of database.
 */
class Room extends Nette\Object {
    
    private $database;
    
	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}
        
        /**
         * Function get owner of the local room.
	 * @param  int
	 * @return Selection
         */ 
        public function getOwner($roomId) {
           $room = $this->database->table('rooms')->get($roomId);
           return $this->database->table('users')->get($room->id_users_owner);
         } 
         
        /**
         * Function get messages of the local room intended only for specified recipients.
	 * @param  int
	 * @return Selection
         */ 
        public function getMessages($roomId) {
            // Can be solved by Nette syntax - just for SQL ilustration.
           $messages = $this->database->query('
               SELECT * FROM messages
               JOIN users ON messages.id_users_from = users.id_users
               WHERE messages.id_rooms = ?', $roomId, ' ORDER BY id_messages ASC'); 

           return $messages;
         }  

        /**
         * Function get administrators of the local room.
	 * @param  int
	 * @return Selection
         */ 
        public function getAdmins($roomId) {
           $admins = $this->database->query('
               SELECT in_room.id_users,users.login  FROM in_room
               JOIN users ON in_room.id_users = users.id_users
               WHERE in_room.id_rooms=? AND users.role=?', $roomId,'admin'); 

           return $admins;
         }   

        /**
         * Function get members of the local room.
	 * @param  int
	 * @return Selection
         */ 
        public function getMembers($roomId) {
           $members = $this->database->query('
               SELECT in_room.id_users,users.login  FROM in_room
               JOIN users ON in_room.id_users = users.id_users
               WHERE in_room.id_rooms=? AND users.role!=?', $roomId,'admin'); 

           return $members;
         }  

        /**
         * Function get users of the local room.
	 * @param  int
	 * @return Selection
         */ 
        public function getUsers($roomId) {
           $users = $this->database->query('
               SELECT in_room.id_users,users.login  FROM in_room
               JOIN users ON in_room.id_users = users.id_users
               WHERE in_room.id_rooms=?', $roomId); 

           return $users;
         }  
}