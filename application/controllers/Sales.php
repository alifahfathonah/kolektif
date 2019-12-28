<?php 
class Sales extends Controller 
{
	public $models = ['ProductModel', 'UomModel', 'Upload']; 
	public function productlist()
	{
		$model = new ProductModel();
		$model->select(['product.*', 'uom.name as uom']);
		$model->joinWith('uom', 'uom.id = product.uom_id');
		$dataProvider = $model->findAll();
		$this->render('sales/index', [
			'model' => $dataProvider,
		]);
	}
}