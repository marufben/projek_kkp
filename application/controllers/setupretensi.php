<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class SetupRetensi extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('my_helper');
		no_cache();

		if ($this->session->userdata('login') == NULL) {
			redirect(site_url());
		}

		$this->load->model('setupretensi_model');
		$this->load->model('retensi_model');
		$this->load->model('bapretensi_model');
		$this->load->model('arsip_model');
	}

	public function index()
	{
		$data['title'] = 'Setup Retensi';
		$data['list'] = $this->setupretensi_model->getAll();
		$this->template->load('kkp', 'retensi/index', $data);
	}

	public function create()
	{
		if(isset($_POST['id'])){
			$data = $this->setupretensi_model->get_arraydata_fields();

			if($data->status == 1){
				$sql = 'update retensi set status = 2 where status = 1';
				$this->setupretensi_model->custom_query_data($sql);
			}

			$model = get_object_vars($data);
			$this->setupretensi_model->insert($model);
			redirect(site_url('setupretensi'));
		}else{
			$data['title'] = 'Tambah Retensi';
			$data['setup'] = $this->setupretensi_model->get_arraydata_fields();
			$this->template->load('kkp', 'retensi/input',$data);
		}
	}

	public function edit($id='')
	{
		if(isset($_POST['id'])){
			$data = $this->setupretensi_model->get_arraydata_fields();
			
			if($data->status == 1){
				$sql = 'update retensi set status = 2 where status = 1';
				$this->setupretensi_model->custom_query_data($sql);
			}

			$model = get_object_vars($data);
			$this->setupretensi_model->update($model);
			redirect(site_url('setupretensi'));
		}else{
			$data['title'] = 'Tambah Retensi';
			$data['setup'] = $this->setupretensi_model->get_by_pk($id);
			$this->template->load('kkp', 'retensi/input',$data);
		}
	}

	public function daftar()
	{
		$data['title'] = 'Filter Daftar Retensi Arsip';
		$data['list'] = $this->setupretensi_model->findActive();
		$this->template->load('kkp', 'retensi/daftar', $data);
	}

	public function cari()
	{
		$tahun = $_POST['tahun'];
		$retensi = $this->setupretensi_model->findActive();

		$data = array();
		$data['tahun'] = $tahun;
		$data['batas'] = (int)$retensi->batas;
		$data['retensi'] = $data['tahun']-$data['batas'];

		$sql = "
				SELECT
					*
				FROM
					arsip
				WHERE 
					tgl_expired like '%".$data['retensi']."%'
				";
		// echo $sql;
		// die();

		$data['pesan'] = "Menampilkan data dari tahun";
		$data['result'] = $this->setupretensi_model->custom_query($sql);
		$data['html'] = $this->load->view('retensi/result', $data, true);
		// $data['html'] = $this->template->load('kkp', 'retensi/result', $data);

		echo json_encode($data);
	}

	public function retensidata()
	{
		$no_bap = $_POST['no_bap'];
		$tgl = $_POST['tgl'];
		$pejabat = $_POST['pejabat'];

		$insert = array(
			'no_bap' => $no_bap,
			'tgl_bap' => $tgl,
			'pejabat' => $pejabat
			);
		$this->bapretensi_model->insert($insert);
		$id_bap = $this->bapretensi_model->last_id();

		foreach ($_POST['id_arsip'] as $key => $val) {

			$arsip = $this->arsip_model->getWhere('id', $val);
			$arsip = $arsip->result_array()[0];
			$arsip['id_arsip'] = $val;
			$arsip['id_bap'] = $id_bap->id;

			unset($arsip['id']);
			// $fields[] = $arsip;

			$this->retensi_model->insert($arsip);
			// $this->arsip_model->delete($val);
			echo $this->db->last_query()."<br>";

		}
		
		// echo "<pre>";
		// var_dump($fields);
		// echo "</pre>";

	}
}
