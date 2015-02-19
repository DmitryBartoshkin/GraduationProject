/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rts` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `rts`;

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `phone` int(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pressForce` varchar(65) DEFAULT NULL,
  `extInfo` varchar(255) DEFAULT NULL,
  `idMailing` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idMailing` (`idMailing`),
  CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`idMailing`) REFERENCES `mailing` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `clients` */

/*Table structure for table `consumables` */

DROP TABLE IF EXISTS `consumables`;

CREATE TABLE `consumables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `idValue` int(65) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idValue` (`idValue`),
  CONSTRAINT `consumables_ibfk_1` FOREIGN KEY (`idValue`) REFERENCES `values` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `consumables` */

/*Table structure for table `mailing` */

DROP TABLE IF EXISTS `mailing`;

CREATE TABLE `mailing` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mailing` */

/*Table structure for table `masters` */

DROP TABLE IF EXISTS `masters`;

CREATE TABLE `masters` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(65) NOT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `masters` */

/*Table structure for table `prices` */

DROP TABLE IF EXISTS `prices`;

CREATE TABLE `prices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `price` int(65) NOT NULL,
  `idProgram` int(10) NOT NULL,
  `idTime` int(10) NOT NULL,
  `idConsumable` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idProgram` (`idProgram`),
  KEY `idTime` (`idTime`),
  KEY `prices_ibfk_3` (`idConsumable`),
  CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`idProgram`) REFERENCES `programs` (`id`),
  CONSTRAINT `prices_ibfk_2` FOREIGN KEY (`idTime`) REFERENCES `times` (`id`),
  CONSTRAINT `prices_ibfk_3` FOREIGN KEY (`idConsumable`) REFERENCES `consumables` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `prices` */

/*Table structure for table `productions` */

DROP TABLE IF EXISTS `productions`;

CREATE TABLE `productions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idStaff` int(10) NOT NULL,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `hours` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStaff` (`idStaff`),
  CONSTRAINT `productions_ibfk_1` FOREIGN KEY (`idStaff`) REFERENCES `staff` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `productions` */

/*Table structure for table `programs` */

DROP TABLE IF EXISTS `programs`;

CREATE TABLE `programs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(65) NOT NULL,
  `idTime` int(10) NOT NULL,
  `idPrice` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTime` (`idTime`),
  KEY `idPrice` (`idPrice`),
  CONSTRAINT `programs_ibfk_2` FOREIGN KEY (`idPrice`) REFERENCES `prices` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `programs` */

/*Table structure for table `staff` */

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(65) NOT NULL,
  `birthday` date NOT NULL,
  `occupation` varchar(65) NOT NULL,
  `login` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `staff` */

/*Table structure for table `times` */

DROP TABLE IF EXISTS `times`;

CREATE TABLE `times` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `times` */

/*Table structure for table `values` */

DROP TABLE IF EXISTS `values`;

CREATE TABLE `values` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `volume` int(10) NOT NULL,
  `metric` varchar(65) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `values` */

/*Table structure for table `vizits` */

DROP TABLE IF EXISTS `vizits`;

CREATE TABLE `vizits` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `idClient` int(10) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `idProgram` int(10) NOT NULL,
  `idMaster` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idClient` (`idClient`),
  KEY `idMaster` (`idMaster`),
  KEY `idProgram` (`idProgram`),
  CONSTRAINT `vizits_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `clients` (`id`),
  CONSTRAINT `vizits_ibfk_2` FOREIGN KEY (`idMaster`) REFERENCES `masters` (`id`),
  CONSTRAINT `vizits_ibfk_3` FOREIGN KEY (`idProgram`) REFERENCES `programs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `vizits` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
