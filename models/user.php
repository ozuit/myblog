<?php

class User extends Model {
    public $table = 'users';
    public $primary_key = 'id';
    
    public function authLogin($postData) {
        $user = static::getOneBy($postData['username'], 'username');

        if ($user && $user['password'] == md5($postData['password'])) {
            unset($user['password']);
            $_SESSION['logged'] = $user;
            return $user;
        }
        
        return false;
    }
    
    public function authRegister($postData) {
        $user = static::getOneBy($postData['username'], 'username');
        
        if ($user) {
            return false;
        } else {
            $postData['password'] = md5($postData['password']);
            $user_id = db_insert($this->table, $postData);
            unset($postData['password']);
            $postData['id'] = $user_id;
            $_SESSION['logged'] = $postData;
            
            return true;
        }
    }
    
    public function authLogout() {
        unset($_SESSION['logged']);
    }

    public function getAllById($user_id) {
        $sql = "SELECT * FROM `{$this->table}` WHERE id={$user_id}";

        return db_get_all($sql)[0];
    }

    public function updateById($postData, $user_id) {

        return db_update($this->table, $postData, 'id='.$user_id);
    }
}
