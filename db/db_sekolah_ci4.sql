-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_sekolah_ci4
CREATE DATABASE IF NOT EXISTS `db_sekolah_ci4` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_sekolah_ci4`;

-- Dumping structure for table db_sekolah_ci4.arsips
CREATE TABLE IF NOT EXISTS `arsips` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `tgl_arsip` varchar(100) NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sekolah_ci4.arsips: ~4 rows (approximately)
/*!40000 ALTER TABLE `arsips` DISABLE KEYS */;
INSERT INTO `arsips` (`id`, `judul`, `tgl_arsip`, `lampiran`, `ket`) VALUES
	(7, 'Logo Kabupaten Bogor', '2023-02-16', '1690097717_0743fa29b7eb735516b8.png', 'Lambang Kabupaten'),
	(8, 'Web Apps', '2023-11-23', '1700717757_2e9d7634e420fcf21bd2.png', 'Logo Website Application '),
	(18, 'doc word', '2023-11-30', 'doc word_1701319838_BAB III.docx', 'skripsi'),
	(19, 'doc.excel', '2023-11-30', 'doc.excel_1701319900_Desain basis data.xlsx', 'skripsi'),
	(20, 'doc.pdf', '2023-11-30', 'doc.pdf_1701319972_Arsiliansyah_Silitonga.pdf', 'skripsi');
/*!40000 ALTER TABLE `arsips` ENABLE KEYS */;

-- Dumping structure for table db_sekolah_ci4.gurus
CREATE TABLE IF NOT EXISTS `gurus` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sekolah_ci4.gurus: ~6 rows (approximately)
/*!40000 ALTER TABLE `gurus` DISABLE KEYS */;
INSERT INTO `gurus` (`id`, `name`, `nik`, `tempat_lahir`, `tgl_lahir`, `jk`, `alamat`, `jabatan`, `pendidikan`) VALUES
	(4, 'Heni Susanti', '123456', 'Bogor', '1993-03-10', 'Perempuan', 'Jakarta', 'Guru', 's1'),
	(5, 'Rosyadah', '1234567', 'Jakarta', '1968-03-12', 'Perempuan', 'Bogor', 'Guru', 's1'),
	(6, 'Davira Rahmawati Tamam', '12345678', 'Bogor', '1996-06-04', 'Perempuan', 'Bogor', 'Guru', 's1'),
	(7, 'Siti Robiatul Adawiyah', '123456789', 'Bogor', '1987-11-12', 'Perempuan', 'Bogor', 'Guru', 's1'),
	(8, 'Sri Anzani', '123456789', 'Bogor', '1991-08-11', 'Perempuan', 'Bogor', 'Guru', 's1'),
	(9, 'Hasbianti', '12345', 'Bogor', '1973-10-24', 'Perempuan', 'Bogor', 'Guru', 's1');
/*!40000 ALTER TABLE `gurus` ENABLE KEYS */;

-- Dumping structure for table db_sekolah_ci4.kegiatans
CREATE TABLE IF NOT EXISTS `kegiatans` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_guru` int(5) NOT NULL,
  `jam` varchar(100) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sekolah_ci4.kegiatans: ~7 rows (approximately)
/*!40000 ALTER TABLE `kegiatans` DISABLE KEYS */;
INSERT INTO `kegiatans` (`id`, `id_guru`, `jam`, `hari`, `kelas`, `id_kegiatan`) VALUES
	(17, 9, '07:30', 'Senin', '6', 9),
	(18, 4, '07:30', 'Senin', '2', 4),
	(19, 5, '07:30', 'Senin', '1', 5),
	(20, 6, '07:30', 'Senin', '3', 6),
	(21, 7, '07:30', 'Senin', '4', 7),
	(22, 8, '07:30', 'Senin', '5', 8);
/*!40000 ALTER TABLE `kegiatans` ENABLE KEYS */;

