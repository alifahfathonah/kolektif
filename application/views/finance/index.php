
<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
               
				<div class="table-rep-plugin">
					<div class="table-responsive b-0" data-pattern="priority-columns">
						<?php 
						serializeTable1($model, [
							'columns' => [
								'product_sku',
								'product_name',
								'description',
                                [
									'attribute' => 'image',
									'label' => 'Image',
									'template' => '<img style="width: 100px" src="'.base_url('uploads/').'{value}">'
								],
                                'brand',
								'uom_id',
								'on_hand',

							],
							'uri' => $controllerId,
						]) ?>
					</div>

				</div>

			</div>
		</div>
	</div> <!-- end col -->
</div>
