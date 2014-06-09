-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.37 - MySQL Community Server (GPL) by Remi
-- Server OS:                    Linux
-- HeidiSQL Version:             8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table development.compositions
CREATE TABLE IF NOT EXISTS `compositions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `meta` bigint(20) unsigned DEFAULT NULL,
  `content` bigint(20) unsigned NOT NULL COMMENT 'Soft Foreign Key based on TYPE',
  `parent` bigint(20) unsigned NOT NULL,
  `type` bigint(20) unsigned NOT NULL DEFAULT '1',
  `self` int(10) unsigned DEFAULT NULL,
  `root` bit(1) NOT NULL DEFAULT b'0',
  `active` bit(1) NOT NULL DEFAULT b'1',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(1023) COLLATE utf8_unicode_ci DEFAULT NULL,
  `media` varchar(1023) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `scope` (`type`),
  KEY `parent` (`parent`),
  KEY `owner` (`owner`),
  CONSTRAINT `compositions_ibfk_1` FOREIGN KEY (`type`) REFERENCES `types` (`id`),
  CONSTRAINT `compositions_ibfk_2` FOREIGN KEY (`owner`) REFERENCES `operator` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table development.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(23) unsigned NOT NULL AUTO_INCREMENT,
  `p_id` bigint(23) unsigned NOT NULL,
  `user_id` bigint(23) unsigned NOT NULL,
  `views` bigint(23) unsigned DEFAULT NULL,
  `up_votes` smallint(5) unsigned DEFAULT NULL,
  `down_votes` smallint(5) unsigned DEFAULT NULL,
  `replies` smallint(5) unsigned DEFAULT NULL,
  `mod_level` smallint(5) unsigned NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table development.microdoc
CREATE TABLE IF NOT EXISTS `microdoc` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` bigint(20) unsigned NOT NULL DEFAULT '258',
  `where` bigint(20) unsigned NOT NULL DEFAULT '1',
  `owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `trendocity` bigint(20) unsigned NOT NULL DEFAULT '0',
  `views` bigint(20) unsigned NOT NULL DEFAULT '0',
  `partner_rating` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_rating` bigint(20) unsigned NOT NULL DEFAULT '0',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `poster` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `blurb` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `conclusion` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `videos` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `links` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `credits` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `owner` (`owner`),
  KEY `where` (`where`),
  CONSTRAINT `microdoc_ibfk_1` FOREIGN KEY (`type`) REFERENCES `types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `microdoc_ibfk_2` FOREIGN KEY (`where`) REFERENCES `compositions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `microdoc_ibfk_5` FOREIGN KEY (`owner`) REFERENCES `operator` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table development.operator
CREATE TABLE IF NOT EXISTS `operator` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `group` bigint(20) unsigned NOT NULL,
  `rank` bigint(20) unsigned NOT NULL,
  `user` bigint(20) unsigned NOT NULL,
  `operator` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keyauth` varchar(4096) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `log` varchar(2048) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `setting` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for view development.REFERENTIAL_CONSTRAINTS_COLUMN_USAGE
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `REFERENTIAL_CONSTRAINTS_COLUMN_USAGE` (
	`CONSTRAINT_CATALOG` VARCHAR(512) NOT NULL COLLATE 'utf8_general_ci',
	`CONSTRAINT_SCHEMA` VARCHAR(64) NOT NULL COLLATE 'utf8_general_ci',
	`CONSTRAINT_NAME` VARCHAR(64) NOT NULL COLLATE 'utf8_general_ci',
	`TABLE_CATALOG` VARCHAR(512) NOT NULL COLLATE 'utf8_general_ci',
	`TABLE_SCHEMA` VARCHAR(64) NOT NULL COLLATE 'utf8_general_ci',
	`TABLE_NAME` VARCHAR(64) NOT NULL COLLATE 'utf8_general_ci',
	`COLUMN_NAME` VARCHAR(64) NOT NULL COLLATE 'utf8_general_ci',
	`ORDINAL_POSITION` BIGINT(10) NOT NULL,
	`UNIQUE_CONSTRAINT_CATALOG` VARCHAR(512) NOT NULL COLLATE 'utf8_general_ci',
	`UNIQUE_CONSTRAINT_SCHEMA` VARCHAR(64) NOT NULL COLLATE 'utf8_general_ci',
	`UNIQUE_CONSTRAINT_NAME` VARCHAR(64) NOT NULL COLLATE 'utf8_general_ci',
	`UNIQUE_TABLE_CATALOG` VARCHAR(512) NOT NULL COLLATE 'utf8_general_ci',
	`UNIQUE_TABLE_SCHEMA` VARCHAR(64) NOT NULL COLLATE 'utf8_general_ci',
	`UNIQUE_TABLE_NAME` VARCHAR(64) NOT NULL COLLATE 'utf8_general_ci',
	`UNIQUE_COLUMN_NAME` VARCHAR(64) NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for table development.types
CREATE TABLE IF NOT EXISTS `types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent` bigint(20) unsigned NOT NULL,
  `pointer` bigint(20) unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for table development.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(23) unsigned NOT NULL AUTO_INCREMENT,
  `groups` bigint(23) DEFAULT NULL,
  `login_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `join_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `authority` smallint(6) NOT NULL,
  `first_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(92) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_auth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logpath` varchar(1023) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geopath` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Data exporting was unselected.


