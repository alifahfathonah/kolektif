<?php 
class ResPartnerModel extends Models 
{
	public $tableName = 'res_partner';
	public $columns = [
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string'],
		['field' => 'name','type' => 'string'],
		['field' => 'address','type' => 'string'],
		['field' => 'email','type' => 'string'],
		['field' => 'phone','type' => 'string'],
		['field' => 'type','type' => 'int'],
		['field' => 'bank_name','type' => 'string'],
		['field' => 'account_number','type' => 'string'],
		['field' => 'npwp','type' => 'string'],
		['field' => 'field_id','type' => 'int'],
		['field' => 'attachment','type' => 'string'],
	];
	public $primaryKey = 'id'; 
} 