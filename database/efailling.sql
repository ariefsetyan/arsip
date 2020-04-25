-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Apr 2020 pada 07.45
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efailling`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anak_persoalans`
--

CREATE TABLE `anak_persoalans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_ap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anak_persoalan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anak_persoalans`
--

INSERT INTO `anak_persoalans` (`id`, `kode_ap`, `anak_persoalan`, `created_at`, `updated_at`) VALUES
(3, '00', 'APBN', '2020-03-27 03:52:33', '2020-03-27 03:52:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip`
--

CREATE TABLE `arsip` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `arsip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `arsip`
--

INSERT INTO `arsip` (`id`, `arsip`) VALUES
(1, 'belum'),
(2, 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumens`
--

CREATE TABLE `dokumens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_md` bigint(20) UNSIGNED NOT NULL,
  `nama_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kurun_waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat_perkembangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_arsip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_statusd` bigint(20) UNSIGNED DEFAULT NULL,
  `id_arsip` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokumens`
--

INSERT INTO `dokumens` (`id`, `id_md`, `nama_dokumen`, `deskripsi`, `kurun_waktu`, `tingkat_perkembangan`, `media_arsip`, `kondisi`, `file`, `id_statusd`, `id_arsip`, `created_at`, `updated_at`) VALUES
(5, 1, 'arief setya', 'as', '2021-03-28', 'Asli', 'Kertas', 'Baik', '5e7ebb799a2d4.pdf', 1, 1, '2020-03-27 19:50:39', '2020-04-04 05:01:01'),
(6, 2, 'sonic', 'master', '2018-01-09', 'Asli', 'Asli', 'baik', '5e8860c011857.pdf', 2, 1, '2020-04-04 03:26:19', '2020-04-04 22:19:45'),
(7, 2, 'sonic', 'master', '2020-01-09', 'Asli', 'Asli', 'baik', '5e88613e7e664.pdf', 1, 1, '2020-04-04 03:28:22', '2020-04-04 05:01:01'),
(8, 2, 'sonic', 'master', '2000-01-09', 'Asli', 'Asli', 'baik', '5e886194a8783.pdf', 3, 2, '2020-04-04 03:29:51', '2020-04-05 04:22:40'),
(9, 3, 'setya arief', 'tulungagung', '2016-09-27', 'Asli', 'Kertas', 'baik', '5e886223d8507.pdf', 4, 1, '2020-04-04 03:32:08', '2020-04-04 22:19:45'),
(10, 2, 'covit', 'covit 19', '2020-04-06', 'Asli', 'Kertas', 'baik', '5e8a9d04df221.pdf', 1, 1, '2020-04-05 20:07:54', '2020-04-05 20:07:54'),
(11, 2, 'cordova', 'versi 7', '2020-04-06', 'Asli', 'Kertas', 'baik', '5e8aa38966997.pdf', 1, 1, '2020-04-05 20:35:42', '2020-04-05 20:35:42'),
(12, 2, 'cordova', 'versi 7', '2020-04-06', 'Asli', 'Kertas', 'baik', '5e8aa3bb11e77.pdf', 1, 1, '2020-04-05 20:36:32', '2020-04-05 20:36:32'),
(13, 2, 'cordova', 'versi 7', '2020-04-06', 'Asli', 'Kertas', 'baik', '5e8aa53faf36d.pdf', 1, 1, '2020-04-05 20:43:01', '2020-04-05 20:43:01'),
(14, 2, 'cordova', 'versi 7', '2020-04-06', 'Asli', 'Kertas', 'baik', '5e8aa55e42f1a.pdf', 1, 1, '2020-04-05 20:43:31', '2020-04-05 20:43:31'),
(15, 2, 'cordova', 'versi 7', '2020-04-06', 'Asli', 'Kertas', 'baik', '5e8aa67df1908.pdf', 1, 1, '2020-04-05 20:48:19', '2020-04-05 20:48:19'),
(16, 2, 'cordova', 'versi 7', '2020-04-06', 'Asli', 'Kertas', 'baik', '5e8aa742ebc4b.pdf', 1, 1, '2020-04-05 20:51:36', '2020-04-05 20:51:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jras`
--

CREATE TABLE `jras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_jra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inaktif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifat_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jras`
--

INSERT INTO `jras` (`id`, `jenis_jra`, `aktif`, `inaktif`, `sifat_dokumen`, `created_at`, `updated_at`) VALUES
(2, 'arief setya', '1', '1', 'Permanen', '2020-03-27 05:19:36', '2020-03-27 05:19:36'),
(3, 'Cover Lampu Depandadad', '1', '1', 'Musnah', '2020-04-04 03:23:41', '2020-04-04 03:23:41'),
(4, 'aset', '1', '1', 'Ditinjau Ulang', '2020-04-04 03:23:58', '2020-04-04 03:23:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `j_lokasis`
--

CREATE TABLE `j_lokasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_lokasi` bigint(20) UNSIGNED NOT NULL,
  `id_pp` bigint(20) UNSIGNED NOT NULL,
  `id_ap` bigint(20) UNSIGNED NOT NULL,
  `id_p` bigint(20) UNSIGNED NOT NULL,
  `id_jra` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `j_lokasis`
--

INSERT INTO `j_lokasis` (`id`, `id_lokasi`, `id_pp`, `id_ap`, `id_p`, `id_jra`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 3, 2, 2, '2020-03-27 07:35:59', '2020-03-27 07:35:59'),
(2, 2, 2, 3, 2, 3, '2020-04-04 03:24:42', '2020-04-04 03:24:42'),
(3, 2, 2, 3, 2, 4, '2020-04-04 03:24:55', '2020-04-04 03:24:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasis`
--

CREATE TABLE `lokasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gedung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baris` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lokasis`
--

INSERT INTO `lokasis` (`id`, `gedung`, `rak`, `baris`, `bok`, `folder`, `created_at`, `updated_at`) VALUES
(2, '1R', '1A', '1C', '1', '1', '2020-03-25 20:57:39', '2020-03-27 02:27:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2020_03_26_033832_create_lokasis_table', 2),
(5, '2020_03_27_093227_create_pokok_persoalans_table', 3),
(6, '2020_03_27_102303_create_anak_persoalans_table', 4),
(7, '2020_03_27_105701_create_perihals_table', 5),
(8, '2020_03_27_114300_create_jras_table', 6),
(9, '2020_03_27_141140_create_j_lokasis_table', 7),
(10, '2020_03_28_011943_create_dokumens_table', 8),
(11, '2020_03_29_053112_create_peminjamen_table', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjamen`
--

CREATE TABLE `peminjamen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_dokumen` bigint(20) UNSIGNED NOT NULL,
  `diskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_status` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peminjamen`
--

INSERT INTO `peminjamen` (`id`, `id_user`, `id_dokumen`, `diskripsi`, `tgl_pinjam`, `tgl_kembali`, `id_status`, `created_at`, `updated_at`) VALUES
(1, 3, 5, 'asas', '2020-04-01', '2020-04-02', 2, NULL, '2020-04-04 00:13:55'),
(2, 3, 5, 'coba', '2020-04-02', '2020-04-03', 2, NULL, '2020-04-01 23:59:24'),
(3, 3, 5, 'coba', '2020-04-02', '2020-04-03', 2, NULL, '2020-04-04 00:13:55'),
(4, 3, 5, 'tes', '2020-04-02', '2020-04-02', 2, NULL, '2020-04-04 00:13:55'),
(5, 3, 5, 'asd', '2020-04-02', '2020-04-04', 2, NULL, '2020-04-04 00:13:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perihals`
--

CREATE TABLE `perihals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_p` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perihals`
--

INSERT INTO `perihals` (`id`, `kode_p`, `perihal`, `created_at`, `updated_at`) VALUES
(2, '00', 'forasu', '2020-03-27 04:42:21', '2020-03-27 04:42:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pokok_persoalans`
--

CREATE TABLE `pokok_persoalans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pokok_persoalan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pokok_persoalans`
--

INSERT INTO `pokok_persoalans` (`id`, `kode_pp`, `pokok_persoalan`, `created_at`, `updated_at`) VALUES
(2, 'PR', 'Perencanaan', '2020-03-27 04:41:46', '2020-03-27 04:41:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_dokumen`
--

CREATE TABLE `status_dokumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_dokumen`
--

INSERT INTO `status_dokumen` (`id`, `status`) VALUES
(1, 'aktif'),
(2, 'inaktif'),
(3, 'musnah'),
(4, 'tinjau ulang'),
(5, 'permanen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_peminjaman`
--

CREATE TABLE `status_peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_peminjaman`
--

INSERT INTO `status_peminjaman` (`id`, `status`) VALUES
(1, 'pinjam'),
(2, 'kembali'),
(3, 'pengajuan'),
(4, 'tolak'),
(5, 'terima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` int(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jkl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nip`, `name`, `email`, `email_verified_at`, `password`, `telp`, `alamat`, `jkl`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'admin@gmail.com', NULL, '$2y$10$x.2x.3Rizg0o5dIOrie1zuJcHOnjjQq1UJtGwCGFLOTv8KWwiRIaS', NULL, NULL, NULL, 1, NULL, '2020-03-24 06:53:22', '2020-03-24 06:53:22'),
(2, NULL, 'User', 'user@itsolutionstuff.com', NULL, '$2y$10$JPhzHvy0RdebpxBRzfawGOZf.TFyGV9Ys00Qg/3Mru.iKf76pEZOm', NULL, NULL, NULL, 0, NULL, '2020-03-24 06:53:22', '2020-03-24 06:53:22'),
(3, 321, 'arief setyaugraha', 'user@gmail.com', NULL, '$2y$10$uXek8IiBVIZRX1vtssM7KeG1.2MSEYXu0X.D9ImAwj5Z/GfeGxZje', '6289679189576', 'ta', 'pria', 0, NULL, '2020-04-01 05:55:39', '2020-04-01 05:55:39');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anak_persoalans`
--
ALTER TABLE `anak_persoalans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `arsip`
--
ALTER TABLE `arsip`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokumens`
--
ALTER TABLE `dokumens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_statusd` (`id_statusd`),
  ADD KEY `dokumens_id_md_foreign` (`id_md`),
  ADD KEY `id_arsip` (`id_arsip`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jras`
--
ALTER TABLE `jras`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `j_lokasis`
--
ALTER TABLE `j_lokasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `j_lokasis_id_lokasi_foreign` (`id_lokasi`),
  ADD KEY `j_lokasis_id_pp_foreign` (`id_pp`),
  ADD KEY `j_lokasis_id_ap_foreign` (`id_ap`),
  ADD KEY `j_lokasis_id_p_foreign` (`id_p`),
  ADD KEY `j_lokasis_id_jra_foreign` (`id_jra`);

--
-- Indeks untuk tabel `lokasis`
--
ALTER TABLE `lokasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjamen_id_user_foreign` (`id_user`),
  ADD KEY `peminjamen_id_dokumen_foreign` (`id_dokumen`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `perihals`
--
ALTER TABLE `perihals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pokok_persoalans`
--
ALTER TABLE `pokok_persoalans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_dokumen`
--
ALTER TABLE `status_dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_peminjaman`
--
ALTER TABLE `status_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anak_persoalans`
--
ALTER TABLE `anak_persoalans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `arsip`
--
ALTER TABLE `arsip`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dokumens`
--
ALTER TABLE `dokumens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jras`
--
ALTER TABLE `jras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `j_lokasis`
--
ALTER TABLE `j_lokasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lokasis`
--
ALTER TABLE `lokasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `peminjamen`
--
ALTER TABLE `peminjamen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `perihals`
--
ALTER TABLE `perihals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pokok_persoalans`
--
ALTER TABLE `pokok_persoalans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_dokumen`
--
ALTER TABLE `status_dokumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `status_peminjaman`
--
ALTER TABLE `status_peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dokumens`
--
ALTER TABLE `dokumens`
  ADD CONSTRAINT `dokumens_ibfk_1` FOREIGN KEY (`id_statusd`) REFERENCES `status_dokumen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dokumens_ibfk_2` FOREIGN KEY (`id_arsip`) REFERENCES `arsip` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dokumens_id_md_foreign` FOREIGN KEY (`id_md`) REFERENCES `j_lokasis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `j_lokasis`
--
ALTER TABLE `j_lokasis`
  ADD CONSTRAINT `j_lokasis_id_ap_foreign` FOREIGN KEY (`id_ap`) REFERENCES `anak_persoalans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `j_lokasis_id_jra_foreign` FOREIGN KEY (`id_jra`) REFERENCES `jras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `j_lokasis_id_lokasi_foreign` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `j_lokasis_id_p_foreign` FOREIGN KEY (`id_p`) REFERENCES `perihals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `j_lokasis_id_pp_foreign` FOREIGN KEY (`id_pp`) REFERENCES `pokok_persoalans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjamen`
--
ALTER TABLE `peminjamen`
  ADD CONSTRAINT `peminjamen_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status_peminjaman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjamen_id_dokumen_foreign` FOREIGN KEY (`id_dokumen`) REFERENCES `dokumens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjamen_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
