<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar_keterlambatan extends CI_Controller{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('peminjaman_model');
	}

	public function index()
	{
		if(isset($_POST['filter'])){
			$kode = $this->input->post('kode');
			$data['title'] = 'Daftar Keterlambatan';
			$data['daftar'] = $this->peminjaman_model->getDataKeterlambatan($kode);
			$this->template->load('kkp','sirkulasi/daftar_keterlambatan', $data);
		}else{
			$data['title'] = 'Daftar Keterlambatan';
			$data['daftar'] = $this->peminjaman_model->getDataSejarahPeminjamanAll();
			$this->template->load('kkp','sirkulasi/daftar_keterlambatan', $data);
		}
	}

}