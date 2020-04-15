-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2020 pada 05.49
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugaspbdfix3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` enum('admin','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `role`) VALUES
(1, 'admin', '$2y$10$eY8U8dWgfp73sDgkNSwhzusczUpmD9Mr94NIbUo30iB3.6MeyDtti', 'Rafli Adhiyaksa Putra', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','operator','user','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Rafli Adhiyaksa', 'user', '$2y$10$.zsUgafyudcsk1hiNRJTyeCWCxIfL4IwYQNIBVV.mesjMz.iP5XMS', 'user'),
(3, 'Rafli Adhiyaksa Putra', 'admin', '$2y$10$6/uCxkWBbwmzwxlyiC2kae8pDGyN/8LYt5Btw76n2YGDWzBGnxH7K', 'admin'),
(5, 'Rafli Adhiyaksa', 'operator', '$2y$10$O9zrYWkD06R23ltp4RxyyuA28K1.z2Ow8CPN9KKagMnBUwfNvehaq', 'operator'),
(6, 'rafli', 'rafli', '$2y$10$9.NlXs6EIkIK6aHb.3Brc.ioB4vjV9vQoSP6SYtDX.m1Hi0Oh4782', 'user'),
(7, 'mulazi', 'mulazi', '$2y$10$sQBZvaZlQfUdOzaWA1PMb.tBfFSRHDXAisQkBH53cA4AiLjHNVmza', 'user'),
(11, 'coba', 'cobalah', '$2y$10$itFTagBoZkd2YzidsZ.sHuOBX6yjLJs/U2o8oxeSNBSzJ5ItpUD22', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_gunung`
--

CREATE TABLE `m_gunung` (
  `id_gunung` int(11) NOT NULL,
  `kd_gunung` varchar(10) NOT NULL,
  `nm_gunung` varchar(30) NOT NULL,
  `geojson_gunung` varchar(30) NOT NULL,
  `lokasi` varchar(50) CHARACTER SET latin1 NOT NULL,
  `keterangan` varchar(100) CHARACTER SET latin1 NOT NULL,
  `lat` float(9,6) NOT NULL,
  `lng` float(9,6) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_gunung`
--

INSERT INTO `m_gunung` (`id_gunung`, `kd_gunung`, `nm_gunung`, `geojson_gunung`, `lokasi`, `keterangan`, `lat`, `lng`, `status`) VALUES
(6, '6', 'Krakatau', '', 'Lampung', 'Aktif', 105.422997, -6.102000, 'kobe-bryant.jpg'),
(7, '7', 'Semeru', '', 'Jawa Timur', 'Aktif', 112.913651, -8.107696, ''),
(8, '8', 'Kerinci', '', 'Sumatra Barat', 'Aktif', 101.264000, -1.697000, ''),
(9, '9', 'Ibu', '', 'Maluku Utara', 'Aktif', 127.624580, 1.483355, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nm_pengguna` varchar(20) NOT NULL,
  `kt_sandi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nm_pengguna`, `kt_sandi`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_hotspot`
--

CREATE TABLE `t_hotspot` (
  `id_hotspot` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `lat` float(9,6) NOT NULL,
  `lng` float(9,6) NOT NULL,
  `tanggal` date NOT NULL,
  `marker` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_hotspot`
--

INSERT INTO `t_hotspot` (`id_hotspot`, `id_kecamatan`, `lokasi`, `keterangan`, `lat`, `lng`, `tanggal`, `marker`) VALUES
(1, 18, 'Jl. Peganggas gas amat', 'Kebakaran Parah sekali', -3.641010, 114.775002, '2019-12-19', '35281219011541.png'),
(2, 6, 'Jl. Pegangga', 'Kebakaran Parah sekali', -3.656000, 114.775002, '2019-12-19', ''),
(3, 18, 'Jl. Raya', 'Rusak parah', -3.816298, 114.797401, '2019-12-20', '7281219011755.png'),
(4, 18, 'Jl A', 'Rusak parah', -3.817160, 114.800987, '2019-12-20', ''),
(5, 19, 'Jl. Sepeda', '-', -3.641010, 114.675003, '2020-01-20', ''),
(6, 6, 'Rumah Saiful', '-', -3.661010, 114.775002, '2020-01-20', ''),
(7, 21, 'Rmah Jakaria', '-', -3.846298, 114.897400, '2020-01-20', ''),
(8, 22, 'HUtan Rawa Merawa', '-', -3.761010, 114.857399, '2020-01-20', '91200120113957.png'),
(9, 18, 'Gang Jambu', 'Rumah Terbakar', -3.817130, 114.801888, '2020-02-11', ''),
(10, 6, 'Rumah Zakaria', 'Kompor Meledak', -3.657300, 114.766006, '2020-02-11', ''),
(11, 6, 'Gedung Pencakar', 'Lantai 4 terbakar', -3.655300, 114.696503, '2020-02-11', ''),
(12, 6, 'Pasar Kaki Lima', '4 Loket terbakar', -3.655300, 114.686501, '2020-02-11', ''),
(13, 6, 'Pasar 5', 'Terbakar habis', -3.685300, 114.776009, '2020-02-11', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_maps`
--

CREATE TABLE `t_maps` (
  `id_maps` int(11) NOT NULL,
  `id_gunung` int(11) NOT NULL,
  `lokasi` varchar(50) CHARACTER SET latin1 NOT NULL,
  `keterangan` varchar(100) CHARACTER SET latin1 NOT NULL,
  `lat` float(9,6) NOT NULL,
  `lang` float(9,6) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `m_gunung`
--
ALTER TABLE `m_gunung`
  ADD PRIMARY KEY (`id_gunung`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `t_hotspot`
--
ALTER TABLE `t_hotspot`
  ADD PRIMARY KEY (`id_hotspot`);

--
-- Indeks untuk tabel `t_maps`
--
ALTER TABLE `t_maps`
  ADD PRIMARY KEY (`id_maps`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `m_gunung`
--
ALTER TABLE `m_gunung`
  MODIFY `id_gunung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_hotspot`
--
ALTER TABLE `t_hotspot`
  MODIFY `id_hotspot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `t_maps`
--
ALTER TABLE `t_maps`
  MODIFY `id_maps` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
