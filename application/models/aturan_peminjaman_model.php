<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aturan_peminjaman_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
		$this->table_name = 'tbl_aturan_peminjaman';
		$this->primary_key = 'id';
	}

	function getAll()
	{
		/*
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->order_by($this->primary_key);
		$query = $this->db->get();

		return $query->result();
		*/
		$sql = "
				SELECT 
					a.*,
					b.member_type_name,
					c.nama_tipe
				FROM
					tbl_aturan_peminjaman as a,
					tbl_tipe_keanggotaan as b,
					tbl_tipe_koleksi as c
				WHERE
					a.id_type_anggota  = b.id
				AND 
					a.id_type_koleksi  = c.id	
				GROUP BY
					a.id
		";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function cek($kode){
        $this->db->where($this->primary_key,$kode);
        $query=$this->db->get($this->table_name);
        
        return $query;
    }

	function getTipeKoleksi()
	{
		$this->db->select("*");
		$this->db->from("tbl_tipe_koleksi");
		$this->db->order_by("id");
		$query = $this->db->get();
		return $query->result();
	}

	function getTipeKeanggotaan()
	{
		$this->db->select("*");
		$this->db->from("tbl_tipe_keanggotaan");
		$this->db->order_by("id");
		$query = $this->db->get();
		return $query->result();
	}

	function getGMD()
	{
		$this->db->select("*");
		$this->db->from("tbl_gmd");
		$this->db->order_by("id");
		$query = $this->db->get();
		return $query->result();
	}

	function simpan($info){
        $this->db->insert("tbl_aturan_peminjaman",$info);
        return $this->db->insert_id();
    }

    function update($kode,$info){
        $this->db->where($this->primary_key,$kode);
        $this->db->update($this->table_name,$info);
    }

    function hapus($kode){
        $this->db->where($this->primary_key,$kode);
        $this->db->delete($this->table_name);
    }
	
}