
<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
                <a href="<?php echo base_url($controllerId) ?>/create" class="btn ab-blue"><span class="fa fa-plus"></span> New <?php echo $title ?></a>
				<div class="table-rep-plugin">
					<div class="table-responsive b-0" data-pattern="priority-columns">
						<?php serializeTable($model, [
							'columns' => [
								'product_name',
								'description',
<<<<<<< HEAD
                                'image',
=======
                                [
									'attribute' => 'image',
									'label' => 'Image',
									'template' => '<img style="width: 100px" src="'.base_url('uploads/').'{value}">'
								],
>>>>>>> 7d6aa8c25dcfb6fd0f4111f17cb5b383cd759bfa
                                'retail_price',
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
