<?php

class User extends Model {

    public $table = 'users';

    public function getAll() {
        
        $sql = "SELECT * FROM `{$this->table}`";
        
        return db_get_all($sql);
    }

    public function deleteById($user_id) {
    	$sql = "SELECT * FROM `comments` WHERE user_id={$user_id}";
    	$user_comment = db_get_all($sql);
    	if (count($user_comment) > 0) {
    		foreach ($user_comment as $value) {
    			db_delete('comments','id='.$value['id']);
    		}
    	}
        return db_delete($this->table,'id='.$user_id);
    }
}
