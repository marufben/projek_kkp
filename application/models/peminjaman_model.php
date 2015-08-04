<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Peminjaman_model extends MY_Model{
	function __construct()
	{
		parent::__construct();
		$this->table_name = 'peminjaman';
		$this->primary_key = 'id';
	}

	function getData($kode)
	{
		$sql = "
				SELECT 
					*
				FROM
					anggota
				WHERE
					kode_anggota  = '".$kode."'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function getDataBuku($kode)
	{
		$sql = "
				SELECT 
					a.*,
					b.*
				FROM
					item as a,
					biblio as b
				WHERE
					a.biblio_id = b.biblio_id
				AND	
					a.item_code = '".$kode."'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function getAturanPinjam($kode)
	{
		$sql = "
				SELECT 
					b.periode_peminjaman,b.jumlah_pinjaman,
					b.id as id_aturan_peminjaman
				FROM
					anggota as a,
					tbl_aturan_peminjaman as b
				WHERE
					a.id = b.id_type_anggota 
				AND	
					a.kode_anggota = '".$kode."'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function getDataPeminjaman($kode)
	{
		$sql = "
				SELECT 
					b.title,
					a.item_code,
					a.tgl_pinjam,
					a.tgl_hrs_kembali,
					a.tgl_kembali
				FROM
					peminjaman as a,
					biblio as b,
					item as i
				WHERE
					a.tgl_kembali = '0000-00-00' 
				AND	
					a.item_code = i.item_code
				AND
					i.biblio_id = b.biblio_id	
				AND	
					a.id_anggota = '".$kode."'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function getDataSejarahPeminjaman($kode)
	{
		$sql = "
				SELECT 
					b.title,
					a.item_code,
					a.tgl_pinjam,
					a.tgl_hrs_kembali,
					a.tgl_kembali
				FROM
					peminjaman as a,
					biblio as b,
					item as i
				WHERE
					a.item_code = i.item_code
				AND
					i.biblio_id = b.biblio_id	
				AND	
					a.id_anggota = '".$kode."'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function getDataSejarahPeminjamanAll()
	{
		$sql = "
				SELECT 
					b.title,
					a.*,
					x.nama
				FROM
					peminjaman as a,
					biblio as b,
					item as i,
					anggota as x
				WHERE
					a.item_code = i.item_code
				AND
					i.biblio_id = b.biblio_id";

		$query = $this->db->query($sql);
		return $query->result();
	}

	function cekJmlPinjaman($kode){
        $sql = "
        		SELECT COUNT(id_anggota) as jml_pinjam FROM peminjaman WHERE id_anggota = '".$kode."'";
		$query = $this->db->query($sql);
		return $query->result();
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

	function simpanTmp($info){
        $this->db->insert("peminjaman_tmp",$info);
        return $this->db->insert_id();
    }

    function hapusTmp($kode){
        $this->db->where("item_code",$kode);
        $this->db->delete("peminjaman_tmp");
    }

    function hapusAllTmp(){
        $sql = "DELETE FROM peminjaman_tmp ";
		$query = $this->db->query($sql);
		return $query;
    }

    function selesai(){
    	$sql = "
				INSERT INTO peminjaman
				(id_anggota,id_aturan_pinjam,item_code,tgl_pinjam,tgl_hrs_kembali)
				SELECT id_anggota,id_aturan_pinjam,item_code,tgl_pinjam,tgl_hrs_kembali
				FROM peminjaman_tmp";
		$query = $this->db->query($sql);
		return $query;
    }

    function tglKembali($kode){
        $sql = "
				UPDATE peminjaman SET tgl_kembali = '".date('Y-m-d')."' WHERE item_code = '".$kode."'";
		$query = $this->db->query($sql);
		return $query;
    }

    function hapus($kode){
        $this->db->where($this->primary_key,$kode);
        $this->db->delete($this->table_name);
    }
	
}