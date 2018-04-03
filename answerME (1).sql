-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 03 أبريل 2018 الساعة 19:11
-- إصدار الخادم: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `answerME`
--

DELIMITER $$
--
-- الإجراءات
--
CREATE DEFINER=`answerMe`@`%` PROCEDURE `doWhile` ()  BEGIN
DECLARE i INT DEFAULT 60;
WHILE (i >59 and i <= 100 ) DO
    INSERT INTO comments (id,content ,is_ghost,created_at,users_id,posts_id) VALUES (i,'hello tester',0,null,14,1);
    SET i = i+1;
END WHILE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- بنية الجدول `actions`
--

CREATE TABLE `actions` (
  `users_id` int(11) NOT NULL,
  `target_users_id` int(11) NOT NULL,
  `is_ghost` tinyint(1) NOT NULL DEFAULT '0',
  `type` enum('follow','block','hide_post','hide_suggest') NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `actions`
--

INSERT INTO `actions` (`users_id`, `target_users_id`, `is_ghost`, `type`, `created_at`) VALUES
(1, 14, 0, 'block', '2018-02-19 13:44:17'),
(1, 14, 0, 'hide_post', '2018-02-19 13:19:43'),
(1, 14, 0, 'hide_suggest', '2018-02-19 13:40:22');

-- --------------------------------------------------------

--
-- بنية الجدول `app_settings`
--

CREATE TABLE `app_settings` (
  `id` int(11) NOT NULL,
  `policy_terms_ar` text NOT NULL,
  `policy_terms_en` text NOT NULL,
  `about_us_ar` text NOT NULL,
  `about_us_en` text NOT NULL,
  `contact_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `app_settings`
--

INSERT INTO `app_settings` (`id`, `policy_terms_ar`, `policy_terms_en`, `about_us_ar`, `about_us_en`, `contact_email`) VALUES
(1, 'الشروط و الأحكام باللغة العربية الفصحى', 'Policy and Terms in English The direction of the icon and the editaffected by the device language (please make it affected by the app ', 'معلومات التطبيق باللغة \n العربية معلومات عن التطبيق باللغة العربية معلومات عن gالتطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية  \n العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن   \n العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن  \n العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن  \n العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن  \n العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن  \n العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن  \n العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن  \n العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن                                           \n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n \n العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق باللغة العربية معلومات عن التطبيق', 'Information about APP in English Information about APP in English Information APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English.   \nInformation about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English \n\n\n\n\n\n\n\n\n\n\n\n\n\nInformation about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English.   \n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nInformation about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English Information about APP in English.', 'email@mail.com');

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `hex_color` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `hex_color`) VALUES
(1, 'الرياضة', 'Sport', '00BCD4'),
(2, 'العائلة', 'Family', 'f44336'),
(3, 'العمل', 'Work', 'FFEB3B'),
(4, 'المذاكرة', 'Study', '3D5AFE'),
(5, 'الزواج', 'Marriage', 'DD2C00'),
(6, 'المرح', 'Entertainment', '4CAF50'),
(7, 'الخطر', 'Danger', 'b71c1c'),
(8, 'الفن', 'Art', '7B1FA2'),
(9, 'السياسة', 'Political', '607D8B'),
(10, 'hrjwh]', 'Economic', '00695C'),
(11, 'طقس', 'Weather', '29B6F6'),
(12, 'افراح', 'Wedding', 'FFC400'),
(13, 'سياحة', 'Tourism', 'EC407A'),
(14, 'موسيقى', 'Music', '9E9E9E'),
(15, 'اراء', 'Opinion', '8BC34A');

-- --------------------------------------------------------

--
-- بنية الجدول `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `is_ghost` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `users_id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `comments`
--

INSERT INTO `comments` (`id`, `content`, `is_ghost`, `created_at`, `users_id`, `posts_id`) VALUES
(8, 'Bla Bla Bla', 1, '2017-10-04 00:00:00', 7, 1),
(11, 'Bla Bla Bla', 0, '2017-10-04 00:00:00', 14, 1),
(12, 'Bla Bla Bla', 0, '2017-10-04 00:00:00', 5, 4),
(13, 'I will kill you', 1, '2017-10-04 17:50:35', 1, 3),
(14, 'منك لله', 1, '2017-10-04 17:51:07', 14, 1),
(15, 'اهلا اصدقائى', 1, '2017-10-04 17:51:08', 14, 1),
(16, ' كيف حالكم كيف حالكمرررركيف حالكمكيف حالكمكيف حالكمركيف حالكمكيف حالكمكيف حالكم', 1, '2017-10-04 17:51:09', 1, 17),
(27, 'elnarody', 1, '2017-10-24 18:03:31', 14, 1),
(29, 'ده تعليق على البوست بتاع الابى توكن اللى معانا اشطا اخلع', 0, '2017-10-25 04:07:39', 1, 31),
(31, 'hffggr', 0, '2017-10-25 14:50:18', 14, 4),
(37, 'udvvvdhxj', 1, '2017-10-25 18:49:19', 14, 32),
(38, 'gcccvcgyfy', 1, '2017-10-25 18:50:25', 14, 32),
(41, 'fsfhgghhh', 1, '2017-10-28 11:56:58', 14, 28),
(42, 'tdaagh', 1, '2017-10-28 12:25:40', 14, 28),
(43, 'ddhh', 1, '2017-10-28 12:25:53', 14, 28),
(45, 'mmmmm', 1, '2017-10-29 15:16:10', 14, 6),
(46, 'ggggg', 1, '2017-10-29 15:32:17', 14, 1),
(48, 'اللل', 1, '2017-10-29 15:51:49', 14, 1),
(49, 'yhgfhdh', 1, '2017-10-29 16:35:39', 14, 30),
(50, 'comment', 0, '2017-11-06 16:29:35', 14, 17),
(51, 'كومنت', 0, '2017-11-06 16:56:31', 14, 17),
(52, 'كومنتت', 0, '2017-11-06 17:04:11', 14, 17),
(53, 'comments', 0, '2017-11-06 17:16:34', 14, 17),
(55, 'gdfgdsfgds', 0, '2017-11-15 17:06:16', 28, 17),
(56, 'fasdfasf', 0, '2017-11-15 17:12:42', 28, 17),
(57, 'ggsdfgsdg', 0, '2017-11-15 17:15:21', 14, 1),
(58, 'dsdsd', 0, '2017-11-15 18:36:43', 28, 17),
(59, 'اى كلام فاضى معقول', 0, '2017-11-29 00:00:00', 27, 110),
(60, 'ggffx', 1, '2017-12-02 13:22:02', 169, 73),
(61, 'mm', 1, '2017-12-02 13:22:15', 169, 73),
(62, 'ygxg', 1, '2017-12-02 13:22:33', 169, 73),
(63, 'mas', 1, '2017-12-02 13:22:41', 169, 73),
(64, 'fdd', 1, '2017-12-02 13:24:29', 169, 101),
(65, 'gfd', 1, '2017-12-02 13:24:43', 169, 118),
(66, 'Jff', 1, '2017-12-02 13:24:53', 169, 118),
(67, 'لي', 1, '2017-12-02 13:25:28', 169, 1),
(68, 'gg', 1, '2017-12-03 11:36:51', 169, 118),
(69, 'hello world', 1, '2017-12-05 14:07:56', 169, 116),
(70, 'hello world', 1, '2017-12-05 14:08:04', 169, 116),
(71, 'hello world', 0, '2017-12-05 14:08:14', 169, 116),
(72, 'hello world', 1, '2017-12-05 14:08:29', 169, 116),
(73, 'hello world', 1, '2017-12-05 14:11:21', 169, 116),
(74, 'hello world', 0, '2017-12-05 14:11:31', 169, 116),
(75, 'gggfff', 1, '2017-12-05 14:42:12', 169, 124),
(76, 'Bff', 1, '2017-12-05 14:42:27', 169, 124),
(77, 'gfdd', 1, '2017-12-05 14:44:29', 169, 123),
(78, 'hello world', 1, '2017-12-05 14:44:50', 169, 116),
(79, 'esss', 1, '2017-12-05 14:45:06', 169, 124),
(80, 'لنبب', 1, '2017-12-06 13:15:32', 169, 113),
(81, 'يال', 1, '2017-12-06 13:15:42', 169, 113),
(82, 'ذتبب', 1, '2017-12-06 13:16:49', 169, 108),
(83, 'دذ', 1, '2017-12-06 13:17:45', 169, 108),
(84, 'لببا', 1, '2017-12-06 13:17:59', 169, 108),
(85, 'باتل', 1, '2017-12-06 13:18:18', 169, 108),
(87, 'ابب', 1, '2017-12-06 13:27:30', 169, 123),
(88, 'ااب', 1, '2017-12-06 13:33:49', 169, 124),
(89, 'زال', 1, '2017-12-06 13:35:12', 169, 124),
(90, 'ليل', 1, '2017-12-06 13:39:01', 169, 124),
(91, 'لتتيب', 1, '2017-12-06 13:50:43', 169, 124),
(92, 'بايط', 1, '2017-12-06 13:51:58', 169, 124),
(93, 'قعلظ', 1, '2017-12-06 13:52:55', 169, 124),
(94, 'hello world', 1, '2017-12-06 13:55:17', 169, 124),
(95, 'hello world', 0, '2017-12-06 13:55:25', 169, 124),
(96, 'اخر كومين لاخر بوست ', 0, '2017-12-06 13:56:47', 169, 124),
(97, 'hello world', 1, '2017-12-10 12:38:25', 169, 116),
(98, 'hello world', 0, '2017-12-10 12:40:40', 169, 116),
(99, 'hello world', 0, '2017-12-12 10:53:10', 169, 116),
(100, 'hello world', 1, '2017-12-12 10:53:16', 169, 116),
(101, 'hello worlااتاتنت', 1, '2017-12-12 10:53:33', 169, 116),
(102, 'hello worlااتاتنت', 1, '2017-12-12 10:54:16', 169, 116),
(103, 'hello worlااتاتنت', 0, '2017-12-13 11:33:15', 169, 116),
(104, 'hello worlااتاتنت', 1, '2017-12-13 11:33:25', 169, 116),
(105, 'hello worlااتاتنت', 1, '2017-12-13 11:34:46', 169, 116),
(106, 'hello worlااتاتنت', 0, '2017-12-13 11:42:43', 169, 116),
(114, 'n ah far guy aged', 0, '2018-01-29 15:40:38', 208, 110),
(115, 'my comment', 0, '2018-01-29 15:58:53', 208, 129),
(116, 'another one comment', 0, '2018-01-29 16:02:20', 67, 129),
(117, 'ggggg', 1, '2018-02-06 14:01:48', 211, 130),
(119, 'hhhhhhhhh', 1, '2018-02-06 14:04:44', 211, 125),
(120, 'y 7ekaaaaaaamk 3lenaaa', 0, '2018-02-06 14:14:19', 211, 126),
(121, 'alllah ya 3m b55 <3', 0, '2018-02-06 14:15:12', 211, 126),
(122, 'hhhhhhh', 1, '2018-02-06 14:48:57', 211, 134),
(123, 'هتاا', 1, '2018-02-07 11:25:25', 211, 136),
(124, 'تتهت', 1, '2018-02-07 11:25:32', 211, 136),
(125, 'ابددر', 0, '2018-02-07 11:37:38', 211, 104),
(126, 'msaaa', 0, '2018-02-07 11:52:11', 179, 136),
(127, 'DASFXGSDAVDSFGVZXVZXVC', 1, '2018-02-10 15:40:05', 13, 3),
(128, 'let’s test this api', 0, '2018-02-10 15:41:33', 208, 129),
(129, 'edfszvcxv', 1, '2018-02-10 17:03:19', 1, 1),
(130, 'edfszvcxv', 1, '2018-02-10 17:04:35', 26, 1),
(131, 'edfszvcxv', 1, '2018-02-10 17:06:19', 26, 1),
(132, 'edfszvcxv', 1, '2018-02-10 17:07:06', 14, 1),
(133, 'edfszvcxv', 1, '2018-02-10 17:07:14', 14, 1),
(134, 'test comment from me', 0, '2018-02-11 10:23:03', 67, 129),
(135, 't FG oh do ty', 0, '2018-02-13 12:03:34', 67, 135),
(139, 'test comment', 0, '2018-02-14 09:51:51', 208, 141),
(140, 'test comment in ghost mode', 1, '2018-02-14 09:52:16', 208, 141),
(144, 'اريتا', 1, '2018-02-14 10:45:31', 67, 31),
(145, 'عتيت', 1, '2018-02-14 10:45:40', 67, 31),
(146, 'يالب', 1, '2018-02-14 10:46:00', 67, 141),
(148, 'سعتال', 0, '2018-02-14 10:46:30', 67, 140),
(149, 'تتال', 0, '2018-02-14 10:46:39', 67, 140),
(158, 'cxfgh', 0, '2018-02-14 17:07:22', 67, 5),
(159, 'ry', 0, '2018-02-14 17:07:46', 67, 5),
(166, 'fda', 0, '2018-02-14 17:19:53', 67, 5),
(183, 'ببي', 0, '2018-02-15 13:20:10', 67, 139),
(184, 'لب', 0, '2018-02-15 13:20:41', 67, 139),
(185, 'dd', 0, '2018-02-15 13:21:15', 67, 138),
(186, 'لييب', 0, '2018-02-15 13:21:29', 67, 138),
(187, 'لا', 0, '2018-02-15 13:21:45', 67, 138),
(189, 'للي', 0, '2018-02-15 13:24:55', 67, 11),
(199, 'لبي', 0, '2018-02-15 14:39:39', 67, 22),
(203, 'لبي', 0, '2018-02-15 15:46:50', 67, 42),
(204, 'لبب', 0, '2018-02-15 15:50:48', 67, 42),
(209, 'زلات', 0, '2018-02-15 16:11:04', 67, 46),
(210, 'فبي', 0, '2018-02-15 16:15:53', 67, 44),
(214, 'لتر', 0, '2018-02-15 16:34:44', 67, 5),
(221, 'لي', 0, '2018-02-15 16:49:25', 67, 4),
(222, 'ايطتت', 0, '2018-02-15 16:51:57', 67, 4),
(223, 'لبيز', 0, '2018-02-15 16:52:17', 67, 112),
(224, 'بلل', 0, '2018-02-15 17:00:27', 67, 112),
(227, 'غبذ', 0, '2018-02-15 17:07:56', 67, 4),
(228, 'الل', 0, '2018-02-15 17:08:03', 67, 4),
(230, 'لبيلا', 0, '2018-02-15 17:16:46', 67, 4),
(231, 'للبب', 0, '2018-02-15 17:28:22', 67, 4),
(233, 'غيتن', 0, '2018-02-15 17:31:47', 67, 4),
(276, 'gj', 0, '2018-02-17 10:32:03', 67, 11),
(297, 'fgh', 0, '2018-02-17 13:04:03', 67, 142),
(298, 'ryyu', 0, '2018-02-17 13:38:00', 67, 142),
(299, 'cggf', 0, '2018-02-17 13:43:17', 67, 142),
(300, 'sdfg', 1, '2018-02-18 13:59:50', 1, 5);

-- --------------------------------------------------------

--
-- بنية الجدول `comments_likes`
--

CREATE TABLE `comments_likes` (
  `users_id` int(11) NOT NULL,
  `comments_id` int(11) NOT NULL,
  `type` enum('like','dislike') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `comments_likes`
--

INSERT INTO `comments_likes` (`users_id`, `comments_id`, `type`) VALUES
(14, 16, 'like'),
(14, 29, 'like'),
(14, 37, 'dislike'),
(14, 38, 'dislike'),
(14, 41, 'like'),
(14, 42, 'like'),
(14, 43, 'like'),
(14, 45, 'dislike'),
(14, 49, 'dislike'),
(28, 53, 'dislike'),
(67, 12, 'dislike'),
(67, 31, 'like'),
(67, 115, 'like'),
(67, 128, 'dislike'),
(82, 13, 'like'),
(82, 48, 'like'),
(169, 8, 'dislike'),
(169, 31, 'dislike'),
(169, 60, 'dislike'),
(169, 75, 'like'),
(208, 59, 'like'),
(208, 134, 'dislike'),
(211, 117, 'dislike'),
(211, 122, 'like'),
(211, 125, 'like');

-- --------------------------------------------------------

--
-- بنية الجدول `complains`
--

CREATE TABLE `complains` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `complains`
--

INSERT INTO `complains` (`id`, `message`, `image`, `created_at`, `users_id`) VALUES
(1, 'I will kill you', 'http://media.el-ahly.com/media2014/efa/shakwa/dsd_21.jpg', '2017-10-08 03:11:15', 1),
(2, 'انا زهقان من شكلك', 'http://img.innfrad.com/larg/20164.jpg', '2017-10-08 03:06:23', 5),
(3, 'ده انا هوديك قى داهية ياض .ده انا هردك خالص .ده انت هتشوف ايام سودة معايا ان شاء الله', 'https://i.pinimg.com/736x/5e/e3/00/5ee30098428231dfca649120e9706e17--arabic-quotes-islamic-quotes.jpg', '2017-10-08 00:00:08', 14),
(4, 'Hello every body . I will send my complains to the managers', 'https://www.fay3.com/assets/uploads/thumbs/a88c6oe4.jpg?1416792134', '2017-10-14 17:53:42', 14),
(5, 'السلام عليكم وشكرا', '    \"apiToken\" : \"OZVbCN80pEXtxwf1PXNhWOf1A5YVjBjucoBZ8BPYPhtDYr7eAq7YZySSomdJDYlVOBbZHW\"', '2017-10-15 12:19:04', 14),
(6, 'انا مش هتكلم كتير', 'http://www.vb.dreamjordan.com/up/20831hlmjo.jpeg', '2017-10-15 16:07:06', 14),
(10, 'Joe', 'images/complains/bIUCYX_1508939657.jpeg', '2017-10-25 13:54:17', 14),
(11, 'Jjjjj', NULL, '2017-10-25 14:06:40', 1),
(12, 'Jjjjj', 'images/complains/soDsmc_1508940504.jpeg', '2017-10-25 14:08:24', 14),
(13, 'Fffdgergregegergregregerg', NULL, '2017-10-25 15:05:00', 1),
(14, 'Fffdgergregegergregregerg', 'images/complains/FWGW22_1508943958.jpeg', '2017-10-25 15:05:58', 14),
(15, 'Gfdgdfgfdgfd', NULL, '2017-10-28 12:37:46', 1),
(16, 'Gfdgdfgfdgfd', 'images/complains/ZW7v2s_1509194372.jpeg', '2017-10-28 12:39:32', 14),
(17, 'Gfdgdfgfdgfd', 'images/complains/3VtifP_1509194412.jpeg', '2017-10-28 12:40:12', 14),
(18, 'Redfffff', NULL, '2017-10-30 15:15:43', 22),
(19, 'Ccccccc', NULL, '2017-10-30 15:20:41', 22),
(20, 'Youssef', NULL, '2017-11-05 09:29:30', 22),
(21, 'ivfihif', 'images/complains/cJRfE8_1510473642.jpeg', '2017-11-12 08:00:42', 14),
(22, 'ivfihif', 'images/complains/6SXWZ4_1510473688.jpeg', '2017-11-12 08:01:28', 14),
(23, 'البوستات مش بتترفع', NULL, '2017-11-12 08:02:54', 14),
(24, 'ghhf', NULL, '2017-11-14 13:20:56', 14),
(25, 'Youssef', NULL, '2017-11-14 13:25:33', 22),
(26, 'Youssef', 'images/complains/rpBpbD_1510666061.jpeg', '2017-11-14 13:27:41', 14),
(27, 'Youssef', 'images/complains/vnpBlA_1510666354.jpeg', '2017-11-14 13:32:34', 14),
(28, 'Joe', NULL, '2017-11-14 14:03:44', 22),
(29, 'Joe', NULL, '2017-11-14 14:05:56', 22),
(30, 'Fffff', NULL, '2017-11-14 14:07:53', 22),
(31, 'f 9diffifihfufhfif igngg', NULL, '2017-11-15 13:51:46', 14),
(32, 'jddgghhhg', NULL, '2017-11-15 13:53:35', 14),
(33, 'Joooooooo', NULL, '2017-11-19 11:26:15', 22),
(34, 'hbvggb. Bbbbbb. Hbbhjjjjj', 'images/complains/KyUyCO_1511188493.jpeg', '2017-11-20 14:34:53', 14),
(35, 'Good morning mr', NULL, '2017-11-20 17:14:25', 118),
(36, 'Answer me project', 'images/complains/5S81LK_1511198964.jpeg', '2017-11-20 17:29:24', 118),
(37, 'البيسشءؤرىةةةا', NULL, '2017-11-29 09:16:02', 14),
(38, 'uhuhuhuhu', NULL, '2017-11-29 09:16:29', 14),
(39, 'ufheueeehfufhuhf', NULL, '2017-11-29 09:18:06', 14),
(40, 'البوستات مش بتترفع', NULL, '2017-11-29 10:02:24', 14),
(41, 'djididjd', NULL, '2017-11-29 11:14:08', 14),
(42, 'MAk', NULL, '2017-12-04 13:57:16', 169),
(43, 'Abdelrhman', 'images/complains/o4DFxZ_1512814680.jpg', '2017-12-09 10:18:00', 180),
(44, 'Ell7ooooop', NULL, '2018-02-06 14:10:39', 211),
(45, 'sdczxczxczxczxczxcz', NULL, '2018-02-18 01:13:17', 5),
(46, 'sdczxczxczxczxczxcz', NULL, '2018-02-18 01:15:22', 5),
(47, 'sdczxczxczxczxczxcz', 'http://localhost:8000/images/complains', '2018-02-18 01:16:02', 5),
(48, 'sdczxczxczxczxczxcz', 'http://localhost:8000/uploades/complains/aGPGGvIuBp6uvBdho0rBOp93Ip0XT2.jpg', '2018-02-18 01:23:25', 5);

-- --------------------------------------------------------

--
-- بنية الجدول `contact_phones`
--

CREATE TABLE `contact_phones` (
  `id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `contact_phones`
--

INSERT INTO `contact_phones` (`id`, `phone`) VALUES
(1, '01271634925'),
(2, '0111121544'),
(3, '54584888787'),
(4, '01124976813');

-- --------------------------------------------------------

--
-- بنية الجدول `ghost_images`
--

CREATE TABLE `ghost_images` (
  `id` int(11) NOT NULL,
  `imgUrl` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `ghost_images`
--

INSERT INTO `ghost_images` (`id`, `imgUrl`) VALUES
(1, 'https://answerme.magdsoft.com/uploades/ghost/heeZlx2h1rJqW2hjockPNfDYUsfqMo.jpg'),
(2, 'https://answerme.magdsoft.com/uploades/ghost/qYqF1GS5YJ5UHy89P3WUiCE5kloShS.jpg'),
(3, 'https://answerme.magdsoft.com/uploades/ghost/gxKE9FXs6bN7cAI4Je5gQmdOjAaQ4B.jpg'),
(4, 'https://answerme.magdsoft.com/uploades/ghost/DS0tsUD2xe4hOvc8ayBBHjQPSwwRe7.png'),
(5, 'https://answerme.magdsoft.com/uploades/ghost/D54JvCGhDW1zIUvPsfpcu7TwEPhQ8H.jpg'),
(6, 'https://answerme.magdsoft.com/uploades/ghost/c2c6Mzs5mXOb2kNwTVbl78z6qY7WgM.png'),
(7, 'https://answerme.magdsoft.com/uploades/ghost/8RTZAbgXhYP3x1xGnKH0tWr9uoYEoF.jpg'),
(8, 'https://answerme.magdsoft.com/uploades/ghost/cCsrNzv5ifUNBpdWcKsgHdojkJHb6v.jpg'),
(9, 'https://answerme.magdsoft.com/uploades/ghost/lZycxzL3ZPnF5LUhNCjo9YgeCu26rE.png'),
(10, 'https://answerme.magdsoft.com/uploades/ghost/nR91gzLd4d936dO1mQxgPcthofqPO3.jpg'),
(11, 'https://answerme.magdsoft.com/uploades/ghost/CbcSYpXrb4k6yKlrE9bwcLQ9MgR0D1.jpg'),
(12, 'https://answerme.magdsoft.com/uploades/ghost/46CVvWrx6TTschCcj48mvY7pe0X9lG.jpg'),
(13, 'https://answerme.magdsoft.com/uploades/ghost/NiIZ5Ye9yZ3bkRTVC5IOJQR2LAQGIu.jpg'),
(14, '/uploades/ghost/rU8l1jLDCSO0p5LZlgcZA17BhB9FYy.jpeg');

-- --------------------------------------------------------

--
-- بنية الجدول `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `is_ghost` tinyint(1) NOT NULL DEFAULT '0',
  `type` enum('follow','like','share','comment','add_post','unlike_comment') NOT NULL,
  `posts_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `notifications`
--

INSERT INTO `notifications` (`id`, `users_id`, `is_ghost`, `type`, `posts_id`, `created_at`) VALUES
(134, 14, 0, 'follow', NULL, '2018-02-19 12:11:03'),
(135, 14, 0, 'follow', NULL, '2018-02-19 12:15:07'),
(136, 14, 0, 'follow', NULL, '2018-02-19 12:15:30'),
(137, 14, 0, 'follow', NULL, '2018-02-19 12:20:21'),
(138, 14, 0, 'follow', NULL, '2018-02-19 12:33:43'),
(139, 14, 0, 'follow', NULL, '2018-02-19 12:36:18'),
(140, 14, 0, 'follow', NULL, '2018-02-19 12:36:35'),
(141, 14, 0, 'follow', NULL, '2018-02-19 12:46:13'),
(142, 14, 0, 'follow', NULL, '2018-02-19 13:01:44'),
(143, 14, 0, 'follow', NULL, '2018-02-19 13:07:14'),
(144, 14, 0, 'follow', NULL, '2018-02-19 13:19:43');

-- --------------------------------------------------------

--
-- بنية الجدول `notify_users`
--

CREATE TABLE `notify_users` (
  `users_id` int(11) NOT NULL,
  `notifications_id` int(11) NOT NULL,
  `is_seen` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `notify_users`
--

INSERT INTO `notify_users` (`users_id`, `notifications_id`, `is_seen`) VALUES
(1, 135, 0),
(1, 136, 0),
(1, 137, 0),
(1, 138, 0),
(1, 139, 0),
(1, 140, 0),
(1, 141, 0),
(1, 142, 0),
(1, 143, 0),
(1, 144, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text,
  `image` varchar(200) DEFAULT NULL,
  `is_ghost` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `users_id` int(11) NOT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `no_views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `is_ghost`, `created_at`, `users_id`, `categories_id`, `no_views`) VALUES
(1, 'الروح', ' الروح الحلوة مفيش احسن منهاالروح الحلوة مفيش احسن منهاالروح الحلوة مفيش احسن منهاالروح الحلوة مفيش احسن منهاالروح الحلوة مفيش احسن منهاالروح الحلوة مفيش احسن منهاالروح الحلوة مفيش احسن منهاالروح الحلوة مفيش احسن منهاالروح الحلوة مفيش احسن منهاالروح الحلوة مفيش احسن منهاالروح الحلوة مفيش احسن منها vالروح الحلوة مفيش احسن منها', NULL, 0, '2017-09-25 02:12:14', 1, 1, 32),
(3, 'الامتحان', 'الاماحانات وسنينها السودة الاماحانات وسنينها السودة الاماحانات وسنينها السودة الاماحانات وسنينها السودة الاماحانات وسنينها السودة الاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودةالاماحانات وسنينها السودة', 'images/post/EKNU6C_1511946079.jpeg', 0, '2017-10-04 00:00:00', 14, 3, 9),
(4, 'give up', 'don\'t give up.believe in your abilities . believe in yout self don\'t give up.believe in your abilities . believe in yout selfdon\'t give up.believe in your abilities . believe in yout self don\'t give up.believe in your abilities . believe in yout self don\'t give up.believe in your abilities . believe in yout self', 'images/post/EKNU6C_1511946079.jpeg', 0, '2017-10-04 00:00:00', 28, 4, 8),
(5, 'الحمد', ' الحمد لله الحمد لله الحمد لله الحمد لله الحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهر رالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد للهالحمد لله', 'images/post/EKNU6C_1511946079.jpeg', 1, '2017-10-15 03:11:08', 28, 1, 2),
(6, 'اهلا', 'hello c++ hello c++ hello c++  hello c++ hello c++ hello c++ hello c++ hello c++ hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++hello c++', 'images/post/EKNU6C_1511946079.jpeg', 0, '2017-10-15 04:05:08', 27, 3, 10),
(7, 'بوسث للتاريخ', 'تقع مدينة البتراء جنوبَ الأردنّ في محافظة معان تحديداً، وتبعد عن العاصمة عمّان حوالي 240كم، و120كم شمالَ مدينة العقبة المُطِّلة على البحر الأحمر،[٤] وتمتدّ إحداثيّاتها بين خطّي ″43 ′19 °30 شمالاً و″31 ′26 °35 شرقاً.[٥] تقع المدينة الورديّة في مدينةٍ تُسمّى وادي موسى، وهي مدينةٌ مليئةٌ بالمطاعم والمقاهي والفنادق؛ حيثُ يستطيع زُوّار البتراء المكوث فيها أثناء زيارتهم \r\n\r\nإقرأ المزيد على موضوع.كوم: http://mawdoo3.com/%D8%A3%D9%8A%D9%86_%D8%AA%D9%88%D8%AC%D8%AF_%D8%A2%D8%AB%D8%A7%D8%B1_%D8%A7%D9%84%D8%A8%D8%AA%D8%B1%D8%A7%D8%A1', 'images/post/EKNU6C_1511946079.jpeg', 0, '2017-10-15 12:00:35', 27, 1, 0),
(8, 'اذكار  الصباح', 'أَصْـبَحْنا وَأَصْـبَحَ المُـلْكُ لله وَالحَمدُ لله ، لا إلهَ إلاّ اللّهُ وَحدَهُ لا شَريكَ لهُ، لهُ المُـلكُ ولهُ الحَمْـد، وهُوَ على كلّ شَيءٍ قدير ، رَبِّ أسْـأَلُـكَ خَـيرَ ما في هـذا اليوم وَخَـيرَ ما بَعْـدَه ، وَأَعـوذُ بِكَ مِنْ شَـرِّ ما في هـذا اليوم وَشَرِّ ما بَعْـدَه، رَبِّ أَعـوذُبِكَ مِنَ الْكَسَـلِ وَسـوءِ الْكِـبَر ، رَبِّ أَعـوذُ بِكَ مِنْ عَـذابٍ في النّـارِ وَعَـذابٍ في القَـبْر.', 'images/post/EKNU6C_1511946079.jpeg', 1, '2017-10-15 12:03:09', 27, 7, 0),
(9, 'اذكار  الصباح', 'اللّهـمَّ أَنْتَ رَبِّـي لا إلهَ إلاّ أَنْتَ ، خَلَقْتَنـي وَأَنا عَبْـدُك ، وَأَنا عَلـى عَهْـدِكَ وَوَعْـدِكَ ما اسْتَـطَعْـت ، أَعـوذُبِكَ مِنْ شَـرِّ ما صَنَـعْت ، أَبـوءُ لَـكَ بِنِعْـمَتِـكَ عَلَـيَّ وَأَبـوءُ بِذَنْـبي فَاغْفـِرْ لي فَإِنَّـهُ لا يَغْـفِرُ الذُّنـوبَ إِلاّ أَنْتَ', 'images/post/EKNU6C_1511946079.jpeg', 0, '2017-10-15 13:53:47', 14, 1, 0),
(10, 'اذكار  الصباح', 'رَضيـتُ بِاللهِ رَبَّـاً وَبِالإسْلامِ ديـناً وَبِمُحَـمَّدٍ صلى الله عليه وسلم نَبِيّـاً', 'https://pw-prod.s3.amazonaws.com/userfiles/23875/upload/0e56ded5-75c8-4053-b6f7-9d24cf8a9225.jpg', 0, '2017-10-15 16:09:37', 14, 2, 0),
(11, 'اذكار  الصباح', 'اللّهُـمَّ إِنِّـي أَصْبَـحْتُ أُشْـهِدُك ، وَأُشْـهِدُ حَمَلَـةَ عَـرْشِـك ، وَمَلَائِكَتَكَ ، وَجَمـيعَ خَلْـقِك ، أَنَّـكَ أَنْـتَ اللهُ لا إلهَ إلاّ أَنْـتَ وَحْـدَكَ لا شَريكَ لَـك ، وَأَنَّ ُ مُحَمّـداً عَبْـدُكَ وَرَسـولُـك.', 'images/post/hZt4rY_1511944952.jpeg', 0, '2017-10-16 09:59:59', 29, 3, 0),
(12, 'Azkar ', 'اللّهُـمَّ ما أَصْبَـَحَ بي مِـنْ نِعْـمَةٍ أَو بِأَحَـدٍ مِـنْ خَلْـقِك ، فَمِـنْكَ وَحْـدَكَ لا شريكَ لَـك ، فَلَـكَ الْحَمْـدُ وَلَـكَ الشُّكْـر. ', 'images/post/hZt4rY_1511944952.jpeg', 0, '2017-10-16 09:59:59', 30, 3, 0),
(13, 'اذكار  الصباح', 'حَسْبِـيَ اللّهُ لا إلهَ إلاّ هُوَ عَلَـيهِ تَوَكَّـلتُ وَهُوَ رَبُّ العَرْشِ العَظـيم. ', 'images/post/hZt4rY_1511944952.jpeg', 0, '2017-10-16 10:02:30', 14, 6, 0),
(14, 'اذكار  الصباح', 'بِسـمِ اللهِ الذي لا يَضُـرُّ مَعَ اسمِـهِ شَيءٌ في الأرْضِ وَلا في السّمـاءِ وَهـوَ السّمـيعُ العَلـيم', 'images/post/hZt4rY_1511944952.jpeg', 0, '2017-10-16 10:02:30', 14, 5, 0),
(15, 'Azkar', 'اللّهُـمَّ بِكَ أَصْـبَحْنا وَبِكَ أَمْسَـينا ، وَبِكَ نَحْـيا وَبِكَ نَمُـوتُ وَإِلَـيْكَ النُّـشُور', 'images/post/hZt4rY_1511944952.jpeg', 0, '2017-10-16 10:02:46', 14, 6, 0),
(16, '1اذكار  الصباح', 'أَصْبَـحْـنا عَلَى فِطْرَةِ الإسْلاَمِ، وَعَلَى كَلِمَةِ الإِخْلاَصِ، وَعَلَى دِينِ نَبِيِّنَا مُحَمَّدٍ صَلَّى اللهُ عَلَيْهِ وَسَلَّمَ، وَعَلَى مِلَّةِ أَبِينَا إبْرَاهِيمَ حَنِيفاً مُسْلِماً وَمَا كَانَ مِنَ المُشْرِكِينَ', 'images/post/hZt4rY_1511944952.jpeg', 0, '2017-10-16 10:02:46', 14, 4, 0),
(17, '2اذكار  الصباح', 'سُبْحـانَ اللهِ وَبِحَمْـدِهِ عَدَدَ خَلْـقِه ، وَرِضـا نَفْسِـه ، وَزِنَـةَ عَـرْشِـه ، وَمِـدادَ كَلِمـاتِـه', 'images/post/hZt4rY_1511944952.jpeg', 0, '2017-10-16 10:58:54', 14, 6, 0),
(18, '3اذكار  الصباح', 'اللّهُـمَّ عافِـني في بَدَنـي ، اللّهُـمَّ عافِـني في سَمْـعي ، اللّهُـمَّ عافِـني في بَصَـري ، لا إلهَ إلاّ أَنْـتَ.', 'images/post/hZt4rY_1511944952.jpeg', 0, '2017-10-16 10:59:26', 14, 5, 0),
(19, 'Azkar', 'اللّهُـمَّ إِنِّـي أسْـأَلُـكَ العَـفْوَ وَالعـافِـيةَ في الدُّنْـيا وَالآخِـرَة ، اللّهُـمَّ إِنِّـي أسْـأَلُـكَ العَـفْوَ وَالعـافِـيةَ في ديني وَدُنْـيايَ وَأهْـلي وَمالـي ، اللّهُـمَّ اسْتُـرْ عـوْراتي وَآمِـنْ رَوْعاتـي ، اللّهُـمَّ احْفَظْـني مِن بَـينِ يَدَيَّ وَمِن خَلْفـي وَعَن يَمـيني وَعَن شِمـالي ، وَمِن فَوْقـي ، وَأَعـوذُ بِعَظَمَـتِكَ أَن أُغْـتالَ مِن تَحْتـي', 'https://www.imagesfb.com/pictures/photo1385071163_373.jpg', 0, '2017-10-16 11:00:04', 14, 7, 0),
(20, 'mmmmm', 'ghjjgf', 'images/post/xymzlO_1508781709.jpg', 1, '2017-10-23 18:01:49', 14, 2, 0),
(21, 'sad day', 'khdsfjfhf fb uhujdc jjfc uhcujc ccc cjc ccihcc cjcc jccc c     j c   jbjjjxcxxc  cjc cjcjc', 'images/post/y7m3A4_1508842432.png', 0, '2017-10-24 10:53:52', 30, 2, 0),
(22, 'sad day', 'khdsfjfhf fb uhujdc jjfc uhcujc ccc cjc ccihcc cjcc jccc c     j c   jbjjjxcxxc  cjc cjcjc', 'images/post/C7xpvj_1508842435.png', 0, '2017-10-24 10:53:55', 29, 2, 0),
(23, 'sad day', 'khdsfjfhf fb uhujdc jjfc uhcujc ccc cjc ccihcc cjcc jccc c     j c   jbjjjxcxxc  cjc cjcjc', 'images/post/X28Mie_1508842440.png', 0, '2017-10-24 10:54:00', 14, 2, 0),
(24, 'sad day', 'khdsfjfhf fb uhujdc jjfc uhcujc ccc cjc ccihcc cjcc jccc c     j c   jbjjjxcxxc  cjc cjcjc', 'images/post/oCg75P_1508842441.png', 0, '2017-10-24 10:54:01', 14, 2, 0),
(25, 'sad day', 'khdsfjfhf fb uhujdc jjfc uhcujc ccc cjc ccihcc cjcc jccc c     j c   jbjjjxcxxc  cjc cjcjc', 'images/post/6xNnra_1508842442.png', 0, '2017-10-24 10:54:02', 14, 2, 0),
(26, 'sad day', 'khdsfjfhf fb uhujdc jjfc uhcujc ccc cjc ccihcc cjcc jccc c     j c   jbjjjxcxxc  cjc cjcjc', 'images/post/JRYL4P_1508842442.png', 0, '2017-10-24 10:54:02', 14, 2, 0),
(27, 'sad day', 'khdsfjfhf fb uhujdc jjfc uhcujc ccc cjc ccihcc cjcc jccc c     j c   jbjjjxcxxc  cjc cjcjc', 'images/post/Y9WQjU_1508842442.png', 0, '2017-10-24 10:54:02', 14, 2, 0),
(28, 'sad day', 'khdsfjfhf fb uhujdc jjfc uhcujc ccc cjc ccihcc cjcc jccc c     j c   jbjjjxcxxc  cjc cjcjc', 'images/post/LLv16j_1508842443.png', 0, '2017-10-24 10:54:03', 20, 2, 0),
(30, 'jhrwquifdguygcjuch بوست', 'dvkjhvjhvjnvc', 'images/post/64pyPK_1508846856.jpg', 0, '2017-10-24 12:07:36', 19, 2, 0),
(31, 'الابى اى توكن الاصلى', 'ده بوست علشان الابى اى توكن اللى معاك يا معلم اشطات يا ابا', NULL, 0, '2017-10-25 04:13:30', 27, 3, 0),
(32, 'ابى اى توكن تانى', 'ده بوست باى ابى اى توكن تانى علشان ما تزعلش يا عم', NULL, 0, '2017-10-25 02:12:15', 14, 6, 0),
(33, 'gdhhdhdh', 'hdbdbfbbbfbdb', NULL, 0, '2017-10-25 15:29:16', 14, 2, 0),
(34, 'اهو', 'تيتيتيتيت', 'images/post/4TLyXX_1508947272.jpg', 1, '2017-10-25 16:01:12', 14, 2, 0),
(36, 'تيريرير', 'يتينين', 'images/post/hamfRr_1509362100.png', 1, '2017-10-30 11:15:00', 14, 2, 0),
(39, 'ععععع', 'خخحح', NULL, 0, '2017-10-30 12:58:53', 14, 2, 0),
(40, 'ععععع', 'خخحح', NULL, 0, '2017-10-30 13:00:31', 14, 2, 0),
(41, 'تي', 'ال', NULL, 1, '2017-10-30 13:04:14', 14, 6, 0),
(42, 'تي', 'ال', NULL, 0, '2017-10-30 13:04:29', 90, 6, 0),
(44, 'تالاhdsلبات', 'تببتت', 'images/post/fzKf3f_1509455080.jpg', 1, '2017-10-30 13:07:38', 90, 3, 0),
(46, 'jhrwquifdguygcjuch بوست', 'dvkjhvjhvjnvc', NULL, 0, '2017-11-07 14:17:41', 90, 2, 0),
(47, 'mohamed', 'mohamedadinfasdnkufjsnakdfnska kas', NULL, 0, '2017-11-07 14:22:17', 14, 2, 0),
(48, 'mohamed', 'mohamedadinfasdnkufjsnakdfnska kas', 'images/post/fQcqFX_1510064580.jpeg', 0, '2017-11-07 14:23:00', 30, 2, 0),
(49, 'mohamed', NULL, 'images/post/3IKNzL_1510064777.jpeg', 0, '2017-11-07 14:26:17', 29, 1, 0),
(50, 'adfasdfas', 'adasfsfsafsddasdas', 'images/post/MaEWOW_1510070366.jpeg', 0, '2017-11-07 15:59:26', 29, 6, 0),
(54, 'adsfsadfsa', 'adasfsfsafsddasdas', 'images/post/WNsrJC_1510075326.jpeg', 0, '2017-11-07 17:22:06', 29, 6, 0),
(63, 'adssfdsfsa', 'adasfsfsafsddasdas', 'images/post/jwhhCZ_1510153629.jpeg', 0, '2017-11-08 15:07:09', 30, 2, 0),
(71, 'mahmoud', 'tito', 'images/post/EKNU6C_1511946079.jpeg', 1, '2017-11-14 11:33:36', 30, 2, 0),
(72, 'jfkjf', 'fjkf ifjf fijf ifjf ff fisjfwt rfrf ff', NULL, 0, '2017-11-15 12:58:53', 30, 3, 0),
(73, 'jhfffhfjs', 'ffnjffnjfn', NULL, 0, '2017-11-15 12:59:56', 29, 4, 0),
(100, 'اهلا بيك', 'اهلا بيك اهلا بيك وبكل ترحاب هحط عليك', NULL, 0, '2017-11-19 05:15:11', 30, 5, 0),
(101, '', 'كل سنة وانت طيب يا عمنا وعقبال 100 سنة ان شاء الله', NULL, 0, '2017-11-19 03:03:06', 29, 2, 0),
(102, 'fhkgd', 'fhhds', NULL, 0, '2017-11-19 17:28:25', 14, 4, 0),
(103, 'youssef. romany', 'adasfsfsafsddasdas', NULL, 0, '2017-11-21 11:27:18', 14, 2, 0),
(104, 'month', 'Grehgkrgk erkbkb', 'images/post/EKNU6C_1511946079.jpeg', 0, '2017-11-21 17:31:59', 28, 4, 0),
(105, 'احمد ربك', 'الحمد لله حمدا طيبا', NULL, 1, '2017-11-29 08:30:31', 14, 1, 0),
(106, 'احمد ربك', 'الحمد لله حمدا طيبا', NULL, 1, '2017-11-29 08:30:36', 14, 1, 0),
(107, 'احمد ربك', 'الحمد لله حمدا طيبا', 'images/post/hZt4rY_1511944952.jpeg', 1, '2017-11-29 08:42:32', 14, 1, 0),
(108, 'ببااا', 'ابظوى', NULL, 1, '2017-11-29 08:47:33', 14, 9, 0),
(110, 'ابييبىةة', 'البببةةوم', 'images/post/EKNU6C_1511946079.jpeg', 1, '2017-11-29 09:01:19', 14, 4, 0),
(111, 'test', 'mmmm', 'images/post/lPjkHE_1512212912.jpg', 0, '2017-12-02 11:08:32', 169, 4, 0),
(112, 'test2', 'madff', 'images/post/2xDhnA_1512216356.jpg', 0, '2017-12-02 12:05:56', 169, 4, 0),
(113, 'txes', 'a', 'images/post/GEk38y_1512216690.png', 1, '2017-12-02 12:11:30', 169, 4, 0),
(114, 'txes', 'cfss', 'images/post/cn8csF_1512216730.png', 1, '2017-12-02 12:12:10', 169, 4, 0),
(115, 'fdz', 'ff', 'images/post/WNh6Of_1512216839.jpeg', 0, '2017-12-02 12:13:59', 169, 5, 0),
(116, 'dcf', 'ggh', NULL, 1, '2017-12-02 12:17:44', 169, 4, 0),
(117, 'dcf', 'ggh', 'images/post/F1eZ5W_1512217099.jpg', 1, '2017-12-02 12:18:19', 169, 4, 0),
(118, 'fcdg', 'fhv', NULL, 0, '2017-12-02 12:26:54', 169, 4, 0),
(119, 'dfgg', 'vffdd', NULL, 1, '2017-12-03 15:36:11', 169, 2, 0),
(120, 'gxdz', 'gdjh', NULL, 1, '2017-12-03 16:10:25', 169, 3, 0),
(121, 'gfd', 'ftds', 'images/post/KRmSz7_1512319011.jpg', 1, '2017-12-03 16:36:51', 169, 3, 0),
(122, 'gggd', 'hhh', NULL, 0, '2017-12-04 12:45:57', 169, 4, 0),
(123, 'ههllllllll', 'hh', 'images/post/nL9QZM_1512472662.jpg', 0, '2017-12-04 13:50:56', 169, 7, 0),
(124, 'اخر بوست يامعلم ', 'End Posts', 'images/post/EKNU6C_1511946079.jpeg', 1, '2017-12-04 14:03:22', 169, 6, 0),
(125, 'دخول منتخب مصر كأس العالم', 'السلام عليكم نتمنى كل الخير والتوفيق لمنتخبنا الوطني العظيم', 'images/post/P0VgrX_1514394677.jpg', 1, '2017-12-27 17:11:17', 197, 1, 0),
(126, 'اجمل مدرسه هى مدرستى', 'مدرستى هى اجمل مدرسه بالدنيا', 'images/post/RmraJ7_1514395148.jpg', 1, '2017-12-27 17:19:08', 197, 4, 0),
(129, 'just image hah', 'i edited the content hah', 'images/post/LKBlPY_1517071817.jpeg', 0, '2018-01-16 14:59:09', 208, 9, 0),
(130, 'test ghost post', 'Nothing to display', 'images/post/91Lft2_1517418108.jpeg', 1, '2018-01-31 17:01:48', 208, 2, 0),
(131, 'ggggg', 'Hhhhhhh', 'images/post/kJBBvM_1517925686.jpeg', 1, '2018-02-06 14:01:26', 211, 1, 0),
(132, 'pooop', 'Eltop', 'images/post/TiXE79_1517925970.jpeg', 0, '2018-02-06 14:06:10', 211, 4, 0),
(133, 'yyyyyyyygg', 'Ggggghh', 'images/post/Fpt08J_1517926403.jpeg', 0, '2018-02-06 14:13:23', 211, 15, 0),
(134, 'love', 'Love story', NULL, 0, '2018-02-06 14:48:40', 211, 15, 0),
(135, 'endhaash', 'hhhhhhhhh', 'images/post/q5NiJ4_1518001928.jpeg', 1, '2018-02-07 11:12:08', 211, 3, 0),
(136, 'الالااالااا', 'الالااالالالا', 'images/post/Qoj9bt_1518002712.jpeg', 0, '2018-02-07 11:25:12', 211, 3, 0),
(137, 'strange weather', 'The weather is very strange', NULL, 0, '2018-02-11 12:34:53', 208, 11, 0),
(138, 'adsvvz', 'ewrsfd', 'images/post/9FPZX2_1518353656.jpg', 1, '2018-02-11 12:54:16', 13, 1, 0),
(139, 'adsvvz', 'ewrsfd', 'images/post/pahQ1F_1518353736.jpg', 1, '2018-02-11 12:55:36', 13, 1, 0),
(140, 'adsvvz', 'ewrsfd', 'https://answerme.magdsoft.com/images/post/ru1WSga37rePcj6pyfR4LieYHARJu3.jpg', 1, '2018-02-11 13:29:05', 13, 1, 0),
(141, 'nothing', 'I don’t know', NULL, 0, '2018-02-11 13:31:40', 208, 12, 0),
(142, 'test', 'Test images', 'https://answerme.magdsoft.com/images/post/92yXwtCI0DAKTXn1NCMh0f21kz9ggg.jpeg', 0, '2018-02-11 13:35:29', 67, 1, 0),
(143, '2', '1', NULL, 1, '2018-02-18 13:21:01', 1, 14, 0),
(144, '2', '1', NULL, 1, '2018-02-18 13:21:08', 1, 14, 0),
(145, '2', '1', NULL, 1, '2018-02-18 13:21:46', 1, 14, 0),
(146, '2', '1', NULL, 1, '2018-02-18 13:21:53', 1, 14, 0),
(147, '2', '1', NULL, 1, '2018-02-18 13:22:11', 1, 14, 0),
(148, '2', '1', NULL, 1, '2018-02-18 13:22:24', 1, 14, 0),
(149, '2', '1', 'http://localhost:8000/images/post/F2bVjiMBFZawECUXBKoEVzIeGB6eF3.jpg', 1, '2018-02-18 13:23:13', 1, 14, 0),
(150, '2', '1', 'http://localhost:8000/images/post/m20C0TN8gnYz3G7mcCYLdhFe8XexVV.jpg', 1, '2018-02-18 13:23:46', 1, 14, 0),
(151, '2', '1', 'http://localhost:8000/images/post/qV85Ej48tEEYKb5y3XvxdQhgWknThu.jpg', 1, '2018-02-18 13:24:20', 1, 14, 0),
(152, '2', '1', 'http://localhost:8000/images/post/WpM2TwFQt4JIxXpFtK6au9mWOMCD6V.jpg', 0, '2018-02-18 13:24:58', 1, 14, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `posts_likes`
--

CREATE TABLE `posts_likes` (
  `users_id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `posts_likes`
--

INSERT INTO `posts_likes` (`users_id`, `posts_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 5),
(13, 3),
(14, 1),
(14, 5),
(14, 8),
(14, 10),
(14, 18),
(14, 19),
(14, 24),
(14, 27),
(14, 28),
(14, 30),
(14, 32),
(14, 34),
(14, 54),
(14, 71),
(14, 100),
(14, 101),
(14, 103),
(26, 1),
(27, 110),
(67, 4),
(67, 5),
(67, 8),
(67, 30),
(67, 31),
(67, 129),
(67, 130),
(67, 142),
(169, 4),
(169, 10),
(169, 112),
(169, 121),
(179, 136),
(197, 110),
(197, 124),
(197, 125),
(197, 126),
(208, 129),
(208, 141),
(211, 1),
(211, 3),
(211, 4),
(211, 5),
(211, 6),
(211, 9),
(211, 100),
(211, 102),
(211, 103),
(211, 104),
(211, 105),
(211, 106),
(211, 107),
(211, 108),
(211, 110),
(211, 125),
(211, 126),
(211, 130),
(211, 132);

-- --------------------------------------------------------

--
-- بنية الجدول `posts_shares`
--

CREATE TABLE `posts_shares` (
  `users_id` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `posts_shares`
--

INSERT INTO `posts_shares` (`users_id`, `posts_id`) VALUES
(1, 1),
(1, 4),
(1, 5),
(14, 7),
(14, 20),
(14, 26),
(14, 27),
(14, 30),
(14, 32),
(27, 110),
(67, 6),
(67, 129),
(211, 4),
(211, 9),
(211, 100),
(211, 103),
(211, 104),
(211, 106),
(211, 107),
(211, 108),
(211, 110),
(211, 125),
(211, 126),
(211, 129),
(211, 132),
(211, 134);

-- --------------------------------------------------------

--
-- بنية الجدول `super_admin`
--

CREATE TABLE `super_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `super_admin`
--

INSERT INTO `super_admin` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'fady moun', 'admin@admin.com', '$2y$10$74mjv5hJeW71jBJajHH92Os0fIXqECFjYL0zZod9HqLwVu6kG6L.O', 'felaCHPqIO4bDJMPttb3chNRwb029fccc2d95xduEcOMi3y25cuPMJQnc269', '2017-10-23 22:00:00', '2017-10-07 15:00:41'),
(7, 'adminpanel', 'admin.admin@gmail.com', '$2y$10$72O9AjFdD.VnEj34o1P6DexBku.uy4xISTYsxOC2AlIJnEQS42CJe', NULL, '2017-10-07 11:15:56', '2017-10-07 11:15:56'),
(8, 'fady mounir', 'fadymounir96@gmail.com', '$2y$10$eW43FS31MrNlK8EiRrIV/uZvV8TAjMNHutjozxwn.Lg4QDDujlBlq', NULL, NULL, NULL),
(9, 'ali ahmed', 'aliahmedcs1@gmail.com', '$2y$10$k4EIjkqmCIdB9tVNdKIc/OYH8GdZ.0fyrllGsX/Grpn3Kx3WupyoK', 'x43n2rQLyI8zDnvofFW62ncFs5G0tcm69EDzluYqtngCoSfK2MfniSRzDgQzyL39', NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `apiToken` varchar(200) NOT NULL,
  `tmpToken` varchar(255) DEFAULT NULL,
  `tmpPhone` varchar(15) DEFAULT NULL,
  `verificationCode` int(6) DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `ghostName` varchar(50) NOT NULL,
  `ghost_images_id` int(11) DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `photo`, `apiToken`, `tmpToken`, `tmpPhone`, `verificationCode`, `is_verified`, `is_active`, `ghostName`, `ghost_images_id`, `created_at`) VALUES
(1, 'Salah', '951951951', 'magdsoft44@gmail.com', '$2a$04$xxTfY0eMkXfrLKZNacetjeW/Zy36jqo9btT.aNujTHyOpnURvDDeG', 'http://answerme.magdsoft.com/uploades/users/pOfmgKDtQgu75XPpGcEaGKTbsPzl7M.jpg', 'Cm9111C46Y7XdvBHdF2d8fqjcSkCmwFwAIeU78YiTqhWH8V4IoWuDatIUI6h7cP9mFOZg6', 'z7ZuFLMnaR250CaBGwvKK6t3fwoTHDbHt8K9CYE4uSKoS5bUnqNryRSKVh8eJYHBSFHoT9', NULL, 123456, 1, 1, 'Ghoost', 1, '2017-09-05'),
(2, 'User_10', '01000000000$i', 'mail_$i@mail.com', '123456', 'http://3.bp.blogspot.com/-73drHh8nrFc/VSpWaldzVOI/AAAAAAAABAo/vOBFP1JC2Ho/s1600/001A.JPG', 'apitoken_$i', NULL, NULL, 123456, 1, 1, 'Ghoost_1', 2, '2017-09-24'),
(4, 'User_1', '010000000001', 'mail_1@mail.com', '$2y$10$LbrYY7agekXYSVhLc9F/..peFoYSqP1EvixqmKqOoRBOE3JDk6pn6', 'https://vb.elmstba.com/imgcache/almstba.com_1368181455_553.gif', 'apitoken_1', NULL, NULL, 123456, 1, 1, 'Ghoost_1', 5, '2017-09-24'),
(5, 'بيليسيئءرؤئؤء', '010000000002', 'mail_414@mail.com', '$2y$10$mj1ZLmcBA/kMs8nq61pn1OL17eut6n9OERVXNrTtzFVJMS6lKW6ha', 'http://localhost:8000/images/user/phpA601.tmp.jpg', 'LgCgB4Wg9gHVBfzH901cZVeVsdfghgrEk1zQw3JDRGziLCTQix2r5VVyuckRcoXFjwJFPzAUJ0', 'tuFQFNediJEUnTglgFs6U9yYYhyRbGwJCASFoUrOOAnWm4m7ZYuQvuW4EjgXQ0VOFTu1oq', '010000000003954', 123456, 0, 1, '1234569صشسيئبيببء', 6, '2017-09-24'),
(6, 'User_3', '010000000003', 'mail_3@mail.com', '123456', 'https://pbs.twimg.com/profile_images/788725375509655552/ewpdsgoF_400x400.jpghttp://localhost:8000/images/user/phpA601.tmp.jpg', 'sdfgxl,sdfgxl,sdfgxl,sdfgxl,sdfgxl,sdfgxl,sdfgxl,sdfgxl,sdfgxl,sdfgxl,sdfgxl,sdfgxl', NULL, NULL, NULL, 0, 1, 'Ghoost_1', 4, '2017-09-24'),
(7, 'User_4', '010000000004', 'mail_4@mail.com', '123456', 'https://upload.7hob.com/Photo/7hob.com1361303839621.jpg', 'apitoken_4', NULL, NULL, NULL, 0, 1, 'Ghoost_1', 7, '2017-09-24'),
(8, 'User_5', '010000000005', 'mail_5@mail.com', '123456', 'https://lh3.googleusercontent.com/-QFinnij9GgQ/AAAAAAAAAAI/AAAAAAAAAIA/50A5Xc3Oq9Y/photo.jpg', 'apitoken_5', NULL, NULL, NULL, 0, 1, 'Ghoost_1', 4, '2017-09-24'),
(9, 'User_6', '010000000006', 'mail_6@mail.com', '123456', 'images/post/64pyPK_1508846856.jpg', 'apitoken_6', NULL, NULL, NULL, 0, 1, 'Ghoost_1', 5, '2017-09-24'),
(10, 'User_7', '010000000007', 'mail_7@mail.com', '123456', 'https://lh5.ggpht.com/s6qYvvc-xTdQsIIokHPPUbngGpLpESqFr-CY8dZZUpQ4Df8rjBgEklZJEP4EaGYoG3B1=w300', 'apitoken_7', NULL, NULL, NULL, 0, 1, 'Ghoost_1', 3, '2017-09-24'),
(11, 'User_8', '010000000008', 'mail_8@mail.com', '123456', 'https://www.wikikeef.com/wp-content/uploads/2015/01/%D8%AA%D8%AD%D9%85%D9%8A%D9%84-%D8%A7%D9%84%D8%B5%D9%88%D8%B1%D8%A9-%D8%A7%D9%84%D9%86%D9%87%D8%A7%D8%A6%D9%8A%D8%A9.png', 'apitoken_8', NULL, NULL, NULL, 1, 1, 'Ghoost_1', 5, '2017-09-24'),
(12, 'User_9', '010000000009', 'mail_9@mail.com', '$2y$10$qigfkI8GpdtJWaaKJh8QsOe/xsdyCtqp0Jj5OY/nCGH7EGUDpcRV6', 'http://thesmashable.com/wp-content/uploads/2012/07/ramadan-kareem-islamic-facebook-timeline-cover.jpg', 'apitoken_9', 'DP45qasdmIVaHEYaVx94mky9Atm2r9e2XxE6FRi1dqkjlSXdK6V1ti6yScKLjQovZmNtV2', NULL, NULL, 1, 1, 'Ghoost_1', 7, '2017-09-24'),
(13, 'omar', '01271654652', 'om@om.com', '$2y$10$noXkppoX80GNwsZEBKKBS.9uC2lNGQrWscp5M8C06HvEOPa3R5V8G', 'https://misr5.com/wp-content/uploads/2014/06/wallpapers-for-ramadan-11.jpg', 'rsdaVyK3saoH54duBzZUh5lcr273PC3KcN2UJXJnedzyM9V99OFHU4KjGODmSoCs9m10S2', NULL, NULL, NULL, 1, 1, 'Elshabah', 4, '2017-10-08'),
(14, 'تيستر jbfibfiubj', '01271634925', 'tester@gmail.com', '$2y$10$F/rCW98UHDxCvpubPR3wtOQTIxI5DZSk08vqEfkuAxRb.3W2b0VxO', 'images/user/phpI605up.jpeg', 'OZVbCN80pEXtxwf1PXNhWOf1A5YVjBjucoBZ8BPYPhtDYr7eAq7YZySSomdJDYlVOBbZHW', 'TIUARFolcyuoPLFAqOKL3jVTqcynR08bPLpwpCT2r1piv5lRGYpC8hWG8StFTKbys35zHM', NULL, NULL, 1, 1, 'شبح', 2, '2017-10-08'),
(15, 'mahmoud', '0127966463', 'm@gmail.com', '$2y$10$LbrYY7agekXYSVhLc9F/..peFoYSqP1EvixqmKqOoRBOE3JDk6pn6', 'https://www.imagesfb.com/photo/str-ly.com_1390693663_952.gif', 'LgCgB4Wg9gHVBfzH901cZVeV5grEk1zQw3JDRGziLCTQix2r5VVyuckRcoXFjwJFPzAUJ0', 'tuFQFNediJEUnTglgFs6U9yYYhyRbGwJCASFoUrOOAnWm4m7ZYuQvuW4EjgXQ0VOFTu1oq', NULL, NULL, 0, 1, 'baroody', 1, '2017-10-09'),
(16, 'mido', '01090880965', 'mn@gmail.com', '$2y$10$chbj1RPYnz2c0sXJLK3pGe1uwQsvV5mKmQCBbU5AXaPCKQh8qs9Te', 'https://www.mexatk.com/wp-content/uploads/2015/12/%D8%B5%D9%88%D8%B1-%D9%83%D9%81%D8%B1%D8%A7%D8%AA-1.jpg', '6DcWkQQbNozSLx6joWlK4KuT73Iw8LMnirWnAnhVKO3PcQN6UvxRwL5WaFW2Z19rgFxSDg', 'L9Aq8rBw3GrO6WWui6KARUJqBr2y33jg0jMgIcvLTKgn5vlIy9MOgEWlejdog7RINnlGoE', NULL, NULL, 1, 1, 'mo', 1, '2017-10-10'),
(17, 'uu', '01098745631', 'mo@gmail.com', '$2y$10$74/wRBR82PFC5izzMRkYwerTnnXq9YzI/nQxbIuzysCCJvkcbILYG', 'http://img.tgareed.org/imgcache/992382.jpg', '5HgkRpsQ02s9Ue3kgLXg9aisGYFRVyTYmGRQCefh9Igm0pKQ4hFdJ6GIswslgA8ClSXSlY', NULL, NULL, NULL, 1, 1, 'bb', 1, '2017-10-10'),
(19, 'yyyyyy', '010963852741', 'mv@gmail.com', '$2y$10$FCxZCIuLgSRZW0WWmUyX5.QGzI/RsgEqex12FLLkQv7uuhEnFhVA2', 'https://upload.7hob.com/Photo/7hob.com1361306806751.jpg', 'O5htR7mkrvLDiyOI3xDXSepa0jBYadHrShNXu3VHqCudpof1EjaHaBfikDd63M35npoG2x', NULL, NULL, NULL, 1, 1, 'tttttt', 1, '2017-10-14'),
(20, 'ooolll', '0123456789', 'yt@gmail.com', '$2y$10$zeNnSqVc300KhsIaSEayKeDZ2t59GTchBbOi6Wn7hlglfbmJRkW4.', 'https://upload.3dlat.net/uploads/3dlat.net_27_16_ab61_8420088d664a2.jpg', 'cjbVqxXhJWcHd5gCfz6sweLQ3APwHpGymnALM894qcgET8DXjRWsMXa3t1l9N6MOwSZ9H4', NULL, NULL, NULL, 1, 1, 'kkkkkk', 1, '2017-10-14'),
(21, 'hgfchhhc', '0123545688', 'd@gmail.com', '$2y$10$m6hXViH2GOPcMNVRluQbJOWRKArTJgVYjoln6fVBUMcOUzlNYD20y', 'https://pbs.twimg.com/media/CeekP3dW4AAF8fZ.jpg', 'ZAn2kxawXnsEPsZ9teOQMu7vSfpzGUyB3qf0JARDGEXM3zncfBnWojuGQA5dZjACzMkjBe', NULL, NULL, NULL, 1, 1, 'cfjfhhf', 1, '2017-10-14'),
(22, 'yffggvcd', '01254099635', 'e@gmail.com', '$2y$10$0.zLfhbz4PdOMUjQYZ2H2u.dCsXkUGlcagxxeEc1cyiG/qHTpPAGm', 'https://3.bp.blogspot.com/-dg_f2LAuZ5U/WFANQNg3ZbI/AAAAAAAAiWc/66oamwxGZpYnTLD9F8qkizsnzdhChJJzgCLcB/s400/1SbFPG.gif', 'D4QBKy6mje3WOJnrY4xaCgenSzHtlPaCpQLwSSsqQOWEeIZYyO0IjYXpv0VPZssas1zsKc', NULL, NULL, NULL, 1, 1, 'hbgfxxc', 1, '2017-10-14'),
(23, 'ytyygghhg', '01245688557', 'gf@gmail.com', '$2y$10$/u9K0onjGi4s3uxhnKzHsON/1OV5O7Lfn.WM61IigyHV3FccUmY2C', 'http://i.imgur.com/QFqsXCW.jpg', 'E85gSuBt9dcmjehsXtumH180P2j7eu4GRqKB3KkVjJ8TmehrftdA4S0y6sJwmJ6MW8H77R', NULL, NULL, NULL, 1, 1, 'ggyhhgf', 1, '2017-10-14'),
(24, 'yttreewq', '01245668565', 'dd@gmail.com', '$2y$10$nfGZVj3rkQBJfPA14drZseZ0zMq8kIAMVy3o4DnLXVHZLlrtkWRme', 'http://www.ladybirdar.com/wp-content/uploads/2016/05/large-2.jpg', 'hpqvjnaFJKL9lJwiqDiUu5s8eJUI7f5Q7qCFlbbvX5AhByPFBv4xSuoEWldmmcxCRAuPiF', NULL, NULL, NULL, 1, 1, 'hfddghh', 1, '2017-10-14'),
(25, 'hdhhsjsdd', '0123346666', 'gfd@gmail.com', '$2y$10$kJzNvU1nfm6enNDssfCZDemJP7rBZuQLV7UXir0/YdU0o7kVUIcVy', NULL, '8jtyanz4pY290wEzh6tteLbo7ZTtCFNGoM8aTecdDGgsieLBXjRjO0eqZxiLPg4zgMoboA', NULL, NULL, NULL, 1, 1, 'hdjdjdjdjd', 1, '2017-10-14'),
(26, 'fghffdfg', '0126545555', 'dc@gmail.com', '$2y$10$Bn5LWiyw9lKRSs/yNBxSHO.iyJdnkUfQsMRpP06iLiUtnshD1iPHy', NULL, 'bMdJivHBLRPflrClhKY7I4oGB5VH6azpYzhLvr28x9JL00Ra0l475NM4MHCmTUHk0BpQA4', NULL, NULL, NULL, 1, 1, 'fghhjj', 1, '2017-10-14'),
(27, 'ali', '01124976813', 'ali@gmail.com', '$2y$10$cEydrmsZBRKq9f3Nl092QOMkxXPE5UZD4gSH/qdhg1Gw0YZuVjAvK', 'https://lh3.googleusercontent.com/-QFinnij9GgQ/AAAAAAAAAAI/AAAAAAAAAIA/50A5Xc3Oq9Y/photo.jpg', 'goqFzXBAHJTqiW8AXHk1sTKA75x52v4CFPEN8rUH2ymN7rc4jeCSqEh70m0kJkgoaviHA2', 'goqFzXBAHJTqiW8AXHk1sTKA75x52v4CFPEN8rUH2ymN7rc4jeCSqEh70m0kJkgoaviHA244', NULL, 123456, 0, 1, 'shakshak', 1, '2017-10-15'),
(28, 'Muhammad gamal', '01014141604', 'jimmy982000@gmail.com', '$2y$10$NmNwFCb1BpaDvKKkwL6iteCBlTjwB.Ya8/oG..xR8GnylsIYfRJq2', 'images/post/EKNU6C_1511946079.jpeg', 'WPaBqAK9NvrofdiOSQZWAbWXIxEo36JWInZI4eZpDAA6YqOgALdE8hRNyy9wa320FYs13s', NULL, NULL, NULL, 1, 1, 'sdasdasd', 1, '2017-10-15'),
(29, 'dfsdfasf', '324423424', 'fdasfasdf@fasts.fsd', '$2y$10$A1DWPOVPe4002pldc4XVreST4KYMMTA3fnK1GtmkSEsmYMXRH/IZu', NULL, '5cCS4UDFWskp03ad00OSHX5yzN30poFNrJxcIxKbBHpBzapwpPlzNKRVahnwniPgZkQtet', NULL, NULL, 123456, 0, 1, 'fsdfsdf', 1, '2017-10-15'),
(30, 'gfdsgfdg', '3213123123', 'fasdfasf@fdsf.dfsaf', '$2y$10$MI5TxoQggw00mCmKX9stIecspeXcV8fUItJIc/qAbYuSsZuwLQn3O', 'images/post/EKNU6C_1511946079.jpeg', 'LTFlnEoS2g6f2udjOjzgnqEFITYXlqGwTWW41jLPb7qTNbU2mwVOgj1ncTwFaavHnehWTk', 'https://rqeeqa.com/wp-content/uploads/2016/03/1-4-2.gif', NULL, 123456, 0, 1, 'dfsgdfgsd', 1, '2017-10-15'),
(31, 'hgf', '0147852369', 'bb@gmail.com', '$2y$10$SoH34UV0Ow1di1.SkU4/ye9LTKhed6MfFI80b7JfFtw4CWWiaklmu', NULL, 'gkXo20wEloTiPEJ7YiGN7josNLKREgiETbibWpszBTUqBcTI9apHmBKl7H3OPWBU5tgG8U', NULL, NULL, NULL, 1, 1, 'fvhh', 1, '2017-10-16'),
(32, 'hhdjsjhdj', '0123645231', 'nbv@gmail.com', '$2y$10$mCz9PAXcBAkulgZmLIBznOVh8PkhqKNAUSk6adscszTko9yyOsv/a', NULL, '7sOp4X9b5239iAkzUHTW7qAQYobbi0drPM5mONxNXJYry8TuyaH30LXMCnpr3bJPRTvR1Y', NULL, NULL, NULL, 1, 1, 'hhfsgh', 1, '2017-10-16'),
(33, 'hdhdjs', '0126796463', 'fff@gmail.com', '$2y$10$9XUs8n89W11.ZwWJl6zR7ucS5qTY68RZY0HUOPpG5KOKLKPD.dDnG', NULL, 'qU3Oti6670UJoJaOe8DJ4q23QR7f4DVg5PzvfOURqbniwrRuMPb8NKc4UZq1S26iliLE1P', NULL, NULL, NULL, 1, 1, 'hdhdhh', 1, '2017-10-17'),
(34, 'fhjhgfhh', '01224632655', 'dss@gmail.com', '$2y$10$T13ih.8DObMCz4eOemlaC.rxhxUCtDyIlRmkA5Tw3YMdxpcrtNKeC', NULL, '4X4fEN700XbAVk3ORBl2x1UExeogoBN3vpLu635eHA3TSLUFIHJ9mjOZ14E1rIr2tbVQ1N', NULL, NULL, NULL, 1, 1, 'vgjjfgi', 1, '2017-10-17'),
(35, 'gffhhgfff', '0125556888', 'hffd@gmail.com', '$2y$10$bc.p82AskR6bLwgAH6K.jeRsDLxX8tgu604KJB0D1sGBgUyvvz6u6', NULL, 'V3Rse5QSzewKTFs8BIUBCuKiUFrArt7apzp2MEyerzuO53T35WYNB0T2zFn21hePm74BHN', NULL, NULL, NULL, 1, 1, 'fhhhgg', 1, '2017-10-18'),
(36, 'hfdhgjjj', '0123485259', 'njh@gmail.com', '$2y$10$V4XAKWVYKcqQW4mhjai1t.VGixy7/UFezQOwIBAdSZ69Wu599ohrS', NULL, 'NQrt4QijV5gY5iSwnfx4gG1E80iNBuH3IClPfdszedNkKmyECRsKjZE2FfzYMs6hgGKtDp', NULL, NULL, NULL, 1, 1, 'gjjkjg', 1, '2017-10-22'),
(37, 'chjfff', '0152552585', 'nbgf@gmail.com', '$2y$10$cJzjqm0XCvPt9wbK2BLKBOAQhMNQj3iR6GPQ.Tbmdj5wZ.FeZyL2.', NULL, '5MzR15HQ1IgaZVaQfMaZkQYPQNzQllhjBWckiiulA9PLf4wUvSM6EWCzlHbye0xMzDjTjD', NULL, NULL, NULL, 1, 1, 'gjkhh', 1, '2017-10-23'),
(38, 'tgghvf', '0123558888', 'mnh@gmail.com', '$2y$10$n/uQ.l/lUbaETTud9sP7deYfjti/lLolpyF0KrCEIki8gVUDLPvi2', NULL, 'pXv6vljtJvv18srnm6LNDzS6GC1g4CIgs5uvKPiKDfsxj9T7qGcgf7gFGqcSGPwmfI2lfh', NULL, NULL, NULL, 1, 1, 'fghhc', 1, '2017-10-23'),
(39, 'hshsb', '0125574455', 'am@gmail.com', '$2y$10$rcjT/3TdFa59V..wMXCiyeN6/H0W.5tOXvEr/i6w.z/hsRULBxwqe', NULL, '9Khy93Zp1Ngf38wZQMQNt0b8h8sYnq59ekvKVpjjikmgoWyRIOaToEA2p9zKycthvFngft', NULL, NULL, NULL, 1, 1, 'hjddjjd', 1, '2017-10-23'),
(40, 'gfhhffg', '0120000000', 'hgg@gmail.com', '$2y$10$1EswIYIn.VljKLBegBcmBuLty.4nbkrvpEcaBtn1VpSjM89gayuzG', NULL, 'T3l7vh8j4zaFUWRxyOGApR8gDrtDfHoacm488xMXFuPSKOLWexmRF9PRT7yUd2X63t9R07', NULL, NULL, NULL, 1, 1, 'hgfjjjj', 1, '2017-10-23'),
(41, 'gghjjjd', '0123665877', 'mhgj@gmail.com', '$2y$10$jpb5X6TNKW1P3zYoma86LeoJ6KmAoP1cz31LOiSXc7MPvIdmvzxqK', NULL, 'FdHmkyLFkIEqNuz94C8OoqM7YIjRPISiwXtavRz0JHAKeOQB7KKHaYmcTNfy3rE0AdwHT7', NULL, NULL, NULL, 1, 1, 'hhjjhjh', 1, '2017-10-23'),
(44, 'gjhff', '0125435885', 'nhhh@gmail.com', '$2y$10$GAxmbykRTBv8Vh.LfoSK1OUaS64kCh69oc/DjwF43j7Jq9lqm7wZW', NULL, '0KZKxmob5yjk0dIqxRSGkCtaI1Iw3iqjdhtnmg48cCS51F7AN5dkRCGvSQKrQrwQ4fn9Tw', NULL, NULL, NULL, 1, 1, 'dhjjj', 1, '2017-10-23'),
(45, 'محمد البطاوى', '012716349255', 't@t.com', '$2y$10$N1qNQD3TuLGNMTeA9DNVvu4oSJgL5.BZwkBpQEVw8LcWESzLQCa1e', NULL, 'cfd1J9kEgH71v6833PoIed48eeTdi99c1HMijjXdBEvXEl7k6VeBrazBZ24aR50T5e2zeZ', 'MNx03LDQ6dmx3bG2BqKahYLTMqSlzLd2JLrF6hK13xaiCWBxtrlNy3nzOATMMbPaB6rzVF', NULL, NULL, 1, 1, 'عفريت مجد سوفت', 1, '2017-10-24'),
(46, 'tony', '123456789', 'w@w.com', '$2y$10$ZBNQgAGfli4lsYlgrllrk./FoNgsMluzFNim0jD0Ne0LIgMzYxQiy', 'images/user/KTpwbV_1509183378.jpeg', 'hRsOb7Tp6U6F35ZgelgRG7MpmOu6zpEZFBb7ecCVH9BaNhkwSEyYuA1hPzVnHkRqmZIgF9', 'XofhaOPW3VDLdlZeNMwquXgFDppRa3mxNjcpt2PNVpuytvxGlnNW6GKPXDOHVxk7wMmiZ5', NULL, NULL, 1, 1, 'kjkjjkj', 1, '2017-10-24'),
(47, 'qejidd', '0111111111', 'we@we.com', '$2y$10$AwLc1OxuNmm6vHENuUCh4O53DnuiWpTSrfc.YvaOWsvkpAuuJlHWu', NULL, 'DouHfp81i7iBi8fTHO7dNV6th02MVCZOhnjDkJXc9xMXLv4ModddHlWq7omH72Bzuzp94o', 'J1RVTmsaD093h3BOiQYYKQhqOylg0QXDjewvsN6HobazgHgVNU7TVr8i3u1g5rxEXMTjKc', NULL, NULL, 1, 1, 'dyufhy', 1, '2017-10-24'),
(48, 'omar', '0127126790', 'om@omj.com', '$2y$10$dJi7Fkhd2/eKWXMbh7wC4O6YT6e8NA9MEDtWL./iWwmYfIkPH5.h2', NULL, 'MaNJ75nVER9dwTWED6AQbIsBBbielvxKmDUdFMwoJ5hze7whFBRC5zZpuLSJn1rO615eo6', NULL, NULL, 123456, 0, 1, 'Elshabah', 4, '2017-10-24'),
(49, 'uuuuuuu', '01234567890', 'kh@gmsil.com', '$2y$10$Cd1J.ch5vbmGdELpf47imuw9KeuKmg4VkI1I5n8apb1GH0wFwgfqa', NULL, 'kP2TwjpFRlIXkmbm9UvSod9SPRKYdpTE7OYU6OtIrRe1vkvJLrw2QHzoTixpirQiMQmWMn', NULL, NULL, 123456, 0, 1, 'uuuuiiiii', 1, '2017-10-24'),
(50, 'hdgij', '01254335565', 'hgdg@gmail.com', '$2y$10$EH54cBUZBfXhUL7xDuRCiui..qQ75R0Dhd9uw9OFHdEgxrSA9t9om', NULL, 'mh6rPiNGA47OYsBzmgM7wdBdOLi4FmOroivoYg27BpuT7uoleClyezakrFOOO5a8bmlHuT', NULL, NULL, 123456, 0, 1, 'gjhgg', 1, '2017-10-24'),
(51, 'mnmnmm', '0125463876', 'mj@gmail.com', '$2y$10$UiGpBXMU0imeDHguFVtjyOHiABVud5B3q3g8UXAU.baIkIGtw0FNu', NULL, 'OvY8Z5kW7dOyqgJOCzhogb82yu6ne8GW3boMVuSx5oqtLACxvrJS5RY00AKbS808isUjqN', NULL, NULL, NULL, 1, 1, 'nnnmmn', 1, '2017-10-24'),
(52, 'ghjgg', '0123585556', 'mjh@gmail.com', '$2y$10$WRnw65zP0KU87ZVnj3WkB.Rh2a.rxKhTpN8WsESUvXIsDxRcQc4fW', NULL, 'iCP6YyNIujUBuWtFaZOz7bjyHoJszCznHKKyNGPMk78OpjbLQwQucpyGTiKtLHUR8J097C', NULL, NULL, NULL, 1, 1, 'ghjjj', 1, '2017-10-24'),
(53, 'yyyyyy', '0125453355', 'hj@gmail.com', '$2y$10$MaautP8wk.knGlNPgACUX.rKYCExBNOmYtrT12xifs0zWGlLZE4ka', NULL, '2qA79HdYHOkftG9EUARJFX2bRnaeaqN4WdZAQesaIdR0yhn69ng8VtHZ7IruzMC3aRaq5S', NULL, NULL, NULL, 1, 1, 'yyyuiuu', 1, '2017-10-24'),
(54, 'dghhhdd', '0122222222', 'hhgg@gmail.com', '$2y$10$1M9sfWCO6qXC8YCo9nfk6.x8FlAp1yR/w/9647OF2Wjsyz1Jbl6ha', NULL, 'c9Mw4lxaiHLZUioMTmVjEaZhk6Sds273OmK1bIWN8ADYyFaNjL9BdEbeO6PMcTfzmS9x5U', NULL, NULL, NULL, 1, 1, 'ujggjj', 1, '2017-10-24'),
(55, 'gjjgff', '0155555555', 'ghhfg@gmail.com', '$2y$10$j/HSRNzpthyafypcNS.tveqkX38c0iOEhT1c/rk2iesbU2Me1gPdK', NULL, 'nsOV7wEM2k2sefmG6ymLZ3Q33EUc4uwnr4D0HA1FVYRsZO2Etoi0hrtxM3Fic0ho85zvyu', NULL, NULL, NULL, 1, 1, 'ghkhfd', 1, '2017-10-24'),
(56, 'mokmok', '01111111111', 'mokmok@gmail.com', '$2y$10$Vhj5prpF9cnzyDzetoLrcuiZrYAamlCrXolxCqvCHwwoM26a8kWei', NULL, 'GrjPYFjaJDAoGgBSMw6cEhpwRv6EZjIGkLlBVIBYr8gB4X1BZ5TpEuTZ4rRBscCTsFSE5j', NULL, NULL, NULL, 1, 1, 'pppppp', 1, '2017-10-24'),
(57, 'hwhhdhsh', '012395588', 'ghhg@gmail.com', '$2y$10$O3U3eX2xft1QVo4PN9itgObk.vmUJKHOHVLC26/yZbZ69e5dRDXPq', NULL, 'zmdvd1LEE0XwL4oAXaEkCx4T88AxLxG9wt2eEwwAJW18YP6NSbHBCMZBBs5MhKJBcGMdVG', NULL, NULL, 123456, 0, 1, 'bjjsjjh', 1, '2017-10-25'),
(58, 'mody', '01421233555', 'hgfd@gmail.com', '$2y$10$JIAZr0w8jv/iy4hjxcdgLORjZeWkXap9r6uBRYj0asIPQmYXsOPOi', NULL, '0xoUD9ZFsmJ6GLdtOeR1DwsgJxHN7shhAFNG4ge5ZzRwHB6Qm39pFjyBhbADJAAHm5JgGI', NULL, NULL, NULL, 1, 1, 'mahmlhg', 1, '2017-10-25'),
(59, 'mahmouf', '0124535864', 'mkjn@gmail.com', '$2y$10$sK6/QgF5Gt09llyS8STwq.F.LxGe6zSUAczCYer0wgcj6oKa44oDK', NULL, 'oBZR4EaBTnugBs3dcSvvGJ5AOXoNBS1fFbx2jsqyAwPmkAG3uFbSk2HH2VfFc95Qzp2Aq9', NULL, NULL, 123456, 0, 1, 'baroody', 1, '2017-10-25'),
(60, 'elbarody', '01004942727', 'ahe@gm.com', '$2y$10$SNjhojGin2B4taKud/G.OOGOjFR9PtDD22/t6svBZykq/POFntdE2', NULL, 'M6DKvyQ1jQAdhjrXSQOB0z2uyCNZEJdqTgO0sksO8yBcr0PJmTqFUXyiAqCEYbwvNRsr4v', NULL, NULL, NULL, 1, 1, 'wow', 1, '2017-10-25'),
(61, 'mode', '01233333333', 'mki@gmail.com', '$2y$10$FakJPerIwwteS7tFLV/OPudZdY4vvpWP4ZjjLoTn9pyYflTiP2VVy', NULL, 'Y8f0iLDZ3QItTAf7qbTCnQXPhnMms1aGcfZ4Z4fl6Wh8dzLuTON86GD3DO493K8vUEYU3z', NULL, NULL, NULL, 1, 1, 'toto', 1, '2017-10-25'),
(62, 'mafffghf', '01254835854', 'jg@gmail.com', '$2y$10$lgXW0r/NQK1F5OrLbIBXc.ac1XMwMy0TeIJiRyYehudC5FVAW/Go6', NULL, 'uyIOZpOQu0vht00FUnvfadU1c5zyQhuQRxAvtGvVm30a6hd4hyaUdKX4x5Xqn1FPb4dK09', NULL, NULL, NULL, 1, 1, 'hggjkj', 1, '2017-10-28'),
(63, 'efhvcv', '789456123', 'ff@ff.com', '$2y$10$05IO1DdjRvM9IPztA2xeyO.cOEHjkDRCquGhgP/dngMytNP5bx7f.', NULL, 'qvsCFLxE5bVU1J1J6xc247eBRNfg57sC4t3MNsWxkypyNVlGc03n2QCSvsk5Qan8rJefXL', NULL, NULL, NULL, 1, 1, 'fghjh', 1, '2017-10-28'),
(64, 'brary', '0503020902', 'm2ly.swak@gmail.com', '$2y$10$.hD0A8tEZ/zUYtxx.qOcjukUAewnH1hh6rQCCh/K/T9eSqZjlTEUe', NULL, 'xdKKxTpXTBnA1uoXhFLMcoG6gvWJQWhzmvynom0rnpN84D5W0zMJnjRXaPlOXyk9UADMo3', NULL, NULL, 123456, 0, 1, 'ghost', 1, '2017-10-28'),
(65, 'brary', '+971503020902', 'brary99@gmail.com', '$2y$10$Y5ThMjoti8i.97WMBL2NOuFK5ptYvJNR4BaLxOTY2wsCh7iQe3z0i', NULL, 'dhsfjYqP5uCs5I6nuoaFGg7V4J6gUjGOawP5gN7jf0rI2E12UNAPpdZEc96vylaPzWQrrA', NULL, NULL, 123456, 0, 1, 'ghost', 1, '2017-10-28'),
(67, 'eslam', '01022666318', 'nageslam@gmail.com', '$2y$10$u1SUeQnKTxNDYmv.P0Li5utOzom3W93n6ATZ.y8P5R6/gDGXmaFFe', 'images/user/php0b4Fe4.jpg', 'sqhzEONagsan0cF7SBE1doIykbiHis7rEh4X4EXOsprO32gIc25Ab2aFjkadjRFqUcnsTL', 'Ws5DPE2iVwiBSmLDQOclav4S3dn6bPmgVQS3rzUFLjdZpx51lbBFmC2eA1e9WE93gVsPMi', NULL, 123456, 1, 1, 'esso', 1, '2017-10-31'),
(68, 'muhaamd gamal', '01014141605', 'jimmy982000@yahoo.com', '$2y$10$6scoFQfoMJclqJJJnDtl6O4w7w6eDIFvveNX2LdAq6Y3tYhyDhamm', NULL, 'jU99HVbLSMaSvtZG8hiemH44QON70TgkhKCUBKanE3VLY5CwV9NOX3jIfWuPJ7csmsldzR', NULL, NULL, 123456, 0, 1, 'ghost', 1, '2017-10-31'),
(69, 'gfdgj', '01236889857', 'mnfgh@gmail.com', '$2y$10$0rVaZWfeYJ5h8wv6bl/FxeFeZHtJq4s140DK3O8ZeiS.xuQjtGR16', NULL, 'Hw3UYo2Dt0Jto9T923Twv9cvqtsdIFJYkQ8xAsG4zoOaigPLXEk09YF4awummEDbHpp9Fc', NULL, NULL, NULL, 1, 1, 'gjjjg', 7, '2017-11-01'),
(70, 'hsjdjdjh', '01288855555', 'hshsuh@gmail.com', '$2y$10$.yRDbBKl8Dn42iCDxY/YVeCp8nXfQOOFX4P7S449z082DiEElQe8m', NULL, 'IJJhTdr9a7Kg5EjvVhJd5fejFlOk35cyo3kW0cUiowGFvWMOK4NP3pBC8wihsyItAxQoQy', NULL, NULL, NULL, 1, 1, 'dhjsjhzg', 4, '2017-11-01'),
(71, 'fhgdfhj', '01200009999', 'mgfhv@gmail.con', '$2y$10$oXj/G39bMRKZlWCxu41vn.UyqbvOftGR7Bdu2MlSf0vTE5pSQ4EC2', NULL, 'SyQ09uEWKUQsfh9QAlcIPiHIkX2a7JE60NcjsEVHEmWtmUtWdukzGUNBtBg1WkFTK625qa', NULL, NULL, NULL, 1, 1, 'fdtyyd', 5, '2017-11-04'),
(72, 'fgdfhghg', '012248887', 'nvfg@gmail.com', '$2y$10$oL3Ln7ozDwiTt5FWXVaR4.1Ijy7rNPLWY9SM8vy4jN6e7jXQ8NX7a', NULL, 'qPgrT7io8GtlczEiiRidsnnPB0v9c7nYzTwQdx3q0ybZ0jeQdabMSOEHGZtC7mliInGRY8', NULL, NULL, 123456, 0, 1, 'ggfdgg', 6, '2017-11-04'),
(73, 'ذاتتبي', '012544888', 'gxdgg@gmail.com', '$2y$10$z18kSSJbpytMvWEIfe04F.KmzaHUDCrY6bVE5xmI.a8PStHhSz5Jm', NULL, '9kuI6VHcTgevPzggzFxWVY5HXELx0beSYqq4GSWUnuoqs6bb3tJZOWnjkoKUZs6jaUWnvD', NULL, NULL, 123456, 0, 1, 'لتتتب', 5, '2017-11-04'),
(74, 'باتببف', '0123455555', 'ddgjj@gmail.cim', '$2y$10$wT2.l2/aB2GE.s1k/STnyOeIeuOiKYUPuxYQe0DmhDVKoSS66Y4/G', NULL, '3ntH3lwwt0luxmwb1cGiAB6YEDlCHpH4MB9R7voTiLLKvY2eyXhSpS1XJGxcUu9FkcMJ40', NULL, NULL, 123456, 0, 1, 'لتننبب', 6, '2017-11-04'),
(75, 'fjjfd f', '012158763415', 'hdsrf@gmail.com', '$2y$10$yay0gsxZlO4OVY16h7Vmf.2YXnWNRUkZVrIoFSmw8emTr6cXXrTCq', NULL, 'ud5QZ17DVD3TrT9ciPR4pTAefdM5FKCecuKJrOKCmEpvQppyS1aPXeto4qqP2FKbjc20rW', NULL, NULL, 123456, 0, 1, 'dgjj', 5, '2017-11-04'),
(76, 'hshshhh', '0123278574', 'mna@yahoo.com', '$2y$10$Onzv4QOqwSbbsXRF/mfPVub.hunjAj9gSyq3UTX.0CiFVjQJcWAlu', NULL, '7DSoa6jQIumsr0J2On3SJnXsdX8dNkS8HOiMpxmibqJz56fYG5apWrEWvLqbo4fSm9Y3Q1', NULL, NULL, 123456, 0, 1, 'dhhsshh', 4, '2017-11-04'),
(77, 'dghhdd', '012248566', 'nvfgjjg@gmail.com', '$2y$10$ej7P7e2uyrrT1YAlW76c1OuJlpc89KrsPaQm5xm55q4wtxpi0E8bW', NULL, 'u2qK3Y5hhHM38Ug59qHcmTJVLDHvoiMP3t0Bs2gO7boLKVRQEHRndt4IdFG4W3HSPKFElH', NULL, NULL, 123456, 0, 1, 'dghjju', 4, '2017-11-04'),
(78, 'fghhfs', '012354558', 'mndj@gmil.com', '$2y$10$l4TnWi4BqewoKC7HPnaQ3.L7IbaqOIFkkCrlkIwmgpX24Oh1OqkTi', NULL, 'FGHO9sL1ICs2rAeg6RYHvg0yt058py49BJ89IIeCi04T4yyAIurGLr5da2CbbJuPnt5g2P', NULL, NULL, 123456, 0, 1, 'ghjsghd', 7, '2017-11-04'),
(79, 'fhjgddf', '01235855558', 'mdmjh@gmail.com', '$2y$10$GbaEsREhjDybsHns4lI8HuFbXvy.TvAWZ4tMcSKGjuNbMTEHeSNrO', NULL, 'r4j7H9e1hb9VgQIjRQo5ZRQJ13jwiTlFWj6qp9RFA5ctz1tcJF23WTqRyD5Zvkp3nDfvYN', NULL, NULL, 123456, 0, 1, 'dgjgdd', 7, '2017-11-04'),
(80, 'djjdf', '012375655', 'jgfgh@gmail.com', '$2y$10$xlbP0N.gPfk/SOjkgwPoXuH5h0B1DIsBuQmSTnCCDzO6yakVPa7h2', NULL, 'KKDLyYiMVMlqNaM9OOQsShC3HYRIK4JfqCWLaTb5QArEnsMEriil1TUPPeNaQLx0I4K2Ub', NULL, NULL, 123456, 0, 1, 'dhkjg', 7, '2017-11-04'),
(81, 'dggyuj', '012333666999', 'mhghh@gmail.com', '$2y$10$bR09ofn6WwFwcVc8VV/r.OuhFqGIbNez33mG6AMG1rPt5v3Ulfsxa', NULL, 'Kb37YmgxkNsL3ImXqdJkH16Kl39qNWVD9rQJLLSVau4Ch5ktxAw6Oqji8AT236ziejdyKN', NULL, NULL, 123456, 0, 1, 'ghjgg', 4, '2017-11-05'),
(82, 'uyyy', '012111444777', 'nbg@gmail.com', '$2y$10$gSOnFEHYxBEtykP7nuyMK.m7IyAthUQfTwXRZziJMgNXzo1XOU8AW', NULL, 'EZgK6JvPcHZNWmXvVUIJTVOvifKHBBaMutwb9xEOTdq6xivQYbDBReYUdAraJJLY5oHzEd', 'UGs1xKq0ag7ECeHNBlgcuSQlpTdhAHGaqPTwwV5Of3HBkGylk5FMduA4Ix7NgRTgIfXfxv', '012111444999', 123456, 1, 1, 'jhgf', 6, '2017-11-05'),
(83, 'hhhffhh', '012555888000', 'jhvff@gmail.com', '$2y$10$SKOkFQ/R6PNuI8PD4KC7Leje3pT98Ms/1blJ7GR3Zyyi8O83IQRwu', NULL, '6e2SdW18eATJrM1DwZ0BLZopcusfI41wRUutV6D3oWzgRYF8x33M7SQBzPwgDXNspWJYzQ', NULL, NULL, 123456, 0, 1, 'ghhgf', 5, '2017-11-05'),
(84, 'gjhfgg', '0123336669999', 'nnh@gmail.com', '$2y$10$NZLsa/KxjUKGsFqJjV8qDe5PQNwylmqP7807I8bYewuURICbO667e', NULL, 'fEaS3eer1SGViLSe0pHxNtjt3M66LMQGIUxjcVzeGmut2oHtPoemQVeqpwumNl3ZelcR2G', NULL, NULL, NULL, 1, 1, 'fjjfdf', 5, '2017-11-08'),
(85, 'gffhjud', '0123123123', 'gff@gmail.com', '$2y$10$CoADcj0doC2FA.gsGJJzvOO9X0s4e2J/Td26m.TSumRs9reFDXxJG', NULL, 'u7pcc1XSaKQbv1swD0N1wBxxjR0GZxVKj16ksUpT11pl8HTpuwotMEu6Vr1VFygxP2CpnW', NULL, NULL, NULL, 1, 1, 'dhhjf', 5, '2017-11-08'),
(86, 'dakjhudh', '0127164925552', 't@tt.com', '$2y$10$Xock/bJk2v/AdUoh.GWyN.BNQfwjJPJVpokJxrl192rrNOF1VPuIy', NULL, 'KjESkEaP9SRvjUVFXCHSryr3mLZKUe4KWwXWI87fqkARXm3Q0gm88Ou3DFgdGld3Pv0KJE', NULL, NULL, NULL, 1, 1, 'iudyvu8y', 1, '2017-11-11'),
(87, 'gd9ugu', '114545787', 'ff@gmail.com', '$2y$10$3EB2K2m7eLUSD2Tx4xxL.uGMOhi4e.E6YMxrdzkNIXlvSMZ19.Nbm', NULL, 'yfgNW60t20hyp7YwvfXCaqstlth6epKZjoRslJJpW7MMcLf6ws8CXGtAp7MH1TPdPFJj3l', NULL, NULL, NULL, 1, 1, 'gfougiougi', 5, '2017-11-11'),
(88, 'kamel', '1234567890', 'ana@ana.com', '$2y$10$vyCyBD01jf3mzOF/bPdfceIQJlK09VS6Sxec5ppBuQ8fuSaV2QGJq', NULL, 'PX59H0lD5jT0VA6mNENMCLfQD6iLJeLVRbJoLppnZLQlykkMLnSEj1Q6mHBrAAL7Ej0q92', NULL, NULL, NULL, 1, 1, 'fjhfsdhffhjfjfhj', 5, '2017-11-11'),
(89, 'ughuighuug', '01234567899', 'gh@gh.com', '$2y$10$VUnJl2Glh7arpfvFkqEhN.6mARHS.7uI9Dcr7n4imojgNFWN/VYIK', NULL, 'Waxl5Ojj54laU3XAxC92uTF6UaiE8QPbA5ELcNJPLvaDUKdhuJ9JmOeYXZ1oW6v3W99DHg', NULL, NULL, NULL, 1, 1, 'dbhfff', 2, '2017-11-12'),
(90, 'tootgikj', '1234567899', 'ty@ty.com', '$2y$10$ZYOfaEPJUyoJ9uDFt5VxtuJqalWxPTBMlCO0ftEk6pn8hu84LWEHi', NULL, '4zsWGSji3hqznnzwp1Fdb1YTEUbmF4tELsCAgVwoZ9jKLFgGbASZa4C9WYIfOxEnYzhi10', NULL, NULL, NULL, 1, 1, 'gogjiogk', 4, '2017-11-12'),
(91, 'yrtyy', '43434344', 'err@ed.com', '$2y$10$K9OJmunwoSp3mr6CidxSTOiTs9ky4cUYqRGUEYgOYujsGbGUcGHzW', NULL, 'BMRXNtYWL8dOJSHVcmghTeF8GxKdgssutPqBRuVHPn71pd1ZsMGkrWnmaCF8YCS550nBgf', NULL, NULL, 123456, 0, 1, 'efdfdfff', 4, '2017-11-12'),
(92, 'fdfdffff', '333333333', 'fdfd@df.com', '$2y$10$dYyTS6F/VIpIgSyoru.i0ud1PQvnN3aJPb0snxYZxosrUp8y14TeK', NULL, '8AqAzZENZCGp61L78FvPdqrkTjlDrTJ2q1QMsZcvLKPz5tOHCp8pK0dWREo5C5Com9rLJB', NULL, NULL, NULL, 1, 1, 'fdffddfdf', 4, '2017-11-12'),
(93, '09u8iu8ufihfufuhf', '1234556789', 'qw@qw.com', '$2y$10$hMCewIMNd6of.0OLPgTVzuTN9Q5j1A8AyqxWmrSOUiPcuVJzhootW', NULL, 'QXwUKmlrmmvxEwilWr6Ue2gBHRlqIJksMKLWdZMz8glYNJOrzJslA964LNLt9sohxlW00h', NULL, NULL, NULL, 1, 1, 'fiufif', 3, '2017-11-12'),
(94, 'ojijrjf', '045458454', 'tr@g.com', '$2y$10$JcBrpeP9ovbS0YfMPQuDTO3xaDUz9fd1kpb0S5Ipq8KIMxGIrCPSm', NULL, 'nvGvNuAklcsW04mVGhuXW1B9zbv7rFGuYIfYsFW5N2LP87iJK5OgIuTSuMD3GzhTmd4dp1', NULL, NULL, 123456, 0, 1, 'gpi90gi', 5, '2017-11-13'),
(95, 'tghhfd', '01254588668', 'hgff@gmail.com', '$2y$10$KpZNedHmShUY12Q9uTFpBuNfJfS2A.4HTAnPm/jaO8NzFwfsBPyQO', NULL, 'KjRrZeazhQ94c1z4UwrNgDHhGVnjeRe2fcNqjPvd8Ddxwjm33I9ivcSeSyGdaOu1XZo3ZC', NULL, NULL, 123456, 0, 1, 'dghhjh', 4, '2017-11-13'),
(96, 'ggfff', '01225455544', 'jkfrt@gmail.com', '$2y$10$nFXeM2mq2k33oFSU3DyqB.tTwjJCd.JPnFfS1REZX5Kv38tiy.4rq', NULL, 'MXORdkBiU4Yj8TeQuH9woIDiaWOaAmkMfFqwDTZwWrV8hPjsOVqUZenNE7mFEfkO7wUG1I', NULL, NULL, 123456, 0, 1, 'dghhjgg', 5, '2017-11-13'),
(97, 'dojdo', '478467333', 'tee9i0@dhu.com', '$2y$10$qy5qxxV41ibHW4cRG9HW.eUWmiZdD289sJcv.geCU3kqSNQXtb9uW', NULL, 'BL5uFIdQgY7CrGTJyxR2Xknv3cIXHV9zeLdxdS03vzDBuHV7xmRLSLfYAruYh3w7c81Ih8', NULL, NULL, 123456, 0, 1, 'ajdsidfh', 5, '2017-11-13'),
(98, 'mahmoud', '01235544', 'nbf@gmail.com', '$2y$10$W8/cZl1oy4bEuDF7Lg5lX.kOKemmtFcaulhm6tvgaDcZsp6TQu8Z6', NULL, '9r3Rfb06I4wBjZYqoapVXs7vN2uWH26aJKOEtWUm9MrF1w8VXrU8JFKhqzDpfQdWOu1Loo', NULL, NULL, 123456, 0, 1, 'ghjds', 5, '2017-11-13'),
(99, 'dhhffg', '01268566', 'mafhg@gmail.com', '$2y$10$KwYHGn4S4ohOAcdRX46jY.QjBYsW/8YssCKgSUIzjD9xY873iKH8O', NULL, 'HabXrTiyd0MTjMle9GeCNnWAlvfQGk5Cy23mQRL8Uiq2YkOtZHGCLRXOeHTAoTmMcY5JYb', NULL, NULL, 123456, 0, 1, 'gjjff', 5, '2017-11-13'),
(100, 'hfghg', '0123255445', 'khggh@gmail.com', '$2y$10$YKlhEC7PTulSpv64bj9G9.S4XvSZSZWa.Bb06A9inGr.2eBn2O8uW', NULL, '0pejuSOzoZyOLXCDcXLIw0J7hIFwPGcYl8YO9Prux1nzjXZ0LhChMWzOXV4EfII0IZyMbB', NULL, NULL, 123456, 0, 1, 'dghfff', 4, '2017-11-13'),
(101, 'fjjfdd', '012344555', 'maffxf@gmail.com', '$2y$10$Sw6bmKSPl2iCUQlx7aIHxu5mpLNmTXjQTScOobv3dayvHU8et/E86', NULL, 'BhQcvpZDZOaSD1mEizGkSkxgIetqqdfMUXGLcRefMhXsIGCr78TbI2ysfvE02jcpNCCdAH', NULL, NULL, 123456, 0, 1, 'dghfff', 3, '2017-11-13'),
(102, 'fjhsfh', '012357656', 'madgg@gmail.com', '$2y$10$UaHKGlsmyBsD9AD8KgBlreoOfoLNwpnt2wcvb1q5MLoQoWysFrGC6', NULL, 'th2V4VyC3cQvg5ktQ0ZWwKksrqLlwEC9fDGC4ZXlYBES6iiKsznh6wAHtfRZ53urE29Dvi', NULL, NULL, 123456, 0, 1, 'ghjddgg', 5, '2017-11-13'),
(103, 'fjgfhh', '012355575', 'mgfdj@gmail.com', '$2y$10$6QjYm3VMoiWlUOGjZVW0oeHMHxUzT/vL8XYt9M46VLWAqEDzbuXL6', NULL, 'x0mq0CxRltTuwxu86sCYp8I0mM3uerhsJSS7woYP2VYgkYafLMoF5q4EVIxhEJ0Tp3VVyN', NULL, NULL, 123456, 0, 1, 'fjgdgjj', 6, '2017-11-13'),
(104, 'hjfghjxf', '012365867', 'ngjhh@gmail.com', '$2y$10$C62StKgkzo/v0vlEgRDCB.X6pv.MuxQmgbAbUnxupwHV6tSusRAsO', NULL, 'ZXdCb9R1B9sQ0GaJ1xnABHgnkHO9I8Zs8j4Mz8cYjFLNkOevcABmC6V5syEFzxa0ZWGhJm', NULL, NULL, 123456, 0, 1, 'fkhxfh', 7, '2017-11-13'),
(105, 'fghncf', '012555555', 'bggf@gmail.com', '$2y$10$zcmCKafcqf6ZuiTKkc4l3Oh.K7oHEfyEobUFFiukga5KRHseJ2xnS', NULL, 'ZMqHOcWoXIJzCyXbj4oNAN6kOJxP0BihEe2MwRJ7CdHcJSItZnqWRrUreIISEKdfu8I3zk', NULL, NULL, 123456, 0, 1, 'fghgdd', 4, '2017-11-13'),
(106, 'dhauihduhdudhu', '2052484884', 'fjhgf@hdj.com', '$2y$10$tWvxDWBS4/9vPRbqPMJnhesqCnLvYLBniKL.laptx618WGxseG/4K', NULL, '8bKQoVS4Fj8iGqWbJSJjyXh2wYDJEN9115mYz8QR1lhTgmBYTfzLuEk9xrJ8hxyLu9Upnw', NULL, NULL, NULL, 1, 1, 'ririoujirffifj', 2, '2017-11-14'),
(107, 'hyfiuhfuf', '01234556789', 'ywdfuf@jhf.com', '$2y$10$4B5XzcmlKZWtbNrsBmaBIO1id.VQafHUeKALfeP/L73JQjSDotDi6', NULL, 'lAwOVoU9fmWOJPGtknkiyJJqyDJHSJ5F3gr90egB4cz6aZbSS2n9eaYJzmSvbLQZcb8RYy', NULL, NULL, NULL, 1, 1, 'hduihudhhd', 2, '2017-11-14'),
(108, 'ehjiogfhjig654', '478384454554', 'gmiughughghi@ldjucjh.com', '$2y$10$pMDzp/8Le8WWYbxA18kE4.3i/EEiLFgUGTxaPoVArDNbeyFm7qj8W', NULL, 'QeNmachDG6BcqZh1056RRA15v2PCs4KeZYXnjXs3yvQ40M5E6cAfkMZzqyRSlUMZxBiVW2', NULL, NULL, NULL, 1, 1, 'rhguighug', 5, '2017-11-14'),
(109, 'fjhfuufhfu', '01280153646', 'tera@gmail.com', '$2y$10$6kH1iYMlI5nqNEip263SM.TRRrsi/1gXMKxkpLx2dPCaknMLDsN9K', NULL, '2gMyZdkWRdB0Q3tIaUDmZp51ILkffYk1GtIB1KJkgM2blcw9cuZOVhi6RGozLrXefWGcXC', NULL, NULL, NULL, 1, 1, 'fjifjijfi', 5, '2017-11-15'),
(110, 'ijoijg', '5555555555', 'hkjhk@kdj.com', '$2y$10$1m3OEMHZGUz/IUrQlcrq3.f6DLSN.LyRdWdDKQIE8.vIZcS4wOWye', NULL, 'gVDicfAiokrqNVcmQ92OhkQSfJ11fQoTxPof6vuOEXTpnVBUF2ioO6eU95fnLTQUJ11UTR', NULL, NULL, NULL, 1, 1, 'ghuyhgughug', 5, '2017-11-15'),
(111, 'gfdjijgg', '1234567889', 'dlf@kf.com', '$2y$10$WKX4ZyrsCHF7u2eXzGzoIO7EBTOiUYleZ9fvnxcljbGgUEwktXWz.', NULL, 'rj5TEj4TfyFjBXfpRNOlDhHhtNC8Y1Fv7GaM4tohEKoqSyFYdUhehrPtUwwCOQFUbWJNtb', NULL, NULL, NULL, 1, 1, 'owjojfdjf', 5, '2017-11-15'),
(112, 'oiorkfofk', '025445154', 'rgugi@lfjk.com', '$2y$10$mr5xKUjaTN2yFJ8YyG/XDu3/UH0p5Hy58fyMkq08atdtyUMKuk3DO', NULL, 'ikxb369aAQJJJbEKmGqZgRIj9vzuitueIMQ90AKggFlChKMODMwQFef38VDOJQrqcCk8se', NULL, NULL, 123456, 0, 1, 'giogjig', 5, '2017-11-15'),
(113, 'jkjghghg', '10124584545', 'hkj@jkfj.com', '$2y$10$xYGtHswgybbyATBpEtKtYuaNaBrIoAFzLimQWhcHXJtDtz8E9LaGS', NULL, 'YtdoqcrNDCr2Iyn5jXnplY9gptau3FsFkMbihIjLPx5KF50DEDfMRvV2Ge0jM5q3spGXsM', NULL, NULL, NULL, 1, 1, 'fohgophioh', 6, '2017-11-15'),
(114, 'jeifji', '123456444', 'fikjf@djkjd.com', '$2y$10$y8KHUz9ryI/qzo1Rob83p.eAx4KovdI8h061pjd9DBbm1Pj5oy6Cy', NULL, '3mUWK8Q7ksylZExclr81v0Z8x6Bh6EKwQ3MHScDvDVvf6PSpy9ooyHh2nNfb9amfqzUy8v', NULL, NULL, NULL, 1, 1, 'fokfokf', 5, '2017-11-15'),
(115, 'fcsjfhfh', '01454544', 'dkd@kjdkd.com', '$2y$10$j8qb0NVEUkv6G95sJ2d1ce15lUAqZ8301UvD5yH4eEQTMjlRagYGm', NULL, 'HkFJAtO7Pzryy8N3ru8tNryfr6qwBovgyEqDedVjyMW4zURTgT34OTIxjAdSLa6cXyfc0R', NULL, NULL, 123456, 0, 1, 'fkjfjff', 5, '2017-11-15'),
(116, 'reliott', '4510451545', 'kgkkg@kedjd.com', '$2y$10$1y.yQS9uAp9bRcPnt.7oR.AwfAkBqy2un9kYyjBPbruikeJUQqZGG', NULL, 'W6QrlQsgvHA5FnBw02zBlynHRdPnnq0FOQj4ocnDEb3nDTLqLIXaopRfhucKD7VtLiWPG7', NULL, NULL, NULL, 1, 1, 'jvghvujhv', 6, '2017-11-15'),
(117, 'hkiffhf', '5450244454', 'ljjffjjffj@jfdhhjfd.com', '$2y$10$k32JPyUE2DH/rmkMZ9GvC.C/K4Y7DfDcuL4q9Xsr7e.lQkeLC5.VO', NULL, 'Q89JfEOwOhHr1iZqR7XDzXyni19xKW0tjIAVuWF41FeBMn053uuhhDBX049SorwpKGl8mg', NULL, NULL, 123456, 0, 1, 'kdfhufuhff', 5, '2017-11-15'),
(118, 'youssef', '01203013031', 'joe.romany85@gmail.com', '$2y$10$p0G/Xh0PtcMSVC8bxLGyUOQRtZBpo73h/xXxMf5aODTWi.xvyXSAu', NULL, 'cUAjXAM0vHZcFNqwXl1wieHR9OJ6oZCulkmpEGfvmN6goVfO6447DLLnnaixsCChDADK4M', 'WmhOSAdPSZD92tVb4PlCh4nXhG5PFHZi5KGHXC4lgayux1kVHi3CkrP8MfEqLp3fXqNdfr', NULL, NULL, 1, 1, 'joe', 1, '2017-11-15'),
(119, 'youssef', '01273603317', 'joe.romany84@gmail.com', '$2y$10$Q4gEi8GoxQQoTtaZ1EjTx.L2VHScVehIaTBRSjd2GDIi2vbyRPVXu', NULL, 'fRrGEZV2T85a4BqfM1vdbVgmujqyS9nYTIb6vzLIPRz1iGCfP9VDrKtTx8YwUXbqiiVEEF', NULL, NULL, NULL, 1, 1, 'joe', 1, '2017-11-15'),
(120, 'omar', '012716344444', 'magdsoft.tester@gmmail.com', '$2y$10$C/VNpySf5K01NhwdeT8a9.LADPvo8X/JnjlSltaNSpxMKCUP9/fai', NULL, 'Eyw6OmPRvNZQAj9qfflilsshO5JC2CbhFtWiIrMJeruhXphsdpbyEb548CRCIrZuhsvu67', NULL, NULL, 123456, 0, 1, 'Elshabah', 4, '2017-11-15'),
(121, 'sznfjgfhf', '23151515', 'ddkjdsj@hgh.com', '$2y$10$4sV/caQzN7MfJCkn8eItC.NQxT8HJqrXAIzrNcN3mUep/E7NDty4O', NULL, 'lC9YL6nJZNP8aRzVbbpJRpR955MNoEKhT1rX5n6Qt0HDLz7uwrO4IuHp61NoosD10ZCrnj', NULL, NULL, 123456, 0, 1, 'ffdfsfd', 5, '2017-11-18'),
(122, 'mahmoyf', '1355554555', 'ejfgg@gmail.com', '$2y$10$AXZSqc3/ZiAZSxogEccgU.2FnFMUrH6qQ18e3jYVa8wKW3xzPcF.a', NULL, 'MqooGKJkW0G7fmBJfmtlGk6FeETOdjPs72Ys2Sb7620xNdb3jlm1QmagmHTT9m33cHE2tE', NULL, NULL, 123456, 0, 1, 'chgfg', 6, '2017-11-18'),
(123, 'fgsgs', '55555555555', 'fdg@dds.com', '$2y$10$TKSzC/meKrgp1tG7WQxTV.FfcfyU0il/Lpn43RmIhWl8vBEjoGqB2', NULL, 'MDX6FBl8172X1C6oqk1XsaMzbcfCsCX28gUE5NYEtW0ODRFewn3kPXt8GUemRfgQ7zSjyG', NULL, NULL, NULL, 1, 1, 'fvhhffff', 5, '2017-11-18'),
(124, 'omar', '99999999999', 'magdjisoft.tester@gmmail.com', '$2y$10$PY6I9G6rMmQFhFMzHalsCehU13pk1mAVd9GOR98lZgC8XnRCI8/r.', NULL, '1Xih5AB6hYm4VygBWpYd1X6pXv4xZhljTUkPZfVQFyzfN62GLve5Z8dhFNJVokEla82G6q', NULL, NULL, 123456, 0, 1, 'Elshabah', 4, '2017-11-18'),
(125, 'fghdsd', '0115585587', 'fhhds@gmail.com', '$2y$10$7qnNn6aZwcfwTMI9BaRNdeRiS.41qphi6oj52sl45VdHRPnR8pkXO', NULL, 'fpArKLgp6cA72yu8ryTmDKA7pLUWmsgW0bhg42eclskwxIcw3N9NJdX4XI4YYVYcSEHtk5', NULL, NULL, NULL, 1, 1, 'chjjfd', 5, '2017-11-18'),
(126, 'fhjf', '01355455785', 'jgfx@gmail.com', '$2y$10$atmVKO8Xy28J1dyztHl9Xu1plzo4ehuKhS6rJHf7uxtc46jbns19W', NULL, '2JaVcjglyeGTarh3WVchHOKCbWxil5qpB4EWLY5M4rvr3nzcEpSQKasznPDX2I3CcdpPnk', NULL, NULL, NULL, 1, 1, 'fhjgd', 5, '2017-11-18'),
(127, 'fhjbds', '012354888', 'hssgg@gmail.com', '$2y$10$8K99RMKFF1HVxdM5vfVlE.ei0AaMtCR.kJy1kHcVLf2SniSLaeY/a', NULL, 'p6np2bD0aXgK9yNZhTeUNOvzEhcnV8NAU7NDsDfNHExVpvQG0mknqFGp3EYdyBvhCpWlOk', NULL, NULL, 123456, 0, 1, 'chjbd', 5, '2017-11-18'),
(128, 'fjuf', '012655545685', 'hffjh@gmail.com', '$2y$10$mN6FYPsVOxBwN8B63FjfXeGKJbW/ocLL7r5YSvUpk4zI7i/bfFm.C', NULL, 'sYko1njiaLoZ54Gckar7YXt6pVet0JpLNxmtsRK8XHcU2rZityxLTUd08TgHJupqFtgHF0', NULL, NULL, 123456, 0, 1, 'ujfgjij', 1, '2017-11-18'),
(129, 'jjhgfds', '022235564', 'fhhgd@gmail.com', '$2y$10$2ZAX07Te0TgaoY7tzgHL6.MGNjUZM97SorGlCJMJ/u7qbkascdTtK', NULL, 'K6mpuop7OJGZF7y6S8fN9boibtJ7N8LmKMjziw37LxSsWxr7qUQ0kYl2Hnf51WwLOuzuOe', NULL, NULL, 123456, 0, 1, 'hjsjbvd', 5, '2017-11-18'),
(130, 'jhgdds', '01265444888', 'hfdds@gmail.com', '$2y$10$NIcWRue3h.WjN30j/T/7iOZf993vm4BpDwGXjYrIHlD2Nt5VkFBG2', NULL, 'F6q7rdIY1sAMsVkNJH8a4wPWfUcsYrQj8yr3n8wAk0wjBgIfhKIj5DqbXzYaSG8yxwiEKs', NULL, NULL, NULL, 1, 1, 'chjhfdd', 7, '2017-11-18'),
(131, 'hshh', '1466558889', 'hgf@gmail.com', '$2y$10$BxVq4oTBwOd/8MWaCe020OFXIoele7sGfkmi0xCVUNdK8zFwyWM8K', NULL, 'ect7ay7tXnzGfHVj2Txi4mVBYwdqZidM4vPfYvDChIsGfMmQ6zFhPA3fUxLbfHXdApxzHX', NULL, NULL, NULL, 1, 1, 'ghj', 6, '2017-11-18'),
(132, 'fhjgr', '13556533', 'rhg@gmail.con', '$2y$10$0yJ4qRMB.Kri3JXPba5wz.Y9ZPfYx263GgQXbWa5jWciN9qd7Dtnq', NULL, 'bXBkV8yWAyv6SIcNDT4D6rcoq28ytZNmUlaiJqlEL1s4lszHsMqPaUMKwPLedjt8c3XaWv', NULL, NULL, 123456, 0, 1, 'fhjjfgh', 5, '2017-11-18'),
(133, 'fkgdf', '0426556551', 'fjff@gmail.com', '$2y$10$SoaYNusFy0BnQemMm8XtReefB9gi.x/MLL3JC600ztsVypHY9bRGO', NULL, 'ID56x3tIELv0040QrRlJzulGayu6nmtdDkWYqWpuoRkhe7psRSrwOf3DLDjfIR2sbTeOaG', NULL, NULL, 123456, 0, 1, 'uhfgixg', 5, '2017-11-18'),
(134, 'sfgg', '012355555', 'fhgg@gmail.com', '$2y$10$lXrJr4WNm0aFVWTwPI9zneQU49M4fYER1say9b7rS/.wR6gl5C57y', NULL, 'XEQhTedKpByynJKtmXxxv5srF6wTAgpnMWmVGtKc4hRJrrHY5cmaMYOUlW8M0Z3TakrOZ2', NULL, NULL, 123456, 0, 1, 'ghgyy', 5, '2017-11-18'),
(135, 'brary', '00971503020902', 'jnoony@gmail.com', '$2y$10$2YOB0ByJtldECYFDTifch.5/ahagntqAZzLE7XpRqFH7If3Z7uLq.', NULL, '1p3jo4q50L71Xt5mXvPRCxQebUd6YrGIu4ZAwaM0Lktf7eCmsZrjQP0t3nDImBhI4wOeH8', NULL, NULL, 123456, 0, 1, 'Ghost', 5, '2017-11-18'),
(136, 'djjfdsgg', '0123445548', 'hfgh@gmail.com', '$2y$10$4zntWj9az7AFR0RrOsH/0eHyhqdtrYqiUV3iWMNtul3YiwxOyPPN.', NULL, 'iANYvkd4XOAy7YgqKbAnA6n5pRamrpSm7IQ7pxT79dhyWZKposFH8To2zfu0BBaRAv75nr', NULL, NULL, NULL, 1, 1, 'fhhgds', 7, '2017-11-18'),
(137, 'brary', '00971502055029', 'jnoon.a91@gmail.com', '$2y$10$6cb0HHqYHccvhd3SZgPgNehFnRKVSrvmePmoNZGdeN7BQjxChKXgi', NULL, '8P57QGuZV4zh9fk2YQNWoYxF1vLKFuiz7jA6JcK86YhVs5LTOCUST0iF9f4M2HzJCL4RfL', NULL, NULL, NULL, 1, 1, 'Ghost', 5, '2017-11-18'),
(138, 'fdghhf', '015855456885', 'ghg@gmail.com', '$2y$10$4CTA7ssb4/8.unNYpJAo5.pkjZMJ7iXIDKXWBDTtcZhHyfFk9TR32', NULL, 'j1AWKfL0sk8sfyfRID0kEmIqno2eicc46qtLDnekvI3bfWBsJw9l5zNphxbEfxYHzYUYYx', NULL, NULL, NULL, 1, 1, 'dhhff', 5, '2017-11-18'),
(139, 'fjfdfy', '0123455545', 'gjgf@gmail.com', '$2y$10$53BIhSjFlhDA87BDpvyJ2Owh9LaPRDdkX2Mdr2gGq6VdPrDz5Hqba', NULL, 'zvpIUyoylkyVCIPaQe70pHpq8uMHpiOMYEqZbLnX0kdM2M7kmYZPVmqht1LyUwE3XQT7Q6', NULL, NULL, NULL, 1, 1, 'vkhdd', 6, '2017-11-18'),
(140, 'omar', '99999959999', 'magdjisoft.tester@gkmail.com', '$2y$10$zEOe2YjJyXrkyDg9docSj.20EEGEBIB2tcXJqPH.E05jJnjF9S9.W', NULL, '0cVOLVrBrf0EKm8l3nv3OMVbEQh0xaGFxVBhqqfKVm09AlCZUX9DF7nhi201P1rG5t49yx', NULL, NULL, 123456, 0, 1, 'Elshabah', 4, '2017-11-19'),
(141, 'ffghg', '0123455665', 'bfhh@gmail.com', '$2y$10$sUQg2NmeeuclUJxQahhnp.t47pmkqz.MSut1KriC7gAtjWGJGIJna', NULL, 'PDZoxXcVqWNML8NzfIYfexK0jzvIl6SPvK0YqFwK724UaRpMkutwIR7kE9DAWOQQASQvqJ', NULL, NULL, 123456, 0, 1, 'gjhff', 5, '2017-11-19'),
(142, 'gfjhds', '0125544554', 'gddd@gmail.com', '$2y$10$SdGP.sAtdAIqtuzheHVFF.hVZirMDigAv7Gh9dDR.Pz6HydIyp.4i', NULL, 'et2H8lh8Dop4YXeONsmw3KcWARaFaTElikYGeoFnJ20D2GHWPZbjSfChvgUzVvad8Ndt7g', NULL, NULL, NULL, 1, 1, 'rhhds', 5, '2017-11-19'),
(143, 'fghcd', '012884855688', 'gggf@gmail.com', '$2y$10$PZgokSOxokjt4lZ.EMwL5.u3vPjrA1zO7GAgJHTzbKjB.iF/subnG', NULL, 'RH1TOvUnAShA3Fe20Ys9C2sxoB65mnhDrVNwbYykTEKLXHPkXixW5APFRiIFpjG1QDf7yL', NULL, NULL, NULL, 1, 1, 'vggdss', 5, '2017-11-19'),
(144, 'mohamed', '12345678999', 'nono@gmail.com', '$2y$10$U8zm8uOJDmr0bGZAP/7GjetHNJDOIRG39XuhrUyCKs2BsnmnKh6Bm', NULL, 'BPOqIyRQSGncrTtdZsw9DA41mzgWHQj4BtmD4nxbABvrx55mp1BSejT344W070JQO2a7qO', NULL, NULL, 123456, 0, 1, 'jsdkjdkjdk', 3, '2017-11-20'),
(145, 'etkjggjig', '1234456789', 'jgijigjigjg@hjuedh.com', '$2y$10$CvR8B5spFx47Ruy4dWh7Oe4TAW6wjk0HSO88Yz9RM.B0b1pqGhHW.', NULL, 'kSgWcPrb15BLEpDTA4nc8LQ1R0KLXZ9oPgS7FthuPzB2vNFN1QK6AaYmvBtAdBVVz8PJmO', NULL, NULL, NULL, 1, 1, 'gjdgjgg', 4, '2017-11-20'),
(146, 'grjkjgggj', '015454878', 'jffjf@kjfkjf.com', '$2y$10$euc0CXlzwbvZkDBsaaduDuAVSEffT76YCm9C40Kt2bBucWVZkO3PO', NULL, '5kU2iAWmj33E8SSGOqt3UfJ752HfkYCUtNSfjChoOAKnInvDHRiMqtx8AHdTtUK1xUryOh', 'IpEZNCma0NSqoGo4pskK7CN7Ky73gmhjrVeHxc8HgsfMGwzgu4Wd9FIrYqWGPBqSWxvpuk', NULL, NULL, 0, 1, 'pkogkogkgk', 4, '2017-11-20'),
(147, 'krejgidsj', '1215454', 'vjvkv@fkkgv.com', '$2y$10$KlDh1T3RYIakCCuvYg/Uc.m4puSKlQhhrjag42DA0j6GgAR6sW/hC', NULL, 'AwyT1FdZjHeIfRwuldd8fSMD6zUGP7CHBctESNW44yol0XCfQJFONPzr5igeS4veKYQ6IE', 'DTGRXYtIZdTo1GUd0j4hbqxmqUHUUHT7fwRhAx4MzydvT8FeizUYXTh6YWbtvLArBYfSAu', NULL, NULL, 0, 1, 'vvdjbdvhv', 5, '2017-11-20'),
(148, 'oaocovokock', '1234567898', 'fkjiufiufujjc@vghj.com', '$2y$10$bqxkd.JVbjW7E9Ffghh5RON6sZEJEckc0x0vpFxOgwhUoYgvp1606', NULL, 'W4VC9kQPADjPbl6ouc6HNg2zMxtyf4lv7Qw7QPEK2LR53IpaobSLQoaMLhaBHInEMazqmI', NULL, NULL, NULL, 1, 1, 'gfhkk', 4, '2017-11-20'),
(149, 'kdfsjifjfkjfjf', '1235469987877', 'dkvdk@klfjk.comm', '$2y$10$uEGFXvVrp1QrAfpD/cQ3guObhet1N0xgSkIdJbVQ4s51LjH2m72he', NULL, 'i0vY5O6LmTet6Mx63Efq0zYCZFqJWiLpqmLNFqOUE8QotoMHeaWdgWtzNPUzIRm9qhlytE', NULL, NULL, NULL, 1, 1, 'fuiyfuifyhufhf', 4, '2017-11-20'),
(150, 'kwiofigt', '0541545454', 'wdijd@dj.com', '$2y$10$01eTxv1kPxldm/JVL.foLuRpq9wEUGVafksnUgdnfua3eE4sBl5BK', NULL, 'DMLTCQL72clXMmLJXVMTxb3x75OyItJ5JH7MZ3IEyZYdRbFFCIYZ0AFw08qqoSnT8pIP0l', NULL, NULL, NULL, 1, 1, 'dgjughg', 3, '2017-11-20'),
(151, 'mohamedmontser', '01144311481', 'mohamedmontser52@gmail.com', '$2y$10$AQib5Tm1aEQpBZ65v10q6O.5uati6.E.xZxwq/NshipcX.Z/5Zc.a', NULL, 'OJdnCj7CXYpdaq2nUcx05qpnHoNUvVRJreClZGM70kq6RxDtgZ73pEUGLcwukJeAUHlJIt', NULL, NULL, 123456, 0, 1, 'mohameahmed', 1, '2017-11-20'),
(152, 'hhff', '01224558688', 'hg@gmail.com', '$2y$10$79A00Lckp/yaT3PnMeji7uP5FJY759HsVLzxK0sSHldElN1VV4Xe6', NULL, 'qHUCW9x00R7TsW28GFuhVouVaK5RMzE4IZYgvysDqJ6txQtZJBXoYkh3R6BYPFT5EJbeHl', NULL, NULL, NULL, 1, 1, 'fyjhd', 4, '2017-11-22'),
(153, 'doiuyduihuhd', '0221545487', 'magdsoft.tester@gmail.com', '$2y$10$BQYTU7vSeZdI0lTVwuxGMuEssgXPwTNg2nCi7xDXsYgKEDXq2aYke', NULL, '8arOBdo5IHsee9j8Db3fTkx4g4YukkB6xJSIaCN3CIYizezEsOCYl082y8eQ9zjSWdmqEg', NULL, NULL, NULL, 1, 1, 'uhufufyfhy', 5, '2017-11-22'),
(154, 'ftee', '01234546556', 'fgdf@gmail.com', '$2y$10$Pyd0ePfc/pyJAPEj/LMmHuvx/wJmvgboa9DxhgK1nhQPQw8yZsWdm', NULL, 'ifRmWrpMqvRadpkWPgj8mQAV75mbiPCViYuwIyRnHWqZPYZ6U6DSyzhMn0TpbJRoMedneJ', '06cFSpMBucHQHNdA13PDccgBcivzkMMRTKERJlOZqZQ0zglRMcP8GVmN1hxN0kixz4WwoL', NULL, NULL, 1, 1, 'dytd', 7, '2017-11-22'),
(155, 'hhsshh', '01865545558', 'hhf@gmail.com', '$2y$10$QtzZ8Ec9xs8A3An0OEsyvOKT1bYZ4.kY/nuMXQALwoftVp74z3Cay', NULL, 'h5Ytiu8GygunzvHvVq21bEbQIxVR9aS2qZa6QZtXstx9TNABSuSCe85RquDyOIhiCtTp2d', NULL, NULL, NULL, 1, 1, 'bbdb', 3, '2017-11-22'),
(156, 'omar', '88888888', 'madisoft.tester@gkmail.com', '$2y$10$As9q5QxKYDaZaHbTYHCPZ.Y0cS35iYjtFT4rmAnP0FsAAC6MzzqYq', NULL, 'vqtjG7usZV8rfP6Kj2Q0pZDS9X6vtXIIJtQVxKWlvqoj5NFiupHikbH3Oljj33jpax6bGE', NULL, NULL, NULL, 0, 1, 'Elshabah', 4, '2017-11-22'),
(157, 'omar', '888878888', 'madisft.tester@gkmail.com', '$2y$10$epA1NaUvOsSJ3.2EQ4iLm.MsbFkKOWrZ9fIo5hCpmZ2oQPnptmpAK', NULL, 'LG1ceczV7CxAeUSeI0mdexDxbz1BKGLLC22639CZumCm8zah2Eu3F19nNWaPb9Q92ThPtz', NULL, NULL, NULL, 1, 1, 'Elshabah', 4, '2017-11-25'),
(158, 'tfddg', '01235588687', 'nff@gmail.com', '$2y$10$wvBohA8N3HC7Myvo3Aqka.OhqfWdHIYvAJJtwNOW/dm5afhEDi1Ku', NULL, '89h2BCULUbXVecngFyvtdu2G6rE3naDhfG56R8mf0pzsrhxpCRPctl97IBZJ7IMUdC9DQX', NULL, NULL, 123456, 0, 1, 'ffghtr', 6, '2017-11-26'),
(159, 'dghdr', '012264558', 'fjf@gmail.com', '$2y$10$zYZGQKe8y5HQATTvSwqjX.A2KKRoRo.vv.4opCCd/fISZ3FQBDH7y', NULL, 'PVEb5KwiT0pUv6GihSkVSox4AaQntXabCQMvlc0ovPw4JmyyfrYZxWtUhh5i8taJayCOYp', NULL, NULL, 123456, 0, 1, 'fhhde', 5, '2017-11-26'),
(160, 'fhhdr', '012655657555', 'nghg@gmail.com', '$2y$10$sR.84Bh9EaGyBBBF2xs4TeYbn/Y6qXMZijkp4Qqlp0ffucn.GZNaG', NULL, 'WjiI0hlDDNZ5U1RN84Re2jGbLyrgp08mMacwf8VHnmEADC3nlWx8G809WKFNRdUCjKROGQ', NULL, NULL, NULL, 1, 1, 'rfhgd', 6, '2017-11-26'),
(161, 'omar', '8888788788', 'madisft.teser@gkmail.com', '$2y$10$8CgrN0wIUKlU8DUjDdstWO79NgvA7YF0fYlMAiswDRedNgiubdxBK', NULL, 'lTqeOdNTwYgbfTpLtKmAAA34VtRY7djzvkKEwbaqm8Fy8kY7Sztw3bQEfxG6SJsMzBY20q', NULL, NULL, 123456, 0, 1, 'Elshabah', 4, '2017-11-27'),
(162, 'test', '0122255554', 'test@test.com', '$2y$10$lwRz8cFBps5KIgwdUEHp8uAQm7S4Qf.fDNvW1nNaMACsevoTMGBSq', NULL, 'JGr3wywfhdipX8bDISXt3NkXrktpJMPALOVukbvoskY9MQHIV6AD37UvnSc2UavvJraGKP', NULL, NULL, 123456, 0, 1, 'testdd', 4, '2017-11-27'),
(163, 'test88', '0122255777', 'tesft@test.com', '$2y$10$Q5P228ugJ.UOtG1ylHDYJuNmOeQfHsNGQww7ReJTLA1CdvFzXUBDK', NULL, 'l5dbM16Z0qDoZFDTX8WuRwto9Dbxnl6pwsjtWIRGduZcrn1Pl9kcoaJMFPanJNVmTAyUtX', NULL, NULL, 123456, 0, 1, 'testdd', 4, '2017-11-27'),
(164, 'نينا', '0215454887', 'toto@gmail.com', '$2y$10$w1AWZlnOqUYUCPFl8trn1e5ovJ6b1HD3So/PpvpUNIOrGIob08EeC', NULL, 'WGnCBaNiZDcTkT96g0FydaJ3WRgdxAypOwAEFQTc3ayTv668Dsa2g5vLNHVyv0lqGMK0KE', NULL, NULL, 123456, 0, 1, 'پطرس', 5, '2017-11-27'),
(165, 'omar', '8888788728', 'maisft.teser@gkmail.com', '$2y$10$kwlBObvgyBttJEFQrHwQTuTTnBQT0QF5Lp3S1yiJxazI1mXfx8uyu', NULL, 'q4gukyY07Gl7XYSF3pq2B1Td9pAOTPjF5XphEhc5cAajtK3CLUQifZYZJDLDfYv6sErdGC', NULL, NULL, 123456, 0, 1, 'Elshabah', 4, '2017-11-27'),
(166, 'omarr', '88887818728', 'maist.teser@gkmail.com', '$2y$10$A0IV4iMP.oKrQZKt46is1uaQNJUvr2EGl3O.sVNrPjhcTH868RbLq', NULL, 'MPsIMWsRJVUZ2BBVK89LVKN8Stn3pRMtafQ5TlgjAtUQcz4HFiHN76fhMWbrAQZm2WY2qo', NULL, NULL, 123456, 0, 1, 'Elshabah', 4, '2017-11-27'),
(167, 'االلل', '0123456888', 'gfss@gmail.com', '$2y$10$hja3yH4aTeYwPlvtikyit.exBb5MAL9IGWuMo4qzVR0pGDVU59bkC', NULL, 'YMJAsBSOJgrS2VJhh5prOqHzb5KSLL7M3gHzp0b2tqh32dZ8UXNFFnHOGX3z2zc0JICm8I', NULL, NULL, NULL, 1, 1, 'االببي', 4, '2017-11-28'),
(168, 'hoda', '05555555555', 'haod@hod.com', '$2y$10$VvQNpLg1Ux8i5sskzZKL/ePQcNPHvamzRvXWx0OLWjPPqk4tB1326', NULL, 'cKtmo2OavAR7dWNDRmt0F7wMeEd4V4JMzJrka1UZ3qaqdgDVDEppbEv0oOEVPvA5ZtH9DA', NULL, NULL, NULL, 1, 1, 'hodhaod', 5, '2017-11-29'),
(169, 'mahmoud', '012345678931', 'mmmm@gmail.com', '$2y$10$05Rt9elVNO8qXd5m.svAqe3vLbw2VX7lfVMUfWixECfYc5oQnN47S', 'images/user/KOsHTu_1512471462.jpg', 'm75TloTKfqWIu3sZIs1TrEa08c50WUSNRiF4gsby3OEyDjKZhuo0SFEva216RtRhpsNg0m', NULL, NULL, NULL, 1, 1, 'albaroody', 8, '2017-12-02'),
(170, 'momo', '01255688555', 'jgff@gmail.com', '$2y$10$TKPGVONK060qyKYlceBCz.lA6iUV1IrAnpEQ3xY/WhlvABjyplf3K', NULL, 'nqSOsGCuDbubaW8Pb9tbkAiqJl10UwfgR33I0CAy6R7mawEJ0EhtlIokBedBM4zmWme2KY', NULL, NULL, NULL, 1, 1, 'fgjhy', 8, '2017-12-02'),
(171, 'mmmk', '0123455558', 'jfh@gmail.com', '$2y$10$t77JmozmRdNent7bGAWCtuCZBxzxPMndWgyguqR5wEz.mYK9UZNIy', NULL, '3Up0C91FN9XCZASDmdtXsgQDkefjILouyVbXf7id4BKcbJu55qvC0xpvrosucfo6tXmB26', NULL, NULL, 123456, 0, 1, 'nvhffh', 6, '2017-12-04'),
(172, 'dffd', '01223234234', 'mafff@gmail.com', '$2y$10$Oa7m4NX4KaRc7z8U0HuGsuNhzReOhEQr1i3LgyXoJlJD7BI0WhCN2', NULL, 'bYTgMzbxUOSdgoLjiC6nopG1JED88mnNzx8rm8jOiiPssLBuqVjBEcUE3RBpfvaOuaO0yl', NULL, NULL, 123456, 0, 1, 'fdffd', 3, '2017-12-04'),
(173, 'molo', '01236321486', 'mhhf@gmail.com', '$2y$10$ImZhiPrA5uJ1NB8FDo/jmun/fuhah.0e2YMzCnKIwgW4zmhZHVWSS', NULL, 'rwN86g8WMzNXcByJfujN7eDFxXmAaNy9AhHkl1Fn4UHHWHFl92yRQnv1A1OrmFIdPD6DVc', NULL, NULL, 123456, 0, 1, 'mafhf', 5, '2017-12-04'),
(174, 'molooo', '01236321436', 'mhhhh@gmail.com', '$2y$10$dfDhFhQreudtFPM4myiMRuXLz9vdlBYWEnoQqhiEZai3Jbwiswq0i', NULL, 'GjDsB1nuyuCS7k7B9A1nXwIxXIwUJzvUUBRKbDlnxrHWnK5rIuffkg74Ec9myFusa2enIy', NULL, NULL, 123456, 0, 1, 'mafhfff', 5, '2017-12-04'),
(175, 'eslam2', '010226663111', 'e@e.com', '$2y$10$wYW4vAeH83MBy8nPbUc/a.GoknikTd814hJYgysNUEq7Svv8QGzOy', NULL, '62dceK57Nzy0jfr4AMJ3ePZp60Lo3cFTMKR4ZI5n7VEOHqOXPMkRlNZTk6dUYSO4CpuiAk', NULL, NULL, NULL, 1, 1, 'not eslam', 8, '2017-12-04'),
(176, 'dash', '01022555318', 'auefge@eggshells.osudghou', '$2y$10$Q9rEJO41RK15W.bLJ4h5rOewovWiWMK283gHmwQxHEKGAqvMkvKGO', NULL, 'z8ZPnQRfhYCgW4ZVAv4RToeXtOic8UgUR108sVYGiCP0uXteJ9HeaG9MkRs09dJrdzZW3v', NULL, NULL, NULL, 1, 1, 'adgadg', 8, '2017-12-04'),
(177, 'rdshdrhs', '0121515533513', 'dfhdh@rag.fdg', '$2y$10$ZqkXU/KHgRDgzAnPpYWOceYOUh0quVhYADHe3dyvcpx57yxcicr22', NULL, '0hXNt8WN3f0tNVxCAl46oXazNr4hZDPthuvRzDOAGE92RrKUpS1jMnMqPLGMhzsnP9H92S', NULL, NULL, 123456, 0, 1, 'dhdfhdfhdfh', 8, '2017-12-04'),
(178, 'omar', '88885788788', 'madisft.tesr@gkail.com', '$2y$10$0VxSE1drgisAOBu9/yMPf.v4mmJq0sIWu1gIWKXOp9LHYras7qrf.', NULL, 'ht3bL9gkUS5ms1stKZhtfpseW2WtllYFh13UFkgVyyqsQv4KUS7Y4hch5MMNfhE32wO13P', NULL, NULL, 123456, 0, 1, 'Elshabah', 4, '2017-12-05'),
(179, 'yyyyyu', '01123523361', 'h@k.com', '$2y$10$jLGRCMe//ysFzPC3ZWDWD.qXsuUef95vN7qBh5KziFdQOS2aeXxjC', NULL, 'qYxAxDbMeVND5cRIWDADz5dDpB4MaTnSKPMDCRqWMDCod9rskjDkCxx3fsmyQoUuDnVGvy', NULL, NULL, NULL, 1, 1, 'iiii', 5, '2017-12-09'),
(180, 'Abdo', '01123523366', 'h@hh.com', '$2y$10$rpguEsDSgdRu9az0PBhiteLRt./FSqhPPpav/5nqt7grqWf4FJlBa', 'images/user/CaJuIa_1512812108.jpg', '2teq5apZBJXtHrx4kIacxT057WAXm5hLDkscZ9GHtF0KKC1EJmL9TvBa3DaF7RcK3dBcaT', NULL, '01123523363', NULL, 1, 1, 'Mo3gza', 7, '2017-12-09'),
(181, 'ghada', '02165554', 'ghada@gmail.com', '$2y$10$H6CXUz5x3I1YXgmp0zRTq.NhPkOkP3akHXrgrnqpkIsdKLVY6pVMy', NULL, 'fqpDFaNJHCvusCiVdsfsyPNDfzpbdybGwAjpMKd6YcQ8sOD7Qi4YL4CzP0cSqJ25u5oD5A', NULL, NULL, 123456, 0, 1, 'jhbhb', 1, '2017-12-12'),
(182, 'omar', '888857887888', 'madisftd.tesr@gkail.com', '$2y$10$TY2Wa6/NzDWvQaeFXSXA1.JyH1Xv7K3vSvSF7ujy8VqZx6HSypC8u', NULL, '8XhrHnUn3CyKaS2pm146DbXtg9HJ9N83OLzJPG8K813oJjXVYTOuun2QHmdIu5L41D8AGm', NULL, NULL, 123456, 0, 1, 'Elshabah', 4, '2017-12-13'),
(183, 'hjfhjfjhfjfhf', '0245455454', 'gkgkgkgk@lfjfj.jnfuf', '$2y$10$9xP41Wm7G1upA6hjsFlyQ.SR/G3CpHhu08Xmv4F0.7HRDLxakNCwO', NULL, 'HO5f2TVe0bv3vnsgxkW1OZt0xAF60F4Of5n0llmjPO9qfYatgYWjWp2Gnk9u2cLt7RMKUM', NULL, NULL, 123456, 0, 1, 'fmjjhfjfjf', 8, '2017-12-13'),
(184, 'gkggjg', '012546987', 'feihiuofhef@ljidf.vviko', '$2y$10$BslJNwF6AJguBIO4KhM3BOXRnPv4Qgncyh6C8m7tFqseY9W0KI1hK', NULL, '0u9BX7i9CiQwhbNebmVcK4ief7FLusCWPnaSj2clh2xvbw3tk38XvbaIricQ7PS8h7MrcM', NULL, NULL, 123456, 0, 1, 'vdfffdffd', 4, '2017-12-13'),
(185, 'لللب', '88445544', 'dfgg@fdd.com', '$2y$10$zHB1INO7x0MXgR3CmcXaS.urUB7Vhv1r1kxcRWkbzTe.FygSU1dXS', NULL, 'jZxuhznbHvlyTSRkgSGGTFNJ59UFFSLjh0m4oXyRurhqxzCrFeAbec6uksxwvCUkrTbIpx', NULL, NULL, 123456, 0, 1, 'للللا', 7, '2017-12-13'),
(186, 'ffdgh', '055545655', 'ever@tdsc.om', '$2y$10$y64YegMVriCjOEjaDtps2ujJarciJfVQ.bZu13Nu.mhi26iqYjNnW', NULL, 'kG8pYZmL2mjSelJQ1EmIFgZSi2BvzYKVATtHVPz94l18YANrahasBxMrf1HntzMrd32pSd', NULL, NULL, 123456, 0, 1, 'fvh', 4, '2017-12-13'),
(187, 'Gghhf', '018555512', 'nvg@gmail.com', '$2y$10$VVP63omhy4qgCc/H56qOQeZ06uVgJXQichOdJ2/gjf4zenF8GoNSS', NULL, 'CxBnYwyDxRuVPaqVbwmonf4oaEQDtcMTtu5c1DYimJ0ICQz5BVjNl9jdu0osYvukjiqVTI', NULL, NULL, 123456, 0, 1, 'ghfh', 12, '2017-12-13'),
(188, 'ghhff', '0188088865', 'Hgh@gmail.com', '$2y$10$YMK48SEKwQYlytJ7.G2nUuMGx3W0KuuNyWp/j24qSu6pu.aUm.Y1a', NULL, '3XM8HjIYzsVWFfHleoaiMvF1r2XzFwqUOUHdg3ob9530QnCRYuPsJar5ewY68MYQEn23p8', NULL, NULL, 123456, 0, 1, 'cvhgd', 7, '2017-12-13'),
(189, 'gjdf', '0125455385', 'MA@gmail.com', '$2y$10$cqpNgNkb/9NT8z2KCQuZh.CCgB6WtCV23/9ZH2dF1zU.CCnOhG.Ki', NULL, 'FNKNGH7sQNlckv1NBD7XAHKhUvLDIGAuFKbFYMU4NlF5ohbaGtDCI26LmHebpN6kvT1BfW', NULL, NULL, 123456, 0, 1, 'ghdf', 7, '2017-12-13'),
(190, 'gffy', '012545545', 'gfffd@gmail.com', '$2y$10$8iRcJdigtjvzE0gsyvGlAuvJFQVRfsbzcK6d6I3j90xmBpBogcOTi', NULL, 'hHu7jhbQ6nsNJNmh1sOFTGhgQtzFELLRSWw3rkSTiMHclMgbuithfmkcYbnCUDKGIQAXuN', NULL, NULL, 123456, 0, 1, 'ghgrt', 8, '2017-12-13'),
(191, 'ghada', '01128859372', 'ghjk@yahoo.com', '$2y$10$iOeHR6DNSnSOtc/9XL91hub1wFSlThWhJa7721PFc/xNvejZ/UpUq', NULL, 'mrfbpNU61Yrc3lKcVnRTYJGtjiPaxiOgKuxdb8AZcIgjFe0wB9EDqfD6orYkr67T1IWByj', NULL, NULL, 123456, 0, 1, 'jhbb', 2, '2017-12-14'),
(192, 'nouran', '01128859518', 'im3366@gmail.com', '$2y$10$JK92tmuETdHC9uQ/tTsVmOfNj7O1FChuLWqc/NrmrEv9tPH4tiAb.', NULL, '67czo458dPCnoeMij02qj248vRfWGzkhED5N00xxlCBu76P8kq99Tgc1qlK04DthL4WjCO', NULL, NULL, 123456, 0, 1, 'omar', 1, '2017-12-14'),
(193, 'nada', '01204358309', 'im336678@gmail.com', '$2y$10$OPD1MZnTIuQbjiMKvMCUfupdXJiJCE.Cfoi.Xx4hQyY0GvaMIsrRe', NULL, 'i8vTzPlUvVwUzXxgAoH9KQHuw54YVC4rMKvQ5j3zg18LtzUult2QHoinHdUn1W5CgCMFxE', NULL, NULL, 123456, 0, 1, 'gh', 1, '2017-12-15'),
(194, 'noran', '01273943845', 'inouran132@gmail.com', '$2y$10$8YYIfeXN6psl7bD5Dx8MxOiCx1SXVMZqlGK.SPon50pmXDWh68T.u', NULL, 'oT2uc7cMSubUh4kbjyEXsjQiVr7Rsji07fQBIF6WIlH3XQkYNT9wG36altX8Q25oaKs9Yy', NULL, NULL, 123456, 0, 1, 'nouran', 1, '2017-12-15'),
(195, 'omar', '882857887888', 'adisftd.tesr@gkail.com', '$2y$10$9Cut6c.EzL35Kwl.95WLDu/bmlL9HkUWLXHM18zRBjmP8wpeZdLHK', NULL, 'iTpDQCkVOo5UJJxYABUgnYvzkxZXMIV3h6O97Y9a10CrZOvDPcyuYzrWmJfYWjGA8H55kN', NULL, NULL, 123456, 0, 1, 'Elshabah', 4, '2017-12-16'),
(196, 'mahmoud', '0123456789000', 'mnb@gmail.com', '$2y$10$9xm.g.kQqaDng6unDRg0Netv13LcwLzaDk3qC3OejXWvBy4l5tnaG', NULL, 'BKl8W7qW74rbBmDbpKgoi1qSxgn308VUIFlKvgDw6Y02H2Rla54eHJ8ZLbrtJId1GKPpc8', NULL, NULL, NULL, 1, 1, 'albaroody', 5, '2017-12-24'),
(197, 'amany', '01065555742', 'nonaa.mohamed1987@gmail.com', '$2y$10$6A5ouhmP6NgJ2/Q8smjozOTkmxkDpENpcMZU27hmLFnDw7UAIgV36', NULL, 'jVALseHY0J0dvkopY7sYJtB9WzRQYGo3bl7s4PGEF131b8IAubP1j7s608nrqLpymkIdDo', NULL, NULL, NULL, 1, 1, 'nona', 11, '2017-12-27'),
(198, 'mahmoud', '012369074', 'yy@gmail.com', '$2y$10$NTJ4dLScVq9WU1R42.4u4O0zXbn/oKKSxGTJ1SLN65G32CrBjnrV.', NULL, 'mHuyjT0t5DRIskfoYGe6eUHzpOyF5Zcgwed0qEherL9pSgW8SRHaTDHtPR3AcnWLkvLHjH', NULL, NULL, 123456, 0, 1, 'albaroody', 5, '2018-01-02'),
(199, 'محمود', '01231231230', 'fg@gmail.com', '$2y$10$ZG/kTsOXFEOC8Pcb3.QqSOs1iuD3k.cu/v29H7V5f6BjJfaEOZwR.', NULL, 'AKfUB5qX8uBHzcwT1K1T5iFcv4P4vEUeeX8sQIcoXRyhwGPbWlUb4YCr7bYqDFte4fpPMC', NULL, NULL, NULL, 1, 1, 'البارودي', 4, '2018-01-03');
INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `photo`, `apiToken`, `tmpToken`, `tmpPhone`, `verificationCode`, `is_verified`, `is_active`, `ghostName`, `ghost_images_id`, `created_at`) VALUES
(200, 'ععع', '0024987654', 'gy@gmail.com', '$2y$10$zfsphir.bYB06Ryqh0wW8OMVY9u4rt1GyVZCaOuqS6bzLXNtCB3za', NULL, 'j3wTubLJUaxMpYCTeZFu66cwdWIrfz3qdRt6aKD21YOyPoMywt7OPGs9g2agXt3S91CTiB', NULL, NULL, 123456, 0, 1, 'للل', 13, '2018-01-03'),
(201, 'gygy', '0123456321', 'gfff@gmail.com', '$2y$10$7ZYMYd9xG/d5SyYCqGqPhOT7L8mYu3FrpIN1wC7LFwB49qvUrJiUC', NULL, 'g0bj7ChUiNKLzCjnzVwqfJvdIjU2cMA8iVpm8VCkaltGeOez1w4xhIbKE1K9SshfOK2LAa', NULL, NULL, NULL, 1, 1, 'hghg', 1, '2018-01-03'),
(202, 'gdgh', '01472583600', 'rd@gmail.com', '$2y$10$0gXFUQKvu7.HzZwEFcGqH.A7O63cGNW72NYGIqKSRbA7AQrx5k/ze', NULL, 'Sp9mlvBgH1pJzHQGdgA6IB4m9vLY6v7ApYcC5G4t15DUmFHHeQMtdVI4ptWxjFv40eXTof', NULL, NULL, 123456, 0, 1, 'hgf', 7, '2018-01-03'),
(203, '5fffd', '55004412', 'hff@gmail.com', '$2y$10$VbBNf7QiLxIQ7vmx5I9E1efiUHj0rzJLHKlWyBJz4B3AvF8XOVG8i', NULL, 'hQZe5AK6tPQQ2VsWnzizIoF2J2egmk7Yf5tDUfhUKfT43h0akdpXVf0F34awQtuJw2vYzK', NULL, NULL, 123456, 0, 1, 'fffff', 2, '2018-01-03'),
(204, 'y ff', '0759258827', 'yfdf@gmail.com', '$2y$10$HXDa4AVlGkuPODVbdqlgnuAmsFbGU1wzHJTijIjfPTnQhm6Wlq/MC', NULL, 'Cp8wQC0ZptxYhkoHOwa2k76zqSOwoIwuXg2QkeHILy51DlNJaDVPKxvnZXdDSGdgnUdn1i', NULL, NULL, 123456, 0, 1, 'vfcvg', 1, '2018-01-03'),
(205, 'ggff', '028555771', 'vfd@gmail.com', '$2y$10$7tvhNC2X3IO9pT2q2bCB6eu6QsgTlxr8UB9zVzbiBsa.8knPIlftq', NULL, 'P3RPcNTW1GsHbum2w5OHjuWo4Cad8RhfkngdGj9yuZwgU8G5KyKPqqVw0Edppz9E8kVQ72', NULL, NULL, 123456, 0, 1, 'fdddd', 11, '2018-01-03'),
(206, 'hshsh', '01884577755', 'gddfd@gmail.com', '$2y$10$BJ2wUa3kE1IgmGJN/poi9eCLAtH8nzmg5Cx.DhxxGpo.f.TWLB0Jq', NULL, 'CbsWOHXYuQLZ0KhUVcUBq9xsgvgYvHVaLljkEGYGtm3B6kA6T39HtfrK90HfcsYcyUQyvy', NULL, NULL, 123456, 0, 1, 'hahhd', 11, '2018-01-03'),
(207, 'fghff', '015898852', 'hgffhf@gmail.com', '$2y$10$ermiHm52kv6kjif93V5jWuyMz5LIZi.MrOaGBcRxVrL/3VTNJcEEm', NULL, 'gFBbxqjvIFO7khtNgokKDTDxJw7f1oQooLYJuBkHvE9aosaO1WB1EU3AO33sChJSmPkJaD', NULL, NULL, 123456, 0, 1, 'fhhffti', 5, '2018-01-03'),
(208, 'Some one', '01022666333', 'some@some.com', '$2y$10$nv2F74hxiiQmYBPWVgL/OuIgk9Cughej2kLaKungRmQpbdqIfFlcu', 'images/user/phpjXKDcH.jpeg', 'glbxANZEZ1WHZn1qdpPS6XiddaGmaiJtYSaeFyjkyWHCI9oH4ZUwBFBRwUQcrxYlzJW8Hs', NULL, NULL, NULL, 1, 1, 'some one ghost', 7, '2018-01-03'),
(209, 'Abdo sa', '011235233611', 's@s.com', '$2y$10$1hLbHTHsUo8jwHE82q/s9OjROWzNMlZOrFE/lLVrA3iOtXllMiexy', NULL, 'QxlyzE9BEAMu2DGnNq8VO1puAetadZQDrUdOJXNkgN2TmCTJQCDtwAEKBb5PTJu9UIvcN3', NULL, NULL, NULL, 1, 1, 'mo', 6, '2018-01-21'),
(210, 'some one for test', '01022666222', 'some@some.some', '$2y$10$JojRQtyb./o3QVTDrg9ltuPu32CjfgiqTDc9CTHhph/pANiRaHbam', NULL, '0iREEd7jXvJ1NRReroIXpfLjvVcL1JzRbjPAbKjbJEfiwIeGBC924q9oO06wcjsHLFbtuK', NULL, NULL, NULL, 1, 1, 'some test name', 7, '2018-01-29'),
(211, 'boody', '01278130885', 'memeshaltoot@yahoo.com', '$2y$10$fSrviwFSDq1m4R93WOR/ZugHgj1RriN.Dbm9ls7CxhpCYcbAjRkWC', 'images/user/phpOmfMBW.jpeg', 'aQgtKV9gFlj9Nm6WOg567MwL3Debm6dNMWDvUIblc6Q5x9k8QOY8Dbv0hlRKe9yelaBtjz', NULL, NULL, NULL, 1, 1, 'rglashaa', 8, '2018-02-06'),
(212, 'براري', '009713020902', 'brary91@gmail.com', '$2y$10$2oazWohIA.rtpZ.zlOmQXujXEkatrj00TojbAJnjH0LHtpcovDSdC', NULL, 'Gq063lURf6TaLpovPXyXHaQYW1N3zJrOOFKaZHy2PkYwG9Kg1Dy3eJNv4e1ggPDDhNhkJ6', NULL, NULL, NULL, 1, 1, 'شبح', 11, '2018-02-08'),
(213, 'kero', '01020343274', 'kero@gmail.com', '$2y$10$BKsFhgX.vi5zxKyYwiqzleVT3GnGR4VcxPG3B7Lp.B34hx8jwKgpG', NULL, 'qoRVRv6hdqoc1y8VYBkYwxUlSJTPJrhLdERQ7HPNThtJ91pGfkD56VemoWNbiMINMFbJqz', NULL, NULL, NULL, 1, 1, 'kero', 7, '2018-02-11'),
(214, 'gfg', '010000000000', 'fd@fg.com', '$2y$10$4ELwxx87fX2GZAocAdBO7.U3.HoqRzdn1kz8fH87PjLXoMXxULvvK', NULL, 'fSOmyoybZ3I832mFeC6qhulDbCQS9Oz2g6OE70H0NiLI6nLPOYRbkezuTiXh44Pbw9AJQz', NULL, NULL, NULL, 1, 1, 'ffx@gdd.com', 10, '2018-02-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`users_id`,`target_users_id`,`type`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_users_comments` (`users_id`),
  ADD KEY `FK_posts_comments` (`posts_id`);

--
-- Indexes for table `comments_likes`
--
ALTER TABLE `comments_likes`
  ADD PRIMARY KEY (`users_id`,`comments_id`),
  ADD KEY `FK_comments_likes` (`comments_id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_users_complains` (`users_id`);

--
-- Indexes for table `contact_phones`
--
ALTER TABLE `contact_phones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ghost_images`
--
ALTER TABLE `ghost_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_users_notifications` (`users_id`),
  ADD KEY `FK_posts_notifications` (`posts_id`);

--
-- Indexes for table `notify_users`
--
ALTER TABLE `notify_users`
  ADD PRIMARY KEY (`users_id`,`notifications_id`),
  ADD KEY `FK_notifications` (`notifications_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_users_posts` (`users_id`),
  ADD KEY `FK_categories_posts` (`categories_id`);

--
-- Indexes for table `posts_likes`
--
ALTER TABLE `posts_likes`
  ADD PRIMARY KEY (`users_id`,`posts_id`),
  ADD KEY `FK_posts_likes` (`posts_id`);

--
-- Indexes for table `posts_shares`
--
ALTER TABLE `posts_shares`
  ADD PRIMARY KEY (`users_id`,`posts_id`),
  ADD KEY `FK_posts_shares` (`posts_id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `super_admin_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `apitoken` (`apiToken`),
  ADD KEY `FK_ghost_images` (`ghost_images_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `contact_phones`
--
ALTER TABLE `contact_phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ghost_images`
--
ALTER TABLE `ghost_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `actions`
--
ALTER TABLE `actions`
  ADD CONSTRAINT `FK_users_actions` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_users_targets` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_posts_comments` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_users_comments` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `comments_likes`
--
ALTER TABLE `comments_likes`
  ADD CONSTRAINT `FK_comments_likes` FOREIGN KEY (`comments_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_users_comments_likes` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `complains`
--
ALTER TABLE `complains`
  ADD CONSTRAINT `FK_users_complains` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `FK_posts_notifications` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_users_notifications` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `notify_users`
--
ALTER TABLE `notify_users`
  ADD CONSTRAINT `FK_notifications` FOREIGN KEY (`notifications_id`) REFERENCES `notifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_users_notify` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_categories_posts` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_users_posts` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `posts_likes`
--
ALTER TABLE `posts_likes`
  ADD CONSTRAINT `FK_posts_likes` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_users_posts_likes` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `posts_shares`
--
ALTER TABLE `posts_shares`
  ADD CONSTRAINT `FK_posts_shares` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_users_posts_shares` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_ghost_images` FOREIGN KEY (`ghost_images_id`) REFERENCES `ghost_images` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
