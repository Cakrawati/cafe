-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2022 pada 06.54
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keywords` text DEFAULT NULL,
  `status_berita` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `psn_user` text NOT NULL,
  `psn_pelanggan` text NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_merchandise` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_merchandise`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(11, 3, 'sisi belakang', 'gambar3_-_Copy.PNG', '2021-09-30 11:26:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `kode_transaksi`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `alamat`, `id_user`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_post`, `tanggal_update`) VALUES
(10, '040120222ZHJ4OFO', 4, 'Cakrawati', 'cakrawatisudjono@gmail.com', '085877435358', 'tembalang\r\nkos indah', 0, '2022-01-04 00:00:00', 43000, 'Konfirmasi', 43000, '332199085118', 'SOLEH', '20210210_215500.jpg', 0, '10-01-2022', 'BANK BRI', '2022-01-04 13:21:40', '2022-01-10 05:46:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
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
(6, 'non-coffee', 'Non Coffee', 5, '2021-10-03 08:32:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebutuhan`
--

CREATE TABLE `kebutuhan` (
  `id_kebutuhan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_kebutuhan` varchar(255) NOT NULL,
  `slu_kebutuhan` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok_kebutuhan` int(11) DEFAULT NULL,
  `status_kebutuhan` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'Dangau Kopi - Cafe', 'Makes You Relax With Your Coffee', 'dangaukopi@gmail.com', 'http://dangaukopi.com', 'dangau kopi,  kafe di semarang, kafe aesthetic', 'OK', '082234066622', 'Jl. Kolonel HR Hadijanto No.31a, Sukorejo, Kec. Gn. Pati, Kota Semarang, Jawa Tengah 50221', 'https://www.facebook.com/dangau.kopi/', 'https://www.instagram.com/dangau.kopi/', 'Dangau Kopi Cafe', 'icon2.jpg', 'icon4.jpg', 'OK', '2021-10-08 23:23:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `alamat_pegawai` varchar(300) NOT NULL,
  `telepon_pegawai` varchar(30) NOT NULL,
  `status_pegawai` varchar(255) NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(4, 0, 'Pending', 'Cakrawati Sudjono', 'cakrawatisudjono@gmail.com', 'b8131043b2881a76e05304d530ebaa10', '085877435358', 'tembalang\r\nkos indah', '2022-01-04 11:01:34', '2022-01-06 02:53:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok_produk` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `ukuran` int(11) DEFAULT NULL,
  `status_produk` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok_produk`, `gambar`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(2, 11, 1, 'HC001', 'Caramel Latte', 'caramel-latte-hc001', 'Espresso, steam milk, flavour caramel', 'caramel latte', 22000, 100, 'caramel-latte.jpeg', 50, 'Publish', '2021-06-26 15:26:07', '2021-06-26 13:26:07'),
(15, 11, 1, 'HC002', 'Hot Caffe Latte', 'hot-caffe-latte-hc002', 'Espresso, stream milk', 'Hot Caffe Latte', 20000, 100, 'hot-caffe-latte3.jpeg', 100, 'Publish', '2021-10-03 10:40:39', '2021-12-29 03:15:52'),
(16, 11, 1, 'HC003', 'Hot Cappucino', 'hot-cappucino-hc003', 'Espresso, stream milk', 'Hot Cappucino', 20000, 100, 'hot-cappucino2.jpeg', 100, 'Publish', '2021-10-03 10:42:07', '2021-12-29 03:15:00'),
(17, 11, 1, 'HC004', 'Hot Moccacino', 'hot-moccacino-hc004', 'Espresso, stream milk, flavour cokelat', 'Hot Moccacino', 22000, 100, 'hot-moccacino.jpeg', 100, 'Publish', '2021-10-03 10:43:07', '2021-12-29 03:14:37'),
(18, 11, 1, 'HC005', 'Hot Vanilla Latte', 'hot-vanilla-latte-hc005', 'Espresso, stream milk, flavour vanila', 'Hot Vanilla Latte', 22000, 100, 'hot-vanilla-latte.jpeg', 100, 'Publish', '2021-10-03 10:44:00', '2021-12-29 03:12:53'),
(19, 11, 2, 'IC001', 'Es Cafe Latte', 'es-cafe-latte-ic001', 'Basic espresso dan stream freshmilk', 'Es Cafe  Latte', 20000, 100, 'es-cafe-latte.jpeg', 200, 'Publish', '2021-10-03 10:45:24', '2021-12-29 03:11:11'),
(20, 11, 2, 'IC002', 'Mocachino', 'mocachino-ic002', 'Espresso, stream freshmilk, Mocca', 'Mocachino', 23000, 100, 'ice2.PNG', 100, 'Publish', '2021-10-03 10:47:11', '2021-12-29 02:14:09'),
(21, 11, 4, 'SC001', 'Es Kopi Susu Dangau', 'es-kopi-susu-dangau-sc001', 'Es kopi susu dengan perpaduan  espresso, freshmilk, gula aren dan tambahan beberapa flavour lainnya', 'Es Kopi Susu Dangau', 20000, 100, 'cocho.PNG', 100, 'Publish', '2021-10-03 10:48:58', '2021-12-29 02:09:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `id_produk`, `kode_transaksi`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(14, 0, 4, 21, '040120222ZHJ4OFO', 20000, 1, 20000, '2022-01-04 00:00:00', '2022-01-04 12:21:40'),
(15, 0, 4, 20, '040120222ZHJ4OFO', 23000, 1, 23000, '2022-01-04 00:00:00', '2022-01-04 12:21:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(1, 'Cakrawati', 'cakrawatisudjono@gmail.com', 'cakrawati', '91e64a0124aded54ef4796d2d135b40c', 'Admin', '2021-05-17 03:54:13'),
(10, 'Dita Ananda  R', 'ditaanandar@gmail.com', 'ditadita', '8ee24bf1f0894c7df33eab5ca36dfaa2', 'Admin', '2021-05-18 05:57:51'),
(11, 'DIna dinul', 'dinalusiana@gmail.com', 'dinadinul', 'f13ab0167c2cd358108649945195dba4', 'Admin', '2021-06-02 04:35:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

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
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kebutuhan`
--
ALTER TABLE `kebutuhan`
  ADD PRIMARY KEY (`id_kebutuhan`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

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
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kebutuhan`
--
ALTER TABLE `kebutuhan`
  MODIFY `id_kebutuhan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
