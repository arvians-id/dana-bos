<?php
defined('BASEPATH') or exit('No direct script access allowed');
// memanggil autoload library phpoffice
require('./application/third_party/phpoffice/vendor/autoload.php');

// Memanggil namespace class yang berada di library phpoffice
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Style;

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dana_model', 'dana_m');
	}
	public function index()
	{
		$data = [
			'judul' => 'Dashboard',
			'viewContent' => 'admin/contents/index',
			'admin' => $this->db->get_where('tb_login', ['username' => $this->session->userdata('username')])->row_array(),
		];
		$this->load->view('admin/layouts/indexLayout', $data);
	}
	public function umum()
	{
		$data = [
			'judul' => 'Dashboard',
			'viewContent' => 'admin/contents/umum',
			'admin' => $this->db->get_where('tb_login', ['username' => $this->session->userdata('username')])->row_array(),
			'getUmum' => $this->dana_m->getDana(1)
		];
		$this->load->view('admin/layouts/dataLayout', $data);
	}
	public function detail_umum($tahun, $bulan)
	{
		$getDetail = $this->dana_m->getDetailDana(1, $tahun, $bulan);
		if (empty($getDetail)) {
			echo "<script>alert('Data tidak ditemukan');window.location.href='javascript:history.back(-2);'</script>";
		}
		$data = [
			'judul' => 'Dashboard',
			'viewContent' => 'admin/contents/detail_umum',
			'admin' => $this->db->get_where('tb_login', ['username' => $this->session->userdata('username')])->row_array(),
			'getDetail' => $getDetail,
			'getTotal' => $this->dana_m->getTotal(1, $tahun, $bulan),
		];
		$this->load->view('admin/layouts/dataLayout', $data);
	}
	public function cetak_umum($tahun, $bulan)
	{
		$getDetail = $this->dana_m->getDetailDana(1, $tahun, $bulan);
		if (empty($getDetail)) {
			echo "<script>alert('Data tidak ditemukan');window.location.href='javascript:history.back(-2);'</script>";
		}
		$data = [
			'judul' => "Cetak Umum Bulan $bulan Tahun $tahun",
			'header' => 'BUKU KAS UMUM',
			'viewContent' => 'admin/contents/cetak_print',
			'getDetail' => $getDetail,
			'getTotal' => $this->dana_m->getTotal(1, $tahun, $bulan),
		];
		$this->load->view('admin/layouts/cetakLayout', $data);
	}
	public function tunai()
	{
		$data = [
			'judul' => 'Dashboard',
			'viewContent' => 'admin/contents/tunai',
			'admin' => $this->db->get_where('tb_login', ['username' => $this->session->userdata('username')])->row_array(),
			'getTunai' => $this->dana_m->getDana(2)
		];
		$this->load->view('admin/layouts/dataLayout', $data);
	}
	public function detail_tunai($tahun, $bulan)
	{
		$getDetail = $this->dana_m->getDetailDana(2, $tahun, $bulan);
		if (empty($getDetail)) {
			echo "<script>alert('Data tidak ditemukan');window.location.href='javascript:history.back(-2);'</script>";
		}
		$data = [
			'judul' => 'Dashboard',
			'viewContent' => 'admin/contents/detail_tunai',
			'admin' => $this->db->get_where('tb_login', ['username' => $this->session->userdata('username')])->row_array(),
			'getDetail' => $getDetail,
			'getTotal' => $this->dana_m->getTotal(2, $tahun, $bulan),
		];
		$this->load->view('admin/layouts/dataLayout', $data);
	}
	public function cetak_tunai($tahun, $bulan)
	{
		$getDetail = $this->dana_m->getDetailDana(2, $tahun, $bulan);
		if (empty($getDetail)) {
			echo "<script>alert('Data tidak ditemukan');window.location.href='javascript:history.back(-2);'</script>";
		}
		$data = [
			'judul' => "Cetak Tunai Bulan $bulan Tahun $tahun",
			'header' => 'BUKU PEMBANTU KAS TUNAI',
			'viewContent' => 'admin/contents/cetak_print',
			'getDetail' => $getDetail,
			'getTotal' => $this->dana_m->getTotal(2, $tahun, $bulan),
		];
		$this->load->view('admin/layouts/cetakLayout', $data);
	}
	public function bank()
	{
		$data = [
			'judul' => 'Dashboard',
			'viewContent' => 'admin/contents/bank',
			'admin' => $this->db->get_where('tb_login', ['username' => $this->session->userdata('username')])->row_array(),
			'getBank' => $this->dana_m->getDana(3)
		];
		$this->load->view('admin/layouts/dataLayout', $data);
	}
	public function detail_bank($tahun, $bulan)
	{
		$getDetail = $this->dana_m->getDetailDana(3, $tahun, $bulan);
		if (empty($getDetail)) {
			echo "<script>alert('Data tidak ditemukan');window.location.href='javascript:history.back(-2);'</script>";
		}
		$data = [
			'judul' => 'Dashboard',
			'viewContent' => 'admin/contents/detail_bank',
			'admin' => $this->db->get_where('tb_login', ['username' => $this->session->userdata('username')])->row_array(),
			'getDetail' => $getDetail,
			'getTotal' => $this->dana_m->getTotal(3, $tahun, $bulan),
		];
		$this->load->view('admin/layouts/dataLayout', $data);
	}
	public function cetak_bank($tahun, $bulan)
	{
		$getDetail = $this->dana_m->getDetailDana(3, $tahun, $bulan);
		if (empty($getDetail)) {
			echo "<script>alert('Data tidak ditemukan');window.location.href='javascript:history.back(-2);'</script>";
		}
		$data = [
			'judul' => "Cetak Bank Bulan $bulan Tahun $tahun",
			'header' => 'BUKU PEMBANTU BANK',
			'viewContent' => 'admin/contents/cetak_print',
			'getDetail' => $getDetail,
			'getTotal' => $this->dana_m->getTotal(3, $tahun, $bulan),
		];
		$this->load->view('admin/layouts/cetakLayout', $data);
	}
	public function input()
	{
		$this->form_validation->set_rules('jenis_id', 'Jenis BOS', 'required');
		$this->form_validation->set_rules('no_kode', 'Nomor Kode', 'numeric|max_length[5]');
		$this->form_validation->set_rules('no_bukti', 'Nomor Bukti', 'max_length[15]');
		$this->form_validation->set_rules('uraian', 'Uraian', 'required|max_length[150]');
		$this->form_validation->set_rules('penerimaan', 'Penerimaan', 'numeric|greater_than_equal_to[0]');
		$this->form_validation->set_rules('pengeluaran', 'Pengeluaran', 'numeric|greater_than_equal_to[0]');

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman daerah
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Dashboard',
				'viewContent' => 'admin/contents/input',
				'admin' => $this->db->get_where('tb_login', ['username' => $this->session->userdata('username')])->row_array(),
				'getJenis' => $this->db->get('tb_data_jenis_bos')->result_array(),
			];
			$this->load->view('admin/layouts/dataLayout', $data);
		} else {
			$this->dana_m->simpanDana(); // Insert data daerah
			$this->session->set_flashdata('success', 'Data berhasil disimpan.'); // Membuat pesan notif jika insert data berhasil
			redirect('admin/input'); // redirect ke halaman daerah
		}
	}
	public function get_jenis_ajax($jenis_id)
	{
		$saldo = $this->dana_m->getTotal($jenis_id, date('Y'), date('m'));
		echo json_encode($saldo);
	}
	public function laporan()
	{
		$this->form_validation->set_rules('jenis_id', 'Jenis BOS', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required');
		$this->form_validation->set_rules('bulan', 'Bulan', 'required');
		$this->form_validation->set_rules('jenis_laporan', 'Laporan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Admin',
				'viewContent' => 'admin/contents/cetak_laporan',
				'admin' => $this->db->get_where('tb_login', ['username' => $this->session->userdata('username')])->row_array(),
				'getJenis' => $this->db->get('tb_data_jenis_bos')->result_array(),
				'getYear' => $this->dana_m->getYear(),
				'getMonth' => $this->dana_m->getMonth()
			];
			$this->load->view('admin/layouts/dataLayout', $data);
		} else {
			$jenis_id = $this->input->post('jenis_id');
			$tahun = $this->input->post('tahun');
			$bulan = $this->input->post('bulan');
			$jenis_laporan = $this->input->post('jenis_laporan');

			$laporan = $this->dana_m->getDetailDana($jenis_id, $tahun, $bulan);
			$headerName = $jenis_id == 1 ? 'BUKU KAS UMUM' : ($jenis_id == 2 ? 'BUKU PEMBANTU KAS TUNAI' : 'BUKU PEMBANTU BANK');
			$sectionName = 'Bulan ' . date('F', mktime(0, 0, 0, $bulan, 10)) . ' ' . $tahun;
			// Ini Instance untuk export Excel
			if ($jenis_laporan == 'excel') {

				$excel = new Spreadsheet();
				$all = [
					'font'  => [
						'size'  => 11,
						'name'  => 'Times New Rowman'
					]
				];
				$head = [
					'font'  => [
						'bold'  => true,
						'size'  => 14,
						'name'  => 'Times New Rowman'
					]
				];
				$section = [
					'font'  => [
						'size'  => 12,
						'name'  => 'Times New Rowman'
					]
				];
				$excel->getDefaultStyle()->applyFromArray($all);
				$excel->getActiveSheet()->getStyle('E1')->applyFromArray($head);
				$excel->getActiveSheet()->getStyle('E2')->applyFromArray($section);

				$excel->getProperties()->setCreator('ASEP');
				$excel->getProperties()->setLastModifiedBy('ASEP');
				$excel->getProperties()->setTitle('PT ARTA BOGA CEMERLANG');
				$excel->getActiveSheet()->getStyle('A8:H8')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
				$excel->getActiveSheet()->getStyle('A8:H8')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
				$excel->getActiveSheet()->getStyle('A8:H8')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
				$excel->getActiveSheet()->getStyle('E1:E2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
				$excel->getActiveSheet()->getStyle('A3:C6')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
				$excel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
				$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
				$excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
				$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
				$excel->getActiveSheet()->getColumnDimension('E')->setWidth(40);
				$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
				$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
				$excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
				$excel->getActiveSheet()->getRowDimension('8')->setRowHeight(30);
				$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
				$excel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
				$excel->getActiveSheet()->getRowDimension('5')->setRowHeight(20);
				$excel->getActiveSheet()->getRowDimension('6')->setRowHeight(20);

				$excel->getActiveSheet()->mergeCells('A3:B3');
				$excel->getActiveSheet()->mergeCells('A4:B4');
				$excel->getActiveSheet()->mergeCells('A5:B5');
				$excel->getActiveSheet()->mergeCells('A6:B6');
				$excel->setActiveSheetIndex(0)
					->setCellValue('E1', $headerName)
					->setCellValue('E2', $sectionName)
					->setCellValue('A3', 'Nama Madrasah / PPS')
					->setCellValue('A4', 'Desa / Kecamatan')
					->setCellValue('A5', 'Kabupaten')
					->setCellValue('A6', 'Provinsi')
					->setCellValue('C3', ': MI Ciseureuh')
					->setCellValue('C4', ': Pagelaran / Purabaya')
					->setCellValue('C5', ': Sukabumi')
					->setCellValue('C6', ': Jawa Barat')
					->setCellValue('A8', 'No')
					->setCellValue('B8', 'Tanggal')
					->setCellValue('C8', 'No. Kode')
					->setCellValue('D8', 'No. Bukti')
					->setCellValue('E8', 'Uraian')
					->setCellValue('F8', 'Penerimaan (Rp)')
					->setCellValue('G8', 'Pengeluaran (Rp)')
					->setCellValue('H8', 'Saldo (Rp)');

				$column = 9;
				$no = 1;
				if (!empty($laporan)) {
					if (is_array($laporan)) {
						foreach ($laporan as $lap) {
							$excel->getActiveSheet()->getStyle('A' . $column . ':D' . $column)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
							$excel->getActiveSheet()->getStyle('A' . $column . ':H' . $column)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
							$excel->getActiveSheet()->getRowDimension($column)->setRowHeight(20);
							$excel->setActiveSheetIndex(0)
								->setCellValue('A' . $column, $no++)
								->setCellValue('B' . $column, date('d-M-y', strtotime($lap['tanggal'])))
								->setCellValue('C' . $column, $lap['no_kode'])
								->setCellValue('D' . $column, $lap['no_bukti'])
								->setCellValue('E' . $column, $lap['uraian'])
								->setCellValue('F' . $column, $lap['penerimaan'])
								->setCellValue('G' . $column, $lap['pengeluaran']);
							if ($column > 9) {
								$excel->setActiveSheetIndex(0)->setCellValue('H' . $column, '=H' . ($column - 1) . '+' . 'F' . $column . '-' . 'G' . $column);
							} else {
								$excel->setActiveSheetIndex(0)->setCellValue('H' . $column, '=F' . $column . '-' . 'G' . $column);
							}
							$column++;
						}
					}

					$col = 9;
					$excel->getActiveSheet()->getStyle('E' . ($column + 1))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$excel->getActiveSheet()->getStyle('E' . ($column + 1) . ':H' . ($column + 1))->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
					$excel->getActiveSheet()->getRowDimension(($column + 1))->setRowHeight(20);
					$excel->setActiveSheetIndex(0)
						->setCellValue('E' . ($column + 1), 'Jumlah')
						->setCellValue('F' . ($column + 1), '=SUM(F' . $col . ':' . 'F' . $column . ')')
						->setCellValue('G' . ($column + 1), '=SUM(G' . $col . ':' . 'G' . $column . ')')
						->setCellValue('H' . ($column + 1), '=F' . ($column + 1) . '-' . 'G' . ($column + 1));


					$excel->getActiveSheet()->getStyle('B' . ($column + 5))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$excel->getActiveSheet()->getStyle('B' . ($column + 6))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$excel->getActiveSheet()->getStyle('B' . ($column + 10))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$excel->getActiveSheet()->getStyle('B' . ($column + 11))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$excel->getActiveSheet()->mergeCells('B' . ($column + 5) . ':C' . ($column + 5));
					$excel->getActiveSheet()->mergeCells('B' . ($column + 6) . ':C' . ($column + 6));
					$excel->getActiveSheet()->mergeCells('B' . ($column + 10) . ':C' . ($column + 10));
					$excel->getActiveSheet()->mergeCells('B' . ($column + 11) . ':C' . ($column + 11));
					$excel->setActiveSheetIndex(0)
						->setCellValue('B' . ($column + 5), 'Mengetahui')
						->setCellValue('B' . ($column + 6), 'Kepala Madrasah')
						->setCellValue('B' . ($column + 10), 'MAI SUMARNA, S.Pd.I')
						->setCellValue('B' . ($column + 11), 'NIP. 19661130 199103 1 002');

					$excel->getActiveSheet()->getStyle('F' . ($column + 4))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$excel->getActiveSheet()->getStyle('F' . ($column + 5))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$excel->getActiveSheet()->getStyle('F' . ($column + 6))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$excel->getActiveSheet()->getStyle('F' . ($column + 10))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$excel->getActiveSheet()->getStyle('F' . ($column + 11))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
					$excel->getActiveSheet()->mergeCells('F' . ($column + 4) . ':G' . ($column + 4));
					$excel->getActiveSheet()->mergeCells('F' . ($column + 5) . ':G' . ($column + 5));
					$excel->getActiveSheet()->mergeCells('F' . ($column + 6) . ':G' . ($column + 6));
					$excel->getActiveSheet()->mergeCells('F' . ($column + 10) . ':G' . ($column + 10));
					$excel->getActiveSheet()->mergeCells('F' . ($column + 11) . ':G' . ($column + 11));
					$excel->setActiveSheetIndex(0)
						->setCellValue('F' . ($column + 4), 'Ciseureuh ' . date('d F Y'))
						->setCellValue('F' . ($column + 5), 'Dibuat Oleh')
						->setCellValue('F' . ($column + 6), 'Bendahara / Guru')
						->setCellValue('F' . ($column + 10), 'RINRIN KRISTIANA')
						->setCellValue('F' . ($column + 11), 'NUPTK. 2156 7676 6730 0003');

					$writer = new Xlsx($excel);
					$fileName = bin2hex(random_bytes(12));

					header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
					header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
					header('Cache-Control: max-age=0');

					$writer->save('php://output');
					exit;
				} else {
					$this->session->set_flashdata('error', 'Tidak ada data ditemukan.');
					redirect('admin/laporan');
				}
			} else if ($jenis_laporan == 'print') {
				if (!empty($laporan)) {
					$data = [
						'judul' => "Cetak Bank Bulan $bulan Tahun $tahun",
						'header' => $headerName,
						'viewContent' => 'admin/contents/cetak_print',
						'getDetail' => $this->dana_m->getDetailDana($jenis_id, $tahun, $bulan),
						'getTotal' => $this->dana_m->getTotal($jenis_id, $tahun, $bulan),
					];
					$this->load->view('admin/layouts/cetakLayout', $data);
				} else {
					$this->session->set_flashdata('error', 'Tidak ada data ditemukan.');
					redirect('admin/laporan');
				}
			}
		}
	}
	public function profil()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash');
		$this->form_validation->set_rules('password', 'Password', 'min_length[5]');

		// Jika validasi gagal, akan muncul error di profil dan kembali ke halaman daerah
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Dashboard',
				'viewContent' => 'admin/contents/profil',
				'admin' => $this->db->get_where('tb_login', ['username' => $this->session->userdata('username')])->row_array(),
			];
			$this->load->view('admin/layouts/dataLayout', $data);
		} else {
			$admin = $this->db->get_where('tb_login', ['username' => $this->session->userdata('username')])->row_array();
			$data = [
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password') == null ? $admin['password'] : md5($this->input->post('password')),
			];
			$this->db->where('id', $this->session->userdata('id'));
			$this->db->update('tb_login', $data);
			$this->session->set_flashdata('success', 'Profil berhasil diubah.'); // Membuat pesan notif jika ubah data berhasil
			redirect('admin/profil'); // redirect ke halaman daerah
		}
	}
}
