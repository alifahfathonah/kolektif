<?php 
class UomModel extends Models 
{
	public $tableName = 'uom';
	public $columns = [
		['field' => 'create_date','type' => 'string'],
		['field' => 'update_date','type' => 'string'],
		['field' => 'name','type' => 'string']
	];
	public $primaryKey = 'id'; 
} 