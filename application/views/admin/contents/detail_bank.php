<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Detail Pembantu Bank</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
							<li class="breadcrumb-item active" aria-current="page">Detail Pembantu Bank</li>
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
			<h2 class="text-center">BUKU PEMBANTU BANK</h2>
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

			<a href="<?= base_url('admin/cetak_bank/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>" class="btn btn-primary" target="_BLANK">Cetak</a>
			<a href="<?= base_url('admin/excel_bank/' . $this->uri->segment(3) . '/' . $this->uri->segment(4)) ?>" class="btn btn-success">Export Excel</a>
		</div>
	</div>
	<!-- Footer -->
	<?php $this->load->view('admin/components/footer') ?>
</div>
