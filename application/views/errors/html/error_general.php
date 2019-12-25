<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<title> <?= isset($title) ? $title .' - ' : '' ?> Kolektif Industri</title>
	<meta content="ERP by Kolektifindustri.com Built by Dodolantech" name="description" />
	<meta content="Dodolan Tech" name="author" />
	<link rel="shortcut icon" href="<?=base_url()?>/assets/brand.ico">

	<?php loadCss([
            'css/bootstrap.min.css',
            'css/metismenu.min.css',
            'css/icons.css',
            'css/style.css'
        ]); ?>

</head>

<body>

	<!-- Begin page -->
	<div class=""></div>
	<div class="wrapper-page">
	<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-lg-12">
			<div class="">
				<div class="card-block">
					<div class="text-center p-3">

						<h1 class="error-page mt-4"><span><?=$status_code ?>!</span></h1>
						<h4 class="mb-4 mt-5"><?= $heading  ?></h4>
						<p class="mb-4"><?= $message ?></p>
						<a href="<?=base_url()?>">Back to safety</a>
					</div>

				</div>
			</div>

		</div>
	</div>
</div>

	</div>

	<?php loadJs([
            'js/jquery.min.js',
            'js/bootstrap.bundle.min.js',
            'js/metismenu.min.js',
            'js/jquery.slimscroll.js',
            'js/waves.min.js',
            'js/app.js',
            'plugins/alertify/js/alertify.js'
        ]); ?>

</body>

</html>
