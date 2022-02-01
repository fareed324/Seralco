/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.27 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `users` (
	`id` int ,
	`username` varchar ,
	`password` varchar ,
	`temp_pass` varchar ,
	`temp_pass_active` int ,
	`first_name` varchar ,
	`last_name` varchar ,
	`um_dept` varchar ,
	`email` varchar ,
	`dialing_code` int ,
	`phone` varchar ,
	`city` varchar ,
	`country` varchar ,
	`thumb_path` varchar ,
	`img_path` varchar ,
	`active` int ,
	`level_access` int ,
	`act_key` varchar ,
	`reg_date` varchar ,
	`last_active` varchar 
); 
