-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 03, 2017 at 06:28 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web_lect`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_file` int(10) NOT NULL,
  `nama_file` varchar(120) DEFAULT NULL,
  `kategori_file` enum('materi','attach','penelitian') DEFAULT NULL,
  `id_jurusan` int(10) DEFAULT NULL,
  `Matkul` varchar(100) DEFAULT NULL,
  `Semester` varchar(10) DEFAULT NULL,
  `deskripsi_file` varchar(120) DEFAULT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `thumbnail` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id_file`, `nama_file`, `kategori_file`, `id_jurusan`, `Matkul`, `Semester`, `deskripsi_file`, `upload_time`, `thumbnail`) VALUES
(3, '03-TABEL-DAN-CHART.pdf', 'materi', 2, 'Ekonomi', 'Genap', 'ssss', '2017-09-01 03:27:00', '03-TABEL-DAN-CHART.pdf.jpg'),
(4, 'Dokumen_1_pdf__hal_judul,_pengesahan,___.pdf', 'materi', 1, 'Bisnis', 'Ganjil', '', '2017-09-03 06:05:31', 'Dokumen_1_pdf__hal_judul,_pengesahan,___.pdf.jpg'),
(5, 'download-1.pdf', 'materi', 1, 'Bisnis', 'Ganjil', '', '2017-09-03 06:05:31', 'download-1.pdf.jpg'),
(6, 'downloading_osm_data_a4.pdf', 'materi', 1, 'Bisnis', 'Ganjil', '', '2017-09-03 06:05:31', 'downloading_osm_data_a4.pdf.jpg'),
(7, 'EN_Manual_digital_FXFOOTBALL.pdf', 'materi', 1, 'Bisnis', 'Ganjil', '', '2017-09-03 06:05:31', 'EN_Manual_digital_FXFOOTBALL.pdf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id_forum` int(10) NOT NULL,
  `judul_forum` varchar(100) DEFAULT NULL,
  `kontent_forum` text,
  `tanggal_forum` date DEFAULT NULL,
  `waktu_forum` time DEFAULT NULL,
  `id_user` int(5) DEFAULT NULL,
  `lampiran` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `keterangan`) VALUES
(1, 'S1', ''),
(2, 'D3', '');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(10) NOT NULL,
  `id_user` int(5) NOT NULL,
  `konten_komentar` text NOT NULL,
  `induk` int(10) NOT NULL,
  `tanggal_komentar` date NOT NULL,
  `waktu_komentar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_matkul` int(11) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_matkul`, `nama_matkul`) VALUES
(1, 'Bisnis'),
(2, 'Ekonomi');

-- --------------------------------------------------------

--
-- Table structure for table `matkul_semester`
--

CREATE TABLE `matkul_semester` (
  `id_matkul_semester` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `semester` enum('Ganjil','Genap','','') NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul_semester`
--

INSERT INTO `matkul_semester` (`id_matkul_semester`, `id_matkul`, `semester`, `id_jurusan`) VALUES
(1, 1, 'Ganjil', 1),
(2, 2, 'Genap', 2);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(10) NOT NULL,
  `nama_menu` varchar(40) DEFAULT NULL,
  `link` varchar(50) NOT NULL,
  `induk_menu` int(10) DEFAULT '0',
  `is_root` tinyint(1) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT NULL,
  `class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `link`, `induk_menu`, `is_root`, `aktif`, `class`) VALUES
(1, 'Home', 'public/home', 0, 0, 1, ''),
(2, 'Materi', 'public/materi', 0, 0, 1, ''),
(3, 'Materi S1', 'public/materi/s1', 2, 0, 1, ''),
(4, 'Materi D3', 'public/materi/d3', 2, 0, 1, ''),
(5, 'Semester Genap', 'public/materi/s1/genap', 3, 0, 1, ''),
(6, 'Semester Ganjil', 'public/materi/s1/ganjil', 3, 0, 1, ''),
(7, 'Semester Genap', 'public/materi/d3/genap', 4, 0, 1, ''),
(8, 'Semester Ganjil', 'public/materi/d3/ganjil', 4, 0, 1, ''),
(9, 'Penelitian', 'public/penelitian', 0, 0, 1, ''),
(14, 'Dashboard', 'admin/dashboard', 0, 1, 0, 'fa fa-fw fa-dashboard'),
(16, 'Materi Kuliah', 'admin/upload', 0, 1, 1, 'fa fa-book'),
(17, 'Bisnis', 'public/materi/s1/genap/bisnis', 5, 0, 1, ''),
(18, 'Bisnis 2', 'public/materi/s1/ganjil/bisnis2', 6, 0, 1, ''),
(19, 'Ekonomi', 'public/materi/d3/genap/ekonomi', 7, 0, 1, ''),
(20, 'Ekonomi 2', 'public/materi/d3/ganjil/ekonomi2', 8, 0, 1, ''),
(21, 'Penelitian', 'admin/research', 0, 1, 1, 'fa fa-book'),
(30, 'Curhat', 'public/curhat', 0, 0, 1, ''),
(41, 'Karir', 'public/karir', 0, 0, 1, ''),
(42, 'Profile', 'public/profile', 0, 0, 1, ''),
(43, 'Tugas', 'public/tugas', 0, 0, 1, ''),
(44, 'Users Manager', '#', 0, 1, 1, ''),
(45, 'Groups', 'admin/groups', 44, 1, 1, ''),
(46, 'Users', 'admin/users', 44, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `penelitian`
--

CREATE TABLE `penelitian` (
  `id_penelitian` int(11) NOT NULL,
  `judul_penelitian` varchar(120) NOT NULL,
  `tahun_penelitian` year(4) NOT NULL,
  `nama_peneliti` varchar(120) NOT NULL,
  `instansi` varchar(120) NOT NULL,
  `no_issn` varchar(20) NOT NULL,
  `publisher` varchar(120) NOT NULL,
  `volume` varchar(10) NOT NULL,
  `id_file` varchar(120) NOT NULL,
  `thumbnail` varchar(120) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penelitian`
