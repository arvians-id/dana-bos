<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Profil</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
							<li class="breadcrumb-item active" aria-current="page">Profil</li>
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
			<h3 class="mb-0">Ubah Profil</h3>
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
							<label class="form-control-label">Username</label>
							<input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" value="<?= $this->session->userdata('username') ?>" name="username">
							<div class="invalid-feedback"><?= form_error('username') ?></div>
						</div>
						<div class="form-group">
							<label class="form-control-label">Password</label><small class="text-info"> *Abaikan jika tidak ingin diubah</small>
							<input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" value="<?= set_value('password') ?>" name="password">
							<div class="invalid-feedback"><?= form_error('password') ?></div>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Ubah</button>
			</form>
		</div>
	</div>
	<!-- Footer -->
	<?php $this->load->view('admin/components/footer') ?>
</div>
