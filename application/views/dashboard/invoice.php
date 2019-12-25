<div class="row">
	<div class="col-12 mb-3">
		<div class="d-print-none mo-mt-2">
			<div class="float-right">
				<a href="#" class="btn btn-danger waves-effect btn-lg btn-rounded waves-light">Cancel Invoice</a>
				<a href="javascript:window.print()"
					class="btn btn-warning waves-effect waves-light btn-lg btn-rounded">Print</a>
				<a href="#" class="btn btn-info waves-effect waves-light btn-lg btn-rounded">Copy Link</a>
			</div>
		</div>
	</div>
	<div id="section-to-print" class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-12">
						<div class="invoice-title">
							<h4 class="float-right font-12 text-right">
								<span style="font-weight: bold;">Nama instansi</span> <br>
								Jl. Karimata no 20, Sumberagung, Kec. Jember <br>
								Kota jember, Jawa Timur, 601111
							</h4>
							<h3 class="m-t-0">
								<img src="<?=base_url()?>/assets/brand.svg" alt="logo" height="44" /> 
							</h3>
						</div>
						<hr>
						<div class="row">
							<div class="col-8">
								<address>
									<strong>Billed To:</strong><br>
									Custommer Name<br>
									Jl. Kita masih panjang no 20<br>
									08337740100<br>
								</address>
							</div>
							<div class="col-4">
								<table class="inv-detail">
									<tr>
										<td>Invoice No </td>
										<td>:</td>
										<td>76asdr57a</td>
									</tr>
									<tr>
										<td>Transaction No </td>
										<td>:</td>
										<td>76asdr57a</td>
									</tr>
									<tr>
										<td>Transaction Date </td>
										<td>:</td>
										<td>20/12/2019</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="panel panel-default">
							<div class="">
								<div class="table-responsive">
									<table class="table invoice">
										<thead>
											<tr>
												<td><strong>No</strong></td>
												<td class="text-center"><strong>Item</strong></td>
												<td class="text-center"><strong>Quantity</strong>
												</td>
												<td class="text-right"><strong>Unit Price</strong></td>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>BS-200</td>
												<td class="text-center">1</td>
												<td class="text-center">$10.99</td>
												<td class="text-right">$10.99</td>
											</tr>
											<tr rowspan="2">
												<td colspan="2" class="thick-line"></td>
												<td class="thick-line text-center">
													<strong>Subtotal</strong></td>
												<td class="thick-line text-right">$670.99</td>
											</tr>
											<tr>
												<td class="no-line"></td>
												<td class="no-line"></td>
												<td class="no-line text-center">
													<strong>Shipping</strong></td>
												<td class="no-line text-right">$15</td>
											</tr>
											<tr>
												<td class="no-line"></td>
												<td class="no-line"></td>
												<td class="no-line text-center">
													<strong>Total</strong></td>
												<td class="no-line text-right">
													<h4 class="m-0">$685.99</h4>
												</td>
											</tr>
										</tbody>
									</table>
									* Please transfer to the following account <br>
													<?= $account = "BRI - 626632562563 - Holder" ?>
								</div>

							</div>
						</div>

					</div>
				</div> <!-- end row -->
			</div>
		</div>
	</div> <!-- end col -->
</div>
