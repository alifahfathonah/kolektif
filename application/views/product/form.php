<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<?php count($model->errors)>0 ? d($model->errors) : ''?>
				<?php echo $model->serializeForm([
                    'columns' => [
						'product_sku',
                        'product_name',
						'description',
						['field' => 'image', 'inputType' => 'file'],
						'brand',
						[
							'field' => 'uom_id', 
							'inputType' => 'dropdown', 
							'label' => 'UoM',
							'content' => $dropdown_list,
						],
						'on_hand',
                    ]
                ]) ?>
			</div>
		</div>
	</div> <!-- end col -->
</div>