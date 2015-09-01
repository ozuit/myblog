<?php

class Category extends Model {
    public $table = 'categories';
    public $primary_key = 'id';
    
    public function getAllBy($value=null) {   
        if ($value=='') {
                 $value = '*';
             }     
        $sql = "SELECT `{$value}` FROM `{$this->table}`";
        
        return db_get_all($sql);
    }
    
    public function getAll()
    {
    	$sql = "SELECT * FROM `{$this->table}`";
        
        return db_get_all($sql);
    }

    public function addToCategory($postData) {
       
        return db_insert($this->table, $postData);
    }

    public function deleteById($category_id) {
        $sql = "SELECT * FROM `articles` WHERE category_id={$category_id}";
        $articles = db_get_all($sql);
        if (count($articles) > 0) {
            foreach ($articles as $value) {
                model('article')->deleteById($value['id']);
            }
        }
        return db_delete($this->table,'id='.$category_id);
    }

    public function updateById($postData, $category_id) {

        return db_update($this->table, $postData, 'id='.$category_id);
    }
}
