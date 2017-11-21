-- Adminer 4.2.5 MySQL dump

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

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `created_by`, `created_time`, `updated_by`, `updated_time`) VALUES
(1,	'd1',	'd',	1,	'2017-11-15 17:54:16',	0,	'0000-00-00 00:00:00');

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
  `registration_start_date` date NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `registration_end_date` date NOT NULL,
  `event_description` text NOT NULL,
  `handle_by` bigint(20) NOT NULL,
  `team_size` varchar(20) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `updated_time` datetime NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `events` (`event_id`, `event_name`, `category_id`, `sub_category_id`, `event_organized_for`, `event_type`, `event_place`, `event_start_date`, `event_end_date`, `event_start_time`, `event_end_time`, `registration_start_date`, `is_active`, `registration_end_date`, `event_description`, `handle_by`, `team_size`, `created_by`, `created_time`, `updated_by`, `updated_time`) VALUES
(1,	'aEDAD',	1,	1,	1,	1,	'ASD',	'2017-11-16',	'2017-11-16',	'17:15:00',	'17:15:00',	'2017-11-16',	0,	'2017-11-16',	'ADSAS',	3,	'',	1,	'2017-11-16 17:22:30',	0,	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `student_master`;
CREATE TABLE `student_master` (
  `student_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `course` varchar(200) NOT NULL,
  `semester` tinyint(4) NOT NULL,
  `division` tinyint(4) NOT NULL,
  `enrollment_no` varchar(200) NOT NULL,
  `roll_number` bigint(20) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `student_mobile_no` varchar(100) NOT NULL,
  `gender` tinyint(2) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `updated_time` datetime NOT NULL,
  PRIMARY KEY (`student_id`)
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
(1,	's',	's',	1,	'2017-11-15 17:54:32',	0,	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `user_type` tinyint(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_time` datetime NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `updated_time` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `remarks`, `user_type`, `is_active`, `created_by`, `created_time`, `updated_by`, `updated_time`) VALUES
(1,	'k@gmail.com',	'fe01ce2a7fbac8fafaed7c982a04e229',	'kalpesh',	'',	1,	1,	0,	'2017-08-17 05:49:49',	0,	'2017-11-04 18:48:22'),
(3,	'vishal@gmail.com',	'fe01ce2a7fbac8fafaed7c982a04e229',	'demo',	'',	2,	1,	0,	'2017-11-15 17:55:03',	0,	'0000-00-00 00:00:00');

-- 2017-11-21 05:03:08
