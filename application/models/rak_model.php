<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rak_Model extends MY_Model{
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'rak';
		$this->primary_key = 'id';
	}

	public function attribute_labels()
	{
		return array(
			'id' => 'Id Table',
			'id_lemari' => 'Id Lemari',
			'urutan' => 'Urutan Rak',
		);
	}
}