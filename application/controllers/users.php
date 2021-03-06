<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('my_helper');
		no_cache();


		$this->load->model('users_model');
		$this->load->model('group_c_model');
		$this->set_identity('unit_kerja', 'id', 'users_model', 'Users');
	}

	public function index()
	{
		if ($this->session->userdata('login') != NULL) {
			redirect(site_url());
		}
		$data['title'] = 'Halaman Login';
		$this->template->load('login', 'login/index', $data);
	}

	public function cek()
	{
		$user = $this->input->post("user");
		$pass = $this->input->post("pass");
		
		$query = $this->users_model->cek_login($user, $pass);

		if($query)
		{
			$sess=array();
			foreach($query as $key => $row){
				$sess['login'] = $user;
				$sess['id'] = $row->id;
				$sess['poto'] = $row->poto;
				$sess['level'] = $row->id_group;
			}

			$this->session->set_userdata($sess);	
			// echo "<pre>";
			// var_dump($this->session->userdata('login'));
			// echo "</pre>";
			// die();
			redirect(site_url());
		}
		else
		{
			redirect("login");
		}
		
	}

	// daftar pengguna
	public function lists()
	{
		$data['title'] = 'Daftar Pengguna';
		$data['users'] = $this->users_model->getAll();
		
		$this->template->load('kkp', 'login/list', $data);
	}

	public function create()
	{
		$dir = './public/USER';
		if(is_dir($dir) == FALSE){
			$old_umask = umask(0);
			mkdir("$dir", 0777);// Create directory if it does not exist
			umask($old_umask);
		}

		$config['upload_path'] = $dir;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->upload->initialize($config);

		if(isset($_POST['id'])){

			if(!$this->upload->do_upload('poto')){
				$error = $this->upload->display_errors();
				echo '<script>alert("'.$error.'");location="'.base_url('users/create').'";</script>';
				exit;
			}

			$poto = $this->upload->data();
			$data = $this->users_model->get_arraydata_fields();
			$data->password = md5($_POST['password']);
			$data->poto = $poto['file_name'];
			$model = get_object_vars($data);
			// var_dump($model);
			$this->users_model->insert($model);
			redirect(site_url('users/lists'));

		}else{
			$data['title'] = 'Tambah Master Lemari';
			$data['user'] = $this->users_model->get_arraydata_fields();
			$data['group'] = $this->group_c_model->getAll();
			$this->template->load('kkp', 'login/input',$data);
		}
	}

	public function edit($id='')
	{
		$dir = './public/USER';
		if(is_dir($dir) == FALSE){
			$old_umask = umask(0);
			mkdir("$dir", 0777);// Create directory if it does not exist
			umask($old_umask);
		}

		$config['upload_path'] = $dir;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->upload->initialize($config);

		if(isset($_POST['id'])){
			if(!$this->upload->do_upload('poto')){
				$error = $this->upload->display_errors();
				echo '<script>alert("'.$error.'");location="'.base_url('users/create').'";</script>';
				exit;
			}

			$poto = $this->upload->data();
			$data = $this->users_model->get_arraydata_fields();
			$data->password = md5($_POST['password']);
			$data->poto = $poto['file_name'];
			$model = get_object_vars($data);
			// var_dump($model);
			$this->users_model->update($model);
			redirect(site_url('users/lists'));

		}else{
			$data['title'] = 'Ubah Master Lemari';
			$data['user'] = $this->users_model->get_by_pk($id);
			$data['group'] = $this->group_c_model->getAll();
			$this->template->load('kkp', 'login/input',$data);
		}
	}

	public function detail($id='')
	{
		$id = ($id == '')?$this->session->userdata('id'):$id;
		// echo $id;
		$data['title'] = 'Detail Pengguna';
		$this->template->load('kkp', 'login/detail', $data);
	}

	public function delete()
	{
		$id = $this->uri->segment('3');
		$this->users_model->delete($id);
		redirect(site_url('users/lists'));
	}
}