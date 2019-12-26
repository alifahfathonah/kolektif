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
>>>>>>> db32f3891ca0c90341d60d5d3190e07b7aecedea
		['field' => 'name','type' => 'string'],
		['field' => 'contact','type' => 'string'],
		['field' => 'address','type' => 'string']
	];
	public $primaryKey = 'id'; 
} 