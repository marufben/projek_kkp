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

	public function all()
	{
		$data['title'] = 'Daftar Semua Arsip';
		$this->template->load('kkp', 'retensi/all', $data);
	}

	public function datatable()
	{
		$requestData= $_REQUEST;
		$columns = array( 
			0 =>'id', 
			1 => 'kode_arsip',
			2 => 'tgl_terbit',
			3 => 'tgl_expired'
		);

		// getting total number records without any search
		$sql = "SELECT id, kode_arsip, tgl_terbit, tgl_expired ";
		$sql.=" FROM arsip";

		$query = $this->arsip_model->custom_query_data($sql);

		$totalData = $query->num_rows();
		$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

		if( !empty($requestData['search']['value']) ) {
			// if there is a search parameter
			$sql = "SELECT id, kode_arsip, tgl_terbit, tgl_expired ";
			$sql.=" FROM arsip";
			$sql.=" WHERE kode_arsip LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
			$sql.=" OR tgl_terbit LIKE '".$requestData['search']['value']."%' ";
			$sql.=" OR tgl_expired LIKE '".$requestData['search']['value']."%' ";

			$query = $this->arsip_model->custom_query_data($sql);

			$totalFiltered = $query->num_rows(); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 
			
			$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
			$query = $this->arsip_model->custom_query_data($sql);
			
		} else {	
			$sql = "SELECT id, kode_arsip, tgl_terbit, tgl_expired ";
			$sql.=" FROM arsip";
			$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
			$query = $this->arsip_model->custom_query_data($sql);
		}

		$data = array();

		$no = $requestData['start'];
		foreach ($query->result() as $key => $value) {
			$no++;
			$nestedData=array(); 
			$nestedData[] = $no;
			// $nestedData[] = $value->id;
			$nestedData[] = $value->kode_arsip;
			$nestedData[] = date("d-m-Y", strtotime($value->tgl_terbit));
			$nestedData[] = date("d-m-Y", strtotime($value->tgl_expired));
			$nestedData[] = '<a class="btn btn-default">Detail</a>';
			
			$data[] = $nestedData;
		}

		$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $data   // total data array
					);

		echo json_encode($json_data);
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
			$this->arsip_model->delete($val);
			// echo $this->db->last_query()."<br>";

		}
		redirect(site_url('setupretensi/daftar'));
		// echo "<pre>";
		// var_dump($fields);
		// echo "</pre>";

	}

	public function sudah()
	{
		$data['title'] = 'Daftar Arsip Sudah Retensi';
		$sql = '
				SELECT 
					a.*,
					b.no_bap
				FROM 
					dropretensi as a
				INNER JOIN
					bap_retensi as b
				ON
					b.id = a.id_bap';
		$data['sudah'] = $this->retensi_model->custom_query($sql);
		$this->template->load('kkp', 'retensi/sudah', $data);
	}
}
