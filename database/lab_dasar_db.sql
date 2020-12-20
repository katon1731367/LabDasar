-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2020 pada 11.50
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab_dasar_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_hilang`
--

CREATE TABLE `barang_hilang` (
  `id_barang_hilang` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `tanggal_ditemukan` date NOT NULL,
  `ditemukan_oleh` varchar(128) NOT NULL,
  `no_pc` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_hilang`
--

INSERT INTO `barang_hilang` (`id_barang_hilang`, `nama_barang`, `tanggal_ditemukan`, `ditemukan_oleh`, `no_pc`) VALUES
(3, 'flashdisk kingstone', '2020-12-10', 'katon suwida', '1'),
(4, 'binder merah', '2020-12-10', 'katon suwida', '30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` varchar(4) NOT NULL,
  `nama_dosen` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `email`, `no_hp`) VALUES
('1253', 'Rakhmadi Irfansyah Putra, S.Kom., MMSI', '', ''),
('1331', 'Hendra Jatnika, S.Kom., M.Kom', '', ''),
('5404', 'Widya Nita Suliyanti, S.T., MCompSc', '', ''),
('5442', 'Endang Sunandar, Ir., M.Kom', '', ''),
('5557', 'Andy Dahroni, S.Kom., M.Kom', '', ''),
('5559', 'Eka Putra, S.Kom., M.Kom', '', ''),
('5560', 'Satrio Yudho, S.Kom., M.Kom', '', ''),
('5614', 'Rachmat Destriana, S.Kom., M.Kom', '', ''),
('5620', 'Tuti Elfita, Ir., M.Si', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_upload`
--

CREATE TABLE `file_upload` (
  `id_file_tugas` int(11) NOT NULL,
  `nama_file` varchar(128) NOT NULL,
  `jenis_tugas` varchar(128) NOT NULL,
  `id_perkuliahan` varchar(9) NOT NULL,
  `nim` varchar(9) NOT NULL,
  `urutan` text NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file_upload`
--

INSERT INTO `file_upload` (`id_file_tugas`, `nama_file`, `jenis_tugas`, `id_perkuliahan`, `nim`, `urutan`, `nilai`) VALUES
(62, '201731367_B01061253_quiz_.pdf', 'quiz', 'B01061253', '201731367', '', 0),
(63, '201731367_B01061253_quiz_2.pdf', 'quiz', 'B01061253', '201731367', '2', 0),
(64, '201731367_B01061253_quiz_1.pdf', 'quiz', 'B01061253', '201731367', '1', 90),
(65, '201731367_B01061253_quiz_13.pdf', 'quiz', 'B01061253', '201731367', '13', 0),
(66, '201731367_B01061253_test_1.pdf', 'test', 'B01061253', '201731367', '1', 30),
(67, '201731367_C01101253_quiz_9.pdf', 'quiz', 'C01101253', '201731367', '9', 0),
(68, '201731367_B01061253_quiz_6.PNG', 'quiz', 'B01061253', '201731367', '6', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_lab`
--

CREATE TABLE `info_lab` (
  `id_info` int(4) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info_lab`
--

INSERT INTO `info_lab` (`id_info`, `keterangan`) VALUES
(0, 'Kelas pengganti Bahasa rakitan, hari senin jam 10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `index_kelas` varchar(1) NOT NULL,
  `id_perkuliahan` varchar(9) NOT NULL,
  `id_matkul` varchar(9) NOT NULL,
  `id_dosen` varchar(4) NOT NULL,
  `hari` varchar(128) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `jumlah_mahasiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`index_kelas`, `id_perkuliahan`, `id_matkul`, `id_dosen`, `hari`, `jam_mulai`, `jam_akhir`, `jumlah_mahasiswa`) VALUES
('B', 'B01061253', 'C31040106', '1253', 'Rabu', '10:00:00', '15:00:00', 0),
('C', 'C01101253', 'C31040110', '1253', 'Kamis', '10:00:00', '11:40:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontrak_pc`
--

CREATE TABLE `kontrak_pc` (
  `no_pc` varchar(2) NOT NULL,
  `id_perkuliahan` varchar(9) NOT NULL,
  `nim` varchar(9) NOT NULL,
  `time_stamp` date NOT NULL DEFAULT current_timestamp(),
  `id_kontrak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontrak_pc`
--

INSERT INTO `kontrak_pc` (`no_pc`, `id_perkuliahan`, `nim`, `time_stamp`, `id_kontrak`) VALUES
('1', 'B01061253', '201731380', '2020-11-25', 127),
('2', 'B01061253', 'Tersedia', '2020-11-25', 128),
('3', 'B01061253', 'Tersedia', '2020-11-25', 129),
('4', 'B01061253', 'Tersedia', '2020-11-25', 130),
('5', 'B01061253', 'Tersedia', '2020-11-25', 131),
('6', 'B01061253', 'Tersedia', '2020-11-25', 132),
('7', 'B01061253', 'Tersedia', '2020-11-25', 133),
('8', 'B01061253', 'Tersedia', '2020-11-25', 134),
('9', 'B01061253', '201731321', '2020-11-25', 135),
('10', 'B01061253', '201731367', '2020-11-25', 136),
('11', 'B01061253', 'Tersedia', '2020-11-25', 137),
('12', 'B01061253', 'Tersedia', '2020-11-25', 138),
('13', 'B01061253', 'Tersedia', '2020-11-25', 139),
('14', 'B01061253', 'Tersedia', '2020-11-25', 140),
('15', 'B01061253', '201731381', '2020-11-25', 141),
('16', 'B01061253', 'Tersedia', '2020-11-25', 142),
('17', 'B01061253', 'Tersedia', '2020-11-25', 143),
('18', 'B01061253', 'Tersedia', '2020-11-25', 144),
('19', 'B01061253', 'Tersedia', '2020-11-25', 145),
('20', 'B01061253', 'Tersedia', '2020-11-25', 146),
('21', 'B01061253', 'Tersedia', '2020-11-25', 147),
('22', 'B01061253', 'Tersedia', '2020-11-25', 148),
('23', 'B01061253', 'Tersedia', '2020-11-25', 149),
('24', 'B01061253', 'Tersedia', '2020-11-25', 150),
('25', 'B01061253', 'Tersedia', '2020-11-25', 151),
('26', 'B01061253', 'Tersedia', '2020-11-25', 152),
('27', 'B01061253', 'Tersedia', '2020-11-25', 153),
('28', 'B01061253', 'Tersedia', '2020-11-25', 154),
('29', 'B01061253', 'Tersedia', '2020-11-25', 155),
('30', 'B01061253', 'Tersedia', '2020-11-25', 156),
('31', 'B01061253', 'Tersedia', '2020-11-25', 157),
('32', 'B01061253', 'Tersedia', '2020-11-25', 158),
('33', 'B01061253', 'Tersedia', '2020-11-25', 159),
('34', 'B01061253', 'Tersedia', '2020-11-25', 160),
('35', 'B01061253', 'Tersedia', '2020-11-25', 161),
('36', 'B01061253', 'Tersedia', '2020-11-25', 162),
('37', 'B01061253', 'Tersedia', '2020-11-25', 163),
('38', 'B01061253', 'Tersedia', '2020-11-25', 164),
('39', 'B01061253', 'Tersedia', '2020-11-25', 165),
('40', 'B01061253', 'Tersedia', '2020-11-25', 166),
('41', 'B01061253', 'Tersedia', '2020-11-25', 167),
('42', 'B01061253', 'Tersedia', '2020-11-25', 168),
('1', 'C01101253', 'Tersedia', '2020-11-25', 169),
('2', 'C01101253', 'Tersedia', '2020-11-25', 170),
('3', 'C01101253', 'Tersedia', '2020-11-25', 171),
('4', 'C01101253', 'Tersedia', '2020-11-25', 172),
('5', 'C01101253', 'Tersedia', '2020-11-25', 173),
('6', 'C01101253', 'Tersedia', '2020-11-25', 174),
('7', 'C01101253', 'Tersedia', '2020-11-25', 175),
('8', 'C01101253', 'Tersedia', '2020-11-25', 176),
('9', 'C01101253', 'Tersedia', '2020-11-25', 177),
('10', 'C01101253', '201731367', '2020-11-25', 178),
('11', 'C01101253', 'Tersedia', '2020-11-25', 179),
('12', 'C01101253', 'Tersedia', '2020-11-25', 180),
('13', 'C01101253', 'Tersedia', '2020-11-25', 181),
('14', 'C01101253', 'Tersedia', '2020-11-25', 182),
('15', 'C01101253', 'Tersedia', '2020-11-25', 183),
('16', 'C01101253', 'Tersedia', '2020-11-25', 184),
('17', 'C01101253', 'Tersedia', '2020-11-25', 185),
('18', 'C01101253', 'Tersedia', '2020-11-25', 186),
('19', 'C01101253', 'Tersedia', '2020-11-25', 187),
('20', 'C01101253', 'Tersedia', '2020-11-25', 188),
('21', 'C01101253', 'Tersedia', '2020-11-25', 189),
('22', 'C01101253', 'Tersedia', '2020-11-25', 190),
('23', 'C01101253', 'Tersedia', '2020-11-25', 191),
('24', 'C01101253', 'Tersedia', '2020-11-25', 192),
('25', 'C01101253', 'Tersedia', '2020-11-25', 193),
('26', 'C01101253', 'Tersedia', '2020-11-25', 194),
('27', 'C01101253', 'Tersedia', '2020-11-25', 195),
('28', 'C01101253', 'Tersedia', '2020-11-25', 196),
('29', 'C01101253', 'Tersedia', '2020-11-25', 197),
('30', 'C01101253', 'Tersedia', '2020-11-25', 198),
('31', 'C01101253', 'Tersedia', '2020-11-25', 199),
('32', 'C01101253', 'Tersedia', '2020-11-25', 200),
('33', 'C01101253', 'Tersedia', '2020-11-25', 201),
('34', 'C01101253', 'Tersedia', '2020-11-25', 202),
('35', 'C01101253', 'Tersedia', '2020-11-25', 203),
('36', 'C01101253', 'Tersedia', '2020-11-25', 204),
('37', 'C01101253', 'Tersedia', '2020-11-25', 205),
('38', 'C01101253', 'Tersedia', '2020-11-25', 206),
('39', 'C01101253', 'Tersedia', '2020-11-25', 207),
('40', 'C01101253', 'Tersedia', '2020-11-25', 208),
('41', 'C01101253', 'Tersedia', '2020-11-25', 209),
('42', 'C01101253', 'Tersedia', '2020-11-25', 210);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_matkul` varchar(9) NOT NULL,
  `nama_matkul` varchar(128) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id_matkul`, `nama_matkul`, `sks`) VALUES
('C31040106', 'Algoritma & Pemrograman 2 + Praktek', 3),
('C31040109', 'hahaha', 2),
('C31040110', 'Statistika + Praktek', 3),
('C31040202', 'Bahasa Rakitan', 2),
('C31040206', 'Pemrograman Objek', 2),
('C31040210', 'Mikroprosessor + Praktek', 3),
('C31040304', 'Perancangan Basis Data', 2),
('C31040306', 'Simulasi Dan Pemodelan', 2),
('C31040311', 'Sistem Basis Data + Praktek', 3),
('C31040314', 'Multimedia', 2),
('C31040315', 'Simulasi Dan Pemodelan', 2),
('C31040407', 'Algoritma & Pemrograman 1 + Praktek', 3),
('C31041304', 'Design Grafis', 2),
('C31041403', 'Rekayasa Pengembangan WEB', 2),
('C31041407', 'Web Design', 2),
('C31041409', 'Mobile Programming', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `nama_materi` varchar(128) NOT NULL,
  `id_perkuliahan` varchar(9) NOT NULL,
  `kelas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `nama_materi`, `id_perkuliahan`, `kelas`) VALUES
(60, 'Soal_UAS_B01061253.pdf', 'B01061253', 'Algoritma &amp; Pemrograman 2 + Praktek_B'),
(61, 'Soal_UAS-1_B01061253.pdf', 'B01061253', 'Algoritma &amp; Pemrograman 2 + Praktek_B'),
(62, 'sad_B01061253.pdf', 'B01061253', 'Algoritma &amp; Pemrograman 2 + Praktek_B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_laporan`
--

CREATE TABLE `nilai_laporan` (
  `id_laporan` int(11) NOT NULL,
  `nim` varchar(9) NOT NULL,
  `urutan_laporan` int(11) NOT NULL,
  `id_perkuliahan` varchar(9) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai_laporan`
--

INSERT INTO `nilai_laporan` (`id_laporan`, `nim`, `urutan_laporan`, `id_perkuliahan`, `nilai`) VALUES
(110, '201731380', 1, 'B01061253', 30),
(111, '201731321', 1, 'B01061253', 20),
(112, '201731367', 1, 'B01061253', 30),
(113, '201731381', 1, 'B01061253', 10),
(114, '201731367', 1, 'C01101253', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nim` varchar(9) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `phone_number` varchar(128) DEFAULT NULL,
  `pass_recover` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nim`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `phone_number`, `pass_recover`) VALUES
('201731001', 'Syafiq Althof Rauf', 'syafiq31001@gmail.com', 'default.svg', '$2y$10$530NQcNdq4qehKKmI7kKkOPbSS6SwbLt73cLgO6BI.0kmaHl3PiWm', 1, 1, 1588353892, '08116061411', 0),
('201731321', 'Apep', 'apep@gmail.com', 'default.svg', '$2y$10$e5UVelNdRO8W8jJcb7K8ZeL4NMPDF2wQqKJXvCNXR58Zdat3aySEi', 2, 1, 1607509050, '08116061410', 0),
('201731333', 'indomie goreng', 'katon1731333@gmail.com', 'default.svg', '$2y$10$hdPCzbKAfsJb3bFFrCO0NOQz2p4m4J4AvE.OBOZwbFFC7UC8IYq2u', 2, 1, 1594840996, '08116061410', 0),
('201731367', 'katon suwida', 'katon1731367@gmail.com', 'default.svg', '$2y$10$bbHY2et7eyq9./v/rz7DC.mvdhfs.NNKuRhQpnw.kDRx7P1xKA8my', 1, 1, 1594839535, '08116061410', 0),
('201731380', 'Dedek Wahyudi', 'dedek1731380@gmail.com', 'lm_l.PNG', '$2y$10$2ZCyn1k9qPZzwG.LkIFpj.KOhquT2nK2noAEP2vVUAEhlqip0Qhby', 2, 1, 1594839623, '08116061411', 0),
('201731381', 'Bayu Abdillah', 'bayu@gmail.com', 'default.svg', '$2y$10$vhsQIOQKMSRgo1aKKwmHQe1TKg0o3y2j5XZ7OhQq7SlgZzBSPp88q', 2, 1, 1607673272, '08116061411', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(6, 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Perkuliahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Home', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'Menu/Submenu', 'fas fa-fw fa-folder-open', 1),
(12, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(15, 7, 'Dosen', 'admin/dosen', 'fas fa-fw fa-male', 1),
(18, 4, 'Dosen', 'perkuliahan/dosen', 'fas fa-fw fa-male', 1),
(19, 4, 'Matakuliah', 'perkuliahan/matakuliah', 'fas fa-fw fa-book', 1),
(21, 4, 'Kelas', 'perkuliahan/kelas', 'fas fa-fw fa-graduation-cap', 1),
(22, 2, 'Upload Tugas', 'user/uploadTugas', 'fas fa-fw fa-upload', 1),
(23, 2, 'Kontrak PC', 'seat', 'fas fa-fw fa-address-book', 1),
(24, 4, 'Upload Materi', 'perkuliahan/uploadmateri', 'fas fa-fw fa-upload', 1),
(26, 4, 'Tugas', 'perkuliahan/tugas', 'fas fa-fw fa-book', 1),
(29, 4, 'Laporan', 'perkuliahan/laporan', 'fas fa-fw fa-book', 1),
(30, 2, 'Nilai', 'user/nilaiUser', 'fas fa-fw fa-book', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_hilang`
--
ALTER TABLE `barang_hilang`
  ADD PRIMARY KEY (`id_barang_hilang`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `file_upload`
--
ALTER TABLE `file_upload`
  ADD PRIMARY KEY (`id_file_tugas`);

--
-- Indeks untuk tabel `info_lab`
--
ALTER TABLE `info_lab`
  ADD PRIMARY KEY (`id_info`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_perkuliahan`),
  ADD KEY `id_matkul` (`id_matkul`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indeks untuk tabel `kontrak_pc`
--
ALTER TABLE `kontrak_pc`
  ADD PRIMARY KEY (`id_kontrak`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `id_perkuliahan` (`id_perkuliahan`);

--
-- Indeks untuk tabel `nilai_laporan`
--
ALTER TABLE `nilai_laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_perkuliahan` (`id_perkuliahan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_hilang`
--
ALTER TABLE `barang_hilang`
  MODIFY `id_barang_hilang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `file_upload`
--
ALTER TABLE `file_upload`
  MODIFY `id_file_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `kontrak_pc`
--
ALTER TABLE `kontrak_pc`
  MODIFY `id_kontrak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `nilai_laporan`
--
ALTER TABLE `nilai_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_matkul`) REFERENCES `matakuliah` (`id_matkul`),
  ADD CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`);

--
-- Ketidakleluasaan untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_perkuliahan`) REFERENCES `kelas` (`id_perkuliahan`);

--
-- Ketidakleluasaan untuk tabel `nilai_laporan`
--
ALTER TABLE `nilai_laporan`
  ADD CONSTRAINT `nilai_laporan_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `user` (`nim`),
  ADD CONSTRAINT `nilai_laporan_ibfk_2` FOREIGN KEY (`id_perkuliahan`) REFERENCES `kelas` (`id_perkuliahan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
