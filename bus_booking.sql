-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 08:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id_access` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id_access`, `id_user`, `created_at`) VALUES
(1, 7, '2022-11-27 15:51:05'),
(2, 7, '2022-11-25 15:51:05'),
(3, 8, '2022-11-27 15:52:15'),
(4, 8, '2022-11-26 15:52:15'),
(5, 8, '2022-11-27 15:52:15'),
(6, 8, '2022-11-26 15:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `area`) VALUES
(1, 'Dalam Kota'),
(2, 'Luar Kota');

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `id` int(30) NOT NULL,
  `schedule_id` int(30) NOT NULL,
  `ref_no` text NOT NULL,
  `name` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(20) NOT NULL,
  `status` tinyint(1) DEFAULT 0 COMMENT '0=Belum Bayar, 1=Menunggu Konfirmasi, 2=Sudah Bayar\r\n',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sifat` int(20) NOT NULL,
  `area` int(20) NOT NULL,
  `bukti_tf` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`id`, `schedule_id`, `ref_no`, `name`, `qty`, `total`, `status`, `date_updated`, `sifat`, `area`, `bukti_tf`, `created_at`) VALUES
(6, 3, '202211249474', 'Tono Hartono', 2, 700000, 0, '2022-11-24 10:56:56', 1, 2, '', '2022-11-24 04:56:56'),
(7, 3, '202211242483', 'Dimas Anggara', 12, 4200000, 0, '2022-11-24 10:59:00', 1, 2, '', '2022-11-24 04:59:00'),
(8, 4, '202211248264', 'Bank BRI', 50, 15000000, 0, '2022-11-24 11:10:28', 2, 2, '', '2022-11-24 05:10:28'),
(9, 3, '202211246621', 'Tono Hartono', 2, 700000, 0, '2022-11-24 11:29:06', 1, 2, '', '2022-11-24 05:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `bus_number` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 = inactive, 1 = active',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pabrikan` varchar(100) NOT NULL,
  `nomesin` varchar(100) NOT NULL,
  `platnomor` varchar(100) NOT NULL,
  `sifat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `name`, `bus_number`, `status`, `date_updated`, `pabrikan`, `nomesin`, `platnomor`, `sifat`) VALUES
(5, 'Primajaya', '5008', 1, '2022-11-27 22:23:09', 'Suzuki', '23HH23AA', 'B1231AE', 1),
(7, 'Primajaya', '5004', 1, '2022-12-01 13:21:38', 'Suzuki', '1233SS11', 'B444AE', 1),
(9, 'Primajaya', '4001', 1, '2022-12-01 13:21:40', 'OH', '12333E1AS', 'B123KK', 2),
(10, 'Primajaya', '5994', 1, '2022-11-27 22:10:35', 'OH', '12333E1AS', 'B133KK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kursi_booked`
--

CREATE TABLE `kursi_booked` (
  `id` int(11) NOT NULL,
  `id_schedule` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursi_booked`
--

INSERT INTO `kursi_booked` (`id`, `id_schedule`, `id_user`, `number`, `status`, `created_at`) VALUES
(1, 2147483647, 0, 1, 0, '2022-12-01 14:07:01'),
(2, 2147483647, 0, 2, 0, '2022-12-01 14:07:01'),
(3, 2147483647, 0, 3, 0, '2022-12-01 14:07:01'),
(4, 2147483647, 0, 4, 0, '2022-12-01 14:07:01'),
(5, 2147483647, 0, 5, 0, '2022-12-01 14:07:01'),
(6, 2147483647, 0, 6, 0, '2022-12-01 14:07:01'),
(7, 2147483647, 0, 7, 0, '2022-12-01 14:07:01'),
(8, 2147483647, 0, 8, 0, '2022-12-01 14:07:01'),
(9, 2147483647, 0, 9, 0, '2022-12-01 14:07:01'),
(10, 2147483647, 0, 10, 0, '2022-12-01 14:07:01'),
(11, 2147483647, 0, 11, 0, '2022-12-01 14:07:01'),
(12, 2147483647, 0, 12, 0, '2022-12-01 14:07:01'),
(13, 2147483647, 0, 13, 0, '2022-12-01 14:07:01'),
(14, 2147483647, 0, 14, 0, '2022-12-01 14:07:01'),
(15, 2147483647, 0, 15, 0, '2022-12-01 14:07:01'),
(16, 2147483647, 0, 16, 0, '2022-12-01 14:07:01'),
(17, 2147483647, 0, 17, 0, '2022-12-01 14:07:01'),
(18, 2147483647, 0, 18, 0, '2022-12-01 14:07:01'),
(19, 2147483647, 0, 19, 0, '2022-12-01 14:07:01'),
(20, 2147483647, 0, 20, 0, '2022-12-01 14:07:01'),
(21, 1140819, 0, 1, 0, '2022-12-01 14:08:19'),
(22, 1140819, 0, 2, 0, '2022-12-01 14:08:19'),
(23, 1140819, 0, 3, 0, '2022-12-01 14:08:19'),
(24, 1140819, 0, 4, 0, '2022-12-01 14:08:19'),
(25, 1140819, 0, 5, 0, '2022-12-01 14:08:19'),
(26, 1140819, 0, 6, 0, '2022-12-01 14:08:19'),
(27, 1140819, 0, 7, 0, '2022-12-01 14:08:19'),
(28, 1140819, 0, 8, 0, '2022-12-01 14:08:19'),
(29, 1140819, 0, 9, 0, '2022-12-01 14:08:19'),
(30, 1140819, 0, 10, 0, '2022-12-01 14:08:19'),
(31, 1140819, 0, 11, 0, '2022-12-01 14:08:19'),
(32, 1140819, 0, 12, 0, '2022-12-01 14:08:19'),
(33, 1140819, 0, 13, 0, '2022-12-01 14:08:19'),
(34, 1140819, 0, 14, 0, '2022-12-01 14:08:19'),
(35, 1140819, 0, 15, 0, '2022-12-01 14:08:19'),
(36, 1140819, 0, 16, 0, '2022-12-01 14:08:19'),
(37, 1140819, 0, 17, 0, '2022-12-01 14:08:19'),
(38, 1140819, 0, 18, 0, '2022-12-01 14:08:19'),
(39, 1140819, 0, 19, 0, '2022-12-01 14:08:19'),
(40, 1140819, 0, 20, 0, '2022-12-01 14:08:19'),
(41, 1201141023, 0, 1, 0, '2022-12-01 14:10:23'),
(42, 1201141023, 0, 2, 0, '2022-12-01 14:10:23'),
(43, 1201141023, 0, 3, 0, '2022-12-01 14:10:23'),
(44, 1201141023, 0, 4, 0, '2022-12-01 14:10:23'),
(45, 1201141023, 0, 5, 0, '2022-12-01 14:10:23'),
(46, 1201141023, 0, 6, 0, '2022-12-01 14:10:23'),
(47, 1201141023, 0, 7, 0, '2022-12-01 14:10:23'),
(48, 1201141023, 0, 8, 0, '2022-12-01 14:10:23'),
(49, 1201141023, 0, 9, 0, '2022-12-01 14:10:23'),
(50, 1201141023, 0, 10, 0, '2022-12-01 14:10:23'),
(51, 1201141023, 0, 11, 0, '2022-12-01 14:10:23'),
(52, 1201141023, 0, 12, 0, '2022-12-01 14:10:23'),
(53, 1201141023, 0, 13, 0, '2022-12-01 14:10:23'),
(54, 1201141023, 0, 14, 0, '2022-12-01 14:10:23'),
(55, 1201141023, 0, 15, 0, '2022-12-01 14:10:23'),
(56, 1201141023, 0, 16, 0, '2022-12-01 14:10:23'),
(57, 1201141023, 0, 17, 0, '2022-12-01 14:10:23'),
(58, 1201141023, 0, 18, 0, '2022-12-01 14:10:23'),
(59, 1201141023, 0, 19, 0, '2022-12-01 14:10:23'),
(60, 1201141023, 0, 20, 0, '2022-12-01 14:10:23'),
(61, 1201141045, 0, 1, 0, '2022-12-01 14:10:45'),
(62, 1201141045, 0, 2, 0, '2022-12-01 14:10:45'),
(63, 1201141045, 0, 3, 0, '2022-12-01 14:10:45'),
(64, 1201141045, 0, 4, 0, '2022-12-01 14:10:45'),
(65, 1201141045, 0, 5, 0, '2022-12-01 14:10:45'),
(66, 1201141045, 0, 6, 0, '2022-12-01 14:10:45'),
(67, 1201141045, 0, 7, 0, '2022-12-01 14:10:45'),
(68, 1201141045, 0, 8, 0, '2022-12-01 14:10:45'),
(69, 1201141045, 0, 9, 0, '2022-12-01 14:10:45'),
(70, 1201141045, 0, 10, 0, '2022-12-01 14:10:45'),
(71, 1201141045, 0, 11, 0, '2022-12-01 14:10:45'),
(72, 1201141045, 0, 12, 0, '2022-12-01 14:10:45'),
(73, 1201141045, 0, 13, 0, '2022-12-01 14:10:45'),
(74, 1201141045, 0, 14, 0, '2022-12-01 14:10:45'),
(75, 1201141045, 0, 15, 0, '2022-12-01 14:10:45'),
(76, 1201141045, 0, 16, 0, '2022-12-01 14:10:45'),
(77, 1201141045, 0, 17, 0, '2022-12-01 14:10:45'),
(78, 1201141045, 0, 18, 0, '2022-12-01 14:10:45'),
(79, 1201141045, 0, 19, 0, '2022-12-01 14:10:45'),
(80, 1201141045, 0, 20, 0, '2022-12-01 14:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(30) NOT NULL,
  `terminal_name` text NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0= inactive , 1= active',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `terminal_name`, `city`, `state`, `status`, `date_updated`) VALUES
(2, 'Sample Terminal', 'South City', 'Sample', 1, '2022-11-16 19:05:45'),
(3, 'Terminal BKN', 'Jakarta Timur', 'DKI Jakarta', 1, '2022-11-16 19:01:27'),
(4, 'Terminal Lebak Bulus', 'Lebak Bulus', 'DKI Jakarta', 1, '2022-11-16 19:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(20) NOT NULL,
  `bus_id` int(30) NOT NULL,
  `from_location` int(30) NOT NULL,
  `to_location` int(30) NOT NULL,
  `departure_time` datetime NOT NULL,
  `eta` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `availability` int(11) NOT NULL,
  `price` text NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `bus_id`, `from_location`, `to_location`, `departure_time`, `eta`, `status`, `availability`, `price`, `date_updated`) VALUES
(1140819, 7, 3, 4, '2022-12-21 14:08:00', '2022-12-16 14:08:00', 1, 20, '300000', '2022-12-01 07:08:19'),
(1201141023, 5, 2, 4, '2022-12-01 14:10:00', '2022-12-01 16:10:00', 1, 20, '300000', '2022-12-01 07:10:23'),
(1201141045, 7, 2, 4, '2022-12-01 15:10:00', '2022-12-01 16:10:00', 1, 20, '350000', '2022-12-01 07:10:45'),
(2147483647, 9, 2, 4, '2022-12-01 14:05:00', '2022-12-01 16:05:00', 1, 20, '300000', '2022-12-01 07:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `sifat`
--

CREATE TABLE `sifat` (
  `id` int(11) NOT NULL,
  `sifat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sifat`
--

INSERT INTO `sifat` (`id`, `sifat`) VALUES
(1, 'Pribadi'),
(2, 'Institusi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(150) NOT NULL,
  `born` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = admin, 2= manager, 3 = user',
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT ' 0 = incative , 1 = active',
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `born`, `jenis_kelamin`, `alamat`, `email`, `no_telp`, `role`, `username`, `password`, `status`, `date_updated`) VALUES
(1, 'Administrator', NULL, 'Laki-laki', 'jakarta selatan', 'adminis@gmail.com', '081356567878', 1, 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1, '2022-11-16 22:07:36'),
(2, 'John Smith', '1997-02-12', 'Laki-laki', 'Medan', 'johnsmith@gmail.com', '089578789900', 2, 'jsmth', 'a9a653d4151fa2c081ba1ffc2c2726f3b80b7d7d', 1, '2022-11-23 04:55:43'),
(6, 'Tono Hartono', NULL, 'Laki-laki', 'Jl. Jamin Ginting no.14 A', 'tono@gmail.com', '0826723111', 2, 'tono', 'e7363c5586685a949a4eb079e2782750192464d5', 1, '2022-11-16 20:19:54'),
(7, 'Lala', '2022-11-10', 'Laki-laki', 'testss', 'lalala@gmail.com', '08267673434', 3, 'lala', '4d13fcc6eda389d4d679602171e11593eadae9b9', 1, '2022-11-23 04:47:16'),
(8, 'KIIKI', '2005-03-23', 'Laki-laki', 'Jl. Jamin Ginting no.14 A', 'tono@gmail.com', '0826723111', 3, 'kiki', '95752f86c99f1055feba64e03924cb71f0c08315', 1, '2022-11-23 04:50:09'),
(9, 'Haha Hihi', '1998-06-10', 'Laki-laki', 'test', 'hahahihi@gmail.com', '082676788333', 3, 'hahahihi', 'a2afb20641d695cf6aa7859b3f8a6d325a3f69ca', 1, '2022-12-01 04:44:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id_access`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursi_booked`
--
ALTER TABLE `kursi_booked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sifat`
--
ALTER TABLE `sifat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kursi_booked`
--
ALTER TABLE `kursi_booked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sifat`
--
ALTER TABLE `sifat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
