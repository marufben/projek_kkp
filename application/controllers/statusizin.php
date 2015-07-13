<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StatusIzin extends MY_Controller{
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$data['title'] = 'Master Status Izin';
		$this->template->load('kkp', 'statusizin/index',$data);
	}
}