<?php

class Product extends Model {
    public $table = 'products';
    public $primary_key = 'id';

    public function getById($product_id)
    {
    	$sql = "SELECT * FROM `{$this->table}` WHERE id= {$product_id}";
        
        return db_get_all($sql);
    }

    public function getDetail($product_id)
    {
    	$sql = "SELECT description FROM `{$this->table}` WHERE id= {$product_id}";
        
        return db_get_all($sql);
    }
}
