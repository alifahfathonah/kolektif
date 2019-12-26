<?php 
class SoLineModel extends Models 
{
	public $tableName = 'so_line';
	public $columns = [
		['field' => 'create_date','type' => 'string'],
		['field' => 'update_date','type' => 'string'],
		['field' => 'sale_id','type' => 'int'],
		['field' => 'discount','type' => 'string'],
		['field' => 'product_id','type' => 'int'],
		['field' => 'qty','type' => 'int']
	];
	public $primaryKey = 'id'; 
} 