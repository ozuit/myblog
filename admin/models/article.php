<?php

class Article extends Model {
    public $table = 'articles';
    public $primary_key = 'id';
    
    public function getAll() {        
        $sql = "SELECT a.id,title,description,date_up,name FROM `{$this->table}` as a  LEFT JOIN categories as c
                ON a.category_id=c.id ";
        
        return db_get_all($sql);
    }
    
    public function addToArticle($postData) {
        $postData['date_up'] = date("Y-m-d");
        
        return db_insert($this->table, $postData);
    }

    public function deleteById($article_id) {
        $sql = "SELECT * FROM `comments` WHERE article_id={$article_id}";
        $user_comment = db_get_all($sql);
        if (count($user_comment) > 0) {
            foreach ($user_comment as $value) {
                db_delete('comments','id='.$value['id']);
            }
        }
        return db_delete($this->table,'id='.$article_id);
    }

    public function updateById($postData, $article_id) {

        return db_update($this->table, $postData, 'id='.$article_id);
    }
}
