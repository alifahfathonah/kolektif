
<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
                <a href="<?php echo base_url($controllerId) ?>/create/<?=$type?>" class="btn ab-blue"><span class="fa fa-plus"></span> New <?=$type==1?'Vendor':'Customer'?></a>
				<div class="table-rep-plugin">
					<div class="table-responsive b-0" data-pattern="priority-columns">
						<?php serializeTable($model, [
							'columns' => [
                                'name',
                                'address',
                                'email',
                                'phone',
                                'bank_name',
								[
									'label' => 'Bank Account',
									'attribute' => 'account_number'
								],
                                'npwp',
								'bussiness_field'
							],
							'uri' => $controllerId,
						]) ?>
					</div>

				</div>

			</div>
		</div>
	</div> <!-- end col -->
</div>
