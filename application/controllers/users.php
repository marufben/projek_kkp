<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('my_helper');
		no_cache();

		if ($this->session->userdata('login') != NULL) {
			redirect(site_url());
		}

		$this->load->model('users_model');
		$this->set_identity('unit_kerja', 'id', 'users_model', 'Users');
	}

	public function index()
	{
		$data['title'] = 'Halaman Login';
		$this->template->load('login', 'login/index', $data);
	}

	public function cek()
	{
		$user = $this->input->post("user");
		$pass = $this->input->post("pass");
		
		$query = $this->users_model->cek_login($user, $pass);
		
		// echo "<pre>";
		// var_dump($query);
		// echo "</pre>";
		// die();

		if($query)
		{
			
			foreach($query as $key => $row){
				$sess['login'] = $user;
				$sess['level'] = $row->id_group;
			}

			$this->session->set_userdata($sess);			
			redirect(site_url());
		}
		else
		{
			redirect("login");
		}
		
	}
}