<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_c_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
		$this->table_name = 'group_user';
		$this->primary_key = 'id';
	}

	function getGroup()
	{
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->order_by($this->primary_key);
		$query = $this->db->get();

		return $query->result();
	}

	function getGroupById($id)
	{
		$this->db->select("*");
		$this->db->from($this->table_name);
		$this->db->where("id", $id);
		$this->db->limit(1);
		$query = $this->db->get();

		return $query->result();

	}

	function updateGroup($data)
	{
		$id = $this->input->post('id');
		$this->db->where($this->primary_key, $id);
		$this->db->update($this->table_name, $data);
	}

	function deleteGroup($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table_name);
	}

	function attribute_labels()
	{
		return array(
			'nama' => 'nama',
			'keterangan' => 'keterangan'
			);
	}
}