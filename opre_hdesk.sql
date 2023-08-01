-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 05:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opre_hdesk`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `grap`
-- (See below for the actual view)
--
CREATE TABLE `grap` (
`departemen` varchar(100),
`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `grap2`
-- (See below for the actual view)
--
CREATE TABLE `grap2` (
`departemen` varchar(100),
`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `idtiket` varchar(200) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `problem` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` enum('Open','Closed','Pending') NOT NULL DEFAULT 'Open',
  `date` date NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(10) NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateuser` int(10) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `solveby` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` smallint(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `hak_akses` enum('Super Admin','STAFF','HELPDESK') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_user`, `password`, `departemen`, `email`, `telepon`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(272, 'irsyad', 'irsyad', '5647b8b060c2f2c9f5608e77f1aecd12', '', '', '', 'Super Admin', 'aktif', '2023-06-22 01:12:14', '2023-06-22 01:12:14'),
(274, 'dhea', 'dhea fareza', '1c1d655f0a880b9a577db312cf702e2a', '', '', '', 'HELPDESK', 'aktif', '2023-06-22 03:37:16', '2023-06-22 03:37:16'),
(275, 'abida', 'abida amalia', '39f6c4b3068b36053ddd7439b36463f8', '', '', '', 'HELPDESK', 'aktif', '2023-06-22 03:37:48', '2023-06-22 03:37:48'),
(276, 'fito', 'alfito priananda', 'c56d61aa8107f2922b5045df029c4422', '', '', '', 'Super Admin', 'aktif', '2023-06-22 03:38:25', '2023-06-22 03:38:25');

-- --------------------------------------------------------

--
-- Structure for view `grap`
--
DROP TABLE IF EXISTS `grap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grap`  AS   (select `a`.`departemen` AS `departemen`,count(`a`.`status`) AS `total` from `tiket` `a` where `a`.`status` = 'Open' group by 1)  ;

-- --------------------------------------------------------

--
-- Structure for view `grap2`
--
DROP TABLE IF EXISTS `grap2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grap2`  AS   (select `a`.`departemen` AS `departemen`,count(`a`.`status`) AS `total` from `tiket` `a` where `a`.`status` = 'Closed' group by 1)  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`idtiket`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;
COMMIT;

-- Adding the new column `foto` to the `tiket` table
ALTER TABLE `tiket`
ADD COLUMN `foto` varchar(100) NOT NULL AFTER `problem`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*UPDATE pengguna
SET hak_akses = 'Admin'
WHERE hak_akses = 'Admin' OR hak_akses = 'Staff' OR hak_akses = 'Helpdesk';

UPDATE pengguna
SET hak_akses = 'User'
WHERE hak_akses = 'User' OR hak_akses = 'User Lama';

UPDATE pengguna
SET hak_akses = 'Teknisi'
WHERE hak_akses = 'Teknisi' OR hak_akses = 'Staff Baru';*/