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
							'content' => $dropdown_list,
						],
						['field' => 'attachment', 'inputType' => 'file']]
				]) ?>
			</div>
		</div>
	</div> <!-- end col -->
</div>