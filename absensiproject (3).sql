-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2020 at 03:44 PM
-- Server version: 10.4.13-MariaDB-log
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensiproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tanggal_absen` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `user_id`, `tanggal_absen`) VALUES
(44, 2, '2020-06-30 20:54:20'),
(45, 2, '2020-06-30 20:54:24'),
(46, 1, '2020-06-30 20:55:01'),
(47, 1, '2020-06-30 20:55:10'),
(48, 3, '2020-06-30 20:55:50'),
(49, 3, '2020-06-30 20:55:53'),
(50, 4, '2020-06-30 23:49:25'),
(51, 4, '2020-06-30 23:49:29'),
(52, 4, '2020-06-30 23:49:32'),
(53, 7, '2020-06-30 23:49:50'),
(54, 7, '2020-06-30 23:49:54'),
(55, 8, '2020-06-30 23:50:11'),
(56, 8, '2020-06-30 23:50:14'),
(57, 9, '2020-06-30 23:50:39'),
(58, 9, '2020-06-30 23:50:43'),
(61, 3, '2020-07-02 22:17:55'),
(62, 3, '2020-07-02 22:18:09'),
(63, 4, '2020-07-03 18:59:56'),
(64, 2, '2020-07-03 19:04:58'),
(65, 11, '2020-07-04 01:14:51'),
(66, 11, '2020-07-04 01:14:53'),
(67, 1, '2020-07-04 17:46:52'),
(68, 1, '2020-07-04 18:15:55'),
(69, 1, '2020-07-04 18:19:24'),
(70, 1, '2020-07-04 18:36:10'),
(71, 7, '2020-07-04 19:05:23'),
(72, 7, '2020-07-04 19:05:30'),
(73, 7, '2020-07-04 19:18:35'),
(74, 2, '2020-07-04 19:26:06'),
(75, 12, '2020-07-04 19:38:38'),
(76, 12, '2020-07-04 19:39:10'),
(77, 12, '2020-07-04 19:40:10'),
(78, 12, '2020-07-04 19:41:54'),
(79, 12, '2020-07-04 19:44:48'),
(80, 13, '2020-07-04 19:45:16'),
(81, 2, '2020-07-04 19:45:43'),
(82, 2, '2020-07-04 19:45:47'),
(84, 2, '2020-07-04 19:56:45'),
(85, 2, '2020-07-04 19:58:44'),
(86, 12, '2020-07-04 20:04:12'),
(87, 12, '2020-07-04 20:04:17'),
(88, 12, '2020-07-04 20:04:21'),
(89, 13, '2020-07-04 20:24:04'),
(90, 13, '2020-07-04 20:24:07'),
(91, 13, '2020-07-04 20:24:10'),
(92, 14, '2020-07-04 23:08:35'),
(93, 14, '2020-07-04 23:08:38'),
(94, 14, '2020-07-04 23:15:09'),
(96, 14, '2020-07-04 23:18:08'),
(97, 15, '2020-07-05 19:09:48'),
(98, 1, '2020-07-09 12:35:07'),
(99, 4, '2020-07-09 14:59:15'),
(100, 4, '2020-07-09 16:22:15'),
(101, 4, '2020-07-09 16:22:19'),
(102, 4, '2020-07-09 16:26:47'),
(103, 4, '2020-07-09 16:27:12'),
(104, 4, '2020-07-09 16:27:28'),
(105, 3, '2020-07-09 16:27:45'),
(106, 3, '2020-07-09 16:31:44'),
(107, 3, '2020-07-09 16:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `qrcode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id`, `nama`, `nip`, `alamat`, `telepon`, `qrcode`) VALUES
(1, 'Administrator', '999999', 'Jl. Saya adalah admin hehehe', '93202011', 'admin.png'),
(2, 'Kepala Sekolah', '9992939', 'Jl. Bakti Abri Kecamata Wolio Bukit Wolio Indah', '208281822', 'kepsek.png'),
(4, 'Saya Guru Penjas', '9994021', 'Jl. Murni Bunga Merah', '37477172', 'gurupenjas.png'),
(5, 'Hayley William', '9994278', 'Jl. Band Paramore, Kec. Wolio', '974972932', 'hayleywilliam.png'),
(6, 'Dewa Zeus', '9993828', 'Jl. Kijang Inova, Kec. Thunder', '74837847', 'dewazeus.png'),
(7, 'John Cena', '9992299', 'Jl. Smackdown dan WWE', '984929721', 'johncena.png'),
(8, 'The Slash Slinging Slashers', '9992266', 'Jl. Bikini Botton, Dekat Crusty Crab', '47837481', 'slingingslashers.png'),
(9, 'Bruce Wayne', '9991288', 'Jl. Gotham City, Kec. DC Comics', '92398183', 'brucewayne.png'),
(15, 'dsdsdssd sdssd', '36362', '35332', '12441', 'dsdsds.png'),
(16, 'Iruka Sensei', '999323211', 'Jl. Konohagakure, No.5 Kecamatan 5 Kage', '082939199313', 'wakepsek.png'),
(17, 'Botol Kecap Bango', '94030121', 'Jl. Botol kerupuk sama kecap ehehehe', '084028011', 'warek.png'),
(18, 'Boruto Uzumaki', '99930203', 'Jl. Konohagakure, No.5 Kecamatan 5 Kage', '1029109201', 'boruto.png'),
(19, 'Guru Baru', '24829819', 'Jl. Ini saja', '28938291', 'gurubaru.png'),
(20, 'baru dua', '132123', 'hl wkwkwkw', '0834838121', 'barudua.png');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL COMMENT 'KEPSEK, GURU'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`) VALUES
(1, 'kepsek'),
(2, 'guru'),
(3, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL COMMENT 'ADMIN, USER'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'kepalasekolah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `detail_id` int(11) DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `detail_id`, `jabatan_id`, `role_id`) VALUES
(1, 'admin', 'adminadmin', 'administrator@gmail.com', 1, 3, 1),
(2, 'kepsek', 'asdasd', 'sayakepalasekolah@gmail.com', 2, 1, 3),
(3, 'brucewayne', 'asdasd', 'brucewayne@gmail.com', 9, 2, 2),
(4, 'dewazeus', 'asdasd', 'almightyzeus@gmail.com', 6, 2, 2),
(7, 'hayleywilliam', 'asdasd', 'hayleywilliam@gmail.com', 5, 2, 2),
(8, 'gurupenjas', 'asdasd', 'sayagurupenjas@gmail.com ', 4, 2, 2),
(9, 'slingingslashers', 'asdasd', 'theslashslingingslashers@gmail.com', 8, 2, 2),
(11, 'dsdsds', 'asdasd', 'dasdadawada', 15, 2, 2),
(12, 'wakepsek', 'asdasd', 'irukasensei@gmail.com', 16, 1, 3),
(13, 'warek', 'asdasd', 'botolkecapbango@gmail.com', 17, 1, 3),
(14, 'boruto', 'asdasd', 'borutouzumaki@gmail.com', 18, 2, 2),
(15, 'gurubaru', 'asdasd', 'gurubaru@gmail.com', 19, 2, 2),
(16, 'barudua', 'asdasd', 'barudua@gmail.com', 20, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `detail_id` (`detail_id`) USING BTREE,
  ADD KEY `role_id` (`role_id`) USING BTREE,
  ADD KEY `jabatan_id` (`jabatan_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`detail_id`) REFERENCES `detail` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
