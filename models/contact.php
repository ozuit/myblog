<?php

/**
* 
*/
class Contact extends Model
{
	public $table = 'contact';
    public $primary_key = 'id';
	function addToContact($postData)
	{
		return db_insert($this->table, $postData);
	}
}