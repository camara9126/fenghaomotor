-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 04 fév. 2026 à 15:29
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_commercial`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnements`
--

CREATE TABLE `abonnements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` bigint(20) UNSIGNED NOT NULL,
  `pack_id` bigint(20) UNSIGNED NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'actif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `abonnements`
--

INSERT INTO `abonnements` (`id`, `entreprise_id`, `pack_id`, `montant`, `date_debut`, `date_fin`, `statut`, `created_at`, `updated_at`) VALUES
(12, 10, 1, 15000.00, '2026-01-28', '2026-02-28', 'expire', '2026-01-28 11:43:39', '2026-01-28 11:43:39'),
(13, 2, 2, 25000.00, '2026-01-02', '2026-03-02', 'payé', '2026-02-02 13:08:59', '2026-02-02 13:08:59');

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('acvision01m@gmail.com|127.0.0.1', 'i:2;', 1770110528),
('acvision01m@gmail.com|127.0.0.1:timer', 'i:1770110528;', 1770110528),
('baousseynou@gmail.com|127.0.0.1', 'i:1;', 1769688418),
('baousseynou@gmail.com|127.0.0.1:timer', 'i:1769688418;', 1769688418);

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_depenses`
--

CREATE TABLE `categorie_depenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_depenses`
--

INSERT INTO `categorie_depenses` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'loyer', '2026-01-14 12:13:18', '2026-01-14 12:13:18'),
(2, 'electricite', '2026-01-14 12:13:18', '2026-01-14 12:13:18'),
(3, 'internet', '2026-01-14 12:13:18', '2026-01-14 12:13:18'),
(4, 'abonnement', '2026-01-14 12:13:18', '2026-01-14 12:13:18'),
(5, 'eau', '2026-01-14 12:13:18', '2026-01-14 12:13:18'),
(6, 'telephone', '2026-01-14 12:13:18', '2026-01-14 12:13:18'),
(7, 'autres', '2026-01-29 10:40:26', '2026-01-29 10:40:26');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `entreprise_id`, `nom`, `telephone`, `email`, `adresse`, `created_at`, `updated_at`) VALUES
(1, 2, 'modou sy', '774560912', NULL, 'gokhou mbadj, saint-louis', '2026-01-06 13:43:25', '2026-01-06 13:43:25'),
(2, 2, 'fallou kane', NULL, 'kanefallou12@gmail.com', 'pikine, saint-louis', '2026-01-06 13:50:32', '2026-01-06 13:50:32'),
(3, 2, 'babacar ba', '703859301', 'immo@gmail.com', 'sud, saint-louis', '2026-01-07 12:41:26', '2026-01-07 12:41:26'),
(4, 2, 'ousseynou diop', '701230098', 'ousseynou@gmail.com', 'guet-ndar, saint-louis', '2026-01-08 13:54:00', '2026-01-08 13:54:00'),
(5, 2, 'fatou kane', '76845092', NULL, 'sanar, saint-louis', '2026-01-08 13:55:33', '2026-01-08 13:55:33'),
(6, 2, 'fatou kane', '76845092', NULL, 'sanar, saint-louis', '2026-01-08 13:55:58', '2026-01-08 13:55:58'),
(7, 2, 'amadou', '7765437893', 'amadou@gmail.com', NULL, '2026-01-09 11:05:49', '2026-01-09 11:05:49'),
(8, 2, 'amadou', '7765437893', 'amadou@gmail.com', NULL, '2026-01-09 11:05:53', '2026-01-09 11:05:53'),
(9, 2, 'amadou', '7765437893', 'amadou@gmail.com', NULL, '2026-01-09 11:05:57', '2026-01-09 11:05:57'),
(10, 2, 'amadou camara', '7765437893', 'amadou@gmail.com', NULL, '2026-01-09 11:06:44', '2026-01-09 11:06:44'),
(11, 2, 'amadou camara', '7765437893', 'amadou@gmail.com', NULL, '2026-01-09 11:06:45', '2026-01-09 11:06:45'),
(12, 2, 'amadou camara', '7765437893', 'amadou@gmail.com', NULL, '2026-01-09 11:06:45', '2026-01-09 11:06:45'),
(13, 2, 'amadou camara', '7765437893', 'amadou@gmail.com', NULL, '2026-01-09 11:06:46', '2026-01-09 11:06:46'),
(14, 2, 'amadou camara', '7765437893', 'amadou@gmail.com', NULL, '2026-01-09 11:08:30', '2026-01-09 11:08:30'),
(15, 2, 'amadou camara', '7765437893', 'amadou@gmail.com', NULL, '2026-01-09 11:08:31', '2026-01-09 11:08:31'),
(16, 2, 'Niang Distribution', '7765437893', 'immo@gmail.com', NULL, '2026-01-09 11:08:41', '2026-01-09 11:08:41'),
(17, 2, 'Niang Distribution', '76845092', 'immo@gmail.com', NULL, '2026-01-12 07:05:31', '2026-01-12 07:05:31'),
(18, 2, 'khady fall', '776003468', 'khady12@gmail.com', NULL, '2026-01-12 07:12:09', '2026-01-12 07:12:09'),
(19, 2, 'box frites', '776003468', 'o.ndiaye@bcmgroupe.com', NULL, '2026-01-12 07:19:14', '2026-01-12 07:19:14'),
(20, 2, 'stem', '7765437893', 'immo@gmail.com', NULL, '2026-01-12 07:20:48', '2026-01-12 07:20:48'),
(21, 2, 'stem', '7765437893', 'immo@gmail.com', NULL, '2026-01-12 07:20:52', '2026-01-12 07:20:52'),
(22, 2, 'Niang Distribution', '76845092', 'o.ndiaye@bcmgroupe.com', NULL, '2026-01-12 07:22:36', '2026-01-12 07:22:36'),
(23, 2, 'Niang Distribution', '76845092', 'o.ndiaye@bcmgroupe.com', NULL, '2026-01-12 07:22:38', '2026-01-12 07:22:38'),
(24, 2, 'box frites', '7765437893', 'immo@gmail.com', 'mbour', '2026-01-12 07:23:55', '2026-01-23 10:33:47'),
(25, 2, 'box frites', '7765437893', 'immo@gmail.com', NULL, '2026-01-12 07:24:35', '2026-01-12 07:24:35'),
(26, 2, 'awa sy', '768549821', 'awacom@gmail.com', 'thies, senegal', '2026-01-15 11:10:19', '2026-01-23 10:33:27'),
(27, 10, 'fallou', '76845092', 'test@gmail.com', NULL, '2026-01-29 08:26:26', '2026-01-29 08:26:26');

-- --------------------------------------------------------

--
-- Structure de la table `depenses`
--

CREATE TABLE `depenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `montant` decimal(15,2) NOT NULL,
  `date_depense` date NOT NULL,
  `categorie_depense_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mode_paiement` enum('cash','orange_money','wave','banque') NOT NULL,
  `statut` enum('payee','annulee') NOT NULL DEFAULT 'payee',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `entreprise_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `depenses`
--

INSERT INTO `depenses` (`id`, `reference`, `libelle`, `description`, `montant`, `date_depense`, `categorie_depense_id`, `mode_paiement`, `statut`, `created_at`, `updated_at`, `entreprise_id`, `user_id`) VALUES
(1, 'DEP-1768392482', 'paiement eau', NULL, 25000.00, '2026-01-14', 5, 'cash', 'payee', '2026-01-14 11:08:02', '2026-01-14 11:08:02', 2, 2),
(2, 'DEP-1768393343', 'facture internet', 'paiement wifi du mois de janvier', 45000.00, '2026-01-13', 3, '', 'payee', '2026-01-14 11:22:23', '2026-01-14 11:22:23', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `devise` varchar(255) NOT NULL DEFAULT 'XOF',
  `statut` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `taux_tva` decimal(5,2) NOT NULL DEFAULT 18.00,
  `pack_id` bigint(20) UNSIGNED NOT NULL,
  `abonnement_expire_le` date DEFAULT NULL,
  `trial_fin` date DEFAULT NULL,
  `trial_actif` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `nom`, `telephone`, `adresse`, `devise`, `statut`, `created_at`, `updated_at`, `logo`, `taux_tva`, `pack_id`, `abonnement_expire_le`, `trial_fin`, `trial_actif`) VALUES
(2, 'O\'Food', '768543233', 'Sor, saint-louis', 'XOF', 1, '2025-12-29 13:36:12', '2025-12-29 13:36:12', NULL, 18.00, 2, '2026-02-28', '2026-01-28', 0),
(10, 'laye designer', NULL, NULL, 'XOF', 1, '2026-01-28 10:35:45', '2026-01-28 11:43:39', NULL, 18.00, 1, '2026-02-28', '2026-02-11', 0),
(12, 'Fashion 2.0', NULL, NULL, 'XOF', 1, '2026-02-02 13:20:15', '2026-02-02 13:20:15', NULL, 18.00, 1, '2026-03-02', '2026-02-14', 1),
(13, 'Fenghao Motor', NULL, NULL, 'XOF', 1, '2026-02-03 08:15:28', '2026-02-03 08:15:28', NULL, 18.00, 1, '2026-03-03', '2026-02-15', 1);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `fournisseurs`
--

CREATE TABLE `fournisseurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `entreprise_id`, `nom`, `telephone`, `email`, `adresse`, `statut`, `created_at`, `updated_at`) VALUES
(1, 2, 'ETS boye', '768972134', 'ets-boye@gmail.com', 'sor, saint-louis', 1, '2025-12-30 11:34:03', '2025-12-30 11:34:03'),
(2, 2, 'Tall Distribution', '756978012', 'talldis@gmail.com', 'dakar, senegal', 1, '2026-01-15 07:27:11', '2026-01-23 10:05:39'),
(3, 2, 'sonacos', '335678912', 'sonacos@gmail.com', 'keur massar - dakar, senegal', 1, '2026-01-15 07:33:35', '2026-01-15 07:33:35'),
(4, 2, 'mbaye b2b', '705678123', 'mbayeb2b@gmail.com', 'guediawaye, dakar', 1, '2026-01-15 07:35:19', '2026-01-15 07:35:19'),
(5, 2, 'Niang Distribution', '3345677976', 'niang@gmail.com', 'dakar, senegal', 1, '2026-01-15 09:06:58', '2026-01-23 09:56:35'),
(6, 10, 'ciceso', '7765437893', 'ciceso26@gmail.com', 'dakar', 1, '2026-01-29 08:24:00', '2026-01-29 08:24:00');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_29_112251_add_role_to_users_table', 2),
(5, '2025_12_29_124455_create_entreprises_table', 3),
(6, '2025_12_30_094258_create_fournisseurs_table', 4),
(7, '2025_12_30_125845_create_produits_table', 5),
(8, '2026_01_02_100741_add_logo_to_entreprises_table', 6),
(9, '2026_01_05_094558_create_stock_mouvements_table', 7),
(10, '2026_01_06_115521_create_clients_table', 8),
(11, '2026_01_06_120613_create_ventes_table', 9),
(12, '2026_01_06_120749_create_vente_items_table', 9),
(13, '2026_01_08_094052_add_multiple_columns_to_ventes_table', 10),
(14, '2026_01_08_094438_add_multiple_columns_to_vente_items_table', 11),
(15, '2026_01_13_093713_create_paiements_table', 12),
(16, '2026_01_13_143328_add_multiple_columns_to_paiements_table', 13),
(17, '2026_01_14_103721_create_categorie_depenses_table', 14),
(18, '2026_01_14_113708_add_multiple_columns_to_depenses_table', 15),
(19, '2026_01_14_122321_create_recettes_table', 16),
(20, '2026_01_22_085735_add_taux_tva_to_entreprises_table', 17),
(21, '2026_01_26_101757_create_packs_table', 18),
(22, '2026_01_27_090758_create_abonnements_table', 19),
(23, '2026_01_27_120631_add_abonnement_expire_le_to_entreprises_table', 20),
(24, '2026_01_28_122740_create_paiements_abonnements_table', 21),
(25, '2026_01_28_135929_create_paiement_abonnements_table', 22),
(26, '2026_01_29_094450_add_entreprise_id_to_vente_items_nullable', 23),
(27, '2026_01_29_095110_add_fk_to_vente_items_enteprise_id', 24),
(28, '2026_01_30_083746_add_multiple_columns_to_packs_table', 25),
(29, '2026_02_02_130312_add_paid_at_to_paiement_abonnements_table', 26);

