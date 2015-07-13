<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
	public function __construct()
	{
		parent::__construct();

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
		$temp_dir = "public/FILES/";
		$dir = array_diff(scandir($temp_dir), array('..', '.'));

		return $dir;
	}

}