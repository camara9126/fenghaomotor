-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 13 fév. 2026 à 09:48
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
-- Base de données : `fenghaomotor`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'electricite', '2026-02-12 08:44:22', '2026-02-12 08:44:22'),
(2, 'internet', '2026-02-12 08:44:22', '2026-02-12 08:44:22'),
(3, 'loyers', '2026-02-12 11:36:20', '2026-02-12 11:36:20'),
(4, 'eau', '2026-02-12 11:36:20', '2026-02-12 11:36:20'),
(5, 'autres', '2026-02-12 11:36:20', '2026-02-12 11:36:20'),
(6, 'salaires', '2026-02-12 11:36:20', '2026-02-12 11:36:20'),
(7, 'equipements', '2026-02-12 11:36:20', '2026-02-12 11:36:20'),
(8, 'marketing', '2026-02-12 11:36:20', '2026-02-12 11:36:20'),
(9, 'services', '2026-02-12 11:36:20', '2026-02-12 11:36:20'),
(10, 'assurances', '2026-02-12 11:36:20', '2026-02-12 11:36:20'),
(11, 'deplacemments', '2026-02-12 11:36:20', '2026-02-12 11:36:20');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `clients` (`id`, `nom`, `telephone`, `email`, `adresse`, `created_at`, `updated_at`) VALUES
(1, 'baye mor', '788459220', NULL, NULL, '2026-02-10 11:32:23', '2026-02-10 11:32:23'),
(2, 'saliou sy', '776003468', NULL, NULL, '2026-02-11 12:56:02', '2026-02-11 12:56:02');

-- --------------------------------------------------------

--
-- Structure de la table `depenses`
--

CREATE TABLE `depenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `montant` decimal(15,2) NOT NULL,
  `date_depense` date NOT NULL,
  `categorie_depense_id` bigint(20) UNSIGNED NOT NULL,
  `mode_paiement` enum('cash','orange_money','wave','banque') NOT NULL,
  `statut` enum('recu','annule') NOT NULL DEFAULT 'recu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `depenses`
--

INSERT INTO `depenses` (`id`, `user_id`, `reference`, `libelle`, `description`, `montant`, `date_depense`, `categorie_depense_id`, `mode_paiement`, `statut`, `created_at`, `updated_at`) VALUES
(1, 1, 'DEP-1770885976', 'facture internet', NULL, 25000.00, '2026-02-12', 2, 'orange_money', 'recu', '2026-02-12 07:46:16', '2026-02-12 07:46:16');

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
  `taux_tva` decimal(5,2) NOT NULL DEFAULT 18.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprises`
--

INSERT INTO `entreprises` (`id`, `nom`, `telephone`, `adresse`, `devise`, `statut`, `created_at`, `updated_at`, `logo`, `taux_tva`) VALUES
(1, 'Fenghao Motor SN', '771871814', 'Pikine-Sor, Saint-Louis, SENEGAL', 'XOF', 1, '2026-02-10 10:20:24', '2026-02-10 11:04:18', NULL, 18.00);

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

