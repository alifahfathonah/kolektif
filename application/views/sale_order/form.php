<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<?php
				count($model->errors)>0 ? d($model->errors) : ''?>
				<?php echo $model->serializeForm([
					'columns' => [
						'name',
						[
							'field' => 'customer_id', 
							'inputType' => 'dropdown', 
							'label' => 'customer',
							'content' => $dropdown_list,
						]
					]
				]) ?>
				<br/>
				<a href="<?php echo base_url() ?>soline/create/<?php echo $model->_id ?>" class="btn ab-blue"><span class="fa fa-plus"></span> New Line</a>
				<div class="table-rep-plugin">
					<div class="table-responsive b-0" data-pattern="priority-columns">
						<?php serializeTable($line, [
							'columns' => [
								'so_name',
								'product_name',
								'qty',
								'product_price',
								'sub_harga',
								'discount',
								'harga'
							],
							'uri' => 'soline',

						]);
if (($sum==0)){ 
$total_diskon=0;
$pajak=0;
$total=0;
}
echo '<br>Sub Total= Rp. '.$sum;
echo '<br>Total Discount= Rp. ' .$total_diskon;
echo '<br>Pajak= Rp. ' .$pajak;
echo '<br>Total= Rp.' .$total;


						 ?>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- end col -->
</div>