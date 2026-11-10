-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2026 pada 04.24
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_findit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `lokasi` varchar(150) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `lokasi`, `tanggal`, `deskripsi`, `status`) VALUES
(1, 'Tas Biru', 'Taman Kampus', '2026-11-09', 'Hilang di sekitar air mancur di taman kampus sampai gedung FKIP', 'Hilang'),
(2, 'Dompet Hitam', 'Gedung FKIP', '2026-12-11', 'Ciri cirinya berwarna hitam, tidak terlalu besar da itu dompet cowo', 'Hilang'),
(3, 'STNK', 'Gedung Cakra', '2026-10-11', 'STNK dengan nopol M 1234 NM honda Stylo CBS', 'Ditemukan'),
(4, 'Botol Minum', 'Lab Eksak', '2026-11-04', 'Botol minum 1L Warna hitam', 'Sudah Diambil'),
(5, 'Flashdisk Sandisk', 'Lab Sosial', '2026-11-03', 'Flashdisk warna hitam 32 GB', 'Sudah Diambil'),
(6, 'Payung Lipat', 'Gedung FKIP', '2026-11-01', 'Payung lipat warna hitam dengan pegangan kecil', 'Hilang'),
(7, 'Charger Laptop', 'Laboratorium Komputer', '2026-11-02', 'Charger laptop warna hitam dengan kabel putih', 'Ditemukan'),
(8, 'Buku Catatan', 'Perpustakaan', '2026-11-03', 'Buku catatan bersampul cokelat', 'Hilang'),
(9, 'Jaket Abu-Abu', 'Ruang Kelas 2A', '2026-11-04', 'Jaket hoodie warna abu-abu ukuran L', 'Ditemukan'),
(10, 'Kunci Motor', 'Parkiran FKIP', '2026-11-05', 'Satu buah kunci motor dengan gantungan kecil', 'Hilang'),
(11, 'Earphone Putih', 'Kantin Kampus', '2026-11-06', 'Earphone kabel berwarna putih', 'Ditemukan'),
(12, 'Tempat Pensil', 'Gedung Rektorat', '2026-11-07', 'Tempat pensil berbentuk kotak warna hitam', 'Hilang'),
(13, 'Kacamata', 'Mushola Kampus', '2026-11-08', 'Kacamata dengan bingkai berwarna cokelat', 'Ditemukan'),
(14, 'Jam Tangan', 'Aula Kampus', '2026-11-09', 'Jam tangan analog dengan tali berwarna hitam', 'Sudah Diambil'),
(15, 'Helm Hitam', 'Parkiran Perpustakaan', '2026-11-10', 'Helm berwarna hitam dengan kaca bening', 'Hilang');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
