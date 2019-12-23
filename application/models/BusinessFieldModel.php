<?php 
class BusinessFieldModel extends Models 
{
	public $tableName = 'business_field';
	public $columns = [
		['field' => 'create_date','type' => 'string'],
		['field' => 'update_date','type' => 'string'],
		['field' => 'name','type' => 'string']
	];
	public $primaryKey = 'id'; 

} 