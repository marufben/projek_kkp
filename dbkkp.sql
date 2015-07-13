/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.6.16 : Database - db_kkp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_kkp` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_kkp`;

/*Table structure for table `anggota` */

DROP TABLE IF EXISTS `anggota`;

CREATE TABLE `anggota` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kode_anggota` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `unit_kerja` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `anggota` */

insert  into `anggota`(`id`,`kode_anggota`,`nama`,`unit_kerja`,`email`,`tgl_daftar`,`expired`,`type`) values (1,'KD01','AGUNG','Staf','agung@gmail.com','2015-07-01','2020-07-01','standard');

/*Table structure for table `arsip` */

DROP TABLE IF EXISTS `arsip`;

CREATE TABLE `arsip` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) DEFAULT NULL,
  `id_perusahaan` int(10) DEFAULT NULL,
  `id_kapal` int(10) DEFAULT NULL,
  `kode_barcode` varchar(50) DEFAULT NULL,
  `salinan` varchar(50) DEFAULT NULL,
  `status_ijin` varchar(50) DEFAULT NULL,
  `jenis_file` tinytext,
  `jenis_ijin` varchar(50) DEFAULT NULL,
  `no_ijin` varchar(50) DEFAULT NULL,
  `tgl_terbit` date DEFAULT NULL,
  `tgl_expired` date DEFAULT NULL,
  `jumlah_halaman` int(11) DEFAULT NULL,
  `no_pembukuan` varchar(250) DEFAULT NULL,
  `tgl_pembukuan` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `arsip` */

insert  into `arsip`(`id`,`judul`,`id_perusahaan`,`id_kapal`,`kode_barcode`,`salinan`,`status_ijin`,`jenis_file`,`jenis_ijin`,`no_ijin`,`tgl_terbit`,`tgl_expired`,`jumlah_halaman`,`no_pembukuan`,`tgl_pembukuan`) values (1,'Perikanan',0,0,'b3949',NULL,'1',NULL,'SP','100','0000-00-00','0000-00-00',NULL,'123123','0000-00-00');

/*Table structure for table `group_user` */

DROP TABLE IF EXISTS `group_user`;

CREATE TABLE `group_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `group_user` */

insert  into `group_user`(`id`,`nama`,`keterangan`) values (2,'Administrator','Hak untuk Admin'),(3,'Super User','Hak untuk Semua Menu'),(4,'Staff Gudang','');

/*Table structure for table `kapal` */

DROP TABLE IF EXISTS `kapal`;

CREATE TABLE `kapal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `id_perusahaan` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `kapal` */

insert  into `kapal`(`id`,`nama`,`id_perusahaan`) values (1,'SENTANA -1',1),(2,'SENTANA II',1),(3,'SELAMAT JADI',1);

/*Table structure for table `lampiran_arsip` */

DROP TABLE IF EXISTS `lampiran_arsip`;

CREATE TABLE `lampiran_arsip` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `no_ijin` varchar(50) DEFAULT NULL,
  `nama_files` varchar(250) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `keterangan` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `lampiran_arsip` */

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `icon` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `menu` */

insert  into `menu`(`id`,`nama`,`url`,`parent`,`urutan`,`icon`,`status`) values (2,'Masters','#',0,1,'fa-folder-open',1),(3,'Data Kapal','kapal',2,1,'fa-rocket',1),(4,'Data Klasifikasi','#',2,2,'fa-credit-card',1),(5,'Data Penyimpanan','#',2,3,'fa-folder',1),(6,'Data Anggota','anggota',2,4,'fa-users',1),(7,'Unit Kerja','#',2,5,'fa-database',1),(8,'Sirkulasi','#',0,2,'fa-refresh',1),(9,'Peminjaman','sirkulasi',8,1,'fa-download',1),(10,'Aturan Peminjaman','#',8,2,'fa-cog',1),(11,'Sejarah Peminjaman','#',8,3,'fa-history',1),(12,'Daftar Keterlambatan','#',8,4,'fa-clock-o',1),(13,'Penataan','#',0,3,'fa-tasks',1),(14,'Setup Refensi','#',13,2,'fa-book',1),(15,'Daftar Referensi','#',13,3,'fa-pencil',1),(16,'Pencarian','#',0,4,'fa-search',1),(17,'Pencarian Spesifik','home',16,1,'fa-search-plus',1),(18,'Perbandingan Arsip Digital ','#',16,2,'fa-bar-chart-o',1),(19,'User Management','#',0,5,'fa-male',1),(20,'Modul','menu_c',19,1,'fa-plus',1),(21,'Group User','group_c',19,2,'fa-cubes',1),(22,'Hak Akses','rules_c',19,3,'fa-check-square-o',1),(23,'Pengguna','user',19,4,'fa-reddit-square',1),(24,'Log User','',19,5,'fa-list-alt',1),(25,'Arsip','arsip',0,6,'fa-folder-open-o',1);

/*Table structure for table `peminjaman` */

DROP TABLE IF EXISTS `peminjaman`;

CREATE TABLE `peminjaman` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_anggota` int(10) DEFAULT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_hrs_kembali` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `peminjaman` */

/*Table structure for table `perusahaan` */

DROP TABLE IF EXISTS `perusahaan`;

CREATE TABLE `perusahaan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `perusahaan` */

insert  into `perusahaan`(`id`,`nama`) values (1,'ADIGUNG SENTANA, CV');

/*Table structure for table `rules_user` */

DROP TABLE IF EXISTS `rules_user`;

CREATE TABLE `rules_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `loads` tinyint(1) NOT NULL,
  `creates` tinyint(1) NOT NULL,
  `private` tinyint(1) NOT NULL,
  `updates` tinyint(1) NOT NULL,
  `deletes` tinyint(1) NOT NULL,
  `induk` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*Data for the table `rules_user` */

insert  into `rules_user`(`id`,`menu_id`,`group_id`,`loads`,`creates`,`private`,`updates`,`deletes`,`induk`) values (5,3,3,0,1,1,0,1,''),(10,3,2,1,1,1,1,1,''),(12,6,2,1,1,1,1,1,''),(14,8,2,1,1,1,1,1,''),(16,11,2,1,1,1,1,1,''),(18,11,3,0,1,1,0,1,''),(19,9,3,1,0,1,1,1,''),(20,2,2,0,1,0,0,1,'');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
