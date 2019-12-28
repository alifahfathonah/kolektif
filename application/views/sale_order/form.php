<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<?php
				count($model->errors)>0 ? d($model->errors) : ''?>
				<?php echo $model->serializeForm([
					'grid' => 'col-md-6',
					'formOptions' => 'id="formPosSo"',
					'columns' => [
						[
							'field' => 'customer_id', 
							'inputType' => 'dropdown', 
							'label' => 'vendor',
							'content' => $dropdown_list,
						].
                        [
                            'field' => 'name',
                            'label' => 'PO Number',
                            'inputType' => 'inline'
						],
                        [
							'field' => 'state',
							'label' => 'Proses Purhcase Order?',
							'inputType' => 'checkbox',
							'options' => 'id="state"'
                        ]
					],
					'btn_text' => 'Save as Draft',
					'btn_position' => 'top'
				]) ?>
				<br/>
				<a href="<?php echo base_url() ?>soline/create/<?php echo $model->_id ?>" class="btn ab-blue"><span class="fa fa-plus"></span> New Line</a>
				<div class="table-rep-plugin">
					<div class="table-responsive b-0" data-pattern="priority-columns">
						<?php serializeTable($line, [
							'columns' => [
								'so_name',
								'product_name',
								'qty',
								'product_price',
								'nilai_baru'
							],
							'uri' => 'soline',

						]);

echo 'Total= Rp. '.$sum;
						 ?>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- end col -->
</div>