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
							'field' => 'customer_id', 
							'inputType' => 'dropdown', 
							'label' => 'Invoiced to',
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
					'btn_text' => 'Save as Draft',
					'btn_position' => 'top'
				]) ?>
				
				<br />
				<div class="table-rep-plugin">
					<div data-pattern="priority-columns">
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
										($model->data->state==0) ? $SoLineModel->serializeForm([
											'useLabel' => false,
											'action' => base_url().'/soline/create/'.$model->_id,
											'isInline' => true,
											'columns' => [
												[
													'field' => 'product_id', 
													'inputType' => 'dropdown', 
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
								<tr id="edit_<?=$value->id?>">
									<td><?=$index++?></td>
									<td><?=$value->so_name?></td>
									<td><?=$value->product_name?></td>
									<td class="polineQty"><?=$value->qty?></td>
									<td>
										<?= form_open(base_url('soline/delete')) ?>
										<input type="hidden" name="delete_id" value="<?=$value->id?>">
										<button class="action-btn ab-pink deleteBtn" type="submit"><i class="fa fa-trash"></i></button>
										<?= form_close() ?>
									</td>
								</tr>
								<?php } ?>
								<tr>
									<td colspan="4"><h3>Grand Total</h3></td>
									<td>
										<?php echo 'Rp. '.number_format($sum, 0, ); ?>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- end col -->
</div>
