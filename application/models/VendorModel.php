<?php 
class VendorModel extends Models 
{
	public $tableName = 'vendor';
	public $columns = [
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string'],
		['field' => 'name','type' => 'string'],
		['field' => 'field_id','type' => 'int'],
		['field' => 'npwp','type' => 'string'],
		['field' => 'contact','type' => 'string'],
		['field' => 'account_number','type' => 'string'],
		['field' => 'address','type' => 'string'],
		['field' => 'attachment','type' => 'string']
	];
	public $nullable = ['field_id', 'attachment'];
	public $primaryKey = 'id'; 
} 