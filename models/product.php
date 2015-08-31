<?php

class Product extends Model {
    public $table = 'products';
    public $primary_key = 'id';

    public function getAllDesc($limit) {
        $sql = "SELECT * FROM `{$this->table}` ORDER BY id desc LIMIT {$limit}";
        
        return db_get_all($sql);
    }

    public function getById($product_id)
    {
    	$sql = "SELECT * FROM `{$this->table}` WHERE id= {$product_id}";
        
        return db_get_all($sql);
    }
}
