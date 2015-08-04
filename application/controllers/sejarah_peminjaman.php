<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sejarah_peminjaman extends CI_Controller{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('peminjaman_model');
	}

	public function index()
	{
		$data['title'] = 'Aturan Peminjaman';
		$data['sejarah'] = $this->peminjaman_model->getDataSejarahPeminjamanAll();
		
		$this->template->load('kkp','sirkulasi/sejarah_peminjaman', $data);
	}

}