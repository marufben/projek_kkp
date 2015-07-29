<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Box_Model extends MY_Model{
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'box';
		$this->primary_key = 'id';
	}

	public function attribute_labels()
	{
		return array(
			'id' => 'Id Table',
			'id_lemari' => 'Id Lemari',
			'id_rak' => 'Id Rak',
			'no' => 'No Box'
		);
	}

	public function cekrak($id){
		$this->db->where('id_lemari', $id);
		$this->db->from('rak');
		$res = $this->db->get();
		return $res->result();
	}
}