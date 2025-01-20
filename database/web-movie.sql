-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jan 2025 pada 06.16
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-movie`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(7, 'Action', '2025-01-17 21:47:22', '2025-01-17 21:47:22'),
(8, 'Adventure', '2025-01-17 21:47:31', '2025-01-17 21:47:31'),
(9, 'Comedy', '2025-01-17 21:47:39', '2025-01-17 21:47:39'),
(10, 'Drama', '2025-01-17 21:47:46', '2025-01-17 21:47:46'),
(11, 'Horror', '2025-01-17 21:47:54', '2025-01-17 21:47:54'),
(12, 'Romance', '2025-01-17 21:48:02', '2025-01-17 21:48:02'),
(13, 'Sci-Fi', '2025-01-17 21:48:11', '2025-01-17 21:48:11'),
(14, 'Fantasy', '2025-01-17 21:48:22', '2025-01-17 21:48:22'),
(15, 'Crime', '2025-01-17 21:48:34', '2025-01-17 21:48:34'),
(16, 'Mystery', '2025-01-17 21:48:43', '2025-01-17 21:48:43'),
(17, 'Animation', '2025-01-17 21:48:52', '2025-01-17 21:48:52'),
(18, 'Harmonis', '2025-01-18 22:54:06', '2025-01-18 22:54:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_01_16_094538_create_roles_table', 1),
(6, '2025_01_16_095050_add_role_id_to_users_table', 2),
(7, '2025_01_16_095357_create_categories_table', 3),
(8, '2025_01_16_095536_create_movies_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `year` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_background` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `movies`
--

