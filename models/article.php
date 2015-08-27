<?php

class Article extends Model {
    public $table = 'articles';
    public $primary_key = 'id';

    public function getAllDesc($limit) {
        $sql = "SELECT id,title FROM `{$this->table}` ORDER BY date_up desc LIMIT {$limit}";
        
        return db_get_all($sql);
    }

    public function getAllBy($category_id)
    {
    	$sql = "SELECT * FROM `{$this->table}` WHERE category_id= {$category_id}";
        
        return db_get_all($sql);
    }
}