--

INSERT INTO `penelitian` (`id_penelitian`, `judul_penelitian`, `tahun_penelitian`, `nama_peneliti`, `instansi`, `no_issn`, `publisher`, `volume`, `id_file`, `thumbnail`, `upload_time`) VALUES
(1, '', 2010, '', '', '', '', '', '03_Evaluasi_Kemampuan_Lahan.pdf', '03_Evaluasi_Kemampuan_Lahan.pdf.jpg', '2017-09-03 10:21:54'),
(2, '', 2010, '', '', '', '', '', '03-TABEL-DAN-CHART.pdf', '03-TABEL-DAN-CHART.pdf.jpg', '2017-09-03 11:07:05'),
(3, '', 2016, '', '', '', '', '', 'jutekin-vol2-1.PDF', 'jutekin-vol2-1.PDF.jpg', '2017-09-03 15:59:30'),
(4, '', 2012, '', '', '', '', '', '113040011_resume.pdf', '113040011_resume.pdf.jpg', '2017-09-03 16:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `id_post` int(10) NOT NULL,
  `judul_post` varchar(50) DEFAULT NULL,
  `deskripsi_post` varchar(120) DEFAULT NULL,
  `konten_post` text,
  `id_user` int(5) DEFAULT NULL,
  `kategori_post` enum('loker','berita','tugas') DEFAULT NULL,
  `lampiran_post` int(5) DEFAULT NULL,
  `gambar_post` varchar(100) DEFAULT NULL,
  `tanggal_post` date DEFAULT NULL,
  `waktu_post` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, 'E9x7G06hsIapzUlA2cchYO', 1268889823, 1504454348, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'ardirenaldi', '$2y$08$tBEeFBYeXS89hNh7Gy4xXuH3cErh04BFohiWVSvWydJS.g3lq.E.K', NULL, 'ardi@renaldi.com', NULL, NULL, NULL, NULL, 1504231004, NULL, 1, 'ardi', 'renaldi', 'ss', '12414412');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(5, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_forum`),
  ADD KEY `user_id_forum` (`id_user`),
  ADD KEY `attachment_forum` (`lampiran`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `user_id_komentar` (`id_user`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `matkul_semester`
--
ALTER TABLE `matkul_semester`
  ADD PRIMARY KEY (`id_matkul_semester`),
  ADD KEY `matkul_id` (`id_matkul`),
  ADD KEY `jurusan_id` (`id_jurusan`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `penelitian`
--
ALTER TABLE `penelitian`
  ADD PRIMARY KEY (`id_penelitian`);

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `user_id` (`id_user`),
  ADD KEY `attachment` (`lampiran_post`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id_forum` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `matkul_semester`
--
ALTER TABLE `matkul_semester`
  MODIFY `id_matkul_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `penelitian`
--
ALTER TABLE `penelitian`
  MODIFY `id_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `id_post` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `matkul_semester`
--
ALTER TABLE `matkul_semester`
  ADD CONSTRAINT `jurusan_id` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matkul_id` FOREIGN KEY (`id_matkul`) REFERENCES `mata_kuliah` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
