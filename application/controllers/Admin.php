<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Daerah_model', 'daerah_m');
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
	public function daerah()
	{
		$this->form_validation->set_rules('madrasah', 'Madrasah', 'required|max_length[50]');
		$this->form_validation->set_rules('desa_kecamatan', 'Desa Kecamatan', 'required|max_length[50]');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required|max_length[50]');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required|max_length[50]');

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman daerah
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Dashboard',
				'viewContent' => 'admin/contents/daerah',
				'admin' => $this->db->get_where('tb_login', ['username' => $this->session->userdata('username')])->row_array(),
				'getDaerah' => $this->db->get('tb_data_daerah')->result_array()
			];
			$this->load->view('admin/layouts/dataLayout', $data);
		} else {
			$this->daerah_m->simpanDaerah(); // Insert data daerah
			$this->session->set_flashdata('success', 'Data berhasil dibuat.'); // Membuat pesan notif jika insert data berhasil
			redirect('admin/daerah'); // redirect ke halaman daerah
		}
	}
	public function ubah_daerah($id_daerah)
	{
		$this->form_validation->set_rules('madrasah', 'Madrasah', 'required|max_length[50]');
		$this->form_validation->set_rules('desa_kecamatan', 'Desa Kecamatan', 'required|max_length[50]');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required|max_length[50]');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required|max_length[50]');

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman daerah
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Dashboard',
				'viewContent' => 'admin/contents/ubah_daerah',
				'admin' => $this->db->get_where('tb_login', ['username' => $this->session->userdata('username')])->row_array(),
				'daerah' => $this->db->get_where('tb_data_daerah', ['id_daerah' => $id_daerah])->row_array()
			];
			$this->load->view('admin/layouts/dataLayout', $data);
		} else {
			$this->daerah_m->ubahDaerah($id_daerah); // Insert data daerah
			$this->session->set_flashdata('success', 'Data berhasil diubah.'); // Membuat pesan notif jika update data berhasil
			redirect('admin/daerah'); // redirect ke halaman daerah
		}
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
		$data = [
			'judul' => 'Dashboard',
			'viewContent' => 'admin/contents/detail_umum',
			'admin' => $this->db->get_where('tb_login', ['username' => $this->session->userdata('username')])->row_array(),
			'getDetail' => $this->dana_m->getDetailDana(1, $tahun, $bulan),
			'getTotal' => $this->dana_m->getTotal(1, $tahun, $bulan),
		];
		$this->load->view('admin/layouts/dataLayout', $data);
	}
	public function cetak_umum($tahun, $bulan)
	{
		$data = [
			'judul' => 'Cetak',
			'viewContent' => 'admin/contents/cetak_umum',
			'getDetail' => $this->dana_m->getDetailDana(1, $tahun, $bulan),
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
		$data = [
			'judul' => 'Dashboard',
			'viewContent' => 'admin/contents/detail_tunai',
			'admin' => $this->db->get_where('tb_login', ['username' => $this->session->userdata('username')])->row_array(),
			'getDetail' => $this->dana_m->getDetailDana(2, $tahun, $bulan),
			'getTotal' => $this->dana_m->getTotal(2, $tahun, $bulan),
		];
		$this->load->view('admin/layouts/dataLayout', $data);
	}
	public function cetak_tunai($tahun, $bulan)
	{
		$data = [
			'judul' => 'Cetak',
			'viewContent' => 'admin/contents/cetak_tunai',
			'getDetail' => $this->dana_m->getDetailDana(2, $tahun, $bulan),
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
		$data = [
			'judul' => 'Dashboard',
			'viewContent' => 'admin/contents/detail_bank',
			'admin' => $this->db->get_where('tb_login', ['username' => $this->session->userdata('username')])->row_array(),
			'getDetail' => $this->dana_m->getDetailDana(3, $tahun, $bulan),
			'getTotal' => $this->dana_m->getTotal(3, $tahun, $bulan),
		];
		$this->load->view('admin/layouts/dataLayout', $data);
	}
	public function cetak_bank($tahun, $bulan)
	{
		$data = [
			'judul' => 'Cetak',
			'viewContent' => 'admin/contents/cetak_bank',
			'getDetail' => $this->dana_m->getDetailDana(3, $tahun, $bulan),
			'getTotal' => $this->dana_m->getTotal(3, $tahun, $bulan),
		];
		$this->load->view('admin/layouts/cetakLayout', $data);
	}
	public function input()
	{
		$this->form_validation->set_rules('jenis_id', 'Jenis BOS', 'required');
		$this->form_validation->set_rules('daerah_id', 'Daerah', 'required');
		$this->form_validation->set_rules('no_kode', 'Nomor Kode', 'numeric|max_length[5]');
		$this->form_validation->set_rules('no_bukti', 'Nomor Bukti', 'max_length[15]');
		$this->form_validation->set_rules('uraian', 'Uraian', 'required|max_length[150]');
		$this->form_validation->set_rules('penerimaan', 'Penerimaan', 'required|numeric|greater_than_equal_to[0]');
		$this->form_validation->set_rules('pengeluaran', 'Pengeluaran', 'required|numeric|greater_than_equal_to[0]');

		// Jika validasi gagal, akan muncul error di input dan kembali ke halaman daerah
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Dashboard',
				'viewContent' => 'admin/contents/input',
				'admin' => $this->db->get_where('tb_login', ['username' => $this->session->userdata('username')])->row_array(),
				'getJenis' => $this->db->get('tb_data_jenis_bos')->result_array(),
				'getDaerah' => $this->db->get('tb_data_daerah')->result_array(),
			];
			$this->load->view('admin/layouts/dataLayout', $data);
		} else {
			$this->dana_m->simpanDana(); // Insert data daerah
			$this->session->set_flashdata('success', 'Data berhasil dibuat.'); // Membuat pesan notif jika insert data berhasil
			redirect('admin/input'); // redirect ke halaman daerah
		}
	}
}
