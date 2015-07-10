<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu_c_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table_name = 'menu';
		$this->primary_key = 'id';

	}

	function getMenu()
	{
		$this->db->select("*");
		$this->db->from("menu");
		$this->db->order_by("id");
		$query = $this->db->get();
		return $query->result();
	}

	function getMenuById($id)
	{
		$this->db->select("*");
		$this->db->from("menu");
		$this->db->where("id", $id);
		$this->db->limit(1);
		$query = $this->db->get();

		return $query->result();

	}

	function updateMenu($data)
	{
		$id = $this->input->post('id');
		$this->db->where($this->primary_key, $id);
		$this->db->update($this->table_name, $data);
	}

	function deleteMenu($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table_name);
	}

	function attribute_labels()
	{
		return array(
			'nama' => 'nama',
			'url' => 'url',
			'parent' => 'parent',
			'urutan' => 'urutan',
			'status' => 'status'
			);
	}
}