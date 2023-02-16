-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2023 at 05:16 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `galeri_id` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` int(2) NOT NULL,
  `isi` mediumtext NOT NULL,
  `foto` varchar(35) DEFAULT NULL,
  `link` mediumtext,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`galeri_id`, `judul`, `kategori`, `isi`, `foto`, `link`, `created_at`, `updated_at`) VALUES
(34, 'Acara Pesantren Kilat', 0, '', 'galeri-221107-779dbffd44.jpeg', '', '2022-11-07 11:56:59', NULL),
(35, 'Acara Pengajian Yayasan', 0, '', 'galeri-221107-fa45dadece.jpeg', '', '2022-11-07 11:57:26', NULL),
(36, 'Guru-guru RA Az-Zahra', 0, '', 'galeri-221107-05060de7d8.jpeg', '', '2022-11-07 11:57:46', NULL),
(37, 'Acara Outbound Di Puncak', 0, '', 'galeri-221108-52a7752a82.jpg', '', '2022-11-08 08:12:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gelombang`
--

CREATE TABLE `gelombang` (
  `gelombang_id` int(5) NOT NULL,
  `judul_gel` varchar(50) NOT NULL,
  `tgl_buka` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `isi` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gelombang`
--

INSERT INTO `gelombang` (`gelombang_id`, `judul_gel`, `tgl_buka`, `tgl_tutup`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'Gelombang 1', '2019-12-01', '2019-02-28', '<p>Gelombang 1</p>\r\n\r\n<p>Pembayaran SPP sebesar Rp.110.000*</p>\r\n', '2019-07-12 15:03:54', '2019-09-27 11:46:38'),
(2, 'Gelombang 2', '2019-03-01', '2019-04-30', '<p>Gelombang 2</p>\r\n\r\n<p>Pembayaran SPP sebesar Rp.165.000*</p>\r\n', '2019-07-12 15:07:24', '2019-09-27 11:46:24'),
(3, 'Gelombang 3', '2019-06-01', '2019-07-31', '<p>Gelombang 3</p>\r\n\r\n<p>Pembayaran SPP sebesar Rp.220.000*</p>\r\n', '2019-07-12 15:08:25', '2019-09-27 11:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `info_id` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` mediumtext NOT NULL,
  `foto` varchar(35) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`info_id`, `id_kategori`, `judul`, `isi`, `foto`, `created_at`, `updated_at`) VALUES
