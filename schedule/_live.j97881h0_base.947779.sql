-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: j97881h0_base
-- ------------------------------------------------------
-- Server version	5.7.20-19-beget-5.7.20-20-1-log

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
-- Table structure for table `site_users`
--

DROP TABLE IF EXISTS `site_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(65) NOT NULL,
  `group` varchar(25) NOT NULL,
  `date_reg` int(11) NOT NULL,
  `date_last` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_users`
--

LOCK TABLES `site_users` WRITE;
/*!40000 ALTER TABLE `site_users` DISABLE KEYS */;
INSERT INTO `site_users` VALUES (2,'angus123','$2y$13$yngpSf6aShkJn6xnrVVMbexzEZ2rdspv1jiBTcjeozVnj2s2pmYTO','ИСб-25',1448172484,1521908436,4);
/*!40000 ALTER TABLE `site_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_calls`
--

DROP TABLE IF EXISTS `tb_calls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_calls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_calls`
--

LOCK TABLES `tb_calls` WRITE;
/*!40000 ALTER TABLE `tb_calls` DISABLE KEYS */;
INSERT INTO `tb_calls` VALUES (1,1,'08:30:00','10:00:00'),(2,2,'10:10:00','11:40:00'),(3,3,'11:50:00','13:20:00'),(4,4,'14:00:00','15:30:00'),(5,5,'15:40:00','17:10:00'),(6,6,'17:20:00','18:50:00'),(7,7,'19:00:00','20:30:00'),(8,8,'20:40:00','22:10:00');
/*!40000 ALTER TABLE `tb_calls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_config`
--

DROP TABLE IF EXISTS `tb_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `k` varchar(255) NOT NULL,
  `v` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_config`
--

LOCK TABLES `tb_config` WRITE;
/*!40000 ALTER TABLE `tb_config` DISABLE KEYS */;
INSERT INTO `tb_config` VALUES (1,'version','0.3');
/*!40000 ALTER TABLE `tb_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_group`
--

DROP TABLE IF EXISTS `tb_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_group`
--

LOCK TABLES `tb_group` WRITE;
/*!40000 ALTER TABLE `tb_group` DISABLE KEYS */;
INSERT INTO `tb_group` VALUES (1,'ИСб-25'),(2,'ИСб-32');
/*!40000 ALTER TABLE `tb_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_schedule`
--

DROP TABLE IF EXISTS `tb_schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `week` enum('odd','even') NOT NULL,
  `id_subject` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `office` varchar(15) NOT NULL,
  `stud_group` varchar(25) NOT NULL,
  `stud_subgroup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_schedule`
--

LOCK TABLES `tb_schedule` WRITE;
/*!40000 ALTER TABLE `tb_schedule` DISABLE KEYS */;
INSERT INTO `tb_schedule` VALUES (46,1,2,'odd',22,24,'В-313','ИСб-25',3),(47,1,1,'odd',21,23,'Г-511','ИСб-25',1),(48,1,3,'odd',21,25,'421','ИСб-25',3),(49,1,1,'even',21,23,'Г-511','ИСб-25',1),(51,1,2,'even',28,21,'417','ИСб-25',3),(52,1,3,'even',21,25,'421','ИСб-25',3),(53,2,1,'odd',32,11,'Б-503','ИСб-25',2),(54,2,2,'odd',27,11,'Б-501','ИСб-25',1),(55,2,2,'odd',27,9,'Б-501','ИСб-25',2),(56,2,3,'odd',21,23,'В-314','ИСб-25',3),(57,2,4,'odd',32,26,'Б-503','ИСб-25',3),(58,2,5,'even',22,27,'В-316','ИСб-25',3),(59,2,4,'even',32,26,'Б-503','ИСб-25',3),(60,2,2,'even',27,11,'Б-501','ИСб-25',1),(61,2,3,'even',33,19,'F 1-4','ИСб-25',1),(62,3,1,'odd',29,11,'Б-501','ИСб-25',3),(63,3,2,'odd',23,12,'Спорткомплекс','ИСб-25',3),(64,3,3,'odd',25,28,'Г-609','ИСб-25',3),(65,3,2,'even',23,12,'Спорткомплекс','ИСб-25',3),(66,3,3,'even',25,28,'Г-609','ИСб-25',3),(67,3,4,'odd',25,28,'В-313','ИСб-25',3),(68,2,2,'even',27,9,'Б-501','ИСб-25',2),(69,4,1,'odd',32,26,'Б-503','ИСб-25',1),(70,4,1,'even',28,1,'Б-501','ИСб-25',3),(71,4,2,'odd',27,21,'422','ИСб-25',3),(72,4,2,'even',27,21,'422','ИСб-25',3),(73,4,3,'odd',33,22,'422','ИСб-25',3),(74,4,3,'even',33,22,'422','ИСб-25',3),(75,5,2,'odd',26,12,'В-303 или Г-303','ИСб-25',3),(77,5,3,'even',26,12,'Г-607 или В-308','ИСб-25',3),(78,5,3,'odd',30,9,'F 2-2','ИСб-25',3),(79,5,4,'odd',30,9,'422а','ИСб-25',3),(80,5,4,'even',30,9,'422а','ИСб-25',3),(82,5,5,'odd',23,12,'Спорткомплекс','ИСб-25',3),(83,5,5,'even',23,12,'Спорткомплекс\\','ИСб-25',3),(84,5,6,'even',24,18,'Г-511','ИСб-25',3);
/*!40000 ALTER TABLE `tb_schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_subject`
--

DROP TABLE IF EXISTS `tb_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_subject`
--

LOCK TABLES `tb_subject` WRITE;
/*!40000 ALTER TABLE `tb_subject` DISABLE KEYS */;
INSERT INTO `tb_subject` VALUES (21,'Управление данными'),(22,'БЖД'),(23,'Физвоспитание'),(24,'ООП'),(25,'Философия'),(26,'Иностранный язык'),(27,'АИС'),(28,'ВМС'),(29,'СЦУИС'),(30,'Платформа .Net'),(31,'Надежность ИС'),(32,'Геоинформатика'),(33,'ТСПП');
/*!40000 ALTER TABLE `tb_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_teacher`
--

DROP TABLE IF EXISTS `tb_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_teacher`
--

LOCK TABLES `tb_teacher` WRITE;
/*!40000 ALTER TABLE `tb_teacher` DISABLE KEYS */;
INSERT INTO `tb_teacher` VALUES (1,'Кудрявченко Иван Владимирович'),(2,'Гхашим Мохаммад Мохаммадович'),(3,'Первухива Елена Львовна'),(4,'Маслова Мария Александровна'),(5,'Сметанина Татьяна Ивановна'),(8,'Юлдашева Татьяна Анатольевна'),(9,'Шишкевич Владимир Евгеньевич'),(10,'Деркач Наталья Александровна'),(11,'Миронова Ольга Васильевна'),(12,'Преподаватель_Имя_1'),(13,'Овчинников Александр Львович'),(14,'Тимофеева Татьяна Ивановна'),(15,'Доценко Станислав Васильевич'),(17,'Авраменко Оксана Валерьевна'),(18,'Пелипас Всеволод Олегович'),(19,'Дрозин Андрей Юрьевич'),(20,'Долгополова Лилия Валерьевна'),(21,'Чернега Виктор Степанович'),(22,'Строганов Виктор Александрович'),(23,'Заморёнов Михаил Владимирович'),(24,'Абибулаева Алие Шакировна'),(25,'Доронина Юлия Валентиновна'),(26,'Дымченко Ирина Вячеславовна'),(27,'Буркова Елена Викторовна'),(28,'Варнашова Елена Фёдоровна');
/*!40000 ALTER TABLE `tb_teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'j97881h0_base'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-24 23:58:10
