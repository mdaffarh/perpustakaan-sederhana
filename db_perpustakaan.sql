-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2022 pada 14.54
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nomor_anggota` int(11) NOT NULL,
  `nomor_identitas` varchar(16) NOT NULL,
  `jenis_identitas` varchar(50) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `angka` int(11) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `tanggal_pendaftaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`nomor_anggota`, `nomor_identitas`, `jenis_identitas`, `nama_lengkap`, `tanggal_lahir`, `kelas`, `jurusan`, `angka`, `alamat`, `nomor_telepon`, `tanggal_pendaftaran`) VALUES
(12, '2342342342342342', 'NIS', 'Daffa R', '2004-01-30', '11', 'RPL', 1, 'Depok', '089644708799', '2022-03-01'),
(13, '1323123123124412', 'NIK', 'Udin Udinus', '2003-12-03', '12', 'TKRO', 3, 'Bogor', '081212389789', '2022-03-01'),
(14, '3131298419264124', 'NIK', 'Ucok', '2005-03-06', '11', 'TKJ', 1, 'Cibinong', '0812312938123', '2022-02-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_buku`
--

CREATE TABLE `tb_buku` (
  `nomor_buku` int(11) NOT NULL,
  `bidang_pustaka` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `penulis` varchar(200) NOT NULL,
  `penerbit` varchar(200) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jumlah_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_buku`
--

INSERT INTO `tb_buku` (`nomor_buku`, `bidang_pustaka`, `judul`, `tipe`, `penulis`, `penerbit`, `tahun_terbit`, `tanggal_masuk`, `jumlah_buku`) VALUES
(1, 'Rekayasa Perangkat Lunak', 'Lancar Java Dan Javascript', 'Atlas', ' Jubilee Enterprise', 'Elex Media Komputindo', 2019, '2022-03-01', 4),
(5, 'Multimedia', '75++ Proyek Desain', 'Panduan', 'Mohammad Jeprie', 'Elex Media Komputindo', 2022, '2022-02-02', 5),
(6, 'Umum', 'Sasa yang Murah Hati', 'Cergam', 'Watiek Ideo', 'Gramedia Pustaka Utama', 2019, '2019-04-08', 5),
(7, 'Teknik Komputer Jaringan', 'Kamus ++ Jaringan Komputer', 'Panduan', 'Budi Sutedjo', 'Andi Publisher', 2021, '2022-03-01', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `nomor_peminjaman` int(11) NOT NULL,
  `nomor_anggota` int(11) NOT NULL,
  `nomor_buku` varchar(11) NOT NULL,
  `waktu_pinjam` date NOT NULL,
  `batas_waktu` date NOT NULL,
  `waktu_kembali` date NOT NULL,
  `denda` int(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`nomor_peminjaman`, `nomor_anggota`, `nomor_buku`, `waktu_pinjam`, `batas_waktu`, `waktu_kembali`, `denda`, `status`) VALUES
(19, 12, '1', '2022-03-04', '2022-03-10', '2022-03-18', 16000, 'Peminjaman Selesai'),
(20, 13, '1,5,6', '2022-03-04', '2022-03-11', '2022-03-12', 2000, 'Peminjaman Selesai'),
(25, 12, '1,5', '2022-03-04', '2022-03-11', '2022-03-11', 0, 'Peminjaman Selesai'),
(26, 12, '1', '2022-03-04', '2022-03-11', '2022-03-11', 0, 'Dalam Peminjaman');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nomor_anggota`);

--
-- Indeks untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`nomor_buku`);

--
-- Indeks untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`nomor_peminjaman`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `nomor_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `nomor_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `nomor_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
