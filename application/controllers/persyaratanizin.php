<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PersyaratanIzin extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('persyaratanizin_model');
		$this->load->model('statusizin_model');
		$this->load->model('jenisizin_model');
        $this->set_identity('persyaratanizin', 'id', 'persyaratanizin_model', 'Persyaratan Izin');
	}

	public function index()
	{
		$data['title'] = 'Master Persyaratan Izin';
		$data['model'] = $this->persyaratanizin_model->getAll();
		$this->template->load('kkp', 'syaratizin/index',$data);
	}

	public function create()
	{
		if(isset($_POST['id'])){
			$data = $this->persyaratanizin_model->get_arraydata_fields();
			$model = get_object_vars($data);
			$this->persyaratanizin_model->insert($model);
			redirect(site_url('persyaratanizin'));
		}else{
			$data['title'] = 'Tambah Persyaratan Izin';
			$data['status'] = $this->statusizin_model->getAll();
			$data['jenis'] = $this->jenisizin_model->getAll();
			$data['model'] = $this->persyaratanizin_model->get_arraydata_fields();
			$this->template->load('kkp', 'syaratizin/input',$data);
		}
	}

	public function edit($id='')
	{
		if(isset($_POST['id'])){
			$data = $this->persyaratanizin_model->get_arraydata_fields();
			$model = get_object_vars($data);
			$this->persyaratanizin_model->update($model);
			redirect(site_url('persyaratanizin'));
		}else{
			$data['title'] = 'Ubah Persyaratan Izin';
			$data['status'] = $this->statusizin_model->getAll();
			$data['jenis'] = $this->jenisizin_model->getAll();
			$data['model'] = $this->persyaratanizin_model->get_by_pk($id);
			$this->template->load('kkp', 'syaratizin/input',$data);
		}
	}

	public function delete()
	{
		$id = $this->uri->segment('3');
		$this->persyaratanizin_model->delete($id);
		redirect(site_url('persyaratanizin'));
	}

	public function getStatus()
	{
		$jenis = $_POST['id_jenis'];
		$q = 'select * from status_ijin where id_jenis = '.$jenis;
		$data = $this->statusizin_model->custom_query($q);
		$html = '<option value="0">--Pilih--</option>';
		foreach ($data as $key => $value) {
			$html .= '<option value="'.$value->id.'">'.$value->nama.'</option>';
		}

		echo $html;
	}

	public function cek()
	{
		$status = $_POST['id_status'];
		$jenis = $_POST['id_jenis'];
		$q = 'select * from persyaratan_ijin where id_jenis = '.$jenis.' and id_status = '.$status.' order by id desc';
		$data = $this->persyaratanizin_model->custom_query($q);
		if(sizeof($data)>0){
			$no = (int)$data[0]->kode_syarat;
			$no = (strlen($no) <= 1)?'0'.($no+01):($no+01);
			echo $no;
		}else{
			echo "00";
		}
	}
}