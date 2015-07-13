<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StatusIzin_Model extends MY_Model{
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'status_ijin';
		$this->primary_key = 'id';
	}

	public function attribute_labels()
	{
		return array(
					'id' => 'Id Table',
					'status_ijin'=>'Status Izin',
					'keterangan'=>'Keterangan'
			);
	}
}