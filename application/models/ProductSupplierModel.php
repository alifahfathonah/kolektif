<?php 
class ProductSupplierModel extends Models 
{
	public $tableName = 'product_supplier';
	public $columns = [
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string'],
		['field' => 'product_id','type' => 'int'],
		['field' => 'partner_id','type' => 'int'],
		['field' => 'price','type' => 'int']
	];
	public $primaryKey = 'id'; 
} 