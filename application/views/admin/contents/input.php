<div class="header bg-primary pb-6">
	<div class="container-fluid">
		<div class="header-body">
			<div class="row align-items-center py-4">
				<div class="col-lg-6 col-7">
					<h6 class="h2 text-white d-inline-block mb-0">Input Dana BOS</h6>
					<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
						<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
							<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
							<li class="breadcrumb-item active" aria-current="page">Input Dana BOS</li>
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
			<h3 class="mb-0">Input Data Dana BOS</h3>
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
			<div class="alert alert-warning rounded-0" role="alert">
				<h4 class="alert-heading">Perhatian</h4>
				<p>Jika anda melakukan penginputan data saldo dan tanggal sebelum hari ini, maka perlu diperhatikan saldo sisa anda agar tidak terjadinya minus pada saldo.</p>
			</div>
			<!-- Form groups used in grid -->
			<form method="POST">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="form-control-label">Jenis Dana BOS</label><small class="text-danger"> *</small>
							<select name="jenis_id" class="form-control <?= form_error('jenis_id') ? 'is-invalid' : '' ?>">
								<option value="" selected disabled>Pilih</option>
								<?php foreach ($getJenis as $jenis) : ?>
									<option value="<?= $jenis['id_jenis'] ?>" data-jenis="<?= $jenis['nama_bos'] ?>" <?= set_value('jenis_id') != $jenis['id_jenis'] ?: 'selected' ?>><?= $jenis['nama_bos'] ?></option>
								<?php endforeach ?>
							</select>
							<div class="invalid-feedback"><?= form_error('jenis_id') ?></div>
						</div>
						<div class="form-group">
							<label class="form-control-label">Saldo</label><small class="text-info"> * Saldo berdasarkan tahun dan bulan saat ini</small>
							<input type="text" class="form-control" id="saldo" name="saldo" value="<?= set_value('saldo', 0) ?>" readonly>
						</div>
						<div class="form-group">
							<label class="form-control-label">Tanggal</label><small class="text-danger"> *</small>
							<input type="date" class="form-control <?= form_error('tanggal') ? 'is-invalid' : '' ?>" value="<?= set_value('tanggal') ?>" name="tanggal">
							<div class="invalid-feedback"><?= form_error('tanggal') ?></div>
						</div>
						<div class="form-group">
							<label class="form-control-label">No Kode</label>
							<input type="text" class="form-control <?= form_error('no_kode') ? 'is-invalid' : '' ?>" value="<?= set_value('no_kode') ?>" name="no_kode" placeholder="Berupa angka">
							<div class="invalid-feedback"><?= form_error('no_kode') ?></div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="form-control-label">No Bukti</label>
							<input type="text" class="form-control <?= form_error('no_bukti') ? 'is-invalid' : '' ?>" value="<?= set_value('no_bukti') ?>" name="no_bukti" placeholder="angka/romawi/tahun">
							<div class="invalid-feedback"><?= form_error('no_bukti') ?></div>
						</div>
						<div class="form-group">
							<label class="form-control-label">Uraian</label><small class="text-danger"> *</small>
							<input type="text" class="form-control <?= form_error('uraian') ? 'is-invalid' : '' ?>" value="<?= set_value('uraian') ?>" name="uraian">
							<div class="invalid-feedback"><?= form_error('uraian') ?></div>
						</div>
						<div class="form-group">
							<label class="form-control-label">Penerimaan</label><small class="text-info"> * Kosongkan jika tidak ada</small>
							<input type="text" class="form-control <?= form_error('penerimaan') ? 'is-invalid' : '' ?>" value="<?= set_value('penerimaan') ?>" name="penerimaan" placeholder="contoh: 1000000" autocomplete="off">
							<div class="invalid-feedback"><?= form_error('penerimaan') ?></div>

						</div>
						<div class="form-group">
							<label class="form-control-label">Pengeluaran</label><small class="text-info"> * Kosongkan jika tidak ada</small>
							<input type="text" class="form-control <?= form_error('pengeluaran') ? 'is-invalid' : '' ?>" value="<?= set_value('pengeluaran') ?>" name="pengeluaran" placeholder="contoh: 1000000" autocomplete="off">
							<div class="invalid-feedback"><?= form_error('pengeluaran') ?></div>
						</div>
					</div>
				</div>
				<small class="d-block sisa-saldo">Sisa saldo [Belum ditemukan]</small>
				<button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
			</form>
		</div>
	</div>
	<!-- Footer -->
	<?php $this->load->view('admin/components/footer') ?>
</div>
<script src="<?= base_url('assets/template/argon') ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
<script>
	$(function() {
		$('[name="jenis_id"]').on('change', function() {
			let jenis_id = $(this).val();
			let jenis = $(this).find(':selected').data('jenis');
			$.ajax({
				url: `<?= base_url('admin/get_jenis_ajax/') ?>${jenis_id}`,
				method: 'GET',
				dataType: 'json',
				success: function(response) {
					let saldo = response.saldo ? response.saldo : 0;
					$('[name="saldo"]').val(`${saldo}`)
					$('.sisa-saldo').html(`Sisa saldo ${saldo}`)
				}
			})
		})

		$('[name="penerimaan"]').on('keyup', function() {
			let pengeluaran = parseInt($('[name="pengeluaran"]').val() == '' ? 0 : $('[name="pengeluaran"]').val())
			let saldo = parseInt($('[name="saldo"]').val()) + parseInt($(this).val()) - pengeluaran;
			if (isNaN(saldo)) {
				$('.sisa-saldo').html('Sisa saldo ' + (parseInt($('[name="saldo"]').val()) - pengeluaran))
			} else {
				$('.sisa-saldo').html(`Sisa saldo ${saldo}`)
			}

			saldo <= 0 ? $('#btn-simpan').attr('disabled', true) : $('#btn-simpan').attr('disabled', false)
		})
		$('[name="pengeluaran"]').on('keyup', function() {
			let penerimaan = parseInt($('[name="penerimaan"]').val() == '' ? 0 : $('[name="penerimaan"]').val())
			let saldo = parseInt($('[name="saldo"]').val()) + penerimaan - parseInt($(this).val());
			if (isNaN(saldo)) {
				$('.sisa-saldo').html('Sisa saldo ' + (parseInt($('[name="saldo"]').val()) + penerimaan))
			} else {
				$('.sisa-saldo').html(`Sisa saldo ${saldo}`)
			}

			saldo <= 0 ? $('#btn-simpan').attr('disabled', true) : $('#btn-simpan').attr('disabled', false)
		})
	})
</script>
