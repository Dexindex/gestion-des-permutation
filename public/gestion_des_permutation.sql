-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 08:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_des_permutation`
--

-- --------------------------------------------------------

--
-- Table structure for table `etablissements`
--

CREATE TABLE `etablissements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `etablissement` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `ville_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etablissements`
--

INSERT INTO `etablissements` (`id`, `etablissement`, `code`, `adresse`, `tel`, `fax`, `ville_id`, `created_at`, `updated_at`) VALUES
(3, 'IFMOTICA Fès\r\n', 'IFMOTICA', 'Fès ,Pres De Fes Shore', '0612345678', '0612345678', 17, NULL, NULL),
(4, 'CENTRE MIXTE DE FORMATION PROFESSIONNELLE LALLA AICHA CASABLANCA\r\n', 'CMFP', 'LALLA AICHA CASABLANCA', '0612345678', '0612345678', 38, NULL, NULL),
(5, 'INSTITUT SPECIALISE DE TECHNOLOGIE APPLIQUEE SIDI MOUMEN CASABLANCA\r\n', 'ISTASM', 'SIDI MOUMEN CASABLANCA', '0607080901', '0607080901', 38, NULL, NULL),
(6, 'ISTA HYRIAD RABAT\r\n', 'ISTAHR', 'Hay Riad Rabat Instituts B.P. 6332', '0537830162', '0537835249', 26, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `formateurs`
--

CREATE TABLE `formateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matricule` bigint(20) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `date_recrutement` date NOT NULL,
  `poste` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `etablissement_id` bigint(20) UNSIGNED NOT NULL,
  `metier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formateurs`
--

INSERT INTO `formateurs` (`id`, `matricule`, `nom`, `prenom`, `photo`, `grade`, `date_naissance`, `date_recrutement`, `poste`, `tel`, `email`, `password`, `etablissement_id`, `metier_id`, `created_at`, `updated_at`) VALUES
(1, 145236, 'Berrada Ifriqi', 'Oussama', 'images/TIPRtiKsIj7elmEgKgtPBVZ0kZczoBLT89CQBvXp.jpg', 'BAC+2', '2003-01-19', '2023-12-12', 'Formateur', '+212658987412', 'admin@newdev.com', '$2y$12$lWL5uMrKzK1TwtVf3Ie/auBB60/wduR9ztXdyUHe/NsLSbbsE2hii', 3, 14, '2024-03-14 10:17:16', '2024-03-16 19:14:57'),
(2, 895621, 'Nabeel', 'Essami', 'images/adHoveGLGuJeq4stx8eSlGO66zlZ72Bqyix5dw2x.png', 'BAC+2', '1996-02-15', '2019-10-22', 'Formateur', '+212708555544', 'kocamo@klanze.com', '$2y$12$GOSxxeSoS3OtoPl3oVZf2u.wjT3casPPlqr7VYFzEOj5oNvfVLEF2', 6, 14, '2024-03-14 10:19:00', '2024-03-14 21:52:25'),
(4, 0, 'Admin', '', 'images/download.png', '...', '0000-00-00', '0000-00-00', 'Admin', '...', 'admin@admin.admin', '$2y$12$GOSxxeSoS3OtoPl3oVZf2u.wjT3casPPlqr7VYFzEOj5oNvfVLEF2', 3, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `metiers`
--

CREATE TABLE `metiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `metier` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metiers`
--

INSERT INTO `metiers` (`id`, `metier`, `updated_at`, `created_at`) VALUES
(1, 'Métiers des Services à la Personne', '2024-03-16 11:34:17', '2024-03-16 11:34:40'),
(2, 'Métiers de l\'Artisanat', '2024-03-16 11:34:17', '2024-03-16 11:34:40'),
(3, 'Métiers du Commerce et de Gestion', '2024-03-16 11:34:17', '2024-03-16 11:34:40'),
(4, 'Métiers de l\'Aéronautique', '2024-03-16 11:34:17', '2024-03-16 11:34:40'),
(5, 'Métiers de l\'Agroalimentaire', '2024-03-16 11:34:17', '2024-03-16 11:34:40'),
(6, 'Métiers des Arts Graphiques', '2024-03-16 11:34:17', '2024-03-16 11:34:40'),
(7, 'Métiers de l\'Audiovisuel et du Cinéma', '2024-03-16 11:34:17', '2024-03-16 11:34:40'),
(8, 'Métiers du Bâtiment et Travaux Publics', '2024-03-16 11:34:17', '2024-03-16 11:34:40'),
(9, 'Métiers du Cuir', '2024-03-16 11:34:17', '2024-03-16 11:34:40'),
(10, 'Métiers de l\'Industrie Mécanique', '2024-03-16 11:34:17', '2024-03-16 11:34:40'),
(11, 'Métiers du Froid & Génie Thermique', '2024-03-16 11:34:17', '2024-03-16 11:34:40'),
(12, 'Métiers de l\'Industrie Electrique', '2024-03-16 11:34:17', '2024-03-16 11:34:40'),
(13, 'Métiers de l\'Automobile', '2024-03-16 11:34:17', '2024-03-16 11:34:40'),
(14, 'Métiers du Digital & Intelligence Artificielle', '2024-03-16 11:34:17', '2024-03-16 11:34:40'),
(15, 'Métiers de la Santé', '2024-03-16 11:34:17', '2024-03-16 11:34:40'),
(16, 'Métiers de la Plasturgie', '2024-03-16 11:34:17', '2024-03-16 11:34:40'),
(17, 'Métiers du Sports', '2024-03-16 11:38:32', '2024-03-16 11:34:40'),
(18, 'Métiers de l\'Industrie Textile & Habillement', '2024-03-16 11:34:17', '2024-03-16 11:34:40'),
(20, 'Métiers du Transport et de la Logistique', '2024-03-16 11:34:17', '2024-03-16 11:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_04_090046_create_regions_table', 1),
(6, '2024_03_04_090142_create_villes_table', 1),
(7, '2024_03_04_090244_create_etablissements_table', 1),
(8, '2024_03_04_090343_create_metiers_table', 1),
(9, '2024_03_04_091641_create_formateurs_table', 1),
(10, '2024_03_04_091645_create_permutations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permutations`
--

CREATE TABLE `permutations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `ville_id` bigint(20) UNSIGNED NOT NULL,
  `formateur_id` bigint(20) UNSIGNED NOT NULL,
  `valide` tinyint(1) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permutations`
--

INSERT INTO `permutations` (`id`, `date`, `ville_id`, `formateur_id`, `valide`, `updated_at`, `created_at`) VALUES
(2, '2024-03-14', 17, 2, 0, '2024-03-14 23:15:36', '2024-03-14 11:52:38'),
(5, '2024-04-15', 26, 1, 0, '2024-03-14 11:59:44', '2024-03-14 11:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `region`, `created_at`, `updated_at`) VALUES
(1, 'Tanger-Tetouan-Al Hoceima', NULL, NULL),
(2, 'Oriental', NULL, NULL),
(3, 'Fès-Meknès', NULL, NULL),
(4, 'Rabat-Salé-Kénitra', NULL, NULL),
(5, 'Béni Mellal-Khénifra', NULL, NULL),
(6, 'Casablanca-Settat', NULL, NULL),
(7, 'Marrakesh-Safi', NULL, NULL),
(8, 'Drâa-Tafilalet', NULL, NULL),
(9, 'Souss-Massa', NULL, NULL),
(10, 'Guelmim-Oued Noun', NULL, NULL),
(11, 'Laâyoune-Sakia El Hamra', NULL, NULL),
(12, 'Dakhla-Oued Ed-Dahab', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

CREATE TABLE `villes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ville` varchar(255) NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `villes`
--

INSERT INTO `villes` (`id`, `ville`, `region_id`) VALUES
(1, 'Tanger-Asilah', 1),
(2, 'Fahs Anjra', 1),
(3, 'Mdiq-Fnideq', 1),
(4, 'Chefchaouen', 1),
(5, 'Larache', 1),
(6, 'Ouezzane', 1),
(7, 'Tétouan', 1),
(8, 'Al Hoceïma', 1),
(9, 'Berkane', 2),
(10, 'Driouch', 2),
(11, 'Figuig', 2),
(12, 'Guercif', 2),
(13, 'Jerada', 2),
(14, 'Nador', 2),
(15, 'Oujda-Angad', 2),
(16, 'Taourirt', 2),
(17, 'Fès', 3),
(18, 'Boulemane', 3),
(19, 'Sefrou', 3),
(20, 'Moulay Yaâcoub', 3),
(21, 'Taounate', 3),
(22, 'Taza', 3),
(23, 'Meknès', 3),
(24, 'El Hajeb', 3),
(25, 'Ifrane', 3),
(26, 'Rabat', 4),
(27, 'Salé', 4),
(28, 'Skhirate-Témara', 4),
(29, 'Sidi Kacem', 4),
(30, 'Sidi Slimane', 4),
(31, 'Kenitra', 4),
(32, 'Khémisset', 4),
(33, 'Béni Mellal', 5),
(34, 'Azilal', 5),
(35, 'Fquih Ben Salah', 5),
(36, 'Khénifra', 5),
(37, 'Khouribga', 5),
(38, 'Casablanca', 6),
(39, 'Mohammédia', 6),
(40, 'El Jadida', 6),
(41, 'Nouaceur', 6),
(42, 'Médiouna', 6),
(43, 'Benslimane', 6),
(44, 'Berrechid', 6),
(45, 'Settat', 6),
(46, 'Sidi Bennour', 6),
(47, 'Marrakech', 7),
(48, 'Chichaoua', 7),
(49, 'Al Haouz', 7),
(50, 'El Kelâa des Sraghna', 7),
(51, 'Essaouira', 7),
(52, 'Rehamna', 7),
(53, 'Safi', 7),
(54, 'Youssoufia', 7),
(55, 'Ouarzazate', 8),
(56, 'Tinghir', 8),
(57, 'Zagora', 8),
(58, 'Errachidia', 8),
(59, 'Midelt', 8),
(60, 'Agadir Ida-Outanane', 9),
(61, 'Chtouka-Aït Baha', 9),
(62, 'Inezgane-Aït Melloul', 9),
(63, 'Taroudant', 9),
(64, 'Tata', 9),
(65, 'Tiznit', 9),
(66, 'Assa-Zag', 10),
(67, 'Guelmim', 10),
(68, 'Sidi Ifni', 10),
(69, 'Tan-Tan', 10),
(70, 'Laâyoune', 11),
(71, 'Boujdour', 11),
(72, 'Tarfaya', 11),
(73, 'Es-Semara', 11),
(74, 'Aousserd', 12),
(75, 'Oued Ed-Dahab', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `etablissements`
--
ALTER TABLE `etablissements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etablissements_ville_id_foreign` (`ville_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `formateurs`
--
ALTER TABLE `formateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formateurs_etablissement_id_foreign` (`etablissement_id`),
  ADD KEY `formateurs_metier_id_foreign` (`metier_id`);

--
-- Indexes for table `metiers`
--
ALTER TABLE `metiers`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permutations`
--
ALTER TABLE `permutations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permutations_ville_id_foreign` (`ville_id`),
  ADD KEY `permutations_formateur_id_foreign` (`formateur_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `villes_region_id_foreign` (`region_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `etablissements`
--
ALTER TABLE `etablissements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formateurs`
--
ALTER TABLE `formateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `metiers`
--
ALTER TABLE `metiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `permutations`
--
ALTER TABLE `permutations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `etablissements`
--
ALTER TABLE `etablissements`
  ADD CONSTRAINT `etablissements_ville_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`);

--
-- Constraints for table `formateurs`
--
ALTER TABLE `formateurs`
  ADD CONSTRAINT `formateurs_etablissement_id_foreign` FOREIGN KEY (`etablissement_id`) REFERENCES `etablissements` (`id`),
  ADD CONSTRAINT `formateurs_metier_id_foreign` FOREIGN KEY (`metier_id`) REFERENCES `metiers` (`id`);

--
-- Constraints for table `permutations`
--
ALTER TABLE `permutations`
  ADD CONSTRAINT `permutations_formateur_id_foreign` FOREIGN KEY (`formateur_id`) REFERENCES `formateurs` (`id`),
  ADD CONSTRAINT `permutations_ville_id_foreign` FOREIGN KEY (`ville_id`) REFERENCES `villes` (`id`);

--
-- Constraints for table `villes`
--
ALTER TABLE `villes`
  ADD CONSTRAINT `villes_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
