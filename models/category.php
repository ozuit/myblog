<?php

class Category extends Model {
    public $table = 'categories';
    public $primary_key = 'id';

    public function getAllDesc($limit) {
        $sql = "SELECT id,name FROM `{$this->table}` ORDER BY id desc LIMIT {$limit}";
        
        return db_get_all($sql);
    }
}
