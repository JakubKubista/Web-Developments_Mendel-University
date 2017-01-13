<?php

namespace App\Core;

use Nette;

/**
 * Room management cares about modifying a database.
 * Specifically, it maintains rooms and in_room tables.
 */
class RoomManager extends Nette\Object {
    
    private $database;
    
	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}
        
        /**
         * Function delete user's previous room and insert user's actual room to in_room table.
	 * @param  int
	 * @param  int
         */
        public function enterRoom($userId, $roomId) {
            $this->database->table('in_room')->where('id_users=?',$userId)->delete();

            // Secure, that room really exist.
            if($this->database->table('rooms')->get($roomId)){
                $this->database->table('in_room')->insert(array(
                    'id_rooms' => $roomId,
                    'id_users' => $userId,
                ));  
                return TRUE;    
            }else{
                return FALSE;    
            }
        }  
        
        /**
         * Function create new room with random id and insert it into rooms table.
	 * @param  int
         */
        public function createRoom($userId) {
            $roomId = rand(3, 50);
            $this->database->table('rooms')->insert(array(
                'title' => 'Room' . $roomId,
                'id_users_owner' => $userId,
                'lock' => 'f',
            ));
        }  
        
        /**
         * Function check if is local room locked.
	 * @param  int
         */   
        public function isLocked($roomId) {
            if(($this->database->table('rooms')->get($roomId)->lock) != 'f'){
                return TRUE;
            }else{
                return FALSE; 
            }
        }  
        
        /**
         * Function lock local room in table rooms.
	 * @param  int
         */        
        public function lockRoom($roomId) {
            $this->database->table('rooms')->where('id_rooms = ?', $roomId)->update(array(
                'lock' => 't',
            ));
        }  

        /**
         * Function unlock local room in table rooms.
	 * @param  int
         */
        public function unlockRoom($roomId) {
            $this->database->table('rooms')->where('id_rooms = ?', $roomId)->update(array(
                'lock' => 'f',
            ));
        } 

        /**
         * Function delete local room from table rooms.
	 * @param  int
         */
        public function deleteRoom($roomId) {
            $this->database->table('rooms')->where('id_rooms = ?', $roomId)->delete();
        }      

        /**
         * Function allow local room from table rooms to rename.
	 * @param  int
         */   
        public function enableRenameRoom($roomId) {
            $this->database->table('rooms')->where('id_rooms = ?', $roomId)->update(array(
                'rename' => 't',
            ));
        }    

        /**
         * Function stop allow local room from table rooms to rename.
	 * @param  int
         */
        public function disableRenameRoom($roomId) {
            $this->database->table('rooms')->where('id_rooms = ?', $roomId)->update(array(
                'rename' => 'f',
            ));
        }
}