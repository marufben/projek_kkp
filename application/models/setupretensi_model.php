<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class SetupRetensi_Model extends MY_Model{
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'retensi';
		$this->primary_key = 'id';
	}

	public function findActive()
	{
		$this->db->select('*');
		$this->db->where('status', 1);
		$result = $this->db->get($this->table_name)->row();
		return $result;
	}

	public function attribute_labels()
	{
		return array(
				'id' => 'Id Table',
				'legal' => 'Dasar Hukum',
				'batas' => 'Batas Max Retensi',
				'status' => 'Status'
			);
	}
}