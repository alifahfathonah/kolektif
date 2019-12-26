<?php 
class SoLineModel extends Models 
{
	public $tableName = 'so_line';
	public $columns = [
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string'],
		['field' => 'sale_id','type' => 'int'],
		['field' => 'discount','type' => 'string'],
		['field' => 'product_id','type' => 'int'],
		['field' => 'qty','type' => 'int']
	];
	public $primaryKey = 'id'; 
} 