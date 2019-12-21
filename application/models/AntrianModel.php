<?php 
class AntrianModel extends Models 
{
	public $tableName = 'antrian';
	public $columns = [
		['field' => 'nama','type' => 'string'],
		['field' => 'status','type' => 'string'],
		['field' => 'posisi','type' => 'int']
	];
	public $primaryKey = 'id'; 
} 