-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Feb 2023 pada 07.09
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dangaukopi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `judul_gambar` varchar(50) DEFAULT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(13, 25, 'samping', 'gambar4_-_Copy.PNG', '2023-02-10 03:01:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(5) NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `id_user` int(5) NOT NULL,
  `nama_kasir` varchar(50) DEFAULT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(9) NOT NULL,
  `status_bayar` tinyint(1) NOT NULL,
  `jumlah_bayar` int(9) DEFAULT NULL,
  `diskon` int(8) DEFAULT NULL,
  `kembali` int(8) DEFAULT NULL,
  `tanggal_bayar` datetime DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_meja` int(5) NOT NULL,
  `nama_meja` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `kode_transaksi`, `nama_pelanggan`, `id_user`, `nama_kasir`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `diskon`, `kembali`, `tanggal_bayar`, `tanggal_post`, `tanggal_update`, `id_meja`, `nama_meja`) VALUES
(10, '040120222ZHJ4OFO', 'Cakrawati', 0, 'Cakrawati', '2022-01-04 00:00:00', 43000, 1, 50000, 15000, 22000, '0000-00-00 00:00:00', '2022-01-04 13:21:40', '2022-09-01 07:47:09', 0, ''),
(11, '12012022JLGSLDZI', 'Cakrawati Sudjono', 0, NULL, '2022-01-12 00:00:00', 63000, 1, 100000, 15000, 52000, '0000-00-00 00:00:00', '2022-01-12 05:59:03', '2022-09-01 07:31:27', 0, ''),
(13, '15012022AX20FNQA', 'Dina', 0, 'Cakrawati', '2022-01-15 00:00:00', 83000, 1, 83000, NULL, NULL, '0000-00-00 00:00:00', '2022-01-15 04:49:52', '2022-01-15 03:49:52', 0, ''),
(14, '31012022Q7LROUCR', 'Cakrawati Sudjono', 0, NULL, '2022-01-31 00:00:00', 60000, 1, 800000, 15000, 755000, '0000-00-00 00:00:00', '2022-01-31 04:25:29', '2022-09-01 06:54:45', 0, ''),
(17, '10032022PTQN92DM', 'Cakrawati', 0, NULL, '2022-03-10 00:00:00', 46000, 1, 40000, 15000, 9000, '0000-00-00 00:00:00', '2022-03-10 02:30:38', '2022-09-01 06:41:15', 0, ''),
(19, '12072022VLUJXYKY', 'asdfasdf', 0, 'Cakrawati', '2022-07-12 00:00:00', 20000, 0, 0, 10000, 40000, '0000-00-00 00:00:00', '2022-07-12 19:59:32', '2022-09-01 06:29:22', 3, '3'),
(20, '12072022XHOLLDAA', 'Cakrawati', 0, NULL, '2022-07-12 00:00:00', 20000, 1, 10000, 15000, 5000, '0000-00-00 00:00:00', '2022-07-12 20:31:34', '2022-08-31 08:47:57', 0, '1'),
(21, '12072022TBRCDVFM', 'Cakrawati hh', 0, 'Cakrawati', '2022-07-12 00:00:00', 23000, 1, 23000, 15000, 0, '0000-00-00 00:00:00', '2022-07-12 20:32:47', '2022-09-01 07:49:50', 0, 'h'),
(22, '12072022AOLTUQZ5', 'seokjin', 0, NULL, '2022-07-12 00:00:00', 20000, 1, NULL, NULL, NULL, '0000-00-00 00:00:00', '2022-07-12 20:51:00', '2022-07-12 18:51:00', 0, '2'),
(23, '200720220QACL1G2', 'Dita', 18, NULL, '2022-07-20 00:00:00', 20000, 1, NULL, NULL, NULL, NULL, '2022-07-20 04:24:22', '2022-07-26 17:20:59', 0, '3'),
(24, '25082022CVEUJSBG', 'Cakrawati', 0, NULL, '2022-08-25 00:00:00', 20000, 1, NULL, NULL, NULL, NULL, '2022-08-25 05:46:22', '2022-08-25 03:46:22', 0, '3'),
(25, '010920222XHTDCGP', 'tekkom', 0, 'Cakrawati', '2022-09-01 00:00:00', 125000, 1, 125000, 0, 0, '2022-09-20 22:56:00', '2022-09-01 08:59:19', '2022-09-20 16:01:37', 0, '1'),
(26, '20092022TX3AJPB4', 'seokjin', 0, 'Cakrawati', '2022-09-20 00:00:00', 43000, 1, 43000, 0, 0, '2022-09-20 17:35:07', '2022-09-20 17:10:34', '2022-09-20 15:20:51', 0, '1'),
(27, '20092022PJX5SB7N', 'jungkook', 0, 'Cakrawati', '2022-09-20 00:00:00', 20000, 0, NULL, 0, 30000, NULL, '2022-09-20 18:03:27', '2022-09-20 16:11:49', 0, '2'),
(28, '20092022OZHBW30K', 'jimin', 0, 'Cakrawati', '2022-09-20 00:00:00', 20000, 1, 20000, 0, 0, '2022-12-20 08:25:13', '2022-09-20 18:03:57', '2022-09-20 16:12:45', 0, '1'),
(29, '20092022ECT481DZ', 'suga', 0, NULL, '2022-09-20 00:00:00', 23000, 0, NULL, NULL, NULL, NULL, '2022-09-20 18:04:31', '2022-09-20 16:04:31', 0, '1'),
(30, '20092022RZBEABXN', 'namjoon', 0, NULL, '2022-09-20 00:00:00', 20000, 0, NULL, NULL, NULL, NULL, '2022-09-20 18:05:03', '2022-09-20 16:05:03', 0, '1'),
(31, '280920225KSDRQBT', 'Ute', 0, 'Cakrawati', '2022-09-28 00:00:00', 60000, 1, 60000, NULL, NULL, '2022-10-01 08:26:34', '2022-09-28 01:24:47', '2022-09-27 23:24:47', 0, '2'),
(32, '25102022WNPICZT1', 'howl', 0, 'Cakrawati', '2022-10-25 00:00:00', 60000, 1, 60000, NULL, NULL, '2022-10-26 03:06:16', '2022-10-25 18:28:59', '2022-10-25 16:28:59', 0, '3'),
(33, '26102022YGWXSUNR', 'shun', 0, 'Cakrawati', '2022-10-26 00:00:00', 40000, 1, 40000, NULL, NULL, '2022-10-26 03:01:17', '2022-10-26 02:10:48', '2022-10-26 00:10:48', 0, '1'),
(34, '02122022TLQTPKNL', 'nia', 0, 'Cakrawati', '2022-12-02 00:00:00', 40000, 1, 50000, 10000, 20000, '2022-12-02 09:49:00', '2022-12-02 03:47:19', '2022-12-02 02:50:04', 0, '4'),
(35, '03122022KCPONQUB', 'seokjin', 0, NULL, '2022-12-03 00:00:00', 122000, 0, NULL, NULL, NULL, NULL, '2022-12-03 20:38:56', '2022-12-03 19:38:56', 0, '1'),
(36, '05122022AC2VZJSR', 'jikk', 0, NULL, '2022-12-05 00:00:00', 40000, 0, NULL, NULL, NULL, NULL, '2022-12-05 07:10:18', '2022-12-05 06:10:18', 0, '1'),
(37, '05122022JVEXYH4K', 'jhope', 0, NULL, '2022-12-05 00:00:00', 127000, 0, NULL, NULL, NULL, NULL, '2022-12-05 08:12:13', '2022-12-05 07:12:13', 0, '1'),
(38, '05122022KUILCRIX', 'jin', 0, 'Cakrawati', '2022-12-05 00:00:00', 63000, 0, 0, NULL, NULL, '0000-00-00 00:00:00', '2022-12-05 09:26:55', '2022-12-05 08:26:55', 0, '1'),
(39, '051220229CSM6DN2', 'asdfasdfasdf', 0, NULL, '2022-12-05 00:00:00', 43000, 0, NULL, NULL, NULL, NULL, '2022-12-05 09:43:27', '2022-12-05 08:43:27', 0, '1'),
(40, '06122022ONY9C4IH', 'taehyung', 0, 'Cakrawati', '2022-12-06 00:00:00', 43000, 1, 22000, 50, 500, '2023-01-18 11:57:00', '2022-12-06 06:59:57', '2023-01-18 04:57:28', 0, '1'),
(41, '06122022PWECB6I2', 'aaa', 0, 'Cakrawati', '2022-12-06 00:00:00', 23000, 1, 22000, 10, 1300, '2023-01-18 11:42:00', '2022-12-06 07:01:36', '2023-01-18 04:42:42', 0, '1'),
(42, '12012023L6AKPPRO', 'doni', 0, 'Cakrawati', '2023-01-12 00:00:00', 20000, 1, 50000, 1000, 31000, '2023-01-12 11:03:00', '2023-01-12 05:00:54', '2023-01-12 04:03:52', 0, '4'),
(43, '06022023JJCRNYGD', 'Dwi', 0, NULL, '2023-02-06 00:00:00', 60000, 0, NULL, NULL, NULL, NULL, '2023-02-06 08:51:27', '2023-02-06 07:51:27', 0, '4'),
(44, '08022023CP5OQH0E', 'shidqi', 0, NULL, '2023-02-08 00:00:00', 40000, 0, NULL, NULL, NULL, NULL, '2023-02-09 04:30:05', '2023-02-09 03:30:05', 0, '1'),
(46, '09022023UWHOC5TY', 'niaaa', 0, NULL, '2023-02-09 00:00:00', 42000, 0, NULL, NULL, NULL, NULL, '2023-02-09 05:07:42', '2023-02-09 04:07:42', 0, '1'),
(47, '13022023L1KRS96R', 'abhin', 0, NULL, '2023-02-13 00:00:00', 20000, 0, NULL, NULL, NULL, NULL, '2023-02-13 08:02:07', '2023-02-13 07:02:07', 0, '1'),
(48, '15022023AFHCEOOX', 'aaa', 0, NULL, '2023-02-15 00:00:00', 143000, 0, NULL, NULL, NULL, NULL, '2023-02-15 09:07:07', '2023-02-15 08:07:07', 0, '1'),
(49, '15022023OXFJ8G2Q', 'aaa', 0, NULL, '2023-02-15 00:00:00', 143000, 0, NULL, NULL, NULL, NULL, '2023-02-15 09:08:58', '2023-02-15 08:08:58', 0, '1'),
(50, '15022023BIZOSCT6', 'asdasdad', 0, NULL, '2023-02-15 00:00:00', 110000, 0, NULL, NULL, NULL, NULL, '2023-02-15 09:18:12', '2023-02-15 08:18:12', 0, '1'),
(51, '15022023JCQUL1Y3', 'aji16', 0, 'Cakrawati', '2023-02-15 00:00:00', 183000, 0, 0, 0, 17000, '0000-00-00 00:00:00', '2023-02-15 18:47:57', '2023-02-15 19:03:55', 0, '1'),
(52, '15022023HB5D3M1N', 'contoh', 0, 'Cakrawati', '2023-02-15 00:00:00', 126000, 1, 200000, 10, 86600, '2023-02-16 02:13:00', '2023-02-15 20:11:16', '2023-02-15 19:13:44', 0, '1'),
(53, '15022023NCFU0JYW', 'contoh2', 0, NULL, '2023-02-15 00:00:00', 2000000, 0, NULL, NULL, NULL, NULL, '2023-02-15 20:16:08', '2023-02-15 19:16:08', 0, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `slug_kategori` varchar(50) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `urutan` int(3) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(1, 'hot-coffee', 'Hot Coffee', 1, '2021-06-01 01:24:35'),
(2, 'ice-coffee', 'Ice Coffee ', 2, '2021-06-01 05:08:29'),
(4, 'signature-coffee', 'Signature Coffee', 3, '2021-10-03 08:32:11'),
(5, 'signature-non-coffee', 'Signature Non Coffee', 4, '2021-10-03 08:32:42'),
(6, 'non-coffee', 'Non Coffee', 5, '2021-10-03 08:32:57'),
(7, 'merchandise', 'Merchandise', 6, '2022-02-07 01:33:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(5) NOT NULL,
  `namaweb` varchar(50) NOT NULL,
  `tagline` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `tanggal_update`) VALUES
(1, 'Dangau Kopi - Cafe', 'Makes You Relax With Your Coffee', 'dangaukopi.smg@gmail.com', 'http://dangaukopi.com', 'https://wa.me/6282234066622', 'Jl. Kolonel HR Hadijanto No.31a, Sukorejo, Kec. Gn. Pati, Kota Semarang, Jawa Tengah 50221', 'https://www.facebook.com/dangau.kopi/', 'https://www.instagram.com/dangau.kopi/', 'Dangau Kopi Cafe adalah sebuah tempat singgah dan tempat ngopi yang asyik, dan berkualitas di kota Semarang dan dilengkapi fasilitas WiFi gratis.', 'icon2.jpg', 'icon4.jpg', '2023-02-12 23:37:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat_pegawai` varchar(100) NOT NULL,
  `telepon_pegawai` varchar(10) NOT NULL,
  `status_pegawai` varchar(20) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_user`, `jenis_kelamin`, `alamat_pegawai`, `telepon_pegawai`, `status_pegawai`, `tanggal_masuk`, `tanggal_update`) VALUES
(2, 16, 'Pria', 'coba coba hehe1', '0888888888', 'aktif', '2022-07-14', '2023-02-03 07:29:49'),
(7, 23, 'Wanita', 'tangerang', '0858774353', 'Aktif', '2023-01-26', '2023-02-13 07:50:35'),
(8, 25, 'Wanita', 'tembalang', '0885843535', 'aktif', '2023-02-17', '2023-02-17 09:20:06'),
(9, 26, 'Pria', 'tembalang', '0888888888', 'aktif', '2023-02-17', '2023-02-17 09:19:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `slug_produk` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `harga` int(7) NOT NULL,
  `stok_produk` int(5) DEFAULT NULL,
  `gambar` varchar(100) NOT NULL,
  `ukuran` int(5) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok_produk`, `gambar`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(2, 11, 1, 'HC001', 'Caramel Latte', 'caramel-latte-hc001', 'Espresso, steam milk, flavour caramel', 'caramel latte', 22000, 95, 'caramel-latte.jpeg', 50, 'Publish', '2021-06-26 15:26:07', '2023-02-15 08:18:12'),
(15, 11, 1, 'HC002', 'Hot Caffe Latte', 'hot-caffe-latte-hc002', 'Espresso, stream milk', 'Hot Caffe Latte', 20000, 100, 'hot-caffe-latte3.jpeg', 100, 'Publish', '2021-10-03 10:40:39', '2021-12-29 03:15:52'),
(16, 11, 1, 'HC003', 'Hot Cappucino', 'hot-cappucino-hc003', 'Espresso, stream milk', 'Hot Cappucino', 20000, 100, 'hot-cappucino2.jpeg', 100, 'Publish', '2021-10-03 10:42:07', '2021-12-29 03:15:00'),
(17, 11, 1, 'HC004', 'Hot Moccacino', 'hot-moccacino-hc004', 'Espresso, stream milk, flavour cokelat', 'Hot Moccacino', 22000, 100, 'hot-moccacino.jpeg', 100, 'Publish', '2021-10-03 10:43:07', '2021-12-29 03:14:37'),
(18, 11, 1, 'HC005', 'Hot Vanilla Latte', 'hot-vanilla-latte-hc005', 'Espresso, stream milk, flavour vanila', 'Hot Vanilla Latte', 22000, 94, 'hot-vanilla-latte.jpeg', 100, 'Publish', '2021-10-03 10:44:00', '2023-02-15 19:13:44'),
(19, 11, 2, 'IC001', 'Es Cafe Latte', 'es-cafe-latte-ic001', 'Basic espresso dan stream freshmilk', 'Es Cafe  Latte', 20000, 100, 'es-cafe-latte.jpeg', 200, 'Publish', '2021-10-03 10:45:24', '2021-12-29 03:11:11'),
(20, 1, 2, 'IC002', 'Mocachino', 'mocachino-ic002', 'Espresso, stream freshmilk, Mocca', 'Mocachino', 23000, 99, 'kopi-susu-berdua.jpeg', 100, 'Publish', '2021-10-03 10:47:11', '2023-02-15 19:05:08'),
(21, 23, 4, 'SC001', 'Es Kopi Susu Dangau', 'es-kopi-susu-dangau-sc001', 'Es kopi susu dengan perpaduan  espresso, freshmilk, gula aren dan tambahan beberapa flavour lainnya', NULL, 20000, 96, 'es-kopi-susu.jpeg', 100, 'Publish', '2021-10-03 10:48:58', '2023-02-15 19:30:48'),
(24, 23, 1, 'HC007', 'kopiii', 'kopiii-hc007', 'kopi enak', NULL, 20000, 95, 'late.PNG', 100, 'Publish', '2022-07-12 18:48:46', '2023-02-15 19:19:55'),
(25, 16, 7, 'M0001', 'totebag', 'totebag-m0001', 'totebag cantik', 'totebag', 30000, 100, 'gambar2_-_Copy.PNG', 50, 'Draft', '2022-10-20 05:07:56', '2022-10-20 03:12:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `harga` int(7) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `total_harga` int(9) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_produk`, `kode_transaksi`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(14, 0, 21, '040120222ZHJ4OFO', 20000, 1, 20000, '2022-01-04 00:00:00', '2022-01-04 12:21:40'),
(15, 0, 20, '040120222ZHJ4OFO', 23000, 1, 23000, '2022-01-04 00:00:00', '2022-01-04 12:21:40'),
(16, 0, 21, '12012022JLGSLDZI', 20000, 2, 40000, '2022-01-12 00:00:00', '2022-01-12 04:59:03'),
(17, 0, 20, '12012022JLGSLDZI', 23000, 1, 23000, '2022-01-12 00:00:00', '2022-01-12 04:59:03'),
(18, 0, 21, '15012022AX20FNQA', 20000, 3, 60000, '2022-01-15 00:00:00', '2022-01-15 03:49:52'),
(19, 0, 20, '15012022AX20FNQA', 23000, 1, 23000, '2022-01-15 00:00:00', '2022-01-15 03:49:52'),
(20, 0, 21, '31012022Q7LROUCR', 20000, 3, 60000, '2022-01-31 00:00:00', '2022-01-31 03:25:29'),
(21, 0, 20, '09032022KVVQRSLN', 23000, 1, 23000, '0000-00-00 00:00:00', '2022-03-09 21:53:04'),
(22, 0, 21, '09032022KVVQRSLN', 20000, 1, 20000, '0000-00-00 00:00:00', '2022-03-09 21:53:04'),
(23, 0, 20, '10032022PTQN92DM', 23000, 2, 46000, '2022-03-10 00:00:00', '2022-03-10 01:30:38'),
(24, 0, 21, '12072022VLUJXYKY', 20000, 1, 20000, '2022-07-12 00:00:00', '2022-07-12 17:59:32'),
(25, 0, 24, '12072022XHOLLDAA', 20000, 1, 20000, '2022-07-12 00:00:00', '2022-07-12 18:31:34'),
(26, 0, 20, '12072022TBRCDVFM', 23000, 1, 23000, '2022-07-12 00:00:00', '2022-07-12 18:32:47'),
(27, 0, 19, '12072022AOLTUQZ5', 20000, 1, 20000, '2022-07-12 00:00:00', '2022-07-12 18:51:00'),
(28, 0, 24, '200720220QACL1G2', 20000, 1, 20000, '2022-07-20 00:00:00', '2022-07-20 02:24:22'),
(29, 0, 24, '25082022CVEUJSBG', 20000, 1, 20000, '2022-08-25 00:00:00', '2022-08-25 03:46:22'),
(30, 0, 21, '010920222XHTDCGP', 20000, 2, 40000, '2022-09-01 00:00:00', '2022-09-01 06:59:20'),
(31, 0, 24, '010920222XHTDCGP', 20000, 1, 20000, '2022-09-01 00:00:00', '2022-09-01 06:59:21'),
(32, 0, 20, '010920222XHTDCGP', 23000, 1, 23000, '2022-09-01 00:00:00', '2022-09-01 06:59:22'),
(33, 0, 19, '010920222XHTDCGP', 20000, 1, 20000, '2022-09-01 00:00:00', '2022-09-01 06:59:22'),
(34, 0, 18, '010920222XHTDCGP', 22000, 1, 22000, '2022-09-01 00:00:00', '2022-09-01 06:59:23'),
(35, 0, 21, '20092022TX3AJPB4', 20000, 1, 20000, '2022-09-20 00:00:00', '2022-09-20 15:10:34'),
(36, 0, 20, '20092022TX3AJPB4', 23000, 1, 23000, '2022-09-20 00:00:00', '2022-09-20 15:10:34'),
(37, 0, 24, '20092022PJX5SB7N', 20000, 1, 20000, '2022-09-20 00:00:00', '2022-09-20 16:03:27'),
(38, 0, 21, '20092022OZHBW30K', 20000, 1, 20000, '2022-09-20 00:00:00', '2022-09-20 16:03:57'),
(39, 0, 20, '20092022ECT481DZ', 23000, 1, 23000, '2022-09-20 00:00:00', '2022-09-20 16:04:31'),
(40, 0, 19, '20092022RZBEABXN', 20000, 1, 20000, '2022-09-20 00:00:00', '2022-09-20 16:05:03'),
(41, 0, 24, '280920225KSDRQBT', 20000, 2, 40000, '2022-09-28 00:00:00', '2022-09-27 23:24:47'),
(42, 0, 21, '280920225KSDRQBT', 20000, 1, 20000, '2022-09-28 00:00:00', '2022-09-27 23:24:48'),
(43, 0, 24, '25102022WNPICZT1', 20000, 3, 60000, '2022-10-25 00:00:00', '2022-10-25 16:29:00'),
(44, 0, 24, '26102022YGWXSUNR', 20000, 1, 20000, '2022-10-26 00:00:00', '2022-10-26 00:10:48'),
(45, 0, 21, '26102022YGWXSUNR', 20000, 1, 20000, '2022-10-26 00:00:00', '2022-10-26 00:10:48'),
(46, 0, 21, '02122022TLQTPKNL', 20000, 1, 20000, '2022-12-02 00:00:00', '2022-12-02 02:47:20'),
(47, 0, 19, '02122022TLQTPKNL', 20000, 1, 20000, '2022-12-02 00:00:00', '2022-12-02 02:47:20'),
(48, 0, 21, '03122022KCPONQUB', 20000, 4, 80000, '2022-12-03 00:00:00', '2022-12-03 19:38:57'),
(49, 0, 24, '03122022KCPONQUB', 20000, 1, 20000, '2022-12-03 00:00:00', '2022-12-03 19:38:57'),
(50, 0, 17, '03122022KCPONQUB', 22000, 1, 22000, '2022-12-03 00:00:00', '2022-12-03 19:38:57'),
(51, 0, 24, '05122022AC2VZJSR', 20000, 1, 20000, '2022-12-05 00:00:00', '2022-12-05 06:10:19'),
(52, 0, 21, '05122022AC2VZJSR', 20000, 1, 20000, '2022-12-05 00:00:00', '2022-12-05 06:10:19'),
(53, 0, 21, '05122022JVEXYH4K', 20000, 1, 20000, '2022-12-05 00:00:00', '2022-12-05 07:12:15'),
(54, 0, 20, '05122022JVEXYH4K', 23000, 1, 23000, '2022-12-05 00:00:00', '2022-12-05 07:12:15'),
(55, 0, 19, '05122022JVEXYH4K', 20000, 1, 20000, '2022-12-05 00:00:00', '2022-12-05 07:12:15'),
(56, 0, 15, '05122022JVEXYH4K', 20000, 1, 20000, '2022-12-05 00:00:00', '2022-12-05 07:12:15'),
(57, 0, 2, '05122022JVEXYH4K', 22000, 1, 22000, '2022-12-05 00:00:00', '2022-12-05 07:12:15'),
(58, 0, 18, '05122022JVEXYH4K', 22000, 1, 22000, '2022-12-05 00:00:00', '2022-12-05 07:12:15'),
(59, 0, 24, '05122022KUILCRIX', 20000, 1, 20000, '2022-12-05 00:00:00', '2022-12-05 08:26:55'),
(60, 0, 21, '05122022KUILCRIX', 20000, 1, 20000, '2022-12-05 00:00:00', '2022-12-05 08:26:55'),
(61, 0, 20, '05122022KUILCRIX', 23000, 1, 23000, '2022-12-05 00:00:00', '2022-12-05 08:26:55'),
(62, 0, 21, '051220229CSM6DN2', 20000, 1, 20000, '2022-12-05 00:00:00', '2022-12-05 08:43:27'),
(63, 0, 20, '051220229CSM6DN2', 23000, 1, 23000, '2022-12-05 00:00:00', '2022-12-05 08:43:27'),
(64, 0, 21, '06122022ONY9C4IH', 20000, 1, 20000, '2022-12-06 00:00:00', '2022-12-06 05:59:57'),
(65, 0, 20, '06122022ONY9C4IH', 23000, 1, 23000, '2022-12-06 00:00:00', '2022-12-06 05:59:57'),
(66, 0, 20, '06122022PWECB6I2', 23000, 1, 23000, '2022-12-06 00:00:00', '2022-12-06 06:01:36'),
(67, 0, 21, '12012023L6AKPPRO', 20000, 1, 20000, '2023-01-12 00:00:00', '2023-01-12 04:00:55'),
(68, 0, 24, '06022023JJCRNYGD', 20000, 3, 60000, '2023-02-06 00:00:00', '2023-02-06 07:51:27'),
(69, 0, 17, '09022023UWHOC5TY', 22000, 1, 22000, '2023-02-09 00:00:00', '2023-02-09 04:07:42'),
(70, 0, 15, '09022023UWHOC5TY', 20000, 1, 20000, '2023-02-09 00:00:00', '2023-02-09 04:07:42'),
(71, 0, 24, '13022023L1KRS96R', 20000, 1, 20000, '2023-02-13 00:00:00', '2023-02-13 07:02:08'),
(72, 0, 24, '15022023AFHCEOOX', 20000, 5, 100000, '2023-02-15 00:00:00', '2023-02-15 08:07:08'),
(73, 0, 21, '15022023AFHCEOOX', 20000, 1, 20000, '2023-02-15 00:00:00', '2023-02-15 08:07:08'),
(74, 0, 20, '15022023AFHCEOOX', 23000, 1, 23000, '2023-02-15 00:00:00', '2023-02-15 08:07:08'),
(75, 0, 24, '15022023OXFJ8G2Q', 20000, 5, 100000, '2023-02-15 00:00:00', '2023-02-15 08:08:58'),
(76, 0, 21, '15022023OXFJ8G2Q', 20000, 1, 20000, '2023-02-15 00:00:00', '2023-02-15 08:08:58'),
(77, 0, 20, '15022023OXFJ8G2Q', 23000, 1, 23000, '2023-02-15 00:00:00', '2023-02-15 08:08:58'),
(78, 0, 2, '15022023BIZOSCT6', 22000, 5, 110000, '2023-02-15 00:00:00', '2023-02-15 08:18:12'),
(79, 0, 21, '15022023JCQUL1Y3', 20000, 5, 100000, '2023-02-15 00:00:00', '2023-02-15 17:47:57'),
(80, 0, 20, '15022023JCQUL1Y3', 23000, 1, 23000, '2023-02-15 00:00:00', '2023-02-15 17:47:57'),
(81, 0, 24, '15022023JCQUL1Y3', 20000, 3, 60000, '2023-02-15 00:00:00', '2023-02-15 17:47:58'),
(82, 0, 24, '15022023HB5D3M1N', 20000, 2, 40000, '2023-02-15 00:00:00', '2023-02-15 19:11:17'),
(83, 0, 21, '15022023HB5D3M1N', 20000, 1, 20000, '2023-02-15 00:00:00', '2023-02-15 19:11:20'),
(84, 0, 18, '15022023HB5D3M1N', 22000, 3, 66000, '2023-02-15 00:00:00', '2023-02-15 19:11:20'),
(85, 0, 21, '15022023NCFU0JYW', 20000, 100, 2000000, '2023-02-15 00:00:00', '2023-02-15 19:16:08');

--
-- Trigger `transaksi`
--
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN

   UPDATE produk SET stok_produk = stok_produk - NEW.jumlah

   WHERE id_produk = NEW.id_produk;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses_level` int(2) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(16, 'Cakrawati', 'cakrawatisudjono@gmail.com', 'cakrawati', '9e56634cbea36c680e95', 1, '2023-02-03 07:58:05'),
(23, 'Cakrawati', 'arif@gmail.com', 'arifarif', 'ecab8f3fef93c06582df3049f8937c08', 1, '2023-02-11 07:12:49'),
(24, 'admin', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, '2023-02-11 07:11:27'),
(25, 'Barista', 'barista@gmail.com', 'barista', '91e64a0124aded54ef4796d2d135b40c', 3, '2023-02-17 09:28:30'),
(26, 'kasir', 'kasir@gmail.com', 'kasir123', '91e64a0124aded54ef4796d2d135b40c', 2, '2023-02-17 08:50:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `id_meja` (`id_meja`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `akses_level` (`akses_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `akses_level` FOREIGN KEY (`akses_level`) REFERENCES `users_level` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
