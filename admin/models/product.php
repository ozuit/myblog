<?php

class Product extends Model {
    public $table = 'products';
    public $primary_key = 'id';
    
    public function getAll() {        
        $sql = "SELECT * FROM `{$this->table}`";
        
        return db_get_all($sql);
    }
    
    public function addToProduct($postData) {
        
        return db_insert($this->table, $postData);
    }

    public function deleteById($product_id) {
        $sql = "SELECT * FROM `payments` WHERE product_id={$product_id}";
        $user_comment = db_get_all($sql);
        if (count($user_comment) > 0) {
            foreach ($user_comment as $value) {
                db_delete('payments','id='.$value['id']);
            }
        }
        return db_delete($this->table,'id='.$product_id);
    }

    public function updateById($postData, $product_id) {

        return db_update($this->table, $postData, 'id='.$product_id);
    }
}
