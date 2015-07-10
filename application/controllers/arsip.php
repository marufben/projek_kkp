<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arsip extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('arsip_model');
	}

	public function index(){
		$data['perusahaan']=$this->arsip_model->get_table('perusahaan');
		$this->template->load('kkp','arsip/form_arsip',$data);
	}
	public function kapal(){
		$id_perusahaan=$this->arsip_model->get_table_w('perusahaan',array('id'=>$this->uri->segment(3)));
		// echo count($id_perusahaan);die();

		$data['nama_perusahaan']=count($id_perusahaan)> 0 ?$id_perusahaan[0]->nama:null;
		$data['kapal']=$this->arsip_model->get_table_w('kapal',array('id_perusahaan'=>$this->uri->segment(3)));
		$this->load->view('arsip/kapal',$data);
	}
	public function insert(){
		$config['upload_path'] = './public/';
		$config['allowed_types'] = "gif|jpg|png|jpeg|pdf|doc|xml";
		$config['max_size']	= '1000KB';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file_lampiran'))
		{
			$error = array('error' => $this->upload->display_errors());

			// $this->load->view('upload_form', $error);
		}
		else
		{
			$upload_data = $this->upload->data(); 
			$file_name =   $upload_data['file_name'];
			$this->arsip_model->insert_arsip();

			// $this->load->view('upload_success', $data);
		}
	}
	// public function list_arsip(){
		
	// }
	

	

}

?>