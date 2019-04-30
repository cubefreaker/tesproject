/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 10.1.38-MariaDB : Database - db_itx_v2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_itx_v2` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_itx_v2`;

/*Table structure for table `company_contact` */

DROP TABLE IF EXISTS `company_contact`;

CREATE TABLE `company_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `mobile` int(15) NOT NULL,
  `name_ops` varchar(50) NOT NULL,
  `email_ops` varchar(50) NOT NULL,
  `phone_ops` int(15) NOT NULL,
  `mobile_ops` int(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`contact_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) NOT NULL,
  `last_login` int(11) DEFAULT NULL,
  `is_active` enum('true','false') NOT NULL DEFAULT 'false',
  `active` int(11) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `birth_date` date NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `img_thum` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT '0:superadmin | 1:admin | 2:editor | 5:member',
  `status` tinyint(1) DEFAULT '0' COMMENT '1:active | 0:nonactive | 2:deleted',
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UserNameUnique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Table structure for table `users_bank` */

DROP TABLE IF EXISTS `users_bank`;

CREATE TABLE `users_bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(50) NOT NULL,
  `bank_account` varchar(20) NOT NULL,
  `bank_user` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `users_company` */

DROP TABLE IF EXISTS `users_company`;

CREATE TABLE `users_company` (
  `co_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `phone_no` int(15) NOT NULL,
  `mobile_no` int(15) NOT NULL,
  `address` varchar(250) NOT NULL,
  `sub_district` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `postal_code` int(10) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`co_id`),
  KEY `id` (`id`),
  CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `users_document` */

DROP TABLE IF EXISTS `users_document`;

CREATE TABLE `users_document` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  `scan_ktp` varchar(50) DEFAULT NULL,
  `scan_npwp` varchar(50) DEFAULT NULL,
  `scan_siup` varchar(50) DEFAULT NULL,
  `scan_akta` varchar(50) DEFAULT NULL,
  `scan_sk` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_ktp` enum('1','0') DEFAULT '0',
  `is_npwp` enum('1','0') DEFAULT '0',
  `is_siup` enum('1','0') DEFAULT '0',
  `is_akta` enum('1','0') DEFAULT '0',
  `is_sk` enum('1','0') DEFAULT '0',
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `users_groups` */

DROP TABLE IF EXISTS `users_groups`;

CREATE TABLE `users_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Table structure for table `users_groups_relation` */

DROP TABLE IF EXISTS `users_groups_relation`;

CREATE TABLE `users_groups_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Table structure for table `users_login_attempts` */

DROP TABLE IF EXISTS `users_login_attempts`;

CREATE TABLE `users_login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `users_privyid` */

DROP TABLE IF EXISTS `users_privyid`;

