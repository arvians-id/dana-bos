<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
	<meta name="author" content="Creative Tim">
	<title><?= $judul ?></title>
	<!-- Favicon -->
	<link rel="icon" href="<?= base_url('assets/template/argon') ?>/assets/img/brand/favicon.png" type="image/png">
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<!-- Icons -->
	<link rel="stylesheet" href="<?= base_url('assets/template/argon') ?>/assets/vendor/nucleo/css/nucleo.css" type="text/css">
	<link rel="stylesheet" href="<?= base_url('assets/template/argon') ?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
	<!-- Argon CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/template/argon') ?>/assets/css/argon.css" type="text/css">
</head>

<body class="bg-default">
	<!-- Main content -->
	<div class="main-content">
		<!-- Header -->
		<div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
			<div class="container">
				<div class="header-body text-center mb-7">
					<div class="row justify-content-center">
						<div class="col-xl-5 col-lg-6 col-md-8 px-5">
							<h1 class="text-white">Selamat Datang!</h1>
							<p class="text-lead text-white">Madrasah Ibtidaiyah Ciseureuh.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="separator separator-bottom separator-skew zindex-100">
				<svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
					<polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
				</svg>
			</div>
		</div>
		<!-- Page content -->
		<div class="container mt--8 pb-5">
			<div class="row justify-content-center">
				<div class="col-lg-5 col-md-7">
					<div class="card bg-secondary border-0 mb-0">
						<div class="card-body px-lg-5 py-lg-5">
							<div class="text-center text-muted mb-4">
								<small>Silahkan login menggunakan akun anda.</small>
							</div>
							<?php if ($this->session->flashdata('success')) : ?>
								<div class="alert alert-success mt-2" role="alert">
									<?= $this->session->flashdata('success'); ?>
								</div>
							<?php elseif ($this->session->flashdata('error')) : ?>
								<div class="alert alert-danger mt-2" role="alert">
									<?= $this->session->flashdata('error'); ?>
								</div>
							<?php endif; ?>
							<form role="form" method="POST">
								<div class="form-group mb-3">
									<div class="input-group input-group-merge input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-circle-08"></i></span>
										</div>
										<input class="form-control" value="<?= set_value('username') ?>" placeholder="Username" type="text" name="username">
									</div>
									<small class="text-danger"><?= form_error('username') ?></small>
								</div>
								<div class="form-group">
									<div class="input-group input-group-merge input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
										</div>
										<input class="form-control" placeholder="Password" type="password" name="password">
									</div>
									<small class="text-danger"><?= form_error('password') ?></small>
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-primary my-4">Login</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="py-5" id="footer-main">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="copyright text-center text-muted">
						&copy; <?= date('Y') ?> Madrasah Ibtidaiyah Ciseureuh
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Argon Scripts -->
	<!-- Core -->
	<script src="<?= base_url('assets/template/argon') ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
	<script src="<?= base_url('assets/template/argon') ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('assets/template/argon') ?>/assets/vendor/js-cookie/js.cookie.js"></script>
	<script src="<?= base_url('assets/template/argon') ?>/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
	<script src="<?= base_url('assets/template/argon') ?>/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
	<!-- Argon JS -->
	<script src="<?= base_url('assets/template/argon') ?>/assets/js/argon.js"></script>
	<!-- Demo JS - remove this in your project -->
	<script src="<?= base_url('assets/template/argon') ?>/assets/js/demo.min.js"></script>
</body>

</html>
