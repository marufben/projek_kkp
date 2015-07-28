<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lemari extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('my_helper');
		no_cache();
		if ($this->session->userdata('login') == NULL) {
			redirect(site_url('users'));
		}

		$this->load->model('lemari_model');
	}

	public function index()
	{
		$data['title'] = 'Master Data Lemari';
		$data['lemari'] = $this->lemari_model->getAll();
		$this->template->load('kkp', 'lemari/index', $data);
	}

	public function create()
	{
		if(isset($_POST['id'])){
			$data = $this->lemari_model->get_arraydata_fields();
			$model = get_object_vars($data);
			$this->lemari_model->insert($model);
			redirect(site_url('lemari'));
		}else{
			$data['title'] = 'Tambah Master Lemari';
			$data['lemari'] = $this->lemari_model->get_arraydata_fields();
			$this->template->load('kkp', 'lemari/input',$data);
		}
	}

	public function edit($id='')
	{
		if(isset($_POST['id'])){
			$data = $this->lemari_model->get_arraydata_fields();
			$model = get_object_vars($data);
			$this->lemari_model->update($model);
			redirect(site_url('lemari'));
		}else{
			$data['title'] = 'Ubah Master Lemari';
			$data['lemari'] = $this->lemari_model->get_by_pk($id);
			$this->template->load('kkp', 'lemari/input',$data);
		}
	}

	public function delete()
	{
		$id = $this->uri->segment('3');
		$this->lemari_model->delete($id);
		redirect(site_url('lemari'));
	}
}