CREATE TABLE `users_privyid` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `token` text,
  PRIMARY KEY (`auto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `users_privyid_det` */

DROP TABLE IF EXISTS `users_privyid_det`;

CREATE TABLE `users_privyid_det` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `privy_id` varchar(50) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `verified_status` varchar(15) DEFAULT NULL,
  `ktp_det` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `users_privyid_doc` */

DROP TABLE IF EXISTS `users_privyid_doc`;

CREATE TABLE `users_privyid_doc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_token` varchar(100) DEFAULT NULL,
  `url_document` varchar(100) DEFAULT NULL,
  `posted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `users_request` */

DROP TABLE IF EXISTS `users_request`;

CREATE TABLE `users_request` (
  `req_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `seller_status` enum('undefined','requested','accepted','rejected') NOT NULL DEFAULT 'undefined',
  `buyer_status` enum('undefined','requested','accepted','rejected') NOT NULL DEFAULT 'undefined',
  `is_api` enum('Y','N') NOT NULL DEFAULT 'N',
  `is_wl` enum('Y','N') NOT NULL DEFAULT 'N',
  `is_ta` enum('Y','N') NOT NULL DEFAULT 'N',
  `user_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`req_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `v2_list_payment_gateway` */

DROP TABLE IF EXISTS `v2_list_payment_gateway`;

CREATE TABLE `v2_list_payment_gateway` (
  `lpg_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lpg_name` varchar(50) DEFAULT NULL COMMENT 'faspay | midtrans',
  `lpg_code` tinyint(4) DEFAULT NULL COMMENT '1:faspay | 2:midtrans',
  `lpg_status` tinyint(4) DEFAULT '0' COMMENT '0:non-active| 1:active',
  PRIMARY KEY (`lpg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `v2_list_service` */

DROP TABLE IF EXISTS `v2_list_service`;

CREATE TABLE `v2_list_service` (
  `ls_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ls_name` varchar(50) DEFAULT NULL,
  `ls_status` tinyint(4) DEFAULT NULL COMMENT '0:not active|1:active',
  PRIMARY KEY (`ls_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Table structure for table `v2_log_visitor` */

DROP TABLE IF EXISTS `v2_log_visitor`;

CREATE TABLE `v2_log_visitor` (
  `lv_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lv_ip_address` varchar(20) DEFAULT NULL,
  `lv_user_agent` varchar(100) DEFAULT NULL,
  `lv_created_at` datetime DEFAULT NULL,
  `lv_page` varchar(100) DEFAULT NULL,
  `lv_type` tinyint(4) DEFAULT NULL COMMENT '1:customer|2:adminpanel',
  `lv_is_ajax` tinyint(4) DEFAULT NULL COMMENT '0:no|1:ajax',
  PRIMARY KEY (`lv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11274 DEFAULT CHARSET=utf8;

/*Table structure for table `v2_master_country` */

DROP TABLE IF EXISTS `v2_master_country`;

CREATE TABLE `v2_master_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `nicename` varchar(100) NOT NULL DEFAULT '',
  `country_code2` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=257 DEFAULT CHARSET=utf8;

/*Table structure for table `v2_master_landingpage` */

DROP TABLE IF EXISTS `v2_master_landingpage`;

CREATE TABLE `v2_master_landingpage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `company_email` varchar(50) DEFAULT NULL,
  `meta_keyword` varchar(50) DEFAULT NULL,
  `meta_description` varchar(100) DEFAULT NULL,
  `javascript` text,
  `term_condition` text,
  `favicon` varchar(100) DEFAULT NULL,
  `company_logo` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_address` text,
  `company_tour_inquiries` text,
  `company_contact_center` text,
  `contactus_contact_center` text,
  `contactus_tour_inquiries` text,
  `contactus_complain_compliment` text,
  `contactus_socmed` text,
  `logo` varchar(100) DEFAULT NULL,
  `copyright` varchar(100) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `style` text,
  `google_analytic_id` varchar(50) DEFAULT NULL,
  `background_image` varchar(100) DEFAULT NULL,
  `tagline` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `v2_master_page` */

DROP TABLE IF EXISTS `v2_master_page`;

CREATE TABLE `v2_master_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numurl` int(3) NOT NULL DEFAULT '0',
  `seourl` varchar(255) NOT NULL DEFAULT ' ',
  `parentid` int(11) NOT NULL DEFAULT '0',
  `metakeyword` text,
  `metadescription` text,
  `name` varchar(255) NOT NULL DEFAULT ' ',
  `nav_name` varchar(100) NOT NULL,
  `subtitle` varchar(625) NOT NULL,
  `imgcover` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `subcontent` text CHARACTER SET utf8 NOT NULL,
  `javascript` text,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:temporary | 1:permanent',
  `ordernumber` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:active | 1:nonactive | 2:deleted',
  `createdby` int(11) NOT NULL DEFAULT '0',
  `createddate` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `updatedby` int(11) NOT NULL DEFAULT '0',
  `updateddate` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
  `ipaddress` varchar(20) NOT NULL DEFAULT ' ',
  `is_parent` tinyint(1) DEFAULT '0',
  `number` tinyint(1) NOT NULL DEFAULT '0',
  `position` tinyint(1) DEFAULT '1',
  `type_page` varchar(10) NOT NULL DEFAULT 'footer' COMMENT 'footer | nav | navmore1 | navmore2',
  `redirect_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UniqueSeoUrl` (`seourl`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Table structure for table `v2_master_setting` */

DROP TABLE IF EXISTS `v2_master_setting`;

CREATE TABLE `v2_master_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT ' ',
  `email` varchar(100) NOT NULL DEFAULT ' ',
  `metakeyword` text,
  `metadescription` text,
  `javascript` text,
  `term_condition` text,
  `logo` varchar(255) DEFAULT NULL,
  `checkbox` varchar(50) DEFAULT NULL,
  `is_image_background` tinyint(4) DEFAULT NULL COMMENT '0:no|1:yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Table structure for table `v2_master_status_text` */

DROP TABLE IF EXISTS `v2_master_status_text`;

CREATE TABLE `v2_master_status_text` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_type` int(2) DEFAULT NULL COMMENT '1:status payment',
  `st_text` text COMMENT 'text',
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
