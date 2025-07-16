-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 08:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwal_laboratorium`
--

-- --------------------------------------------------------

--
-- Table structure for table `asisten_praktikum`
--

CREATE TABLE `asisten_praktikum` (
  `nidn` varchar(20) NOT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asisten_praktikum`
--

INSERT INTO `asisten_praktikum` (`nidn`, `nama_dosen`, `alamat`, `tgl_lahir`, `prodi`) VALUES
('123400', 'jonathan', 'Bojong Sereh', '1997-09-03', 'IF'),
('231231', 'Kumar Udin', 'Ibun', '1970-03-12', 'SI');

-- --------------------------------------------------------

--
-- Table structure for table `detail_kelas`
--

CREATE TABLE `detail_kelas` (
  `id` int(11) NOT NULL,
  `kode_kelas` int(11) DEFAULT NULL,
  `nim` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'kepala_lab', 'Kepala Laboratorium'),
(3, 'laboran', 'Laboran');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_praktikum`
--

CREATE TABLE `jadwal_praktikum` (
  `id_jadwal_praktikum` int(30) NOT NULL,
  `tahun_ajaran` varchar(9) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `kode_matkum` varchar(20) DEFAULT NULL,
  `nidn` varchar(20) DEFAULT NULL,
  `kode_ruang` int(11) DEFAULT NULL,
  `kode_kelas` int(11) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_praktikum`
--

