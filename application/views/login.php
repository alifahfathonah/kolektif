<div class="card card-pages shadow-none">
	<div class="card-body">
		<div class="text-center m-t-0 m-b-15">
			<a href="index.html" class="logo logo-admin"><img src="<?=base_url()?>/assets/brand.svg" alt="" height="54"></a>
		</div>
		<h5 class="font-18 text-center">Sign in to acces application</h5>
            <?= form_open('', 'class="form-horizontal m-t-30"') ?>

			<div class="form-group">
				<div class="col-12">
					<label>Username</label>
					<input autofocus value="<?=$old?>" class="form-control" type="text" name="username" required="" placeholder="Username">
                    <?= $errors ? '<ul class="parsley-errors-list filled" id="parsley-id-17"><li class="parsley-required">Your credential is not valid</li></ul>' : '' ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-12">
					<label>Password</label>
					<input class="form-control" type="password" name="password" required="" placeholder="Password">
                    
				</div>
			</div>

			<div class="form-group text-center m-t-20">
				<div class="col-12">
					<button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log
						In</button>
				</div>
			</div>
		</form>
	</div>

</div>
