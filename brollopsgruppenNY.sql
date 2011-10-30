-- Adminer 3.2.2 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `brollopsgruppen`;
CREATE DATABASE `brollopsgruppen` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `brollopsgruppen`;

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_bin NOT NULL,
  `content` longtext COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `phone` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `phone` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `customer` (`id`, `name`, `email`, `phone`) VALUES
(5,	'Linda Lickander',	'linda.lickander@gmail.com',	''),
(6,	'Linda Lickander',	'linda.lickander@gmail.com',	'');

DROP TABLE IF EXISTS `customer_answer_question`;
CREATE TABLE `customer_answer_question` (
  `question_id` int(10) unsigned NOT NULL,
  `customer_id` int(10) unsigned NOT NULL,
  KEY `question_id` (`question_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `customer_answer_question_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`),
  CONSTRAINT `customer_answer_question_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `customer_answer_question` (`question_id`, `customer_id`) VALUES
(1,	5),
(1,	6),
(2,	6);

DROP TABLE IF EXISTS `footer`;
CREATE TABLE `footer` (
  `content` longtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `footer` (`content`) VALUES
('Bröllopsgruppen 2011 | info@brollopsgruppen.se | <b>Tel:</b> 08 - 10 20 30');

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(10) unsigned NOT NULL,
  `image_ids` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `gallery` (`id`, `type`, `image_ids`) VALUES
(1,	0,	6);

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_bin NOT NULL,
  `imglink` varchar(200) COLLATE utf8_bin NOT NULL,
  `type` enum('header','sidebar_left','sidebar_right','gallery') COLLATE utf8_bin NOT NULL,
  `importance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `image` (`id`, `name`, `imglink`, `type`, `importance`) VALUES
(1,	'brollopsgruppen-logo21.png',	'C:/wamp/www/brollopsgruppen/uploads/brollopsgruppen-logo21.png',	'header',	0),
(2,	'ny1.png',	'C:/wamp/www/brollopsgruppen/uploads/ny1.png',	'sidebar_right',	1),
(3,	'next1.png',	'C:/wamp/www/brollopsgruppen/uploads/next1.png',	'sidebar_right',	1),
(4,	'previous1.png',	'C:/wamp/www/brollopsgruppen/uploads/previous1.png',	'sidebar_right',	1),
(5,	'next5.png',	'C:/wamp/www/brollopsgruppen/uploads/next5.png',	'sidebar_right',	0),
(6,	'next8.png',	'C:/wamp/www/brollopsgruppen/uploads/next8.png',	'gallery',	0);

DROP TABLE IF EXISTS `image_image_position`;
CREATE TABLE `image_image_position` (
  `imgage_id` int(10) unsigned NOT NULL,
  `image_position_id` int(11) NOT NULL,
  KEY `imgage_id` (`imgage_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `image_image_position` (`imgage_id`, `image_position_id`) VALUES
(1,	1);

DROP TABLE IF EXISTS `image_position`;
CREATE TABLE `image_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `image_position` (`id`, `name`) VALUES
(1,	'header'),
(2,	'gallery'),
(3,	'left'),
(4,	'right');

DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_bin NOT NULL,
  `content` longtext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `page` (`id`, `title`, `content`) VALUES
(1,	'Start',	'Lägger in lite testdata och <span style=\"font-weight: bold;\">gör</span> om <b>igen</b>'),
(2,	'Galleri',	'test'),
(3,	'Om bröllopsgruppen',	'Test');

DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(250) COLLATE utf8_bin NOT NULL,
  `category` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `question` (`id`, `question`, `category`) VALUES
(1,	'Test fråga',	'infor'),
(2,	'ny test',	'under');

DROP TABLE IF EXISTS `sidebar`;
CREATE TABLE `sidebar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_bin NOT NULL,
  `image_ids` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `sidebar` (`id`, `type`, `image_ids`) VALUES
(1,	'sidebar_right',	'3,2');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `salt` varchar(200) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `user` (`id`, `password`, `email`, `salt`) VALUES
(8,	'$2a$08$u2JStRjaVOaf/62j1Qj0UeMs2cIjBY9qBbczoEH9ZAhlb1ybs2g4i',	'linda.lickander@gmail.com',	''),
(9,	'5d922a69347d2e69e7fd6aa948d03bf0a9e33679ea6bd46e24f5811a3c577a0bec24f53b25ddeeaae48699a724cb03027ebd0275f6dbc198fd568c98d5873de0',	'linda.lickander1@gmail.com',	'837376046'),
(10,	'800555eaa8571bff3cf72d47f743e52d0be20ec6489139c223425d007a01bf65256cc97245e382a3a8cc7816f3350f142e449bf310f81e8475005662db770f9f',	'linda.lickander2@gmail.com',	'762933808'),
(11,	'00442d97b610983f84f90e9b3914c60e210cee753cbeeca987555bd173b279e50a91b8a7c810b6d0c3231bd243c65900b181f7cb31ded93ee8207967507c8a8c',	'linda.lickander3@gmail.com',	'1295789193'),
(12,	'$2a$08$ozDPKuUpNcNXVcwnrXO91ebFWzBuvvuaVZ0O6yIfm.wfc5dGRK4ge',	'linda.lickander4@gmail.com',	''),
(13,	'$2a$08$4agbhWjMxLnIL1ju4wiCcOKA4P.1TFi90pZ9KgxNRZUdN2jLVFgIC',	'linda.lickander5@gmail.com',	''),
(14,	'$2a$08$MZC9Kx05nun7t4Y.CRekwen.yc9AXpFWbBKhrzZz63du2tF5E7hSS',	'hillamed3@gmail.com',	'');

-- 2011-10-30 13:12:25
