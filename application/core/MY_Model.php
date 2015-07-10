<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model
{
	public $table_name;
	public $primary_key;
	function __construct()
	{
		parent::__construct();


	}
	public function insert_id()
	{
		$data = $this->custom_query('select '.$this->primary_key.' from '.$this->table_name.' order by '.$this->primary_key.' desc limit 1');
		$data = $data[0];
		return $data->id;
	}
	public function custom_query($query = '')
	{
		return $this->db->query($query)->result();
	}
	public function custom_query_data($query = '')
	{
		return $this->db->query($query);
	}	
	
	public function row_count()
	{
		return $this->db->count_all($this->table_name);
	}
	public function insert($value = array())
	{
		try{
			if(is_array($value))
			{
				// $value[$this->primary_key] = $this->_get_auto_number();
				
				$this->db->insert($this->table_name, $value);
				$id = NULL;
				if ($this->db->affected_rows()) 
				{
					if(!isset($value[$this->primary_key])){
						$id = $this->insert_id();
					} else {
						$id = $value[$this->primary_key];
					}
					$value[$this->primary_key] = $id;
					
					//$this->save_log($value, 'Insert', $this->_sess['username'].' has Inserted new Record into table '.$this->table_name);
					
					return $id;
				}
			}
		}
		catch(Exception $e){
			//$this->save_log($value, 'Error', $this->_sess['username'].' want to Insert Record into table '.$this->table_name.'. '.$ex);
			return NULL;
		}
	}
	public function update($value = array())
	{
		try {
			$this->db->where($this->primary_key, $value[$this->primary_key]);
			$this->db->update($this->table_name, $value);
			
			//$this->save_log($value, 'Update', $this->_sess['username'].' has Updated Record for table '.$this->table_name);
			
			return $this->db->affected_rows();
		} catch (exception $ex){
			//$this->save_log($value, 'Error', $this->_sess['username'].' want to Update Record for table '.$this->table_name.'. '.$ex);
			return FALSE;
		}
		
	}
	

	function hello()
	{
		echo "heloooo cuk ";
	}

	function get_data_fields()
	{
		$model = new stdClass();
		foreach ($_POST as $key => $value) {
			$model->$key = $this->input->post($key);
		}
		 
		return $model;
	}
}
