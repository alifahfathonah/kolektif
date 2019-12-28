<?php 
class CustomerModel extends Models 
{
	public $tableName = 'customer';
	public $columns = [
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string'],

		['field' => 'name','type' => 'string'],
		['field' => 'company_status','type' => 'string'],
		['field' => 'email','type' => 'string'],
		['field' => 'npwp','type' => 'string'],
		['field' => 'no_hp','type' => 'string'],
		['field' => 'fax','type' => 'string'],
		['field' => 'image','type' => 'string'],
		['field' => 'address','type' => 'string']
	];
	public $primaryKey = 'id'; 
} 