<?php

/**
* 
*/
class Payment extends Model
{
	public $table = 'payments';
    public $primary_key = 'id';

	public function addPayment($title, $number, $price)
    {
        $data['date_book'] = date("Y-m-d");
        $data['title'] = $title;
        $data['number'] = $number;
        $data['bill'] = $price;
        $data['user_id'] = $_SESSION['logged']['id'];
        $data['status'] = 'chờ xét duyệt...';

        return db_insert($this->table, $data);
    }

    public function getAllByUserId($user_id)
    {
        $sql = "SELECT * FROM `{$this->table}` WHERE user_id= {$user_id}";
        
        return db_get_all($sql);
    }
}