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
                            'label' => 'SO Number',
                            'inputType' => 'inline'
						],
                        [
							'field' => 'state',
							'label' => 'Proses Sales Order?',
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
						<table class="table table-hover">
							<thead>
								<tr>
									<th style="width: 70px">No</th>
									<th style="width: 200px">Product Name</th>
									<th>Qty</th>
									<th>Product Price</th>
									<th>Sub Price</th>
									<th>Discount</th>
									<th style="width: 130px">Total Price</th>
									<th style="width: 100px"></th>

								</tr>
							</thead>
							<tbody>
								<?php $index = 1; ?>
								<?php foreach($line as $key => $value){ ?>
								<tr id="edit_<?=$value->id?>">
									<td><?=$index++?></td>
									<td><?=$value->product_name?></td>
									<td class="polineQty"><?=$value->qty?></td>
									<td><?=$value->product_price?></td>
									<td><?=$value->sub_harga?></td>
									<td><?=$value->discount?> %</td>
									<td><?=$value->harga?></td>
									<td>
										<?= form_open(base_url('soline/delete')) ?>
										<input type="hidden" name="delete_id" value="<?=$value->id?>">
										<button class="action-btn ab-pink deleteBtn" type="submit"><i class="fa fa-trash"></i></button>
										<?= form_close() ?>
									</td>
								</tr>
								<?php } ?>
								
								<tr>
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
													'content' => $product_list,
												],
												[
													'field' => 'qty',
													'colspan' => '3',
												],
												'discount'
											],
											'btn_text' => 'Add Porduct',
											'btn_class' => 'text-btn'
									]) : null
									?>
								</tr>
								<tr>
									<td colspan="6"><h6>Sub Total</h6></td>
									<td>
										<?php echo 'Rp. '.number_format($sum, 0, ); ?>
									</td>
								</tr>
								<tr>
									<td colspan="6"><h6>Diskon</h6></td>
									<td>
										<?php echo 'Rp. '.number_format($total_diskon, 0, ); ?>
									</td>
								</tr>
								<tr>
									<td colspan="6"><h6>Pajak</h6></td>
									<td>
										<?php echo 'Rp. '.number_format($pajak, 0, ); ?>
									</td>
								</tr>
								<tr>
									<td colspan="6"><h6>Grand Total</h6></td>
									<td>
										<?php echo 'Rp. '.number_format($total, 0, ); ?>
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
