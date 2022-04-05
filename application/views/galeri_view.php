<!DOCTYPE HTML>
<html lang="en">

<head>
	<title>Gallery</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<link rel="shorcut icon" href="<?php echo base_url() . 'theme/images/favicon.png' ?>">
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Expanded:400,600,700" rel="stylesheet">
	<!-- Stylesheets -->

	<link href="<?php echo base_url() . 'theme/plugins/bootstrap.css' ?>" rel="stylesheet">
	<link href="<?php echo base_url() . 'theme/fonts/ionicons.css' ?>" rel="stylesheet">
	<link href="<?php echo base_url() . 'theme/common/styles.css' ?>" rel="stylesheet">

</head>

<body>

	<?php echo $header; ?>


	<section class="ptb-0">
		<div class="brdr-ash-1 opacty-5"></div>
	</section>

	<section>
		<div class="container">
			<div class="row">

				<div class="col-md-12 col-lg-8">

					<h4 class="p-title"><b>Gallery</b></h4>
					<div class="row">
						<div class="col-sm-6">
							<video width="500" controls>
								<source src="<?= base_url('assets/images/video1.mp4'); ?>" type="video/mp4">
							</video>
							<!-- <h4 class="pt-20"><a href=""><b>Judul</b></a></h4> -->
							<ul class="list-li-mr-20 pt-10 mb-30">
								<li class="color-lite-black">by <a href="#" class="color-black"><b>Dimas,</b></a>
									<?php echo date('d M Y'); ?></li>
								<li><i class="color-primary mr-5 font-12 ion-eye"></i>0</li>
							</ul>
						</div><!-- col-sm-6 -->

					</div><!-- row -->
					<div class="row">
						<div class="col-sm-6">
							<video width="500" controls>
								<source src="<?= base_url('assets/images/video2.mp4'); ?>" type="video/mp4">
							</video>
							<!-- <h4 class="pt-20"><a href=""><b>Judul</b></a></h4> -->
							<ul class="list-li-mr-20 pt-10 mb-30">
								<li class="color-lite-black">by <a href="#" class="color-black"><b>Dimas,</b></a>
									<?php echo date('d M Y'); ?></li>
								<li><i class="color-primary mr-5 font-12 ion-eye"></i>0</li>
							</ul>
						</div><!-- col-sm-6 -->

					</div><!-- row -->

					<!-- Pagination -->
					<!-- End Pagination -->
				</div><!-- col-md-9 -->

				<div class="d-none d-md-block d-lg-none col-md-3"></div>
				<div class="col-md-6 col-lg-4">
					<div class="pl-20 pl-md-0">

						<div>
							<h4 class="p-title"><b>TERPOPULER</b></h4>
							<a class="oflow-hidden pos-relative mb-20 dplay-block" href="">
								<div class="wh-100x abs-tlr"><img src="<?= base_url('assets/images/96236c3071d85d788937c21db17de596.jpg'); ?>" alt=""></div>
								<div class="ml-120 min-h-100x">
									<h5><b>Moto GP</b></h5>
									<h6 class="color-lite-black pt-10">by <span class="color-black"><b>Dimas,</b></span> <?php echo date('d M Y'); ?></h6>
								</div>
							</a><!-- oflow-hidden -->

						</div><!-- mtb-50 -->

						<div class="mtb-50 mb-md-0">
							<h4 class="p-title"><b>NEWSLETTER</b></h4>
							<p class="mb-20">Anda dapat berlangganan untuk mendapatkan notifikasi artikel terbaru.</p>
							<?php echo $this->session->flashdata('msg'); ?>
							<form class="nwsltr-primary-1" action="<?php echo base_url('subscribe'); ?>" method="post">
								<input type="email" name="email" placeholder="Your email" required />
								<input type="hidden" name="url" value="">
								<button type="submit"><i class="ion-ios-paperplane"></i></button>
							</form>
						</div><!-- mtb-50 -->

					</div><!--  pl-20 -->
				</div><!-- col-md-3 -->

			</div><!-- row -->
		</div><!-- container -->
	</section>

	<?php echo $footer; ?>

	<!-- SCIPTS -->
	<script src="<?php echo base_url() . 'theme/plugins/jquery-3.2.1.min.js' ?>"></script>
	<script src="<?php echo base_url() . 'theme/plugins/tether.min.js' ?>"></script>
	<script src="<?php echo base_url() . 'theme/plugins/bootstrap.js' ?>"></script>
	<script src="<?php echo base_url() . 'theme/common/scripts.js' ?>"></script>

</body>

</html>