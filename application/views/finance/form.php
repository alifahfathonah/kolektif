<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<?php count($model->errors)>0 ? d($model->errors) : ''?>
				<?php echo $model->serializeForm1([
                    'columns' => [
						'product_sku',
                        'product_name',
						'description',
						
						'on_hand',
                    ]
                ]);
                echo $model->serializeForm([
                    'columns' => [
						'product_sku',
                        'product_name',
						'description',
						
						'on_hand',
                    ]
                ])
                 ?>
			</div>
		</div>
	</div> <!-- end col -->
</div>