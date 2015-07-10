<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rules_c extends MY_Controller{
	function __construct()
	{
		parent::__construct();
		// if ($this->session->userdata('login') == NULL) {
			// redirect(site_url('login'));
		// }

		$this->load->model('group_c_model');
		$this->load->model('menu_c_model');
		$this->load->model('rules_c_model');
		$this->set_identity('rules_user', 'id', 'rules_c_model', 'Group');
	}

	function index()
	{
		$data['title'] = 'Master Hak Akses';
		$data['rules'] = $this->rules_c_model->getRules();
		$this->template->load('kkp', 'master_rules/index', $data);
	}

	function add()
	{
		$data['title'] = 'Tambah Data Master Rules Pengguna';
		$data['group'] = $this->rules_c_model->getGroupRules();
		$data['menu'] = $this->menu_c_model->getMenu();

		$this->template->load('kkp', 'master_rules/add', $data);
	}

	function create()
	{
		$id = $this->input->post('id');
		$tampil = $this->input->post('tampil');
		$tambah = $this->input->post('tambah');
		$pribadi = $this->input->post('pribadi');
		$update = $this->input->post('update');
		$hapus = $this->input->post('hapus');
		$menu_id = $this->input->post('menu_id');

		$group_id = $this->input->post('group_id');

		foreach ($id as $key => $value) {
			$data['loads'] = $tampil[$key];
			$data['creates'] = $tambah[$key];
			$data['private'] = $pribadi[$key];
			$data['updates'] = $update[$key];
			$data['deletes'] = $hapus[$key];
			$data['menu_id'] = $menu_id[$key];
			$data['group_id'] = $group_id;
			
			$allvalue[] = $data;
			$data = array();
		}
		// echo "<pre>";
		// var_dump($allvalue);
		// echo "</pre>";
		// die();
		$this->rules_c_model->create($allvalue);
		redirect(site_url('rules_c'));
	}

	function edit()
	{
		$group_id = $this->uri->segment(3);

		$data['title'] = 'Edit Master Hak Akses';
		$data['rules'] = $this->rules_c_model->editRules($group_id);
		$data['menu'] = $this->menu_c_model->getMenu();
		$data['group'] = $this->group_c_model->getGroup();
		$data['group_id'] = $group_id;
		
		$this->template->load('admin', 'master_rules/edit', $data);
	}
	
	function update()
	{
		
		$id = $this->input->post('id');

		//update
		$tampil_e = $this->input->post('tampil_e');
		$tambah_e = $this->input->post('tambah_e');
		$pribadi_e = $this->input->post('pribadi_e');
		$update_e = $this->input->post('updates_e');
		$hapus_e = $this->input->post('hapus_e');
		$menu_id_e = $this->input->post('menu_id_e');

		//insert
		$tampil = $this->input->post('tampil');
		$tambah = $this->input->post('tambah');
		$pribadi = $this->input->post('pribadi');
		$up = $this->input->post('updates');
		$hapus = $this->input->post('hapus');
		$menu_id = $this->input->post('menu_id');

		$group_id = $this->input->post('group_id');

		//insert atau update data
		$allInsert = array();
		$allUpdate = array();

		$i=0;
		foreach ($id as $key => $value) {
			if($value == ''){
				$data['deletes'] = $hapus[$i];
				$data['updates'] = $up[$i];
				$data['private'] = $pribadi[$i];
				$data['creates'] = $tambah[$i];
				$data['loads'] = $tampil[$i];
				$data['menu_id'] = $menu_id[$i];
				$data['group_id'] = $group_id;
				
				$allInsert[] = $data;
				$data = array();

				$i++;
			}else{

				$data['id'] = $value;
				$data['menu_id'] = $menu_id_e[$key];
				$data['group_id'] = $group_id;
				$data['loads'] = $tampil_e[$key];
				$data['creates'] = $tambah_e[$key];
				$data['private'] = $pribadi_e[$key];
				$data['updates'] = $update_e[$key];
				$data['deletes'] = $hapus_e[$key];

				$allUpdate[] = $data;
				$data = array();
				//Update Batch Gak Bisa di Postgres
			}
		}

		//hapus data lama
		$old = $this->rules_c_model->editRules($group_id);
		
		$a=0;
		foreach ($old as $key => $value) {
			if($value->id == $id[$a]){
				// echo $id[$a]."<br>";
				$a++;
			}else{
				// echo $value->id."<br>";
				$this->rules_c_model->updateRules('delete', $delete='', $value->id);
			}
		}

		if(sizeof($allInsert) > 0){
			$this->rules_c_model->updateRules('insert', $allInsert);
			// echo "bisa insert";
		}

		if(sizeof($allUpdate) > 0){
			$this->rules_c_model->updateRules('update', $allUpdate);
			// echo "bisa update";
		}

		redirect(site_url('rules_c'));
	}
}