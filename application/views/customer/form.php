<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<?php count($model->errors)>0 ? d($model->errors) : ''?>
				<?php echo $model->serializeForm([
                    'columns' => [
                        'name', 
                        'address', 
                        'company_status',
                        'npwp',
                        'email',
                        'no_hp',
                        'fax',
                        ['field' => 'image', 'inputType' => 'file'],
                    ]
                ]) ?>
			</div>
		</div>
	</div> <!-- end col -->
</div>