INSERT INTO `movies` (`id`, `user_id`, `category_id`, `title`, `description`, `year`, `director`, `image`, `image_background`, `created_at`, `updated_at`) VALUES
(9, 1, 7, 'The Dark Knight', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '2008', 'Sahara', 'images/movies/tztbyy6gk84GhWi1aiO5kKVa27LLbD3W4mjSXuj6.jpg', 'images/backgrounds/0HII99iHwanuQxnnHpWYUyIgZSwDdsNBpa4W098I.jpg', '2025-01-17 22:40:25', '2025-01-17 22:40:25'),
(10, 1, 7, 'The Avengers', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '2012', 'Bambang', 'images/movies/QkNgKBNEE9277M8qXy89dmq9h0z3QWD09srKvvFI.jpg', 'images/backgrounds/wLPJbKQqshvF6lnYfVcnsMUktT5T5BCwDf7zAVgh.jpg', '2025-01-17 22:43:03', '2025-01-17 22:43:03'),
(11, 1, 9, 'Home Alone', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '1990', 'Laseri', 'images/movies/OBLBjoWo3aW9jFi3SgRU2KyNd8Jkk796gEJIr1ix.jpg', 'images/backgrounds/ZkiIoXQkmX4s9pnOIpoyP0Xz5OGj5Izwqb31uvVf.jpg', '2025-01-17 22:46:15', '2025-01-17 22:46:15'),
(12, 1, 9, 'Shaun of the Dead', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '2003', 'Bambang', 'images/movies/L5z2DhVZYj1IyGSMKTVf5wiJ76bDfe1YQ2RhdEiS.jpg', 'images/backgrounds/m9VGQvaV5Z2cEOLJwpmLGLoqvmLWGH9Q8iulKGGe.jpg', '2025-01-17 22:48:42', '2025-01-17 22:48:42'),
(13, 1, 12, 'Titanic', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '1992', 'Raden', 'images/movies/arD69lzM1zwQSVZvSeBNhFFgJFwrYlP1xucr2HBc.jpg', 'images/backgrounds/l6xh8z1rgFI8j0sz5VpJLI581trwBXcOloy3PcrP.jpg', '2025-01-17 22:51:08', '2025-01-17 22:51:08'),
(14, 1, 10, 'The Pursuit of Happyness', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '2004', 'Suwarjo', 'images/movies/G7bGB5ddgTeS14r0GEMergf4g5KgPqiBn22qMYXL.jpg', 'images/backgrounds/xTAANd0cwqavPf270W8HskcMDL5LR5wcXtccFD5b.jpg', '2025-01-17 22:52:40', '2025-01-17 22:52:40'),
(15, 1, 8, 'The Lord of the Rings', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', '2011', 'Suryo', 'images/movies/o769l8aE4PzZn8uMpgS1114ISdt5lpnV550M6BSU.jpg', 'images/backgrounds/W8dQQnvnc6dWQ4VVTXBKPCG0bt4UR8ZP97JYpMQg.jpg', '2025-01-17 23:01:11', '2025-01-17 23:01:11'),
(16, 1, 7, 'Gladiator', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2001', 'Bambang', 'images/movies/LCG8eSC4q3A4IUnBF08dI3RQ24aj3xILibm1ZsPU.jpg', 'images/backgrounds/hoUBGBFgG3lTkyRmCRUkNJVkLdWBW2Vdcx2m2yIs.jpg', '2025-01-18 00:53:14', '2025-01-18 00:53:14'),
(17, 1, 7, 'Terminator 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '1993', 'Suud', 'images/movies/Jv9Xhn9jO8JRinIbmu2BVuqcU1dOasmhZylRpMde.jpg', 'images/backgrounds/9KRgwWIt2IrnCrLM7NIg8DCVJv43TD3m0vJpRTPR.jpg', '2025-01-18 00:54:42', '2025-01-18 00:54:42'),
(18, 1, 11, 'The Conjuring', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2013', 'Joyono', 'images/movies/lAsMe3iOBgaZnr4oJ7Bo3vHDqKDhDeXlazUZKQSn.jpg', 'images/backgrounds/FlyUUGFu5Dd7yoPhxvfoavhUthcrVptqyQg65B5c.jpg', '2025-01-18 00:56:20', '2025-01-18 00:56:20'),
(19, 1, 9, 'Agak Laen', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2023', 'Suwarmi', 'images/movies/q6hjsreh6SMr94BAsU1jCttX0Bv3HI20sWAVvvQZ.jpg', 'images/backgrounds/AC5cSY4wQ6a5jU5EM7PVqf0tAAaOZbC7GREmVGmL.jpg', '2025-01-18 22:03:21', '2025-01-18 22:03:21'),
(20, 1, 10, 'Habibi dan Ainun', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '2003', 'Davano', 'images/movies/nx820sNY4WYZnYY5AoeoXO8HmuRzFxqJ0t7ursct.jpg', 'images/backgrounds/JXpDanICdmR5oTzJBqtUBvrkMxa8pqIyhXDOc8w5.jpg', '2025-01-19 20:15:44', '2025-01-19 20:15:44'),
(21, 1, 10, 'Ayat-Ayat Cinta', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2018', 'Suhada', 'images/movies/2XweveIzCYvV0pgDzEt1IlU5mLU9W8maxpa5K8qG.jpg', 'images/backgrounds/ueKR5t9EbC18haIqh3eLAAYrjLGeHl0ejquWsDaS.jpg', '2025-01-19 20:23:11', '2025-01-19 20:23:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '$2y$10$GK/CZYz0ZHr4K9ePXSN4D.ikwy/mIMjKyN2gOBFX7vejQ7kM1zRAe', NULL, NULL, NULL),
(2, 2, 'davano', '$2y$10$pRvgs9HB9JhyuVeU0/yGuuX0KyrB.0r9Vf6NDtguHvJMP1W7QBPOy', NULL, '2025-01-16 06:46:11', '2025-01-16 06:46:11'),
(3, 2, 'kasira', '$2y$10$2OtHlLdkuG9Rsdd27rlbyexfCxYJh50fgySSJ858GyPY5es2EC/DK', NULL, '2025-01-16 06:51:19', '2025-01-16 06:51:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movies_user_id_foreign` (`user_id`),
  ADD KEY `movies_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `movies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
