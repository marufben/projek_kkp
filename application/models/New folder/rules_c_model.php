<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rules_c_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
		$this->table_name = 'rules_user';
		$this->primary_key = 'id';
	}

	function getRules()
	{
		// $this->db->select("*");
		// $this->db->from($this->table_name);
		// $this->db->order_by($this->primary_key);
		// $query = $this->db->get();
		$sql = "
				SELECT 
					count(r.menu_id) as jml_menu,
					r.group_id,
					g.nama
				FROM
					rules_user as r,
					group_user as g
				WHERE
					g.id = r.group_id
				GROUP BY
					group_id
		";
		$query = $this->db->query($sql);
		// echo $this->db->last_query();
		// die();

		return $query->result();
	}

	function create($data)
	{
		$this->db->insert_batch('rules_user', $data);
		// echo $this->db->last_query();
	}

	function editRules($group_id)
	{
		$sql = "
				SELECT 
					r.*,
					m.nama
				FROM
					rules_user as r,
					menu as m
				WHERE
					m.id = r.menu_id AND
					r.group_id = '$group_id'
		";
		$query = $this->db->query($sql);

		return $query->result();
	}

	function updateRules($query, $data, $id=false)
	{
		if($query == 'insert'){
			$this->db->insert_batch('rules_user', $data);
		}else if($query == 'update'){
			$this->db->update_batch('rules_user', $data, 'id');
		}else{
			$this->db->where('id', $id);
			$this->db->delete('rules_user');
		}
			// echo $this->db->last_query();
	}

	function getGroupRules()
	{
		$sql = "
				SELECT 
					g.id,
					g.nama
				FROM
					group_user as g
				WHERE
					g.id NOT IN (
						select group_id from rules_user
						) 
		";
		$query = $this->db->query($sql);

		return $query->result();
	}
	
	function attribute_labels()
	{
		return array(
			);
	}
}