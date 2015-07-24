<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
		
	}

	function cek_login($username, $password)
	{
		
		
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where("username", $username);
		// $this->db->where("password", md5(strrev($password)));
		$this->db->where("password", $password);
		$this->db->limit(1);

		$query = $this->db->get();
		
		// var_dump($query->num_rows());
		// echo $this->db->last_query();
		// die();
		
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
			'id' => 'id',
			'username' => 'user',
			'password' => 'pass'
		);
	}

}
