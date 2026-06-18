-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: poba_db
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alumni_users`
--

DROP TABLE IF EXISTS `alumni_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumni_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `entry` int(11) DEFAULT NULL,
  `ccp_no` varchar(255) DEFAULT NULL,
  `house` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `field_of_study` varchar(255) DEFAULT NULL,
  `field_of_work` varchar(255) DEFAULT NULL,
  `current_city` varchar(255) DEFAULT NULL,
  `current_country` varchar(255) DEFAULT NULL,
  `current_designation` varchar(255) DEFAULT NULL,
  `current_organization` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `achievements` text DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `cnic_file` varchar(255) DEFAULT NULL,
  `consent_sharing` tinyint(1) NOT NULL DEFAULT 0,
  `agree_terms` tinyint(1) NOT NULL DEFAULT 0,
  `privacy_settings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`privacy_settings`)),
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_star_alumni` tinyint(1) NOT NULL DEFAULT 0,
  `star_description` text DEFAULT NULL,
  `featured_text` varchar(255) DEFAULT NULL,
  `class_year` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alumni_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumni_users`
--

LOCK TABLES `alumni_users` WRITE;
/*!40000 ALTER TABLE `alumni_users` DISABLE KEYS */;
INSERT INTO `alumni_users` VALUES (1,'Muhammad Zakaullah','alumni@poba.com','$2y$12$M9x8O4qcCjGWNY/F1s7aquAwMzpaKEnkO54gT4BRstWf0pjLPpLZO',5,'228','Jinnah','Bachelors','BBA','Marketing','Lahore','Pakistan','HOD Marketing Department','Adsells','+92 345 450 1450',NULL,NULL,NULL,1,1,NULL,'approved',1,0,NULL,NULL,'1975',NULL,'2026-06-17 15:27:03','2026-06-17 15:27:03'),(2,'ayesha','amna12@gmail.com','$2y$12$HY3XlZgiUIkQw.QRIVnmPOEwMLxYpnOadVCtwgO6z/KnZE2Vs4wBS',18,'7865','Ayub','Bachelors','cs','abc','Islamabad','Pakistan','abc','test','98658778654','bbbb','profiles/BuOKOv5xqgSXOihVUlbbebRVSDV7Wia50UHEOHth.png','cnics/g5l50lcEMC6M4jyM7KnGP2aiQOXXvX0nAn17A2yS.png',1,1,NULL,'pending',0,0,NULL,NULL,'2009',NULL,'2026-06-17 15:29:43','2026-06-17 15:29:43'),(3,'moomina zahid','moominazahid44@gmail.com','$2y$12$xzV.6mNeS8ChLkc9xejXXueCltHQHckfP6b.DMXdIakYmGi/Uy4LS',18,'876','Jinnah','Bachelors','SE','dev','Islamabad','Pakistan','dev','xyz','+92341169668','abc','profiles/profile_3_1781731908.jpg','cnics/cnic_3_1781731908.jpg',1,1,'[\"email\"]','approved',1,1,'testing',NULL,'2010','5DbALlGsTLdDLfWLiHojEnITSOUzfgunWAdxDsKyh0LEdcIx7ku13UkWqfu4','2026-06-17 16:31:48','2026-06-18 11:24:33'),(4,'moomina','moominazahid446@gmail.com','$2y$12$Z1z2vruuBSPRDJVPBo9CyeILPkOk4a5e5BkV9d8HVZ2Nod.ZP7BcW',11,'1364','Jinnah','Bachelors','SE','DEV','ISB','pakistan','DEV','dev','97659899','ndwid','profiles/profile_4_1781786699.png','cnics/cnic_4_1781786701.png',1,1,'[\"Email Address\"]','pending',0,0,NULL,NULL,NULL,NULL,'2026-06-18 07:44:59','2026-06-18 07:45:01'),(5,'moomina','moominazahid449@gmail.com','$2y$12$2gAKiMrIYwLQ80PpsSEDzuNvlufKkpayVsR7Acp06qfI/9G7qyfYy',14,'1364','Iqbal','Bachelors','SE','DEV','Islamabad','Pakistan','DEV','dev','+921234567891','ffffee','profiles/profile_5_1781790110.png','cnics/cnic_5_1781790110.png',1,1,'[\"City\",\"Phone Number\"]','pending',0,0,NULL,NULL,NULL,NULL,'2026-06-18 08:41:50','2026-06-18 08:41:50');
/*!40000 ALTER TABLE `alumni_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_settings`
--

DROP TABLE IF EXISTS `cms_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cms_settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_settings`
--

LOCK TABLES `cms_settings` WRITE;
/*!40000 ALTER TABLE `cms_settings` DISABLE KEYS */;
INSERT INTO `cms_settings` VALUES (1,'hero_title','Welcome to POBA Alumni Network','2026-06-17 15:27:03','2026-06-17 15:27:03'),(2,'hero_tagline','Serving with Valour','2026-06-17 15:27:03','2026-06-17 15:27:03'),(3,'hero_description','Join our prestigious community of Pakistan Ocean & Bay Alumni. Stay connected, share experiences, and build lasting professional relationships.','2026-06-17 15:27:03','2026-06-17 15:27:03'),(4,'hero_btn_text','Become a Member','2026-06-17 15:27:03','2026-06-17 15:27:03'),(5,'about_title','About POBA','2026-06-17 15:27:03','2026-06-17 15:27:03'),(6,'about_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','2026-06-17 15:27:03','2026-06-17 15:27:03'),(7,'about_btn_text','Become a Member','2026-06-17 15:27:03','2026-06-17 15:27:03'),(8,'mission_title','Our Mission','2026-06-17 15:27:03','2026-06-17 15:27:03'),(9,'mission_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','2026-06-17 15:27:03','2026-06-17 15:27:03'),(10,'history_title','Our History','2026-06-17 15:27:03','2026-06-17 15:27:03'),(11,'history_description','Milestones in POBA\'s journey of excellence','2026-06-17 15:27:03','2026-06-17 15:27:03'),(12,'history_timeline','[{\"year\":\"1947\",\"heading\":\"Foundation Era\",\"description\":\"Establishment of Pakistan Navy and the beginning of naval education traditions.\"},{\"year\":\"1965\",\"heading\":\"First Alumni Network\",\"description\":\"Formation of the first organized alumni association.\"},{\"year\":\"1980\",\"heading\":\"Formal Constitution\",\"description\":\"POBA officially constituted with formal structure and governance framework.\"},{\"year\":\"1995\",\"heading\":\"Modernization Phase\",\"description\":\"Introduction of modern communication systems and expanded alumni services.\"},{\"year\":\"2010\",\"heading\":\"Digital Transformation\",\"description\":\"Launch of digital platforms for better alumni connectivity.\"},{\"year\":\"2025\",\"heading\":\"New Horizons\",\"description\":\"Comprehensive website launch and enhanced alumni engagement initiatives.\"}]','2026-06-17 15:27:03','2026-06-17 15:27:03'),(13,'contact_email','info@poba.com','2026-06-17 15:27:03','2026-06-17 15:27:03'),(14,'contact_number','+92 21 123 4567','2026-06-17 15:27:03','2026-06-17 15:27:03'),(15,'location','Cadet College Palandri, AJK','2026-06-17 15:27:03','2026-06-17 15:27:03'),(16,'bank_title','Bank of AJK','2026-06-17 15:27:03','2026-06-17 15:27:03'),(17,'account_title','Palandarians Old Boys Association','2026-06-17 15:27:03','2026-06-17 15:27:03'),(18,'account_number','00001234657980','2026-06-17 15:27:03','2026-06-17 15:27:03'),(19,'branch_number','063','2026-06-17 15:27:03','2026-06-17 15:27:03'),(20,'footer_copyright','© 2025 POBA. All rights reserved.','2026-06-17 15:27:03','2026-06-17 15:27:03'),(21,'seo_title','POBA - Pakistan Ocean & Bay Alumni | Official Alumni Network','2026-06-17 15:27:03','2026-06-17 15:27:03'),(22,'seo_keywords','POBA, Pakistan Ocean Bay Alumni, Pakistan Navy Alumni, Naval Officers Network','2026-06-17 15:27:03','2026-06-17 15:27:03'),(23,'seo_description','Official Pakistan Ocean & Bay Alumni (POBA) network. Est. 1947.','2026-06-17 15:27:03','2026-06-17 15:27:03');
/*!40000 ALTER TABLE `cms_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `committee_members`
--

