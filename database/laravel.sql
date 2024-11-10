-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 10, 2024 at 02:10 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `rsvp_id` bigint UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_details`
--

CREATE TABLE `event_details` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_type_id` bigint UNSIGNED NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quota` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_details`
--

INSERT INTO `event_details` (`id`, `user_id`, `event_name`, `event_type_id`, `event_date`, `event_time`, `location`, `quota`, `created_at`, `updated_at`) VALUES
(1, 21, 'Resepsi', 1, '2024-12-28', '10:00:00', '<p>Tempat : Kediaman Wanita</p>                 <p>Dusun Kedungringin, RT/RW 003/002, Desa Temurejo, Kec. Bangorejo, Kab. Banyuwangi                 </p>', 500, '2024-11-09 21:05:41', '2024-11-09 21:05:41'),
(2, 21, 'Akad', 1, '2024-12-27', '08:00:00', '<p>Tempat : Masjid Baitussalam </p>                 <p>Dusun Kedungringin, RT/RW 003/002, Desa Temurejo, Kec. Bangorejo, Kab. Banyuwangi                 </p>', 200, '2024-11-09 21:06:51', '2024-11-09 21:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `event_owner_details`
--

CREATE TABLE `event_owner_details` (
  `id` bigint UNSIGNED NOT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parents_name` text COLLATE utf8mb4_unicode_ci,
  `owner_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_owner_details`
--

INSERT INTO `event_owner_details` (`id`, `owner_name`, `parents_name`, `owner_photo`, `social_media`, `gender_id`, `created_at`, `updated_at`) VALUES
(1, '<h2>Shinta Amalia Kusuma Wardhani</h2>', '<br>Bapak Ngimron Sholeh<br>& Ibu Sri Puji Astutik', 'owner_photos/rtzx8gqDg4HsDWlRDS24tw2GnZwqLBictMIYN40T.jpg', 'https://www.instagram.com/shintaamaliaw/?utm_source=ig_web_button_share_sheet', 1, '2024-11-10 06:22:08', '2024-11-10 06:22:08'),
(2, '<h2>Muhammad Irfan Hilman</h2>', '<br>Bapak Heri Sumekar<br>& Ibu Erlina Rokhmah', 'owner_photos/YxP60DYGRnT8EKmRwO9FLLwMp97yYAkw1KYqSVqq.jpg', 'https://www.instagram.com/irfan224h/?utm_source=ig_web_button_share_sheet', 2, '2024-11-10 06:25:54', '2024-11-10 06:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `event_reports`
--

CREATE TABLE `event_reports` (
  `id` bigint UNSIGNED NOT NULL,
  `event_type_id` bigint UNSIGNED NOT NULL,
  `month` tinyint NOT NULL,
  `year` year NOT NULL,
  `counter` bigint NOT NULL,
  `progress_total` smallint NOT NULL DEFAULT '0',
  `finish_total` smallint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_report_details`
--

CREATE TABLE `event_report_details` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `event_report_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_type_ref`
--

CREATE TABLE `event_type_ref` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_type_ref`
--

INSERT INTO `event_type_ref` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Pernikahan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gender_ref`
--

CREATE TABLE `gender_ref` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gender_ref`
--

INSERT INTO `gender_ref` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Perempuan', NULL, NULL),
(2, 'Laki-laki', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('Uang','Barang') COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`id`, `event_id`, `name`, `category`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, '<h2>Alamat</h2>', 'Barang', '<p>Jl. Merak Kencana II Blok J2 No. 5 RT 4/RW 14, Rawabuntu, Serpong, Kota Tangerang Selatan</p>', NULL, NULL),
(2, 1, '<h2>BCA</h2>', 'Uang', 'p>4972154591</p>\r\n                <p>A.n Shinta Amalia Kusuma Wardhani</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log_rsvp`
--

CREATE TABLE `log_rsvp` (
  `id` bigint UNSIGNED NOT NULL,
  `rsvp_id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmation` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_guest` int DEFAULT NULL,
  `action` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_16_032153_create_gender_ref_table', 1),
(5, '2024_10_16_034822_create_event_owner_details_table', 1),
(6, '2024_10_16_035301_create_event_type_ref_table', 1),
(7, '2024_10_16_040139_create_event_details_table', 1),
(8, '2024_10_16_040849_create_event_reports_table', 1),
(9, '2024_10_16_041455_create_event_report_details_table', 1),
(10, '2024_10_16_041644_create_timelines_table', 1),
(11, '2024_10_16_065945_create_rsvp_table', 1),
(12, '2024_10_16_070942_create_comments_table', 1),
(13, '2024_10_16_071402_create_gifts_table', 1),
(14, '2024_10_16_135623_create_section_ref_table', 1),
(15, '2024_10_16_135651_create_gallery_table', 1),
(16, '2024_11_02_151952_create_themes_table', 1),
(17, '2024_11_05_155041_add_progress_total_finish_total_to_event_report_table', 1),
(18, '2024_11_10_023343_create_log_rsvp_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rsvp`
--

CREATE TABLE `rsvp` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmation` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_guest` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rsvp`
--

INSERT INTO `rsvp` (`id`, `event_id`, `name`, `phone_number`, `confirmation`, `total_guest`, `created_at`, `updated_at`) VALUES
(1, 1, 'kamila', '6285601963193', NULL, NULL, '2024-11-10 06:47:16', '2024-11-10 06:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `section_ref`
--

CREATE TABLE `section_ref` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JxLZyyqwY7MwS2niIKxDX6vwuoVq0udsbXDJEo3F', 20, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaXVhcE5NTTFKVWdTbXFjRXdhQU1ENVp2dDJZUXhlNko0RkZ3cllGcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9vd25lci9jcmVhdGUiO31zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjA7fQ==', 1731211750),
('kU7XMuoR7VDXPWsfjSCPz6rCjq9jHjMMe8RMABtO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNGdvOTdObUtoUnlJRnpxb1RnV0hORG5tclppd1JHaDRueVFqUVJKaCI7czoxMToiZXZlbnRfZXJyb3IiO3M6MTY6IkV2ZW50IG5vdCBmb3VuZC4iO3M6NjoiX2ZsYXNoIjthOjI6e3M6MzoibmV3IjthOjA6e31zOjM6Im9sZCI7YToxOntpOjA7czoxMToiZXZlbnRfZXJyb3IiO319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yc3ZwL2thbWlsYSI7fX0=', 1731209024),
('N2JpPQ35GXsRBle0qM0W8XMvQNNmJ2KI3YQdkQCE', 20, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicUhZUTRrWWk2Y3B4Y1R1bTdldU1Xc1ZNM0pGMkNucW1BWXpoZlFncCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yc3ZwY2xpZW50Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjA7fQ==', 1731246437),
('YTde36bn7K5W41bKSRsg9ofrZmMLdmgtuhvPJXEy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVmlwNndkN25MQVFtSzJtSWh0ZVV1czIyU2NPUFBHZE9LWW9sRTJEViI7czoxMToiZXZlbnRfZXJyb3IiO3M6MTY6IkV2ZW50IG5vdCBmb3VuZC4iO3M6NjoiX2ZsYXNoIjthOjI6e3M6MzoibmV3IjthOjA6e31zOjM6Im9sZCI7YToxOntpOjA7czoxMToiZXZlbnRfZXJyb3IiO319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yc3ZwL2thbWlsYSI7fX0=', 1731209131);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `max_images` int NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timelines`
--

CREATE TABLE `timelines` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timelines`
--

INSERT INTO `timelines` (`id`, `event_id`, `title`, `date`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, '<h3>Awal Bertemu</h3>', '2023-11-16', '<p>Pada Maret 2023 pertama kali kami bertemu di sebuah kafe di kawasan Gading\r\n                                        Serpong. Saat itu, kami masih malu-malu namun sesudah pertemuan itu benih-benih\r\n                                        cinta perlahan mulai tumbuh. Karena kami saling jatuh cinta satu sama lain,\r\n                                        komunikasi dan pertemuan menjadi semakin intens. Hari demi hari kami lalui\r\n                                        bersama, sampai akhirnya kami pun memantapkan visi dan misi untuk menuju ke\r\n                                        jenjang yang lebih serius.\r\n                                    </p>', NULL, NULL, NULL),
(2, 1, '<h3>Tunangan</h3>', '2023-11-16', '<p>Perjalanan kisah cinta kami berdua tidaklah seperti garis lurus. Ternyata\r\n                                        tidaklah mudah untuk saling memahami satu sama lain, dan membuat dua insan\r\n                                        menjadi satu. Namun atas kehendak dan kuasa-Nya, kami terus konsisten hingga\r\n                                        akhirnya pada Desember 2023 kami memberanikan diri untuk mendapat restu keluarga\r\n                                        melalui acara pertunangan.</p>', NULL, NULL, NULL),
(3, 1, 'h3>Menikah</h3>', '2024-11-22', '<p>Hari yang sakral pun akhirnya tiba. Saatnya kami berdua untuk mengikat janji suci\r\n                                        untuk dapat hidup bersama selamanya. Ya, di bulan Desember ini kami akan segera\r\n                                        menikah. Mohon doa restunya supaya kami diberi kelancaran sampai ke pelaminan.\r\n                                        Kami pun tak sabar untuk menjalani kehidupan yang baru, yakni membentuk keluarga\r\n                                        yang sakinah mawaddah warahmah.</p>', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(20, 'admin', 'admin@gmail.com', NULL, '$2y$12$14Pm7VQrXuY2KMHYWaS5Hu9c7whC9XCExqJiUWMCT6pmx9vD.tEKq', NULL, '2024-11-09 20:43:38', '2024-11-09 20:43:38'),
(21, 'shinta', 'shinta@gmail.com', NULL, '$2y$12$gDoWj2qXmE9/OcSwa6/Uoufqikj24PYtvDyBI8YPapP94PVERMV2O', NULL, '2024-11-09 21:01:24', '2024-11-09 21:01:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_rsvp_id_foreign` (`rsvp_id`);

--
-- Indexes for table `event_details`
--
ALTER TABLE `event_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_details_user_id_foreign` (`user_id`),
  ADD KEY `event_details_event_type_id_foreign` (`event_type_id`);

--
-- Indexes for table `event_owner_details`
--
ALTER TABLE `event_owner_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_owner_details_gender_id_foreign` (`gender_id`);

--
-- Indexes for table `event_reports`
--
ALTER TABLE `event_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_reports_event_type_id_foreign` (`event_type_id`);

--
-- Indexes for table `event_report_details`
--
ALTER TABLE `event_report_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_report_details_event_id_foreign` (`event_id`),
  ADD KEY `event_report_details_event_report_id_foreign` (`event_report_id`);

--
-- Indexes for table `event_type_ref`
--
ALTER TABLE `event_type_ref`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_event_id_foreign` (`event_id`),
  ADD KEY `gallery_section_id_foreign` (`section_id`);

--
-- Indexes for table `gender_ref`
--
ALTER TABLE `gender_ref`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gifts_event_id_foreign` (`event_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_rsvp`
--
ALTER TABLE `log_rsvp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_rsvp_rsvp_id_foreign` (`rsvp_id`),
  ADD KEY `log_rsvp_event_id_foreign` (`event_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `rsvp`
--
ALTER TABLE `rsvp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rsvp_event_id_foreign` (`event_id`);

--
-- Indexes for table `section_ref`
--
ALTER TABLE `section_ref`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `themes_event_id_foreign` (`event_id`);

--
-- Indexes for table `timelines`
--
ALTER TABLE `timelines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timelines_event_id_foreign` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_details`
--
ALTER TABLE `event_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_owner_details`
--
ALTER TABLE `event_owner_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_reports`
--
ALTER TABLE `event_reports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_report_details`
--
ALTER TABLE `event_report_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_type_ref`
--
ALTER TABLE `event_type_ref`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gender_ref`
--
ALTER TABLE `gender_ref`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_rsvp`
--
ALTER TABLE `log_rsvp`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rsvp`
--
ALTER TABLE `rsvp`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section_ref`
--
ALTER TABLE `section_ref`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timelines`
--
ALTER TABLE `timelines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_rsvp_id_foreign` FOREIGN KEY (`rsvp_id`) REFERENCES `rsvp` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_details`
--
ALTER TABLE `event_details`
  ADD CONSTRAINT `event_details_event_type_id_foreign` FOREIGN KEY (`event_type_id`) REFERENCES `event_type_ref` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_owner_details`
--
ALTER TABLE `event_owner_details`
  ADD CONSTRAINT `event_owner_details_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `gender_ref` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_reports`
--
ALTER TABLE `event_reports`
  ADD CONSTRAINT `event_reports_event_type_id_foreign` FOREIGN KEY (`event_type_id`) REFERENCES `event_type_ref` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_report_details`
--
ALTER TABLE `event_report_details`
  ADD CONSTRAINT `event_report_details_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_report_details_event_report_id_foreign` FOREIGN KEY (`event_report_id`) REFERENCES `event_reports` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gallery_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `section_ref` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gifts`
--
ALTER TABLE `gifts`
  ADD CONSTRAINT `gifts_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `log_rsvp`
--
ALTER TABLE `log_rsvp`
  ADD CONSTRAINT `log_rsvp_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `log_rsvp_rsvp_id_foreign` FOREIGN KEY (`rsvp_id`) REFERENCES `rsvp` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rsvp`
--
ALTER TABLE `rsvp`
  ADD CONSTRAINT `rsvp_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `themes`
--
ALTER TABLE `themes`
  ADD CONSTRAINT `themes_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `timelines`
--
ALTER TABLE `timelines`
  ADD CONSTRAINT `timelines_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event_details` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