INSERT INTO `jadwal_praktikum` (`id_jadwal_praktikum`, `tahun_ajaran`, `semester`, `kode_matkum`, `nidn`, `kode_ruang`, `kode_kelas`, `hari`, `waktu_mulai`, `waktu_selesai`) VALUES
(1, '2024-2025', NULL, '1', '123400', 1, 5, 'jumat', '08:30:00', '10:30:00'),
(2, '2024-2025', NULL, '1', '123400', 1, 6, 'jumat', '13:00:00', '14:30:00'),
(3, '2024-2025', NULL, 'LTX', '231231', 1, 5, 'kamis', '08:30:00', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id_seri` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `id_jadwal_praktikum` int(30) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `status_hadir` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `nama_kelas`, `semester`) VALUES
(1, 'IF Reg 1', 1),
(2, 'SI Reg 1', 1),
(3, 'IF Reg 3', 3),
(4, 'SI Reg 3', 3),
(5, 'IF Reg 5', 5),
(6, 'SI Reg 5', 5);

-- --------------------------------------------------------

--
-- Table structure for table `laboran`
--

CREATE TABLE `laboran` (
  `id_laboran` char(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `stts` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mata_praktikum`
--

CREATE TABLE `mata_praktikum` (
  `kode_matkum` varchar(20) NOT NULL,
  `nama_matkum` varchar(100) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mata_praktikum`
--

INSERT INTO `mata_praktikum` (`kode_matkum`, `nama_matkum`, `sks`, `semester`) VALUES
('1', 'Sistem Basis data', 3, 4),
('LTX', 'Praktikum LaTeX', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `perubahan_jadwal`
--

CREATE TABLE `perubahan_jadwal` (
  `id_sn` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_petugas` varchar(50) DEFAULT NULL,
  `nidn` varchar(20) DEFAULT NULL,
  `id_jadwal_praktikum` int(30) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `praktikan`
--

CREATE TABLE `praktikan` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `praktikan`
--

INSERT INTO `praktikan` (`nim`, `nama`, `alamat`, `tgl_lahir`, `prodi`) VALUES
('301202001', 'Andriana Aulia Rahman ', 'Gambung', '2000-09-14', 'Sistem Informasi'),
('301202029', 'Lutonada Paleojavanicus', 'Dayaeuh Kolot', '2001-02-13', 'Teknik Informatika'),
('301202033', 'Fajri Hawaariyun', 'Pacet', '2003-01-15', 'Sistem Informasi'),
('301202039', 'Zubair', 'Cipaku', '2001-03-07', 'Teknik Informatika'),
('301202054', 'Haekal Munawar', 'Ciparay', '2002-07-15', 'Teknik Informatika'),
('301202063', 'Reynold Agustin', 'Bojong Pulus', '2002-08-08', 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `ruang_lab`
--

CREATE TABLE `ruang_lab` (
  `kode_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(100) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruang_lab`
--

INSERT INTO `ruang_lab` (`kode_ruang`, `nama_ruang`, `lokasi`) VALUES
(1, 'Lab 1', 'Gd. RH.Lily Sumantri'),
(2, 'Lab 2', 'Gd. RH.Lily Sumantri\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `Jenis Kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `profilepict` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `Jenis Kelamin`, `profilepict`) VALUES
(1, '127.0.0.1', 'admin1', '$2y$10$xxcKIxJkuYC/hfxbFarMsOZWfuW6BXEoWgEGDTk2OSqdHlkK0NuR.', 'admin1@gmail.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1752399159, 1, 'Admin', 'istrator', 'ADMIN', '0', 'Laki-laki', ''),
(2, '127.0.0.1', 'KLab1', '$2y$10$3i6S/c1BnjyOoH3QO5e7VOycwSzgr6N5mDEq4eLOl92mIYdp7pBQy', 'kepala1@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1749795693, 1752324238, 1, 'Muhammad', 'Rizki', NULL, NULL, 'Laki-laki', ''),
(3, '127.0.0.1', 'laboran1', '$2y$10$xxcKIxJkuYC/hfxbFarMsOZWfuW6BXEoWgEGDTk2OSqdHlkK0NuR.', 'laboran1@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1752321080, 1, 'Aizen', 'Sosuke', NULL, NULL, 'Laki-laki', ''),
(4, '::1', 'Raka Atmaja', '$2y$10$0ZzEyc4nYhtGlr7sSDzX2u1FLYKky3FB1Yqbu3zFDU9QFeSkym00S', 'nyobaan@yahoo.co.id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1752299300, 1752324099, 1, NULL, NULL, 'Bojong Pulus', '0881023474222', 'Laki-laki', 'assets/pp/f393c7626456149d0a672e19919155dd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(8, 4, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asisten_praktikum`
--
ALTER TABLE `asisten_praktikum`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `detail_kelas`
--
ALTER TABLE `detail_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_praktikum`
--
ALTER TABLE `jadwal_praktikum`
  ADD PRIMARY KEY (`id_jadwal_praktikum`),
  ADD KEY `kode_matkum` (`kode_matkum`),
  ADD KEY `nidn` (`nidn`),
  ADD KEY `kode_ruang` (`kode_ruang`),
  ADD KEY `kode_kelas` (`kode_kelas`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id_seri`),
  ADD KEY `id` (`id`),
  ADD KEY `kehadiran_ibfk_1` (`id_jadwal_praktikum`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `laboran`
--
ALTER TABLE `laboran`
  ADD PRIMARY KEY (`id_laboran`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_praktikum`
--
ALTER TABLE `mata_praktikum`
  ADD PRIMARY KEY (`kode_matkum`);

--
-- Indexes for table `perubahan_jadwal`
--
ALTER TABLE `perubahan_jadwal`
  ADD PRIMARY KEY (`id_sn`),
  ADD KEY `nidn` (`nidn`),
  ADD KEY `perubahan_jadwal_ibfk_2` (`id_jadwal_praktikum`);

--
-- Indexes for table `praktikan`
--
ALTER TABLE `praktikan`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `ruang_lab`
--
ALTER TABLE `ruang_lab`
  ADD PRIMARY KEY (`kode_ruang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kelas`
--
ALTER TABLE `detail_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_praktikum`
--
ALTER TABLE `jadwal_praktikum`
  MODIFY `id_jadwal_praktikum` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id_seri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kode_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `perubahan_jadwal`
--
ALTER TABLE `perubahan_jadwal`
  MODIFY `id_sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruang_lab`
--
ALTER TABLE `ruang_lab`
  MODIFY `kode_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_kelas`
--
ALTER TABLE `detail_kelas`
  ADD CONSTRAINT `detail_kelas_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  ADD CONSTRAINT `detail_kelas_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `praktikan` (`nim`);

--
-- Constraints for table `jadwal_praktikum`
--
ALTER TABLE `jadwal_praktikum`
  ADD CONSTRAINT `jadwal_praktikum_ibfk_1` FOREIGN KEY (`kode_matkum`) REFERENCES `mata_praktikum` (`kode_matkum`),
  ADD CONSTRAINT `jadwal_praktikum_ibfk_2` FOREIGN KEY (`nidn`) REFERENCES `asisten_praktikum` (`nidn`),
  ADD CONSTRAINT `jadwal_praktikum_ibfk_3` FOREIGN KEY (`kode_ruang`) REFERENCES `ruang_lab` (`kode_ruang`),
  ADD CONSTRAINT `jadwal_praktikum_ibfk_4` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`);

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`id_jadwal_praktikum`) REFERENCES `jadwal_praktikum` (`id_jadwal_praktikum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kehadiran_ibfk_2` FOREIGN KEY (`id`) REFERENCES `detail_kelas` (`id`);

--
-- Constraints for table `perubahan_jadwal`
--
ALTER TABLE `perubahan_jadwal`
  ADD CONSTRAINT `perubahan_jadwal_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `asisten_praktikum` (`nidn`),
  ADD CONSTRAINT `perubahan_jadwal_ibfk_2` FOREIGN KEY (`id_jadwal_praktikum`) REFERENCES `jadwal_praktikum` (`id_jadwal_praktikum`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
