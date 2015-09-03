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
        //Lấy id của bài viết vừa mới thêm vào
        $article_id = db_insert($this->table, $postData);
        //Cắt chuổi tags đưa vào mảng
        $arrTags = explode(",", $postData['tags']);
        //Duyệt từng phần tử của Tags
        foreach ($arrTags as $tag)
        {
            $tag = trim($tag);
            //Lấy id của tag có tên là $tag, nếu ko có thì thêm mới
            $result = mysql_query("SELECT id from tags where name= '{$tag}' limit 1");

            if (mysql_num_rows($result) > 0)
            {
                $idTag = mysql_result($result, 0, 0);
            }
            else
            {
                mysql_query("INSERT into tags(name) values ('{$tag}')");
                $idTag = mysql_insert_id();
            }
            //Insert dữ liệu vào table Articles_Tags
            mysql_query("INSERT into articles_tags(article_id,tag_id) values ({$article_id}, {$idTag})");
        }
        return true;
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
        //Giả sử id của bài viết đang sửa là: $article_id;
        //Delete dữ liệu bên table Articles_Tags
        mysql_query("DELETE FROM articles_tags where article_id = {$article_id}");     
        //Update bài viết
        db_update($this->table, $postData, 'id='.$article_id);
        //Cắt chuổi tags đưa vào mảng
        $arrTags = explode(",", $postData['tags']);
        //Duyệt từng phần tử của Tags
        foreach ($arrTags as $tag)
        {
            $tag = trim($tag);
            //Lấy id của tag có tên là $tag, nếu ko có thì thêm mới
            $result = mysql_query("SELECT id from tags where name= '{$tag}' limit 1");

            if (mysql_num_rows($result) > 0)
            {
                $idTag = mysql_result($result, 0, 0);
            }
            else
            {
                mysql_query("INSERT into tags(name) values ('{$tag}')");
                $idTag = mysql_insert_id();
            }
            //Insert dữ liệu vào table Articles_Tags
            mysql_query("INSERT into articles_tags(article_id,tag_id) values ({$article_id}, {$idTag})");
        }
        return true;
    }
}
