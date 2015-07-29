<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Box extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('my_helper');
		no_cache();
		if ($this->session->userdata('login') == NULL) {
			redirect(site_url('users'));
		}

		$this->load->model('lemari_model');
		$this->load->model('rak_model');
		$this->load->model('box_model');
	}

	public function index()
	{
		$data['title'] = 'Master Box Arsip';
		$sql = '
				select 
					c.id,
					a.urutan,
					b.no,
					c.no as nobox
				from 
					rak as a,
					lemari as b,
					box as c
				where
					a.id_lemari = b.id and
					a.id = c.id_rak
				';
		$data['box'] = $this->box_model->custom_query($sql);
		$this->template->load('kkp', 'box/index', $data);
	}

	public function create()
	{
		if(isset($_POST['id'])){
			$data = $this->box_model->get_arraydata_fields();
			$model = get_object_vars($data);
			$this->box_model->insert($model);
			redirect(site_url('box'));
		}else{
			$data['title'] = 'Tambah Master Box';
			$data['box'] = $this->box_model->get_arraydata_fields();
			$data['lemari'] = $this->lemari_model->getAll();
			$data['rak'] = $this->rak_model->getAll();
			$this->template->load('kkp', 'box/input',$data);
		}
	}

	public function edit($id='')
	{
		if(isset($_POST['id'])){
			$data = $this->box_model->get_arraydata_fields();
			$model = get_object_vars($data);
			$this->box_model->update($model);
			redirect(site_url('box'));
		}else{
			$data['title'] = 'Ubah Master Box';
			$data['box'] = $this->box_model->get_by_pk($id);
			$data['lemari'] = $this->lemari_model->getAll();
			$data['rak'] = $this->rak_model->getAll();
			$this->template->load('kkp', 'box/input',$data);
		}
	}

	public function delete()
	{
		$id = $this->uri->segment('3');
		$this->box_model->delete($id);
		redirect(site_url('box'));
	}

	public function cekrak()
	{
		$id = $_POST['id_lemari'];
		$data = $this->box_model->cekrak($id);
		$html = '<option>--Pilih--</option>';
		foreach ($data as $key => $value) {
			$html .= '<option value="'.$value->id.'">'.$value->urutan.'</option>';
		}
		echo $html;
	}
}