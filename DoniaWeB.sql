-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2019 at 07:05 PM
-- Server version: 10.1.41-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doniinbm_seo`
--

-- --------------------------------------------------------

--
-- Table structure for table `facebook_accounts`
--

CREATE TABLE `facebook_accounts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `pid` text,
  `type` text,
  `fullname` text,
  `url` text,
  `official` int(1) DEFAULT NULL,
  `login_type` text,
  `avatar` text,
  `access_token` text,
  `status` int(1) DEFAULT '1',
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `facebook_livestreams`
--

CREATE TABLE `facebook_livestreams` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `group` text,
  `type` text,
  `data` longtext,
  `time_post` datetime DEFAULT NULL,
  `result` text,
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `facebook_posts`
--

CREATE TABLE `facebook_posts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `category` text,
  `group` text,
  `type` text,
  `data` longtext,
  `time_post` datetime DEFAULT NULL,
  `delay` int(11) DEFAULT NULL,
  `time_delete` int(11) DEFAULT NULL,
  `result` text,
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_caption`
--

CREATE TABLE `general_caption` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `content` longtext,
  `status` int(1) DEFAULT '1',
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_coupons`
--

CREATE TABLE `general_coupons` (
  `id` int(11) NOT NULL,
  `ids` text,
  `name` text,
  `code` text,
  `type` int(1) DEFAULT '1',
  `price` float DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `packages` text,
  `status` int(1) DEFAULT '1',
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_custom_page`
--

