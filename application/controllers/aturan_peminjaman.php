<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aturan_peminjaman extends CI_Controller{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('aturan_peminjaman_model');
	}

	public function index()
	{
		$data['title'] = 'Aturan Peminjaman';
		$data['rules'] = $this->aturan_peminjaman_model->getAll();
		
		$this->template->load('kkp','sirkulasi/aturan_peminjaman', $data);
	}

	function add()
	{
		$data['title'] = 'Tambah Data Aturan Peminjaman';
		$data['tipe_keanggotaan'] = $this->aturan_peminjaman_model->getTipeKeanggotaan();
		$data['tipe_koleksi'] = $this->aturan_peminjaman_model->getTipeKoleksi();
		$data['gmd'] = $this->aturan_peminjaman_model->getGMD();

		$this->template->load('kkp', 'sirkulasi/tambah_aturan_peminjaman', $data);
	}

	function create()
	{
		$id = $this->input->post('id');
		

		$info=array(
                    'id_type_anggota' => $this->input->post('tipe_keanggotaan'),
					'id_type_koleksi' => $this->input->post('tipe_koleksi'),
					'id_gmd' => $this->input->post('gmd'),
					'jumlah_pinjaman' => $this->input->post('jumlah_pinjaman'),
					'periode_peminjaman' => $this->input->post('periode_peminjaman'),
					'kali_perpanjangan' => $this->input->post('kali_perpanjangan'),
					'denda_harian' => $this->input->post('denda_harian'),
					'toleransi_keterlambatan' => $this->input->post('keterlambatan'),
					'input_date' => date("Y-m-d")
                );
        
		$this->aturan_peminjaman_model->simpan($info);
		redirect(site_url('aturan_peminjaman'));
	}

	function edit($id)
	{
		$data['title'] = 'Edit Data Aturan Peminjaman';
		$data['nilai'] = $this->aturan_peminjaman_model->cek($id)->row_array();		
		$data['tipe_keanggotaan'] = $this->aturan_peminjaman_model->getTipeKeanggotaan();
		$data['tipe_koleksi'] = $this->aturan_peminjaman_model->getTipeKoleksi();
		$data['gmd'] = $this->aturan_peminjaman_model->getGMD();
		$this->template->load('kkp', 'sirkulasi/edit_aturan_peminjaman', $data);
	}

	function update()
	{
		$kode = $this->input->post('id'); 
		
			$info=array(
	                    'id_type_anggota' => $this->input->post('tipe_keanggotaan'),
						'id_type_koleksi' => $this->input->post('tipe_koleksi'),
						'id_gmd' => $this->input->post('gmd'),
						'jumlah_pinjaman' => $this->input->post('jumlah_pinjaman'),
						'periode_peminjaman' => $this->input->post('periode_peminjaman'),
						'kali_perpanjangan' => $this->input->post('kali_perpanjangan'),
						'denda_harian' => $this->input->post('denda_harian'),
						'toleransi_keterlambatan' => $this->input->post('keterlambatan'),
						'last_update' => date("Y-m-d")
	                );
	        
			$this->aturan_peminjaman_model->update($kode,$info);
		
		redirect(site_url('aturan_peminjaman'));
	}

	function delete($kode){
        $this->aturan_peminjaman_model->hapus($kode);
        redirect(site_url('aturan_peminjaman'));
    }

}