-- --------------------------------------------------------

--
-- Structure de la table `packs`
--

CREATE TABLE `packs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `limites` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`limites`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `max_client` varchar(255) DEFAULT NULL,
  `max_produit` varchar(255) DEFAULT NULL,
  `max_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `packs`
--

INSERT INTO `packs` (`id`, `nom`, `prix`, `limites`, `created_at`, `updated_at`, `max_client`, `max_produit`, `max_user`) VALUES
(1, 'starter', 20000.00, NULL, '2026-01-26 13:54:23', '2026-01-26 13:54:23', '100', '80', '1'),
(2, 'professionnel', 25000.00, NULL, '2026-01-26 13:44:23', '2026-01-26 13:49:23', '300', '200', '3'),
(3, 'entreprise', 40000.00, NULL, '2026-01-26 13:56:34', '2026-01-26 13:56:43', NULL, NULL, '10');

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vente_id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` bigint(20) UNSIGNED NOT NULL,
  `montant` decimal(15,2) NOT NULL,
  `mode_paiement` enum('cash','wave','orange_money','banque') NOT NULL,
  `reference` varchar(255) NOT NULL,
  `date_paiement` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'valide',
  `motif` text DEFAULT NULL,
  `annule_par` bigint(20) UNSIGNED DEFAULT NULL,
  `annule_le` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `paiements`
--

INSERT INTO `paiements` (`id`, `vente_id`, `entreprise_id`, `montant`, `mode_paiement`, `reference`, `date_paiement`, `created_at`, `updated_at`, `statut`, `motif`, `annule_par`, `annule_le`) VALUES
(1, 31, 2, 800000.00, 'wave', 'PAY-1768302180', '2026-01-13', '2026-01-13 10:03:00', '2026-01-14 09:03:47', 'annule', 'Annulation manuelle', 2, '2026-01-14 09:03:47'),
(2, 31, 2, 50000.00, 'cash', 'PAY-1768304885', '2026-01-13', '2026-01-13 10:48:05', '2026-01-13 10:48:05', 'valide', NULL, NULL, NULL),
(3, 36, 2, 8000.00, 'cash', 'PAY-1768306113', '2026-01-13', '2026-01-13 11:08:33', '2026-01-13 11:08:33', 'valide', NULL, NULL, NULL),
(4, 36, 2, 1440.00, 'orange_money', 'PAY-1768306823', '2026-01-13', '2026-01-13 11:20:23', '2026-01-13 11:20:23', 'valide', NULL, NULL, NULL),
(5, 31, 2, 141200.00, 'banque', 'PAY-1768306903', '2026-01-13', '2026-01-13 11:21:43', '2026-01-15 11:44:57', 'annule', 'Annulation manuelle', 2, '2026-01-15 11:44:57'),
(6, 34, 2, 5000.00, 'wave', 'PAY-1768312728', '2026-01-13', '2026-01-13 12:58:48', '2026-01-14 07:02:47', 'annule', 'Annulation manuelle', 2, '2026-01-14 07:02:47'),
(7, 34, 2, 900.00, 'cash', 'PAY-1768312850', '2026-01-13', '2026-01-13 13:00:50', '2026-01-13 13:00:50', 'valide', NULL, NULL, NULL),
(8, 37, 2, 499000.00, 'banque', 'PAY-1768313101', '2026-01-13', '2026-01-13 13:05:01', '2026-01-14 07:39:55', 'annule', 'Annulation manuelle', 2, '2026-01-14 07:39:55'),
(9, 34, 2, 900.00, 'cash', 'PAY-1768377893', '2026-01-14', '2026-01-14 07:04:53', '2026-01-14 07:04:53', 'valide', NULL, NULL, NULL),
(10, 34, 2, 100.00, 'cash', 'PAY-1768377907', '2026-01-14', '2026-01-14 07:05:07', '2026-01-14 07:05:07', 'valide', NULL, NULL, NULL),
(11, 34, 2, 400.00, 'cash', 'PAY-1768378559', '2026-01-14', '2026-01-14 07:15:59', '2026-01-14 07:15:59', 'valide', NULL, NULL, NULL),
(12, 34, 2, 1000.00, 'cash', 'PAY-1768379180', '2026-01-14', '2026-01-14 07:26:20', '2026-01-14 07:26:20', 'valide', NULL, NULL, NULL),
(13, 34, 2, 2400.00, 'cash', 'PAY-1768379193', '2026-01-14', '2026-01-14 07:26:33', '2026-01-14 07:26:33', 'valide', NULL, NULL, NULL),
(14, 34, 2, 100.00, 'cash', 'PAY-1768379243', '2026-01-14', '2026-01-14 07:27:23', '2026-01-14 07:27:23', 'valide', NULL, NULL, NULL),
(15, 34, 2, 100.00, 'cash', 'PAY-1768379267', '2026-01-14', '2026-01-14 07:27:47', '2026-01-15 11:43:06', 'annule', NULL, NULL, NULL),
(16, 37, 2, 491000.00, 'banque', 'PAY-1768380131', '2026-01-14', '2026-01-14 07:42:11', '2026-01-14 07:42:11', 'valide', NULL, NULL, NULL),
(17, 37, 2, 8000.00, 'banque', 'PAY-1768380268', '2026-01-14', '2026-01-14 07:44:28', '2026-01-14 07:44:28', 'valide', NULL, NULL, NULL),
(18, 37, 2, 16500.00, 'banque', 'PAY-1768380426', '2026-01-14', '2026-01-14 07:47:06', '2026-01-14 07:47:06', 'valide', NULL, NULL, NULL),
(19, 37, 2, 474500.00, 'cash', 'PAY-1768380573', '2026-01-14', '2026-01-14 07:49:33', '2026-01-14 07:49:33', 'valide', NULL, NULL, NULL),
(20, 38, 2, 413000.00, 'orange_money', 'PAY-1768380691', '2026-01-14', '2026-01-14 07:51:31', '2026-01-14 07:51:31', 'valide', NULL, NULL, NULL),
(21, 31, 2, 800000.00, 'wave', 'PAY-1768385430', '2026-01-14', '2026-01-14 09:10:30', '2026-01-14 09:10:30', 'valide', NULL, NULL, NULL),
(22, 30, 2, 35400.00, 'wave', 'PAY-1768399217', '2026-01-14', '2026-01-14 13:00:17', '2026-01-14 13:00:17', 'valide', NULL, NULL, NULL),
(23, 29, 2, 50000.00, 'banque', 'PAY-1768470701', '2026-01-15', '2026-01-15 08:51:41', '2026-01-15 08:51:41', 'valide', NULL, NULL, NULL),
(24, 29, 2, 5000.00, 'banque', 'PAY-1768471125', '2026-01-15', '2026-01-15 08:58:45', '2026-01-15 11:44:19', 'annule', 'Annulation manuelle', 2, '2026-01-15 11:44:19'),
(25, 29, 2, 4000.00, 'banque', 'PAY-1768471143', '2026-01-15', '2026-01-15 08:59:03', '2026-01-15 08:59:03', 'valide', NULL, NULL, NULL),
(26, 39, 2, 100000.00, 'wave', 'PAY-1768475385', '2026-01-15', '2026-01-15 10:09:45', '2026-01-15 10:09:45', 'valide', NULL, NULL, NULL),
(27, 39, 2, 10000.00, 'wave', 'PAY-1768475609', '2026-01-15', '2026-01-15 10:13:29', '2026-01-15 10:13:29', 'valide', NULL, NULL, NULL),
(28, 39, 2, 10000.00, 'cash', 'PAY-1768475618', '2026-01-15', '2026-01-15 10:13:38', '2026-01-15 10:13:38', 'valide', NULL, NULL, NULL),
(29, 40, 2, 1770000.00, 'banque', 'PAY-1768477370', '2026-01-15', '2026-01-15 10:42:50', '2026-01-15 10:42:50', 'valide', NULL, NULL, NULL),
(30, 41, 2, 60000.00, 'cash', 'PAY-1768477901', '2026-01-15', '2026-01-15 10:51:41', '2026-01-15 10:51:41', 'valide', NULL, NULL, NULL),
(31, 41, 2, 60000.00, 'cash', 'PAY-1768478739', '2026-01-15', '2026-01-15 11:05:39', '2026-01-15 11:05:39', 'valide', NULL, NULL, NULL),
(32, 41, 2, 576200.00, 'cash', 'PAY-1768478936', '2026-01-15', '2026-01-15 11:08:56', '2026-01-15 11:08:56', 'valide', NULL, NULL, NULL),
(33, 42, 2, 88000.00, 'cash', 'PAY-1768479057', '2026-01-15', '2026-01-15 11:10:57', '2026-01-15 13:11:30', 'annule', 'Annulation manuelle', 2, '2026-01-15 13:11:30'),
(34, 42, 2, 500.00, 'cash', 'PAY-1768479096', '2026-01-15', '2026-01-15 11:11:36', '2026-01-15 11:56:10', 'annule', 'Annulation manuelle', 2, '2026-01-15 11:56:10'),
(35, 43, 2, 6000.00, 'cash', 'PAY-1768479155', '2026-01-15', '2026-01-15 11:12:35', '2026-01-15 11:56:34', 'annule', 'Annulation manuelle', 2, '2026-01-15 11:56:34'),
(36, 43, 2, 1.00, 'cash', 'PAY-1768481835', '2026-01-15', '2026-01-15 11:57:15', '2026-01-15 11:57:15', 'valide', NULL, NULL, NULL),
(37, 43, 2, 5900.00, 'cash', 'PAY-1768481854', '2026-01-15', '2026-01-15 11:57:34', '2026-01-15 11:57:34', 'valide', NULL, NULL, NULL),
(38, 43, 2, 1.00, 'cash', 'PAY-1768481881', '2026-01-15', '2026-01-15 11:58:01', '2026-01-15 11:58:01', 'valide', NULL, NULL, NULL),
(39, 43, 2, 5.00, 'cash', 'PAY-1768481896', '2026-01-15', '2026-01-15 11:58:16', '2026-01-15 11:58:16', 'valide', NULL, NULL, NULL),
(40, 43, 2, 3.00, 'cash', 'PAY-1768481907', '2026-01-15', '2026-01-15 11:58:27', '2026-01-15 11:58:27', 'valide', NULL, NULL, NULL),
(41, 43, 2, 5.00, 'cash', 'PAY-1768481918', '2026-01-15', '2026-01-15 11:58:38', '2026-01-15 11:58:38', 'valide', NULL, NULL, NULL),
(42, 42, 2, 500.00, 'cash', 'PAY-1768481954', '2026-01-15', '2026-01-15 11:59:14', '2026-01-15 11:59:14', 'valide', NULL, NULL, NULL),
(43, 43, 2, 5.00, 'cash', 'PAY-1768481982', '2026-01-15', '2026-01-15 11:59:42', '2026-01-15 11:59:42', 'valide', NULL, NULL, NULL),
(44, 43, 2, 5.00, 'cash', 'PAY-1768481987', '2026-01-15', '2026-01-15 11:59:47', '2026-01-15 11:59:47', 'valide', NULL, NULL, NULL),
(45, 43, 2, 5.00, 'cash', 'PAY-1768481992', '2026-01-15', '2026-01-15 11:59:52', '2026-01-15 11:59:52', 'valide', NULL, NULL, NULL),
(46, 43, 2, 50.00, 'cash', 'PAY-1768481997', '2026-01-15', '2026-01-15 11:59:57', '2026-01-15 11:59:57', 'valide', NULL, NULL, NULL),
(47, 43, 2, 20.00, 'cash', 'PAY-1768482011', '2026-01-15', '2026-01-15 12:00:11', '2026-01-15 12:00:11', 'valide', NULL, NULL, NULL),
(48, 29, 2, 1.00, 'cash', 'PAY-1768485970', '2026-01-15', '2026-01-15 13:06:10', '2026-01-15 13:06:10', 'valide', NULL, NULL, NULL),
(49, 29, 2, 4900.00, 'cash', 'PAY-1768486013', '2026-01-15', '2026-01-15 13:06:53', '2026-01-15 13:06:53', 'valide', NULL, NULL, NULL),
(50, 29, 2, 99.00, 'cash', 'PAY-1768486076', '2026-01-15', '2026-01-15 13:07:56', '2026-01-15 13:07:56', 'valide', NULL, NULL, NULL),
(51, 42, 2, 74500.00, 'cash', 'PAY-1768486314', '2026-01-15', '2026-01-15 13:11:54', '2026-01-15 13:11:54', 'valide', NULL, NULL, NULL),
(52, 42, 2, 500.00, 'cash', 'PAY-1768486354', '2026-01-15', '2026-01-15 13:12:34', '2026-01-15 13:12:34', 'valide', NULL, NULL, NULL),
(53, 42, 2, 500.00, 'cash', 'PAY-1768486418', '2026-01-15', '2026-01-15 13:13:38', '2026-01-15 13:13:38', 'valide', NULL, NULL, NULL),
(54, 42, 2, 500.00, 'cash', 'PAY-1768486425', '2026-01-15', '2026-01-15 13:13:45', '2026-01-15 13:13:45', 'valide', NULL, NULL, NULL),
(55, 42, 2, 4000.00, 'cash', 'PAY-1768486488', '2026-01-15', '2026-01-15 13:14:48', '2026-01-15 13:14:48', 'valide', NULL, NULL, NULL),
(56, 42, 2, 1000.00, 'cash', 'PAY-1768486510', '2026-01-15', '2026-01-15 13:15:10', '2026-01-15 13:15:10', 'valide', NULL, NULL, NULL),
(57, 42, 2, 5000.00, 'cash', 'PAY-1768486524', '2026-01-15', '2026-01-15 13:15:24', '2026-01-15 13:15:24', 'valide', NULL, NULL, NULL),
(58, 42, 2, 1000.00, 'cash', 'PAY-1768486543', '2026-01-15', '2026-01-15 13:15:43', '2026-01-15 13:15:43', 'valide', NULL, NULL, NULL),
(59, 42, 2, 1000.00, 'cash', 'PAY-1768486549', '2026-01-15', '2026-01-15 13:15:49', '2026-01-15 14:00:13', 'annule', 'Annulation manuelle', 2, '2026-01-15 14:00:13'),
(60, 42, 2, 1000.00, 'orange_money', 'PAY-1768489244', '2026-01-15', '2026-01-15 14:00:44', '2026-01-15 14:00:44', 'valide', NULL, NULL, NULL),
(61, 44, 2, 400000.00, 'banque', 'PAY-1769007560', '2026-01-21', '2026-01-21 13:59:20', '2026-01-21 13:59:20', 'valide', NULL, NULL, NULL),
(62, 44, 2, 72000.00, 'cash', 'PAY-1769166742', '2026-01-23', '2026-01-23 10:12:22', '2026-01-23 10:12:22', 'valide', NULL, NULL, NULL),
(63, 45, 2, 100000.00, 'wave', 'PAY-1769168610', '2026-01-23', '2026-01-23 10:43:30', '2026-01-23 10:43:30', 'valide', NULL, NULL, NULL),
(64, 46, 10, 147500.00, 'orange_money', 'PAY-1769678828', '2026-01-29', '2026-01-29 08:27:08', '2026-01-29 08:27:08', 'valide', NULL, NULL, NULL),
(65, 45, 2, 6200.00, 'cash', 'PAY-1770044424', '2026-02-02', '2026-02-02 14:00:24', '2026-02-02 14:00:24', 'valide', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `paiement_abonnements`
--

CREATE TABLE `paiement_abonnements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` bigint(20) UNSIGNED NOT NULL,
  `pack_id` bigint(20) UNSIGNED NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL DEFAULT 'en_attente',
  `moyen_paiement` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `paid_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `paiement_abonnements`
