-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: csweb.hh.nku.edu    Database: db_spring18_englandg1
-- ------------------------------------------------------
-- Server version	5.5.44

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
-- Table structure for table `book_categories`
--

DROP TABLE IF EXISTS `book_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_categories` (
  `bcID` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(45) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  PRIMARY KEY (`bcID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_categories`
--

LOCK TABLES `book_categories` WRITE;
/*!40000 ALTER TABLE `book_categories` DISABLE KEYS */;
INSERT INTO `book_categories` VALUES (1,'33333',NULL),(2,'2323',NULL),(8,'444444455555',1),(9,'444444455555',2),(10,'444444455555',3),(11,'23452345',1),(12,'23452345',2),(13,'23452345',1),(14,'23452345',2),(15,'232343567777',1),(16,'232343567777',2),(17,'232343567777',3),(18,'18224',2),(19,'18224',3),(20,'23222323',1),(21,'23222323',2),(24,'2',1),(28,'0-672-31509-2',1),(29,'0-672-31509-2',2),(30,'0-672-31509-2',3),(31,'0-672-31697-8',1),(32,'0-672-31745-1',1),(33,'0-672-31769-9',1),(34,'1',1),(35,'1',3);
/*!40000 ALTER TABLE `book_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_reviews`
--

DROP TABLE IF EXISTS `book_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_reviews` (
  `isbn` char(13) NOT NULL,
  `review` text,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_reviews`
--

LOCK TABLES `book_reviews` WRITE;
/*!40000 ALTER TABLE `book_reviews` DISABLE KEYS */;
INSERT INTO `book_reviews` VALUES ('0-672-31697-8','Morgan\'s book is clearly written and goes well beyond \n                     most of the basic Java books out there.');
/*!40000 ALTER TABLE `book_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `isbn` char(13) NOT NULL,
  `author` char(50) DEFAULT NULL,
  `title` char(100) DEFAULT NULL,
  `price` float(4,2) DEFAULT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES ('0-672-31509-2','Pruitt, et al.','Teach Yourself GIMP in 24 Hours',24.99),('0-672-31697-8','Michael Morgan','Java 2 for Professional Developers',34.99),('0-672-31745-1','Thomas Down','Installing Debian GNU/Linux',24.99),('0-672-31769-9','Thomas Schenk','Caldera OpenLinux System Administration Unleashed',69.99),('1','Mary Kate','Tide Pod Challenge',10.00),('18224','Book 3','Jesse Hockenbury',12.12),('2','Michael Jordan','Basketball',10.00),('23222323','yeah yeah','Dave Coslet',33.00),('232343567777','Mister Yoga','Teach Yoga',56.00),('23452345','Teach Football Fundamentals','Marvin Lewis',45.00),('444444455555','The Goods','Jerrad Huckleberry',88.00),('6','good stuff','space flight',88.00);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Technology'),(2,'English'),(3,'Science'),(4,'Math'),(6,'History'),(8,'Biology'),(9,'German'),(10,'Karate'),(11,'Breaking News');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `customerid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `address` char(100) NOT NULL,
  `city` char(30) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`customerid`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Julie Smith','25 Oak Street','Airport West','admin','password1'),(2,'Alan Wong','1/47 Haines Avenue','Box Hill',NULL,NULL),(3,'Michelle Arthur','357 North Road','Yarraville',NULL,NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `final_animal`
--

DROP TABLE IF EXISTS `final_animal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `final_animal` (
  `animalid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `cost` char(50) NOT NULL,
  PRIMARY KEY (`animalid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final_animal`
--

LOCK TABLES `final_animal` WRITE;
/*!40000 ALTER TABLE `final_animal` DISABLE KEYS */;
INSERT INTO `final_animal` VALUES (1,'Raccoon','50'),(2,'Squirrel','25'),(3,'Duck','56'),(4,'Tiger','145.00'),(5,'Ground Hog','45'),(6,'Snake','25');
/*!40000 ALTER TABLE `final_animal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `final_customer`
--

DROP TABLE IF EXISTS `final_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `final_customer` (
  `customerid` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` char(50) NOT NULL,
  `lastname` char(50) NOT NULL,
  `address` char(100) NOT NULL,
  `city` char(30) NOT NULL,
  `zipcode` char(5) NOT NULL,
  `stateid` int(3) NOT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final_customer`
--

LOCK TABLES `final_customer` WRITE;
/*!40000 ALTER TABLE `final_customer` DISABLE KEYS */;
INSERT INTO `final_customer` VALUES (1,'Logan','Wolverine','3453 Claws Blvd','Delhi','45238',3),(2,'Scott','Summers','453 Xmen Way','Newport','41071',1),(3,'Jean','Summers','3456 Phoenix Blvd','Newport','41071',2),(4,'Carlos','Senco','345 Wayword Dr','Lawrenceburg','42187',1),(5,'Jeff','Bergman','34 Walnut St','Newport','45202',2),(6,'Amy','Bierman','433 Tag Ln','Mt Healthy','45231',3),(7,'A J','Green','34 Touchdown Ln','Score','45322',2),(8,'Peter','Parker','345 Web Ln','Spiderville','34933',1);
/*!40000 ALTER TABLE `final_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `final_employee`
--

DROP TABLE IF EXISTS `final_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `final_employee` (
  `employeeid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` char(50) NOT NULL,
  `lastname` char(50) NOT NULL,
  `address` char(100) NOT NULL,
  `city` char(30) NOT NULL,
  `zipcode` char(5) NOT NULL,
  `state` int(3) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`employeeid`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final_employee`
--

LOCK TABLES `final_employee` WRITE;
/*!40000 ALTER TABLE `final_employee` DISABLE KEYS */;
INSERT INTO `final_employee` VALUES (1,'Corey','Mazuk','2343 8 Mile Rd','Anderson','33333',3,'cmazuk','password1'),(2,'Gary','Mazuk','3425 Whistle Bird Ln','Fairfield','45323',3,'gmazuk','password2'),(3,'George','England','211 Centerview Dr','Cincinnati','45238',3,'gengland','password3'),(4,'Gary','Bierman','234 High St','Westside','45332',3,NULL,NULL),(5,'Jim','Mazuk','345','Hamilton','45334',3,NULL,NULL);
/*!40000 ALTER TABLE `final_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `final_order`
--

DROP TABLE IF EXISTS `final_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `final_order` (
  `orderid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerid` int(50) NOT NULL,
  `employeeid` int(50) NOT NULL,
  `startdate` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `setupprice` float(6,2) NOT NULL,
  `totalprice` float(6,2) NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final_order`
--

LOCK TABLES `final_order` WRITE;
/*!40000 ALTER TABLE `final_order` DISABLE KEYS */;
INSERT INTO `final_order` VALUES (1,3,1,'2018-04-09','tester',1.00,1.00),(2,2,1,'2018-04-09','tester',1.00,1.00),(3,3,2,'2018-04-09','Observed raccoons on south side of the house. Setting up cage at basement window on south side.',2.00,2.00),(4,1,2,'2018-04-09','Squirrels were observed entering the front gable of the house.',99.00,99.00),(5,3,2,'2018-04-09','Birds',99.00,99.00),(6,3,2,'2018-04-09','Bats and snakes.',0.01,0.01),(7,3,2,'2018-04-09','Hornets',99.00,99.00),(8,3,2,'2018-04-09','Hornets',99.00,99.00),(9,3,1,'2018-04-09','Grass hoppers',99.00,99.00),(10,3,2,'2018-04-09','Bears and alligators.',9999.99,9999.99),(11,3,2,'2018-04-09','Illegal activity.',1.00,1.00),(12,3,2,'2018-04-09','Illegal activity.',1.00,1.00),(13,3,2,'2018-04-09','Kill Bill',456.89,456.89),(14,3,2,'2018-04-09','Kill Bill',456.89,456.89),(15,4,1,'2018-04-10','Heard noises in the attic. Observed bats flying around.',145.00,145.00),(16,5,3,'2018-04-10','What does the fox say?',122.00,122.00),(17,8,5,'2018-04-23','Bats in the church tower.',150.00,150.00),(18,2,2,'2018-04-23','Found bats.',154.00,154.00),(19,2,3,'2018-04-23','sealed up house',60.00,60.00);
/*!40000 ALTER TABLE `final_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `final_state`
--

DROP TABLE IF EXISTS `final_state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `final_state` (
  `stateid` int(3) unsigned NOT NULL,
  `state_abbreviation` char(2) NOT NULL,
  `state_name` char(50) NOT NULL,
  PRIMARY KEY (`stateid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final_state`
--

LOCK TABLES `final_state` WRITE;
/*!40000 ALTER TABLE `final_state` DISABLE KEYS */;
INSERT INTO `final_state` VALUES (1,'IN','Indiana'),(2,'KY','Kentucky'),(3,'OH','Ohio');
/*!40000 ALTER TABLE `final_state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `orderid` int(10) unsigned NOT NULL,
  `isbn` char(13) NOT NULL,
  `quantity` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`orderid`,`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,'0-672-31697-8',2),(2,'0-672-31769-9',1),(3,'0-672-31509-2',1),(3,'0-672-31769-9',1),(4,'0-672-31745-1',3);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `orderid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerid` int(10) unsigned NOT NULL,
  `amount` float(6,2) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,3,69.98,'2000-04-02'),(2,1,49.99,'2000-04-15'),(3,2,74.98,'2000-04-19'),(4,3,24.99,'2000-05-01');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-25 16:48:07
