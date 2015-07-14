<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StatusIzin extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('statusizin_model');
		$this->load->model('jenisizin_model');
        $this->set_identity('statusizin', 'id', 'statusizin_model', 'Status Izin');
	}

	public function index()
	{
		$data['title'] = 'Master Status Izin';
		$data['status'] = $this->statusizin_model->getAll();
		$this->template->load('kkp', 'statusizin/index',$data);
	}

	public function create()
	{
		if(isset($_POST['id'])){
			$data = $this->statusizin_model->get_arraydata_fields();
			$model = get_object_vars($data);
			$this->statusizin_model->insert($model);
			redirect(site_url('statusizin'));
		}else{
			$data['title'] = 'Tambah Status Izin';
			$data['status'] = $this->statusizin_model->get_arraydata_fields();
			$data['jenis'] = $this->jenisizin_model->getAll();
			$this->template->load('kkp', 'statusizin/input',$data);
		}
	}

	public function edit($id='')
	{
		if(isset($_POST['id'])){
			$data = $this->statusizin_model->get_arraydata_fields();
			$model = get_object_vars($data);
			$this->statusizin_model->update($model);
			redirect(site_url('statusizin'));
		}else{
			$data['title'] = 'Ubah Status Izin';
			$data['status'] = $this->statusizin_model->get_by_pk($id);
			$data['jenis'] = $this->jenisizin_model->getAll();
			$this->template->load('kkp', 'statusizin/input',$data);
		}
	}

	public function delete()
	{
		$id = $this->uri->segment('3');
		$this->statusizin_model->delete($id);
		redirect(site_url('statusizin'));
	}

	public function cek()
	{
		$jenis = $_POST['id_jenis'];
		$q = 'select * from status_ijin where id_jenis = '.$jenis.' order by id desc';
		$data = $this->statusizin_model->custom_query($q);
		if(sizeof($data)>0){
			$no = (int)$data[0]->kode_no;
			$no = (strlen($no) <= 1)?'0'.($no+01):($no+01);
			echo $no;
		}else{
			echo "00";
		}
	}
}