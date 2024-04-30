-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 118.69.126.49    Database: 6valley
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `add_fund_bonus_categories`
--

DROP TABLE IF EXISTS `add_fund_bonus_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `add_fund_bonus_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bonus_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus_amount` double(14,2) NOT NULL DEFAULT '0.00',
  `min_add_money_amount` double(14,2) NOT NULL DEFAULT '0.00',
  `max_bonus_amount` double(14,2) NOT NULL DEFAULT '0.00',
  `start_date_time` datetime DEFAULT NULL,
  `end_date_time` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `add_fund_bonus_categories`
--

LOCK TABLES `add_fund_bonus_categories` WRITE;
/*!40000 ALTER TABLE `add_fund_bonus_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `add_fund_bonus_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `addon_settings`
--

DROP TABLE IF EXISTS `addon_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `addon_settings` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `test_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `settings_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mode` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'live',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  PRIMARY KEY (`id`),
  KEY `payment_settings_id_index` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addon_settings`
--

LOCK TABLES `addon_settings` WRITE;
/*!40000 ALTER TABLE `addon_settings` DISABLE KEYS */;
INSERT INTO `addon_settings` VALUES ('070c6bbd-d777-11ed-96f4-0c7a158e4469','twilio','{\"gateway\":\"twilio\",\"mode\":\"live\",\"status\":\"0\",\"sid\":\"data\",\"messaging_service_sid\":\"data\",\"token\":\"data\",\"from\":\"data\",\"otp_template\":\"data\"}','{\"gateway\":\"twilio\",\"mode\":\"live\",\"status\":\"0\",\"sid\":\"data\",\"messaging_service_sid\":\"data\",\"token\":\"data\",\"from\":\"data\",\"otp_template\":\"data\"}','sms_config','live',0,NULL,'2023-08-12 07:01:29',NULL),('070c766c-d777-11ed-96f4-0c7a158e4469','2factor','{\"gateway\":\"2factor\",\"mode\":\"live\",\"status\":\"0\",\"api_key\":\"data\"}','{\"gateway\":\"2factor\",\"mode\":\"live\",\"status\":\"0\",\"api_key\":\"data\"}','sms_config','live',0,NULL,'2023-08-12 07:01:36',NULL),('0d8a9308-d6a5-11ed-962c-0c7a158e4469','mercadopago','{\"gateway\":\"mercadopago\",\"mode\":\"live\",\"status\":0,\"access_token\":\"\",\"public_key\":\"\"}','{\"gateway\":\"mercadopago\",\"mode\":\"live\",\"status\":0,\"access_token\":\"\",\"public_key\":\"\"}','payment_config','test',0,NULL,'2023-08-27 11:57:11','{\"gateway_title\":\"Mercadopago\",\"gateway_image\":null}'),('0d8a9e49-d6a5-11ed-962c-0c7a158e4469','liqpay','{\"gateway\":\"liqpay\",\"mode\":\"live\",\"status\":0,\"private_key\":\"\",\"public_key\":\"\"}','{\"gateway\":\"liqpay\",\"mode\":\"live\",\"status\":0,\"private_key\":\"\",\"public_key\":\"\"}','payment_config','test',0,NULL,'2023-08-12 06:32:31','{\"gateway_title\":\"Liqpay\",\"gateway_image\":null}'),('101befdf-d44b-11ed-8564-0c7a158e4469','paypal','{\"gateway\":\"paypal\",\"mode\":\"live\",\"status\":\"0\",\"client_id\":\"\",\"client_secret\":\"\"}','{\"gateway\":\"paypal\",\"mode\":\"live\",\"status\":\"0\",\"client_id\":\"\",\"client_secret\":\"\"}','payment_config','test',0,NULL,'2023-08-30 03:41:32','{\"gateway_title\":\"Paypal\",\"gateway_image\":null}'),('133d9647-cabb-11ed-8fec-0c7a158e4469','hyper_pay','{\"gateway\":\"hyper_pay\",\"mode\":\"test\",\"status\":\"0\",\"entity_id\":\"data\",\"access_code\":\"data\"}','{\"gateway\":\"hyper_pay\",\"mode\":\"test\",\"status\":\"0\",\"entity_id\":\"data\",\"access_code\":\"data\"}','payment_config','test',0,NULL,'2023-08-12 06:32:42','{\"gateway_title\":null,\"gateway_image\":\"\"}'),('1821029f-d776-11ed-96f4-0c7a158e4469','msg91','{\"gateway\":\"msg91\",\"mode\":\"live\",\"status\":\"0\",\"template_id\":\"data\",\"auth_key\":\"data\"}','{\"gateway\":\"msg91\",\"mode\":\"live\",\"status\":\"0\",\"template_id\":\"data\",\"auth_key\":\"data\"}','sms_config','live',0,NULL,'2023-08-12 07:01:48',NULL),('18210f2b-d776-11ed-96f4-0c7a158e4469','nexmo','{\"gateway\":\"nexmo\",\"mode\":\"live\",\"status\":\"0\",\"api_key\":\"\",\"api_secret\":\"\",\"token\":\"\",\"from\":\"\",\"otp_template\":\"\"}','{\"gateway\":\"nexmo\",\"mode\":\"live\",\"status\":\"0\",\"api_key\":\"\",\"api_secret\":\"\",\"token\":\"\",\"from\":\"\",\"otp_template\":\"\"}','sms_config','live',0,NULL,'2023-04-10 02:14:44',NULL),('18fbb21f-d6ad-11ed-962c-0c7a158e4469','foloosi','{\"gateway\":\"foloosi\",\"mode\":\"test\",\"status\":\"0\",\"merchant_key\":\"data\"}','{\"gateway\":\"foloosi\",\"mode\":\"test\",\"status\":\"0\",\"merchant_key\":\"data\"}','payment_config','test',0,NULL,'2023-08-12 06:34:33','{\"gateway_title\":null,\"gateway_image\":\"\"}'),('2767d142-d6a1-11ed-962c-0c7a158e4469','paytm','{\"gateway\":\"paytm\",\"mode\":\"live\",\"status\":0,\"merchant_key\":\"\",\"merchant_id\":\"\",\"merchant_website_link\":\"\"}','{\"gateway\":\"paytm\",\"mode\":\"live\",\"status\":0,\"merchant_key\":\"\",\"merchant_id\":\"\",\"merchant_website_link\":\"\"}','payment_config','test',0,NULL,'2023-08-22 06:30:55','{\"gateway_title\":\"Paytm\",\"gateway_image\":null}'),('3201d2e6-c937-11ed-a424-0c7a158e4469','amazon_pay','{\"gateway\":\"amazon_pay\",\"mode\":\"test\",\"status\":\"0\",\"pass_phrase\":\"data\",\"access_code\":\"data\",\"merchant_identifier\":\"data\"}','{\"gateway\":\"amazon_pay\",\"mode\":\"test\",\"status\":\"0\",\"pass_phrase\":\"data\",\"access_code\":\"data\",\"merchant_identifier\":\"data\"}','payment_config','test',0,NULL,'2023-08-12 06:36:07','{\"gateway_title\":null,\"gateway_image\":\"\"}'),('4593b25c-d6a1-11ed-962c-0c7a158e4469','paytabs','{\"gateway\":\"paytabs\",\"mode\":\"live\",\"status\":0,\"profile_id\":\"\",\"server_key\":\"\",\"base_url\":\"https:\\/\\/secure-egypt.paytabs.com\\/\"}','{\"gateway\":\"paytabs\",\"mode\":\"live\",\"status\":0,\"profile_id\":\"\",\"server_key\":\"\",\"base_url\":\"https:\\/\\/secure-egypt.paytabs.com\\/\"}','payment_config','test',0,NULL,'2023-08-12 06:34:51','{\"gateway_title\":\"Paytabs\",\"gateway_image\":null}'),('4e9b8dfb-e7d1-11ed-a559-0c7a158e4469','bkash','{\"gateway\":\"bkash\",\"mode\":\"live\",\"status\":\"0\",\"app_key\":\"\",\"app_secret\":\"\",\"username\":\"\",\"password\":\"\"}','{\"gateway\":\"bkash\",\"mode\":\"live\",\"status\":\"0\",\"app_key\":\"\",\"app_secret\":\"\",\"username\":\"\",\"password\":\"\"}','payment_config','test',0,NULL,'2023-08-12 06:39:42','{\"gateway_title\":\"Bkash\",\"gateway_image\":null}'),('544a24a4-c872-11ed-ac7a-0c7a158e4469','fatoorah','{\"gateway\":\"fatoorah\",\"mode\":\"test\",\"status\":\"0\",\"api_key\":\"data\"}','{\"gateway\":\"fatoorah\",\"mode\":\"test\",\"status\":\"0\",\"api_key\":\"data\"}','payment_config','test',0,NULL,'2023-08-12 06:36:24','{\"gateway_title\":null,\"gateway_image\":\"\"}'),('58c1bc8a-d6ac-11ed-962c-0c7a158e4469','ccavenue','{\"gateway\":\"ccavenue\",\"mode\":\"test\",\"status\":\"0\",\"merchant_id\":\"data\",\"working_key\":\"data\",\"access_code\":\"data\"}','{\"gateway\":\"ccavenue\",\"mode\":\"test\",\"status\":\"0\",\"merchant_id\":\"data\",\"working_key\":\"data\",\"access_code\":\"data\"}','payment_config','test',0,NULL,'2023-08-30 03:42:38','{\"gateway_title\":null,\"gateway_image\":\"2023-04-13-643783f01d386.png\"}'),('5e2d2ef9-d6ab-11ed-962c-0c7a158e4469','thawani','{\"gateway\":\"thawani\",\"mode\":\"test\",\"status\":\"0\",\"public_key\":\"data\",\"private_key\":\"data\"}','{\"gateway\":\"thawani\",\"mode\":\"test\",\"status\":\"0\",\"public_key\":\"data\",\"private_key\":\"data\"}','payment_config','test',0,NULL,'2023-08-30 04:50:40','{\"gateway_title\":null,\"gateway_image\":\"2023-04-13-64378f9856f29.png\"}'),('60cc83cc-d5b9-11ed-b56f-0c7a158e4469','sixcash','{\"gateway\":\"sixcash\",\"mode\":\"test\",\"status\":\"0\",\"public_key\":\"data\",\"secret_key\":\"data\",\"merchant_number\":\"data\",\"base_url\":\"data\"}','{\"gateway\":\"sixcash\",\"mode\":\"test\",\"status\":\"0\",\"public_key\":\"data\",\"secret_key\":\"data\",\"merchant_number\":\"data\",\"base_url\":\"data\"}','payment_config','test',0,NULL,'2023-08-30 04:16:17','{\"gateway_title\":null,\"gateway_image\":\"2023-04-12-6436774e77ff9.png\"}'),('68579846-d8e8-11ed-8249-0c7a158e4469','alphanet_sms','{\"gateway\":\"alphanet_sms\",\"mode\":\"live\",\"status\":0,\"api_key\":\"\",\"otp_template\":\"\"}','{\"gateway\":\"alphanet_sms\",\"mode\":\"live\",\"status\":0,\"api_key\":\"\",\"otp_template\":\"\"}','sms_config','live',0,NULL,NULL,NULL),('6857a2e8-d8e8-11ed-8249-0c7a158e4469','sms_to','{\"gateway\":\"sms_to\",\"mode\":\"live\",\"status\":0,\"api_key\":\"\",\"sender_id\":\"\",\"otp_template\":\"\"}','{\"gateway\":\"sms_to\",\"mode\":\"live\",\"status\":0,\"api_key\":\"\",\"sender_id\":\"\",\"otp_template\":\"\"}','sms_config','live',0,NULL,NULL,NULL),('74c30c00-d6a6-11ed-962c-0c7a158e4469','hubtel','{\"gateway\":\"hubtel\",\"mode\":\"test\",\"status\":\"0\",\"account_number\":\"data\",\"api_id\":\"data\",\"api_key\":\"data\"}','{\"gateway\":\"hubtel\",\"mode\":\"test\",\"status\":\"0\",\"account_number\":\"data\",\"api_id\":\"data\",\"api_key\":\"data\"}','payment_config','test',0,NULL,'2023-08-12 06:37:43','{\"gateway_title\":null,\"gateway_image\":\"\"}'),('74e46b0a-d6aa-11ed-962c-0c7a158e4469','tap','{\"gateway\":\"tap\",\"mode\":\"test\",\"status\":\"0\",\"secret_key\":\"data\"}','{\"gateway\":\"tap\",\"mode\":\"test\",\"status\":\"0\",\"secret_key\":\"data\"}','payment_config','test',0,NULL,'2023-08-30 04:50:09','{\"gateway_title\":null,\"gateway_image\":\"\"}'),('761ca96c-d1eb-11ed-87ca-0c7a158e4469','swish','{\"gateway\":\"swish\",\"mode\":\"test\",\"status\":\"0\",\"number\":\"data\"}','{\"gateway\":\"swish\",\"mode\":\"test\",\"status\":\"0\",\"number\":\"data\"}','payment_config','test',0,NULL,'2023-08-30 04:17:02','{\"gateway_title\":null,\"gateway_image\":\"\"}'),('7b1c3c5f-d2bd-11ed-b485-0c7a158e4469','payfast','{\"gateway\":\"payfast\",\"mode\":\"test\",\"status\":\"0\",\"merchant_id\":\"data\",\"secured_key\":\"data\"}','{\"gateway\":\"payfast\",\"mode\":\"test\",\"status\":\"0\",\"merchant_id\":\"data\",\"secured_key\":\"data\"}','payment_config','test',0,NULL,'2023-08-30 04:18:13','{\"gateway_title\":null,\"gateway_image\":\"\"}'),('8592417b-d1d1-11ed-a984-0c7a158e4469','esewa','{\"gateway\":\"esewa\",\"mode\":\"test\",\"status\":\"0\",\"merchantCode\":\"data\"}','{\"gateway\":\"esewa\",\"mode\":\"test\",\"status\":\"0\",\"merchantCode\":\"data\"}','payment_config','test',0,NULL,'2023-08-30 04:17:38','{\"gateway_title\":null,\"gateway_image\":\"\"}'),('9162a1dc-cdf1-11ed-affe-0c7a158e4469','viva_wallet','{\"gateway\":\"viva_wallet\",\"mode\":\"test\",\"status\":\"0\",\"client_id\": \"\",\"client_secret\": \"\", \"source_code\":\"\"}\n','{\"gateway\":\"viva_wallet\",\"mode\":\"test\",\"status\":\"0\",\"client_id\": \"\",\"client_secret\": \"\", \"source_code\":\"\"}\n','payment_config','test',0,NULL,NULL,NULL),('998ccc62-d6a0-11ed-962c-0c7a158e4469','stripe','{\"gateway\":\"stripe\",\"mode\":\"live\",\"status\":\"0\",\"api_key\":null,\"published_key\":null}','{\"gateway\":\"stripe\",\"mode\":\"live\",\"status\":\"0\",\"api_key\":null,\"published_key\":null}','payment_config','test',0,NULL,'2023-08-30 04:18:55','{\"gateway_title\":\"Stripe\",\"gateway_image\":null}'),('a3313755-c95d-11ed-b1db-0c7a158e4469','iyzi_pay','{\"gateway\":\"iyzi_pay\",\"mode\":\"test\",\"status\":\"0\",\"api_key\":\"data\",\"secret_key\":\"data\",\"base_url\":\"data\"}','{\"gateway\":\"iyzi_pay\",\"mode\":\"test\",\"status\":\"0\",\"api_key\":\"data\",\"secret_key\":\"data\",\"base_url\":\"data\"}','payment_config','test',0,NULL,'2023-08-30 04:20:02','{\"gateway_title\":null,\"gateway_image\":\"\"}'),('a76c8993-d299-11ed-b485-0c7a158e4469','momo','{\"gateway\":\"momo\",\"mode\":\"live\",\"status\":\"0\",\"api_key\":\"data\",\"api_user\":\"data\",\"subscription_key\":\"data\"}','{\"gateway\":\"momo\",\"mode\":\"live\",\"status\":\"0\",\"api_key\":\"data\",\"api_user\":\"data\",\"subscription_key\":\"data\"}','payment_config','live',0,NULL,'2023-08-30 04:19:28','{\"gateway_title\":null,\"gateway_image\":\"\"}'),('a8608119-cc76-11ed-9bca-0c7a158e4469','moncash','{\"gateway\":\"moncash\",\"mode\":\"test\",\"status\":\"0\",\"client_id\":\"data\",\"secret_key\":\"data\"}','{\"gateway\":\"moncash\",\"mode\":\"test\",\"status\":\"0\",\"client_id\":\"data\",\"secret_key\":\"data\"}','payment_config','test',0,NULL,'2023-08-30 04:47:34','{\"gateway_title\":null,\"gateway_image\":\"\"}'),('ad5af1c1-d6a2-11ed-962c-0c7a158e4469','razor_pay','{\"gateway\":\"razor_pay\",\"mode\":\"live\",\"status\":\"0\",\"api_key\":null,\"api_secret\":null}','{\"gateway\":\"razor_pay\",\"mode\":\"live\",\"status\":\"0\",\"api_key\":null,\"api_secret\":null}','payment_config','test',0,NULL,'2023-08-30 04:47:00','{\"gateway_title\":\"Razor pay\",\"gateway_image\":null}'),('ad5b02a0-d6a2-11ed-962c-0c7a158e4469','senang_pay','{\"gateway\":\"senang_pay\",\"mode\":\"live\",\"status\":\"0\",\"callback_url\":null,\"secret_key\":null,\"merchant_id\":null}','{\"gateway\":\"senang_pay\",\"mode\":\"live\",\"status\":\"0\",\"callback_url\":null,\"secret_key\":null,\"merchant_id\":null}','payment_config','test',0,NULL,'2023-08-27 09:58:57','{\"gateway_title\":\"Senang pay\",\"gateway_image\":null}'),('b6c333f6-d8e9-11ed-8249-0c7a158e4469','akandit_sms','{\"gateway\":\"akandit_sms\",\"mode\":\"live\",\"status\":0,\"username\":\"\",\"password\":\"\",\"otp_template\":\"\"}','{\"gateway\":\"akandit_sms\",\"mode\":\"live\",\"status\":0,\"username\":\"\",\"password\":\"\",\"otp_template\":\"\"}','sms_config','live',0,NULL,NULL,NULL),('b6c33c87-d8e9-11ed-8249-0c7a158e4469','global_sms','{\"gateway\":\"global_sms\",\"mode\":\"live\",\"status\":0,\"user_name\":\"\",\"password\":\"\",\"from\":\"\",\"otp_template\":\"\"}','{\"gateway\":\"global_sms\",\"mode\":\"live\",\"status\":0,\"user_name\":\"\",\"password\":\"\",\"from\":\"\",\"otp_template\":\"\"}','sms_config','live',0,NULL,NULL,NULL),('b8992bd4-d6a0-11ed-962c-0c7a158e4469','paymob_accept','{\"gateway\":\"paymob_accept\",\"mode\":\"live\",\"status\":\"0\",\"callback_url\":null,\"api_key\":\"\",\"iframe_id\":\"\",\"integration_id\":\"\",\"hmac\":\"\"}','{\"gateway\":\"paymob_accept\",\"mode\":\"live\",\"status\":\"0\",\"callback_url\":null,\"api_key\":\"\",\"iframe_id\":\"\",\"integration_id\":\"\",\"hmac\":\"\"}','payment_config','test',0,NULL,NULL,'{\"gateway_title\":\"Paymob accept\",\"gateway_image\":null}'),('c41c0dcd-d119-11ed-9f67-0c7a158e4469','maxicash','{\"gateway\":\"maxicash\",\"mode\":\"test\",\"status\":\"0\",\"merchantId\":\"data\",\"merchantPassword\":\"data\"}','{\"gateway\":\"maxicash\",\"mode\":\"test\",\"status\":\"0\",\"merchantId\":\"data\",\"merchantPassword\":\"data\"}','payment_config','test',0,NULL,'2023-08-30 04:49:15','{\"gateway_title\":null,\"gateway_image\":\"\"}'),('c9249d17-cd60-11ed-b879-0c7a158e4469','pvit','{\"gateway\":\"pvit\",\"mode\":\"test\",\"status\":\"0\",\"mc_tel_merchant\": \"\",\"access_token\": \"\", \"mc_merchant_code\": \"\"}','{\"gateway\":\"pvit\",\"mode\":\"test\",\"status\":\"0\",\"mc_tel_merchant\": \"\",\"access_token\": \"\", \"mc_merchant_code\": \"\"}','payment_config','test',0,NULL,NULL,NULL),('cb0081ce-d775-11ed-96f4-0c7a158e4469','releans','{\"gateway\":\"releans\",\"mode\":\"live\",\"status\":0,\"api_key\":\"\",\"from\":\"\",\"otp_template\":\"\"}','{\"gateway\":\"releans\",\"mode\":\"live\",\"status\":0,\"api_key\":\"\",\"from\":\"\",\"otp_template\":\"\"}','sms_config','live',0,NULL,'2023-04-10 02:14:44',NULL),('d4f3f5f1-d6a0-11ed-962c-0c7a158e4469','flutterwave','{\"gateway\":\"flutterwave\",\"mode\":\"live\",\"status\":0,\"secret_key\":\"\",\"public_key\":\"\",\"hash\":\"\"}','{\"gateway\":\"flutterwave\",\"mode\":\"live\",\"status\":0,\"secret_key\":\"\",\"public_key\":\"\",\"hash\":\"\"}','payment_config','test',0,NULL,'2023-08-30 04:41:03','{\"gateway_title\":\"Flutterwave\",\"gateway_image\":null}'),('d822f1a5-c864-11ed-ac7a-0c7a158e4469','paystack','{\"gateway\":\"paystack\",\"mode\":\"live\",\"status\":\"0\",\"callback_url\":\"https:\\/\\/api.paystack.co\",\"public_key\":null,\"secret_key\":null,\"merchant_email\":null}','{\"gateway\":\"paystack\",\"mode\":\"live\",\"status\":\"0\",\"callback_url\":\"https:\\/\\/api.paystack.co\",\"public_key\":null,\"secret_key\":null,\"merchant_email\":null}','payment_config','test',0,NULL,'2023-08-30 04:20:45','{\"gateway_title\":\"Paystack\",\"gateway_image\":null}'),('daec8d59-c893-11ed-ac7a-0c7a158e4469','xendit','{\"gateway\":\"xendit\",\"mode\":\"test\",\"status\":\"0\",\"api_key\":\"data\"}','{\"gateway\":\"xendit\",\"mode\":\"test\",\"status\":\"0\",\"api_key\":\"data\"}','payment_config','test',0,NULL,'2023-08-12 06:35:46','{\"gateway_title\":null,\"gateway_image\":\"\"}'),('dc0f5fc9-d6a5-11ed-962c-0c7a158e4469','worldpay','{\"gateway\":\"worldpay\",\"mode\":\"test\",\"status\":\"0\",\"OrgUnitId\":\"data\",\"jwt_issuer\":\"data\",\"mac\":\"data\",\"merchantCode\":\"data\",\"xml_password\":\"data\"}','{\"gateway\":\"worldpay\",\"mode\":\"test\",\"status\":\"0\",\"OrgUnitId\":\"data\",\"jwt_issuer\":\"data\",\"mac\":\"data\",\"merchantCode\":\"data\",\"xml_password\":\"data\"}','payment_config','test',0,NULL,'2023-08-12 06:35:26','{\"gateway_title\":null,\"gateway_image\":\"\"}'),('e0450278-d8eb-11ed-8249-0c7a158e4469','signal_wire','{\"gateway\":\"signal_wire\",\"mode\":\"live\",\"status\":0,\"project_id\":\"\",\"token\":\"\",\"space_url\":\"\",\"from\":\"\",\"otp_template\":\"\"}','{\"gateway\":\"signal_wire\",\"mode\":\"live\",\"status\":0,\"project_id\":\"\",\"token\":\"\",\"space_url\":\"\",\"from\":\"\",\"otp_template\":\"\"}','sms_config','live',0,NULL,NULL,NULL),('e0450b40-d8eb-11ed-8249-0c7a158e4469','paradox','{\"gateway\":\"paradox\",\"mode\":\"live\",\"status\":\"0\",\"api_key\":\"\",\"sender_id\":\"\"}','{\"gateway\":\"paradox\",\"mode\":\"live\",\"status\":\"0\",\"api_key\":\"\",\"sender_id\":\"\"}','sms_config','live',0,NULL,'2023-09-10 01:14:01',NULL),('ea346efe-cdda-11ed-affe-0c7a158e4469','ssl_commerz','{\"gateway\":\"ssl_commerz\",\"mode\":\"live\",\"status\":\"0\",\"store_id\":\"\",\"store_password\":\"\"}','{\"gateway\":\"ssl_commerz\",\"mode\":\"live\",\"status\":\"0\",\"store_id\":\"\",\"store_password\":\"\"}','payment_config','test',0,NULL,'2023-08-30 03:43:49','{\"gateway_title\":\"Ssl commerz\",\"gateway_image\":null}'),('eed88336-d8ec-11ed-8249-0c7a158e4469','hubtel','{\"gateway\":\"hubtel\",\"mode\":\"live\",\"status\":0,\"sender_id\":\"\",\"client_id\":\"\",\"client_secret\":\"\",\"otp_template\":\"\"}','{\"gateway\":\"hubtel\",\"mode\":\"live\",\"status\":0,\"sender_id\":\"\",\"client_id\":\"\",\"client_secret\":\"\",\"otp_template\":\"\"}','sms_config','live',0,NULL,NULL,NULL),('f149c546-d8ea-11ed-8249-0c7a158e4469','viatech','{\"gateway\":\"viatech\",\"mode\":\"live\",\"status\":0,\"api_url\":\"\",\"api_key\":\"\",\"sender_id\":\"\",\"otp_template\":\"\"}','{\"gateway\":\"viatech\",\"mode\":\"live\",\"status\":0,\"api_url\":\"\",\"api_key\":\"\",\"sender_id\":\"\",\"otp_template\":\"\"}','sms_config','live',0,NULL,NULL,NULL),('f149cd9c-d8ea-11ed-8249-0c7a158e4469','019_sms','{\"gateway\":\"019_sms\",\"mode\":\"live\",\"status\":0,\"password\":\"\",\"username\":\"\",\"username_for_token\":\"\",\"sender\":\"\",\"otp_template\":\"\"}','{\"gateway\":\"019_sms\",\"mode\":\"live\",\"status\":0,\"password\":\"\",\"username\":\"\",\"username_for_token\":\"\",\"sender\":\"\",\"otp_template\":\"\"}','sms_config','live',0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `addon_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_roles`
--

DROP TABLE IF EXISTS `admin_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_access` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'Master Admin',NULL,1,NULL,NULL),(7,'test','[\"posts_management\"]',1,'2024-04-11 05:17:39','2024-04-11 05:17:39'),(8,'Tin tức','[\"dashboard\",\"pos_management\",\"posts_management\",\"order_management\",\"product_management\",\"promotion_management\",\"support_section\",\"report\",\"user_section\",\"system_settings\"]',1,'2024-04-19 03:47:37','2024-04-21 10:50:26');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_wallet_histories`
--

DROP TABLE IF EXISTS `admin_wallet_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_wallet_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint DEFAULT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `order_id` bigint DEFAULT NULL,
  `product_id` bigint DEFAULT NULL,
  `payment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'received',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_wallet_histories`
--

