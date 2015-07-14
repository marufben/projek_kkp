<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PersyaratanIzin_Model extends MY_Model{
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'persyaratan_ijin';
		$this->primary_key = 'id';
	}

	public function attribute_labels()
	{
		return array(
					'id' => 'Id Table',
					'id_jenis'=>'Id Jenis',
					'id_status'=>'Id Status',
					'kode_syarat'=>'Kode Syarat',
					'nama_syarat'=>'Nama',
					'keterangan'=>'Keterangan'
			);
	}
}