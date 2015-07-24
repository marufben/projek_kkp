<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JenisIzin extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('my_helper');
		no_cache();
		if ($this->session->userdata('login') == NULL) {
			redirect(site_url('users'));
		}
		$this->load->model('jenisizin_model');
        $this->set_identity('jenisizin', 'id', 'jenisizin_model', 'Status Izin');

	}

	public function index()
	{
		$data['title'] = 'Master Jenis Izin';
		$data['model'] = $this->jenisizin_model->getAll();
		$this->template->load('kkp', 'jenisizin/index',$data);
	}

	public function create()
	{
		if(isset($_POST['id'])){
			$data = $this->jenisizin_model->get_arraydata_fields();
			$model = get_object_vars($data);
			$this->jenisizin_model->insert($model);
			redirect(site_url('jenisizin'));
		}else{
			$data['title'] = 'Tambah Status Izin';
			$data['model'] = $this->jenisizin_model->get_arraydata_fields();
			$this->template->load('kkp', 'jenisizin/input',$data);
		}
	}

	public function edit($id='')
	{
		if(isset($_POST['id'])){
			$data = $this->jenisizin_model->get_arraydata_fields();
			$model = get_object_vars($data);
			$this->jenisizin_model->update($model);
			redirect(site_url('jenisizin'));
		}else{
			$data['title'] = 'Ubah Status Izin';
			$data['model'] = $this->jenisizin_model->get_by_pk($id);
			$this->template->load('kkp', 'jenisizin/input',$data);
		}
	}

	public function delete()
	{
		$id = $this->uri->segment('3');
		$this->jenisizin_model->delete($id);
		redirect(site_url('jenisizin'));
	}
}