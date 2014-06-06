-- Approach base database

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = '+00:00';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE "StarterProject_prime0" /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE "StarterProject_prime0";

CREATE TABLE "compositions" (
  "id" bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  "owner" bigint(20) unsigned NOT NULL DEFAULT '1',
  "meta" bigint(20) unsigned DEFAULT NULL,
  "content" bigint(20) unsigned NOT NULL COMMENT 'Soft Foreign Key based on TYPE',
  "parent" bigint(20) unsigned NOT NULL,
  "type" bigint(20) unsigned NOT NULL DEFAULT '1',
  "self" int(10) unsigned DEFAULT NULL,
  "root" bit(1) NOT NULL DEFAULT b'0',
  "active" bit(1) NOT NULL DEFAULT b'1',
  "title" varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  "alias" varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  "tags" varchar(1023) COLLATE utf8_unicode_ci DEFAULT NULL,
  "media" varchar(1023) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY ("id"),
  KEY "scope" ("type"),
  KEY "parent" ("parent"),
  KEY "owner" ("owner"),
  CONSTRAINT "compositions_ibfk_2" FOREIGN KEY ("owner") REFERENCES "operator" ("id"),
  CONSTRAINT "compositions_ibfk_1" FOREIGN KEY ("type") REFERENCES "types" ("id")
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO "compositions" ("id", "owner", "meta", "content", "parent", "type", "self", "root", "active", "title", "alias", "tags", "media") VALUES
(1,	1,	0,	0,	0,	1,	NULL,	CONV('1', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'Homepage | New Project',	'home',	'StarterProject, home',	NULL),
(2,	1,	NULL,	0,	1,	264,	0,	CONV('1', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'StarterProject - Genres',	'genre',	'action,fps,adventure,indie,mmo,categoryer,racing,rpg,sports,strategy,simulation,puzzle,kids',	NULL),
(3,	1,	NULL,	0,	1,	264,	1,	CONV('1', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'StarterProject - Categories',	'category',	'windows,mac,linux,ios,android',	NULL),
(4,	1,	NULL,	0,	1,	264,	2,	CONV('1', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'StarterProject - News',	'news',	'new releases,articles,updates,patches,blog',	NULL),
(5,	1,	NULL,	0,	1,	1,	3,	CONV('1', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'StarterProject - Shop',	'shop',	'shop,buy,rental,promos',	NULL),
(6,	1,	NULL,	0,	1,	1,	4,	CONV('1', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'StarterProject - Connect',	'connect',	'connect,users,profile,walkthrough,tips,tricks,cheats,hacks,reviews,groups,guilds,forums,events',	NULL),
(7,	1,	NULL,	0,	1,	1,	5,	CONV('0', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'About StarterProject',	'about',	'StarterProject,about us',	NULL),
(8,	1,	NULL,	0,	1,	1,	6,	CONV('0', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'Contact StarterProject',	'contact',	'StarterProject,contact',	NULL),
(9,	1,	NULL,	0,	1,	264,	7,	CONV('0', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'Search StarterProject',	'search',	'StarterProject,search',	NULL),
(24,	1,	NULL,	0,	2,	264,	5,	CONV('0', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'Genres : App | StarterProject.com',	'apps',	'apps,StarterProject.com',	NULL),
(25,	1,	NULL,	0,	2,	264,	6,	CONV('0', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'Genres : Music | StarterProject.com',	'music',	NULL,	NULL),
(26,	1,	NULL,	0,	2,	264,	7,	CONV('0', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'Genres : Game | StarterProject.com',	'game',	NULL,	NULL),
(27,	1,	NULL,	0,	2,	264,	8,	CONV('0', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'Genres : Code | StarterProject.com',	'code',	'genre,code,StarterProject.com',	NULL),
(28,	1,	NULL,	0,	2,	264,	9,	CONV('0', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'Genres : Art | StarterProject.com',	'art',	'genre,racing,StarterProject.com',	NULL),
(29,	1,	NULL,	0,	2,	264,	10,	CONV('0', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'Genres : Sports | StarterProject.com',	'sports',	'genre,sport,StarterProject.com',	NULL),
(37,	1,	NULL,	0,	3,	264,	7,	CONV('1', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'Category : Linux | StarterProject.com',	'linux',	'category,linux,StarterProject.com',	NULL),
(38,	1,	NULL,	0,	3,	264,	8,	CONV('1', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'Category : Mac | StarterProject.com',	'mac',	'category,mac,StarterProject.com',	NULL)
(33,	1,	NULL,	0,	3,	264,	3,	CONV('1', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'Category : Windows | StarterProject.com',	'windows',	'category,windows,StarterProject.com',	NULL),
(35,	1,	NULL,	0,	3,	264,	5,	CONV('1', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'Category : iOS | StarterProject.com',	'ios',	'category,ios,StarterProject.com',	NULL),
(36,	1,	NULL,	0,	3,	264,	6,	CONV('1', 2, 10) + 0,	CONV('1', 2, 10) + 0,	'Category : Android | StarterProject.com',	'android',	'category,android,StarterProject.com',	NULL),
ON DUPLICATE KEY UPDATE "id" = VALUES("id"), "owner" = VALUES("owner"), "meta" = VALUES("meta"), "content" = VALUES("content"), "parent" = VALUES("parent"), "type" = VALUES("type"), "
self" = VALUES("self"), "root" = VALUES("root"), "active" = VALUES("active"), "title" = VALUES("title"), "alias" = VALUES("alias"), "tags" = VALUES("tags"), "media" = VALUES("media");

CREATE TABLE "microdoc" (
  "id" bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  "type" bigint(20) unsigned NOT NULL DEFAULT '258',
  "where" bigint(20) unsigned NOT NULL DEFAULT '1',
  "owner" bigint(20) unsigned NOT NULL DEFAULT '1',
  "trendocity" bigint(20) unsigned NOT NULL DEFAULT '0',
  "views" bigint(20) unsigned NOT NULL DEFAULT '0',
  "partner_rating" bigint(20) unsigned NOT NULL DEFAULT '0',
  "user_rating" bigint(20) unsigned NOT NULL DEFAULT '0',
  "title" varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  "tags" varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  "poster" varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  "thumb" varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  "blurb" varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  "conclusion" varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  "videos" varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  "images" varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  "description" mediumtext COLLATE utf8_unicode_ci,
  "links" text COLLATE utf8_unicode_ci,
  "credits" text COLLATE utf8_unicode_ci,
  PRIMARY KEY ("id"),
  KEY "type" ("type"),
  KEY "owner" ("owner"),
  KEY "where" ("where"),
  CONSTRAINT "microdoc_ibfk_1" FOREIGN KEY ("type") REFERENCES "types" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT "microdoc_ibfk_2" FOREIGN KEY ("where") REFERENCES "compositions" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT "microdoc_ibfk_5" FOREIGN KEY ("owner") REFERENCES "operator" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE "operator" (
  "id" bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  "group" bigint(20) unsigned NOT NULL,
  "rank" bigint(20) unsigned NOT NULL,
  "user" bigint(20) unsigned NOT NULL,
  "operator" varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  "keyauth" varchar(4096) COLLATE utf8_unicode_ci NOT NULL,
  "log" varchar(2048) COLLATE utf8_unicode_ci NOT NULL,
  "message" varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  "setting" varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY ("id")
) ENGINE=InnoDB AUTO_INCREMENT=778 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO "operator" ("id", "group", "rank", "user", "operator", "keyauth", "log", "message", "setting") VALUES
(3,	0,	0,	1,	'system',	'',	'BASE_DIR+private/logs/system/StarterProject.com.opr.log',	'Why are you logged in? Administrative and legal teams have been notified.',	'{ \"status\":0 }'),
(777,	777,	77,	0,	'administrators',	'',	'BASE_DIR+private/logs/group_administrators/StarterProject.com.opr.log',	'Warning; logged in as a group account!',	'{ \"status\":0 }')
ON DUPLICATE KEY UPDATE "id" = VALUES("id"), "group" = VALUES("group"), "rank" = VALUES("rank"), "user" = VALUES("user"), "operator" = VALUES("operator"), "keyauth" = VALUES("keyauth"), "log" = VALUES("log"), "message" = VALUES("message"), "setting" = VALUES("setting");

CREATE TABLE "REFERENTIAL_CONSTRAINTS_COLUMN_USAGE" ("CONSTRAINT_CATALOG" varchar(512), "CONSTRAINT_SCHEMA" varchar(64), "CONSTRAINT_NAME" varchar(64), "TABLE_CATALOG" varchar(512), "TABLE_SCHEMA" varchar(64), "TABLE_NAME" varchar(64), "COLUMN_NAME" varchar(64), "ORDINAL_POSITION" bigint(10), "UNIQUE_CONSTRAINT_CATALOG" varchar(512), "UNIQUE_CONSTRAINT_SCHEMA" varchar(64), "UNIQUE_CONSTRAINT_NAME" varchar(64), "UNIQUE_TABLE_CATALOG" varchar(512), "UNIQUE_TABLE_SCHEMA" varchar(64), "UNIQUE_TABLE_NAME" varchar(64), "UNIQUE_COLUMN_NAME" varchar(64));


CREATE TABLE "types" (
  "id" bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  "parent" bigint(20) unsigned NOT NULL,
  "pointer" bigint(20) unsigned NOT NULL,
  "name" varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY ("id")
) ENGINE=InnoDB AUTO_INCREMENT=267 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO "types" ("id", "parent", "pointer", "name") VALUES
(0,	0,	0,	''),
(1,	7,	0,	'composition'),
(2,	7,	0,	'component'),
(3,	7,	0,	'service'),
(4,	7,	0,	'binding'),
(5,	7,	0,	'dataset'),
(6,	7,	0,	'renderable'),
(7,	0,	0,	'system'),
(8,	7,	0,	'guide'),
(9,	1,	0,	'category'),
(10,	1,	0,	'search'),
(11,	1,	0,	'relate'),
(12,	1,	0,	'system'),
(13,	2,	0,	'mime'),
(14,	2,	0,	'mask'),
(15,	2,	0,	'live'),
(16,	2,	0,	'filter'),
(17,	1,	0,	'application'),
(18,	2,	0,	'application'),
(19,	3,	0,	'application'),
(20,	7,	0,	'application'),
(21,	1,	0,	'document'),
(22,	2,	13,	'document'),
(23,	5,	0,	'document'),
(24,	6,	13,	'document'),
(25,	1,	0,	'code'),
(26,	2,	0,	'code'),
(27,	6,	0,	'code'),
(28,	20,	0,	'code'),
(29,	0,	0,	'uint'),
(30,	0,	0,	'spectra'),
(31,	0,	0,	'string'),
(32,	0,	0,	'reference'),
(121,	20,	0,	'Desktop'),
(122,	20,	0,	'Server'),
(123,	20,	0,	'Mobile'),
(124,	20,	0,	'Browser'),
(125,	20,	0,	'Console'),
(126,	20,	0,	'Mechanical'),
(127,	20,	129,	'All'),
(128,	20,	0,	'Cloud'),
(257,	2,	0,	'MediaList'),
(258,	2,	0,	'microdoc'),
(259,	258,	0,	'descriptive'),
(260,	258,	0,	'review'),
(261,	258,	0,	'qanda'),
(262,	258,	0,	'howto'),
(263,	258,	0,	'feature'),
(264,	1,	0,	'grid'),
(265,	1,	0,	'review'),
(266,	1,	0,	'profile')
ON DUPLICATE KEY UPDATE "id" = VALUES("id"), "parent" = VALUES("parent"), "pointer" = VALUES("pointer"), "name" = VALUES("name");

DROP TABLE IF EXISTS "REFERENTIAL_CONSTRAINTS_COLUMN_USAGE";
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW "REFERENTIAL_CONSTRAINTS_COLUMN_USAGE" AS select "KCU1"."CONSTRAINT_CATALOG" AS "CONSTRAINT_CATALOG","KCU1"."CONSTRAINT_SCHEMA" AS "CONSTRAINT_SCHEMA","KCU1"."CONSTRAINT_NAME" AS "CONSTRAINT_NAME","KCU1"."TABLE_CATALOG" AS "TABLE_CATALOG","KCU1"."TABLE_SCHEMA" AS "TABLE_SCHEMA","KCU1"."TABLE_NAME" AS "TABLE_NAME","KCU1"."COLUMN_NAME" AS "COLUMN_NAME","KCU1"."ORDINAL_POSITION" AS "ORDINAL_POSITION","KCU2"."CONSTRAINT_CATALOG" AS "UNIQUE_CONSTRAINT_CATALOG","KCU2"."CONSTRAINT_SCHEMA" AS "UNIQUE_CONSTRAINT_SCHEMA","KCU2"."CONSTRAINT_NAME" AS "UNIQUE_CONSTRAINT_NAME","KCU2"."TABLE_CATALOG" AS "UNIQUE_TABLE_CATALOG","KCU2"."TABLE_SCHEMA" AS "UNIQUE_TABLE_SCHEMA","KCU2"."TABLE_NAME" AS "UNIQUE_TABLE_NAME","KCU2"."COLUMN_NAME" AS "UNIQUE_COLUMN_NAME" from (("INFORMATION_SCHEMA"."REFERENTIAL_CONSTRAINTS" "RC" join "INFORMATION_SCHEMA"."KEY_COLUMN_USAGE" "KCU1" on((("KCU1"."CONSTRAINT_CATALOG" = "RC"."CONSTRAINT_CATALOG") and ("KCU1"."CONSTRAINT_SCHEMA" = "RC"."CONSTRAINT_SCHEMA") and ("KCU1"."CONSTRAINT_NAME" = "RC"."CONSTRAINT_NAME")))) join "INFORMATION_SCHEMA"."KEY_COLUMN_USAGE" "KCU2" on((("KCU2"."CONSTRAINT_CATALOG" = "RC"."UNIQUE_CONSTRAINT_CATALOG") and ("KCU2"."CONSTRAINT_SCHEMA" = "RC"."UNIQUE_CONSTRAINT_SCHEMA") and ("KCU2"."CONSTRAINT_NAME" = "RC"."UNIQUE_CONSTRAINT_NAME")))) where ("KCU1"."ORDINAL_POSITION" = "KCU2"."ORDINAL_POSITION")

-- 2014-04-19 12:30:15
