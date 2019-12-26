<?php 
class ProductTemplateModel extends Models 
{
	public $tableName = 'product_template';
	public $columns = [
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string'],
		['field' => 'name','type' => 'string'],
		['field' => 'default_code','type' => 'string'],
		['field' => 'list_price','type' => 'string'],
		['field' => 'standard_price','type' => 'string'],
		['field' => 'image','type' => 'string'],
		['field' => 'brand','type' => 'string'],
		['field' => 'uom_id','type' => 'int'],
		['field' => 'on_hand','type' => 'string'],
		['field' => 'description','type' => 'string']
	];
	public $primaryKey = 'id'; 
} 