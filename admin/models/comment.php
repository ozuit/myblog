<?php

class Comment extends Model {

    public $table = 'comments';

    public function getAll() {        
        $sql = "SELECT c.id,title,date,comment,username FROM `{$this->table}` as c  JOIN articles as a 
                
				ON c.article_id=a.id JOIN users as u ON c.user_id=u.id";
        
        return db_get_all($sql);
    }

    public function deleteById($comment_id) {

        return db_delete($this->table,'id='.$comment_id);
    }
}
