<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<?php count($model->errors)>0 ? d($model->errors) : ''?>
				<?php echo $model->serializeForm([
					'columns' => [
                        [
							'label' => 'Product SKU',
							'field' => 'default_code'
						],
						[
							'label' => 'Product Name',
							'field' => 'name'
						],
						'description',
						[
							'label' => 'Sell Price',
							'field' => 'list_price'
						],
						[
							'label' => 'Cost Price',
							'field' => 'standard_price'
						],
						'brand',
						[
							'field' => 'uom_id', 
							'inputType' => 'dropdown', 
							'label' => 'UoM',
							'content' => $uom_list,
						],
						[
							'field' => 'vendors', 
							'inputType' => 'dropdown', 
							'label' => 'Vendors',
							'content' => $vendor_list,
						],
						[
                            'field' => 'image',
                            'inputType' => 'file',
                        ]
                    ]
				]) ?>
			</div>
		</div>
	</div> <!-- end col -->
</div>
