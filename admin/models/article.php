<?php

class Article {
    
    public function getAll() {
        $first_day_this_month = date("Y-m-d", strtotime('first day of this month'));
        $first_day_next_month = date("Y-m-d", strtotime('first day of next month'));
        
        $sql = "SELECT title,description,date,name FROM articles as a  INNER JOIN categories as c
                ON a.category_id=c.id
                WHERE   `date` >= '" . $first_day_this_month  . "'
                        AND `date` < '" . $first_day_next_month  . "'";
        
        return db_get_all($sql);
    }
    
    public function addArticle($postData) {
        $postData['date'] = date("Y-m-d H:i:s");
        
        return db_insert($this->table, $postData);
    }
}
