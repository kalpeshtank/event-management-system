-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) NOT NULL,
  `category_description` text NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `updated_time` datetime NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `event_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(200) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `sub_category_id` bigint(20) NOT NULL,
  `event_organized_for` tinyint(1) NOT NULL,
  `event_type` tinyint(1) NOT NULL,
  `event_place` varchar(200) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `event_start_time` time NOT NULL,
  `event_end_time` time NOT NULL,
  `event_description` text NOT NULL,
  `registration_start_date` date NOT NULL,
  `registration_end_date` date NOT NULL,
  `event_photo` varchar(200) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `updated_time` datetime NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE `sub_category` (
  `sub_category_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sub_category_name` varchar(200) NOT NULL,
  `sub_category_description` text NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `updated_time` datetime NOT NULL,
  PRIMARY KEY (`sub_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `sub_category` (`sub_category_id`, `sub_category_name`, `sub_category_description`, `created_by`, `created_time`, `updated_by`, `updated_time`) VALUES
(5,	'inter calass',	'inter colleg for meal',	1,	'2017-11-07 15:25:25',	0,	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `updated_time` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `remarks`, `created_by`, `created_time`, `updated_by`, `updated_time`) VALUES
(1,	'k@gmail.com',	'fe01ce2a7fbac8fafaed7c982a04e229',	'kalpesh',	'',	0,	'2017-08-17 05:49:49',	1,	'2017-11-04 18:48:22');

-- 2017-11-08 11:55:03
