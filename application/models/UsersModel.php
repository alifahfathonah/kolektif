<?php 
class UsersModel extends Models 
{
	public $tableName = 'users';
	public $columns = [
		['field' => 'name','type' => 'string'],
		['field' => 'username','type' => 'string'],
		['field' => 'password','type' => 'string'],
		['field' => 'role','type' => 'int'],
		['field' => 'created_date','type' => 'string'],
		['field' => 'updated_date','type' => 'string']
	];
	public $primaryKey = 'id'; 
} 