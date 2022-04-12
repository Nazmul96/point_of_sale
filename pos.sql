-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 07:38 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `gender`, `contact_number`, `address`, `date_of_birth`, `password`, `image`) VALUES
(1, 'Nazmul ', 'Hossain', 'admin@gmail.com', 'femail', '01718465014', '                                                                                                                                                                                                                                                Narayangonj, Rugonj                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ', '1998-01-09', 'e10adc3949ba59abbe56e057f20f883e', 'img_avatar.png'),
(2, 'owner', NULL, 'owner@gmail.com', NULL, NULL, NULL, NULL, '123456', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(4, 'Smart-phones'),
(5, 'Smart-phone'),
(6, 'Restaurant'),
(7, 'Desktop'),
(10, 'bnvbnvb'),
(11, 'watch'),
(12, 'fd'),
(13, 'Electronics'),
(14, 'Vehicles'),
(15, 'Vegitables'),
(16, 'bikea'),
(19, 'jweleries'),
(20, 'Ships'),
(21, 'Shipss');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `client_number` int(50) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `client_name`, `client_number`, `client_email`, `contact_number`, `password`, `address`, `city`, `state`, `postal_code`, `country`, `website`, `note`) VALUES
(1, 'Michelle Stein Stein in', 529790, 'fenapypygo@mailinator.com', '', NULL, 'Rupgonj, Narayangonj', 'Rutherfordmouth', 'Utah', '99412', 'Antigua and Barbuda', 'website.com', 'Alhamdulilalllah'),
(3, ' Ulric Brady input', 1963555693, 'cohipiwo@mailinator.com', '46464564564', NULL, 'Dhaka', 'Dhaka', 'dhaka', '2232', 'Bangladesh', 'dhaka.com', 'lhamdulilallah'),
(5, 'suvo khan', 231, 'a@email.com', '', NULL, 'dhaka', 'Dhaka', 'norway', '260', 'Bangladesh', 'dhaka.com', 'dfdgdsfsds'),
(6, 'cohipiwo@mailinator.com', 0, 'cohipiwo@mailinator.com', '01882191212', NULL, 'fsdfds', 'Dhaka', 'dhaka', '2232', 'Bangladesh', 'sdfsd', 'sfsdf'),
(7, 'abdulallahh', 529790, 'av@gmail.com', '01718465014', NULL, 'nowakhali', 'Dhaka', 'norway', '260', 'Bangladesh', 'dhaka.com', 'much much easier'),
(8, 'sdfsf', 0, 'sdfsf', '', NULL, '', '', '', '', 'Bangladesh', '', ''),
(10, 'rafi khan', 1234, 'rafi@gmail.com', '017271812121', NULL, 'savar', 'dhaka', 'dhaka', '1206', 'Bahrain', 'dhaka.com', 'something'),
(12, 'rtyrg', 1234, 'abc@email.com', '01718465014', NULL, 'nowakhali', 'Dhaka', 'norway', '260', 'Bangladesh', 'dgd', 'dfgd'),
(13, 'sefsf', 123, 'sdfsdf@gmail.com', 'dfgd', NULL, 'dfgfd', 'Rutherfordmouth', 'Utah', '99412', 'Bangladesh', 'gdfgd', 'dfgdf'),
(14, 'tgrgrt', 12, 'dgd@gmail.com', '01882191212', NULL, 'Dhaka', 'Dhaka', 'dhaka', '2232', 'Bangladesh', 'dsdasd', 'Alhamdulilalllah'),
(15, 'nadiya', 35435, 'nadiya@gmail.com', '01718465014', NULL, 'nowakhali', 'Dhaka', 'norway', '260', 'Bangladesh', 'fhfgh', 'fghfgh'),
(16, 'karimulallah', 4535, 'karim@gmail.com', '01882191212', '25d55ad283aa400af464c76d713c07ad', 'Dhaka', 'Dhaka', 'dhaka', '2232', 'Bangladesh', 'gtf', 'fdgdfg'),
(17, 'asif', 12345, 'naz@gmail.com', '01882191212', '432f45b44c432414d2f97df0e5743818', 'Dhaka', 'Dhaka', 'dhaka', '2232', 'Bangladesh', 'fsfsdf', 'sdfsdf'),
(18, 'abdulallahh', 1234, 'abid1222@gmail.com', '01718465014', '25d55ad283aa400af464c76d713c07ad', 'nowakhali', 'Dhaka', 'norway', '260', 'Bangladesh', '', ''),
(19, 'abdulallahh', 1234, 'abid12@gmail.com', '01718465014', '25d55ad283aa400af464c76d713c07ad', 'nowakhali', 'Dhaka', 'norway', '260', 'Bangladesh', '', ''),
(20, 'ui', 1234, 'abid123@gmail.com', '01718465014', '25d55ad283aa400af464c76d713c07ad', 'nowakhali', 'Dhaka', 'norway', '260', 'Bangladesh', '', ''),
(21, ' Ulric Brady', 1234, 'abid1234@gmail.com', '01718465014', '25d55ad283aa400af464c76d713c07ad', 'nowakhali', 'Dhaka', 'norway', '260', 'Bangladesh', '', ''),
(22, 'michel stark', 1234, 'michel@gmail.com', '01718465014', '25d55ad283aa400af464c76d713c07ad', 'nowakhali', 'Dhaka', 'norway', '260', 'Bangladesh', 'website.com', 'gjgj'),
(24, 'ui', 1234, 'abid121@gmail.com', '01718465014', '25d55ad283aa400af464c76d713c07ad', 'nowakhali', 'Dhaka', 'norway', '260', 'Bangladesh', 'dfgdg', 'gfdgdg'),
(29, 'abdulallah', 1234, 'nazmul@sahajjo.com', '01718465014', '25d55ad283aa400af464c76d713c07ad', 'nowakhali', 'Dhaka', 'norway', '260', 'Bangladesh', '', ''),
(30, 'abdulallah', 1234, 'abid111@gmail.com', '01718465014', '25d55ad283aa400af464c76d713c07ad', 'nowakhali', 'Dhaka', 'norway', '260', 'Bangladesh', '', ''),
(31, 'selim saheb', 1221, 'selim@gmail.com', '017182928091', '25d55ad283aa400af464c76d713c07ad', 'Dhaka', 'Dhaka', 'dhaka', '2232', NULL, 'dfgdf', 'dfgdf'),
(32, 'kokhon', 1234, 'kokhon@gmail.com', '01718465014', '25d55ad283aa400af464c76d713c07ad', 'nowakhali', 'Dhaka', 'norway', '260', 'Bangladesh', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `client_id` int(50) DEFAULT NULL,
  `invoice_number` int(50) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `due_date` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `recurring` varchar(255) DEFAULT NULL,
  `products` text DEFAULT NULL,
  `sub_total` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `due_amount` varchar(255) DEFAULT NULL,
  `discount_type` varchar(255) DEFAULT NULL,
  `formdata_discount` varchar(255) DEFAULT NULL,
  `received_amount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `client_id`, `invoice_number`, `currency`, `date`, `due_date`, `status`, `recurring`, `products`, `sub_total`, `total`, `due_amount`, `discount_type`, `formdata_discount`, `received_amount`) VALUES
(8, 1, 2, 'Australia', '2021-10-25', '2021-10-25', 'Paid', '', '[{\"id\":\"1\",\"products_id\":\"9\",\"quantity\":\"3\",\"price\":\"5677\",\"amount\":\"17031\"},{\"id\":\"2\",\"products_id\":\"8\",\"quantity\":\"3\",\"price\":\"267\",\"amount\":\"801\"},{\"id\":\"3\",\"products_id\":\"7\",\"quantity\":\"4\",\"price\":\"5678\",\"amount\":\"17034\"}]', '17031', '17031', '-9', 'none', '', '20'),
(9, 1, 3, 'Euro', '2021-10-13', '2021-10-13', 'Paid', '', '[{\"id\":\"1\",\"products_id\":\"7\",\"quantity\":\"3\",\"price\":\"5678\",\"amount\":\"5678\"},{\"id\":\"2\",\"products_id\":\"9\",\"quantity\":\"4\",\"price\":\"5677\",\"amount\":\"22708\"},{\"id\":\"3\",\"products_id\":\"9\",\"quantity\":\"3\",\"price\":\"5677\",\"amount\":\"22708\"},{\"id\":\"4\",\"products_id\":\"7\",\"quantity\":\"3\",\"price\":\"5678\",\"amount\":\"17034\"}]', '17034', '17034', '-100', 'fixed', '100', '3000'),
(11, 3, 5, 'Australia', '2021-10-12', '2021-10-12', 'Paid', '', '[{\"id\":\"1\",\"products_id\":\"6\",\"quantity\":\"4\",\"price\":\"169\",\"amount\":\"676\"},{\"id\":\"2\",\"products_id\":\"7\",\"quantity\":\"4\",\"price\":\"5678\",\"amount\":\"22712\"}]', '23388', '18388', '2388', 'fixed', '5000', '10000'),
(12, 1, 6, 'Australia', '2021-10-14', '2021-10-14', 'Overdue', '', '[{\"id\":\"1\",\"products_id\":\"7\",\"quantity\":\"2\",\"price\":\"5678\",\"amount\":\"11356\"},{\"id\":\"2\",\"products_id\":\"9\",\"quantity\":\"3\",\"price\":\"5677\",\"amount\":\"17031\"}]', '28387', '27387', '0', 'fixed', '1000', '10000'),
(13, 3, 7, 'Australia', '2021-10-21', '2021-10-21', 'Overdue', '', '[{\"id\":\"1\",\"products_id\":\"8\",\"quantity\":\"5\",\"price\":\"267\",\"amount\":\"1335\"},{\"id\":\"2\",\"products_id\":\"7\",\"quantity\":\"5\",\"price\":\"5678\",\"amount\":\"28390\"}]', '29725', '28725', '-275', 'fixed', '1000', '10000'),
(15, 5, 8, 'Australia', '2021-10-13', '2021-10-16', 'Overdue', '', '[{\"id\":\"1\",\"products_id\":\"3\",\"quantity\":\"2\",\"price\":\"20000\",\"amount\":\"40000\"},{\"id\":\"2\",\"products_id\":\"6\",\"quantity\":\"4\",\"price\":\"169\",\"amount\":\"676\"}]', '40676', '36608.4', '15608.4', 'percentage', '10', '20000'),
(16, 5, 9, 'Australia', '2021-10-13', '2021-10-16', 'Overdue', '', '[{\"id\":\"1\",\"products_id\":\"7\",\"quantity\":\"2\",\"price\":\"5678\",\"amount\":\"11356\"},{\"id\":\"2\",\"products_id\":\"9\",\"quantity\":\"1\",\"price\":\"5677\",\"amount\":\"5677\"}]', '17033', '16533', '9533', 'fixed', '500', '2000'),
(17, 5, 10, 'Australia', '2021-10-13', '2021-10-17', 'Overdue', '', '[{\"id\":\"1\",\"products_id\":\"8\",\"quantity\":\"2\",\"price\":\"267\",\"amount\":\"534\"},{\"id\":\"3\",\"products_id\":\"7\",\"quantity\":\"2\",\"price\":\"5678\",\"amount\":\"11356\"}]', '11890', '11390', '-500', 'fixed', '500', '11890'),
(18, 5, 11, 'Australia', '2021-10-13', '2021-10-22', 'Overdue', '', '[{\"id\":\"1\",\"products_id\":\"6\",\"quantity\":\"1\",\"price\":\"169\",\"amount\":\"169\"},{\"id\":\"2\",\"products_id\":\"7\",\"quantity\":\"1\",\"price\":\"5678\",\"amount\":\"5678\"}]', '5847', '5747', '-253', 'fixed', '100', '4000'),
(19, 7, 12, 'Euro', '2021-11-01', '2021-11-06', 'Overdue', '', '[{\"id\":\"1\",\"products_id\":\"7\",\"quantity\":\"2\",\"price\":\"5678\",\"amount\":\"11356\"}]', '11356', '10220.4', '220.39999999999964', 'percentage', '10', '10000'),
(20, 5, 13, 'Euro', '2021-10-26', '2021-11-03', 'Overdue', '', '[{\"id\":\"1\",\"products_id\":\"6\",\"quantity\":\"5\",\"price\":\"169\",\"amount\":\"845\"}]', '845', '745', '0', 'fixed', '100', '5000'),
(21, 10, 14, 'Australia', '2021-10-31', '2021-11-01', 'Overdue', '', '[{\"id\":\"1\",\"products_id\":\"9\",\"quantity\":\"2\",\"price\":\"5677\",\"amount\":\"11354\"}]', '11354', '10354', '4874', 'fixed', '1000', '5480'),
(22, 5, 15, 'Australia', '2021-11-03', '2021-11-06', 'Overdue', '', '[{\"id\":\"1\",\"products_id\":\"7\",\"quantity\":\"2\",\"price\":\"5678\",\"amount\":\"11356\"}]', '11356', '10356', '7356', 'fixed', '1000', '3000'),
(23, 5, 16, 'Australia', '2021-11-04', '2021-11-12', 'Overdue', '', '[{\"id\":\"0\",\"products_id\":\"7\",\"quantity\":\"1\",\"price\":\"5678\",\"amount\":\"5678\"},{\"id\":\"1\",\"products_id\":\"8\",\"quantity\":\"2\",\"price\":\"267\",\"amount\":\"534\"},{\"id\":\"2\",\"products_id\":\"7\",\"quantity\":\"3\",\"price\":\"5678\",\"amount\":\"17034\"}]', '23246', '22246', '2246', 'fixed', '1000', '20000'),
(24, 6, 17, 'Australia', '2021-11-04', '2021-11-20', 'Paid', '', '[{\"id\":\"0\",\"products_id\":\"9\",\"quantity\":\"1\",\"price\":\"5677\",\"amount\":\"5677\"},{\"id\":\"1\",\"products_id\":\"8\",\"quantity\":\"2\",\"price\":\"267\",\"amount\":\"534\"}]', '6211', '6211', '6211', 'fixed', '', ''),
(25, 5, 18, 'Australia', '2021-11-04', '2021-11-04', 'Overdue', '', '[{\"id\":\"0\",\"products_id\":\"7\",\"quantity\":\"1\",\"price\":\"5678\",\"amount\":\"5678\"}]', '5678', '5678', '5678', 'none', NULL, ''),
(26, 7, 19, 'Australia', '2021-11-06', '2021-11-06', 'Overdue', '', '[{\"id\":\"0\",\"products_id\":\"7\",\"quantity\":\"1\",\"price\":\"5678\",\"amount\":\"5678\"}]', '5678', '5678', '5678', 'fixed', '', ''),
(27, 1, 20, 'Australia', '2021-11-06', '2021-11-06', 'Overdue', '', '[{\"id\":\"0\",\"products_id\":\"7\",\"quantity\":\"3\",\"price\":\"5678\",\"amount\":\"17034\"}]', '17034', '16034', '11034', 'fixed', '1000', '5000'),
(28, 1, 21, 'Australia', '2021-11-06', '2021-11-06', 'Overdue', '', '[{\"id\":\"0\",\"products_id\":\"7\",\"quantity\":\"1\",\"price\":\"5678\",\"amount\":\"5678\"},{\"id\":\"1\",\"products_id\":\"12\",\"quantity\":\"4\",\"price\":\"431\",\"amount\":\"1724\"}]', '7402', '6402', '1402', 'fixed', '1000', '5000'),
(29, 5, 22, NULL, '2021-11-08', '2021-11-09', 'Overdue', '', '[{\"id\":\"0\",\"products_id\":\"8\",\"quantity\":\"3\",\"price\":\"267\",\"amount\":\"801\"}]', '801', '801', '801', 'none', NULL, ''),
(30, 5, 23, NULL, '2021-11-05', '2021-11-13', 'Overdue', '', '[{\"id\":\"0\",\"products_id\":\"choose\",\"quantity\":\"\",\"price\":\"\",\"amount\":\"\"}]', '', '', '', 'none', NULL, ''),
(31, 15, 24, NULL, '2021-11-14', '2021-11-21', 'Partially', '', '[{\"id\":\"0\",\"products_id\":\"9\",\"quantity\":\"2\",\"price\":\"5677\",\"amount\":\"11354\"}]', '11354', '11254', '6254', 'fixed', '100', '5000'),
(32, 5, 25, NULL, '2021-11-14', '2021-11-19', 'Overdue', '', '[{\"id\":\"0\",\"products_id\":\"7\",\"quantity\":\"1\",\"price\":\"5678\",\"amount\":\"5678\"}]', '5678', '5578', '1578', 'fixed', '100', '4000'),
(33, 5, 26, NULL, '2021-11-16', '2021-11-19', 'Overdue', '', '[{\"id\":\"0\",\"products_id\":\"7\",\"quantity\":\"1\",\"price\":\"5678\",\"amount\":\"5678\"}]', '5678', '5578', '2500', 'fixed', '100', '4000'),
(34, 5, 27, NULL, '2021-11-16', '2021-11-19', 'Overdue', '', '[{\"id\":\"0\",\"products_id\":\"7\",\"quantity\":\"1\",\"price\":\"5678\",\"amount\":\"5678\"}]', '5678', '5578', '0', 'fixed', '100', '4000'),
(35, 5, 28, NULL, '2021-11-16', '2021-11-19', 'Overdue', '', '[{\"id\":\"0\",\"products_id\":\"7\",\"quantity\":\"1\",\"price\":\"5678\",\"amount\":\"5678\"}]', '5678', '5578', '1578', 'fixed', '100', '4000'),
(36, 5, 29, NULL, '2021-11-17', '2021-11-20', 'Overdue', '', '[{\"id\":\"0\",\"products_id\":\"3\",\"quantity\":\"1\",\"price\":\"123.004\",\"amount\":\"123.004\"}]', '123.004', '123.004', '123.004', 'none', NULL, ''),
(37, 5, 30, NULL, '2021-11-18', '2021-11-18', 'Overdue', '', '[{\"id\":\"0\",\"products_id\":\"3\",\"quantity\":\"1\",\"price\":\"123.004\",\"amount\":\"123.004\"}]', '123.004', '123.004', '123.004', 'none', NULL, ''),
(38, 5, 31, NULL, '2021-11-18', '2021-11-20', 'Overdue', '', '[{\"id\":\"0\",\"products_id\":\"3\",\"quantity\":\"1\",\"price\":\"123.004\",\"amount\":\"123.004\"}]', '123.004', '123.004', '123.004', 'none', NULL, ''),
(39, 3, 32, NULL, '2021-11-18', '2021-11-19', 'Overdue', '', '[{\"id\":\"0\",\"products_id\":\"7\",\"quantity\":\"1\",\"price\":\"5678\",\"amount\":\"5678\"}]', '5678', '5678', '5678', 'none', NULL, ''),
(60, 10, 33, NULL, '2021-11-18', '2021-11-21', 'Overdue', '', '[{\"id\":\"0\",\"products_id\":\"8\",\"quantity\":\"1\",\"price\":\"267\",\"amount\":\"267\"}]', '267', '267', '267', 'none', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `mail_subject` text DEFAULT NULL,
  `mail_body` text DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `system_tags` varchar(1000) DEFAULT NULL,
  `system_content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `mail_subject`, `mail_body`, `tags`, `system_tags`, `system_content`) VALUES
