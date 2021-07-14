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
			<h3 class="mb-0">Input Data Daerah</h3>
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
							<label class="form-control-label">Nama Madrasah/PPS</label><small class="text-danger"> *</small>
							<input type="text" class="form-control <?= form_error('madrasah') ? 'is-invalid' : '' ?>" value="<?= set_value('madrasah') ?>" name="madrasah">
							<div class="invalid-feedback"><?= form_error('madrasah') ?></div>
						</div>
						<div class="form-group">
							<label class="form-control-label">Desa/Kecamatan</label><small class="text-danger"> *</small>
							<input type="text" class="form-control <?= form_error('desa_kecamatan') ? 'is-invalid' : '' ?>" value="<?= set_value('desa_kecamatan') ?>" name="desa_kecamatan">
							<div class="invalid-feedback"><?= form_error('desa_kecamatan') ?></div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="form-control-label">Kabupaten</label><small class="text-danger"> *</small>
							<input type="text" class="form-control <?= form_error('kabupaten') ? 'is-invalid' : '' ?>" value="<?= set_value('kabupaten') ?>" name="kabupaten">
							<div class="invalid-feedback"><?= form_error('kabupaten') ?></div>
						</div>
						<div class="form-group">
							<label class="form-control-label">Provinsi</label><small class="text-danger"> *</small>
							<input type="text" class="form-control <?= form_error('provinsi') ? 'is-invalid' : '' ?>" value="<?= set_value('provinsi') ?>" name="provinsi">
							<div class="invalid-feedback"><?= form_error('provinsi') ?></div>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
	</div>
	<div class="card">
		<!-- Card header -->
		<div class="card-header">
			<h3 class="mb-0">Data Daerah</h3>
		</div>
		<div class="table-responsive py-4">
			<table class="table table-flush" id="datatable-basic">
				<thead class="thead-light">
					<tr>
						<th>No</th>
						<th>Madrasah/PPS</th>
						<th>Desa/Kecamatan</th>
						<th>Kabupaten</th>
						<th>Provinsi</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($getDaerah as $daerah) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $daerah['madrasah'] ?></td>
							<td><?= $daerah['desa_kecamatan'] ?></td>
							<td><?= $daerah['kabupaten'] ?></td>
							<td><?= $daerah['provinsi'] ?></td>
							<td><a href="<?= base_url('admin/ubah_daerah/' . $daerah['id_daerah']) ?>"><i class="ni ni-settings"></i></a></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- Footer -->
	<?php $this->load->view('admin/components/footer') ?>
</div>
