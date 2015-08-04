<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Anggota_Model extends MY_Model{
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'anggota';
		$this->primary_key = 'id';
	}

	public function attribute_labels()
	{
		return array(
			'id' => 'Id',
			'nama' => 'Nama Anggota',
			'unit_kerja' => 'Unit Kerja'
			);
	}
}