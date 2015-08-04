<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Anggota extends MY_Controller{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('anggota_model');
		$this->set_identity('anggota', 'id', 'anggota_model', 'Anggota');
	}

	public function index()
	{
		$data['title'] = 'Master Anggota';
		$data['anggota'] = $this->anggota_model->getAll();

		$this->template->load('kkp','anggota/index',$data);
	}

	public function create()
	{
		if(isset($_POST['simpan'])){
			$data = $this->anggota_model->get_arraydata_fields();
			$model = get_object_vars($data);

			$this->anggota_model->insert($model);
			redirect(site_url('anggota'));
		}else{
			$models = $this->anggota_model->get_arraydata_fields();
			$data['anggota'] = $models;
			$data['title'] = 'Tambah Data';
			$this->template->load('kkp','anggota/create',$data);		
		}
	}

	public function edit($id='')
	{
		if(isset($_POST['simpan'])){
			$data = $this->anggota_model->get_arraydata_fields();
			$model = get_object_vars($data);
			$this->anggota_model->update($model);
			redirect(site_url('anggota'));
		}else{
			$models = $this->anggota_model->get_by_pk($id);
			$data['anggota'] = $models;
			$data['title'] = 'Edit Data';
			$this->template->load('kkp','anggota/create',$data);		
		}
	}


}