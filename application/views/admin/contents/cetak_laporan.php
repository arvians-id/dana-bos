<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Laporan</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
							<li class="breadcrumb-item active" aria-current="page">Laporan</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
	<div class="card mb-4">
		<!-- Card header -->
		<div class="card-header">
			<h3 class="mb-0">Cetak Data Dana BOS</h3>
		</div>
		<!-- Card body -->
		<div class="card-body">
			<?php if ($this->session->flashdata('success')) : ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('success'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php elseif ($this->session->flashdata('error')) : ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('error'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php endif; ?>
			<!-- Form groups used in grid -->
			<form method="POST">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="form-control-label">Jenis Dana BOS</label><small class="text-danger"> *</small>
							<select name="jenis_id" class="form-control <?= form_error('jenis_id') ? 'is-invalid' : '' ?>">
								<option value="" selected disabled>Pilih</option>
								<?php foreach ($getJenis as $jenis) : ?>
									<option value="<?= $jenis['id_jenis'] ?>" <?= set_value('jenis_id') != $jenis['id_jenis'] ?: 'selected' ?>><?= $jenis['nama_bos'] ?></option>
								<?php endforeach ?>
							</select>
							<div class="invalid-feedback"><?= form_error('jenis_id') ?></div>
						</div>
						<div class="form-group">
							<label class="form-control-label">Tahun</label><small class="text-danger"> * Tahun ini akan berdasarkan data tahun yang hanya ada didatabase</small>
							<select name="tahun" class="form-control <?= form_error('tahun') ? 'is-invalid' : '' ?>">
								<option value="" selected disabled>Pilih</option>
								<?php foreach ($getYear as $year) : ?>
									<?php $years = date('Y', strtotime($year['tanggal'])) ?>
									<option value="<?= $years ?>" <?= set_value('tahun') != $years ?: 'selected' ?>><?= $years ?></option>
								<?php endforeach ?>
							</select>
							<div class="invalid-feedback"><?= form_error('tahun') ?></div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="form-control-label">Bulan</label><small class="text-danger"> * Bulan ini akan berdasarkan data bulan yang hanya ada didatabase</small>
							<select name="bulan" class="form-control <?= form_error('bulan') ? 'is-invalid' : '' ?>">
								<option value="" selected disabled>Pilih</option>
								<?php foreach ($getMonth as $month) : ?>
									<?php $months = date('F', strtotime($month['tanggal'])) ?>
									<option value="<?= date('m', strtotime($month['tanggal'])) ?>" <?= set_value('bulan') != $months ?: 'selected' ?>><?= $months ?></option>
								<?php endforeach ?>
							</select>
							<div class="invalid-feedback"><?= form_error('bulan') ?></div>
						</div>
						<div class="form-group">
							<label class="form-control-label">Jenis Laporan</label><small class="text-danger"> *</small>
							<select name="jenis_laporan" class="form-control <?= form_error('jenis_laporan') ? 'is-invalid' : '' ?>">
								<option value="" selected disabled>Pilih</option>
								<option value="print" <?= set_value('jenis_laporan') == 'print' ? 'selected' : '' ?>>Print</option>
								<option value="excel" <?= set_value('jenis_laporan') == 'excel' ? 'selected' : '' ?>>Excel</option>
							</select>
							<div class="invalid-feedback"><?= form_error('jenis_laporan') ?></div>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
	</div>
	<!-- Footer -->
	<?php $this->load->view('admin/components/footer') ?>
</div>
