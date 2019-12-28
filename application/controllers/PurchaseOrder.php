<?php 
class PurchaseOrder extends Controller 
{
	public $models = ['PurchaseOrderModel', 'VendorModel', 'PoLineModel']; 
	public function index()
	{
		$model = new PurchaseOrderModel();
		$model->select(['purchase_order.*', 'vendor.name as vendor']);
		$model->joinWith('vendor', 'vendor.id = purchase_order.vendor_id', 'left');
		$model->orderBy(['id' => 'desc']);
		$dataProvider = $model->findAll();
		foreach ($dataProvider as $key => $value) {
			$value->state = isset($value->state) ? $value->state : 0;
			$value->state = getState($value->state);
		}
		$this->render('purchase_order/index', [
			'model' => $dataProvider,
		]);
	}

	public function delete()
	{
		$id = $this->input->post('delete_id');
		$model = new PurchaseOrderModel($id);
		try {
			$model->remove();
			redirect($_SERVER['HTTP_REFERER']);
		} catch (\Throwable $th) {
			dd($model->errors);
		}
	}

	public function create()
	{
		$model = new PurchaseOrderModel();
		$prev_po = $model->rawQuery('select id from purchase_order order by id desc limit 1');
		$model->data->name = 'PO/'.$prev_po[0]->id;
		if ($this->input->post()== null) {
			$model->insert();
			$model = new PurchaseOrderModel($model->newValue['id']);
		} else {
			$model = new PurchaseOrderModel($prev_po[0]->id);
		}
		$vendor = new VendorModel();
		$dropdown_list = $vendor->getListForDropdown();

		$line = new PoLineModel();
		$line->select(['po_line.*', 'purchase_order.name as po_name', 'product.name as product_name']);
		$line->joinWith('purchase_order', 'purchase_order.id = po_line.purchase_id');
		$line->joinWith('product', 'product.id = po_line.product_id');
		$line->where('po_line.purchase_id',$model->_id);
		$dataProvider = $line->findAll();
		
		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			$model->data->state = 1;
			if ($model->validate()) {
				$model->update();
				redirect($this->controllerId.'/index');
			}
		}
		$this->render('purchase_order/form', [
			'model' => $model,
			'dropdown_list' => $dropdown_list,
			'line' => $dataProvider
		]);
		
	}
	public function edit($id)
	{
		$model = new PurchaseOrderModel($id);
		$vendor = new VendorModel();
		$dropdown_list = $vendor->getListForDropdown();
		
		$line = new PoLineModel();
		$line->select(['po_line.*', 'purchase_order.name as po_name', 'product.name as product_name']);
		$line->joinWith('purchase_order', 'purchase_order.id = po_line.purchase_id');
		$line->joinWith('product', 'product.id = po_line.product_id');
		$line->where('po_line.purchase_id',$id);
		$dataProvider = $line->findAll();
		$harga=$dataProvider->product_name;

		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			$model->data->state = 1;
			if ($model->validate()) {
				$model->update();
				redirect($this->controllerId.'/index');
			}
		}
		$this->render('purchase_order/form', [
			'model' => $model,
			'dropdown_list' => $dropdown_list,
			'line' => $dataProvider
		]);
		
	}
} 