<?php 
class BusinessField extends Controller 
{
	public $models = ['BusinessFieldModel']; 
	public function index()
	{
		$model = new BusinessFieldModel();
		$dataProvider = $model->findAll();
		$this->render('business_field/index', [
			'model' => $dataProvider,
		]);
	}
} 