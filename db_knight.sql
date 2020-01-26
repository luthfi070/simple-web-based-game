/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.1.38-MariaDB : Database - db_knight
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_knight` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_knight`;

/*Table structure for table `t_guild` */

DROP TABLE IF EXISTS `t_guild`;

CREATE TABLE `t_guild` (
  `id_guild` int(3) NOT NULL AUTO_INCREMENT,
  `nama_guild` varchar(15) DEFAULT NULL,
  `ketua_guild` varchar(15) DEFAULT NULL,
  `wk_guild_1` varchar(15) DEFAULT NULL,
  `wk_guild_2` varchar(15) DEFAULT NULL,
  `a_guild_1` varchar(15) DEFAULT NULL,
  `a_guild_2` varchar(15) DEFAULT NULL,
  `a_guild_3` varchar(15) DEFAULT NULL,
  `id_username` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_guild`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_guild` */

/*Table structure for table `t_market` */

DROP TABLE IF EXISTS `t_market`;

CREATE TABLE `t_market` (
  `id_market` int(3) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(15) DEFAULT NULL,
  `id_user` int(3) DEFAULT NULL,
  `barang` varchar(50) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `jumlah` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_market`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_market` */

/*Table structure for table `t_user` */

DROP TABLE IF EXISTS `t_user`;

CREATE TABLE `t_user` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `nama_wk` varchar(25) DEFAULT NULL,
  `j_knight` int(3) DEFAULT NULL,
  `j_resource` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `t_user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
