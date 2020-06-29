-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 29, 2020 at 10:00 AM
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
(3, 'Fathur Walkers', '17650192', 'Jl. Bakti Abri, Kecamatan Wolio, Kelurahan Bukit Wolio Indah', '085342072185', 'fathurwalkers'),
(4, 'Saya Guru Penjas', '9994021', 'Jl. Murni Bunga Merah', '37477172', 'Saya Guru Penjas'),
(5, 'Hayley William', '9994278', 'Jl. Band Paramore, Kec. Wolio', '974972932', ''),
(6, 'Dewa Zeus', '9993828', 'Jl. Kijang Inova, Kec. Thunder', '74837847', 'zeus.png'),
(7, 'John Cena', '9992299', 'Jl. Smackdown dan WWE', '984929721', 'johncena.png'),
(8, 'The Slash Slinging Slashers', '9992266', 'Jl. Bikini Botton, Dekat Crusty Crab', '47837481', 'spongebobs.png'),
(9, 'Bruce Wayne', '9991288', 'Jl. Gotham City, Kec. DC Comics', '92398183', 'batman.png'),
(10, 'Hal Jordan', '9996571', 'Jl. Green Lantern, Nomor 01', '98498394', 'greenlantern.png');

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
(5, 'fathurwalkers', 'asdasd', 'fathurwalkers@gmail.com', 3, 2, 2),
(6, 'haljordan', 'asdasd', 'haljordan@gmail.com', 10, 2, 2),
(7, 'hayleywilliam', 'asdasd', 'hayleywilliam@gmail.com', 5, 2, 2),
(8, 'gurupenjas', 'asdasd', 'sayagurupenjas@gmail.com ', 4, 2, 2),
(9, 'slingingslashers', 'asdasd', 'theslashslingingslashers@gmail.com', 8, 2, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
