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
  `id` int(10) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `phone` int(13) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pressForce` varchar(65) DEFAULT NULL,
  `extInfo` text,
  `mailing` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idMailing` (`mailing`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `clients` */

/*Table structure for table `consumables` */

DROP TABLE IF EXISTS `consumables`;

CREATE TABLE `consumables` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `consumables` */

/*Table structure for table `productivity` */

DROP TABLE IF EXISTS `productivity`;

CREATE TABLE `productivity` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `idStaff` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idStaff` (`idStaff`),
  CONSTRAINT `productivity_ibfk_1` FOREIGN KEY (`idStaff`) REFERENCES `staff` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `productivity` */

/*Table structure for table `program_consumables_values` */

DROP TABLE IF EXISTS `program_consumables_values`;

CREATE TABLE `program_consumables_values` (
  `idProgram` int(10) NOT NULL,
  `idConsumables` int(10) NOT NULL,
  `idValues` int(10) NOT NULL,
  PRIMARY KEY (`idProgram`,`idConsumables`,`idValues`),
  KEY `idConsumables` (`idConsumables`),
  KEY `idValues` (`idValues`),
  CONSTRAINT `program_consumables_values_ibfk_1` FOREIGN KEY (`idConsumables`) REFERENCES `consumables` (`id`),
  CONSTRAINT `program_consumables_values_ibfk_2` FOREIGN KEY (`idValues`) REFERENCES `values` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `program_consumables_values` */

/*Table structure for table `programs` */

DROP TABLE IF EXISTS `programs`;

CREATE TABLE `programs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `program` varchar(50) NOT NULL,
  `time` time NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTime` (`time`),
  CONSTRAINT `programs_ibfk_3` FOREIGN KEY (`id`) REFERENCES `program_consumables_values` (`idProgram`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `programs` */

/*Table structure for table `staff` */

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `occupation` varchar(65) NOT NULL,
  `login` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `staff` */

insert  into `staff`(`id`,`firstName`,`lastName`,`birthday`,`occupation`,`login`,`password`) values (1,'Надя','',
'1990-05-15','менеджер','nadya','827ccb0eea8a706c4c34a16891f84e7b'),(2,'Администратор','','1984-10-10',
'администратор','admin','12345');

/*Table structure for table `values` */

DROP TABLE IF EXISTS `values`;

CREATE TABLE `values` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `volume` int(10) NOT NULL,
  `metric` varchar(10) NOT NULL,
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
  `idStaff` int(5) NOT NULL,
  `idProgram` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idClient` (`idClient`),
  KEY `idStaff` (`idStaff`),
  KEY `idPrice` (`idProgram`),
  CONSTRAINT `vizits_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `clients` (`id`),
  CONSTRAINT `vizits_ibfk_4` FOREIGN KEY (`idStaff`) REFERENCES `staff` (`id`),
  CONSTRAINT `vizits_ibfk_5` FOREIGN KEY (`idProgram`) REFERENCES `programs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `vizits` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