--

INSERT INTO `paiement_abonnements` (`id`, `entreprise_id`, `pack_id`, `montant`, `reference`, `statut`, `moyen_paiement`, `created_at`, `updated_at`, `paid_at`) VALUES
(25, 2, 2, 25000.00, 'ABN-20260202130527-6980a1177d314', 'payé', 'wave', '2026-02-02 12:05:27', '2026-02-02 12:05:27', '2026-02-02'),
(26, 12, 1, 15000.00, 'ABN-20260202142152-6980b300d33df', 'en_attente', NULL, '2026-02-02 13:21:52', '2026-02-02 13:21:52', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('gescom@gmail.com', '$2y$12$YBI3Aplbp2dWlLk18uYXlOwDpx4rzP9ED/bCHy1tJJH971JEuqd1i', '2026-01-29 13:45:05');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` bigint(20) UNSIGNED NOT NULL,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `prix_achat` decimal(12,2) NOT NULL DEFAULT 0.00,
  `prix_vente` decimal(12,2) NOT NULL DEFAULT 0.00,
  `stock` int(11) NOT NULL DEFAULT 0,
  `stock_min` int(11) NOT NULL DEFAULT 0,
  `statut` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `entreprise_id`, `fournisseur_id`, `nom`, `code`, `prix_achat`, `prix_vente`, `stock`, `stock_min`, `statut`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'sac de farine', 'PRD-00001', 18000.00, 25000.00, 75, 5, 1, '2025-12-30 13:51:02', '2026-01-23 10:24:15'),
(2, 2, 1, 'chocolat', 'PRD-00002', 6000.00, 7500.00, 74, 10, 1, '2026-01-07 12:42:37', '2026-01-21 13:39:26'),
(3, 2, 2, 'huile vegetal', 'PRD-00003', 20000.00, 27500.00, 15, 5, 1, '2026-01-15 09:21:40', '2026-01-23 10:23:13'),
(4, 10, 6, 'peinture', 'PRD-00001', 400000.00, 25000.00, 15, 5, 1, '2026-01-29 08:25:20', '2026-01-29 08:26:39');

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `montant` decimal(15,2) NOT NULL,
  `date_recette` date NOT NULL,
  `paiement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mode_paiement` enum('cash','wave','orange_money','banque') NOT NULL,
  `statut` enum('recu','annule') NOT NULL DEFAULT 'recu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id`, `entreprise_id`, `user_id`, `reference`, `libelle`, `description`, `montant`, `date_recette`, `paiement_id`, `mode_paiement`, `statut`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'REC-1768471125', 'Paiement vente VNT-1767869376', NULL, 5000.00, '2026-01-15', 24, 'banque', 'recu', '2026-01-15 08:58:45', '2026-01-15 08:58:45'),
