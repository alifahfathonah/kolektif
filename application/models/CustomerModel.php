<?php 
class CustomerModel extends Models 
{
	public $tableName = 'customer';
	public $columns = [
<<<<<<< HEAD
		['field' => 'create_date','type' => 'string'],
		['field' => 'update_date','type' => 'string'],
=======
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string'],
>>>>>>> 1d05faaaa4a48a1720c09d4c03f54d572136c6d7
		['field' => 'name','type' => 'string'],
		['field' => 'contact','type' => 'string'],
		['field' => 'address','type' => 'string']
	];
	public $primaryKey = 'id'; 
} 