<?php 
class KwitansiModel extends Models 
{
	public $tableName = 'kwitansi';
	public $columns = [
		['field' => 'create_date','type' => 'string'],
		['field' => 'update_date','type' => 'string'],
		['field' => 'source_id','type' => 'int'],
		['field' => 'is_bill','type' => 'string'],
		['field' => 'file','type' => 'string'],
		['field' => 'price','type' => 'string'],
		['field' => 'discount','type' => 'string'],
		['field' => 'tax','type' => 'string'],
		['field' => 'final_price','type' => 'string'],
		['field' => 'state','type' => 'int']
	];
	public $primaryKey = 'id'; 
} 