<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('my_helper');
		no_cache();
		// echo "<pre>";
		// var_dump($this->session->userdata('login'));
		// echo "</pre>";
		// die();
		if ($this->session->userdata('login') == NULL) {
			redirect(site_url('users'));
		}
	}

	public function index()
	{
		$data['title'] = 'Halaman Utama';
		$data['dir'] = $this->dirFiles();
		
		$this->template->load('kkp','home/frame',$data);
	}

	public function frame()
	{
		// var_dump($_POST);
		// die();
		if(isset($_POST['file'])){
			$data['no'] = $_POST['pt'];
			$data['nama'] = $_POST['file'];
			$data['title'] = '';
			$this->template->load('def','home/index',$data);
		}

	}

	public function dirFiles()
	{

		if(!isset($_POST['par'])){
			$temp_dir = "public/FILES/";
			$dir = array_diff(scandir($temp_dir), array('..', '.'));
			return $dir;
		}else{
			$temp_dir = "public/FILES/".$_POST['par'];
			$dir = array_diff(scandir($temp_dir), array('..', '.'));
			echo json_encode($dir);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url("users"));
	}

}