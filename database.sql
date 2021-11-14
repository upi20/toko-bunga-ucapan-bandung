-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 14, 2021 at 05:00 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `tokobungapapanucapanbandung`
--

-- --------------------------------------------------------

--
-- Table structure for table `home_excess`
--

CREATE TABLE `home_excess` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` text DEFAULT NULL,
  `column` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `home_lates_product`
--

CREATE TABLE `home_lates_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE `home_slider` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `home_testimonials`
--

CREATE TABLE `home_testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kpu_calon`
--

CREATE TABLE `kpu_calon` (
  `id` int(11) NOT NULL,
  `npm` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 dibuat | 1 tidak aktif | 2 aktif | 3 deleted',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kpu_calon`
--

INSERT INTO `kpu_calon` (`id`, `npm`, `nama`, `photo`, `no_urut`, `visi`, `misi`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '0', 'Kemas Prahastantra', '31d3db68260260b8e58f3ac4c1a96406.jpeg', 1, '<div><span style=\"font-size: 1rem;\">Allah itu nomor satu&nbsp;</span><br></div><div><br></div>', '<p><span style=\"font-size: 1rem;\">Menomorkan satu Allah SWT</span><br></p>', 3, 1, NULL, 1, '2021-10-29 00:03:53', '2021-10-29 13:01:18', '2021-10-29 13:01:18'),
(3, '1', '1', NULL, 1, '<p>sadfasdf</p>', '<p>sdaf</p>', 3, 1, NULL, 1, '2021-10-29 00:37:10', '2021-10-29 01:16:28', '2021-10-29 01:16:28'),
(4, '19016', 'Tri Purwanto', 'daae460d185cd169c8e9ee9333de4c52.png', 1, '<div><span style=\"font-size: 1rem;\">1. menjadikan masjid ulil albab dan pengurus sebagai tempat ber-ukhuwah.</span><br></div><div>2. menjadikan sarana umat islam yang ingin ber-ukhuwah.</div>', '<div><div>1. menjadikan umat islam yang lebih agamis, cinta al-qur\'an dan bertaqwa.</div><div>2. menjadikan masjid sebagai tempat yang nyaman dan aman.</div><div>3. menjadikan organiasasi dkm ulil albab menjadi lebih profesional dalam kepengurusannya</div></div>', 1, 1, NULL, NULL, '2021-10-29 00:38:15', '2021-10-29 13:16:34', NULL),
(5, 'TES.19011', 'Kemas Prahastantra', '975e331005124f282a9ecf21365cb6a8.png', 2, '<p>Allah itu nomor satu</p>', '<p>Menomorsatukan Allah </p>', 1, 1, NULL, NULL, '2021-10-29 02:57:53', '2021-10-29 21:55:42', NULL),
(6, '19035', 'Muhammad Luqman Arif', 'fd1c1ac7ae3a81a9cbb519f85466d591.png', 3, '<p><span style=\"font-size: 1rem;\">Menjadikan masjid ulil albab sebagai pusat pelayanan, serta pemberdayaan masyarakat menuju masyarakat yang berakhlakul karimah, dunia dan akhirat.</span></p>', '<p><span style=\"font-size: 1rem;\">1. mengelola kemakmuran masjid ulil albab</span><br></p><p>2. mengajak seluruh jama\'ah untuk melaksanakan ibadah dimasjid khususnya laki-laki, serta meningkatkan kesadaran masyarakat untuk mengimplementasikan nilai-nilai islam dalam kehidupannya</p><p>3. menjalin komunikasi kepengurusan dengan lingkungan masyarakat sekitar.</p><p>Program :</p><p>- meningkatkan peran jamaahh maupun masyarakat sekitar untuk menjaga kebersihan, ketertiban, serta keamanan.</p>', 1, 1, NULL, NULL, '2021-10-29 12:58:19', '2021-10-29 13:16:14', NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2021-10-29 13:15:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kpu_kunci`
--

CREATE TABLE `kpu_kunci` (
  `id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL COMMENT '0 dibuka | 1 Ditutup'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kpu_kunci`
--

INSERT INTO `kpu_kunci` (`id`, `nilai`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kpu_pemilih`
--

CREATE TABLE `kpu_pemilih` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `npp` varchar(255) DEFAULT NULL,
  `token` varchar(11) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 tidak aktif | 1 aktif',
  `last_login` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kpu_pemilih`
--

INSERT INTO `kpu_pemilih` (`id`, `nama`, `npp`, `token`, `keterangan`, `status`, `last_login`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Isep Lutpi Nurs', 'UA202110s', 'CPYZMF4', '', 3, '2021-10-29 09:52:15', 1, 1, 1, '2021-10-29 01:59:38', '2021-10-29 13:19:01', '2021-10-29 13:19:01'),
(4, 'Pemilih dua', 'UA2021101', 'UZ8D0WQ', 'Pemilih dua', 3, '2021-10-29 06:20:57', 1, NULL, 1, '2021-10-29 03:01:51', '2021-10-29 13:19:04', '2021-10-29 13:19:04'),
(5, 'Pemilih Tiga', 'UA202110', 'BZXOL8I', 'adfasdfsdaf', 3, '2021-10-29 13:17:38', 1, NULL, 1, '2021-10-29 03:02:00', '2021-10-29 13:19:07', '2021-10-29 13:19:07'),
(6, 'Hanif', 'UA202110', 'MOA49C5', 'tes', 3, '2021-10-29 10:25:41', 1, NULL, 1, '2021-10-29 10:24:27', '2021-10-29 13:18:58', '2021-10-29 13:18:58'),
(7, 'Mujib Anhar Mutaqin', 'UA-17.001', 'K0IL72P', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, '2021-10-29 22:24:33', 1, NULL, NULL, '2021-10-29 13:20:28', '2021-10-29 22:24:33', NULL),
(8, 'Adjie Abdul Azis', 'UA-18.004', 'QF0OGL9', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, '2021-10-29 23:44:23', 1, NULL, NULL, '2021-10-29 13:20:54', '2021-10-29 23:44:23', NULL),
(9, 'Ilham Taufikurrahman', 'UA-18.010', 'D9JZATM', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, '2021-10-29 22:24:54', 1, NULL, NULL, '2021-10-29 13:21:13', '2021-10-29 22:24:54', NULL),
(10, 'Muhammad Ilham Solehudin', 'UA-18.011', '8MKZSIP', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, '2021-10-29 22:25:08', 1, NULL, NULL, '2021-10-29 13:21:34', '2021-10-29 22:25:08', NULL),
(11, 'Dicki Maulana', 'UA-18.016', '8UMV5R4', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, '2021-10-29 22:27:50', 1, NULL, NULL, '2021-10-29 13:22:01', '2021-10-29 22:27:50', NULL),
(12, 'Roni Sianturi', 'UA-18.017', 'S5UAGY4', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, '2021-10-29 22:28:03', 1, NULL, NULL, '2021-10-29 13:23:09', '2021-10-29 22:28:03', NULL),
(13, 'Ida Koswara Sanusi', 'UA-18.021', 'PNQLYJ8', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, '2021-10-29 22:28:17', 1, NULL, NULL, '2021-10-29 13:23:57', '2021-10-29 22:28:17', NULL),
(14, 'Iman Nurahman', 'UA-18.025', '9A8J4UF', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, '2021-10-29 22:28:30', 1, NULL, NULL, '2021-10-29 13:24:52', '2021-10-29 22:28:30', NULL),
(15, 'Aulia Nur Muhamad', 'UA-19.003', '0TLPYQN', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 13:25:39', NULL, NULL),
(16, 'Ade Lukman', 'UA-19.004', '46SQEJ1', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, '2021-10-29 23:44:46', 1, NULL, NULL, '2021-10-29 13:26:09', '2021-10-29 23:44:46', NULL),
(17, 'Suherman', 'UA-19.008', 'VZQO6X9', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, '2021-10-29 22:30:25', 1, NULL, NULL, '2021-10-29 13:27:16', '2021-10-29 22:30:25', NULL),
(18, 'abu bakar Umar', 'UA-19.009', 'PH90MVU', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, '2021-10-29 23:44:01', 1, NULL, NULL, '2021-10-29 13:28:03', '2021-10-29 23:44:01', NULL),
(19, 'Kemas Prahastantra', 'UA-19.011', '5DUJCTL', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 13:29:11', NULL, NULL),
(20, 'Misbah', 'UA-19.012', 'ERTGYZO', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 13:29:56', NULL, NULL),
(21, 'Yoga pratama', 'UA-19.014', 'NX10EHF', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 13:31:00', NULL, NULL),
(22, 'Tri Purwanto', 'UA-19.016', '5WLQVK4', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:49:10', NULL, NULL),
(23, 'Muhamad Taufiq Hidayatuloh ', 'UA-19.028', '6H0VKYX', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:49:35', NULL, NULL),
(24, 'Muhammad Luqman Arif', 'UA-19.035', 'V4Y35AD', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:49:58', NULL, NULL),
(25, 'Muhammad Nor Faizi', 'UA-19.037', 'F4978ZQ', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:50:22', NULL, NULL),
(26, 'Ilham Hidayatulloh', 'UA-19.039', 'KCUW520', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:50:45', NULL, NULL),
(27, 'Gian Hergiana', 'UA-20.001', 'DWI712R', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:51:06', NULL, NULL),
(28, 'Rifki Wibowo', 'UA-20.002', 'V1L5HWR', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:51:26', NULL, NULL),
(29, 'Alltaf Subhan Khalifah', 'UA-20.004', 'KBDZ0HA', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:51:47', NULL, NULL),
(30, 'Cecep suanda', 'UA-20.005', 'B81TYO3', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:52:11', NULL, NULL),
(31, 'Dwiko Edwar Wahab', 'UA-20.007', 'T7P9ZIK', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:52:44', NULL, NULL),
(32, 'Muhamad Miftah Fauzi', 'UA-20.008', 'SWXQHZP', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:53:09', NULL, NULL),
(33, 'Fadli Fadilah', 'UA-20.009', 'P4BECTH', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:53:29', NULL, NULL),
(34, 'Rijal Mustofa Auliya', 'UA-20.012', 'NEJW0SL', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:53:47', NULL, NULL),
(35, 'Isep Lutpi Nur', 'UA-20.014', '9SJ7H54', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:54:05', NULL, NULL),
(36, 'Rizky Septian', 'UA-20.015', 'OI3ERAG', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:54:33', NULL, NULL),
(37, 'Akmal dinul islam', 'UA-20.017', '27CJ43N', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:55:43', NULL, NULL),
(38, 'Gilang Aji', 'UA-20.018', '1UHPOC9', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:56:21', NULL, NULL),
(39, 'Alhadi Achmad Nugraha', 'UA-20.019', '1Q3ALHR', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:56:58', NULL, NULL),
(40, 'Zaki rasyid pamungkas', 'UA-20.020', 'E3PTODX', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:57:19', NULL, NULL),
(41, 'Muhammad Fahrulrozy', 'UA-20.021', 'MRZK1I6', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:57:39', NULL, NULL),
(42, 'Muhammad iman', 'UA-20.024', 'MWL2EZX', 'Akhi jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:58:03', NULL, NULL),
(43, 'Swastika Nurul Ikhsan', 'UA-18.001', 'S302UGE', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:58:40', NULL, NULL),
(44, 'Fanni Septemia Nurillah', 'UA-18.002', 'FC6BONA', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:59:13', NULL, NULL),
(45, 'Kheren Putri Nabila', 'UA-18.003', 'JM25C0E', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 20:59:40', NULL, NULL),
(46, 'Siti Fadilla A.R.A', 'UA-18.005', '3C8VYU5', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:00:06', NULL, NULL),
(47, 'Purnama Rachmanita', 'UA-18.006', 'H8R1B4O', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:00:28', NULL, NULL),
(48, 'Nadiya Kumalasari Pranajaya', 'UA-18.007', 'ONQPH07', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:00:48', NULL, NULL),
(49, 'Diah Alawiyah Rosmanawati', 'UA-18.008', '9VB2UC4', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:01:09', NULL, NULL),
(50, 'Yani Nuraeni', 'UA-18.009', 'WZAN0MV', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:01:28', NULL, NULL),
(51, 'Nida Siti Hamida', 'UA-18.019', 'MVD6U1H', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:02:06', NULL, NULL),
(52, 'Syifa Unzila', 'UA-18.020', 'ICT6ODE', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:02:24', NULL, NULL),
(53, 'Ratna Dwi Susanti', 'UA-18.023', 'CXNOAJR', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:02:53', NULL, NULL),
(54, 'Dina Astiani', 'UA-18.024', 'VTU5SAO', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:03:15', NULL, NULL),
(55, 'Lisa Puspita Anggraeni ', 'UA-19.001', 'FIVQ0ZR', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:03:34', NULL, NULL),
(56, 'Leni Indriani', 'UA-19.002', 'YBDXQR0', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:03:52', NULL, NULL),
(57, 'Ulfa Maesyaroh', 'UA-19.006', '3BKIZE4', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:04:16', NULL, NULL),
(58, 'Tieska lantika', 'UA-19.007', 'LD2MJ9G', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:04:34', NULL, NULL),
(59, 'Pipit Muditya Harjo ', 'UA-19.018', '15RCTQL', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:04:55', NULL, NULL),
(60, 'Indriana Nur Al-fallah Rosmawan ', 'UA-19.019', 'BPTDQYM', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:05:25', NULL, NULL),
(61, 'Getza Nurulita Sari', 'UA-19.023', 'VK0MHXG', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:05:45', NULL, NULL),
(62, 'Ayu Nova Amelia', 'UA-19.024', 'B5RFI30', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:06:06', NULL, NULL),
(63, 'Desi Puja Ramdianti', 'UA-19.030', 'DCT7M59', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:06:27', NULL, NULL),
(64, 'Nur hidayanti', 'UA-19.033', 'MT6KZJC', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:06:51', NULL, NULL),
(65, 'Serly Noviani', 'UA-19.034', 'O8SMW0D', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:07:14', NULL, NULL),
(66, 'Tini Patmawati', 'UA-19.036', 'K0ZY9S3', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:07:34', NULL, NULL),
(67, 'sri rahayu', 'UA-19.038', 'JO83YK5', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:08:01', NULL, NULL),
(68, 'Siti Nur Azizah', 'UA-20.006', 'RIO81X0', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:08:22', NULL, NULL),
(69, 'Allysa Silverina', 'UA-20.010', '52ZK86E', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:08:43', NULL, NULL),
(70, 'Ai Santi Nuranggraeni', 'UA-20.011', 'FROV54C', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:09:15', NULL, NULL),
(71, 'Novi Ristiani', 'UA-20.013', 'M1QNLUG', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:09:59', NULL, NULL),
(72, 'Nur \'Azizah', 'UA-20.016', 'AUV2Q8S', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:10:23', NULL, NULL),
(73, 'Ajeng Aprilia', 'UA-20.022', '8UX143B', 'Ukhti jangan sampai golput ya, satu suara menentukan masa depan DKM ULIL ALBAB', 1, NULL, 1, NULL, NULL, '2021-10-29 21:10:43', NULL, NULL),
(74, 'cek', '123', 'V8T9S01', 'cek', 3, '2021-10-29 22:10:14', 1, 1, 1, '2021-10-29 21:14:10', '2021-10-29 22:16:50', '2021-10-29 22:16:50'),
(75, 'TEsting', 'tes', 'QBJDG6O', 'tes', 3, '2021-10-29 21:59:13', 1, 1, 1, '2021-10-29 21:58:57', '2021-10-29 22:16:46', '2021-10-29 22:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `kpu_pemilihan`
--

CREATE TABLE `kpu_pemilihan` (
  `id` int(11) NOT NULL,
  `id_pemilih` int(11) DEFAULT NULL,
  `id_calon` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 tidak aktif | 1 aktif',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kpu_pemilihan`
--

INSERT INTO `kpu_pemilihan` (`id`, `id_pemilih`, `id_calon`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 17, 5, 1, NULL, NULL, NULL, '2021-10-29 23:43:39', NULL, NULL),
(2, 18, 6, 1, NULL, NULL, NULL, '2021-10-29 23:44:04', NULL, NULL),
(3, 8, 6, 1, NULL, NULL, NULL, '2021-10-29 23:44:26', NULL, NULL),
(4, 16, 4, 1, NULL, NULL, NULL, '2021-10-29 23:44:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `lev_id` int(11) NOT NULL,
  `lev_nama` varchar(50) NOT NULL,
  `lev_keterangan` text NOT NULL,
  `lev_status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`lev_id`, `lev_nama`, `lev_keterangan`, `lev_status`, `created_at`) VALUES
(1, 'Super Admin', 'Super Admin', 'Aktif', '2020-06-18 09:40:31'),
(127, 'Pemilih', 'Pemilih', 'Aktif', '2021-10-28 20:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_menu_id` int(11) NOT NULL,
  `menu_nama` varchar(50) NOT NULL,
  `menu_keterangan` text NOT NULL,
  `menu_index` int(11) NOT NULL,
  `menu_icon` varchar(50) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `menu_status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_menu_id`, `menu_nama`, `menu_keterangan`, `menu_index`, `menu_icon`, `menu_url`, `menu_status`, `created_at`) VALUES
(1, 0, 'Dashboard', '-', 1, 'fa fa-suitcase', 'dashboard', 'Aktif', '2020-06-18 02:40:07'),
(2, 0, 'Pengaturan', '-', 6, 'fa fa-cogs', '#', 'Aktif', '2020-06-18 02:40:07'),
(4, 2, 'Menu', '-', 6, 'far fa-circle', 'pengaturan/menu', 'Aktif', '2020-06-18 02:40:07'),
(5, 2, 'Level', '-', 4, 'far fa-circle', 'pengaturan/level', 'Aktif', '2020-06-18 02:40:07'),
(6, 2, 'Pengguna', '-', 2, 'far fa-circle', 'pengaturan/pengguna', 'Aktif', '2020-06-18 02:40:07'),
(7, 2, 'Ganti Password', 'Ganti password', 3, 'fa fa-key', 'pengaturan/password', 'Aktif', '2021-06-28 08:34:14'),
(110, 0, 'Calon Ketua', 'Calon Ketua Umum\n', 1, 'fas fa-user', 'admin/CalonKetua', 'Aktif', '2021-10-28 17:04:18'),
(111, 0, 'Pemilih', '-', 2, ' fas fa-tasks', 'admin/pemilih', 'Aktif', '2021-10-28 18:27:32'),
(112, 0, 'Perhitungan Suara', '-', 3, 'far fa-comment', 'admin/Count', 'Aktif', '2021-10-28 19:46:03'),
(113, 0, 'Reset Suara', 'Reset / Kosongkan Suara', 5, 'fas fa-undo', 'pengaturan/reset', 'Aktif', '2021-10-28 22:41:40'),
(114, 0, 'Kunci Pemungutan Suara', '1', 4, 'fas fa-key', 'admin/kunci', 'Aktif', '2021-10-28 23:24:00'),
(115, 118, 'Warna', 'Warna Produk', 3, 'far fa-circle', 'admin/product/color', 'Aktif', '2021-11-14 14:39:54'),
(116, 118, 'Kategori', 'Kategori Produk', 2, 'far fa-circle', 'admin/product/category', 'Aktif', '2021-11-14 14:39:14'),
(117, 118, 'List', 'List daftar Produk', 1, 'far fa-circle', 'admin/product/list', 'Aktif', '2021-11-14 14:38:38'),
(118, 0, 'Produk', '-', 1, 'fas fa-fan', '#', 'Aktif', '2021-11-14 14:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `size` text DEFAULT NULL,
  `old_price` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_category_detail`
--

CREATE TABLE `product_category_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_color_detail`
--

CREATE TABLE `product_color_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_pictures`
--

CREATE TABLE `product_pictures` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role_aplikasi`
--

CREATE TABLE `role_aplikasi` (
  `rola_id` int(11) NOT NULL,
  `rola_menu_id` int(11) NOT NULL,
  `rola_lev_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_aplikasi`
--

INSERT INTO `role_aplikasi` (`rola_id`, `rola_menu_id`, `rola_lev_id`, `created_at`) VALUES
(229, 1, 1, '2021-10-28 22:24:48'),
(230, 110, 1, '2021-10-28 22:24:51'),
(231, 112, 1, '2021-10-28 22:24:54'),
(232, 111, 1, '2021-10-28 22:24:55'),
(234, 6, 1, '2021-10-28 22:24:57'),
(235, 7, 1, '2021-10-28 22:25:00'),
(236, 5, 1, '2021-10-28 22:25:01'),
(238, 4, 1, '2021-10-28 22:25:03'),
(239, 2, 1, '2021-10-28 22:25:10'),
(240, 113, 1, '2021-10-28 22:44:39'),
(241, 114, 1, '2021-10-28 23:24:05'),
(242, 1, 127, '2021-10-28 23:56:31'),
(243, 118, 1, '2021-11-14 15:58:25'),
(244, 117, 1, '2021-11-14 15:59:39'),
(245, 116, 1, '2021-11-14 15:59:40'),
(246, 115, 1, '2021-11-14 15:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `role_id` int(11) NOT NULL,
  `role_user_id` int(11) NOT NULL,
  `role_lev_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`role_id`, `role_user_id`, `role_lev_id`, `created_at`) VALUES
(1, 1, 1, '2020-06-18 09:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `template_navigation`
--

CREATE TABLE `template_navigation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parrent_id` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `id_partner` int(11) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_tgl_lahir` date DEFAULT NULL,
  `user_jk` enum('Laki-Laki','Perempuan') DEFAULT NULL COMMENT 'Jenis Kelamin',
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_email_status` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 Belum Diverifikasi | 1 Sudah Diverifikasi',
  `user_phone` varchar(15) NOT NULL,
  `user_foto` varchar(255) DEFAULT NULL,
  `user_status` int(1) NOT NULL DEFAULT 0 COMMENT '0 Tidak Aktif | 1 Aktif | 2 Pendding | 3 deleted',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `id_partner`, `nik`, `user_nama`, `user_tgl_lahir`, `user_jk`, `user_password`, `user_email`, `user_email_status`, `user_phone`, `user_foto`, `user_status`, `created_at`, `updated_at`) VALUES
(1, NULL, '1', 'Administrator', NULL, NULL, '$2y$10$34NjNNzrzOHiYA/Wc54tt.n3TB9abQUM065ZueEMd/LDw2NewOFoG', 'administrator@gmail.com', '1', '08123123', NULL, 1, '2020-06-18 09:39:08', '2020-06-18 09:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `whatsapp`
--

CREATE TABLE `whatsapp` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `number` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0 Tidak aktif, 1 aktif',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_excess`
--
ALTER TABLE `home_excess`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `home_lates_product`
--
ALTER TABLE `home_lates_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `home_testimonials`
--
ALTER TABLE `home_testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `kpu_calon`
--
ALTER TABLE `kpu_calon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `kpu_kunci`
--
ALTER TABLE `kpu_kunci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kpu_pemilih`
--
ALTER TABLE `kpu_pemilih`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `kpu_pemilihan`
--
ALTER TABLE `kpu_pemilihan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pemilih` (`id_pemilih`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`lev_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `product_category_detail`
--
ALTER TABLE `product_category_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `product_color_detail`
--
ALTER TABLE `product_color_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `product_pictures`
--
ALTER TABLE `product_pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `role_aplikasi`
--
ALTER TABLE `role_aplikasi`
  ADD PRIMARY KEY (`rola_id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `template_navigation`
--
ALTER TABLE `template_navigation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `whatsapp`
--
ALTER TABLE `whatsapp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home_excess`
--
ALTER TABLE `home_excess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_lates_product`
--
ALTER TABLE `home_lates_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_slider`
--
ALTER TABLE `home_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_testimonials`
--
ALTER TABLE `home_testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kpu_calon`
--
ALTER TABLE `kpu_calon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kpu_kunci`
--
ALTER TABLE `kpu_kunci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kpu_pemilih`
--
ALTER TABLE `kpu_pemilih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `kpu_pemilihan`
--
ALTER TABLE `kpu_pemilihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `lev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_category_detail`
--
ALTER TABLE `product_category_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_color_detail`
--
ALTER TABLE `product_color_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_pictures`
--
ALTER TABLE `product_pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_aplikasi`
--
ALTER TABLE `role_aplikasi`
  MODIFY `rola_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `template_navigation`
--
ALTER TABLE `template_navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `whatsapp`
--
ALTER TABLE `whatsapp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `home_excess`
--
ALTER TABLE `home_excess`
  ADD CONSTRAINT `home_excess_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `home_excess_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `home_excess_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `home_lates_product`
--
ALTER TABLE `home_lates_product`
  ADD CONSTRAINT `home_lates_product_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `home_lates_product_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `home_lates_product_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `home_lates_product_ibfk_5` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD CONSTRAINT `home_slider_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `home_slider_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `home_slider_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `home_testimonials`
--
ALTER TABLE `home_testimonials`
  ADD CONSTRAINT `home_testimonials_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `home_testimonials_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `home_testimonials_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `kpu_calon`
--
ALTER TABLE `kpu_calon`
  ADD CONSTRAINT `kpu_calon_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `kpu_calon_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `kpu_calon_ibfk_5` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `kpu_pemilih`
--
ALTER TABLE `kpu_pemilih`
  ADD CONSTRAINT `kpu_pemilih_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `kpu_pemilih_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `kpu_pemilih_ibfk_5` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `kpu_pemilihan`
--
ALTER TABLE `kpu_pemilihan`
  ADD CONSTRAINT `kpu_pemilihan_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `kpu_pemilihan_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `kpu_pemilihan_ibfk_5` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_categories_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_categories_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_category_detail`
--
ALTER TABLE `product_category_detail`
  ADD CONSTRAINT `product_category_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_category_detail_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_category_detail_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_category_detail_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_category_detail_ibfk_5` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD CONSTRAINT `product_color_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_color_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_color_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_color_detail`
--
ALTER TABLE `product_color_detail`
  ADD CONSTRAINT `product_color_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_color_detail_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `product_colors` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_color_detail_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_color_detail_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_color_detail_ibfk_5` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_pictures`
--
ALTER TABLE `product_pictures`
  ADD CONSTRAINT `product_pictures_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_pictures_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_pictures_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_pictures_ibfk_5` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_reviews_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_reviews_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_reviews_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `template_navigation`
--
ALTER TABLE `template_navigation`
  ADD CONSTRAINT `template_navigation_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `template_navigation_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `template_navigation_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `whatsapp`
--
ALTER TABLE `whatsapp`
  ADD CONSTRAINT `whatsapp_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `whatsapp_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `whatsapp_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;
