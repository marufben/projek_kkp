<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rak extends MY_Controller{
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
	}

	public function index()
	{
		$data['title'] = 'Master Data Rak';
		$sql = '
				select 
					a.id,
					a.urutan,
					b.no
				from 
					rak as a,
					lemari as b
				where
					a.id_lemari = b.id
				order by a.urutan asc
				';
		$data['rak'] = $this->rak_model->custom_query($sql);
		
		$this->template->load('kkp', 'rak/index', $data);
	}

	public function create()
	{
		if(isset($_POST['id'])){
			$data = $this->rak_model->get_arraydata_fields();
			$model = get_object_vars($data);
			$this->rak_model->insert($model);
			redirect(site_url('rak'));
		}else{
			$data['title'] = 'Tambah Master Lemari';
			$data['rak'] = $this->rak_model->get_arraydata_fields();
			$data['lemari'] = $this->lemari_model->getAll();
			$this->template->load('kkp', 'rak/input',$data);
		}
	}

	public function edit($id='')
	{
		if(isset($_POST['id'])){
			$data = $this->rak_model->get_arraydata_fields();
			$model = get_object_vars($data);
			$this->rak_model->update($model);
			redirect(site_url('rak'));
		}else{
			$data['title'] = 'Ubah Master Lemari';
			$data['rak'] = $this->rak_model->get_by_pk($id);
			$data['lemari'] = $this->lemari_model->getAll();
			$this->template->load('kkp', 'rak/input',$data);
		}
	}

	public function delete()
	{
		$id = $this->uri->segment('3');
		$this->rak_model->delete($id);
		redirect(site_url('rak'));
	}

	public function cekrak()
	{
		$id = $_POST['id_lemari'];

		// $lemari = $this->lemari_model->get_by_pk($id); // n'ga dipakai
		// $max = $lemari->jml_rak; // n'ga dipakai

		$raks = $this->lemari_model->custom_query('select urutan as urut from rak where id_lemari = \''.$id.'\'');
		$c = sizeof($raks);

		$row = array();
		$new = array();
		$hasil = '';
		
		$rak = (int)1;
		
		
		if($c > 0){
		
			foreach ($raks as $key => $value) {
				$row[] = (int)$value->urut;
			}

			// 
			// pengecekan dengan jumlah maxximum rak
			// for ($i=0; $i < $max; $i++) { 
			// 	$new[] = (int)($i+1);
			// }

			// $res = array_diff($new, $row);
			// foreach ($res as $k) {
			// 	$hasil = $k;
			// 	break;
			// }
			// pengecekan dengan jumlah maxximum rak

			for ($i=0; $i < 100; $i++) { 
				$new[] = (int)($i+1);
			}
			$res = array_diff($new, $row);
			foreach ($res as $key) {
				# code...
				$hasil = $key;
				break;
			}
			
			$rak = (int)$hasil;
		}

		// $status = ($c == $max)?"true":"false";

		$result = array();
		// $result['max'] = $max;
		$result['rak'] = $rak;
		// $result['av'] = $raks;
		// $result['full'] = $status;

		echo json_encode($result);
	}
}