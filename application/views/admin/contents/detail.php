<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Detail Dana BOS</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
							<li class="breadcrumb-item active" aria-current="page">Detail Dana BOS</li>
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
		<div class="card-body">
			<h2 class="text-center"><?= $header ?></h2>
			<p class="text-center">BULAN <?= strtoupper(date('F Y', strtotime($getTotal['tanggal']))) ?></p>
			<div class="row">
				<div class="col-6 col-lg-2">
					<p>Nama Madrasah / PPS</p>
					<p>Desa / Kecamatan</p>
					<p>Kabupaten</p>
					<p>Provinsi</p>
				</div>
				<div class="col-6 col-lg-2">
					<p>: MI Cisereuh</p>
					<p>: Pagelaran/Purabaya</p>
					<p>: Sukabumi</p>
					<p>: Jawa Barat</p>
				</div>
			</div>
		</div>
		<div class="table-responsive">
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
			<div class="alert alert-warning rounded-0" role="alert">
				<h4 class="alert-heading">Perhatian</h4>
				<p>Data ini akan diurutkan berdasarkan tanggal lama hingga yang terbaru (Ascending). Maka dari itu perhatikan sisa saldo anda agar tidak terjadinya minus.</p>
			</div>
			<table class="table table-striped">
				<thead class="thead-light">
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>No Kode</th>
						<th>No Bukti</th>
						<th>Uraian</th>
						<th>Penerimaan (Rp)</th>
						<th>Pengeluaran (Rp)</th>
						<th>Saldo (Rp)</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($getDetail as $detail) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= date('d-M-y', strtotime($detail['tanggal'])) ?></td>
							<td><?= $detail['no_kode'] ?></td>
							<td><?= $detail['no_bukti'] ?></td>
							<td><?= $detail['uraian'] ?></td>
							<td><?= number_format($detail['penerimaan'], 2) ?></td>
							<td><?= number_format($detail['pengeluaran'], 2) ?></td>
							<td><?= number_format($detail['saldo'], 2) ?></td>
							<td>
								<a href="<?= base_url('admin/edit_dana/' . $detail['id_bos']) ?>"><i class="fas fa-edit"></i></a>|
								<form action="<?= base_url('admin/hapus/' . $detail['id_bos']) ?>" method="POST" class="d-inline" onsubmit="return confirm('Perhatian! Jika anda menghapus data ini maka anda setuju jika terjadinya kemungkinan minus pada sisa saldo dan berubahnya sisa saldo. Yakin ingin melanjutkan?')">
									<input type="hidden" name="jenis_id" value="<?= $jenisBOS ?>">
									<input type="hidden" name="tahun" value="<?= $this->uri->segment(3) ?>">
									<input type="hidden" name="bulan" value="<?= $this->uri->segment(4) ?>">
									<button type="submit" class="btn p-0"><i class="fas fa-trash-alt text-danger"></i></button>
								</form>
							</td>
						</tr>
					<?php endforeach ?>
					<tr>
						<td colspan="5" class="text-center">Jumlah</td>
						<td><?= number_format($getTotal['penerimaan'], 2) ?></td>
						<td><?= number_format($getTotal['pengeluaran'], 2) ?></td>
						<td><?= number_format($getTotal['saldo'], 2) ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="card-body">
			<div class="row justify-content-between mx-5">
				<div class="text-center">
					<p><br> Mengetahui <br>Kepala Madrasah</p>
					<br>
					<br>
					<p>MAI SUMARNA, S.Pd.I <br>NIP. 19661130 199103 1 002</p>
				</div>
				<div class="text-center">
					<p>Cisereuh, <?= date('d F Y') ?><br> Dibuat Oleh <br>Bendahara / Guru</p>
					<br>
					<br>
					<p>RINRIN KRISTIANA <br>NUPTK. 2156 7676 6730 0003</p>
				</div>
			</div>

			<?php if ($jenisBOS == 1) : ?>
				<a href="<?= base_url('admin/cetak_umum/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>" class="btn btn-primary" target="_BLANK">Print</a>
			<?php elseif ($jenisBOS == 2) : ?>
				<a href="<?= base_url('admin/cetak_tunai/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>" class="btn btn-primary" target="_BLANK">Print</a>
			<?php elseif ($jenisBOS == 3) : ?>
				<a href="<?= base_url('admin/cetak_bank/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>" class="btn btn-primary" target="_BLANK">Print</a>
			<?php endif ?>
			<form action="<?= base_url('admin/laporan') ?>" method="POST" class="d-inline">
				<input type="hidden" name="jenis_id" value="<?= $jenisBOS ?>">
				<input type="hidden" name="tahun" value="<?= $this->uri->segment(3) ?>">
				<input type="hidden" name="bulan" value="<?= $this->uri->segment(4) ?>">
				<input type="hidden" name="jenis_laporan" value="excel">
				<button class="btn btn-success">Cetak Excel</button>
			</form>
		</div>
	</div>
	<!-- Footer -->
	<?php $this->load->view('admin/components/footer') ?>
</div>
