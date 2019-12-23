<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<?php count($model->errors)>0 ? d($model->errors) : ''?>
				<?php echo $model->serializeForm([
					'columns' => [
						'name', 'npwp', 'contact', 'account_number', 'address', 
						[
							'field' => 'field_id', 
							'inputType' => 'dropdown', 
							'label' => 'Field',
							'content' => [			//content dropdown
								['label' => 'Pilihan 1', 'value' => 1],
								['label' => 'Pilihan 2', 'value' => 2],
								['label' => 'Pilihan 3', 'value' => 3],
								['label' => 'Pilihan 4', 'value' => 4],
								['label' => 'Pilihan 5', 'value' => 5],
							],
						],
						['field' => 'attachment', 'inputType' => 'file']]
				]) ?>
			</div>
		</div>
	</div> <!-- end col -->
</div>
