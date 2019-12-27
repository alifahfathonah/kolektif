<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<?php count($model->errors)>0 ? d($model->errors) : ''?>
				<?php
                echo $model->serializeForm([
                    'columns' => [
						[
							'field' => 'image',
							'inputType' => 'image'
						],
						[
							'field' => 'product_sku',
							'inputType' => 'readonly'
						],
						[
							'field' => 'product_name',
							'inputType' => 'readonly'
						],
						[
							'field' => 'description',
							'inputType' => 'readonly'
						],
						[
							'field' => 'on_hand',
							'inputType' => 'readonly'
						],
						
						'retail_price',
                    ]
                ])
                 ?>
			</div>
		</div>
	</div> <!-- end col -->
</div>