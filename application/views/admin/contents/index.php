<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
							<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
						</ol>
					</nav>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Uang Kas Umum</h5>
									<span class="h2 font-weight-bold mb-0">Rp. <?= number_format($saldoKas['saldo'], 2) ?></span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
										<i class="ni ni-money-coins"></i>
									</div>
								</div>
							</div>
							<p class="mt-3 mb-0 text-sm">
								<span class="text-nowrap">Sisa Saldo Keseluruhan <a href="<?= base_url('admin/umum') ?>">Lihat detail</a></span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Pembantu Kas Tunai</h5>
									<span class="h2 font-weight-bold mb-0">Rp. <?= number_format($saldoTunai['saldo'], 2) ?></span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
										<i class="ni ni-money-coins"></i>
									</div>
								</div>
							</div>
							<p class="mt-3 mb-0 text-sm">
								<span class="text-nowrap">Sisa Saldo Keseluruhan <a href="<?= base_url('admin/tunai') ?>">Lihat detail</a></span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Pembantu Bank</h5>
									<span class="h2 font-weight-bold mb-0">Rp. <?= number_format($saldoBank['saldo'], 2) ?></span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
										<i class="ni ni-money-coins"></i>
									</div>
								</div>
							</div>
							<p class="mt-3 mb-0 text-sm">
								<span class="text-nowrap">Sisa Saldo Keseluruhan <a href="<?= base_url('admin/bank') ?>">Lihat detail</a></span>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
