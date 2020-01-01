<?php 
class Payroll extends Controller 
{
	public $models = ['PayrollModel']; 
	public function index()
	{
		$model = new PayrollModel();
		$model->select(['payroll.*']);
		$dataProvider = $model->findAll();
		$this->render('payroll/index', [
			'model' => $dataProvider,
		]);
	}

	public function delete()
	{
		$id = $this->input->post('delete_id');
		$model = new PayrollModel($id);
		try {
			$model->remove();
			// redirect($this->controllerId.'/index/'.$type);
			redirect($_SERVER['HTTP_REFERER']);
		} catch (\Throwable $th) {
			dd($model->errors);
		}
	}

	public function create()
	{
		$model = new PayrollModel();
		
		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			if ($model->validate()) {
				$model->insert();
				redirect($this->controllerId.'/index');
			}
		}
		$this->render('payroll/form', [
			'model' => $model,
			
		]);
		
	}
	public function edit($id)
	{
		$model = new PayrollModel($id);
		
		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			
			
			if ($model->validate()) {
				$model->update();
				redirect($this->controllerId.'/index');
			}
		}
		$this->render('payroll/form', [
			'model' => $model,
			
		]);
		
	}
} 