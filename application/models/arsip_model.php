<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class arsip_model extends MY_Model {
	
	public function __construct(){
		parent::__construct();
	}
	public function get_table($table){
		$query = $this->db->select('*')->from($table);
		return $query->get()->result();
	}
	public function get_table_w($table,$param){
		$query = $this->db->select('*')->from($table)->where($param);
		return $query->get()->result();
	}
	// public function get_table
	public function insert_arsip(){
		$kapal=explode('|',$this->input->post('kapal'));
		$jenis_ijin=explode('|',$this->input->post('jenis_ijin'));
		$data=array(
			'judul'=>$this->input->post('judul'),
			'id_perusahaan'=>$this->input->post('perusahaan'),
			'id_kapal'=>$kapal[0],
			'kode_barcode'=>$this->input->post('barcode'),
			'status_ijin'=>$this->input->post('status_ijin'),
			'jenis_ijin'=>$jenis_ijin[0],
			'no_ijin'=>$this->input->post('no_ijin'),
			'tgl_terbit'=>$this->input->post('terbit'),
			'tgl_expired'=>$this->input->post('expired'),
			'kode_arsip'=>$this->input->post('kode_arsip'),
			// 'jumlah_halaman'=>$this->input->post(''),
			'no_pembukuan'=>$this->input->post('no_pembukuan'),
			'tgl_pembukuan'=>date('Y-m-d'),
		);

		$this->db->insert('arsip', $data);
	}
	// public function upload_lampiran(){
		
	// }
	public function attribute_labels()
	{
		return array(
				'id' => 'Id Table',
				'judul' => 'Dasar Hukum',
				'id_perusahaan' => 'Batas Max Retensi',
				'id_kapal' => 'Status',
				'kode_arsip' => 'Status',
				'kode_barcode' => 'Status',
				'salinan' => 'Status',
				'status_ijin' => 'Status',
				'jenis_file' => 'Status',
				'jenis_ijin' => 'Status',
				'no_ijin' => 'Status',
				'tgl_terbit' => 'Status',
				'tgl_expired' => 'Status',
				'jumlah_halaman' => 'Status',
				'no_pembukuan' => 'Status',
				'tgl_pembukuan' => 'Status',
			);
	}
}
?>