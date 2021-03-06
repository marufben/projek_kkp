<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_c extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('my_helper');
		no_cache();
		if ($this->session->userdata('login') == NULL) {
			redirect(site_url('users'));
		}

		$this->load->model('group_c_model');
		$this->set_identity('group_user', 'id', 'group_c_model', 'Group');
	}

	function index()
	{
		$data['title'] = 'Master Group Pengguna';
		$data['group'] = $this->group_c_model->getGroup();
		$this->template->load('kkp', 'master_group/index', $data);
	}

	function add()
	{
		$data['title'] = "Tambah Data Master Group";
		$this->template->load('kkp', 'master_group/add', $data);
	}

	function create()
	{
		$data = $this->group_c_model->get_data_fields();
		$model = get_object_vars($data);
		$this->group_c_model->insert($model);
		redirect(site_url('group_c'));
	}

	function edit($id)
	{
		$data['title'] = "Edit Data Master Menu";
		$data['group'] = $this->group_c_model->getGroupById($id);
		$this->template->load('kkp', 'master_group/edit', $data);
 	}

 	function update()
 	{
 		$data = $this->group_c_model->get_data_fields();
		$model = get_object_vars($data);
		$this->group_c_model->updateGroup($model);

		redirect(site_url('group_c'));
 	}

 	function delete($id)
 	{
 		$this->group_c_model->deleteGroup($id);
		redirect(site_url('group_c'));
 	}
}