<?php 
class ProductModel extends Models 
{
	public $tableName = 'product';
	public $columns = [
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string'],
		['field' => 'product_sku','type' => 'string'],
		['field' => 'name','type' => 'string'],
		['field' => 'image','type' => 'string'],
		['field' => 'retail_price','type' => 'string'],
		['field' => 'brand','type' => 'int'],
		['field' => 'uom_id','type' => 'int'],
		['field' => 'on_hand','type' => 'int'],
		['field' => 'description','type' => 'string']
	];
	public $primaryKey = 'id';
	public $mandatory = ['name', 'uom_id'];
} 