-- Dumping structure for view development.REFERENTIAL_CONSTRAINTS_COLUMN_USAGE
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `REFERENTIAL_CONSTRAINTS_COLUMN_USAGE`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `REFERENTIAL_CONSTRAINTS_COLUMN_USAGE` AS select `KCU1`.`CONSTRAINT_CATALOG` AS `CONSTRAINT_CATALOG`,`KCU1`.`CONSTRAINT_SCHEMA` AS `CONSTRAINT_SCHEMA`,`KCU1`.`CONSTRAINT_NAME` AS `CONSTRAINT_NAME`,`KCU1`.`TABLE_CATALOG` AS `TABLE_CATALOG`,`KCU1`.`TABLE_SCHEMA` AS `TABLE_SCHEMA`,`KCU1`.`TABLE_NAME` AS `TABLE_NAME`,`KCU1`.`COLUMN_NAME` AS `COLUMN_NAME`,`KCU1`.`ORDINAL_POSITION` AS `ORDINAL_POSITION`,`KCU2`.`CONSTRAINT_CATALOG` AS `UNIQUE_CONSTRAINT_CATALOG`,`KCU2`.`CONSTRAINT_SCHEMA` AS `UNIQUE_CONSTRAINT_SCHEMA`,`KCU2`.`CONSTRAINT_NAME` AS `UNIQUE_CONSTRAINT_NAME`,`KCU2`.`TABLE_CATALOG` AS `UNIQUE_TABLE_CATALOG`,`KCU2`.`TABLE_SCHEMA` AS `UNIQUE_TABLE_SCHEMA`,`KCU2`.`TABLE_NAME` AS `UNIQUE_TABLE_NAME`,`KCU2`.`COLUMN_NAME` AS `UNIQUE_COLUMN_NAME` from ((`INFORMATION_SCHEMA`.`REFERENTIAL_CONSTRAINTS` `RC` join `INFORMATION_SCHEMA`.`KEY_COLUMN_USAGE` `KCU1` on(((`KCU1`.`CONSTRAINT_CATALOG` = `RC`.`CONSTRAINT_CATALOG`) and (`KCU1`.`CONSTRAINT_SCHEMA` = `RC`.`CONSTRAINT_SCHEMA`) and (`KCU1`.`CONSTRAINT_NAME` = `RC`.`CONSTRAINT_NAME`)))) join `INFORMATION_SCHEMA`.`KEY_COLUMN_USAGE` `KCU2` on(((`KCU2`.`CONSTRAINT_CATALOG` = `RC`.`UNIQUE_CONSTRAINT_CATALOG`) and (`KCU2`.`CONSTRAINT_SCHEMA` = `RC`.`UNIQUE_CONSTRAINT_SCHEMA`) and (`KCU2`.`CONSTRAINT_NAME` = `RC`.`UNIQUE_CONSTRAINT_NAME`)))) where (`KCU1`.`ORDINAL_POSITION` = `KCU2`.`ORDINAL_POSITION`);
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
