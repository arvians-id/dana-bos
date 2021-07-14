<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Data Daerah</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
							<li class="breadcrumb-item active" aria-current="page">Data Daerah</li>
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
			<h3 class="mb-0">Ubah Data Daerah</h3>
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
							<label class="form-control-label">Nama Madrasah/PPS</label>
							<input type="text" class="form-control <?= form_error('madrasah') ? 'is-invalid' : '' ?>" value="<?= set_value('madrasah', $daerah['madrasah']) ?>" name="madrasah">
							<div class="invalid-feedback"><?= form_error('madrasah') ?></div>
						</div>
						<div class="form-group">
							<label class="form-control-label">Desa/Kecamatan</label>
							<input type="text" class="form-control <?= form_error('desa_kecamatan') ? 'is-invalid' : '' ?>" value="<?= set_value('desa_kecamatan', $daerah['desa_kecamatan']) ?>" name="desa_kecamatan">
							<div class="invalid-feedback"><?= form_error('desa_kecamatan') ?></div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="form-control-label">Kabupaten</label>
							<input type="text" class="form-control <?= form_error('kabupaten') ? 'is-invalid' : '' ?>" value="<?= set_value('kabupaten', $daerah['kabupaten']) ?>" name="kabupaten">
							<div class="invalid-feedback"><?= form_error('kabupaten') ?></div>
						</div>
						<div class="form-group">
							<label class="form-control-label">Provinsi</label>
							<input type="text" class="form-control <?= form_error('provinsi') ? 'is-invalid' : '' ?>" value="<?= set_value('provinsi', $daerah['provinsi']) ?>" name="provinsi">
							<div class="invalid-feedback"><?= form_error('provinsi') ?></div>
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
