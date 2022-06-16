-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2022 at 05:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `himaif_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `user_role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`, `nama_user`, `user_role`) VALUES
(1, 'admin', '$2y$10$GZ93hKA2Tvdz3O0uQQDzW.69e4CAMa.zP7/yjrgQtqw53zeFFH5CC', 'Admin', 0),
(2, 'ketua_hima', '$2y$10$c1GXUeF2keC4CDQc.pv9iuvbdFmLGk5H2Btq7ZdCYH2czIhF993mK', 'Ketua Hima', 1),
(3, 'tim001', '$2y$10$bwef4TYvj0vOpVESixJWOuUHkezykAwD56EUiTvRR7lv.Su7Ug05a', 'TIM 001', 2);

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `npm_anggota` varchar(20) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `tahun_masuk` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor_kontak` varchar(15) NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'default.png',
  `status_aktif` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `npm_anggota`, `nama_anggota`, `kelas`, `tahun_masuk`, `email`, `nomor_kontak`, `photo`, `status_aktif`) VALUES
(4, '41155050180069', 'Mohammad Ridwan', 'IF-B', '2018', 'rrd.onn3@gmail.com', '089676994047', 'default.png', 1),
(5, '41155050180028', 'Rafika Yuliana', 'IF-B', '2018', 'rafika.y@gmail.com', '089967896789', 'default.png', 1),
(6, '41155050200077', 'Bernie Aryandhi', 'IF-B', '2020', 'bernie@gmail.com', '089778907890', 'default.png', 1),
(7, '41155050200018', 'Heldy Ferdiansyah', 'IF-B', '2020', 'heldy.f@gmail.com', '089656785678', 'default.png', 1),
(8, '41155050200078', 'Muklis Gani', 'IF-B', '2020', 'muklis.gani@gmail.com', '088967895678', 'default.png', 1),
(9, '41155050200032', 'Muhammad Rosian Rizky', 'IF-B', '2020', 'm.rosian@gmail.com', '089767896789', 'default.png', 1),
(10, '41155050200024', 'Aditya Erlangga Putra', 'IF-B', '2020', 'aditya.e@gmail.com', '087967895678', 'default.png', 1),
(11, '41155050200009', 'Dzikra Wahyu Pradana', 'IF-B', '2020', 'dzikra.w.p@gmail.com', '0897567895890', 'default.png', 1),
(12, '41155050200021', 'M Ilham Darusalam', 'IF-B', '2020', 'm.ilham.d@gmail.com', '089767896789', 'default.png', 1),
(13, '41155050200026', 'Rifki Maulana Fajri', 'IF-B', '2020', 'rifki.m@gmail.com', '089678054852', 'default.png', 1),
(14, '41155050200002', 'Daffa Fitrah Akbar ', 'IF-B', '2020', 'daffa.fitrah@gmail.com', '089712341234', 'default.png', 1),
(15, '41155050200041', 'David Christian ', 'IF-B', '2020', 'david.c@gmail.com', '089756784567', 'default.png', 1),
(16, '41155050200023', 'Salman Rashif Fadhilah', 'IF-B', '2020', 'salman.rashif@gmail.com', '089756785678', 'default.png', 1),
(17, '41155050200001', 'Revi Adityansyah ', 'IF-B', '2020', 'revi.adit@gmail.com', '088712341234', 'default.png', 1),
(18, '41155050200006', 'Leonsius Trihatma ', 'IF-B', '2020', 'leonsius@gmail.com', '088756785678', 'default.png', 1),
(19, '41155050200070', 'Robi Hidayat ', 'IF-B', '2020', 'robi.h@gmail.com', '089712341234', 'default.png', 1),
(20, '41155055210075', 'Chintia Putri Demasari ', 'IF-B', '2020', 'chintia.putri@gmail.com', '089767896789', 'default.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `id_kandidat` int(11) NOT NULL,
  `id_voting` int(11) NOT NULL,
  `ketua` int(11) NOT NULL,
  `motto` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `nmr_urut` tinyint(4) NOT NULL,
  `photo_kandidat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`id_kandidat`, `id_voting`, `ketua`, `motto`, `keterangan`, `nmr_urut`, `photo_kandidat`) VALUES
(1, 1, 4, 'Menuju tak terbatas dan melampauinya', 'Visi:\r\nMenjadikan HIMA-IF yang terbaik yang pernah ada\r\n\r\nMisi:\r\nMakan gratis setiap hari jumat', 1, '20211002_111931_(2).jpg'),
(2, 1, 6, 'Hidup Seperti Larry', 'Fitness setiap hari', 2, 'candidate11.png'),
(10, 1, 8, 'Go go Power Ranger!!!', 'EHE...', 3, 'pp.jpg'),
(17, 3, 14, 'Heheh', 'Hehehe', 1, 'candidate1.png'),
(18, 5, 20, 'Yokkk', 'Yokkk', 1, 'default.png'),
(19, 3, 9, '', '', 2, 'default.png'),
(20, 6, 4, 'tes', 'tes', 1, 'default.png'),
(21, 7, 5, '10', '', 1, 'default.png'),
(22, 1, 5, '', '', 4, 'default.png'),
(23, 1, 15, '', '', 5, 'default.png'),
(24, 3, 4, '', '', 3, 'default.png'),
(25, 7, 17, '', '', 2, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `kepengurusan`
--

CREATE TABLE `kepengurusan` (
  `id_kep` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `tahun_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemilih`
--

CREATE TABLE `pemilih` (
  `id_pemilih` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_aktif` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemilih`
--

INSERT INTO `pemilih` (`id_pemilih`, `id_anggota`, `password`, `status_aktif`) VALUES
(1, 4, '$2y$10$8kZA5La7dgqOpcOpo5pLse..xILjoPJTQ1d5EtN8hFRmNdE3WpxT.', 1),
(2, 5, '$2y$10$K.TBFAofIKdw50J3DLa0NeCZhqAQc3nT2gdi8kxESKoIHUmC8.ri2', 1),
(3, 6, '$2y$10$JoGiBmcLeTIhjK/VNOkmm.yErXX9u4cRpvycOAiVYlPt4Yd2QrLr.', 1),
(4, 7, '$2y$10$V659hx2pNgHCjUTOAJ28Y.N97L3i.BK3MVNkj.Eg7ZD0lXv289Swy', 1),
(5, 8, '$2y$10$s6QxBZIdQ0LwStczCrdlLuNidUAkd/091dHB2D8xnvvAK21D5m9EO', 1),
(6, 9, '$2y$10$cVww9.c6VwQzUItIeg9Voe6B332fHFs26qbySBi5I4194sp9iXcOK', 1),
(7, 10, '$2y$10$17kqJSTwDRhkw77P/XwL9u7rEb63FzcudgzMUVJLE/XMUY7cdBK0u', 1),
(8, 11, '$2y$10$YaOvFRlGmaZEY7RMXx3xTO5qNNJwsKWXwwPPB7gw2vvO34fY9.hOe', 1),
(9, 12, '$2y$10$dlSj8rIsI3fLMxk.b2TqxugW0oxbV17sbajhx5pP96oJVN7hk0iI6', 1),
(10, 13, '$2y$10$tzP8NOv95rS1CCdec6r3vemG.QX263Fpg1n8mpsFVg.ALkGQsXcSC', 1),
(11, 14, '$2y$10$a240f3MsZX4.tk12xTMTlui/gACL.C26nAvqo.dO9nBJfA3GPIQW2', 1),
(12, 15, '$2y$10$USmO2tfkEpV87ABNNIf0OOqCVDHt/oOvZaCzmF0oaooKLkb091SBq', 1),
(13, 16, '$2y$10$dJ89L6Q2la.Hws/JxpP4peWBqlPXCFbJQS5tRVBEVVkTPJNaOGFHS', 1),
(14, 17, '$2y$10$FtOPrWrDC111r7zQ3scxTuXA0tvUAZ2aFijkXvwEdXktfzz310owS', 1),
(15, 18, '$2y$10$rDx0G9pQe/CDvD3am30mRekhbApxg/LGsoeJ5T0ZGLmVA3M61Nd3O', 1),
(16, 19, '$2y$10$f4dzPIQjoOkaf26Ai/TUb.7wyPkYoudsfziitCrv2q2XhZcqStUI.', 1),
(17, 20, '$2y$10$8Pjh/tf5Nlz42.NSf8Ju9OtH7OSsNlOO3oSSkL/CSfqWHlaX/oA2W', 1);

-- --------------------------------------------------------

--
-- Table structure for table `proker`
--

CREATE TABLE `proker` (
  `id_proker` int(11) NOT NULL,
  `judul_proker` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `tujuan` text NOT NULL,
  `sasaran` text NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `pic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suara`
--

CREATE TABLE `suara` (
  `id_voting` int(11) NOT NULL,
  `id_kandidat` int(11) NOT NULL,
  `id_pemilih` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suara`
--

INSERT INTO `suara` (`id_voting`, `id_kandidat`, `id_pemilih`, `waktu`) VALUES
(1, 1, 1, '2022-06-07 15:34:45'),
(1, 1, 14, '2022-06-08 13:08:36'),
(1, 2, 2, '2022-06-16 03:40:09'),
(1, 10, 3, '2022-06-16 03:40:24'),
(1, 22, 4, '2022-06-16 03:40:39'),
(1, 23, 5, '2022-06-16 03:40:55'),
(3, 17, 1, '2022-06-15 15:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `id_voting` int(11) NOT NULL,
  `periode` int(11) NOT NULL,
  `nama_voting` varchar(50) NOT NULL,
  `tgl_tutup` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`id_voting`, `periode`, `nama_voting`, `tgl_tutup`) VALUES
(1, 2022, 'Pemilihan Ketua', '2022-06-14'),
(3, 2022, 'Pemilihan Mentri', '2022-06-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- Indexes for table `kepengurusan`
--
ALTER TABLE `kepengurusan`
  ADD PRIMARY KEY (`id_kep`);

--
-- Indexes for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id_pemilih`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `suara`
--
ALTER TABLE `suara`
  ADD PRIMARY KEY (`id_voting`,`id_kandidat`,`id_pemilih`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`id_voting`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id_kandidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kepengurusan`
--
ALTER TABLE `kepengurusan`
  MODIFY `id_kep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemilih`
--
ALTER TABLE `pemilih`
  MODIFY `id_pemilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `voting`
--
ALTER TABLE `voting`
  MODIFY `id_voting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
