-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2021 at 04:27 PM
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
  `foto` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `column` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_excess`
--

INSERT INTO `home_excess` (`id`, `foto`, `title`, `description`, `column`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '92ed80325e278139105862f45e10c5cd.png', 'Bunga Berkualitas', 'Kami selalu menghadirkan rangkaian bunga terbaik dengan bunga segar pilihan.', 'col-lg-4 col-sm-6', 1, 1, 1, NULL, '2021-11-17 20:39:28', '2021-11-17 20:40:01', NULL),
(2, 'cfa50b3e4de6dc62e336445986b923c6.png', 'Pelayanan Ramah', 'Dilayani oleh CS yang sudah berpengalaman dalam berbagai macam rangkaian bunga.', 'col-lg-4 col-sm-6', 1, 1, NULL, NULL, '2021-11-17 20:40:20', NULL, NULL),
(3, '901bef74c7f2bacf2286ee2956bfd267.png', 'Kiriman Tepat Waktu', 'Layanan terbaik anda dengan pengiriman selalu on time.', 'col-lg-4 col-sm-6', 1, 1, NULL, NULL, '2021-11-17 20:40:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_footer_list`
--

CREATE TABLE `home_footer_list` (
  `id` int(11) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_footer_list`
--

INSERT INTO `home_footer_list` (`id`, `link`, `name`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'produk?category=standing-flower', 'Standing flower', 1, 1, 1, NULL, '2021-11-19 18:35:18', '2021-11-19 19:57:59', NULL);

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

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `foto`, `name`, `title`, `subtitle`, `description`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '59a901025be8f30dac7575dbaccfb89d.jpg', 'Slider 1', 'Welcome', 'Toko Bunga Ucapan Bandung', '', 1, 1, 1, NULL, '2021-11-17 20:22:03', '2021-11-19 10:57:59', NULL),
(2, 'e990707bc479e10e60a9fa7d17756a8d.jpg', 'afdsaf', 'asdfasdf', 'sasdfasdf', 'safasdf', 3, 1, NULL, 1, '2021-11-17 20:23:42', '2021-11-17 20:23:47', '2021-11-17 20:23:47'),
(3, '9d18e4d337bdd0b3254192fddabbb8d4.jpg', 'Slider 2', 'Quality', 'Bunga Dengan Kualitas Terbaik', '', 1, 1, NULL, NULL, '2021-11-17 20:41:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_sosmed`
--

CREATE TABLE `home_sosmed` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_sosmed`
--

INSERT INTO `home_sosmed` (`id`, `icon`, `link`, `name`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fa fa-facebook', 'http://facebook.com/iseplutpinur7', 'Facebook', 1, 1, 1, NULL, '2021-11-19 18:38:25', '2021-11-19 19:53:22', NULL),
(3, 'fa fa-twitter', '#', 'Twitter', 1, 1, NULL, NULL, '2021-11-19 19:55:49', NULL, NULL),
(4, 'fa fa-linkedin', '#', 'Linkedin', 1, 1, NULL, NULL, '2021-11-19 19:55:49', NULL, NULL),
(5, 'fa fa-youtube', '#', 'Youtube', 1, 1, NULL, NULL, '2021-11-19 19:55:49', NULL, NULL),
(6, 'fa fa-vimeo', '#', 'Vimeo', 1, 1, 1, NULL, '2021-11-19 19:55:49', '2021-11-19 20:11:33', NULL);

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

--
-- Dumping data for table `home_testimonials`
--

INSERT INTO `home_testimonials` (`id`, `name`, `position`, `foto`, `description`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Alex Jhon', 'Customer', '20f08a34992cbeaeb813c0f15653641e.jpg', 'These guys have been absolutely outstanding. Perfect Themes and the best of all\r\n                    that you have many options to choose! Best Support team ever! Very fast\r\n                    responding! Thank you very much! I highly recommend this theme and these people!', 1, 1, 1, NULL, '2021-11-17 22:17:19', '2021-11-17 22:17:53', NULL),
(2, 'Katherine Sullivan', 'Customer', '200a2b0f909c05222e32556fe815c86b.jpg', 'These guys have been absolutely outstanding. Perfect Themes and the best of all\r\n                    that you have many options to choose! Best Support team ever! Very fast\r\n                    responding! Thank you very much! I highly recommend this theme and these people!', 1, 1, NULL, NULL, '2021-11-17 22:18:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `key_value`
--

CREATE TABLE `key_value` (
  `key` varchar(255) NOT NULL,
  `value1` text DEFAULT NULL,
  `value2` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `key_value`
--

INSERT INTO `key_value` (`key`, `value1`, `value2`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
('footer_contact', 'Info Kontak', '                <address>123, ABC, Road ##, Main City, Your address goes here.<br>Phone: 01234 567\r\n                  890<br>Email: https://example.com</address>', 1, 1, NULL, '2021-11-19 17:52:48', '2021-11-19 18:47:06', NULL),
('footer_copyright', 'Copyright © ${(new Date().getFullYear())} Toko Bunga Ucapan Bandung', NULL, 1, 1, NULL, '2021-11-19 17:52:48', '2021-11-19 18:46:33', NULL),
('footer_descritpion', 'Kami menyediakan berbagai macam rangkaian bunga dengan design yang modern yang tentunya bisa anda lakukan costum baik ukuran atau jenis bunga', NULL, 1, 1, NULL, '2021-11-19 15:22:55', '2021-11-19 18:17:33', NULL),
('footer_list_head', 'Menyediakan', NULL, 1, 1, NULL, '2021-11-19 17:52:48', '2021-11-19 18:52:33', NULL),
('logo', '6fbe94da589c94255915300bf665782c.png', '4707ee8ba9fff6de51d74efbe5a35ee7.png', 1, 1, NULL, '2021-11-19 15:15:03', '2021-11-19 15:41:06', NULL),
('offer', 'Terlengkap Dan Terjangkau', 'Toko Bunga Ucapan Bandung', 1, 1, NULL, '2021-11-17 21:17:10', '2021-11-17 21:55:55', NULL),
('offer2', 'Terbaik Dan Terpercaya', 'TUNGGU APA LAGI', 1, 1, NULL, '2021-11-17 22:03:28', '2021-11-17 22:06:50', NULL),
('offer_decritpion', '<p><span class=\"fw-bold\">Toko Bunga Ucapan Bandung</span> merupakan salah satu toko bunga\r\n              terbaik di <span class=\"fw-bold\">Kota Bandung</span> dengan produk kami berbagai macam\r\n              karangan bunga dan rangkaian bunga seperti :\r\n            </p>\r\n            <br>\r\n            <div class=\"container\">\r\n              <ul style=\"list-style-type: disc;\">\r\n                <li>PAPAN BUNGA Single 2in1 Steroform</li>\r\n                <li>HANDBUQUET</li>\r\n                <li>BUQUET ( Meja, Standing, box )</li>\r\n                <li>SALIB, KRANS DUKA</li>\r\n                <li>Bunga Semat / kantong</li>\r\n                <li>Dekorasi Bahagia, Duka</li>\r\n                <li>Parcel Buah, Cookies</li>\r\n                <li>dll.</li>\r\n              </ul>\r\n            </div>\r\n\r\n            <br>\r\n            <p>Produk yang kami sediakan menggunakan bunga yang fresh dan bermacam warna yang bisa\r\n              disesuaikan untuk moment Anda. Selain itu kami juga menggunakan bunga buatan untuk pengganti\r\n              bunga asli agar karangan bunga Anda tidak cepat layu.</p>', NULL, 1, 1, NULL, '2021-11-17 21:17:10', '2021-11-17 21:56:15', NULL),
('offer_decritpion2', '            <p>Toko Bunga Papan Ucapan Bandung menawarka proses pemesanan yang sangat mudah, tinggal\r\n              cari\r\n              produk yang Anda inginkan, atau rekomendasi produk sesuai dengan moment yang Anda\r\n              butuhkan\r\n              melalui katalog produk di website ini, maupun langsung hubungi team CS kami yang siap\r\n              membantu anda 24 jam untuk membantu pemesanan bunga secara online dan offline.\r\n            </p>', NULL, 1, 1, NULL, '2021-11-17 22:03:28', '2021-11-17 22:07:17', NULL),
('product', 'Bunga Terbaik Dari Kami', 'BUNGA APA YANG ANDA CARI HARI INI ?', 1, 1, NULL, '2021-11-18 09:59:33', '2021-11-18 09:59:52', NULL),
('product2', 'Kamu Mungkin Juga Suka', 'PRODUK LAIN KAMI', 1, 1, NULL, '2021-11-19 07:14:04', '2021-11-19 07:16:22', NULL),
('testimoni', 'Kepuasan Pelanggan adalah yang utama', 'TESTIMONI', 1, 1, NULL, '2021-11-17 22:23:33', '2021-11-17 22:29:34', NULL);

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
(1, 'Super Admin', 'Super Admin', 'Aktif', '2020-06-18 09:40:31');

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
(1, 0, 'Dashboard', '-', 1, 'fa fa-suitcase', 'admin/dashboard', 'Aktif', '2020-06-18 02:40:07'),
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
(117, 118, 'Master', 'List daftar Produk', 1, 'far fa-circle', 'admin/product/item', 'Aktif', '2021-11-14 14:38:38'),
(118, 0, 'Produk', '-', 1, 'fas fa-fan', '#', 'Aktif', '2021-11-14 14:36:41'),
(119, 0, 'Home', 'Halaman Home', 2, 'fas fa-home', '#', 'Aktif', '2021-11-15 14:50:51'),
(120, 119, 'Slider', '-', 3, 'far fa-circle', 'admin/home/slider', 'Aktif', '2021-11-15 14:51:28'),
(121, 119, 'Kelebihan', '-', 4, 'far fa-circle', 'admin/home/excess', 'Aktif', '2021-11-15 14:52:32'),
(122, 119, 'Penawaran', 'Penawaran', 5, 'far fa-circle', 'admin/home/offer', 'Aktif', '2021-11-15 14:53:56'),
(123, 119, 'Testimoni', '-', 6, 'far fa-circle', 'admin/home/testimoni', 'Aktif', '2021-11-15 14:54:34'),
(124, 0, 'WhatsApp', 'No whatsapp untuk produk', 3, 'fab fa-whatsapp', 'admin/whatsapp', 'Aktif', '2021-11-17 15:39:07'),
(126, 0, 'Navigasi', '-', 4, 'fas fa-location-arrow', 'admin/menu', 'Aktif', '2021-11-17 19:09:01'),
(127, 119, 'Logo', '-', 1, 'far fa-circle', 'admin/home/logo', 'Aktif', '2021-11-19 08:05:37'),
(128, 119, 'Footer', '-', 2, 'far fa-circle', 'admin/home/footer', 'Aktif', '2021-11-19 08:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `menu_front`
--

CREATE TABLE `menu_front` (
  `menu_id` int(11) NOT NULL,
  `menu_menu_id` int(11) NOT NULL,
  `menu_nama` varchar(50) NOT NULL,
  `menu_keterangan` text DEFAULT NULL,
  `menu_index` int(11) NOT NULL,
  `menu_icon` varchar(50) DEFAULT NULL,
  `menu_url` varchar(100) NOT NULL,
  `menu_status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_front`
--

INSERT INTO `menu_front` (`menu_id`, `menu_menu_id`, `menu_nama`, `menu_keterangan`, `menu_index`, `menu_icon`, `menu_url`, `menu_status`, `created_at`) VALUES
(1, 0, 'Home', 'Halaman utama', 1, NULL, '/', 'Aktif', '2021-11-17 19:06:19'),
(2, 0, 'BUNGA PAPAN', '', 2, NULL, '#', 'Aktif', '2021-11-17 19:18:47'),
(3, 2, 'BUNGA WEDDING', '', 1, NULL, '/produk?category=bunga+wedding', 'Aktif', '2021-11-17 19:19:45'),
(4, 2, 'BUNGA SELAMAT', '-', 2, NULL, '/produk?category=bunga+selamat', 'Aktif', '2021-11-17 19:20:20'),
(5, 2, 'BUNGA DUKA', '', 3, NULL, '/produk?category=bunga+duka', 'Aktif', '2021-11-17 19:20:57'),
(7, 0, 'BOX', '', 3, NULL, '/produk?category=box', 'Aktif', '2021-11-17 19:22:44'),
(8, 0, 'STANDING FLOWER', '', 4, NULL, '/produk?category=standing-flower', 'Aktif', '2021-11-17 19:23:31'),
(9, 0, 'BUNGA MEJA', '', 5, NULL, '/produk?category=bunga-meja', 'Aktif', '2021-11-17 19:26:16'),
(10, 0, 'BUNGA BOUQUET', '', 6, NULL, '/produk?category=bunga+bouquet', 'Aktif', '2021-11-17 19:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `excerpt` text DEFAULT NULL,
  `size` text DEFAULT NULL,
  `old_price` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `view_home` int(1) DEFAULT 0,
  `view_review` int(1) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `excerpt`, `size`, `old_price`, `price`, `discount`, `sku`, `status`, `view_home`, `view_review`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Flowers daisy pink stick', 'flowers-daisy-pink-stick', '<p class=\"mb-3\" style=\"color: rgb(72, 72, 72); font-family: Poppins, sans-serif; font-size: 14px; background-color: rgb(248, 248, 248);\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p><p style=\"margin-bottom: 10px; color: rgb(72, 72, 72); font-family: Poppins, sans-serif; font-size: 14px; background-color: rgb(248, 248, 248);\">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', 'I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.', '<p><br></p><h4 class=\"title-3 mb-4\" style=\"line-height: 1; font-size: 18px; font-family: Poppins, sans-serif; color: rgb(0, 0, 0); background-color: rgb(248, 248, 248);\">Size Chart</h4><table class=\"table border\" style=\"caption-side: bottom; --bs-table-bg:transparent; --bs-table-accent-bg:transparent; --bs-table-striped-color:#212529; --bs-table-striped-bg:rgba(0, 0, 0, 0.05); --bs-table-active-color:#212529; --bs-table-active-bg:rgba(0, 0, 0, 0.1); --bs-table-hover-color:#212529; --bs-table-hover-bg:rgba(0, 0, 0, 0.075); width: 1090px; color: rgb(33, 37, 41); vertical-align: top; font-family: Poppins, sans-serif; font-size: 14px; background-color: rgb(248, 248, 248);\"><tbody style=\"border-style: solid; border-width: 0px; vertical-align: inherit;\"><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">UK</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">26</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">European</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">46</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">48</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">50</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">52</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">54</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">usa</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Australia</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">28</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">10</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">12</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Canada</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">42</td><td style=\"border-color: inherit; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-width: 0px 0px 1px; padding: 0.5rem; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">36</td></tr></tbody></table>', 0, 100000, 0, NULL, 1, 1, 0, NULL, NULL, NULL, '2021-11-15 01:39:27', '2021-11-18 13:29:29', NULL),
(3, 'Jasmine flowers white', 'jasmine-flowers-whit2e', '<p class=\"mb-3\" style=\"color: rgb(72, 72, 72); font-family: Poppins, sans-serif; font-size: 14px; background-color: rgb(248, 248, 248);\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p><p style=\"margin-bottom: 10px; color: rgb(72, 72, 72); font-family: Poppins, sans-serif; font-size: 14px; background-color: rgb(248, 248, 248);\">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', 'I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.', '<p><br></p><h4 class=\"title-3 mb-4\" style=\"font-family: Poppins, sans-serif; line-height: 1; color: rgb(0, 0, 0); font-size: 18px; background-color: rgb(248, 248, 248);\">Size Chart</h4><table class=\"table border\" style=\"width: 1090px; color: rgb(33, 37, 41); background-color: rgb(248, 248, 248); caption-side: bottom; --bs-table-bg:transparent; --bs-table-accent-bg:transparent; --bs-table-striped-color:#212529; --bs-table-striped-bg:rgba(0, 0, 0, 0.05); --bs-table-active-color:#212529; --bs-table-active-bg:rgba(0, 0, 0, 0.1); --bs-table-hover-color:#212529; --bs-table-hover-bg:rgba(0, 0, 0, 0.075); vertical-align: top; font-family: Poppins, sans-serif; font-size: 14px;\"><tbody style=\"border-style: solid; border-width: 0px; vertical-align: inherit;\"><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">UK</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">26</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">European</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">46</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">48</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">50</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">52</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">54</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">usa</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Australia</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">28</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">10</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">12</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Canada</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">42</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">36</td></tr></tbody></table>', 0, 2000000, 0, NULL, 1, 1, 0, NULL, NULL, NULL, '2021-11-15 15:00:54', '2021-11-19 05:57:45', NULL),
(4, 'Jasmine flowers white', 'jasmine-flowers-white', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p><p><br></p><p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. ', '<p><br></p><h4 class=\"title-3 mb-4\" style=\"font-family: Poppins, sans-serif; line-height: 1; color: rgb(0, 0, 0); font-size: 18px; background-color: rgb(248, 248, 248);\">Size Chart</h4><table class=\"table border\" style=\"width: 1090px; color: rgb(33, 37, 41); background-color: rgb(248, 248, 248); caption-side: bottom; --bs-table-bg:transparent; --bs-table-accent-bg:transparent; --bs-table-striped-color:#212529; --bs-table-striped-bg:rgba(0, 0, 0, 0.05); --bs-table-active-color:#212529; --bs-table-active-bg:rgba(0, 0, 0, 0.1); --bs-table-hover-color:#212529; --bs-table-hover-bg:rgba(0, 0, 0, 0.075); vertical-align: top; font-family: Poppins, sans-serif; font-size: 14px;\"><tbody style=\"border-style: solid; border-width: 0px; vertical-align: inherit;\"><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">UK</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">26</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">European</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">46</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">48</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">50</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">52</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">54</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">usa</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Australia</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">28</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">10</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">12</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Canada</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">42</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">36</td></tr></tbody></table>', 0, 150000, 0, NULL, 1, 1, 0, NULL, NULL, NULL, '2021-11-19 04:41:28', '2021-11-19 04:47:47', NULL),
(5, 'Blossom bouquet flower', 'blossom-bouquet-flower', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p><p><br></p><p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. ', '<p><br></p><h4 class=\"title-3 mb-4\" style=\"font-family: Poppins, sans-serif; line-height: 1; color: rgb(0, 0, 0); font-size: 18px; background-color: rgb(248, 248, 248);\">Size Chart</h4><table class=\"table border\" style=\"width: 1090px; color: rgb(33, 37, 41); background-color: rgb(248, 248, 248); caption-side: bottom; --bs-table-bg:transparent; --bs-table-accent-bg:transparent; --bs-table-striped-color:#212529; --bs-table-striped-bg:rgba(0, 0, 0, 0.05); --bs-table-active-color:#212529; --bs-table-active-bg:rgba(0, 0, 0, 0.1); --bs-table-hover-color:#212529; --bs-table-hover-bg:rgba(0, 0, 0, 0.075); vertical-align: top; font-family: Poppins, sans-serif; font-size: 14px;\"><tbody style=\"border-style: solid; border-width: 0px; vertical-align: inherit;\"><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">UK</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">26</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">European</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">46</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">48</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">50</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">52</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">54</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">usa</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Australia</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">28</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">10</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">12</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Canada</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">42</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">36</td></tr></tbody></table>', 0, 800000, 0, NULL, 1, 1, 1, NULL, NULL, NULL, '2021-11-19 04:44:45', '2021-11-19 06:04:06', NULL);
INSERT INTO `products` (`id`, `name`, `slug`, `description`, `excerpt`, `size`, `old_price`, `price`, `discount`, `sku`, `status`, `view_home`, `view_review`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Orchid flower red stick', 'orchid-flower-red-stick', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p><p><br></p><p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. ', '<p><br></p><h4 class=\"title-3 mb-4\" style=\"font-family: Poppins, sans-serif; line-height: 1; color: rgb(0, 0, 0); font-size: 18px; background-color: rgb(248, 248, 248);\">Size Chart</h4><table class=\"table border\" style=\"width: 1090px; color: rgb(33, 37, 41); background-color: rgb(248, 248, 248); caption-side: bottom; --bs-table-bg:transparent; --bs-table-accent-bg:transparent; --bs-table-striped-color:#212529; --bs-table-striped-bg:rgba(0, 0, 0, 0.05); --bs-table-active-color:#212529; --bs-table-active-bg:rgba(0, 0, 0, 0.1); --bs-table-hover-color:#212529; --bs-table-hover-bg:rgba(0, 0, 0, 0.075); vertical-align: top; font-family: Poppins, sans-serif; font-size: 14px;\"><tbody style=\"border-style: solid; border-width: 0px; vertical-align: inherit;\"><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">UK</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">26</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">European</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">46</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">48</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">50</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">52</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">54</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">usa</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Australia</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">28</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">10</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">12</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Canada</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">42</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">36</td></tr></tbody></table>', 1000000, 1200000, 17, NULL, 1, 1, 0, NULL, NULL, NULL, '2021-11-19 04:49:37', '2021-11-19 04:51:15', NULL),
(7, 'Rose bouquet white', 'rose-bouquet-white', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p><p><br></p><p><br></p><p><br></p><p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue;', '<p><br></p><h4 class=\"title-3 mb-4\" style=\"font-family: Poppins, sans-serif; line-height: 1; color: rgb(0, 0, 0); font-size: 18px; background-color: rgb(248, 248, 248);\">Size Chart</h4><table class=\"table border\" style=\"width: 1090px; color: rgb(33, 37, 41); background-color: rgb(248, 248, 248); caption-side: bottom; --bs-table-bg:transparent; --bs-table-accent-bg:transparent; --bs-table-striped-color:#212529; --bs-table-striped-bg:rgba(0, 0, 0, 0.05); --bs-table-active-color:#212529; --bs-table-active-bg:rgba(0, 0, 0, 0.1); --bs-table-hover-color:#212529; --bs-table-hover-bg:rgba(0, 0, 0, 0.075); vertical-align: top; font-family: Poppins, sans-serif; font-size: 14px;\"><tbody style=\"border-style: solid; border-width: 0px; vertical-align: inherit;\"><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">UK</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">26</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">European</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">46</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">48</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">50</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">52</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">54</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">usa</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Australia</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">28</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">10</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">12</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Canada</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">42</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">36</td></tr></tbody></table>', 100000, 50000, 50, NULL, 1, 1, 0, NULL, NULL, NULL, '2021-11-19 04:51:16', '2021-11-19 04:52:56', NULL),
(8, 'Hyacinth white stick', 'hyacinth-white-stick', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p><p><br></p><p><br></p><p><br></p><p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue;', '<p><br></p><h4 class=\"title-3 mb-4\" style=\"font-family: Poppins, sans-serif; line-height: 1; color: rgb(0, 0, 0); font-size: 18px; background-color: rgb(248, 248, 248);\">Size Chart</h4><table class=\"table border\" style=\"width: 1090px; color: rgb(33, 37, 41); background-color: rgb(248, 248, 248); caption-side: bottom; --bs-table-bg:transparent; --bs-table-accent-bg:transparent; --bs-table-striped-color:#212529; --bs-table-striped-bg:rgba(0, 0, 0, 0.05); --bs-table-active-color:#212529; --bs-table-active-bg:rgba(0, 0, 0, 0.1); --bs-table-hover-color:#212529; --bs-table-hover-bg:rgba(0, 0, 0, 0.075); vertical-align: top; font-family: Poppins, sans-serif; font-size: 14px;\"><tbody style=\"border-style: solid; border-width: 0px; vertical-align: inherit;\"><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">UK</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">26</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">European</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">46</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">48</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">50</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">52</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">54</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">usa</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Australia</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">28</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">10</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">12</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Canada</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">42</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">36</td></tr></tbody></table>', 0, 1000000, 0, NULL, 1, 1, 0, NULL, NULL, NULL, '2021-11-19 04:52:56', '2021-11-19 04:55:23', NULL),
(9, 'Glory of the Snow', 'glory-of-the-snow', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p><p><br></p><p><br></p><p><br></p><p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue;', '<p><br></p><h4 class=\"title-3 mb-4\" style=\"font-family: Poppins, sans-serif; line-height: 1; color: rgb(0, 0, 0); font-size: 18px; background-color: rgb(248, 248, 248);\">Size Chart</h4><table class=\"table border\" style=\"width: 1090px; color: rgb(33, 37, 41); background-color: rgb(248, 248, 248); caption-side: bottom; --bs-table-bg:transparent; --bs-table-accent-bg:transparent; --bs-table-striped-color:#212529; --bs-table-striped-bg:rgba(0, 0, 0, 0.05); --bs-table-active-color:#212529; --bs-table-active-bg:rgba(0, 0, 0, 0.1); --bs-table-hover-color:#212529; --bs-table-hover-bg:rgba(0, 0, 0, 0.075); vertical-align: top; font-family: Poppins, sans-serif; font-size: 14px;\"><tbody style=\"border-style: solid; border-width: 0px; vertical-align: inherit;\"><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">UK</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">26</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">European</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">46</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">48</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">50</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">52</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">54</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">usa</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Australia</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">28</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">10</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">12</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Canada</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">42</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">36</td></tr></tbody></table>', 0, 10000, 0, NULL, 1, 1, 0, NULL, NULL, NULL, '2021-11-19 04:55:23', '2021-11-19 04:58:42', NULL);
INSERT INTO `products` (`id`, `name`, `slug`, `description`, `excerpt`, `size`, `old_price`, `price`, `discount`, `sku`, `status`, `view_home`, `view_review`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'Jack in the Pulpit', 'jack-in-the-pulpit', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; ', '<p><br></p><h4 class=\"title-3 mb-4\" style=\"font-family: Poppins, sans-serif; line-height: 1; color: rgb(0, 0, 0); font-size: 18px; background-color: rgb(248, 248, 248);\">Size Chart</h4><table class=\"table border\" style=\"width: 1090px; color: rgb(33, 37, 41); background-color: rgb(248, 248, 248); caption-side: bottom; --bs-table-bg:transparent; --bs-table-accent-bg:transparent; --bs-table-striped-color:#212529; --bs-table-striped-bg:rgba(0, 0, 0, 0.05); --bs-table-active-color:#212529; --bs-table-active-bg:rgba(0, 0, 0, 0.1); --bs-table-hover-color:#212529; --bs-table-hover-bg:rgba(0, 0, 0, 0.075); vertical-align: top; font-family: Poppins, sans-serif; font-size: 14px;\"><tbody style=\"border-style: solid; border-width: 0px; vertical-align: inherit;\"><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">UK</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">26</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">European</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">46</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">48</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">50</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">52</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">54</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">usa</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">20</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">22</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Australia</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">28</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">10</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">12</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">16</td></tr><tr style=\"border-style: solid; border-width: 0px;\"><td class=\"cun-name\" style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">Canada</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">24</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">18</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">14</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">42</td><td style=\"padding: 0.5rem; border-width: 0px 0px 1px; border-right-style: solid; border-bottom-style: solid; border-left-style: solid; border-color: inherit; background-color: var(--bs-table-bg); box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);\">36</td></tr></tbody></table>', 0, 20000, 0, NULL, 1, 1, 0, NULL, NULL, NULL, '2021-11-19 04:58:43', '2021-11-19 05:00:07', NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, '2021-11-19 05:00:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `foto`, `description`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bunga wedding', 'bunga-wedding', '37192df5281fe4fbee5c19457edd685c.png', 'tes', 3, 1, 1, 1, '2021-11-14 23:10:38', '2021-11-14 23:38:45', '2021-11-14 23:38:45'),
(2, 'Birthday Boqutets', 'birthday-boqutets', '', '', 1, 1, NULL, NULL, '2021-11-14 23:38:33', NULL, NULL),
(3, 'Funeral Flowers', 'funeral-flowers', '', '', 1, 1, NULL, NULL, '2021-11-14 23:38:53', NULL, NULL),
(4, 'Interior Decor', 'interior-decor', '', '', 1, 1, NULL, NULL, '2021-11-14 23:39:02', NULL, NULL),
(5, 'Custom Orders', 'custom-orders', '', '', 1, 1, NULL, NULL, '2021-11-14 23:39:11', NULL, NULL),
(7, 'STANDING FLOWER', 'standing-flower', '', '', 1, 1, NULL, NULL, '2021-11-18 02:24:22', NULL, NULL),
(8, 'BUNGA MEJA', 'bunga-meja', '', '', 1, 1, NULL, NULL, '2021-11-18 02:24:33', NULL, NULL),
(9, 'HAND BOUQUET', 'hand-bouquet', '', '', 1, 1, NULL, NULL, '2021-11-18 02:24:42', NULL, NULL),
(10, 'BUNGA PAPAN', 'bunga-papan', '', '', 1, 1, NULL, NULL, '2021-11-18 02:24:56', NULL, NULL),
(11, 'BUNGA WEDDING', 'bunga-wedding', '', '', 1, 1, NULL, NULL, '2021-11-18 02:25:11', NULL, NULL),
(12, 'BUNGA SELAMAT', 'bunga-selamat', '', '', 1, 1, NULL, NULL, '2021-11-18 02:25:23', NULL, NULL),
(13, 'BUNGA DUKA', 'bunga-duka', '', '', 1, 1, NULL, NULL, '2021-11-18 02:25:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_category_detail`
--

CREATE TABLE `product_category_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category_detail`
--

INSERT INTO `product_category_detail` (`id`, `product_id`, `category_id`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 1, 2, 1, 1, NULL, NULL, '2021-11-15 09:35:48', NULL, NULL),
(7, 1, 3, 1, 1, NULL, NULL, '2021-11-15 09:35:52', NULL, NULL),
(9, 3, 2, 1, 1, NULL, NULL, '2021-11-19 04:40:21', NULL, NULL),
(10, 4, 8, 1, 1, NULL, NULL, '2021-11-19 04:44:17', NULL, NULL),
(11, 5, 4, 1, 1, NULL, NULL, '2021-11-19 04:48:57', NULL, NULL),
(12, 6, 1, 1, 1, NULL, NULL, '2021-11-19 04:50:46', NULL, NULL),
(13, 7, 5, 1, 1, NULL, NULL, '2021-11-19 04:52:07', NULL, NULL),
(14, 8, 4, 1, 1, NULL, NULL, '2021-11-19 04:54:58', NULL, NULL),
(15, 9, 1, 1, 1, NULL, NULL, '2021-11-19 04:55:53', NULL, NULL),
(16, 10, 1, 1, 1, NULL, NULL, '2021-11-19 04:59:44', NULL, NULL),
(17, 5, 8, 1, 1, NULL, NULL, '2021-11-19 14:26:36', NULL, NULL),
(18, 1, 8, 1, 1, NULL, NULL, '2021-11-19 14:26:36', NULL, NULL),
(19, 3, 8, 1, 1, NULL, NULL, '2021-11-19 14:26:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
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

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `name`, `slug`, `foto`, `description`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Pink', 'pink', '', NULL, 1, 1, 1, NULL, '2021-11-14 23:26:40', '2021-11-14 23:27:21', NULL),
(2, 'Red', 'red', '', '', 1, 1, NULL, NULL, '2021-11-14 23:39:57', NULL, NULL),
(3, 'Black', 'black', '', '', 1, 1, NULL, NULL, '2021-11-14 23:40:03', NULL, NULL),
(4, 'Blue', 'blue', '', '', 1, 1, NULL, NULL, '2021-11-14 23:40:15', NULL, NULL),
(5, 'Green', 'green', '', '', 1, 1, NULL, NULL, '2021-11-14 23:40:21', NULL, NULL),
(6, 'White', 'white', '', '', 1, 1, NULL, NULL, '2021-11-15 09:57:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_color_detail`
--

CREATE TABLE `product_color_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_color_detail`
--

INSERT INTO `product_color_detail` (`id`, `product_id`, `color_id`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, NULL, NULL, '2021-11-15 09:39:31', NULL, NULL),
(4, 1, 6, 1, 1, NULL, NULL, '2021-11-15 09:57:49', NULL, NULL),
(6, 3, 2, 1, 1, NULL, NULL, '2021-11-19 04:41:26', NULL, NULL),
(7, 4, 1, 1, 1, NULL, NULL, '2021-11-19 04:44:38', NULL, NULL),
(8, 5, 4, 1, 1, NULL, NULL, '2021-11-19 04:49:18', NULL, NULL),
(9, 5, 1, 1, 1, NULL, NULL, '2021-11-19 04:49:24', NULL, NULL),
(10, 6, 5, 1, 1, NULL, NULL, '2021-11-19 04:51:08', NULL, NULL),
(11, 6, 2, 1, 1, NULL, NULL, '2021-11-19 04:51:12', NULL, NULL),
(12, 7, 1, 1, 1, NULL, NULL, '2021-11-19 04:52:54', NULL, NULL),
(13, 8, 4, 1, 1, NULL, NULL, '2021-11-19 04:55:19', NULL, NULL),
(14, 9, 1, 1, 1, NULL, NULL, '2021-11-19 04:56:13', NULL, NULL),
(15, 10, 1, 1, 1, NULL, NULL, '2021-11-19 05:00:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT 1,
  `foto` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `name`, `number`, `foto`, `description`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Gambar 1', 1, 'e31ec3aac88b913dc06faf5cb611c203.jpg', NULL, 1, 1, NULL, NULL, '2021-11-15 02:31:24', '2021-11-15 09:08:43', NULL),
(3, 1, 'Gambar 2', 2, '2a465871252d3ec323221787dbef81f5.jpg', NULL, 1, 1, NULL, NULL, '2021-11-15 09:17:32', NULL, NULL),
(6, 3, 'Gambar 1', 1, '10eaf6ee43e7a38d91aee7b94e1fb5d4.jpg', NULL, 1, 1, NULL, NULL, '2021-11-19 04:41:00', NULL, NULL),
(7, 3, 'Gambar 2', 2, 'fb7fe8da4699983e4f920930fddbd15c.jpg', NULL, 1, 1, NULL, NULL, '2021-11-19 04:41:15', NULL, NULL),
(8, 4, 'Gambar 1', 1, '017fd92d234fea3b7061473148223db6.jpg', NULL, 1, 1, NULL, NULL, '2021-11-19 04:44:33', NULL, NULL),
(9, 5, 'Bunga 1', 1, 'cf0ddadb487dceb05c332507954a038e.jpg', NULL, 1, 1, NULL, NULL, '2021-11-19 04:49:14', NULL, NULL),
(10, 6, 'Gambar 1', 1, '1d45a090adc9f6a8da8c457b2e4e6b27.jpg', NULL, 1, 1, NULL, NULL, '2021-11-19 04:51:01', NULL, NULL),
(11, 7, 'Gambar 1', 1, '7343e219548d24eef7468d26d4df3a77.jpg', NULL, 1, 1, NULL, NULL, '2021-11-19 04:52:34', NULL, NULL),
(12, 7, 'Gambar 2', 2, '261d7582cb1a322490f37d9d30dec096.jpg', NULL, 1, 1, NULL, NULL, '2021-11-19 04:52:48', NULL, NULL),
(13, 8, 'Gambar 2', 1, '63b6c30c159eb4256d3b968812baab82.jpg', NULL, 1, 1, NULL, NULL, '2021-11-19 04:55:11', NULL, NULL),
(14, 9, 'Tampak depan', 1, '58544870e40cdd0272b128418336741b.jpg', NULL, 1, 1, NULL, NULL, '2021-11-19 04:56:08', NULL, NULL),
(15, 10, 'Tampak depan', 1, '93bf12c2a018ae031cb2ca4fc945ce7f.jpg', NULL, 1, 1, NULL, NULL, '2021-11-19 04:59:58', NULL, NULL);

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
  `email` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `product_id`, `name`, `date`, `description`, `email`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 5, 'Isep Lutpi Nur', '2021-11-19', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in viverra ex, vitae vestibulum arcu. Duis sollicitudin metus sed lorem commodo, eu dapibus libero interdum. Morbi convallis viverra erat, et aliquet orci congue vel. Integer in odio enim. Pellentesque in dignissim leo. Vivamus varius ex sit amet quam tincidunt iaculis.', 'iseplutpinur7@gmail.com', 1, 1, NULL, NULL, '2021-11-19 20:46:57', '2021-11-19 22:23:42', '2021-11-19 14:46:06'),
(6, 5, 'Isep Lutpi Nur', '2021-11-19', 'tes', 'sales@gmail.com', 1, NULL, NULL, NULL, '2021-11-19 21:20:15', '2021-11-19 22:23:50', NULL),
(7, 5, 'Isep Lutpi Nur', '2021-11-19', 'tes', 'sales@gmail.com', 1, NULL, NULL, NULL, '2021-11-19 21:21:49', NULL, NULL),
(9, 5, 'a', '2021-11-19', 'a', 'ahmad@gmail.com', 1, NULL, NULL, NULL, '2021-11-19 21:22:29', NULL, NULL),
(10, 5, 'a', '2021-11-19', 'a', 'admin@gmail.com', 1, NULL, NULL, NULL, '2021-11-19 21:30:16', NULL, NULL),
(11, 5, 'Isep Lutpi Nur', '2021-11-19', 'a', 'iseplutpi123@gmail.com', 1, NULL, NULL, NULL, '2021-11-19 21:35:32', NULL, NULL);

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
(234, 6, 1, '2021-10-28 22:24:57'),
(235, 7, 1, '2021-10-28 22:25:00'),
(236, 5, 1, '2021-10-28 22:25:01'),
(238, 4, 1, '2021-10-28 22:25:03'),
(239, 2, 1, '2021-10-28 22:25:10'),
(242, 1, 127, '2021-10-28 23:56:31'),
(243, 118, 1, '2021-11-14 15:58:25'),
(244, 117, 1, '2021-11-14 15:59:39'),
(245, 116, 1, '2021-11-14 15:59:40'),
(246, 115, 1, '2021-11-14 15:59:40'),
(247, 119, 1, '2021-11-15 14:55:53'),
(248, 120, 1, '2021-11-15 14:55:54'),
(249, 121, 1, '2021-11-15 14:55:55'),
(250, 122, 1, '2021-11-15 14:55:56'),
(251, 123, 1, '2021-11-15 14:55:56'),
(252, 124, 1, '2021-11-17 15:39:14'),
(253, 126, 1, '2021-11-17 19:09:13'),
(254, 127, 1, '2021-11-19 08:07:42'),
(255, 128, 1, '2021-11-19 08:08:51');

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
-- Dumping data for table `whatsapp`
--

INSERT INTO `whatsapp` (`id`, `name`, `description`, `number`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Isep Lutpi Nur', '123', '85798132505', 0, 1, 1, NULL, '2021-11-18 00:58:52', '2021-11-18 01:15:48', NULL),
(4, 'Nomor 2', 'Tes dua', '858578996321', 1, 1, 1, NULL, '2021-11-18 01:05:30', '2021-11-18 02:38:49', NULL),
(5, 'no 3', '', '123', 0, 1, 1, NULL, '2021-11-18 01:15:56', '2021-11-18 02:38:49', NULL);

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
-- Indexes for table `home_footer_list`
--
ALTER TABLE `home_footer_list`
  ADD PRIMARY KEY (`id`),
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
-- Indexes for table `home_sosmed`
--
ALTER TABLE `home_sosmed`
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
-- Indexes for table `key_value`
--
ALTER TABLE `key_value`
  ADD PRIMARY KEY (`key`),
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
-- Indexes for table `menu_front`
--
ALTER TABLE `menu_front`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`,`status`),
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
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_footer_list`
--
ALTER TABLE `home_footer_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_slider`
--
ALTER TABLE `home_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_sosmed`
--
ALTER TABLE `home_sosmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `home_testimonials`
--
ALTER TABLE `home_testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `lev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `menu_front`
--
ALTER TABLE `menu_front`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_category_detail`
--
ALTER TABLE `product_category_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_color_detail`
--
ALTER TABLE `product_color_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `role_aplikasi`
--
ALTER TABLE `role_aplikasi`
  MODIFY `rola_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `whatsapp`
--
ALTER TABLE `whatsapp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Constraints for table `home_footer_list`
--
ALTER TABLE `home_footer_list`
  ADD CONSTRAINT `home_footer_list_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `home_footer_list_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `home_footer_list_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD CONSTRAINT `home_slider_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `home_slider_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `home_slider_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `home_sosmed`
--
ALTER TABLE `home_sosmed`
  ADD CONSTRAINT `home_sosmed_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `home_sosmed_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `home_sosmed_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `home_testimonials`
--
ALTER TABLE `home_testimonials`
  ADD CONSTRAINT `home_testimonials_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `home_testimonials_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `home_testimonials_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `key_value`
--
ALTER TABLE `key_value`
  ADD CONSTRAINT `key_value_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `key_value_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `key_value_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_images_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_images_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_images_ibfk_5` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_reviews_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_reviews_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_reviews_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `whatsapp`
--
ALTER TABLE `whatsapp`
  ADD CONSTRAINT `whatsapp_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `whatsapp_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `whatsapp_ibfk_4` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;
