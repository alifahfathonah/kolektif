<?php 
class QueuesModel extends Models 
{
	public $tableName = 'queues';
	public $columns = [
		['field' => 'operator','type' => 'int'],
		['field' => 'number','type' => 'int'],
		['field' => 'time','type' => 'string']
	];
	public $primaryKey = 'id'; 
} 