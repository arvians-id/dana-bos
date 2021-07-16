<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Pembantu Bank</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
							<li class="breadcrumb-item active" aria-current="page">Pembantu Bank</li>
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
			<h3 class="mb-0">Data Dana Pembantu Bank</h3>
		</div>
		<div class="table-responsive py-4">
			<table class="table table-flush" id="datatable-basic">
				<thead class="thead-light">
					<tr>
						<th>No</th>
						<th>Tahun - Bulan</th>
						<th>Madrasah/PPS</th>
						<th>Desa/Kecamatan</th>
						<th>Kabupaten</th>
						<th>Provinsi</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($getBank as $bank) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= date('Y - F', strtotime($bank['tanggal'])) ?></td>
							<td>MI Cisereuh</td>
							<td>Pagelaran/Purabaya</td>
							<td>Sukabumi</td>
							<td>Jawa Barat</td>
							<td><a href="<?= base_url('admin/detail_bank/' . date('Y/m', strtotime($bank['tanggal']))) ?>"><i class="ni ni-fat-add"></i></a></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- Footer -->
	<?php $this->load->view('admin/components/footer') ?>
</div>
