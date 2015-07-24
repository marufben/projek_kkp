<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retensi extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('my_helper');
		no_cache();
		if ($this->session->userdata('login') == NULL) {
			redirect(site_url('users'));
		}
		// $this->load->model('arsip_model');
	}

	public function index(){
		// $data['perusahaan']=$this->arsip_model->get_table('perusahaan');
		// $data['jenis']=$this->arsip_model->get_table('jenis_ijin');
		$this->template->load('kkp','retensi/index');
	}
	
}

?>