<?php 
class UomModel extends Models 
{
	public $tableName = 'uom';
	public $columns = [
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string'],
		['field' => 'name','type' => 'string']
	];
	public $primaryKey = 'id'; 
} 