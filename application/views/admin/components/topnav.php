<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<a href="<?= base_url('admin') ?>">
				<img src=" <?= base_url('assets/template/argon') ?>/assets/img/brand/white.png" class="navbar-brand-img" width="150">
			</a>
			<!-- Navbar links -->
			<ul class="navbar-nav align-items-center ml-md-auto">
				<li class="nav-item d-xl-none ml-2">
					<!-- Sidenav toggler -->
					<div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
						<div class="sidenav-toggler-inner">
							<i class="sidenav-toggler-line"></i>
							<i class="sidenav-toggler-line"></i>
							<i class="sidenav-toggler-line"></i>
						</div>
					</div>
				</li>
			</ul>
			<ul class="navbar-nav align-items-center ml-auto ml-md-0">
				<li class="nav-item dropdown">
					<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<div class="media align-items-center">
							<div class="media-body ml-2 d-none d-lg-block">
								<span class="mb-0 text-sm  font-weight-bold"><?= ucfirst($admin['username']) ?></span>
							</div>
						</div>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="dropdown-header noti-title">
							<h6 class="text-overflow m-0">Welcome!</h6>
						</div>
						<a href="<?= base_url('admin/profil') ?>" class="dropdown-item">
							<i class="ni ni-single-02"></i>
							<span>My profile</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url('login/logout') ?>" class="dropdown-item">
							<i class="ni ni-user-run"></i>
							<span>Logout</span>
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
