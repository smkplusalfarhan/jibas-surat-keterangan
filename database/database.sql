/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `rombel`;
CREATE TABLE `rombel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rombel` varchar(50) DEFAULT NULL,
  `tahun_ajaran_id` int(10) NOT NULL,
  `aktif` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `periode_aktif` varchar(128) DEFAULT NULL,
  `kepala_sekolah` varchar(64) DEFAULT NULL,
  `nama_sekolah` varchar(128) DEFAULT NULL,
  `alamat_sekolah` varchar(255) DEFAULT NULL,
  `kecamatan_sekolah` varchar(64) DEFAULT NULL,
  `kabupaten_sekolah` varchar(64) DEFAULT NULL,
  `npsn_sekolah` varchar(8) DEFAULT NULL,
  `sinkron` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nipd` varchar(16) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `nik` varchar(64) DEFAULT NULL,
  `nisn` varchar(64) DEFAULT NULL,
  `tempat_lahir` varchar(64) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `lp` varchar(1) DEFAULT NULL,
  `rombel_id` int(11) DEFAULT NULL,
  `ayah` varchar(64) DEFAULT NULL,
  `ibu` varchar(64) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rombel_id` (`rombel_id`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`rombel_id`) REFERENCES `rombel` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1161 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `surat`;
CREATE TABLE `surat` (
  `surat_id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_surat` date DEFAULT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `keperluan` varchar(128) DEFAULT NULL,
  `periode` varchar(128) DEFAULT NULL,
  `rombel` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`surat_id`),
  KEY `student_id` (`siswa_id`),
  CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `tahun_ajaran`;
CREATE TABLE `tahun_ajaran` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(50) NOT NULL,
  `aktif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator');
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(2, 'members', 'Tata Usaha');
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(7, 'Guru', ''),
(8, 'staff', 'Tata Usaha');

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(5, '::1', 'nela', 1597975387);
INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(6, '::1', 'fitria', 1597975393);
INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(7, '::1', 'administrator', 1597975399);

INSERT INTO `rombel` (`id`, `nama_rombel`, `tahun_ajaran_id`, `aktif`) VALUES
(47, 'X.1 MM', 21, 1);
INSERT INTO `rombel` (`id`, `nama_rombel`, `tahun_ajaran_id`, `aktif`) VALUES
(48, 'X.2 MM', 21, 1);
INSERT INTO `rombel` (`id`, `nama_rombel`, `tahun_ajaran_id`, `aktif`) VALUES
(49, 'X.3 MM', 21, 1);
INSERT INTO `rombel` (`id`, `nama_rombel`, `tahun_ajaran_id`, `aktif`) VALUES
(50, 'X.4 MM', 21, 1),
(51, 'X.1 BDP', 21, 1),
(52, 'X.2 BDP', 21, 1),
(53, 'XI.1 MM', 21, 1),
(54, 'XI.2 MM', 21, 1),
(55, 'XI.3 MM', 21, 1),
(56, 'XI.1 BDP', 21, 1),
(57, 'XI.2 BDP', 21, 1),
(58, 'XII.1 MM', 21, 1),
(59, 'XII.2 MM', 21, 1),
(60, 'XII.3 MM', 21, 1),
(61, 'XII.1 BDP', 21, 1),
(62, 'XII.2 BDP', 21, 1),
(63, 'XII.3 BDP', 21, 1),
(64, 'X.1 MM', 22, 1),
(65, 'X.2 MM', 22, 1),
(66, 'X.3 MM', 22, 1),
(67, 'X.1 BDP', 22, 1),
(68, 'X.2 BDP', 22, 1),
(69, 'X.1 APHP', 22, 1),
(70, 'XI.1 MM', 22, 1),
(71, 'XI.2 MM', 22, 1),
(72, 'XI.3 MM', 22, 1),
(73, 'XI.4 MM', 22, 1),
(74, 'XI.1 BDP', 22, 1),
(75, 'XI.2 BDP', 22, 1),
(76, 'XII.1 MM', 22, 1),
(77, 'XII.2 MM', 22, 1),
(78, 'XII.3 MM', 22, 1),
(79, 'XII.1 BDP', 22, 1),
(80, 'XII.2 BDP', 22, 1),
(81, 'X.1 MM', 23, 1),
(82, 'X.2 MM', 23, 1),
(83, 'X.3 MM', 23, 1),
(84, 'X.1 BDP', 23, 1),
(85, 'X.2 BDP', 23, 1),
(86, 'X APHP', 23, 1),
(99, 'XI APHP', 23, 1),
(100, 'XI.1 BDP', 23, 1),
(101, 'XI.2 BDP', 23, 1),
(102, 'XI.1 MM', 23, 1),
(103, 'XI.2 MM', 23, 1),
(104, 'XI.3 MM', 23, 1),
(105, 'XII.1 BDP', 23, 1),
(106, 'XII.1 MM', 23, 1),
(107, 'XII.2 BDP', 23, 1),
(108, 'XII.2 MM', 23, 1),
(109, 'XII.3 MM', 23, 1),
(110, 'XII.4 MM', 23, 1);

INSERT INTO `setting` (`periode_aktif`, `kepala_sekolah`, `nama_sekolah`, `alamat_sekolah`, `kecamatan_sekolah`, `kabupaten_sekolah`, `npsn_sekolah`, `sinkron`) VALUES
('Semester Ganjil Tahun Pelajaran 2019/2020', 'Agus Syarif H., S.Sos', 'SMK Plus Al-Farhan', 'Jalan Cisarua Km. 03 Cimahigirang', 'Kec. Kadudampit', 'Kab. Sukabumi', '20257493', '2020-08-21 15:38:13');






INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`, `aktif`) VALUES
(21, '2018/2019', 0);
INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`, `aktif`) VALUES
(22, '2019/2020', 0);
INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`, `aktif`) VALUES
(23, '2020/2021', 1);

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$PrxqSM3THk39chtLAtFbNOBvdUF62hh1klWD9IrREPs5KM.sGF7rS', 'admin@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1268889823, 1598003145, 1, 'Dede', 'Iskandar', 'ADMIN', '0');


INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(53, 1, 1);
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(54, 1, 2);
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(55, 1, 7);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;