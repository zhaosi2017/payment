-- MySQL dump 10.13  Distrib 5.7.16, for osx10.12 (x86_64)
--
-- Host: localhost    Database: payment
-- ------------------------------------------------------
-- Server version	5.7.16

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
-- Table structure for table `pay_channel`
--

DROP TABLE IF EXISTS `pay_channel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay_channel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text,
  `source_company` text,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay_channel`
--

LOCK TABLES `pay_channel` WRITE;
/*!40000 ALTER TABLE `pay_channel` DISABLE KEYS */;
INSERT INTO `pay_channel` VALUES (1,'微信','腾讯',0),(2,'财付通','腾讯',0),(3,'支付宝','阿里',0);
/*!40000 ALTER TABLE `pay_channel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pay_company`
--

DROP TABLE IF EXISTS `pay_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay_company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pay_channel_id` varchar(64) NOT NULL DEFAULT '',
  `pay_plate_name` varchar(64) NOT NULL DEFAULT '',
  `name` text,
  `is_license` int(10) unsigned NOT NULL DEFAULT '0',
  `grade` varchar(64) NOT NULL DEFAULT '0',
  `control_user` varchar(64) NOT NULL DEFAULT '',
  `contact` text,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay_company`
--

LOCK TABLES `pay_company` WRITE;
/*!40000 ALTER TABLE `pay_company` DISABLE KEYS */;
INSERT INTO `pay_company` VALUES (1,'1,2','A支付平台','a公司',1,'2','李某','+099999222',0),(2,'1,3','B平台','b公司',0,'3','孙某','+011111122',0);
/*!40000 ALTER TABLE `pay_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` longtext COLLATE utf8mb4_unicode_ci,
  `nickname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '用户昵称',
  `email` longtext COLLATE utf8mb4_unicode_ci,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `auth_key` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(10) unsigned DEFAULT '0',
  `department_id` int(10) unsigned NOT NULL DEFAULT '0',
  `posts_id` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `login_permission` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '登录许可：1禁止0允许',
  `create_author_uid` int(10) unsigned NOT NULL DEFAULT '0',
  `update_author_uid` int(10) unsigned NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='ç”¨æˆ·è¡¨';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'E3A+S9rbOrLJWDK1EadqFTI4ODNlYmE3ZDljYjI2NWQ1Nzc5NzBhMDhmODkyMTU4MjRkZmVjZGUwYzliYzM0NTM4ODUzYWY1NWRiYjQ5NzdCYxus/reRhuucCOJ1BEdBZNmhFALyetPK0L8Mw51lKQ==','','','$2y$13$P6Knl2Wzx1Z/Hc9JZ7Mg.e65M7a91IhqH9PFWkobAJH7YWstvvsP2','V5Y4Mtyvo8cuQQ4ekLY8fxye2plydLkH',0,0,0,0,0,2,1,'2017-01-25 11:05:35','2017-04-11 19:49:58');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-12 14:20:19
