<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<?php count($model->errors)>0 ? d($model->errors) : ''?>
				<?php echo $model->serializeForm([
					'columns' => [
						[
							'field' => 'product_id', 
							'inputType' => 'dropdown', 
							'label' => 'Product',
							'content' => $product_list,
						],
						'qty',
						'discount'
					]
				]) ?>
				
			</div>
		</div>
	</div> <!-- end col -->
</div>