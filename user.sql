-- Adminer 3.2.2 MySQL dump

SET NAMES utf8;
SET foreign_key_checks = 0;
SET time_zone = 'SYSTEM';
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `brollopsgruppen`;
CREATE DATABASE `brollopsgruppen` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `brollopsgruppen`;

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

-- 2011-10-28 11:57:26
