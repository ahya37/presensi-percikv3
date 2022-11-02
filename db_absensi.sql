-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.39-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table u1039137_absensi.indonesia_timezone
CREATE TABLE IF NOT EXISTS `indonesia_timezone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `default_zone` int(1) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `kode` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table u1039137_absensi.indonesia_timezone: ~3 rows (approximately)
DELETE FROM `indonesia_timezone`;
/*!40000 ALTER TABLE `indonesia_timezone` DISABLE KEYS */;
INSERT INTO `indonesia_timezone` (`id`, `default_zone`, `lokasi`, `kode`) VALUES
	(1, 1, 'Asia/Jakarta', 'WIB'),
	(2, 0, 'Asia/Ujung_Pandang', 'WITA'),
	(3, 0, 'Asia/Jayapura', 'WITA');
/*!40000 ALTER TABLE `indonesia_timezone` ENABLE KEYS */;

-- Dumping structure for table u1039137_absensi.license
CREATE TABLE IF NOT EXISTS `license` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial` varchar(50) NOT NULL,
  `api` varchar(256) NOT NULL,
  `url` varchar(256) NOT NULL,
  `status_apps` varchar(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table u1039137_absensi.license: ~1 rows (approximately)
DELETE FROM `license`;
/*!40000 ALTER TABLE `license` DISABLE KEYS */;
INSERT INTO `license` (`id`, `serial`, `api`, `url`, `status_apps`, `created_date`) VALUES
	(1, '-', 'AIzaSyAqIHgemVh7heZGKDaGsS6MRwJrePhY6EM', '-', '-', '2022-01-29 11:31:57');
/*!40000 ALTER TABLE `license` ENABLE KEYS */;

-- Dumping structure for table u1039137_absensi.location
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `latitude` varchar(150) DEFAULT NULL,
  `longitude` varchar(150) DEFAULT NULL,
  `radius` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table u1039137_absensi.location: ~3 rows (approximately)
DELETE FROM `location`;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` (`id`, `name`, `latitude`, `longitude`, `radius`) VALUES
	(1, 'Location 1', '-8.678662830099094', '116.17948917089846', '10'),
	(2, 'location 2', '-7.977540800316199', '112.63700656592846', '50'),
	(3, 'Solusi Cipta Media', '-7.9603972', '112.6647806', '50');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;

-- Dumping structure for table u1039137_absensi.office_shift
CREATE TABLE IF NOT EXISTS `office_shift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shift_name` varchar(50) NOT NULL DEFAULT '',
  `senin_in` time NOT NULL,
  `senin_out` time NOT NULL,
  `selasa_in` time NOT NULL,
  `selasa_out` time NOT NULL,
  `rabu_in` time NOT NULL,
  `rabu_out` time NOT NULL,
  `kamis_in` time NOT NULL,
  `kamis_out` time NOT NULL,
  `jumat_in` time NOT NULL,
  `jumat_out` time NOT NULL,
  `sabtu_in` time NOT NULL,
  `sabtu_out` time NOT NULL,
  `minggu_in` time NOT NULL,
  `minggu_out` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table u1039137_absensi.office_shift: ~2 rows (approximately)
DELETE FROM `office_shift`;
/*!40000 ALTER TABLE `office_shift` DISABLE KEYS */;
INSERT INTO `office_shift` (`id`, `shift_name`, `senin_in`, `senin_out`, `selasa_in`, `selasa_out`, `rabu_in`, `rabu_out`, `kamis_in`, `kamis_out`, `jumat_in`, `jumat_out`, `sabtu_in`, `sabtu_out`, `minggu_in`, `minggu_out`) VALUES
	(2, 'Shift B', '14:12:00', '18:05:00', '15:20:00', '15:15:00', '13:20:00', '18:20:00', '13:20:00', '15:15:00', '18:30:00', '18:30:00', '18:30:00', '18:30:00', '18:30:00', '18:30:00'),
	(3, 'Shift A', '16:09:00', '14:10:00', '14:10:00', '14:10:00', '14:10:00', '14:10:00', '14:10:00', '14:10:00', '14:10:00', '14:10:00', '16:10:00', '14:10:00', '14:10:00', '14:10:00');
/*!40000 ALTER TABLE `office_shift` ENABLE KEYS */;

-- Dumping structure for table u1039137_absensi.time_attendance
CREATE TABLE IF NOT EXISTS `time_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) NOT NULL,
  `attendance_date` varchar(50) NOT NULL,
  `clock_in` datetime NOT NULL,
  `clock_out` datetime NOT NULL,
  `zona` varchar(4) NOT NULL,
  `status_clock` varchar(50) NOT NULL,
  `clock_in_latitude` varchar(150) NOT NULL,
  `clock_in_longitude` varchar(150) NOT NULL,
  `clock_out_latitude` varchar(150) NOT NULL,
  `clock_out_longitude` varchar(150) NOT NULL,
  `time_late` time NOT NULL,
  `early_leaving` time NOT NULL,
  `overtime` time NOT NULL,
  `total_work` time NOT NULL,
  `image_in` text,
  `image_out` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=258 DEFAULT CHARSET=latin1;