DROP TABLE IF EXISTS `committee_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `committee_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `committee_id` bigint(20) unsigned NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_url` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `committee_members_committee_id_foreign` (`committee_id`),
  CONSTRAINT `committee_members_committee_id_foreign` FOREIGN KEY (`committee_id`) REFERENCES `committees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `committee_members`
--

LOCK TABLES `committee_members` WRITE;
/*!40000 ALTER TABLE `committee_members` DISABLE KEYS */;
/*!40000 ALTER TABLE `committee_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `committees`
--

DROP TABLE IF EXISTS `committees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `committees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `type` enum('executive','working') NOT NULL DEFAULT 'working',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `committees`
--

LOCK TABLES `committees` WRITE;
/*!40000 ALTER TABLE `committees` DISABLE KEYS */;
/*!40000 ALTER TABLE `committees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_participants`
--

DROP TABLE IF EXISTS `event_participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_participants` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` bigint(20) unsigned NOT NULL,
  `alumni_user_id` bigint(20) unsigned NOT NULL,
  `status` enum('confirmed','pending','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_participants_event_id_foreign` (`event_id`),
  KEY `event_participants_alumni_user_id_foreign` (`alumni_user_id`),
  CONSTRAINT `event_participants_alumni_user_id_foreign` FOREIGN KEY (`alumni_user_id`) REFERENCES `alumni_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `event_participants_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_participants`
--

LOCK TABLES `event_participants` WRITE;
/*!40000 ALTER TABLE `event_participants` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `registration_required` tinyint(1) NOT NULL DEFAULT 0,
  `focal_person_name` varchar(255) DEFAULT NULL,
  `focal_person_number` varchar(255) DEFAULT NULL,
  `entry_batches` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`entry_batches`)),
  `logo` varchar(255) DEFAULT NULL,
  `is_upcoming` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faqs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` longtext NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,'What is POBA?','POBA stands for Palandarians\' Old Boys\' Association — the official alumni network of Cadet College Palandri.',1,'2026-06-17 15:27:03','2026-06-17 15:27:03'),(2,'How do I become a member?','Click \"Become a Member\" and fill out the Alumni Registration Form. Admin will review and approve your application.',2,'2026-06-17 15:27:03','2026-06-17 15:27:03'),(3,'How long does approval take?','Applications are reviewed within 3–5 business days. You will receive an email once approved.',3,'2026-06-17 15:27:03','2026-06-17 15:27:03'),(4,'How do I register for events?','Browse the Events page and click \"Register Now\". You must be a logged-in approved member.',4,'2026-06-17 15:27:03','2026-06-17 15:27:03'),(5,'Is my information private?','You control your privacy settings during registration. You can hide your email, phone, or city from other alumni.',5,'2026-06-17 15:27:03','2026-06-17 15:27:03'),(6,'Can I update my profile?','Yes. Contact the admin team to update your profile information at any time.',6,'2026-06-17 15:27:03','2026-06-17 15:27:03');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_folders`
--

DROP TABLE IF EXISTS `gallery_folders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery_folders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `folder_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `type` enum('Conference','Private','Public') NOT NULL DEFAULT 'Public',
  `class_year` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gallery_folders_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_folders`
--

LOCK TABLES `gallery_folders` WRITE;
/*!40000 ALTER TABLE `gallery_folders` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery_folders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_images`
--

DROP TABLE IF EXISTS `gallery_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gallery_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_folder_id` bigint(20) unsigned NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gallery_images_gallery_folder_id_foreign` (`gallery_folder_id`),
  CONSTRAINT `gallery_images_gallery_folder_id_foreign` FOREIGN KEY (`gallery_folder_id`) REFERENCES `gallery_folders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_images`
--

LOCK TABLES `gallery_images` WRITE;
/*!40000 ALTER TABLE `gallery_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_01_01_000001_create_alumni_users_table',1),(5,'2024_01_01_000002_create_events_table',1),(6,'2024_01_01_000003_create_event_participants_table',1),(7,'2026_06_13_174230_add_role_permissions_to_users_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promotions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `expiry_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotions`
--

LOCK TABLES `promotions` WRITE;
/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('hjQh7tcn84X87RGjLnVGSbkyVvNVHSpuqdHlTusd',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 OPR/131.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMGs5bkluRkpoanN4eWhxaW1OcVhMb2JmclpCUWlIMjd6ZFpST2Y0WSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo1MzoibG9naW5fYWx1bW5pXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9',1781810000),('rwfya5x7ALms3LVJwoZwhkW0G5Xpz00vKGnxPRQR',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 Edg/149.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR2I3QTNTSklLb2FUUHNPd21kcHBvdWM5c3VZUlFGRVU3bXdZeGVGVyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9maWxlIjtzOjU6InJvdXRlIjtzOjEyOiJwcm9maWxlLmVkaXQiO31zOjUzOiJsb2dpbl9hbHVtbmlfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=',1781808850),('STC6EwxB4mvaa3mikdQIy9Op20kbZanfItzXs4JG',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoicUlUMTRTY0VjSVZHdm9IS1FMT0ZWWXRJNkNNZnpkbENlRmZ5RDBUQiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9hbHVtbmktdXNlcnMvYXBwcm92YWxzIjtzOjU6InJvdXRlIjtzOjIyOiJhZG1pbi5hbHVtbmkuYXBwcm92YWxzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1781808816);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `role` enum('superadmin','admin') NOT NULL DEFAULT 'admin',
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permissions`)),
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super Admin','Male','superadmin',NULL,'admin@poba.com',NULL,'$2y$12$UnZF4YPtn53LAPExvuJVYusIBIhedNiPNsUDkEZl3Z/DfLSDKHK2a','qMtbbpNu8uGAT7NtVULCPN8MtzmmKOcabWNr1Fz7aw5adGizJzlGqyH0OOz7','2026-06-17 15:27:02','2026-06-17 15:27:02'),(2,'News Editor','Male','admin','[\"news\",\"gallery\"]','editor@poba.com',NULL,'$2y$12$NLiA8KN9vSMSE3H.xbImhu9xNbXQKgE2YHC6zajEkRNrq0GyyZVbm',NULL,'2026-06-17 15:27:03','2026-06-17 15:27:03'),(3,'Event Manager','Female','admin','[\"events\"]','eventmanager@poba.com',NULL,'$2y$12$qS7Q5FXL4MkK0MifNF3A3OH0XDxjPM0VS0a7OrRMPzJ8ZTx6IQcWa',NULL,'2026-06-17 15:27:03','2026-06-17 15:27:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-19  0:32:45
