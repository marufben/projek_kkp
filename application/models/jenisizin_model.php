<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JenisIzin_Model extends MY_Model{
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'jenis_ijin';
		$this->primary_key = 'id';
	}

	public function attribute_labels()
	{
		return array(
			'id'=>'Id Table',
			'kode'=>'Kode Izin',
			'singkatan'=>'Singakatan',
			'keterangan'=>'Keterangan'
			);
	}
}