<?php 
class Werehouse extends Controller 
{
    public $models = [
        'PurchaseOrderModel', 
        'VendorModel', 
        'PoLineModel', 
        'ProductModel', 
        'UomModel',
        'Upload'
    ]; 
    
    public function index()
    {
        
        redirect($_SERVER['HTTP_REFERER']);
    }

	public function products()
	{
		$model = new ProductModel();
		$model->select(['product.*', 'uom.name as uom']);
		$model->joinWith('uom', 'uom.id = product.uom_id');
		$dataProvider = $model->findAll();
		$this->render('product/index', [
			'model' => $dataProvider,
		]);
    }
    public function purchaseOrder()
    {
		$model = new PurchaseOrderModel();
		$model->select(['purchase_order.*', 'vendor.name as vendor']);
		$model->joinWith('vendor', 'vendor.id = purchase_order.vendor_id', 'left');
        $model->orderBy(['id' => 'desc']);
        $model->where('state !=',0);
		$model->search('purchase_order.name', $this->searchKey);
		
		$dataProvider = $model->findAll();
		foreach ($dataProvider as $key => $value) {
			$value->state = isset($value->state) ? $value->state : 0;
			$value->state = getState($value->state);
		}
		$this->render('werehouse/po_index', [
			'model' => $dataProvider,
		]);
    }
    public function activate()
    {
        $id = $this->input->post('delete_id');
        $model = new PurchaseOrderModel($id);
        $model->data->state = 2;
        $model->update();
        redirect($_SERVER['HTTP_REFERER']);
    }
	public function podetails($id)
	{
		$model = new PurchaseOrderModel($id);
		$vendor = new VendorModel();
		$dropdown_list = $vendor->getListForDropdown();
		$product = new ProductModel();
		$product_list = $product->getListForDropdown();
		
		$line = new PoLineModel();
		$line->select(['po_line.*', 'purchase_order.name as po_name', 'product.name as product_name']);
		$line->joinWith('purchase_order', 'purchase_order.id = po_line.purchase_id');
		$line->joinWith('product', 'product.id = po_line.product_id');
		$line->where('po_line.purchase_id',$id);
		$dataProvider = $line->findAll();

		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			$model->data->state = $model->data->state == 'on' ? 1 : 0;
			// dd($model->data);
			if ($model->validate()) {
				$model->update();
				redirect($this->controllerId.'/index');
			}
		}
		$this->render('purchase_order/advanced_form', [
			'model' => $model,
			'dropdown_list' => $dropdown_list,
			'line' => $dataProvider,
			'PoLineModel' => $line,
			'product_list' => $product_list
		]);
		
	}
}