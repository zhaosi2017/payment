-- MySQL dump 10.13  Distrib 5.6.36, for Linux (x86_64)
--
-- Host: localhost    Database: payment
-- ------------------------------------------------------
-- Server version	5.6.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contact_role`
--

DROP TABLE IF EXISTS `contact_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text,
  `pay_company_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_role`
--

LOCK TABLES `contact_role` WRITE;
/*!40000 ALTER TABLE `contact_role` DISABLE KEYS */;
INSERT INTO `contact_role` VALUES (4,'主要控制人',3),(5,'员工',3),(6,'华哥',4),(7,'小梅',5),(8,'张毅',6),(9,'发发',7),(10,'111',7),(11,'张发发',9),(12,'小梅',10),(13,'张发发',11),(14,'11112',7),(15,'333333',7),(16,'程锋刚',6),(17,'程锋刚',12),(18,'元元',18);
/*!40000 ALTER TABLE `contact_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_user`
--

DROP TABLE IF EXISTS `contact_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `remark` text,
  `pay_company_id` int(10) unsigned NOT NULL DEFAULT '0',
  `contact_role_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_user`
--

LOCK TABLES `contact_user` WRITE;
/*!40000 ALTER TABLE `contact_user` DISABLE KEYS */;
INSERT INTO `contact_user` VALUES (2,'张x','<p>微信：zhangxx</p>',3,4),(3,'华哥','<p>TEL:13288888136</p><p>QQ:1521903098<span class=\"redactor-invisible-space\"><br></span></p><p><span class=\"redactor-invisible-space\">POTATO:+852 95191040<span class=\"redactor-invisible-space\"></span></span></p>',4,6),(4,'小梅','<p>15810542974</p>',5,7),(5,'张毅','<p>电话：151 9500 4300</p>',6,8),(6,'发发','<p>qq:2097045831</p>',7,9),(7,'11','<p>11</p>',7,9),(8,'123','<p>111</p>',7,10),(9,'张发发','<p>qq:2097045831</p>',9,11),(10,'小梅','<p>TEL:15810542974</p>',10,12),(11,'张发发','<p>QQ:2097045831</p>',11,13),(12,'程锋刚','<p>北京杰莘宏业网络科技有限公司</p><p>电话：010-56456465</p><p>传真：010-45645664</p><p>地址：北京市海淀区翠微</p><p>中里15号楼一层105室</p>',6,16),(13,'程锋刚','<p>北京杰莘宏业网络科技有限公司</p><p>手机：18701492626</p><p>电话：010-65661032</p><p>邮箱：chengfenggang@jieshenkj.com</p><p>地址：北京市朝阳区建外郎家园19号楼瑞赛商务楼5层</p>',12,17),(14,'程锋刚','<p>QQ: 1413993979</p>',12,17),(15,'元元','<p>TEL:13828841719</p>',18,18);
/*!40000 ALTER TABLE `contact_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pay_channel`
--

DROP TABLE IF EXISTS `pay_channel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pay_channel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pay_company_id` int(10) unsigned NOT NULL DEFAULT '0',
  `name` text,
  `source_company` text,
  `status` int(11) NOT NULL DEFAULT '0',
  `remark` text,
  `access_amount` int(11) NOT NULL DEFAULT '0',
  `access_time` int(11) NOT NULL DEFAULT '0' COMMENT '接入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay_channel`
--

LOCK TABLES `pay_channel` WRITE;
/*!40000 ALTER TABLE `pay_channel` DISABLE KEYS */;
INSERT INTO `pay_channel` VALUES (10,3,'微信','腾讯',0,'<p>OK</p>',222,1492506788),(11,4,'聚优支付','未知',0,'<p>ok</p>',3000,1492813189),(12,5,'汇元支付','汇元支付',0,'',150,1492958140),(13,6,'贝付宝','贝付宝',0,'<p><br></p>',500,1492958294),(14,7,'聚兴支付','广东巨兴信息科技有限公司',0,'<p>上限8000万</p>',300,1492958495),(15,8,'汇潮支付','汇元支付',0,'<p>网银通道不限额</p>',1000,1492958753),(16,9,'巨兴支付','广东巨兴信息科技有限公司',0,'',500,1493132256),(17,10,'金海哲支付','深圳金海哲信息科技有限公司',0,'',2000,1493164701),(18,11,'聚兴支付','广东巨兴信息科技有限公司',0,'',2000,1493165091),(19,12,'贝付宝','贝付宝',0,'<p>797，558接入。</p>',30,1495301173),(20,18,'游汇通','游汇通',0,'',300,1495305694);
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
  `license_number` varchar(64) NOT NULL DEFAULT '',
  `license` varchar(64) NOT NULL DEFAULT '',
  `grade` varchar(64) NOT NULL DEFAULT '0',
  `control_user` varchar(64) NOT NULL DEFAULT '',
  `contact` text,
  `status` int(11) NOT NULL DEFAULT '0',
  `market_info` text,
  `support_channel` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pay_company`
--

LOCK TABLES `pay_company` WRITE;
/*!40000 ALTER TABLE `pay_company` DISABLE KEYS */;
INSERT INTO `pay_company` VALUES (20,'','微派支付','苏州融希信息科技有限公司',0,'','','4','',NULL,0,'维护','支付宝wap'),(18,'','游汇通','游汇通',0,'','','4','',NULL,0,'维护','支付宝wap，微信wap'),(21,'','普迅支付','南通普讯网络科技有限公司',0,'','','4','',NULL,0,'0','支付宝wap'),(12,'','贝付宝','北京杰莘宏业网络科技有限公司',0,'','','4','',NULL,0,'10（T+1）','支付宝wap，微信wap'),(13,'','一加支付','百家通电子商务',0,'','','2','',NULL,0,'2000（T+1）','支付宝wap'),(26,'','贝贝支付','北京互联易付科技有限公司',0,'','','4','',NULL,0,'维护','支付宝wap'),(22,'','聚米支付','聚米支付',0,'','','2','',NULL,0,'维护','支付宝wap'),(25,'','畅付支付','扬州畅联网络科技有限公司',0,'','','4','',NULL,0,'维护','支付宝wap'),(17,'','聚优支付','聚优支付',0,'','','2','',NULL,0,'维护','支付宝wap，微信wap'),(19,'','巨米支付','巨米支付',0,'','','3','',NULL,0,'维护','支付宝wap'),(27,'','通汇支付','通汇支付',0,'','','4','',NULL,0,'维护','支付宝wap'),(24,'','陌一支付','武汉众赢科技有限公司',0,'','','4','',NULL,0,'2500','微信wap'),(35,'','金海哲支付','深圳金海哲信息科技有限公司',0,'','','4','',NULL,0,'备用','微信扫码'),(29,'','聚宝支付','杭州凡伟网络科技有限公司',0,'','','4','',NULL,0,'维护','微信wap'),(33,'','国连支付','国连支付',0,'','','4','',NULL,0,'接入中','微信wap'),(30,'','厦门速煜','厦门速煜信息技术有限公司',0,'','','4','',NULL,0,'维护','支付宝wap'),(31,'','亿卡支付','深圳亿卡信息有限公司',0,'','','3','',NULL,0,'200（T+1）','支付宝wap,微信wap'),(32,'','爱贝云计费','深圳市爱贝信息技术有限公司',0,'','','4','',NULL,0,'维护','支付宝wap'),(37,'','捷付支付','捷付支付',0,'','','4','',NULL,0,'支付宝100，微信10','支付宝wap，微信wap');
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
INSERT INTO `user` VALUES (1,'ZmG0kd0leV2LEIhiCON1RzczMmUwZTIzYmMxOWQ1ODRkYzIxNGVjNjFjM2UwYzgwMzg3YTQ4MmY4OTU2N2NiOTA2YWFkOGEzNTQyNDQwZjD+nE+CGn+jgXHb2/j3oVx5ZscpTkrB0ZMtSfoQg6O/9w==','','','$2y$13$xAzRmQs25I19jk/9bw6MMesWbZwh/OzS6HZx8sCNIlLn6S09ox.vq','V5Y4Mtyvo8cuQQ4ekLY8fxye2plydLkH',0,0,0,0,0,2,1,'2017-01-25 11:05:35','2017-04-18 16:03:04');
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

-- Dump completed on 2017-07-15 15:19:12
