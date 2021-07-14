<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dana_model extends CI_Model
{
	public function simpanDana()
	{
		$saldo = 'asu';
		$penerimaan = $this->input->post('penerimaan');
		$pengeluaran = $this->input->post('pengeluaran');
		$jenis_id = $this->input->post('jenis_id');
		$getBeforeSaldo = $this->getBeforeSaldo($jenis_id);
		$saldo = ($getBeforeSaldo['saldo'] + $penerimaan) - $pengeluaran;
		$data = [
			'jenis_id' => $this->input->post('jenis_id'),
			'daerah_id' => $this->input->post('daerah_id'),
			'tanggal' => date('Y-m-d h:i:s'),
			'no_kode' => $this->input->post('no_kode'),
			'no_bukti' => $this->input->post('no_bukti'),
			'uraian' => $this->input->post('uraian'),
			'penerimaan' => $this->input->post('penerimaan'),
			'pengeluaran' => $this->input->post('pengeluaran'),
			'saldo' => $saldo,
		];
		$this->db->insert('tb_data_dana_bos', $data);
	}
	public function getBeforeSaldo($jenis_id)
	{
		$this->db->select('tanggal, saldo');
		$this->db->from('tb_data_dana_bos');
		$this->db->where('jenis_id', $jenis_id);
		$this->db->order_by('tanggal', 'DESC');
		$this->db->limit(1);

		return $this->db->get()->row_array();
	}
	public function getDana($jenis_id)
	{
		$this->db->select('*');
		$this->db->from('tb_data_dana_bos');
		$this->db->join('tb_data_daerah', 'tb_data_daerah.id_daerah = tb_data_dana_bos.daerah_id');
		$this->db->where('jenis_id', $jenis_id);
		$this->db->group_by('MONTH(tanggal)');

		return $this->db->get()->result_array();
	}
	public function getDetailDana($jenis_id, $tahun, $bulan)
	{
		$this->db->select('*');
		$this->db->from('tb_data_dana_bos');
		$this->db->join('tb_data_daerah', 'tb_data_daerah.id_daerah = tb_data_dana_bos.daerah_id');
		$this->db->where('jenis_id', $jenis_id);
		$this->db->where("YEAR(tanggal)", $tahun);
		$this->db->where("MONTH(tanggal)", $bulan);

		return $this->db->get()->result_array();
	}
	public function getTotal($jenis_id, $tahun, $bulan)
	{
		$this->db->select('*,SUM(tb_data_dana_bos.penerimaan) as penerimaan,SUM(tb_data_dana_bos.pengeluaran) as pengeluaran,(SUM(tb_data_dana_bos.penerimaan)-SUM(tb_data_dana_bos.pengeluaran)) as saldo');
		$this->db->from('tb_data_dana_bos');
		$this->db->join('tb_data_daerah', 'tb_data_daerah.id_daerah = tb_data_dana_bos.daerah_id');
		$this->db->where('jenis_id', $jenis_id);
		$this->db->where("YEAR(tanggal)", $tahun);
		$this->db->where("MONTH(tanggal)", $bulan);

		return $this->db->get()->row_array();
	}
}
