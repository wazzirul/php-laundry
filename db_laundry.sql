-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Okt 2016 pada 06.16
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry_wazirul`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(10) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `id_konsumen` varchar(10) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `tgl_ambil` date NOT NULL,
  `jenis_laundry` varchar(10) NOT NULL,
  `jenis_pakaian` varchar(10) NOT NULL,
  `id_tarif` varchar(10) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon` text NOT NULL,
  `nama_diskon` varchar(10) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_awal`
--

CREATE TABLE `keranjang_awal` (
  `no_transaksi` varchar(10) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `id_konsumen` varchar(10) NOT NULL,
  `tgl_ambil` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_akun`
--

INSERT INTO `tbl_akun` (`id`, `username`, `password`, `nama`, `alamat`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'kepanjen', 'admin'),
(2, 'sadmin', 'c5edac1b8c1d58bad90a246d8f08f53b', 'super admin', 'malang', 'superadmin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `tgl_bu_stok` date NOT NULL,
  `jam_bu_stok` time NOT NULL,
  `hrg_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`kode_barang`, `nama_barang`, `supplier`, `qty`, `tgl_bu_stok`, `jam_bu_stok`, `hrg_beli`) VALUES
('BRG001', 'Rinso', 'PT RONSI INDO', 111, '2016-10-19', '16:40:58', 5000),
('BRG002', 'Parfume', 'PT GG Easy', 120, '2016-10-19', '16:43:02', 2500),
('BRG003', 'Softergen', 'PT NOOB Team', 129, '2016-10-19', '07:07:22', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_histori_pembelian`
--

CREATE TABLE `tbl_histori_pembelian` (
  `kode_pembelian` varchar(50) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `tgl_beli` date NOT NULL,
  `jam` time NOT NULL,
  `hrg_beli` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_histori_pembelian`
--

INSERT INTO `tbl_histori_pembelian` (`kode_pembelian`, `kode_barang`, `nik`, `nama_barang`, `supplier`, `tgl_beli`, `jam`, `hrg_beli`, `qty`, `jumlah`) VALUES
('PBL001', 'BRG001', 'NIK002', 'Rinso', 'PT RONSI INDO', '2016-10-11', '16:40:58', 5000, 10, 50000),
('PBL002', 'BRG002', 'NIK001', 'Parfume', 'PT GG Easy', '2016-10-11', '16:43:02', 2500, 10, 25000),
('PBL003', 'BRG002', 'NIK003', 'Parfume', 'PT GG Easy', '2016-10-11', '16:44:20', 2500, 5, 12500),
('PBL004', 'BRG003', 'NIK002', 'Softergen', 'PT NOOB Team', '2016-10-19', '07:07:22', 5000, 50, 250000),
('PBL005', 'BRG001', 'NIK002', 'Rinso', 'PT RONSI INDO', '2016-10-19', '08:17:32', 5000, 20, 100000),
('PBL006', 'BRG002', 'NIK003', 'Parfume', 'PT GG Easy', '2016-10-19', '08:17:43', 2500, 25, 62500),
('PBL007', 'BRG001', 'NIK001', 'Rinso', 'PT RONSI INDO', '2016-10-19', '10:07:21', 5000, 90, 450000),
('PBL008', 'BRG002', 'NIK002', 'Parfume', 'PT GG Easy', '2016-10-19', '10:07:30', 2500, 90, 225000),
('PBL009', 'BRG003', 'NIK003', 'Softergen', 'PT NOOB Team', '2016-10-19', '10:07:37', 5000, 90, 450000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jnslaundry`
--

CREATE TABLE `tbl_jnslaundry` (
  `id` varchar(10) NOT NULL,
  `jenis_laundry` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jnslaundry`
--

INSERT INTO `tbl_jnslaundry` (`id`, `jenis_laundry`) VALUES
('JNS01', 'Cuci Kering'),
('JNS02', 'Cuci Basah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jnspakaian`
--

CREATE TABLE `tbl_jnspakaian` (
  `id` varchar(10) NOT NULL,
  `jenis_pakaian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jnspakaian`
--

INSERT INTO `tbl_jnspakaian` (`id`, `jenis_pakaian`) VALUES
('PKN001', 'kemeja'),
('PKN002', 'kaos'),
('PKN003', 'Celana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `NIK` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `jk` enum('Laki Laki','Perempuan','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`NIK`, `nama`, `alamat`, `telepon`, `jk`) VALUES
('NIK001', 'Wazirul', 'Kepanjen', '085299990000', 'Laki Laki'),
('NIK002', 'Ikuchan ~', 'ntah lupa gwa', '1029301293012', 'Perempuan'),
('NIK003', 'Wakachuki ~', 'yang ini gwa juga lupa', '0821732671263', 'Perempuan'),
('NIK004', 'a', 'b', 'c', 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konsumen`
--

CREATE TABLE `tbl_konsumen` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_konsumen`
--

INSERT INTO `tbl_konsumen` (`id`, `nama`, `alamat`, `telepon`) VALUES
('LSR001', 'Wazirul Azzan', 'Kepanjen', '085299990000'),
('LSR002', 'Minyak Wangi Sakura', 'Hakata05', '1234123902139'),
('LSR004', 'Romantic Ikayaki', 'Sore Zore No Izu', '0129302193012'),
('LSR005', 'Sulton', 'Sengguruh', '0912398123902'),
('LSR006', 'Chykha', 'Cepokomulyo', '1283098120983'),
('LSR007', 'Yuni', 'Malang', '0129302190390'),
('LSR008', 'Pak Sugik', 'Malang', '09832212312');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `kode_pembelian` varchar(100) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `qty` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`kode_pembelian`, `kode_barang`, `nik`, `tgl`, `jam`, `qty`, `jumlah`) VALUES
('PBL001', 'BRG001', 'NIK002', '2016-10-11', '16:40:58', 10, 50000),
('PBL002', 'BRG002', 'NIK001', '2016-10-11', '16:43:02', 10, 25000),
('PBL003', 'BRG002', 'NIK003', '2016-10-11', '16:44:20', 5, 12500),
('PBL004', 'BRG003', 'NIK002', '2016-10-19', '07:07:22', 50, 250000),
('PBL005', 'BRG001', 'NIK002', '2016-10-19', '08:17:32', 20, 100000),
('PBL006', 'BRG002', 'NIK003', '2016-10-19', '08:17:43', 25, 62500),
('PBL007', 'BRG001', 'NIK001', '2016-10-19', '10:07:21', 90, 450000),
('PBL008', 'BRG002', 'NIK002', '2016-10-19', '10:07:30', 90, 225000),
('PBL009', 'BRG003', 'NIK003', '2016-10-19', '10:07:37', 90, 450000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penggunaan_barang`
--

CREATE TABLE `tbl_penggunaan_barang` (
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(10) NOT NULL,
  `jumlah` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penggunaan_barang`
--

INSERT INTO `tbl_penggunaan_barang` (`id`, `no_transaksi`, `jumlah`) VALUES
(1, 'TRS017', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rincian_transaksi`
--

CREATE TABLE `tbl_rincian_transaksi` (
  `id_rincian` int(11) NOT NULL,
  `no_transaksi` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_rincian_transaksi`
--

INSERT INTO `tbl_rincian_transaksi` (`id_rincian`, `no_transaksi`, `jumlah`) VALUES
(1, 'TRS001', 208000),
(2, 'TRS002', 51000),
(3, 'TRS003', 110000),
(4, 'TRS004', 74000),
(5, 'TRS005', 25500),
(6, 'TRS006', 19000),
(7, 'TRS007', 21000),
(8, 'TRS008', 18000),
(9, 'TRS009', 19500),
(10, 'TRS010', 9500),
(11, 'TRS011', 18000),
(12, 'TRS012', 22000),
(13, 'TRS013', 27000),
(14, 'TRS014', 30000),
(15, 'TRS015', 45500),
(16, 'TRS016', 50000),
(17, 'TRS017', 14500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id`, `nama`, `alamat`, `telepon`) VALUES
('SUP001', 'PT RONSI INDO', 'ntah lah', '085299990000'),
('SUP002', 'PT GG Easy', 'ntah lupa gwa', '1234123902139'),
('SUP004', 'PT NOOB Team', 'mana gwa tau', '0912321837129');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tarif`
--

CREATE TABLE `tbl_tarif` (
  `id` varchar(10) NOT NULL,
  `id_jenis_laundry` varchar(10) NOT NULL,
  `id_jenis_pakaian` varchar(10) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tarif`
--

INSERT INTO `tbl_tarif` (`id`, `id_jenis_laundry`, `id_jenis_pakaian`, `tarif`) VALUES
('TRF001', 'JNS01', 'PKN001', 2000),
('TRF002', 'JNS02', 'PKN002', 1000),
('TRF003', 'JNS01', 'PKN002', 1500),
('TRF004', 'JNS02', 'PKN001', 1500),
('TRF005', 'JNS01', 'PKN003', 2000),
('TRF006', 'JNS02', 'PKN003', 1500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(10) NOT NULL,
  `nik` varchar(10) NOT NULL,
  `id_konsumen` varchar(10) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `tgl_ambil` date NOT NULL,
  `jenis_laundry` varchar(10) NOT NULL,
  `jenis_pakaian` varchar(10) NOT NULL,
  `id_tarif` varchar(10) NOT NULL,
  `berat` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon` varchar(10) NOT NULL,
  `nama_diskon` varchar(10) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id`, `no_transaksi`, `nik`, `id_konsumen`, `tgl_transaksi`, `tgl_ambil`, `jenis_laundry`, `jenis_pakaian`, `id_tarif`, `berat`, `harga`, `diskon`, `nama_diskon`, `total`) VALUES
(1, 'TRS001', 'NIK001', 'LSR002', '2016-10-18', '2016-10-31', 'JNS01', 'PKN001', 'TRF001', 4, 2000, '1', '0%', 8000),
(2, 'TRS001', 'NIK001', 'LSR002', '2016-10-18', '2016-10-31', 'JNS01', 'PKN001', 'TRF001', 10, 2000, '0.9', '10%', 18000),
(4, 'TRS001', 'NIK001', 'LSR002', '2016-10-18', '2016-10-31', 'JNS01', 'PKN003', 'TRF005', 60, 2000, '0.5', '50%', 60000),
(5, 'TRS001', 'NIK001', 'LSR002', '2016-10-18', '2016-10-31', 'JNS01', 'PKN003', 'TRF005', 40, 2000, '0.6', '40%', 48000),
(6, 'TRS001', 'NIK001', 'LSR002', '2016-10-18', '2016-10-31', 'JNS01', 'PKN001', 'TRF001', 30, 2000, '0.7', '30%', 42000),
(7, 'TRS001', 'NIK001', 'LSR002', '2016-10-18', '2016-10-31', 'JNS01', 'PKN001', 'TRF001', 20, 2000, '0.8', '20%', 32000),
(1, 'TRS002', 'NIK002', 'LSR001', '2016-10-18', '2016-10-26', 'JNS01', 'PKN001', 'TRF001', 15, 2000, '0.9', '10%', 27000),
(2, 'TRS002', 'NIK002', 'LSR001', '2016-10-18', '2016-10-26', 'JNS01', 'PKN002', 'TRF003', 20, 1500, '0.8', '20%', 24000),
(1, 'TRS003', 'NIK003', 'LSR006', '2016-10-19', '2016-10-27', 'JNS01', 'PKN001', 'TRF001', 10, 2000, '0.9', '10%', 18000),
(2, 'TRS003', 'NIK003', 'LSR006', '2016-10-19', '2016-10-27', 'JNS01', 'PKN003', 'TRF005', 30, 2000, '0.7', '30%', 42000),
(3, 'TRS003', 'NIK003', 'LSR006', '2016-10-19', '2016-10-27', 'JNS01', 'PKN001', 'TRF001', 50, 2000, '0.5', '50%', 50000),
(1, 'TRS004', 'NIK002', 'LSR007', '2016-10-19', '2016-10-29', 'JNS01', 'PKN001', 'TRF001', 30, 2000, '0.7', '30%', 42000),
(2, 'TRS004', 'NIK002', 'LSR007', '2016-10-19', '2016-10-29', 'JNS01', 'PKN003', 'TRF005', 20, 2000, '0.8', '20%', 32000),
(1, 'TRS005', 'NIK003', 'LSR008', '2016-10-19', '2016-10-21', 'JNS01', 'PKN001', 'TRF001', 10, 2000, '0.9', '10%', 18000),
(2, 'TRS005', 'NIK003', 'LSR008', '2016-10-19', '2016-10-21', 'JNS01', 'PKN002', 'TRF003', 5, 1500, '1', '0%', 7500),
(1, 'TRS006', 'NIK001', 'LSR005', '2016-10-19', '2016-10-20', 'JNS01', 'PKN001', 'TRF001', 3, 2000, '1', '0%', 6000),
(2, 'TRS006', 'NIK001', 'LSR005', '2016-10-19', '2016-10-20', 'JNS01', 'PKN002', 'TRF003', 2, 1500, '1', '0%', 3000),
(3, 'TRS006', 'NIK001', 'LSR005', '2016-10-19', '2016-10-20', 'JNS01', 'PKN003', 'TRF005', 5, 2000, '1', '0%', 10000),
(1, 'TRS007', 'NIK004', 'LSR006', '2016-10-19', '2016-10-29', 'JNS02', 'PKN003', 'TRF006', 10, 1500, '0.9', '10%', 13500),
(2, 'TRS007', 'NIK004', 'LSR006', '2016-10-19', '2016-10-29', 'JNS02', 'PKN001', 'TRF004', 5, 1500, '1', '0%', 7500),
(1, 'TRS008', 'NIK004', 'LSR001', '2016-10-19', '2016-10-27', 'JNS01', 'PKN001', 'TRF001', 10, 2000, '0.9', '10%', 18000),
(1, 'TRS009', 'NIK004', 'LSR008', '2016-10-19', '2016-10-31', 'JNS01', 'PKN001', 'TRF001', 2, 2000, '1', '0%', 4000),
(2, 'TRS009', 'NIK004', 'LSR008', '2016-10-19', '2016-10-31', 'JNS01', 'PKN002', 'TRF003', 5, 1500, '1', '0%', 7500),
(3, 'TRS009', 'NIK004', 'LSR008', '2016-10-19', '2016-10-31', 'JNS01', 'PKN003', 'TRF005', 4, 2000, '1', '0%', 8000),
(1, 'TRS010', 'NIK001', 'LSR006', '2016-10-19', '2016-10-27', 'JNS01', 'PKN001', 'TRF001', 1, 2000, '1', '0%', 2000),
(2, 'TRS010', 'NIK001', 'LSR006', '2016-10-19', '2016-10-27', 'JNS01', 'PKN002', 'TRF003', 5, 1500, '1', '0%', 7500),
(1, 'TRS011', 'NIK001', 'LSR002', '2016-10-19', '2016-10-26', 'JNS01', 'PKN001', 'TRF001', 10, 2000, '0.9', '10%', 18000),
(1, 'TRS012', 'NIK003', 'LSR001', '2016-10-19', '2016-10-31', 'JNS01', 'PKN001', 'TRF001', 10, 2000, '0.9', '10%', 18000),
(2, 'TRS012', 'NIK003', 'LSR001', '2016-10-19', '2016-10-31', 'JNS01', 'PKN001', 'TRF001', 2, 2000, '1', '0%', 4000),
(1, 'TRS013', 'NIK002', 'LSR006', '2016-10-19', '2016-10-27', 'JNS01', 'PKN001', 'TRF001', 10, 2000, '0.9', '10%', 18000),
(2, 'TRS013', 'NIK002', 'LSR006', '2016-10-19', '2016-10-27', 'JNS01', 'PKN002', 'TRF003', 6, 1500, '1', '0%', 9000),
(1, 'TRS014', 'NIK002', 'LSR002', '2016-10-19', '2016-10-27', 'JNS01', 'PKN001', 'TRF001', 10, 2000, '0.9', '10%', 18000),
(2, 'TRS014', 'NIK002', 'LSR002', '2016-10-19', '2016-10-27', 'JNS01', 'PKN001', 'TRF001', 6, 2000, '1', '0%', 12000),
(1, 'TRS015', 'NIK002', 'LSR002', '2016-10-19', '2016-10-28', 'JNS02', 'PKN001', 'TRF004', 10, 1500, '0.9', '10%', 13500),
(2, 'TRS015', 'NIK002', 'LSR002', '2016-10-19', '2016-10-28', 'JNS01', 'PKN001', 'TRF001', 20, 2000, '0.8', '20%', 32000),
(1, 'TRS016', 'NIK001', 'LSR001', '2016-10-19', '2016-10-26', 'JNS01', 'PKN001', 'TRF001', 20, 2000, '0.8', '20%', 32000),
(2, 'TRS016', 'NIK001', 'LSR001', '2016-10-19', '2016-10-26', 'JNS01', 'PKN003', 'TRF005', 10, 2000, '0.9', '10%', 18000),
(1, 'TRS017', 'NIK002', 'LSR001', '2016-10-19', '2016-10-26', 'JNS01', 'PKN001', 'TRF001', 5, 2000, '1', '0%', 10000),
(2, 'TRS017', 'NIK002', 'LSR001', '2016-10-19', '2016-10-26', 'JNS01', 'PKN002', 'TRF003', 3, 1500, '1', '0%', 4500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tbl_histori_pembelian`
--
ALTER TABLE `tbl_histori_pembelian`
  ADD PRIMARY KEY (`kode_pembelian`);

--
-- Indexes for table `tbl_jnslaundry`
--
ALTER TABLE `tbl_jnslaundry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jnspakaian`
--
ALTER TABLE `tbl_jnspakaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `tbl_konsumen`
--
ALTER TABLE `tbl_konsumen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`kode_pembelian`);

--
-- Indexes for table `tbl_penggunaan_barang`
--
ALTER TABLE `tbl_penggunaan_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rincian_transaksi`
--
ALTER TABLE `tbl_rincian_transaksi`
  ADD PRIMARY KEY (`id_rincian`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tarif`
--
ALTER TABLE `tbl_tarif`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_penggunaan_barang`
--
ALTER TABLE `tbl_penggunaan_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_rincian_transaksi`
--
ALTER TABLE `tbl_rincian_transaksi`
  MODIFY `id_rincian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
