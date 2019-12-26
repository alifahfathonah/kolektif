<?php 
class CustomerModel extends Models 
{
	public $tableName = 'customer';
	public $columns = [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
		['field' => 'create_date','type' => 'string'],
		['field' => 'update_date','type' => 'string'],
=======
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string'],
>>>>>>> 1d05faaaa4a48a1720c09d4c03f54d572136c6d7
=======
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string'],
>>>>>>> ede00bbdebb2c51b0514ae9484fa781e21e43be0
=======
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string'],
>>>>>>> 7d6aa8c25dcfb6fd0f4111f17cb5b383cd759bfa
		['field' => 'name','type' => 'string'],
		['field' => 'contact','type' => 'string'],
		['field' => 'address','type' => 'string']
	];
	public $primaryKey = 'id'; 
} 