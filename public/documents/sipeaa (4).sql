-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2019 at 11:08 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipeaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `acounts_head`
--

CREATE TABLE `acounts_head` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `acounts_head`
--

INSERT INTO `acounts_head` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Single Product dfgdfg', NULL, NULL),
(3, 'test product 2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article_boards`
--

CREATE TABLE `article_boards` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `blog_etc_categories`
--

CREATE TABLE `blog_etc_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_bin NOT NULL,
  `category_description` mediumtext COLLATE utf8_bin,
  `created_by` int(10) UNSIGNED DEFAULT NULL COMMENT 'user id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `blog_etc_categories`
--

INSERT INTO `blog_etc_categories` (`id`, `category_name`, `slug`, `category_description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Accounting/Finance', 'accountingfinance', NULL, NULL, '2019-05-21 09:34:00', '2019-05-21 09:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_etc_comments`
--

CREATE TABLE `blog_etc_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_etc_post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'if user was logged in',
  `ip` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT 'if enabled in the config file',
  `author_name` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT 'if not logged in',
  `comment` text COLLATE utf8_bin NOT NULL COMMENT 'the comment body',
  `approved` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `author_email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `author_website` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `blog_etc_comments`
--

INSERT INTO `blog_etc_comments` (`id`, `blog_etc_post_id`, `user_id`, `ip`, `author_name`, `comment`, `approved`, `created_at`, `updated_at`, `author_email`, `author_website`) VALUES
(1, 1, 8, '127.0.0.1', NULL, 'hello there', 1, '2019-05-21 11:44:03', '2019-05-21 11:44:33', NULL, NULL),
(2, 2, 11, '127.0.0.1', NULL, 'aafgadf', 1, '2019-05-23 14:26:46', '2019-05-23 14:27:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_etc_posts`
--

CREATE TABLE `blog_etc_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_bin NOT NULL,
  `title` varchar(255) COLLATE utf8_bin DEFAULT 'New blog post',
  `subtitle` varchar(255) COLLATE utf8_bin DEFAULT '',
  `meta_desc` text COLLATE utf8_bin,
  `post_body` mediumtext COLLATE utf8_bin,
  `use_view_file` varchar(255) COLLATE utf8_bin DEFAULT NULL COMMENT 'should refer to a blade file in /views/',
  `posted_at` datetime DEFAULT NULL COMMENT 'Public posted at time, if this is in future then it wont appear yet',
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `image_large` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `image_medium` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `image_thumbnail` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `short_description` text COLLATE utf8_bin,
  `seo_title` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `blog_etc_posts`
--

INSERT INTO `blog_etc_posts` (`id`, `user_id`, `slug`, `title`, `subtitle`, `meta_desc`, `post_body`, `use_view_file`, `posted_at`, `is_published`, `image_large`, `image_medium`, `image_thumbnail`, `created_at`, `updated_at`, `short_description`, `seo_title`) VALUES
(1, 11, 'accountin', 'Localhost admin login problem', 'sdfsdf', NULL, '<p>ssdfs</p>', NULL, '2019-05-21 15:34:03', 1, 'localhost-admin-login-problem-1000x700.jpg', 'localhost-admin-login-problem-600x400.jpg', 'localhost-admin-login-problem-150x150.jpg', '2019-05-21 09:35:09', '2019-05-21 09:53:38', NULL, NULL),
(2, 11, 'tost', 'rokon', 'Test Post', NULL, '<p>Enter a value for thetag. If nothing is provided here we will just use the normal post title from above (optional)</p>', NULL, '2019-05-21 16:22:21', 1, 'rokon-1000x700.jpg', 'rokon-600x400.jpg', 'rokon-150x150.jpg', '2019-05-21 10:23:20', '2019-05-21 10:23:40', NULL, NULL),
(3, 11, 'localhost-admin-login-problem', 'Localhost admin login problem', 'Test Post', NULL, '<p>Please note that any HTML (including any JS code) that is entered here will be echoed (without escaping)</p>', NULL, '2019-05-23 17:46:14', 1, 'localhost-admin-login-problem-0uuif-1000x700.jpg', 'localhost-admin-login-problem-vas6f-600x400.jpg', 'localhost-admin-login-problem-fkzuo-150x150.jpg', '2019-05-23 11:46:42', '2019-05-23 11:46:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_etc_post_categories`
--

CREATE TABLE `blog_etc_post_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_etc_post_id` int(10) UNSIGNED NOT NULL,
  `blog_etc_category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `blog_etc_post_categories`
--

INSERT INTO `blog_etc_post_categories` (`id`, `blog_etc_post_id`, `blog_etc_category_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_etc_uploaded_photos`
--

CREATE TABLE `blog_etc_uploaded_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `uploaded_images` text COLLATE utf8_bin,
  `image_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `source` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'unknown',
  `uploader_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `blog_etc_uploaded_photos`
--

INSERT INTO `blog_etc_uploaded_photos` (`id`, `uploaded_images`, `image_title`, `source`, `uploader_id`, `created_at`, `updated_at`) VALUES
(1, '{\"image_large\":{\"filename\":\"localhost-admin-login-problem-1000x700.jpg\",\"w\":1000,\"h\":700},\"image_medium\":{\"filename\":\"localhost-admin-login-problem-600x400.jpg\",\"w\":600,\"h\":400},\"image_thumbnail\":{\"filename\":\"localhost-admin-login-problem-150x150.jpg\",\"w\":150,\"h\":150}}', NULL, 'BlogFeaturedImage', NULL, '2019-05-21 09:35:09', '2019-05-21 09:35:09'),
(2, '{\"image_large\":{\"filename\":\"rokon-1000x700.jpg\",\"w\":1000,\"h\":700},\"image_medium\":{\"filename\":\"rokon-600x400.jpg\",\"w\":600,\"h\":400},\"image_thumbnail\":{\"filename\":\"rokon-150x150.jpg\",\"w\":150,\"h\":150}}', NULL, 'BlogFeaturedImage', NULL, '2019-05-21 10:23:40', '2019-05-21 10:23:40'),
(3, '{\"image_large\":{\"filename\":\"localhost-admin-login-problem-0uuif-1000x700.jpg\",\"w\":1000,\"h\":700},\"image_medium\":{\"filename\":\"localhost-admin-login-problem-vas6f-600x400.jpg\",\"w\":600,\"h\":400},\"image_thumbnail\":{\"filename\":\"localhost-admin-login-problem-fkzuo-150x150.jpg\",\"w\":150,\"h\":150}}', NULL, 'BlogFeaturedImage', NULL, '2019-05-23 11:46:42', '2019-05-23 11:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `cms_apicustom`
--

CREATE TABLE `cms_apicustom` (
  `id` int(10) UNSIGNED NOT NULL,
  `permalink` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `tabel` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `aksi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `kolom` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `orderby` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `sub_query_1` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `sql_where` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `parameter` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `method_type` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `parameters` longtext COLLATE utf8_bin,
  `responses` longtext COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cms_apikey`
--

CREATE TABLE `cms_apikey` (
  `id` int(10) UNSIGNED NOT NULL,
  `screetkey` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `status` varchar(25) COLLATE utf8_bin NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cms_dashboard`
--

CREATE TABLE `cms_dashboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cms_email_queues`
--

CREATE TABLE `cms_email_queues` (
  `id` int(10) UNSIGNED NOT NULL,
  `send_at` datetime DEFAULT NULL,
  `email_recipient` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email_from_email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email_from_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email_cc_email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email_subject` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email_content` text COLLATE utf8_bin,
  `email_attachments` text COLLATE utf8_bin,
  `is_sent` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cms_email_templates`
--

CREATE TABLE `cms_email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `content` longtext COLLATE utf8_bin,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `from_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `from_email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `cc_email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cms_email_templates`
--

INSERT INTO `cms_email_templates` (`id`, `name`, `slug`, `subject`, `content`, `description`, `from_name`, `from_email`, `cc_email`, `created_at`, `updated_at`) VALUES
(1, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2019-05-18 10:15:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_logs`
--

CREATE TABLE `cms_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipaddress` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `useragent` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `details` text COLLATE utf8_bin,
  `id_cms_users` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cms_logs`
--

INSERT INTO `cms_logs` (`id`, `ipaddress`, `useragent`, `url`, `description`, `details`, `id_cms_users`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login with IP Address 127.0.0.1', '', 1, '2019-05-18 10:15:43', NULL),
(2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/events/add-save', 'Add New Data Localhost admin login problem at Events', '', 1, '2019-05-18 11:09:46', NULL),
(3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/events/add-save', 'Add New Data Localhost admin login problem at Events', '', 1, '2019-05-18 11:19:35', NULL),
(4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/events/add-save', 'Add New Data rokon at Events', '', 1, '2019-05-18 11:36:41', NULL),
(5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/events/add-save', 'Add New Data Localhost admin login problem at Events', '', 1, '2019-05-18 11:56:59', NULL),
(6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/events/add-save', 'Add New Data Localhost admin login problem at Events', '', 1, '2019-05-18 12:06:01', NULL),
(7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/events/edit-save/5', 'Update data Localhost admin login problem at Events', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>start_date</td><td>2019-05-19</td><td>2019-06-02</td></tr><tr><td>end_date</td><td>2019-05-20</td><td>2019-06-03</td></tr></tbody></table>', 1, '2019-05-18 12:06:55', NULL),
(8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/events/add-save', 'Add New Data Localhost admin login problem at Events', '', 1, '2019-05-18 12:10:53', NULL),
(9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/events/action-selected', 'Delete data 5,4,3,2,1 at Events', '', 1, '2019-05-18 12:11:47', NULL),
(10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/events/add-save', 'Add New Data rokon at Events', '', 1, '2019-05-18 12:46:05', NULL),
(11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/module_generator/delete/12', 'Delete data Events at Module Generator', '', 1, '2019-05-18 12:48:14', NULL),
(12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/events13/add-save', 'Add New Data Localhost admin login problem at Events', '', 1, '2019-05-18 12:52:07', NULL),
(13, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login with IP Address 127.0.0.1', '', 1, '2019-05-20 08:32:47', NULL),
(14, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/events13/add-save', 'Add New Data rokon at Events', '', 1, '2019-05-20 09:26:43', NULL),
(15, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/events13/edit-save/7', 'Update data rokon at Events', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>short_description</td><td></td><td>sdfs</td></tr><tr><td>description</td><td></td><td>sff</td></tr><tr><td>images</td><td></td><td>uploads/1/2019-05/model_s_hero_e1556066115259.jpg</td></tr></tbody></table>', 1, '2019-05-20 09:58:20', NULL),
(16, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/events13/edit-save/6', 'Update data Localhost admin login problem at Events', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>short_description</td><td></td><td>xxvz</td></tr><tr><td>description</td><td></td><td>zvvz</td></tr><tr><td>images</td><td></td><td>uploads/1/2019-05/roadster_hero0.jpg</td></tr></tbody></table>', 1, '2019-05-20 09:58:54', NULL),
(17, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/job_categories/add-save', 'Add New Data Accounting/Finance at Job Category', '', 1, '2019-05-20 11:11:06', NULL),
(18, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/job_categories/add-save', 'Add New Data Bank/ Non-Bank Fin. Institution at Job Category', '', 1, '2019-05-20 11:11:22', NULL),
(19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/job_categories/add-save', 'Add New Data Commercial/Supply Chain at Job Category', '', 1, '2019-05-20 11:11:32', NULL),
(20, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/job_categories/add-save', 'Add New Data Education/Training at Job Category', '', 1, '2019-05-20 11:11:43', NULL),
(21, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/job_categories/add-save', 'Add New Data Engineer/Architects at Job Category', '', 1, '2019-05-20 11:12:20', NULL),
(22, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/job_location/add-save', 'Add New Data Dhaka at Job Location', '', 1, '2019-05-20 11:14:16', NULL),
(23, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/job_location/add-save', 'Add New Data Chittagong at Job Location', '', 1, '2019-05-20 11:14:22', NULL),
(24, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/job_location/add-save', 'Add New Data Gazipur at Job Location', '', 1, '2019-05-20 11:14:27', NULL),
(25, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/job_location/add-save', 'Add New Data Comilla at Job Location', '', 1, '2019-05-20 11:14:33', NULL),
(26, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/job_location/add-save', 'Add New Data Mymensingh at Job Location', '', 1, '2019-05-20 11:14:38', NULL),
(27, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/add-save', 'Add New Data User Access Control at Menu Management', '', 1, '2019-05-20 13:13:39', NULL),
(28, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login with IP Address 127.0.0.1', '', 1, '2019-05-23 10:55:50', NULL),
(29, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.157 Safari/537.36', 'http://127.0.0.1:8000/admin/users/edit-save/1', 'Update data Super Admin at Users Management', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>photo</td><td></td><td>uploads/1/2019-05/roadster_hero0.jpg</td></tr><tr><td>password</td><td>$2y$10$CRHsoVVlDem89zIcCebCku0eW2sUVVE2Dt/sngRkW5zli3q1DgBIG</td><td></td></tr><tr><td>status</td><td>Active</td><td></td></tr></tbody></table>', 1, '2019-05-23 10:57:03', NULL),
(30, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login with IP Address 127.0.0.1', '', 1, '2019-05-23 23:32:55', NULL),
(31, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login with IP Address 127.0.0.1', '', 1, '2019-05-25 00:54:10', NULL),
(32, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login with IP Address 127.0.0.1', '', 1, '2019-05-25 01:11:23', NULL),
(33, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login with IP Address 127.0.0.1', '', 1, '2019-05-25 01:25:43', NULL),
(34, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 'http://127.0.0.1:8000/admin/logout', ' logout', '', NULL, '2019-05-25 06:06:57', NULL),
(35, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 'http://127.0.0.1:8000/admin/login', 'admin@crudbooster.com login with IP Address 127.0.0.1', '', 1, '2019-06-13 03:02:45', NULL),
(36, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/add-save', 'Add New Data Transactions at Menu Management', '', 1, '2019-06-13 03:05:32', NULL),
(37, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/delete/7', 'Delete data Transactions at Menu Management', '', 1, '2019-06-13 03:06:42', NULL),
(38, '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36', 'http://127.0.0.1:8000/admin/menu_management/add-save', 'Add New Data Transactions at Menu Management', '', 1, '2019-06-13 03:07:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus`
--

CREATE TABLE `cms_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'url',
  `path` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_dashboard` tinyint(1) NOT NULL DEFAULT '0',
  `id_cms_privileges` int(11) DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cms_menus`
--

INSERT INTO `cms_menus` (`id`, `name`, `type`, `path`, `color`, `icon`, `parent_id`, `is_active`, `is_dashboard`, `id_cms_privileges`, `sorting`, `created_at`, `updated_at`) VALUES
(2, 'Events', 'Route', 'AdminEvents13ControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 1, '2019-05-18 12:50:30', NULL),
(3, 'Job Category', 'Route', 'AdminJobCategoriesControllerGetIndex', NULL, 'fa fa-heart', 0, 1, 0, 1, 2, '2019-05-20 11:09:59', NULL),
(4, 'Employee', 'Route', 'AdminEmployeSectionControllerGetIndex', NULL, 'fa fa-film', 0, 1, 0, 1, 3, '2019-05-20 11:12:43', NULL),
(5, 'Job Location', 'Route', 'AdminJobLocationControllerGetIndex', NULL, 'fa fa-glass', 0, 1, 0, 1, 4, '2019-05-20 11:13:22', NULL),
(6, 'User Access Control', 'Controller & Method', 'RegistrationController@member_approve', 'green', 'fa fa-gears', 0, 1, 0, 1, NULL, '2019-05-20 13:13:39', NULL),
(8, 'Transactions', 'Controller & Method', 'AccountsController@transactions_control', 'aqua', 'fa fa-dollar', 0, 1, 0, 1, NULL, '2019-06-13 03:07:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus_privileges`
--

CREATE TABLE `cms_menus_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_menus` int(11) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cms_menus_privileges`
--

INSERT INTO `cms_menus_privileges` (`id`, `id_cms_menus`, `id_cms_privileges`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_moduls`
--

CREATE TABLE `cms_moduls` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `table_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cms_moduls`
--

INSERT INTO `cms_moduls` (`id`, `name`, `icon`, `path`, `table_name`, `controller`, `is_protected`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Notifications', 'fa fa-cog', 'notifications', 'cms_notifications', 'NotificationsController', 1, 1, '2019-05-18 10:14:59', NULL, NULL),
(2, 'Privileges', 'fa fa-cog', 'privileges', 'cms_privileges', 'PrivilegesController', 1, 1, '2019-05-18 10:14:59', NULL, NULL),
(3, 'Privileges Roles', 'fa fa-cog', 'privileges_roles', 'cms_privileges_roles', 'PrivilegesRolesController', 1, 1, '2019-05-18 10:14:59', NULL, NULL),
(4, 'Users Management', 'fa fa-users', 'users', 'cms_users', 'AdminCmsUsersController', 0, 1, '2019-05-18 10:14:59', NULL, NULL),
(5, 'Settings', 'fa fa-cog', 'settings', 'cms_settings', 'SettingsController', 1, 1, '2019-05-18 10:14:59', NULL, NULL),
(6, 'Module Generator', 'fa fa-database', 'module_generator', 'cms_moduls', 'ModulsController', 1, 1, '2019-05-18 10:14:59', NULL, NULL),
(7, 'Menu Management', 'fa fa-bars', 'menu_management', 'cms_menus', 'MenusController', 1, 1, '2019-05-18 10:14:59', NULL, NULL),
(8, 'Email Templates', 'fa fa-envelope-o', 'email_templates', 'cms_email_templates', 'EmailTemplatesController', 1, 1, '2019-05-18 10:14:59', NULL, NULL),
(9, 'Statistic Builder', 'fa fa-dashboard', 'statistic_builder', 'cms_statistics', 'StatisticBuilderController', 1, 1, '2019-05-18 10:14:59', NULL, NULL),
(10, 'API Generator', 'fa fa-cloud-download', 'api_generator', '', 'ApiCustomController', 1, 1, '2019-05-18 10:14:59', NULL, NULL),
(11, 'Log User Access', 'fa fa-flag-o', 'logs', 'cms_logs', 'LogsController', 1, 1, '2019-05-18 10:14:59', NULL, NULL),
(12, 'Events', 'fa fa-glass', 'events', 'events', 'AdminEventsController', 0, 0, '2019-05-18 11:09:09', NULL, '2019-05-18 12:48:15'),
(13, 'Events', 'fa fa-glass', 'events13', 'events', 'AdminEvents13Controller', 0, 0, '2019-05-18 12:50:30', NULL, NULL),
(14, 'Job Category', 'fa fa-heart', 'job_categories', 'job_categories', 'AdminJobCategoriesController', 0, 0, '2019-05-20 11:09:58', NULL, NULL),
(15, 'Employee', 'fa fa-film', 'employe_section', 'employe_section', 'AdminEmployeSectionController', 0, 0, '2019-05-20 11:12:43', NULL, NULL),
(16, 'Job Location', 'fa fa-glass', 'job_location', 'job_location', 'AdminJobLocationController', 0, 0, '2019-05-20 11:13:22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_notifications`
--

CREATE TABLE `cms_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_users` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cms_privileges`
--

CREATE TABLE `cms_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `is_superadmin` tinyint(1) DEFAULT NULL,
  `theme_color` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cms_privileges`
--

INSERT INTO `cms_privileges` (`id`, `name`, `is_superadmin`, `theme_color`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 1, 'skin-red', '2019-05-18 10:14:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_privileges_roles`
--

CREATE TABLE `cms_privileges_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `is_create` tinyint(1) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `is_edit` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `id_cms_moduls` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cms_privileges_roles`
--

INSERT INTO `cms_privileges_roles` (`id`, `is_visible`, `is_create`, `is_read`, `is_edit`, `is_delete`, `id_cms_privileges`, `id_cms_moduls`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, 1, 1, '2019-05-18 10:15:00', NULL),
(2, 1, 1, 1, 1, 1, 1, 2, '2019-05-18 10:15:00', NULL),
(3, 0, 1, 1, 1, 1, 1, 3, '2019-05-18 10:15:00', NULL),
(4, 1, 1, 1, 1, 1, 1, 4, '2019-05-18 10:15:00', NULL),
(5, 1, 1, 1, 1, 1, 1, 5, '2019-05-18 10:15:00', NULL),
(6, 1, 1, 1, 1, 1, 1, 6, '2019-05-18 10:15:00', NULL),
(7, 1, 1, 1, 1, 1, 1, 7, '2019-05-18 10:15:00', NULL),
(8, 1, 1, 1, 1, 1, 1, 8, '2019-05-18 10:15:00', NULL),
(9, 1, 1, 1, 1, 1, 1, 9, '2019-05-18 10:15:00', NULL),
(10, 1, 1, 1, 1, 1, 1, 10, '2019-05-18 10:15:00', NULL),
(11, 1, 0, 1, 0, 1, 1, 11, '2019-05-18 10:15:00', NULL),
(12, 1, 1, 1, 1, 1, 1, 12, NULL, NULL),
(13, 1, 1, 1, 1, 1, 1, 13, NULL, NULL),
(14, 1, 1, 1, 1, 1, 1, 14, NULL, NULL),
(15, 1, 1, 1, 1, 1, 1, 15, NULL, NULL),
(16, 1, 1, 1, 1, 1, 1, 16, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_settings`
--

CREATE TABLE `cms_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `content` text COLLATE utf8_bin,
  `content_input_type` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `dataenum` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `helper` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_setting` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `label` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `name`, `content`, `content_input_type`, `dataenum`, `helper`, `created_at`, `updated_at`, `group_setting`, `label`) VALUES
(1, 'login_background_color', NULL, 'text', NULL, 'Input hexacode', '2019-05-18 10:15:00', NULL, 'Login Register Style', 'Login Background Color'),
(2, 'login_font_color', NULL, 'text', NULL, 'Input hexacode', '2019-05-18 10:15:00', NULL, 'Login Register Style', 'Login Font Color'),
(3, 'login_background_image', NULL, 'upload_image', NULL, NULL, '2019-05-18 10:15:00', NULL, 'Login Register Style', 'Login Background Image'),
(4, 'email_sender', 'support@crudbooster.com', 'text', NULL, NULL, '2019-05-18 10:15:00', NULL, 'Email Setting', 'Email Sender'),
(5, 'smtp_driver', 'mail', 'select', 'smtp,mail,sendmail', NULL, '2019-05-18 10:15:00', NULL, 'Email Setting', 'Mail Driver'),
(6, 'smtp_host', '', 'text', NULL, NULL, '2019-05-18 10:15:00', NULL, 'Email Setting', 'SMTP Host'),
(7, 'smtp_port', '25', 'text', NULL, 'default 25', '2019-05-18 10:15:00', NULL, 'Email Setting', 'SMTP Port'),
(8, 'smtp_username', '', 'text', NULL, NULL, '2019-05-18 10:15:00', NULL, 'Email Setting', 'SMTP Username'),
(9, 'smtp_password', '', 'text', NULL, NULL, '2019-05-18 10:15:00', NULL, 'Email Setting', 'SMTP Password'),
(10, 'appname', 'SIPEAA', 'text', NULL, NULL, '2019-05-18 10:15:00', NULL, 'Application Setting', 'Application Name'),
(11, 'default_paper_size', 'Legal', 'text', NULL, 'Paper size, ex : A4, Legal, etc', '2019-05-18 10:15:00', NULL, 'Application Setting', 'Default Paper Print Size'),
(12, 'logo', 'uploads/2019-05/cb205db7148cb8b6470c0c0957f78ab2.png', 'upload_image', NULL, NULL, '2019-05-18 10:15:00', NULL, 'Application Setting', 'Logo'),
(13, 'favicon', 'uploads/2019-05/a561bef8487e7eb589b06d0ef43e0586.png', 'upload_image', NULL, NULL, '2019-05-18 10:15:00', NULL, 'Application Setting', 'Favicon'),
(14, 'api_debug_mode', 'true', 'select', 'true,false', NULL, '2019-05-18 10:15:00', NULL, 'Application Setting', 'API Debug Mode'),
(15, 'google_api_key', NULL, 'text', NULL, NULL, '2019-05-18 10:15:00', NULL, 'Application Setting', 'Google API Key'),
(16, 'google_fcm_key', NULL, 'text', NULL, NULL, '2019-05-18 10:15:00', NULL, 'Application Setting', 'Google FCM Key');

-- --------------------------------------------------------

--
-- Table structure for table `cms_statistics`
--

CREATE TABLE `cms_statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cms_statistic_components`
--

CREATE TABLE `cms_statistic_components` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_statistics` int(11) DEFAULT NULL,
  `componentID` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `component_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `area_name` varchar(55) COLLATE utf8_bin DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `config` longtext COLLATE utf8_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE `cms_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`id`, `name`, `photo`, `email`, `password`, `id_cms_privileges`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Super Admin', 'uploads/1/2019-05/roadster_hero0.jpg', 'admin@crudbooster.com', '$2y$10$CRHsoVVlDem89zIcCebCku0eW2sUVVE2Dt/sngRkW5zli3q1DgBIG', 1, '2019-05-18 10:14:59', '2019-05-23 10:57:03', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `contact_person_designation` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `contact_person_mobile` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `contact_person_email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `job_area_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `user_id`, `company_name`, `contact_person`, `contact_person_designation`, `contact_person_mobile`, `contact_person_email`, `job_area_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 'fds', 'sdfs', 'sdfs', '2345678', 'fsdfs@gmail.com', 0, 'sdfs', NULL, NULL),
(2, 0, 'fds', 'sdfs', 'sdfs', '2345678', 'fsdfs@gmail.com', 0, 'sdfs', NULL, NULL),
(3, 0, 'fds', 'sdfs', 'sdfs', '2345678', 'fsdfs@gmail.com', 0, 'sdfs', NULL, NULL),
(4, 0, 'fds', 'ssf dsdfs', 'sdfs', '2345678', 'fsdfs@gmail.com', 0, 'sfss', NULL, NULL),
(5, 0, 'fds', 'ssf dsdfs', 'sdfs', '2345678', 'fsdfs@gmail.com', 0, 'fafa', NULL, NULL),
(6, 0, 'fds', 'ssf dsdfs', 'sdfs', '2345678', 'fsdfs@gmail.com', 0, 'fsfs', NULL, NULL),
(7, 0, 'fds', 'ssf dsdfs', 'sdfs', '2345678', 'fsdfs@gmail.com', 0, 'asada', NULL, NULL),
(8, 0, 'fds', 'ssf dsdfs', 'sdfs', '2345678', 'fsdfs@gmail.com', 0, 'asada', NULL, NULL),
(9, 0, 'fds', 'ssf dsdfs', 'sdfs', '2345678', 'fsdfs@gmail.com', 0, 'sada', NULL, NULL),
(10, 0, 'faf', 'fsdf', 'sdfs', 'fda', 'admsssdfsin@crudbooster.com', 1, 'sdfasf', NULL, NULL),
(11, 18, 'fgg', 'ssf dsdfs', 'sdfs', '2345678', 'adsfsdfsmin@crudbooster.com', 4, 'efsef', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employe_section`
--

CREATE TABLE `employe_section` (
  `id` int(10) UNSIGNED NOT NULL,
  `employe_section` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `short_description` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `images` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `short_description`, `description`, `images`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(6, 'Localhost admin login problem', 'xxvz', 'zvvz', 'uploads/1/2019-05/roadster_hero0.jpg', '2019-06-05', '2019-06-06', '2019-05-18 12:10:53', '2019-05-20 09:58:54'),
(7, 'rokon', 'sdfs', 'sff', 'uploads/1/2019-05/model_s_hero_e1556066115259.jpg', '2019-05-07', '2019-05-08', '2019-05-18 12:46:05', '2019-05-20 09:58:20'),
(8, 'Localhost admin login problem', 'Localhost admin login problem', 'Localhost admin login problem', 'uploads/1/2019-05/roadster_hero0.jpg', '2019-05-10', '2019-05-11', '2019-05-18 12:52:07', NULL),
(9, 'rokon', 'sdfsdf', 'sfs', 'uploads/1/2019-05/roadster_hero0.jpg', '2019-06-06', '2019-05-07', '2019-05-20 09:26:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `short_description` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `private` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `conversation_id` int(10) UNSIGNED DEFAULT NULL,
  `extra_info` text COLLATE utf8_bin,
  `settings` text COLLATE utf8_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `short_description`, `image`, `url`, `user_id`, `private`, `conversation_id`, `extra_info`, `settings`, `created_at`, `updated_at`) VALUES
(6, 'shohag', 'dsaljf', 'fafa', NULL, NULL, 11, 0, NULL, NULL, NULL, '2019-05-23 10:28:09', '2019-05-23 10:28:09'),
(7, 'Rokon Ahmed', 'dsaljf', 'fafa', NULL, NULL, 11, 0, NULL, NULL, NULL, '2019-05-23 10:28:24', '2019-05-23 10:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `group_post`
--

CREATE TABLE `group_post` (
  `group_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `group_request`
--

CREATE TABLE `group_request` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `group_user`
--

INSERT INTO `group_user` (`id`, `user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(6, 11, 6, '2019-05-23 10:28:09', '2019-05-23 10:28:09'),
(7, 11, 7, '2019-05-23 10:28:24', '2019-05-23 10:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `job_position` varchar(255) COLLATE utf8_bin NOT NULL,
  `no_vacancy` varchar(255) COLLATE utf8_bin NOT NULL,
  `job_category_id` int(11) NOT NULL,
  `job_location_id` int(11) NOT NULL,
  `job_details` text COLLATE utf8_bin NOT NULL,
  `job_experience` text COLLATE utf8_bin NOT NULL,
  `job_type` varchar(255) COLLATE utf8_bin NOT NULL,
  `salary` varchar(255) COLLATE utf8_bin NOT NULL,
  `application_deadline` varchar(255) COLLATE utf8_bin NOT NULL,
  `application_instruction` varchar(255) COLLATE utf8_bin NOT NULL,
  `company_image` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `user_id`, `company_name`, `job_position`, `no_vacancy`, `job_category_id`, `job_location_id`, `job_details`, `job_experience`, `job_type`, `salary`, `application_deadline`, `application_instruction`, `company_image`, `created_at`, `updated_at`) VALUES
(12, 'web developer job', 11, 'Optima solutions', 'backend developer', '21', 3, 1, 'this is a test job', 'this is test description', 'full_time', '50000', '2019-05-10', 'this is test instruction', '23f34df74d10a04c8efef7a2e15271b0.jpg', '2019-05-26 20:56:57', NULL),
(13, 'dfsaf', 11, 'dsfa', 'sfs', 'dfas', 1, 4, 'dsfa', 'sdfas', 'full_time', '123356', '2019-05-16', 'fdaf', 'headphones_0.jpg', '2019-05-27 05:54:04', NULL),
(14, 'web developer job', 11, 'web zone bd', 'backend developer', '21', 3, 5, 'hello there are you thre', 'bbnn mmm kln nmnkn', 'full_time', '123356', '2019-05-25', 'inhoynibiiiiiii        offb', 'dualscreen_laptop.jpeg', '2019-05-28 15:49:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_applies`
--

CREATE TABLE `job_applies` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `job_id` int(11) NOT NULL,
  `company_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `job_position` varchar(255) COLLATE utf8_bin NOT NULL,
  `category_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `expected_salary` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `job_applies`
--

INSERT INTO `job_applies` (`id`, `job_title`, `job_id`, `company_name`, `job_position`, `category_name`, `expected_salary`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(15, 'web developer job', 12, 'Optima solutions', 'backend developer', 'Commercial/Supply Chain', '20000', 11, 1, '2019-05-28 16:16:32', NULL),
(16, 'web developer job', 14, 'web zone bd', 'backend developer', 'Commercial/Supply Chain', '20000', 11, 1, '2019-05-28 16:32:15', NULL),
(17, 'dfsaf', 13, 'dsfa', 'sfs', 'Accounting/Finance', '20000', 11, 1, '2019-05-28 16:37:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Accounting/Finance', '2019-05-20 11:11:06', NULL),
(2, 'Bank/ Non-Bank Fin. Institution', '2019-05-20 11:11:22', NULL),
(3, 'Commercial/Supply Chain', '2019-05-20 11:11:32', NULL),
(4, 'Education/Training', '2019-05-20 11:11:43', NULL),
(5, 'Engineer/Architects', '2019-05-20 11:12:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_location`
--

CREATE TABLE `job_location` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `job_location`
--

INSERT INTO `job_location` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', '2019-05-20 11:14:16', NULL),
(2, 'Chittagong', '2019-05-20 11:14:22', NULL),
(3, 'Gazipur', '2019-05-20 11:14:27', NULL),
(4, 'Comilla', '2019-05-20 11:14:33', NULL),
(5, 'Mymensingh', '2019-05-20 11:14:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laravel_fulltext`
--

CREATE TABLE `laravel_fulltext` (
  `id` int(10) UNSIGNED NOT NULL,
  `indexable_id` int(11) NOT NULL,
  `indexable_type` varchar(255) COLLATE utf8_bin NOT NULL,
  `indexed_title` text COLLATE utf8_bin NOT NULL,
  `indexed_content` text COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `likeable_id` int(10) UNSIGNED NOT NULL,
  `likeable_type` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `addmission_year` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `passing_year` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `reg_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `batch_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `experience_year` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `job_area_id` int(11) DEFAULT NULL,
  `job_skill` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `images` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `user_id`, `users_id`, `phone`, `blood_group`, `addmission_year`, `passing_year`, `reg_no`, `batch_no`, `experience_year`, `job_area_id`, `job_skill`, `images`, `created_at`, `updated_at`) VALUES
(1, 'ssf', 'dsdfs', 'admin@crudbooster.com', 0, '2345678', 'A+', 'dsf', 'sf', 'sfsf', '222', 'dfsf', 0, 'sfs', 'Banner-1.png', NULL, NULL),
(2, 'ssf', 'dsdfs', 'admin@admin.com', 0, '2345678', 'A+', 'dsf', 'sf', 'sfsf', '222', 'dfsf', 0, 'dsdsfs', 'Banner-1.png', NULL, NULL),
(3, 'ssf', 'dsdfs', 'ussser@user.com', 0, '2345678', 'B+', 'dsf', 'sf', 'sfsf', '222', 'dfsf', 0, 'sdasd', 'Banner-1.png', NULL, NULL),
(4, 'new memer', 'registration', 'new@new.com', 0, '2345678', 'A-', '2112', '121', '121', '121', '1414', 1, 'ervertvetwrt e ertwt', 'Banner-1.png', NULL, NULL),
(5, 'fadsf', 'sdfsf', 'admin@crudbdsfaooster.com', 16, '2345678', 'A+', '2112', '121', '121', '121', '1414', 2, NULL, 'Banner-1.png', NULL, NULL),
(6, 'Md Rokon', 'Ahmed', 'rokon@crudbooster.com', 19, '2345678', 'B-', '2112', '121', '121', '121', '1414', 3, NULL, 'Banner-1.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_bin NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_08_07_145904_add_table_cms_apicustom', 1),
(2, '2016_08_07_150834_add_table_cms_dashboard', 1),
(3, '2016_08_07_151210_add_table_cms_logs', 1),
(4, '2016_08_07_151211_add_details_cms_logs', 1),
(5, '2016_08_07_152014_add_table_cms_privileges', 1),
(6, '2016_08_07_152214_add_table_cms_privileges_roles', 1),
(7, '2016_08_07_152320_add_table_cms_settings', 1),
(8, '2016_08_07_152421_add_table_cms_users', 1),
(9, '2016_08_07_154624_add_table_cms_menus_privileges', 1),
(10, '2016_08_07_154624_add_table_cms_moduls', 1),
(11, '2016_08_17_225409_add_status_cms_users', 1),
(12, '2016_08_20_125418_add_table_cms_notifications', 1),
(13, '2016_09_04_033706_add_table_cms_email_queues', 1),
(14, '2016_09_16_035347_add_group_setting', 1),
(15, '2016_09_16_045425_add_label_setting', 1),
(16, '2016_09_17_104728_create_nullable_cms_apicustom', 1),
(17, '2016_10_01_141740_add_method_type_apicustom', 1),
(18, '2016_10_01_141846_add_parameters_apicustom', 1),
(19, '2016_10_01_141934_add_responses_apicustom', 1),
(20, '2016_10_01_144826_add_table_apikey', 1),
(21, '2016_11_14_141657_create_cms_menus', 1),
(22, '2016_11_15_132350_create_cms_email_templates', 1),
(23, '2016_11_15_190410_create_cms_statistics', 1),
(24, '2016_11_17_102740_create_cms_statistic_components', 1),
(25, '2017_06_06_164501_add_deleted_at_cms_moduls', 1),
(26, '2019_05_18_170800_create_events_table', 2),
(27, '2019_05_19_163624_create_members_table', 3),
(28, '2019_05_19_163739_create_employee_table', 3),
(29, '2019_05_19_164619_create_users_table', 3),
(30, '2019_05_20_170250_create_job_categories_table', 4),
(31, '2019_05_20_170516_create_job_location_table', 4),
(32, '2019_05_20_170613_create_employe_section_table', 4),
(33, '2016_11_04_152913_create_laravel_fulltext_table', 5),
(34, '2018_05_28_224023_create_blog_etc_posts_table', 5),
(35, '2018_09_16_224023_add_author_and_url_blog_etc_posts_table', 5),
(36, '2018_09_26_085711_add_short_desc_textrea_to_blog_etc', 5),
(37, '2018_09_27_122627_create_blog_etc_uploaded_photos_table', 5),
(38, '2019_05_23_144640_create_groups_tables', 6),
(39, '2019_05_23_170444_create_article_boards_table', 7),
(40, '2019_05_24_053438_create_jobs_table', 7),
(41, '2019_05_25_143716_create_job_applies_table', 8),
(42, '2019_06_12_091610_create_acounts_head_table', 9),
(43, '2019_06_12_103532_create_transactions_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `body` text COLLATE utf8_bin NOT NULL,
  `type` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `extra_info` text COLLATE utf8_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `user_id` int(11) NOT NULL,
  `reportable_id` int(10) UNSIGNED NOT NULL,
  `reportable_type` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `transactions_type` varchar(255) COLLATE utf8_bin NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_bin NOT NULL,
  `transactions_head` varchar(255) COLLATE utf8_bin NOT NULL,
  `transactions_date` varchar(255) COLLATE utf8_bin NOT NULL,
  `transactions_amount` varchar(255) COLLATE utf8_bin NOT NULL,
  `transactions_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `transactions_status` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transactions_type`, `payment_type`, `transactions_head`, `transactions_date`, `transactions_amount`, `transactions_id`, `transactions_status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '1', '2019-06-13', '$717 - $1000', 'test id', '0', 10, NULL, NULL),
(2, '2', '1', '1', '2019-06-13', '$8542 - $100000', 'test id', '0', 10, NULL, NULL),
(3, '1', 'bank_transfer', '1', '2019-06-11', '$717 - $1000', 'test id', '0', 11, '2019-06-13 15:56:51', '2019-06-13 15:56:51'),
(4, '1', 'cash', '2', '2019-06-08', '$8542 - $100000', 'test id', '0', 10, '2019-06-13 15:57:12', '2019-06-13 15:57:12'),
(5, '2', 'invoice', '2', '2019-06-13', '$224 - $1000', 'test id', '0', 11, '2019-06-13 17:56:32', '2019-06-13 17:56:32'),
(6, '1', 'paypal', '1', '2019-06-14', '$0 - $19146', 'test paypal', '0', 11, '2019-06-13 18:32:05', '2019-06-13 18:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `approve` tinyint(1) NOT NULL DEFAULT '0',
  `admin` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `approve`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'test product new', 'admasdin@crudbooster.com', '$2y$10$wUI536c6Z9m1dxrxYm6rs.zLNwiCWBREnm11TY2Wlepg0sKJm4MwO', 0, NULL, '7KQzSqqo4BGTaZtYq7B3GZIvP6ZZFd9QOQKhjXzvCjlTm5j7ow8p4hifsRPN', NULL, NULL),
(11, 'test product new', 'admin@crudbooster.com', '$2y$10$wUI536c6Z9m1dxrxYm6rs.zLNwiCWBREnm11TY2Wlepg0sKJm4MwO', 1, '1', '6ySPSBzy7tNuBh7EEJrnvVyCWfltFij2g3mdGNeVN1AYgB7aCtsujlrHt3oy', NULL, NULL),
(12, 'test product new', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, NULL, NULL, NULL),
(13, 'test product new', 'new@new.com', '$2y$10$gVxn2c4RKcz4B2kXdUckT.ZDn8j/GZz3TD7/TgDG3W9ILR6mv7ymW', 0, NULL, 'QYyqkWbpTR1U8Lfq4bmbVgbxgn3FTZoWLiVlXOAKbwvhXf3PsSTP8n9jvdOA', NULL, NULL),
(14, 'test product new', 'admsssdfsin@crudbooster.com', '$2y$10$ynJWkeNlqA1rJP71g0o.1OKB.5yRPa6933UwKLxjgY3pszuBMNp4S', 1, NULL, NULL, NULL, NULL),
(15, 'test product new', 'fg@gmil.com', '$2y$10$A./pdG.Ks69Djw9/dsX3GO9m.VC/SOTENtxwN40D.U6LHSnd/NBA.', 0, NULL, NULL, NULL, NULL),
(16, 'test product new', 'admin@crudbdsfaooster.com', '$2y$10$wbJ.UMLpJbk4p4npqQsRz.YPnCezY/.u8shZTno/fzvg0DH.mo35C', 0, NULL, NULL, NULL, NULL),
(17, 'test product new', 'adsfsdfsmin@crudbooster.com', '$2y$10$MeoFjaWNhVex0dvn2jiuqueYPNyL61J2YhbqKskPEngpVXFwxdJ.S', 0, NULL, NULL, NULL, NULL),
(18, 'test product new', 'adsfsdfsmin@cruddsfsdfsdfsdfbooster.com', '$2y$10$Ebq7tIyEGb.3.yxTjAt4Burqzbjk1D606/sETGMNV3yaGbGc7QFG2', 0, NULL, NULL, NULL, NULL),
(19, 'test product new', 'rokon@crudbooster.com', '$2y$10$1rYZDXscA4Tk7Avqz3wsNOJaVLLqvT0k7I.qQzC6Tcxy.7Aw.eSR2', 0, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acounts_head`
--
ALTER TABLE `acounts_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_boards`
--
ALTER TABLE `article_boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_etc_categories`
--
ALTER TABLE `blog_etc_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_etc_categories_slug_unique` (`slug`),
  ADD KEY `blog_etc_categories_created_by_index` (`created_by`);

--
-- Indexes for table `blog_etc_comments`
--
ALTER TABLE `blog_etc_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_etc_comments_blog_etc_post_id_index` (`blog_etc_post_id`),
  ADD KEY `blog_etc_comments_user_id_index` (`user_id`);

--
-- Indexes for table `blog_etc_posts`
--
ALTER TABLE `blog_etc_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_etc_posts_slug_unique` (`slug`),
  ADD KEY `blog_etc_posts_user_id_index` (`user_id`),
  ADD KEY `blog_etc_posts_posted_at_index` (`posted_at`);

--
-- Indexes for table `blog_etc_post_categories`
--
ALTER TABLE `blog_etc_post_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_etc_post_categories_blog_etc_post_id_index` (`blog_etc_post_id`),
  ADD KEY `blog_etc_post_categories_blog_etc_category_id_index` (`blog_etc_category_id`);

--
-- Indexes for table `blog_etc_uploaded_photos`
--
ALTER TABLE `blog_etc_uploaded_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_etc_uploaded_photos_uploader_id_index` (`uploader_id`);

--
-- Indexes for table `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_apikey`
--
ALTER TABLE `cms_apikey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_logs`
--
ALTER TABLE `cms_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_menus`
--
ALTER TABLE `cms_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_moduls`
--
ALTER TABLE `cms_moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_privileges`
--
ALTER TABLE `cms_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_statistics`
--
ALTER TABLE `cms_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employe_section`
--
ALTER TABLE `employe_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_user_id_foreign` (`user_id`);

--
-- Indexes for table `group_post`
--
ALTER TABLE `group_post`
  ADD KEY `group_post_group_id_foreign` (`group_id`),
  ADD KEY `group_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `group_request`
--
ALTER TABLE `group_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_request_user_id_index` (`user_id`),
  ADD KEY `group_request_group_id_index` (`group_id`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_user_user_id_foreign` (`user_id`),
  ADD KEY `group_user_group_id_foreign` (`group_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applies`
--
ALTER TABLE `job_applies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_location`
--
ALTER TABLE `job_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laravel_fulltext`
--
ALTER TABLE `laravel_fulltext`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `laravel_fulltext_indexable_type_indexable_id_unique` (`indexable_type`,`indexable_id`);
ALTER TABLE `laravel_fulltext` ADD FULLTEXT KEY `fulltext_title` (`indexed_title`);
ALTER TABLE `laravel_fulltext` ADD FULLTEXT KEY `fulltext_title_content` (`indexed_title`,`indexed_content`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`user_id`,`likeable_id`,`likeable_type`),
  ADD KEY `likes_user_id_index` (`user_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`user_id`,`reportable_id`,`reportable_type`),
  ADD KEY `reports_user_id_index` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acounts_head`
--
ALTER TABLE `acounts_head`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `article_boards`
--
ALTER TABLE `article_boards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_etc_categories`
--
ALTER TABLE `blog_etc_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_etc_comments`
--
ALTER TABLE `blog_etc_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_etc_posts`
--
ALTER TABLE `blog_etc_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_etc_post_categories`
--
ALTER TABLE `blog_etc_post_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_etc_uploaded_photos`
--
ALTER TABLE `blog_etc_uploaded_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_apikey`
--
ALTER TABLE `cms_apikey`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_logs`
--
ALTER TABLE `cms_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `cms_menus`
--
ALTER TABLE `cms_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cms_moduls`
--
ALTER TABLE `cms_moduls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_privileges`
--
ALTER TABLE `cms_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cms_settings`
--
ALTER TABLE `cms_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cms_statistics`
--
ALTER TABLE `cms_statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employe_section`
--
ALTER TABLE `employe_section`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `group_request`
--
ALTER TABLE `group_request`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_user`
--
ALTER TABLE `group_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `job_applies`
--
ALTER TABLE `job_applies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_location`
--
ALTER TABLE `job_location`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laravel_fulltext`
--
ALTER TABLE `laravel_fulltext`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_etc_comments`
--
ALTER TABLE `blog_etc_comments`
  ADD CONSTRAINT `blog_etc_comments_blog_etc_post_id_foreign` FOREIGN KEY (`blog_etc_post_id`) REFERENCES `blog_etc_posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_etc_post_categories`
--
ALTER TABLE `blog_etc_post_categories`
  ADD CONSTRAINT `blog_etc_post_categories_blog_etc_category_id_foreign` FOREIGN KEY (`blog_etc_category_id`) REFERENCES `blog_etc_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_etc_post_categories_blog_etc_post_id_foreign` FOREIGN KEY (`blog_etc_post_id`) REFERENCES `blog_etc_posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_post`
--
ALTER TABLE `group_post`
  ADD CONSTRAINT `group_post_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_request`
--
ALTER TABLE `group_request`
  ADD CONSTRAINT `group_request_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_request_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_user`
--
ALTER TABLE `group_user`
  ADD CONSTRAINT `group_user_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
