<?php 
class Product extends Controller 
{
	public $models = ['ProductModel']; 
	public function index()
	{
		echo 'hello Product';
	}
} 