(1, 'User invitation form {app_name}', '                                                                                <p>{action_by}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\">     \r\n          </p><p>Hi {receiver_name}</p>\r\n\r\n          <p>Hope this mail finds you well and healthy. We are informing you that you\'ve been invited to our application by {action_by}. It\'ll be a great opportunity to work with you.</p>\r\n          <p><button class=\"btn btn-primary btn-sm\">Accept Invitation</button></p>\r\n\r\n          <p>Thanks & Regards,</p>\r\n\r\n          <p>{app_name}</p><p></p>                                                 ', 'action_by,app_name,app_logo,receiver_name,invitation_url', NULL, NULL),
(2, 'Password reset link provided by {app_name}', '                                              <p><img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>   \r\n          <p>Hi {receiver_name}</p>\r\n\r\n          <p>Your request for reset password has been approved from {app_name}. Press the button below to reset the password.</p>\r\n          <p><a href=\'{link}\' class=\"btn btn-primary btn-sm\">Reset Password</a></p>\r\n          <p>We are highly expecting you as soon as possible. Hope you\'ll join us.</p>\r\n          <p>Thanks for being with us.</p>\r\n\r\n          <p>Thanks &amp; Regards,</p>\r\n\r\n          <p>{app_name}</p>                                         ', 'app_name,app_logo,receiver_name,reset_password_url', NULL, NULL),
(3, 'You have been invited to join {app_name} by {action_by}', '<p>{action_by}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>                                       <p class=\"text_add\"><br></p>      \r\n          <p>Hello {receiver_name}</p>\r\n\r\n          <p>Your Login credentials are given,\r\n          Email : {email}\r\n          Password : {password}\r\n          To set up your account, please use these credentials and go to the following link.</p>\r\n\r\n          <p><button class=\"btn btn-primary btn-sm\">Go to your account</button></p>\r\n          <p>You can change your password from your account password settings.</p>\r\n          <p>Hope you will find useful!</p>\r\n          <p>Thanks for being with us.</p>\r\n          <p>Regards,</p>  \r\n          <p>Thanks & Regards,</p>\r\n\r\n          <p>{app_name}</p>                                    ', 'action_by,app_name,app_logo,receiver_name,invitation_url,email,password', NULL, NULL),
(4, 'Invoice {invoice_number} for due {date}', '                                                      <p class=\"text_add\"><img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n          <p>Hello {receiver_name}</p>\r\n\r\n          <p>I hope you’re well!\r\n          Please see attached invoice {invoice_number}.\r\n          Don’t hesitate to contact us if you have any questions.</p>\r\n\r\n          <p>Thanks for being with us.</p>\r\n\r\n          <p>Regards,</p>  \r\n\r\n          <p>{app_name}</p>                                 ', 'app_name,app_logo,receiver_name,invoice_number,date', NULL, NULL),
(5, 'Payment reminder for invoice {invoice_number}', '                                                <p class=\"text_add\"><img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n          <p>Hello {receiver_name}</p>\r\n\r\n          <p>We hope that you’re enjoying our service\r\n          We did want to quickly mention that we haven’t received payment from you yet.</p>\r\n          <p>If you have any questions don’t hesitate to reply to this email.</p>\r\n          <p>Thanks for being with us.</p>\r\n\r\n          <p>Regards,</p>  \r\n\r\n          <p>{app_name}</p>                              ', 'app_name,app_logo,receiver_name,invoice_number,date', NULL, NULL),
(6, 'A new user has been joined in {app_name}', '                                                                                                                                                                                                                                                                                        <p class=\"text_add\"><img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n            <p>Hi {receiver_name}</p>\r\n\r\n            <p>It\'s a piece of good news that a new user {name} has been joined in our application invited. Hope you will enjoy his work and collaborations.</p>\r\n\r\n            <p>Thanks for being with us.</p>\r\n\r\n            <p>Regards,</p>  \r\n\r\n            <p>{app_name}</p>                                                                                                                                                                                                                                                            ', 'name,action_by,app_name,app_logo,receiver_name,resource_url', 'app_name', 'A new user has been joined in {app_name}{app_name}'),
(7, 'A new roles has been created in {app_name}', '                    <p>{name}{name}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n            <p>Hi {receiver_name}</p>\r\n\r\n            <p>It\'s a piece of good news that a new roles named {name} has been created in our application by {action_by}. Please have a look at that.</p>\r\n\r\n            <p><button class=\"btn btn-primary btn-sm\">View Roles</button></p>\r\n            <p>Thanks for being with us.</p>\r\n\r\n            <p>Regards,</p>  \r\n\r\n            <p>{app_name}</p>                   ', 'name,action_by,app_name,app_logo,receiver_name,resource_url', 'name,action_by', 'A new roles named {name} has been created by {action_by}.'),
(8, 'A roles has been updated in {app_name}', '                    <p>{name}{name}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n            <p>Hi {receiver_name}</p>\r\n\r\n            <p>It\'s a piece of good news that a new roles named {name} has been created in our application by {action_by}. Please have a look at that.</p>\r\n\r\n            <p><button class=\"btn btn-primary btn-sm\">View Roles</button></p>\r\n            <p>Thanks for being with us.</p>         ', 'name,action_by,app_name,app_logo,receiver_name,resource_url', 'name,action_by', 'A roles named {name} has been updated by {action_by}.'),
(9, 'A roles has been deleted in {app_name}', '          <p class=\"text_add\">{name}<img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>      \r\n            <p>Hi {receiver_name}</p>\r\n\r\n            <p>We are going to inform you that a roles named has been deleted from our application by {action_by}.</p>\r\n\r\n            <p>Thanks for being with us.</p>\r\n\r\n            <p>Regards,</p>  \r\n\r\n            <p>{app_name}</p>         ', 'name,action_by,app_name,app_logo,receiver_name', 'name,action_by', 'A roles named {name} has been deleted by {action_by}.'),
(10, 'Password reset link provided by {app_name}', '                                              <p><img src=\"#\" alt=\"logo\" height=\"60px\" style=\"border:1px solid black;\"></p>   \r\n          <p>Hi {receiver_name}</p>\r\n\r\n          <p>Your request for reset password has been approved from {app_name}. Press the button below to reset the password.</p>\r\n          <p><a href=\'{link}\' class=\"btn btn-primary btn-sm\">Reset Password</a></p>\r\n          <p>We are highly expecting you as soon as possible. Hope you\'ll join us.</p>\r\n          <p>Thanks for being with us.</p>\r\n\r\n          <p>Thanks &amp; Regards,</p>\r\n\r\n          <p>{app_name}</p>                                         ', 'app_name,app_logo,receiver_name,reset_password_url', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `receive_date` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoice_number`, `client_id`, `receive_date`, `payment_method`, `amount`, `notes`) VALUES
(1, '3', 1, '2021-10-11', 'cash', '100', '<p>tthank you</p>'),
(2, '2', 1, '2021-10-11', 'cash', '17000', '<p>dfgdg</p>'),
(3, '2', 1, '2021-10-11', 'cash', '20', '<p>dfgdfg</p>'),
(4, '3', 1, '2021-10-11', 'cash', '66', '<p>dfgdgd</p>'),
(5, '1', 3, '2021-10-11', 'cash', '5000', '<p>hello</p>'),
(6, '1', 3, '2021-10-11', 'cash', '3000', '<p>sdfsfs</p>'),
(7, '4', 1, '2021-10-11', 'cash', '5000', '<p>fghfhgfgh</p>'),
(8, '4', 1, '2021-10-11', 'cash', '1000', '<p>hey</p>'),
(9, '7', 3, '2021-10-11', 'cash', '5000', '<p>hello guys</p>'),
(10, '7', 3, '2021-10-11', 'cash', '10000', '<p>ji</p>'),
(14, '6', 1, '2021-10-11', 'cash', '10000', '<p>dfgdg</p>'),
(15, '6', 1, '2021-10-11', 'cash', '7387', '<p>yuy</p>'),
(16, '5', 3, '2021-10-11', 'cash', '5000', '<p>jhgjghj</p>'),
(17, '5', 3, '2021-10-12', 'cash', '1000', '<p>fgdfg</p>'),
(18, '8', 5, '2021-10-13', 'cash', '1000', '<p>jkljh</p>'),
(19, '11', 5, '2021-10-13', 'cash', '2000', '<p>kjjlkj</p>'),
(20, '9', 5, '2021-10-13', 'cash', '5000', '<p>khkhgk</p>'),
(21, '1', 3, '2021-10-31', 'cash', '500', '<p>fghfhgf</p>'),
(22, '3', 1, '2021-10-31', 'cash', '1000', '<p>jkljhl</p>'),
(23, '4', 1, '2021-10-31', 'cash', '1000', '<p>hgjhgj</p>'),
(24, '10', 5, '2021-10-31', 'cash', '1000', '<p>ghngh</p>'),
(25, '10', 5, '2021-10-31', 'cash', '390', '<p>ngng</p>'),
(26, '10', 5, '2021-10-31', 'cash', '500', '<p>rterte</p>'),
(27, '14', 10, '2021-10-31', 'cash', '480', 'Happy codeing'),
(28, '3', 1, '2021-11-03', 'cash', '1900', '<p>fgfgf</p>'),
(29, '2', 1, '2021-11-03', 'cash', '20', '<p>hghg</p>'),
(30, '4', 1, '2021-11-03', 'cash', '4000', '<p>vghngh</p>'),
(31, '10', 5, '2021-11-03', 'cash', '5000', '<p>khykjhk</p>'),
(32, '5', 3, '2021-11-05', 'cash', '5000', '<p>yhfghgv</p>'),
(33, '21', 1, '2021-11-06', 'cash', '1000', '<p>fdgdgf</p>'),
(34, '11', 5, '2021-11-06', 'cash', '1000', '<p>hgdfgdf</p>'),
(35, '21', 1, '2021-11-06', 'cash', '1000', '<p>jkljhkjhk</p>'),
(36, '21', 1, '2021-11-06', 'cash', '1000', '<p>yhfrgf</p>');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `image`, `name`, `code`, `price`, `description`) VALUES
(3, 4, 'rex300x300.jpg', '	Et totam qui quia enim alias.', '791111', '123.004', '<p>ghhjgff</p>'),
(6, 7, 'instaicon400x4001.jpg', 'Accusamus unde nesciunt aut dolores.', '2021', '169', '<p>dfgdsfgs</p>'),
(7, 6, 'res.jpg', 'Accusamus unde nesciunt aut dolores.', '431', '5678', '<p>sdfsfd</p>'),
(8, 3, 'qu.jpg', 'Accusamus unde nesciunt aut dolores.', '79111', '267', '<p>jkljlkj</p>'),
(9, 5, 'rest300x300.jpg', '	Et totam qui quia enim alias.', '2021', '5677', '<p>xcdfgdsgsd</p>'),
(10, 5, 'beauty.jpg', '	Et totam qui quia enim alias.', '79111', '231', '<p>zxczcz</p>'),
(11, 3, 'instaicon400x400.jpg', 'Accusamus unde nesciunt aut dolores.', '2021', '212', '<p>sfsdfs</p>'),
(12, 3, 'naz400x400.jpg', '	Et totam qui quia enim alias.', '7911', '431', 'ghjghjh'),
(20, 11, 'logggo.jpg', 'iphonee', '21', '10500', 'hello fnd');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `settings_name` varchar(255) NOT NULL,
  `settings_title` varchar(255) NOT NULL,
  `settings_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `group_name`, `settings_name`, `settings_title`, `settings_value`) VALUES