(13, 3, 'Acara Pesantren', '<p>Program pesantren kilat biasanya marak digelar selama Bulan Ramadhan, utamanya di Indonesia. Pesantren kilat atau yang biasa disingkat Sanlat ini merupakan kegiatan pesantren yang diadakan dalam kurun waktu yang singkat. Manfaat pesantren kilat bagi anak-anak :</p>\r\n\r\n<p>1. Mengamalkan Ajaran Islam dalam Kehidupan Sehari-Hari</p>\r\n\r\n<p>2. Meningkatkan Pemahaman tentang Ajaran Agama Islam</p>\r\n\r\n<p>3. Memperbaiki Ibadah dan Akhlak<br>\r\n </p>\r\n', 'info-221107-f91cae7c6f.jpeg', '2022-11-07 11:46:12', '2022-11-08 07:51:54'),
(14, 3, 'Kegiatan Belajar Mengajar di Kelas', '<p>Belajar merupakan suatu proses usaha yang dilakukan seseorang untuk memperoleh suatu perubahan tingkah laku yang baru secara keseluruhan, sebagai hasil pengalamannya sendiri dalam interaksi dengan lingkungannya.</p>\r\n\r\n<p>Mengajar adalah membimbing siswa dalam kegiatan belajar mengajar atau mengandung pengertian bahwa mengajar merupakan suatu usaha mengorganisasi lingkungan dalam hubungannya dengan anak didik dan bahan pengajaran yang menimbulkan terjadinya proses belajar.</p>\r\n', 'info-221107-c66c1a2b98.jpeg', '2022-11-07 11:46:36', '2022-11-08 07:52:40'),
(15, 1, 'Acara Pesantren Kilat', '<p>Program pesantren kilat biasanya marak digelar selama Bulan Ramadhan, utamanya di Indonesia. Pesantren kilat atau yang biasa disingkat Sanlat ini merupakan kegiatan pesantren yang diadakan dalam kurun waktu yang singkat. Manfaat pesantren kilat bagi anak-anak :</p>\r\n\r\n<p>1. Mengamalkan Ajaran Islam dalam Kehidupan Sehari-Hari</p>\r\n\r\n<p>2. Meningkatkan Pemahaman tentang Ajaran Agama Islam</p>\r\n\r\n<p>3. Memperbaiki Ibadah dan Akhlak</p>\r\n', 'info-221107-7d4d53a1d4.jpeg', '2022-11-07 11:47:03', '2022-11-08 07:52:10'),
(16, 2, 'Kegiatan Ekstrakulikuler Drumband', '<p>Ekstrakulikuler Drum Band/Marching Band Manfaatnya :</p>\r\n\r\n<p><strong>1. Meningkatkan Kemampuan Seni Musik</strong></p>\r\n\r\n<p><strong>2. Meningkatkan Kemampuan Sosial dan Emosional</strong></p>\r\n\r\n<p><strong>3. Meningkatkan rasa percaya diri</strong></p>\r\n\r\n<p><strong>4. Meningkatkan Kemampuan Motorik Anak</strong></p>\r\n\r\n<p><strong>5. Membuat anak bekerja sama memainkan alat musik bersama teman</strong></p>\r\n\r\n<p><strong>6. Membuat anak senang dan familier terhadap suara musik</strong></p>\r\n', 'info-221108-5ef46bd09b.jpg', '2022-11-08 07:35:14', '2022-11-08 08:01:03'),
(17, 2, 'Kegiatan Berenang', '<p>Ekstrakulikuler Les Renang untuk Anak : </p>\r\n\r\n<ol>\r\n <li>Menghindari anak dari resiko obesitas.</li>\r\n <li>Meningkatkan stamina anak.</li>\r\n <li>Manfaat les renang dapat melatih anak untuk disiplin. Saat ikut les renang, biasanya anak akan mendapatkan banyak instruksi, harus datang tepat waktu, harus mengikuti peraturan dll.</li>\r\n <li>Anak akan mendapatkan kualitas tidur lebih baik.</li>\r\n <li>Tidak perlu kaget sekiranya nafsu makan anak sangat tinggi dan anak tidur nyenyak selepas menjalankan aktivitas renangnya. Itu karena aktivitas renang membantu anak mengeluarkan energi dengan cara yang menyenangkan.</li>\r\n</ol>\r\n', 'info-221108-1a471e16ec.jpeg', '2022-11-08 07:36:05', '2022-11-08 07:54:09'),
(18, 1, 'Les Sempoa', '<p>Ekstrakulikuler Sempoa :</p>\r\n\r\n<p>Selain berguna sebagai alat bantu hitung aritmetika yang praktis, sempoa juga memiliki manfaat yang sangat penting lainnya. Terlebih, bagi anak yang tengah dalam masa perkembangan. Manfaat tersebut antara lain adalah:</p>\r\n\r\n<ol>\r\n <li>Menjadikan matematika sebagai pelajaran yang menyenangkan</li>\r\n <li>Meningkatkan kemampuan berhitung secara cepat dan tepat</li>\r\n <li>Meningkatkan daya tahan anak terhadap stress dan tekanan</li>\r\n <li>Meningkatkan kemampuan menyelesaikan masalah bagi anak-anak</li>\r\n <li>Mengembangkan rasa percaya diri</li>\r\n <li>Meningkatkan kemampuan mendengar anak</li>\r\n <li>Memberikan dasar aritmetika yang kuat kepada anak</li>\r\n</ol>\r\n', 'info-221108-0fad87ec16.jpeg', '2022-11-08 07:38:03', '2022-11-08 08:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(5) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Berita Sekolah', '2022-10-13 03:44:02', NULL),
(2, 'Kegiatan Sekolah', '2022-07-13 03:44:20', NULL),
(3, 'Lingkungan Sekolah', '2022-07-13 03:44:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `kegiatan_id` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` mediumtext NOT NULL,
  `foto` varchar(35) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`kegiatan_id`, `judul`, `isi`, `foto`, `created`, `updated`) VALUES
