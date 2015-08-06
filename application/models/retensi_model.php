<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Retensi_Model extends MY_Model{
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'dropretensi';
		$this->primary_key = 'id';
	}

	public function attribute_labels()
	{
		return array(
				'id' => 'Id Table',
				'judul' => 'Judul Arsip',
				'id_perusahaan' => 'Id Perusahaan',
				'id_kapal' => 'Id kapal',
				'kode_arsip' => 'Kode Arsip',
				'kode_barcode' => 'Barcode Arsip',
				'salinan' => 'Salinan',
				'status_ijin' => 'Status',
				'jenis_file' => 'Jenis File',
				'jenis_ijin' => 'Jenis Izin',
				'no_ijin' => 'No Izin',
				'tgl_terbit' => 'Tanggal Terbit',
				'tgl_expired' => 'Tanggal Expired',
				'jumlah_halaman' => 'Jumlah Halaman',
				'no_pembukuan' => 'No Pembukuan',
				'tgl_pembukuan' => 'Tanggal Pembukuan',
			    "id_arsip" => "Id Arsip",
			    "id_bap" => "Id BAP Retensi"
			);
	}

}