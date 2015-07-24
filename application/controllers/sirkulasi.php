<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sirkulasi extends CI_Controller{
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
		
		$this->template->load('kkp','sirkulasi/form_sirkulasi');
	}

	

}