(2, 2, 2, 'REC-1768471144', 'Paiement vente VNT-1767869376', NULL, 4000.00, '2026-01-15', 25, 'banque', 'recu', '2026-01-15 08:59:04', '2026-01-15 08:59:04'),
(3, 2, 2, 'REC-1768474819', 'facture internet', 'benefice de vente', 18000.00, '2026-01-14', 2, 'cash', 'recu', '2026-01-15 10:00:19', '2026-01-15 10:00:19'),
(4, 2, 2, 'REC-1768475609', 'Paiement vente VNT-1768475149', NULL, 10000.00, '2026-01-15', 27, 'wave', 'recu', '2026-01-15 10:13:29', '2026-01-15 10:13:29'),
(5, 2, 2, 'REC-1768475618', 'Paiement vente VNT-1768475149', NULL, 10000.00, '2026-01-15', 28, 'cash', 'recu', '2026-01-15 10:13:38', '2026-01-15 10:13:38'),
(6, 2, 2, 'REC-1768477370', 'Paiement vente VNT-1768477265', NULL, 1770000.00, '2026-01-15', 29, 'banque', 'recu', '2026-01-15 10:42:50', '2026-01-15 10:42:50'),
(7, 2, 2, 'REC-1768479096', 'Paiement vente VNT-1768479041', NULL, 500.00, '2026-01-15', 34, 'cash', 'annule', '2026-01-15 11:11:36', '2026-01-15 11:56:10'),
(8, 2, 2, 'REC-1768479155', 'Paiement vente VNT-1768479133', NULL, 6000.00, '2026-01-15', 35, 'cash', 'annule', '2026-01-15 11:12:35', '2026-01-15 11:56:34'),
(9, 2, 2, 'REC-1768481835', 'Paiement vente VNT-1768479133', NULL, 1.00, '2026-01-15', 36, 'cash', 'recu', '2026-01-15 11:57:15', '2026-01-15 11:57:15'),
(10, 2, 2, 'REC-1768481854', 'Paiement vente VNT-1768479133', NULL, 5900.00, '2026-01-15', 37, 'cash', 'recu', '2026-01-15 11:57:34', '2026-01-15 11:57:34'),
(11, 2, 2, 'REC-1768481881', 'Paiement vente VNT-1768479133', NULL, 1.00, '2026-01-15', 38, 'cash', 'recu', '2026-01-15 11:58:01', '2026-01-15 11:58:01'),
(12, 2, 2, 'REC-1768481896', 'Paiement vente VNT-1768479133', NULL, 5.00, '2026-01-15', 39, 'cash', 'recu', '2026-01-15 11:58:16', '2026-01-15 11:58:16'),
(13, 2, 2, 'REC-1768481907', 'Paiement vente VNT-1768479133', NULL, 3.00, '2026-01-15', 40, 'cash', 'recu', '2026-01-15 11:58:27', '2026-01-15 11:58:27'),
(14, 2, 2, 'REC-1768481919', 'Paiement vente VNT-1768479133', NULL, 5.00, '2026-01-15', 41, 'cash', 'recu', '2026-01-15 11:58:39', '2026-01-15 11:58:39'),
(15, 2, 2, 'REC-1768481954', 'Paiement vente VNT-1768479041', NULL, 500.00, '2026-01-15', 42, 'cash', 'recu', '2026-01-15 11:59:14', '2026-01-15 11:59:14'),
(16, 2, 2, 'REC-1768481982', 'Paiement vente VNT-1768479133', NULL, 5.00, '2026-01-15', 43, 'cash', 'recu', '2026-01-15 11:59:42', '2026-01-15 11:59:42'),
(17, 2, 2, 'REC-1768481987', 'Paiement vente VNT-1768479133', NULL, 5.00, '2026-01-15', 44, 'cash', 'recu', '2026-01-15 11:59:47', '2026-01-15 11:59:47'),
(18, 2, 2, 'REC-1768481992', 'Paiement vente VNT-1768479133', NULL, 5.00, '2026-01-15', 45, 'cash', 'recu', '2026-01-15 11:59:52', '2026-01-15 11:59:52'),
(19, 2, 2, 'REC-1768481997', 'Paiement vente VNT-1768479133', NULL, 50.00, '2026-01-15', 46, 'cash', 'recu', '2026-01-15 11:59:57', '2026-01-15 11:59:57'),
(20, 2, 2, 'REC-1768482011', 'Paiement vente VNT-1768479133', NULL, 20.00, '2026-01-15', 47, 'cash', 'recu', '2026-01-15 12:00:11', '2026-01-15 12:00:11'),
(21, 2, 2, 'REC-1768485971', 'Paiement vente VNT-1767869376', NULL, 1.00, '2026-01-15', 48, 'cash', 'recu', '2026-01-15 13:06:11', '2026-01-15 13:06:11'),
(22, 2, 2, 'REC-1768486013', 'Paiement vente VNT-1767869376', NULL, 4900.00, '2026-01-15', 49, 'cash', 'recu', '2026-01-15 13:06:53', '2026-01-15 13:06:53'),
(23, 2, 2, 'REC-1768486076', 'Paiement vente VNT-1767869376', NULL, 99.00, '2026-01-15', 50, 'cash', 'recu', '2026-01-15 13:07:56', '2026-01-15 13:07:56'),
(24, 2, 2, 'REC-1768486314', 'Paiement vente VNT-1768479041', NULL, 74500.00, '2026-01-15', 51, 'cash', 'recu', '2026-01-15 13:11:54', '2026-01-15 13:11:54'),
(25, 2, 2, 'REC-1768486354', 'Paiement vente VNT-1768479041', NULL, 500.00, '2026-01-15', 52, 'cash', 'recu', '2026-01-15 13:12:34', '2026-01-15 13:12:34'),
(26, 2, 2, 'REC-1768486418', 'Paiement vente VNT-1768479041', NULL, 500.00, '2026-01-15', 53, 'cash', 'recu', '2026-01-15 13:13:38', '2026-01-15 13:13:38'),
(27, 2, 2, 'REC-1768486425', 'Paiement vente VNT-1768479041', NULL, 500.00, '2026-01-15', 54, 'cash', 'recu', '2026-01-15 13:13:45', '2026-01-15 13:13:45'),
(28, 2, 2, 'REC-1768486488', 'Paiement vente VNT-1768479041', NULL, 4000.00, '2026-01-15', 55, 'cash', 'recu', '2026-01-15 13:14:48', '2026-01-15 13:14:48'),
(29, 2, 2, 'REC-1768486510', 'Paiement vente VNT-1768479041', NULL, 1000.00, '2026-01-15', 56, 'cash', 'recu', '2026-01-15 13:15:10', '2026-01-15 13:15:10'),
(30, 2, 2, 'REC-1768486524', 'Paiement vente VNT-1768479041', NULL, 5000.00, '2026-01-15', 57, 'cash', 'recu', '2026-01-15 13:15:24', '2026-01-15 13:15:24'),
(31, 2, 2, 'REC-1768486543', 'Paiement vente VNT-1768479041', NULL, 1000.00, '2026-01-15', 58, 'cash', 'recu', '2026-01-15 13:15:43', '2026-01-15 13:15:43'),
(32, 2, 2, 'REC-1768486550', 'Paiement vente VNT-1768479041', NULL, 1000.00, '2026-01-15', 59, 'cash', 'annule', '2026-01-15 13:15:50', '2026-01-15 14:00:14'),
(33, 2, 2, 'REC-1768489244', 'Paiement vente VNT-1768479041', NULL, 1000.00, '2026-01-15', 60, 'orange_money', 'recu', '2026-01-15 14:00:44', '2026-01-15 14:00:44'),
(34, 2, 2, 'REC-1769007560', 'Paiement vente VNT-1769006366', NULL, 400000.00, '2026-01-21', 61, 'banque', 'recu', '2026-01-21 13:59:20', '2026-01-21 13:59:20'),
(35, 2, 2, 'REC-1769166742', 'Paiement vente VNT-1769006366', NULL, 72000.00, '2026-01-23', 62, 'cash', 'recu', '2026-01-23 10:12:22', '2026-01-23 10:12:22'),
(36, 2, 2, 'REC-1769168610', 'Paiement vente VNT-1769076030', NULL, 100000.00, '2026-01-23', 63, 'wave', 'recu', '2026-01-23 10:43:30', '2026-01-23 10:43:30'),
(37, 10, 14, 'REC-1769678828', 'Paiement vente VNT-1769678798', NULL, 147500.00, '2026-01-29', 64, 'orange_money', 'recu', '2026-01-29 08:27:08', '2026-01-29 08:27:08'),
(38, 2, 2, 'REC-1770044424', 'Paiement vente VNT-1769076030', NULL, 6200.00, '2026-02-02', 65, 'cash', 'recu', '2026-02-02 14:00:24', '2026-02-02 14:00:24');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('TiJ4wQcLkGciKXIHC5euKfRcLjzRJPINDue20RZA', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWDdQSUZCT2tiM1EwN0R4SG96UlZ3VjVyUkk2MFo4UVRWWlF3TW5XdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9kYXNoYm9hcmQucmFwcG9ydCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1770214480),
('XDXUTov42bt9gswF8zkTOI6DgU5vc1HIwWsXUGAR', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYWluQ0V5QW8xRjlUZFpUWnNTT2RhTWFFa1pCMjZHRGVudnNDZjI4TyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMS9wcm9maWxlIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1770200560);