CREATE TABLE `general_custom_page` (
  `id` int(11) NOT NULL,
  `ids` text,
  `pid` int(1) DEFAULT '1',
  `position` int(1) DEFAULT '0',
  `name` text,
  `slug` text,
  `image` text,
  `description` longtext,
  `content` longtext,
  `status` int(1) DEFAULT '1',
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_custom_page`
--

INSERT INTO `general_custom_page` (`id`, `ids`, `pid`, `position`, `name`, `slug`, `image`, `description`, `content`, `status`, `changed`, `created`) VALUES
(1, 'a982f413201e198ae289e9e6e677d2c4', 1, NULL, 'Terms and Policies', 'terms_and_policies', NULL, NULL, '<h3>End-User License Agreement</h3><p>\r\nPlease read this agreement carefully before installing or using this product.\r\n</p><br><p>\r\nIf you agree to all of the terms of this End-User License Agreement, by checking the box or clicking the button to confirm your acceptance when you first install the web application, you are agreeing to all the terms of this agreement. Also, By downloading, installing, using, or copying this web application, you accept and agree to be bound by the terms of this End-User License Agreement, you are agreeing to all the terms of this agreement. If you do not agree to all of these terms, do not check the box or click the button and/or do not use, copy or install the web application, and uninstall the web application from all your server that you own or control. \r\n</p>\r\n<br>\r\n<p><strong>Note:</strong> With this script, We are using the official Social Media API (Facebook, Twitter etc, except Instagram) which is available on Developer Center. That is a reason why this script depends on Social Media API(Facebook, Instagram, Twitter etc). Therefore, We are not responsible if they made too many critical changes in their side. We  also don\'t guarantee that the compatibility of the script with Socia Media API will be forever. Although we always try to update the lastest version of script as soon as possible. <strong>We don\'t provide any refund for all problems which are originated from Social Media API (Facebook, Instagram, Twitter etc).</strong></p>\r\n\r\n\r\n<br><p>\r\nIf you do not accept the terms of this agreement and you purchased a product containing the web application from an authorized retailer, you may be eligible to return the product for a refund, subject to the terms and conditions of the applicable return policy.</p>', 0, '2018-10-04 10:33:47', '2018-08-16 08:22:16'),
(80908, '6c43cfbabe6165b66ef9fef4c210973c', 1, NULL, 'Privacy Policy', 'privacy_policy', NULL, NULL, '<h3>End-User License Agreement</h3><p>\r\nPlease read this agreement carefully before installing or using this product.\r\n</p><br><p>\r\nIf you agree to all of the terms of this End-User License Agreement, by checking the box or clicking the button to confirm your acceptance when you first install the web application, you are agreeing to all the terms of this agreement. Also, By downloading, installing, using, or copying this web application, you accept and agree to be bound by the terms of this End-User License Agreement, you are agreeing to all the terms of this agreement. If you do not agree to all of these terms, do not check the box or click the button and/or do not use, copy or install the web application, and uninstall the web application from all your server that you own or control. \r\n</p>\r\n<br>\r\n<p><strong>Note:</strong> With this script, We are using the official Social Media API (Facebook, Twitter etc, except Instagram) which is available on Developer Center. That is a reason why this script depends on Social Media API(Facebook, Instagram, Twitter etc). Therefore, We are not responsible if they made too many critical changes in their side. We  also don\'t guarantee that the compatibility of the script with Socia Media API will be forever. Although we always try to update the lastest version of script as soon as possible. <strong>We don\'t provide any refund for all problems which are originated from Social Media API (Facebook, Instagram, Twitter etc).</strong></p>\r\n\r\n\r\n<br><p>\r\nIf you do not accept the terms of this agreement and you purchased a product containing the web application from an authorized retailer, you may be eligible to return the product for a refund, subject to the terms and conditions of the applicable return policy.</p>', 0, '2018-10-04 10:18:21', '2018-10-04 10:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `general_file_manager`
--

CREATE TABLE `general_file_manager` (
  `id` int(11) NOT NULL,
  `ids` text CHARACTER SET utf8mb4,
  `uid` int(11) DEFAULT NULL,
  `file_name` text CHARACTER SET utf8mb4,
  `image_type` text CHARACTER SET utf8mb4,
  `file_ext` text CHARACTER SET utf8mb4,
  `file_size` text CHARACTER SET utf8mb4,
  `is_image` text CHARACTER SET utf8mb4,
  `image_width` int(11) DEFAULT NULL,
  `image_height` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_file_manager`
--

INSERT INTO `general_file_manager` (`id`, `ids`, `uid`, `file_name`, `image_type`, `file_ext`, `file_size`, `is_image`, `image_width`, `image_height`, `created`) VALUES
(1, '4559baed3b5d9002d566b22d86b8b226', 1, '874ba5ce86fb81872575172f1e04485d.png', 'image/png', 'png', '7.48', '1', 391, 83, '2019-07-08 03:00:53'),
(2, '7ea45df872bfad15d5dd7c70b3c5f05c', 1, '86e368d28676f85757162eba6dd4fd98.png', 'image/png', 'png', '7.48', '1', 391, 83, '2019-07-08 03:01:37'),
(3, 'a691ccddae283cc15bf812fff43b857e', 1, '275eba821467d6b4a71c5828a770eea3.png', 'image/png', 'png', '35.08', '1', 1024, 1024, '2019-07-08 03:01:57'),
(5, '906edba9b2307c669843ca1e8c6fd865', 1, '4590d06d9499c0ad4f020430a9eb51ef.png', 'image/png', 'png', '7.48', '1', 391, 83, '2019-07-18 07:32:56'),
(7, '4557c37d738c8c2d56407e8837ebe2d6', 1, '9b8bc822b59490098f5713cadf752acc.jpg', 'image/jpeg', 'jpg', '157.78', '1', 1200, 1200, '2019-10-23 06:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `general_groups`
--

CREATE TABLE `general_groups` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `name` text,
  `data` longtext,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_lang`
--

CREATE TABLE `general_lang` (
  `id` int(11) NOT NULL,
  `ids` text NOT NULL,
  `code` text NOT NULL,
  `slug` text NOT NULL,
  `text` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_lang_list`
--

CREATE TABLE `general_lang_list` (
  `id` int(11) NOT NULL,
  `ids` text,
  `name` text,
  `code` text,
  `icon` text,
  `is_default` int(1) DEFAULT '0',
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_options`
--

CREATE TABLE `general_options` (
  `id` int(11) NOT NULL,
  `name` text,
  `value` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_options`
--

INSERT INTO `general_options` (`id`, `name`, `value`) VALUES
(1, 'enable_https', '0'),
(2, 'linkedin_app_id', ''),
(3, 'linkedin_app_secret', ''),
(4, 'instagram_verification_code_via', '0'),
(5, 'pinterest_app_id', NULL),
(6, 'pinterest_app_secret', NULL),
(7, 'twitter_app_id', ''),
(8, 'twitter_app_secret', ''),
(9, 'facebook_app_id', ''),
(10, 'facebook_app_secret', ''),
(11, 'website_title', 'doniaweb.com  - A Premium Scripts and themes'),
(12, 'website_description', 'save time, do more, manage multiple social networks at one place'),
(13, 'website_keyword', 'social marketing tool, social planner, automation, social schedule'),
(14, 'website_favicon', 'https://demo.stackposts.com/assets/img/favicon.png'),
(15, 'google_captcha_enable', '0'),
(16, 'website_logo_white', 'https://doniaweb.com/uploads/monthly_2019_08/1703232168_20995724_567463307_1079799247_IMG__.png.051faa8b8e1a574b3e2b3a54fd6237f0(1).png.1638becc5-d8b27d9e5717bc71894(1).png.bcab49b888fc0d439b08e29e8dce49ea.png.ecb277145bb2743ae102cecd08b96cd4.png'),
(17, 'website_logo_black', 'https://doniaweb.com/uploads/monthly_2019_08/1703232168_20995724_567463307_1079799247_IMG__.png.051faa8b8e1a574b3e2b3a54fd6237f0(1).png.1638becc5-d8b27d9e5717bc71894(1).png.bcab49b888fc0d439b08e29e8dce49ea.png.ecb277145bb2743ae102cecd08b96cd4.png'),
(18, 'singup_enable', '1'),
(19, 'payment_symbol', '$'),
(20, 'payment_currency', 'USD'),
(21, 'social_page_facebook', ''),
(22, 'social_page_google', ''),
(23, 'social_page_twitter', ''),
(24, 'social_page_instagram', ''),
(25, 'social_page_pinterest', ''),
(26, 'embed_javascript', ''),
(27, 'facebook_oauth_enable', '0'),
(28, 'google_oauth_enable', '0'),
(29, 'twitter_oauth_enable', '0'),
(30, 'aviary_api_key', ''),
(31, 'google_drive_api_key', ''),
(32, 'google_drive_client_id', ''),
(33, 'full_menu', '1'),
(34, 'dark_menu', '0'),
(35, 'show_subscription', '1'),
(36, 'website_logo_mark', 'https://doniaweb.com/uploads/monthly_2019_08/1703232168_20995724_567463307_1079799247_IMG__.png.051faa8b8e1a574b3e2b3a54fd6237f0(1).png.1638becc5-d8b27d9e5717bc71894(1).png.bcab49b888fc0d439b08e29e8dce49ea.png.ecb277145bb2743ae102cecd08b96cd4.png'),
(37, 'sidebar_icons_color', '1'),
(38, 'dropbox_api_key', ''),
(39, 'payment_environment', '1'),
(40, 'stripe_enable', '0'),
(41, 'stripe_publishable_key', ''),
(42, 'stripe_secret_key', ''),
(43, 'paypal_client_id', 'AeTF7HOmeSa2gCMnwcFOWVeB9unKBUuiOatY7IgpAZHdKTA8qhnQQeggGBDrM9ZuW-RrrQosBBaW7pu8'),
(44, 'paypal_client_secret', 'ENDE3gSTqWxMRBaVOw0t8X4PIczuo5L8ieeTcmS18mZcs0V3Bp_KjtpiFfkF4GzF8Xkybv-COL70cfKc'),
(45, 'paypal_enable', '1'),
(46, 'pagseguro_email', ''),
(47, 'pagseguro_token', ''),
(48, 'pagseguro_enable', '0'),
(49, 'paystack_enable', '0'),
(50, 'paystack_public_key', ''),
(51, 'paystack_secret_key', ''),
(52, 'theme', 'light'),
(53, 'email_from', 'no-reply@cokpin.com'),
(54, 'email_name', 'CokPin'),
(55, 'email_protocol_type', 'mail'),
(56, 'email_smtp_server', ''),
(57, 'email_smtp_port', ''),
(58, 'email_smtp_encryption', ''),
(59, 'email_smtp_username', ''),
(60, 'email_smtp_password', ''),
(61, 'email_welcome_enable', '1'),
(62, 'email_payment_enable', '1'),
(63, 'email_activation_subject', 'Hello {full_name}! Activation your account'),
(64, 'email_activation_content', 'Welcome to {website_name}! \r\n\r\nHello {full_name},  \r\n\r\nThank you for joining! We\'re glad to have you as community member, and we\'re stocked for you to start exploring our service.  \r\n All you need to do is activate your account: \r\n  {activation_link} \r\n\r\nThanks and Best Regards!'),
(65, 'email_new_customers_subject', 'Hi {full_name}! Getting Started with Our Service'),
(66, 'email_new_customers_content', 'Hello {full_name}! \r\n\r\nCongratulations! \r\nYou have successfully signed up for our service. \r\nYou have got a trial package, starting today. \r\nWe hope you enjoy this package! We love to hear from you, \r\n\r\nThanks and Best Regards!'),
(67, 'email_forgot_password_subject', 'Hi {full_name}! Password Reset'),
(68, 'email_forgot_password_content', 'Hi {full_name}! \r\n\r\nSomebody (hopefully you) requested a new password for your account. \r\n\r\nNo changes have been made to your account yet. \r\nYou can reset your password by click this link: \r\n{recovery_password_link}. \r\n\r\nIf you did not request a password reset, no further action is required. \r\n\r\nThanks and Best Regards!'),
(69, 'email_renewal_reminders_subject', 'Hi {full_name}, Here\'s a little Reminder your Membership is expiring soon...'),
(70, 'email_renewal_reminders_content', 'Dear {full_name}, \r\n\r\nYour membership with your current package will expire in {days_left} days. \r\nWe hope that you will take the time to renew your membership and remain part of our community. It couldn’t be easier - just click here to renew: {website_link} \r\n\r\nThanks and Best Regards!'),
(71, 'email_payment_subject', 'Hi {full_name}, Thank you for your payment'),
(72, 'email_payment_content', 'Hi {full_name}, \r\n\r\nYou just completed the payment successfully on our service. \r\nThank you for being awesome, we hope you enjoy your package. \r\n\r\nThanks and Best Regards!'),
(73, 'facebook_login_offical', '0'),
(74, 'facebook_login_username_password', '1'),
(75, 'fb_min_post_interval_seconds', '50'),
(76, 'fb_post_auto_pause_after_post', '50'),
(77, 'fb_post_auto_resume_after_minute_hours', '50'),
(78, 'fb_post_repeat_frequency', '50'),
(79, 'igac_save_log', '0'),
(80, 'igac_enable_like', '1'),
(81, 'igac_enable_comment', '1'),
(82, 'igac_enable_follow', '1'),
(83, 'igac_enable_unfollow', '1'),
(84, 'igac_enable_direct_message', '1'),
(85, 'igac_target_tag', '1'),
(86, 'igac_target_location', '1'),
(87, 'igac_target_follower', 'all'),
(88, 'igac_target_following', 'all'),
(89, 'igac_target_liker', 'all'),
(90, 'igac_target_commenter', ''),
(91, 'igac_speed_level', 'slow'),
(92, 'igac_speed_slow_like', '10'),
(93, 'igac_speed_slow_comment', '3'),
(94, 'igac_speed_slow_follow', '3'),
(95, 'igac_speed_slow_unfollow', '3'),
(96, 'igac_speed_slow_direct_message', '1'),
(97, 'igac_speed_slow_repost_media', '1'),
(98, 'igac_speed_normal_like', '20'),
(99, 'igac_speed_normal_comment', '4'),
(100, 'igac_speed_normal_follow', '5'),
(101, 'igac_speed_normal_unfollow', '5'),
(102, 'igac_speed_normal_direct_message', '2'),
(103, 'igac_speed_normal_repost_media', '2'),
(104, 'igac_speed_fast_like', '40'),
(105, 'igac_speed_fast_comment', '5'),
(106, 'igac_speed_fast_follow', '7'),
(107, 'igac_speed_fast_unfollow', '7'),
(108, 'igac_speed_fast_direct_message', '3'),
(109, 'igac_speed_fast_repost_media', '3'),
(110, 'igac_enable_filter', '1'),
(111, 'igac_repost_media', '{{caption}}\r\n\r\n#cokpin.com'),
(112, 'igac_comments', 'Made my day\r\nTotally rocks!\r\nVery nice\r\nVery sweet :)\r\nThis is great\r\nSo cool\r\nFascinating one\r\nNeat-o!\r\nGorgeous! Love it!\r\nThe cutest\r\nBreathtaking one\r\nThis is awesome :)\r\nOutstanding one!\r\nWhoopee!\r\nMy Goodness\r\nThis is awesome!'),
(113, 'igac_direct_messages', 'Hello {{username}}, How are you?\r\nHi {{username}}, How are you today?\r\nHi {{username}}, Hey, how\'s it going?\r\nHello {{username}}, What\'s up?'),
(114, 'igac_tags', 'author\r\nvacation\r\ninstaart\r\nnature\r\ntasty\r\nmasterpiece\r\ncreative\r\nbestoftheday\r\npretty\r\nsiblings\r\nclouds\r\npage\r\nthrowbackthursday\r\ncuddle\r\ninstafollow\r\nlovely\r\nshoutout\r\ncute\r\ndraw'),
(115, 'igac_tags_blacklist', 'sex\r\nxxx\r\nfuckyou\r\nvideoxxx\r\nnude'),
(116, 'igac_keywords_blacklist', 'sex\r\nfuck now\r\nnude'),
(117, 'instagram_verify_code_enable', '1'),
(118, 'instaram_ffmpeg_path', ''),
(119, 'instaram_ffprobe_path', ''),
(120, 'enable_advance_option', '1'),
(121, 'youtube_api_key', 'AIzaSyAfLwI6SX3oF0jKaVOgdvJ6Bb3ejtRTL4k'),
(122, 'youtube_client_id', '166317419533-1o20pn1r9s8h5d9k9d89m25vlq3460re.apps.googleusercontent.com'),
(123, 'youtube_client_secret', 'Nw4GJeHf9iA7dw7xSebxGm8Q'),
(124, 'singup_verify_email_enable', '1'),
(125, 'google_captcha_client_id', ''),
(126, 'google_captcha_client_secret', ''),
(127, 'google_oauth_client_id', ''),
(128, 'google_oauth_client_secret', ''),
(129, 'facebook_oauth_app_id', ''),
(130, 'facebook_oauth_app_secret', ''),
(131, 'twitter_oauth_client_id', ''),
(132, 'twitter_oauth_client_secret', ''),
(133, 'user_proxy', '1'),
(134, 'system_proxy', '1'),
(135, 'igac_enable_repost_media', '0'),
(136, 'igac_kewords_blacklist', 'sex\nfuck now\nnude'),
(137, 'vk_client_id', ''),
(138, 'vk_client_secret', ''),
(139, 'enable_headwayapp', '1'),
(140, 'designbold_app_id', ''),
(141, 'headwayapp_account_id', ''),
(142, 'pinterest_button', '1'),
(143, 'pinterest_your_app', '0'),
(144, 'pinterest_login_username_password', '1'),
(145, 'enable_ig_optimize_option', '1'),
(146, 'tumblr_app_id', ''),
(147, 'tumblr_app_secret', ''),
(148, 'reddit_client_id', ''),
(149, 'reddit_client_secret', ''),
(150, 'gb_api_key', ''),
(151, 'gb_app_id', ''),
(152, 'gb_app_secret', ''),
(153, 'gdpr_cookie_consent', '1'),
(154, 'disable_landing_page', '0');

-- --------------------------------------------------------

--
-- Table structure for table `general_packages`
--

CREATE TABLE `general_packages` (
  `id` int(11) NOT NULL,
  `ids` text,
  `type` int(1) DEFAULT '1' COMMENT '1-TRIAL|2-CHARGE',
  `name` text,
  `description` text,
  `price_monthly` float DEFAULT NULL,
  `price_annually` float DEFAULT NULL,
  `number_accounts` int(11) DEFAULT '0',
  `is_default` int(1) DEFAULT '0',
  `trial_day` int(11) DEFAULT NULL,
  `permission` longtext,
  `sort` int(11) DEFAULT '1',
  `status` int(1) DEFAULT '1',
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_packages`
--

INSERT INTO `general_packages` (`id`, `ids`, `type`, `name`, `description`, `price_monthly`, `price_annually`, `number_accounts`, `is_default`, `trial_day`, `permission`, `sort`, `status`, `changed`, `created`) VALUES
(1, 'c761441297cac88f7cea247f260d1985', 1, 'Trial mode', NULL, 0, 0, 0, 0, 3, '{\"0\":\"facebook_enable\",\"1\":\"facebook\\/post\",\"2\":\"instagram_enable\",\"3\":\"instagram\\/post\",\"4\":\"twitter_enable\",\"5\":\"twitter\\/post\",\"6\":\"google_drive\",\"7\":\"dropbox\",\"8\":\"photo_type\",\"9\":\"video_type\",\"max_storage_size\":4,\"max_file_size\":45}', 0, 1, '2018-06-11 19:21:26', '2018-04-02 11:40:23'),
(2, 'd7394fc22455c18ee2eb177bacb0a082', 2, 'Basic', 'Pick great plan for you', 15, 144, 1, 0, NULL, '{\"0\":\"instagram_enable\",\"1\":\"instagram\\/post\",\"2\":\"google_drive\",\"3\":\"photo_type\",\"max_storage_size\":250,\"max_file_size\":25,\"watermark\":null,\"image_editor\":null}', 60, 1, '2019-08-04 05:13:21', '2018-04-02 11:40:28'),
(8, '2c327cb5ab20f86cc0ea9cae47515da1', 2, 'Standard', 'Pick great plan for you', 20, 192, 2, 0, NULL, '{\"0\":\"facebook_enable\",\"1\":\"facebook\\/post\",\"2\":\"facebook\\/livestream\",\"3\":\"google_business_enable\",\"4\":\"google_business\\/post\",\"5\":\"instagram_enable\",\"6\":\"instagram\\/post\",\"7\":\"instagram\\/activity\",\"8\":\"google_drive\",\"9\":\"dropbox\",\"10\":\"photo_type\",\"11\":\"video_type\",\"max_storage_size\":512,\"max_file_size\":125,\"watermark\":\"watermark\",\"image_editor\":null}', 80, 1, '2019-10-25 10:48:09', '2018-06-09 19:58:16'),
(9, '9088ff7e41e726e5e2bf7c1352c22340', 2, 'Premium', 'Pick great plan for you', 30, 288, 5, 0, NULL, '{\"0\":\"facebook_enable\",\"1\":\"facebook\\/post\",\"2\":\"facebook\\/livestream\",\"3\":\"google_business_enable\",\"4\":\"google_business\\/post\",\"5\":\"instagram_enable\",\"6\":\"instagram\\/post\",\"7\":\"instagram\\/activity\",\"8\":\"instagram\\/livestream\",\"9\":\"instagram\\/analytics\",\"10\":\"linkedin_enable\",\"11\":\"linkedin\\/post\",\"12\":\"pinterest_enable\",\"13\":\"pinterest\\/post\",\"14\":\"reddit_enable\",\"15\":\"reddit\\/post\",\"16\":\"telegram_enable\",\"17\":\"telegram\\/post\",\"18\":\"tumblr_enable\",\"19\":\"tumblr\\/post\",\"20\":\"twitter_enable\",\"21\":\"twitter\\/post\",\"22\":\"vk_enable\",\"23\":\"vk\\/post\",\"24\":\"youtube_enable\",\"25\":\"youtube\\/post\",\"26\":\"youtube\\/livestream\",\"27\":\"google_drive\",\"28\":\"dropbox\",\"29\":\"photo_type\",\"30\":\"video_type\",\"max_storage_size\":1024,\"max_file_size\":250,\"watermark\":\"watermark\",\"image_editor\":\"image_editor\"}', 100, 1, '2019-10-25 10:47:43', '2018-07-26 08:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `general_payment_history`
--

CREATE TABLE `general_payment_history` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `package` int(11) DEFAULT NULL,
  `type` text,
  `transaction_id` text,
  `plan` int(1) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_payment_subscriptions`
--

CREATE TABLE `general_payment_subscriptions` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `package` int(11) DEFAULT NULL,
  `type` text,
  `billing_agreement_id` text,
  `plan` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_proxies`
--

CREATE TABLE `general_proxies` (
  `id` int(11) NOT NULL,
  `ids` text,
  `address` text,
  `location` text,
  `limit` int(11) DEFAULT NULL,
  `package` text,
  `active` int(11) DEFAULT '1',
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_purchase`
--

CREATE TABLE `general_purchase` (
  `id` int(11) NOT NULL,
  `ids` text,
  `pid` text,
  `purchase_code` text,
  `version` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_purchase`
--

INSERT INTO `general_purchase` (`id`, `ids`, `pid`, `purchase_code`, `version`) VALUES
(1, '85be978a5e74464e855c46025046a97d', '21747459', '1698-E373-76BA-AE59', '6.5'),
(2, '226a4fe906fbb6a70553795e00bd271d', '22334533', '67CF-EB4D-5931-7E28', '3.6'),
(3, 'aaa52f76b68cb1b37a6f61bbbab1b9e6', '21965687', '2066-75CB-D76D-6C13', '3.4'),
(4, 'f9b7b71d42ce69bb99f46d1540180284', '23015973', '42B4-8341-2066-D76D', '2.2'),
(5, '361457280a2003788k73477973de6vr1', '22051913', 'PYFR-CBSE-MGRT-PHOU', '3.3'),
(6, '142284f6a1d7e775124b707ea0f94a68', '32051982', '8341-42B4-D345-1F7E', '1.4'),
(7, '17ed36ea400b3c2f38414b2ffa6261c6', '23354447', 'E373-DF9B-AE59-7E28', '1.2'),
(8, 'f60e0f4113a13bbb29fb8e7b0a1497c9', '44965699', '6ALV-7JVX-U5DP-ZSK5', '1.3'),
(11, '456c7b45891994f25a5a59f6c72700a0', '32051981', 'S598-5DS6-CSD5-XAW6', '1.1'),
(9, '3535c5ae450ffa192f5a15813a3e47ea', '30292051', 'Q9E8-FD5S-6DV8-8RF9', '1.2'),
(10, 'be7705aa1e97d53c10f81ed79b6329ee', '43015266', '4S9P-YJJ4-WY95-VRMK', '1.4'),
(12, 'd59fc5706a6d4b6b6a6207f9a589b02a', '32051992', '432C-C1F2-C235-0C49', '1.4'),
(13, '222c669675659036902e3d63a15aM236', '21969988', 'DF61-D2F5-L685-M124', '1.4');

-- --------------------------------------------------------

--
-- Table structure for table `general_sessions`
--

CREATE TABLE `general_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_sessions`
--

INSERT INTO `general_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('1e270069bc8cfa47e0f2670cd155119906351e25', '156.211.20.35', 1572360355, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323336303335353b6c616e675f64656661756c747c733a343a226e756c6c223b),
('cf04a314786d87539b55ef934ba73e190458265f', '5.162.98.209', 1572387773, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323338373737333b6c616e675f64656661756c747c733a343a226e756c6c223b),
('7bfcf7df99a928484b2a61b244e9f2d8490b87ee', '209.17.97.34', 1572430762, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323433303736323b6c616e675f64656661756c747c733a343a226e756c6c223b),
('1b5d5680cc3f073204c90f2fa3d55950fc8f75c8', '45.14.49.211', 1572414573, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323431343537323b6c616e675f64656661756c747c733a343a226e756c6c223b),
('5b4c7a13b4cd11c9d7ff7be056c09b72d65ac371', '54.36.150.171', 1572415011, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323431353031313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('754e606eaaf3e3902ec58c88dfead0ad4ad25867', '45.14.49.211', 1572415117, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323431353131373b6c616e675f64656661756c747c733a343a226e756c6c223b),
('494f70f6df0e283a9693bb577e9f90ef2b8842a9', '209.17.96.42', 1572365693, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323336353639333b6c616e675f64656661756c747c733a343a226e756c6c223b),
('892b99c9b4a453693f1e476c0654e43ba1743ac8', '54.36.149.45', 1572376794, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323337363739343b6c616e675f64656661756c747c733a343a226e756c6c223b),
('13db42df3d9a104e0dc1115363b40cecf7fea922', '156.211.20.35', 1572360240, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323334363133313b6c616e675f64656661756c747c733a343a226e756c6c223b636c69656e745f74696d657a6f6e657c733a31323a224166726963612f436169726f223b),
('fdb27222cd075feb42526c8a9d81779198b939e3', '156.211.219.0', 1572317090, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323331363730393b6c616e675f64656661756c747c733a343a226e756c6c223b),
('ab21a3a3eefcd4598ef8fd6a9dae75f854bee4bd', '156.211.154.88', 1572316691, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323235393635383b6c616e675f64656661756c747c733a343a226e756c6c223b636c69656e745f74696d657a6f6e657c733a31323a224166726963612f436169726f223b7569647c733a313a2231223b),
('8b0ce03a19970025171bff93fe74349203aa2b1d', '54.36.150.112', 1572290409, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323239303430393b6c616e675f64656661756c747c733a343a226e756c6c223b),
('0d1b9512d8af36d7cc1442a28a01f3982c64586a', '156.211.152.224', 1572259658, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323235393635383b6c616e675f64656661756c747c733a343a226e756c6c223b636c69656e745f74696d657a6f6e657c733a31323a224166726963612f436169726f223b7569647c733a313a2231223b),
('ff80ba74b2ccf1bbe7e11d3beee6e7b0aca74b52', '54.36.150.67', 1572202343, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323230323334333b6c616e675f64656661756c747c733a343a226e756c6c223b),
('3e4d621e9b282b0692c74688c489ae0f3ecfbc5e', '66.249.79.250', 1572613777, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323631333737373b6c616e675f64656661756c747c733a343a226e756c6c223b),
('059315340e4d925eeb23a0549429ddc523d0614d', '141.8.143.152', 1572657697, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323635373639373b6c616e675f64656661756c747c733a343a226e756c6c223b),
('a3fe6d2e142cce551b2b819590374cfd72b8ef7b', '156.210.0.65', 1572735499, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323635363833323b6c616e675f64656661756c747c733a343a226e756c6c223b7569647c733a313a2231223b),
('310082720a2f664a7fe078d33a7a7e5885e02d1e', '156.210.0.65', 1572735834, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323635333635353b6c616e675f64656661756c747c733a343a226e756c6c223b636c69656e745f74696d657a6f6e657c733a31323a224166726963612f436169726f223b7569647c733a313a2231223b),
('cfb55db418b60567eb81b4a764e7090aa40d9c94', '178.140.91.239', 1572705797, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323730353739373b6c616e675f64656661756c747c733a343a226e756c6c223b),
('3f245c4dc93de714f9ceb705863b90748d55b20c', '156.211.20.35', 1572367328, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323336313039393b6c616e675f64656661756c747c733a343a226e756c6c223b),
('66b94d48bbf5f54f21a62753891cce092df540e8', '199.188.200.233', 1572733261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733333236313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('3b3ca9ad53a104bd6b8646d90a937993a7a8608b', '199.188.200.233', 1572733261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733333236313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('abbff39b67ce32d78efe81429f71b3ec629da120', '199.188.200.233', 1572733261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733333236313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('b42b728b8b1c86cc5382fa74d6109d75fdc3e723', '199.188.200.233', 1572733261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733333236313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('b3bd0d01904238a1aec5a9066ce1faf97acf31ed', '199.188.200.233', 1572733261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733333236313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('7b3e448d21a08566fe0a1b98d5c578889d93eab2', '199.188.200.233', 1572733261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733333236313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('221cd7a2fc6e4f22d126119ef84c19da89950027', '199.188.200.233', 1572733261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733333236313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('d374dec4b1da1372fad805a6641e8a3f591d1cf7', '199.188.200.233', 1572733261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733333236313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('4e93f48aec19f91e79966267919703d90f5e9345', '199.188.200.233', 1572733261, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733333236313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('47b8dd979c39f25d7e260bd07fa0d9ecb8eff8c8', '199.188.200.233', 1572733262, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733333236313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('a50893cb6c0500fa41f3df3707eb36dca551d88d', '199.188.200.233', 1572733262, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733333236323b6c616e675f64656661756c747c733a343a226e756c6c223b),
('6066180da36ba12b19ad9476d461cef5b33660d4', '199.188.200.233', 1572733262, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733333236323b6c616e675f64656661756c747c733a343a226e756c6c223b),
('342e486ef1c09eb69607a98054392394222e8e2f', '199.188.200.233', 1572733262, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733333236323b6c616e675f64656661756c747c733a343a226e756c6c223b),
('f1f4970093a4f022cf827e61307ad241eebe0554', '199.188.200.233', 1572733262, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733333236323b6c616e675f64656661756c747c733a343a226e756c6c223b),
('8bffae2b6902ae345cba15c03cb10499317151be', '199.188.200.233', 1572735471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733353437313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('408c53337a8a78a83c41830c698d51efdd9716ea', '199.188.200.233', 1572735471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733353437313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('59e36d904dd67dd04f2ff1d0b2aa4af43fe77237', '199.188.200.233', 1572735471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733353437313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('90ea3735b41ace2862452ded0c673ea35faadf5e', '199.188.200.233', 1572735471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733353437313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('823e61e4181cb6ee4ce2412d26a674deabee1f9c', '199.188.200.233', 1572735471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733353437313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('a5378d544ea78e3401d86bf13c7a67dcc00e4f84', '199.188.200.233', 1572735471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733353437313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('bf59cd43b6d00705f8b2fd40444ca0b69cf8aeaa', '199.188.200.233', 1572735471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733353437313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('e920df3f9b69afc67e798e45e31f4c8cd265b9a6', '199.188.200.233', 1572735471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733353437313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('12ead92abcbdab916057b729b07336ad29cb7118', '199.188.200.233', 1572735471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733353437313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('d0a649d76b3a1cd8801147c1c4f920e4725b574b', '199.188.200.233', 1572735471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733353437313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('94a253c92a12daa26463aecb06cfbc955b7141de', '199.188.200.233', 1572735471, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733353437313b6c616e675f64656661756c747c733a343a226e756c6c223b),
('9600eafca2b922ce795022cc28f972b9b66855d9', '199.188.200.233', 1572735472, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733353437323b6c616e675f64656661756c747c733a343a226e756c6c223b),
('aad198dd838be1bc0748f46203aad7840e5040eb', '199.188.200.233', 1572735472, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733353437323b6c616e675f64656661756c747c733a343a226e756c6c223b),
('2b597425bff6686220b2438dd0e0b56dee89dcc5', '199.188.200.233', 1572735472, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323733353437323b6c616e675f64656661756c747c733a343a226e756c6c223b);

-- --------------------------------------------------------

--
-- Table structure for table `general_users`
--

CREATE TABLE `general_users` (
  `id` int(11) NOT NULL,
  `ids` text,
  `admin` int(1) DEFAULT NULL,
  `login_type` text,
  `fullname` text,
  `email` text,
  `password` text,
  `package` int(11) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `timezone` text,
  `permission` text,
  `settings` longtext,
  `activation_key` text,
  `reset_key` text,
  `history_ip` text,
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_users`
--

INSERT INTO `general_users` (`id`, `ids`, `admin`, `login_type`, `fullname`, `email`, `password`, `package`, `expiration_date`, `timezone`, `permission`, `settings`, `activation_key`, `reset_key`, `history_ip`, `status`, `changed`, `created`) VALUES
(1, 'c761441297cac88f7cea247f260d1985', 1, 'direct', 'Mahmoud', 'admin@admin.com', '1325d2678e420e4f338f24faa3307456', 9, '2100-04-29', 'Asia/Karachi', '{\"0\":\"facebook_enable\",\"1\":\"facebook\\/post\",\"2\":\"facebook\\/livestream\",\"3\":\"google_business_enable\",\"4\":\"google_business\\/post\",\"5\":\"instagram_enable\",\"6\":\"instagram\\/post\",\"7\":\"instagram\\/activity\",\"8\":\"instagram\\/livestream\",\"9\":\"instagram\\/analytics\",\"10\":\"linkedin_enable\",\"11\":\"linkedin\\/post\",\"12\":\"pinterest_enable\",\"13\":\"pinterest\\/post\",\"14\":\"reddit_enable\",\"15\":\"reddit\\/post\",\"16\":\"telegram_enable\",\"17\":\"telegram\\/post\",\"18\":\"tumblr_enable\",\"19\":\"tumblr\\/post\",\"20\":\"twitter_enable\",\"21\":\"twitter\\/post\",\"22\":\"vk_enable\",\"23\":\"vk\\/post\",\"24\":\"youtube_enable\",\"25\":\"youtube\\/post\",\"26\":\"youtube\\/livestream\",\"27\":\"google_drive\",\"28\":\"dropbox\",\"29\":\"photo_type\",\"30\":\"video_type\",\"max_storage_size\":1024,\"max_file_size\":250,\"watermark\":\"watermark\",\"image_editor\":\"image_editor\"}', '{\"facebook_app_id\":\"\",\"facebook_app_secret\":\"\",\"fb_post_media_count\":0,\"fb_post_link_count\":0,\"fb_post_text_count\":0,\"fb_post_success_count\":0,\"fb_post_error_count\":0,\"watermark_image\":\".\\/assets\\/uploads\\/user1\\/watermark.png\",\"watermark_size\":\"27\",\"watermark_opacity\":\"31\",\"watermark_position\":\"lb\",\"linkedin_app_id\":\"\",\"linkedin_app_secret\":\"\",\"pinterest_app_id\":\"\",\"pinterest_app_secret\":\"\",\"twitter_app_id\":\"\",\"twitter_app_secret\":\"\",\"ig_live_success_count\":2,\"ig_live_error_count\":0,\"ig_post_photo_count\":1,\"ig_post_story_count\":0,\"ig_post_carousel_count\":0,\"ig_post_success_count\":1,\"ig_post_error_count\":0,\"ig_live_count\":2,\"fb_live_profile_count\":0,\"fb_live_page_count\":1,\"fb_live_group_count\":0,\"fb_live_success_count\":1,\"fb_live_error_count\":0,\"vk_client_id\":\"\",\"vk_client_secret\":\"\",\"fb_live_count\":1,\"ig_post_count\":1,\"pin_post_photo_count\":0,\"pin_post_video_count\":0,\"pin_post_text_count\":0,\"pin_post_success_count\":0,\"pin_post_error_count\":0,\"tumblr_app_id\":\"\",\"tumblr_app_secret\":\"\",\"tw_post_photo_count\":0,\"tw_post_video_count\":0,\"tw_post_text_count\":0,\"tw_post_success_count\":0,\"tw_post_error_count\":0,\"reddit_post_media_count\":0,\"reddit_post_link_count\":0,\"reddit_post_text_count\":0,\"reddit_post_success_count\":0,\"reddit_post_error_count\":0,\"gb_post_photo_count\":0,\"gb_post_text_count\":0,\"gb_post_success_count\":0,\"gb_post_error_count\":0}', '1', '531e245ce5371f635c61d7c2cd45c988', '[\"156.211.243.91\",\"81.192.103.155\",\"156.210.209.225\",\"156.211.121.26\",\"41.35.122.20\",\"156.211.152.224\",\"156.210.0.65\",\"156.210.0.65\",\"41.35.122.157\"]', 1, '2019-11-02 11:25:54', '2019-01-11 16:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `google_business_accounts`
--

CREATE TABLE `google_business_accounts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `pid` text,
  `username` text CHARACTER SET utf8,
  `avatar` text,
  `access_token` text,
  `status` int(1) DEFAULT '1',
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `google_business_posts`
--

CREATE TABLE `google_business_posts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `type` text,
  `data` longtext,
  `time_post` datetime DEFAULT NULL,
  `delay` int(11) DEFAULT NULL,
  `time_delete` int(11) DEFAULT NULL,
  `result` text,
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instagram_accounts`
--

CREATE TABLE `instagram_accounts` (
  `id` int(11) NOT NULL,
  `ids` text CHARACTER SET utf8,
  `uid` text,
  `pid` text,
  `avatar` text,
  `username` text,
  `password` text,
  `proxy` text,
  `default_proxy` int(11) DEFAULT '0',
  `status` int(1) DEFAULT '1',
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instagram_activities`
--

CREATE TABLE `instagram_activities` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT '0',
  `account` int(11) DEFAULT NULL,
  `action` longtext,
  `time` datetime DEFAULT NULL,
  `data` longtext,
  `settings` longtext,
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instagram_activities_log`
--

CREATE TABLE `instagram_activities_log` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `action` text,
  `user_id` text,
  `media_id` text,
  `data` longtext,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instagram_analytics`
--

CREATE TABLE `instagram_analytics` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `account` text,
  `data` longtext,
  `next_action` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instagram_analytics_stats`
--

CREATE TABLE `instagram_analytics_stats` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `data` longtext,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instagram_livestreams`
--

CREATE TABLE `instagram_livestreams` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `group` text,
  `data` longtext,
  `time_post` datetime DEFAULT NULL,
  `result` text,
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instagram_posts`
--

CREATE TABLE `instagram_posts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `type` text,
  `data` longtext,
  `time_post` datetime DEFAULT NULL,
  `delay` int(11) DEFAULT NULL,
  `time_delete` int(11) DEFAULT NULL,
  `result` text,
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instagram_sessions`
--

CREATE TABLE `instagram_sessions` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `settings` mediumblob,
  `cookies` mediumblob,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `linkedin_accounts`
--

CREATE TABLE `linkedin_accounts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `pid` text,
  `type` text,
  `username` text,
  `url` text,
  `avatar` text,
  `access_token` text,
  `status` int(1) DEFAULT '1',
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `linkedin_posts`
--

CREATE TABLE `linkedin_posts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `type` text,
  `data` longtext,
  `time_post` datetime DEFAULT NULL,
  `delay` int(11) DEFAULT NULL,
  `time_delete` int(11) DEFAULT NULL,
  `result` text,
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `paypal_email` varchar(255) DEFAULT NULL,
  `pagseguro_email` varchar(255) DEFAULT NULL,
  `pagseguro_token` varchar(255) DEFAULT NULL,
  `sandbox` int(1) DEFAULT '0',
  `currency` varchar(32) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT '$'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `paypal_email`, `pagseguro_email`, `pagseguro_token`, `sandbox`, `currency`, `symbol`) VALUES
(1, 'tasdemir_ozgur@yahoo.com.tr', NULL, NULL, 0, 'TRY', '₺');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `invoice` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `business` varchar(255) DEFAULT NULL,
  `receiver_email` varchar(255) DEFAULT NULL,
  `payer_email` varchar(255) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_number` int(1) DEFAULT NULL,
  `address_street` varchar(255) DEFAULT NULL,
  `address_city` varchar(255) DEFAULT NULL,
  `address_country` varchar(255) DEFAULT NULL,
  `mc_gross` float DEFAULT NULL,
  `feeAmount` float DEFAULT NULL,
  `netAmount` float DEFAULT NULL,
  `mc_currency` varchar(255) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `full_data` text,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pinterest_accounts`
--

CREATE TABLE `pinterest_accounts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT 'board',
  `login_type` int(1) DEFAULT '1',
  `pid` text,
  `username` text CHARACTER SET utf8,
  `account` text,
  `password` text,
  `app_id` text,
  `app_secret` text,
  `url` text,
  `proxy` text,
  `default_proxy` text,
  `avatar` text,
  `access_token` text,
  `status` int(1) DEFAULT '1',
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pinterest_posts`
--

CREATE TABLE `pinterest_posts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `board` text,
  `data` longtext,
  `time_post` datetime DEFAULT NULL,
  `delay` int(11) DEFAULT NULL,
  `time_delete` int(11) DEFAULT NULL,
  `result` text,
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reddit_accounts`
--

CREATE TABLE `reddit_accounts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `pid` text,
  `username` text CHARACTER SET utf8,
  `avatar` text,
  `url` text,
  `access_token` text,
  `status` int(1) DEFAULT '1',
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reddit_posts`
--

CREATE TABLE `reddit_posts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `type` text,
  `data` longtext,
  `time_post` datetime DEFAULT NULL,
  `delay` int(11) DEFAULT NULL,
  `time_delete` int(11) DEFAULT NULL,
  `result` text,
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `telegram_accounts`
--

CREATE TABLE `telegram_accounts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `pid` text,
  `type` text,
  `username` text,
  `url` text,
  `avatar` text,
  `access_token` text,
  `status` int(1) DEFAULT '1',
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `telegram_posts`
--

CREATE TABLE `telegram_posts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `type` text,
  `data` longtext,
  `time_post` datetime DEFAULT NULL,
  `delay` int(11) DEFAULT NULL,
  `time_delete` int(11) DEFAULT NULL,
  `result` text,
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tumblr_accounts`
--

CREATE TABLE `tumblr_accounts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `pid` text,
  `username` text CHARACTER SET utf8,
  `avatar` text,
  `access_token` text,
  `status` int(1) DEFAULT '1',
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tumblr_posts`
--

CREATE TABLE `tumblr_posts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `type` text,
  `data` longtext,
  `time_post` datetime DEFAULT NULL,
  `delay` int(11) DEFAULT NULL,
  `time_delete` int(11) DEFAULT NULL,
  `result` text,
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `twitter_accounts`
--

CREATE TABLE `twitter_accounts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `pid` text,
  `username` text,
  `avatar` text,
  `access_token` text,
  `status` int(1) DEFAULT '1',
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `twitter_posts`
--

CREATE TABLE `twitter_posts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `type` text,
  `data` longtext,
  `time_post` datetime DEFAULT NULL,
  `delay` int(11) DEFAULT NULL,
  `time_delete` int(11) DEFAULT NULL,
  `result` text,
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vk_accounts`
--

CREATE TABLE `vk_accounts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `pid` text,
  `type` text,
  `username` text CHARACTER SET utf8,
  `url` text,
  `avatar` text,
  `access_token` text,
  `status` int(1) DEFAULT '1',
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vk_posts`
--

CREATE TABLE `vk_posts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `group_id` text,
  `type` text,
  `data` longtext,
  `time_post` datetime DEFAULT NULL,
  `delay` int(11) DEFAULT NULL,
  `time_delete` int(11) DEFAULT NULL,
  `result` text,
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `youtube_accounts`
--

CREATE TABLE `youtube_accounts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `pid` text,
  `username` text CHARACTER SET utf8,
  `avatar` text,
  `access_token` text,
  `status` int(1) DEFAULT '1',
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `youtube_livestreams`
--

CREATE TABLE `youtube_livestreams` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `group` text,
  `type` text,
  `data` longtext,
  `time_post` datetime DEFAULT NULL,
  `result` text,
  `time_end` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `youtube_posts`
--

CREATE TABLE `youtube_posts` (
  `id` int(11) NOT NULL,
  `ids` text,
  `uid` int(11) DEFAULT NULL,
  `account` int(11) DEFAULT NULL,
  `group` text,
  `data` longtext,
  `time_post` datetime DEFAULT NULL,
  `delay` int(11) DEFAULT NULL,
  `time_delete` int(11) DEFAULT NULL,
  `result` text,
  `status` int(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facebook_accounts`
--
ALTER TABLE `facebook_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facebook_livestreams`
--
ALTER TABLE `facebook_livestreams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facebook_posts`
--
ALTER TABLE `facebook_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_caption`
--
ALTER TABLE `general_caption`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_coupons`
--
ALTER TABLE `general_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_custom_page`
--
ALTER TABLE `general_custom_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_file_manager`
--
ALTER TABLE `general_file_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_groups`
--
ALTER TABLE `general_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_lang`
--
ALTER TABLE `general_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_lang_list`
--
ALTER TABLE `general_lang_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_options`
--
ALTER TABLE `general_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_packages`
--
ALTER TABLE `general_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_payment_history`
--
ALTER TABLE `general_payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_payment_subscriptions`
--
ALTER TABLE `general_payment_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_proxies`
--
ALTER TABLE `general_proxies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_purchase`
--
ALTER TABLE `general_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_sessions`
--
ALTER TABLE `general_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `general_users`
--
ALTER TABLE `general_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_business_accounts`
--
ALTER TABLE `google_business_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_business_posts`
--
ALTER TABLE `google_business_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instagram_accounts`
--
ALTER TABLE `instagram_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instagram_activities`
--
ALTER TABLE `instagram_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instagram_activities_log`
--
ALTER TABLE `instagram_activities_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instagram_analytics`
--
ALTER TABLE `instagram_analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instagram_analytics_stats`
--
ALTER TABLE `instagram_analytics_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instagram_livestreams`
--
ALTER TABLE `instagram_livestreams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instagram_posts`
--
ALTER TABLE `instagram_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instagram_sessions`
--
ALTER TABLE `instagram_sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `linkedin_accounts`
--
ALTER TABLE `linkedin_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linkedin_posts`
--
ALTER TABLE `linkedin_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinterest_accounts`
--
ALTER TABLE `pinterest_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinterest_posts`
--
ALTER TABLE `pinterest_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reddit_accounts`
--
ALTER TABLE `reddit_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reddit_posts`
--
ALTER TABLE `reddit_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telegram_accounts`
--
ALTER TABLE `telegram_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `telegram_posts`
--
ALTER TABLE `telegram_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tumblr_accounts`
--
ALTER TABLE `tumblr_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tumblr_posts`
--
ALTER TABLE `tumblr_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `twitter_accounts`
--
ALTER TABLE `twitter_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `twitter_posts`
--
ALTER TABLE `twitter_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vk_accounts`
--
ALTER TABLE `vk_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vk_posts`
--
ALTER TABLE `vk_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtube_accounts`
--
ALTER TABLE `youtube_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtube_livestreams`
--
ALTER TABLE `youtube_livestreams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtube_posts`
--
ALTER TABLE `youtube_posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facebook_accounts`
--
ALTER TABLE `facebook_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `facebook_livestreams`
--
ALTER TABLE `facebook_livestreams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facebook_posts`
--
ALTER TABLE `facebook_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_caption`
--
ALTER TABLE `general_caption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_coupons`
--
ALTER TABLE `general_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `general_custom_page`
--
ALTER TABLE `general_custom_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80910;

--
-- AUTO_INCREMENT for table `general_file_manager`
--
ALTER TABLE `general_file_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `general_groups`
--
ALTER TABLE `general_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `general_lang`
--
ALTER TABLE `general_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_lang_list`
--
ALTER TABLE `general_lang_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_options`
--
ALTER TABLE `general_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `general_packages`
--
ALTER TABLE `general_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `general_payment_history`
--
ALTER TABLE `general_payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `general_payment_subscriptions`
--
ALTER TABLE `general_payment_subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_proxies`
--
ALTER TABLE `general_proxies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_purchase`
--
ALTER TABLE `general_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `general_users`
--
ALTER TABLE `general_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `google_business_accounts`
--
ALTER TABLE `google_business_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `google_business_posts`
--
ALTER TABLE `google_business_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instagram_accounts`
--
ALTER TABLE `instagram_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instagram_activities`
--
ALTER TABLE `instagram_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `instagram_activities_log`
--
ALTER TABLE `instagram_activities_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instagram_analytics`
--
ALTER TABLE `instagram_analytics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instagram_analytics_stats`
--
ALTER TABLE `instagram_analytics_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `instagram_livestreams`
--
ALTER TABLE `instagram_livestreams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instagram_posts`
--
ALTER TABLE `instagram_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `instagram_sessions`
--
ALTER TABLE `instagram_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `linkedin_accounts`
--
ALTER TABLE `linkedin_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `linkedin_posts`
--
ALTER TABLE `linkedin_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinterest_accounts`
--
ALTER TABLE `pinterest_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinterest_posts`
--
ALTER TABLE `pinterest_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reddit_accounts`
--
ALTER TABLE `reddit_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reddit_posts`
--
ALTER TABLE `reddit_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `telegram_accounts`
--
ALTER TABLE `telegram_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `telegram_posts`
--
ALTER TABLE `telegram_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tumblr_accounts`
--
ALTER TABLE `tumblr_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tumblr_posts`
--
ALTER TABLE `tumblr_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_accounts`
--
ALTER TABLE `twitter_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `twitter_posts`
--
ALTER TABLE `twitter_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vk_accounts`
--
ALTER TABLE `vk_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vk_posts`
--
ALTER TABLE `vk_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `youtube_accounts`
--
ALTER TABLE `youtube_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `youtube_livestreams`
--
ALTER TABLE `youtube_livestreams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `youtube_posts`
--
ALTER TABLE `youtube_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
