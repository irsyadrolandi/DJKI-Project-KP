-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 06:18 AM
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
`priority` varchar(100)
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `grap2`
-- (See below for the actual view)
--
CREATE TABLE `grap2` (
`priority` varchar(100)
,`total` bigint(21)
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
  `teknisi` varchar(100) NOT NULL,
  `keteranganteknisi` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` enum('Open','Pending','Closed') NOT NULL DEFAULT 'Open',
  `date` date NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(10) NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateuser` int(10) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `solveby` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`idtiket`, `departemen`, `nama`, `email`, `problem`, `teknisi`, `keteranganteknisi`, `foto`, `status`, `date`, `createdate`, `id_user`, `updatedate`, `updateuser`, `priority`, `solveby`) VALUES
('TKT-2023-000002', 'ti', 'user 1', '12345', 'blablabla', '', '', 'assets/uploads/Timmy.png', 'Open', '2023-08-02', '2023-08-02 03:12:44', 277, '2023-08-02 03:12:44', 0, 'PC', 0),
('TKT-2023-000003', 'meow', 'user 2', '09876', 'mledag', '', '', 'assets/uploads/Screenshot (3).png', 'Open', '2023-08-02', '2023-08-02 03:13:33', 277, '2023-08-02 03:13:33', 0, 'Wifi', 0),
('TKT-2023-000004', 'wleoloe', 'user 3', '654321', 'asdfghjkl', '', '', 'assets/uploads/Screenshot 2023-03-16 214325.png', 'Open', '2023-08-02', '2023-08-02 03:14:11', 277, '2023-08-02 03:14:11', 0, 'Kabel', 0),
('TKT-2023-000005', 'informatika', 'rolandi', '21120122222', 'laptop error', '', '', 'assets/uploads/bola logam.jpg', 'Closed', '2023-08-03', '2023-08-03 03:04:48', 277, '2023-08-03 03:04:48', 0, 'Laptop', 0),
('TKT-2023-000006', 'Pengembangan Sistem Informasi KI - TIKI', 'Database dan Keamanan Data', '12345', 'asdfghjkl', '', '', '', 'Open', '2023-08-03', '2023-08-03 04:24:39', 283, '2023-08-03 04:24:39', 0, 'Scanner', 0);

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
  `hak_akses` enum('Admin','USER','TEKNISI') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_user`, `password`, `departemen`, `email`, `telepon`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(272, 'irsyad', 'irsyad', '5647b8b060c2f2c9f5608e77f1aecd12', '', '', '', 'Admin', 'aktif', '2023-06-22 01:12:14', '2023-08-03 04:03:42'),
(274, 'dhea', 'dhea fareza', '1c1d655f0a880b9a577db312cf702e2a', '', '', '', 'TEKNISI', 'aktif', '2023-06-22 03:37:16', '2023-08-03 04:03:57'),
(275, 'abida', 'abida amalia', '39f6c4b3068b36053ddd7439b36463f8', '', '', '', 'TEKNISI', 'aktif', '2023-06-22 03:37:48', '2023-08-03 04:04:27'),
(276, 'fito', 'alfito priananda', 'c56d61aa8107f2922b5045df029c4422', '', '', '', 'Admin', 'aktif', '2023-06-22 03:38:25', '2023-08-03 04:04:36'),
(277, 'user', 'user', '202cb962ac59075b964b07152d234b70', 'mahasiswa', '', '', 'USER', 'aktif', '2023-07-28 10:16:34', '2023-08-03 04:04:45'),
(280, 'PerencanaanTI', 'Perencanaan TI', '202cb962ac59075b964b07152d234b70', 'Perencanaan - TIKI', '', '', 'USER', 'aktif', '2023-08-03 04:15:41', '2023-08-03 04:15:41'),
(281, 'PortalWeb', 'Portal Web', '202cb962ac59075b964b07152d234b70', 'Perencanaan - TIKI', '', '', 'USER', 'aktif', '2023-08-03 04:16:47', '2023-08-03 04:16:47'),
(282, 'Aplikasi', 'Aplikasi', '202cb962ac59075b964b07152d234b70', 'Pengembangan Sistem Informasi KI - TIKI', '', '', 'USER', 'aktif', '2023-08-03 04:18:59', '2023-08-03 04:20:39'),
(283, 'DatabaseKeamananData', 'Database dan Keamanan Data', '202cb962ac59075b964b07152d234b70', 'Pengembangan Sistem Informasi KI - TIKI', '', '', 'USER', 'aktif', '2023-08-03 04:19:55', '2023-08-03 04:19:55'),
(284, 'TataUsaha', 'Tata Usaha', '202cb962ac59075b964b07152d234b70', 'TIKI', '', '', 'USER', 'aktif', '2023-08-03 04:25:49', '2023-08-03 04:25:49'),
(285, 'PelayananDataInformasi', 'Pelayanan Data dan Informasi', '202cb962ac59075b964b07152d234b70', 'Pengembangan SI KI', '', '', 'USER', 'aktif', '2023-08-03 04:27:12', '2023-08-03 04:27:12'),
(286, 'LayananPemeliharaanInfras', 'Layanan Pemeliharaan Infrastruktur', '202cb962ac59075b964b07152d234b70', 'Pendukung  Infrastruktur - TIKI', '', '', 'USER', 'aktif', '2023-08-03 04:28:17', '2023-08-03 04:28:17'),
(287, 'PengelolaanJaringan', 'Pengelolaan Jaringan', '202cb962ac59075b964b07152d234b70', 'Pendukung Infrastruktur - TIKI', '', '', 'USER', 'aktif', '2023-08-03 04:30:39', '2023-08-03 04:30:39'),
(288, 'TataUsaha', 'Tata Usaha', '202cb962ac59075b964b07152d234b70', 'Tata Usaha - Penyidikan', '', '', 'USER', 'aktif', '2023-08-03 04:31:44', '2023-08-03 04:31:44'),
(289, 'Pengaduan', 'Pengaduan', '202cb962ac59075b964b07152d234b70', 'Pengaduan dan Administrasi ASN - Penyidik', '', '', 'USER', 'aktif', '2023-08-03 04:33:05', '2023-08-03 04:33:05'),
(290, 'AdministrasiPenyidikASN', 'Administrasi Penyidik ASN', '202cb962ac59075b964b07152d234b70', 'Pengaduan dan Administrasi Penyidik ASN - Penyidik', '', '', 'USER', 'aktif', '2023-08-03 04:34:35', '2023-08-03 04:34:35'),
(291, 'Penindakan', 'Penindakan', '202cb962ac59075b964b07152d234b70', 'Penindakan dan Pemantauan - Penyidikan', '', '', 'USER', 'aktif', '2023-08-03 04:35:29', '2023-08-03 04:35:29'),
(292, 'PemantauanBarbuk', 'Pemantauan dan Barang Bukti', '202cb962ac59075b964b07152d234b70', 'Penindakan dan Pemantauan - Penyidikan', '', '', 'USER', 'aktif', '2023-08-03 04:36:30', '2023-08-03 04:36:30'),
(293, 'Pencegahan', 'Pencegahan', '202cb962ac59075b964b07152d234b70', 'Pencegahan dan Penyelesaian Sengketa - Penyidikan', '', '', 'USER', 'aktif', '2023-08-03 04:37:15', '2023-08-03 04:37:15'),
(294, 'SengketaAlternatif', 'Sengketa Alternatif', '202cb962ac59075b964b07152d234b70', 'Pencegahan dan Penyelesaian Sengketa - Penyidikan', '', '', 'USER', 'aktif', '2023-08-03 04:38:04', '2023-08-03 04:38:04'),
(295, 'RencanaAnggaran', 'Penyusunan Rencana dan Anggaran', '202cb962ac59075b964b07152d234b70', 'Bag. Program dan Pelaporan - Sekjen', '', '', 'USER', 'aktif', '2023-08-03 04:43:12', '2023-08-03 04:43:12'),
(296, 'UUKelembagaanReformasi', 'Perundang-undangan, Kelembagaan, Reformasi', '202cb962ac59075b964b07152d234b70', 'Bag. Program dan Pelaporan - Sekjen', '', '', 'USER', 'aktif', '2023-08-03 04:44:05', '2023-08-03 04:44:05'),
(297, 'EvaluasiPelaporan', 'Evaluasi dan Pelaporan', '202cb962ac59075b964b07152d234b70', 'Bag. Program dan Pelaporan', '', '', 'USER', 'aktif', '2023-08-03 04:44:51', '2023-08-03 04:44:51'),
(298, 'PelaksanaanAnggaran', 'Pelaksanaan Anggaran', '202cb962ac59075b964b07152d234b70', 'Bag. Keuangan', '', '', 'USER', 'aktif', '2023-08-03 04:45:33', '2023-08-03 04:45:33'),
(299, 'Perbendaharaan', 'Perbendaharaan', '202cb962ac59075b964b07152d234b70', 'Bag. Keuangan', '', '', 'USER', 'aktif', '2023-08-03 04:45:55', '2023-08-03 04:45:55'),
(300, 'PengelolaanPNBP', 'Pengelolaan PNBP', '202cb962ac59075b964b07152d234b70', 'Bag. Keuangan', '', '', 'USER', 'aktif', '2023-08-03 04:46:51', '2023-08-03 04:46:51'),
(301, 'AkuntansiPelaporan', 'Akuntansi Pelaporan', '202cb962ac59075b964b07152d234b70', 'Bag. Keuangan', '', '', 'USER', 'aktif', '2023-08-03 04:47:15', '2023-08-03 04:47:15'),
(302, 'TUPimpinanProtokol', 'TU Pimpinan dan Protokol', '202cb962ac59075b964b07152d234b70', 'Kepala Bag. Bagian Umum, Pengelolaan Barang Milik Negara - Sekjen', '', '', 'USER', 'aktif', '2023-08-03 04:48:53', '2023-08-03 04:48:53'),
(303, 'RumahTangga', 'Rumah Tangga', '202cb962ac59075b964b07152d234b70', 'Kepala Bagian Umum, Pengelolaan Barang Milik Negara, dan Pengadaan - Sekjen', '', '', 'USER', 'aktif', '2023-08-03 04:49:53', '2023-08-03 04:49:53'),
(304, 'LayananPengadaan', 'Layanan Pengadaan', '5647b8b060c2f2c9f5608e77f1aecd12', 'Kepala Bagian Umum, Pengelolaan Barang Milik Negara, dan Pengadaan - Sekjen', '', '', 'USER', 'aktif', '2023-08-03 04:50:15', '2023-08-03 04:50:15'),
(305, 'PengelolaanBarangNegara', 'Pengelolaan Barang Milik Negara', '202cb962ac59075b964b07152d234b70', 'Kepala Bagian Umum, Pengelolaan Barang Milik Negara, dan Pengadaan - Sekjen', '', '', 'USER', 'aktif', '2023-08-03 04:50:52', '2023-08-03 04:50:52'),
(306, 'PersuratanPerjalananDinas', 'Persuratan Dan Perjalanan Dinas', '202cb962ac59075b964b07152d234b70', 'Kepala Bagian Umum, Pengelolaan Barang Milik Negara, dan Pengadaan - Sekjen', '', '', 'USER', 'aktif', '2023-08-03 04:53:41', '2023-08-03 04:53:41'),
(307, 'Kepegawaian', 'Kepegawaian', '202cb962ac59075b964b07152d234b70', 'Koor. Kepegawaian-Sekjen', '', '', 'USER', 'aktif', '2023-08-03 06:27:06', '2023-08-03 06:29:13'),
(308, 'MutasiPP', 'Mutasi, Pemberhentian, dan Pensiun', '202cb962ac59075b964b07152d234b70', 'Koor. Kepegawaian-Sekjen', '', '', 'USER', 'aktif', '2023-08-03 06:28:55', '2023-08-03 06:28:55'),
(309, 'PengembanganPegawai', 'PengembanganPegawai', '202cb962ac59075b964b07152d234b70', 'Koor. Kepegawaian - Sekjen', '', '', 'USER', 'aktif', '2023-08-03 06:29:59', '2023-08-03 06:31:31'),
(310, 'Humas', 'Hubungan Masyarakat', '202cb962ac59075b964b07152d234b70', 'Koor. TU dan Humas - Sekjen', '', '', 'USER', 'aktif', '2023-08-03 06:31:17', '2023-08-03 06:31:17'),
(311, 'TU', 'Sub. Tata Usaha - Hak Cipta Industri', '202cb962ac59075b964b07152d234b70', 'Direktorat Hak Ciptra dan Industri', '', '', 'USER', 'aktif', '2023-08-03 06:32:27', '2023-08-03 06:32:27'),
(312, 'AdmPermohonan', 'Administrasi Permohonan', '202cb962ac59075b964b07152d234b70', 'Koor. Permohonan dan Publikasi - Sekjen', '', '', 'USER', 'aktif', '2023-08-03 06:33:19', '2023-08-03 06:33:19'),
(313, 'KlasifikasiPublikasi', 'Klasifikasi dan Publikasi', '202cb962ac59075b964b07152d234b70', 'Koor. Permohonan dan Publikasi - Hak Cipta Desain Industri', '', '', 'USER', 'aktif', '2023-08-03 06:35:31', '2023-08-03 06:35:31'),
(314, 'VerifikasiCiptaan', 'Verifikasi Ciptaan dan Produk Hak Terkait', '202cb962ac59075b964b07152d234b70', 'Koor. Permohonan dan Publikasi', '', '', 'USER', 'aktif', '2023-08-03 06:37:03', '2023-08-03 06:37:03'),
(315, 'PelayananTeknis', 'Pelayanan Teknis', '202cb962ac59075b964b07152d234b70', 'Koor. Pemeriksaan Desain Industri - Hak Cipta Desain Industri', '', '', 'USER', 'aktif', '2023-08-03 06:38:59', '2023-08-03 06:38:59'),
(316, 'SertifikasiMutasiLisensi', 'Sertifikasi, Mutasi, dan Lisensi', '202cb962ac59075b964b07152d234b70', 'Koor. Sertifikasi dan Dokumentasi - Hak Cipta Desain Industri', '', '', 'USER', 'aktif', '2023-08-03 06:40:25', '2023-08-03 06:40:25'),
(317, 'Dokumentasi', 'Dokumentasi', '202cb962ac59075b964b07152d234b70', 'Koor. Sertifikasi dan Dokumentasi - Hak Cipta dan Desain Industri', '', '', 'USER', 'aktif', '2023-08-03 06:41:24', '2023-08-03 06:41:24'),
(318, 'HukumLitigasi', 'Hukum Litigasi', '202cb962ac59075b964b07152d234b70', 'Koor. Pelayanan Hukum dan Lembaga Manajemen Kolektif - Hak Cipta Desain Industri', '', '', 'USER', 'aktif', '2023-08-03 06:42:56', '2023-08-03 06:42:56'),
(319, 'LembagaManajemen', 'Lembaga Manajemen Kolektif', '202cb962ac59075b964b07152d234b70', 'Koor. Pelayanan Hukum dan Lembaga Manajemen Kolektif', '', '', 'USER', 'aktif', '2023-08-03 06:43:47', '2023-08-03 06:45:14'),
(320, 'AdmPermohonan', 'Administrasi Permohonan', '202cb962ac59075b964b07152d234b70', 'Koor. Permohonan dan Publikasi - Paten, Desain Tata Letak Sirkuit Terpadu, dan Rahasia Dagang', '', '', 'USER', 'aktif', '2023-08-03 06:46:39', '2023-08-03 06:46:39'),
(321, 'PubDokumentasi', 'Publikasi dan Dokumentasi', '202cb962ac59075b964b07152d234b70', 'Koor. Permohonan dan Publikasi - Paten, Desain Tata Letak Sirkuit Terpadu, dan Rahasia Dagang', '', '', 'USER', 'aktif', '2023-08-03 06:47:14', '2023-08-03 06:47:14'),
(322, 'KlasifikasiPaten', 'Klasifikasi Paten', '202cb962ac59075b964b07152d234b70', 'Koor. Klasifikasi dan Penelusuran Paten - Paten, Desain Tata Letak Sirkuit Terpadu, dan Rahasia Daga', '', '', 'USER', 'aktif', '2023-08-03 06:48:21', '2023-08-03 06:48:56'),
(323, 'PenelusuranPaten', 'Penelusuran Paten', '202cb962ac59075b964b07152d234b70', 'Koor. Klasifikasi dan Penelusuran Paten - Paten, Desain Tata Letak Sirkuit Terpadu, dan Rahasia Daga', '', '', 'USER', 'aktif', '2023-08-03 06:49:34', '2023-08-03 06:49:34'),
(324, 'PelayananTeknis', 'Pelayanan Teknis', '202cb962ac59075b964b07152d234b70', 'Koor. Pemeriksaan Paten - Paten, Desain Tata Letak Sirkuit Terpadu, dan Rahasia Dagang', '', '', 'USER', 'aktif', '2023-08-03 06:50:09', '2023-08-03 06:50:09'),
(325, 'Sertifikasi', 'Sertifikasi', '202cb962ac59075b964b07152d234b70', 'Koor. Klasifikasi dan Penelusuran Paten - Paten, Desain Tata Letak Sirkuit Terpadu, dan Rahasia Daga', '', '', 'USER', 'aktif', '2023-08-03 06:51:37', '2023-08-03 06:52:57'),
(326, 'Pemeliharaan', 'Pemeliharaan, Mutasi, dan Lisensi', '202cb962ac59075b964b07152d234b70', 'Koor. Sertifikasi, Pemeliharaan, Mutasi, dan Lisensi - Paten, Desain Tata Letak Sirkuit Terpadu, dan', '', '', 'USER', 'aktif', '2023-08-03 06:52:41', '2023-08-03 06:52:41'),
(327, 'PertimbanganHukum', 'Pertimbangan Hukum dan Litigasi', '202cb962ac59075b964b07152d234b70', 'Koor. Pelayanan Hukum dan Fasilitasi Komisi Banding Paten - Paten, Desain Tata Letak Sirkuit Terpadu', '', '', 'USER', 'aktif', '2023-08-03 06:53:49', '2023-08-03 06:53:49'),
(328, 'KomisiBanding', 'Pertimbangan Komisi Banding Paten', '202cb962ac59075b964b07152d234b70', 'Koor. Pelayanan Hukum dan Fasilitasi Komisi Banding Paten - Paten, Desain Tata Letak Sirkuit Terpadu', '', '', 'USER', 'aktif', '2023-08-03 06:55:18', '2023-08-03 06:55:18'),
(329, 'TU', 'SubBag. Tata Usaha', '202cb962ac59075b964b07152d234b70', 'Koor. Pelayanan Hukum dan Fasilitasi Komisi Banding Paten - Paten, Desain Tata Letak Sirkuit Terpadu', '', '', 'USER', 'aktif', '2023-08-03 06:55:54', '2023-08-03 06:55:54'),
(330, 'TU', 'SubBag. Tata Usaha', '202cb962ac59075b964b07152d234b70', 'Merek dan Indikasi Geografis', '', '', 'USER', 'aktif', '2023-08-03 06:57:01', '2023-08-03 06:57:01'),
(331, 'AdmPermohonan', 'Administrasi Permohonan dan Klasifikasi', '202cb962ac59075b964b07152d234b70', 'Koor. Permohonan dan Publikasi - Merek dan Indikasi Geografis', '', '', 'USER', 'aktif', '2023-08-03 06:58:32', '2023-08-03 06:58:32'),
(332, 'PublikasiDokumentasi', 'Publikasi dan Dokumentasi', '202cb962ac59075b964b07152d234b70', 'Koor. Permohonan dan Publikasi - Merek dan Indikasi Geografis', '', '', 'USER', 'aktif', '2023-08-03 06:59:41', '2023-08-03 06:59:41'),
(333, 'PelayananTeknis', 'Pelayanan Teknis', '202cb962ac59075b964b07152d234b70', 'Koor. Pemeriksaan Teknis - Merek dan Indikasi Geografis', '', '', 'USER', 'aktif', '2023-08-03 07:00:35', '2023-08-03 07:00:35'),
(334, 'Sertifikasi', 'Sertifikasi', '202cb962ac59075b964b07152d234b70', 'Koor. Sertifikasi dan Monitoring Merek Terdaftar - Merek dan Indikasi Geografis', '', '', 'USER', 'aktif', '2023-08-03 07:01:19', '2023-08-03 07:01:19'),
(335, 'MutasiLisensi', 'Mutasi dan Lisensi', '202cb962ac59075b964b07152d234b70', 'Koor. Pemeriksaan Sertifikasi dan Monitoring Merek Terdaftar - Merek dan Indikasi Geografis', '', '', 'USER', 'aktif', '2023-08-03 07:01:45', '2023-08-03 07:09:47'),
(336, 'PerpanjanganMonitoring', 'Perpanjangan dan Monitoring', '202cb962ac59075b964b07152d234b70', 'Koor. Pemeriksaan Sertifikasi dan Monitoring Merek Terdaftar - Merek dan Indikasi Geografis', '', '', 'USER', 'aktif', '2023-08-03 07:07:56', '2023-08-03 07:07:56'),
(337, 'PemeriksaanGeografis', 'Pemeriksaan Indikasi Geografis', '202cb962ac59075b964b07152d234b70', 'Koor. Indikasi Geografis - Merek dan Indikasi Geografis', '', '', 'USER', 'aktif', '2023-08-03 07:13:56', '2023-08-03 07:13:56'),
(338, 'PemantauanGeografis', 'Pemantauan dan Pengawasan Indikasi Geografis', '202cb962ac59075b964b07152d234b70', 'Koor. Indikasi Geografis - Merek dan Indikasi Geografis', '', '', 'USER', 'aktif', '2023-08-03 07:14:49', '2023-08-03 07:14:49'),
(339, 'PertimbanganHukum', 'Pertimbangan Hukum dan Litigasi', '202cb962ac59075b964b07152d234b70', 'Koor. Pelayanan Hukum dan Fasilitasi Komisi Banding Merek - Merek dan Indikasi Geografis', '', '', 'USER', 'aktif', '2023-08-03 07:15:55', '2023-08-03 07:15:55'),
(340, 'FasilitasiKomisi', 'Fasilitasi Komisi Banding Merek', '202cb962ac59075b964b07152d234b70', 'Koor. Pelayanan Hukum dan Fasilitasi Komisi Banding Merek - Merek dan Indikasi Geografis', '', '', 'USER', 'aktif', '2023-08-03 07:16:32', '2023-08-03 07:16:32'),
(341, 'TU', 'Tata Usaha', '202cb962ac59075b964b07152d234b70', 'Kerja Sama dan Pemberdayaan KI', '', '', 'USER', 'aktif', '2023-08-03 07:19:35', '2023-08-03 07:19:35'),
(342, 'AntarLembagaPemerintah', 'Kerja Sama AntarLembaga Pemerintah', '202cb962ac59075b964b07152d234b70', 'Koor. Kerja Sama dalam Negeri - Kerja Sama dan Pemberdayaan KI', '', '', 'USER', 'aktif', '2023-08-03 07:20:50', '2023-08-03 07:20:50'),
(343, 'AntarLembagaNonPem', 'Kerja Sama AntarLembaga NonPemerintahan', '202cb962ac59075b964b07152d234b70', 'Koor. Kerja Sama dalam Negeri - Kerja Sama dan Pemberdayaan KI', '', '', 'USER', 'aktif', '2023-08-03 07:22:01', '2023-08-03 07:22:01'),
(344, 'Bilateral', 'Kerja Sama Bilateral', '202cb962ac59075b964b07152d234b70', 'Koor. Kerja Sama Luar Negeri - Kerja Sama dan Pemberdayaan KI', '', '', 'USER', 'aktif', '2023-08-03 07:22:34', '2023-08-03 07:22:34'),
(345, 'Regional', 'Kerja Sama Regional', '202cb962ac59075b964b07152d234b70', 'Koor. Kerja Sama Luar Negeri - Kerja Sama dan Pemberdayaan KI', '', '', 'USER', 'aktif', '2023-08-03 07:22:51', '2023-08-03 07:22:51'),
(346, 'OrgInternasional', 'Kerja Sama Organisasi Internasional', '202cb962ac59075b964b07152d234b70', 'Koor. Kerja Sama Luar Negeri - Kerja Sama dan Pemberdayaan KI', '', '', 'USER', 'aktif', '2023-08-03 07:23:35', '2023-08-03 07:23:35'),
(347, 'PotensiKI', 'Pemberdayaan Potensi KI', '202cb962ac59075b964b07152d234b70', 'Koor. Pemberdayaan KI - Kerja Sama dan Pemberdayaan KI', '', '', 'USER', 'aktif', '2023-08-03 07:25:38', '2023-08-03 07:25:38'),
(348, 'Diseminasi', 'Diseminasi dan Promosi', '202cb962ac59075b964b07152d234b70', 'Koor. Pemberdayaan KI - Kerja Sama dan Pemberdayaan KI', '', '', 'USER', 'aktif', '2023-08-03 07:26:41', '2023-08-03 07:26:41'),
(349, 'Inventarisasi', 'Inventarisasi KI Komunal dan Perpustakaan', '202cb962ac59075b964b07152d234b70', 'Koor. Pemberdayaan KI - Kerja Sama dan Pemberdayaan KI', '', '', 'USER', 'aktif', '2023-08-03 07:27:23', '2023-08-03 07:27:23');

-- --------------------------------------------------------

--
-- Structure for view `grap`
--
DROP TABLE IF EXISTS `grap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grap`  AS   (select `a`.`priority` AS `priority`,count(`a`.`status`) AS `total` from `tiket` `a` where `a`.`status` = 'Open' group by 1)  ;

-- --------------------------------------------------------

--
-- Structure for view `grap2`
--
DROP TABLE IF EXISTS `grap2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grap2`  AS   (select `a`.`priority` AS `priority`,count(`a`.`status`) AS `total` from `tiket` `a` where `a`.`status` = 'Closed' group by 1)  ;

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
  MODIFY `id_user` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
