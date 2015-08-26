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
    	$sql = "SELECT comment,date,name FROM `{$this->table}` AS c INNER JOIN `users` AS u 
				ON c.user_id=u.id
    			WHERE `article_id` = " . esc($articleId);

        return db_get_all($sql);
    }
}

