<?php

class Payment extends Model {
    public $table = 'payments';
    public $primary_key = 'id';
    
    public function getAll() {  
        $first_day_this_month = date("Y-m-d", strtotime('first day of this month'));
        $first_day_next_month = date("Y-m-d", strtotime('first day of next month'));      
        $sql = "SELECT p.id,bill,fullname,title,date_book,number,status FROM `{$this->table}` as p  LEFT JOIN users as u
                ON p.user_id=u.id 
                WHERE   `date_book` >= '" . $first_day_this_month  . "'
                        AND `date_book` < '" . $first_day_next_month  . "'";
        
        return db_get_all($sql);
    }

    public function deleteById($payment_id)
    {
        return db_delete($this->table,'id='.$payment_id);
    }

    public function updateById($postData, $payment_id) {   
        return db_update($this->table, $postData, 'id='.$payment_id);
    }

    public function getAllBy($payment_id)
    {
    	$sql = "SELECT p.id,bill,fullname,title,date_book,number,status FROM `{$this->table}` as p  JOIN users as u
                ON p.user_id=u.id 
                WHERE p.id={$payment_id}";

    	return db_get_all($sql)[0];
    }
}