<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<?php echo $model->serializeForm([
                    'columns' => [
                        [
                            'field' => 'vendor_id',
                            'inputType' => 'dropdown',
                            'content' => $vendor
                        ],
                        [
                            'field' => 'product_id',
                            'inputType' => 'dropdown',
                            'content' => $product,
                            'class' => 'product_list'
                        ],
                        [
                            'field' => 'add',
                            'label' => 'Add Product',
                            'inputType' => 'button',
                            'options' => 'id="addProduct"'
                        ]
                    ]
                ]) ?>
			</div>
		</div>
	</div> <!-- end col -->
</div>