-- Dumping structure for table db_sekolah_ci4.kontaks
CREATE TABLE IF NOT EXISTS `kontaks` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `isi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sekolah_ci4.kontaks: ~2 rows (approximately)
/*!40000 ALTER TABLE `kontaks` DISABLE KEYS */;
INSERT INTO `kontaks` (`id`, `isi`) VALUES
	(2, 'MI Nurul Iman ( 0876543221)'),
	(3, 'Organisasi Kantor MI Nurul Iman ( 087770590173 )');
/*!40000 ALTER TABLE `kontaks` ENABLE KEYS */;

-- Dumping structure for table db_sekolah_ci4.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sekolah_ci4.migrations: ~7 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
	(1, '2022-11-30-083526', 'App\\Database\\Migrations\\Siswa', 'default', 'App', 1670771654, 1),
	(2, '2022-11-30-083758', 'App\\Database\\Migrations\\Guru', 'default', 'App', 1670771654, 1),
	(3, '2022-12-06-042322', 'App\\Database\\Migrations\\Profile', 'default', 'App', 1670771654, 1),
	(4, '2022-12-06-044529', 'App\\Database\\Migrations\\Kegiatan', 'default', 'App', 1670771654, 1),
	(5, '2022-12-06-131737', 'App\\Database\\Migrations\\Arsip', 'default', 'App', 1670771654, 1),
	(6, '2022-12-06-151803', 'App\\Database\\Migrations\\Kontak', 'default', 'App', 1670771655, 1),
	(7, '2022-12-07-155657', 'App\\Database\\Migrations\\Users', 'default', 'App', 1670771655, 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table db_sekolah_ci4.profiles
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `sejarah` varchar(255) NOT NULL,
  `visimisi` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sekolah_ci4.profiles: ~1 rows (approximately)
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` (`id`, `sejarah`, `visimisi`) VALUES
	(9, 'Madrasah Ibtida\'iah Nurul Iman berdiri pada tahun 1966, yang pada awalnya hanya sekolah agama atau sebatas tempat mengaji, namun setelahnya ditambah pengetahuan umum kemudian disahkan menjadi suatu sekolah Madrasah Ibtida\'iah yang dimana hal tersebut dika', 'Menciptakan generasi Qur\'ani yang berakhlak mulia, berwawasan luas dan menjunjung etika dan menguasa'),
	(10, 'searh', 'sd');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;

-- Dumping structure for table db_sekolah_ci4.siswas
CREATE TABLE IF NOT EXISTS `siswas` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table db_sekolah_ci4.siswas: ~6 rows (approximately)
/*!40000 ALTER TABLE `siswas` DISABLE KEYS */;
INSERT INTO `siswas` (`id`, `name`, `tempat_lahir`, `tgl_lahir`, `jk`, `alamat`, `kelas`) VALUES
	(7, 'Muhammad Ahya Habibi', 'Bogor', '2021-07-12', 'Laki-Laki', 'Kp.Jampang Gg.Harapan', '2'),
	(8, 'Syakira Barkah', 'Bogor', '2014-05-18', 'Perempuan', 'Kp.Jampang Gg.Amal Rt.01/Rw.05', '3'),
	(9, 'Raisha Aqilla Sherina Putri', 'Bogor', '2013-02-10', 'Perempuan', 'Kp.Jampang Gg.Kopi Rt.03/Rw.05', '4'),
	(10, 'Tasya Tri Lestari', 'Bogor', '2012-08-15', 'Perempuan', 'Kp.Jampang Gg.Amal Rt.01/Rw.05', '5'),
	(11, 'Tina Rangkuti', 'Bogor', '2011-03-09', 'Perempuan', 'Kp.Jampang Gg.Harapan 1', '6');
/*!40000 ALTER TABLE `siswas` ENABLE KEYS */;

-- Dumping structure for table db_sekolah_ci4.users
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table db_sekolah_ci4.users: ~6 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`username`, `password`, `name`, `level`, `created_at`, `updated_at`) VALUES
	('arif', '$2y$10$KjNnCFZI9jybBoSe5TkPM.c/7SK5VHTrLuZGr2Q.HyKsT6wbJi4p2', 'Guru', '', '2023-11-22 23:03:26', '2023-11-22 23:03:26'),
	('davirarahmawatitamam', '$2y$10$.0GmBquAKQSlWkcHlzAG/ulwMhF8bGPFTkqXog51RJiVwM4O3FeUC', 'Guru', '', '2023-02-28 08:26:04', '2023-02-28 08:26:04'),
	('hasbianti', '$2y$10$tKMivxNb4PpHozhEc6ZtVOL0RnM1vJXWhsW9f6CH5WCicNUI/rDOC', 'Guru', '', '2023-02-28 08:21:43', '2023-02-28 08:21:43'),
	('henisusanti', '$2y$10$OA346sy4LezVZXWZHddRqO3MHikYX8G4eLBtIqRv..J2.leOfKo4O', 'Guru', '', '2023-02-28 08:27:06', '2023-02-28 08:27:06'),
	('rosyadah', '$2y$10$JhWeB9FCgkK9h9t5YmQ2X.U0x0.yGOigNf7YHs1TkXNoeRjGr8z.G', 'Guru', '', '2023-02-28 08:25:03', '2023-02-28 08:25:03'),
	('sitirobiatuladawiyah', '$2y$10$0Vaw.4JFmwzqeHpkcJ/xwu29hpP43nkByQLLmxXxCbgM6AUev3y1i', 'Guru', '', '2023-02-28 08:24:06', '2023-02-28 08:24:06'),
	('srianzani', '$2y$10$8rKv0WJFRpWtPioDGeCMd.kNDur442Dojb/M7n0r/deYn4Bogr2ka', 'Guru', '', '2023-02-28 08:23:11', '2023-02-28 08:23:11'),
	('supriyadi', '$2y$10$kaG2PJZohd9S5aqRyUJ8t.sznaLpwi4ce/jhavGbzwp6UL5j.WJAi', 'Guru', '', '2023-10-25 23:14:04', '2023-10-25 23:14:04');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
