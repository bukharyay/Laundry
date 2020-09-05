-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 02 Sep 2020 pada 01.33
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laundry`
--

CREATE TABLE `tb_laundry` (
  `id_laundry` int(11) NOT NULL,
  `kode_pelanggan` varchar(10) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_outlet` int(3) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jumlah_kiloan` varchar(128) NOT NULL,
  `nominal` varchar(128) NOT NULL,
  `status` enum('Lunas','Belum Lunas') NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_laundry`
--

INSERT INTO `tb_laundry` (`id_laundry`, `kode_pelanggan`, `id_user`, `id_outlet`, `tanggal_terima`, `tanggal_selesai`, `jumlah_kiloan`, `nominal`, `status`, `catatan`) VALUES
(2, 'PLG-0001', 1, 2, '2020-08-14', '2020-08-15', '4', '28000', 'Lunas', 'Cloth'),
(11, 'PLG-0003', 1, 1, '2020-08-02', '2020-08-04', '1', '7000', 'Lunas', 'Jeans'),
(16, 'PLG-0002', 10, 2, '2020-08-04', '2020-08-06', '2', '14000', 'Lunas', 'Celana Jeans'),
(17, 'PLG-0002', 1, 3, '2020-09-01', '2020-09-02', '2', '14000', 'Lunas', 'Jacket'),
(18, 'PLG-0004', 1, 1, '2020-09-04', '2020-09-05', '6', '42000', 'Lunas', 'Pants\r\n'),
(19, 'PLG-0001', 1, 2, '2020-09-17', '2020-09-19', '4', '28000', 'Lunas', 'Thick jacket'),
(20, 'PLG-0003', 1, 3, '2020-09-19', '2020-09-20', '5', '35000', 'Lunas', 'Bed Cover');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id_outlet` int(3) NOT NULL,
  `nama_outlet` varchar(128) NOT NULL,
  `alamat_outlet` text NOT NULL,
  `no_telp_outlet` varchar(15) NOT NULL,
  `logo_outlet` varchar(128) NOT NULL,
  `owner_outlet` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_outlet`
--

INSERT INTO `tb_outlet` (`id_outlet`, `nama_outlet`, `alamat_outlet`, `no_telp_outlet`, `logo_outlet`, `owner_outlet`) VALUES
(1, 'Citra Laundry', 'Blok C/13, Batuaji Batam', '6208808', 'clean.png', 'Citra'),
(2, 'Borobudur Clean', 'Jl.Teratai V/ 183 Perum Condong Catur Yogyakarta 5 Yogyakarta', '3151618', 'Borobudur Stupa Temple Stone Logo by Enola99d on @creativemarket.jfif', 'Borobudur'),
(3, 'Indowash', 'Jl.Cisirung No.25 A Moh Toha Bandung', '5226516', 'clean2.png', 'Indowash');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `kode_pelanggan` varchar(10) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`kode_pelanggan`, `nama`, `alamat`, `no_telp`) VALUES
('PLG-0001', 'Wilma J. Wilson', '2555 Westfall Avenue\r\nSanta Fe, NM 87501', '505-983-7377'),
('PLG-0002', 'Kevin C. Allen', '2174 Tea Berry Lane\r\nEau Claire, WI 54701', '715-770-0283'),
('PLG-0003', 'Cynthia R. Blake', '1882 McVaney Road\r\nAsheville, NC 28803', '828-274-6811'),
('PLG-0004', 'John C. Carrera', '3894 Winifred Way\r\nIndianapolis, IN 46254', '765-623-8781');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_outlet` int(3) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `pemasukan` int(11) NOT NULL,
  `pengeluaran` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_outlet`, `tgl_transaksi`, `pemasukan`, `pengeluaran`, `catatan`, `keterangan`) VALUES
(32, 1, 1, '2020-08-02', 7000, 0, 'Jeans', 'Pemasukan'),
(33, 1, 2, '2020-08-14', 28000, 0, 'Cloth', 'Pemasukan'),
(34, 1, 3, '2020-09-01', 14000, 0, 'Jacket', 'Pemasukan'),
(35, 1, 1, '2020-09-04', 42000, 0, 'Pants\r\n', 'Pemasukan'),
(36, 1, 2, '2020-09-17', 28000, 0, 'Thick jacket', 'Pemasukan'),
(37, 1, 3, '2020-09-19', 35000, 0, 'Bed Cover', 'Pemasukan'),
(38, 1, 1, '2020-09-04', 0, 150000, 'Perfuming clothes', 'Pengeluaran'),
(39, 1, 2, '2020-09-05', 0, 50000, 'Washing soap', 'Pengeluaran'),
(40, 1, 3, '2020-09-21', 0, 100000, 'Electricity', 'Pengeluaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(3) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama_user` char(128) NOT NULL,
  `role` enum('admin','karyawan','owner') NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_user`, `role`, `foto`) VALUES
(1, 'admin@gmail.com', 'admin', 'Ricky M. Stodola', 'admin', 'Ricky M. Stodola.jpg'),
(2, 'karyawan@gmail.com', 'karyawan', 'Alba Månsson', 'karyawan', 'Alba Månsson.jpg'),
(3, 'owner@gmail.com', 'owner', 'Heather Fraser', 'owner', 'Heather Fraser.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_user_access_menu` int(1) NOT NULL,
  `role` enum('admin','karyawan','owner') NOT NULL,
  `menu_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_user_access_menu`, `role`, `menu_id`) VALUES
(1, 'admin', 1),
(2, 'admin', 2),
(3, 'admin', 3),
(4, 'admin', 4),
(5, 'karyawan', 1),
(6, 'karyawan', 3),
(7, 'owner', 1),
(8, 'karyawan', 4),
(9, 'owner', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(1) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'dashboard'),
(2, 'admin'),
(3, 'karyawan'),
(4, 'owner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_user_sub_menu` int(11) NOT NULL,
  `menu_id` int(1) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_user_sub_menu`, `menu_id`, `title`, `url`, `icon`) VALUES
(1, 1, 'Dashboard', '?page=Dashboard', 'fas fa-fw fa-tachometer-alt'),
(2, 2, 'Data Pengguna', '?page=Data Pengguna', 'fas fa-fw fa-users'),
(3, 2, 'Data Outlet', '?page=Data Outlet', 'fas fa-fw fa-home'),
(4, 3, 'Data Pelanggan', '?page=Data Pelanggan', 'fas fa-fw fa-address-book'),
(5, 3, 'Transaksi Laundry', '?page=Transaksi Laundry', 'fas fa-fw fa-credit-card'),
(6, 4, 'Data Transaksi', '?page=Data Transaksi', 'fas fa-fw fa-shopping-cart');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_laundry`
--
ALTER TABLE `tb_laundry`
  ADD PRIMARY KEY (`id_laundry`);

--
-- Indeks untuk tabel `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_user_access_menu`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_user_sub_menu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_laundry`
--
ALTER TABLE `tb_laundry`
  MODIFY `id_laundry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id_outlet` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_user_access_menu` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_user_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
