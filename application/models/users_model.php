<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		$this->table_name = 'unit_kerja';
		$this->primary_key = 'id';
	}

	function cek_login($username, $password)
	{
		
		
		$this->db->select("*");
		$this->db->from($this->table_name);
		$this->db->where("username", $username);
		$this->db->where("password", md5($password));
		$this->db->limit(1);

		$query = $this->db->get();
		
		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	

	function attribute_labels()
	{
		return array(
			'id' => 'Id',
			'username' => 'Username',
			'password' => 'Password',
			'poto' => 'Photo',
			'status' => 'Status'
		);
	}

}
