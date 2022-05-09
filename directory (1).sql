-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2022 at 12:03 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `directory`
--

-- --------------------------------------------------------

--
-- Table structure for table `arch_client_req_tbl`
--

DROP TABLE IF EXISTS `arch_client_req_tbl`;
CREATE TABLE IF NOT EXISTS `arch_client_req_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `desig` varchar(255) CHARACTER SET latin1 NOT NULL,
  `mobile` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `institute_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `bed_qty` int(11) NOT NULL,
  `org_address` text CHARACTER SET latin1 NOT NULL,
  `org_type` smallint(5) NOT NULL,
  `status` smallint(5) DEFAULT NULL,
  `assign_to` smallint(5) DEFAULT NULL,
  `req_type` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `district` int(10) DEFAULT NULL,
  `thana` int(10) DEFAULT NULL,
  `remarks` text CHARACTER SET latin1,
  `req_date` datetime DEFAULT NULL,
  `req_by` tinyint(3) UNSIGNED NOT NULL,
  `next_followup_date` date DEFAULT NULL,
  `last_followup_date` date DEFAULT NULL,
  `update_date` date DEFAULT NULL,
  `update_by` smallint(5) DEFAULT NULL,
  `header_image` varchar(255) DEFAULT NULL,
  `gallery` text,
  `contact_number` varchar(255) DEFAULT NULL COMMENT 'receptions number or 2nd contact number',
  `intro_text` text COMMENT 'Company Some Intro Text',
  `web_link` varchar(255) DEFAULT NULL COMMENT 'website link',
  `fb_link` varchar(255) DEFAULT NULL COMMENT 'hospital fb page link',
  `mlink` text COMMENT 'google map link',
  `bname` varchar(255) DEFAULT NULL,
  `slug_url` varchar(255) DEFAULT NULL,
  `approved_status` tinyint(1) DEFAULT NULL COMMENT 'pending, approved, complain ',
  `hits` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `arch_client_req_tbl`
--