(1, 'General', 'company_name', 'Company name', 'billers'),
(2, 'General', 'company_logo', 'Company logo', '03-banner3.jpg'),
(3, 'General', 'company_icon', 'Company icon', 'rex300x300.jpg'),
(4, 'General', 'company_banner', 'Company banner', 'photo-1556742044-3c52d6e88c62.jpg'),
(5, 'General ', 'company_language', 'Company language', 'English'),
(6, 'General', 'company_layout', 'Company layout', 'RTL'),
(7, 'General', 'company_date', 'Company date', 'YYYY.MM.DD'),
(8, 'General', 'company_time', 'Company time', '24 Hours'),
(9, 'General', 'company_time_zone', 'Company time zone', 'Asia/Dhaka'),
(10, 'General', 'currency_symbol', 'Currency symbol', '$'),
(11, 'General', 'decimal_separator', 'Decimal separator', '.'),
(12, 'General', 'thousand_separator', 'Thousand separator', ','),
(13, 'General', 'number_decimal', 'Number decimal', '2'),
(14, 'General', 'currency_position', 'Currency position', '4'),
(15, 'Email_setup', 'sent_from_name', 'sent from name', 'nazmul'),
(16, 'Email_setup', 'supported_mail_services', 'supported mail services', 'smtp'),
(17, 'Email_setup', 'sent_from_email', 'sent from email', 'newest@therssoftware.com'),
(18, 'Email_setup', 'smtp_host', 'Smtp host', 'mail.therssoftware.com'),
(19, 'Email_setup', 'port', 'Port', '465'),
(20, 'Email_setup', 'password_access', 'Password access', 'PLJZQwjHq2b%'),
(21, 'Email_setup', 'encryption_type', 'Encryption type', 'ssl'),
(22, 'Email_setup', 'mailpath', 'Mailpath', '/mail/sendmail/client'),
(23, 'Invoice', 'invoice_logo', 'Invoice logo', 'profile_logo_.jpg'),
(24, 'Invoice', 'invoice_starting_number', 'Invoice starting number', '10'),
(25, 'group_name', 'settings_name', 'settings_title', 'settings_value'),
(32, 'group_name', 'settings_name', 'settings_title', 'settings_value');

