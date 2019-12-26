<?php 
class PaymentModel extends Models 
{
	public $tableName = 'payment';
	public $columns = [
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string'],
		['field' => 'kwitansi_id','type' => 'int'],
		['field' => 'name','type' => 'string'],
		['field' => 'file','type' => 'string']
	];
	public $primaryKey = 'id'; 
} 