-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Agu 2018 pada 00.29
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kesmas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akademik`
--

CREATE TABLE `akademik` (
  `id_akademik` int(10) NOT NULL,
  `id_kat_akademik` int(5) NOT NULL,
  `nm_akademik` varchar(100) DEFAULT NULL,
  `isi_akademik` text,
  `tgl_posting` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `hari` varchar(7) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `file_dokumen` varchar(100) DEFAULT NULL,
  `username` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id_aktivitas` int(10) NOT NULL,
  `id_kat_aktivitas` int(5) NOT NULL,
  `nm_aktivitas` varchar(100) DEFAULT NULL,
  `isi_aktivitas` text,
  `gambar` varchar(100) DEFAULT NULL,
  `tgl_posting` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `hari` varchar(7) DEFAULT NULL,
  `username` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `id_album` int(5) NOT NULL,
  `nm_album` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gbr_album` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(10) NOT NULL,
  `id_kat_berita` int(5) NOT NULL,
  `username` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_berita` text COLLATE latin1_general_ci NOT NULL,
  `hari` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `dibaca` int(5) NOT NULL DEFAULT '1',
  `tag` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `download`
--

CREATE TABLE `download` (
  `id_download` int(10) NOT NULL,
  `nm_download` varchar(100) NOT NULL,
  `file_download` varchar(100) DEFAULT NULL,
  `tgl_posting` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `hari` varchar(7) DEFAULT NULL,
  `hits` int(5) DEFAULT NULL,
  `username` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(5) NOT NULL,
  `id_album` int(5) NOT NULL,
  `nm_galeri` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `ket` text COLLATE latin1_general_ci NOT NULL,
  `gbr_galeri` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungi`
--

CREATE TABLE `hubungi` (
  `id_hubungi` int(5) NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kat_akademik`
--

CREATE TABLE `kat_akademik` (
  `id_kat_akademik` int(5) NOT NULL,
  `nm_kat_akademik` varchar(100) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kat_aktivitas`
--

CREATE TABLE `kat_aktivitas` (
  `id_kat_aktivitas` int(5) NOT NULL,
  `nm_kat_aktivitas` varchar(100) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kat_berita`
--

CREATE TABLE `kat_berita` (
  `id_kat_berita` int(5) NOT NULL,
  `nm_kat_berita` varchar(50) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kat_pengumuman`
--

CREATE TABLE `kat_pengumuman` (
  `id_kat_pengumuman` int(5) NOT NULL,
  `nm_kat_pengumuman` varchar(100) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kat_pengumuman`
--

INSERT INTO `kat_pengumuman` (`id_kat_pengumuman`, `nm_kat_pengumuman`, `aktif`) VALUES
(1, 'KATEGORI 1', 'Y'),
(2, 'KATEGORI 23', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kat_sarana_umum`
--

CREATE TABLE `kat_sarana_umum` (
  `id_kat_sarana` int(5) NOT NULL,
  `nm_kat_sarana` varchar(100) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(5) NOT NULL,
  `id_berita` int(10) NOT NULL,
  `nama_komentar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `isi_komentar` text COLLATE latin1_general_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `link_terkait`
--

CREATE TABLE `link_terkait` (
  `id_link` int(5) NOT NULL,
  `nm_link` varchar(100) DEFAULT NULL,
  `url_link` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `hits` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(10) NOT NULL,
  `id_kat_pengumuman` int(5) NOT NULL,
  `nm_pengumuman` varchar(100) DEFAULT NULL,
  `isi_pengumuman` text,
  `gambar` varchar(100) DEFAULT NULL,
  `file_pengumuman` varchar(100) DEFAULT NULL,
  `tgl_posting` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `hari` varchar(7) DEFAULT NULL,
  `username` varchar(35) DEFAULT NULL,
  `hits` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(5) NOT NULL,
  `nm_profil` varchar(100) DEFAULT NULL,
  `isi_profil` text,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sarana_umum`
--

CREATE TABLE `sarana_umum` (
  `id_sarana` int(10) NOT NULL,
  `id_kat_sarana` int(5) NOT NULL,
  `nm_sarana` varchar(100) DEFAULT NULL,
  `isi_sarana` text,
  `gambar` varchar(100) DEFAULT NULL,
  `tgl_posting` date DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `hari` varchar(7) DEFAULT NULL,
  `username` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(5) NOT NULL,
  `nama_tag` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `count` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(5) NOT NULL,
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `nm_lengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tlp` varchar(15) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `level` enum('ADMIN','USER') DEFAULT 'USER',
  `blokir` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `nm_lengkap`, `email`, `tlp`, `avatar`, `level`, `blokir`) VALUES
(1, 'admin', 'admin', 'Administrator', 'admin@gmail.com', '081343890452', NULL, 'ADMIN', 'N');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akademik`
--
ALTER TABLE `akademik`
  ADD PRIMARY KEY (`id_akademik`);

--
-- Indeks untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id_download`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indeks untuk tabel `kat_akademik`
--
ALTER TABLE `kat_akademik`
  ADD PRIMARY KEY (`id_kat_akademik`);

--
-- Indeks untuk tabel `kat_aktivitas`
--
ALTER TABLE `kat_aktivitas`
  ADD PRIMARY KEY (`id_kat_aktivitas`);

--
-- Indeks untuk tabel `kat_berita`
--
ALTER TABLE `kat_berita`
  ADD PRIMARY KEY (`id_kat_berita`);

--
-- Indeks untuk tabel `kat_pengumuman`
--
ALTER TABLE `kat_pengumuman`
  ADD PRIMARY KEY (`id_kat_pengumuman`);

--
-- Indeks untuk tabel `kat_sarana_umum`
--
ALTER TABLE `kat_sarana_umum`
  ADD PRIMARY KEY (`id_kat_sarana`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `link_terkait`
--
ALTER TABLE `link_terkait`
  ADD PRIMARY KEY (`id_link`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `sarana_umum`
--
ALTER TABLE `sarana_umum`
  ADD PRIMARY KEY (`id_sarana`);

--
-- Indeks untuk tabel `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akademik`
--
ALTER TABLE `akademik`
  MODIFY `id_akademik` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id_aktivitas` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `download`
--
ALTER TABLE `download`
  MODIFY `id_download` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `hubungi`
--
ALTER TABLE `hubungi`
  MODIFY `id_hubungi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kat_akademik`
--
ALTER TABLE `kat_akademik`
  MODIFY `id_kat_akademik` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kat_aktivitas`
--
ALTER TABLE `kat_aktivitas`
  MODIFY `id_kat_aktivitas` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kat_berita`
--
ALTER TABLE `kat_berita`
  MODIFY `id_kat_berita` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kat_pengumuman`
--
ALTER TABLE `kat_pengumuman`
  MODIFY `id_kat_pengumuman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kat_sarana_umum`
--
ALTER TABLE `kat_sarana_umum`
  MODIFY `id_kat_sarana` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `link_terkait`
--
ALTER TABLE `link_terkait`
  MODIFY `id_link` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sarana_umum`
--
ALTER TABLE `sarana_umum`
  MODIFY `id_sarana` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
