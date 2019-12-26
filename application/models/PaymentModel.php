<?php 
class PaymentModel extends Models 
{
	public $tableName = 'payment';
	public $columns = [
		['field' => 'create_date','type' => 'string'],
		['field' => 'update_date','type' => 'string'],
		['field' => 'kwitansi_id','type' => 'int'],
		['field' => 'name','type' => 'string'],
		['field' => 'file','type' => 'string']
	];
	public $primaryKey = 'id'; 
} 