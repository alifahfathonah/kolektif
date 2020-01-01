<?php 
class PayrollModel extends Models 
{
	public $tableName = 'payroll';
	public $columns = [
		['field' => 'name','type' => 'string'],
		['field' => 'address','type' => 'string'],
		['field' => 'position','type' => 'string'],
		['field' => 'grade','type' => 'string'],
		['field' => 'basic_pay','type' => 'string'],
		['field' => 'tax','type' => 'string'],
		['field' => 'gross_pay','type' => 'string'],
		['field' => 'net_pay','type' => 'string'],
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string']
	];
	public $primaryKey = 'id'; 
} 