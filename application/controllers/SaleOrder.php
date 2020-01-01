<?php 
class SaleOrder extends Controller 
{
	public $models = ['SaleOrderModel', 'CustomerModel', 'SoLineModel','PurchaseOrderModel','CustomerModel','PoLineModel','productModel']; 
	public function index()
	{
		$model = new SaleOrderModel();
		$model->select(['sale_order.*', 'customer.name as customer']);
		$model->joinWith('customer', 'customer.id = sale_order.customer_id', 'left');
		$model->orderBy(['id' => 'desc']);
		$dataProvider = $model->findAll();
		foreach ($dataProvider as $key => $value) {
			$value->state = isset($value->state) ? $value->state : 0;
			$value->state = getState($value->state);
		}
		$this->render('sale_order/index', [
			'model' => $dataProvider,
		]);
	}

	public function delete()
	{
		$id = $this->input->post('delete_id');
		$model = new SaleOrderModel($id);
		try {
			$model->remove();
			redirect($_SERVER['HTTP_REFERER']);
		} catch (\Throwable $th) {
			dd($model->errors);
		}
	}

	public function create()
	{
		$model = new SaleOrderModel();
		$prev_po = $model->rawQuery('select id from sale_order order by id desc limit 1');
		$model->data->name = 'SO/'.$prev_po[0]->id;
		if ($this->input->post()== null) {
			$model->insert();
			$model = new SaleOrderModel($model->newValue['id']);
		} else {
			$model = new SaleOrderModel($prev_po[0]->id);
		}
		$vendor = new CustomerModel();
		$dropdown_list = $vendor->getListForDropdown();

		$line = new SoLineModel();
		$line->select(['so_line.*', 'sale_order.name as so_name', 'product.name as product_name', 'product.retail_price as product_price']);
		$line->joinWith('sale_order', 'sale_order.id = so_line.sale_id');
		$line->joinWith('product', 'product.id = so_line.product_id');
		$line->where('so_line.sale_id',$model->_id);

		$dataProvider = $line->findAll();
		$sum_price=0;
		$total_diskon=0;
		foreach($dataProvider as $key => $value){
		$value->sub_harga=$value->product_price*$value->qty;
		$value->harga=$value->sub_harga-($value->sub_harga*$value->discount/100);
		$jumlah_diskon=$value->sub_harga*$value->discount/100;
		$total_diskon += $jumlah_diskon;
		$sum_price += $value->sub_harga;
	}
	$pajak=($sum_price-$total_diskon)*10/100;
	$total=$sum_price-$total_diskon+$pajak;
	
		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			$model->data->state = 1;
			$model->data->total_price=$total;
			if ($model->validate()) {
				$model->update();
				redirect($this->controllerId.'/index');
			}
		}
		$this->render('sale_order/form', [
			'model' => $model,
			'dropdown_list' => $dropdown_list,
			'line' => $dataProvider,
			'sum'=>$sum_price
		]);
		
		
	}
	public function edit($id)
	{
		$model = new SaleOrderModel($id);
		$customer = new CustomerModel();
		$dropdown_list = $customer->getListForDropdown();
		
		$line = new SoLineModel();
		$line->select(['so_line.*', 'sale_order.name as so_name', 'product.name as product_name', 'product.retail_price as product_price']);
		$line->joinWith('sale_order', 'sale_order.id = so_line.sale_id');
		$line->joinWith('product', 'product.id = so_line.product_id');
		$line->where('so_line.sale_id',$id);
		$dataProvider = $line->findAll();
			$sum_price=0;
		$total_diskon=0;
		foreach($dataProvider as $key => $value){
		
		$value->sub_harga=$value->product_price*$value->qty;
		$value->harga=$value->sub_harga-($value->sub_harga*$value->discount/100);
		$jumlah_diskon=$value->sub_harga*$value->discount/100;
		$total_diskon += $jumlah_diskon;
		$sum_price += $value->sub_harga;


	}
	$pajak=($sum_price-$total_diskon)*10/100;
	$total=$sum_price-$total_diskon+$pajak;

		if ($this->input->post()!= null) {
			$model->setAttributes($this->input->post());
			$model->data->state = 1;

			$model->data->total_price=$total;
			if ($model->validate()) {
				$model->update();
				redirect($this->controllerId.'/index');
			}
		}
		$this->render('sale_order/form', [
			'model' => $model,
			'dropdown_list' => $dropdown_list,
			'line' => $dataProvider,
			'sum' =>$sum_price,
			'total_diskon' =>$total_diskon,
			'total' =>$total,
			'pajak'=>$pajak,

		]);
		
	}
} 