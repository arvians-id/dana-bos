<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dana_model extends CI_Model
{
	public function simpanDana()
	{
		$data = [
			'jenis_id' => $this->input->post('jenis_id'),
			'tanggal' => $this->input->post('tanggal') . date(' h:i:s'),
			'no_kode' => $this->input->post('no_kode'),
			'no_bukti' => $this->input->post('no_bukti'),
			'uraian' => $this->input->post('uraian'),
			'penerimaan' => $this->input->post('penerimaan') != null ? $this->input->post('penerimaan') : 0,
			'pengeluaran' => $this->input->post('pengeluaran') != null ? $this->input->post('pengeluaran') : 0,
		];
		$this->db->insert('tb_data_dana_bos', $data);
	}
	public function ubahDana($id_bos)
	{
		$data = [
			'no_kode' => $this->input->post('no_kode'),
			'no_bukti' => $this->input->post('no_bukti'),
			'uraian' => $this->input->post('uraian'),
			'penerimaan' => $this->input->post('penerimaan') != null ? $this->input->post('penerimaan') : 0,
			'pengeluaran' => $this->input->post('pengeluaran') != null ? $this->input->post('pengeluaran') : 0,
		];
		$this->db->where('id_bos', $id_bos);
		$this->db->update('tb_data_dana_bos', $data);
	}
	public function getDana($jenis_id)
	{
		$this->db->select('*');
		$this->db->from('tb_data_dana_bos');
		$this->db->where('jenis_id', $jenis_id);
		$this->db->group_by('MONTH(tanggal)');

		return $this->db->get()->result_array();
	}
	public function getDetailDana($jenis_id, $tahun, $bulan)
	{
		$this->db->query("SET @saldo := 0;");
		$query = $this->db->query("SELECT *, (@saldo := @saldo + (penerimaan - pengeluaran)) as saldo
									FROM tb_data_dana_bos
									WHERE jenis_id = $jenis_id
									AND YEAR(tanggal) = $tahun
									AND MONTH(tanggal) = $bulan
									ORDER BY tanggal
								");
		return $query->result_array();
	}
	public function getDetailDanaById($id_bos)
	{
		$this->db->select('*');
		$this->db->from('tb_data_dana_bos a');
		$this->db->join('tb_data_jenis_bos b', 'a.jenis_id = b.id_jenis');
		$this->db->where('a.id_bos', $id_bos);

		return $this->db->get()->row_array();
	}
	public function getTotal($jenis_id, $tahun, $bulan)
	{
		$this->db->select('*,SUM(tb_data_dana_bos.penerimaan) as penerimaan,SUM(tb_data_dana_bos.pengeluaran) as pengeluaran,(SUM(tb_data_dana_bos.penerimaan)-SUM(tb_data_dana_bos.pengeluaran)) as saldo');
		$this->db->from('tb_data_dana_bos');
		$this->db->where('jenis_id', $jenis_id);
		$this->db->where("YEAR(tanggal)", $tahun);
		$this->db->where("MONTH(tanggal)", $bulan);

		return $this->db->get()->row_array();
	}
	public function getAllTotal($jenis_id)
	{
		$this->db->select('(SUM(tb_data_dana_bos.penerimaan)-SUM(tb_data_dana_bos.pengeluaran)) as saldo');
		$this->db->from('tb_data_dana_bos');
		$this->db->where('jenis_id', $jenis_id);

		return $this->db->get()->row_array();
	}
	public function getYear()
	{
		$this->db->select('tanggal');
		$this->db->from('tb_data_dana_bos');
		$this->db->group_by('YEAR(tanggal)');

		return $this->db->get()->result_array();
	}
	public function getMonth()
	{
		$this->db->select('tanggal');
		$this->db->from('tb_data_dana_bos');
		$this->db->group_by('MONTH(tanggal)');

		return $this->db->get()->result_array();
	}
}
