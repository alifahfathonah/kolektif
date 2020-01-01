
<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<div class="table-rep-plugin">
					<div class="table-responsive b-0" data-pattern="priority-columns">
						<?php serializeTable($model, [
							'columns' => [
								'name',
								'vendor',
								'state'
                            ],
                            'uri' => [
                                'activate' => $controllerId,
                                'detail' => $controllerId.'/podetails',
                            ],
                            'action' => ['detail', 'activate'],
                            'btn_condition' => ['activate' => 'state']
						]) ?>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- end col -->
</div>