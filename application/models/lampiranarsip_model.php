<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LampiranArsip_Model extends MY_Model{
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'lampiran_arsip';
		$this->primary_key = 'id';
	}

	public function attribute_labels()
	{
		return array(
			'id' => 'Id Table',
			'no_ijin' => 'No Izin',
			'nama_files' => 'Nama File',
			'judul' => 'Judul',
			'keterangan' => 'Keterangan',
			);
	}
}