-- Dumping data for table u1039137_absensi.time_attendance: ~20 rows (approximately)
DELETE FROM `time_attendance`;
/*!40000 ALTER TABLE `time_attendance` DISABLE KEYS */;
INSERT INTO `time_attendance` (`id`, `nik`, `attendance_date`, `clock_in`, `clock_out`, `zona`, `status_clock`, `clock_in_latitude`, `clock_in_longitude`, `clock_out_latitude`, `clock_out_longitude`, `time_late`, `early_leaving`, `overtime`, `total_work`, `image_in`, `image_out`) VALUES
	(147, '01', '2021-07-19', '2021-07-19 22:47:52', '2021-07-19 22:51:49', 'WITA', '0', '-7.9619813', '112.66715830000001', '-7.9619751999999995', '112.6671598', '14:47:52', '00:00:00', '06:51:49', '00:02:37', NULL, NULL),
	(148, '01', '2021-07-20', '2021-07-20 20:29:50', '2021-07-20 20:30:32', 'WIB', '0', '-7.9620218', '112.6671015', '-7.962046', '112.667113', '12:29:50', '00:00:00', '04:30:32', '00:00:42', NULL, NULL),
	(149, '01', '2021-07-21', '2021-07-22 09:32:52', '2021-07-22 10:06:40', 'WIB', '0', '-7.5515098', '112.70694739999999', '-7.5514674', '112.7069489', '01:32:52', '05:53:20', '00:00:00', '00:20:28', NULL, NULL),
	(154, '01', '2021-07-22', '2021-07-22 10:43:57', '2021-07-22 10:44:02', 'WIB', '0', '-7.551526699999999', '112.70697179999999', '-7.551526699999999', '112.70697179999999', '02:43:57', '05:15:58', '00:00:00', '00:00:05', NULL, NULL),
	(155, '123', '2021-07-23', '2021-07-23 15:31:01', '2021-07-23 15:31:06', 'WIB', '0', '-7.551480899999999', '112.7069475', '-7.551480899999999', '112.7069475', '07:31:01', '00:28:54', '00:00:00', '00:00:05', NULL, NULL),
	(156, 're54645645', '2021-05-13', '2022-01-13 10:38:59', '2022-01-13 12:07:05', 'WITA', '0', '-7.960634', '112.664787', '-7.960634', '112.664787', '00:00:00', '03:07:55', '00:00:00', '00:00:00', NULL, NULL),
	(157, '238162846', '2020-04-24', '2022-01-13 12:07:31', '0000-00-00 00:00:00', 'WITA', '1', '-7.960634', '112.664787', '', '', '04:07:31', '00:00:00', '00:00:00', '00:00:00', NULL, NULL),
	(158, '7868fsdf', '2020-07-28', '2022-01-13 12:09:34', '0000-00-00 00:00:00', 'WITA', '1', '-7.960634', '112.664787', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, NULL),
	(159, '03', '2022-05-13', '2022-01-13 12:13:08', '0000-00-00 00:00:00', 'WITA', '1', '-7.960634', '112.664787', '', '', '00:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, NULL),
	(160, '04', '2022-01-13', '2022-01-13 13:22:35', '0000-00-00 00:00:00', 'WITA', '1', '-7.960634', '112.664787', '', '', '00:02:35', '00:00:00', '00:00:00', '00:00:00', NULL, NULL),
	(161, '06', '2023-02-18', '2022-01-13 13:25:16', '0000-00-00 00:00:00', 'WITA', '1', '-7.960634', '112.664787', '', '', '00:05:16', '00:00:00', '00:00:00', '00:00:00', NULL, NULL),
	(162, '07', '2023-12-10', '2022-01-13 13:25:45', '0000-00-00 00:00:00', 'WITA', '1', '-7.960634', '112.664787', '', '', '05:25:45', '00:00:00', '00:00:00', '00:00:00', NULL, NULL),
	(198, '08', '2022-01-14', '2022-01-14 14:41:14', '2022-01-14 14:41:21', 'WIB', '0', '-7.9702853', '112.6556097', '-7.9702853', '112.6556097', '00:00:00', '03:48:39', '00:00:00', '00:00:07', '97709a577d31967de69d5d6b58108d4d.png', 'd8185a2605d08a50c5b212f96b351275.png'),
	(199, '03', '2022-01-14', '2022-01-14 14:41:41', '2022-01-14 14:41:47', 'WIB', '0', '-7.9702853', '112.6556097', '-7.9702853', '112.6556097', '00:00:00', '03:48:13', '00:00:00', '00:00:06', 'a8c1670fe1eb5d82eadf22f87fa9c244.png', '9727edcbaa2dca7035430f9aa43367e8.png'),
	(200, '7868fsdf', '2022-01-14', '2022-01-14 14:42:22', '2022-01-14 14:42:29', 'WIB', '0', '-7.9702853', '112.6556097', '-7.9702853', '112.6556097', '00:00:00', '03:47:31', '00:00:00', '00:00:07', '6a4d7f6ed71933f97bf9691705bc9b16.png', 'a64b6a0b6c1d1562684574e1ad3b0001.png'),
	(201, '7868fsdf', '2022-01-15', '2022-01-15 08:31:56', '2022-01-15 08:32:06', 'WIB', '0', '-7.9702853', '112.6556097', '-7.9702853', '112.6556097', '00:00:00', '09:57:54', '00:00:00', '00:00:10', '5173261a5d0f7fcfad738755e53efbb9.png', 'f1c7d18ccafa3d25a53c072484095682.png'),
	(208, '08', '2022-01-15', '2022-01-15 11:16:53', '2022-01-15 11:16:59', 'WIB', '0', '-7.9702853', '112.6556097', '-7.9702853', '112.6556097', '00:00:00', '07:13:01', '00:00:00', '00:00:06', 'a509fe4ca46e280d87563cc734e0168a.png', '4aa192265799215f466cb33f87152c0e.png'),
	(211, '04', '2022-01-15', '2022-01-15 11:58:04', '2022-01-15 11:58:18', 'WIB', '0', '-7.9702853', '112.6556097', '-7.9702853', '112.6556097', '00:00:00', '06:31:42', '00:00:00', '00:00:14', '2b126966a72ce70bf087e9a395a57908.png', 'cd3f7a0a0215d21669c1b9f09cbdd2e6.png'),
	(250, '03', '2022-01-17', '2022-01-17 10:55:26', '2022-01-17 10:55:37', 'WIB', '0', '-7.9702853', '112.6556097', '-7.9702853', '112.6556097', '00:00:00', '07:09:23', '00:00:00', '00:00:11', '668e83f919415c3b57d8497f77c9aedf.png', 'effd37f926112d8cd48cef7e5c433373.png'),
	(257, '7868fsdf', '2022-01-17', '2022-01-17 14:45:00', '0000-00-00 00:00:00', 'WIB', '1', '-7.9702853', '112.6556097', '', '', '00:33:00', '00:00:00', '00:00:00', '00:00:00', 'f2183b0357e3591f1c99f10445bd1300.png', NULL);
/*!40000 ALTER TABLE `time_attendance` ENABLE KEYS */;

-- Dumping structure for table u1039137_absensi.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `shift_id` varchar(2) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nik` (`nik`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table u1039137_absensi.user: ~8 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `nik`, `shift_id`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
	(1, 'Arthur Julio Risa', '01', '1', 'karyawan@gmail.com', 'arthur.JPG', '$2y$10$CaNXbUxGJ7BhIauVdqYGIe9TZuTGg807cNblzFcoLp7P9tSbOpPqa', 2, 1, '2021-07-29 18:56:42'),
	(2, 'Admin', '', '', 'admin@gmail.com', 'default.svg', '$2y$10$oh1910J9pLoI2YEKVyBHHuUQYIPBHDNDurr23qWck8crWWIVJMD2W', 1, 1, '2021-07-24 18:24:31'),
	(9, 'doni', '02', '1', 'doni@gmail.com', 'arthur.JPG', '$2y$10$ioBsvX2hsp3xLPMqw4tyluxVA3ENRnlxhPw7CXLXi62BGrVnAhDCq', 2, 1, '2021-07-24 17:40:33'),
	(11, 'ana', '238162846', '1', 'ana@gmail.com', '151693850287b31a2e28e3164c91d789.png', '$2y$10$C/iBxLW9bzYYBiIqK1u0w.wFs8OJK0hXNz5HABqjWghMdnKC8809q', 2, 1, '2022-01-13 10:06:42'),
	(14, 'khasanah', '04', '2', 'khasanah@gmail.com', 'badd0fc81d5be8b894cc3111ee66817a.png', '$2y$10$UR6dmyN0titXFfdJayB4BuIBIeMpfzcoko1M8cSUSWmq7ip6.S5k2', 2, 1, '2022-01-13 11:21:24'),
	(16, 'sanah', '07', '1', 'sanah@gmail.com', '54b064c3b5e5e6eacae077ca8de0b55b.png', '$2y$10$KeEc.vyJrppQM9vSGjudgOVVcKe7rPSR9qn/JbWAC7kPrBUBYKe.K', 2, 1, '2022-01-13 11:24:59'),
	(18, 'ana1', 'ana', '1', 'ana1@gmail.com', 'bc0b6cd3f0f65fd90bf65dd6d51367dc.png', '$2y$10$H6S61uP2QL0SL2BkL6CCF.2EPKnkGxiDbHllk16ABxNXtcteJG4fa', 2, 1, '2022-01-13 14:02:33'),
	(19, 'dsfsdf', 'sdfs', '1', 'sdf@gmail.com', '3a3acddbd1b864d5550777b6ef50eec1.png', '$2y$10$0X7Kkprp2375Xo4Fd7emq.RXN7u4NA0IBzZwpSvpttpqHVH3K6YdK', 2, 1, '2022-01-13 14:06:04');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table u1039137_absensi.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table u1039137_absensi.user_role: ~2 rows (approximately)
DELETE FROM `user_role`;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` (`id`, `role`) VALUES
	(1, 'Admin'),
	(2, 'Karyawan');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
