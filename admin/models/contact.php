<?php

class Contact extends Model {
    public $table = 'contact';
    public $primary_key = 'id';
    
    public function getAll() {        
        $sql = "SELECT * FROM `{$this->table}`";
        
        return db_get_all($sql);
    }

    public function deleteById($contact_id)
    {
    	return db_delete($this->table,'id='.$contact_id);
    }
}