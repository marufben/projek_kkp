<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lemari_Model extends MY_Model{
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'lemari';
		$this->primary_key = 'id';
	}

	public function attribute_labels()
	{
		return array(
			'id' => 'Id Table',
			'no' => 'No Lemari',
			'ket' => 'Keterangan',
			'jml_rak' => 'Jumlah Rak'
		);
	}
}