LOCK TABLES `admin_wallet_histories` WRITE;
/*!40000 ALTER TABLE `admin_wallet_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_wallet_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_wallets`
--

DROP TABLE IF EXISTS `admin_wallets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_wallets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint DEFAULT NULL,
  `inhouse_earning` double NOT NULL DEFAULT '0',
  `withdrawn` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `commission_earned` double(8,2) NOT NULL DEFAULT '0.00',
  `delivery_charge_earned` double(8,2) NOT NULL DEFAULT '0.00',
  `pending_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `total_tax_collected` double(8,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_wallets`
--

LOCK TABLES `admin_wallets` WRITE;
/*!40000 ALTER TABLE `admin_wallets` DISABLE KEYS */;
INSERT INTO `admin_wallets` VALUES (1,1,0,0,NULL,'2024-04-10 20:37:32',0.00,15.00,0.00,0.00);
/*!40000 ALTER TABLE `admin_wallets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_role_id` bigint NOT NULL DEFAULT '2',
  `image` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  `identify_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `identify_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identify_number` int DEFAULT NULL,
  `email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin',NULL,1,'2024-04-12-661939bde616d.webp',NULL,NULL,NULL,'cntt@gmail.com',NULL,'$2a$12$joxhxYHJL5quPNn7hDqPceUOM85qQY8JGvWY7HMQ/yGT/J0FHZbpi','YhyQERbwqm5fglLqZL8YLpdN9qbBNQTzkcIbmQ0p1sR4OkbSibueLtWOBASM',NULL,'2024-04-12 06:40:13',1),(2,'HOÀNG HẢI DƯƠNG','0707278154',7,'2024-04-11-6617d52d64381.webp','[\"2024-04-11-6617d52cc3acd.webp\"]','passport',2147483647,'hoanghaiduong1711@gmail.com',NULL,'$2y$10$EGI.rhvCNW2..fY3A/2cDecnnUjq/ShY.1vx2NsSwRXCHOHneTVaO','3VjwbT5X63aRHfDToSp6zNJD7yZKzVoKW1ytAhtolk6nLA5jHYABRMAme1tm','2024-04-11 05:18:53','2024-04-11 05:18:53',1),(3,'Tin tức 123','123',8,'2024-04-19-66224bb0e3ce6.webp','[]','nid',123,'tintuc@gmail.com',NULL,'$2y$10$fK366D7WMOjpJIqtFrSQrOCFhZX4fiZzDEza7EbDsKVp43BAcmiIu',NULL,'2024-04-19 03:47:12','2024-04-19 04:47:19',1);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attributes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attributes`
--

LOCK TABLES `attributes` WRITE;
/*!40000 ALTER TABLE `attributes` DISABLE KEYS */;
/*!40000 ALTER TABLE `attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `published` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_id` bigint DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (1,'2024-04-11-661754d898711.webp','Main Banner','default',1,'2024-04-10 20:11:20','2024-04-10 20:11:25','http://118.69.126.49:4565','product',NULL,NULL,NULL,NULL,NULL),(2,'2024-04-11-661754e6b2036.webp','Main Banner','default',1,'2024-04-10 20:11:34','2024-04-10 20:11:40','http://118.69.126.49:4565','product',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `billing_addresses`
--

DROP TABLE IF EXISTS `billing_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `billing_addresses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint unsigned DEFAULT NULL,
  `contact_person_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billing_addresses`
--

LOCK TABLES `billing_addresses` WRITE;
/*!40000 ALTER TABLE `billing_addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `billing_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'CÔNG TY CỔ PHẦN THỰC PHẨM HG','2024-04-11-66179a1ded360.webp',1,'2024-04-10 20:08:10','2024-04-11 01:06:53'),(2,'Chavi','2024-04-11-6617545c20398.webp',1,'2024-04-10 20:09:16','2024-04-10 20:09:16');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business_settings`
--

DROP TABLE IF EXISTS `business_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `business_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_settings`
--

LOCK TABLES `business_settings` WRITE;
/*!40000 ALTER TABLE `business_settings` DISABLE KEYS */;
INSERT INTO `business_settings` VALUES (1,'system_default_currency','8','2020-10-11 07:43:44','2021-06-04 18:25:29'),(2,'language','[{\"id\":\"1\",\"name\":\"english\",\"direction\":\"ltr\",\"code\":\"en\",\"status\":1,\"default\":false},{\"id\":2,\"name\":\"Ti\\u1ebfng Vi\\u1ec7t\",\"direction\":\"ltr\",\"code\":\"vn\",\"status\":1,\"default\":true}]','2020-10-11 07:53:02','2024-04-18 21:19:55'),(3,'mail_config','{\"status\":\"1\",\"name\":\"CLB Doanh Nghi\\u1ec7p Tr\\u1ebb Long An\",\"host\":\"Smtp.mailtrap.io\",\"driver\":\"SMTP\",\"port\":\"587\",\"username\":\"info@demo.com\",\"email_id\":\"info@demo.com\",\"encryption\":\"TLS\",\"password\":\"12345678\"}','2020-10-12 10:29:18','2024-04-11 03:15:41'),(4,'cash_on_delivery','{\"status\":\"1\"}',NULL,'2021-05-25 21:21:15'),(6,'ssl_commerz_payment','{\"status\":\"0\",\"environment\":\"sandbox\",\"store_id\":\"\",\"store_password\":\"\"}','2020-11-09 08:36:51','2023-01-10 05:51:56'),(7,'paypal','{\"status\":\"0\",\"environment\":\"sandbox\",\"paypal_client_id\":\"\",\"paypal_secret\":\"\"}','2020-11-09 08:51:39','2023-01-10 05:51:56'),(8,'stripe','{\"status\":\"0\",\"api_key\":null,\"published_key\":null}','2020-11-09 09:01:47','2021-07-06 12:30:05'),(10,'company_phone','0934 002 097 (Thư ký Hội)',NULL,'2020-12-08 14:15:01'),(11,'company_name','Doanh Nghiệp Trẻ Long An',NULL,'2021-02-27 18:11:53'),(12,'company_web_logo','2024-04-19-6621f0e7d7472.webp',NULL,'2024-04-18 21:19:51'),(13,'company_mobile_logo','2024-04-19-6621f0e8af2b4.webp',NULL,'2024-04-18 21:19:52'),(14,'terms_condition','<p>terms and conditions</p>',NULL,'2021-06-11 01:51:36'),(15,'about_us','<p>this is about us page. hello and hi from about page description..</p>',NULL,'2021-06-11 01:42:53'),(16,'sms_nexmo','{\"status\":\"0\",\"nexmo_key\":\"custo5cc042f7abf4c\",\"nexmo_secret\":\"custo5cc042f7abf4c@ssl\"}',NULL,NULL),(17,'company_email','vanphong@doanhnhantrelongan.vn',NULL,'2021-03-15 12:29:51'),(18,'colors','{\"primary\":\"#298109\",\"secondary\":\"#000000\",\"primary_light\":\"#CFDFFB\"}','2020-10-11 13:53:02','2024-04-10 10:15:25'),(19,'company_footer_logo','2024-04-19-6621f0e97a6d4.webp',NULL,'2024-04-18 21:19:53'),(20,'company_copyright_text','Copyright 2024 © Doanh Nhân Trẻ Long An Design by Khoa Công nghệ thông tin - Đại học Lạc Hồng',NULL,'2021-03-15 12:30:47'),(21,'download_app_apple_stroe','{\"status\":\"1\",\"link\":\"https:\\/\\/www.target.com\\/s\\/apple+store++now?ref=tgt_adv_XS000000&AFID=msn&fndsrc=tgtao&DFA=71700000012505188&CPNG=Electronics_Portable+Computers&adgroup=Portable+Computers&LID=700000001176246&LNM=apple+store+near+me+now&MT=b&network=s&device=c&location=12&targetid=kwd-81913773633608:loc-12&ds_rl=1246978&ds_rl=1248099&gclsrc=ds\"}',NULL,'2020-12-08 12:54:53'),(22,'download_app_google_stroe','{\"status\":\"1\",\"link\":\"https:\\/\\/play.google.com\\/store?hl=en_US&gl=US\"}',NULL,'2020-12-08 12:54:48'),(23,'company_fav_icon','2024-04-19-6621f0ea4c2f8.webp','2020-10-11 13:53:02','2024-04-18 21:19:54'),(24,'fcm_topic','',NULL,NULL),(25,'fcm_project_id','',NULL,NULL),(26,'push_notification_key','Put your firebase server key here.',NULL,NULL),(27,'order_pending_message','{\"status\":\"1\",\"message\":\"order pen message\"}',NULL,NULL),(28,'order_confirmation_msg','{\"status\":\"1\",\"message\":\"Order con Message\"}',NULL,NULL),(29,'order_processing_message','{\"status\":\"1\",\"message\":\"Order pro Message\"}',NULL,NULL),(30,'out_for_delivery_message','{\"status\":\"1\",\"message\":\"Order ouut Message\"}',NULL,NULL),(31,'order_delivered_message','{\"status\":\"1\",\"message\":\"Order del Message\"}',NULL,NULL),(32,'razor_pay','{\"status\":\"0\",\"razor_key\":null,\"razor_secret\":null}',NULL,'2021-07-06 12:30:14'),(33,'sales_commission','0',NULL,'2021-06-11 18:13:13'),(34,'seller_registration','1',NULL,'2021-06-04 21:02:48'),(35,'pnc_language','[\"en\",\"vn\"]',NULL,NULL),(36,'order_returned_message','{\"status\":\"1\",\"message\":\"Order hh Message\"}',NULL,NULL),(37,'order_failed_message','{\"status\":null,\"message\":\"Order fa Message\"}',NULL,NULL),(40,'delivery_boy_assign_message','{\"status\":0,\"message\":\"\"}',NULL,NULL),(41,'delivery_boy_start_message','{\"status\":0,\"message\":\"\"}',NULL,NULL),(42,'delivery_boy_delivered_message','{\"status\":0,\"message\":\"\"}',NULL,NULL),(43,'terms_and_conditions','',NULL,NULL),(44,'minimum_order_value','1',NULL,NULL),(45,'privacy_policy','<p>my privacy policy</p>\r\n\r\n<p>&nbsp;</p>',NULL,'2021-07-06 11:09:07'),(46,'paystack','{\"status\":\"0\",\"publicKey\":null,\"secretKey\":null,\"paymentUrl\":\"https:\\/\\/api.paystack.co\",\"merchantEmail\":null}',NULL,'2021-07-06 12:30:35'),(47,'senang_pay','{\"status\":\"0\",\"secret_key\":null,\"merchant_id\":null}',NULL,'2021-07-06 12:30:23'),(48,'currency_model','single_currency',NULL,NULL),(49,'social_login','[{\"login_medium\":\"google\",\"client_id\":\"\",\"client_secret\":\"\",\"status\":\"\"},{\"login_medium\":\"facebook\",\"client_id\":\"\",\"client_secret\":\"\",\"status\":\"\"}]',NULL,NULL),(50,'digital_payment','{\"status\":\"1\"}',NULL,NULL),(51,'phone_verification','',NULL,NULL),(52,'email_verification','',NULL,NULL),(53,'order_verification','0',NULL,NULL),(54,'country_code','VN',NULL,NULL),(55,'pagination_limit','10',NULL,NULL),(56,'shipping_method','inhouse_shipping',NULL,NULL),(57,'paymob_accept','{\"status\":\"0\",\"api_key\":\"\",\"iframe_id\":\"\",\"integration_id\":\"\",\"hmac\":\"\"}',NULL,NULL),(58,'bkash','{\"status\":\"0\",\"environment\":\"sandbox\",\"api_key\":\"\",\"api_secret\":\"\",\"username\":\"\",\"password\":\"\"}',NULL,'2023-01-10 05:51:56'),(59,'forgot_password_verification','phone',NULL,NULL),(60,'paytabs','{\"status\":0,\"profile_id\":\"\",\"server_key\":\"\",\"base_url\":\"https:\\/\\/secure-egypt.paytabs.com\\/\"}',NULL,'2021-11-21 03:01:40'),(61,'stock_limit','10',NULL,NULL),(62,'flutterwave','{\"status\":0,\"public_key\":\"\",\"secret_key\":\"\",\"hash\":\"\"}',NULL,NULL),(63,'mercadopago','{\"status\":0,\"public_key\":\"\",\"access_token\":\"\"}',NULL,NULL),(64,'announcement','{\"status\":null,\"color\":null,\"text_color\":null,\"announcement\":null}',NULL,NULL),(65,'fawry_pay','{\"status\":0,\"merchant_code\":\"\",\"security_key\":\"\"}',NULL,'2022-01-18 09:46:30'),(66,'recaptcha','{\"status\":0,\"site_key\":\"\",\"secret_key\":\"\"}',NULL,'2022-01-18 09:46:30'),(67,'seller_pos','0',NULL,NULL),(68,'liqpay','{\"status\":0,\"public_key\":\"\",\"private_key\":\"\"}',NULL,NULL),(69,'paytm','{\"status\":0,\"environment\":\"sandbox\",\"paytm_merchant_key\":\"\",\"paytm_merchant_mid\":\"\",\"paytm_merchant_website\":\"\",\"paytm_refund_url\":\"\"}',NULL,'2023-01-10 05:51:56'),(70,'refund_day_limit','0',NULL,NULL),(71,'business_mode','multi',NULL,NULL),(72,'mail_config_sendgrid','{\"status\":0,\"name\":\"\",\"host\":\"\",\"driver\":\"\",\"port\":\"\",\"username\":\"\",\"email_id\":\"\",\"encryption\":\"\",\"password\":\"\"}',NULL,'2024-04-11 03:15:41'),(73,'decimal_point_settings','0',NULL,NULL),(74,'shop_address','Văn phòng: Lầu 5, Tòa nhà khối cơ quan, số 02, đường Song Hành, P.6, TP. Tân An, Long An.',NULL,NULL),(75,'billing_input_by_customer','1',NULL,NULL),(76,'wallet_status','0',NULL,NULL),(77,'loyalty_point_status','0',NULL,NULL),(78,'wallet_add_refund','0',NULL,NULL),(79,'loyalty_point_exchange_rate','0',NULL,NULL),(80,'loyalty_point_item_purchase_point','0',NULL,NULL),(81,'loyalty_point_minimum_point','0',NULL,NULL),(82,'minimum_order_limit','1',NULL,NULL),(83,'product_brand','1',NULL,NULL),(84,'digital_product','1',NULL,NULL),(85,'delivery_boy_expected_delivery_date_message','{\"status\":0,\"message\":\"\"}',NULL,NULL),(86,'order_canceled','{\"status\":0,\"message\":\"\"}',NULL,NULL),(87,'refund-policy','{\"status\":1,\"content\":\"\"}',NULL,'2023-03-04 06:25:36'),(88,'return-policy','{\"status\":1,\"content\":\"\"}',NULL,'2023-03-04 06:25:36'),(89,'cancellation-policy','{\"status\":1,\"content\":\"\"}',NULL,'2023-03-04 06:25:36'),(90,'offline_payment','{\"status\":0}',NULL,'2023-03-04 06:25:36'),(91,'temporary_close','{\"status\":0}',NULL,'2023-03-04 06:25:36'),(92,'vacation_add','{\"status\":0,\"vacation_start_date\":null,\"vacation_end_date\":null,\"vacation_note\":null}',NULL,'2023-03-04 06:25:36'),(93,'cookie_setting','{\"status\":0,\"cookie_text\":null}',NULL,'2023-03-04 06:25:36'),(94,'maximum_otp_hit','0',NULL,'2023-06-13 13:04:49'),(95,'otp_resend_time','0',NULL,'2023-06-13 13:04:49'),(96,'temporary_block_time','0',NULL,'2023-06-13 13:04:49'),(97,'maximum_login_hit','0',NULL,'2023-06-13 13:04:49'),(98,'temporary_login_block_time','0',NULL,'2023-06-13 13:04:49'),(99,'maximum_otp_hit','0',NULL,'2023-10-13 05:34:53'),(100,'otp_resend_time','0',NULL,'2023-10-13 05:34:53'),(101,'temporary_block_time','0',NULL,'2023-10-13 05:34:53'),(102,'maximum_login_hit','0',NULL,'2023-10-13 05:34:53'),(103,'temporary_login_block_time','0',NULL,'2023-10-13 05:34:53'),(104,'apple_login','[{\"login_medium\":\"apple\",\"client_id\":\"\",\"client_secret\":\"\",\"status\":0,\"team_id\":\"\",\"key_id\":\"\",\"service_file\":\"\",\"redirect_url\":\"\"}]',NULL,'2023-10-13 05:34:53'),(105,'ref_earning_status','0',NULL,'2023-10-13 05:34:53'),(106,'ref_earning_exchange_rate','0',NULL,'2023-10-13 05:34:53'),(107,'guest_checkout','0',NULL,'2023-10-13 11:34:53'),(108,'minimum_order_amount','0',NULL,'2023-10-13 11:34:53'),(109,'minimum_order_amount_by_seller','0',NULL,'2023-10-13 11:34:53'),(110,'minimum_order_amount_status','0',NULL,'2023-10-13 11:34:53'),(111,'admin_login_url','admin',NULL,'2023-10-13 11:34:53'),(112,'employee_login_url','employee',NULL,'2023-10-13 11:34:53'),(113,'free_delivery_status','0',NULL,'2023-10-13 11:34:53'),(114,'free_delivery_responsibility','admin',NULL,'2023-10-13 11:34:53'),(115,'free_delivery_over_amount','0',NULL,'2023-10-13 11:34:53'),(116,'free_delivery_over_amount_seller','0',NULL,'2023-10-13 11:34:53'),(117,'add_funds_to_wallet','0',NULL,'2023-10-13 11:34:53'),(118,'minimum_add_fund_amount','0',NULL,'2023-10-13 11:34:53'),(119,'maximum_add_fund_amount','0',NULL,'2023-10-13 11:34:53'),(120,'user_app_version_control','{\"for_android\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"},\"for_ios\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"}}',NULL,'2023-10-13 11:34:53'),(121,'seller_app_version_control','{\"for_android\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"},\"for_ios\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"}}',NULL,'2023-10-13 11:34:53'),(122,'delivery_man_app_version_control','{\"for_android\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"},\"for_ios\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"}}',NULL,'2023-10-13 11:34:53'),(123,'whatsapp','{\"status\":1,\"phone\":\"00000000000\"}',NULL,'2023-10-13 11:34:53'),(124,'currency_symbol_position','right',NULL,'2023-10-13 11:34:53'),(125,'maximum_otp_hit','0',NULL,'2023-10-30 11:02:55'),(126,'otp_resend_time','0',NULL,'2023-10-30 11:02:55'),(127,'temporary_block_time','0',NULL,'2023-10-30 11:02:55'),(128,'maximum_login_hit','0',NULL,'2023-10-30 11:02:55'),(129,'temporary_login_block_time','0',NULL,'2023-10-30 11:02:55'),(130,'ref_earning_status','0',NULL,'2023-10-30 11:02:55'),(131,'ref_earning_exchange_rate','0',NULL,'2023-10-30 11:02:55'),(132,'guest_checkout','0',NULL,'2023-10-30 11:02:55'),(133,'minimum_order_amount','0',NULL,'2023-10-30 11:02:55'),(134,'minimum_order_amount_by_seller','0',NULL,'2023-10-30 11:02:55'),(135,'minimum_order_amount_status','0',NULL,'2023-10-30 11:02:55'),(136,'admin_login_url','admin',NULL,'2023-10-30 11:02:55'),(137,'employee_login_url','employee',NULL,'2023-10-30 11:02:55'),(138,'free_delivery_status','0',NULL,'2023-10-30 11:02:55'),(139,'free_delivery_responsibility','admin',NULL,'2023-10-30 11:02:55'),(140,'free_delivery_over_amount','0',NULL,'2023-10-30 11:02:55'),(141,'free_delivery_over_amount_seller','0',NULL,'2023-10-30 11:02:55'),(142,'add_funds_to_wallet','0',NULL,'2023-10-30 11:02:55'),(143,'minimum_add_fund_amount','0',NULL,'2023-10-30 11:02:55'),(144,'maximum_add_fund_amount','0',NULL,'2023-10-30 11:02:55'),(145,'user_app_version_control','{\"for_android\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"},\"for_ios\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"}}',NULL,'2023-10-30 11:02:55'),(146,'seller_app_version_control','{\"for_android\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"},\"for_ios\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"}}',NULL,'2023-10-30 11:02:55'),(147,'delivery_man_app_version_control','{\"for_android\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"},\"for_ios\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"}}',NULL,'2023-10-30 11:02:55'),(148,'company_reliability','[{\"item\":\"delivery_info\",\"title\":\"Fast Delivery all across the country\",\"image\":\"\",\"status\":1},{\"item\":\"safe_payment\",\"title\":\"Safe Payment\",\"image\":\"\",\"status\":1},{\"item\":\"return_policy\",\"title\":\"7 Days Return Policy\",\"image\":\"\",\"status\":1},{\"item\":\"authentic_product\",\"title\":\"100% Authentic Products\",\"image\":\"\",\"status\":1}]',NULL,NULL),(149,'timezone','UTC',NULL,NULL),(150,'default_location','{\"lat\":\"10.953607\",\"lng\":\"106.802589\"}',NULL,NULL),(151,'loader_gif','2024-04-19-6621f0eb16cf6.webp',NULL,NULL),(152,'maximum_otp_hit','0',NULL,'2024-04-10 10:15:25'),(153,'otp_resend_time','0',NULL,'2024-04-10 10:15:25'),(154,'temporary_block_time','0',NULL,'2024-04-10 10:15:25'),(155,'maximum_login_hit','0',NULL,'2024-04-10 10:15:25'),(156,'temporary_login_block_time','0',NULL,'2024-04-10 10:15:25'),(157,'ref_earning_status','0',NULL,'2024-04-10 10:15:25'),(158,'ref_earning_exchange_rate','0',NULL,'2024-04-10 10:15:25'),(159,'guest_checkout','0',NULL,'2024-04-10 10:15:25'),(160,'minimum_order_amount','0',NULL,'2024-04-10 10:15:25'),(161,'minimum_order_amount_by_seller','0',NULL,'2024-04-10 10:15:25'),(162,'minimum_order_amount_status','0',NULL,'2024-04-10 10:15:25'),(163,'admin_login_url','admin',NULL,'2024-04-10 10:15:25'),(164,'employee_login_url','employee',NULL,'2024-04-10 10:15:25'),(165,'free_delivery_status','0',NULL,'2024-04-10 10:15:25'),(166,'free_delivery_responsibility','admin',NULL,'2024-04-10 10:15:25'),(167,'free_delivery_over_amount','0',NULL,'2024-04-10 10:15:25'),(168,'free_delivery_over_amount_seller','0',NULL,'2024-04-10 10:15:25'),(169,'add_funds_to_wallet','0',NULL,'2024-04-10 10:15:25'),(170,'minimum_add_fund_amount','0',NULL,'2024-04-10 10:15:25'),(171,'maximum_add_fund_amount','0',NULL,'2024-04-10 10:15:25'),(172,'user_app_version_control','{\"for_android\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"},\"for_ios\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"}}',NULL,'2024-04-10 10:15:25'),(173,'seller_app_version_control','{\"for_android\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"},\"for_ios\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"}}',NULL,'2024-04-10 10:15:25'),(174,'delivery_man_app_version_control','{\"for_android\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"},\"for_ios\":{\"status\":1,\"version\":\"14.1\",\"link\":\"\"}}',NULL,'2024-04-10 10:15:25');
/*!40000 ALTER TABLE `business_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_shippings`
--

DROP TABLE IF EXISTS `cart_shippings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_shippings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cart_group_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_method_id` bigint DEFAULT NULL,
  `shipping_cost` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_shippings`
--

LOCK TABLES `cart_shippings` WRITE;
/*!40000 ALTER TABLE `cart_shippings` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_shippings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint DEFAULT NULL,
  `cart_group_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint DEFAULT NULL,
  `product_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'physical',
  `digital_product_type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choices` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `variations` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `variant` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `quantity` int NOT NULL DEFAULT '1',
  `price` double NOT NULL DEFAULT '1',
  `tax` double NOT NULL DEFAULT '1',
  `discount` double NOT NULL DEFAULT '1',
  `tax_model` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'exclude',
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` bigint DEFAULT NULL,
  `seller_is` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shop_info` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` double(8,2) DEFAULT NULL,
  `shipping_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_guest` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int NOT NULL,
  `position` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `home_status` tinyint(1) NOT NULL DEFAULT '0',
  `priority` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Trái cây tươi','trai-cay-tuoi','2024-04-11-661752020c57e.webp',0,0,'2024-04-10 19:59:14','2024-04-10 20:02:00',1,0),(2,'Rau củ','rau-cu','2024-04-11-6617521ecca10.webp',0,0,'2024-04-10 19:59:42','2024-04-10 20:02:02',1,1),(3,'Đồ xấy','do-xay','2024-04-11-6617524f171df.webp',0,0,'2024-04-10 20:00:31','2024-04-10 20:02:03',1,2),(4,'Đồ uống','do-uong','2024-04-11-661752783307c.webp',0,0,'2024-04-10 20:01:12','2024-04-10 20:02:05',1,3),(5,'Gia vị','gia-vi','2024-04-11-661752a1e9908.webp',0,0,'2024-04-10 20:01:53','2024-04-10 20:02:06',1,4),(6,'Dưa lưới','dua-luoi',NULL,1,1,'2024-04-10 20:02:48','2024-04-10 20:02:48',0,0),(7,'Chanh','chanh',NULL,4,1,'2024-04-10 20:02:57','2024-04-10 20:02:57',0,0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_shipping_costs`
--

DROP TABLE IF EXISTS `category_shipping_costs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_shipping_costs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` bigint unsigned DEFAULT NULL,
  `category_id` int unsigned DEFAULT NULL,
  `cost` double(8,2) DEFAULT NULL,
  `multiply_qty` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_shipping_costs`
--

LOCK TABLES `category_shipping_costs` WRITE;
/*!40000 ALTER TABLE `category_shipping_costs` DISABLE KEYS */;
INSERT INTO `category_shipping_costs` VALUES (1,2,1,0.00,NULL,'2024-04-10 22:19:32','2024-04-10 22:19:32'),(2,2,2,0.00,NULL,'2024-04-10 22:19:32','2024-04-10 22:19:32'),(3,2,3,0.00,NULL,'2024-04-10 22:19:32','2024-04-10 22:19:32'),(4,2,4,0.00,NULL,'2024-04-10 22:19:32','2024-04-10 22:19:32'),(5,2,5,0.00,NULL,'2024-04-10 22:19:32','2024-04-10 22:19:32');
/*!40000 ALTER TABLE `category_shipping_costs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chattings`
--

DROP TABLE IF EXISTS `chattings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chattings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `seller_id` bigint DEFAULT NULL,
  `admin_id` bigint DEFAULT NULL,
  `delivery_man_id` bigint DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `attachment` json DEFAULT NULL,
  `sent_by_customer` tinyint(1) NOT NULL DEFAULT '0',
  `sent_by_seller` tinyint(1) NOT NULL DEFAULT '0',
  `sent_by_admin` tinyint(1) DEFAULT NULL,
  `sent_by_delivery_man` tinyint(1) DEFAULT NULL,
  `seen_by_customer` tinyint(1) NOT NULL DEFAULT '1',
  `seen_by_seller` tinyint(1) NOT NULL DEFAULT '1',
  `seen_by_admin` tinyint(1) DEFAULT NULL,
  `seen_by_delivery_man` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shop_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chattings`
--

LOCK TABLES `chattings` WRITE;
/*!40000 ALTER TABLE `chattings` DISABLE KEYS */;
/*!40000 ALTER TABLE `chattings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `code` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` VALUES (1,'IndianRed','#CD5C5C','2018-11-05 02:12:26','2018-11-05 02:12:26'),(2,'LightCoral','#F08080','2018-11-05 02:12:26','2018-11-05 02:12:26'),(3,'Salmon','#FA8072','2018-11-05 02:12:26','2018-11-05 02:12:26'),(4,'DarkSalmon','#E9967A','2018-11-05 02:12:26','2018-11-05 02:12:26'),(5,'LightSalmon','#FFA07A','2018-11-05 02:12:26','2018-11-05 02:12:26'),(6,'Crimson','#DC143C','2018-11-05 02:12:26','2018-11-05 02:12:26'),(7,'Red','#FF0000','2018-11-05 02:12:26','2018-11-05 02:12:26'),(8,'FireBrick','#B22222','2018-11-05 02:12:26','2018-11-05 02:12:26'),(9,'DarkRed','#8B0000','2018-11-05 02:12:26','2018-11-05 02:12:26'),(10,'Pink','#FFC0CB','2018-11-05 02:12:26','2018-11-05 02:12:26'),(11,'LightPink','#FFB6C1','2018-11-05 02:12:26','2018-11-05 02:12:26'),(12,'HotPink','#FF69B4','2018-11-05 02:12:26','2018-11-05 02:12:26'),(13,'DeepPink','#FF1493','2018-11-05 02:12:26','2018-11-05 02:12:26'),(14,'MediumVioletRed','#C71585','2018-11-05 02:12:26','2018-11-05 02:12:26'),(15,'PaleVioletRed','#DB7093','2018-11-05 02:12:26','2018-11-05 02:12:26'),(17,'Coral','#FF7F50','2018-11-05 02:12:26','2018-11-05 02:12:26'),(18,'Tomato','#FF6347','2018-11-05 02:12:26','2018-11-05 02:12:26'),(19,'OrangeRed','#FF4500','2018-11-05 02:12:26','2018-11-05 02:12:26'),(20,'DarkOrange','#FF8C00','2018-11-05 02:12:26','2018-11-05 02:12:26'),(21,'Orange','#FFA500','2018-11-05 02:12:26','2018-11-05 02:12:26'),(22,'Gold','#FFD700','2018-11-05 02:12:26','2018-11-05 02:12:26'),(23,'Yellow','#FFFF00','2018-11-05 02:12:26','2018-11-05 02:12:26'),(24,'LightYellow','#FFFFE0','2018-11-05 02:12:26','2018-11-05 02:12:26'),(25,'LemonChiffon','#FFFACD','2018-11-05 02:12:26','2018-11-05 02:12:26'),(26,'LightGoldenrodYellow','#FAFAD2','2018-11-05 02:12:27','2018-11-05 02:12:27'),(27,'PapayaWhip','#FFEFD5','2018-11-05 02:12:27','2018-11-05 02:12:27'),(28,'Moccasin','#FFE4B5','2018-11-05 02:12:27','2018-11-05 02:12:27'),(29,'PeachPuff','#FFDAB9','2018-11-05 02:12:27','2018-11-05 02:12:27'),(30,'PaleGoldenrod','#EEE8AA','2018-11-05 02:12:27','2018-11-05 02:12:27'),(31,'Khaki','#F0E68C','2018-11-05 02:12:27','2018-11-05 02:12:27'),(32,'DarkKhaki','#BDB76B','2018-11-05 02:12:27','2018-11-05 02:12:27'),(33,'Lavender','#E6E6FA','2018-11-05 02:12:27','2018-11-05 02:12:27'),(34,'Thistle','#D8BFD8','2018-11-05 02:12:27','2018-11-05 02:12:27'),(35,'Plum','#DDA0DD','2018-11-05 02:12:27','2018-11-05 02:12:27'),(36,'Violet','#EE82EE','2018-11-05 02:12:27','2018-11-05 02:12:27'),(37,'Orchid','#DA70D6','2018-11-05 02:12:27','2018-11-05 02:12:27'),(39,'Magenta','#FF00FF','2018-11-05 02:12:27','2018-11-05 02:12:27'),(40,'MediumOrchid','#BA55D3','2018-11-05 02:12:27','2018-11-05 02:12:27'),(41,'MediumPurple','#9370DB','2018-11-05 02:12:27','2018-11-05 02:12:27'),(42,'Amethyst','#9966CC','2018-11-05 02:12:27','2018-11-05 02:12:27'),(43,'BlueViolet','#8A2BE2','2018-11-05 02:12:27','2018-11-05 02:12:27'),(44,'DarkViolet','#9400D3','2018-11-05 02:12:27','2018-11-05 02:12:27'),(45,'DarkOrchid','#9932CC','2018-11-05 02:12:27','2018-11-05 02:12:27'),(46,'DarkMagenta','#8B008B','2018-11-05 02:12:27','2018-11-05 02:12:27'),(47,'Purple','#800080','2018-11-05 02:12:27','2018-11-05 02:12:27'),(48,'Indigo','#4B0082','2018-11-05 02:12:27','2018-11-05 02:12:27'),(49,'SlateBlue','#6A5ACD','2018-11-05 02:12:27','2018-11-05 02:12:27'),(50,'DarkSlateBlue','#483D8B','2018-11-05 02:12:27','2018-11-05 02:12:27'),(51,'MediumSlateBlue','#7B68EE','2018-11-05 02:12:27','2018-11-05 02:12:27'),(52,'GreenYellow','#ADFF2F','2018-11-05 02:12:27','2018-11-05 02:12:27'),(53,'Chartreuse','#7FFF00','2018-11-05 02:12:27','2018-11-05 02:12:27'),(54,'LawnGreen','#7CFC00','2018-11-05 02:12:27','2018-11-05 02:12:27'),(55,'Lime','#00FF00','2018-11-05 02:12:27','2018-11-05 02:12:27'),(56,'LimeGreen','#32CD32','2018-11-05 02:12:27','2018-11-05 02:12:27'),(57,'PaleGreen','#98FB98','2018-11-05 02:12:27','2018-11-05 02:12:27'),(58,'LightGreen','#90EE90','2018-11-05 02:12:27','2018-11-05 02:12:27'),(59,'MediumSpringGreen','#00FA9A','2018-11-05 02:12:27','2018-11-05 02:12:27'),(60,'SpringGreen','#00FF7F','2018-11-05 02:12:27','2018-11-05 02:12:27'),(61,'MediumSeaGreen','#3CB371','2018-11-05 02:12:27','2018-11-05 02:12:27'),(62,'SeaGreen','#2E8B57','2018-11-05 02:12:27','2018-11-05 02:12:27'),(63,'ForestGreen','#228B22','2018-11-05 02:12:28','2018-11-05 02:12:28'),(64,'Green','#008000','2018-11-05 02:12:28','2018-11-05 02:12:28'),(65,'DarkGreen','#006400','2018-11-05 02:12:28','2018-11-05 02:12:28'),(66,'YellowGreen','#9ACD32','2018-11-05 02:12:28','2018-11-05 02:12:28'),(67,'OliveDrab','#6B8E23','2018-11-05 02:12:28','2018-11-05 02:12:28'),(68,'Olive','#808000','2018-11-05 02:12:28','2018-11-05 02:12:28'),(69,'DarkOliveGreen','#556B2F','2018-11-05 02:12:28','2018-11-05 02:12:28'),(70,'MediumAquamarine','#66CDAA','2018-11-05 02:12:28','2018-11-05 02:12:28'),(71,'DarkSeaGreen','#8FBC8F','2018-11-05 02:12:28','2018-11-05 02:12:28'),(72,'LightSeaGreen','#20B2AA','2018-11-05 02:12:28','2018-11-05 02:12:28'),(73,'DarkCyan','#008B8B','2018-11-05 02:12:28','2018-11-05 02:12:28'),(74,'Teal','#008080','2018-11-05 02:12:28','2018-11-05 02:12:28'),(75,'Aqua','#00FFFF','2018-11-05 02:12:28','2018-11-05 02:12:28'),(77,'LightCyan','#E0FFFF','2018-11-05 02:12:28','2018-11-05 02:12:28'),(78,'PaleTurquoise','#AFEEEE','2018-11-05 02:12:28','2018-11-05 02:12:28'),(79,'Aquamarine','#7FFFD4','2018-11-05 02:12:28','2018-11-05 02:12:28'),(80,'Turquoise','#40E0D0','2018-11-05 02:12:28','2018-11-05 02:12:28'),(81,'MediumTurquoise','#48D1CC','2018-11-05 02:12:28','2018-11-05 02:12:28'),(82,'DarkTurquoise','#00CED1','2018-11-05 02:12:28','2018-11-05 02:12:28'),(83,'CadetBlue','#5F9EA0','2018-11-05 02:12:28','2018-11-05 02:12:28'),(84,'SteelBlue','#4682B4','2018-11-05 02:12:28','2018-11-05 02:12:28'),(85,'LightSteelBlue','#B0C4DE','2018-11-05 02:12:28','2018-11-05 02:12:28'),(86,'PowderBlue','#B0E0E6','2018-11-05 02:12:28','2018-11-05 02:12:28'),(87,'LightBlue','#ADD8E6','2018-11-05 02:12:28','2018-11-05 02:12:28'),(88,'SkyBlue','#87CEEB','2018-11-05 02:12:28','2018-11-05 02:12:28'),(89,'LightSkyBlue','#87CEFA','2018-11-05 02:12:28','2018-11-05 02:12:28'),(90,'DeepSkyBlue','#00BFFF','2018-11-05 02:12:28','2018-11-05 02:12:28'),(91,'DodgerBlue','#1E90FF','2018-11-05 02:12:28','2018-11-05 02:12:28'),(92,'CornflowerBlue','#6495ED','2018-11-05 02:12:28','2018-11-05 02:12:28'),(94,'RoyalBlue','#4169E1','2018-11-05 02:12:28','2018-11-05 02:12:28'),(95,'Blue','#0000FF','2018-11-05 02:12:28','2018-11-05 02:12:28'),(96,'MediumBlue','#0000CD','2018-11-05 02:12:28','2018-11-05 02:12:28'),(97,'DarkBlue','#00008B','2018-11-05 02:12:28','2018-11-05 02:12:28'),(98,'Navy','#000080','2018-11-05 02:12:28','2018-11-05 02:12:28'),(99,'MidnightBlue','#191970','2018-11-05 02:12:29','2018-11-05 02:12:29'),(100,'Cornsilk','#FFF8DC','2018-11-05 02:12:29','2018-11-05 02:12:29'),(101,'BlanchedAlmond','#FFEBCD','2018-11-05 02:12:29','2018-11-05 02:12:29'),(102,'Bisque','#FFE4C4','2018-11-05 02:12:29','2018-11-05 02:12:29'),(103,'NavajoWhite','#FFDEAD','2018-11-05 02:12:29','2018-11-05 02:12:29'),(104,'Wheat','#F5DEB3','2018-11-05 02:12:29','2018-11-05 02:12:29'),(105,'BurlyWood','#DEB887','2018-11-05 02:12:29','2018-11-05 02:12:29'),(106,'Tan','#D2B48C','2018-11-05 02:12:29','2018-11-05 02:12:29'),(107,'RosyBrown','#BC8F8F','2018-11-05 02:12:29','2018-11-05 02:12:29'),(108,'SandyBrown','#F4A460','2018-11-05 02:12:29','2018-11-05 02:12:29'),(109,'Goldenrod','#DAA520','2018-11-05 02:12:29','2018-11-05 02:12:29'),(110,'DarkGoldenrod','#B8860B','2018-11-05 02:12:29','2018-11-05 02:12:29'),(111,'Peru','#CD853F','2018-11-05 02:12:29','2018-11-05 02:12:29'),(112,'Chocolate','#D2691E','2018-11-05 02:12:29','2018-11-05 02:12:29'),(113,'SaddleBrown','#8B4513','2018-11-05 02:12:29','2018-11-05 02:12:29'),(114,'Sienna','#A0522D','2018-11-05 02:12:29','2018-11-05 02:12:29'),(115,'Brown','#A52A2A','2018-11-05 02:12:29','2018-11-05 02:12:29'),(116,'Maroon','#800000','2018-11-05 02:12:29','2018-11-05 02:12:29'),(117,'White','#FFFFFF','2018-11-05 02:12:29','2018-11-05 02:12:29'),(118,'Snow','#FFFAFA','2018-11-05 02:12:29','2018-11-05 02:12:29'),(119,'Honeydew','#F0FFF0','2018-11-05 02:12:29','2018-11-05 02:12:29'),(120,'MintCream','#F5FFFA','2018-11-05 02:12:29','2018-11-05 02:12:29'),(121,'Azure','#F0FFFF','2018-11-05 02:12:29','2018-11-05 02:12:29'),(122,'AliceBlue','#F0F8FF','2018-11-05 02:12:29','2018-11-05 02:12:29'),(123,'GhostWhite','#F8F8FF','2018-11-05 02:12:29','2018-11-05 02:12:29'),(124,'WhiteSmoke','#F5F5F5','2018-11-05 02:12:29','2018-11-05 02:12:29'),(125,'Seashell','#FFF5EE','2018-11-05 02:12:29','2018-11-05 02:12:29'),(126,'Beige','#F5F5DC','2018-11-05 02:12:29','2018-11-05 02:12:29'),(127,'OldLace','#FDF5E6','2018-11-05 02:12:29','2018-11-05 02:12:29'),(128,'FloralWhite','#FFFAF0','2018-11-05 02:12:29','2018-11-05 02:12:29'),(129,'Ivory','#FFFFF0','2018-11-05 02:12:30','2018-11-05 02:12:30'),(130,'AntiqueWhite','#FAEBD7','2018-11-05 02:12:30','2018-11-05 02:12:30'),(131,'Linen','#FAF0E6','2018-11-05 02:12:30','2018-11-05 02:12:30'),(132,'LavenderBlush','#FFF0F5','2018-11-05 02:12:30','2018-11-05 02:12:30'),(133,'MistyRose','#FFE4E1','2018-11-05 02:12:30','2018-11-05 02:12:30'),(134,'Gainsboro','#DCDCDC','2018-11-05 02:12:30','2018-11-05 02:12:30'),(135,'LightGrey','#D3D3D3','2018-11-05 02:12:30','2018-11-05 02:12:30'),(136,'Silver','#C0C0C0','2018-11-05 02:12:30','2018-11-05 02:12:30'),(137,'DarkGray','#A9A9A9','2018-11-05 02:12:30','2018-11-05 02:12:30'),(138,'Gray','#808080','2018-11-05 02:12:30','2018-11-05 02:12:30'),(139,'DimGray','#696969','2018-11-05 02:12:30','2018-11-05 02:12:30'),(140,'LightSlateGray','#778899','2018-11-05 02:12:30','2018-11-05 02:12:30'),(141,'SlateGray','#708090','2018-11-05 02:12:30','2018-11-05 02:12:30'),(142,'DarkSlateGray','#2F4F4F','2018-11-05 02:12:30','2018-11-05 02:12:30'),(143,'Black','#000000','2018-11-05 02:12:30','2018-11-05 02:12:30');
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `feedback` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reply` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `added_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `coupon_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_bearer` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inhouse',
  `seller_id` bigint DEFAULT NULL COMMENT 'NULL=in-house, 0=all seller',
  `customer_id` bigint DEFAULT NULL COMMENT '0 = all customer',
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `min_purchase` decimal(8,2) NOT NULL DEFAULT '0.00',
  `max_discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `discount_type` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percentage',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `limit` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `currencies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_rate` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES (1,'USD','$','USD','1',0,NULL,'2024-04-09 09:03:56'),(2,'BDT','৳','BDT','84',0,NULL,'2024-04-09 09:03:58'),(3,'Indian Rupi','₹','INR','60',0,'2020-10-15 17:23:04','2024-04-09 09:04:01'),(4,'Euro','€','EUR','100',0,'2021-05-25 21:00:23','2024-04-09 09:04:03'),(5,'YEN','¥','JPY','110',0,'2021-06-10 22:08:31','2024-04-09 09:04:06'),(6,'Ringgit','RM','MYR','4.16',0,'2021-07-03 11:08:33','2024-04-09 09:04:09'),(7,'Rand','R','ZAR','14.26',0,'2021-07-03 11:12:38','2024-04-09 09:04:11'),(8,'Đồng','đ','VNĐ','1',1,'2024-04-09 08:55:21','2024-04-09 08:55:28');
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_wallet_histories`
--

DROP TABLE IF EXISTS `customer_wallet_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_wallet_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint DEFAULT NULL,
  `transaction_amount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `transaction_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_method` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_wallet_histories`
--

LOCK TABLES `customer_wallet_histories` WRITE;
/*!40000 ALTER TABLE `customer_wallet_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_wallet_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_wallets`
--

DROP TABLE IF EXISTS `customer_wallets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_wallets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint DEFAULT NULL,
  `balance` decimal(8,2) NOT NULL DEFAULT '0.00',
  `royality_points` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_wallets`
--

LOCK TABLES `customer_wallets` WRITE;
/*!40000 ALTER TABLE `customer_wallets` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_wallets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deal_of_the_days`
--

DROP TABLE IF EXISTS `deal_of_the_days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deal_of_the_days` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint DEFAULT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `discount_type` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'amount',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deal_of_the_days`
--

LOCK TABLES `deal_of_the_days` WRITE;
/*!40000 ALTER TABLE `deal_of_the_days` DISABLE KEYS */;
/*!40000 ALTER TABLE `deal_of_the_days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_country_codes`
--

DROP TABLE IF EXISTS `delivery_country_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delivery_country_codes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `country_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_country_codes`
--

LOCK TABLES `delivery_country_codes` WRITE;
/*!40000 ALTER TABLE `delivery_country_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery_country_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_histories`
--

DROP TABLE IF EXISTS `delivery_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delivery_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint DEFAULT NULL,
  `deliveryman_id` bigint DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `longitude` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_histories`
--

LOCK TABLES `delivery_histories` WRITE;
/*!40000 ALTER TABLE `delivery_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_man_transactions`
--

DROP TABLE IF EXISTS `delivery_man_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delivery_man_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `delivery_man_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `user_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit` decimal(50,2) NOT NULL DEFAULT '0.00',
  `credit` decimal(50,2) NOT NULL DEFAULT '0.00',
  `transaction_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_man_transactions`
--

LOCK TABLES `delivery_man_transactions` WRITE;
/*!40000 ALTER TABLE `delivery_man_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery_man_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_men`
--

DROP TABLE IF EXISTS `delivery_men`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delivery_men` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` bigint DEFAULT NULL,
  `f_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `country_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_number` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holder_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_online` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `auth_token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '6yIRXJRRfp78qJsAoKZZ6TTqhzuNJ3TcdvPBmk6n',
  `fcm_token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `app_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_men`
--

LOCK TABLES `delivery_men` WRITE;
/*!40000 ALTER TABLE `delivery_men` DISABLE KEYS */;
INSERT INTO `delivery_men` VALUES (1,0,'Huy','Đặng Văn','Biên Hòa','84','0337686846','dangvanhuy1432002@gmail.com','98766789i','passport','[\"2024-04-12-6619357f07bcf.webp\"]','2024-04-12-6619357f12118.webp','$2y$10$iGOV.xm2jnw38CSlgZ/wJ.JyEo3Qn8INUzk09/q7uHNIsDTyoUd/a',NULL,NULL,NULL,NULL,1,1,'2024-04-12 06:22:07','2024-04-12 06:22:07','6yIRXJRRfp78qJsAoKZZ6TTqhzuNJ3TcdvPBmk6n',NULL,'en');
/*!40000 ALTER TABLE `delivery_men` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_zip_codes`
--

DROP TABLE IF EXISTS `delivery_zip_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delivery_zip_codes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `zipcode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_zip_codes`
--

LOCK TABLES `delivery_zip_codes` WRITE;
/*!40000 ALTER TABLE `delivery_zip_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery_zip_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deliveryman_notifications`
--

DROP TABLE IF EXISTS `deliveryman_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deliveryman_notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `delivery_man_id` bigint NOT NULL,
  `order_id` bigint NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deliveryman_notifications`
--

LOCK TABLES `deliveryman_notifications` WRITE;
/*!40000 ALTER TABLE `deliveryman_notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `deliveryman_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deliveryman_wallets`
--

DROP TABLE IF EXISTS `deliveryman_wallets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deliveryman_wallets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `delivery_man_id` bigint NOT NULL,
  `current_balance` decimal(50,2) NOT NULL DEFAULT '0.00',
  `cash_in_hand` decimal(50,2) NOT NULL DEFAULT '0.00',
  `pending_withdraw` decimal(50,2) NOT NULL DEFAULT '0.00',
  `total_withdraw` decimal(50,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deliveryman_wallets`
--

LOCK TABLES `deliveryman_wallets` WRITE;
/*!40000 ALTER TABLE `deliveryman_wallets` DISABLE KEYS */;
/*!40000 ALTER TABLE `deliveryman_wallets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `digital_product_otp_verifications`
--

DROP TABLE IF EXISTS `digital_product_otp_verifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `digital_product_otp_verifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_details_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_hit_count` tinyint NOT NULL DEFAULT '0',
  `is_temp_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `temp_block_time` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `digital_product_otp_verifications`
--

LOCK TABLES `digital_product_otp_verifications` WRITE;
/*!40000 ALTER TABLE `digital_product_otp_verifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `digital_product_otp_verifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emergency_contacts`
--

DROP TABLE IF EXISTS `emergency_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emergency_contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emergency_contacts`
--

LOCK TABLES `emergency_contacts` WRITE;
/*!40000 ALTER TABLE `emergency_contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `emergency_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
-- Table structure for table `feature_deals`
--

DROP TABLE IF EXISTS `feature_deals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feature_deals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feature_deals`
--

LOCK TABLES `feature_deals` WRITE;
/*!40000 ALTER TABLE `feature_deals` DISABLE KEYS */;
/*!40000 ALTER TABLE `feature_deals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flash_deal_products`
--

DROP TABLE IF EXISTS `flash_deal_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `flash_deal_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `flash_deal_id` bigint DEFAULT NULL,
  `product_id` bigint DEFAULT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `discount_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flash_deal_products`
--

LOCK TABLES `flash_deal_products` WRITE;
/*!40000 ALTER TABLE `flash_deal_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `flash_deal_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flash_deals`
--

DROP TABLE IF EXISTS `flash_deals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `flash_deals` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `background_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `deal_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flash_deals`
--

LOCK TABLES `flash_deals` WRITE;
/*!40000 ALTER TABLE `flash_deals` DISABLE KEYS */;
/*!40000 ALTER TABLE `flash_deals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guest_users`
--

DROP TABLE IF EXISTS `guest_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guest_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=673 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guest_users`
--

LOCK TABLES `guest_users` WRITE;
/*!40000 ALTER TABLE `guest_users` DISABLE KEYS */;
INSERT INTO `guest_users` VALUES (1,'::1',NULL,'2023-10-13 05:34:54',NULL),(2,'::1',NULL,'2023-10-30 11:02:56',NULL),(3,'27.74.108.240',NULL,'2024-04-09 14:41:17',NULL),(4,'171.249.50.170',NULL,'2024-04-09 14:42:11',NULL),(5,'171.249.50.170',NULL,'2024-04-09 09:00:33',NULL),(6,'172.16.3.1',NULL,'2024-04-10 02:25:50',NULL),(7,'162.142.125.211',NULL,'2024-04-10 04:02:29',NULL),(8,'162.142.125.211',NULL,'2024-04-10 04:02:34',NULL),(9,'172.16.3.1',NULL,'2024-04-10 06:08:21',NULL),(10,'127.0.0.1',NULL,'2024-04-10 07:15:54',NULL),(11,'::1',NULL,'2024-04-10 07:30:27',NULL),(12,'172.16.3.1',NULL,'2024-04-10 07:39:08',NULL),(13,'127.0.0.1',NULL,'2024-04-10 00:52:23',NULL),(14,'::1',NULL,'2024-04-10 10:29:49',NULL),(15,'183.134.104.149',NULL,'2024-04-10 11:14:59',NULL),(16,'::1',NULL,'2024-04-10 11:53:09',NULL),(17,'27.74.108.240',NULL,'2024-04-10 11:58:07',NULL),(18,'27.74.108.240',NULL,'2024-04-10 12:00:23',NULL),(19,'178.18.253.119',NULL,'2024-04-10 12:39:21',NULL),(20,'185.224.128.43',NULL,'2024-04-10 13:03:42',NULL),(21,'211.233.42.203',NULL,'2024-04-10 13:18:58',NULL),(22,'211.233.42.203',NULL,'2024-04-10 13:19:01',NULL),(23,'52.167.144.232',NULL,'2024-04-10 15:18:27',NULL),(24,'185.150.26.240',NULL,'2024-04-10 16:43:50',NULL),(25,'178.128.37.118',NULL,'2024-04-10 16:57:52',NULL),(26,'171.250.248.200',NULL,'2024-04-10 19:19:16',NULL),(27,'172.16.3.1',NULL,'2024-04-10 19:20:12',NULL),(28,'172.16.3.1',NULL,'2024-04-10 19:20:21',NULL),(29,'171.250.248.200',NULL,'2024-04-11 02:25:34',NULL),(30,'207.46.13.128',NULL,'2024-04-11 02:32:47',NULL),(31,'34.140.130.61',NULL,'2024-04-11 02:48:58',NULL),(32,'34.140.130.61',NULL,'2024-04-11 02:51:38',NULL),(33,'34.140.130.61',NULL,'2024-04-11 02:51:41',NULL),(34,'34.140.130.61',NULL,'2024-04-11 02:51:42',NULL),(35,'172.16.3.1',NULL,'2024-04-10 20:17:09',NULL),(36,'110.80.136.230',NULL,'2024-04-10 20:20:54',NULL),(37,'172.16.3.1',NULL,'2024-04-10 20:24:31',NULL),(38,'172.16.3.1',NULL,'2024-04-10 20:28:47',NULL),(39,'171.250.248.200',NULL,'2024-04-10 20:39:14',NULL),(40,'47.206.161.226',NULL,'2024-04-10 21:00:45',NULL),(41,'64.62.156.36',NULL,'2024-04-10 21:27:34',NULL),(42,'172.16.3.1',NULL,'2024-04-10 22:20:55',NULL),(43,'27.74.108.240',NULL,'2024-04-10 22:22:05',NULL),(44,'181.229.225.44',NULL,'2024-04-10 22:55:19',NULL),(45,'185.150.26.240',NULL,'2024-04-10 23:34:57',NULL),(46,'193.35.18.127',NULL,'2024-04-11 00:21:43',NULL),(47,'172.16.3.1',NULL,'2024-04-11 00:21:57',NULL),(48,'52.167.144.233',NULL,'2024-04-11 00:59:31',NULL),(49,'171.247.63.83',NULL,'2024-04-11 01:02:19',NULL),(50,'171.247.63.83',NULL,'2024-04-11 01:02:24',NULL),(51,'127.0.0.1',NULL,'2024-04-11 01:16:30',NULL),(52,'172.16.3.1',NULL,'2024-04-11 01:27:26',NULL),(53,'127.0.0.1',NULL,'2024-04-11 02:04:39',NULL),(54,'::1',NULL,'2024-04-11 02:30:18',NULL),(55,'127.0.0.1',NULL,'2024-04-11 02:34:49',NULL),(56,'171.247.63.83',NULL,'2024-04-11 02:50:43',NULL),(57,'171.247.67.251',NULL,'2024-04-11 02:51:17',NULL),(58,'206.168.34.122',NULL,'2024-04-11 03:25:38',NULL),(59,'206.168.34.122',NULL,'2024-04-11 03:25:44',NULL),(60,'185.224.128.43',NULL,'2024-04-11 03:46:06',NULL),(61,'168.76.20.229',NULL,'2024-04-11 03:46:07',NULL),(62,'168.76.20.229',NULL,'2024-04-11 03:46:29',NULL),(63,'162.216.150.87',NULL,'2024-04-11 04:03:27',NULL),(64,'162.216.150.8',NULL,'2024-04-11 04:35:25',NULL),(65,'185.150.26.240',NULL,'2024-04-11 04:52:35',NULL),(66,'139.59.225.113',NULL,'2024-04-11 05:54:43',NULL),(67,'45.132.194.53',NULL,'2024-04-11 06:12:50',NULL),(68,'185.150.26.246',NULL,'2024-04-11 06:25:40',NULL),(69,'14.179.194.172',NULL,'2024-04-11 07:08:59',NULL),(70,'171.247.67.251',NULL,'2024-04-11 07:42:40',NULL),(71,'34.78.21.231',NULL,'2024-04-11 07:46:32',NULL),(72,'::1',NULL,'2024-04-11 07:51:28',NULL),(73,'218.24.198.163',NULL,'2024-04-11 07:59:43',NULL),(74,'130.211.54.158',NULL,'2024-04-11 08:27:20',NULL),(75,'185.224.128.43',NULL,'2024-04-11 09:00:16',NULL),(76,'171.247.67.251',NULL,'2024-04-11 09:38:08',NULL),(77,'185.150.26.246',NULL,'2024-04-11 10:29:54',NULL),(78,'185.180.143.11',NULL,'2024-04-11 10:33:20',NULL),(79,'185.180.143.11',NULL,'2024-04-11 10:34:34',NULL),(80,'185.180.143.11',NULL,'2024-04-11 10:34:55',NULL),(81,'185.180.143.11',NULL,'2024-04-11 10:35:58',NULL),(82,'45.230.240.13',NULL,'2024-04-11 11:32:35',NULL),(83,'185.224.128.43',NULL,'2024-04-11 13:53:15',NULL),(84,'185.150.26.246',NULL,'2024-04-11 14:00:50',NULL),(85,'162.216.150.228',NULL,'2024-04-11 14:24:54',NULL),(86,'206.168.34.51',NULL,'2024-04-11 16:19:55',NULL),(87,'206.168.34.51',NULL,'2024-04-11 16:20:00',NULL),(88,'111.231.59.91',NULL,'2024-04-11 19:22:40',NULL),(89,'185.224.128.43',NULL,'2024-04-11 19:24:59',NULL),(90,'172.16.3.1',NULL,'2024-04-11 19:29:16',NULL),(91,'173.252.79.7',NULL,'2024-04-11 19:29:29',NULL),(92,'172.16.3.1',NULL,'2024-04-11 19:29:47',NULL),(93,'21.37.154.195',NULL,'2024-04-11 19:29:52',NULL),(94,'172.16.3.1',NULL,'2024-04-11 19:30:17',NULL),(95,'125.118.31.216',NULL,'2024-04-11 19:37:19',NULL),(96,'185.150.26.246',NULL,'2024-04-11 19:56:26',NULL),(97,'27.72.124.239',NULL,'2024-04-11 21:20:43',NULL),(98,'66.249.66.68',NULL,'2024-04-11 21:48:09',NULL),(99,'185.242.226.10',NULL,'2024-04-11 21:51:35',NULL),(100,'58.53.218.148',NULL,'2024-04-11 22:21:57',NULL),(101,'193.35.18.127',NULL,'2024-04-11 22:32:49',NULL),(102,'64.62.197.73',NULL,'2024-04-11 22:38:27',NULL),(103,'182.89.50.62',NULL,'2024-04-11 23:10:49',NULL),(104,'103.203.57.1',NULL,'2024-04-11 23:27:36',NULL),(105,'91.83.161.45',NULL,'2024-04-11 23:44:49',NULL),(106,'162.216.149.78',NULL,'2024-04-11 23:53:20',NULL),(107,'45.128.232.27',NULL,'2024-04-12 00:39:55',NULL),(108,'194.32.122.14',NULL,'2024-04-12 00:44:18',NULL),(109,'185.224.128.43',NULL,'2024-04-12 00:45:22',NULL),(110,'185.150.26.246',NULL,'2024-04-12 01:12:57',NULL),(111,'139.162.250.227',NULL,'2024-04-12 01:23:25',NULL),(112,'125.118.31.216',NULL,'2024-04-12 01:55:12',NULL),(113,'104.199.31.214',NULL,'2024-04-12 02:32:03',NULL),(114,'36.161.233.53',NULL,'2024-04-12 02:41:18',NULL),(115,'221.159.4.176',NULL,'2024-04-12 03:03:59',NULL),(116,'84.239.40.240',NULL,'2024-04-12 03:06:59',NULL),(117,'109.74.199.156',NULL,'2024-04-12 05:18:48',NULL),(118,'185.224.128.43',NULL,'2024-04-12 05:21:39',NULL),(119,'58.53.218.148',NULL,'2024-04-12 06:13:27',NULL),(120,'171.247.62.186',NULL,'2024-04-12 06:20:08',NULL),(121,'171.247.62.186',NULL,'2024-04-12 08:16:26',NULL),(122,'36.108.170.121',NULL,'2024-04-12 08:46:41',NULL),(123,'185.242.226.10',NULL,'2024-04-12 09:19:52',NULL),(124,'185.242.226.10',NULL,'2024-04-12 09:20:00',NULL),(125,'185.242.226.10',NULL,'2024-04-12 09:20:06',NULL),(126,'107.170.240.34',NULL,'2024-04-12 09:36:21',NULL),(127,'5.237.232.55',NULL,'2024-04-12 09:37:35',NULL),(128,'158.140.190.202',NULL,'2024-04-12 10:55:00',NULL),(129,'206.168.34.123',NULL,'2024-04-12 11:37:20',NULL),(130,'185.180.143.49',NULL,'2024-04-12 11:38:59',NULL),(131,'167.94.146.58',NULL,'2024-04-12 12:32:12',NULL),(132,'167.94.146.58',NULL,'2024-04-12 12:32:16',NULL),(133,'125.118.31.216',NULL,'2024-04-12 13:34:48',NULL),(134,'106.75.134.86',NULL,'2024-04-12 15:51:48',NULL),(135,'185.224.128.43',NULL,'2024-04-12 15:55:44',NULL),(136,'185.150.26.246',NULL,'2024-04-12 17:37:19',NULL),(137,'61.141.77.118',NULL,'2024-04-12 18:17:03',NULL),(138,'185.180.143.137',NULL,'2024-04-12 18:26:18',NULL),(139,'171.227.83.180',NULL,'2024-04-12 19:11:19',NULL),(140,'171.227.83.180',NULL,'2024-04-12 20:13:50',NULL),(141,'35.203.211.111',NULL,'2024-04-12 20:21:20',NULL),(142,'111.85.12.27',NULL,'2024-04-12 20:23:44',NULL),(143,'83.97.73.245',NULL,'2024-04-12 21:01:09',NULL),(144,'185.224.128.43',NULL,'2024-04-12 21:16:03',NULL),(145,'165.22.39.64',NULL,'2024-04-12 21:35:35',NULL),(146,'77.234.44.186',NULL,'2024-04-12 22:00:59',NULL),(147,'52.167.144.142',NULL,'2024-04-12 22:06:21',NULL),(148,'185.150.26.246',NULL,'2024-04-12 22:59:16',NULL),(149,'178.48.218.131',NULL,'2024-04-12 23:59:50',NULL),(150,'185.224.128.43',NULL,'2024-04-13 02:11:11',NULL),(151,'14.164.89.217',NULL,'2024-04-13 03:04:09',NULL),(152,'206.72.198.135',NULL,'2024-04-13 03:49:19',NULL),(153,'128.14.239.39',NULL,'2024-04-13 04:46:31',NULL),(154,'128.14.239.39',NULL,'2024-04-13 04:46:59',NULL),(155,'::1',NULL,'2024-04-13 04:49:30',NULL),(156,'65.49.1.92',NULL,'2024-04-13 05:22:34',NULL),(157,'::1',NULL,'2024-04-13 05:39:39',NULL),(158,'::1',NULL,'2024-04-13 05:48:15',NULL),(159,'::1',NULL,'2024-04-13 05:57:01',NULL),(160,'206.72.198.135',NULL,'2024-04-13 06:14:26',NULL),(161,'185.224.128.43',NULL,'2024-04-13 07:36:19',NULL),(162,'78.158.200.28',NULL,'2024-04-13 09:00:57',NULL),(163,'118.26.39.156',NULL,'2024-04-13 10:49:08',NULL),(164,'118.26.39.156',NULL,'2024-04-13 10:49:09',NULL),(165,'112.64.109.188',NULL,'2024-04-13 12:30:43',NULL),(166,'185.224.128.43',NULL,'2024-04-13 12:42:31',NULL),(167,'122.194.9.213',NULL,'2024-04-13 13:35:20',NULL),(168,'185.150.26.246',NULL,'2024-04-13 16:27:04',NULL),(169,'206.72.198.135',NULL,'2024-04-13 17:10:40',NULL),(170,'185.224.128.43',NULL,'2024-04-13 17:20:08',NULL),(171,'185.150.26.240',NULL,'2024-04-13 17:59:33',NULL),(172,'64.23.190.175',NULL,'2024-04-13 18:39:58',NULL),(173,'152.42.226.20',NULL,'2024-04-13 18:49:55',NULL),(174,'106.75.90.211',NULL,'2024-04-13 19:03:10',NULL),(175,'106.75.90.211',NULL,'2024-04-13 19:03:13',NULL),(176,'162.142.125.9',NULL,'2024-04-13 19:12:22',NULL),(177,'162.142.125.9',NULL,'2024-04-13 19:12:28',NULL),(178,'34.78.249.41',NULL,'2024-04-13 19:19:54',NULL),(179,'111.85.1.86',NULL,'2024-04-13 19:31:36',NULL),(180,'71.6.134.230',NULL,'2024-04-13 19:51:44',NULL),(181,'5.62.49.104',NULL,'2024-04-13 19:55:39',NULL),(182,'5.62.49.104',NULL,'2024-04-13 20:02:33',NULL),(183,'185.224.128.43',NULL,'2024-04-13 22:18:12',NULL),(184,'185.150.26.246',NULL,'2024-04-13 22:18:53',NULL),(185,'127.0.0.1',NULL,'2024-04-13 23:15:18',NULL),(186,'::1',NULL,'2024-04-13 23:15:44',NULL),(187,'171.253.132.254',NULL,'2024-04-13 23:29:34',NULL),(188,'173.252.79.8',NULL,'2024-04-13 23:30:16',NULL),(189,'27.3.160.180',NULL,'2024-04-13 23:31:35',NULL),(190,'171.253.132.254',NULL,'2024-04-13 23:44:58',NULL),(191,'111.85.1.86',NULL,'2024-04-14 00:02:40',NULL),(192,'93.51.103.40',NULL,'2024-04-14 00:17:47',NULL),(193,'216.218.206.69',NULL,'2024-04-14 01:11:11',NULL),(194,'107.151.243.170',NULL,'2024-04-14 01:31:58',NULL),(195,'14.230.182.98',NULL,'2024-04-14 02:42:34',NULL),(196,'162.216.149.58',NULL,'2024-04-14 02:59:12',NULL),(197,'185.150.26.246',NULL,'2024-04-14 03:07:28',NULL),(198,'185.224.128.43',NULL,'2024-04-14 03:58:52',NULL),(199,'185.242.226.10',NULL,'2024-04-14 04:15:21',NULL),(200,'::1',NULL,'2024-04-14 05:12:04',NULL),(201,'185.230.6.3',NULL,'2024-04-14 05:28:11',NULL),(202,'171.247.56.110',NULL,'2024-04-14 05:35:50',NULL),(203,'168.232.15.190',NULL,'2024-04-14 06:56:53',NULL),(204,'14.230.182.98',NULL,'2024-04-14 07:26:20',NULL),(205,'85.239.241.22',NULL,'2024-04-14 08:28:46',NULL),(206,'185.224.128.43',NULL,'2024-04-14 08:38:17',NULL),(207,'170.64.177.43',NULL,'2024-04-14 08:39:07',NULL),(208,'185.242.226.10',NULL,'2024-04-14 11:25:49',NULL),(209,'51.159.214.48',NULL,'2024-04-14 12:16:42',NULL),(210,'51.159.214.48',NULL,'2024-04-14 12:16:45',NULL),(211,'185.224.128.43',NULL,'2024-04-14 13:19:03',NULL),(212,'185.150.26.246',NULL,'2024-04-14 14:25:14',NULL),(213,'87.98.149.2',NULL,'2024-04-14 14:31:27',NULL),(214,'15.235.143.31',NULL,'2024-04-14 15:08:23',NULL),(215,'45.118.77.225',NULL,'2024-04-14 15:40:56',NULL),(216,'87.98.149.2',NULL,'2024-04-14 15:50:11',NULL),(217,'71.6.232.28',NULL,'2024-04-14 17:39:48',NULL),(218,'124.133.212.79',NULL,'2024-04-14 18:27:29',NULL),(219,'103.199.32.183',NULL,'2024-04-14 18:27:46',NULL),(220,'222.94.32.39',NULL,'2024-04-14 18:27:50',NULL),(221,'123.245.85.75',NULL,'2024-04-14 18:28:08',NULL),(222,'185.224.128.43',NULL,'2024-04-14 18:35:37',NULL),(223,'172.16.3.1',NULL,'2024-04-14 19:18:52',NULL),(224,'172.16.3.1',NULL,'2024-04-14 19:20:16',NULL),(225,'185.150.26.246',NULL,'2024-04-14 19:50:45',NULL),(226,'104.199.31.214',NULL,'2024-04-14 20:06:48',NULL),(227,'14.226.35.87',NULL,'2024-04-14 20:32:42',NULL),(228,'34.78.249.41',NULL,'2024-04-14 21:33:06',NULL),(229,'206.168.34.51',NULL,'2024-04-14 21:40:38',NULL),(230,'206.168.34.51',NULL,'2024-04-14 21:40:43',NULL),(231,'172.16.3.1',NULL,'2024-04-14 21:52:24',NULL),(232,'212.102.60.147',NULL,'2024-04-14 22:06:37',NULL),(233,'80.94.92.60',NULL,'2024-04-14 22:32:27',NULL),(234,'141.138.138.113',NULL,'2024-04-14 22:56:59',NULL),(235,'80.94.92.60',NULL,'2024-04-14 23:05:14',NULL),(236,'36.161.234.34',NULL,'2024-04-14 23:06:51',NULL),(237,'162.142.125.223',NULL,'2024-04-14 23:33:48',NULL),(238,'::1',NULL,'2024-04-14 23:35:58',NULL),(239,'185.224.128.43',NULL,'2024-04-14 23:43:41',NULL),(240,'46.249.131.222',NULL,'2024-04-15 00:33:15',NULL),(241,'65.49.1.89',NULL,'2024-04-15 01:05:30',NULL),(242,'162.216.149.189',NULL,'2024-04-15 01:43:19',NULL),(243,'14.230.182.98',NULL,'2024-04-15 02:39:08',NULL),(244,'185.150.26.246',NULL,'2024-04-15 04:45:17',NULL),(245,'125.118.31.216',NULL,'2024-04-15 04:51:30',NULL),(246,'185.224.128.43',NULL,'2024-04-15 05:20:10',NULL),(247,'168.232.15.170',NULL,'2024-04-15 05:29:17',NULL),(248,'64.227.157.20',NULL,'2024-04-15 06:20:23',NULL),(249,'111.85.12.21',NULL,'2024-04-15 08:14:55',NULL),(250,'27.74.108.240',NULL,'2024-04-15 08:48:42',NULL),(251,'46.34.152.90',NULL,'2024-04-15 09:26:39',NULL),(252,'185.224.128.43',NULL,'2024-04-15 10:15:20',NULL),(253,'152.32.235.85',NULL,'2024-04-15 11:12:46',NULL),(254,'152.32.235.85',NULL,'2024-04-15 11:12:49',NULL),(255,'67.217.48.57',NULL,'2024-04-15 11:59:26',NULL),(256,'165.232.105.50',NULL,'2024-04-15 12:47:37',NULL),(257,'216.219.94.195',NULL,'2024-04-15 13:47:59',NULL),(258,'45.122.246.97',NULL,'2024-04-15 14:20:12',NULL),(259,'81.163.47.187',NULL,'2024-04-15 14:52:44',NULL),(260,'185.224.128.43',NULL,'2024-04-15 15:00:18',NULL),(261,'199.45.154.66',NULL,'2024-04-15 15:35:28',NULL),(262,'199.45.154.66',NULL,'2024-04-15 15:35:32',NULL),(263,'52.167.144.192',NULL,'2024-04-15 15:39:25',NULL),(264,'167.94.138.127',NULL,'2024-04-15 16:02:52',NULL),(265,'167.94.138.127',NULL,'2024-04-15 16:02:58',NULL),(266,'54.205.39.144',NULL,'2024-04-15 17:00:19',NULL),(267,'51.254.59.113',NULL,'2024-04-15 17:44:28',NULL),(268,'117.245.249.159',NULL,'2024-04-15 19:11:54',NULL),(269,'205.210.31.174',NULL,'2024-04-15 19:32:21',NULL),(270,'185.224.128.43',NULL,'2024-04-15 19:52:17',NULL),(271,'64.62.197.127',NULL,'2024-04-15 22:58:51',NULL),(272,'35.203.210.16',NULL,'2024-04-15 23:13:52',NULL),(273,'::1',NULL,'2024-04-15 23:18:55',NULL),(274,'212.102.33.74',NULL,'2024-04-15 23:45:48',NULL),(275,'104.152.52.37',NULL,'2024-04-16 00:09:30',NULL),(276,'14.230.182.98',NULL,'2024-04-16 02:14:05',NULL),(277,'185.242.226.10',NULL,'2024-04-16 03:53:41',NULL),(278,'185.242.226.80',NULL,'2024-04-16 04:36:45',NULL),(279,'67.217.48.57',NULL,'2024-04-16 04:45:57',NULL),(280,'118.194.236.137',NULL,'2024-04-16 05:45:59',NULL),(281,'118.194.236.137',NULL,'2024-04-16 05:46:26',NULL),(282,'117.15.115.56',NULL,'2024-04-16 06:40:53',NULL),(283,'139.59.107.179',NULL,'2024-04-16 07:07:48',NULL),(284,'139.59.107.179',NULL,'2024-04-16 07:08:06',NULL),(285,'139.59.107.179',NULL,'2024-04-16 07:08:34',NULL),(286,'::1',NULL,'2024-04-16 07:25:31',NULL),(287,'216.219.94.195',NULL,'2024-04-16 07:31:40',NULL),(288,'180.149.125.173',NULL,'2024-04-16 07:34:26',NULL),(289,'197.44.77.98',NULL,'2024-04-16 08:56:38',NULL),(290,'34.140.130.61',NULL,'2024-04-16 08:59:28',NULL),(291,'104.152.52.77',NULL,'2024-04-16 09:04:17',NULL),(292,'185.224.128.43',NULL,'2024-04-16 10:07:58',NULL),(293,'157.245.245.55',NULL,'2024-04-16 10:36:38',NULL),(294,'185.224.128.43',NULL,'2024-04-16 14:32:51',NULL),(295,'185.242.226.10',NULL,'2024-04-16 15:36:51',NULL),(296,'185.224.128.43',NULL,'2024-04-16 18:50:13',NULL),(297,'164.52.0.94',NULL,'2024-04-16 19:49:04',NULL),(298,'164.52.0.94',NULL,'2024-04-16 19:49:08',NULL),(299,'164.52.0.94',NULL,'2024-04-16 19:49:09',NULL),(300,'164.52.0.94',NULL,'2024-04-16 19:49:17',NULL),(301,'164.52.0.94',NULL,'2024-04-16 19:49:25',NULL),(302,'212.102.33.74',NULL,'2024-04-16 20:24:17',NULL),(303,'65.49.20.66',NULL,'2024-04-16 20:34:19',NULL),(304,'34.76.96.55',NULL,'2024-04-16 20:36:14',NULL),(305,'162.142.125.226',NULL,'2024-04-16 21:46:06',NULL),(306,'159.89.239.238',NULL,'2024-04-16 23:24:07',NULL),(307,'::1',NULL,'2024-04-17 00:37:31',NULL),(308,'185.224.128.43',NULL,'2024-04-17 00:48:28',NULL),(309,'181.44.227.17',NULL,'2024-04-17 01:19:05',NULL),(310,'::1',NULL,'2024-04-17 02:17:45',NULL),(311,'200.52.144.161',NULL,'2024-04-17 02:37:06',NULL),(312,'60.186.207.148',NULL,'2024-04-17 03:11:20',NULL),(313,'162.216.150.13',NULL,'2024-04-17 03:31:17',NULL),(314,'206.168.34.36',NULL,'2024-04-17 04:19:18',NULL),(315,'206.168.34.36',NULL,'2024-04-17 04:19:23',NULL),(316,'185.224.128.43',NULL,'2024-04-17 04:59:04',NULL),(317,'::1',NULL,'2024-04-17 05:40:45',NULL),(318,'171.250.250.51',NULL,'2024-04-17 06:05:25',NULL),(319,'171.250.250.51',NULL,'2024-04-17 06:05:26',NULL),(320,'184.105.139.68',NULL,'2024-04-17 06:43:45',NULL),(321,'80.94.92.60',NULL,'2024-04-17 07:26:29',NULL),(322,'116.58.254.113',NULL,'2024-04-17 08:37:47',NULL),(323,'173.252.79.2',NULL,'2024-04-17 09:53:49',NULL),(324,'27.2.209.218',NULL,'2024-04-17 09:53:58',NULL),(325,'185.224.128.43',NULL,'2024-04-17 10:17:12',NULL),(326,'185.180.143.136',NULL,'2024-04-17 10:25:48',NULL),(327,'185.180.143.8',NULL,'2024-04-17 11:21:10',NULL),(328,'185.91.69.110',NULL,'2024-04-17 11:22:41',NULL),(329,'64.62.197.96',NULL,'2024-04-17 12:58:51',NULL),(330,'151.244.132.188',NULL,'2024-04-17 14:34:02',NULL),(331,'27.2.209.218',NULL,'2024-04-17 15:10:32',NULL),(332,'167.172.75.120',NULL,'2024-04-17 15:13:58',NULL),(333,'185.224.128.43',NULL,'2024-04-17 15:28:33',NULL),(334,'167.94.145.53',NULL,'2024-04-17 16:06:43',NULL),(335,'167.94.145.53',NULL,'2024-04-17 16:06:48',NULL),(336,'106.34.146.24',NULL,'2024-04-17 17:27:48',NULL),(337,'42.228.9.78',NULL,'2024-04-17 19:26:36',NULL),(338,'52.167.144.230',NULL,'2024-04-17 20:52:36',NULL),(339,'185.224.128.43',NULL,'2024-04-17 21:03:35',NULL),(340,'167.94.146.53',NULL,'2024-04-17 21:21:05',NULL),(341,'167.94.146.53',NULL,'2024-04-17 21:21:10',NULL),(342,'195.181.168.172',NULL,'2024-04-17 21:44:52',NULL),(343,'138.197.121.12',NULL,'2024-04-17 23:43:15',NULL),(344,'104.152.52.49',NULL,'2024-04-17 23:44:32',NULL),(345,'138.197.121.12',NULL,'2024-04-17 23:45:43',NULL),(346,'177.87.4.6',NULL,'2024-04-18 00:54:28',NULL),(347,'34.77.127.183',NULL,'2024-04-18 01:17:28',NULL),(348,'213.171.0.88',NULL,'2024-04-18 01:32:00',NULL),(349,'185.224.128.43',NULL,'2024-04-18 01:33:14',NULL),(350,'::1',NULL,'2024-04-18 01:52:47',NULL),(351,'184.105.247.196',NULL,'2024-04-18 02:08:04',NULL),(352,'14.191.220.132',NULL,'2024-04-18 02:39:36',NULL),(353,'185.180.143.49',NULL,'2024-04-18 02:48:28',NULL),(354,'35.203.211.160',NULL,'2024-04-18 03:40:08',NULL),(355,'185.242.226.10',NULL,'2024-04-18 04:07:38',NULL),(356,'45.128.232.129',NULL,'2024-04-18 05:15:50',NULL),(357,'185.224.128.43',NULL,'2024-04-18 06:33:38',NULL),(358,'::1',NULL,'2024-04-18 07:17:18',NULL),(359,'60.186.207.148',NULL,'2024-04-18 07:24:27',NULL),(360,'80.94.92.60',NULL,'2024-04-18 08:01:39',NULL),(361,'185.224.128.43',NULL,'2024-04-18 12:01:38',NULL),(362,'195.181.168.172',NULL,'2024-04-18 13:05:27',NULL),(363,'102.129.232.53',NULL,'2024-04-18 13:16:04',NULL),(364,'162.142.125.220',NULL,'2024-04-18 13:38:22',NULL),(365,'162.142.125.220',NULL,'2024-04-18 13:38:27',NULL),(366,'220.89.137.119',NULL,'2024-04-18 15:07:12',NULL),(367,'185.242.226.10',NULL,'2024-04-18 16:07:17',NULL),(368,'185.242.226.10',NULL,'2024-04-18 16:08:24',NULL),(369,'185.242.226.10',NULL,'2024-04-18 16:10:30',NULL),(370,'113.178.186.10',NULL,'2024-04-18 17:58:57',NULL),(371,'14.225.53.162',NULL,'2024-04-18 18:36:11',NULL),(372,'2.183.107.21',NULL,'2024-04-18 19:17:26',NULL),(373,'179.48.137.19',NULL,'2024-04-18 19:17:53',NULL),(374,'107.151.243.170',NULL,'2024-04-18 20:08:41',NULL),(375,'206.168.34.186',NULL,'2024-04-18 20:34:10',NULL),(376,'60.186.207.148',NULL,'2024-04-18 21:07:26',NULL),(377,'103.43.18.250',NULL,'2024-04-18 21:26:52',NULL),(378,'45.87.212.182',NULL,'2024-04-18 21:36:18',NULL),(379,'185.224.128.43',NULL,'2024-04-18 21:49:42',NULL),(380,'184.105.247.252',NULL,'2024-04-18 22:08:44',NULL),(381,'125.76.87.134',NULL,'2024-04-18 22:21:40',NULL),(382,'115.72.33.220',NULL,'2024-04-18 22:23:37',NULL),(383,'60.188.247.77',NULL,'2024-04-18 23:10:50',NULL),(384,'64.227.2.73',NULL,'2024-04-18 23:12:47',NULL),(385,'::1',NULL,'2024-04-18 23:28:29',NULL),(386,'222.90.12.2',NULL,'2024-04-18 23:42:40',NULL),(387,'35.203.211.86',NULL,'2024-04-18 23:59:31',NULL),(388,'88.248.164.137',NULL,'2024-04-19 02:29:31',NULL),(389,'::1',NULL,'2024-04-19 03:05:40',NULL),(390,'176.58.115.246',NULL,'2024-04-19 03:06:00',NULL),(391,'185.224.128.43',NULL,'2024-04-19 03:31:23',NULL),(392,'34.140.108.54',NULL,'2024-04-19 04:08:31',NULL),(393,'202.53.164.114',NULL,'2024-04-19 05:02:24',NULL),(394,'103.199.32.112',NULL,'2024-04-19 06:33:26',NULL),(395,'115.75.244.44',NULL,'2024-04-19 06:48:03',NULL),(396,'113.23.34.107',NULL,'2024-04-19 06:50:15',NULL),(397,'21.227.189.69',NULL,'2024-04-19 06:52:59',NULL),(398,'115.74.119.213',NULL,'2024-04-19 06:56:49',NULL),(399,'185.242.226.10',NULL,'2024-04-19 07:13:59',NULL),(400,'82.118.23.8',NULL,'2024-04-19 08:23:58',NULL),(401,'185.224.128.43',NULL,'2024-04-19 08:37:41',NULL),(402,'206.168.34.39',NULL,'2024-04-19 08:44:48',NULL),(403,'206.168.34.39',NULL,'2024-04-19 08:44:53',NULL),(404,'167.99.141.125',NULL,'2024-04-19 09:14:02',NULL),(405,'115.77.55.181',NULL,'2024-04-19 09:28:57',NULL),(406,'195.181.168.172',NULL,'2024-04-19 10:58:07',NULL),(407,'45.156.129.48',NULL,'2024-04-19 11:01:38',NULL),(408,'59.182.34.200',NULL,'2024-04-19 11:11:20',NULL),(409,'171.10.191.58',NULL,'2024-04-19 12:18:04',NULL),(410,'171.10.191.58',NULL,'2024-04-19 12:18:04',NULL),(411,'171.10.191.58',NULL,'2024-04-19 12:18:05',NULL),(412,'171.10.191.58',NULL,'2024-04-19 12:18:05',NULL),(413,'171.10.191.58',NULL,'2024-04-19 12:18:06',NULL),(414,'171.10.191.58',NULL,'2024-04-19 12:18:06',NULL),(415,'171.10.191.58',NULL,'2024-04-19 12:18:07',NULL),(416,'171.10.191.58',NULL,'2024-04-19 12:18:07',NULL),(417,'171.10.191.58',NULL,'2024-04-19 12:18:09',NULL),(418,'171.10.191.58',NULL,'2024-04-19 12:18:09',NULL),(419,'171.10.191.58',NULL,'2024-04-19 12:18:09',NULL),(420,'171.10.191.58',NULL,'2024-04-19 12:18:10',NULL),(421,'171.10.191.58',NULL,'2024-04-19 12:18:10',NULL),(422,'171.10.191.58',NULL,'2024-04-19 12:18:11',NULL),(423,'171.10.191.58',NULL,'2024-04-19 12:18:11',NULL),(424,'171.10.191.58',NULL,'2024-04-19 12:18:11',NULL),(425,'171.10.191.58',NULL,'2024-04-19 12:18:12',NULL),(426,'171.10.191.58',NULL,'2024-04-19 12:18:12',NULL),(427,'171.10.191.58',NULL,'2024-04-19 12:18:12',NULL),(428,'171.10.191.58',NULL,'2024-04-19 12:18:13',NULL),(429,'171.10.191.58',NULL,'2024-04-19 12:18:14',NULL),(430,'171.10.191.58',NULL,'2024-04-19 12:18:14',NULL),(431,'171.10.191.58',NULL,'2024-04-19 12:18:14',NULL),(432,'167.94.138.122',NULL,'2024-04-19 12:31:12',NULL),(433,'167.94.138.122',NULL,'2024-04-19 12:31:16',NULL),(434,'185.224.128.43',NULL,'2024-04-19 12:59:31',NULL),(435,'185.180.140.5',NULL,'2024-04-19 16:21:10',NULL),(436,'167.94.146.48',NULL,'2024-04-19 17:15:32',NULL),(437,'167.94.146.48',NULL,'2024-04-19 17:15:48',NULL),(438,'35.203.210.178',NULL,'2024-04-19 17:37:24',NULL),(439,'185.224.128.43',NULL,'2024-04-19 17:57:52',NULL),(440,'52.167.144.204',NULL,'2024-04-19 18:02:32',NULL),(441,'117.233.216.169',NULL,'2024-04-19 20:18:20',NULL),(442,'64.62.197.169',NULL,'2024-04-19 20:35:53',NULL),(443,'80.94.92.60',NULL,'2024-04-19 20:39:29',NULL),(444,'114.254.36.123',NULL,'2024-04-19 22:08:28',NULL),(445,'185.224.128.43',NULL,'2024-04-19 23:38:45',NULL),(446,'80.94.92.60',NULL,'2024-04-20 00:27:30',NULL),(447,'167.99.1.250',NULL,'2024-04-20 00:29:48',NULL),(448,'66.240.192.82',NULL,'2024-04-20 00:36:54',NULL),(449,'58.48.227.24',NULL,'2024-04-20 00:47:51',NULL),(450,'27.98.228.143',NULL,'2024-04-20 00:48:51',NULL),(451,'103.199.32.59',NULL,'2024-04-20 00:48:53',NULL),(452,'167.94.138.123',NULL,'2024-04-20 00:49:09',NULL),(453,'167.94.138.123',NULL,'2024-04-20 00:49:13',NULL),(454,'170.150.211.85',NULL,'2024-04-20 01:01:39',NULL),(455,'40.77.167.33',NULL,'2024-04-20 01:58:57',NULL),(456,'80.94.92.60',NULL,'2024-04-20 04:14:04',NULL),(457,'171.10.191.58',NULL,'2024-04-20 04:34:04',NULL),(458,'171.10.191.58',NULL,'2024-04-20 04:34:05',NULL),(459,'171.10.191.58',NULL,'2024-04-20 04:34:06',NULL),(460,'171.10.191.58',NULL,'2024-04-20 04:34:07',NULL),(461,'171.10.191.58',NULL,'2024-04-20 04:34:07',NULL),(462,'171.10.191.58',NULL,'2024-04-20 04:34:08',NULL),(463,'171.10.191.58',NULL,'2024-04-20 04:34:08',NULL),(464,'171.10.191.58',NULL,'2024-04-20 04:34:09',NULL),(465,'171.10.191.58',NULL,'2024-04-20 04:34:09',NULL),(466,'171.10.191.58',NULL,'2024-04-20 04:34:10',NULL),(467,'171.10.191.58',NULL,'2024-04-20 04:34:10',NULL),(468,'171.10.191.58',NULL,'2024-04-20 04:34:10',NULL),(469,'171.10.191.58',NULL,'2024-04-20 04:34:11',NULL),(470,'171.10.191.58',NULL,'2024-04-20 04:34:11',NULL),(471,'171.10.191.58',NULL,'2024-04-20 04:34:12',NULL),(472,'171.10.191.58',NULL,'2024-04-20 04:34:12',NULL),(473,'171.10.191.58',NULL,'2024-04-20 04:34:12',NULL),(474,'171.10.191.58',NULL,'2024-04-20 04:34:13',NULL),(475,'171.10.191.58',NULL,'2024-04-20 04:34:14',NULL),(476,'171.10.191.58',NULL,'2024-04-20 04:34:15',NULL),(477,'171.10.191.58',NULL,'2024-04-20 04:34:15',NULL),(478,'171.10.191.58',NULL,'2024-04-20 04:34:16',NULL),(479,'171.10.191.58',NULL,'2024-04-20 04:34:16',NULL),(480,'185.224.128.43',NULL,'2024-04-20 04:36:33',NULL),(481,'179.43.191.18',NULL,'2024-04-20 05:55:47',NULL),(482,'115.75.244.44',NULL,'2024-04-20 06:26:54',NULL),(483,'173.252.79.117',NULL,'2024-04-20 06:27:05',NULL),(484,'27.67.95.147',NULL,'2024-04-20 06:37:34',NULL),(485,'183.56.201.169',NULL,'2024-04-20 07:17:50',NULL),(486,'176.41.219.230',NULL,'2024-04-20 07:19:53',NULL),(487,'34.78.249.41',NULL,'2024-04-20 08:18:13',NULL),(488,'115.75.244.44',NULL,'2024-04-20 08:37:29',NULL),(489,'103.203.57.1',NULL,'2024-04-20 09:09:05',NULL),(490,'185.224.128.43',NULL,'2024-04-20 09:11:58',NULL),(491,'45.83.64.60',NULL,'2024-04-20 10:11:34',NULL),(492,'45.83.64.243',NULL,'2024-04-20 10:11:40',NULL),(493,'27.184.52.251',NULL,'2024-04-20 11:20:11',NULL),(494,'35.203.210.51',NULL,'2024-04-20 12:04:13',NULL),(495,'154.212.141.174',NULL,'2024-04-20 12:51:56',NULL),(496,'154.212.141.174',NULL,'2024-04-20 12:51:57',NULL),(497,'185.224.128.43',NULL,'2024-04-20 14:16:31',NULL),(498,'80.82.77.33',NULL,'2024-04-20 15:58:54',NULL),(499,'188.166.23.81',NULL,'2024-04-20 16:10:33',NULL),(500,'113.124.176.213',NULL,'2024-04-20 16:17:00',NULL),(501,'185.242.226.10',NULL,'2024-04-20 16:24:36',NULL),(502,'171.10.191.58',NULL,'2024-04-20 17:39:19',NULL),(503,'171.10.191.58',NULL,'2024-04-20 17:39:19',NULL),(504,'171.10.191.58',NULL,'2024-04-20 17:39:20',NULL),(505,'171.10.191.58',NULL,'2024-04-20 17:39:20',NULL),(506,'171.10.191.58',NULL,'2024-04-20 17:39:21',NULL),(507,'171.10.191.58',NULL,'2024-04-20 17:39:21',NULL),(508,'171.10.191.58',NULL,'2024-04-20 17:39:22',NULL),(509,'171.10.191.58',NULL,'2024-04-20 17:39:22',NULL),(510,'171.10.191.58',NULL,'2024-04-20 17:39:22',NULL),(511,'171.10.191.58',NULL,'2024-04-20 17:39:23',NULL),(512,'171.10.191.58',NULL,'2024-04-20 17:39:24',NULL),(513,'171.10.191.58',NULL,'2024-04-20 17:39:24',NULL),(514,'171.10.191.58',NULL,'2024-04-20 17:39:25',NULL),(515,'171.10.191.58',NULL,'2024-04-20 17:39:26',NULL),(516,'171.10.191.58',NULL,'2024-04-20 17:39:26',NULL),(517,'171.10.191.58',NULL,'2024-04-20 17:39:27',NULL),(518,'171.10.191.58',NULL,'2024-04-20 17:39:27',NULL),(519,'171.10.191.58',NULL,'2024-04-20 17:39:28',NULL),(520,'171.10.191.58',NULL,'2024-04-20 17:39:28',NULL),(521,'171.10.191.58',NULL,'2024-04-20 17:39:29',NULL),(522,'171.10.191.58',NULL,'2024-04-20 17:39:29',NULL),(523,'171.10.191.58',NULL,'2024-04-20 17:39:30',NULL),(524,'171.10.191.58',NULL,'2024-04-20 17:39:30',NULL),(525,'35.203.210.58',NULL,'2024-04-20 19:04:30',NULL),(526,'171.10.191.58',NULL,'2024-04-20 19:22:57',NULL),(527,'171.10.191.58',NULL,'2024-04-20 19:22:57',NULL),(528,'171.10.191.58',NULL,'2024-04-20 19:22:58',NULL),(529,'171.10.191.58',NULL,'2024-04-20 19:22:58',NULL),(530,'171.10.191.58',NULL,'2024-04-20 19:22:58',NULL),(531,'171.10.191.58',NULL,'2024-04-20 19:22:59',NULL),(532,'171.10.191.58',NULL,'2024-04-20 19:23:00',NULL),(533,'171.10.191.58',NULL,'2024-04-20 19:23:00',NULL),(534,'171.10.191.58',NULL,'2024-04-20 19:23:00',NULL),(535,'171.10.191.58',NULL,'2024-04-20 19:23:01',NULL),(536,'171.10.191.58',NULL,'2024-04-20 19:23:02',NULL),(537,'171.10.191.58',NULL,'2024-04-20 19:23:02',NULL),(538,'171.10.191.58',NULL,'2024-04-20 19:23:03',NULL),(539,'171.10.191.58',NULL,'2024-04-20 19:23:04',NULL),(540,'171.10.191.58',NULL,'2024-04-20 19:23:05',NULL),(541,'171.10.191.58',NULL,'2024-04-20 19:23:05',NULL),(542,'171.10.191.58',NULL,'2024-04-20 19:23:06',NULL),(543,'171.10.191.58',NULL,'2024-04-20 19:23:06',NULL),(544,'171.10.191.58',NULL,'2024-04-20 19:23:07',NULL),(545,'171.10.191.58',NULL,'2024-04-20 19:23:07',NULL),(546,'171.10.191.58',NULL,'2024-04-20 19:23:08',NULL),(547,'171.10.191.58',NULL,'2024-04-20 19:23:08',NULL),(548,'171.10.191.58',NULL,'2024-04-20 19:23:09',NULL),(549,'91.92.244.58',NULL,'2024-04-20 19:37:37',NULL),(550,'171.10.191.58',NULL,'2024-04-20 20:44:21',NULL),(551,'171.10.191.58',NULL,'2024-04-20 20:44:21',NULL),(552,'171.10.191.58',NULL,'2024-04-20 20:44:22',NULL),(553,'171.10.191.58',NULL,'2024-04-20 20:44:22',NULL),(554,'171.10.191.58',NULL,'2024-04-20 20:44:23',NULL),(555,'171.10.191.58',NULL,'2024-04-20 20:44:23',NULL),(556,'171.10.191.58',NULL,'2024-04-20 20:44:24',NULL),(557,'171.10.191.58',NULL,'2024-04-20 20:44:24',NULL),(558,'171.10.191.58',NULL,'2024-04-20 20:44:25',NULL),(559,'171.10.191.58',NULL,'2024-04-20 20:44:25',NULL),(560,'171.10.191.58',NULL,'2024-04-20 20:44:26',NULL),(561,'171.10.191.58',NULL,'2024-04-20 20:44:26',NULL),(562,'171.10.191.58',NULL,'2024-04-20 20:44:26',NULL),(563,'171.10.191.58',NULL,'2024-04-20 20:44:27',NULL),(564,'171.10.191.58',NULL,'2024-04-20 20:44:27',NULL),(565,'171.10.191.58',NULL,'2024-04-20 20:44:30',NULL),(566,'171.10.191.58',NULL,'2024-04-20 20:44:31',NULL),(567,'171.10.191.58',NULL,'2024-04-20 20:44:32',NULL),(568,'171.10.191.58',NULL,'2024-04-20 20:44:33',NULL),(569,'171.10.191.58',NULL,'2024-04-20 20:44:33',NULL),(570,'171.10.191.58',NULL,'2024-04-20 20:44:34',NULL),(571,'171.10.191.58',NULL,'2024-04-20 20:44:35',NULL),(572,'89.189.184.225',NULL,'2024-04-20 20:56:59',NULL),(573,'212.102.33.74',NULL,'2024-04-20 21:18:02',NULL),(574,'171.10.191.58',NULL,'2024-04-20 21:49:34',NULL),(575,'171.10.191.58',NULL,'2024-04-20 21:49:34',NULL),(576,'171.10.191.58',NULL,'2024-04-20 21:49:35',NULL),(577,'171.10.191.58',NULL,'2024-04-20 21:49:35',NULL),(578,'171.10.191.58',NULL,'2024-04-20 21:49:35',NULL),(579,'171.10.191.58',NULL,'2024-04-20 21:49:36',NULL),(580,'171.10.191.58',NULL,'2024-04-20 21:49:36',NULL),(581,'171.10.191.58',NULL,'2024-04-20 21:49:36',NULL),(582,'171.10.191.58',NULL,'2024-04-20 21:49:37',NULL),(583,'171.10.191.58',NULL,'2024-04-20 21:49:38',NULL),(584,'171.10.191.58',NULL,'2024-04-20 21:49:41',NULL),(585,'171.10.191.58',NULL,'2024-04-20 21:49:42',NULL),(586,'171.10.191.58',NULL,'2024-04-20 21:49:42',NULL),(587,'171.10.191.58',NULL,'2024-04-20 21:49:43',NULL),(588,'171.10.191.58',NULL,'2024-04-20 21:49:43',NULL),(589,'171.10.191.58',NULL,'2024-04-20 21:49:43',NULL),(590,'171.10.191.58',NULL,'2024-04-20 21:49:44',NULL),(591,'171.10.191.58',NULL,'2024-04-20 21:49:44',NULL),(592,'171.10.191.58',NULL,'2024-04-20 21:49:45',NULL),(593,'171.10.191.58',NULL,'2024-04-20 21:49:45',NULL),(594,'171.10.191.58',NULL,'2024-04-20 21:49:46',NULL),(595,'171.10.191.58',NULL,'2024-04-20 21:49:46',NULL),(596,'64.62.156.54',NULL,'2024-04-20 21:52:19',NULL),(597,'178.62.243.242',NULL,'2024-04-20 22:56:26',NULL),(598,'42.114.89.3',NULL,'2024-04-20 23:05:06',NULL),(599,'115.202.37.197',NULL,'2024-04-20 23:55:37',NULL),(600,'185.224.128.43',NULL,'2024-04-21 00:48:56',NULL),(601,'206.168.34.33',NULL,'2024-04-21 01:22:40',NULL),(602,'112.32.18.168',NULL,'2024-04-21 01:23:51',NULL),(603,'80.94.92.60',NULL,'2024-04-21 01:36:44',NULL),(604,'71.6.146.186',NULL,'2024-04-21 03:20:48',NULL),(605,'171.247.17.141',NULL,'2024-04-21 03:22:18',NULL),(606,'173.252.79.6',NULL,'2024-04-21 03:22:30',NULL),(607,'100.93.200.93',NULL,'2024-04-21 03:22:46',NULL),(608,'122.233.196.190',NULL,'2024-04-21 04:13:03',NULL),(609,'170.64.162.110',NULL,'2024-04-21 04:46:12',NULL),(610,'34.140.108.54',NULL,'2024-04-21 05:29:38',NULL),(611,'185.224.128.43',NULL,'2024-04-21 06:18:41',NULL),(612,'168.232.12.84',NULL,'2024-04-21 06:26:06',NULL),(613,'46.174.191.31',NULL,'2024-04-21 07:28:57',NULL),(614,'87.250.224.232',NULL,'2024-04-21 07:33:06',NULL),(615,'80.94.92.60',NULL,'2024-04-21 07:33:15',NULL),(616,'95.108.213.107',NULL,'2024-04-21 07:48:59',NULL),(617,'79.121.115.172',NULL,'2024-04-21 07:55:50',NULL),(618,'185.242.226.10',NULL,'2024-04-21 08:33:42',NULL),(619,'127.0.0.1',NULL,'2024-04-21 10:27:02',NULL),(620,'171.250.250.51',NULL,'2024-04-21 10:33:52',NULL),(621,'162.142.125.224',NULL,'2024-04-21 10:37:53',NULL),(622,'::1',NULL,'2024-04-21 10:39:03',NULL),(623,'91.92.244.58',NULL,'2024-04-21 11:30:11',NULL),(624,'72.173.212.35',NULL,'2024-04-21 12:18:26',NULL),(625,'212.102.33.74',NULL,'2024-04-21 12:26:39',NULL),(626,'185.224.128.43',NULL,'2024-04-21 15:23:05',NULL),(627,'35.203.211.150',NULL,'2024-04-21 17:03:30',NULL),(628,'185.242.226.10',NULL,'2024-04-21 17:23:14',NULL),(629,'141.98.11.128',NULL,'2024-04-21 18:11:16',NULL),(630,'112.32.18.168',NULL,'2024-04-21 18:46:51',NULL),(631,'172.16.3.1',NULL,'2024-04-21 18:56:01',NULL),(632,'184.105.247.195',NULL,'2024-04-21 20:11:23',NULL),(633,'103.89.60.60',NULL,'2024-04-21 20:12:35',NULL),(634,'185.224.128.43',NULL,'2024-04-21 21:05:08',NULL),(635,'113.178.184.186',NULL,'2024-04-21 21:06:21',NULL),(636,'172.16.3.1',NULL,'2024-04-21 22:32:02',NULL),(637,'185.140.160.198',NULL,'2024-04-21 23:10:49',NULL),(638,'188.166.44.122',NULL,'2024-04-21 23:51:50',NULL),(639,'141.98.11.128',NULL,'2024-04-22 00:56:55',NULL),(640,'121.191.8.54',NULL,'2024-04-22 01:41:21',NULL),(641,'185.224.128.43',NULL,'2024-04-22 01:55:06',NULL),(642,'172.16.3.1',NULL,'2024-04-22 01:56:21',NULL),(643,'173.252.79.119',NULL,'2024-04-22 01:56:33',NULL),(644,'173.252.111.9',NULL,'2024-04-22 01:56:38',NULL),(645,'116.96.176.133',NULL,'2024-04-22 01:56:40',NULL),(646,'110.191.217.51',NULL,'2024-04-22 01:57:58',NULL),(647,'110.191.217.51',NULL,'2024-04-22 01:57:59',NULL),(648,'35.203.210.191',NULL,'2024-04-22 02:07:27',NULL),(649,'190.0.13.195',NULL,'2024-04-22 02:14:46',NULL),(650,'::1',NULL,'2024-04-22 02:18:46',NULL),(651,'141.98.11.128',NULL,'2024-04-22 03:01:29',NULL),(652,'84.239.49.8',NULL,'2024-04-22 03:42:01',NULL),(653,'66.249.77.73',NULL,'2024-04-22 03:42:34',NULL),(654,'122.233.196.190',NULL,'2024-04-22 03:43:45',NULL),(655,'45.156.129.57',NULL,'2024-04-22 03:45:25',NULL),(656,'141.98.11.128',NULL,'2024-04-22 03:49:32',NULL),(657,'212.102.33.67',NULL,'2024-04-22 04:34:53',NULL),(658,'141.98.11.128',NULL,'2024-04-22 04:39:19',NULL),(659,'171.247.17.145',NULL,'2024-04-22 04:45:24',NULL),(660,'71.6.232.28',NULL,'2024-04-22 04:49:14',NULL),(661,'141.98.11.128',NULL,'2024-04-22 04:53:15',NULL),(662,'::1',NULL,'2024-04-22 05:08:09',NULL),(663,'80.94.92.60',NULL,'2024-04-22 06:12:50',NULL),(664,'141.98.11.128',NULL,'2024-04-22 06:23:18',NULL),(665,'34.78.68.58',NULL,'2024-04-22 06:32:11',NULL),(666,'141.98.11.128',NULL,'2024-04-22 06:46:57',NULL),(667,'40.77.167.255',NULL,'2024-04-22 07:09:20',NULL),(668,'185.224.128.43',NULL,'2024-04-22 07:10:44',NULL),(669,'141.98.11.128',NULL,'2024-04-22 07:40:55',NULL),(670,'80.94.92.60',NULL,'2024-04-22 08:13:22',NULL),(671,'93.89.162.206',NULL,'2024-04-22 08:13:33',NULL),(672,'141.98.11.128',NULL,'2024-04-22 08:17:01',NULL);
/*!40000 ALTER TABLE `guest_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `help_topics`
--

DROP TABLE IF EXISTS `help_topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `help_topics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ranking` int NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `help_topics`
--

LOCK TABLES `help_topics` WRITE;
/*!40000 ALTER TABLE `help_topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `help_topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
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
-- Table structure for table `loyalty_point_transactions`
--

DROP TABLE IF EXISTS `loyalty_point_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loyalty_point_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `transaction_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` decimal(24,3) NOT NULL DEFAULT '0.000',
  `debit` decimal(24,3) NOT NULL DEFAULT '0.000',
  `balance` decimal(24,3) NOT NULL DEFAULT '0.000',
  `reference` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loyalty_point_transactions`
--

LOCK TABLES `loyalty_point_transactions` WRITE;
/*!40000 ALTER TABLE `loyalty_point_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `loyalty_point_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_09_08_105159_create_admins_table',1),(5,'2020_09_08_111837_create_admin_roles_table',1),(6,'2020_09_16_142451_create_categories_table',2),(7,'2020_09_16_181753_create_categories_table',3),(8,'2020_09_17_134238_create_brands_table',4),(9,'2020_09_17_203054_create_attributes_table',5),(10,'2020_09_19_112509_create_coupons_table',6),(11,'2020_09_19_161802_create_curriencies_table',7),(12,'2020_09_20_114509_create_sellers_table',8),(13,'2020_09_23_113454_create_shops_table',9),(14,'2020_09_23_115615_create_shops_table',10),(15,'2020_09_23_153822_create_shops_table',11),(16,'2020_09_21_122817_create_products_table',12),(17,'2020_09_22_140800_create_colors_table',12),(18,'2020_09_28_175020_create_products_table',13),(19,'2020_09_28_180311_create_products_table',14),(20,'2020_10_04_105041_create_search_functions_table',15),(21,'2020_10_05_150730_create_customers_table',15),(22,'2020_10_08_133548_create_wishlists_table',16),(23,'2016_06_01_000001_create_oauth_auth_codes_table',17),(24,'2016_06_01_000002_create_oauth_access_tokens_table',17),(25,'2016_06_01_000003_create_oauth_refresh_tokens_table',17),(26,'2016_06_01_000004_create_oauth_clients_table',17),(27,'2016_06_01_000005_create_oauth_personal_access_clients_table',17),(28,'2020_10_06_133710_create_product_stocks_table',17),(29,'2020_10_06_134636_create_flash_deals_table',17),(30,'2020_10_06_134719_create_flash_deal_products_table',17),(31,'2020_10_08_115439_create_orders_table',17),(32,'2020_10_08_115453_create_order_details_table',17),(33,'2020_10_08_121135_create_shipping_addresses_table',17),(34,'2020_10_10_171722_create_business_settings_table',17),(35,'2020_09_19_161802_create_currencies_table',18),(36,'2020_10_12_152350_create_reviews_table',18),(37,'2020_10_12_161834_create_reviews_table',19),(38,'2020_10_12_180510_create_support_tickets_table',20),(39,'2020_10_14_140130_create_transactions_table',21),(40,'2020_10_14_143553_create_customer_wallets_table',21),(41,'2020_10_14_143607_create_customer_wallet_histories_table',21),(42,'2020_10_22_142212_create_support_ticket_convs_table',21),(43,'2020_10_24_234813_create_banners_table',22),(44,'2020_10_27_111557_create_shipping_methods_table',23),(45,'2020_10_27_114154_add_url_to_banners_table',24),(46,'2020_10_28_170308_add_shipping_id_to_order_details',25),(47,'2020_11_02_140528_add_discount_to_order_table',26),(48,'2020_11_03_162723_add_column_to_order_details',27),(49,'2020_11_08_202351_add_url_to_banners_table',28),(50,'2020_11_10_112713_create_help_topic',29),(51,'2020_11_10_141513_create_contacts_table',29),(52,'2020_11_15_180036_add_address_column_user_table',30),(53,'2020_11_18_170209_add_status_column_to_product_table',31),(54,'2020_11_19_115453_add_featured_status_product',32),(55,'2020_11_21_133302_create_deal_of_the_days_table',33),(56,'2020_11_20_172332_add_product_id_to_products',34),(57,'2020_11_27_234439_add__state_to_shipping_addresses',34),(58,'2020_11_28_091929_create_chattings_table',35),(59,'2020_12_02_011815_add_bank_info_to_sellers',36),(60,'2020_12_08_193234_create_social_medias_table',37),(61,'2020_12_13_122649_shop_id_to_chattings',37),(62,'2020_12_14_145116_create_seller_wallet_histories_table',38),(63,'2020_12_14_145127_create_seller_wallets_table',38),(64,'2020_12_15_174804_create_admin_wallets_table',39),(65,'2020_12_15_174821_create_admin_wallet_histories_table',39),(66,'2020_12_15_214312_create_feature_deals_table',40),(67,'2020_12_17_205712_create_withdraw_requests_table',41),(68,'2021_02_22_161510_create_notifications_table',42),(69,'2021_02_24_154706_add_deal_type_to_flash_deals',43),(70,'2021_03_03_204349_add_cm_firebase_token_to_users',44),(71,'2021_04_17_134848_add_column_to_order_details_stock',45),(72,'2021_05_12_155401_add_auth_token_seller',46),(73,'2021_06_03_104531_ex_rate_update',47),(74,'2021_06_03_222413_amount_withdraw_req',48),(75,'2021_06_04_154501_seller_wallet_withdraw_bal',49),(76,'2021_06_04_195853_product_dis_tax',50),(77,'2021_05_27_103505_create_product_translations_table',51),(78,'2021_06_17_054551_create_soft_credentials_table',51),(79,'2021_06_29_212549_add_active_col_user_table',52),(80,'2021_06_30_212619_add_col_to_contact',53),(81,'2021_07_01_160828_add_col_daily_needs_products',54),(82,'2021_07_04_182331_add_col_seller_sales_commission',55),(83,'2021_08_07_190655_add_seo_columns_to_products',56),(84,'2021_08_07_205913_add_col_to_category_table',56),(85,'2021_08_07_210808_add_col_to_shops_table',56),(86,'2021_08_14_205216_change_product_price_col_type',56),(87,'2021_08_16_201505_change_order_price_col',56),(88,'2021_08_16_201552_change_order_details_price_col',56),(89,'2019_09_29_154000_create_payment_cards_table',57),(90,'2021_08_17_213934_change_col_type_seller_earning_history',57),(91,'2021_08_17_214109_change_col_type_admin_earning_history',57),(92,'2021_08_17_214232_change_col_type_admin_wallet',57),(93,'2021_08_17_214405_change_col_type_seller_wallet',57),(94,'2021_08_22_184834_add_publish_to_products_table',57),(95,'2021_09_08_211832_add_social_column_to_users_table',57),(96,'2021_09_13_165535_add_col_to_user',57),(97,'2021_09_19_061647_add_limit_to_coupons_table',57),(98,'2021_09_20_020716_add_coupon_code_to_orders_table',57),(99,'2021_09_23_003059_add_gst_to_sellers_table',57),(100,'2021_09_28_025411_create_order_transactions_table',57),(101,'2021_10_02_185124_create_carts_table',57),(102,'2021_10_02_190207_create_cart_shippings_table',57),(103,'2021_10_03_194334_add_col_order_table',57),(104,'2021_10_03_200536_add_shipping_cost',57),(105,'2021_10_04_153201_add_col_to_order_table',57),(106,'2021_10_07_172701_add_col_cart_shop_info',57),(107,'2021_10_07_184442_create_phone_or_email_verifications_table',57),(108,'2021_10_07_185416_add_user_table_email_verified',57),(109,'2021_10_11_192739_add_transaction_amount_table',57),(110,'2021_10_11_200850_add_order_verification_code',57),(111,'2021_10_12_083241_add_col_to_order_transaction',57),(112,'2021_10_12_084440_add_seller_id_to_order',57),(113,'2021_10_12_102853_change_col_type',57),(114,'2021_10_12_110434_add_col_to_admin_wallet',57),(115,'2021_10_12_110829_add_col_to_seller_wallet',57),(116,'2021_10_13_091801_add_col_to_admin_wallets',57),(117,'2021_10_13_092000_add_col_to_seller_wallets_tax',57),(118,'2021_10_13_165947_rename_and_remove_col_seller_wallet',57),(119,'2021_10_13_170258_rename_and_remove_col_admin_wallet',57),(120,'2021_10_14_061603_column_update_order_transaction',57),(121,'2021_10_15_103339_remove_col_from_seller_wallet',57),(122,'2021_10_15_104419_add_id_col_order_tran',57),(123,'2021_10_15_213454_update_string_limit',57),(124,'2021_10_16_234037_change_col_type_translation',57),(125,'2021_10_16_234329_change_col_type_translation_1',57),(126,'2021_10_27_091250_add_shipping_address_in_order',58),(127,'2021_01_24_205114_create_paytabs_invoices_table',59),(128,'2021_11_20_043814_change_pass_reset_email_col',59),(129,'2021_11_25_043109_create_delivery_men_table',60),(130,'2021_11_25_062242_add_auth_token_delivery_man',60),(131,'2021_11_27_043405_add_deliveryman_in_order_table',60),(132,'2021_11_27_051432_create_delivery_histories_table',60),(133,'2021_11_27_051512_add_fcm_col_for_delivery_man',60),(134,'2021_12_15_123216_add_columns_to_banner',60),(135,'2022_01_04_100543_add_order_note_to_orders_table',60),(136,'2022_01_10_034952_add_lat_long_to_shipping_addresses_table',60),(137,'2022_01_10_045517_create_billing_addresses_table',60),(138,'2022_01_11_040755_add_is_billing_to_shipping_addresses_table',60),(139,'2022_01_11_053404_add_billing_to_orders_table',60),(140,'2022_01_11_234310_add_firebase_toke_to_sellers_table',60),(141,'2022_01_16_121801_change_colu_type',60),(142,'2022_01_22_101601_change_cart_col_type',61),(143,'2022_01_23_031359_add_column_to_orders_table',61),(144,'2022_01_28_235054_add_status_to_admins_table',61),(145,'2022_02_01_214654_add_pos_status_to_sellers_table',61),(146,'2019_12_14_000001_create_personal_access_tokens_table',62),(147,'2022_02_11_225355_add_checked_to_orders_table',62),(148,'2022_02_14_114359_create_refund_requests_table',62),(149,'2022_02_14_115757_add_refund_request_to_order_details_table',62),(150,'2022_02_15_092604_add_order_details_id_to_transactions_table',62),(151,'2022_02_15_121410_create_refund_transactions_table',62),(152,'2022_02_24_091236_add_multiple_column_to_refund_requests_table',62),(153,'2022_02_24_103827_create_refund_statuses_table',62),(154,'2022_03_01_121420_add_refund_id_to_refund_transactions_table',62),(155,'2022_03_10_091943_add_priority_to_categories_table',63),(156,'2022_03_13_111914_create_shipping_types_table',63),(157,'2022_03_13_121514_create_category_shipping_costs_table',63),(158,'2022_03_14_074413_add_four_column_to_products_table',63),(159,'2022_03_15_105838_add_shipping_to_carts_table',63),(160,'2022_03_16_070327_add_shipping_type_to_orders_table',63),(161,'2022_03_17_070200_add_delivery_info_to_orders_table',63),(162,'2022_03_18_143339_add_shipping_type_to_carts_table',63),(163,'2022_04_06_020313_create_subscriptions_table',64),(164,'2022_04_12_233704_change_column_to_products_table',64),(165,'2022_04_19_095926_create_jobs_table',64),(166,'2022_05_12_104247_create_wallet_transactions_table',65),(167,'2022_05_12_104511_add_two_column_to_users_table',65),(168,'2022_05_14_063309_create_loyalty_point_transactions_table',65),(169,'2022_05_26_044016_add_user_type_to_password_resets_table',65),(170,'2022_04_15_235820_add_provider',66),(171,'2022_07_21_101659_add_code_to_products_table',66),(172,'2022_07_26_103744_add_notification_count_to_notifications_table',66),(173,'2022_07_31_031541_add_minimum_order_qty_to_products_table',66),(174,'2022_08_11_172839_add_product_type_and_digital_product_type_and_digital_file_ready_to_products',67),(175,'2022_08_11_173941_add_product_type_and_digital_product_type_and_digital_file_to_order_details',67),(176,'2022_08_20_094225_add_product_type_and_digital_product_type_and_digital_file_ready_to_carts_table',67),(177,'2022_10_04_160234_add_banking_columns_to_delivery_men_table',68),(178,'2022_10_04_161339_create_deliveryman_wallets_table',68),(179,'2022_10_04_184506_add_deliverymanid_column_to_withdraw_requests_table',68),(180,'2022_10_11_103011_add_deliverymans_columns_to_chattings_table',68),(181,'2022_10_11_144902_add_deliverman_id_cloumn_to_reviews_table',68),(182,'2022_10_17_114744_create_order_status_histories_table',68),(183,'2022_10_17_120840_create_order_expected_delivery_histories_table',68),(184,'2022_10_18_084245_add_deliveryman_charge_and_expected_delivery_date',68),(185,'2022_10_18_130938_create_delivery_zip_codes_table',68),(186,'2022_10_18_130956_create_delivery_country_codes_table',68),(187,'2022_10_20_164712_create_delivery_man_transactions_table',68),(188,'2022_10_27_145604_create_emergency_contacts_table',68),(189,'2022_10_29_182930_add_is_pause_cause_to_orders_table',68),(190,'2022_10_31_150604_add_address_phone_country_code_column_to_delivery_men_table',68),(191,'2022_11_05_185726_add_order_id_to_reviews_table',68),(192,'2022_11_07_190749_create_deliveryman_notifications_table',68),(193,'2022_11_08_132745_change_transaction_note_type_to_withdraw_requests_table',68),(194,'2022_11_10_193747_chenge_order_amount_seller_amount_admin_commission_delivery_charge_tax_toorder_transactions_table',68),(195,'2022_12_17_035723_few_field_add_to_coupons_table',69),(196,'2022_12_26_231606_add_coupon_discount_bearer_and_admin_commission_to_orders',69),(197,'2023_01_04_003034_alter_billing_addresses_change_zip',69),(198,'2023_01_05_121600_change_id_to_transactions_table',69),(199,'2023_02_02_113330_create_product_tag_table',70),(200,'2023_02_02_114518_create_tags_table',70),(201,'2023_02_02_152248_add_tax_model_to_products_table',70),(202,'2023_02_02_152718_add_tax_model_to_order_details_table',70),(203,'2023_02_02_171034_add_tax_type_to_carts',70),(204,'2023_02_06_124447_add_color_image_column_to_products_table',70),(205,'2023_02_07_120136_create_withdrawal_methods_table',70),(206,'2023_02_07_175939_add_withdrawal_method_id_and_withdrawal_method_fields_to_withdraw_requests_table',70),(207,'2023_02_08_143314_add_vacation_start_and_vacation_end_and_vacation_not_column_to_shops_table',70),(208,'2023_02_09_104656_add_payment_by_and_payment_not_to_orders_table',70),(209,'2023_03_27_150723_add_expires_at_to_phone_or_email_verifications',71),(210,'2023_04_17_095721_create_shop_followers_table',71),(211,'2023_04_17_111249_add_bottom_banner_to_shops_table',71),(212,'2023_04_20_125423_create_product_compares_table',71),(213,'2023_04_30_165642_add_category_sub_category_and_sub_sub_category_add_in_product_table',71),(214,'2023_05_16_131006_add_expires_at_to_password_resets',71),(215,'2023_05_17_044243_add_visit_count_to_tags_table',71),(216,'2023_05_18_000403_add_title_and_subtitle_and_background_color_and_button_text_to_banners_table',71),(217,'2023_05_21_111300_add_login_hit_count_and_is_temp_blocked_and_temp_block_time_to_users_table',71),(218,'2023_05_21_111600_add_login_hit_count_and_is_temp_blocked_and_temp_block_time_to_phone_or_email_verifications_table',71),(219,'2023_05_21_112215_add_login_hit_count_and_is_temp_blocked_and_temp_block_time_to_password_resets_table',71),(220,'2023_06_04_210726_attachment_lenght_change_to_reviews_table',71),(221,'2023_06_05_115153_add_referral_code_and_referred_by_to_users_table',72),(222,'2023_06_21_002658_add_offer_banner_to_shops_table',72),(223,'2023_07_08_210747_create_most_demandeds_table',72),(224,'2023_07_31_111419_add_minimum_order_amount_to_sellers_table',72),(225,'2023_08_03_105256_create_offline_payment_methods_table',72),(226,'2023_08_07_131013_add_is_guest_column_to_carts_table',72),(227,'2023_08_07_170601_create_offline_payments_table',72),(228,'2023_08_12_102355_create_add_fund_bonus_categories_table',72),(229,'2023_08_12_215346_create_guest_users_table',72),(230,'2023_08_12_215659_add_is_guest_column_to_orders_table',72),(231,'2023_08_12_215933_add_is_guest_column_to_shipping_addresses_table',72),(232,'2023_08_15_000957_add_email_column_toshipping_address_table',72),(233,'2023_08_17_222330_add_identify_related_columns_to_admins_table',72),(234,'2023_08_20_230624_add_sent_by_and_send_to_in_notifications_table',72),(235,'2023_08_20_230911_create_notification_seens_table',72),(236,'2023_08_21_042331_add_theme_to_banners_table',72),(237,'2023_08_24_150009_add_free_delivery_over_amount_and_status_to_seller_table',72),(238,'2023_08_26_161214_add_is_shipping_free_to_orders_table',72),(239,'2023_08_26_173523_add_payment_method_column_to_wallet_transactions_table',72),(240,'2023_08_26_204653_add_verification_status_column_to_orders_table',72),(273,'2023_08_26_225113_create_order_delivery_verifications_table',77),(274,'2023_09_03_212200_add_free_delivery_responsibility_column_to_orders_table',77),(275,'2023_09_23_153314_add_shipping_responsibility_column_to_orders_table',77),(276,'2023_09_25_152733_create_digital_product_otp_verifications_table',77),(277,'2023_09_27_191638_add_attachment_column_to_support_ticket_convs_table',77),(278,'2023_10_01_205117_add_attachment_column_to_chattings_table',77),(279,'2023_10_07_182714_create_notification_messages_table',77),(280,'2023_10_21_113354_add_app_language_column_to_users_table',77),(281,'2023_10_21_123433_add_app_language_column_to_sellers_table',77),(282,'2023_10_21_124657_add_app_language_column_to_delivery_men_table',77),(283,'2023_10_22_130225_add_attachment_to_support_tickets_table',77),(284,'2023_10_25_113233_make_message_nullable_in_chattings_table',77),(285,'2023_10_30_152005_make_attachment_column_type_change_to_reviews_table',77),(288,'2024_04_11_110700_create_post_types_table',78),(296,'2024_04_11_110639_create_post_tags_table',80),(300,'2024_04_11_110552_create_posts_table',81);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `most_demandeds`
--

DROP TABLE IF EXISTS `most_demandeds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `most_demandeds` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `most_demandeds`
--

LOCK TABLES `most_demandeds` WRITE;
/*!40000 ALTER TABLE `most_demandeds` DISABLE KEYS */;
/*!40000 ALTER TABLE `most_demandeds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification_messages`
--

DROP TABLE IF EXISTS `notification_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification_messages`
--

LOCK TABLES `notification_messages` WRITE;
/*!40000 ALTER TABLE `notification_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification_seens`
--

DROP TABLE IF EXISTS `notification_seens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notification_seens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `notification_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification_seens`
--

LOCK TABLES `notification_seens` WRITE;
/*!40000 ALTER TABLE `notification_seens` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification_seens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sent_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'system',
  `sent_to` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification_count` int NOT NULL DEFAULT '0',
  `image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint DEFAULT NULL,
  `client_id` int unsigned NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('6840b7d4ed685bf2e0dc593affa0bd3b968065f47cc226d39ab09f1422b5a1d9666601f3f60a79c1',98,1,'LaravelAuthApp','[]',1,'2021-07-05 09:25:41','2021-07-05 09:25:41','2022-07-05 15:25:41'),('c42cdd5ae652b8b2cbac4f2f4b496e889e1a803b08672954c8bbe06722b54160e71dce3e02331544',98,1,'LaravelAuthApp','[]',1,'2021-07-05 09:24:36','2021-07-05 09:24:36','2022-07-05 15:24:36');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint NOT NULL,
  `client_id` int unsigned NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_clients` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'6amtech','GEUx5tqkviM6AAQcz4oi1dcm1KtRdJPgw41lj0eI','http://localhost',1,0,0,'2020-10-21 18:27:22','2020-10-21 18:27:22',NULL);
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2020-10-21 18:27:23','2020-10-21 18:27:23');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offline_payment_methods`
--

DROP TABLE IF EXISTS `offline_payment_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offline_payment_methods` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `method_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_fields` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_informations` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offline_payment_methods`
--

LOCK TABLES `offline_payment_methods` WRITE;
/*!40000 ALTER TABLE `offline_payment_methods` DISABLE KEYS */;
/*!40000 ALTER TABLE `offline_payment_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offline_payments`
--

DROP TABLE IF EXISTS `offline_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offline_payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `payment_info` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offline_payments`
--

LOCK TABLES `offline_payments` WRITE;
/*!40000 ALTER TABLE `offline_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `offline_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_delivery_verifications`
--

DROP TABLE IF EXISTS `order_delivery_verifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_delivery_verifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_delivery_verifications`
--

LOCK TABLES `order_delivery_verifications` WRITE;
/*!40000 ALTER TABLE `order_delivery_verifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_delivery_verifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint DEFAULT NULL,
  `product_id` bigint DEFAULT NULL,
  `seller_id` bigint DEFAULT NULL,
  `digital_file_after_sell` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `qty` int NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `tax` double NOT NULL DEFAULT '0',
  `discount` double NOT NULL DEFAULT '0',
  `tax_model` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'exclude',
  `delivery_status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_method_id` bigint DEFAULT NULL,
  `variant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_stock_decreased` tinyint(1) NOT NULL DEFAULT '1',
  `refund_request` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (1,100001,2,2,NULL,'{\"id\":2,\"added_by\":\"seller\",\"user_id\":2,\"name\":\"M\\u00cdT S\\u1ea4Y GI\\u00d2N HG\",\"slug\":\"mit-say-gion-hg-PauL7B\",\"product_type\":\"physical\",\"category_ids\":\"[{\\\"id\\\":\\\"3\\\",\\\"position\\\":1}]\",\"category_id\":\"3\",\"sub_category_id\":null,\"sub_sub_category_id\":null,\"brand_id\":1,\"unit\":\"kg\",\"min_qty\":1,\"refundable\":1,\"digital_product_type\":null,\"digital_file_ready\":null,\"images\":\"[\\\"2024-04-11-661756161b43b.webp\\\"]\",\"color_image\":\"[]\",\"thumbnail\":\"2024-04-11-66175616417c1.webp\",\"featured\":1,\"flash_deal\":null,\"video_provider\":\"youtube\",\"video_url\":null,\"colors\":\"[]\",\"variant_product\":0,\"attributes\":\"null\",\"choice_options\":\"[]\",\"variation\":\"[]\",\"published\":0,\"unit_price\":30000,\"purchase_price\":30000,\"tax\":0,\"tax_type\":\"percent\",\"tax_model\":\"exclude\",\"discount\":0,\"discount_type\":\"flat\",\"current_stock\":1990,\"minimum_order_qty\":1,\"details\":\"<p>Th&ocirc;ng s\\u1ed1 v\\u1eadt l&yacute;<\\/p>\\r\\n\\r\\n<p>&ndash; \\u0110\\u1ed9 \\u1ea9m &lt;2%<\\/p>\\r\\n\\r\\n<p>&ndash; H&igrave;nh d&aacute;ng\\/ k&iacute;ch th\\u01b0\\u1edbc: tr&ograve;n\\/b&aacute;n nguy\\u1ec7t \\u0111\\u01b0\\u1eddng k&iacute;nh thay \\u0111\\u1ed5i t\\u1eeb 2.0 &ndash; 8 mm<\\/p>\\r\\n\\r\\n<p>&ndash; D&agrave;y: 4 mm Quy c&aacute;ch bao b&igrave; v&agrave; b\\u1ea3o qu\\u1ea3n:<\\/p>\\r\\n\\r\\n<p>&ndash; Bao nh&ocirc;m 50 gr<\\/p>\\r\\n\\r\\n<p>&ndash; Th&ugrave;ng 50 g&oacute;i<\\/p>\\r\\n\\r\\n<p>&ndash; B\\u1ea3o qu\\u1ea3n nhi\\u1ec7t \\u0111\\u1ed9 th\\u01b0\\u1eddng, h\\u1ea1n ch\\u1ebf &aacute;nh s&aacute;ng chi\\u1ebfu tr\\u1ef1c ti\\u1ebfp<\\/p>\\r\\n\\r\\n<p>&ndash; Th\\u1eddi gian s\\u1eed d\\u1ee5ng: 12 th&aacute;ng t&iacute;nh t\\u1eeb ng&agrave;y s\\u1ea3n xu\\u1ea5t<\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li>Li&ecirc;n h\\u1ec7: 0784923067<\\/li>\\r\\n\\t<li>Gi&aacute;:30.000<\\/li>\\r\\n<\\/ul>\",\"free_shipping\":0,\"attachment\":null,\"created_at\":\"2024-04-11T03:16:38.000000Z\",\"updated_at\":\"2024-04-11T03:20:49.000000Z\",\"status\":1,\"featured_status\":1,\"meta_title\":null,\"meta_description\":null,\"meta_image\":\"def.webp\",\"request_status\":1,\"denied_note\":null,\"shipping_cost\":0,\"multiply_qty\":0,\"temp_shipping_cost\":null,\"is_shipping_cost_updated\":null,\"code\":\"123578\",\"reviews_count\":0,\"translations\":[],\"reviews\":[]}',1,30000,0,0,'exclude','delivered','unpaid','2024-04-10 20:33:28','2024-04-10 20:33:50',NULL,'','[]','discount_on_product',1,0),(2,100002,4,3,NULL,'{\"id\":4,\"added_by\":\"seller\",\"user_id\":3,\"name\":\"B\\u1ed8T CHANH GIA V\\u1eca CHAVI\",\"slug\":\"bot-chanh-gia-vi-chavi-l2Klix\",\"product_type\":\"physical\",\"category_ids\":\"[{\\\"id\\\":\\\"5\\\",\\\"position\\\":1}]\",\"category_id\":\"5\",\"sub_category_id\":null,\"sub_sub_category_id\":null,\"brand_id\":2,\"unit\":\"kg\",\"min_qty\":1,\"refundable\":1,\"digital_product_type\":null,\"digital_file_ready\":null,\"images\":\"[\\\"2024-04-11-661757df9920c.webp\\\"]\",\"color_image\":\"[]\",\"thumbnail\":\"2024-04-11-661757dfbb319.webp\",\"featured\":null,\"flash_deal\":null,\"video_provider\":\"youtube\",\"video_url\":null,\"colors\":\"[]\",\"variant_product\":0,\"attributes\":\"null\",\"choice_options\":\"[]\",\"variation\":\"[]\",\"published\":0,\"unit_price\":106000,\"purchase_price\":106000,\"tax\":0,\"tax_type\":\"percent\",\"tax_model\":\"exclude\",\"discount\":0,\"discount_type\":\"flat\",\"current_stock\":10000,\"minimum_order_qty\":1,\"details\":\"<p><strong>B\\u1ed9t Chanh Gia V\\u1ecb CHAVI<\\/strong>&nbsp;l&agrave; lo\\u1ea1i gia v\\u1ecb \\u0111\\u1eb7c bi\\u1ec7t v\\u1edbi th&agrave;nh ph\\u1ea7n b\\u1ed9t chanh nguy&ecirc;n ch\\u1ea5t t\\u1ea1o h\\u01b0\\u01a1ng v\\u1ecb chanh t\\u1ef1 nhi&ecirc;n cho c&aacute;c m&oacute;n \\u0103n, l&agrave; s\\u1ea3n ph\\u1ea9m ti\\u1ec7n d\\u1ee5ng, ti\\u1ebft ki\\u1ec7m v&agrave; hi\\u1ec7u qu\\u1ea3 cho nh&agrave; b\\u1ebfp.<\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li>Gi&uacute;p b\\u1ea1n kh&ocirc;ng ph\\u1ea3i l\\u01b0u tr\\u1eef chanh t\\u01b0\\u01a1i<\\/li>\\r\\n\\t<li>D\\u1ec5 d&agrave;ng h\\u01a1n cho m&oacute;n ngon m\\u1ed7i ng&agrave;y<\\/li>\\r\\n\\t<li>H&agrave;ng Vi\\u1ec7t Nam ch\\u1ea5t l\\u01b0\\u1ee3ng cao<\\/li>\\r\\n<\\/ul>\",\"free_shipping\":0,\"attachment\":null,\"created_at\":\"2024-04-11T03:24:15.000000Z\",\"updated_at\":\"2024-04-11T03:24:20.000000Z\",\"status\":1,\"featured_status\":1,\"meta_title\":null,\"meta_description\":null,\"meta_image\":\"def.webp\",\"request_status\":1,\"denied_note\":null,\"shipping_cost\":0,\"multiply_qty\":0,\"temp_shipping_cost\":null,\"is_shipping_cost_updated\":null,\"code\":\"132424\",\"reviews_count\":0,\"translations\":[],\"reviews\":[]}',1,106000,0,0,'exclude','delivered','unpaid','2024-04-10 20:35:22','2024-04-10 20:36:03',NULL,'','[]','discount_on_product',1,0),(3,100003,5,1,NULL,'{\"id\":5,\"added_by\":\"seller\",\"user_id\":1,\"name\":\"C\\u00e0 Chua Bi Tr\\u00e1i C\\u00e2y\",\"slug\":\"ca-chua-bi-trai-cay-rzWv8g\",\"product_type\":\"physical\",\"category_ids\":\"[{\\\"id\\\":\\\"2\\\",\\\"position\\\":1}]\",\"category_id\":\"2\",\"sub_category_id\":null,\"sub_sub_category_id\":null,\"brand_id\":2,\"unit\":\"kg\",\"min_qty\":1,\"refundable\":1,\"digital_product_type\":null,\"digital_file_ready\":null,\"images\":\"[\\\"2024-04-11-661758b5e99e1.webp\\\"]\",\"color_image\":\"[]\",\"thumbnail\":\"2024-04-11-661758b60a53f.webp\",\"featured\":null,\"flash_deal\":null,\"video_provider\":\"youtube\",\"video_url\":null,\"colors\":\"[]\",\"variant_product\":0,\"attributes\":\"null\",\"choice_options\":\"[]\",\"variation\":\"[]\",\"published\":0,\"unit_price\":26000,\"purchase_price\":26000,\"tax\":0,\"tax_type\":\"percent\",\"tax_model\":\"exclude\",\"discount\":0,\"discount_type\":\"flat\",\"current_stock\":1990,\"minimum_order_qty\":1,\"details\":\"<ul>\\r\\n\\t<li><strong>C&agrave; chua bi cocktail<\\/strong> l&agrave; lo\\u1ea1i c&agrave; chua c&oacute; k&iacute;ch th\\u01b0\\u1edbc nh\\u1ecf, tr&aacute;i tr&ograve;n, m&agrave;u \\u0111\\u1ecf t\\u01b0\\u01a1i. C&agrave; chua bi c&oacute; l\\u01b0\\u1ee3ng dinh d\\u01b0\\u1ee1ng cao; do \\u0111&oacute;, c&ocirc;ng d\\u1ee5ng r\\u1ea5t phong ph&uacute;..<\\/li>\\r\\n\\t<li><strong>H\\u01b0\\u01a1ng v\\u1ecb:&nbsp;<\\/strong>Ng\\u1ecdt d\\u1ecbu, xen l\\u1eabn chua chua, gi&ograve;n.<\\/li>\\r\\n<\\/ul>\",\"free_shipping\":0,\"attachment\":null,\"created_at\":\"2024-04-11T03:27:50.000000Z\",\"updated_at\":\"2024-04-11T03:27:55.000000Z\",\"status\":1,\"featured_status\":1,\"meta_title\":null,\"meta_description\":null,\"meta_image\":\"def.webp\",\"request_status\":1,\"denied_note\":null,\"shipping_cost\":0,\"multiply_qty\":0,\"temp_shipping_cost\":null,\"is_shipping_cost_updated\":null,\"code\":\"134399\",\"reviews_count\":0,\"translations\":[],\"reviews\":[]}',1,26000,0,0,'exclude','delivered','unpaid','2024-04-10 20:37:07','2024-04-10 20:37:32',NULL,'','[]','discount_on_product',1,0),(4,100004,3,3,NULL,'{\"id\":3,\"added_by\":\"seller\",\"user_id\":3,\"name\":\"B\\u1ed8T TR\\u00c0 CHANH CHAVI\",\"slug\":\"bot-tra-chanh-chavi-WQzMlL\",\"product_type\":\"physical\",\"category_ids\":\"[{\\\"id\\\":\\\"4\\\",\\\"position\\\":1},{\\\"id\\\":\\\"7\\\",\\\"position\\\":2}]\",\"category_id\":\"4\",\"sub_category_id\":\"7\",\"sub_sub_category_id\":null,\"brand_id\":2,\"unit\":\"kg\",\"min_qty\":1,\"refundable\":1,\"digital_product_type\":null,\"digital_file_ready\":null,\"images\":\"[\\\"2024-04-11-6617578b6c248.webp\\\"]\",\"color_image\":\"[]\",\"thumbnail\":\"2024-04-11-6617578b8c9e0.webp\",\"featured\":1,\"flash_deal\":null,\"video_provider\":\"youtube\",\"video_url\":null,\"colors\":\"[]\",\"variant_product\":0,\"attributes\":\"null\",\"choice_options\":\"[]\",\"variation\":\"[]\",\"published\":0,\"unit_price\":70000,\"purchase_price\":70000,\"tax\":0,\"tax_type\":\"percent\",\"tax_model\":\"exclude\",\"discount\":0,\"discount_type\":\"flat\",\"current_stock\":10000,\"minimum_order_qty\":1,\"details\":\"<p>Nh\\u1eefng qu\\u1ea3 chanh kh&ocirc;ng h\\u1ea1t ch\\u1ea5t l\\u01b0\\u1ee3ng cao t\\u1ea1i N&ocirc;ng tr\\u1ea1i Chanh Vi\\u1ec7t \\u0111\\u01b0\\u1ee3c ch\\u0103m s&oacute;c t\\u1ec9 m\\u1ec9 b\\u1edfi nh\\u1eefng ng\\u01b0\\u1eddi n&ocirc;ng d&acirc;n trong nhi\\u1ec1u th&aacute;ng t\\u1eeb l&uacute;c ra hoa cho \\u0111\\u1ebfn khi thu ho\\u1ea1ch s\\u1ebd \\u0111\\u01b0\\u1ee3c ch\\u1ecdn l\\u1ef1a nghi&ecirc;m ng\\u1eb7t v&agrave; k\\u1ebft h\\u1ee3p c&ugrave;ng v\\u1edbi tr&agrave; \\u0111en th\\u01b0\\u1ee3ng h\\u1ea1ng, qua quy tr&igrave;nh ch\\u1ebf bi\\u1ebfn hi\\u1ec7n \\u0111\\u1ea1i v\\u1edbi s\\u1ef1 gi&aacute;m s&aacute;t c\\u1ee7a nh\\u1eefng chuy&ecirc;n gia dinh d\\u01b0\\u1ee1ng h&agrave;ng \\u0111\\u1ea7u \\u0111\\u1ec3 t\\u1ea1o ra s\\u1ea3n ph\\u1ea9m B\\u1ed9t tr&agrave; chanh h&ograve;a tan CHAVI, m\\u1ed9t m&oacute;n qu&agrave; &yacute; ngh\\u0129a d&agrave;nh t\\u1eb7ng cho ng\\u01b0\\u1eddi Vi\\u1ec7t.<\\/p>\\r\\n\\r\\n<h3>B\\u1ed8T TR&Agrave; CHANH CHAVI L&Agrave; G&Igrave;?<\\/h3>\\r\\n\\r\\n<p>B\\u1ed9t tr&agrave; chanh Chavi l&agrave; th\\u1ee9c u\\u1ed1ng d\\u1ea1ng b\\u1ed9t h&ograve;a tan \\u0111\\u01b0\\u1ee3c s\\u1ea3n xu\\u1ea5t b\\u1edfi N&ocirc;ng tr\\u1ea1i Chanh Vi\\u1ec7t. Tr&agrave; chanh l&agrave; th\\u1ee9c u\\u1ed1ng ph\\u1ed5 bi\\u1ebfn v&agrave; \\u0111\\u01b0\\u1ee3c nhi\\u1ec1u ng\\u01b0\\u1eddi y&ecirc;u th&iacute;ch, \\u0111\\u1eb7c bi\\u1ec7t l&agrave; gi\\u1edbi tr\\u1ebb. Tuy nhi&ecirc;n, kh&ocirc;ng ph\\u1ea3i ai c\\u0169ng c&oacute; th\\u1eddi gian ho\\u1eb7c bi\\u1ebft c&aacute;ch pha tr&agrave; chanh ngon. B&ecirc;n c\\u1ea1nh \\u0111&oacute;, nhi\\u1ec1u ng\\u01b0\\u1eddi kh&ocirc;ng c&oacute; \\u0111i\\u1ec7u ki\\u1ec7n ra qu&aacute;n, ho\\u1eb7c kh&ocirc;ng y&ecirc;n t&acirc;m v\\u1ec1 ch\\u1ea5t l\\u01b0\\u1ee3ng. V&igrave; v\\u1eady, Tr&agrave; chanh h&ograve;a tan Chavi l&agrave; gi\\u1ea3i ph&aacute;p t\\u1ed1t nh\\u1ea5t cho b\\u1ea1n b\\u1edfi s\\u1ef1 th\\u01a1m ngon, ti\\u1ec7n l\\u1ee3i, ti\\u1ebft ki\\u1ec7m v&agrave; an t&acirc;m.<\\/p>\\r\\n\\r\\n<p><img alt=\\\"B\\u1ed9t tr\\u00e0 chanh Chavi\\\" src=\\\"https:\\/\\/chanhviet.com\\/wp-content\\/uploads\\/2021\\/06\\/tra-chanh-hoa-tan-chavi-2-1024x1024.jpg\\\" style=\\\"height:640px; width:640px\\\" \\/><\\/p>\\r\\n\\r\\n<p>Tr&agrave; chanh Chavi gi&uacute;p pha tr&agrave; chanh nhanh ch&oacute;ng v&agrave; th\\u01a1m ngon.<\\/p>\\r\\n\\r\\n<h3>TR&Agrave; CHANH H&Ograve;A TAN CHAVI \\u0110\\u01af\\u1ee2C S\\u1ea2N XU\\u1ea4T NH\\u01af TH\\u1ebe N&Agrave;O<\\/h3>\\r\\n\\r\\n<p>N&ocirc;ng tr\\u1ea1i Chanh Vi\\u1ec7t \\u0111\\u01b0\\u1ee3c bi\\u1ebft \\u0111\\u1ebfn l&agrave; n&ocirc;ng tr\\u1ea1i tr\\u1ed3ng chanh l\\u1edbn nh\\u1ea5t Vi\\u1ec7t Nam. Nh\\u1eefng qu\\u1ea3 chanh \\u1edf \\u0111&acirc;y sau khi thu ho\\u1ea1ch, s\\u1ebd \\u0111\\u01b0\\u1ee3c l\\u1ef1a ch\\u1ecdn c\\u1ea9n th\\u1eadn. Nh\\u1eefng qu\\u1ea3 \\u0111\\u1ea1t ch\\u1ea5t l\\u01b0\\u1ee3ng t\\u1ed1t nh\\u1ea5t s\\u1ebd qua kh&acirc;u s\\u01a1 ch\\u1ebf bao g\\u1ed3m r\\u1eeda, ph&acirc;n lo\\u1ea1i v&agrave; g\\u1ecdt v\\u1ecf. Ti\\u1ebfp \\u0111\\u1ebfn chanh s\\u1ebd \\u0111\\u01b0\\u1ee3c \\u0111\\u01b0a v&agrave;o m&aacute;y &eacute;p \\u0111\\u1ec3 v\\u1eaft th&agrave;nh n\\u01b0\\u1edbc c\\u1ed1t chanh. N\\u01b0\\u1edbc c\\u1ed1t chanh sau \\u0111&oacute; \\u0111\\u01b0\\u1ee3c \\u0111\\u01b0a v&agrave;o m&aacute;y s\\u1ea5y phun \\u0111\\u1ec3 s\\u1ea5y th&agrave;nh b\\u1ed9t chanh. Sau khi thu \\u0111\\u01b0\\u1ee3c b\\u1ed9t chanh, c&aacute;c c&ocirc;ng nh&acirc;n trong nh&agrave; m&aacute;y s\\u1ebd ph\\u1ed1i tr\\u1ed9n c&ugrave;ng v\\u1edbi tr&agrave; \\u0111en v&agrave; \\u0111\\u01b0\\u1eddng. S\\u1ea3n ph\\u1ea9m sau \\u0111&oacute; \\u0111\\u01b0\\u1ee3c \\u0111&oacute;ng g&oacute;i v&agrave;o h\\u0169 nh\\u1ef1a an to&agrave;n ho\\u1eb7c t&uacute;i zip nh&ocirc;m.<\\/p>\\r\\n\\r\\n<h3>C&Aacute;CH PHA TR&Agrave; CHANH TH\\u01a0M NGON T\\u1eea B\\u1ed8T TR&Agrave; CHANH CHAVI<\\/h3>\\r\\n\\r\\n<p>B1: Cho 3 mu\\u1ed7ng (15 g) b\\u1ed9t tr&agrave; chanh CHAVI v&agrave;o ly.<br \\/>\\r\\nB2: Cho 100ml n\\u01b0\\u1edbc l\\u1ea1nh (ho\\u1eb7c \\u1ea5m t&ugrave;y s\\u1edf th&iacute;ch) v&agrave;o ly.<br \\/>\\r\\nB3: Khu\\u1ea5y \\u0111\\u1ec1u, th&ecirc;m \\u0111&aacute; (n\\u1ebfu th&iacute;ch) v&agrave; th\\u01b0\\u1edfng th\\u1ee9c.<\\/p>\\r\\n\\r\\n<p>U\\u1ed1ng m\\u1ed9t ly tr&agrave; chanh m\\u1ed7i ng&agrave;y gi&uacute;p t\\u0103ng c\\u01b0\\u1eddng s\\u1ee9c h\\u1ec7 mi\\u1ec5n d\\u1ecbch, kh\\u1ea3 n\\u0103ng t\\u1eadp trung, ch\\u1ed1ng oxy h&oacute;a.<\\/p>\\r\\n\\r\\n<p><img alt=\\\"Tr\\u00e0 chanh h\\u00f2a tan Chavi\\\" src=\\\"https:\\/\\/chanhviet.com\\/wp-content\\/uploads\\/2021\\/06\\/bot-trai-cay-hoa-tan-chavi-hang-authentic-1024x1024.jpg\\\" style=\\\"height:640px; width:640px\\\" \\/><\\/p>\",\"free_shipping\":0,\"attachment\":null,\"created_at\":\"2024-04-11T03:22:51.000000Z\",\"updated_at\":\"2024-04-11T03:28:44.000000Z\",\"status\":1,\"featured_status\":1,\"meta_title\":null,\"meta_description\":null,\"meta_image\":\"def.webp\",\"request_status\":1,\"denied_note\":null,\"shipping_cost\":0,\"multiply_qty\":0,\"temp_shipping_cost\":null,\"is_shipping_cost_updated\":null,\"code\":\"112100\",\"reviews_count\":0,\"translations\":[],\"reviews\":[]}',1,70000,0,0,'exclude','pending','unpaid','2024-04-18 21:33:00','2024-04-18 21:33:00',NULL,'','[]','discount_on_product',1,0),(5,100005,8,1,NULL,'{\"id\":8,\"added_by\":\"admin\",\"user_id\":1,\"name\":\"Nho xanh Autumn Crisp \\u00dac\",\"slug\":\"nho-xanh-autumn-crisp-uc-9WfERW\",\"product_type\":\"physical\",\"category_ids\":\"[{\\\"id\\\":\\\"1\\\",\\\"position\\\":1}]\",\"category_id\":\"1\",\"sub_category_id\":null,\"sub_sub_category_id\":null,\"brand_id\":1,\"unit\":\"kg\",\"min_qty\":1,\"refundable\":1,\"digital_product_type\":null,\"digital_file_ready\":null,\"images\":\"[\\\"2024-04-11-66175cb325f73.webp\\\",\\\"2024-04-19-6621f16db98bd.webp\\\"]\",\"color_image\":\"[]\",\"thumbnail\":\"2024-04-19-6621f16dc97f7.webp\",\"featured\":1,\"flash_deal\":null,\"video_provider\":\"youtube\",\"video_url\":null,\"colors\":\"[]\",\"variant_product\":0,\"attributes\":\"null\",\"choice_options\":\"[]\",\"variation\":\"[]\",\"published\":0,\"unit_price\":60000,\"purchase_price\":60000,\"tax\":0,\"tax_type\":\"percent\",\"tax_model\":\"exclude\",\"discount\":0,\"discount_type\":\"flat\",\"current_stock\":10,\"minimum_order_qty\":1,\"details\":\"<p><strong>Xu\\u1ea5t x\\u1ee9:<\\/strong>&nbsp;&Uacute;c<\\/p>\\r\\n\\r\\n<p><strong>Ti&ecirc;u chu\\u1ea9n ch\\u1ea5t l\\u01b0\\u1ee3ng:<\\/strong>&nbsp;Nh\\u1eadp Kh\\u1ea9u&nbsp;<\\/p>\\r\\n\\r\\n<p><strong>\\u0110\\u1eb7c bi\\u1ec7t n\\u1ed5i b\\u1eadt:<\\/strong>&nbsp;<\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li>Nho xanh Autumn Crisp g&acirc;y \\u1ea5n t\\u01b0\\u1ee3ng b\\u1edfi&nbsp;ch&ugrave;m \\u0111\\u1ea7y, tr&aacute;i c\\u1ee9ng, to tr&ograve;n, cu\\u1ed1ng t\\u01b0\\u01a1i xanh.<\\/li>\\r\\n\\t<li>Nho xanh Autumn Crisp c&oacute; v\\u1ecb ng\\u1ecdt thanh m&aacute;t, nho kh&ocirc;ng h\\u1ea1t t\\u1ea1o c\\u1ea3m gi&aacute;c thanh mi\\u1ec7ng, d\\u1ec5 ch\\u1ecbu.<\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p><strong>H\\u01b0\\u1edbng d\\u1eabn s\\u1eed d\\u1ee5ng:<\\/strong><\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li>R\\u1eeda nh\\u1eb9 nh&agrave;ng tr&aacute;i nho \\u0111\\u1ec3 lo\\u1ea1i b\\u1ecf l\\u1edbp ph\\u1ea5n tr\\u1eafng tr&ecirc;n v\\u1ecf.<\\/li>\\r\\n\\t<li>Kh&ocirc;ng n&ecirc;n r\\u1eeda nho tr\\u01b0\\u1edbc khi b\\u1ea3o qu\\u1ea3n trong ng\\u0103n m&aacute;t t\\u1ee7 l\\u1ea1nh v&igrave; n\\u1ebfu r\\u1eeda tr\\u01b0\\u1edbc nho s\\u1ebd d\\u1ec5 b\\u1ecb h\\u01b0, th\\u1ed1i.<\\/li>\\r\\n\\t<li>Ch\\u1ec9 n&ecirc;n r\\u1eeda m\\u1ed9t l\\u01b0\\u1ee3ng v\\u1eeba \\u0111\\u1ee7 \\u0103n.<\\/li>\\r\\n\\t<li>Nho \\u0111\\u1ecf c&oacute; th\\u1ec3 \\u0103n tr\\u1ef1c ti\\u1ebfp, l&agrave;m n\\u01b0\\u1edbc &eacute;p, sinh t\\u1ed1, l&agrave;m b&aacute;nh.&nbsp;<\\/li>\\r\\n<\\/ul>\",\"free_shipping\":0,\"attachment\":null,\"created_at\":\"2024-04-11T03:44:51.000000Z\",\"updated_at\":\"2024-04-19T04:22:05.000000Z\",\"status\":1,\"featured_status\":1,\"meta_title\":null,\"meta_description\":null,\"meta_image\":\"def.webp\",\"request_status\":1,\"denied_note\":null,\"shipping_cost\":0,\"multiply_qty\":0,\"temp_shipping_cost\":null,\"is_shipping_cost_updated\":null,\"code\":\"127041\",\"reviews_count\":0,\"translations\":[{\"translationable_type\":\"App\\\\Model\\\\Product\",\"translationable_id\":8,\"locale\":\"vn\",\"key\":\"name\",\"value\":\"Nho xanh Autumn Crisp \\u00dac\",\"id\":5},{\"translationable_type\":\"App\\\\Model\\\\Product\",\"translationable_id\":8,\"locale\":\"vn\",\"key\":\"description\",\"value\":\"<p><strong>Xu\\u1ea5t x\\u1ee9:<\\/strong>&nbsp;&Uacute;c<\\/p>\\r\\n\\r\\n<p><strong>Ti&ecirc;u chu\\u1ea9n ch\\u1ea5t l\\u01b0\\u1ee3ng:<\\/strong>&nbsp;Nh\\u1eadp Kh\\u1ea9u&nbsp;<\\/p>\\r\\n\\r\\n<p><strong>\\u0110\\u1eb7c bi\\u1ec7t n\\u1ed5i b\\u1eadt:<\\/strong>&nbsp;<\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li>Nho xanh Autumn Crisp g&acirc;y \\u1ea5n t\\u01b0\\u1ee3ng b\\u1edfi&nbsp;ch&ugrave;m \\u0111\\u1ea7y, tr&aacute;i c\\u1ee9ng, to tr&ograve;n, cu\\u1ed1ng t\\u01b0\\u01a1i xanh.<\\/li>\\r\\n\\t<li>Nho xanh Autumn Crisp c&oacute; v\\u1ecb ng\\u1ecdt thanh m&aacute;t, nho kh&ocirc;ng h\\u1ea1t t\\u1ea1o c\\u1ea3m gi&aacute;c thanh mi\\u1ec7ng, d\\u1ec5 ch\\u1ecbu.<\\/li>\\r\\n<\\/ul>\\r\\n\\r\\n<p><strong>H\\u01b0\\u1edbng d\\u1eabn s\\u1eed d\\u1ee5ng:<\\/strong><\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li>R\\u1eeda nh\\u1eb9 nh&agrave;ng tr&aacute;i nho \\u0111\\u1ec3 lo\\u1ea1i b\\u1ecf l\\u1edbp ph\\u1ea5n tr\\u1eafng tr&ecirc;n v\\u1ecf.<\\/li>\\r\\n\\t<li>Kh&ocirc;ng n&ecirc;n r\\u1eeda nho tr\\u01b0\\u1edbc khi b\\u1ea3o qu\\u1ea3n trong ng\\u0103n m&aacute;t t\\u1ee7 l\\u1ea1nh v&igrave; n\\u1ebfu r\\u1eeda tr\\u01b0\\u1edbc nho s\\u1ebd d\\u1ec5 b\\u1ecb h\\u01b0, th\\u1ed1i.<\\/li>\\r\\n\\t<li>Ch\\u1ec9 n&ecirc;n r\\u1eeda m\\u1ed9t l\\u01b0\\u1ee3ng v\\u1eeba \\u0111\\u1ee7 \\u0103n.<\\/li>\\r\\n\\t<li>Nho \\u0111\\u1ecf c&oacute; th\\u1ec3 \\u0103n tr\\u1ef1c ti\\u1ebfp, l&agrave;m n\\u01b0\\u1edbc &eacute;p, sinh t\\u1ed1, l&agrave;m b&aacute;nh.&nbsp;<\\/li>\\r\\n<\\/ul>\",\"id\":6}],\"reviews\":[]}',1,60000,0,0,'exclude','pending','unpaid','2024-04-18 21:33:04','2024-04-18 21:33:04',NULL,'','[]','discount_on_product',1,0),(6,100006,2,2,NULL,'{\"id\":2,\"added_by\":\"seller\",\"user_id\":2,\"name\":\"M\\u00cdT S\\u1ea4Y GI\\u00d2N HG\",\"slug\":\"mit-say-gion-hg-PauL7B\",\"product_type\":\"physical\",\"category_ids\":\"[{\\\"id\\\":\\\"3\\\",\\\"position\\\":1}]\",\"category_id\":\"3\",\"sub_category_id\":null,\"sub_sub_category_id\":null,\"brand_id\":1,\"unit\":\"kg\",\"min_qty\":1,\"refundable\":1,\"digital_product_type\":null,\"digital_file_ready\":null,\"images\":\"[\\\"2024-04-11-661756161b43b.webp\\\"]\",\"color_image\":\"[]\",\"thumbnail\":\"2024-04-11-66175616417c1.webp\",\"featured\":1,\"flash_deal\":null,\"video_provider\":\"youtube\",\"video_url\":null,\"colors\":\"[]\",\"variant_product\":0,\"attributes\":\"null\",\"choice_options\":\"[]\",\"variation\":\"[]\",\"published\":0,\"unit_price\":30000,\"purchase_price\":30000,\"tax\":0,\"tax_type\":\"percent\",\"tax_model\":\"exclude\",\"discount\":0,\"discount_type\":\"flat\",\"current_stock\":1989,\"minimum_order_qty\":1,\"details\":\"<p>Th&ocirc;ng s\\u1ed1 v\\u1eadt l&yacute;<\\/p>\\r\\n\\r\\n<p>&ndash; \\u0110\\u1ed9 \\u1ea9m &lt;2%<\\/p>\\r\\n\\r\\n<p>&ndash; H&igrave;nh d&aacute;ng\\/ k&iacute;ch th\\u01b0\\u1edbc: tr&ograve;n\\/b&aacute;n nguy\\u1ec7t \\u0111\\u01b0\\u1eddng k&iacute;nh thay \\u0111\\u1ed5i t\\u1eeb 2.0 &ndash; 8 mm<\\/p>\\r\\n\\r\\n<p>&ndash; D&agrave;y: 4 mm Quy c&aacute;ch bao b&igrave; v&agrave; b\\u1ea3o qu\\u1ea3n:<\\/p>\\r\\n\\r\\n<p>&ndash; Bao nh&ocirc;m 50 gr<\\/p>\\r\\n\\r\\n<p>&ndash; Th&ugrave;ng 50 g&oacute;i<\\/p>\\r\\n\\r\\n<p>&ndash; B\\u1ea3o qu\\u1ea3n nhi\\u1ec7t \\u0111\\u1ed9 th\\u01b0\\u1eddng, h\\u1ea1n ch\\u1ebf &aacute;nh s&aacute;ng chi\\u1ebfu tr\\u1ef1c ti\\u1ebfp<\\/p>\\r\\n\\r\\n<p>&ndash; Th\\u1eddi gian s\\u1eed d\\u1ee5ng: 12 th&aacute;ng t&iacute;nh t\\u1eeb ng&agrave;y s\\u1ea3n xu\\u1ea5t<\\/p>\\r\\n\\r\\n<ul>\\r\\n\\t<li>Li&ecirc;n h\\u1ec7: 0784923067<\\/li>\\r\\n\\t<li>Gi&aacute;:30.000<\\/li>\\r\\n<\\/ul>\",\"free_shipping\":0,\"attachment\":null,\"created_at\":\"2024-04-11T03:16:38.000000Z\",\"updated_at\":\"2024-04-11T03:33:28.000000Z\",\"status\":1,\"featured_status\":1,\"meta_title\":null,\"meta_description\":null,\"meta_image\":\"def.webp\",\"request_status\":1,\"denied_note\":null,\"shipping_cost\":0,\"multiply_qty\":0,\"temp_shipping_cost\":null,\"is_shipping_cost_updated\":null,\"code\":\"123578\",\"reviews_count\":1,\"translations\":[],\"reviews\":[{\"id\":1,\"product_id\":2,\"customer_id\":3,\"delivery_man_id\":null,\"order_id\":null,\"comment\":\"good\",\"attachment\":\"[\\\"2024-04-11-66175a4f576cc.webp\\\"]\",\"rating\":5,\"status\":1,\"is_saved\":0,\"created_at\":\"2024-04-11T03:34:39.000000Z\",\"updated_at\":\"2024-04-11T03:34:39.000000Z\"}]}',1,30000,0,0,'exclude','pending','unpaid','2024-04-18 21:34:08','2024-04-18 21:34:08',NULL,'','[]','discount_on_product',1,0);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_expected_delivery_histories`
--

DROP TABLE IF EXISTS `order_expected_delivery_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_expected_delivery_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `user_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_delivery_date` date NOT NULL,
  `cause` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_expected_delivery_histories`
--

LOCK TABLES `order_expected_delivery_histories` WRITE;
/*!40000 ALTER TABLE `order_expected_delivery_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_expected_delivery_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_status_histories`
--

DROP TABLE IF EXISTS `order_status_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_status_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `user_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cause` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_status_histories`
--

LOCK TABLES `order_status_histories` WRITE;
/*!40000 ALTER TABLE `order_status_histories` DISABLE KEYS */;
INSERT INTO `order_status_histories` VALUES (1,100001,3,'customer','pending',NULL,'2024-04-10 20:33:28','2024-04-10 20:33:28'),(2,100001,0,'admin','delivered',NULL,'2024-04-10 20:33:50','2024-04-10 20:33:50'),(3,100002,3,'customer','pending',NULL,'2024-04-10 20:35:21','2024-04-10 20:35:21'),(4,100002,0,'admin','delivered',NULL,'2024-04-10 20:36:03','2024-04-10 20:36:03'),(5,100003,3,'customer','pending',NULL,'2024-04-10 20:37:07','2024-04-10 20:37:07'),(6,100003,0,'admin','delivered',NULL,'2024-04-10 20:37:32','2024-04-10 20:37:32'),(7,100004,2,'customer','pending',NULL,'2024-04-18 21:33:00','2024-04-18 21:33:00'),(8,100005,2,'customer','pending',NULL,'2024-04-18 21:33:04','2024-04-18 21:33:04'),(9,100006,2,'customer','pending',NULL,'2024-04-18 21:34:08','2024-04-18 21:34:08'),(10,100006,2,'seller','processing',NULL,'2024-04-18 21:34:50','2024-04-18 21:34:50'),(11,100006,2,'seller','confirmed',NULL,'2024-04-18 21:36:39','2024-04-18 21:36:39');
/*!40000 ALTER TABLE `order_status_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_transactions`
--

DROP TABLE IF EXISTS `order_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_transactions` (
  `seller_id` bigint NOT NULL,
  `order_id` bigint NOT NULL,
  `order_amount` decimal(50,2) NOT NULL DEFAULT '0.00',
  `seller_amount` decimal(50,2) NOT NULL DEFAULT '0.00',
  `admin_commission` decimal(50,2) NOT NULL DEFAULT '0.00',
  `received_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_charge` decimal(50,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(50,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` bigint DEFAULT NULL,
  `seller_is` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `payment_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_transactions`
--

LOCK TABLES `order_transactions` WRITE;
/*!40000 ALTER TABLE `order_transactions` DISABLE KEYS */;
INSERT INTO `order_transactions` VALUES (2,100001,30000.00,30000.00,0.00,'admin','disburse',5.00,0.00,'2024-04-10 20:33:50','2024-04-10 20:33:50',3,'seller','admin','cash_on_delivery','2988-xQvza-1712806430',1),(3,100002,106000.00,106000.00,0.00,'admin','disburse',5.00,0.00,'2024-04-10 20:36:03','2024-04-10 20:36:03',3,'seller','admin','cash_on_delivery','1114-GKz4c-1712806563',2),(1,100003,26000.00,26000.00,0.00,'admin','disburse',5.00,0.00,'2024-04-10 20:37:32','2024-04-10 20:37:32',3,'seller','admin','cash_on_delivery','7305-vAxtP-1712806652',3);
/*!40000 ALTER TABLE `order_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_guest` tinyint NOT NULL DEFAULT '0',
  `customer_type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `order_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_method` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_ref` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order_amount` double NOT NULL DEFAULT '0',
  `admin_commission` decimal(8,2) NOT NULL DEFAULT '0.00',
  `is_pause` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `cause` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount_amount` double NOT NULL DEFAULT '0',
  `discount_type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_discount_bearer` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inhouse',
  `shipping_responsibility` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_method_id` bigint NOT NULL DEFAULT '0',
  `shipping_cost` double(8,2) NOT NULL DEFAULT '0.00',
  `is_shipping_free` tinyint(1) NOT NULL DEFAULT '0',
  `order_group_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def-order-group',
  `verification_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `verification_status` tinyint NOT NULL DEFAULT '0',
  `seller_id` bigint DEFAULT NULL,
  `seller_is` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `delivery_man_id` bigint DEFAULT NULL,
  `deliveryman_charge` double NOT NULL DEFAULT '0',
  `expected_delivery_date` date DEFAULT NULL,
  `order_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `billing_address` bigint unsigned DEFAULT NULL,
  `billing_address_data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_type',
  `extra_discount` double(8,2) NOT NULL DEFAULT '0.00',
  `extra_discount_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free_delivery_bearer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `shipping_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_service_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_party_delivery_tracking_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100007 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (100001,'3',0,'customer','paid','delivered','cash_on_delivery','',NULL,NULL,30005,0.00,'0',NULL,'1','2024-04-10 20:33:28','2024-04-10 20:34:02',0,NULL,'0','inhouse',NULL,2,5.00,0,'7112-FwyEy-1712806408','512284',0,2,'seller','{\"id\":1,\"customer_id\":0,\"is_guest\":0,\"contact_person_name\":\"Huy \\u0110\\u1eb7ng V\\u0103n\",\"email\":null,\"address_type\":\"permanent\",\"address\":\"Bi\\u00ean H\\u00f2a\",\"city\":\"\\u0110\\u1ed3ng Nai\",\"zip\":\"810000\",\"phone\":\"0366253928\",\"created_at\":null,\"updated_at\":null,\"state\":null,\"country\":\"Viet Nam\",\"latitude\":\"10.953607\",\"longitude\":\"106.802589\",\"is_billing\":0}',NULL,0,NULL,'fdbs',1,'{\"id\":1,\"customer_id\":0,\"is_guest\":0,\"contact_person_name\":\"Huy \\u0110\\u1eb7ng V\\u0103n\",\"email\":null,\"address_type\":\"permanent\",\"address\":\"Bi\\u00ean H\\u00f2a\",\"city\":\"\\u0110\\u1ed3ng Nai\",\"zip\":\"810000\",\"phone\":\"0366253928\",\"created_at\":null,\"updated_at\":null,\"state\":null,\"country\":\"Viet Nam\",\"latitude\":\"10.953607\",\"longitude\":\"106.802589\",\"is_billing\":0}','default_type',0.00,NULL,NULL,1,'order_wise','third_party_delivery','Giao hàng nhanh','113'),(100002,'3',0,'customer','paid','delivered','cash_on_delivery','',NULL,NULL,106005,0.00,'0',NULL,'2','2024-04-10 20:35:21','2024-04-10 20:36:03',0,NULL,'0','inhouse',NULL,2,5.00,0,'5383-qjpPF-1712806521','769395',0,3,'seller','{\"id\":2,\"customer_id\":0,\"is_guest\":0,\"contact_person_name\":\"Huy \\u0110\\u1eb7ng V\\u0103n\",\"email\":null,\"address_type\":\"permanent\",\"address\":\"Bi\\u00ean H\\u00f2a\",\"city\":\"\\u0110\\u1ed3ng Nai\",\"zip\":\"810000\",\"phone\":\"0366253928\",\"created_at\":null,\"updated_at\":null,\"state\":null,\"country\":\"Viet Nam\",\"latitude\":\"10.953607\",\"longitude\":\"106.802589\",\"is_billing\":0}',NULL,0,NULL,NULL,2,'{\"id\":2,\"customer_id\":0,\"is_guest\":0,\"contact_person_name\":\"Huy \\u0110\\u1eb7ng V\\u0103n\",\"email\":null,\"address_type\":\"permanent\",\"address\":\"Bi\\u00ean H\\u00f2a\",\"city\":\"\\u0110\\u1ed3ng Nai\",\"zip\":\"810000\",\"phone\":\"0366253928\",\"created_at\":null,\"updated_at\":null,\"state\":null,\"country\":\"Viet Nam\",\"latitude\":\"10.953607\",\"longitude\":\"106.802589\",\"is_billing\":0}','default_type',0.00,NULL,NULL,1,'order_wise','third_party_delivery','Giao hàng nhanh','q2r4q'),(100003,'3',0,'customer','paid','delivered','cash_on_delivery','',NULL,NULL,26005,0.00,'0',NULL,'3','2024-04-10 20:37:07','2024-04-10 20:37:42',0,NULL,'0','inhouse',NULL,2,5.00,0,'6351-juxRh-1712806627','990331',0,1,'seller','{\"id\":3,\"customer_id\":0,\"is_guest\":0,\"contact_person_name\":\"Huy \\u0110\\u1eb7ng V\\u0103n\",\"email\":null,\"address_type\":\"permanent\",\"address\":\"Bi\\u00ean H\\u00f2a\",\"city\":\"\\u0110\\u1ed3ng Nai\",\"zip\":\"810000\",\"phone\":\"0366253928\",\"created_at\":null,\"updated_at\":null,\"state\":null,\"country\":\"Viet Nam\",\"latitude\":\"10.953607\",\"longitude\":\"106.802589\",\"is_billing\":0}',NULL,0,NULL,NULL,3,'{\"id\":3,\"customer_id\":0,\"is_guest\":0,\"contact_person_name\":\"Huy \\u0110\\u1eb7ng V\\u0103n\",\"email\":null,\"address_type\":\"permanent\",\"address\":\"Bi\\u00ean H\\u00f2a\",\"city\":\"\\u0110\\u1ed3ng Nai\",\"zip\":\"810000\",\"phone\":\"0366253928\",\"created_at\":null,\"updated_at\":null,\"state\":null,\"country\":\"Viet Nam\",\"latitude\":\"10.953607\",\"longitude\":\"106.802589\",\"is_billing\":0}','default_type',0.00,NULL,NULL,1,'order_wise','third_party_delivery','Giao hàng nhanh','cfac'),(100004,'2',0,'customer','unpaid','pending','cash_on_delivery','',NULL,NULL,70005,0.00,'0',NULL,'6','2024-04-18 21:33:00','2024-04-18 21:33:23',0,NULL,'0','inhouse','inhouse_shipping',2,5.00,0,'6889-U9rBR-1713501180','575017',0,3,'seller','{\"id\":6,\"customer_id\":0,\"is_guest\":0,\"contact_person_name\":\"Huy \\u0110\\u1eb7ng V\\u0103n\",\"email\":null,\"address_type\":\"permanent\",\"address\":\"Bi\\u00ean H\\u00f2a\",\"city\":\"\\u0110\\u1ed3ng Nai\",\"zip\":\"810000\",\"phone\":\"0366253928\",\"created_at\":null,\"updated_at\":null,\"state\":null,\"country\":\"Viet Nam\",\"latitude\":\"10.953607\",\"longitude\":\"106.802589\",\"is_billing\":0}',NULL,0,NULL,NULL,6,'{\"id\":6,\"customer_id\":0,\"is_guest\":0,\"contact_person_name\":\"Huy \\u0110\\u1eb7ng V\\u0103n\",\"email\":null,\"address_type\":\"permanent\",\"address\":\"Bi\\u00ean H\\u00f2a\",\"city\":\"\\u0110\\u1ed3ng Nai\",\"zip\":\"810000\",\"phone\":\"0366253928\",\"created_at\":null,\"updated_at\":null,\"state\":null,\"country\":\"Viet Nam\",\"latitude\":\"10.953607\",\"longitude\":\"106.802589\",\"is_billing\":0}','default_type',0.00,NULL,NULL,1,'order_wise',NULL,NULL,NULL),(100005,'2',0,'customer','unpaid','pending','cash_on_delivery','',NULL,NULL,60005,0.00,'0',NULL,'6','2024-04-18 21:33:04','2024-04-18 21:33:23',0,NULL,'0','inhouse','inhouse_shipping',2,5.00,0,'6889-U9rBR-1713501180','981239',0,1,'admin','{\"id\":6,\"customer_id\":0,\"is_guest\":0,\"contact_person_name\":\"Huy \\u0110\\u1eb7ng V\\u0103n\",\"email\":null,\"address_type\":\"permanent\",\"address\":\"Bi\\u00ean H\\u00f2a\",\"city\":\"\\u0110\\u1ed3ng Nai\",\"zip\":\"810000\",\"phone\":\"0366253928\",\"created_at\":null,\"updated_at\":null,\"state\":null,\"country\":\"Viet Nam\",\"latitude\":\"10.953607\",\"longitude\":\"106.802589\",\"is_billing\":0}',NULL,0,NULL,NULL,6,'{\"id\":6,\"customer_id\":0,\"is_guest\":0,\"contact_person_name\":\"Huy \\u0110\\u1eb7ng V\\u0103n\",\"email\":null,\"address_type\":\"permanent\",\"address\":\"Bi\\u00ean H\\u00f2a\",\"city\":\"\\u0110\\u1ed3ng Nai\",\"zip\":\"810000\",\"phone\":\"0366253928\",\"created_at\":null,\"updated_at\":null,\"state\":null,\"country\":\"Viet Nam\",\"latitude\":\"10.953607\",\"longitude\":\"106.802589\",\"is_billing\":0}','default_type',0.00,NULL,'admin',1,'order_wise',NULL,NULL,NULL),(100006,'2',0,'customer','unpaid','confirmed','cash_on_delivery','',NULL,NULL,30005,0.00,'0',NULL,'7','2024-04-18 21:34:08','2024-04-18 21:36:45',0,NULL,'0','inhouse','inhouse_shipping',2,5.00,0,'9285-SUvnN-1713501248','893326',0,2,'seller','{\"id\":7,\"customer_id\":0,\"is_guest\":0,\"contact_person_name\":\"Huy \\u0110\\u1eb7ng V\\u0103n\",\"email\":null,\"address_type\":\"permanent\",\"address\":\"Bi\\u00ean H\\u00f2a\",\"city\":\"\\u0110\\u1ed3ng Nai\",\"zip\":\"810000\",\"phone\":\"0366253928\",\"created_at\":null,\"updated_at\":null,\"state\":null,\"country\":\"Viet Nam\",\"latitude\":\"10.953607\",\"longitude\":\"106.802589\",\"is_billing\":0}',NULL,0,NULL,NULL,7,'{\"id\":7,\"customer_id\":0,\"is_guest\":0,\"contact_person_name\":\"Huy \\u0110\\u1eb7ng V\\u0103n\",\"email\":null,\"address_type\":\"permanent\",\"address\":\"Bi\\u00ean H\\u00f2a\",\"city\":\"\\u0110\\u1ed3ng Nai\",\"zip\":\"810000\",\"phone\":\"0366253928\",\"created_at\":null,\"updated_at\":null,\"state\":null,\"country\":\"Viet Nam\",\"latitude\":\"10.953607\",\"longitude\":\"106.802589\",\"is_billing\":0}','default_type',0.00,NULL,NULL,1,'order_wise',NULL,NULL,NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `identity` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp_hit_count` tinyint NOT NULL DEFAULT '0',
  `is_temp_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `temp_block_time` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `password_resets_email_index` (`identity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_requests`
--

DROP TABLE IF EXISTS `payment_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_requests` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payer_id` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_id` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_amount` decimal(24,2) NOT NULL DEFAULT '0.00',
  `gateway_callback_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `success_hook` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `failure_hook` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `payment_method` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payer_information` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `external_redirect_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_information` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `attribute_id` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attribute` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_platform` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_requests`
--

LOCK TABLES `payment_requests` WRITE;
/*!40000 ALTER TABLE `payment_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paytabs_invoices`
--

DROP TABLE IF EXISTS `paytabs_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paytabs_invoices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `result` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `response_code` int unsigned NOT NULL,
  `pt_invoice_id` int unsigned DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `currency` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` int unsigned DEFAULT NULL,
  `card_brand` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_first_six_digits` int unsigned DEFAULT NULL,
  `card_last_four_digits` int unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paytabs_invoices`
--

LOCK TABLES `paytabs_invoices` WRITE;
/*!40000 ALTER TABLE `paytabs_invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `paytabs_invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phone_or_email_verifications`
--

DROP TABLE IF EXISTS `phone_or_email_verifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phone_or_email_verifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `phone_or_email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_hit_count` tinyint NOT NULL DEFAULT '0',
  `is_temp_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `temp_block_time` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone_or_email_verifications`
--

LOCK TABLES `phone_or_email_verifications` WRITE;
/*!40000 ALTER TABLE `phone_or_email_verifications` DISABLE KEYS */;
INSERT INTO `phone_or_email_verifications` VALUES (1,'dangvanhuy1432002@gmail.com','2741',0,0,NULL,NULL,'2024-04-10 20:30:09','2024-04-10 20:30:09'),(2,'huy@gmail.com','5300',0,0,NULL,NULL,'2024-04-10 20:32:08','2024-04-10 20:32:08');
/*!40000 ALTER TABLE `phone_or_email_verifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tag`
--

DROP TABLE IF EXISTS `post_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_tag` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint unsigned NOT NULL,
  `tag_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tag`
--

LOCK TABLES `post_tag` WRITE;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;
INSERT INTO `post_tag` VALUES (12,2,25),(13,3,26),(14,4,26),(15,5,27),(16,6,28),(17,7,21),(18,8,21),(19,9,21),(20,10,21),(21,11,21),(22,12,21),(23,13,29),(24,14,29),(25,15,30),(26,16,31),(28,18,31),(29,19,31),(30,20,31),(31,21,21),(32,15,32),(33,17,33),(34,1,34),(35,1,35);
/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_types`
--

DROP TABLE IF EXISTS `post_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_types`
--

LOCK TABLES `post_types` WRITE;
/*!40000 ALTER TABLE `post_types` DISABLE KEYS */;
INSERT INTO `post_types` VALUES (1,'Tin tức','2024-04-12 00:02:24','2024-04-12 10:29:22'),(2,'Sự Kiện','2024-04-12 00:02:40','2024-04-12 00:02:40');
/*!40000 ALTER TABLE `post_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int NOT NULL DEFAULT '0',
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('draft','published','scheduled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `author_id` bigint unsigned NOT NULL,
  `post_type_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_author_id_foreign` (`author_id`),
  KEY `posts_post_type_id_foreign` (`post_type_id`),
  CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `posts_post_type_id_foreign` FOREIGN KEY (`post_type_id`) REFERENCES `post_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'[Khánh Hòa][22/01/2024] ANH DƯƠNG LONG THÀNH – CHỦ TỊCH HỘI DOANH NHÂN TRẺ LONG AN ĐẢM NHẬN VỊ TRÍ PHÓ CHỦ TỊCH TRUNG ƯƠNG HỘI DOANH NHÂN TRẺ VIỆT NAM','?Dự hội nghị có ông Hoàng Bình Quân, nguyên ủy viên T.Ư Đảng, nguyên Trưởng ban Đối ngoại T.Ư, Chủ tịch danh dự Hội DNT Việt Nam; anh Nguyễn Ngọc Lương, Bí thư thường trực T.Ư Đoàn, Chủ tịch ','<div><div class=\"entry-divider is-divider small\" style=\" height: 1px !important; display: block; background-color: rgba(0, 0, 0, 0.1); margin: 0px auto 10px 0px; width: 840px; max-width: 100%\"></div><h3 style=\" color: rgb(10, 10, 10); width: 840px; margin-bottom: 7px; text-rendering: optimizespeed; font-size: 1.25em; font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\"></h3><h3 style=\" color: rgb(10, 10, 10); width: 840px; margin-bottom: 7px; text-rendering: optimizespeed; font-size: 1.25em; font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\"><a href=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/z5101609460256_1aed5eab7592abf0d3ea6b847b4b0aae.jpg\" style=\" background-color: transparent; touch-action: manipulation; color: rgb(49, 120, 191); text-decoration: none\"><img decoding=\"async\" loading=\"lazy\" class=\"aligncenter size-full wp-image-11367\" src=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/z5101609460256_1aed5eab7592abf0d3ea6b847b4b0aae.jpg\" alt=\"z5101609460256_1aed5eab7592abf0d3ea6b847b4b0aae\" width=\"1280\" height=\"1036\" style=\" border-style: none; max-width: 100%; height: auto; display: block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1; clear: both; margin: 0px auto\"></a></h3><h3 style=\" color: rgb(10, 10, 10); width: 840px; margin-bottom: 7px; text-rendering: optimizespeed; font-size: 1.25em; font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\">&#127802;Anh &#272;&#7863;ng H&#7891;ng Anh, Ph&oacute; Ch&#7911; t&#7883;ch H&#7897;i LHTN Vi&#7879;t Nam, Ch&#7911; t&#7883;ch H&#7897;i DNT Vi&#7879;t Nam c&ugrave;ng c&aacute;c anh, ch&#7883; Ph&oacute; Ch&#7911; t&#7883;ch H&#7897;i v&agrave; to&agrave;n th&#7875; c&aacute;c anh ch&#7883; U&#7927; vi&ecirc;n UBTW H&#7897;i doanh nh&acirc;n tr&#7867; Vi&#7879;t Nam.</h3><h3 style=\" color: rgb(10, 10, 10); width: 840px; margin-bottom: 7px; text-rendering: optimizespeed; font-size: 1.25em; font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\"><a href=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/z5101609449802_6de50989a1a31f76bce6bd9a6e8e1e67.jpg\" style=\" background-color: transparent; touch-action: manipulation; color: rgb(49, 120, 191); text-decoration: none\"><img decoding=\"async\" loading=\"lazy\" class=\"aligncenter size-full wp-image-11365\" src=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/z5101609449802_6de50989a1a31f76bce6bd9a6e8e1e67.jpg\" alt=\"z5101609449802_6de50989a1a31f76bce6bd9a6e8e1e67\" width=\"1280\" height=\"854\" style=\" border-style: none; max-width: 100%; height: auto; display: block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1; clear: both; margin: 0px auto\"></a></h3><h3 style=\" color: rgb(10, 10, 10); width: 840px; margin-bottom: 7px; text-rendering: optimizespeed; font-size: 1.25em; font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\">&#127802;V&#7873; ph&iacute;a H&#7897;i doanh nh&acirc;n tr&#7867; Long An c&oacute;: Anh D&#432;&#417;ng Long Th&agrave;nh &ndash; UV &#272;o&agrave;n ch&#7911; t&#7883;ch DNT Vi&#7879;t Nam &ndash; Ch&#7911; t&#7883;ch H&#7897;i; Anh Nguy&#7877;n Minh T&acirc;m &ndash; UV UBTW H&#7897;i DNT Vi&#7879;t Nam &ndash; PCT Th&#432;&#7901;ng tr&#7921;c H&#7897;i; Anh Tr&#7847;n V&#259;n Quy &ndash; Ph&oacute; Ch&#7911; t&#7883;ch H&#7897;i c&ugrave;ng d&#7921;</h3><h3 style=\" color: rgb(10, 10, 10); width: 840px; margin-bottom: 7px; text-rendering: optimizespeed; font-size: 1.25em; font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\"><a href=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/z5101609450709_b7a12adb48f05254c23721737f224740.jpg\" style=\" background-color: transparent; touch-action: manipulation; color: rgb(49, 120, 191); text-decoration: none\"><img decoding=\"async\" loading=\"lazy\" class=\"aligncenter size-full wp-image-11366\" src=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/z5101609450709_b7a12adb48f05254c23721737f224740.jpg\" alt=\"z5101609450709_b7a12adb48f05254c23721737f224740\" width=\"1152\" height=\"864\" style=\" border-style: none; max-width: 100%; height: auto; display: block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1; clear: both; margin: 0px auto\"></a></h3><h3 style=\" color: rgb(10, 10, 10); width: 840px; margin-bottom: 7px; text-rendering: optimizespeed; font-size: 1.25em; font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\">&#127802;H&#7897;i ngh&#7883; &#273;&atilde; b&aacute;o c&aacute;o t&#7893;ng k&#7871;t n&#259;m 2023, c&aacute;c &#273;&#7841;i bi&#7875;u c&#361;ng &#273;&atilde; c&oacute; nh&#7919;ng &yacute; ki&#7871;n &#273;&#7873; xu&#7845;t gi&#7843;i ph&aacute;p th&uacute;c &#273;&#7849;y phong tr&agrave;o doanh nh&acirc;n tr&#7867; ph&aacute;t tri&#7875;n, ch&#7845;t l&#432;&#7907;ng trong n&#259;m t&#7899;i.</h3><h3 style=\" color: rgb(10, 10, 10); width: 840px; margin-bottom: 7px; text-rendering: optimizespeed; font-size: 1.25em; font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\">&#127802;D&#7883;p n&agrave;y, H&#7897;i ngh&#7883; c&#361;ng &#273;&atilde; hi&#7879;p th&#432;&#417;ng ch&#7885;n c&#7917; 03 t&acirc;n Ph&oacute; Ch&#7911; t&#7883;ch H&#7897;i kh&oacute;a VII: anh D&#432;&#417;ng Long Th&agrave;nh &ndash; CT H&#7897;i DNT Long An c&ugrave;ng v&#7899;i anh L&ecirc; Tr&iacute; Th&ocirc;ng, Ch&#7911; t&#7883;ch H&#7897;i DNT TP.HCM v&agrave; anh &#272;&#7895; H&#7919;u Hu&#7923;nh, Ch&#7911; t&#7883;ch H&#7897;i DNT TP. H&#7843;i Ph&ograve;ng &#273;&atilde; ch&iacute;nh th&#7913;c l&agrave; T&acirc;n Ph&oacute; ch&#7911; t&#7883;ch Trung &#432;&#417;ng H&#7897;i DNT Vi&#7879;t Nam.</h3><h3 style=\" color: rgb(10, 10, 10); width: 840px; margin-bottom: 7px; text-rendering: optimizespeed; font-size: 1.25em; font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\"></h3><figure id=\"attachment_11380\" aria-describedby=\"caption-attachment-11380\" class=\"wp-caption aligncenter\" style=\" display: block; margin: 0px auto 2em; clear: both; max-width: 100%; color: rgb(10, 10, 10); font-family: Montserrat; font-size: 16px; text-align: justify; background-color: rgb(255, 255, 255); width: 1200px\"><a href=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/BACKDROP-MOI4.png\" style=\" background-color: transparent; touch-action: manipulation; color: rgb(49, 120, 191); text-decoration: none\"><img decoding=\"async\" loading=\"lazy\" class=\"wp-image-11380 size-full\" src=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/BACKDROP-MOI4.png\" alt=\"BACKDROP M&#7898;I(4)\" width=\"1200\" height=\"630\" style=\" border-style: none; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1\"></a><figcaption id=\"caption-attachment-11380\" class=\"wp-caption-text\" style=\" display: block; text-align: center; padding: 0.4em; font-size: 0.9em; background: rgba(0, 0, 0, 0.05); font-style: italic\">Anh D&#432;&#417;ng Long Th&agrave;nh &ndash; Ph&oacute; Ch&#7911; t&#7883;ch Trung &#431;&#417;ng H&#7897;i Doanh nh&acirc;n tr&#7867; Vi&#7879;t Nam kh&oacute;a VII &ndash; Ch&#7911; t&#7883;ch H&#7897;i Doanh nh&acirc;n tr&#7867; Long An</figcaption></figure><h3 style=\" color: rgb(10, 10, 10); width: 840px; margin-bottom: 7px; text-rendering: optimizespeed; font-size: 1.25em; font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\"><a href=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/z5101609476114_befb097e49f7df3b4324d40fa5d29d18.jpg\" style=\" background-color: transparent; touch-action: manipulation; color: rgb(49, 120, 191); text-decoration: none\"><img decoding=\"async\" loading=\"lazy\" class=\"aligncenter size-full wp-image-11370\" src=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/z5101609476114_befb097e49f7df3b4324d40fa5d29d18.jpg\" alt=\"z5101609476114_befb097e49f7df3b4324d40fa5d29d18\" width=\"1280\" height=\"854\" style=\" border-style: none; max-width: 100%; height: auto; display: block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1; clear: both; margin: 0px auto\"></a></h3><h3 style=\" color: rgb(10, 10, 10); width: 840px; margin-bottom: 7px; text-rendering: optimizespeed; font-size: 1.25em; font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\">&#127802;T&#7841;i H&#7897;i ngh&#7883;, Anh D&#432;&#417;ng Long Th&agrave;nh chia s&#7867;: &rdquo; &#272;&#432;&#7907;c s&#7921; t&iacute;n nhi&#7879;m v&agrave; tin t&#432;&#7903;ng c&#7911;a Trung &#432;&#417;ng H&#7897;i, t&ocirc;i xin nh&#7853;n tr&aacute;ch nhi&#7879;m c&#7911;ng c&#7889; v&agrave; ph&aacute;t huy h&#417;n n&#7919;a vai tr&ograve; Doanh nh&acirc;n tr&#7867; c&#7911;a c&aacute;c t&#7881;nh khu v&#7921;c T&acirc;y Nam B&#7897; &#273;&#7843;m b&#7843;o t&#432;&#417;ng x&#7913;ng v&#7899;i ti&#7873;m n&#259;ng &#273;ang c&oacute; v&agrave; c&#361;ng mong mu&#7889;n trong th&#7901;i gian t&#7899;i c&aacute;c t&#7881;nh T&acirc;y Nam B&#7897; lu&ocirc;n nh&#7853;n &#273;&#432;&#7907;c c&#7901; thi &#273;ua, b&#7857;ng khen c&#7911;a Trung &#432;&#417;ng H&#7897;i. Mong r&#7857;ng c&aacute;c anh ch&#7883; c&ugrave;ng chung tay &#273;&#7849;y m&#7841;nh phong tr&agrave;o Doanh nh&acirc;n tr&#7867; c&#7911;a m&#7897;t s&#7889; t&#7881;nh T&acirc;y Nam B&#7897; c&ograve;n m&#7899;i v&agrave; g&oacute;p m&#7897;t ph&#7847;n nh&#7887; v&agrave;o ng&ocirc;i nh&agrave; chung Doanh nh&acirc;n tr&#7867; c&#7843; n&#432;&#7899;c ng&agrave;y c&agrave;ng ph&aacute;t tri&#7875;n v&#7919;ng m&#7841;nh&rdquo;.</h3><h3 style=\" color: rgb(10, 10, 10); width: 840px; margin-bottom: 7px; text-rendering: optimizespeed; font-size: 1.25em; font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\">&#127802;H&#7897;i ngh&#7883; c&#361;ng &#273;&atilde; hi&#7879;p th&#432;&#417;ng ch&#7885;n c&#7917; 01 &#7910;y vi&ecirc;n &#272;o&agrave;n Ch&#7911; t&#7883;ch H&#7897;i; ki&#7879;n to&agrave;n v&agrave; b&#7893; sung 22 &#7911;y vi&ecirc;n UBT&#431; H&#7897;i kh&oacute;a VII, trong &#273;&oacute; anh Tr&#7847;n V&#259;n Quy &ndash; Ph&oacute; Ch&#7911; t&#7883;ch H&#7897;i DNT Long An ch&iacute;nh th&#7913;c tr&#7903; th&agrave;nh U&#7927; vi&ecirc;n UBTW H&#7897;i DNT Vi&#7879;t Nam kho&aacute; VII.</h3><figure id=\"attachment_11379\" aria-describedby=\"caption-attachment-11379\" class=\"wp-caption aligncenter\" style=\" display: block; margin: 0px auto 2em; clear: both; max-width: 100%; color: rgb(10, 10, 10); font-family: Montserrat; font-size: 16px; text-align: justify; background-color: rgb(255, 255, 255); width: 1138px\"><a href=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/05.-Trinh-Van-Quy-PCT-Giam-doc-Cong-ty-TNHH-Det-may-Trung-Quy-2024.jpg\" style=\" background-color: transparent; touch-action: manipulation; color: rgb(49, 120, 191); text-decoration: none\"><img decoding=\"async\" loading=\"lazy\" class=\"wp-image-11379 size-full\" src=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/05.-Trinh-Van-Quy-PCT-Giam-doc-Cong-ty-TNHH-Det-may-Trung-Quy-2024.jpg\" alt=\"05. Tr&#7883;nh V&#259;n Quy - PCT - Gi&aacute;m &#273;&#7889;c C&ocirc;ng ty TNHH D&#7879;t may Trung Quy 2024\" width=\"1138\" height=\"1280\" style=\" border-style: none; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1\"></a><figcaption id=\"caption-attachment-11379\" class=\"wp-caption-text\" style=\" display: block; text-align: center; padding: 0.4em; font-size: 0.9em; background: rgba(0, 0, 0, 0.05); font-style: italic\">Anh Tr&#7847;n V&#259;n Quy &ndash; U&#7927; vi&ecirc;n UBTW H&#7897;i DNT Vi&#7879;t Nam kho&aacute; VII &ndash; Ph&oacute; Ch&#7911; t&#7883;ch H&#7897;i DNT Long An</figcaption></figure><h3 style=\" color: rgb(10, 10, 10); width: 840px; margin-bottom: 7px; text-rendering: optimizespeed; font-size: 1.25em; font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\"><a href=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/z5101609481661_858f54b01959985b0089a19b975cd6aa.jpg\" style=\" background-color: transparent; touch-action: manipulation; color: rgb(49, 120, 191); text-decoration: none\"><img decoding=\"async\" loading=\"lazy\" class=\"aligncenter size-full wp-image-11371\" src=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/z5101609481661_858f54b01959985b0089a19b975cd6aa.jpg\" alt=\"z5101609481661_858f54b01959985b0089a19b975cd6aa\" width=\"1280\" height=\"854\" style=\" border-style: none; max-width: 100%; height: auto; display: block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1; clear: both; margin: 0px auto\"></a></h3><h3 style=\" color: rgb(10, 10, 10); width: 840px; margin-bottom: 7px; text-rendering: optimizespeed; font-size: 1.25em; font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\"></h3><h3 style=\" color: rgb(10, 10, 10); width: 840px; margin-bottom: 7px; text-rendering: optimizespeed; font-size: 1.25em; font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\">&#127802;C&#361;ng nh&acirc;n d&#7883;p n&agrave;y, H&#7897;i doanh nh&acirc;n tr&#7867; Long An vinh d&#7921; nh&#7853;n C&#7901; thi &#273;ua xu&#7845;t s&#7855;c n&#259;m 2023, l&agrave; 1 trong cho 38 t&#7853;p th&#7875; &#273;&#432;&#7907;c vinh danh; trao B&#7857;ng khen cho 19 t&#7853;p th&#7875; v&agrave; 51 c&aacute; nh&acirc;n c&oacute; th&agrave;nh t&iacute;ch xu&#7845;t s&#7855;c trong c&ocirc;ng t&aacute;c H&#7897;i n&#259;m 2023.</h3><h3 style=\" color: rgb(10, 10, 10); width: 840px; margin-bottom: 7px; text-rendering: optimizespeed; font-size: 1.25em; font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\"><a href=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/z5101609466795_0c3c71d8ed678e78c9119d643bb51fef.jpg\" style=\" background-color: transparent; touch-action: manipulation; color: rgb(49, 120, 191); text-decoration: none\"><img decoding=\"async\" loading=\"lazy\" class=\"aligncenter size-full wp-image-11369\" src=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/z5101609466795_0c3c71d8ed678e78c9119d643bb51fef.jpg\" alt=\"z5101609466795_0c3c71d8ed678e78c9119d643bb51fef\" width=\"1280\" height=\"853\" style=\" border-style: none; max-width: 100%; height: auto; display: block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1; clear: both; margin: 0px auto\"></a></h3><h3 style=\" color: rgb(10, 10, 10); width: 840px; margin-bottom: 7px; text-rendering: optimizespeed; font-size: 1.25em; font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\"><a href=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/z5101609483567_fb63c0ab0098c2a525be56b06ad38808.jpg\" style=\" background-color: transparent; touch-action: manipulation; text-decoration: none\"><img decoding=\"async\" loading=\"lazy\" class=\"aligncenter size-full wp-image-11372\" src=\"https://doanhnhantrelongan.vn/wp-content/uploads/2024/01/z5101609483567_fb63c0ab0098c2a525be56b06ad38808.jpg\" alt=\"z5101609483567_fb63c0ab0098c2a525be56b06ad38808\" width=\"1152\" height=\"769\" style=\" border-style: none; max-width: 100%; height: auto; display: block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1; clear: both; margin: 0px auto\"></a>&#127802;Hi v&#7885;ng v&#7899;i nh&#7919;ng c&#432;&#417;ng v&#7883; m&#7899;i, H&#7897;i doanh nh&acirc;n tr&#7867; Long An lu&ocirc;n gi&#7919; v&#7919;ng s&#7913; m&#7879;nh v&agrave; ng&agrave;y c&agrave;ng ph&aacute;t tri&#7875;n &#273;&#7875; x&#7913;ng &#273;&aacute;ng v&#7899;i s&#7921; n&#7893; l&#7921;c v&agrave; &#273;&oacute;ng g&oacute;p cho phong tr&agrave;o DNT trong th&#7901;i gian qua, c&ugrave;ng nhau x&acirc;y d&#7921;ng c&#7897;ng &#273;&#7891;ng doanh nh&acirc;n tr&#7867; ng&agrave;y c&agrave;ng l&#7899;n m&#7841;nh.</h3></div>\n','khanh-hoa22012024-anh-duong-long-thanh-chu-tich-hoi-doanh-nhan-tre-long-an-dam-nhan-vi-tri-pho-chu-tich-trung-uong-hoi-doanh-nhan-tre-viet-nam-PNQlBN','2024-04-19-66227a22980c3.webp','2024-04-19-66227a22b9445.webp',0,'Meta dep zai','Meta dep zai','2024-04-18-6620ef35b6307.webp','published',1,1,'2024-04-19 03:00:21','2024-04-19 07:05:22'),(2,'Thư Mời Tham gia Hội Doanh nhân trẻ Long An','Kính Gởi: Quý Anh Chị Lãnh đạo Doanh nghiệp','<div style=\" color: rgb(10, 10, 10); font-family: Montserrat; font-size: 16px; text-align: justify; background-color: rgb(255, 255, 255)\"><a href=\"https://doanhnhantrelongan.vn/wp-content/uploads/2023/09/Thu-ngo-tham-gia-Hoi-9.png\" style=\" background-color: transparent; touch-action: manipulation; color: rgb(49, 120, 191); text-decoration: none\"><br class=\"Apple-interchange-newline\"><img decoding=\"async\" class=\"aligncenter size-full wp-image-10676\" src=\"https://doanhnhantrelongan.vn/wp-content/uploads/2023/09/Thu-ngo-tham-gia-Hoi-9.png\" alt=\"Th&#432; ng&#7887; tham gia H&#7897;i (9)\" width=\"992\" height=\"1403\" style=\" border-style: none; max-width: 100%; height: auto; display: block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1; clear: both; margin: 0px auto\"></a><div style=\" color: rgb(10, 10, 10); font-family: Montserrat; font-size: 16px; text-align: justify; background-color: rgb(255, 255, 255)\"></div><div style=\" color: rgb(10, 10, 10); font-family: Montserrat; font-size: 16px; text-align: justify; background-color: rgb(255, 255, 255)\"><span style=\" font-size: 17.6px\"><span style=\" color: rgb(0, 0, 255)\"><b style=\" font-weight: bolder\">Ban Ch&#7845;p h&agrave;nh H&#7897;i Doanh nh&acirc;n tr&#7867; Long An</b></span><span>&nbsp;</span>xin &#273;&#432;&#7907;c g&#7903;i &#273;&#7871;n<span>&nbsp;</span><strong style=\" font-weight: bolder\"><span style=\" color: rgb(255, 0, 0)\">Qu&yacute; Anh Ch&#7883; Doanh nh&acirc;n &ndash; Doanh nghi&#7879;p</span></strong><span>&nbsp;</span>l&#7901;i ch&agrave;o tr&acirc;n tr&#7885;ng, l&#7901;i K&iacute;nh ch&uacute;c S&#7913;c kh&#7887;e, An khang v&agrave; Th&#7883;nh v&#432;&#7907;ng!</span></div><blockquote style=\" margin: 0px 0px 1.25em; position: relative; font-size: 1.2em; padding: 0px 1.25em 0px 1.875em; border-left: 2px solid rgb(49, 120, 191); font-style: italic; color: rgb(51, 51, 51); border-top-color: rgb(49, 120, 191); border-right-color: rgb(49, 120, 191); border-bottom-color: rgb(49, 120, 191); font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\"><p style=\" margin-bottom: 1.3em\"><span style=\" font-size: 21.12px\"><b style=\" font-weight: bolder\">K&iacute;nh th&#432;a<span>&nbsp;</span><span style=\" color: rgb(255, 0, 0)\">Qu&yacute; Anh Ch&#7883; Doanh nh&acirc;n &ndash; Doanh nghi&#7879;p</span>,</b></span><br><span style=\" font-size: 21.12px\"><span style=\" color: rgb(0, 0, 255)\"><b style=\" font-weight: bolder\">H&#7897;i Doanh nh&acirc;n tr&#7867; Long An</b></span><span>&nbsp;</span>(sau &#273;&acirc;y vi&#7871;t t&#7855;t l&agrave; H&#7897;i) &ndash; l&agrave; t&#7893; ch&#7913;c x&atilde; h&#7897;i ngh&#7873; nghi&#7879;p, ho&#7841;t &#273;&#7897;ng theo &#272;i&#7873;u l&#7879; H&#7897;i, &#273;&#432;&#7907;c ph&ecirc; duy&#7879;t theo Quy&#7871;t &#273;&#7883;nh c&#7911;a Ch&#7911; t&#7883;ch UBND t&#7881;nh Long An v&agrave; ho&#7841;t &#273;&#7897;ng theo h&#7879; th&#7889;ng H&#7897;i Doanh nh&acirc;n tr&#7867; Vi&#7879;t Nam.</span><br><span style=\" font-size: 21.12px\">&nbsp; &nbsp; &nbsp;V&#7899;i kh&#7849;u hi&#7879;u:<b style=\" font-weight: bolder\"><span style=\" color: rgb(0, 0, 255)\"><span>&nbsp;</span>&ldquo;&#272;o&agrave;n k&#7871;t &ndash; Ti&ecirc;n phong &ndash; &#272;&#7893;i m&#7899;i &ndash; Ph&aacute;t tri&#7875;n&rdquo;</span>,<span>&nbsp;</span><span style=\" color: rgb(0, 0, 255)\">H&#7897;i Doanh nh&acirc;n tr&#7867; Long An</span></b><span>&nbsp;</span>th&agrave;nh l&#7853;p v&agrave; ph&aacute;t huy vai tr&ograve; trong c&aacute;c ho&#7841;t &#273;&#7897;ng nh&#7857;m m&#7909;c &#273;&iacute;ch:</span><br><span style=\" font-size: 21.12px\">&nbsp;&ndash; &#272;&#7841;i di&#7879;n cho l&#7921;c l&#432;&#7907;ng Doanh nghi&#7879;p tr&#7867; trong c&aacute;c m&#7889;i quan h&#7879; &#272;&#7889;i n&#7897;i, &#272;&#7889;i ngo&#7841;i nh&#7857;m th&aacute;o g&#7905; kh&oacute; kh&#259;n v&agrave; &#273;&#432;a ra nh&#7919;ng gi&#7843;i ph&aacute;p hi&#7879;u qu&#7843; gi&uacute;p c&#7843;i thi&#7879;n m&ocirc;i tr&#432;&#7901;ng kinh doanh cho Doanh nghi&#7879;p.</span><br><span style=\" font-size: 21.12px\">&nbsp;&ndash; Tri&#7875;n khai c&aacute;c ch&#432;&#417;ng tr&igrave;nh &#273;&agrave;o t&#7841;o t&#432; v&#7845;n tr&#7921;c ti&#7871;p cho c&aacute;c doanh nghi&#7879;p v&#7873; t&aacute;i c&#7845;u tr&uacute;c Doanh nghi&#7879;p, c&#7843;i ti&#7871;n c&ocirc;ng ngh&#7879;, n&#259;ng l&#7921;c qu&#7843;n l&yacute; &#273;i&#7873;u h&agrave;nh doanh nghi&#7879;p, n&acirc;ng cao n&#259;ng su&#7845;t lao &#273;&#7897;ng cho c&aacute;c Doanh nghi&#7879;p H&#7897;i vi&ecirc;n.</span><br><span style=\" font-size: 21.12px\">&nbsp;&ndash; H&#7897;i l&agrave; c&#7847;u n&#7889;i gi&#7843;i quy&#7871;t nh&#7919;ng kh&oacute; kh&#259;n trong vi&#7879;c &#273;&#7873; xu&#7845;t ki&#7871;n ngh&#7883;, x&acirc;y d&#7921;ng c&#417; ch&#7871; ch&iacute;nh s&aacute;ch c&#7911;a Doanh nghi&#7879;p v&#7899;i c&aacute;c c&#417; quan Qu&#7843;n l&yacute; nh&agrave; n&#432;&#7899;c v&agrave; Ch&iacute;nh quy&#7873;n c&aacute;c c&#7845;p nh&#7857;m th&uacute;c &#273;&#7849;y ph&aacute;t tri&#7875;n Doanh nghi&#7879;p li&ecirc;n k&#7871;t v&#7899;i Doanh nghi&#7879;p c&aacute;c H&#7897;i trong v&agrave; ngo&agrave;i n&#432;&#7899;c.</span></p><p style=\" margin-bottom: 1.3em\"><span style=\" font-size: 21.12px\"><b style=\" font-weight: bolder\">Tham gia<span>&nbsp;</span><span style=\" color: rgb(0, 0, 255)\">H&#7897;i Doanh nh&acirc;n tr&#7867; Long An</span>, H&#7897;i vi&ecirc;n s&#7869; &#273;&#432;&#7907;c h&#7895; tr&#7907; v&agrave; h&#432;&#7903;ng c&aacute;c Quy&#7873;n l&#7907;i sau:</b></span><br><span style=\" font-size: 21.12px\">&nbsp;&ndash; &#272;&#432;&#7907;c h&#7895; tr&#7907; li&ecirc;n k&#7871;t, k&#7871;t n&#7889;i giao th&#432;&#417;ng v&#7899;i c&aacute;c Doanh nghi&#7879;p c&#7911;a H&#7897;i Doanh nh&acirc;n tr&#7867; t&#7841;i 63 t&#7881;nh, th&agrave;nh tr&ecirc;n c&#7843; n&#432;&#7899;c.</span><br><span style=\" font-size: 21.12px\">&nbsp;&ndash; &#272;&#432;&#7907;c cung c&#7845;p c&aacute;c th&ocirc;ng tin v&#7873; ho&#7841;t &#273;&#7897;ng c&#7911;a H&#7897;i, Doanh nghi&#7879;p H&#7897;i vi&ecirc;n v&agrave; th&ocirc;ng tin v&#7873; c&#417; h&#7897;i giao th&#432;&#417;ng, k&#7871;t n&#7889;i, x&uacute;c ti&#7871;n th&#432;&#417;ng m&#7841;i.</span><br><span style=\" font-size: 21.12px\">&nbsp;&ndash; &#272;&#432;&#7907;c gi&#7899;i thi&#7879;u, qu&#7843;ng c&aacute;o s&#7843;n ph&#7849;m, d&#7883;ch v&#7909; v&agrave; ph&#7893; bi&#7871;n th&ocirc;ng tin c&#7911;a Doanh nghi&#7879;p tr&ecirc;n c&aacute;c trang truy&#7873;n th&ocirc;ng c&#7911;a H&#7897;i nh&#432; Facebook, Zalo, Fanpage, Website&hellip;</span><br><span style=\" font-size: 21.12px\">&nbsp;&ndash; &#272;&#432;&#7907;c H&#7897;i &#273;&#7873; c&#7917; tham gia c&aacute;c gi&#7843;i th&#432;&#7903;ng t&ocirc;n vinh Doanh nghi&#7879;p ti&ecirc;u bi&#7875;u ho&#7863;c s&#7843;n ph&#7849;m Doanh nghi&#7879;p &#273;&#7875; kh&#7859;ng &#273;&#7883;nh v&agrave; n&acirc;ng cao th&#432;&#417;ng hi&#7879;u c&#7911;a Doanh nh&acirc;n &ndash; Doanh nghi&#7879;p th&ocirc;ng qua c&aacute;c gi&#7843;i th&#432;&#7903;ng uy t&iacute;n do Trung &#431;&#417;ng &ndash; B&#7897;, Ng&agrave;nh &ndash; &#272;&#7883;a ph&#432;&#417;ng t&#7893; ch&#7913;c.</span><br><span style=\" font-size: 21.12px\">&nbsp;&ndash; T&#259;ng c&#432;&#7901;ng c&#417; h&#7897;i giao l&#432;u, ph&aacute;t tri&#7875;n m&#7903; r&#7897;ng m&#7889;i quan h&#7879; v&#7899;i C&#7897;ng &#273;&#7891;ng Doanh nh&acirc;n tr&#7867; Long An n&oacute;i ri&ecirc;ng v&agrave; Doanh nh&acirc;n tr&#7867; c&#7843; n&#432;&#7899;c n&oacute;i chung &#273;&#7875; qu&#7843;ng b&aacute; th&#432;&#417;ng hi&#7879;u &ndash; s&#7843;n ph&#7849;m &ndash; d&#7883;ch v&#7909; c&#7911;a Doanh nghi&#7879;p tr&ecirc;n th&#7883; tr&#432;&#7901;ng kinh t&#7871; h&#7897;i nh&#7853;p trong v&agrave; ngo&agrave;i n&#432;&#7899;c.</span></p><p style=\" margin-bottom: 1.3em\"><span style=\" font-size: 21.12px\"><span style=\" color: rgb(0, 0, 255)\"><b style=\" font-weight: bolder\">Ban Ch&#7845;p H&agrave;nh H&#7897;i Doanh nh&acirc;n tr&#7867; Long An</b></span><span>&nbsp;</span>tr&acirc;n tr&#7885;ng k&iacute;nh m&#7901;i<span>&nbsp;</span><span style=\" color: rgb(255, 0, 0)\"><strong style=\" font-weight: bolder\">Qu&yacute; Anh Ch&#7883; Doanh nh&acirc;n &ndash; Doanh nghi&#7879;p</strong></span><span>&nbsp;</span>quan t&acirc;m t&igrave;m hi&#7875;u v&agrave; tham gia H&#7897;i. H&atilde;y &#273;&#7875;<span>&nbsp;</span><strong style=\" font-weight: bolder\"><span style=\" color: rgb(0, 0, 255)\">H&#7897;i Doanh nh&acirc;n tr&#7867; Long An</span></strong><span>&nbsp;</span>lu&ocirc;n &#273;&#7891;ng h&agrave;nh c&ugrave;ng Qu&yacute; Doanh nh&acirc;n &ndash; Doanh nghi&#7879;p t&#7841;o c&#417; h&#7897;i k&#7871;t n&#7889;i v&#7899;i t&#7845;t c&#7843; Doanh nh&acirc;n tr&#7867; tr&ecirc;n c&#7843; n&#432;&#7899;c trong c&ocirc;ng cu&#7897;c ph&aacute;t tri&#7875;n Doanh nghi&#7879;p, v&#7919;ng ti&#7871;n h&#7897;i nh&#7853;p, g&oacute;p ph&#7847;n x&acirc;y d&#7921;ng qu&ecirc; h&#432;&#417;ng &#273;&#7845;t n&#432;&#7899;c, &#273;&#7883;a ph&#432;&#417;ng Long An ng&agrave;y c&agrave;ng ph&#7891;n vinh, h&#432;ng th&#7883;nh v&agrave; gi&agrave;u &#273;&#7865;p.</span><br><span style=\" font-size: 21.12px\"><b style=\" font-weight: bolder\">&nbsp;K&iacute;nh ch&uacute;c Qu&yacute; Anh Ch&#7883; Doanh nh&acirc;n &ndash; Doanh nghi&#7879;p th&#7853;t nhi&#7873;u s&#7913;c kh&#7887;e, h&#7841;nh ph&uacute;c v&agrave; th&agrave;nh &#273;&#7841;t.</b></span></p><p style=\" margin-bottom: 1.3em\"><span style=\" font-size: 21.12px\"><b style=\" font-weight: bolder\">M&#7885;i chi ti&#7871;t xin vui l&ograve;ng li&ecirc;n h&#7879; V&#259;n ph&ograve;ng H&#7897;i Doanh nh&acirc;n tr&#7867; Long An:</b></span><br><span style=\" font-size: 21.12px\"><img decoding=\"async\" class=\"an1 CToWUd\" src=\"https://fonts.gstatic.com/s/e/notoemoji/15.0/1f4cc/32.png\" alt=\"&#128204;\" data-emoji=\"&#128204;\" aria-label=\"&#128204;\" data-bit=\"iit\" style=\" border-style: none; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1\">VPGD: T&ograve;a nh&agrave; Th&#7855;ng L&#7907;i Plaza, KDC Th&#7855;ng L&#7907;i Central Hill, &#7844;p 3, x&atilde; Ph&#432;&#7899;c L&#7907;i, B&#7871;n L&#7913;c, Long An</span><br><span style=\" font-size: 21.12px\"><img decoding=\"async\" class=\"an1 CToWUd\" src=\"https://fonts.gstatic.com/s/e/notoemoji/15.0/1f3e2/32.png\" alt=\"&#127970;\" data-emoji=\"&#127970;\" aria-label=\"&#127970;\" data-bit=\"iit\" style=\" border-style: none; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1\">V&#259;n ph&ograve;ng: L&#7847;u 5, T&ograve;a nh&agrave; kh&#7889;i c&#417; quan, s&#7889; 02, &#273;&#432;&#7901;ng Song H&agrave;nh, P.6, TP. T&acirc;n An, Long An.</span><br><span style=\" font-size: 21.12px\"><img decoding=\"async\" class=\"an1 CToWUd\" src=\"https://fonts.gstatic.com/s/e/notoemoji/15.0/260e/32.png\" alt=\"&#9742;\" data-emoji=\"&#9742;\" aria-label=\"&#9742;\" data-bit=\"iit\" style=\" border-style: none; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1\">Hotline: Tel/Viber/Zalo: 0934 002 097 (Th&#432; k&yacute; H&#7897;i) &ndash; 0944 633 933 Mr C&#432;&#7901;ng (CVP H&#7897;i)</span><br><span style=\" font-size: 21.12px\"><img decoding=\"async\" class=\"an1 CToWUd\" src=\"https://fonts.gstatic.com/s/e/notoemoji/15.0/1f4e7/32.png\" alt=\"&#128231;\" data-emoji=\"&#128231;\" aria-label=\"&#128231;\" data-bit=\"iit\" style=\" border-style: none; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1\">Email:<span>&nbsp;</span><a href=\"mailto:vanphong@doanhnhantrelongan.vn\" target=\"_blank\" rel=\"noopener\" style=\" background-color: transparent; touch-action: manipulation; text-decoration: none\">vanphong@doanhnhantrelongan.vn</a></span><br><span style=\" font-size: 21.12px\"><img decoding=\"async\" class=\"an1 CToWUd\" src=\"https://fonts.gstatic.com/s/e/notoemoji/15.0/1f530/32.png\" alt=\"&#128304;\" data-emoji=\"&#128304;\" aria-label=\"&#128304;\" data-bit=\"iit\" style=\" border-style: none; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1\"><span>&nbsp;</span>Youtube:<span>&nbsp;</span><a href=\"https://www.youtube.com/@doanhnhantrelongan\" target=\"_blank\" rel=\"noopener\" data-saferedirecturl=\"https://www.google.com/url?q=https://www.youtube.com/@doanhnhantrelongan&amp;source=gmail&amp;ust=1694438421722000&amp;usg=AOvVaw1J_xsfwl7S8sxvpu1UzcbO\" style=\" background-color: transparent; touch-action: manipulation; text-decoration: none\">https://www.youtube.com/@<wbr>doanhnhantrelongan</wbr></a></span><br><span style=\" font-size: 21.12px\"><img decoding=\"async\" class=\"an1 CToWUd\" src=\"https://fonts.gstatic.com/s/e/notoemoji/15.0/1f530/32.png\" alt=\"&#128304;\" data-emoji=\"&#128304;\" aria-label=\"&#128304;\" data-bit=\"iit\" style=\" border-style: none; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1\"><span>&nbsp;</span>Tiktok:<span>&nbsp;</span><a href=\"https://www.tiktok.com/@doanhnhantrelongan\" target=\"_blank\" rel=\"noopener\" data-saferedirecturl=\"https://www.google.com/url?q=https://www.tiktok.com/@doanhnhantrelongan&amp;source=gmail&amp;ust=1694438421722000&amp;usg=AOvVaw3nFQfYpG_JF3UXt9jxZ1oT\" style=\" background-color: transparent; touch-action: manipulation; text-decoration: none\">https://www.tiktok.com/@<wbr>doanhnhantrelongan</wbr></a></span><br><span style=\" font-size: 21.12px\"><img decoding=\"async\" class=\"an1 CToWUd\" src=\"https://fonts.gstatic.com/s/e/notoemoji/15.0/1f530/32.png\" alt=\"&#128304;\" data-emoji=\"&#128304;\" aria-label=\"&#128304;\" data-bit=\"iit\" style=\" border-style: none; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1\"><span>&nbsp;</span>Facebook:<span>&nbsp;</span><a href=\"https://www.facebook.com/doanhnhantrelongan\" target=\"_blank\" rel=\"noopener\" data-saferedirecturl=\"https://www.google.com/url?q=https://www.facebook.com/doanhnhantrelongan&amp;source=gmail&amp;ust=1694438421722000&amp;usg=AOvVaw25ioa2RZNQrg5A0f95-6gK\" style=\" background-color: transparent; touch-action: manipulation; text-decoration: none\">https://www.facebook.com/<wbr>doanhnhantrelongan</wbr></a></span><br><span style=\" font-size: 21.12px\"><img decoding=\"async\" class=\"an1 CToWUd\" src=\"https://fonts.gstatic.com/s/e/notoemoji/15.0/1f30d/32.png\" alt=\"&#127757;\" data-emoji=\"&#127757;\" aria-label=\"&#127757;\" data-bit=\"iit\" style=\" border-style: none; max-width: 100%; height: auto; display: inline-block; vertical-align: middle; transition: opacity 1s ease 0s; opacity: 1\">Website:<span>&nbsp;</span><a href=\"https://doanhnhantrelongan.vn/\" target=\"_blank\" rel=\"noopener\" data-saferedirecturl=\"https://www.google.com/url?q=https://doanhnhantrelongan.vn/&amp;source=gmail&amp;ust=1694438421722000&amp;usg=AOvVaw1eH2Y7ExdmnnRZz1FozHrQ\" style=\" background-color: transparent; touch-action: manipulation; text-decoration: none\">https://doanhnhantrelongan.vn/</a></span></p></blockquote><p style=\" margin-bottom: 1.3em; color: rgb(10, 10, 10); font-family: Montserrat; font-size: 16px; text-align: justify; background-color: rgb(255, 255, 255)\"><span style=\" font-size: 17.6px\">&nbsp;<strong style=\" font-weight: bolder\"><span>&nbsp;</span>&nbsp; &#272;&#417;n &#272;&#259;ng k&yacute; tham gia H&#7897;i v&agrave; H&#7879; sinh th&aacute;i Doanh nh&acirc;n tr&#7867; Long An:</strong></span></p><blockquote style=\" margin: 0px 0px 1.25em; position: relative; font-size: 1.2em; padding: 0px 1.25em 0px 1.875em; border-left: 2px solid rgb(49, 120, 191); font-style: italic; color: rgb(51, 51, 51); border-top-color: rgb(49, 120, 191); border-right-color: rgb(49, 120, 191); border-bottom-color: rgb(49, 120, 191); font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\"><p class=\"alt-font\" style=\' margin-bottom: 1.3em; font-family: \"Dancing Script\", sans-serif\'><span style=\" font-size: 21.12px\"><strong style=\" font-weight: bolder\">DOWLOAD T&#7840;I &#272;&Acirc;Y:</strong></span></p><p style=\" margin-bottom: 1.3em\"><span style=\" font-size: 21.12px\"><strong style=\" font-weight: bolder\"><a href=\"https://drive.google.com/drive/u/0/folders/1V_mBDkiyZWKdaq2Jfy_elJr6RTmLsult\" style=\" background-color: transparent; touch-action: manipulation; color: rgb(49, 120, 191); text-decoration: none\">https://drive.google.com/drive/u/0/folders/1V_mBDkiyZWKdaq2Jfy_elJr6RTmLsult</a></strong></span></p></blockquote><div id=\"h5vp66227a905d919\" class=\"pdfp_wrapper\" style=\" margin: 0px auto; color: rgb(10, 10, 10); font-family: Montserrat; font-size: 16px; text-align: justify; background-color: rgb(255, 255, 255)\"><div class=\"cta_wrapper\"><p style=\" margin-bottom: 1.3em\">File name : Don-Dang-ky-tham-gia-Hoi.pdf</p><p style=\" margin-bottom: 1.3em\"><a class=\"fullscreenBtn\" href=\"https://doanhnhantrelongan.vn/wp-content/plugins/pdf-poster/pdfjs/web/viewer.html?file=https://doanhnhantrelongan.vn/wp-content/uploads/2023/09/Don-Dang-ky-tham-gia-Hoi.pdf&amp;download=true&amp;print=true&amp;openfile=false\" style=\" background-color: transparent; touch-action: manipulation; color: rgb(49, 120, 191); text-decoration: none\"><button style=\" font-style: inherit; font-variant: inherit; font-weight: bolder; font-stretch: inherit; font-size: 0.97em; line-height: 2.4em; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; overflow: visible; cursor: pointer; appearance: button; touch-action: manipulation; position: relative; display: inline-block; background-color: transparent; letter-spacing: 0.03em; text-align: center; color: currentcolor; text-decoration: none; border: 1px solid transparent; vertical-align: middle; margin-right: 1em; text-shadow: none; min-height: 2.5em; padding: 0px 1.2em; max-width: 100%; transition: transform 0.3s ease 0s, border 0.3s ease 0s, background 0.3s ease 0s, box-shadow 0.3s ease 0s, opacity 0.3s ease 0s, color 0.3s ease 0s, -webkit-transform 0.3s ease 0s, -webkit-box-shadow 0.3s ease 0s; text-rendering: optimizelegibility; margin-bottom: 1em\">View Fullscreen</button></a></p></div><div class=\"iframe_wrapper\"><iframe loading=\"lazy\" width=\"100%\" height=\"842px\" src=\"https://doanhnhantrelongan.vn/wp-content/plugins/pdf-poster/pdfjs/web/viewer.html?file=https://doanhnhantrelongan.vn/wp-content/uploads/2023/09/Don-Dang-ky-tham-gia-Hoi.pdf&amp;download=true&amp;print=true&amp;openfile=false\" style=\" max-width: 100%; width: 840px\"></iframe></div></div><blockquote style=\" margin: 0px 0px 1.25em; position: relative; font-size: 1.2em; padding: 0px 1.25em 0px 1.875em; border-left: 2px solid rgb(49, 120, 191); font-style: italic; color: rgb(51, 51, 51); border-top-color: rgb(49, 120, 191); border-right-color: rgb(49, 120, 191); border-bottom-color: rgb(49, 120, 191); font-family: Montserrat; text-align: justify; background-color: rgb(255, 255, 255)\"><br class=\"Apple-interchange-newline\">\r\n</blockquote></div>\n','thu-moi-tham-gia-hoi-doanh-nhan-tre-long-an-7FH3xr','2024-04-19-66227ab8497e7.webp','2024-04-18-6620ef3590ae9.webp',0,'Meta dep zai','Meta dep zai','2024-04-18-6620ef35b6307.webp','published',1,1,'2024-04-20 03:00:21','2024-04-19 07:07:52'),(3,'cHoàng Hải Dương','123123123123123123123123123123123123','<h2>MyTitleMyTitleMyTitleMyTitleMyTitleMyTitleMyTitle<p>Paragraph 1 </p><p><br></p><div style=\"text-align: left;\"><img style=\"width: 25%;\" src=\"http://localhost:8080/storage/app/public/posts/images/2024-04-18-6620ef339bd28.webp\"></div><p>Paragraph 2 </p><p>Paragraph 3 </p><p><br></p><div style=\"text-align: left;\"><img style=\"max-width: 80%;\" src=\"http://localhost:8080/storage/app/public/posts/images/2024-04-18-6620ef33a154d.webp\"></div><p>Paragraph 4 </p><p><br></p><div style=\"text-align: right;\"><img style=\"max-width: 80%;\" src=\"http://localhost:8080/storage/app/public/posts/images/2024-04-18-6620ef33a450e.webp\"></div><p>Paragraph 5 </p></h2>\n','hoang-hai-duong-wPbjTi3','2024-04-18-6620fe3cb8bf2.webp','2024-04-18-6620ef3590ae9.webp',0,'Meta dep zai','Meta dep zai','2024-04-18-6620ef35b6307.webp','published',1,2,'2024-04-21 03:00:21','2024-04-18 03:00:21'),(4,'dHoàng Hải Dương','123123123123123123123123123123123123','<h2>MyTitleMyTitleMyTitleMyTitleMyTitleMyTitleMyTitle<p>Paragraph 1 </p><p><br></p><div style=\"text-align: left;\"><img style=\"width: 25%;\" src=\"http://localhost:8080/storage/app/public/posts/images/2024-04-18-6620ef339bd28.webp\"></div><p>Paragraph 2 </p><p>Paragraph 3 </p><p><br></p><div style=\"text-align: left;\"><img style=\"max-width: 80%;\" src=\"http://localhost:8080/storage/app/public/posts/images/2024-04-18-6620ef33a154d.webp\"></div><p>Paragraph 4 </p><p><br></p><div style=\"text-align: right;\"><img style=\"max-width: 80%;\" src=\"http://localhost:8080/storage/app/public/posts/images/2024-04-18-6620ef33a450e.webp\"></div><p>Paragraph 5 </p></h2>\n','hoang-hai-duong-wPbjTi4','2024-04-18-6620fe3cb8bf2.webp','2024-04-18-6620ef3590ae9.webp',0,'Meta dep zai','Meta dep zai','2024-04-18-6620ef35b6307.webp','published',1,1,'2024-04-18 03:00:21','2024-04-18 03:00:21'),(5,'eHoàng Hải Dương','123123123123123123123123123123123123','<h2>MyTitleMyTitleMyTitleMyTitleMyTitleMyTitleMyTitle<p>Paragraph 1 </p><p><br></p><div style=\"text-align: left;\"><img style=\"width: 25%;\" src=\"http://localhost:8080/storage/app/public/posts/images/2024-04-18-6620ef339bd28.webp\"></div><p>Paragraph 2 </p><p>Paragraph 3 </p><p><br></p><div style=\"text-align: left;\"><img style=\"max-width: 80%;\" src=\"http://localhost:8080/storage/app/public/posts/images/2024-04-18-6620ef33a154d.webp\"></div><p>Paragraph 4 </p><p><br></p><div style=\"text-align: right;\"><img style=\"max-width: 80%;\" src=\"http://localhost:8080/storage/app/public/posts/images/2024-04-18-6620ef33a450e.webp\"></div><p>Paragraph 5 </p></h2>\n','hoang-hai-duong-wPbjTi5','2024-04-18-6620fe3cb8bf2.webp','2024-04-18-6620ef3590ae9.webp',0,'Meta dep zai','Meta dep zai','2024-04-18-6620ef35b6307.webp','published',1,1,'2024-04-18 03:00:21','2024-04-18 03:00:21'),(6,'fHoàng Hải Dương','123123123123123123123123123123123123','<h2>MyTitleMyTitleMyTitleMyTitleMyTitleMyTitleMyTitle<p>Paragraph 1 </p><p><br></p><div style=\"text-align: left;\"><img style=\"width: 25%;\" src=\"http://localhost:8080/storage/app/public/posts/images/2024-04-18-6620ef339bd28.webp\"></div><p>Paragraph 2 </p><p>Paragraph 3 </p><p><br></p><div style=\"text-align: left;\"><img style=\"max-width: 80%;\" src=\"http://localhost:8080/storage/app/public/posts/images/2024-04-18-6620ef33a154d.webp\"></div><p>Paragraph 4 </p><p><br></p><div style=\"text-align: right;\"><img style=\"max-width: 80%;\" src=\"http://localhost:8080/storage/app/public/posts/images/2024-04-18-6620ef33a450e.webp\"></div><p>Paragraph 5 </p></h2>\n','hoang-hai-duong-wPbjTi6','2024-04-18-6620fe3cb8bf2.webp','2024-04-18-6620ef3590ae9.webp',0,'Meta dep zai','Meta dep zai','2024-04-18-6620ef35b6307.webp','published',1,1,'2024-04-18 03:00:21','2024-04-18 03:00:21'),(7,'gHoàng Hải Dương','123123123123123123123123123123123123','<h2>MyTitleMyTitleMyTitleMyTitleMyTitleMyTitleMyTitle<p>Paragraph 1 </p><p><br></p><div style=\"text-align: left;\"><img style=\"width: 25%;\" src=\"http://localhost:8080/storage/app/public/posts/images/2024-04-18-6620ef339bd28.webp\"></div><p>Paragraph 2 </p>...','hoang-hai-duong-wPbjTi7','2024-04-18-6620fe3cb8bf2.webp','2024-04-18-6620ef3590ae9.webp',0,'Meta dep zai','Meta dep zai','2024-04-18-6620ef35b6307.webp','published',1,1,'2024-04-18 03:00:21','2024-04-18 03:00:21'),(8,'hHoàng Hải Dương','123123123123123123123123123123123123','<h2>MyTitleMyTitleMyTitleMyTitleMyTitleMyTitleMyTitle<p>Paragraph 1 </p><p><br></p><div style=\"text-align: left;\"><img style=\"width: 25%;\" src=\"http://localhost:8080/storage/app/public/posts/images/2024-04-18-6620ef339bd28.webp\"></div><p>Paragraph 2 </p>...','hoang-hai-duong-wPbjTi8','2024-04-18-6620fe3cb8bf2.webp','2024-04-18-6620ef3590ae9.webp',0,'Meta dep zai','Meta dep zai','2024-04-18-6620ef35b6307.webp','published',1,2,'2024-04-18 03:00:21','2024-04-18 03:00:21'),(9,'jHoàng Hải Dương','123123123123123123123123123123123123','<h2>MyTitleMyTitleMyTitleMyTitleMyTitleMyTitleMyTitle<p>Paragraph 1 </p><p><br></p><div style=\"text-align: left;\"><img style=\"width: 25%;\" src=\"http://localhost:8080/storage/app/public/posts/images/2024-04-18-6620ef339bd28.webp\"></div><p>Paragraph 2 </p>...','hoang-hai-duong-wPbjTi9','2024-04-18-6620fe3cb8bf2.webp','2024-04-18-6620ef3590ae9.webp',0,'Meta dep zai','Meta dep zai','2024-04-18-6620ef35b6307.webp','published',1,1,'2024-04-18 03:00:21','2024-04-18 03:00:21'),(10,'kHoàng Hải Dương','123123123123123123123123123123123123','<h2>MyTitleMyTitleMyTitleMyTitleMyTitleMyTitleMyTitle<p>Paragraph 1 </p><p><br></p><div style=\"text-align: left;\"><img style=\"width: 25%;\" src=\"http://localhost:8080/storage/app/public/posts/images/2024-04-18-6620ef339bd28.webp\"></div><p>Paragraph 2 </p>...','hoang-hai-duong-wPbjTi10','2024-04-18-6620fe3cb8bf2.webp','2024-04-18-6620ef3590ae9.webp',0,'Meta dep zai','Meta dep zai','2024-04-18-6620ef35b6307.webp','published',1,1,'2024-04-18 03:00:21','2024-04-18 03:00:21'),(11,'lHoàng Hải Dương','123123123123123123123123123123123123','<h2>MyTitleMyTitleMyTitleMyTitleMyTitleMyTitleMyTitle<p>Paragraph 1 </p><p><br></p><div style=\"text-align: left;\"><img style=\"width: 25%;\" src=\"http://localhost:8080/storage/app/public/posts/images/2024-04-18-6620ef339bd28.webp\"></div><p>Paragraph 2 </p>...','hoang-hai-duong-wPbjTi11','2024-04-18-6620fe3cb8bf2.webp','2024-04-18-6620ef3590ae9.webp',0,'Meta dep zai','Meta dep zai','2024-04-18-6620ef35b6307.webp','published',1,1,'2024-04-18 03:00:21','2024-04-18 03:00:21');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_compares`
--

DROP TABLE IF EXISTS `product_compares`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_compares` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL COMMENT 'customer_id',
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_compares`
--

LOCK TABLES `product_compares` WRITE;
/*!40000 ALTER TABLE `product_compares` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_compares` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_stocks`
--

DROP TABLE IF EXISTS `product_stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_stocks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint DEFAULT NULL,
  `variant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT '0.00',
  `qty` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_stocks`
--

LOCK TABLES `product_stocks` WRITE;
/*!40000 ALTER TABLE `product_stocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_tag`
--

DROP TABLE IF EXISTS `product_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_tag` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `tag_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tag`
--

LOCK TABLES `product_tag` WRITE;
/*!40000 ALTER TABLE `product_tag` DISABLE KEYS */;
INSERT INTO `product_tag` VALUES (1,1,1,NULL,NULL),(2,2,2,NULL,NULL),(3,5,3,NULL,NULL),(5,7,5,NULL,NULL);
/*!40000 ALTER TABLE `product_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `added_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'physical',
  `category_ids` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_sub_category_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` bigint DEFAULT NULL,
  `unit` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_qty` int NOT NULL DEFAULT '1',
  `refundable` tinyint(1) NOT NULL DEFAULT '1',
  `digital_product_type` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `digital_file_ready` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `color_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flash_deal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_provider` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colors` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `variant_product` tinyint(1) NOT NULL DEFAULT '0',
  `attributes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choice_options` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `variation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `unit_price` double NOT NULL DEFAULT '0',
  `purchase_price` double NOT NULL DEFAULT '0',
  `tax` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.00',
  `tax_type` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_model` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'exclude',
  `discount` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.00',
  `discount_type` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_stock` int DEFAULT NULL,
  `minimum_order_qty` int NOT NULL DEFAULT '1',
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `free_shipping` tinyint(1) NOT NULL DEFAULT '0',
  `attachment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `featured_status` tinyint(1) NOT NULL DEFAULT '1',
  `meta_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_status` tinyint(1) NOT NULL DEFAULT '0',
  `denied_note` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` double(8,2) DEFAULT NULL,
  `multiply_qty` tinyint(1) DEFAULT NULL,
  `temp_shipping_cost` double(8,2) DEFAULT NULL,
  `is_shipping_cost_updated` tinyint(1) DEFAULT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'seller',2,'THANH LONG TRẮNG SẤY GIÒN HG','thanh-long-trang-say-gion-hg-2L6WkM','physical','[{\"id\":\"3\",\"position\":1}]','3',NULL,NULL,1,'kg',1,1,NULL,NULL,'[\"2024-04-11-661755dc26d21.webp\"]','[]','2024-04-11-661755dc4f2cf.webp','1',NULL,'youtube',NULL,'[]',0,'null','[]','[]',0,30000,30000,'0','percent','exclude','0','flat',100000,1,'<p>Th&ocirc;ng số vật l&yacute;</p>\r\n\r\n<p>&ndash; Độ ẩm &lt;2%</p>\r\n\r\n<p>&ndash; H&igrave;nh d&aacute;ng/ k&iacute;ch thước: tr&ograve;n/b&aacute;n nguyệt đường k&iacute;nh thay đổi từ 2.0 &ndash; 8 mm</p>\r\n\r\n<p>&ndash; D&agrave;y: 4 mm Quy c&aacute;ch bao b&igrave; v&agrave; bảo quản:</p>\r\n\r\n<p>&ndash; Bao nh&ocirc;m 50 gr</p>\r\n\r\n<p>&ndash; Th&ugrave;ng 50 g&oacute;i</p>\r\n\r\n<p>&ndash; Bảo quản nhiệt độ thường, hạn chế &aacute;nh s&aacute;ng chiếu trực tiếp</p>\r\n\r\n<p>&ndash; Thời gian sử dụng: 12 th&aacute;ng t&iacute;nh từ ng&agrave;y sản xuất</p>\r\n\r\n<ul>\r\n	<li>Gi&aacute;:30.000\r\n	<p>Li&ecirc;n hệ</p>\r\n	</li>\r\n	<li>\r\n	<p>V&ugrave;ng nguy&ecirc;n liệu:</p>\r\n\r\n	<p>Thanh Long được chọn từ nguồn thanh long tốt nhất cả nước: B&igrave;nh Thuận, Long An Thu mua từ c&aacute;c hợp t&aacute;c x&atilde; uy t&iacute;n, đảm bảo qu&aacute; tr&igrave;nh trồng trọt</p>\r\n\r\n	<p>Lợi &iacute;ch của tr&aacute;i thanh long tươi</p>\r\n\r\n	<p>&bull; Tăng cường hệ miễn dịch: do chứa nhiều Vitamin C</p>\r\n\r\n	<p>&bull; Ngừa ung thư: chứa nhiều chất chống oxy h&oacute;a, thanh long c&oacute; thể gi&uacute;p ngừa ung thư</p>\r\n\r\n	<p>&bull; Tốt cho tim mạch: giảm cholesterol xấu v&agrave; bổ sung th&ecirc;m cholesterol tốt</p>\r\n\r\n	<p>&bull; Giảm c&acirc;n: d&ugrave;ng h&agrave;ng ng&agrave;y, gi&uacute;p bạn giảm c&acirc;n hiệu quả !!!</p>\r\n\r\n	<p>Sử dụng v&agrave; chế biến Thanh Long hiện tại</p>\r\n\r\n	<p>Ăn sống: do vị ngon ngọt tự nhi&ecirc;n, chủ yếu xuất khẩu v&agrave; ăn sống hang ng&agrave;y</p>\r\n\r\n	<p>Chế biến rượu Thanh Long Sấy dẽo Sấy gi&ograve;n &ndash; Hướng đi mới, ph&aacute;t triển từ HG Bột Thanh Long (m&agrave;u thực phẩm) Nước &eacute;p Thanh Long C&ocirc;ng nghệ sấy gi&ograve;n HG Đặc điểm nổi bật của sản phẩm sấy gi&ograve;n HG: Healthy &ndash; Ho&agrave;n to&agrave;n tự nhi&ecirc;n, th&agrave;nh phần thanh long tươi 100%; &ndash; Kh&ocirc;ng dầu thực vật: độc đ&aacute;o của c&ocirc;ng nghệ: kh&ocirc;ng chi&ecirc;n nhưng vẫn gi&ograve;n &ndash; Giữ được c&aacute;c vitamin v&agrave; kho&aacute;ng chất ch&iacute;nh như vitamin C, Canxi, Sắt, Kali &ndash; Kh&ocirc;ng th&ecirc;m đường &ndash; Kh&ocirc;ng d&ugrave;ng chất bảo quản &ndash; Quy tr&igrave;nh đảm bảo vệ sinh an to&agrave;n thực phẩm Hương vị v&agrave; m&agrave;u sắc: &ndash; Giữ được hương vị thơm tự nhi&ecirc;n nhẹ nh&agrave;ng của thanh long &ndash; Giữ được m&agrave;u tự nhi&ecirc;n của thanh long &ndash; Ăn gi&ograve;n tan Th&ocirc;ng số kỹ thuật cơ bản Th&ocirc;ng số vật l&yacute; &ndash; Độ ẩm &lt;2% &ndash; H&igrave;nh d&aacute;ng/ k&iacute;ch thước: tr&ograve;n/b&aacute;n nguyệt đường k&iacute;nh thay đổi từ 2.0 &ndash; 8 mm &ndash; D&agrave;y: 4 mm Quy c&aacute;ch bao b&igrave; v&agrave; bảo quản: &ndash; Bao nh&ocirc;m 50 gr &ndash; Th&ugrave;ng 50 g&oacute;i &ndash; Bảo quản nhiệt độ thường, hạn chế &aacute;nh s&aacute;ng chiếu trực tiếp &ndash; Thời gian sử dụng: 12 th&aacute;ng t&iacute;nh từ ng&agrave;y sản xuất</p>\r\n	</li>\r\n</ul>',0,NULL,'2024-04-10 20:15:40','2024-04-10 20:20:51',1,1,NULL,NULL,'def.webp',1,NULL,0.00,0,NULL,NULL,'120911'),(2,'seller',2,'MÍT SẤY GIÒN HG','mit-say-gion-hg-PauL7B','physical','[{\"id\":\"3\",\"position\":1}]','3',NULL,NULL,1,'kg',1,1,NULL,NULL,'[\"2024-04-11-661756161b43b.webp\"]','[]','2024-04-11-66175616417c1.webp','1',NULL,'youtube',NULL,'[]',0,'null','[]','[]',0,30000,30000,'0','percent','exclude','0','flat',1988,1,'<p>Th&ocirc;ng số vật l&yacute;</p>\r\n\r\n<p>&ndash; Độ ẩm &lt;2%</p>\r\n\r\n<p>&ndash; H&igrave;nh d&aacute;ng/ k&iacute;ch thước: tr&ograve;n/b&aacute;n nguyệt đường k&iacute;nh thay đổi từ 2.0 &ndash; 8 mm</p>\r\n\r\n<p>&ndash; D&agrave;y: 4 mm Quy c&aacute;ch bao b&igrave; v&agrave; bảo quản:</p>\r\n\r\n<p>&ndash; Bao nh&ocirc;m 50 gr</p>\r\n\r\n<p>&ndash; Th&ugrave;ng 50 g&oacute;i</p>\r\n\r\n<p>&ndash; Bảo quản nhiệt độ thường, hạn chế &aacute;nh s&aacute;ng chiếu trực tiếp</p>\r\n\r\n<p>&ndash; Thời gian sử dụng: 12 th&aacute;ng t&iacute;nh từ ng&agrave;y sản xuất</p>\r\n\r\n<ul>\r\n	<li>Li&ecirc;n hệ: 0784923067</li>\r\n	<li>Gi&aacute;:30.000</li>\r\n</ul>',0,NULL,'2024-04-10 20:16:38','2024-04-18 21:34:08',1,1,NULL,NULL,'def.webp',1,NULL,0.00,0,NULL,NULL,'123578'),(3,'seller',3,'BỘT TRÀ CHANH CHAVI','bot-tra-chanh-chavi-WQzMlL','physical','[{\"id\":\"4\",\"position\":1},{\"id\":\"7\",\"position\":2}]','4','7',NULL,2,'kg',1,1,NULL,NULL,'[\"2024-04-11-6617578b6c248.webp\"]','[]','2024-04-11-6617578b8c9e0.webp','1',NULL,'youtube',NULL,'[]',0,'null','[]','[]',0,70000,70000,'0','percent','exclude','0','flat',9999,1,'<p>Những quả chanh kh&ocirc;ng hạt chất lượng cao tại N&ocirc;ng trại Chanh Việt được chăm s&oacute;c tỉ mỉ bởi những người n&ocirc;ng d&acirc;n trong nhiều th&aacute;ng từ l&uacute;c ra hoa cho đến khi thu hoạch sẽ được chọn lựa nghi&ecirc;m ngặt v&agrave; kết hợp c&ugrave;ng với tr&agrave; đen thượng hạng, qua quy tr&igrave;nh chế biến hiện đại với sự gi&aacute;m s&aacute;t của những chuy&ecirc;n gia dinh dưỡng h&agrave;ng đầu để tạo ra sản phẩm Bột tr&agrave; chanh h&ograve;a tan CHAVI, một m&oacute;n qu&agrave; &yacute; nghĩa d&agrave;nh tặng cho người Việt.</p>\r\n\r\n<h3>BỘT TR&Agrave; CHANH CHAVI L&Agrave; G&Igrave;?</h3>\r\n\r\n<p>Bột tr&agrave; chanh Chavi l&agrave; thức uống dạng bột h&ograve;a tan được sản xuất bởi N&ocirc;ng trại Chanh Việt. Tr&agrave; chanh l&agrave; thức uống phổ biến v&agrave; được nhiều người y&ecirc;u th&iacute;ch, đặc biệt l&agrave; giới trẻ. Tuy nhi&ecirc;n, kh&ocirc;ng phải ai cũng c&oacute; thời gian hoặc biết c&aacute;ch pha tr&agrave; chanh ngon. B&ecirc;n cạnh đ&oacute;, nhiều người kh&ocirc;ng c&oacute; điệu kiện ra qu&aacute;n, hoặc kh&ocirc;ng y&ecirc;n t&acirc;m về chất lượng. V&igrave; vậy, Tr&agrave; chanh h&ograve;a tan Chavi l&agrave; giải ph&aacute;p tốt nhất cho bạn bởi sự thơm ngon, tiện lợi, tiết kiệm v&agrave; an t&acirc;m.</p>\r\n\r\n<p><img alt=\"Bột trà chanh Chavi\" src=\"https://chanhviet.com/wp-content/uploads/2021/06/tra-chanh-hoa-tan-chavi-2-1024x1024.jpg\" style=\"height:640px; width:640px\" /></p>\r\n\r\n<p>Tr&agrave; chanh Chavi gi&uacute;p pha tr&agrave; chanh nhanh ch&oacute;ng v&agrave; thơm ngon.</p>\r\n\r\n<h3>TR&Agrave; CHANH H&Ograve;A TAN CHAVI ĐƯỢC SẢN XUẤT NHƯ THẾ N&Agrave;O</h3>\r\n\r\n<p>N&ocirc;ng trại Chanh Việt được biết đến l&agrave; n&ocirc;ng trại trồng chanh lớn nhất Việt Nam. Những quả chanh ở đ&acirc;y sau khi thu hoạch, sẽ được lựa chọn cẩn thận. Những quả đạt chất lượng tốt nhất sẽ qua kh&acirc;u sơ chế bao gồm rửa, ph&acirc;n loại v&agrave; gọt vỏ. Tiếp đến chanh sẽ được đưa v&agrave;o m&aacute;y &eacute;p để vắt th&agrave;nh nước cốt chanh. Nước cốt chanh sau đ&oacute; được đưa v&agrave;o m&aacute;y sấy phun để sấy th&agrave;nh bột chanh. Sau khi thu được bột chanh, c&aacute;c c&ocirc;ng nh&acirc;n trong nh&agrave; m&aacute;y sẽ phối trộn c&ugrave;ng với tr&agrave; đen v&agrave; đường. Sản phẩm sau đ&oacute; được đ&oacute;ng g&oacute;i v&agrave;o hũ nhựa an to&agrave;n hoặc t&uacute;i zip nh&ocirc;m.</p>\r\n\r\n<h3>C&Aacute;CH PHA TR&Agrave; CHANH THƠM NGON TỪ BỘT TR&Agrave; CHANH CHAVI</h3>\r\n\r\n<p>B1: Cho 3 muỗng (15 g) bột tr&agrave; chanh CHAVI v&agrave;o ly.<br />\r\nB2: Cho 100ml nước lạnh (hoặc ấm t&ugrave;y sở th&iacute;ch) v&agrave;o ly.<br />\r\nB3: Khuấy đều, th&ecirc;m đ&aacute; (nếu th&iacute;ch) v&agrave; thưởng thức.</p>\r\n\r\n<p>Uống một ly tr&agrave; chanh mỗi ng&agrave;y gi&uacute;p tăng cường sức hệ miễn dịch, khả năng tập trung, chống oxy h&oacute;a.</p>\r\n\r\n<p><img alt=\"Trà chanh hòa tan Chavi\" src=\"https://chanhviet.com/wp-content/uploads/2021/06/bot-trai-cay-hoa-tan-chavi-hang-authentic-1024x1024.jpg\" style=\"height:640px; width:640px\" /></p>',0,NULL,'2024-04-10 20:22:51','2024-04-18 21:33:00',1,1,NULL,NULL,'def.webp',1,NULL,0.00,0,NULL,NULL,'112100'),(4,'seller',3,'BỘT CHANH GIA VỊ CHAVI','bot-chanh-gia-vi-chavi-l2Klix','physical','[{\"id\":\"5\",\"position\":1}]','5',NULL,NULL,2,'kg',1,1,NULL,NULL,'[\"2024-04-11-661757df9920c.webp\"]','[]','2024-04-11-661757dfbb319.webp',NULL,NULL,'youtube',NULL,'[]',0,'null','[]','[]',0,106000,106000,'0','percent','exclude','0','flat',9999,1,'<p><strong>Bột Chanh Gia Vị CHAVI</strong>&nbsp;l&agrave; loại gia vị đặc biệt với th&agrave;nh phần bột chanh nguy&ecirc;n chất tạo hương vị chanh tự nhi&ecirc;n cho c&aacute;c m&oacute;n ăn, l&agrave; sản phẩm tiện dụng, tiết kiệm v&agrave; hiệu quả cho nh&agrave; bếp.</p>\r\n\r\n<ul>\r\n	<li>Gi&uacute;p bạn kh&ocirc;ng phải lưu trữ chanh tươi</li>\r\n	<li>Dễ d&agrave;ng hơn cho m&oacute;n ngon mỗi ng&agrave;y</li>\r\n	<li>H&agrave;ng Việt Nam chất lượng cao</li>\r\n</ul>',0,NULL,'2024-04-10 20:24:15','2024-04-10 20:35:22',1,1,NULL,NULL,'def.webp',1,NULL,0.00,0,NULL,NULL,'132424'),(5,'seller',1,'Cà Chua Bi Trái Cây','ca-chua-bi-trai-cay-rzWv8g','physical','[{\"id\":\"2\",\"position\":1}]','2',NULL,NULL,2,'kg',1,1,NULL,NULL,'[\"2024-04-11-661758b5e99e1.webp\"]','[]','2024-04-11-661758b60a53f.webp',NULL,NULL,'youtube',NULL,'[]',0,'null','[]','[]',0,26000,26000,'0','percent','exclude','0','flat',1989,1,'<ul>\r\n	<li><strong>C&agrave; chua bi cocktail</strong> l&agrave; loại c&agrave; chua c&oacute; k&iacute;ch thước nhỏ, tr&aacute;i tr&ograve;n, m&agrave;u đỏ tươi. C&agrave; chua bi c&oacute; lượng dinh dưỡng cao; do đ&oacute;, c&ocirc;ng dụng rất phong ph&uacute;..</li>\r\n	<li><strong>Hương vị:&nbsp;</strong>Ngọt dịu, xen lẫn chua chua, gi&ograve;n.</li>\r\n</ul>',0,NULL,'2024-04-10 20:27:50','2024-04-10 20:37:07',1,1,NULL,NULL,'def.webp',1,NULL,0.00,0,NULL,NULL,'134399'),(6,'admin',1,'Mận đường Chile - 1Kg','man-duong-chile-1kg-lHxZao','physical','[{\"id\":\"1\",\"position\":1}]','1',NULL,NULL,1,'kg',1,1,NULL,NULL,'[\"2024-04-11-66175bf5bb75c.webp\"]','[]','2024-04-11-66175bf5d11d4.webp','1',NULL,'youtube',NULL,'[]',0,'null','[]','[]',0,109000,109000,'0','percent','exclude','0','flat',0,1,'<p>Đạt ti&ecirc;u chuẩn chất lượng nhập khẩu. Mận c&oacute; vỏ m&agrave;u đỏ ng&atilde; đen, ruột đỏ sẫm, cứng tr&aacute;i, si&ecirc;u gi&ograve;n v&agrave; thơm, vị ngọt xen lẫn chua nhẹ ở vỏ rất k&iacute;ch th&iacute;ch vị gi&aacute;c.</p>',0,NULL,'2024-04-10 20:41:41','2024-04-18 03:58:01',1,1,NULL,NULL,'2024-04-18-6620fcb90125f.webp',1,NULL,0.00,0,NULL,NULL,'141964'),(7,'admin',1,'Dâu tây giống Mỹ 250G','dau-tay-giong-my-250g-Y3PiQo','physical','[{\"id\":\"1\",\"position\":1}]','1',NULL,NULL,2,'kg',1,1,NULL,NULL,'[\"2024-04-11-66175c2ecd30b.webp\"]','[]','2024-04-11-66175c2ee2294.webp','1',NULL,'youtube',NULL,'[]',0,'null','[]','[]',0,115000,115000,'0','percent','include','0','flat',0,1,'<p>Quả d&acirc;u c&oacute; m&agrave;u đỏ tươi, vỏ quả mỏng, thịt quả d&agrave;y, mọng nước. D&acirc;u t&acirc;y đ&aacute; giống Mỹ c&oacute; vị chua ngọt thanh m&aacute;t, c&oacute; m&ugrave;i thơm đặc trưng</p>',0,NULL,'2024-04-10 20:42:38','2024-04-10 20:42:55',1,1,NULL,NULL,'def.webp',1,NULL,0.00,0,NULL,NULL,'125218'),(8,'admin',1,'Nho xanh Autumn Crisp Úc','nho-xanh-autumn-crisp-uc-9WfERW','physical','[{\"id\":\"1\",\"position\":1}]','1',NULL,NULL,1,'kg',1,1,NULL,NULL,'[\"2024-04-11-66175cb325f73.webp\",\"2024-04-19-6621f16db98bd.webp\"]','[]','2024-04-19-6621f16dc97f7.webp','1',NULL,'youtube',NULL,'[]',0,'null','[]','[]',0,60000,60000,'0','percent','exclude','0','flat',9,1,'<p><strong>Xuất xứ:</strong>&nbsp;&Uacute;c</p>\r\n\r\n<p><strong>Ti&ecirc;u chuẩn chất lượng:</strong>&nbsp;Nhập Khẩu&nbsp;</p>\r\n\r\n<p><strong>Đặc biệt nổi bật:</strong>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Nho xanh Autumn Crisp g&acirc;y ấn tượng bởi&nbsp;ch&ugrave;m đầy, tr&aacute;i cứng, to tr&ograve;n, cuống tươi xanh.</li>\r\n	<li>Nho xanh Autumn Crisp c&oacute; vị ngọt thanh m&aacute;t, nho kh&ocirc;ng hạt tạo cảm gi&aacute;c thanh miệng, dễ chịu.</li>\r\n</ul>\r\n\r\n<p><strong>Hướng dẫn sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Rửa nhẹ nh&agrave;ng tr&aacute;i nho để loại bỏ lớp phấn trắng tr&ecirc;n vỏ.</li>\r\n	<li>Kh&ocirc;ng n&ecirc;n rửa nho trước khi bảo quản trong ngăn m&aacute;t tủ lạnh v&igrave; nếu rửa trước nho sẽ dễ bị hư, thối.</li>\r\n	<li>Chỉ n&ecirc;n rửa một lượng vừa đủ ăn.</li>\r\n	<li>Nho đỏ c&oacute; thể ăn trực tiếp, l&agrave;m nước &eacute;p, sinh tố, l&agrave;m b&aacute;nh.&nbsp;</li>\r\n</ul>',0,NULL,'2024-04-10 20:44:51','2024-04-18 21:33:04',1,1,NULL,NULL,'def.webp',1,NULL,0.00,0,NULL,NULL,'127041');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refund_requests`
--

DROP TABLE IF EXISTS `refund_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refund_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_details_id` bigint unsigned NOT NULL,
  `customer_id` bigint unsigned NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `order_id` bigint unsigned NOT NULL,
  `refund_reason` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved_note` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rejected_note` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payment_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `change_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refund_requests`
--

LOCK TABLES `refund_requests` WRITE;
/*!40000 ALTER TABLE `refund_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `refund_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refund_statuses`
--

DROP TABLE IF EXISTS `refund_statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refund_statuses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `refund_request_id` bigint unsigned DEFAULT NULL,
  `change_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `change_by_id` bigint unsigned DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refund_statuses`
--

LOCK TABLES `refund_statuses` WRITE;
/*!40000 ALTER TABLE `refund_statuses` DISABLE KEYS */;
/*!40000 ALTER TABLE `refund_statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refund_transactions`
--

DROP TABLE IF EXISTS `refund_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refund_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned DEFAULT NULL,
  `payment_for` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payer_id` bigint unsigned DEFAULT NULL,
  `payment_receiver_id` bigint unsigned DEFAULT NULL,
  `paid_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_to` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `transaction_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_details_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `refund_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refund_transactions`
--

LOCK TABLES `refund_transactions` WRITE;
/*!40000 ALTER TABLE `refund_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `refund_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint NOT NULL,
  `customer_id` bigint NOT NULL,
  `delivery_man_id` bigint DEFAULT NULL,
  `order_id` bigint DEFAULT NULL,
  `comment` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `attachment` json DEFAULT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `is_saved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,2,3,NULL,NULL,'good','[\"2024-04-11-66175a4f576cc.webp\"]',5,1,0,'2024-04-10 20:34:39','2024-04-10 20:34:39'),(2,4,3,NULL,NULL,'ove','[\"2024-04-11-66175ab4de178.webp\"]',5,1,0,'2024-04-10 20:36:20','2024-04-10 20:36:20'),(3,5,3,NULL,NULL,'ngon','[\"2024-04-11-66175b28500c9.webp\"]',5,1,0,'2024-04-10 20:38:16','2024-04-10 20:38:16');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `search_functions`
--

DROP TABLE IF EXISTS `search_functions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `search_functions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visible_for` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `search_functions`
--

LOCK TABLES `search_functions` WRITE;
/*!40000 ALTER TABLE `search_functions` DISABLE KEYS */;
INSERT INTO `search_functions` VALUES (1,'Dashboard','admin/dashboard','admin',NULL,NULL),(2,'Order All','admin/orders/list/all','admin',NULL,NULL),(3,'Order Pending','admin/orders/list/pending','admin',NULL,NULL),(4,'Order Processed','admin/orders/list/processed','admin',NULL,NULL),(5,'Order Delivered','admin/orders/list/delivered','admin',NULL,NULL),(6,'Order Returned','admin/orders/list/returned','admin',NULL,NULL),(7,'Order Failed','admin/orders/list/failed','admin',NULL,NULL),(8,'Brand Add','admin/brand/add-new','admin',NULL,NULL),(9,'Brand List','admin/brand/list','admin',NULL,NULL),(10,'Banner','admin/banner/list','admin',NULL,NULL),(11,'Category','admin/category/view','admin',NULL,NULL),(12,'Sub Category','admin/category/sub-category/view','admin',NULL,NULL),(13,'Sub sub category','admin/category/sub-sub-category/view','admin',NULL,NULL),(14,'Attribute','admin/attribute/view','admin',NULL,NULL),(15,'Product','admin/product/list','admin',NULL,NULL),(16,'Coupon','admin/coupon/add-new','admin',NULL,NULL),(17,'Custom Role','admin/custom-role/create','admin',NULL,NULL),(18,'Employee','admin/employee/add-new','admin',NULL,NULL),(19,'Seller','admin/sellers/seller-list','admin',NULL,NULL),(20,'Contacts','admin/contact/list','admin',NULL,NULL),(21,'Flash Deal','admin/deal/flash','admin',NULL,NULL),(22,'Deal of the day','admin/deal/day','admin',NULL,NULL),(23,'Language','admin/business-settings/language','admin',NULL,NULL),(24,'Mail','admin/business-settings/mail','admin',NULL,NULL),(25,'Shipping method','admin/business-settings/shipping-method/add','admin',NULL,NULL),(26,'Currency','admin/currency/view','admin',NULL,NULL),(27,'Payment method','admin/business-settings/payment-method','admin',NULL,NULL),(28,'SMS Gateway','admin/business-settings/sms-gateway','admin',NULL,NULL),(29,'Support Ticket','admin/support-ticket/view','admin',NULL,NULL),(30,'FAQ','admin/helpTopic/list','admin',NULL,NULL),(31,'About Us','admin/business-settings/about-us','admin',NULL,NULL),(32,'Terms and Conditions','admin/business-settings/terms-condition','admin',NULL,NULL),(33,'Web Config','admin/business-settings/web-config','admin',NULL,NULL);
/*!40000 ALTER TABLE `search_functions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seller_wallet_histories`
--

DROP TABLE IF EXISTS `seller_wallet_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seller_wallet_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` bigint DEFAULT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `order_id` bigint DEFAULT NULL,
  `product_id` bigint DEFAULT NULL,
  `payment` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'received',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seller_wallet_histories`
--

LOCK TABLES `seller_wallet_histories` WRITE;
/*!40000 ALTER TABLE `seller_wallet_histories` DISABLE KEYS */;
/*!40000 ALTER TABLE `seller_wallet_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seller_wallets`
--

DROP TABLE IF EXISTS `seller_wallets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seller_wallets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` bigint DEFAULT NULL,
  `total_earning` double NOT NULL DEFAULT '0',
  `withdrawn` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `commission_given` double(8,2) NOT NULL DEFAULT '0.00',
  `pending_withdraw` double(8,2) NOT NULL DEFAULT '0.00',
  `delivery_charge_earned` double(8,2) NOT NULL DEFAULT '0.00',
  `collected_cash` double(8,2) NOT NULL DEFAULT '0.00',
  `total_tax_collected` double(8,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seller_wallets`
--

LOCK TABLES `seller_wallets` WRITE;
/*!40000 ALTER TABLE `seller_wallets` DISABLE KEYS */;
INSERT INTO `seller_wallets` VALUES (1,1,26000,0,'2024-04-10 20:04:36','2024-04-10 20:37:32',0.00,0.00,0.00,0.00,0.00),(2,2,30000,0,'2024-04-10 20:13:52','2024-04-10 20:33:50',0.00,0.00,0.00,0.00,0.00),(3,3,106000,0,'2024-04-10 20:19:09','2024-04-10 20:36:03',0.00,0.00,0.00,0.00,0.00);
/*!40000 ALTER TABLE `seller_wallets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sellers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `f_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  `email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bank_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holder_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sales_commission_percentage` double(8,2) DEFAULT NULL,
  `gst` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cm_firebase_token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pos_status` tinyint(1) NOT NULL DEFAULT '0',
  `minimum_order_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `free_delivery_status` int NOT NULL DEFAULT '0',
  `free_delivery_over_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `app_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sellers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sellers`
--

LOCK TABLES `sellers` WRITE;
/*!40000 ALTER TABLE `sellers` DISABLE KEYS */;
INSERT INTO `sellers` VALUES (1,'Cửa hàng trái cây','Đặng Văn','0337686846','2024-04-11-66175344688b4.webp','dangvanhuy1432002@gmail.com','$2y$10$pWMQaOMEbztsawekTXDJMOSv3TTm5RG.P4B.rDf25GtISNCiKuC4e','approved','bJdkt1AYqbnyDWDV385lO5lele9ZYzSxKrxSNsDvOGyZlojAzNOZNAiPUTpO','2024-04-10 20:04:36','2024-04-10 20:05:15',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0.00,0,0.00,'en'),(2,'HG','hg','0366253928','2024-04-11-661755708f8f0.webp','hg@gmail.com','$2y$10$I9pGdMdmr6R5VebqP5.fW.W6JE6VPhx7Ku3LUdS.a7b3U8eyD3qSu','approved','xyAclLXL4BrIJbXuAp3c7hzH3QqSle1yioQrCajsJsGLe3YneG1igPj1S17v','2024-04-10 20:13:52','2024-04-10 22:19:29',NULL,NULL,NULL,NULL,'o8ub0H8UJxsgAzlyhor87xVcU4f9eXuNFy1P04RqbXl6AFqSuM',NULL,NULL,NULL,0,0.00,0,0.00,'en'),(3,'Chavi','Chavi','0366253928','2024-04-11-661756ad6db43.webp','cv@gmail.com','$2y$10$FYSvYOvekSZD2KHxqe7eHueKeqJfzyBk6RI8W2GFdrxkxL/spFS1y','approved','DfxyrkgBK7SLpccTt4iGjrLnrJyUMldlu3vDtQxdH9YiL6K1vSm5mK2ttQvz','2024-04-10 20:19:09','2024-04-10 20:19:30',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0.00,0,0.00,'en');
/*!40000 ALTER TABLE `sellers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_addresses`
--

DROP TABLE IF EXISTS `shipping_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipping_addresses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_guest` tinyint NOT NULL DEFAULT '0',
  `contact_person_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'home',
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_billing` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_addresses`
--

LOCK TABLES `shipping_addresses` WRITE;
/*!40000 ALTER TABLE `shipping_addresses` DISABLE KEYS */;
INSERT INTO `shipping_addresses` VALUES (1,'0',0,'Huy Đặng Văn',NULL,'permanent','Biên Hòa','Đồng Nai','810000','0366253928',NULL,NULL,NULL,'Viet Nam','10.953607','106.802589',0),(2,'0',0,'Huy Đặng Văn',NULL,'permanent','Biên Hòa','Đồng Nai','810000','0366253928',NULL,NULL,NULL,'Viet Nam','10.953607','106.802589',0),(3,'0',0,'Huy Đặng Văn',NULL,'permanent','Biên Hòa','Đồng Nai','810000','0366253928',NULL,NULL,NULL,'Viet Nam','10.953607','106.802589',0),(4,'0',0,'Huy Đặng Văn',NULL,'permanent','Biên Hòa','Đồng Nai','810000','0366253928',NULL,NULL,NULL,'Viet Nam','10.953607','106.802589',0),(5,'0',0,'Huy Đặng Văn',NULL,'permanent','Biên Hòa','Đồng Nai','810000','0366253928',NULL,NULL,NULL,'Viet Nam','10.953607','106.802589',0),(6,'0',0,'Huy Đặng Văn',NULL,'permanent','Biên Hòa','Đồng Nai','810000','0366253928',NULL,NULL,NULL,'Viet Nam','10.953607','106.802589',0),(7,'0',0,'Huy Đặng Văn',NULL,'permanent','Biên Hòa','Đồng Nai','810000','0366253928',NULL,NULL,NULL,'Viet Nam','10.953607','106.802589',0);
/*!40000 ALTER TABLE `shipping_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_methods`
--

DROP TABLE IF EXISTS `shipping_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipping_methods` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `creator_id` bigint DEFAULT NULL,
  `creator_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(8,2) NOT NULL DEFAULT '0.00',
  `duration` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_methods`
--

LOCK TABLES `shipping_methods` WRITE;
/*!40000 ALTER TABLE `shipping_methods` DISABLE KEYS */;
INSERT INTO `shipping_methods` VALUES (2,1,'admin','Company Vehicle',5.00,'2 Week',1,'2021-05-25 20:57:04','2021-05-25 20:57:04');
/*!40000 ALTER TABLE `shipping_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_types`
--

DROP TABLE IF EXISTS `shipping_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipping_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` bigint unsigned DEFAULT NULL,
  `shipping_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_types`
--

LOCK TABLES `shipping_types` WRITE;
/*!40000 ALTER TABLE `shipping_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `shipping_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_followers`
--

DROP TABLE IF EXISTS `shop_followers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shop_followers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int NOT NULL,
  `user_id` int NOT NULL COMMENT 'Customer ID',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_followers`
--

LOCK TABLES `shop_followers` WRITE;
/*!40000 ALTER TABLE `shop_followers` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_followers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shops`
--

DROP TABLE IF EXISTS `shops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shops` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` bigint NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  `bottom_banner` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacation_start_date` date DEFAULT NULL,
  `vacation_end_date` date DEFAULT NULL,
  `vacation_note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacation_status` tinyint NOT NULL DEFAULT '0',
  `temporary_close` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banner` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shops`
--

LOCK TABLES `shops` WRITE;
/*!40000 ALTER TABLE `shops` DISABLE KEYS */;
INSERT INTO `shops` VALUES (1,1,'Cửa hàng trái cây','Biên Hoà','0337686846','2024-04-11-6617534482086.webp','def.webp',NULL,NULL,NULL,NULL,0,0,'2024-04-10 20:04:36','2024-04-10 20:04:36','2024-04-11-661753449a48e.webp'),(2,2,'CÔNG TY CỔ PHẦN THỰC PHẨM HG','Long An','0366253928','2024-04-11-66175570a7aa6.webp','def.webp',NULL,NULL,NULL,NULL,0,0,'2024-04-10 20:13:52','2024-04-10 20:13:52','2024-04-11-66175570ac135.webp'),(3,3,'Chavi','Chavi','0366253928','2024-04-11-661756ad8b3ec.webp','def.webp',NULL,NULL,NULL,NULL,0,0,'2024-04-10 20:19:09','2024-04-10 20:19:09','2024-04-11-661756ad90b9a.webp');
/*!40000 ALTER TABLE `shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_medias`
--

DROP TABLE IF EXISTS `social_medias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `social_medias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_medias`
--

LOCK TABLES `social_medias` WRITE;
/*!40000 ALTER TABLE `social_medias` DISABLE KEYS */;
INSERT INTO `social_medias` VALUES (1,'twitter','https://www.w3schools.com/howto/howto_css_table_responsive.asp','fa fa-twitter',1,1,'2020-12-31 21:18:03','2020-12-31 21:18:25'),(2,'linkedin','https://dev.6amtech.com/','fa fa-linkedin',1,1,'2021-02-27 16:23:01','2021-02-27 16:23:05'),(3,'google-plus','https://dev.6amtech.com/','fa fa-google-plus-square',1,1,'2021-02-27 16:23:30','2021-02-27 16:23:33'),(4,'pinterest','https://dev.6amtech.com/','fa fa-pinterest',1,1,'2021-02-27 16:24:14','2021-02-27 16:24:26'),(5,'instagram','https://dev.6amtech.com/','fa fa-instagram',1,1,'2021-02-27 16:24:36','2021-02-27 16:24:41'),(6,'facebook','facebook.com','fa fa-facebook',1,1,'2021-02-27 19:19:42','2021-06-11 17:41:59');
/*!40000 ALTER TABLE `social_medias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soft_credentials`
--

DROP TABLE IF EXISTS `soft_credentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `soft_credentials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soft_credentials`
--

LOCK TABLES `soft_credentials` WRITE;
/*!40000 ALTER TABLE `soft_credentials` DISABLE KEYS */;
/*!40000 ALTER TABLE `soft_credentials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `support_ticket_convs`
--

DROP TABLE IF EXISTS `support_ticket_convs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `support_ticket_convs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `support_ticket_id` bigint DEFAULT NULL,
  `admin_id` bigint DEFAULT NULL,
  `customer_message` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` json DEFAULT NULL,
  `admin_message` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support_ticket_convs`
--

LOCK TABLES `support_ticket_convs` WRITE;
/*!40000 ALTER TABLE `support_ticket_convs` DISABLE KEYS */;
/*!40000 ALTER TABLE `support_ticket_convs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `support_tickets`
--

DROP TABLE IF EXISTS `support_tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `support_tickets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint DEFAULT NULL,
  `subject` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'low',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` json DEFAULT NULL,
  `reply` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support_tickets`
--

LOCK TABLES `support_tickets` WRITE;
/*!40000 ALTER TABLE `support_tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `support_tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_count` bigint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (18,'đẹp trai',0,'2024-04-13 23:28:48','2024-04-13 23:28:48'),(19,'rất đẹp trai',0,'2024-04-13 23:28:48','2024-04-13 23:28:48'),(20,'1. Bản nháp đẹp tuyệt vời',0,'2024-04-14 00:03:35','2024-04-14 00:03:35'),(21,'123123',0,'2024-04-14 00:09:18','2024-04-14 00:09:18'),(22,'12456789',0,'2024-04-14 00:09:18','2024-04-14 00:09:18'),(23,'123',0,'2024-04-15 11:56:58','2024-04-15 11:56:58'),(24,'kk',0,'2024-04-15 12:04:24','2024-04-15 12:04:24'),(25,'',0,'2024-04-15 23:41:26','2024-04-15 23:41:26'),(26,'hoàng hải dương neg',0,'2024-04-15 23:44:06','2024-04-15 23:44:06'),(27,'AKAKAK',0,'2024-04-15 23:46:56','2024-04-15 23:46:56'),(28,'21323',0,'2024-04-15 23:56:27','2024-04-15 23:56:27'),(29,'kkk',0,'2024-04-16 00:41:38','2024-04-16 00:41:38'),(30,'12312312',0,'2024-04-16 04:03:49','2024-04-16 04:03:49'),(31,'akaka',0,'2024-04-16 04:29:20','2024-04-16 04:29:20'),(32,'kaka',0,'2024-04-16 11:11:44','2024-04-16 11:11:44'),(33,'hihih',0,'2024-04-16 11:29:21','2024-04-16 11:29:21'),(34,'Hoàng Hải Dương',0,'2024-04-18 03:00:21','2024-04-18 03:00:21'),(35,'hihi',0,'2024-04-18 09:46:04','2024-04-18 09:46:04');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint DEFAULT NULL,
  `payment_for` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payer_id` bigint DEFAULT NULL,
  `payment_receiver_id` bigint DEFAULT NULL,
  `paid_by` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_to` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'success',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  `transaction_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_details_id` bigint unsigned DEFAULT NULL,
  UNIQUE KEY `transactions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `translations` (
  `translationable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `translationable_id` bigint unsigned NOT NULL,
  `locale` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `translations_translationable_id_index` (`translationable_id`),
  KEY `translations_locale_index` (`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
INSERT INTO `translations` VALUES ('App\\Model\\Product',7,'vn','name','Dâu tây giống Mỹ 250G',1),('App\\Model\\Product',7,'vn','description','<p>Quả d&acirc;u c&oacute; m&agrave;u đỏ tươi, vỏ quả mỏng, thịt quả d&agrave;y, mọng nước. D&acirc;u t&acirc;y đ&aacute; giống Mỹ c&oacute; vị chua ngọt thanh m&aacute;t, c&oacute; m&ugrave;i thơm đặc trưng</p>',2),('App\\Model\\Product',6,'vn','name','Mận đường Chile - 1Kg',3),('App\\Model\\Product',6,'vn','description','<p>Đạt ti&ecirc;u chuẩn chất lượng nhập khẩu. Mận c&oacute; vỏ m&agrave;u đỏ ng&atilde; đen, ruột đỏ sẫm, cứng tr&aacute;i, si&ecirc;u gi&ograve;n v&agrave; thơm, vị ngọt xen lẫn chua nhẹ ở vỏ rất k&iacute;ch th&iacute;ch vị gi&aacute;c.</p>',4),('App\\Model\\Product',8,'vn','name','Nho xanh Autumn Crisp Úc',5),('App\\Model\\Product',8,'vn','description','<p><strong>Xuất xứ:</strong>&nbsp;&Uacute;c</p>\r\n\r\n<p><strong>Ti&ecirc;u chuẩn chất lượng:</strong>&nbsp;Nhập Khẩu&nbsp;</p>\r\n\r\n<p><strong>Đặc biệt nổi bật:</strong>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Nho xanh Autumn Crisp g&acirc;y ấn tượng bởi&nbsp;ch&ugrave;m đầy, tr&aacute;i cứng, to tr&ograve;n, cuống tươi xanh.</li>\r\n	<li>Nho xanh Autumn Crisp c&oacute; vị ngọt thanh m&aacute;t, nho kh&ocirc;ng hạt tạo cảm gi&aacute;c thanh miệng, dễ chịu.</li>\r\n</ul>\r\n\r\n<p><strong>Hướng dẫn sử dụng:</strong></p>\r\n\r\n<ul>\r\n	<li>Rửa nhẹ nh&agrave;ng tr&aacute;i nho để loại bỏ lớp phấn trắng tr&ecirc;n vỏ.</li>\r\n	<li>Kh&ocirc;ng n&ecirc;n rửa nho trước khi bảo quản trong ngăn m&aacute;t tủ lạnh v&igrave; nếu rửa trước nho sẽ dễ bị hư, thối.</li>\r\n	<li>Chỉ n&ecirc;n rửa một lượng vừa đủ ăn.</li>\r\n	<li>Nho đỏ c&oacute; thể ăn trực tiếp, l&agrave;m nước &eacute;p, sinh tố, l&agrave;m b&aacute;nh.&nbsp;</li>\r\n</ul>',6);
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'def.png',
  `email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `street_address` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment_no` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cm_firebase_token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `payment_card_last_four` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_card_brand` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_card_fawry_token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `login_medium` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_phone_verified` tinyint(1) NOT NULL DEFAULT '0',
  `temporary_token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `wallet_balance` double(8,2) DEFAULT NULL,
  `loyalty_point` double(8,2) DEFAULT NULL,
  `login_hit_count` tinyint NOT NULL DEFAULT '0',
  `is_temp_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `temp_block_time` timestamp NULL DEFAULT NULL,
  `referral_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referred_by` int DEFAULT NULL,
  `app_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (0,'walking customer','walking','customer','000000000000','def.png','walking@customer.com',NULL,'',NULL,NULL,'2022-02-03 03:46:01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,NULL,0,0,NULL,NULL,NULL,'en'),(2,NULL,'test','Đặng Văn','0337686846','def.png','dangvanhuy1432002@gmail.com',NULL,'$2y$10$69zHGV5PR08ycZAayYr6E.JiWDz4Sb4iy9y8Vj88/zzepQG0.EkeS','fwZmnaxvTQQyj9WXFthH6441E2VP3FXwV51b1syYmtyoeUfxeTKZiIDFCaRZ','2024-04-10 20:29:49','2024-04-14 21:59:30',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,NULL,0,0,NULL,'OOHJQSGYTFIMGLKNDMDL',NULL,'en'),(3,NULL,'Huy','Đặng Văn','0348863884','def.png','huy@gmail.com',NULL,'$2y$10$VezF03aBcB3Rnna7xnLIL.mMcDTuHVVh./a5Th.j4r9XMlBdZDM0G','HKXyH5KstVnktBpxDnQQEx6rff2dCI3wPIZ2HwaSAjxwJ4yBPWMhM4S8rh0b','2024-04-10 20:32:08','2024-04-10 20:32:26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,0,NULL,0,NULL,NULL,0,0,NULL,'RIYVR6182O28DWHBEJCY',NULL,'en');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallet_transactions`
--

DROP TABLE IF EXISTS `wallet_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wallet_transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `transaction_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` decimal(24,3) NOT NULL DEFAULT '0.000',
  `debit` decimal(24,3) NOT NULL DEFAULT '0.000',
  `admin_bonus` decimal(24,3) NOT NULL DEFAULT '0.000',
  `balance` decimal(24,3) NOT NULL DEFAULT '0.000',
  `transaction_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallet_transactions`
--

LOCK TABLES `wallet_transactions` WRITE;
/*!40000 ALTER TABLE `wallet_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `wallet_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint NOT NULL,
  `product_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `withdraw_requests`
--

DROP TABLE IF EXISTS `withdraw_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `withdraw_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` bigint DEFAULT NULL,
  `delivery_man_id` bigint DEFAULT NULL,
  `admin_id` bigint DEFAULT NULL,
  `amount` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0.00',
  `withdrawal_method_id` bigint unsigned DEFAULT NULL,
  `withdrawal_method_fields` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `transaction_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `withdraw_requests`
--

LOCK TABLES `withdraw_requests` WRITE;
/*!40000 ALTER TABLE `withdraw_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `withdraw_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `withdrawal_methods`
--

DROP TABLE IF EXISTS `withdrawal_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `withdrawal_methods` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `method_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_fields` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint NOT NULL DEFAULT '0',
  `is_active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `withdrawal_methods`
--

LOCK TABLES `withdrawal_methods` WRITE;
/*!40000 ALTER TABLE `withdrawal_methods` DISABLE KEYS */;
/*!40000 ALTER TABLE `withdrawal_methods` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-22 22:54:21
