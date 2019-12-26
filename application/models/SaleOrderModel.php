<?php 
class SaleOrderModel extends Models 
{
	public $tableName = 'sale_order';
	public $columns = [
		['field' => 'create_date','type' => 'string'],
		['field' => 'update_date','type' => 'string'],
		['field' => 'customer_id','type' => 'int'],
		['field' => 'total_price','type' => 'string'],
		['field' => 'state','type' => 'int']
	];
	public $primaryKey = 'id'; 
} 