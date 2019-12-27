<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<?php count($model->errors)>0 ? d($model->errors) : ''?>
				<?php echo $model->serializeForm([
					'grid' => 'col-md-6',
					'formOptions' => 'id="formPosSo"',
                    'columns' => [
						[
							'field' => 'vendor_id', 
							'inputType' => 'dropdown', 
							'label' => 'Billed to',
							'content' => $dropdown_list,
                        ],
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
					'btn_text' => 'Proceed Purchase Order',
					'btn_position' => 'top'
				]) ?>
				
				<br />
				<div class="table-rep-plugin">
					<div class="table-responsive" data-pattern="priority-columns">
						<!-- <?php serializeTable($line, [
							'rowForm' => true,
							'columns' => [
								'po_name',
								'product_name',
								'qty'
							],
							'uri' => 'poline',
						]) ?> -->
						<table class="table table-hover">
							<thead>
								<tr>
									<th style="width: 70px">No</th>
									<th>Po Name</th>
									<th>Product Name</th>
									<th>Qty</th>
									<th style="width: 100px"></th>

								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td></td>
									<?=
										($model->data->state==0) ? $PoLineModel->serializeForm([
											'useLabel' => false,
											'action' => base_url().'/poline/create/'.$model->_id,
											'isInline' => true,
											'columns' => [
												[
													'field' => 'product_id', 
													'inputType' => 'reg_dropdown', 
													'label' => 'Product',
													'content' => $product_list,
												],
												'qty'
											]
									]) : null
									?>
								</tr>
								<?php $index = 1; ?>
								<?php foreach($line as $key => $value){ ?>
								<tr>
									<td><?=$index?></td>
									<td><?=$value->po_name?></td>
									<td><?=$value->product_name?></td>
									<td><?=$value->qty?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- end col -->
</div>
