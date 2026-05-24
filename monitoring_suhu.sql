/*
SQLyog Community v13.3.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - monitoring_suhu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`monitoring_suhu` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `monitoring_suhu`;

/*Table structure for table `edukasi` */

DROP TABLE IF EXISTS `edukasi`;

CREATE TABLE `edukasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `isi` text NOT NULL,
  `status` enum('draft','publish') DEFAULT 'draft',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `edukasi_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `edukasi` */

/*Table structure for table `notifikasi` */

DROP TABLE IF EXISTS `notifikasi`;

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `level` enum('aman','waspada','bahaya') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `notifikasi` */

insert  into `notifikasi`(`id`,`judul`,`pesan`,`level`,`created_at`) values 
(1,'Waspada Polusi','Kualitas udara Jakarta tidak sehat. Kurangi aktivitas luar ruangan.','waspada','2026-05-22 22:52:29'),
(2,'Peringatan Polusi','Udara sangat berbahaya, hindari aktivitas luar ruangan.','bahaya','2026-05-23 00:59:28');

/*Table structure for table `riwayat_monitoring` */

DROP TABLE IF EXISTS `riwayat_monitoring`;

CREATE TABLE `riwayat_monitoring` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wilayah` varchar(100) DEFAULT NULL,
  `suhu` decimal(5,2) DEFAULT NULL,
  `aqi` int(11) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `waktu_data` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `riwayat_monitoring` */

insert  into `riwayat_monitoring`(`id`,`wilayah`,`suhu`,`aqi`,`kategori`,`waktu_data`) values 
(1,'Jakarta Pusat',32.50,115,'Tidak Sehat','2026-05-22 22:39:44'),
(2,'Jakarta Pusat',32.50,115,'Tidak Sehat','2026-05-22 22:52:29'),
(3,'Kemayoran, Indonesia',32.50,154,'Berbahaya','2026-05-23 00:59:28');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`nama`,`email`,`password`,`role`,`created_at`) values 
(2,'yuda','drevinalaurenciapw@gmail.com','$2y$10$2yNPt3p5e.sE30xcWs3pB.3GL2hvk8R99FN2y6RSF9yXkjJSNhlGG','user','2026-05-22 20:30:17'),
(3,'Yudha','yudhapratama@gmail.com','$2y$10$movaL1xTe1yZ7l7Qv784PeY9xg2fhKN.ijHxCa0qXQJJCdSD7lD.G','user','2026-05-22 20:39:41'),
(4,'Administrator','admin@gmail.com','$2y$10$AIVa1vn6t6/xTxCI..RRzOUxXmpv/ZFlgFK0b84KfCN5KAyYdBcLK','admin','2026-05-22 23:27:55'),
(5,'Dewi','dewi@gmail.com','$2y$10$JspIZAz/7dlsVr0KLSlxqeHOxHdh0CyOhezL2kkbQBxnc2e.mK3Ce','user','2026-05-23 00:46:40');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
