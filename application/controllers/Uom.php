<?php 
class Uom extends Controller 
{
	public $models = ['UomModel'];

	public function index()
	{
		$model = new UomModel();
		$dataProvider = $model->findAll();
		$this->render('uom/index', [
			'model' => $dataProvider,
		]);
	}

	public function delete()
	{
		$id = $this->input->post('delete_id');
		$model = new UomModel($id);
		try {
			$model->remove();
			redirect($_SERVER['HTTP_REFERER']);
		} catch (\Throwable $th) {
			dd($model->errors);
		}
	}

	public function create()
	{
		$model = new UomModel();
		
		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			if ($model->validate()) {
				$model->insert();
				redirect($this->controllerId.'/index');
			}
		}
		$this->render('uom/form', [
			'model' => $model,
		]);
		
	}

	public function edit($id)
	{
		$model = new UomModel($id);

		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			if ($model->validate()) {
				$model->update();
				redirect($this->controllerId.'/index');
			}
		}
		$this->render('uom/form', [
			'model' => $model
		]);
		
	}
} 