INSERT INTO `arch_client_req_tbl` (`id`, `name`, `desig`, `mobile`, `email`, `institute_name`, `bed_qty`, `org_address`, `org_type`, `status`, `assign_to`, `req_type`, `district`, `thana`, `remarks`, `req_date`, `req_by`, `next_followup_date`, `last_followup_date`, `update_date`, `update_by`, `header_image`, `gallery`, `contact_number`, `intro_text`, `web_link`, `fb_link`, `mlink`, `bname`, `slug_url`, `approved_status`, `hits`) VALUES
(9, 'Md. Mohiuddin', 'Doctor', '01844000000', 'mdmohiuddin.diu@gmail.com', 'Mir Hospital LTD', 50, 'amar barite', 1, 1, 15, 'Price', 1, 494, 'wwq', '2021-09-07 14:01:28', 0, NULL, NULL, '2021-10-30', 14, '617cd9d0492bb1440.jpg', '617cd9d04973b6942.jpeg,617cd9d0499d44923.jpg,617cd9d049c5f4564.jpg', '01785294437', ' the printing and typesetting industry. Lorem Ipsum has been ', 'https://esteemsoftbd.com/', 'https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/DrZainalAbedinJewel/&tabs=timeline&width=420&height=450&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId', NULL, 'মীর হাসপাতাল লিমিটেড', 'mir-hospital-ltd', 2, 15),
(3, 'Mohi', 'Doctor', '01844004903', '1@1.com', 'akhono banano hoini', 200, 'House: 77 lavel 2& 3, Road:2,Block-A Basundarah  R/A Dhaka-1229', 1, 1, 26, 'Demo', 38, 33, '', '2019-08-28 10:32:52', 0, '2019-09-15', NULL, '2021-12-14', 14, '617cd96ea47b81764.jpg', '617cd96ea4ba43041.jpg,617cd96ea4e246519.jpg,617cd96ea50871266.jpg', '123456789,123456789', 'This is a best hospital in the word located in the main point in Singapur', 'https://esteemsoftbd.com/', 'https://www.facebook.com/esteemsoft', NULL, 'হাসপাতাল লি', 'akhono-banano-hoini', 2, 12),
(4, 'Mohi uddin', 'Doctor', '1844004903', 'mdmohiuddin.diu@gmail.com', 'test institute', 1230, 'House: 77 lavel 2& 3, Road:2,Block-A Basundarah  R/A Dhaka-1229', 1, 2, 26, 'Refer', 1, 493, 'ssasa', '2019-08-29 06:15:32', 0, '2019-08-30', '2019-08-29', '2021-12-15', 14, '617cd9844c4dc3487.jpg', '617cd9844c8b56896.jpg,617cd9844d0e07605.jpg,617cd9844d5a63954.jpg', '123456789,123456789', '', 'https://esteemsoftbd.com/', 'https://www.facebook.com/esteemsoft', '', 'হাসপাতাল লি', 'test-institute', 1, 15),
(7, 'Md. Mohiuddin', 'Doctor', '01844000000', 'mdmohiuddin.diu@gmail.com', 'Ab Hospital', 500, 'amar barite', 2, 2, 6, 'camp', 2, 150, 'ssd', '2021-01-07 15:16:58', 0, '2021-09-07', '2021-01-07', '2021-12-06', 14, '', '617cd9af4eb847443.jpg,617cd9af4edf51949.jpg,617cd9af4f05f4672.jpg', '123456789,123456789', 'This is a best hospital in the word located in the main point in Singapur', 'https://esteemsoftbd.com/', 'https://www.facebook.com/esteemsoft', NULL, 'এ বি হাসপাতাল ', 'ab-hospital', 1, 9),
(8, 'Md. Mohiuddin', 'Doctor', '01844000000', 'mdmohiuddin.diu@gmail.com', 'Abdullah Hospital', 370, 'amar barite', 1, 2, 15, 'Price', 1, 497, '', '2021-03-16 12:25:56', 0, '2021-09-07', '2021-06-08', '2021-11-30', 14, '617cd9c08e4569325.jpg', '617cd9c08e8251146.jpg,617cd9c08eb666458.jpg,617cd9c08ee0a4688.webp', '01478523697', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum ', 'https://esteemsoftbd.com/', 'https://www.facebook.com/esteemsoft', NULL, 'আব্দুল্লাহ হাসপাতাল ', 'abdullah-hospital', 2, 5),
(32, 'Birdem', 'doctor', '01785294465', 'birdem@gmail.com', 'Birdem Hospital ltd', 150, 'Shabag, Dhaka', 1, NULL, NULL, NULL, 1, 533, 'yes', '2021-10-25 11:54:14', 14, NULL, NULL, '2021-12-15', 14, '617cdaa74969f5849.jpeg', '617cda63195436389.jpg,617cda63198dd7808.jpg,617cda6319bbd4368.jpg', '01745253436', 'Birdem is one of the best government hospital in bangladesh', '', 'https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/DrZainalAbedinJewel/&tabs=timeline&width=420&height=450&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.239182444645!2d90.39429341429668!3d23.738848695135893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8eb2cd9b849%3A0x7c213c924dd2d324!2sBIRDEM%20General%20Hospital!5e0!3m2!1sen!2sbd!4v1639558435974!5m2!1sen!2sbd', 'বারডেম হাসপাতাল লি', 'bardem-hospital-ltd', 1, 68),
(63, 'witty', 'doctor', '09876543212', 'eeeee@email.com', 'Rangpur Medical College', 900, 'tttttt', 1, NULL, NULL, 'Demo', 1, 494, 'y', '2021-11-06 11:50:56', 14, NULL, NULL, '2021-12-20', 14, '6194b6c7a33067499.jpg', NULL, '01785294437', '', '', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3593.1054766122534!2d89.22936381433975!3d25.767079414668085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e331f20bdeeb67%3A0xd2d683a2a8c7c7bf!2sRangpur%20Medical%20College%20Hospital%2C%20Rangpur!5e0!3m2!1sen!2sbd!4v1639983497466!5m2!1sen!2sbd', 'হাসপাতাল লি', 'rangpur-medical-college', 2, 24),
(62, 'lakecity', 'doctors', '01876543212', 'lakecity@gmail.com', 'Lakecity hospital', 12, 'lakecity concordsss', 1, NULL, NULL, 'Demo', 1, 516, 'yes', '2021-11-01 14:46:35', 14, NULL, NULL, '2021-12-12', 14, '617fa96bd49e69244.jpg', '617fa96bd56332549.jpg', '01785294437,017565656', 'we are always ready to give proper service', 'esteemsoftbd.com/', 'https://www.facebook.com/', NULL, 'হাসপাতাল লি', 'lakecity-hospital', 2, 22),
(61, 'witty', 'doctor', '09876543212', 'ri@gmail.com', 'Bashundhara haspital', 12, 'rrrrrs', 1, NULL, NULL, 'demo', 21, 0, 'ttt', '2021-11-01 11:29:08', 14, NULL, NULL, '2021-12-19', 14, '61af255f5f4f26039.jpg', '617f7b24ea79b6153.jpg,617f7b24eab086526.jpg,61af25847b1581888.jpg', '01785294437', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a ', 'https://esteemsoftbd.com/', 'https://www.facebook.com/', '', 'হাসপাতাল লি', 'bashundharaa', 2, 22),
(60, 'witty', 'doctor', '09876543212', 'ri@gmail.com', 'Talertech', 10, '', 1, NULL, NULL, 'Price', 4, 168, '', '2021-11-01 11:24:23', 14, NULL, NULL, '2021-12-19', 14, '6194f8db56e964836.jpg', '6194f8db57b6c5829.jpg,6194f8db57f016745.jpg,6194f8db582d56074.jpg', '01785294437', '', '', '', '', '', 'talertech', 2, 10),
(59, 'Adhunic hospital', 'doctor', '09876543212', 'ri@gmail.com', 'Bangladesh Hospital', 26, 'Uttara,  Dhaka', 1, NULL, NULL, 'Demo', 1, 541, 'yes', '2021-11-01 10:59:54', 14, NULL, NULL, '2021-12-19', 14, '617f7bec6ed865460.jpg', '61aeeb1b0042b9344.jpeg', '01785294437', '<p>LOREM IPSUM</p>', 'https://esteemsoftbd.com/', 'https://www.facebook.com/', '', 'বাংলাদেশ  হাসপাতাল ', 'bangladesh-hospital', 2, 55),
(58, 'Arch ', 'doctor', '09876543212', 'eeeee@email.com', 'Navy Hospital', 18, 'ttttttttttt', 1, NULL, NULL, 'demo', 10, 0, 'ttgjtutjn', '2021-10-30 13:02:50', 14, NULL, NULL, '2021-12-19', 14, '617cee1a6aa746265.jpg', '617cee1a6b57d7865.jpg,617cee1a6bb8e1509.jpg,617cee1a6c2249584.jpg', '01785294437', 'tnng', 'https://esteemsoftbd.com/', 'https://www.facebook.com/', '', 'এ বি হাসপাতাল ', 'navy-hospital', 2, 14),
(46, 'Marine', 'doctors', '01785243321', 'marine@gmail.com', 'Marine Hospital', 16, 'Khilkhet', 2, NULL, NULL, 'Demo', 1, 494, 'yy', '2021-10-27 16:09:53', 14, NULL, NULL, '2021-12-14', 14, '617cda08742637294.jpg', '617cda08745ae8253.jpeg,617cda08748135026.jpeg,617cda0874a8f5485.jpg', '01785294437', 'ttttttttttttttttttt', 'https://esteemsoftbd.com/', 'https://www.facebook.com/', NULL, 'হাসপাতাল লি', 'marine-hospital', 1, 6),
(55, 'Rasel', 'doctors', '09876543212', 'eeeee@email.com', 'Qweet haspital', 8, 'qqqqqqqqq', 1, NULL, NULL, 'demo', 1, 0, 'qq', '2021-10-28 14:24:52', 14, NULL, NULL, '2021-11-24', 14, '6182146c55f2a6398.jpg', '6182146c57e831570.jpg,6182146c596291504.jpg,6182146c598f06919.jpg', '01785294437', 'qq', 'https://esteemsoftbd.com/', 'https://www.facebook.com/esteemsoft', NULL, 'হাসপাতাল লি', 'qweet-haspital', 1, 8),
(56, 'Rasel', 'doctors', '09876543212', 'eeeee@email.com', 'Qweet hospital', 8, 'qqqqqqqqq', 1, NULL, NULL, 'demo', 1, 0, 'qq', '2021-10-28 14:27:18', 14, NULL, NULL, '2021-11-17', 14, '6194f89c5c2776126.jpg', '6194f89c5db5a5525.jpg,6194f89c5dd7a4930.jpg,6194f89c5df3f5378.jpg', '01785294437', 'qq', 'https://esteemsoftbd.com/', 'https://www.facebook.com/esteemsoft', NULL, 'হাসপাতাল লি', 'qweet-hospital', 1, 7),
(57, 'Meditech', 'doctor', '09876543212', 'eeeee@email.com', 'Meditech hospital', 152, 'Khilkhet', 2, NULL, NULL, 'demo', 17, 43, 'tttt', '2021-10-30 11:23:34', 14, NULL, NULL, '2021-12-15', 14, '61b48742400a98073.jpg', '61b486dc9f49c2989.jpg', '01785294437,017565656', '', 'https://esteemsoftbd.com/', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.7191531219864!2d90.41666301429849!3d23.828583891703467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c65c71060b4b%3A0xf54094c9f3725455!2sMeditech%20General%20Hospital!5e0!3m2!1sen!2sbd!4v1639568846117!5m2!1sen!2sbd', 'হাসপাতাল লি', 'meditech-hospital', 1, 41),
(30, 'Kurmitola Haspital', 'doctor', '01785294437', 'eeeee@email.com', 'Kurmitola Haspital', 250, 'Dhaka cantonment', 1, NULL, NULL, NULL, 1, 496, 'yes', '2021-10-24 13:02:45', 14, NULL, NULL, '2021-10-30', 14, '617cd9dd8a7c47641.jpg', '617cd9dd8ab125803.jpg,617cd9dd8aed19456.webp,617cd9dd8b13b7922.jpeg', '01785294437', 'Kurmitola is one of the best government hospital located in Dhaka ', 'https://esteemsoftbd.com/', 'https://www.facebook.com/', NULL, 'কুর্মিটোলা হসপিটাল', 'kurmitola-haspital', 2, 15),
(73, 'witty', 'junior programmer', '09876543212', 'ri@gmail.com', 'Natore Hospital', 10, 'sadargg', 1, NULL, NULL, 'camp', 2, 154, '', '2021-12-12 14:33:04', 14, NULL, NULL, '2021-12-18', 14, NULL, NULL, '01785294437,017565656', '<p>হল মুদ্রণ এবং টাইপসেটিং শিল্পের ডামি পাঠ্য। লোরেম ইপসাম 1500 এর দশক থেকে শিল্পের মানক ডামি টেক্সট হয়েছে, যখন একটি অজানা প্রিন্টার টাইপের একটি গ্যালি নিয়েছিল এবং একটি টাইপ নমুনা বই তৈরি করতে এটিকে স্ক্র্যাম্বল করেছিল। এটি শুধুমাত্র পাঁচ শতক নয়, ইলেকট্রনিক টাইপসেটিং-এ লাফ দিয়েও টিকে আছে, যা মূলত অপরিবর্তিত রয়েছে। এটি 1960-এর দশকে লোরেম ইপসাম প্যাসেজ সম্বলিত লেট্রাসেট শীট প্রকাশের মাধ্যমে এবং অতি সম্প্রতি লোরেম ইপসামের সংস্করণ সহ অ্যালডাস পেজমেকারের মতো ডেস্কটপ প্রকাশনা সফ্টওয়্যারের মাধ্যমে জনপ্রিয় হয়েছিল।<br></p>', 'https://esteemsoftbd.com/', 'https://www.facebook.com/', 'https://www.google.com/search?q=Gaibandha+Ma+O+Shisu+Hospital&biw=1366&bih=625&tbm=lcl&sxsrf=AOaemvJXO7S4uVPI7VYJdvIzec5dZKgT0A%3A1638951192919&ei=GGmwYdnIN8aRseMP66SukAI&oq=Gaibandha+Ma+O+Shisu+Hospital&gs_l=psy-ab.3...190350.190350.0.191377.1.1.0.0.0.0.192.192.0j1.1.0....0...1c.1.64.psy-ab..0.0.0....0.z9AosEFyLoo#rlfi=hd:;si:;mv:[[25.32609001935094,89.53882331457213],[25.323520110952177,89.53374857511595],null,[25.324805071970093,89.53628594484404],18]', 'মীর হাসপাতাল লিমিটেড', 'natore-hospital', 2, NULL),
(64, 'Dinajpur Medical College', 'doctor', '09876543212', 'sharif@gmail.com', 'Dinajpur Medical College', 1270, 'Dinajpur sadar', 1, NULL, NULL, 'Demo', 26, 405, NULL, '2021-11-17 12:18:20', 14, NULL, NULL, '2021-12-12', 14, '61949eac20c5d1417.jpg', '61aef53a95a4a7576.jpg,61aef53a95e068715.jpg,61aef53a9612d6833.jpg', '01785294437', '<strong style=\"margin: 0px; padding: 0px; font-family: \"Open Sans\", Arial, sans-serif; letter-spacing: normal; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: \"Open Sans\", Arial, sans-serif; letter-spacing: normal; text-align: justify;\"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</span>', 'http://www.marmcd.edu.bd/', 'https://www.facebook.com/', NULL, 'হাসপাতাল লি', 'dinajpur-medical-college', 2, NULL),
(65, 'Arch hospital management software', 'doctor', '09876543212', 'sharif@gmail.com', 'Sirajgonj Hospital', 15, 'sadar', 3, NULL, NULL, 'Demo', 25, 386, NULL, '2021-11-25 11:08:47', 14, NULL, NULL, '2021-12-19', 14, '61b4874f17bd91764.jpg', '61b487564e51f4978.jpg,61b487564e9873807.jpg', '01785294437', '', 'esteemsoftbd.com/', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.239182444645!2d90.39429341429668!3d23.738848695135893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8eb2cd9b849%3A0x7c213c924dd2d324!2sBIRDEM%20General%20Hospital!5e0!3m2!1sen!2sbd!4v1639558435974!5m2!1sen!2sbd', 'হাসপাতাল লি', 'sirajgonj-hospital', 2, NULL),
(74, 'Mir', 'junior', '09876543212', 'ri@gmail.com', 'Brammanbaria eye hospital', 7, 'cccccccccccc', 4, NULL, NULL, 'Demo', 3, 162, '', '2021-12-12 15:11:40', 14, NULL, NULL, '2021-12-20', 14, NULL, NULL, '01785294437', '<p>ccccccccx</p>', 'https://esteemsoftbd.com/', 'https://www.facebook.com/esteemsoft', 'https://www.google.com', 'হাসপাতাল লি', 'brammanbaria-eye-hospital', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT,
  `div_id` smallint(6) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `div_id`, `name`) VALUES
(1, 1, 'Dhaka'),
(2, 1, 'Faridpur'),
(3, 1, 'Gazipur'),
(4, 1, 'Gopalganj'),
(5, 5, 'Jamalpur'),
(6, 1, 'Kishoreganj'),
(7, 1, 'Madaripur'),
(8, 1, 'Manikganj'),
(9, 1, 'Munshiganj'),
(10, 5, 'Mymensingh'),
(11, 1, 'Narayanganj'),
(12, 1, 'Narsingdi'),
(13, 5, 'Netrokona'),
(14, 1, 'Rajbari'),
(15, 1, 'Shariatpur'),
(16, 5, 'Sherpur'),
(17, 1, 'Tangail'),
(18, 6, 'Bogra'),
(19, 6, 'Joypurhat'),
(20, 6, 'Naogaon'),
(21, 6, 'Natore'),
(22, 6, 'Nawabganj'),
(23, 6, 'Pabna'),
(24, 6, 'Rajshahi'),
(25, 6, 'Sirajgonj'),
(26, 7, 'Dinajpur'),
(27, 7, 'Gaibandha'),
(28, 7, 'Kurigram'),
(29, 7, 'Lalmonirhat'),
(30, 7, 'Nilphamari'),
(31, 7, 'Panchagarh'),
(32, 7, 'Rangpur'),
(33, 7, 'Thakurgaon'),
(34, 3, 'Barguna'),
(35, 3, 'Barisal'),
(36, 3, 'Bhola'),
(37, 3, 'Jhalokati'),
(38, 3, 'Patuakhali'),
(39, 3, 'Pirojpur'),
(40, 2, 'Bandarban'),
(41, 2, 'Brahmanbaria'),
(42, 2, 'Chandpur'),
(43, 2, 'Chittagong'),
(44, 2, 'Comilla'),
(45, 2, 'Cox\'s Bazar'),
(46, 2, 'Feni'),
(47, 2, 'Khagrachari'),
(48, 2, 'Lakshmipur'),
(49, 2, 'Noakhali'),
(50, 2, 'Rangamati'),
(51, 8, 'Habiganj'),
(52, 8, 'Maulvibazar'),
(53, 8, 'Sunamganj'),
(54, 8, 'Sylhet'),
(55, 4, 'Bagerhat'),
(56, 4, 'Chuadanga'),
(57, 4, 'Jessore'),
(58, 4, 'Jhenaidah'),
(59, 4, 'Khulna'),
(60, 4, 'Kushtia'),
(61, 4, 'Magura'),
(62, 4, 'Meherpur'),
(63, 4, 'Narail'),
(64, 4, 'Satkhira');

-- --------------------------------------------------------

--
-- Table structure for table `log_web`
--

DROP TABLE IF EXISTS `log_web`;
CREATE TABLE IF NOT EXISTS `log_web` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `req_type` varchar(100) NOT NULL COMMENT '2=Arch/Witty=1',
  `req_id` int(11) NOT NULL,
  `type` tinyint(3) NOT NULL COMMENT '1=1st time publish, 2= Every Update',
  `time` datetime NOT NULL,
  `userby` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_web`
--

INSERT INTO `log_web` (`id`, `req_type`, `req_id`, `type`, `time`, `userby`) VALUES
(1, '2', 11, 2, '2021-11-01 14:53:14', 14),
(2, '2', 12, 2, '2021-11-01 15:02:40', 14),
(3, '2', 12, 1, '2021-11-01 15:10:55', 14),
(4, '2', 12, 2, '2021-11-01 16:08:27', 14),
(5, '2', 11, 2, '2021-11-01 16:09:07', 14),
(6, '2', 12, 2, '2021-11-06 11:23:12', 6),
(7, '2', 12, 2, '2021-11-06 11:26:11', 14),
(8, '2', 11, 2, '2021-11-06 11:26:22', 14),
(9, '2', 12, 2, '2021-11-15 14:42:01', 14),
(10, '2', 12, 2, '2021-11-15 14:43:16', 14),
(11, '2', 12, 2, '2021-11-15 14:53:48', 14),
(12, '2', 12, 2, '2021-11-15 14:54:11', 14),
(13, '2', 12, 2, '2021-11-15 14:54:24', 14),
(14, '2', 12, 2, '2021-11-15 14:55:17', 14),
(15, '2', 12, 2, '2021-11-15 14:55:25', 14),
(16, '2', 12, 2, '2021-11-15 14:57:38', 14),
(17, '2', 12, 2, '2021-11-15 15:03:59', 14),
(18, '2', 12, 2, '2021-11-15 15:04:36', 14),
(19, '2', 12, 2, '2021-11-15 15:04:54', 14),
(20, '2', 12, 2, '2021-11-15 15:07:00', 14),
(21, '2', 12, 2, '2021-11-15 15:07:09', 14),
(22, '2', 12, 2, '2021-11-15 15:07:43', 14),
(23, '2', 12, 2, '2021-11-15 15:27:48', 14),
(24, '2', 13, 2, '2021-11-15 15:29:00', 14),
(25, '2', 14, 2, '2021-11-15 15:30:30', 25),
(26, '2', 15, 2, '2021-11-15 15:40:22', 14),
(27, '2', 15, 2, '2021-12-07 11:55:37', 14),
(28, '2', 15, 2, '2021-12-07 11:55:45', 14),
(29, '2', 15, 2, '2021-12-07 11:56:01', 14),
(30, '2', 68, 1, '2021-12-07 12:31:14', 14),
(31, '2', 68, 2, '2021-12-07 12:31:24', 14),
(32, '2', 68, 2, '2021-12-07 12:32:35', 14),
(33, '2', 68, 2, '2021-12-07 12:33:15', 14),
(34, '2', 68, 2, '2021-12-07 12:39:24', 14),
(35, '2', 65, 2, '2021-12-07 14:11:32', 14),
(36, '2', 65, 2, '2021-12-07 14:11:52', 14),
(37, '2', 61, 2, '2021-12-07 15:11:59', 14),
(38, '2', 61, 2, '2021-12-07 15:12:36', 14),
(39, '2', 65, 2, '2021-12-08 10:29:00', 14),
(40, '2', 65, 2, '2021-12-08 10:29:24', 14),
(41, '2', 65, 2, '2021-12-08 10:29:37', 14),
(42, '2', 62, 1, '2021-12-11 15:14:56', 14),
(43, '2', 57, 2, '2021-12-11 17:07:32', 14),
(44, '2', 57, 2, '2021-12-11 17:09:16', 14),
(45, '2', 57, 2, '2021-12-11 17:10:48', 14),
(46, '2', 57, 2, '2021-12-11 17:10:52', 14),
(47, '2', 57, 2, '2021-12-11 17:10:58', 14),
(48, '2', 65, 2, '2021-12-11 17:11:11', 14),
(49, '2', 65, 2, '2021-12-11 17:11:18', 14),
(50, '2', 65, 2, '2021-12-11 17:11:35', 14),
(51, '2', 65, 2, '2021-12-11 17:11:40', 14),
(52, '2', 65, 2, '2021-12-11 17:12:59', 14),
(53, '2', 65, 2, '2021-12-11 17:13:04', 14),
(54, '2', 57, 2, '2021-12-11 17:13:42', 14),
(55, '2', 65, 2, '2021-12-11 17:20:42', 14),
(56, '2', 65, 2, '2021-12-11 17:36:16', 14),
(57, '2', 65, 2, '2021-12-11 17:36:26', 14),
(58, '2', 57, 2, '2021-12-11 18:02:31', 14),
(59, '2', 64, 1, '2021-12-12 13:50:32', 14),
(60, '2', 62, 2, '2021-12-12 13:51:05', 14),
(61, '2', 64, 2, '2021-12-12 13:51:31', 14),
(62, '2', 62, 2, '2021-12-12 13:51:49', 14),
(63, '2', 62, 2, '2021-12-12 13:52:05', 14),
(64, '2', 61, 2, '2021-12-12 13:52:18', 14),
(65, '2', 61, 2, '2021-12-12 13:52:44', 14),
(66, '2', 57, 2, '2021-12-12 13:53:14', 14),
(67, '2', 57, 2, '2021-12-12 13:53:21', 14),
(68, '2', 57, 2, '2021-12-12 13:53:46', 14),
(69, '2', 58, 2, '2021-12-12 13:53:56', 14),
(70, '2', 58, 2, '2021-12-12 13:54:10', 14),
(71, '2', 73, 1, '2021-12-12 14:33:43', 14),
(72, '2', 73, 2, '2021-12-12 14:34:04', 14),
(73, '2', 74, 2, '2021-12-12 15:29:44', 14),
(74, '2', 73, 2, '2021-12-12 16:56:56', 14),
(75, '2', 73, 2, '2021-12-14 10:12:39', 14),
(76, '2', 73, 2, '2021-12-14 10:13:06', 14),
(77, '2', 46, 2, '2021-12-14 10:15:40', 14),
(78, '2', 57, 2, '2021-12-14 11:03:01', 14),
(79, '2', 57, 2, '2021-12-14 14:21:48', 14),
(80, '2', 3, 1, '2021-12-14 14:22:25', 14),
(81, '2', 74, 2, '2021-12-14 14:47:22', 14),
(82, '2', 74, 2, '2021-12-14 16:24:13', 14),
(83, '2', 73, 2, '2021-12-15 12:17:07', 14),
(84, '2', 65, 2, '2021-12-15 12:25:53', 14),
(85, '2', 65, 2, '2021-12-15 12:55:50', 14),
(86, '2', 65, 2, '2021-12-15 12:59:33', 14),
(87, '2', 61, 2, '2021-12-15 14:38:18', 14),
(88, '2', 61, 2, '2021-12-15 14:41:37', 14),
(89, '2', 61, 2, '2021-12-15 14:44:03', 14),
(90, '2', 61, 2, '2021-12-15 14:44:44', 14),
(91, '2', 61, 2, '2021-12-15 14:44:51', 14),
(92, '2', 61, 2, '2021-12-15 14:47:52', 14),
(93, '2', 32, 2, '2021-12-15 14:57:08', 14),
(94, '2', 65, 2, '2021-12-15 14:58:07', 14),
(95, '2', 65, 2, '2021-12-15 15:06:48', 14),
(96, '2', 65, 2, '2021-12-15 15:10:41', 14),
(97, '2', 57, 2, '2021-12-15 16:33:00', 14),
(98, '2', 4, 2, '2021-12-15 17:14:30', 14),
(99, '2', 57, 2, '2021-12-15 17:48:03', 14),
(100, '2', 57, 2, '2021-12-15 17:48:25', 14),
(101, '2', 74, 2, '2021-12-18 16:30:25', 14),
(102, '2', 73, 2, '2021-12-18 16:38:51', 14),
(103, '2', 73, 2, '2021-12-18 16:40:20', 14),
(104, '2', 59, 2, '2021-12-18 16:44:14', 14),
(105, '2', 59, 2, '2021-12-18 16:57:30', 14),
(106, '2', 59, 2, '2021-12-18 16:57:45', 14),
(107, '2', 59, 2, '2021-12-18 17:04:34', 14),
(108, '2', 59, 2, '2021-12-18 17:05:18', 14),
(109, '2', 59, 2, '2021-12-18 17:21:50', 14),
(110, '2', 65, 1, '2021-12-19 15:19:30', 14),
(111, '2', 61, 1, '2021-12-19 15:19:44', 14),
(112, '2', 60, 1, '2021-12-19 15:19:51', 14),
(113, '2', 59, 1, '2021-12-19 15:19:57', 14),
(114, '2', 58, 1, '2021-12-19 15:20:07', 14),
(115, '2', 74, 2, '2021-12-20 12:24:54', 14),
(116, '2', 76, 1, '2021-12-20 12:29:03', 14),
(117, '2', 63, 1, '2021-12-20 12:59:13', 14);

-- --------------------------------------------------------

--
-- Table structure for table `special_org`
--

DROP TABLE IF EXISTS `special_org`;
CREATE TABLE IF NOT EXISTS `special_org` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reqID` int(11) NOT NULL DEFAULT '0',
  `type` tinyint(6) NOT NULL COMMENT 'Arch/witty as product based',
  `top_org` tinyint(1) DEFAULT NULL COMMENT 'Top organizations',
  `featured_org` tinyint(1) DEFAULT NULL COMMENT 'Featured Organizations',
  `status` tinyint(1) DEFAULT NULL COMMENT 'Show ON/Off',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `special_org`
--

INSERT INTO `special_org` (`id`, `reqID`, `type`, `top_org`, `featured_org`, `status`) VALUES
(56, 30, 2, 1, 1, 1),
(55, 32, 2, 1, 1, 1),
(54, 73, 2, 1, 1, 1),
(53, 60, 2, 1, 1, 1),
(52, 46, 2, 1, 1, 1),
(51, 55, 2, 1, 1, 1),
(50, 56, 2, 1, 1, 1),
(49, 57, 2, 1, 1, 1),
(48, 74, 2, 1, 1, 1),
(46, 62, 2, 1, 1, 1),
(45, 63, 2, 1, 0, 1),
(47, 61, 2, 1, 1, 1),
(43, 64, 2, 1, 1, 1),
(42, 65, 2, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `thana`
--

DROP TABLE IF EXISTS `thana`;
CREATE TABLE IF NOT EXISTS `thana` (
  `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT,
  `district_id` int(2) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=597 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thana`
--

INSERT INTO `thana` (`id`, `district_id`, `name`) VALUES
(1, 34, 'Amtali'),
(2, 34, 'Bamna '),
(3, 34, 'Barguna Sadar '),
(4, 34, 'Betagi '),
(5, 34, 'Patharghata '),
(6, 34, 'Taltali '),
(7, 35, 'Muladi '),
(8, 35, 'Babuganj '),
(9, 35, 'Agailjhara '),
(10, 35, 'Barisal Sadar '),
(11, 35, 'Bakerganj '),
(12, 35, 'Banaripara '),
(13, 35, 'Gaurnadi '),
(14, 35, 'Hizla '),
(15, 35, 'Mehendiganj '),
(16, 35, 'Wazirpur '),
(17, 36, 'Bhola Sadar '),
(18, 36, 'Burhanuddin '),
(19, 36, 'Char Fasson '),
(20, 36, 'Daulatkhan '),
(21, 36, 'Lalmohan '),
(22, 36, 'Manpura '),
(23, 36, 'Tazumuddin '),
(24, 37, 'Jhalokati Sadar '),
(25, 37, 'Kathalia '),
(26, 37, 'Nalchity '),
(27, 37, 'Rajapur '),
(28, 38, 'Bauphal '),
(29, 38, 'Dashmina '),
(30, 38, 'Galachipa '),
(31, 38, 'Kalapara '),
(32, 38, 'Mirzaganj '),
(33, 38, 'Patuakhali Sadar '),
(34, 38, 'Dumki '),
(35, 38, 'Rangabali '),
(36, 39, 'Bhandaria'),
(37, 39, 'Kaukhali'),
(38, 39, 'Mathbaria'),
(39, 39, 'Nazirpur'),
(40, 39, 'Nesarabad'),
(41, 39, 'Pirojpur Sadar'),
(42, 39, 'Zianagar'),
(43, 40, 'Bandarban Sadar'),
(44, 40, 'Thanchi'),
(45, 40, 'Lama'),
(46, 40, 'Naikhongchhari'),
(47, 40, 'Ali kadam'),
(48, 40, 'Rowangchhari'),
(49, 40, 'Ruma'),
(50, 41, 'Brahmanbaria Sadar '),
(51, 41, 'Ashuganj '),
(52, 41, 'Nasirnagar '),
(53, 41, 'Nabinagar '),
(54, 41, 'Sarail '),
(55, 41, 'Shahbazpur Town'),
(56, 41, 'Kasba '),
(57, 41, 'Akhaura '),
(58, 41, 'Bancharampur '),
(59, 41, 'Bijoynagar '),
(60, 42, 'Chandpur Sadar'),
(61, 42, 'Faridganj'),
(62, 42, 'Haimchar'),
(63, 42, 'Haziganj'),
(64, 42, 'Kachua'),
(65, 42, 'Matlab Uttar'),
(66, 42, 'Matlab Dakkhin'),
(67, 42, 'Shahrasti'),
(68, 43, 'Anwara '),
(69, 43, 'Banshkhali '),
(70, 43, 'Boalkhali '),
(71, 43, 'Chandanaish '),
(72, 43, 'Fatikchhari '),
(73, 43, 'Hathazari '),
(74, 43, 'Lohagara '),
(75, 43, 'Mirsharai '),
(76, 43, 'Patiya '),
(77, 43, 'Rangunia '),
(78, 43, 'Raozan '),
(79, 43, 'Sandwip '),
(80, 43, 'Satkania '),
(81, 43, 'Sitakunda '),
(82, 44, 'Barura '),
(83, 44, 'Brahmanpara '),
(84, 44, 'Burichong '),
(85, 44, 'Chandina '),
(86, 44, 'Chauddagram '),
(87, 44, 'Daudkandi '),
(88, 44, 'Debidwar '),
(89, 44, 'Homna '),
(90, 44, 'Comilla Sadar '),
(91, 44, 'Laksam '),
(92, 44, 'Monohorgonj '),
(93, 44, 'Meghna '),
(94, 44, 'Muradnagar '),
(95, 44, 'Nangalkot '),
(96, 44, 'Comilla Sadar South '),
(97, 44, 'Titas '),
(98, 45, 'Chakaria '),
(99, 45, 'Chakaria '),
(100, 45, 'Cox\'s Bazar Sadar '),
(101, 45, 'Kutubdia '),
(102, 45, 'Maheshkhali '),
(103, 45, 'Ramu '),
(104, 45, 'Teknaf '),
(105, 45, 'Ukhia '),
(106, 45, 'Pekua '),
(107, 46, 'Feni Sadar'),
(108, 46, 'Chagalnaiya'),
(109, 46, 'Daganbhyan'),
(110, 46, 'Parshuram'),
(111, 46, 'Fhulgazi'),
(112, 46, 'Sonagazi'),
(113, 47, 'Dighinala '),
(114, 47, 'Khagrachhari '),
(115, 47, 'Lakshmichhari '),
(116, 47, 'Mahalchhari '),
(117, 47, 'Manikchhari '),
(118, 47, 'Matiranga '),
(119, 47, 'Panchhari '),
(120, 47, 'Ramgarh '),
(121, 48, 'Lakshmipur Sadar '),
(122, 48, 'Raipur '),
(123, 48, 'Ramganj '),
(124, 48, 'Ramgati '),
(125, 48, 'Komol Nagar '),
(126, 49, 'Noakhali Sadar '),
(127, 49, 'Begumganj '),
(128, 49, 'Chatkhil '),
(129, 49, 'Companyganj '),
(130, 49, 'Shenbag '),
(131, 49, 'Hatia '),
(132, 49, 'Kobirhat '),
(133, 49, 'Sonaimuri '),
(134, 49, 'Suborno Char '),
(135, 50, 'Rangamati Sadar '),
(136, 50, 'Belaichhari '),
(137, 50, 'Bagaichhari '),
(138, 50, 'Barkal '),
(139, 50, 'Juraichhari '),
(140, 50, 'Rajasthali '),
(141, 50, 'Kaptai '),
(142, 50, 'Langadu '),
(143, 50, 'Nannerchar '),
(144, 50, 'Kaukhali '),
(150, 2, 'Faridpur Sadar '),
(151, 2, 'Boalmari '),
(152, 2, 'Alfadanga '),
(153, 2, 'Madhukhali '),
(154, 2, 'Bhanga '),
(155, 2, 'Nagarkanda '),
(156, 2, 'Charbhadrasan '),
(157, 2, 'Sadarpur '),
(158, 2, 'Shaltha '),
(159, 3, 'Gazipur Sadar-Joydebpur'),
(160, 3, 'Kaliakior'),
(161, 3, 'Kapasia'),
(162, 3, 'Sripur'),
(163, 3, 'Kaliganj'),
(164, 3, 'Tongi'),
(165, 4, 'Gopalganj Sadar '),
(166, 4, 'Kashiani '),
(167, 4, 'Kotalipara '),
(168, 4, 'Muksudpur '),
(169, 4, 'Tungipara '),
(170, 5, 'Dewanganj '),
(171, 5, 'Baksiganj '),
(172, 5, 'Islampur '),
(173, 5, 'Jamalpur Sadar '),
(174, 5, 'Madarganj '),
(175, 5, 'Melandaha '),
(176, 5, 'Sarishabari '),
(177, 5, 'Narundi Police I.C'),
(178, 6, 'Astagram '),
(179, 6, 'Bajitpur '),
(180, 6, 'Bhairab '),
(181, 6, 'Hossainpur '),
(182, 6, 'Itna '),
(183, 6, 'Karimganj '),
(184, 6, 'Katiadi '),
(185, 6, 'Kishoreganj Sadar '),
(186, 6, 'Kuliarchar '),
(187, 6, 'Mithamain '),
(188, 6, 'Nikli '),
(189, 6, 'Pakundia '),
(190, 6, 'Tarail '),
(191, 7, 'Madaripur Sadar'),
(192, 7, 'Kalkini'),
(193, 7, 'Rajoir'),
(194, 7, 'Shibchar'),
(195, 8, 'Manikganj Sadar '),
(196, 8, 'Singair '),
(197, 8, 'Shibalaya '),
(198, 8, 'Saturia '),
(199, 8, 'Harirampur '),
(200, 8, 'Ghior '),
(201, 8, 'Daulatpur '),
(202, 9, 'Lohajang '),
(203, 9, 'Sreenagar '),
(204, 9, 'Munshiganj Sadar '),
(205, 9, 'Sirajdikhan '),
(206, 9, 'Tongibari '),
(207, 9, 'Gazaria '),
(208, 10, 'Bhaluka'),
(209, 10, 'Trishal'),
(210, 10, 'Haluaghat'),
(211, 10, 'Muktagachha'),
(212, 10, 'Dhobaura'),
(213, 10, 'Fulbaria'),
(214, 10, 'Gaffargaon'),
(215, 10, 'Gauripur'),
(216, 10, 'Ishwarganj'),
(217, 10, 'Mymensingh Sadar'),
(218, 10, 'Nandail'),
(219, 10, 'Phulpur'),
(220, 11, 'Araihazar '),
(221, 11, 'Sonargaon '),
(222, 11, 'Bandar'),
(223, 11, 'Naryanganj Sadar '),
(224, 11, 'Rupganj '),
(225, 11, 'Siddirgonj '),
(226, 12, 'Belabo '),
(227, 12, 'Monohardi '),
(228, 12, 'Narsingdi Sadar '),
(229, 12, 'Palash '),
(230, 12, 'Raipura , Narsingdi'),
(231, 12, 'Shibpur '),
(232, 13, 'Kendua'),
(233, 13, 'Atpara'),
(234, 13, 'Barhatta'),
(235, 13, 'Durgapur'),
(236, 13, 'Kalmakanda'),
(237, 13, 'Madan'),
(238, 13, 'Mohanganj'),
(239, 13, 'Netrakona-Sadar'),
(240, 13, 'Purbadhala'),
(241, 13, 'Khaliajuri'),
(242, 14, 'Baliakandi '),
(243, 14, 'Goalandaghat '),
(244, 14, 'Pangsha '),
(245, 14, 'Kalukhali '),
(246, 14, 'Rajbari Sadar '),
(247, 15, 'Shariatpur Sadar -Palong'),
(248, 15, 'Damudya '),
(249, 15, 'Naria '),
(250, 15, 'Jajira '),
(251, 15, 'Bhedarganj '),
(252, 15, 'Gosairhat '),
(253, 16, 'Jhenaigati '),
(254, 16, 'Nakla '),
(255, 16, 'Nalitabari '),
(256, 16, 'Sherpur Sadar '),
(257, 16, 'Sreebardi '),
(258, 17, 'Tangail Sadar '),
(259, 17, 'Sakhipur '),
(260, 17, 'Basail '),
(261, 17, 'Madhupur '),
(262, 17, 'Ghatail '),
(263, 17, 'Kalihati '),
(264, 17, 'Nagarpur '),
(265, 17, 'Mirzapur '),
(266, 17, 'Gopalpur '),
(267, 17, 'Delduar '),
(268, 17, 'Bhuapur '),
(269, 17, 'Dhanbari '),
(270, 55, 'Bagerhat Sadar '),
(271, 55, 'Chitalmari '),
(272, 55, 'Fakirhat '),
(273, 55, 'Kachua '),
(274, 55, 'Mollahat '),
(275, 55, 'Mongla '),
(276, 55, 'Morrelganj '),
(277, 55, 'Rampal '),
(278, 55, 'Sarankhola '),
(279, 56, 'Damurhuda '),
(280, 56, 'Chuadanga-S '),
(281, 56, 'Jibannagar '),
(282, 56, 'Alamdanga '),
(283, 57, 'Abhaynagar '),
(284, 57, 'Keshabpur '),
(285, 57, 'Bagherpara '),
(286, 57, 'Jessore Sadar '),
(287, 57, 'Chaugachha '),
(288, 57, 'Manirampur '),
(289, 57, 'Jhikargachha '),
(290, 57, 'Sharsha '),
(291, 58, 'Jhenaidah Sadar '),
(292, 58, 'Maheshpur '),
(293, 58, 'Kaliganj '),
(294, 58, 'Kotchandpur '),
(295, 58, 'Shailkupa '),
(296, 58, 'Harinakunda '),
(297, 59, 'Terokhada '),
(298, 59, 'Batiaghata '),
(299, 59, 'Dacope '),
(300, 59, 'Dumuria '),
(301, 59, 'Dighalia '),
(302, 59, 'Koyra '),
(303, 59, 'Paikgachha '),
(304, 59, 'Phultala '),
(305, 59, 'Rupsa '),
(306, 60, 'Kushtia Sadar'),
(307, 60, 'Kumarkhali'),
(308, 60, 'Daulatpur'),
(309, 60, 'Mirpur'),
(310, 60, 'Bheramara'),
(311, 60, 'Khoksa'),
(312, 61, 'Magura Sadar '),
(313, 61, 'Mohammadpur '),
(314, 61, 'Shalikha '),
(315, 61, 'Sreepur '),
(316, 62, 'angni '),
(317, 62, 'Mujib Nagar '),
(318, 62, 'Meherpur-S '),
(319, 63, 'Narail-S Upazilla'),
(320, 63, 'Lohagara Upazilla'),
(321, 63, 'Kalia Upazilla'),
(322, 64, 'Satkhira Sadar '),
(323, 64, 'Assasuni '),
(324, 64, 'Debhata '),
(325, 64, 'Tala '),
(326, 64, 'Kalaroa '),
(327, 64, 'Kaliganj '),
(328, 64, 'Shyamnagar '),
(329, 18, 'Adamdighi'),
(330, 18, 'Bogra Sadar'),
(331, 18, 'Sherpur'),
(332, 18, 'Dhunat'),
(333, 18, 'Dhupchanchia'),
(334, 18, 'Gabtali'),
(335, 18, 'Kahaloo'),
(336, 18, 'Nandigram'),
(337, 18, 'Sahajanpur'),
(338, 18, 'Sariakandi'),
(339, 18, 'Shibganj'),
(340, 18, 'Sonatala'),
(341, 19, 'Joypurhat S'),
(342, 19, 'Akkelpur'),
(343, 19, 'Kalai'),
(344, 19, 'Khetlal'),
(345, 19, 'Panchbibi'),
(346, 20, 'Naogaon Sadar '),
(347, 20, 'Mohadevpur '),
(348, 20, 'Manda '),
(349, 20, 'Niamatpur '),
(350, 20, 'Atrai '),
(351, 20, 'Raninagar '),
(352, 20, 'Patnitala '),
(353, 20, 'Dhamoirhat '),
(354, 20, 'Sapahar '),
(355, 20, 'Porsha '),
(356, 20, 'Badalgachhi '),
(357, 21, 'Natore Sadar '),
(358, 21, 'Baraigram '),
(359, 21, 'Bagatipara '),
(360, 21, 'Lalpur '),
(361, 21, 'Natore Sadar '),
(362, 0, 'Others'),
(363, 22, 'Bholahat '),
(364, 22, 'Gomastapur '),
(365, 22, 'Nachole '),
(366, 22, 'Nawabganj Sadar '),
(367, 22, 'Shibganj '),
(368, 23, 'Atgharia '),
(369, 23, 'Bera '),
(370, 23, 'Bhangura '),
(371, 23, 'Chatmohar '),
(372, 23, 'Faridpur '),
(373, 23, 'Ishwardi '),
(374, 23, 'Pabna Sadar '),
(375, 23, 'Santhia '),
(376, 23, 'Sujanagar '),
(377, 24, 'Bagha'),
(378, 24, 'Bagmara'),
(379, 24, 'Charghat'),
(380, 24, 'Durgapur'),
(381, 24, 'Godagari'),
(382, 24, 'Mohanpur'),
(383, 24, 'Paba'),
(384, 24, 'Puthia'),
(385, 24, 'Tanore'),
(386, 25, 'Sirajganj Sadar '),
(387, 25, 'Belkuchi '),
(388, 25, 'Chauhali '),
(389, 25, 'Kamarkhanda '),
(390, 25, 'Kazipur '),
(391, 25, 'Raiganj '),
(392, 25, 'Shahjadpur '),
(393, 25, 'Tarash '),
(394, 25, 'Ullahpara '),
(395, 26, 'Birampur '),
(396, 26, 'Birganj'),
(397, 26, 'Biral '),
(398, 26, 'Bochaganj '),
(399, 26, 'Chirirbandar '),
(400, 26, 'Phulbari '),
(401, 26, 'Ghoraghat '),
(402, 26, 'Hakimpur '),
(403, 26, 'Kaharole '),
(404, 26, 'Khansama '),
(405, 26, 'Dinajpur Sadar '),
(406, 26, 'Nawabganj'),
(407, 26, 'Parbatipur '),
(408, 27, 'Fulchhari'),
(409, 27, 'Gaibandha sadar'),
(410, 27, 'Gobindaganj'),
(411, 27, 'Palashbari'),
(412, 27, 'Sadullapur'),
(413, 27, 'Saghata'),
(414, 27, 'Sundarganj'),
(415, 28, 'Kurigram Sadar'),
(416, 28, 'Nageshwari'),
(417, 28, 'Bhurungamari'),
(418, 28, 'Phulbari'),
(419, 28, 'Rajarhat'),
(420, 28, 'Ulipur'),
(421, 28, 'Chilmari'),
(422, 28, 'Rowmari'),
(423, 28, 'Char Rajibpur'),
(424, 29, 'Lalmanirhat Sadar'),
(425, 29, 'Aditmari'),
(426, 29, 'Kaliganj'),
(427, 29, 'Hatibandha'),
(428, 29, 'Patgram'),
(429, 30, 'Nilphamari Sadar'),
(430, 30, 'Saidpur'),
(431, 30, 'Jaldhaka'),
(432, 30, 'Kishoreganj'),
(433, 30, 'Domar'),
(434, 30, 'Dimla'),
(435, 31, 'Panchagarh Sadar'),
(436, 31, 'Debiganj'),
(437, 31, 'Boda'),
(438, 31, 'Atwari'),
(439, 31, 'Tetulia'),
(440, 32, 'Badarganj'),
(441, 32, 'Mithapukur'),
(442, 32, 'Gangachara'),
(443, 32, 'Kaunia'),
(444, 32, 'Rangpur Sadar'),
(445, 32, 'Pirgachha'),
(446, 32, 'Pirganj'),
(447, 32, 'Taraganj'),
(448, 33, 'Thakurgaon Sadar '),
(449, 33, 'Pirganj '),
(450, 33, 'Baliadangi '),
(451, 33, 'Haripur '),
(452, 33, 'Ranisankail '),
(453, 51, 'Ajmiriganj'),
(454, 51, 'Baniachang'),
(455, 51, 'Bahubal'),
(456, 51, 'Chunarughat'),
(457, 51, 'Habiganj Sadar'),
(458, 51, 'Lakhai'),
(459, 51, 'Madhabpur'),
(460, 51, 'Nabiganj'),
(461, 51, 'Shaistagonj '),
(462, 52, 'Moulvibazar Sadar'),
(463, 52, 'Barlekha'),
(464, 52, 'Juri'),
(465, 52, 'Kamalganj'),
(466, 52, 'Kulaura'),
(467, 52, 'Rajnagar'),
(468, 52, 'Sreemangal'),
(469, 53, 'Bishwamvarpur'),
(470, 53, 'Chhatak'),
(471, 53, 'Derai'),
(472, 53, 'Dharampasha'),
(473, 53, 'Dowarabazar'),
(474, 53, 'Jagannathpur'),
(475, 53, 'Jamalganj'),
(476, 53, 'Sulla'),
(477, 53, 'Sunamganj Sadar'),
(478, 53, 'Shanthiganj'),
(479, 53, 'Tahirpur'),
(480, 54, 'Sylhet Sadar'),
(481, 54, 'Beanibazar'),
(482, 54, 'Bishwanath'),
(483, 54, 'Dakshin Surma '),
(484, 54, 'Balaganj'),
(485, 54, 'Companiganj'),
(486, 54, 'Fenchuganj'),
(487, 54, 'Golapganj'),
(488, 54, 'Gowainghat'),
(489, 54, 'Jaintiapur'),
(490, 54, 'Kanaighat'),
(491, 54, 'Zakiganj'),
(492, 54, 'Nobigonj'),
(493, 1, 'Adabor'),
(494, 1, 'Airport'),
(495, 1, 'Badda'),
(496, 1, 'Banani'),
(497, 1, 'Bangshal'),
(498, 1, 'Bhashantek'),
(499, 1, 'Cantonment'),
(500, 1, 'Chackbazar'),
(501, 1, 'Darussalam'),
(502, 1, 'Daskhinkhan'),
(503, 1, 'Demra'),
(504, 1, 'Dhamrai'),
(505, 1, 'Dhanmondi'),
(506, 1, 'Dohar'),
(507, 1, 'Gandaria'),
(508, 1, 'Gulshan'),
(509, 1, 'Hazaribag'),
(510, 1, 'Jatrabari'),
(511, 1, 'Kafrul'),
(512, 1, 'Kalabagan'),
(513, 1, 'Kamrangirchar'),
(514, 1, 'Keraniganj'),
(515, 1, 'Khilgaon'),
(516, 1, 'Khilkhet'),
(517, 1, 'Kotwali'),
(518, 1, 'Lalbag'),
(519, 1, 'Mirpur Model'),
(520, 1, 'Mohammadpur'),
(521, 1, 'Motijheel'),
(522, 1, 'Mugda'),
(523, 1, 'Nawabganj'),
(524, 1, 'New Market'),
(525, 1, 'Pallabi'),
(526, 1, 'Paltan'),
(527, 1, 'Ramna'),
(528, 1, 'Rampura'),
(529, 1, 'Rupnagar'),
(530, 1, 'Sabujbag'),
(531, 1, 'Savar'),
(532, 1, 'Shah Ali'),
(533, 1, 'Shahbag'),
(534, 1, 'Shahjahanpur'),
(535, 1, 'Sher-e-Bangla Nagar'),
(536, 1, 'Shyampur'),
(537, 1, 'Sutrapur'),
(538, 1, 'Tejgaon'),
(539, 1, 'Tejgaon I/A'),
(540, 1, 'Turag'),
(541, 1, 'Uttara'),
(542, 1, 'Uttara West'),
(543, 1, 'Uttarkhan'),
(544, 1, 'Vatara'),
(545, 1, 'Wari'),
(546, 0, 'Others'),
(547, 35, 'Airport'),
(548, 35, 'Kawnia'),
(549, 35, 'Bondor'),
(550, 0, 'Others'),
(551, 24, 'Boalia'),
(552, 24, 'Motihar'),
(553, 24, 'Shahmokhdum'),
(554, 24, 'Rajpara'),
(555, 0, 'Others'),
(556, 43, 'Akborsha'),
(557, 43, 'Baijid bostami'),
(558, 43, 'Bakolia'),
(559, 43, 'Bandar'),
(560, 43, 'Chandgaon'),
(561, 43, 'Chokbazar'),
(562, 43, 'Doublemooring'),
(563, 43, 'EPZ'),
(564, 43, 'Hali Shohor'),
(565, 43, 'Kornafuli'),
(566, 43, 'Kotwali'),
(567, 43, 'Kulshi'),
(568, 43, 'Pahartali'),
(569, 43, 'Panchlaish'),
(570, 43, 'Potenga'),
(571, 43, 'Shodhorgat'),
(572, 0, 'Others'),
(573, 0, 'Others'),
(574, 59, 'Aranghata'),
(575, 59, 'Daulatpur'),
(576, 59, 'Harintana'),
(577, 59, 'Horintana'),
(578, 59, 'Khalishpur'),
(579, 59, 'Khanjahan Ali'),
(580, 59, 'Khulna Sadar'),
(581, 59, 'Labanchora'),
(582, 59, 'Sonadanga'),
(583, 21, 'Gurudaspur'),
(584, 21, 'Naldanga'),
(585, 21, 'Singra'),
(586, 0, 'Others'),
(587, 54, 'Airport'),
(588, 54, 'Hazrat Shah Paran'),
(589, 54, 'Jalalabad'),
(590, 54, 'Kowtali'),
(591, 54, 'Moglabazar'),
(592, 54, 'Osmani Nagar'),
(593, 54, 'South Surma'),
(594, 0, 'Others'),
(595, 1, 'Kadamtali'),
(596, 53, 'Daksin Sunamganj');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `sex` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `sex`) VALUES
(1, 'Rasel', 'khilhket', 'male'),
(2, 'Sharif', 'bashundhara', 'male'),
(3, 'MohiUddin', 'Bashundhara', 'male'),
(4, 'Tutul', 'Bashundhara', 'male'),
(5, 'hasna-hena', 'Bashundhara', 'female'),
(6, 'mrs', 'Bashundhara', 'female'),
(7, 'mrs2', 'Bashundhara', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(42, 'Junior'),
(41, 'Exicutive'),
(40, 'HR'),
(39, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

DROP TABLE IF EXISTS `user_tbl`;
CREATE TABLE IF NOT EXISTS `user_tbl` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `roleId` smallint(5) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `firstNum` varchar(255) DEFAULT NULL,
  `lastNum` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `depart` varchar(100) NOT NULL,
  `desig` varchar(100) NOT NULL,
  `status` tinyint(100) NOT NULL,
  `mydate` datetime DEFAULT NULL,
  `orderBy` tinyint(3) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `roleId`, `firstName`, `lastName`, `firstNum`, `lastNum`, `email`, `password`, `depart`, `desig`, `status`, `mydate`, `orderBy`) VALUES
(6, 1, 'mohiuddin', 'rathik', '0122453452', '0122453452', 'mohi@gmail.com', '$2y$10$3jxvO3rE/O84ckd99thobe1i8rCLaQQJysCO96/zT3oUJK0aOJNje', 'cse', 'st', 1, '2019-08-31 06:14:15', 1),
(14, 1, 'Esteem', 'Soft Limited', '01844004900', '01858297977', 'winesteem@gmail.com', '$2y$10$w9hB0IRv.6WN0PPPudaTE.y6pL9vHw8Yyx1YpIjtsT1uWWnxAya.a', 'Admin', 'CTO', 1, '2021-11-07 15:56:17', 2),
(15, 0, 'Md.', 'Mohiuddin', '0122345623', '0122345623', 'admin@gmail.com', '$2y$10$3a.LgGWEoCmOh0haVfFsq.UWVPmaqHrDVhkQpIg/xo/pU8ml20mZO', 'cse', 'programmer', 1, '2020-03-04 10:15:46', 3),
(25, 6, 'mahmud', 'hossain', '01234562', '01234562', 'hossain@gmail.com', '$2y$10$IMaahVkgwXFYoXApwasL0uzTrNDghAWAIqgkGDA6q4wzlWEbD.jkW', 'hr', 'hr', 1, '2018-04-26 04:34:56', 4),
(26, 0, 'Tahmim ', 'Hasan', '01844004913', '01844004913', 'tahmim.esl@gmail.com', '$2y$10$OCDtSy0Vq8cfl4mA6zlROuyOPhHJCYuyNKw4hFHB.NtDImt.jZgea', 'Support', 'Software Support Engineer', 1, '2019-08-24 05:13:48', 5),
(27, 4, 'Tanvir', 'Hasan', '01844004914', '01844004914', 'tanvir@gmail.com', '$2y$10$r6M/sWLwAyNY0mBvuhFDwO/pdK/2dQ0cWTVInKRRV9GkpF2ABKWlO', 'Business  Development', 'Sales and Marketing Executive ', 0, '2021-10-19 13:05:59', 6),
(28, 0, 'tttyy', 'ttt', '01785243314', '01785243314', 'eeeee@email.com', '$2y$10$ZLCKnErvPPTnxHXOjp7B8OyrurivnQXBHxVkMxSnDE.SPP4Gv8lUS', 'Software', 'doctor', 1, '2021-11-24 17:44:59', 3),
(29, 0, 'Tariqul ', 'Islam', '017852433', '01785243314', 'tariqul.cse027@gmail.com', '$2y$10$U0XxnKlF1MtFiL8hMjDxxO4PaS5ec1sM3KQWnCgtEYTwA792blpC6', 'Software', 'junior programmer', 1, '2021-11-30 14:57:49', 2);

-- --------------------------------------------------------

--
-- Table structure for table `web_articles`
--

DROP TABLE IF EXISTS `web_articles`;
CREATE TABLE IF NOT EXISTS `web_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `pubdate` date NOT NULL,
  `body` text NOT NULL,
  `attach` text,
  `modified` datetime NOT NULL,
  `modifier` varchar(20) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `hits` mediumint(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='magazine post';

--
-- Dumping data for table `web_articles`
--

INSERT INTO `web_articles` (`id`, `title`, `slug`, `pubdate`, `body`, `attach`, `modified`, `modifier`, `status`, `hits`) VALUES
(32, 'মুহসীনিন বইয়ের শরঈ সম্পাদকীয় ভুমিকার একাংশ', 'মুহসীনিন-বইয়ের-শরঈ-সম্পাদকীয়-ভুমিকার-একাংশ', '2021-12-02', 'মুহসীনিন বইয়ের শরঈ সম্পাদকীয় ভুমিকার একাংশঃ\r\n\r\nইসলামী দৃষ্টিকোণ থেকে একজন আদর্শ পুরুষের কতিপয় বৈশিষ্ট্যঃ\r\n\r\n১.যে পুরুষের মাঝে আল্লাহর ভয় আছে, আছে উত্তম চরিত্র এবং চোখ-জিহ্বার সংযম, সেই আদর্শ পুরুষ।\r\n\r\n২. যে পুরুষ নিজ চরিত্রে বিনয় ও লজ্জার গুণের সমন্বয় করে।\r\n\r\nআল্লাহ তা\'আলা বলেন,\r\n৫. আদর্শ পুরুষ প্রয়োজনের অতিরিক্ত বেশি কথা বলেনা। এতে করে তাঁর মাঝে এক ধরনের ভাব-গাম্ভীর্যতা বজায় থাকে। সাথে সাথে তারা স্পষ্টভাষীও হয়ে থাকে।\r\n\r\nহজরত আবু উমামা (রা.) থেকে বর্ণিত, নবীজি ﷺ বলেন,\r\n\r\nالْحَيَاءُ وَالْعِيُّ شُعْبَتَانِ مِنَ الْإِيمَانِ وَالْبَذَاءُ وَالْبَيَانُ شُعْبَتَانِ مِنَ النِّفَاقِ\r\n\r\n‘লজ্জা ও অল্প কথা বলা ঈমানের দুটি শাখা। আর অশ্লীলতা ও বাকপটুতা মুনাফিকের শাখা।’\r\n\r\n[তিরমিযী: ২০২৭; আত তারগীব ওয়াত্ তারহীব: ২৬২৯; মুসান্নাফ ইবনু আবী শাইবাহ্: ৩০৪২৮; মুসনাদে আহমাদ: ২২৩১২; মুসতাদরাকে হাকেম: ১৭, ১৭০; শু‘আবুল ঈমান, বাইহাক্বী: ৭৭০৬; আল জামিউস সগীর: ৩২০১]\r\n\r\nআবদুল্লাহ ইবনে মাসউদ রা. থেকে বর্ণিত, নবী ﷺ বলেছেন,\r\n\r\nلَيْسَ الْمُؤْمِنُ بِالطّعّانِ، وَلَا اللّعّانِ، وَلَا الْفَاحِشِ، وَلَا الْبَذِيءِ.\r\n\r\nমুমিন কটুভাষী হতে পারে না, লা‘নতকারী হতে পারে না এবং অশ্লীল ও অশালীন কথা বলতে পারে না।\r\n\r\n[আল আদাবুল মুফরাদঃ৩১২; জামে তিরমিযীঃ ১৯৭৭]\r\n\r\n৬. আদর্শ পুরুষ অহংকারী, হিংসুক, বদ মেজাজি ও কঠোর প্রকৃতির হয়না। পাশাপাশি অতি প্রবল রাগের সময়েও তা নিয়ন্ত্রণ করতে পারে। কেননা নবী করীম ﷺ বলেন,\r\n\r\n\'কাউকে আছড়ে ফেলে দেওয়ার নাম শক্তি নয় বরং (পুরুষের) আসল শক্তি হচ্ছে, প্রবল রাগের মাঝেও নিজের নফসকে নিয়ন্ত্রণে রাখতে পারা।\'\r\n\r\nلَيْسَ الشَّدِيدُ بِالصُّرَعَةِ إِنَّمَا الشَّدِيدُ الَّذِي يَمْلِكُ نَفْسَهُ عِنْدَ الْغَضَبِ ‏.‏\r\n\r\n[সহীহ মুসলিমঃ ৬৮০৯]\r\n\r\nআবু হুরায়রা রা. থেকে বর্ণিত, নবী ﷺ বলেছেন,\r\n\r\nমুমিন সবার আপন হয়, (সে অন্তরঙ্গ হয় এবং তার সাথে অন্তরঙ্গ হওয়া যায়।) যে অন্তরঙ্গ হয় না এবং যার সাথে অন্তরঙ্গ হওয়া যায় না, তার মাঝে কোনো কল্যাণ নেই।\r\n\r\nالْمُؤْمِنُ مَأْلَفٌ، وَلَا خَيْرَ فِيمَنْ لَا يَأْلَفُ وَلَا يُؤْلَفُ.\r\n\r\n[মুসনাদে আহমাদঃ ৯১৯৮]\r\n৭. আদর্শ পুরুষ গাইরতমন্দ ও আত্মসম্মানবোধসম্পন্ন হয়ে থাকে।\r\n\r\nসা’দ ইবনে উবাদা রাদিয়াল্লাহু আনহু প্রচণ্ড আত্মর্যাদাবোধসম্পন্ন মানুষ ছিলেন। একবার সা’দ ইবনে উবাদা মন্তব্য করেন—“যদি কোনোদিন ঘরে এসে আমার স্ত্রীর সাথে অন্য কোনো পুরুষকে দেখি, তাহলে নিঃসন্দেহে এক কোপে তার গর্দাম ফেলে দিব।” হযরত সা’দের এই বক্তব্য নবী ﷺ শুনতে পেয়ে বলেন, “তোমরা সা’দের গাইরাত দেখে আশ্চর্য হচ্ছো? অবশ্যই আমার গাইরাত সা’দের চেয়ে বেশি। আর আল্লাহ তাআলার গাইরাত আমার চেয়েও বেশি”।\r\n\r\nقَالَ سَعْدُ بْنُ عُبَادَةَ لَوْ رَأَيْتُ رَجُلاً مَعَ امْرَأَتِي لَضَرَبْتُهُ بِالسَّيْفِ غَيْرَ مُصْفَحٍ‏.‏ فَبَلَغَ ذَلِكَ النَّبِيَّ صلى الله عليه وسلم فَقَالَ ‏ \"‏ أَتَعْجَبُونَ مِنْ غَيْرَةِ سَعْدٍ، لأَنَا أَغْيَرُ مِنْهُ، وَاللَّهُ أَغْيَرُ مِنِّي\r\n[সহীহ বুখারীঃ ৬৮৪৬]\r\n\r\nনবীজি ﷺ বলেন,\r\n\r\n“নিশ্চয় আল্লাহ তাআলার গাইরাত আছে। আল্লাহর গাইরাত হলো- মুমিন যেন হারাম কোনো কাজে লিপ্ত না হয়”।\r\n\r\nإِنَّ اللَّهَ يَغَارُ وَغَيْرَةُ اللَّهِ أَنْ يَأْتِيَ الْمُؤْمِنُ مَا حَرَّمَ اللَّهُ\r\n\r\n[সহীহ বুখারীঃ ৫২২৩; সহীহ মুসলিমঃ ২৭৬২; মুসনাদে আহমাদঃ ৯০৩৮]\r\n\r\n৮. আদর্শ পুরুষ হবে ধৈর্যশীল, শৌর্যবীর্য ও বীরত্বের অধিকারী এবং মেহনতি। এছাড়াও আদর্শ মুমিন পুরুষ বাহ্যিক ও আভ্যন্তরীণ উভয় ক্ষেত্রেই শক্তিশালী হয়ে থাকে। অক্ষম এবং দুর্বল হয় না।\r\n\r\nরাসূলুল্লাহ ﷺ বলেছেন,\r\n\r\nالْمُؤْمِنُ الْقَوِيّ خَيْرٌ وَأَحَبّ إِلَى اللهِ مِنَ الْمُؤْمِنِ الضّعِيفِ، وَفِي كُلٍّ خَيْرٌ. اِحْرِصْ عَلَى مَا يَنْفَعُكَ، وَاسْتَعِنْ بِاللهِ وَلَا تَعْجِزْ. وَإِنْ أَصَابَكَ شَيْءٌ، فَلَا تَقُلْ لَوْ أَنِّي فَعَلْتُ، كَانَ كَذَا وَكَذَا، وَلَكِنْ قُلْ: قَدّرَ اللهُ وَمَا شَاءَ فَعَلَ، فَإِنّ لَوْ تَفْتَحُ عَمَلَ الشّيْطَان.\r\n\r\nশক্তিশালী মুমিন আল্লাহর কাছে দুর্বল মুমিন অপেক্ষা প্রিয় ও উত্তম, তবে উভয়ের মাঝে কল্যাণ রয়েছে, তোমাকে যা উপকৃত করবে সে বিষয়ে তুমি অনুরাগী হও। আর আল্লাহর কাছে সাহায্য চাও। অক্ষম হয়ে যেয়ো না। কোনো কিছু যদি তোমাকে আক্রান্ত করে তুমি বলো না যে, যদি আমি এটা করতাম তাহলে তো এটা হতো (বা হতো না)। বরং বলো, আল্লাহ তকদীরে রেখেছেন। আল্লাহ যা চান তাই করেন। কেননা ‘যদি’ শব্দটা শয়তানের (বিভ্রান্ত করার) কাজের দরজা (সুযোগ) খুলে দেয়।\r\n\r\n[সহীহ মুসলিমঃ ২৬৬৪]\r\n\r\n৯. আদর্শ পুরুষ কখনো দুর্বলদের দুর্বলতার সুযোগ নেয় না। কাউকে ধোকাও দেয়না আবার এমন এতটাই বিচক্ষণ ও তীক্ষ্ণ দৃষ্টিসম্পন্ন হয় যে, নিজে কারো কাছ থেকে ধোকাও খায়না। কেননা মুমিন কাউকে ধোঁকা দেয় না এবং ধোঁকা খায় না’। আর ধোঁকা মুসলমানদের আদর্শ নয়।\r\n\r\nআবু হুরায়রা রা. থেকে বর্ণিত, নবী ﷺ বলেছেন,\r\n\r\nلَا يُلْدَغُ الْمُؤْمِنُ مِنْ جُحْرٍ وَاحِدٍ مَرّتَيْنِ.\r\n\r\nমুমিন একই গর্তে দুইবার দংশিত হয় না। (মানে বারবার ধোঁকা খায় না)\r\n\r\n[সহীহ বুখারীঃ ৬১৩৩; সহীহ মুসলিমঃ ২৯৯৮]\r\n\r\n১০. আদর্শ মুমিন পুরুষ কপট, সংকীর্ণ মানসিকতার হতে পারে না। বরং কিছু ক্ষেত্রে সে একদমই সহজ-সরল ও উদার হবে।\r\n\r\nআবু হুরায়রা রা. থেকে বর্ণিত, রাসূলুল্লাহ ﷺ বলেছেন,\r\n\r\nالْمُؤْمِنُ غِرّ كَرِيمٌ، وَالْفَاجِرُ خَبّ لَئِيمٌ.\r\n\r\nমুমিন সহজ-সরল, উদার হয়ে থাকে। আর ফাজের (পাপিষ্ঠ) হয়ে থাকে ঠকবাজ, সংকীর্ণমনা।\r\n\r\n[আল আদাবুল মুফরাদঃ ৪১৮; সুনানে আবী দাউদঃ ৪৭৫৭; জামে তিরমিযীঃ ১৯৬৪; মুসনাদে আহমাদঃ ২/৩৯৪ হাঃ ৯১১৮- হাদীসের সনদ হাসান]\r\n\r\n\'রহমানের বান্দা (পরম করুণাময় আল্লাহর বান্দা) তারাই যারা পৃথিবীতে বিনয়ের সঙ্গে চলা-ফেরা করে\'।\r\n\r\n[সুরা ফুরকান: ৬৩]\r\n\r\nনবী ﷺ বলেন, ‘যে কেউ আল্লাহর জন্য বিনয় অবলম্বন করে আল্লাহ তাঁর মর্যাদা বাড়িয়ে দেন’।\r\n\r\n[সহীহ মুসলিম : ৬৭৫৭]\r\n\r\nইবনু উমার রাদিয়াল্লাহু আনহু হতে বর্ণিত,\r\n\r\nعَنِ ابنِ عُمَرَ رَضِيَ اللهُ عَنهُمَا: أنَّ رَسُولَ اللهِ ﷺ مَرَّ عَلَى رَجُلٍ مِنَ الأنْصَار وَهُوَ يَعِظُ أخَاهُ في الحَيَاءِ، فَقَالَ رَسُولُ اللهِ ﷺ: « دَعْهُ، فَإنَّ الْحَيَاءَ مِنَ الإيمَانِ ».\r\n\r\nরাসূলুল্লাহ ﷺ এক আনসার ব্যক্তির পাশ দিয়ে অতিক্রম করলেন। যিনি তার ভাইকে লজ্জার ব্যাপারে উপদেশ দিচ্ছিলেন। রাসূলুল্লাহ ﷺ বললেন, তাকে ছেড়ে দাও। কেননা, লজ্জা ঈমানের অঙ্গ।’’\r\n\r\n[সহীহ বুখারীঃ ২৪, ৬১১৮; সহীহ মুসলিমঃ ৩৬; সুনানে তিরমিযীঃ ২৬১৫; সুনানে নাসাঈঃ ৫০৩৩; সুনানে আবু দাউদঃ ৪৭৯৫; মুসনাদে আহমদঃ ৪৫৪০, ৫১৬১, ৬৩০৫; মুয়াত্তা মালিকঃ ১৬৭৯]\r\n\r\nরাসূলুল্লাহ ﷺ থেকে বর্ণিত,\r\n\r\nإذا لم تستحْيِ فاصنَعْ ما شئتَ\r\n\r\n\'যখন তুমি লজ্জা করবে না, তখন যা ইচ্ছা তাই কর।\' (অর্থাৎ যখন লজ্জা নাই, তখন সকল প্রকার মন্দই সমান)।\r\n\r\n[সহীহ বুখারীঃ ৩৪৮৩; সহীহ ইবনু হিব্বানঃ ৬০৭; আত তামহীদ, ইবনু আব্দিল বার ২০/৬৮]\r\n\r\n৩. যে পুরুষ শত ব্যস্ততা ও বিরুপ পরিস্থিতিতেও নিজ পিতা-মাতা, আত্মীয়-স্বজন এবং প্রতিবেশীর হক আদায় করে। এবং এর পাশাপাশি তাঁর স্ত্রী ও সন্তানকেও যথেষ্ট সময় দিয়ে থাকেন।\r\n\r\n৪. যে পুরুষ স্ত্রী, পরিবার এবং পরিবারের বাইরেও সচ্চরিত্র ও নীতিবান।\r\n\r\nহযরত আবু হুরায়রা (রাদি ) সূত্রে বর্ণিত, নবীজি ﷺ বলেছেন,\r\n\r\nأَكْمَلُ الْمُؤْمِنِينَ إِيمَانًا أَحْسَنُهُمْ خُلُقًا وَخِيَارُكُمْ خِيَارُكُمْ لِنِسَائِهِمْ خُلُقًا ‏.‏\r\n\r\n‘আদর্শ মানুষ ও পূর্ণাঙ্গ ঈমানদার ওই ব্যক্তি, যার চরিত্র সুন্দর এবং সে তার স্ত্রীর কাছে ভালো।’\r\n\r\n[সুনানে তিরমিযীঃ ১১৬২, ১১৯৫; আত তারগীব ওয়াত তারহীব ৩/৩৫৮; সুনানে আবী দাউদঃ ৪৬৮২; মুসনাদে আহমাদ ২/৪৭২]\r\n\r\nনবী ﷺ উত্তম চরিত্রের বিষয়ে আল্লাহর কাছে বলতেন,\r\n\r\nاللَّهُمَّ إنِّي أَسْأَلُكَ الهُدَى وَالتُّقَى، وَالْعَفَافَ وَالْغِنَى. وفي روايةٍ : وَالْعِفَّةَ.\r\n‘হে আল্লাহ, আমি আপনার নিকট হেদায়েত, আল্লাহর ভয়, সচ্চরিত্র ও অভাব মুক্তির প্রার্থনা করছি।’\r\n\r\n[সহীহ মুসলিম : ২৭২১]', '61a867782b84b4278.jpg', '2021-12-02 00:00:00', '14', 1, 16),
(33, 'বিশ্ব হার্ট দিবস: অন্তত পাঁচটি নিয়ম মানলেই দশে দশ।', 'বিশ্ব-হার্ট-দিবস-অন্তত-পাঁচটি-নিয়ম-মানলেই-দশে-দশ', '2021-12-02', 'বিশ্ব হার্ট দিবস: অন্তত পাঁচটি নিয়ম মানলেই দশে দশ।\r\n\r\nদেশে এক নম্বর ঘাতক ব্যাধি এখনো হৃদ্‌রোগ। ২০২০ সালে দেশে যত মানুষ মারা গেছে, তার এক-পঞ্চমাংশের বেশি মৃত্যু হয়েছে হার্ট অ্যাটাকে। এটা বাংলাদেশ ব্যুরো অব স্ট্যাটিসটিকসের (বিবিএস) তথ্য (গত ১০ মার্চ, দ্য ডেইলি স্টার)।\r\nহৃদ্‌রোগের চিকিৎসা অনেক উন্নত হয়েছে। দেশেই বিশ্বমানের চিকিৎসা পাওয়া যায়। কিন্তু রোগীর সংখ্যা ক্রমাগত বাড়ছে। এর অনেক কারণ আছে। আমরা যদি একটু সচেতন থাকি, তাহলে হৃদ্‌রোগে মৃত্যুহার কমিয়ে আনা সম্ভব।\r\n\r\nবিশ্ব হার্ট দিবস উপলক্ষে সম্প্রতি এসকেএফ ফার্মাসিউটিক্যালস লিমিটেড, বাংলাদেশ কার্ডিওভাসকুলার রিসার্চ ফাউন্ডেশন ও প্রথম আলো আয়োজিত গোলটেবিল বৈঠকে গুরুত্বপূর্ণ এ বিষয় নিয়ে আলোচনা করা হয়। হৃদ্‌রোগ বিশেষজ্ঞরা পরিষ্কার বলেন, সামান্য কয়েকটি বিষয়ে সচেতন হলে আমরা সহজেই এই ঘাতক ব্যাধি নিয়ন্ত্রণে আনতে পারি।\r\n\r\nএ জন্য দরকার হৃদ্-স্বাস্থ্যবিধি মেনে চলার ব্যাপারে একাগ্রতা। এ জন্যই এবারের বিশ্ব হার্ট দিবসের মূল স্লোগান ‘হৃদয় দিয়ে হৃদয়ের যত্ন নিন’।\r\n\r\nপ্রথম কাজ হবে সারা দিনে কিছু কায়িক শ্রম করা। আমাদের ধরে নিতে হবে ২৩ ঘণ্টায় এক দিন। বাকি এক ঘণ্টা ব্যায়ামের জন্য থাকবে। সকাল বা সন্ধ্যায় ঘণ্টাখানেক হাঁটা ভালো ব্যায়াম। সময়ের অভাব থাকলে অন্তত আধা ঘণ্টা বা ১৫ মিনিটও যদি ব্যায়াম করি, যথেষ্ট। সেই সঙ্গে সকাল ও সন্ধ্যায় চার থেকে পাঁচ মিনিট শ্বাসপ্রশ্বাসের ব্যায়াম দরকার। বুকভরে শ্বাস নেওয়া ও একদম বুক খালি করে শ্বাস ছাড়াই হলো আসল ব্যাপার। আমরা সাধারণত অল্প শ্বাস নিই এবং সামান্য শ্বাস বের করে দিই। এ কারণে ফুসফুসের বায়ুথলিগুলোর (আলভিওলি) এক বড় অংশ অকেজো হয়ে পড়ে। হৃৎপিণ্ড যথেষ্ট পরিমাণে অক্সিজেন পায় না। এ ব্যায়াম শুধু হৃৎপিণ্ডই নয়, সারা দেহের অঙ্গপ্রত্যঙ্গের কোষগুলোয় পর্যাপ্ত অক্সিজেন সরবরাহ করে এবং শরীর সুস্থ রাখতে সাহায্য করে।\r\n\r\nদ্বিতীয়ত, খাওয়াদাওয়া। সম্পৃক্ত চর্বি, ভাজাপোড়া, অতিরিক্ত তেল-ঘির রান্না যথাসম্ভব কম খেতে হবে। চিনি খাওয়া একদম বন্ধ রাখাই ভালো। আমেরিকায় এখন অ্যান্টিসুগার মুভমেন্ট চলছে। একজন স্বাস্থ্য বিশেষজ্ঞের তো নামই হয়ে গেছে ‘অ্যান্টি-সুগারম্যান’!\r\nচিনির ব্যাপারটা একটু খুলে বলা প্রয়োজন। আমরা মিষ্টি ফল খাই। সেটা বরং ভালো। এর মধ্যে চিনি তো থাকেই, আরও থাকে বিভিন্ন পুষ্টিকর উপাদান, খনিজ পদার্থ এবং বিশেষভাবে আঁশ। পরিপাক-প্রক্রিয়ায় শেষ পর্যন্ত চিনি আমাদের শরীরে যায়। কিন্তু সরাসরি চিনি খেলে পরিপাক-প্রক্রিয়ার দরকার হয় না, চিনি সরাসরি রক্তে চলে যায়। এ কারণে খাদ্য থেকে প্রয়োজনীয় শক্তি সঞ্চয়ের স্বাভাবিক প্রক্রিয়া ব্যাহত হয়। আজকাল স্বাস্থ্য বিশেষজ্ঞরা চিনিকে ‘শ্বেত-বিষ’ বলেন!\r\n\r\nতৃতীয়ত, শরীরের ওজন নিয়ন্ত্রণ। মেদ-ভুঁড়ি যেন না জমে। বয়স ও উচ্চতা অনুযায়ী পরিমিত ওজন বজায় রাখতে হবে। এ জন্য প্রয়োজনে খাদ্যাভ্যাস বদলাতে হবে। শুধু পরিমিত খাবার ও কায়িক শ্রম অব্যাহত রাখলেই ওজন নিয়ন্ত্রণে থাকে। অতিরিক্ত কোনো কিছু খাওয়া ভালো না।\r\n\r\nচতুর্থত, একটি গুরুতর বিষয়। সিগারেট-তামাক খাওয়া একদম নিষেধ। কোনো রকম নেশা একদম বাদ। সিগারেট হৃদ্‌রোগ ডেকে আনে।\r\n\r\nপঞ্চম এবং সবচেয়ে জরুরি বিষয় হলো নিয়মিত চেকআপ। ৪০ বছর বয়সের পর প্রতি দু-চার বছর পরপর অন্তত লিপিড টেস্ট করানো দরকার। রক্তের কোলেস্টেরলের মাত্রা লক্ষ রাখা বিশেষ প্রয়োজন। এসব বিষয়ে ডাক্তারের পরামর্শ মেনে চলা খুব গুরুত্বপূর্ণ।\r\nডা: জয়নাল আবেদীন জুয়েল\r\nএমবিবিএস, বিসিএস (স্বাস্থ্য), সিডিসি (বারডেম), এমডি (কার্ডিওলজি) B.S.M.M.U; ঢাকা\r\nসদস্য - ইউরোপিয়ান সোসাইটি অফ কার্ডিওলজি (M-ESC)\r\nকনসালটেন্ট কার্ডিওলজি\r\nকার্ডিওলজি ও মেডিসিন বিশেষজ্ঞ', '61a86882bec9a7166.jpg', '2021-12-02 00:00:00', '14', 1, 4),
(34, 'স্থূলতা বা মেদভুরি- অসুখ বা ডিজিজ।', 'স্থূলতা-বা-মেদভুরি-অসুখ-বা-ডিজিজ', '2021-12-02', 'মানব সভ্যতা আজ বিকশিত হয়েছে । এর মূলে রয়েছে স্বাস্থ্য ও স্বাস্থ্যের পরিচর্যা জন্য শিক্ষা, গবেষণা ও জ্ঞান অর্জনের দুরন্ত আগ্রহ ও নিরন্তর প্রচেষ্টা। মানুষের এই স্বাস্থ্য ক্রমাগত নানারকম নতুন নতুন রোগবালাই মোকাবেলা করে চলছে। এই সমস্ত রোগ বালাই যত না বাহ্যিক তার চেয়েও বেশি আভ্যন্তরীণ বা মানুষেরই নিজের সৃষ্টি। মানুষের এই রোগ বালাই কি বিজ্ঞানীগণ মোটাদাগে দুই ভাগে বিভক্ত করেছেন প্রথমত সংক্রামক রোগ দ্বিতীয়তঃ অসংক্রামক রোগ। চিকিৎসা বিজ্ঞানের ইতিহাসে দেখা যায় বিংশ শতাব্দীর গোড়া পর্যন্ত বিশ্বব্যাপী সংক্রামক ব্যাধিতে মানুষ ব্যাপকভাবে অপরিণত বয়সে মারা যেত কিন্তু এখন বিশ্বব্যাপী গড় মৃত্যুর হার ক্রমাগতভাবে সংক্রামক ব্যাধি থেকে অসংক্রামক ব্যাধিতে ধাবিত হচ্ছে। যেহেতু জনসাধারণের জন্য বা সর্বসাধারণের জন্য এটি একটি বিজ্ঞান ভিত্তিক আলোচনা সেহেতু বৈজ্ঞানিক কিছু বিষয় এখানে আমি উল্লেখ করেছি তবে পেশাজীবীদের মত করে আমি কোন কিছু এখানে উল্লেখ করছি না।\r\nমোটাদাগে অসংক্রামক ব্যাধির উৎপত্তি একদিনে না হয়ে দীর্ঘদিন যাবৎ তিলে তিলে গড়ে ওঠে এবং রোগ হিসেবে যেমন উচ্চরক্তচাপ ডায়াবেটিস ক্যান্সার স্ট্রোক কিডনির অসুখ, অন্ধত্ব হাত পা হারানো ইত্যাদি হঠাৎ একদিন দৃশ্যমান হয় বা প্রকাশ পায়।অসংক্রামক ব্যাধির পরিনীতি হয় মৃত্যু অথবা ভগ্ন বা রুগ্ন শরীর নিয়ে কোন রকম বেঁচে থাকা যা জীবনের কোন অর্থ বহন করে না। অসংক্রামক রোগের শুরুর প্রথম স্তর হল এক বা একাধিক ঝুঁকিপূর্ণ বিভিন্ন উপাদানের সন্নিবেশন। দ্বিতীয় স্তর হল ইনসুলিন রেজিস্ট্যান্স। তৃতীয় স্তর হলো মেটাবলিক সিনড্রোম। চতুর্থ স্তর হল- সুনির্দিষ্ট রোগের আবির্ভাব যথা পক্ষাঘাত বা স্ট্রোক, হূদরোগ, উচ্চ রক্তচাপ, কিডনির অকার্যকারিতা, লিভারের বিভিন্ন ধরনের অসুখ, ক্যান্সার, অঙ্গহানি, অন্ধত্ব, বিভিন্ন মানসিক রোগ ইত্যাদি।\r\n\r\nমেটাবলিক সিনড্রোম সর্বপ্রথম WHO জনসম্মুক্ষে ১৯৯৮ সালে প্রকাশ করে সেখানে মূল উপাদান স্থূলতা বিশেষ করে মেদ ভুড়ি যা একটি বৈষয়িক স্বাস্থ্য সমস্যা ও মহামারী। মেদভুঁড়ি কে কেন্দ্র করে আই ডি এফ বা WHO মেটাবলিক সিনড্রোমকে সংজ্ঞায়িত করে। আবার স্থূলতা বা ওবেসিটি কে নির্ণয়ের জন্য বি এম আই নামক একটি টুলস ব্যবহার করা হয়। Asia-Pacific Region WHO এর মতে এশিয়ানদের বিএমআই ২৫ বা তদূর্ধ্ব হলে স্থূল বলে অথবা যাদের বিএমআই ২৩ বা তদূর্ধ্ব তাদের মাত্রারিক্ত ওজন বা ওজনাধিক্য বলে। সহজ ভাষায় শরীরের অপ্রয়োজনীয় অতিরিক্ত চর্বির উপস্থিতিকে স্থূলতা বলে। এক সময় স্থূলতাকে আভিজাত্যের প্রতীক হিসেবে গণ্য করা হতো মানে যার ভুঁড়ি যত সে তত অভিজাত, কিন্তু অধুনা সত্তর-আশির দশক থেকে বিজ্ঞানীমহলে স্থূলতাকে রোগ সৃষ্টিকারী একটি ঝুঁকি হিসাবে দেখা শুরু করেন এবং ১৯৯৮ সাল থেকে WHO মেটাবলিক সিনড্রোম নামক অসুখ এর মধ্যে একটি মৌলিক উপাদান হিসেবে সন্নিবেশিত করেন এবং ২০১২ সালে আমেরিকান অ্যাসোসিয়েশন অফ ক্লিনিক্যাল এন্ডোক্রাইনোলজিস্ট একটি প্রবন্ধে স্থূলতাকে রোগ হিসেবে বিবেচনা করে এবং তার পরের বছর জুন ২০১৩ সালে আমেরিকান মেডিক্যাল অ্যাসোসিয়েশন স্থূলতাকে ক্রনিক ডিজিজ হিসেবে ঘোষণা করে। কারণ হিসেবে তারা বলে যে রোগ হিসেবে কোন অবস্থাকে ঘোষণা করতে হলে যা যা শর্ত পূরণ করা দরকার ওবেসিটি তার সবটাই পূরণ করে। এখন প্রশ্ন হলো স্থূলতা কি কারনে হয়? সহজ উত্তর এটাই যে - শক্তি গ্রহণ ও খরচের মধ্যে ভারসাম্য হীনতা। এই ভারসাম্যহীনতা তখনই তৈরি হয় যখন মানুষ নিজেই নিজের শরীর সম্বন্ধে একদম উদাসীন থাকে।\r\nএই স্থূলতা দুই ধরনের ১. শুধুমাত্র পেটের মধ্যেই চর্বি জমা বা মেদ ভুঁড বা আপল সেপ ওবেসিটি বলে। ২. চর্বি সমস্ত শরীর সমসত্ব ভাবে বিন্যস্ত যাকে পিয়ার সেপ ওবেসিটি বলে। এই দুটির মধ্য মেদ ভুঁড়ির স্থূলতা এশিয়ান জনসাধারণের মধ্যে সবচাইতে বেশি এবং কার্ডিও মেটাবোলিক ডিজিজও সবচেয়ে বেশি তৈরি করে। এখানে উল্লেখ্য যে প্রথম স্তর থেকে চতুর্থ স্তরের অর্থাৎ রোগ প্রকাশ পেতে যেমন ডায়াবেটিস এর ক্ষেত্রে কয়েক মাস থেকে ১৮ বছর পর্যন্ত লেগে যায় অন্যান্য ক্ষেত্রেও এইরকম রোগীর অবস্থা থাকে। রোগীর এই সুপ্ত কালীন অবস্থায় যদি আমরা ডাক্তারের শরণাপন্ন হই তাহলে তিনি বিভিন্ন ঝুঁকি নিরূপণ, শারীরিক পরীক্ষা, প্রযোজ্য ক্ষেত্রে কিছু ল্যাবরেটরী পরীক্ষার মাধ্যমে কার্ডিও মেটাবলিক স্ট্যাটাস নির্ধারণ করে আপনাকে যথোপযুক্ত চিকিৎসা ও পরিকল্পনা দিবেন। গবেষণা গবেষকরা বলেন ৪০ বছর বয়স্ক অধূমপায়ী কোন স্থূলকায় ব্যক্তির গড়ে ৭ (সাত) বৎসর কম বাঁচে আর ধূমপায়ী ব্যক্তি গড়ে ১৩ বৎসর কম বাঁচে। স্থূল ব্যক্তির শরীরের অভ্যন্তরে নিরবচ্ছিন্নভাবে বিভিন্ন প্রকার বিপাক প্রক্রিয়া অনিয়ন্ত্রিত ভাবে চলতে থাকে ও অদুর ভবিষ্যতের যেকোনো সময় কার্ডিওমেটাবলিক ডিজিজ যথা ডায়াবেটিস, রক্তের চর্বির অস্বাভাবিকতা বা ডিসলিপিডেমিয়া, উচ্চ রক্তচাপ, হূদরোগ, স্ট্রোক, কিডনি রোগ ইত্যাদি তৈরি করে। এছাড়াও আরো বিভিন্ন রোগ যেমন, মাথাব্যথা বা মস্তিষ্কের উচ্চচাপ, ইটিং ডিজঅর্ডার, বিষন্নতা, আত্মবিশ্বাস কমে যাওয়া, গলস্টোন ডিজিজ বা কিডনির পাথর বুক জ্বালাপোড়া লিভারে চর্বি জমা অন্ত্রের ক্যান্সার, কোমরে পিঠে, ঘাড়ে হাটুতে উপায় পায়ের গিটে ব্যথা বা অস্টিও আর্থ্রাইটিস, অপরিণত বয়সে যৌবন প্রাপ্তি, মাসিকের বিভিন্ন অনিয়ম , সন্তান জন্মদানে অক্ষমতা, নাক ডাকা বা স্লিপ অ্যাপনিয়া, শ্বাসকষ্ট বা হাঁপানি, পা ফোলা, ভেরিকোস ভেইন, বিভিন্ন প্রকার চর্মরোগ, হার্নিয়া ও বিভিন্ন অঙ্গ-প্রত্যঙ্গের ক্যান্সার তৈরি করতে পারে।\r\nকেন হয়- প্রয়োজনের অতিরিক্ত খাদ্য গ্রহণ বা শক্তি গ্রহণ যেমন একসঙ্গে প্রচুর পরিমাণে খাওয়া, ঘনঘন নাস্তা করা, অনিয়মিত খাবার খাওয়া, প্রচুর পরিমাণে শক্তি ঘন খাবার গ্রহণ, খাদ্যচক্রের মধ্যে উপবাস অংশটুকু বাতিল করা।\r\nআরেকটি হলো শক্তি খরচ বা ব্যবহার না করা যেমন শারীরিকভাবে নিষ্ক্রিয় জীবনযাপন যথা শিক্ষা প্রতিষ্ঠান, অফিস-আদালতে, হাঁট বাজারে, মসজিদ-উপাসনালয়ে, স্বল্প দুরত্বের ভ্রমনে হেঁটে না যাওয়া, গৃহস্থালির কাজ নিজে হাতে না করা, নিয়মিত শারীরিক খেলাধূলা না করা, দীর্ঘ সময় মোবাইল ল্যাপটপ কম্পিউটার বা টেলিভিশনের সামনে বসে থাকা, টেবিল জব বা ডেস্ক জব করা, দৈনন্দিন কাজে বিভিন্ন যন্ত্রপাতির অতিব্যবহার করা বা লোকজন নিয়োগ দেওয়া। একটু ভালো করে লক্ষ্য করে দেখলেই দেখবেন স্থূলতার প্রধান কারণই হচ্ছে অস্বাস্থ্যকর জীবনযাপন, অনিয়ম এবং অস্বাস্থ্যকর খাদ্যাভ্যাস ও খাবার গ্রহন, স্বাস্থ্যকর ঘুমের অভাব।\r\n\r\nপ্রতিকার বা চিকিৎসা- প্রাইমারি প্রিভেনশন বা প্রতিরোধেই হচ্ছে সেরা দাওয়াই । বলা হয় প্রতিকারের চেয়ে প্রতিরোধই সর্বোত্তম সেই হিসাবে ঝুঁকিপূর্ণ আচরণ যা স্থূলতা তৈরি করে সেইগুলি এখনই চিহ্নিত করতে হবে এবং সেখান থেকে আমাদের বেরিয়ে আসতে হবে। গবেষকরা প্রমান করেছেন যে স্থূলতা বা ওজনাধিক্য কমালে যেভাবে হোক না কেন কয়েকটি উপকার পাওয়া যায় যেমন ইনসুলিন সেন্সিভিটি উল্লেখযোগ্যভাবে বেড়ে যায়, লিভারের চর্বি কমায় কমে যায় , ডায়াবেটিস হওয়ার প্রক্রিয়া ধীরগতি হয় এমনকি শতভাগ প্রতিরোধ করা যায়, উচ্চ রক্তচাপ ও ডিসলিপিডেমিয়ার যথেষ্ট উন্নতি হয়, বিভিন্ন প্রকার প্রদাহ মার্কার গুলি কমে যায় অর্থাৎ সামগ্রিক ভাবে কার্ডিওমেটাবলিক ডিজিজের ভয়ংকর অগ্রযাত্রা থমকে যায়।\r\nআসলে রোগের প্রথম তিন অবস্থা পর্যন্ত রোগ নির্ণীত হলে কোন অধিকাংশ ক্ষেত্রে কোন ঔষধ লাগেনা শুধুমাত্র মৌলিক কয়েকটি ক্ষেত্রে সংশোধন আনলেই এই রোগ থেকে পরিত্রান পাওয়া সম্ভব।\r\nবিষয় গুলি হল (ক) জীবন ধারার আমূল পরিবর্তন- প্রথমেই আপনার কার্যসূচী বা নিয়ত ঠিক করুন যেমন ১. নিজেকে চিনুন অর্থাৎ আপনি যে মোটা সে সত্য নিজেকে নিজের কাছে মেনে নিন ২. নিজের কাছে অঙ্গীকার করুন আপনি ওজন কমাতেও বদ্ধপরিকর ৩. একজন বন্ধু বা আত্মীয় বা কোন শুভানুধ্যায়ীকে সনাক্ত করুন যিনি আপনাকে প্রতিদিন আপনার উদ্দেশ্য স্মরণ করিয়ে দিয়ে সহায়তা করতে ইচ্ছুক হবেন ৪. তৈরি হন এবং একটা দিন তারিখ ধার্য করুন যখন আপনার পূর্বনির্ধারিত পরিকল্পনা কার্যকর করতে সাব্যস্ত আছেন আপনার মত স্টেপ নিতে শুরু করুন ৫. যখন আপনার প্ল্যান কার্যকরী বলে প্রমাণিত হচ্ছে তখন নিজেকে একটু পুরস্কৃত করুন ৬. উপযুক্ত ফল লাভ না হলে আগের লক্ষ একটু কমিয়ে আনুন ৭. উদ্দেশ্য সাধনের ব্যাপারে কোন অন্তরায় দেখা দিলে তা পুনরায় চেষ্টা করুন।\r\n(খ) ডায়েটিং প্ল্যান আপনার চিকিৎসক বা পুষ্টিবিদ এর নিকট থেকে নিয়ে নিন এবং তদনুযায়ী বাস্তবায়ন করুন\r\n(গ) রাত্রির প্রথম ভাগেই ধুম শুরু করে ৭ থেকে ৮ ঘন্টা নিরবছিন্ন আরামদায়ক একটি ধুম দিন যাতে পরের দিন নিজেকে সতেজ অনুভব করতে\r\nপারেন\r\n(ঘ) সবসময় মানসিকভাবে নিজেকে প্রফুল্ল ও চাংগা রাখুন\r\n(ঙ) নিয়মিত রোজা বা উপবাস পালন করুন\r\n(চ) ব্যবস্থাপত্র অনুযায়ী শরীরচর্চা, হাঁটা ও ব্যায়ামের করুন\r\n(ছ) শারীরিকভাবে সক্রিয় জীবনযাপন করুন এবং নিষ্ক্রিয় জীবনযাপনকে ঘৃণা করুন প্রয়োজনে অন্যজনের কাজে নিজেকে নিয়োজিত করুন।\r\n(জ) খাদ্য ও পুষ্টি সম্বন্ধে কোন একটি রেফারেন্স বুক, সাইট, পেপার-পত্রিকা অনুসরণ করুন ও জ্ঞান অর্জন করুন\r\n(ঝ) সমস্ত প্রকার মাদক ও ধূমপানকে না বলুন\r\n(ঞ) আপনার পছন্দের চিকিৎসকের নিকট নিয়মিত শরণাপন্ন হন এবং আপনার অধীত জ্ঞান তার কাছ থেকে যাচাই করে নিন।\r\n\r\nটেক্সট হোম মেসেজ- স্থূলতা একটি রোগ ও অসংখ্য অসংক্রামক রোগ এর আঁতুড়ঘর যা শতভাগ প্রতিরোধযোগ্য।\r\n\r\nডা: জয়নাল আবেদীন জুয়েল\r\nএমবিবিএস, বিসিএস (স্বাস্থ্য), সিডিসি (বারডেম), এমডি (কার্ডিওলজি) B.S.M.M.U; ঢাকা\r\nসদস্য - ইউরোপিয়ান সোসাইটি অফ কার্ডিওলজি (M-ESC)\r\nকনসালটেন্ট কার্ডিওলজি\r\nকার্ডিওলজি ও মেডিসিন বিশেষজ্ঞ', '61a8882e255d31296.jpg', '2021-12-06 00:00:00', '14', 1, 4),
(35, 'মশা নামা', 'n-a', '2021-12-02', 'মশা নামা।\r\nপৃথিবীতে প্রায় সাড়ে তিন হাজার প্রজাতির মশা রয়েছে, এর মধ্যে মাত্র ১০০ টির মত প্রজাতি রোগ ছড়ায়। এখনো পর্যন্ত বিজ্ঞানীদের গবেষণায় দেখা গেছে মশা থেকে ২০টির মত রোগ ছড়ায়। পুরো পৃথিবীতে কীটপতঙ্গের আক্রমণে প্রতিবছর যত মানুষ মারা যান, তাদের মধ্যে মশাবাহিত রোগে মারা যান সর্বোচ্চ সংখ্যক মানুষ।\r\n\r\nমশাবাহিত রোগ বিষয়ে সচেতনতা তৈরির উদ্দেশ্যে প্রতিবছর ২০শে অগাস্ট পালিত হয় বিশ্ব মশা দিবস।\r\n\r\nবাংলাদেশের মশা:\r\n\r\nকীটতত্ত্ববিদ এবং গবেষকেরা বলছেন, বাংলাদেশে এখন পর্যন্ত ১২৩ প্রজাতির মশার খোঁজ পাওয়া গেছে। এর মধ্যে ঢাকাতেই ১৪টি প্রজাতির মশা পাওয়া যায়।বাংলাদেশে এখন পর্যন্ত মশাবাহিত পাঁচটি রোগের কথা জানা যায়। এর মধ্যে রয়েছে ম্যালেরিয়া, ফাইলেরিয়া, ডেঙ্গু, চিকুনগুনিয়া এবং জাপানিজ এনসেফালাইটিস।\r\n\r\nম্যালেরিয়া:\r\n\r\nস্ত্রী অ্যানোফিলিস মশা ম্যালেরিয়া রোগের জীবাণু ছড়ায়। বাংলাদেশে মোট ৩৬ প্রজাতির অ্যানোফিলিস মশা দেখা যায়, এদের মধ্যে সাতটি প্রজাতি বাংলাদেশে ম্যালেরিয়া রোগ ছড়ায়। এই সাত প্রজাতির মধ্যে চারটি প্রজাতি ম্যালেরিয়ার প্রধান বাহক বাংলাদেশে। এই মূহুর্তে বাংলাদেশের ১৩টি জেলার ৭২টি থানায় ম্যালেরিয়া রোগের উপস্থিতি রয়েছে। মূলত পার্বত্য ও সীমান্ত এলাকাতেই ম্যালেরিয়া বেশি দেখা যায়। এটি গ্রীষ্মকালে হয়। ২০০৮ সালে বাংলাদেশে প্রায় ৮৫ হাজার মানুষ ম্যালেরিয়ায় আক্রান্ত হয়েছিলেন, মারা যান ১৫৪ জন। পরে এ সংখ্যা কমে আসে।\r\n\r\nস্বাস্থ্য অধিদফতরের মতে এখন ম্যালেরিয়া প্রকোপের ৯০ শতাংশের বেশি হয় দেশে তিন পার্বত্য জেলায়।২০৩০ সালের মধ্যে দেশ থেকে ম্যালেরিয়া নির্মূলের পরিকল্পনা নিয়ে স্বাস্থ্য অধিদপ্তর কাজ করছে।\r\n\r\nফাইলেরিয়া :\r\n\r\nকিউলেক্স মশার দুটি প্রজাতি এবং ম্যানসোনিয়া মশার একটি প্রজাতির মাধ্যমে বাংলাদেশে ফাইলেরিয়া রোগ ছডায়। ফাইলেরিয়া রোগে মানুষের হাত-পা ও অন্যান্য অঙ্গ অস্বাভাবিকভাবে ফুলে ওঠে। একে স্থানীয়ভাবে গোদ রোগও বলা হয়।বাংলাদেশের ৩৪টি জেলায় ফাইলেরিয়া আক্রান্ত রোগী দেখা যায়।\r\n\r\nডেঙ্গু:\r\nএডিস মশার দুইটি প্রজাতি- এডিস ইজিপ্টি এবং অ্যালবোপিকটাস, মূলত ডেঙ্গু ভাইরাসের জীবাণু ছড়ায়। এডিস মশা পাত্রে জমা পরিষ্কার পানিতে জন্মায়। সাধারণত বর্ষাকালে এর ঘনত্ব বেশি হয়, ফলে ডেঙ্গু রোগের প্রাদুর্ভাবও এ সময়ে বেড়ে যায়। কিন্তু বাংলাদেশে চলতি বছর করোনাভাইরাস মহামারির পাশাপাশি ডেঙ্গু রোগের প্রকোপ অনেকগুন বেড়েছে।ডেঙ্গু জ্বরে সাধারণত তীব্র জ্বর ও সেই সঙ্গে সারা শরীরে প্রচণ্ড ব্যথা হয়ে থাকে। তীব্র পেটে ব্যথাও হতে পারে। শরীরে বিশেষ করে মাংসপেশীতে তীব্র ব্যথা হয়। জ্বরের ৪/৫ দিন পার হলে শরীরজুড়ে র্যাশ বা ঘামাচির মত লালচে দানা দেখা দেয়। সাথে বমি ভাব, এমনকি বমিও হতে পারে। ডেঙ্গু গুরুতর হলে রক্তে প্লাটিলেট কমে যায়, চোখের কোনা, দাঁতের মাড়ি বা নাক থেকে রক্তক্ষরণ হতে পারে। বাংলাদেশে ডেঙ্গু আক্রান্ত হয়ে মৃত্যুর প্রধাণ কারণ হচ্ছে আক্রান্ত হবার পর পরিস্থিতি খারাপ না হওয়া পর্যন্ত ডাক্তারের কাছে না যাওয়া।\r\n\r\nচিকুনগুনিয়া :\r\nচিকুনগুনিয়া রোগও এডিস মশার মাধ্যমে ছড়ায়। ২০০৮ সালে বাংলাদেশে প্রথম চিকুনগুনিয়া ধরা পড়ে। চিকুনগুনিয়া জ্বরের লক্ষণ সাধারণ ভাইরাল ফিভারের মত। তবে মাথাব্যথা, বমি ভাব, দুর্বলতা, সর্দি-কাশি, এবং র্যাশের সঙ্গে শরীরে হাড়ের জয়েন্ট বা সংযোগস্থলে তীব্র ব্যথা হয়। চিকুনগুনিয়া হলে অধিকাংশ সময় তিন থেকে চার দিনের মধ্যে জ্বর সেরে যায়। কিন্তু হাড়ের সংযোগস্থলগুলোতে হওয়া ব্যথা কারো কারো ক্ষেত্রে দীর্ঘদিন ভোগায়।\r\n\r\nজাপানিজ এনসেফালাইটিস: জাপানিজ এনসেফালাইটিস রোগটি কিউলেক্স মশার মাধ্যমে ছড়ায়। ১৯৭৭ সালে মধুপুর বন এলাকায় প্রথম জাপানিজ এনসেফালাইটিস আক্রান্ত রোগী শনাক্ত হয়েছিলেন। এরপর বিভিন্ন সময়ে রাজশাহী, রংপুর, চট্টগ্রাম এবং খুলনা অঞ্চলে এই রোগটি পাওয়া যায়। অধ্যাপক বাশার বলছেন, বাংলাদেশে মশাবাহিত এই পাঁচ ধরণের রোগই মূলত দেখা যায়। তবে কয়েক বছর আগে বাংলাদেশে জিকা ভাইরাস আক্রান্ত দুইজন রোগী শনাক্ত হয়েছিলেন। এরপর গত কয়েক বছরে আর জিকা ভাইরাস আক্রান্ত কাউকে শনাক্তের কথা শোনা যায়নি। ফলে বাংলাদেশে এর অস্তিত্ব আছে বলে তিনি মনে করেন না।\r\n\r\nকীভাবে মশাবাহিত রোগ থেকে সুস্থ থাকবেন:\r\n\r\nমশাবাহিত রোগে আক্রান্ত হবার আগেই সতর্ক হবার পরামর্শ দেন বিশেষজ্ঞরা। কারণ আক্রান্ত হবার পর সঠিক সময়ে চিকিৎসকের শরণাপন্ন না হলে মৃত্যুসহ নানা ধরণের জটিলতার ঝুঁকি বেড়ে যায়।\r\n• ডেঙ্গু ও চিকুনগুনিয়ার এই দুইটি রোগের জন্যই দায়ী এডিস মশা সাধারণত সকালের দিকে এবং সন্ধ্যার আগে এডিস কামড়ায়। ফলে এই দুই সময়ে ঘরের দরজা জানালা বন্ধ রাখতে হবে।\r\n• ঘুমানোর সময় মশারি খাটিয়ে ঘুমাতে হবে।\r\n• বাড়ির ছাদে বা বারান্দার ফুলের টবে, নির্মাণাধীন ভবনে, বাতিল টায়ার কিংবা প্লাস্টিক কন্টেইনার- কোথাও যাতে তিন থেকে পাঁচদিনের বেশি পানি জমা না থাকে, সে ব্যবস্থা করতে হবে।\r\n• মশার কামড় থেকে বাঁচতে নানা ধরণের রিপেলেন্ট অর্থাৎ মশা তাড়ানোর পণ্য যেমন বিভিন্ন ধরণের কয়েল, স্প্রে, ক্রিম জাতীয় পণ্য ব্যবহার করা, তবে এর মাত্রা ও প্রয়োগ সম্পর্কে সতর্ক থাকতে হবে।\r\n\r\nমশা তাড়ানোর প্রাকৃতিক পদ্ধতি:\r\nবিশেষজ্ঞদের কেউ কেউ মনে করেন মশা তাড়াতে কয়েল বা স্প্রে ব্যবহার না করে প্রাকৃতিক উপায় চেষ্টা করে দেখা যেতে পারে।\r\nতবে ঢাকায় মশার সংখ্যা যেভাবে বেড়েছে তাতে এসব কায়দা কতটা খাটবে সে আশংকাও রয়েছে।\r\nঅনেক বছর ধরে মশা তাড়াতে ব্যবহার করা হচ্ছে এমন কয়েকটি প্রাকৃতিক পদ্ধতি নিচে বর্ণনা করা হলো:\r\nনিমে মশা তাড়ানোর বিশেষ গুণ রয়েছে। প্রাচীনকালে মশা তাড়াতে নিমের তেল ব্যবহার করা হত। ত্বকে নিম তেল লাগিয়ে নিলে মশা ধারে-কাছেও ভিড়বে না বলে প্রচলিত।\r\nবলা হয়ে থাকে মশা কর্পূরের গন্ধ সহ্য করতে পারে না। ঘরের দরজা-জানালা বন্ধ করে কর্পূর দিয়ে রাখলে মশা পালিয়ে যায়।\r\nলেবু আর লবঙ্গ একসঙ্গে রেখে দিলে ঘরে মশা থাকে না বলে প্রচলিত আছে। এগুলো জানালায় রাখলে মশা ঘরে ঢুকতে পারবে না\r\nব্যবহৃত চা পাতা ফেলে না দিয়ে রোদে শুকিয়ে সেটা জ্বালালে চা পাতার ধোঁয়ায় ঘরের সব মশা-মাছি পালিয়ে যাবে। কিন্তু এতে শ্বাসতন্ত্রের ক্ষতি হবে না।\r\n\r\nমশা নিয়ে কয়েকটি মজার তথ্য :\r\n*একটি মশা সেকেন্ডে প্রায় ৩০০-৬০০ বার ডানা ঝাপটায়, মশা ওড়ার সময় এই ডানা ঝাপটানোর শব্দই শুনি আমরা\r\n*কেবলমাত্র স্ত্রী মশাই মানুষকে কামড়ায়, পুরুষ মশা নয়।\r\n*মশা ঘণ্টায় প্রায় দেড় মাইল বেগে উড়তে পারে।\r\n*ডিম ফুটে বের হওয়ার এক সপ্তাহের মধ্যেই মশা মানুষকে কামড়ে রক্ত শুষে নেয়।\r\n*মশা স্তন্যপায়ী প্রাণীকে কামড়ানোর পাশাপাশি পাখি ও সরীসৃপের শরীরেও হুল ফোটায়\r\n*মশা তার নিজের ওজনের তিনগুণ রক্ত শুষে নিতে পারে।\r\nসংগৃহীত', '61a869106583c6317.jpg', '2021-12-06 00:00:00', '14', 0, 23);

-- --------------------------------------------------------

--
-- Table structure for table `web_info`
--

DROP TABLE IF EXISTS `web_info`;
CREATE TABLE IF NOT EXISTS `web_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `short_des` varchar(255) NOT NULL,
  `web_link` varchar(100) NOT NULL,
  `hotline` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_info`
--

INSERT INTO `web_info` (`id`, `name`, `short_des`, `web_link`, `hotline`, `image`) VALUES
(8, 'Arch hospital management software', 'Arch hospital management software designed for Hospital, Clinic, Diagnostic Center, Individual Doctors, Physicians as well as Multi-Specialty Hospitals in Bangladesh by Esteem Soft Limited', 'https://esteemsoftbd.com/arch/best-hospital-clinic-software-in-bd', 123456789, 'download2.jpg'),
(9, 'Witty school college management software', 'Aimed to make administrative works of school and college easier & smarter. It\'s a web-based software which is accessible from anywhere', 'https://esteemsoftbd.com/witty/best-school-college-software-in-bd', 1234567892, 'hospital2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `web_module`
--

DROP TABLE IF EXISTS `web_module`;
CREATE TABLE IF NOT EXISTS `web_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_module`
--

INSERT INTO `web_module` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `position`, `image`) VALUES
(85, 'Mushfiqur', 'Rahim', 'mushi@gmail.com', 1234567897, 'Bagura', 'Dhaka', 'bottom-a', 'musfiqur.jpg'),
(86, 'Tamim', 'Iqbal', 'tamim@gmail.com', 1234567897, 'Chattrogram', 'Dhaka', 'bottom-a', 'Tamim-Iqbal.jpg'),
(87, 'Mashrafee', 'Mortoza', 'mash@gmail.com', 1234567897, 'Norail', 'Dhaka', 'bottom-a', 'mushrafee.jpg'),
(88, 'Mustafiz', 'Rahman', 'musta@gmail.com', 1234567897, 'Jhinaidah', 'Dhaka', 'bottom-a', 'mustafiz.jpg'),
(89, 'Tamim', 'Sharif', 'eeeee@email.com', 1785294437, 'Dhaka', 'rrrr', 'home-right-1', 'elephant-.webp'),
(90, 'Tamim', 'Sharif', 'eeeee@email.com', 1785294437, 'Dhaka', 'rrrr', 'home-right-2', 'mushrafee.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `web_module_position`
--

DROP TABLE IF EXISTS `web_module_position`;
CREATE TABLE IF NOT EXISTS `web_module_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `note` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_module_position`
--

INSERT INTO `web_module_position` (`id`, `name`, `note`) VALUES
(1, 'bottom-a', NULL),
(2, 'bottom-b', NULL),
(3, 'bottom-c', NULL),
(4, 'bottom-d', NULL),
(5, 'footer-a', NULL),
(6, 'footer-b', NULL),
(7, 'footer-c', NULL),
(8, 'footer-d', NULL),
(9, 'header-left', NULL),
(10, 'header-right', NULL),
(11, 'about-right-1', NULL),
(12, 'about-right-2', NULL),
(13, 'about-right-3', NULL),
(14, 'home-right-1', NULL),
(15, 'home-right-2', NULL),
(16, 'academic-right-1', NULL),
(17, 'notice_board', NULL),
(18, 'about_us_section', NULL),
(19, 'department_section', NULL),
(20, 'services_section', NULL),
(21, 'quick_info_section', NULL),
(22, 'consultant_section', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
