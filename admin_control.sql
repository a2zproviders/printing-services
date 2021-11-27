-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 09:53 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_control`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(20) DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_10_11_120828_create_roles_table', 1),
(9, '2020_10_12_000000_create_users_table', 1),
(10, '2020_12_29_125332_create_settings_table', 1),
(11, '2021_01_05_173911_create_states_table', 1),
(12, '2021_01_05_174128_create_cities_table', 1),
(13, '2021_04_10_095556_create_pages_table', 1),
(14, '2021_05_05_173140_create_shops_table', 1),
(27, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(28, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(29, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(30, '2016_06_01_000004_create_oauth_clients_table', 2),
(31, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(32, '2021_05_05_180204_create_categories_table', 3),
(33, '2021_05_05_180607_create_products_table', 3),
(34, '2021_05_06_193119_create_product_images_table', 4),
(35, '2021_05_06_193518_create_enqueries_table', 4),
(36, '2021_05_06_193605_create_enquery_products_table', 4),
(38, '2021_05_06_193658_create_notifications_table', 5),
(39, '2021_05_14_164150_create_points_table', 6),
(40, '2021_05_14_182120_create_offers_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('00989293b4dfd17c8e9d00a6c78216b298b49c53120c0f0a9fa4078bf20df555385021b817236226', 292, 1, 'SwarnManthan', '[]', 0, '2021-08-01 17:58:13', '2021-08-01 17:58:13', '2022-08-01 17:58:13'),
('00f48b8b627a70cf25f89d33db1acd04004f617b19254f03c72b6d3bc75f5f5ee96daeff8ac28e6d', 1, 1, 'SwarnManthan', '[]', 0, '2021-06-13 21:07:44', '2021-06-13 21:07:44', '2022-06-14 02:37:44'),
('047842b5352159c8f698e144839627e9e5b157b1b2eb1ef77061cb5470e6b0a155935702e8fcb64f', 4, 1, 'swarn-manthan', '[]', 0, '2021-05-14 10:18:41', '2021-05-14 10:18:41', '2022-05-14 15:48:41'),
('094ccb60b6410210d7a636ce17d8cd0a66b0e821b9a4a6fb8b4154cbd79b5d1425307f8fdd748d77', 12, 1, 'SwarnManthan', '[]', 0, '2021-06-21 13:00:30', '2021-06-21 13:00:30', '2022-06-21 18:30:30'),
('0975fcf37bc480b8b60182ebf438504136f0edf7863585fef0a42257d34b74a215e93d1f37fd219c', 238, 1, 'SwarnManthan', '[]', 0, '2021-07-24 15:25:30', '2021-07-24 15:25:30', '2022-07-24 15:25:30'),
('09a31412aa9648c4809f94cad298868ac993fc006905a3ce213ef37df27988df94d405d41cb042b0', 28, 1, 'SwarnManthan', '[]', 0, '2021-06-21 05:43:20', '2021-06-21 05:43:20', '2022-06-21 11:13:20'),
('0a3a034c2989139157e6d24e413d1629bfa16a439e4395b1a206426e65564bc37c8751789e308ece', 11, 1, 'SwarnManthan', '[]', 0, '2021-06-19 09:33:14', '2021-06-19 09:33:14', '2022-06-19 15:03:14'),
('0ca045d86d2382fb1aae878b441e4a88274e3f1d282cdce252cf8894b265a25dfc82d6fa2e86be9d', 3, 1, 'swarn-manthan', '[]', 0, '2021-05-14 07:29:25', '2021-05-14 07:29:25', '2022-05-14 12:59:25'),
('0d1d30d4b7fb097b06e20bb710044555fe0f0f98612d4c81f6268fb760b5a738d2383cbe3762467d', 246, 1, 'SwarnManthan', '[]', 0, '2021-07-31 10:31:22', '2021-07-31 10:31:22', '2022-07-31 10:31:22'),
('0ec36fd855625fd3f467ca1ceb7eeb62c685d1946555449c42267551e60f8f1d641564e8755cee2c', 67, 1, 'SwarnManthan', '[]', 0, '2021-07-26 12:04:10', '2021-07-26 12:04:10', '2022-07-26 12:04:10'),
('0fab5b3a74c288adb83d26bbea0219787085fa27e0fd8ab0399fbe925c44ce49f76abb613bacc7e8', 1, 1, 'swarn-manthan', '[]', 0, '2021-05-14 09:36:10', '2021-05-14 09:36:10', '2022-05-14 15:06:10'),
('12fe648af74e3ee28fe3436ddc557397c1f380d290bb34f9ba2711eceac4c62c6d63209bb97571ac', 39, 1, 'SwarnManthan', '[]', 0, '2021-08-03 17:00:41', '2021-08-03 17:00:41', '2022-08-03 17:00:41'),
('1a5e883f7bb924d5c4d665f3eac6c70eac4a4e34bb9335da670f32cc4fb5824bab315513ce55ba76', 13, 1, 'SwarnManthan', '[]', 0, '2021-06-23 04:23:08', '2021-06-23 04:23:08', '2022-06-23 09:53:08'),
('1c87b32a56acbb40a071f773c898aafbd2f6138d4f241d71ac6ad81dd59927171b243e6fb78f0247', 10, 1, 'SwarnManthan', '[]', 0, '2021-06-18 04:49:40', '2021-06-18 04:49:40', '2022-06-18 10:19:40'),
('1e40ca5b0b43824a5d7760d61e2c7cf8c96fb1ffcc82dfa1ecc00d66733cfaffae9e00051409462c', 29, 1, 'SwarnManthan', '[]', 0, '2021-06-24 07:45:59', '2021-06-24 07:45:59', '2022-06-24 13:15:59'),
('1fef39e278d177c74630979ca6feaa8c15a4327c2cd7b8493e9286ded3d533906ef94196712f350a', 30, 1, 'SwarnManthan', '[]', 0, '2021-07-31 16:51:02', '2021-07-31 16:51:02', '2022-07-31 16:51:02'),
('20655d020eae1ec4a3ce586941dad2c87021ad21cf3c1d774e651a663966bd30cc1ac92d048d381b', 233, 1, 'SwarnManthan', '[]', 0, '2021-07-26 12:25:10', '2021-07-26 12:25:10', '2022-07-26 12:25:10'),
('25a04be4a9504150ccbc91bfcdee9304ba0206d2cbef2f5c02558d230da9188a011682c5ad7cf309', 12, 1, 'SwarnManthan', '[]', 0, '2021-06-21 05:45:21', '2021-06-21 05:45:21', '2022-06-21 11:15:21'),
('25cccc5af9e49ed2af096cc86b3365dd85fe0ffc43ff6318d8f1b91dca1b8fb99a80ed2ecee62124', 225, 1, 'SwarnManthan', '[]', 0, '2021-07-29 19:17:29', '2021-07-29 19:17:29', '2022-07-29 19:17:29'),
('27e159c21222790efb0df1af566967a7eb5172ae07da97776569fbd527e30afbb4ca1b32ebc56e95', 12, 1, 'SwarnManthan', '[]', 0, '2021-06-21 06:31:46', '2021-06-21 06:31:46', '2022-06-21 12:01:46'),
('28ab82cc82f6f49e2df35bf5aa81b5f73d32285af9e68a717e417f9967c6c8076687df1b272e5c73', 29, 1, 'SwarnManthan', '[]', 0, '2021-07-18 12:07:09', '2021-07-18 12:07:09', '2022-07-18 12:07:09'),
('29e8b350805ad2f89f4b231be01b0879e09bf0094aa10b2ae73799d3961a6f70de1ad81a472b4ed9', 57, 1, 'SwarnManthan', '[]', 0, '2021-07-19 13:02:00', '2021-07-19 13:02:00', '2022-07-19 13:02:00'),
('300ed798a7e0ccbbae0f7416f92c73f5f42ffd25f6e87801a33eca258faea78bd14d69cfa9a24f53', 62, 1, 'SwarnManthan', '[]', 0, '2021-07-24 11:57:33', '2021-07-24 11:57:33', '2022-07-24 11:57:33'),
('32cefd4c35414e61330eac7f27569185930327960870a71f38a53d535b1888b10926d6fc25924e74', 1, 1, 'SwarnManthan', '[]', 0, '2021-06-14 05:59:58', '2021-06-14 05:59:58', '2022-06-14 11:29:58'),
('3d7812d3c544fb53cb768f24c094516932a86d3e94bbbd0bd55b85b413c53647f82450f791c834f9', 10, 1, 'SwarnManthan', '[]', 0, '2021-06-18 06:09:23', '2021-06-18 06:09:23', '2022-06-18 11:39:23'),
('3e1443d399f0d571e63994e6b25a2727f80a18dbc87b1e47d6f963283e7c1078b6c63dd5e4066f78', 12, 1, 'SwarnManthan', '[]', 0, '2021-06-17 06:17:51', '2021-06-17 06:17:51', '2022-06-17 11:47:51'),
('3f3891f6048c55200fe1eb2f9724e2a6eda00cf04672e51d4fb46e1ad1741cbd062411930c385ddb', 29, 1, 'SwarnManthan', '[]', 0, '2021-07-31 16:51:23', '2021-07-31 16:51:23', '2022-07-31 16:51:23'),
('434f8fe55798ffc1eafa1d24aff048da69141450fbeded2ffb1abed23de838c24af83e8fed9c8ce0', 3, 1, 'SwarnManthan', '[]', 0, '2021-07-27 09:16:03', '2021-07-27 09:16:03', '2022-07-27 09:16:03'),
('435aff6743dadf5ad7b014495ca996bf4ce6a1ace4c16b6dc6bc4bfa44d728d15b4010d60312cafe', 12, 1, 'SwarnManthan', '[]', 0, '2021-06-21 05:41:32', '2021-06-21 05:41:32', '2022-06-21 11:11:32'),
('46733e4330fe933147422535954eb6d02eba90916df56cbed664cc51caa2e9f359c8332bb4a69afc', 30, 1, 'SwarnManthan', '[]', 0, '2021-06-24 07:50:39', '2021-06-24 07:50:39', '2022-06-24 13:20:39'),
('46cb5ff5628eb41dc4ce07299532c8d50aa482d067b850facc8f8110835bf18b06f73cce9bac73a6', 118, 1, 'SwarnManthan', '[]', 0, '2021-07-26 12:03:45', '2021-07-26 12:03:45', '2022-07-26 12:03:45'),
('4a53ea5f84e8ecc383471661a74c8ca8c10d2a09d564d0aae1a13a2096cb7714c3a652f8a39069dc', 4, 1, 'swarn-manthan', '[]', 0, '2021-05-14 10:30:12', '2021-05-14 10:30:12', '2022-05-14 16:00:12'),
('4e14d095e25a4fe18bf794e9740e59c65fe3b326be0500c058b9388bdbcb9966c40bfc8602110789', 293, 1, 'SwarnManthan', '[]', 0, '2021-08-01 22:27:11', '2021-08-01 22:27:11', '2022-08-01 22:27:11'),
('4f059db9e7fd45b57e85c7b9573654fc33e1fb58e5d57998f738c5110ec2b0e9ccec4c5ec7a87a34', 13, 1, 'SwarnManthan', '[]', 0, '2021-06-23 15:31:32', '2021-06-23 15:31:32', '2022-06-23 21:01:32'),
('4fb1f6bad53696564d107a1ed9d63e2117a093c1ebd62be83b0f532fd7f55d07e5ac1541955f727c', 10, 1, 'SwarnManthan', '[]', 0, '2021-06-18 06:01:05', '2021-06-18 06:01:05', '2022-06-18 11:31:05'),
('50cf981146d708acfdb128efca10ec483b90a2af786e20c9197aa86acaef9f87571cedfa9140f255', 13, 1, 'SwarnManthan', '[]', 0, '2021-06-21 04:53:33', '2021-06-21 04:53:33', '2022-06-21 10:23:33'),
('53f2b0f9d77d1db5f28408b2ad8e3df5c6123165991de1afc556d50edcd30f985efb804971da3ba2', 12, 1, 'SwarnManthan', '[]', 0, '2021-05-23 16:50:14', '2021-05-23 16:50:14', '2022-05-23 22:20:14'),
('54ae39f7f573ffdb0516b077728a8801bcd37062b38a9652b1ad42798b5352d67002fb40e51ff634', 10, 1, 'SwarnManthan', '[]', 0, '2021-06-19 09:37:48', '2021-06-19 09:37:48', '2022-06-19 15:07:48'),
('5565c0ce61545976a4ba94a3abb4034fae99b54dafeca2a11c88393cfc1b0f64c9ed326153398624', 3, 1, 'SwarnManthan', '[]', 0, '2021-06-14 06:51:55', '2021-06-14 06:51:55', '2022-06-14 12:21:55'),
('5766127e65ffeea2ef9332540d5c9c01cdd00267a8ff56fa4d3b182b52d7a2151832323f6d3ddb3d', 208, 1, 'SwarnManthan', '[]', 0, '2021-07-19 21:26:01', '2021-07-19 21:26:01', '2022-07-19 21:26:01'),
('5a1cc728636197086c3e27205cbd0e9bd2064315deb3b2f089fcb95ddf986b102655ad26e207f8e0', 227, 1, 'SwarnManthan', '[]', 0, '2021-07-27 16:51:16', '2021-07-27 16:51:16', '2022-07-27 16:51:16'),
('5a902f99c8e0c9a22198721b373a779ecf3d90390fb34feb7c289d828b1f6fe4e63371210b84cec2', 11, 1, 'SwarnManthan', '[]', 0, '2021-05-21 06:35:21', '2021-05-21 06:35:21', '2022-05-21 12:05:21'),
('5b901f752edf9f813679a3437485ce62bc9a310101a486e27a4cc8a549fe201b4b82127109264ba9', 209, 1, 'SwarnManthan', '[]', 0, '2021-07-28 11:15:05', '2021-07-28 11:15:05', '2022-07-28 11:15:05'),
('5db8143176ec51644e55babaed360dcaad6ba946e146d02923a7f85b92a0895b64578b677a652917', 252, 1, 'SwarnManthan', '[]', 0, '2021-07-30 17:32:16', '2021-07-30 17:32:16', '2022-07-30 17:32:16'),
('5fe705a0e3aec821690c7bd62546155c9bafb1437c8967294a237eae8277e19d038e55668573f1e8', 221, 1, 'SwarnManthan', '[]', 0, '2021-07-18 14:07:21', '2021-07-18 14:07:21', '2022-07-18 14:07:21'),
('62e8461b199e050b9861ae7c5c2267592941928b5e7916329cc5195de32e74a98913018905215a86', 57, 1, 'SwarnManthan', '[]', 0, '2021-07-19 13:08:02', '2021-07-19 13:08:02', '2022-07-19 13:08:02'),
('657688cbdf65098e30efb4645fe841cd0cb2f3decf64b92ead123fa38f2816b3c528aa776e5eeabf', 11, 1, 'SwarnManthan', '[]', 0, '2021-05-23 16:53:22', '2021-05-23 16:53:22', '2022-05-23 22:23:22'),
('66dda59434e35304e18fc83ae133ee816e90ab2149d60ca4ff83d50270f2737cc5ee2868539f311b', 31, 1, 'SwarnManthan', '[]', 0, '2021-06-24 08:43:19', '2021-06-24 08:43:19', '2022-06-24 14:13:19'),
('67a72a7224be8e4b3704ffc1f9964238df9d9da7471b039e2685d9a42ea560178f08d508407cd318', 12, 1, 'SwarnManthan', '[]', 0, '2021-05-28 10:55:09', '2021-05-28 10:55:09', '2022-05-28 16:25:09'),
('67c6cfcdfba97337a4e4e8a8563bbb9f51e6e9b8cafaf4750b56930ed179cfb0ae9b1aeeb37b1de8', 1, 1, 'SwarnManthan', '[]', 0, '2021-06-14 06:01:49', '2021-06-14 06:01:49', '2022-06-14 11:31:49'),
('68776c4afecd7557e18d0b0853c5f8f619fc0bf845952abbfd7db4dce54dc0c297ad107a438fbbfc', 33, 1, 'SwarnManthan', '[]', 0, '2021-07-15 12:18:30', '2021-07-15 12:18:30', '2022-07-15 12:18:30'),
('6f108c115768851f7a603fb07bd73e9a3e8737068138be41a45aacebcb01ac691b67b3f82f630d60', 4, 1, 'swarn-manthan', '[]', 0, '2021-05-14 10:19:01', '2021-05-14 10:19:01', '2022-05-14 15:49:01'),
('7433d6c5804f3ba0e6df12ffe9e3a74583c000cb3385c8b295c96c3bc0afe141cedd79a4b4348157', 31, 1, 'SwarnManthan', '[]', 0, '2021-07-21 20:34:03', '2021-07-21 20:34:03', '2022-07-21 20:34:03'),
('77e7a299d39f93034ca81d83f027419d80b6e2f83b26d4d90fcec756410ddf3d2de45fe79ccc1f26', 3, 1, 'swarn-manthan', '[]', 0, '2021-05-06 13:22:18', '2021-05-06 13:22:18', '2022-05-06 18:52:18'),
('781aeb3f7c005b7971a63d2ff93abe3cecbbea7d6f2b73ccd78ea351b739a795010223c892997e03', 12, 1, 'SwarnManthan', '[]', 0, '2021-06-21 05:45:44', '2021-06-21 05:45:44', '2022-06-21 11:15:44'),
('8171e3008f59833b6fd50f22df7fba7a8cef79dc5327d26c4ef5348f706fd565e86af53be343dc62', 68, 1, 'SwarnManthan', '[]', 0, '2021-07-26 12:17:30', '2021-07-26 12:17:30', '2022-07-26 12:17:30'),
('81ff89e9a16d52c20688dfc2c88d4380b971a503c985c69f09df5603317b40abd08f1f2117c71193', 70, 1, 'SwarnManthan', '[]', 0, '2021-07-26 12:25:23', '2021-07-26 12:25:23', '2022-07-26 12:25:23'),
('8330f99e7d22711e7ba4da3e1ae76ed86a1337c894191fba1dc50a8a8255ab9eedad29a39d983a7b', 30, 1, 'SwarnManthan', '[]', 0, '2021-07-31 16:51:02', '2021-07-31 16:51:02', '2022-07-31 16:51:02'),
('86fff63093ad5d71e2d5746f76d652481821516aeee7c48b358dde56d3b3f2a0395c4f8686dc62ef', 234, 1, 'SwarnManthan', '[]', 0, '2021-07-19 12:07:53', '2021-07-19 12:07:53', '2022-07-19 12:07:53'),
('872d7e68c485a47836153ed43c1ac43a09251009381c0c32079abb9db39ed1ffc57eeceb33a550c0', 228, 1, 'SwarnManthan', '[]', 0, '2021-07-31 17:41:11', '2021-07-31 17:41:11', '2022-07-31 17:41:11'),
('8a747e18ae688943a6ea4d353c42842609220be61aa34123072c4fe4209dd7bbf5504f29820693ed', 10, 1, 'SwarnManthan', '[]', 0, '2021-06-16 22:14:49', '2021-06-16 22:14:49', '2022-06-17 03:44:49'),
('8b0d846752da3e4c26d2bb214f065ed61576f915c1e2e92909af3a3a9953d6fe4270d1f9059a2e0c', 12, 1, 'SwarnManthan', '[]', 0, '2021-06-20 15:31:40', '2021-06-20 15:31:40', '2022-06-20 21:01:40'),
('8e70f7d5d96e5a77b694f6521ea05c094b0b6f0b3ae05d52d214956d9dc17c805414bad26ff2afa6', 1, 1, 'SwarnManthan', '[]', 0, '2021-05-18 13:12:41', '2021-05-18 13:12:41', '2022-05-18 18:42:41'),
('8fa8b98a1be25652433fd2a45cea6f5c925dfe223578f0e1d111316686a1d865f94c6c9e0f5647a4', 10, 1, 'SwarnManthan', '[]', 0, '2021-06-30 08:28:05', '2021-06-30 08:28:05', '2022-06-30 13:58:05'),
('935dd987f833d0f77fc1082614e1d753bf06c3a840bb420a669c438b83d5d9134e8ace3339aa0a8e', 33, 1, 'SwarnManthan', '[]', 0, '2021-07-15 12:20:06', '2021-07-15 12:20:06', '2022-07-15 12:20:06'),
('94800356653cf973b50d6281318a902f1d1237f55337d63494be8438925b984408bfa9b9569d1d35', 10, 1, 'SwarnManthan', '[]', 0, '2021-06-30 05:39:15', '2021-06-30 05:39:15', '2022-06-30 11:09:15'),
('94ea78a7a716f278842fc28074c2e3109bbc6f925f35f3b164e09547a43c8c4e3c96ce60285938bc', 11, 1, 'SwarnManthan', '[]', 0, '2021-05-23 16:52:36', '2021-05-23 16:52:36', '2022-05-23 22:22:36'),
('9514078c7878298e2d16ee04f3ddaa7031b4aa3dd0697f49decfc12677d911c0f98acf9ea09b1ee2', 29, 1, 'SwarnManthan', '[]', 0, '2021-07-29 18:02:17', '2021-07-29 18:02:17', '2022-07-29 18:02:17'),
('95d5003c2152a406b8a321fb369dc764bb9b3a16b27eb1e1ec079fe96b8626a6f0940f4f98d2f745', 234, 1, 'SwarnManthan', '[]', 0, '2021-07-18 15:51:04', '2021-07-18 15:51:04', '2022-07-18 15:51:04'),
('9c7753ff28d5b824a93477886a7853c9565bd0862d0521b5363fe552f5b9593a3ae163a79ec01834', 10, 1, 'SwarnManthan', '[]', 0, '2021-06-18 09:12:03', '2021-06-18 09:12:03', '2022-06-18 14:42:03'),
('9dadde39d637109279df58c5ea243ef5a442afd27a58e827632a581c9f0b38527bfe68f3697aad0d', 12, 1, 'SwarnManthan', '[]', 0, '2021-05-21 15:40:32', '2021-05-21 15:40:32', '2022-05-21 21:10:32'),
('9dc78a83c4489283a9598876cbf5b94830961e5996e4cae62248dfd11ed7581fbcd980fd2d38bf81', 1, 1, 'SwarnManthan', '[]', 0, '2021-05-21 04:40:23', '2021-05-21 04:40:23', '2022-05-21 10:10:23'),
('9f5e79bec1234d10f580d1061fdd7f37aada5332d57f8d0ad4477dcd65386553b9c1d5fb47cbf1f2', 10, 1, 'SwarnManthan', '[]', 0, '2021-06-30 05:39:44', '2021-06-30 05:39:44', '2022-06-30 11:09:44'),
('a943d954d331253f70c5a37d29a7aef3b240199610f385044dae30d1ce6a7acef63635e193013437', 4, 1, 'swarn-manthan', '[]', 0, '2021-05-14 10:16:25', '2021-05-14 10:16:25', '2022-05-14 15:46:25'),
('a9aa76fd0c3dc651865a3b0974a61b4de7ad215ac4faa04dfc31d5845c6eaa7888c299c303a28d7e', 13, 1, 'SwarnManthan', '[]', 0, '2021-06-23 10:55:30', '2021-06-23 10:55:30', '2022-06-23 16:25:30'),
('ab3f738d02b4489fd544df94f2af16871a12d0cdcce47c1478276ff387f89cfc58906f48dd4dda37', 291, 1, 'SwarnManthan', '[]', 0, '2021-08-01 23:05:35', '2021-08-01 23:05:35', '2022-08-01 23:05:35'),
('aef7a88f4128c3a98699b9907664e3cf9af3e490ba379b9d54acfe0258bffa2a46147164768d8846', 1, 1, 'SwarnManthan', '[]', 0, '2021-05-21 04:52:30', '2021-05-21 04:52:30', '2022-05-21 10:22:30'),
('b1b48c55735fcbee7fc6a04dc6e5c476046b34e16245335607bee23da6d55f9198dd7583621763a2', 4, 1, 'swarn-manthan', '[]', 0, '2021-05-14 09:28:31', '2021-05-14 09:28:31', '2022-05-14 14:58:31'),
('b42719a26fe9f78787ed56c63a4fc9f27a7a1eca03e316b44a9f0e9f0d5ca3e1e83ffe2f5556be6b', 12, 1, 'SwarnManthan', '[]', 0, '2021-06-22 03:57:03', '2021-06-22 03:57:03', '2022-06-22 09:27:03'),
('b7cc96253b9c4d1a55bf35cc5fc3078ee0a3e049d692288192f8ff7bbdafee6a19baad4fa9bf66df', 32, 1, 'SwarnManthan', '[]', 0, '2021-07-22 08:39:16', '2021-07-22 08:39:16', '2022-07-22 08:39:16'),
('b7e9a934a12d36b16e6b75066ae70c237eaaceaa9ef9c9ace21ae0bf2b5454cc1187e574c0ac3a91', 4, 1, 'swarn-manthan', '[]', 0, '2021-05-14 10:17:34', '2021-05-14 10:17:34', '2022-05-14 15:47:34'),
('b9e344bbfa55b413f1a9d09e2f9c8d4e7cc9f9e3f6ee40e9d7f592b05007200c2091a4ce11e06278', 95, 1, 'SwarnManthan', '[]', 0, '2021-07-26 13:33:45', '2021-07-26 13:33:45', '2022-07-26 13:33:45'),
('c1d498de0ec5b0fdc50aefb61926de4305c18ddb7f89d3135b2eefc88eae375d283647fc72537cb3', 12, 1, 'SwarnManthan', '[]', 0, '2021-05-22 09:24:49', '2021-05-22 09:24:49', '2022-05-22 14:54:49'),
('c45949bbebb7236d49136d21c99370beb1a9f5bb93aa2ee2f2d27781307e0b6f0d63763fb224767d', 1, 1, 'SwarnManthan', '[]', 0, '2021-05-21 04:52:27', '2021-05-21 04:52:27', '2022-05-21 10:22:27'),
('ca83a85dbf4e55381b5a9b1c064211c6c67c0a955c3adae2791f8368dc9389cce6c44d940881b7cb', 31, 1, 'SwarnManthan', '[]', 0, '2021-06-26 06:04:06', '2021-06-26 06:04:06', '2022-06-26 11:34:06'),
('cd5808a20442807abed56fceb33c4510033519302892fef9f324eb9d11c8114e6c6bb5fe1251c041', 4, 1, 'swarn-manthan', '[]', 0, '2021-05-14 10:16:18', '2021-05-14 10:16:18', '2022-05-14 15:46:18'),
('ce4d4ef6b2e8e82cf898bd673eb93db06147d6bf42765182ff569a750642dd025620a5681050621b', 10, 1, 'SwarnManthan', '[]', 0, '2021-06-23 11:30:08', '2021-06-23 11:30:08', '2022-06-23 17:00:08'),
('d290f06aaa59ef3f327413898c055073738bcd57323bdb63d45fdae2edfb2f2bc2b123b69e2faab7', 31, 1, 'SwarnManthan', '[]', 0, '2021-07-31 16:53:19', '2021-07-31 16:53:19', '2022-07-31 16:53:19'),
('d35db5efd82a015a19e92b6ab62db4da148371008b15a54d3bdd5b3e00e140d6185ab7f631184c0f', 3, 1, 'SwarnManthan', '[]', 0, '2021-06-14 06:44:57', '2021-06-14 06:44:57', '2022-06-14 12:14:57'),
('d3dc06d67d0a6ecffde6e5d64d2f46f1489244adcbaf65bee6433fc81731d7b18cefb6771f9cf8cc', 11, 1, 'SwarnManthan', '[]', 0, '2021-05-21 03:26:36', '2021-05-21 03:26:36', '2022-05-21 08:56:36'),
('d41cfc1621ab1636c5fc2a9b083b171596dfd9049b099e8d124dbcac612324168c691f588e42a7db', 32, 1, 'SwarnManthan', '[]', 0, '2021-06-27 08:16:09', '2021-06-27 08:16:09', '2022-06-27 13:46:09'),
('d696cf7777019a1cf6824bb974637a1da0ea779ba4a23f1cb6be03c5309c2561e1a59dbb3ca27505', 294, 1, 'SwarnManthan', '[]', 0, '2021-08-02 23:57:58', '2021-08-02 23:57:58', '2022-08-02 23:57:58'),
('d9c4907c864c26e59a67b8144272c6eaaec06075d1ef22eccc65de797af71587b4a1450e3f7f0c2b', 11, 1, 'SwarnManthan', '[]', 0, '2021-05-23 16:42:10', '2021-05-23 16:42:10', '2022-05-23 22:12:10'),
('dd9ca3369cb38f9d08523813820ef8540a7a73140b69eb2bddd0fcef1963980730d9603d5fa29966', 33, 1, 'SwarnManthan', '[]', 0, '2021-07-15 12:40:55', '2021-07-15 12:40:55', '2022-07-15 12:40:55'),
('ddb4835c9b719c39c3d2374e9e0cf79a4b6bffba92aaedde9b4ba96cff4e437feba61e4db951f4ee', 1, 1, 'SwarnManthan', '[]', 0, '2021-05-23 15:26:33', '2021-05-23 15:26:33', '2022-05-23 20:56:33'),
('ddc27cf4425d803ada1f8e3585a49a75f2d6af5a4bbfde53cb84da53827e16bc4c5ebfeb4cb82614', 226, 1, 'SwarnManthan', '[]', 0, '2021-07-29 16:45:20', '2021-07-29 16:45:20', '2022-07-29 16:45:20'),
('de253dfb2c2ad047a791966109723baef465ffd2c814b9c1a7279f63b4772328a0948ab43592896a', 3, 1, 'SwarnManthan', '[]', 0, '2021-06-17 04:46:16', '2021-06-17 04:46:16', '2022-06-17 10:16:16'),
('e22a824dd11b4128bdec255b98fd1e4bacd8e5be4dae0d93b2d0009bba35b02ca4d721ed19783f25', 10, 1, 'SwarnManthan', '[]', 0, '2021-07-17 23:04:34', '2021-07-17 23:04:34', '2022-07-17 23:04:34'),
('e4fcbe826730097ec0af96448f7f0403f053764a0d43656f2edf3e8d84435f2eab0fa537e4d97aaa', 3, 1, 'SwarnManthan', '[]', 0, '2021-06-18 04:03:12', '2021-06-18 04:03:12', '2022-06-18 09:33:12'),
('e6316b92b443cec7b4f63c351d03074bd6606d4a0244aa27f13ea160211ad08982e96f5c29c68151', 71, 1, 'SwarnManthan', '[]', 0, '2021-07-26 13:22:47', '2021-07-26 13:22:47', '2022-07-26 13:22:47'),
('e6a954658b28cb250f0cb5d2b0af5b89ccf75283c6fcb0f490003836eeea5d2a491c9a327963624c', 10, 1, 'SwarnManthan', '[]', 0, '2021-06-15 05:35:39', '2021-06-15 05:35:39', '2022-06-15 11:05:39'),
('e77275bd9925d32dbe8035ea36f82b54fd4774cbd963d5c452239308e2b260c2eb67f16a7182ebb3', 3, 1, 'swarn-manthan', '[]', 0, '2021-05-06 12:20:34', '2021-05-06 12:20:34', '2022-05-06 17:50:34'),
('e7ebeaeca7f1065272c6dae28e1f00e4afb43d9eea47e8652ababad3d995726b72986508f813c695', 13, 1, 'SwarnManthan', '[]', 0, '2021-06-23 05:39:18', '2021-06-23 05:39:18', '2022-06-23 11:09:18'),
('e87d86c78fdb5b0da5c1ecd728668539e1875c95cdacd48ce33caec59d3d60a2381cae067d119189', 3, 1, 'swarn-manthan', '[]', 0, '2021-05-06 11:35:39', '2021-05-06 11:35:39', '2022-05-06 17:05:39'),
('e9e0663d860d858ef9f984433829480f5f44e230b106fb29ec2ad311f08f5caa2c05e17f50abf118', 4, 1, 'swarn-manthan', '[]', 0, '2021-05-14 10:25:12', '2021-05-14 10:25:12', '2022-05-14 15:55:12'),
('ece2f4f9cd877ec968b6dc77aa61d4f38f83210f0ca322d337988e1aa440c038127d0ad158a0ffeb', 10, 1, 'SwarnManthan', '[]', 0, '2021-06-18 06:00:03', '2021-06-18 06:00:03', '2022-06-18 11:30:03'),
('ed5112e9b3ad869e6ac133c9d313b80843a6f464f025d880e0e6939e7e36a6e933f446e71847ab25', 13, 1, 'SwarnManthan', '[]', 0, '2021-06-23 10:48:48', '2021-06-23 10:48:48', '2022-06-23 16:18:48'),
('eec28dc1f46f39f03f075fd3153e643c198b04c2e30d46b3335eb3e85ceb6b0b62434a028f813c86', 31, 1, 'SwarnManthan', '[]', 0, '2021-07-20 04:00:53', '2021-07-20 04:00:53', '2022-07-20 04:00:53'),
('f1a9e8f86e5118b9ad1ef5d8b0fa421001e4d5c43bc1f57c4b5d6da88bca0052973c31efabb372b8', 12, 1, 'SwarnManthan', '[]', 0, '2021-05-23 16:51:46', '2021-05-23 16:51:46', '2022-05-23 22:21:46'),
('f4152d69e5e43a121a45e46cd65bb7603dbedfdf56b284bbe7d47f1a0ef8f27834c7555957dc24bb', 11, 1, 'SwarnManthan', '[]', 0, '2021-05-23 15:32:05', '2021-05-23 15:32:05', '2022-05-23 21:02:05'),
('f4c6f43bfa6d338c19ebafc3b39818742d4f5be4bad164fc47bc5bc962705fbc8014b93843b8192d', 12, 1, 'SwarnManthan', '[]', 0, '2021-05-23 16:49:53', '2021-05-23 16:49:53', '2022-05-23 22:19:53'),
('f4ef15b5b0299821845e7b89606283c914780a5472f24c647f92d7b7c9e42cbf4d6d61710dc4af59', 118, 1, 'SwarnManthan', '[]', 0, '2021-07-24 12:03:51', '2021-07-24 12:03:51', '2022-07-24 12:03:51'),
('f528b8d9de1ac634cbfa12bcfcf7cabc5c35932ee279743a88f8e42354161c771523530fadfd039a', 10, 1, 'SwarnManthan', '[]', 0, '2021-06-18 11:52:34', '2021-06-18 11:52:34', '2022-06-18 17:22:34'),
('f8e444b818229e5e5099b831e12638a76b8c8c4774ca99206580929322b95b52c68407d1e2df1190', 4, 1, 'swarn-manthan', '[]', 0, '2021-05-14 10:19:12', '2021-05-14 10:19:12', '2022-05-14 15:49:12'),
('fb2eb418f5a0dba3a2f459f6cf947406b6fd304e7a05b59b8ce6c1fc94ca2eadb47f96c1cd870f7b', 4, 1, 'swarn-manthan', '[]', 0, '2021-05-14 10:26:18', '2021-05-14 10:26:18', '2022-05-14 15:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'cLJzXEdoyCErQNO3dR7qm9odujSpqi18j2QL9MyU', NULL, 'http://localhost', 1, 0, 0, '2021-05-06 11:35:17', '2021-05-06 11:35:17'),
(2, NULL, 'Laravel Password Grant Client', 'kqwhN11vlrlIdFsqbbTGzKxDDZwbeFjGMWna5nfk', 'users', 'http://localhost', 0, 1, 0, '2021-05-06 11:35:17', '2021-05-06 11:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-05-06 11:35:17', '2021-05-06 11:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `slug`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Offer One', 'offer_one', '1624431417wsi-imageoptim-clickable-banner.jpg', 'Offer', '2021-05-14 13:10:41', '2021-06-23 06:56:57'),
(2, 'Offer Two', 'offer-two', '1624431446img07.png', 'Offer', '2021-06-23 06:21:16', '2021-06-23 06:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, '2021-05-12 10:57:00'),
(2, 'User', NULL, '2021-05-12 10:56:50'),
(3, 'Marchant', '2021-05-12 10:56:37', '2021-05-12 10:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `tagline`, `mobile`, `email`, `logo`, `favicon`, `sms_api`, `address`, `facebook`, `instagram`, `youtube`, `linkedin`, `twitter`, `google_map`, `created_at`, `updated_at`) VALUES
(1, 'Admin Panel', 'ery', '9876543210', 'admin@admin.com', '', '', NULL, 'sdtg', 'https://www.facebook.com', 'https://www.instagram.com', 'https://www.youtube.com', 'https://linkedin.com', 'https://twitter.com', 'ery', NULL, '2021-11-27 08:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) DEFAULT NULL,
  `is_verified` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `is_termscondition` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `device_type` enum('ios','android') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accept_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `termcondition` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'true',
  `status` enum('enable','disable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'enable',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `otp`, `role_id`, `city_id`, `is_verified`, `is_termscondition`, `device_type`, `device_id`, `fcm_id`, `accept_code`, `referal_code`, `termcondition`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@admin.com', '9876543210', '2021-11-27 08:53:30', '$2y$10$e8P7RrqKqGcIxmhR993x2OzB/oCr.vC5Njlo.yrsL0PMBN763gENm', '', 1, NULL, 'true', '0', NULL, NULL, NULL, NULL, NULL, 'true', 'enable', 'gR6l1SJf6g1IGPwbbGCXoqE7n2BdxrZloMBYGAPEY960XhTPpzmZQ8wbSeVP', NULL, '2021-06-14 06:51:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
