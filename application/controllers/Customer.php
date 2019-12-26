<?php 
class Customer extends Controller 
{
	public $models = ['CustomerModel']; 
	public function index()
	{
		echo 'hello Customer';
	}
} 