INSERT INTO `fournisseurs` (`id`, `nom`, `telephone`, `email`, `adresse`, `statut`, `created_at`, `updated_at`) VALUES
(1, 'Alibaba', '3345677976', 'alibaba@gmail.com', NULL, 1, '2026-02-10 11:30:41', '2026-02-10 11:30:41');

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
(4, '2025_12_29_112251_add_role_to_users_table', 1),
(5, '2025_12_29_124455_create_entreprises_table', 1),
(6, '2025_12_30_094258_create_fournisseurs_table', 1),
(7, '2025_12_30_125845_create_produits_table', 1),
(8, '2026_01_02_100741_add_logo_to_entreprises_table', 1),
(9, '2026_01_05_094558_create_stock_mouvements_table', 1),
(10, '2026_01_06_115521_create_clients_table', 1),
(11, '2026_01_06_120613_create_ventes_table', 1),
(12, '2026_01_06_120749_create_vente_items_table', 1),
(13, '2026_01_08_094052_add_multiple_columns_to_ventes_table', 1),
(14, '2026_01_08_094438_add_multiple_columns_to_vente_items_table', 1),
(15, '2026_01_13_093713_create_paiements_table', 1),
(16, '2026_01_13_143328_add_multiple_columns_to_paiements_table', 1),
(17, '2026_01_14_103721_create_categorie_depenses_table', 1),
(18, '2026_01_19_122321_create_recettes_table', 2),
(19, '2026_01_22_085735_add_taux_tva_to_entreprises_table', 2),
(20, '2026_02_10_095133_create_depenses_table', 3);

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vente_id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `paiements` (`id`, `vente_id`, `montant`, `mode_paiement`, `reference`, `date_paiement`, `created_at`, `updated_at`, `statut`, `motif`, `annule_par`, `annule_le`) VALUES
(1, 1, 450000.00, 'cash', 'PAY-1770726915', '2026-02-10', '2026-02-10 11:35:15', '2026-02-10 11:35:15', 'valide', NULL, NULL, NULL),
(2, 1, 81000.00, 'wave', 'PAY-1770726943', '2026-02-10', '2026-02-10 11:35:43', '2026-02-10 11:35:43', 'valide', NULL, NULL, NULL),
(3, 2, 1000000.00, 'banque', 'PAY-1770818268', '2026-02-11', '2026-02-11 12:57:48', '2026-02-11 12:57:48', 'valide', NULL, NULL, NULL),
(4, 2, 62000.00, 'cash', 'PAY-1770818471', '2026-02-11', '2026-02-11 13:01:11', '2026-02-11 13:03:42', 'annule', 'Annulation manuelle', 1, '2026-02-11 13:03:42'),
(5, 2, 62000.00, 'orange_money', 'PAY-1770818635', '2026-02-11', '2026-02-11 13:03:55', '2026-02-11 13:03:55', 'valide', NULL, NULL, NULL),
(6, 3, 400000.00, 'cash', 'PAY-1770899777', '2026-02-12', '2026-02-12 11:36:17', '2026-02-12 11:36:17', 'valide', NULL, NULL, NULL),
(7, 4, 420000.00, 'banque', 'PAY-1770904275', '2026-02-12', '2026-02-12 12:51:15', '2026-02-12 12:51:15', 'valide', NULL, NULL, NULL),
(8, 5, 420000.00, 'cash', 'PAY-1770904575', '2026-02-12', '2026-02-12 12:56:15', '2026-02-12 12:56:15', 'valide', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `produits` (`id`, `fournisseur_id`, `nom`, `code`, `prix_achat`, `prix_vente`, `stock`, `stock_min`, `statut`, `created_at`, `updated_at`) VALUES
(1, 1, 'jakarta', 'PRD-00001', 315000.00, 450000.00, 10, 5, 1, '2026-02-10 11:31:35', '2026-02-12 11:36:55'),
(2, 1, 'scooter', 'PRD-00002', 300000.00, 420000.00, 15, 5, 1, '2026-02-12 12:50:08', '2026-02-12 12:56:00'),
(3, 1, 'yamaha', 'PRD-00003', 550000.00, 700000.00, 0, 5, 1, '2026-02-12 13:38:47', '2026-02-12 13:38:47');

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(255) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `montant` decimal(15,2) NOT NULL,
  `date_recette` date NOT NULL,
  `paiement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mode_paiement` enum('cash','orange_money','wave','banque') NOT NULL,
  `statut` enum('recu','annule') NOT NULL DEFAULT 'recu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id`, `user_id`, `reference`, `libelle`, `description`, `montant`, `date_recette`, `paiement_id`, `mode_paiement`, `statut`, `created_at`, `updated_at`) VALUES
(1, 1, 'REC-1770726915', 'Paiement vente VNT-1770726879', NULL, 450000.00, '2026-02-10', 1, 'cash', 'recu', '2026-02-10 11:35:15', '2026-02-10 11:35:15'),
(2, 1, 'REC-1770818636', 'Paiement vente VNT-1770818203', NULL, 62000.00, '2026-02-11', 5, 'orange_money', 'recu', '2026-02-11 13:03:56', '2026-02-11 13:03:56'),
(3, 1, 'REC-1770899777', 'Paiement vente VNT-1770897588', NULL, 400000.00, '2026-02-12', 6, 'cash', 'recu', '2026-02-12 11:36:18', '2026-02-12 11:36:18'),
(4, 1, 'REC-1770904275', 'Paiement vente VNT-1770904252', NULL, 420000.00, '2026-02-12', 7, 'banque', 'recu', '2026-02-12 12:51:15', '2026-02-12 12:51:15'),
(5, 1, 'REC-1770904575', 'Paiement vente VNT-1770904560', NULL, 420000.00, '2026-02-12', 8, 'cash', 'recu', '2026-02-12 12:56:15', '2026-02-12 12:56:15');

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
('COONcVaVO3PqWn6V114IiwtRZazIRBSpIHuM1vWC', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicDhqdDVRYXpBcFJPNFZOalE3eXpuUkVOSk9KRDBJbGNNZXdFMzNDbyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1770909062),
('YAwAjxRebCL40ZudjsISuN8IKtmhq2NUFulvliD4', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSXBvNjl2VlV1ZGszWWpFeG9KTk1Oa3hXV04yZHFENVozeTNocmwzTyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY29tcHRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1770972435);

-- --------------------------------------------------------

--
-- Structure de la table `stock_mouvements`
--

CREATE TABLE `stock_mouvements` (
  `id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `stock_mouvements` (`id`, `produit_id`, `type`, `quantite`, `reference`, `note`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'entree', 10, 'ENT-1770726859', NULL, 1, '2026-02-10 11:34:19', '2026-02-10 11:34:19'),
(2, 1, 'sortie', 1, 'SRT-1770727555', NULL, 1, '2026-02-10 11:45:55', '2026-02-10 11:45:55'),
(3, 1, 'entree', 5, 'ENT-1770899815', NULL, 1, '2026-02-12 11:36:55', '2026-02-12 11:36:55'),
(4, 2, 'entree', 15, 'ENT-1770904231', NULL, 1, '2026-02-12 12:50:31', '2026-02-12 12:50:31');

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
  `role` enum('administrateur','gestionnaire de stock','caissier') NOT NULL,
  `entreprise_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `entreprise_id`) VALUES
(1, 'amadou camara', 'contact@fenghaomotorsn.com', NULL, '$2y$12$xwEUDfzu8LeWL4PFvibCOuwUhzX50rterNfdoXZTMvBkAnR4ZeDY.', NULL, '2026-02-10 10:20:25', '2026-02-10 10:20:25', 'administrateur', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

CREATE TABLE `ventes` (
  `id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `ventes` (`id`, `client_id`, `reference`, `date`, `total`, `statut`, `user_id`, `created_at`, `updated_at`, `total_tva`, `total_ttc`) VALUES
(1, 1, 'VNT-1770726879', '2026-02-10', 450000.00, 'payee', 1, '2026-02-10 11:34:39', '2026-02-10 11:35:43', 81000.00, 531000.00),
(2, 2, 'VNT-1770818203', '2026-02-11', 900000.00, 'payee', 1, '2026-02-11 12:56:43', '2026-02-11 13:03:56', 162000.00, 1062000.00),
(3, 2, 'VNT-1770897588', '2026-02-12', 450000.00, 'partielle', 1, '2026-02-12 10:59:48', '2026-02-12 11:36:17', 81000.00, 531000.00),
(4, 2, 'VNT-1770904252', '2026-02-12', 420000.00, 'payee', 1, '2026-02-12 12:50:52', '2026-02-12 12:51:15', 75600.00, 495600.00),
(5, 2, 'VNT-1770904560', '2026-02-12', 420000.00, 'payee', 1, '2026-02-12 12:56:00', '2026-02-12 12:56:15', 75600.00, 495600.00);

-- --------------------------------------------------------

--
-- Structure de la table `vente_items`
--

CREATE TABLE `vente_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `vente_items` (`id`, `vente_id`, `produit_id`, `quantite`, `prix_unitaire`, `total`, `created_at`, `updated_at`, `taux_tva`, `montant_tva`, `total_ttc`) VALUES
(1, 1, 1, 1, 450000.00, 450000.00, '2026-02-10 11:34:39', '2026-02-10 11:34:39', 18.00, 81000.00, 531000.00),
(2, 2, 1, 2, 450000.00, 900000.00, '2026-02-11 12:56:43', '2026-02-11 12:56:43', 18.00, 162000.00, 1062000.00),
(3, 3, 1, 1, 450000.00, 450000.00, '2026-02-12 10:59:48', '2026-02-12 10:59:48', 18.00, 81000.00, 531000.00),
(4, 4, 2, 1, 420000.00, 420000.00, '2026-02-12 12:50:53', '2026-02-12 12:50:53', 18.00, 75600.00, 495600.00),
(5, 5, 2, 1, 420000.00, 420000.00, '2026-02-12 12:56:00', '2026-02-12 12:56:00', 18.00, 75600.00, 495600.00);

--
-- Index pour les tables déchargées
--

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
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `depenses`
--
ALTER TABLE `depenses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `depenses_reference_unique` (`reference`),
  ADD KEY `depenses_user_id_foreign` (`user_id`),
  ADD KEY `depenses_categorie_depense_id_foreign` (`categorie_depense_id`);

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
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `paiements_reference_unique` (`reference`),
  ADD KEY `paiements_vente_id_foreign` (`vente_id`);

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
  ADD KEY `produits_fournisseur_id_foreign` (`fournisseur_id`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recettes_reference_unique` (`reference`),
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
  ADD KEY `ventes_client_id_foreign` (`client_id`),
  ADD KEY `ventes_user_id_foreign` (`user_id`);

--
-- Index pour la table `vente_items`
--
ALTER TABLE `vente_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vente_items_vente_id_foreign` (`vente_id`),
  ADD KEY `vente_items_produit_id_foreign` (`produit_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie_depenses`
--
ALTER TABLE `categorie_depenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `depenses`
--
ALTER TABLE `depenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fournisseurs`
--
ALTER TABLE `fournisseurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `stock_mouvements`
--
ALTER TABLE `stock_mouvements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ventes`
--
ALTER TABLE `ventes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `vente_items`
--
ALTER TABLE `vente_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `depenses`
--
ALTER TABLE `depenses`
  ADD CONSTRAINT `depenses_categorie_depense_id_foreign` FOREIGN KEY (`categorie_depense_id`) REFERENCES `categorie_depenses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `depenses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `paiements_vente_id_foreign` FOREIGN KEY (`vente_id`) REFERENCES `ventes` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_fournisseur_id_foreign` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD CONSTRAINT `recettes_paiement_id_foreign` FOREIGN KEY (`paiement_id`) REFERENCES `paiements` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `recettes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `stock_mouvements`
--
ALTER TABLE `stock_mouvements`
  ADD CONSTRAINT `stock_mouvements_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_mouvements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ventes`
--
ALTER TABLE `ventes`
  ADD CONSTRAINT `ventes_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ventes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `vente_items`
--
ALTER TABLE `vente_items`
  ADD CONSTRAINT `vente_items_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vente_items_vente_id_foreign` FOREIGN KEY (`vente_id`) REFERENCES `ventes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