-- --------------------------------------------------------

--
-- Structure de la table `stock_mouvements`
--

CREATE TABLE `stock_mouvements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` bigint(20) UNSIGNED NOT NULL,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('entree','sortie') NOT NULL,
  `quantite` int(11) NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `stock_mouvements`
--

INSERT INTO `stock_mouvements` (`id`, `entreprise_id`, `produit_id`, `type`, `quantite`, `reference`, `note`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'entree', 50, 'ENT-1767624882', NULL, 2, '2026-01-05 13:54:42', '2026-01-05 13:54:42'),
(2, 2, 1, 'sortie', 20, 'SRT-1767624903', NULL, 2, '2026-01-05 13:55:03', '2026-01-05 13:55:03'),
(3, 2, 1, 'entree', 20, 'ENT-1767624948', NULL, 2, '2026-01-05 13:55:48', '2026-01-05 13:55:48'),
(4, 2, 1, 'sortie', 30, 'SRT-1767625353', NULL, 2, '2026-01-05 14:02:33', '2026-01-05 14:02:33'),
(5, 2, 1, 'entree', 50, 'ENT-1767625366', NULL, 2, '2026-01-05 14:02:46', '2026-01-05 14:02:46'),
(6, 2, 2, 'entree', 100, 'ENT-1767794187', NULL, 2, '2026-01-07 12:56:27', '2026-01-07 12:56:27'),
(7, 2, 2, 'entree', 200, 'ENT-1767796292', NULL, 2, '2026-01-07 13:31:32', '2026-01-07 13:31:32'),
(8, 2, 2, 'entree', 10, 'ENT-1768207644', NULL, 2, '2026-01-12 07:47:24', '2026-01-12 07:47:24'),
(9, 2, 2, 'entree', 10, 'ENT-1768207729', NULL, 2, '2026-01-12 07:48:49', '2026-01-12 07:48:49'),
(10, 2, 1, 'entree', 10, 'ENT-1768207882', NULL, 2, '2026-01-12 07:51:22', '2026-01-12 07:51:22'),
(11, 2, 1, 'entree', 5, 'ENT-1768207929', NULL, 2, '2026-01-12 07:52:09', '2026-01-12 07:52:09'),
(12, 2, 1, 'entree', 5, 'ENT-1768208497', NULL, 2, '2026-01-12 08:01:37', '2026-01-12 08:01:37'),
(13, 2, 1, 'sortie', 5, 'SRT-1768208572', NULL, 2, '2026-01-12 08:02:52', '2026-01-12 08:02:52'),
(14, 2, 1, 'sortie', 5, 'SRT-1768208617', NULL, 2, '2026-01-12 08:03:37', '2026-01-12 08:03:37'),
(15, 2, 1, 'entree', 20, 'ENT-1768208728', NULL, 2, '2026-01-12 08:05:28', '2026-01-12 08:05:28'),
(16, 2, 1, 'entree', 12, 'ENT-1768208867', NULL, 2, '2026-01-12 08:07:47', '2026-01-12 08:07:47'),
(17, 2, 2, 'sortie', 5, 'SRT-1768208880', NULL, 2, '2026-01-12 08:08:00', '2026-01-12 08:08:00'),
(18, 2, 3, 'entree', 10, 'ENT-1768472528', NULL, 2, '2026-01-15 09:22:08', '2026-01-15 09:22:08'),
(19, 2, 3, 'entree', 30, 'ENT-1768475022', NULL, 2, '2026-01-15 10:03:42', '2026-01-15 10:03:42'),
(20, 2, 3, 'sortie', 5, 'SRT-1768475370', NULL, 2, '2026-01-15 10:09:30', '2026-01-15 10:09:30'),
(21, 2, 2, 'entree', 10, 'ENT-1769006263', NULL, 2, '2026-01-21 13:37:43', '2026-01-21 13:37:43'),
(22, 10, 4, 'entree', 20, 'ENT-1769678748', NULL, 14, '2026-01-29 08:25:48', '2026-01-29 08:25:48');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `entreprise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role` enum('admin','gestionnaire de stock','caissier') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `entreprise_id`, `role`) VALUES
(1, 'Test User', 'test@example.com', '2025-12-29 08:59:13', '$2y$12$abij3sIn3zvKiD1DGMc.SOad6m6P1F1Zlg6bF.Eusv.lebmjpW.bW', 'BvfXei10Et', '2025-12-29 08:59:13', '2025-12-29 08:59:13', NULL, 'admin'),
(2, 'amadou camara', 'gescom@gmail.com', NULL, '$2y$12$4YRsMXvQ013r6y3WOKifputxXCq/AjE7nyeErwSvplZrrpe1LvS7y', NULL, '2025-12-29 10:16:28', '2026-01-26 10:37:29', 2, 'admin'),
(10, 'awa faye', 'fayeva22@gmail.com', NULL, '$2y$12$3PJMbgEGUk1ZY7vOXNoLOOnJHDv63iqoUoqdYA8BGbpuLarOXnFhi', NULL, '2026-01-22 13:13:38', '2026-01-22 13:21:06', 2, 'gestionnaire'),
(14, 'Abdoulaye boye', 'layeboye87@gmail.com', NULL, '$2y$12$hQ1z5.x0ltqAB3By3.9PweqxU0GAQngloH9kBaT0PbOoXXPFpwYjS', NULL, '2026-01-28 10:35:46', '2026-01-29 10:25:20', 10, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

CREATE TABLE `ventes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `total` decimal(12,2) DEFAULT NULL,
  `statut` enum('payee','impayee','partielle') NOT NULL DEFAULT 'impayee',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_tva` decimal(15,2) NOT NULL DEFAULT 0.00,
  `total_ttc` decimal(15,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ventes`
--

INSERT INTO `ventes` (`id`, `entreprise_id`, `client_id`, `reference`, `date`, `total`, `statut`, `user_id`, `created_at`, `updated_at`, `total_tva`, `total_ttc`) VALUES
(29, 2, 1, 'VNT-1767869376', '2026-01-08', 50000.00, 'payee', 2, '2026-01-08 09:49:36', '2026-01-15 13:07:56', 9000.00, 59000.00),
(30, 2, 3, 'VNT-1767872055', '2026-01-08', 30000.00, 'payee', 2, '2026-01-08 10:34:15', '2026-01-08 10:34:15', 5400.00, 35400.00),
(31, 2, 6, 'VNT-1767884228', '2026-01-08', 840000.00, 'payee', 2, '2026-01-08 13:57:08', '2026-01-15 11:44:57', 151200.00, 991200.00),
(34, 2, 15, 'VNT-1768305720', '2026-01-13', 5000.00, 'payee', 2, '2026-01-13 11:02:00', '2026-01-14 07:27:47', 900.00, 5900.00),
(36, 2, 4, 'VNT-1768306083', '2026-01-13', 8000.00, 'payee', 2, '2026-01-13 11:08:03', '2026-01-13 11:20:23', 1440.00, 9440.00),
(37, 2, 21, 'VNT-1768313015', '2026-01-13', 825000.00, 'payee', 2, '2026-01-13 13:03:35', '2026-01-14 07:49:33', 165000.00, 990000.00),
(38, 2, 19, 'VNT-1768313887', '2026-01-13', 350000.00, 'payee', 2, '2026-01-13 13:18:07', '2026-01-14 07:51:31', 63000.00, 413000.00),
(39, 2, 13, 'VNT-1768475149', '2026-01-15', 100000.00, 'payee', 2, '2026-01-15 10:05:49', '2026-01-15 10:13:29', 20000.00, 120000.00),
(40, 2, 4, 'VNT-1768477265', '2026-01-15', 1500000.00, 'payee', 2, '2026-01-15 10:41:05', '2026-01-15 10:41:06', 270000.00, 1770000.00),
(41, 2, 24, 'VNT-1768477480', '2026-01-15', 590000.00, 'payee', 2, '2026-01-15 10:44:40', '2026-01-15 10:44:40', 106200.00, 696200.00),
(42, 2, 26, 'VNT-1768479041', '2026-01-15', 75000.00, 'payee', 2, '2026-01-15 11:10:41', '2026-01-15 14:00:44', 13500.00, 88500.00),
(43, 2, 23, 'VNT-1768479133', '2026-01-15', 5000.00, 'payee', 2, '2026-01-15 11:12:13', '2026-01-15 12:00:11', 1000.00, 6000.00),
(44, 2, 26, 'VNT-1769006366', '2026-01-21', 400000.00, 'payee', 2, '2026-01-21 13:39:26', '2026-01-23 10:12:22', 72000.00, 472000.00),
(45, 2, 10, 'VNT-1769076030', '2026-01-22', 90000.00, 'payee', 2, '2026-01-22 09:00:30', '2026-02-02 14:00:24', 16200.00, 106200.00),
(46, 10, 27, 'VNT-1769678798', '2026-01-29', 125000.00, 'payee', 14, '2026-01-29 08:26:38', '2026-01-29 08:27:08', 22500.00, 147500.00);

-- --------------------------------------------------------

--
-- Structure de la table `vente_items`
--

CREATE TABLE `vente_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entreprise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vente_id` bigint(20) UNSIGNED NOT NULL,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix_unitaire` decimal(10,2) NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `taux_tva` decimal(5,2) NOT NULL DEFAULT 18.00,
  `montant_tva` decimal(15,2) NOT NULL DEFAULT 0.00,
  `total_ttc` decimal(15,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vente_items`
--

INSERT INTO `vente_items` (`id`, `entreprise_id`, `vente_id`, `produit_id`, `quantite`, `prix_unitaire`, `total`, `created_at`, `updated_at`, `taux_tva`, `montant_tva`, `total_ttc`) VALUES
(9, 2, 29, 1, 5, 10000.00, 50000.00, '2026-01-08 09:49:37', '2026-01-08 09:49:37', 18.00, 9000.00, 59000.00),
(10, 2, 30, 2, 5, 6000.00, 30000.00, '2026-01-08 10:34:15', '2026-01-08 10:34:15', 18.00, 5400.00, 35400.00),
(11, 2, 31, 2, 15, 56000.00, 840000.00, '2026-01-08 13:57:08', '2026-01-08 13:57:08', 18.00, 151200.00, 991200.00),
(12, 2, 34, 2, 1, 5000.00, 5000.00, '2026-01-13 11:02:00', '2026-01-13 11:02:00', 18.00, 900.00, 5900.00),
(13, 2, 36, 1, 1, 8000.00, 8000.00, '2026-01-13 11:08:03', '2026-01-13 11:08:03', 20.00, 1600.00, 9600.00),
(14, 2, 37, 1, 15, 55000.00, 825000.00, '2026-01-13 13:03:35', '2026-01-13 13:03:35', 20.00, 165000.00, 990000.00),
(15, 2, 38, 1, 10, 35000.00, 350000.00, '2026-01-13 13:18:07', '2026-01-13 13:18:07', 18.00, 63000.00, 413000.00),
(16, 2, 39, 3, 5, 20000.00, 100000.00, '2026-01-15 10:05:49', '2026-01-15 10:05:49', 20.00, 20000.00, 120000.00),
(17, 2, 40, 3, 10, 150000.00, 1500000.00, '2026-01-15 10:41:05', '2026-01-15 10:41:05', 18.00, 270000.00, 1770000.00),
(18, 2, 41, 2, 10, 59000.00, 590000.00, '2026-01-15 10:44:40', '2026-01-15 10:44:40', 18.00, 106200.00, 696200.00),
(19, 2, 42, 3, 5, 15000.00, 75000.00, '2026-01-15 11:10:41', '2026-01-15 11:10:41', 18.00, 13500.00, 88500.00),
(20, 2, 43, 1, 1, 5000.00, 5000.00, '2026-01-15 11:12:13', '2026-01-15 11:12:13', 20.00, 1000.00, 6000.00),
(21, 2, 44, 2, 20, 20000.00, 400000.00, '2026-01-21 13:39:26', '2026-01-21 13:39:26', 18.00, 72000.00, 472000.00),
(22, 2, 45, 1, 5, 18000.00, 90000.00, '2026-01-22 09:00:31', '2026-01-22 09:00:31', 18.00, 16200.00, 106200.00),
(23, 10, 46, 4, 5, 25000.00, 125000.00, '2026-01-29 08:26:39', '2026-01-29 08:26:39', 18.00, 22500.00, 147500.00);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abonnements_entreprise_id_foreign` (`entreprise_id`),
  ADD KEY `abonnements_packs_id_foreign` (`pack_id`);

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `categorie_depenses`
--
ALTER TABLE `categorie_depenses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_entreprise_id_foreign` (`entreprise_id`);

--
-- Index pour la table `depenses`
--
ALTER TABLE `depenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `depenses_entreprise_id_foreign` (`entreprise_id`),
  ADD KEY `depenses_user_id_foreign` (`user_id`);

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fournisseurs_entreprise_id_foreign` (`entreprise_id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `packs`
--
ALTER TABLE `packs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `paiements_reference_unique` (`reference`),
  ADD KEY `paiements_vente_id_foreign` (`vente_id`),
  ADD KEY `paiements_entreprise_id_foreign` (`entreprise_id`);

--
-- Index pour la table `paiement_abonnements`
--
ALTER TABLE `paiement_abonnements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `paiement_abonnements_reference_unique` (`reference`),
  ADD KEY `paiement_abonnements_entreprise_id_foreign` (`entreprise_id`),
  ADD KEY `paiement_abonnements_pack_id_foreign` (`pack_id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `produits_entreprise_id_code_unique` (`entreprise_id`,`code`),
  ADD KEY `produits_fournisseur_id_foreign` (`fournisseur_id`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recettes_reference_unique` (`reference`),
  ADD KEY `recettes_entreprise_id_foreign` (`entreprise_id`),
  ADD KEY `recettes_user_id_foreign` (`user_id`),
  ADD KEY `recettes_paiement_id_foreign` (`paiement_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `stock_mouvements`
--
ALTER TABLE `stock_mouvements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_mouvements_entreprise_id_foreign` (`entreprise_id`),
  ADD KEY `stock_mouvements_produit_id_foreign` (`produit_id`),
  ADD KEY `stock_mouvements_user_id_foreign` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `ventes`
--
ALTER TABLE `ventes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ventes_reference_unique` (`reference`),
  ADD KEY `ventes_entreprise_id_foreign` (`entreprise_id`),
  ADD KEY `ventes_client_id_foreign` (`client_id`),
  ADD KEY `ventes_user_id_foreign` (`user_id`);

--
-- Index pour la table `vente_items`
--
ALTER TABLE `vente_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vente_items_vente_id_foreign` (`vente_id`),
  ADD KEY `vente_items_produit_id_foreign` (`produit_id`),
  ADD KEY `vente_items_entreprise_id_foreign` (`entreprise_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnements`
--
ALTER TABLE `abonnements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `categorie_depenses`
--
ALTER TABLE `categorie_depenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `depenses`
--
ALTER TABLE `depenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `packs`
--
ALTER TABLE `packs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `paiement_abonnements`
--
ALTER TABLE `paiement_abonnements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `stock_mouvements`
--
ALTER TABLE `stock_mouvements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `ventes`
--
ALTER TABLE `ventes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `vente_items`
--
ALTER TABLE `vente_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD CONSTRAINT `abonnements_entreprise_id_foreign` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `abonnements_packs_id_foreign` FOREIGN KEY (`pack_id`) REFERENCES `packs` (`id`);

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_entreprise_id_foreign` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `depenses`
--
ALTER TABLE `depenses`
  ADD CONSTRAINT `depenses_entreprise_id_foreign` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `depenses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  ADD CONSTRAINT `fournisseurs_entreprise_id_foreign` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `paiements_entreprise_id_foreign` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `paiements_vente_id_foreign` FOREIGN KEY (`vente_id`) REFERENCES `ventes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `paiement_abonnements`
--
ALTER TABLE `paiement_abonnements`
  ADD CONSTRAINT `paiement_abonnements_entreprise_id_foreign` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`),
  ADD CONSTRAINT `paiement_abonnements_pack_id_foreign` FOREIGN KEY (`pack_id`) REFERENCES `packs` (`id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_entreprise_id_foreign` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produits_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD CONSTRAINT `recettes_entreprise_id_foreign` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recettes_paiement_id_foreign` FOREIGN KEY (`paiement_id`) REFERENCES `paiements` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `recettes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `stock_mouvements`
--
ALTER TABLE `stock_mouvements`
  ADD CONSTRAINT `stock_mouvements_entreprise_id_foreign` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_mouvements_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_mouvements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ventes`
--
ALTER TABLE `ventes`
  ADD CONSTRAINT `ventes_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ventes_entreprise_id_foreign` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ventes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `vente_items`
--
ALTER TABLE `vente_items`
  ADD CONSTRAINT `vente_items_entreprise_id_foreign` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vente_items_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vente_items_vente_id_foreign` FOREIGN KEY (`vente_id`) REFERENCES `ventes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
