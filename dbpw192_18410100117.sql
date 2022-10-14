-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2020 pada 16.04
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpw192_18410100117`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `Id_Bahan` varchar(5) NOT NULL,
  `Nama_Bahan` varchar(50) NOT NULL,
  `Jumlah_Stock` int(11) NOT NULL,
  `Harga_Bahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inventory`
--

INSERT INTO `inventory` (`Id_Bahan`, `Nama_Bahan`, `Jumlah_Stock`, `Harga_Bahan`) VALUES
('B0002', 'Terigu', 894, 7500),
('B0005', 'Tepung', 9893, 17500),
('B0009', 'Telur', 99, 10000),
('B0010', 'Mentega', 9893, 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `Id_Beli` varchar(5) NOT NULL,
  `Tanggal_Beli` datetime NOT NULL,
  `Nama_Supplier` varchar(50) NOT NULL,
  `Nama_Bahan` varchar(50) NOT NULL,
  `Harga_Bahan` int(11) NOT NULL,
  `Jumlah_Beli` int(11) NOT NULL,
  `Total_Harga_Beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`Id_Beli`, `Tanggal_Beli`, `Nama_Supplier`, `Nama_Bahan`, `Harga_Bahan`, `Jumlah_Beli`, `Total_Harga_Beli`) VALUES
('B3002', '2020-07-12 05:27:24', 'Supri', 'Telur', 10000, 100, 1000000),
('B3003', '2020-07-12 05:29:11', 'Fahmi', 'Tepung', 17500, 100, 1750000),
('B3004', '2020-07-12 05:29:20', 'Supri', 'Terigu', 7500, 100, 750000),
('B3006', '2020-07-12 05:30:13', 'Supri', 'Terigu', 7500, 1, 7500),
('B3015', '2020-07-13 08:55:58', 'Supri', 'Telur', 10000, 7, 70000),
('B3071', '2020-07-21 16:01:58', 'Supri', 'Telur', 10000, 100, 1000000),
('B3099', '2020-07-11 14:29:07', 'Supri', 'Mentega', 3000, 1, 3000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `Id_Jual` varchar(5) NOT NULL,
  `Tanggal_Jual` datetime NOT NULL,
  `Nama_Pelanggan` varchar(50) NOT NULL,
  `Nama_Produk` varchar(50) NOT NULL,
  `Jumlah_Beli` int(11) NOT NULL,
  `Harga` float NOT NULL,
  `Total_Harga_Jual` int(11) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Hutang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`Id_Jual`, `Tanggal_Jual`, `Nama_Pelanggan`, `Nama_Produk`, `Jumlah_Beli`, `Harga`, `Total_Harga_Jual`, `Status`, `Hutang`) VALUES
('P0001', '2020-07-07 03:57:22', 'Dimaz', 'Kue Bolu', 1, 10000, 10000, 'Selesai', 0),
('P0002', '2020-07-11 14:27:56', 'Dummy', 'Kue Bolu', 1, 20000, 20000, 'Selesai', 0),
('P0003', '2020-07-12 05:16:53', 'Sayang', 'Kue Bolu', 100, 20000, 2000000, 'Selesai', 0),
('P0004', '2020-07-11 20:20:25', 'Dimaz', 'Kue Bolu', 4, 20000, 80000, 'Selesai', 0),
('P0005', '2020-07-12 05:18:11', 'Dimaz', 'Kue Bolu', 200, 20000, 4000000, 'Selesai', 0),
('P0069', '2020-07-13 08:54:48', 'Dummy99', 'Kue Bolu', 3, 20000, 60000, 'Selesai', 0),
('P0095', '2020-07-13 08:39:10', 'Coba99', 'Kue Bolu', 200, 20000, 4000000, 'Selesai', 0),
('P0098', '2020-07-13 04:38:52', 'Dimaz2', 'Kue Bolu', 5, 20000, 100000, 'Ditolak', 0),
('P0099', '2020-07-13 04:36:19', 'Dimaz', 'Kue Bolu', 5, 20000, 100000, 'Proses', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `Id_Produk` varchar(5) NOT NULL,
  `Nama_Produk` varchar(50) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`Id_Produk`, `Nama_Produk`, `Harga`, `Deskripsi`) VALUES
('K0001', 'Kue Bolu', 20000, 'Kue Bolu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `Id_Produk` varchar(5) NOT NULL,
  `Telur` int(11) NOT NULL,
  `Tepung` int(11) NOT NULL,
  `Terigu` int(11) NOT NULL,
  `Mentega` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`Id_Produk`, `Telur`, `Tepung`, `Terigu`, `Mentega`) VALUES
('K0001', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `Id_Supplier` varchar(5) NOT NULL,
  `Nama_Supplier` varchar(50) NOT NULL,
  `Alamat_Supplier` varchar(50) NOT NULL,
  `No_Hp_Supplier` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`Id_Supplier`, `Nama_Supplier`, `Alamat_Supplier`, `No_Hp_Supplier`) VALUES
('S0001', 'Supri', 'Sidoarjo', ''),
('S0002', 'Fahmi', 'Gunung Kidul', '0918271721');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `Id_User` varchar(5) NOT NULL,
  `Nama_User` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Kata_Sandi` varchar(50) NOT NULL,
  `Role_Id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Id_User`, `Nama_User`, `Username`, `Kata_Sandi`, `Role_Id`) VALUES
('A0069', 'AdminJozz', 'Admin', 'admin', 0),
('A0002', 'Clara', 'clara', 'sayangku', 0),
('A0100', 'Cust1', 'Customer', 'customer', 1),
('A0010', 'Dimaz Dummy', 'dimaz', 'dimazivanperdana', 1),
('A0001', 'Dimaz Ivan Perdana', 'dimazivan', 'manukan', 0),
('U0001', 'dummy', 'dummy', 'manukan', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Id_Bahan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`Id_Beli`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`Id_Jual`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`Id_Produk`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD KEY `FK_resep` (`Id_Produk`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Id_Supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `FK_resep` FOREIGN KEY (`Id_Produk`) REFERENCES `produk` (`Id_Produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
