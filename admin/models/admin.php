<?php

class Admin extends Model {
    public $table = 'admin';
    
    public function authLogin($postData) {
        $user = static::findOne($postData['username'], 'username');
        
        if ($user && $user['password'] == md5($postData['password'])) {
            unset($user['password']);
            $_SESSION['ad_logged'] = $user;
            return $user;
        }
        
        return false;
    }
    
    public function authLogout() {
        unset($_SESSION['ad_logged']);
    }
}
