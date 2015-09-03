<?php

class Article extends Model {
    public $table = 'articles';
    public $primary_key = 'id';

    public function getAllDesc($limit) {
        $sql = "SELECT id,title FROM `{$this->table}` ORDER BY date_up desc LIMIT {$limit}";
        
        return db_get_all($sql);
    }

    public function getAllBy($field, $value)
    {
    	$sql = "SELECT * FROM `{$this->table}` WHERE {$field}= {$value}";
        
        return db_get_all($sql);
    }

    public function getTagsBy($article_id)
    {
        $sql = "SELECT tags FROM `{$this->table}` WHERE id= {$article_id}";
        
        return db_get_all($sql)[0];
    }

    public function getTagIdBy($tag_name)
    {
        $sql = "SELECT id FROM `tags` WHERE name= '{$tag_name}'";
        
        return db_get_all($sql)[0];
    }

    public function getArticleIdBy($tag_id)
    {
        $sql = "SELECT article_id FROM `articles_tags` WHERE tag_id= {$tag_id}";
        
        return db_get_all($sql);
    }
}

