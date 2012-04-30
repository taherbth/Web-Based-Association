-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2012 at 05:37 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wab`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_category_tbl`
--

CREATE TABLE IF NOT EXISTS `article_category_tbl` (
  `article_category_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `article_category_name` varchar(50) NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`article_category_id`),
  UNIQUE KEY `article_category_name_UNIQUE` (`article_category_name`)
) ENGINE=InnoDB DEFAULT CHARSET=big5 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `article_category_tbl`
--


-- --------------------------------------------------------

--
-- Table structure for table `article _tbl`
--

CREATE TABLE IF NOT EXISTS `article _tbl` (
  `article_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `article_category_id` bigint(20) NOT NULL,
  `member_id` bigint(20) NOT NULL,
  `organization_id` bigint(20) NOT NULL,
  `article_title` varchar(50) NOT NULL,
  `article_headings` text NOT NULL,
  `article_text` text NOT NULL,
  `article_add_date` datetime NOT NULL,
  `article_expire_date` datetime NOT NULL,
  `article_importance` int(2) NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  KEY `article _tbl_article_category_id_fk` (`article_category_id`),
  KEY `article _tbl_member_id_fk` (`member_id`),
  KEY `article _tbl_organization_id_fk` (`organization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=big5 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `article _tbl`
--


-- --------------------------------------------------------

--
-- Table structure for table `comment_on_article_tbl`
--

CREATE TABLE IF NOT EXISTS `comment_on_article_tbl` (
  `comment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` bigint(20) NOT NULL,
  `article_id` bigint(20) NOT NULL,
  `comment_on_member_id` bigint(20) NOT NULL,
  `comment_member_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `comment_on_article_tbl_organization_id_fk` (`organization_id`),
  KEY `comment_on_article_tbl_article_id_fk` (`article_id`),
  KEY `comment_on_article_tbl_comment_on_member_id_fk` (`comment_on_member_id`),
  KEY `comment_on_article_tbl_comment_member_id_fk` (`comment_member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=big5 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `comment_on_article_tbl`
--


-- --------------------------------------------------------

--
-- Table structure for table `member_tbl`
--

CREATE TABLE IF NOT EXISTS `member_tbl` (
  `member_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_id` bigint(20) NOT NULL,
  `member_type_id` bigint(20) NOT NULL,
  `member_pnr` text NOT NULL,
  `member_first_name` varchar(50) NOT NULL,
  `member_last_name` varchar(50) NOT NULL,
  `member_title` varchar(100) DEFAULT NULL,
  `member_user_name` text NOT NULL,
  `member_email` text NOT NULL,
  `member_login_password` text NOT NULL,
  `member_address` text,
  `member_zip` varchar(10) DEFAULT NULL,
  `member_city` varchar(50) DEFAULT NULL,
  `member_cell_phone` varchar(30) DEFAULT NULL,
  `member_home_phone` varchar(30) DEFAULT NULL,
  `member_photo` mediumblob,
  `member_profile_text` text,
  `member_apartment_no` bigint(20) DEFAULT NULL,
  `member_household` varchar(20) DEFAULT NULL,
  `membership_expire_date` datetime DEFAULT NULL,
  `member_blocked` int(1) DEFAULT '0',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`member_id`),
  KEY `member_tbl_organization_id_fk` (`organization_id`),
  KEY `member_tbl_member_type_id_fk` (`member_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=big5 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `member_tbl`
--


-- --------------------------------------------------------

--
-- Table structure for table `member_type_tbl`
--

CREATE TABLE IF NOT EXISTS `member_type_tbl` (
  `member_type_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `member_type_name` varchar(100) NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`member_type_id`),
  UNIQUE KEY `member_type_name_UNIQUE` (`member_type_name`)
) ENGINE=InnoDB DEFAULT CHARSET=big5 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `member_type_tbl`
--


-- --------------------------------------------------------

--
-- Table structure for table `module_function_access_tbl`
--

CREATE TABLE IF NOT EXISTS `module_function_access_tbl` (
  `module_function_access_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `module_function_id` bigint(20) NOT NULL,
  `module_function_html_id` varchar(100) NOT NULL,
  `organization_id` bigint(20) NOT NULL,
  `member_type_id` bigint(20) NOT NULL,
  `module_function_access` int(11) NOT NULL DEFAULT '0',
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`module_function_access_id`),
  KEY `module_function_access_module_function_id_fk` (`module_function_id`),
  KEY `module_function_access_module_function_html_id_fk` (`module_function_html_id`),
  KEY `module_function_access_organization_id_fk` (`organization_id`),
  KEY `module_function_access_member_type_id_fk` (`member_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=big5 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `module_function_access_tbl`
--


-- --------------------------------------------------------

--
-- Table structure for table `module_function_name_tbl`
--

CREATE TABLE IF NOT EXISTS `module_function_name_tbl` (
  `module_function_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `module_function_html_id` varchar(100) NOT NULL,
  `module_function_name` text NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`module_function_id`),
  UNIQUE KEY `module_function_html_id_UNIQUE` (`module_function_html_id`)
) ENGINE=InnoDB DEFAULT CHARSET=big5 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `module_function_name_tbl`
--


-- --------------------------------------------------------

--
-- Table structure for table `organization _category_tbl`
--

CREATE TABLE IF NOT EXISTS `organization _category_tbl` (
  `organization_category_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_category_name` varchar(40) NOT NULL,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`organization_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `organization _category_tbl`
--


-- --------------------------------------------------------

--
-- Table structure for table `organization _tbl`
--

CREATE TABLE IF NOT EXISTS `organization _tbl` (
  `organization_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `organization_number` varchar(20) NOT NULL,
  `organization_admin_user` varchar(20) NOT NULL,
  `organization_admin_password` text NOT NULL,
  `organization_name` varchar(100) NOT NULL,
  `primary_address` varchar(100) NOT NULL,
  `optional_address` varchar(100) DEFAULT NULL,
  `organization_phone` varchar(30) NOT NULL,
  `organization_fax` varchar(30) DEFAULT NULL,
  `organization_category_id` bigint(20) NOT NULL,
  `organization_profile_text` text,
  `organization_logo` mediumblob,
  `organization_visibility` int(1) DEFAULT NULL,
  `add_date` datetime NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`organization_id`),
  UNIQUE KEY `organization _tblcol_UNIQUE` (`organization_number`),
  UNIQUE KEY `organization_admin_user_UNIQUE` (`organization_admin_user`),
  UNIQUE KEY `organization_name_UNIQUE` (`organization_name`),
  KEY `organization_category_id_fk` (`organization_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `organization _tbl`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `article _tbl`
--
ALTER TABLE `article _tbl`
  ADD CONSTRAINT `article _tbl_article_category_id_fk` FOREIGN KEY (`article_category_id`) REFERENCES `article_category_tbl` (`article_category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article _tbl_member_id_fk` FOREIGN KEY (`member_id`) REFERENCES `member_tbl` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article _tbl_organization_id_fk` FOREIGN KEY (`organization_id`) REFERENCES `organization _tbl` (`organization_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_on_article_tbl`
--
ALTER TABLE `comment_on_article_tbl`
  ADD CONSTRAINT `comment_on_article_tbl_organization_id_fk` FOREIGN KEY (`organization_id`) REFERENCES `organization _tbl` (`organization_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_on_article_tbl_article_id_fk` FOREIGN KEY (`article_id`) REFERENCES `article _tbl` (`article_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_on_article_tbl_comment_on_member_id_fk` FOREIGN KEY (`comment_on_member_id`) REFERENCES `member_tbl` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_on_article_tbl_comment_member_id_fk` FOREIGN KEY (`comment_member_id`) REFERENCES `member_tbl` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_tbl`
--
ALTER TABLE `member_tbl`
  ADD CONSTRAINT `member_tbl_member_type_id_fk` FOREIGN KEY (`member_type_id`) REFERENCES `member_type_tbl` (`member_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_tbl_organization_id_fk` FOREIGN KEY (`organization_id`) REFERENCES `organization _tbl` (`organization_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `module_function_access_tbl`
--
ALTER TABLE `module_function_access_tbl`
  ADD CONSTRAINT `module_function_access_member_type_id_fk` FOREIGN KEY (`member_type_id`) REFERENCES `member_type_tbl` (`member_type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `module_function_access_module_function_html_id_fk` FOREIGN KEY (`module_function_html_id`) REFERENCES `module_function_name_tbl` (`module_function_html_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `module_function_access_module_function_id_fk` FOREIGN KEY (`module_function_id`) REFERENCES `module_function_name_tbl` (`module_function_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `module_function_access_organization_id_fk` FOREIGN KEY (`organization_id`) REFERENCES `organization _tbl` (`organization_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organization _tbl`
--
ALTER TABLE `organization _tbl`
  ADD CONSTRAINT `organization_category_id_fk` FOREIGN KEY (`organization_category_id`) REFERENCES `organization _category_tbl` (`organization_category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
