<?php

class User extends Model {

    public $table = 'users';

    public function getAll() {
        
        $sql = "SELECT * FROM `{$this->table}`";
        
        return db_get_all($sql);
    }

    public function deleteById($user_id) {

        return db_delete($this->table,'id='.$user_id);
    }
}