-- --------------------------------------------------------

--
-- Table structure for table `settings_payment`
--

CREATE TABLE `settings_payment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `default_field` varchar(255) NOT NULL DEFAULT '1',
  `public_key` varchar(255) DEFAULT NULL,
  `secret_key` varchar(255) DEFAULT NULL,
  `client_id` varchar(255) DEFAULT NULL,
  `mode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_payment`
--

INSERT INTO `settings_payment` (`id`, `name`, `type`, `status`, `default_field`, `public_key`, `secret_key`, `client_id`, `mode`) VALUES
(39, 'abid', 'paypal', 1, '2', 'admin@gmail.com', '81d2017f9a08a6bb9e1cd4ffe7dcd902', 'ad@gmail.com', 'sandbox'),
(40, 'rafi khan', 'cash', 2, '1', NULL, NULL, NULL, NULL),
(57, 'akash', 'cash', 2, '1', 'admin@gmail.com', 'f4cc399f0effd13c888e310ea2cf5399', NULL, NULL),
(64, 'hjjm', 'cash', 1, '1', NULL, NULL, NULL, NULL),
(65, 'nazmul11', 'paypal', 1, '2', NULL, '34b91e5bb99f50c8a0d79c11cfce9a01', 'gjhghj', 'sandbox'),
(66, 'NAz', 'cash', 2, '1', 'fghfh', '14e1b600b1fd579f47433b88e8d85291', NULL, NULL),
(67, 'djj', 'stripe', 1, '2', 'fghfh', '8d7af75abddad0fe5e10e7b1b3b09d6c', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting_taxs`
--

