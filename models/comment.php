<?php

class Comment extends Model {
    public $table = 'comments';
    public $primary_key = 'id';

    function countAllByArticleId($articleId)
    {
    	$sql = "SELECT * FROM `{$this->table}` WHERE `article_id` = " . esc($articleId);
        $rows = db_get_all($sql);

        return count($rows);
    }

    function getAllCommentByArticleId($articleId)
    {
    	$sql = "SELECT comment,date,username FROM `{$this->table}` AS c JOIN `users` AS u 
				ON c.user_id=u.id JOIN articles AS a ON a.id=c.article_id
    			WHERE c.article_id = " . esc($articleId);

        return db_get_all($sql);
    }

    public function addToComment($postData) {
        $postData['date'] = date("Y-m-d");
        
        return db_insert($this->table, $postData);
    }
}

