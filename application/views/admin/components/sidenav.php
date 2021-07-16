<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
	<div class="scrollbar-inner">
		<!-- Brand -->
		<div class="sidenav-header d-flex align-items-center">
			<a class="navbar-brand" href="<?= base_url('admin') ?>">
				<img src=" <?= base_url('assets/template/argon') ?>/assets/img/brand/blue.png" class="navbar-brand-img">
			</a>
			<div class="ml-auto">
				<!-- Sidenav toggler -->
				<div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
					<div class="sidenav-toggler-inner">
						<i class="sidenav-toggler-line"></i>
						<i class="sidenav-toggler-line"></i>
						<i class="sidenav-toggler-line"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="navbar-inner">
			<!-- Collapse -->
			<div class="collapse navbar-collapse" id="sidenav-collapse-main">
				<!-- Heading -->
				<h6 class="navbar-heading p-0 text-muted">Dashboard</h6>
				<!-- Nav items -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link <?= activeMenu(['']) ?>" href="<?= base_url('admin') ?>">
							<i class="ni ni-shop text-primary"></i>
							<span class="nav-link-text">Dashboard</span>
						</a>
					</li>
				</ul>
				<!-- Divider -->
				<hr class="my-3">
				<!-- Heading -->
				<h6 class="navbar-heading p-0 text-muted">Data BOS</h6>
				<ul class="navbar-nav mb-md-3">
					<li class="nav-item">
						<?php $segment2 = ['umum', 'tunai', 'bank', 'detail_umum', 'detail_tunai', 'detail_bank'] ?>
						<a class="nav-link <?= activeMenu($segment2) ?>" href="#dana-bos" data-toggle="collapse" role="button" aria-expanded="<?= expandedMenu($segment2) ?>" aria-controls="dana-bos">
							<i class="ni ni-money-coins text-success"></i>
							<span class="nav-link-text">Dana BOS</span>
						</a>
						<div class="collapse <?= showMenu($segment2) ?>" id="dana-bos">
							<ul class="nav nav-sm flex-column">
								<li class="nav-item">
									<a href="<?= base_url('admin/umum') ?>" class="nav-link <?= activeMenu(['umum', 'detail_umum']) ?>">Kas Umum</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('admin/tunai') ?>" class="nav-link <?= activeMenu(['tunai', 'detail_tunai']) ?>">Pembantu Kas Tunai</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('admin/bank') ?>" class="nav-link <?= activeMenu(['bank', 'detail_bank']) ?>">Pembantu Bank</a>
								</li>
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= activeMenu(['input']) ?>" href="<?= base_url('admin/input') ?>">
							<i class="ni ni-ruler-pencil text-warning"></i>
							<span class="nav-link-text">Input Dana</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?= activeMenu(['laporan']) ?>" href="<?= base_url('admin/laporan') ?>">
							<i class="ni ni-collection text-primary"></i>
							<span class="nav-link-text">Cetak</span>
						</a>
					</li>
				</ul>
				<!-- Divider -->
				<hr class="my-3">
				<!-- Heading -->
				<h6 class="navbar-heading p-0 text-muted">Lainnya</h6>
				<!-- Navigation -->
				<ul class="navbar-nav mb-md-3">
					<li class="nav-item">
						<a class="nav-link <?= activeMenu(['profil']) ?>" href="<?= base_url('admin/profil') ?>">
							<i class="ni ni-circle-08"></i>
							<span class="nav-link-text">Profil</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('login/logout') ?>">
							<i class="ni ni-button-power"></i>
							<span class="nav-link-text">Logout</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>