(1, 'Berenang', 'Kegiatan Ekstrakulikuler', 'kegiatan-221108-berenang.jpeg', '2022-11-07 17:00:00', '2022-11-07 17:00:00'),
(2, 'Drumband', 'Kegiatan Ekstrakulikuler', 'NULL', '2022-11-07 17:00:00', '2022-11-07 17:00:00'),
(3, 'Sempoa', 'Kegiatan Ekstrakulikuler', 'NULL', '2022-11-07 17:00:00', '2022-11-07 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `no_rek` int(20) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `jumlah` double NOT NULL,
  `foto` varchar(35) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `id_user`, `no_rek`, `atas_nama`, `jumlah`, `foto`, `created`, `updated`) VALUES
(1, 9, 2147483647, 'Aldha Aulia Syahfitri', 1110, 'pembayaran-221109-97ee32ebb6.jpg', '2022-11-08 09:06:15', '2022-11-09 01:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `pendaftar_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `nik` varchar(15) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `panggilan_siswa` varchar(50) NOT NULL,
  `no_kk` int(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `anak` int(11) NOT NULL,
  `jk` char(2) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` mediumtext NOT NULL,
  `tinggi_bdn` varchar(50) NOT NULL,
  `berat_bdn` varchar(50) NOT NULL,
  `penyakit` varchar(50) NOT NULL,
  `hobi` varchar(50) NOT NULL,
  `baju` char(50) NOT NULL,
  `kendaraan` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nikayah` int(25) NOT NULL,
  `pendidikan_ay` varchar(50) NOT NULL,
  `pekerjaan_ay` varchar(50) NOT NULL,
  `penghasilan_ay` varchar(50) NOT NULL,
  `agama_ay` varchar(11) NOT NULL,
  `no_hpay` int(15) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `nikibu` int(25) NOT NULL,
  `pendidikan_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `penghasilan_ibu` varchar(50) NOT NULL,
  `agama_ibu` varchar(50) NOT NULL,
  `no_hpibu` int(15) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `alamat_org` mediumtext NOT NULL,
  `foto3x4` varchar(40) DEFAULT NULL,
  `scan_akte` varchar(40) DEFAULT NULL,
  `scan_kk` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`pendaftar_id`, `user_id`, `nik`, `nama_siswa`, `panggilan_siswa`, `no_kk`, `tempat_lahir`, `tgl_lahir`, `anak`, `jk`, `agama`, `alamat`, `tinggi_bdn`, `berat_bdn`, `penyakit`, `hobi`, `baju`, `kendaraan`, `nama_ayah`, `nikayah`, `pendidikan_ay`, `pekerjaan_ay`, `penghasilan_ay`, `agama_ay`, `no_hpay`, `nama_ibu`, `nikibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `agama_ibu`, `no_hpibu`, `nama_wali`, `alamat_org`, `foto3x4`, `scan_akte`, `scan_kk`, `created_at`, `updated_at`) VALUES
(7, 1, '3174', 'Aldha', 'AAS', 3133, 'Jakarta', '2017-12-29', 1, 'P', 'Islam', 'MASJID', '165', '42', 'TIDAK ADA', 'MENGGAMBAR', 'XS', 'JALAN KAKI', 'SALIM', 3174, 'SMA', 'PENSIUNAN', '0', 'Islam', 813, 'JULAEHA', 3174, 'SMEA', 'IBU RUMAH TANGGA', '1000', 'Islam', 816, 'RIZKY', 'MASJID', 'Foto3x4-221107-f246c9a5be.png', 'Scan_Akte221109-b1341343e4.jpeg', 'Scan_Kartu_Keluarga221109-bca4153131.jpg', '2022-11-07 08:36:11', '2023-01-09 15:12:53'),
(8, 9, '3174', 'Syahfitri', 'Fitri', 3177, 'Jakarta', '2010-10-29', 2, 'P', 'Islam', 'Petogoggan', '160', '40', 'TIDAK ADA', 'Travelling', 'XS', 'JALAN KAKI', 'AGUS', 3174, 'SMA', 'PENSIUNAN', '0', 'Islam', 813, 'EHA', 3174, 'SMEA', 'IBU RUMAH TANGGA', '0', 'Islam', 816, 'NURUL', 'PETOGOGGAN', 'Foto3x4-221107-d8c6250c80.jpg', 'Scan_Akte221109-8d5e453fc1.jpeg', 'Scan_Kartu_Keluarga221107-300f30c769.jpg', '2022-11-07 09:10:43', '2022-11-09 01:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `pengumuman_id` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` mediumtext NOT NULL,
  `link` mediumtext NOT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`pengumuman_id`, `judul`, `isi`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Informasi Pendaftaran Tahun 2022', '<p>Informasi terkait pendaftaran RA AZ ZAHRA bisa di akses melalui website PPDB online.</p>\r\n', 'http://localhost/raazzahra/home/ppdb', 1, '2019-07-18 08:35:26', '2022-11-07 08:40:06'),
(2, 'Informasi Pendaftaran', '<p>Pendaftaran dilaksanaan mulai 01 JANUARI 2022 sampai 10 JULI 2022</p>\r\n', 'http://localhost/raazzahra/home/ppdb', 0, '2021-07-03 09:52:55', '2022-12-19 04:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `profil_id` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` mediumtext NOT NULL,
  `foto` varchar(35) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`profil_id`, `judul`, `isi`, `foto`, `created_at`, `updated_at`) VALUES
(3, 'Sejarah Raudhatul Athfal Az Zahra', '<blockquote>\r\n<h2><em><tt>\"B</tt>erdiri sejak tahun ajaran 2005-2006, Dengan izin operasional Kementerian Agama RI yang dahulu bernama Departemen Agama, No izin pendirian : Kd 09/01/4/PP 004/9482/2005. Murid pertama berjumlah 17 orang anak dengan 4 tenaga pendidik. RA. Az Zahra berada dibawah naungan Yayasan Qurrata A’yun Berbakti\"</em></h2>\r\n</blockquote>\r\n', 'profil-221107-1b6c4b575e.png', '2022-10-13 07:17:53', '2023-01-09 16:13:31'),
(4, 'Visi dan Misi Raudhatul Athfal Az Zahra', '<blockquote>\r\n<h2><em>Visi :</em></h2>\r\n\r\n<h2><em>        Menyiapkan Generasi Islam yang cerdas dan berakhlak mulia</em></h2>\r\n\r\n<p> </p>\r\n\r\n<h2><em>Misi :</em></h2>\r\n\r\n<h2><em>        Mendidik dan mencerdaskan anak bangsa serta menanamkan nilai – nilai keislaman sejak dini</em></h2>\r\n</blockquote>\r\n', NULL, '2022-10-13 07:26:43', '2022-12-17 16:32:31'),
(5, 'Stuktur Organisasi', '', 'profil-221228-18381dee50.png', '2022-10-13 07:27:11', '2022-12-27 19:27:37'),
(6, 'Biaya Pendaftaran', '<p>Total Biaya Pendaftaran Sebesar Rp. <strong>100.000.-</strong></p>\r\n\r\n<p>Dibayarkan ke Nomor Rekening: <strong>100-9110-611 BANK BNI</strong><strong> A/N AZZAHRA</strong></p>\r\n', NULL, '2022-10-16 12:10:46', '2022-11-07 09:00:11'),
(7, 'Rincian Biaya Masuk', '<p>1. Dana Pendidikan (SSP) per bulan                   Rp. 200.000</p>\r\n\r\n<p>2. Kegiatan Ekstrakulikuler per bulan                   Rp. 200.000</p>\r\n\r\n<p>3. Seragam Sekolah                                             Rp. 600.000</p>\r\n\r\n<p>4. Formulir Pendaftaran                                        Rp. 100.000</p>\r\n\r\n<p><strong>                                                                Total :  Rp. 1.100.000</strong></p>\r\n', NULL, '2022-10-16 12:11:37', '2022-11-08 08:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` int(2) NOT NULL,
  `status` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 0, '2022-10-12 02:28:33', '2022-10-12 23:37:48'),
(8, 'useronly', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 0, 0, '2022-06-19 17:37:44', NULL),
(9, 'aldhaas', 'aldha@gmail.com', 'e6bc8b5e070150e99e474a946c652f3c', 0, 1, '2022-11-07 09:07:38', '2023-01-09 15:46:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`galeri_id`);

--
-- Indexes for table `gelombang`
--
ALTER TABLE `gelombang`
  ADD PRIMARY KEY (`gelombang_id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`kegiatan_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`),
  ADD KEY `pembayaran_ibfk_1` (`id_user`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`pendaftar_id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`pengumuman_id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`profil_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `galeri_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `gelombang`
--
ALTER TABLE `gelombang`
  MODIFY `gelombang_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `info_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `kegiatan_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `pendaftar_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `pengumuman_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `profil_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`kategori_id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
