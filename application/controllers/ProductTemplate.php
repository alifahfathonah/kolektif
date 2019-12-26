<?php 
class ProductTemplate extends Controller 
{
	public $models = ['ProductTemplateModel', 'ProductSupplierModel', 'ResPartnerModel', 'UomModel'];

	public function index()
	{
		$model = new ProductSupplierModel();
		$model->select(['product_template.*', 'res_partner.name as Vendors']);
		$model->joinWith('product_template', 'product_template.id = product_supplier.product_id');
		$model->joinWith('res_partner', 'res_partner.id = product_supplier.partner_id');
		$model->orderBy(['product_template.id' => 'asc']);
		$dataProvider = $model->findAll();
		$arr = [];
		if ($dataProvider != null) {
			$arr = array($dataProvider[0]);
			for ($i=1; $i < count($dataProvider); $i++) { 
				if ($dataProvider[$i]->id == $dataProvider[$i-1]->id) {
					$arr[count($arr)-1]->Vendors = '<span class="badge badge-primary">'.$arr[count($arr)-1]->Vendors.'</span> '.'<span class="badge badge-primary">'.$dataProvider[$i]->Vendors.'</span> ';
				}
				else {
					array_push($arr, $dataProvider[$i]);
				}
			}
		}
		$this->render('product_template/index', [
			'model' => $arr,
		]);
	}

	public function delete()
	{
		$id = $this->input->post('delete_id');
		$model = new ProductTemplateModel($id);
		$ps = new ProductSupplierModel();
		try {
			$ps->rawQuery('delete from product_supplier where product_id="'.$id.'"');
			$model->remove();
			redirect($_SERVER['HTTP_REFERER']);
		} catch (\Throwable $th) {
			dd($model->errors);
		}
	}

	public function create()
	{
		$model = new ProductTemplateModel();
		$vendor = new ResPartnerModel();
		$uom = new UomModel();
		$product_supplier = new ProductSupplierModel();
		$vendor->where('type', 1);
		$vendor_list = $vendor->getListForDropdown();
		$uom_list = $uom->getListForDropdown();
		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			if ($upload->save('image')) {
				$atch_name = $upload->getFileName();
			}
			else{
				$atch_name = 'this is a fucking dummy sentence';
			}
			$model->data->image = $atch_name;
			if ($model->validate()) {
				$model->insert();
				redirect($this->controllerId.'/index');
			}
		}
		$this->render('product_template/form', [
			'model' => $model,
			'vendor_list' => $vendor_list,
			'uom_list' => $uom_list
		]);
		
	}

	public function edit($id)
	{
		$model = new ResPartnerModel($id);
		$upload = new Upload();
		$bfm = new BusinessFieldModel();
		$dropdown_list = $bfm->getListForDropdown();

		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			if ($upload->save('attachment')) {
				$atch_name = $upload->getFileName();
				$model->data->attachment = $atch_name;
			}
			if ($model->validate()) {
				$model->update();
				redirect($this->controllerId.'/index/'.$model->type);
			}
		}
		$this->render('res_partner/form', [
			'model' => $model,
			'dropdown_list' => $dropdown_list
		]);
		
	}
} 