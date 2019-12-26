<?php 
class CustomerModel extends Models 
{
	public $tableName = 'customer';
	public $columns = [
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string'],
		['field' => 'name','type' => 'string'],
		['field' => 'contact','type' => 'string'],
		['field' => 'address','type' => 'string']
	];
	public $primaryKey = 'id'; 
} 