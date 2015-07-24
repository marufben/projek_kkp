<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Arsip extends CI_Controller{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('my_helper');
		no_cache();
		if ($this->session->userdata('login') == NULL) {
			redirect(site_url('users'));
		}
		
		$this->load->model('arsip_model');
		$this->load->model('lampiranarsip_model');
	}

	public function index(){
		$data['title'] = 'Tambah Arsip';
		$data['perusahaan']=$this->arsip_model->get_table('perusahaan');
		$data['jenis']=$this->arsip_model->get_table('jenis_ijin');
		$this->template->load('kkp','arsip/form_arsip',$data);
	}
	public function kapal(){
		$data['title'] = 'Arsip';
		$id_perusahaan=$this->arsip_model->get_table_w('perusahaan',array('id'=>$this->uri->segment(3)));
		$data['nama_perusahaan']=count($id_perusahaan)> 0 ?$id_perusahaan[0]->nama:null;
		$data['kapal']=$this->arsip_model->get_table_w('kapal',array('id_perusahaan'=>$this->uri->segment(3)));
		$this->load->view('arsip/kapal',$data);
	}

	public function insert(){

		// directory name
		$rootdir = './public/FILES';
		$nama_perusahaan = $_POST['nama_perusahaan'];
		$nama_kapal = explode('|', $_POST['kapal']);
		$nama_kapal = $nama_kapal[1];
		$nama_jenis = explode('|', $_POST['jenis_ijin']);
		$nama_jenis = $nama_jenis[1];
		$tahun = date("Y", strtotime($_POST['expired']));

		$dir[] = $nama_perusahaan;
		$dir[] = $nama_kapal;
		$dir[] = $nama_jenis;
		$dir[] = $tahun;
		// directory name

        if(isset($_FILES['file_lampiran'])){

			foreach ($dir as $key => $value) {
				$rootdir = $rootdir.'/'.$value;
				if(is_dir($rootdir)==false){
					$old_umask = umask(0);
					mkdir("$rootdir", 0777);// Create directory if it does not exist
					umask($old_umask);

			    }
			}


			$config['upload_path'] = $rootdir;
			$config['allowed_types'] = "gif|jpg|png|jpeg|pdf|doc|xml";
			$config['max_size']	= '1000KB';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload');
	        $this->upload->initialize($config);


			$files = $_FILES;
		    $cpt = count($_FILES['file_lampiran']['name']);
		    for($i=0; $i<$cpt; $i++)
		    {           
		        $_FILES['file_lampiran']['name']= $files['file_lampiran']['name'][$i];
		        $_FILES['file_lampiran']['type']= $files['file_lampiran']['type'][$i];
		        $_FILES['file_lampiran']['tmp_name']= $files['file_lampiran']['tmp_name'][$i];
		        $_FILES['file_lampiran']['error']= $files['file_lampiran']['error'][$i];
		        $_FILES['file_lampiran']['size']= $files['file_lampiran']['size'][$i];    

		        $this->upload->do_upload('file_lampiran');

		  		$upload_data[$i] = $this->upload->data();
				$filename = $upload_data[$i]['file_name'];
		  		
		  		// insert table lmapiran_arsip
				$tbl_lampiran['no_ijin'] = $_POST['no_ijin'];
				$tbl_lampiran['nama_files'] = $filename;
				$tbl_lampiran['judul'] = $_POST['judul_files'];
				$data_lampiran[] = $tbl_lampiran;
		  		// insert table lmapiran_arsip

		    }

		    // $this->arsip_model->insert_arsip();
		    $this->lampiranarsip_model->insertbatchData($data_lampiran);
        }else{
        	echo "string";
        	echo "<script>alert('Belum memilih File');location='".base_url()."arsip';</script>";
        }

		// echo "<pre>";
		// var_dump($namafile);
		// echo "</pre>";
		// die();

	}
	
	public function edit_arsip($id){
		$data['title'] = 'Edit Arsip';
		$data['arsip']=$this->arsip_model->get_table_w('arsip',array('id'=>$this->uri->segment(3)));
		$data['perusahaan']=$this->arsip_model->get_table('perusahaan');
		$data['jenis']=$this->arsip_model->get_table('jenis_ijin');
		$this->template->load('kkp','arsip/edit_form_arsip',$data);
	}
	
	public function status_ijin(){
		$data['status']=$this->arsip_model->get_table_w('status_ijin',array('id_jenis'=>$this->uri->segment(3)));
		$this->load->view('arsip/status_ijin',$data);
	}
	

	

}

?>