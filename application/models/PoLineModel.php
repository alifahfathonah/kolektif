<?php 
class PoLineModel extends Models 
{
	public $tableName = 'po_line';
	public $columns = [
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string'],
		['field' => 'purchase_id','type' => 'int'],
		['field' => 'product_id','type' => 'int'],
		['field' => 'qty','type' => 'int']
	];
	public $primaryKey = 'id'; 
} 