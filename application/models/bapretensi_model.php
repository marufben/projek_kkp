<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BapRetensi_Model extends MY_Model{
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'bap_retensi';
		$this->primary_key = 'id';
	}

	public function attribute_labels()
	{
		return array(
				'id' => 'Id Table',
				'no_bap' => 'No Bap',
				'tgl_bap' => 'Tanggal',
				'pejabat' => 'Pejabat Berwenang',
			);
	}

}