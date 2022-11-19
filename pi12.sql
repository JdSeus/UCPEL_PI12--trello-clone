-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Nov-2022 às 19:46
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pi12`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `boards`
--

CREATE TABLE `boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `boards`
--

INSERT INTO `boards` (`id`, `title`, `created_at`, `updated_at`) VALUES
(17, 'Teste A', '2022-11-15 17:29:22', '2022-11-15 17:35:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `board_client`
--

CREATE TABLE `board_client` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `board_id` bigint(20) DEFAULT NULL,
  `client_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `board_client`
--

INSERT INTO `board_client` (`id`, `board_id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 4, 2, NULL, NULL),
(2, 9, 1, NULL, NULL),
(3, 10, 1, NULL, NULL),
(4, 11, 1, NULL, NULL),
(5, 12, 1, NULL, NULL),
(6, 13, 1, NULL, NULL),
(7, 14, 1, NULL, NULL),
(8, 15, 1, NULL, NULL),
(9, 16, 1, NULL, NULL),
(10, 17, 1, NULL, NULL),
(11, 18, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cards`
--

CREATE TABLE `cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `column_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(2, NULL, 1, 'Category 2', 'category-2', '2022-11-08 04:16:26', '2022-11-08 04:16:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Teste', 'teste@teste.com', NULL, '$2y$10$r9WuFJpcYVJmDkMlOQdGFeJiNbbbovv0IXPmMIydNkiik9G5SWx/m', NULL, '2022-11-08 23:37:31', '2022-11-08 23:37:31', NULL),
(2, 'Teste', 'teste1@teste.com', NULL, '$2y$10$8wcEZvX.E3TKo/b2NZ76beizVkwemXnpFTM4I4jPvA1E16LkLxuQm', NULL, '2022-11-12 16:48:43', '2022-11-12 18:08:55', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `columns`
--

CREATE TABLE `columns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `board_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `columns`
--

INSERT INTO `columns` (`id`, `board_id`, `title`, `created_at`, `updated_at`, `order`) VALUES
(52, 17, 'Coluna A', '2022-11-19 18:23:00', '2022-11-19 18:38:55', 3),
(56, 17, 'Coluna B', '2022-11-19 18:32:59', '2022-11-19 18:46:23', 4),
(60, 17, 'Coluna C', '2022-11-19 18:46:26', '2022-11-19 18:46:37', 5),
(61, 17, 'Coluna D', '2022-11-19 18:46:28', '2022-11-19 18:46:42', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `card_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(57, 8, 'title', 'text', 'Título', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"max:255\",\"messages\":{\"max\":\"O campo :attribute deve ter no m\\u00e1ximo :max caracteres.\"}}}', 3),
(58, 8, 'created_at', 'timestamp', 'Criado em', 0, 1, 1, 1, 0, 1, '{}', 4),
(59, 8, 'updated_at', 'timestamp', 'Atualizado em', 0, 0, 0, 0, 0, 0, '{}', 5),
(60, 8, 'board_belongstomany_client_relationship', 'relationship', 'Clientes', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Client\",\"table\":\"clients\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"email\",\"pivot_table\":\"board_client\",\"pivot\":\"1\",\"taggable\":\"0\"}', 2),
(61, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(62, 10, 'board_id', 'text', 'Quadro', 0, 1, 1, 1, 1, 1, '{}', 2),
(63, 10, 'title', 'text', 'Título', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"max:255\",\"messages\":{\"max\":\"O campo :attribute deve ter no m\\u00e1ximo :max caracteres.\"}}}', 5),
(64, 10, 'created_at', 'timestamp', 'Criado em', 0, 1, 1, 1, 0, 1, '{}', 6),
(65, 10, 'updated_at', 'timestamp', 'Atualizado em', 0, 0, 0, 0, 0, 0, '{}', 7),
(66, 10, 'column_belongsto_board_relationship', 'relationship', 'Quadro', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Board\",\"table\":\"boards\",\"type\":\"belongsTo\",\"column\":\"board_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"board_client\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(67, 13, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(68, 13, 'column_id', 'text', 'Coluna', 0, 1, 1, 1, 1, 1, '{}', 2),
(69, 13, 'date', 'date', 'Data', 0, 1, 1, 1, 1, 1, '{}', 4),
(70, 13, 'title', 'text', 'Título', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"max:255\",\"messages\":{\"max\":\"O campo :attribute deve ter no m\\u00e1ximo :max caracteres.\"}}}', 5),
(71, 13, 'description', 'rich_text_box', 'Descrição', 0, 1, 1, 1, 1, 1, '{}', 6),
(72, 13, 'created_at', 'timestamp', 'Criado em', 0, 1, 1, 1, 0, 1, '{}', 7),
(73, 13, 'updated_at', 'timestamp', 'Atualizado em', 0, 0, 0, 0, 0, 0, '{}', 8),
(74, 13, 'card_belongsto_column_relationship', 'relationship', 'Coluna', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Column\",\"table\":\"columns\",\"type\":\"belongsTo\",\"column\":\"column_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"board_client\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(75, 14, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(76, 14, 'client_id', 'text', 'Cliente', 0, 1, 1, 1, 1, 1, '{}', 2),
(77, 14, 'date', 'date', 'Data', 0, 1, 1, 1, 1, 1, '{}', 6),
(78, 14, 'description', 'rich_text_box', 'Descrição', 0, 1, 1, 1, 1, 1, '{}', 7),
(79, 14, 'created_at', 'timestamp', 'Criado em', 0, 1, 1, 1, 0, 1, '{}', 8),
(80, 14, 'updated_at', 'timestamp', 'Atualizado em', 0, 0, 0, 0, 0, 0, '{}', 9),
(81, 14, 'comment_belongsto_client_relationship', 'relationship', 'Cliente', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Client\",\"table\":\"clients\",\"type\":\"belongsTo\",\"column\":\"client_id\",\"key\":\"id\",\"label\":\"email\",\"pivot_table\":\"board_client\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(82, 15, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(83, 15, 'name', 'text', 'Nome', 1, 1, 1, 1, 1, 1, '{}', 2),
(84, 15, 'email', 'text', 'E-mail', 1, 1, 1, 1, 1, 1, '{}', 3),
(85, 15, 'email_verified_at', 'timestamp', 'E-mail Verificado em', 0, 0, 0, 1, 1, 1, '{}', 4),
(86, 15, 'password', 'text', 'Senha', 1, 0, 0, 1, 1, 1, '{}', 5),
(87, 15, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 1, 1, 1, '{}', 6),
(88, 15, 'created_at', 'timestamp', 'Criado em', 0, 1, 1, 1, 0, 1, '{}', 7),
(89, 15, 'updated_at', 'timestamp', 'Atualizado em', 0, 0, 0, 0, 0, 0, '{}', 8),
(90, 15, 'deleted_at', 'timestamp', 'Deletado em', 0, 1, 1, 1, 1, 1, '{}', 9),
(91, 14, 'card_id', 'text', 'Card', 0, 1, 1, 1, 1, 1, '{}', 4),
(92, 14, 'comment_belongsto_card_relationship', 'relationship', 'Card', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Card\",\"table\":\"cards\",\"type\":\"belongsTo\",\"column\":\"card_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"board_client\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(93, 10, 'order', 'number', 'Ordem', 0, 1, 1, 1, 1, 1, '{}', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2022-11-08 04:16:25', '2022-11-08 04:16:25'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2022-11-08 04:16:25', '2022-11-08 04:16:25'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2022-11-08 04:16:25', '2022-11-08 04:16:25'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(8, 'boards', 'boards', 'Quadro', 'Quadros', NULL, 'App\\Models\\Board', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-11-12 17:09:14', '2022-11-12 17:16:00'),
(10, 'columns', 'columns', 'Coluna', 'Colunas', NULL, 'App\\Models\\Column', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"id\",\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-11-12 17:25:53', '2022-11-19 18:39:29'),
(12, 'card', 'card', 'Card', 'Cards', NULL, 'App\\Models\\Card', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2022-11-12 17:45:42', '2022-11-12 17:45:42'),
(13, 'cards', 'cards', 'Card', 'Cards', NULL, 'App\\Models\\Card', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-11-12 17:47:49', '2022-11-12 17:49:24'),
(14, 'comments', 'comments', 'Comentário', 'Comentários', NULL, 'App\\Models\\Comment', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-11-12 17:57:40', '2022-11-12 18:06:51'),
(15, 'clients', 'clients', 'Cliente', 'Clientes', NULL, 'App\\Models\\Client', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-11-12 18:00:11', '2022-11-12 18:01:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-11-08 04:16:25', '2022-11-08 04:16:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Painel Administrativo', '', '_self', 'voyager-boat', NULL, NULL, 1, '2022-11-08 04:16:25', '2022-11-08 04:16:25', 'voyager.dashboard', NULL),
(2, 1, 'Mídia', '', '_self', 'voyager-images', NULL, NULL, 4, '2022-11-08 04:16:25', '2022-11-08 01:27:23', 'voyager.media.index', NULL),
(3, 1, 'Usuários', '', '_self', 'voyager-person', NULL, NULL, 3, '2022-11-08 04:16:25', '2022-11-08 04:16:25', 'voyager.users.index', NULL),
(4, 1, 'Funções', '', '_self', 'voyager-lock', NULL, NULL, 2, '2022-11-08 04:16:25', '2022-11-08 04:16:25', 'voyager.roles.index', NULL),
(5, 1, 'Ferramentas', '', '_self', 'voyager-tools', NULL, NULL, 8, '2022-11-08 04:16:25', '2022-11-08 01:27:23', NULL, NULL),
(6, 1, 'Construtor de Menu', '', '_self', 'voyager-list', NULL, 5, 1, '2022-11-08 04:16:26', '2022-11-08 01:27:23', 'voyager.menus.index', NULL),
(7, 1, 'Base de Dados', '', '_self', 'voyager-data', NULL, 5, 2, '2022-11-08 04:16:26', '2022-11-08 01:27:23', 'voyager.database.index', NULL),
(8, 1, 'Bússola', '', '_self', 'voyager-compass', NULL, 5, 3, '2022-11-08 04:16:26', '2022-11-08 01:27:23', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2022-11-08 04:16:26', '2022-11-08 01:27:23', 'voyager.bread.index', NULL),
(10, 1, 'Configurações', '', '_self', 'voyager-settings', NULL, NULL, 9, '2022-11-08 04:16:26', '2022-11-08 01:27:26', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 7, '2022-11-08 04:16:26', '2022-11-08 01:27:23', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 5, '2022-11-08 04:16:26', '2022-11-08 01:27:23', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 6, '2022-11-08 04:16:26', '2022-11-08 01:27:23', 'voyager.pages.index', NULL),
(14, 1, 'Quadros', '', '_self', 'voyager-browser', '#ffa50a', NULL, 11, '2022-11-12 17:09:14', '2022-11-12 18:00:52', 'voyager.boards.index', 'null'),
(15, 1, 'Colunas', '', '_self', 'voyager-bookmark', '#f23a3a', NULL, 12, '2022-11-12 17:25:53', '2022-11-12 18:00:52', 'voyager.columns.index', 'null'),
(18, 1, 'Cards', '', '_self', 'voyager-tag', '#fcff42', NULL, 13, '2022-11-12 17:47:49', '2022-11-12 18:00:52', 'voyager.cards.index', 'null'),
(19, 1, 'Comentários', '', '_self', 'voyager-bubble', '#0afffb', NULL, 14, '2022-11-12 17:57:40', '2022-11-12 18:02:50', 'voyager.comments.index', 'null'),
(20, 1, 'Clientes', '', '_self', 'voyager-person', '#14ff3b', NULL, 10, '2022-11-12 18:00:11', '2022-11-12 18:01:23', 'voyager.clients.index', 'null');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2016_01_01_000000_create_pages_table', 2),
(26, '2016_01_01_000000_create_posts_table', 2),
(27, '2016_02_15_204651_create_categories_table', 2),
(28, '2017_04_11_000000_alter_post_nullable_fields_table', 2),
(32, '2022_11_08_202640_create_clients_table', 3),
(33, '2022_11_12_140437_create_boards_table', 4),
(35, '2022_11_12_141052_create_board_client_table', 5),
(36, '2022_11_12_141939_create_columns_table', 6),
(39, '2022_11_12_143951_create_cards_table', 7),
(42, '2022_11_12_145421_create_comments_table', 8),
(43, '2022_11_19_153426_add_order_to_columns_table', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2022-11-08 04:16:26', '2022-11-08 04:16:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(2, 'browse_bread', NULL, '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(3, 'browse_database', NULL, '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(4, 'browse_media', NULL, '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(5, 'browse_compass', NULL, '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(6, 'browse_menus', 'menus', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(7, 'read_menus', 'menus', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(8, 'edit_menus', 'menus', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(9, 'add_menus', 'menus', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(10, 'delete_menus', 'menus', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(11, 'browse_roles', 'roles', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(12, 'read_roles', 'roles', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(13, 'edit_roles', 'roles', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(14, 'add_roles', 'roles', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(15, 'delete_roles', 'roles', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(16, 'browse_users', 'users', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(17, 'read_users', 'users', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(18, 'edit_users', 'users', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(19, 'add_users', 'users', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(20, 'delete_users', 'users', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(21, 'browse_settings', 'settings', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(22, 'read_settings', 'settings', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(23, 'edit_settings', 'settings', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(24, 'add_settings', 'settings', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(25, 'delete_settings', 'settings', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(26, 'browse_categories', 'categories', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(27, 'read_categories', 'categories', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(28, 'edit_categories', 'categories', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(29, 'add_categories', 'categories', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(30, 'delete_categories', 'categories', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(31, 'browse_posts', 'posts', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(32, 'read_posts', 'posts', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(33, 'edit_posts', 'posts', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(34, 'add_posts', 'posts', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(35, 'delete_posts', 'posts', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(36, 'browse_pages', 'pages', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(37, 'read_pages', 'pages', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(38, 'edit_pages', 'pages', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(39, 'add_pages', 'pages', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(40, 'delete_pages', 'pages', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(41, 'browse_boards', 'boards', '2022-11-12 17:09:14', '2022-11-12 17:09:14'),
(42, 'read_boards', 'boards', '2022-11-12 17:09:14', '2022-11-12 17:09:14'),
(43, 'edit_boards', 'boards', '2022-11-12 17:09:14', '2022-11-12 17:09:14'),
(44, 'add_boards', 'boards', '2022-11-12 17:09:14', '2022-11-12 17:09:14'),
(45, 'delete_boards', 'boards', '2022-11-12 17:09:14', '2022-11-12 17:09:14'),
(46, 'browse_columns', 'columns', '2022-11-12 17:25:53', '2022-11-12 17:25:53'),
(47, 'read_columns', 'columns', '2022-11-12 17:25:53', '2022-11-12 17:25:53'),
(48, 'edit_columns', 'columns', '2022-11-12 17:25:53', '2022-11-12 17:25:53'),
(49, 'add_columns', 'columns', '2022-11-12 17:25:53', '2022-11-12 17:25:53'),
(50, 'delete_columns', 'columns', '2022-11-12 17:25:53', '2022-11-12 17:25:53'),
(56, 'browse_card', 'card', '2022-11-12 17:45:42', '2022-11-12 17:45:42'),
(57, 'read_card', 'card', '2022-11-12 17:45:42', '2022-11-12 17:45:42'),
(58, 'edit_card', 'card', '2022-11-12 17:45:42', '2022-11-12 17:45:42'),
(59, 'add_card', 'card', '2022-11-12 17:45:42', '2022-11-12 17:45:42'),
(60, 'delete_card', 'card', '2022-11-12 17:45:42', '2022-11-12 17:45:42'),
(61, 'browse_cards', 'cards', '2022-11-12 17:47:49', '2022-11-12 17:47:49'),
(62, 'read_cards', 'cards', '2022-11-12 17:47:49', '2022-11-12 17:47:49'),
(63, 'edit_cards', 'cards', '2022-11-12 17:47:49', '2022-11-12 17:47:49'),
(64, 'add_cards', 'cards', '2022-11-12 17:47:49', '2022-11-12 17:47:49'),
(65, 'delete_cards', 'cards', '2022-11-12 17:47:49', '2022-11-12 17:47:49'),
(66, 'browse_comments', 'comments', '2022-11-12 17:57:40', '2022-11-12 17:57:40'),
(67, 'read_comments', 'comments', '2022-11-12 17:57:40', '2022-11-12 17:57:40'),
(68, 'edit_comments', 'comments', '2022-11-12 17:57:40', '2022-11-12 17:57:40'),
(69, 'add_comments', 'comments', '2022-11-12 17:57:40', '2022-11-12 17:57:40'),
(70, 'delete_comments', 'comments', '2022-11-12 17:57:40', '2022-11-12 17:57:40'),
(71, 'browse_clients', 'clients', '2022-11-12 18:00:11', '2022-11-12 18:00:11'),
(72, 'read_clients', 'clients', '2022-11-12 18:00:11', '2022-11-12 18:00:11'),
(73, 'edit_clients', 'clients', '2022-11-12 18:00:11', '2022-11-12 18:00:11'),
(74, 'add_clients', 'clients', '2022-11-12 18:00:11', '2022-11-12 18:00:11'),
(75, 'delete_clients', 'clients', '2022-11-12 18:00:11', '2022-11-12 18:00:11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(75, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-11-08 04:16:26', '2022-11-08 04:16:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(2, 'user', 'Normal User', '2022-11-08 04:16:26', '2022-11-08 04:16:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2022-11-08 04:16:26', '2022-11-08 04:16:26'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2022-11-08 04:16:26', '2022-11-08 04:16:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$SoUk0lsYHO87NN8ZwU3SDeiKT4mKL7ikwZKum.32xD4t4LSY3wD1K', 'nvo4w750XXkSkWLWT3NtlKVFePfByddsV1VeVVomUUlNaPwQinVfT26ClsiZ', '{\"locale\":\"pt_br\"}', '2022-11-08 04:16:26', '2022-11-08 01:25:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `board_client`
--
ALTER TABLE `board_client`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cards_column_id_foreign` (`column_id`);

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Índices para tabela `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Índices para tabela `columns`
--
ALTER TABLE `columns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `columns_board_id_foreign` (`board_id`);

--
-- Índices para tabela `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_client_id_foreign` (`client_id`),
  ADD KEY `comments_card_id_foreign` (`card_id`);

--
-- Índices para tabela `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Índices para tabela `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Índices para tabela `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Índices para tabela `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Índices para tabela `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Índices para tabela `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Índices para tabela `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Índices para tabela `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `boards`
--
ALTER TABLE `boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `board_client`
--
ALTER TABLE `board_client`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `cards`
--
ALTER TABLE `cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `columns`
--
ALTER TABLE `columns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de tabela `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_column_id_foreign` FOREIGN KEY (`column_id`) REFERENCES `columns` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limitadores para a tabela `columns`
--
ALTER TABLE `columns`
  ADD CONSTRAINT `columns_board_id_foreign` FOREIGN KEY (`board_id`) REFERENCES `boards` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_card_id_foreign` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL;

--
-- Limitadores para a tabela `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Limitadores para a tabela `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
