<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<?php count($model->errors)>0 ? d($model->errors) : ''?>
				<?php echo $model->serializeForm([
					'columns' => [
						'name',
						[
							'field' => 'vendor_id', 
							'inputType' => 'dropdown', 
							'label' => 'Vendor',
							'content' => $dropdown_list,
						]
					]
				]) ?>
				<br/>
				<a href="<?php echo base_url() ?>poline/create/<?php echo $model->_id ?>" class="btn ab-blue"><span class="fa fa-plus"></span> New Line</a>
				<div class="table-rep-plugin">
					<div class="table-responsive b-0" data-pattern="priority-columns">
						<?php serializeTable($line, [
							'columns' => [
								'po_name',
								'product_name',
								'qty'
							],
							'uri' => 'poline',
						]) ?>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- end col -->
</div>