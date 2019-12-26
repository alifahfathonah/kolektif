<?php 
class BusinessFieldModel extends Models 
{
	public $tableName = 'business_field';
	public $columns = [
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string'],
		['field' => 'name','type' => 'string']
	];
	public $primaryKey = 'id'; 
} 