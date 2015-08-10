<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sirkulasi extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('peminjaman_model');
	}

	public function index()
	{
		$data['title'] = '';
		$this->template->load('kkp','sirkulasi/form_sirkulasi',$data);
	}

	function cari()
	{
		$kode=$this->input->post('kode');
		$this->peminjaman_model->hapusAllTmp();
		$data['title'] = 'Pinjaman';
        $data['list'] = $this->peminjaman_model->getData($kode);
        $data['peminjaman'] = $this->peminjaman_model->getDataPeminjaman($kode);
        $data['sejarah'] = $this->peminjaman_model->getDataSejarahPeminjaman($kode);

        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request
            
        }else{
        	$this->template->load('kkp','sirkulasi/form_sirkulasi',$data);	
        }
        
	}

	function kode_pinjam(){
		$kode=$this->input->post('kode');
		$idAnggota=$this->input->post('IdAnggota');
		$cek_peminjaman = $this->peminjaman_model->cekJmlPinjaman($idAnggota);
		foreach($cek_peminjaman as $ce):
		    $jmlp = $ce->jml_pinjam; 
		endforeach;
		$cek_aturan = $this->peminjaman_model->getAturanPinjam($idAnggota);
		foreach($cek_aturan as $a):
		    $aturanp = $a->jumlah_pinjaman; 
		endforeach;
		if($jmlp <= $aturanp){
			$data['title'] = $jmlp." - ".$aturanp;
	        $data['list'] = $this->peminjaman_model->getDataBuku($kode);
	        $data['aturan'] = $this->peminjaman_model->getAturanPinjam($idAnggota);
	        $data['jmlpinjam'] = $this->peminjaman_model->cekJmlPinjaman($idAnggota);
	        if('IS_AJAX')
	        {
	            echo json_encode($data); //echo json string if ajax request
	            
	        }else{
	        	$this->template->load('kkp','sirkulasi/form_sirkulasi',$data);	
	        }
	    }else{
	    	$data['title'] = "";
	    	if('IS_AJAX')
	        {
	            echo json_encode($data); //echo json string if ajax request
	            
	        }else{
	        	$this->template->load('kkp','sirkulasi/form_sirkulasi',$data);	
	        }	
	        
	    }    
	}
	
	function tmp(){
		$kode = $this->input->post('item');
		$idAnggota = $this->input->post('anggota');
		$cek_buku = $this->peminjaman_model->cekAdaBukuTmp($kode);
		$cek_peminjaman = $this->peminjaman_model->cekJmlPinjamanTmp($idAnggota);
		foreach($cek_peminjaman as $ce):
		    $jmlp = $ce->jml_pinjam; 
		endforeach;
		$cek_aturan = $this->peminjaman_model->getAturanPinjam($idAnggota);
		foreach($cek_aturan as $a):
		    $aturanp = $a->jumlah_pinjaman; 
			$period = $a->periode_peminjaman;
		endforeach;
		if($jmlp < $aturanp && $cek_buku == NULL){
		
			$info=array(
	                    'id_anggota' => $this->input->post('anggota'),
						'id_aturan_pinjam' => $this->input->post('aturan'),
						'item_code' => $this->input->post('item'),
						'tgl_pinjam' => $this->input->post('pinjam'),
						'tgl_hrs_kembali' => $this->input->post('kembali')
	                	);
	        
			$this->peminjaman_model->simpanTmp($info);
			//redirect(site_url('sirkulasi'));
			$data['pesan'] = "0";
			if('IS_AJAX')
	        {
	            echo json_encode($data); //echo json string if ajax request
	            
	        }else{
	        	$this->template->load('kkp','sirkulasi/form_sirkulasi',$data);	
	        }
		}else{
			$data['pesan'] = "1";
	    	if('IS_AJAX')
	        {
	            echo json_encode($data); //echo json string if ajax request
	            
	        }else{
	        	$this->template->load('kkp','sirkulasi/form_sirkulasi',$data);	
	        }
		}	
	}

	function tmp_hapus(){
		$kode=$this->input->post('kode');
        $this->peminjaman_model->hapusTmp($kode);
        redirect(site_url('sirkulasi'));
	}

	function selesai(){
		$this->peminjaman_model->selesai();
		$this->peminjaman_model->hapusAllTmp();
		redirect(site_url('sirkulasi'));
	}

	function kembali(){
		$kode=$this->input->post('kode');
		$this->peminjaman_model->tglKembali($kode);
		redirect(site_url('sirkulasi'));
	}

}