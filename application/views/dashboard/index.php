<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<button class="btn ab-blue">Button</button> <br><br>
				<div class="table-rep-plugin">
					<div class="table-responsive b-0" data-pattern="priority-columns">
						<?php serializeTable($model, [
							'columns' => [
								'nama',
								'status'
							],
							'uri' => $controllerId
						]) ?>
					</div>

				</div>

			</div>
		</div>
	</div> <!-- end col -->
</div>
