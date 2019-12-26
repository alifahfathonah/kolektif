<?php 
class PurchaseOrderModel extends Models 
{
	public $tableName = 'purchase_order';
	public $columns = [
		['field' => 'create_date','type' => 'string'],
		['field' => 'update_date','type' => 'string'],
		['field' => 'name','type' => 'string'],
		['field' => 'vendor_id','type' => 'int'],
		['field' => 'state','type' => 'int']
	];
	public $primaryKey = 'id'; 
} 