CREATE TABLE `setting_taxs` (
  `id` int(11) NOT NULL,
  `tax_name` varchar(255) DEFAULT NULL,
  `tax_value` int(255) DEFAULT NULL,
  `is_default` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting_taxs`
--

INSERT INTO `setting_taxs` (`id`, `tax_name`, `tax_value`, `is_default`) VALUES
(8, 'sdfdsf', 2, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `timzones`
--

CREATE TABLE `timzones` (
  `id` int(11) NOT NULL,
  `group` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timzones`
--

INSERT INTO `timzones` (`id`, `group`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'US', 'Puerto Rico (Atlantic)', 'America/Puerto_Rico', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(2, 'US', 'New York (Eastern)', 'America/New_York', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(3, 'US', 'Chicago (Central)', 'America/Chicago', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(4, 'US', 'Denver (Mountain)', 'America/Denver', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(5, 'US', 'Phoenix (MST)', 'America/Phoenix', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(6, 'US', 'Los Angeles (Pacific)', 'America/Los_Angeles', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(7, 'US', 'Anchorage (Alaska)', 'America/Anchorage', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(8, 'US', 'Honolulu (Hawaii)', 'Pacific/Honolulu', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(9, 'America', 'Adak', 'America/Adak', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(10, 'America', 'Anchorage', 'America/Anchorage', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(11, 'America', 'Anguilla', 'America/Anguilla', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(12, 'America', 'Antigua', 'America/Antigua', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(13, 'America', 'Araguaina', 'America/Araguaina', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(14, 'America', 'Argentina - Buenos Aires', 'America/Argentina/Buenos_Aires', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(15, 'America', 'Argentina - Catamarca', 'America/Argentina/Catamarca', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(16, 'America', 'Argentina - ComodRivadavia', 'America/Argentina/ComodRivadavia', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(17, 'America', 'Argentina - Cordoba', 'America/Argentina/Cordoba', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(18, 'America', 'Argentina - Jujuy', 'America/Argentina/Jujuy', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(19, 'America', 'Argentina - La Rioja', 'America/Argentina/La_Rioja', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(20, 'America', 'Argentina - Mendoza', 'America/Argentina/Mendoza', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(21, 'America', 'Argentina - Rio Gallegos', 'America/Argentina/Rio_Gallegos', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(22, 'America', 'Argentina - Salta', 'America/Argentina/Salta', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(23, 'America', 'Argentina - San Juan', 'America/Argentina/San_Juan', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(24, 'America', 'Argentina - San Luis', 'America/Argentina/San_Luis', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(25, 'America', 'Argentina - Tucuman', 'America/Argentina/Tucuman', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(26, 'America', 'Argentina - Ushuaia', 'America/Argentina/Ushuaia', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(27, 'America', 'Aruba', 'America/Aruba', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(28, 'America', 'Asuncion', 'America/Asuncion', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(29, 'America', 'Atikokan', 'America/Atikokan', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(30, 'America', 'Atka', 'America/Atka', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(31, 'America', 'Bahia', 'America/Bahia', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(32, 'America', 'Barbados', 'America/Barbados', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(33, 'America', 'Belem', 'America/Belem', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(34, 'America', 'Belize', 'America/Belize', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(35, 'America', 'Blanc-Sablon', 'America/Blanc-Sablon', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(36, 'America', 'Boa Vista', 'America/Boa_Vista', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(37, 'America', 'Bogota', 'America/Bogota', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(38, 'America', 'Boise', 'America/Boise', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(39, 'America', 'Buenos Aires', 'America/Buenos_Aires', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(40, 'America', 'Cambridge Bay', 'America/Cambridge_Bay', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(41, 'America', 'Campo Grande', 'America/Campo_Grande', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(42, 'America', 'Cancun', 'America/Cancun', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(43, 'America', 'Caracas', 'America/Caracas', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(44, 'America', 'Catamarca', 'America/Catamarca', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(45, 'America', 'Cayenne', 'America/Cayenne', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(46, 'America', 'Cayman', 'America/Cayman', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(47, 'America', 'Chicago', 'America/Chicago', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(48, 'America', 'Chihuahua', 'America/Chihuahua', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(49, 'America', 'Coral Harbour', 'America/Coral_Harbour', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(50, 'America', 'Cordoba', 'America/Cordoba', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(51, 'America', 'Costa Rica', 'America/Costa_Rica', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(52, 'America', 'Cuiaba', 'America/Cuiaba', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(53, 'America', 'Curacao', 'America/Curacao', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(54, 'America', 'Danmarkshavn', 'America/Danmarkshavn', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(55, 'America', 'Dawson', 'America/Dawson', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(56, 'America', 'Dawson Creek', 'America/Dawson_Creek', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(57, 'America', 'Denver', 'America/Denver', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(58, 'America', 'Detroit', 'America/Detroit', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(59, 'America', 'Dominica', 'America/Dominica', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(60, 'America', 'Edmonton', 'America/Edmonton', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(61, 'America', 'Eirunepe', 'America/Eirunepe', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(62, 'America', 'El Salvador', 'America/El_Salvador', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(63, 'America', 'Ensenada', 'America/Ensenada', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(64, 'America', 'Fortaleza', 'America/Fortaleza', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(65, 'America', 'Fort Wayne', 'America/Fort_Wayne', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(66, 'America', 'Glace Bay', 'America/Glace_Bay', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(67, 'America', 'Godthab', 'America/Godthab', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(68, 'America', 'Goose Bay', 'America/Goose_Bay', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(69, 'America', 'Grand Turk', 'America/Grand_Turk', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(70, 'America', 'Grenada', 'America/Grenada', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(71, 'America', 'Guadeloupe', 'America/Guadeloupe', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(72, 'America', 'Guatemala', 'America/Guatemala', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(73, 'America', 'Guayaquil', 'America/Guayaquil', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(74, 'America', 'Guyana', 'America/Guyana', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(75, 'America', 'Halifax', 'America/Halifax', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(76, 'America', 'Havana', 'America/Havana', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(77, 'America', 'Hermosillo', 'America/Hermosillo', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(78, 'America', 'Indiana - Indianapolis', 'America/Indiana/Indianapolis', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(79, 'America', 'Indiana - Knox', 'America/Indiana/Knox', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(80, 'America', 'Indiana - Marengo', 'America/Indiana/Marengo', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(81, 'America', 'Indiana - Petersburg', 'America/Indiana/Petersburg', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(82, 'America', 'Indiana - Tell City', 'America/Indiana/Tell_City', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(83, 'America', 'Indiana - Vevay', 'America/Indiana/Vevay', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(84, 'America', 'Indiana - Vincennes', 'America/Indiana/Vincennes', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(85, 'America', 'Indiana - Winamac', 'America/Indiana/Winamac', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(86, 'America', 'Indianapolis', 'America/Indianapolis', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(87, 'America', 'Inuvik', 'America/Inuvik', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(88, 'America', 'Iqaluit', 'America/Iqaluit', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(89, 'America', 'Jamaica', 'America/Jamaica', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(90, 'America', 'Jujuy', 'America/Jujuy', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(91, 'America', 'Juneau', 'America/Juneau', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(92, 'America', 'Kentucky - Louisville', 'America/Kentucky/Louisville', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(93, 'America', 'Kentucky - Monticello', 'America/Kentucky/Monticello', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(94, 'America', 'Knox IN', 'America/Knox_IN', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(95, 'America', 'La Paz', 'America/La_Paz', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(96, 'America', 'Lima', 'America/Lima', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(97, 'America', 'Los Angeles', 'America/Los_Angeles', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(98, 'America', 'Louisville', 'America/Louisville', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(99, 'America', 'Maceio', 'America/Maceio', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(100, 'America', 'Managua', 'America/Managua', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(101, 'America', 'Manaus', 'America/Manaus', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(102, 'America', 'Marigot', 'America/Marigot', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(103, 'America', 'Martinique', 'America/Martinique', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(104, 'America', 'Matamoros', 'America/Matamoros', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(105, 'America', 'Mazatlan', 'America/Mazatlan', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(106, 'America', 'Mendoza', 'America/Mendoza', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(107, 'America', 'Menominee', 'America/Menominee', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(108, 'America', 'Merida', 'America/Merida', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(109, 'America', 'Mexico City', 'America/Mexico_City', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(110, 'America', 'Miquelon', 'America/Miquelon', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(111, 'America', 'Moncton', 'America/Moncton', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(112, 'America', 'Monterrey', 'America/Monterrey', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(113, 'America', 'Montevideo', 'America/Montevideo', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(114, 'America', 'Montreal', 'America/Montreal', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(115, 'America', 'Montserrat', 'America/Montserrat', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(116, 'America', 'Nassau', 'America/Nassau', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(117, 'America', 'New York', 'America/New_York', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(118, 'America', 'Nipigon', 'America/Nipigon', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(119, 'America', 'Nome', 'America/Nome', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(120, 'America', 'Noronha', 'America/Noronha', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(121, 'America', 'North Dakota - Center', 'America/North_Dakota/Center', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(122, 'America', 'North Dakota - New Salem', 'America/North_Dakota/New_Salem', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(123, 'America', 'Ojinaga', 'America/Ojinaga', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(124, 'America', 'Panama', 'America/Panama', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(125, 'America', 'Pangnirtung', 'America/Pangnirtung', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(126, 'America', 'Paramaribo', 'America/Paramaribo', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(127, 'America', 'Phoenix', 'America/Phoenix', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(128, 'America', 'Port-au-Prince', 'America/Port-au-Prince', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(129, 'America', 'Porto Acre', 'America/Porto_Acre', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(130, 'America', 'Port of Spain', 'America/Port_of_Spain', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(131, 'America', 'Porto Velho', 'America/Porto_Velho', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(132, 'America', 'Puerto Rico', 'America/Puerto_Rico', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(133, 'America', 'Rainy River', 'America/Rainy_River', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(134, 'America', 'Rankin Inlet', 'America/Rankin_Inlet', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(135, 'America', 'Recife', 'America/Recife', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(136, 'America', 'Regina', 'America/Regina', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(137, 'America', 'Resolute', 'America/Resolute', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(138, 'America', 'Rio Branco', 'America/Rio_Branco', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(139, 'America', 'Rosario', 'America/Rosario', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(140, 'America', 'Santa Isabel', 'America/Santa_Isabel', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(141, 'America', 'Santarem', 'America/Santarem', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(142, 'America', 'Santiago', 'America/Santiago', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(143, 'America', 'Santo Domingo', 'America/Santo_Domingo', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(144, 'America', 'Sao Paulo', 'America/Sao_Paulo', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(145, 'America', 'Scoresbysund', 'America/Scoresbysund', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(146, 'America', 'Shiprock', 'America/Shiprock', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(147, 'America', 'St Barthelemy', 'America/St_Barthelemy', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(148, 'America', 'St Johns', 'America/St_Johns', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(149, 'America', 'St Kitts', 'America/St_Kitts', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(150, 'America', 'St Lucia', 'America/St_Lucia', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(151, 'America', 'St Thomas', 'America/St_Thomas', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(152, 'America', 'St Vincent', 'America/St_Vincent', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(153, 'America', 'Swift Current', 'America/Swift_Current', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(154, 'America', 'Tegucigalpa', 'America/Tegucigalpa', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(155, 'America', 'Thule', 'America/Thule', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(156, 'America', 'Thunder Bay', 'America/Thunder_Bay', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(157, 'America', 'Tijuana', 'America/Tijuana', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(158, 'America', 'Toronto', 'America/Toronto', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(159, 'America', 'Tortola', 'America/Tortola', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(160, 'America', 'Vancouver', 'America/Vancouver', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(161, 'America', 'Virgin', 'America/Virgin', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(162, 'America', 'Whitehorse', 'America/Whitehorse', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(163, 'America', 'Winnipeg', 'America/Winnipeg', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(164, 'America', 'Yakutat', 'America/Yakutat', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(165, 'America', 'Yellowknife', 'America/Yellowknife', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(166, 'Europe', 'Amsterdam', 'Europe/Amsterdam', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(167, 'Europe', 'Andorra', 'Europe/Andorra', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(168, 'Europe', 'Athens', 'Europe/Athens', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(169, 'Europe', 'Belfast', 'Europe/Belfast', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(170, 'Europe', 'Belgrade', 'Europe/Belgrade', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(171, 'Europe', 'Berlin', 'Europe/Berlin', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(172, 'Europe', 'Bratislava', 'Europe/Bratislava', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(173, 'Europe', 'Brussels', 'Europe/Brussels', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(174, 'Europe', 'Bucharest', 'Europe/Bucharest', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(175, 'Europe', 'Budapest', 'Europe/Budapest', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(176, 'Europe', 'Chisinau', 'Europe/Chisinau', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(177, 'Europe', 'Copenhagen', 'Europe/Copenhagen', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(178, 'Europe', 'Dublin', 'Europe/Dublin', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(179, 'Europe', 'Gibraltar', 'Europe/Gibraltar', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(180, 'Europe', 'Guernsey', 'Europe/Guernsey', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(181, 'Europe', 'Helsinki', 'Europe/Helsinki', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(182, 'Europe', 'Isle of Man', 'Europe/Isle_of_Man', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(183, 'Europe', 'Istanbul', 'Europe/Istanbul', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(184, 'Europe', 'Jersey', 'Europe/Jersey', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(185, 'Europe', 'Kaliningrad', 'Europe/Kaliningrad', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(186, 'Europe', 'Kiev', 'Europe/Kiev', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(187, 'Europe', 'Lisbon', 'Europe/Lisbon', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(188, 'Europe', 'Ljubljana', 'Europe/Ljubljana', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(189, 'Europe', 'London', 'Europe/London', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(190, 'Europe', 'Luxembourg', 'Europe/Luxembourg', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(191, 'Europe', 'Madrid', 'Europe/Madrid', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(192, 'Europe', 'Malta', 'Europe/Malta', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(193, 'Europe', 'Mariehamn', 'Europe/Mariehamn', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(194, 'Europe', 'Minsk', 'Europe/Minsk', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(195, 'Europe', 'Monaco', 'Europe/Monaco', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(196, 'Europe', 'Moscow', 'Europe/Moscow', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(197, 'Europe', 'Nicosia', 'Europe/Nicosia', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(198, 'Europe', 'Oslo', 'Europe/Oslo', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(199, 'Europe', 'Paris', 'Europe/Paris', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(200, 'Europe', 'Podgorica', 'Europe/Podgorica', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(201, 'Europe', 'Prague', 'Europe/Prague', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(202, 'Europe', 'Riga', 'Europe/Riga', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(203, 'Europe', 'Rome', 'Europe/Rome', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(204, 'Europe', 'Samara', 'Europe/Samara', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(205, 'Europe', 'San Marino', 'Europe/San_Marino', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(206, 'Europe', 'Sarajevo', 'Europe/Sarajevo', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(207, 'Europe', 'Simferopol', 'Europe/Simferopol', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(208, 'Europe', 'Skopje', 'Europe/Skopje', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(209, 'Europe', 'Sofia', 'Europe/Sofia', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(210, 'Europe', 'Stockholm', 'Europe/Stockholm', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(211, 'Europe', 'Tallinn', 'Europe/Tallinn', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(212, 'Europe', 'Tirane', 'Europe/Tirane', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(213, 'Europe', 'Tiraspol', 'Europe/Tiraspol', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(214, 'Europe', 'Uzhgorod', 'Europe/Uzhgorod', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(215, 'Europe', 'Vaduz', 'Europe/Vaduz', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(216, 'Europe', 'Vatican', 'Europe/Vatican', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(217, 'Europe', 'Vienna', 'Europe/Vienna', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(218, 'Europe', 'Vilnius', 'Europe/Vilnius', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(219, 'Europe', 'Volgograd', 'Europe/Volgograd', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(220, 'Europe', 'Warsaw', 'Europe/Warsaw', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(221, 'Europe', 'Zagreb', 'Europe/Zagreb', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(222, 'Europe', 'Zaporozhye', 'Europe/Zaporozhye', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(223, 'Europe', 'Zurich', 'Europe/Zurich', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(224, 'Asia', 'Aden', 'Asia/Aden', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(225, 'Asia', 'Almaty', 'Asia/Almaty', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(226, 'Asia', 'Amman', 'Asia/Amman', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(227, 'Asia', 'Anadyr', 'Asia/Anadyr', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(228, 'Asia', 'Aqtau', 'Asia/Aqtau', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(229, 'Asia', 'Aqtobe', 'Asia/Aqtobe', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(230, 'Asia', 'Ashgabat', 'Asia/Ashgabat', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(231, 'Asia', 'Ashkhabad', 'Asia/Ashkhabad', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(232, 'Asia', 'Baghdad', 'Asia/Baghdad', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(233, 'Asia', 'Bahrain', 'Asia/Bahrain', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(234, 'Asia', 'Baku', 'Asia/Baku', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(235, 'Asia', 'Bangkok', 'Asia/Bangkok', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(236, 'Asia', 'Beirut', 'Asia/Beirut', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(237, 'Asia', 'Bishkek', 'Asia/Bishkek', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(238, 'Asia', 'Brunei', 'Asia/Brunei', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(239, 'Asia', 'Calcutta', 'Asia/Calcutta', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(240, 'Asia', 'Choibalsan', 'Asia/Choibalsan', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(241, 'Asia', 'Chongqing', 'Asia/Chongqing', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(242, 'Asia', 'Chungking', 'Asia/Chungking', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(243, 'Asia', 'Colombo', 'Asia/Colombo', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(244, 'Asia', 'Dacca', 'Asia/Dacca', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(245, 'Asia', 'Damascus', 'Asia/Damascus', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(246, 'Asia', 'Dhaka', 'Asia/Dhaka', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(247, 'Asia', 'Dili', 'Asia/Dili', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(248, 'Asia', 'Dubai', 'Asia/Dubai', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(249, 'Asia', 'Dushanbe', 'Asia/Dushanbe', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(250, 'Asia', 'Gaza', 'Asia/Gaza', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(251, 'Asia', 'Harbin', 'Asia/Harbin', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(252, 'Asia', 'Ho Chi Minh', 'Asia/Ho_Chi_Minh', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(253, 'Asia', 'Hong Kong', 'Asia/Hong_Kong', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(254, 'Asia', 'Hovd', 'Asia/Hovd', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(255, 'Asia', 'Irkutsk', 'Asia/Irkutsk', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(256, 'Asia', 'Istanbul', 'Asia/Istanbul', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(257, 'Asia', 'Jakarta', 'Asia/Jakarta', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(258, 'Asia', 'Jayapura', 'Asia/Jayapura', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(259, 'Asia', 'Jerusalem', 'Asia/Jerusalem', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(260, 'Asia', 'Kabul', 'Asia/Kabul', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(261, 'Asia', 'Kamchatka', 'Asia/Kamchatka', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(262, 'Asia', 'Karachi', 'Asia/Karachi', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(263, 'Asia', 'Kashgar', 'Asia/Kashgar', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(264, 'Asia', 'Kathmandu', 'Asia/Kathmandu', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(265, 'Asia', 'Katmandu', 'Asia/Katmandu', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(266, 'Asia', 'Kolkata', 'Asia/Kolkata', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(267, 'Asia', 'Krasnoyarsk', 'Asia/Krasnoyarsk', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(268, 'Asia', 'Kuala Lumpur', 'Asia/Kuala_Lumpur', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(269, 'Asia', 'Kuching', 'Asia/Kuching', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(270, 'Asia', 'Kuwait', 'Asia/Kuwait', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(271, 'Asia', 'Macao', 'Asia/Macao', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(272, 'Asia', 'Macau', 'Asia/Macau', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(273, 'Asia', 'Magadan', 'Asia/Magadan', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(274, 'Asia', 'Makassar', 'Asia/Makassar', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(275, 'Asia', 'Manila', 'Asia/Manila', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(276, 'Asia', 'Muscat', 'Asia/Muscat', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(277, 'Asia', 'Nicosia', 'Asia/Nicosia', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(278, 'Asia', 'Novokuznetsk', 'Asia/Novokuznetsk', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(279, 'Asia', 'Novosibirsk', 'Asia/Novosibirsk', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(280, 'Asia', 'Omsk', 'Asia/Omsk', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(281, 'Asia', 'Oral', 'Asia/Oral', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(282, 'Asia', 'Phnom Penh', 'Asia/Phnom_Penh', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(283, 'Asia', 'Pontianak', 'Asia/Pontianak', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(284, 'Asia', 'Pyongyang', 'Asia/Pyongyang', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(285, 'Asia', 'Qatar', 'Asia/Qatar', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(286, 'Asia', 'Qyzylorda', 'Asia/Qyzylorda', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(287, 'Asia', 'Rangoon', 'Asia/Rangoon', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(288, 'Asia', 'Riyadh', 'Asia/Riyadh', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(289, 'Asia', 'Saigon', 'Asia/Saigon', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(290, 'Asia', 'Sakhalin', 'Asia/Sakhalin', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(291, 'Asia', 'Samarkand', 'Asia/Samarkand', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(292, 'Asia', 'Seoul', 'Asia/Seoul', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(293, 'Asia', 'Shanghai', 'Asia/Shanghai', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(294, 'Asia', 'Singapore', 'Asia/Singapore', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(295, 'Asia', 'Taipei', 'Asia/Taipei', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(296, 'Asia', 'Tashkent', 'Asia/Tashkent', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(297, 'Asia', 'Tbilisi', 'Asia/Tbilisi', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(298, 'Asia', 'Tehran', 'Asia/Tehran', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(299, 'Asia', 'Tel Aviv', 'Asia/Tel_Aviv', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(300, 'Asia', 'Thimbu', 'Asia/Thimbu', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(301, 'Asia', 'Thimphu', 'Asia/Thimphu', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(302, 'Asia', 'Tokyo', 'Asia/Tokyo', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(303, 'Asia', 'Ujung Pandang', 'Asia/Ujung_Pandang', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(304, 'Asia', 'Ulaanbaatar', 'Asia/Ulaanbaatar', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(305, 'Asia', 'Ulan Bator', 'Asia/Ulan_Bator', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(306, 'Asia', 'Urumqi', 'Asia/Urumqi', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(307, 'Asia', 'Vientiane', 'Asia/Vientiane', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(308, 'Asia', 'Vladivostok', 'Asia/Vladivostok', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(309, 'Asia', 'Yakutsk', 'Asia/Yakutsk', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(310, 'Asia', 'Yekaterinburg', 'Asia/Yekaterinburg', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(311, 'Asia', 'Yerevan', 'Asia/Yerevan', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(312, 'Africa', 'Abidjan', 'Africa/Abidjan', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(313, 'Africa', 'Accra', 'Africa/Accra', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(314, 'Africa', 'Addis Ababa', 'Africa/Addis_Ababa', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(315, 'Africa', 'Algiers', 'Africa/Algiers', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(316, 'Africa', 'Asmara', 'Africa/Asmara', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(317, 'Africa', 'Asmera', 'Africa/Asmera', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(318, 'Africa', 'Bamako', 'Africa/Bamako', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(319, 'Africa', 'Bangui', 'Africa/Bangui', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(320, 'Africa', 'Banjul', 'Africa/Banjul', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(321, 'Africa', 'Bissau', 'Africa/Bissau', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(322, 'Africa', 'Blantyre', 'Africa/Blantyre', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(323, 'Africa', 'Brazzaville', 'Africa/Brazzaville', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(324, 'Africa', 'Bujumbura', 'Africa/Bujumbura', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(325, 'Africa', 'Cairo', 'Africa/Cairo', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(326, 'Africa', 'Casablanca', 'Africa/Casablanca', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(327, 'Africa', 'Ceuta', 'Africa/Ceuta', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(328, 'Africa', 'Conakry', 'Africa/Conakry', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(329, 'Africa', 'Dakar', 'Africa/Dakar', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(330, 'Africa', 'Dar es Salaam', 'Africa/Dar_es_Salaam', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(331, 'Africa', 'Djibouti', 'Africa/Djibouti', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(332, 'Africa', 'Douala', 'Africa/Douala', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(333, 'Africa', 'El Aaiun', 'Africa/El_Aaiun', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(334, 'Africa', 'Freetown', 'Africa/Freetown', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(335, 'Africa', 'Gaborone', 'Africa/Gaborone', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(336, 'Africa', 'Harare', 'Africa/Harare', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(337, 'Africa', 'Johannesburg', 'Africa/Johannesburg', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(338, 'Africa', 'Kampala', 'Africa/Kampala', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(339, 'Africa', 'Khartoum', 'Africa/Khartoum', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(340, 'Africa', 'Kigali', 'Africa/Kigali', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(341, 'Africa', 'Kinshasa', 'Africa/Kinshasa', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(342, 'Africa', 'Lagos', 'Africa/Lagos', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(343, 'Africa', 'Libreville', 'Africa/Libreville', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(344, 'Africa', 'Lome', 'Africa/Lome', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(345, 'Africa', 'Luanda', 'Africa/Luanda', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(346, 'Africa', 'Lubumbashi', 'Africa/Lubumbashi', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(347, 'Africa', 'Lusaka', 'Africa/Lusaka', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(348, 'Africa', 'Malabo', 'Africa/Malabo', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(349, 'Africa', 'Maputo', 'Africa/Maputo', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(350, 'Africa', 'Maseru', 'Africa/Maseru', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(351, 'Africa', 'Mbabane', 'Africa/Mbabane', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(352, 'Africa', 'Mogadishu', 'Africa/Mogadishu', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(353, 'Africa', 'Monrovia', 'Africa/Monrovia', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(354, 'Africa', 'Nairobi', 'Africa/Nairobi', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(355, 'Africa', 'Ndjamena', 'Africa/Ndjamena', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(356, 'Africa', 'Niamey', 'Africa/Niamey', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(357, 'Africa', 'Nouakchott', 'Africa/Nouakchott', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(358, 'Africa', 'Ouagadougou', 'Africa/Ouagadougou', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(359, 'Africa', 'Porto-Novo', 'Africa/Porto-Novo', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(360, 'Africa', 'Sao Tome', 'Africa/Sao_Tome', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(361, 'Africa', 'Timbuktu', 'Africa/Timbuktu', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(362, 'Africa', 'Tripoli', 'Africa/Tripoli', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(363, 'Africa', 'Tunis', 'Africa/Tunis', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(364, 'Africa', 'Windhoek', 'Africa/Windhoek', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(365, 'Australia', 'ACT', 'Australia/ACT', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(366, 'Australia', 'Adelaide', 'Australia/Adelaide', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(367, 'Australia', 'Brisbane', 'Australia/Brisbane', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(368, 'Australia', 'Broken Hill', 'Australia/Broken_Hill', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(369, 'Australia', 'Canberra', 'Australia/Canberra', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(370, 'Australia', 'Currie', 'Australia/Currie', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(371, 'Australia', 'Darwin', 'Australia/Darwin', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(372, 'Australia', 'Eucla', 'Australia/Eucla', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(373, 'Australia', 'Hobart', 'Australia/Hobart', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(374, 'Australia', 'LHI', 'Australia/LHI', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(375, 'Australia', 'Lindeman', 'Australia/Lindeman', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(376, 'Australia', 'Lord Howe', 'Australia/Lord_Howe', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(377, 'Australia', 'Melbourne', 'Australia/Melbourne', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(378, 'Australia', 'North', 'Australia/North', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(379, 'Australia', 'NSW', 'Australia/NSW', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(380, 'Australia', 'Perth', 'Australia/Perth', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(381, 'Australia', 'Queensland', 'Australia/Queensland', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(382, 'Australia', 'South', 'Australia/South', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(383, 'Australia', 'Sydney', 'Australia/Sydney', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(384, 'Australia', 'Tasmania', 'Australia/Tasmania', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(385, 'Australia', 'Victoria', 'Australia/Victoria', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(386, 'Australia', 'West', 'Australia/West', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(387, 'Australia', 'Yancowinna', 'Australia/Yancowinna', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(388, 'Indian', 'Antananarivo', 'Indian/Antananarivo', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(389, 'Indian', 'Chagos', 'Indian/Chagos', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(390, 'Indian', 'Christmas', 'Indian/Christmas', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(391, 'Indian', 'Cocos', 'Indian/Cocos', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(392, 'Indian', 'Comoro', 'Indian/Comoro', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(393, 'Indian', 'Kerguelen', 'Indian/Kerguelen', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(394, 'Indian', 'Mahe', 'Indian/Mahe', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(395, 'Indian', 'Maldives', 'Indian/Maldives', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(396, 'Indian', 'Mauritius', 'Indian/Mauritius', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(397, 'Indian', 'Mayotte', 'Indian/Mayotte', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(398, 'Indian', 'Reunion', 'Indian/Reunion', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(399, 'Atlantic', 'Azores', 'Atlantic/Azores', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(400, 'Atlantic', 'Bermuda', 'Atlantic/Bermuda', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(401, 'Atlantic', 'Canary', 'Atlantic/Canary', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(402, 'Atlantic', 'Cape Verde', 'Atlantic/Cape_Verde', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(403, 'Atlantic', 'Faeroe', 'Atlantic/Faeroe', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(404, 'Atlantic', 'Faroe', 'Atlantic/Faroe', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(405, 'Atlantic', 'Jan Mayen', 'Atlantic/Jan_Mayen', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(406, 'Atlantic', 'Madeira', 'Atlantic/Madeira', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(407, 'Atlantic', 'Reykjavik', 'Atlantic/Reykjavik', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(408, 'Atlantic', 'South Georgia', 'Atlantic/South_Georgia', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(409, 'Atlantic', 'Stanley', 'Atlantic/Stanley', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(410, 'Atlantic', 'St Helena', 'Atlantic/St_Helena', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(411, 'Pacific', 'Apia', 'Pacific/Apia', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(412, 'Pacific', 'Auckland', 'Pacific/Auckland', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(413, 'Pacific', 'Chatham', 'Pacific/Chatham', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(414, 'Pacific', 'Easter', 'Pacific/Easter', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(415, 'Pacific', 'Efate', 'Pacific/Efate', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(416, 'Pacific', 'Enderbury', 'Pacific/Enderbury', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(417, 'Pacific', 'Fakaofo', 'Pacific/Fakaofo', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(418, 'Pacific', 'Fiji', 'Pacific/Fiji', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(419, 'Pacific', 'Funafuti', 'Pacific/Funafuti', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(420, 'Pacific', 'Galapagos', 'Pacific/Galapagos', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(421, 'Pacific', 'Gambier', 'Pacific/Gambier', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(422, 'Pacific', 'Guadalcanal', 'Pacific/Guadalcanal', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(423, 'Pacific', 'Guam', 'Pacific/Guam', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(424, 'Pacific', 'Honolulu', 'Pacific/Honolulu', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(425, 'Pacific', 'Johnston', 'Pacific/Johnston', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(426, 'Pacific', 'Kiritimati', 'Pacific/Kiritimati', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(427, 'Pacific', 'Kosrae', 'Pacific/Kosrae', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(428, 'Pacific', 'Kwajalein', 'Pacific/Kwajalein', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(429, 'Pacific', 'Majuro', 'Pacific/Majuro', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(430, 'Pacific', 'Marquesas', 'Pacific/Marquesas', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(431, 'Pacific', 'Midway', 'Pacific/Midway', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(432, 'Pacific', 'Nauru', 'Pacific/Nauru', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(433, 'Pacific', 'Niue', 'Pacific/Niue', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(434, 'Pacific', 'Norfolk', 'Pacific/Norfolk', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(435, 'Pacific', 'Noumea', 'Pacific/Noumea', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(436, 'Pacific', 'Pago Pago', 'Pacific/Pago_Pago', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(437, 'Pacific', 'Palau', 'Pacific/Palau', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(438, 'Pacific', 'Pitcairn', 'Pacific/Pitcairn', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(439, 'Pacific', 'Ponape', 'Pacific/Ponape', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(440, 'Pacific', 'Port Moresby', 'Pacific/Port_Moresby', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(441, 'Pacific', 'Rarotonga', 'Pacific/Rarotonga', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(442, 'Pacific', 'Saipan', 'Pacific/Saipan', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(443, 'Pacific', 'Samoa', 'Pacific/Samoa', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(444, 'Pacific', 'Tahiti', 'Pacific/Tahiti', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(445, 'Pacific', 'Tarawa', 'Pacific/Tarawa', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(446, 'Pacific', 'Tongatapu', 'Pacific/Tongatapu', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(447, 'Pacific', 'Truk', 'Pacific/Truk', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(448, 'Pacific', 'Wake', 'Pacific/Wake', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(449, 'Pacific', 'Wallis', 'Pacific/Wallis', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(450, 'Pacific', 'Yap', 'Pacific/Yap', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(451, 'Antarctica', 'Casey', 'Antarctica/Casey', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(452, 'Antarctica', 'Davis', 'Antarctica/Davis', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(453, 'Antarctica', 'DumontDUrville', 'Antarctica/DumontDUrville', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(454, 'Antarctica', 'Macquarie', 'Antarctica/Macquarie', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(455, 'Antarctica', 'Mawson', 'Antarctica/Mawson', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(456, 'Antarctica', 'McMurdo', 'Antarctica/McMurdo', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(457, 'Antarctica', 'Palmer', 'Antarctica/Palmer', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(458, 'Antarctica', 'Rothera', 'Antarctica/Rothera', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(459, 'Antarctica', 'South Pole', 'Antarctica/South_Pole', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(460, 'Antarctica', 'Syowa', 'Antarctica/Syowa', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(461, 'Antarctica', 'Vostok', 'Antarctica/Vostok', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(462, 'Arctic', 'Longyearbyen', 'Arctic/Longyearbyen', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(463, 'UTC', 'UTC', 'UTC', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(464, 'Manual Offsets', 'UTC-12', 'UTC-12', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(465, 'Manual Offsets', 'UTC-11', 'UTC-11', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(466, 'Manual Offsets', 'UTC-10', 'UTC-10', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(467, 'Manual Offsets', 'UTC-9', 'UTC-9', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(468, 'Manual Offsets', 'UTC-8', 'UTC-8', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(469, 'Manual Offsets', 'UTC-7', 'UTC-7', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(470, 'Manual Offsets', 'UTC-6', 'UTC-6', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(471, 'Manual Offsets', 'UTC-5', 'UTC-5', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(472, 'Manual Offsets', 'UTC-4', 'UTC-4', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(473, 'Manual Offsets', 'UTC-3', 'UTC-3', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(474, 'Manual Offsets', 'UTC-2', 'UTC-2', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(475, 'Manual Offsets', 'UTC-1', 'UTC-1', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(476, 'Manual Offsets', 'UTC+0', 'UTC+0', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(477, 'Manual Offsets', 'UTC+1', 'UTC+1', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(478, 'Manual Offsets', 'UTC+2', 'UTC+2', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(479, 'Manual Offsets', 'UTC+3', 'UTC+3', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(480, 'Manual Offsets', 'UTC+4', 'UTC+4', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(481, 'Manual Offsets', 'UTC+5', 'UTC+5', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(482, 'Manual Offsets', 'UTC+6', 'UTC+6', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(483, 'Manual Offsets', 'UTC+7', 'UTC+7', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(484, 'Manual Offsets', 'UTC+8', 'UTC+8', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(485, 'Manual Offsets', 'UTC+9', 'UTC+9', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(486, 'Manual Offsets', 'UTC+10', 'UTC+10', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(487, 'Manual Offsets', 'UTC+11', 'UTC+11', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(488, 'Manual Offsets', 'UTC+12', 'UTC+12', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(489, 'Manual Offsets', 'UTC+13', 'UTC+13', '2021-10-26 10:35:11', '2021-10-26 10:35:11'),
(490, 'Manual Offsets', 'UTC+14', 'UTC+14', '2021-10-26 10:35:11', '2021-10-26 10:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `last_login` varchar(255) DEFAULT NULL,
  `last_logout` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `gender`, `contact_number`, `address`, `date_of_birth`, `password`, `password_reset_token`, `user_type`, `status`, `image`, `last_login`, `last_logout`, `ip_address`) VALUES
(1, 'Nazmul', 'Hossainnn', 'nazmul@gmail.com', 'male', '01963555692', 'comilla                                                                                                                                                                                                                                                        ', '1998-01-03', '25d55ad283aa400af464c76d713c07ad', 'VnkgKzqE', 'admin', 'active', 'img_avatar.png', '2021-11-20 06:03:35', '2021-11-20 05:43:26', '::1'),
(4, 'abid', 'khan', 'abid@gmail.com', 'male', '01762134211', '    chadpur                                                                                      ', '1997-01-03', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'client', 'inactive', 'logggo.jpg', '2021-11-18 01:49:32', '2021-11-18 01:49:59', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_payment`
--
ALTER TABLE `settings_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_taxs`
--
ALTER TABLE `setting_taxs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timzones`
--
ALTER TABLE `timzones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `settings_payment`
--
ALTER TABLE `settings_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `setting_taxs`
--
ALTER TABLE `setting_taxs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `timzones`
--
ALTER TABLE `timzones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=491;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
