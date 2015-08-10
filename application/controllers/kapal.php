<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kapal extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('my_helper');
		no_cache();
		if ($this->session->userdata('login') == NULL) {
			redirect(site_url('users'));
		}
	}

	public function index()
	{
		$data['title'] = 'Data Kapal';
		$data['kapal'] = '';
		$this->template->load('kkp', 'kapal/index', $data);
	}
}