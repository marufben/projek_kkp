<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller{
	public function __construct()
	{
		parent::__construct();

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
		
		$query = $this->login_model->cek_login($user, $pass);
		
		if($query)
		{
			
			foreach($query as $key => $row){
				$sess['login'] = $user;
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