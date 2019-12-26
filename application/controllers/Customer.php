<?php 
class Customer extends Controller 
{
	public $models = ['CustomerModel']; 
	public function index()
	{
<<<<<<< HEAD
		echo 'hello Customer';
=======
		$model = new CustomerModel();
		$dataProvider = $model->findAll();
		$this->render('customer/index', [
			'model' => $dataProvider
		]);
	}
	public function create()
	{
		$model = new CustomerModel();
		$this->render('customer/form', [
			'model' => $model
		]);
>>>>>>> db32f3891ca0c90341d60d5d3190e07b7aecedea
	}
} 