<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daerah_model extends CI_Model
{
	public function simpanDaerah()
	{
		$data = [
			'madrasah' => $this->input->post('madrasah'),
			'desa_kecamatan' => $this->input->post('desa_kecamatan'),
			'kabupaten' => $this->input->post('kabupaten'),
			'provinsi' => $this->input->post('provinsi'),
		];
		$this->db->insert('tb_data_daerah', $data);
	}
	public function ubahDaerah($id_daerah)
	{
		$data = [
			'madrasah' => $this->input->post('madrasah'),
			'desa_kecamatan' => $this->input->post('desa_kecamatan'),
			'kabupaten' => $this->input->post('kabupaten'),
			'provinsi' => $this->input->post('provinsi'),
		];
		$this->db->where('id_daerah', $id_daerah);
		$this->db->update('tb_data_daerah', $data);
	}
}
