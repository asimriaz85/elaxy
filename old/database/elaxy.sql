-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2014 at 01:35 AM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `elaxy`
--

-- --------------------------------------------------------

--
-- Table structure for table `adsens_ad`
--

CREATE TABLE IF NOT EXISTS `adsens_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_page_name` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `images` varchar(255) NOT NULL,
  `ad_code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `adsens_ad`
--


-- --------------------------------------------------------

--
-- Table structure for table `ad_abuse`
--

CREATE TABLE IF NOT EXISTS `ad_abuse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postcode_loaction_id` int(11) NOT NULL,
  `feature` varchar(255) NOT NULL,
  `ad_user_id` int(11) NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `report_message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `ad_abuse`
--

INSERT INTO `ad_abuse` (`id`, `postcode_loaction_id`, `feature`, `ad_user_id`, `reporter_id`, `report_message`) VALUES
(1, 6, 'spotlight', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `ad_price`
--

CREATE TABLE IF NOT EXISTS `ad_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postcode_loaction_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `days` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `ad_price`
--

INSERT INTO `ad_price` (`id`, `postcode_loaction_id`, `name`, `price`, `days`) VALUES
(2, 2, 'feature', '15.50', 7),
(3, 3, 'feature', '15.50', 7),
(11, 7, 'urgent', '9.95', 7),
(4, 4, 'urgent', '9.95', 7),
(5, 4, 'feature', '15.50', 7),
(6, 4, 'spotlight', '23.50', 7),
(7, 5, 'Free Ad', '0', 28),
(8, 6, 'urgent', '9.95', 7),
(9, 6, 'feature', '15.50', 7),
(10, 6, 'spotlight', '23.50', 7),
(12, 7, 'feature', '15.50', 7),
(13, 7, 'spotlight', '23.50', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ad_title_description`
--

CREATE TABLE IF NOT EXISTS `ad_title_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postcode_loaction_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ad_title_description`
--

INSERT INTO `ad_title_description` (`id`, `postcode_loaction_id`, `title`, `description`) VALUES
(7, 7, 'Bike', 'hi this is test message for bikes<br>'),
(2, 2, 'computing', 'hhflsdhfsdhflsdhfsdhf'),
(3, 3, 'BMW', 'bs,bf,sdbf,sdbf'),
(4, 4, 'Farrari', 'sjdhfjsdhfljsdhflsdhflsdhflsdhflsdhf'),
(5, 5, 'test images', 'sfkgsdkfskdgfsdkgfksdgf'),
(6, 6, 'test images222', 'kjshlfjsdfhsldhf;ksdjf;skdf');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `announcements` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `announcements`) VALUES
(1, 'Test message<br>');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `show_hide` varchar(11) NOT NULL,
  `parent_off` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `show_hide`, `parent_off`) VALUES
(1, 'Cars, Vans & Motorbikes', 'Show', 0),
(2, 'Jobs', 'Show', 0),
(3, 'Flats & Houses', 'Show', 0),
(4, 'Services', 'Show', 0),
(5, 'For Sale', 'Show', 0),
(6, 'Community', 'Show', 0),
(7, 'Pets', 'Show', 0),
(8, 'Cars', 'Show', 1),
(9, 'Accounting', 'Show', 2),
(10, 'Car Parts & Accessories', 'Show', 1),
(34, 'Motorbike Parts & Accessories', 'Show', 1),
(11, 'Axio', 'Show', 8),
(12, 'Axiam', 'Show', 8),
(13, 'BMW', 'Show', 8),
(14, 'Farrari', 'Show', 8),
(15, 'Lotus', 'Show', 8),
(16, 'Fiat', 'Show', 8),
(32, 'Campervans & Caravans', 'Show', 1),
(20, 'Lada', 'Show', 8),
(33, 'Motorbikes & Scooters', 'Show', 1),
(35, 'Vans, Trucks & Plant', 'Show', 1),
(36, 'Wanted', 'Show', 1),
(37, 'Audio & Stereo', 'Show', 5),
(38, 'Baby & Kids Stuff', 'Show', 5),
(39, 'CDs, DVDs, Games & Books', 'Show', 5),
(40, 'Clothes, Footwear & Accessories', 'Show', 5),
(41, 'Computers & Software', 'Show', 5),
(42, 'Home & Garden', 'Show', 5),
(43, 'Music & Instruments', 'Show', 5),
(44, 'Office Furniture & Equipment', 'Show', 5),
(45, 'Phones, Mobile Phones & Telecoms', 'Show', 5),
(46, 'Sports, Leisure & Travel', 'Show', 5),
(47, 'Tickets', 'Show', 5),
(48, 'TV, DVD & Cameras', 'Show', 5),
(49, 'Video Games & Consoles', 'Show', 5),
(50, 'Freebies', 'Show', 5),
(51, 'Miscellaneous Goods', 'Show', 5),
(52, 'Stuff Wanted', 'Show', 5),
(53, 'Swap Shop', 'Show', 5),
(54, 'Automotive & Engineering', 'Show', 2),
(55, 'Banking, Settlements & Insurance', 'Show', 2),
(56, 'Bar Staff & Management', 'Show', 2),
(57, 'Caretakers & Handymen', 'Show', 2),
(58, 'Chefs, Cooks & Kitchen', 'Show', 2),
(59, 'Christmas Jobs', 'Show', 2),
(60, 'Computing & IT', 'Show', 2),
(61, 'Construction', 'Show', 2),
(62, 'Data Entry & Junior Admin', 'Show', 2),
(63, 'Dentist, Dental Hygiene & Sales', 'Show', 2),
(64, 'Driving & Warehouse', 'Show', 2),
(65, 'Education', 'Show', 2),
(66, 'Farm, Vet, Garden & Landscaping', 'Show', 2),
(67, 'General Jobs', 'Show', 2),
(68, 'Health & Beauty', 'Show', 2),
(69, 'Healthcare', 'Show', 2),
(70, 'Homecare & Special Care', 'Show', 2),
(71, 'Hotel', 'Show', 2),
(72, 'Housekeeping & Cleaning', 'Show', 2),
(73, 'Marketing, Advertising & PR', 'Show', 2),
(74, 'Media, Design & Creative', 'Show', 2),
(75, 'Nursing', 'Show', 2),
(76, 'Paralegal & Legal', 'Show', 2),
(77, 'Part-time, Evening & Weekend', 'Show', 2),
(78, 'Reception & Switchboard', 'Show', 2),
(79, 'Recruitment Consultants', 'Show', 2),
(80, 'Sales, Retail & Customer Service', 'Show', 2),
(81, 'Secretarial, PAs & Admin', 'Show', 2),
(82, 'Security', 'Show', 2),
(83, 'Social Work', 'Show', 2),
(84, 'Sports & Healthclub', 'Show', 2),
(85, 'Student & Graduate', 'Show', 2),
(86, 'Training & HR', 'Show', 2),
(87, 'Training Courses & Open Days', 'Show', 2),
(88, 'Travel & Overseas', 'Show', 2),
(89, 'Volunteer & Charity Work', 'Show', 2),
(90, 'Waiting & Restaurant Management', 'Show', 2),
(91, 'For Rent ', 'Show', 3),
(92, 'Offered', 'Show', 3),
(93, 'Rent Wanted', 'Show', 3),
(94, 'To Share', 'Show', 3),
(95, 'Shared Offered', 'Show', 3),
(96, 'Shared Wanted', 'Show', 3),
(97, 'Property for Sale ', 'Show', 3),
(98, 'Building, Home & Removals', 'Show', 4),
(99, 'Entertainment', 'Show', 4),
(100, 'Miscellaneous', 'Show', 4),
(101, 'Property & Shipping', 'Show', 4),
(102, 'Tax, Money & Visas', 'Show', 4),
(103, 'Telecoms & Computers', 'Show', 4),
(104, 'Travel Services & Tours', 'Show', 4),
(105, 'Tuition & Lessons', 'Show', 4),
(106, 'Artists & Theatres', 'Show', 6),
(107, 'Babysitting', 'Show', 6),
(108, 'Classes', 'Show', 6),
(109, 'Community Chest', 'Show', 6),
(110, 'Creative Writing', 'Show', 6),
(111, 'Events, Gigs & Nightlife', 'Show', 6),
(114, 'Fitness, Dance & Health', 'Show', 6),
(115, 'Gumtree Fun', 'Show', 6),
(116, 'Lost & Found Stuff', 'Show', 6),
(117, 'Music, Bands, Musicians & DJs', 'Show', 6),
(118, 'Rideshare & Car Pooling', 'Show', 6),
(113, 'Groups & Associations', 'Show', 6),
(119, 'Skills & Language Swap', 'Show', 6),
(120, 'Sports Teams & Partners', 'Show', 6),
(121, 'Travel & Travel Partners', 'Show', 6),
(122, 'Pets for Sale', 'Show', 7),
(123, 'Equipment & Accessories', 'Show', 7),
(124, 'Missing, Lost & Found', 'Show', 7),
(125, 'Petsitters & Dogwalkers', 'Show', 7),
(126, 'test1', 'Show', 11),
(127, 'testabc', 'Show', 126),
(128, 'abcdfe', 'Show', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories_image`
--

CREATE TABLE IF NOT EXISTS `categories_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `categories_image`
--

INSERT INTO `categories_image` (`id`, `cat_id`, `image`) VALUES
(1, 1, 'categories_1_1.jpg'),
(2, 2, 'categories_1_2.jpg'),
(3, 3, 'categories_1_3.jpg'),
(4, 4, 'categories_1_4.jpg'),
(5, 5, 'categories_1_5.jpg'),
(6, 6, 'categories_1_6.jpg'),
(7, 7, 'categories_1_7.jpg'),
(8, 21, 'categories_1_8.jpg'),
(9, 22, 'categories_1_9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_via`
--

CREATE TABLE IF NOT EXISTS `contact_via` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postcode_loaction_id` int(11) NOT NULL,
  `via_email` varchar(255) NOT NULL,
  `via_phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `contact_via`
--

INSERT INTO `contact_via` (`id`, `postcode_loaction_id`, `via_email`, `via_phone`) VALUES
(1, 1, 'faisalwebprogrammer@gmail.com', '03368819287'),
(2, 2, 'faisalwebprogramer@yahoo.com', '033688198287'),
(3, 3, 'faisalwebprogramer@yahoo.com', ''),
(4, 4, 'faisalwebprogramer@yahoo.com', '033688198287'),
(5, 5, 'faisalwebprogramer@yahoo.com', '033688198287'),
(6, 6, 'faisalwebprogramer@yahoo.com', '033688198287'),
(7, 7, 'faisalwebprogrammer@gmail.com', '03368819287');

-- --------------------------------------------------------

--
-- Table structure for table `country_state`
--

CREATE TABLE IF NOT EXISTS `country_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `country_state`
--

INSERT INTO `country_state` (`id`, `country_id`, `state_name`) VALUES
(1, 1, 'Bedfordshire'),
(2, 1, 'Berkshire');

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

CREATE TABLE IF NOT EXISTS `county` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) NOT NULL,
  `county_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `county`
--

INSERT INTO `county` (`id`, `region_id`, `county_name`) VALUES
(1, 1, 'abcdef');

-- --------------------------------------------------------

--
-- Table structure for table `deactivate_radio`
--

CREATE TABLE IF NOT EXISTS `deactivate_radio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `radio_text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `deactivate_radio`
--

INSERT INTO `deactivate_radio` (`id`, `radio_text`) VALUES
(1, 'I don''t have any more stuff to put on Gumtree'),
(2, ' I didn''t get enough response to my ads on Gumtree'),
(3, 'I got too many spam emails from my ads'),
(4, 'I''d rather not say'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE IF NOT EXISTS `favourite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postcode_loaction_id` int(11) NOT NULL,
  `feature` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`id`, `postcode_loaction_id`, `feature`, `user_id`) VALUES
(1, 1, 'Free Ad', 2),
(2, 3, 'feature', 2),
(7, 1, 'Free Ad', 2),
(6, 1, 'Free Ad', 2),
(8, 4, 'urgent', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kingdoms`
--

CREATE TABLE IF NOT EXISTS `kingdoms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kingdom_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kingdoms`
--

INSERT INTO `kingdoms` (`id`, `kingdom_name`) VALUES
(1, 'United Kingdom');

-- --------------------------------------------------------

--
-- Table structure for table `kingdom_countries`
--

CREATE TABLE IF NOT EXISTS `kingdom_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kingdom_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kingdom_countries`
--

INSERT INTO `kingdom_countries` (`id`, `kingdom_id`, `country_name`) VALUES
(1, 1, 'England'),
(2, 1, 'Northern Ireland'),
(3, 1, 'Scotland'),
(4, 1, 'Wales');

-- --------------------------------------------------------

--
-- Table structure for table `lime_price`
--

CREATE TABLE IF NOT EXISTS `lime_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `days` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lime_price`
--

INSERT INTO `lime_price` (`id`, `days`, `price`) VALUES
(1, 7, '15.50'),
(2, 14, '18.50'),
(3, 3, '12.00');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `ip` varchar(20) DEFAULT NULL,
  `attempts` int(11) DEFAULT '0',
  `lastlogin` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`ip`, `attempts`, `lastlogin`) VALUES
('127.0.0.1', 0, '2013-11-28 20:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date_time` date NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `post_id`, `user_id`, `name`, `email`, `message`, `date_time`, `f_name`, `parent_id`) VALUES
(1, 6, 1, 'faisal', 'faisalwebprogrammer@gmail.com', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \ntypesetting industry. Lorem Ipsum has been the industry''s standard dummy\n text ever since the 1500s, when an unknown printer took a galley of \ntype and scrambled it to make a type specimen book. It has survived not \nonly five centuries, but also the leap into electronic typesetting, \nremaining essentially unchanged. It was popularised in the 1960s with \nthe release of Letraset sheets containing Lorem Ipsum passages, and more\n recently with desktop publishing software like Aldus PageMaker \nincluding versions of Lorem Ipsum.', '2014-02-04', 'spotlight ', 0),
(2, 6, 2, 'faisal', 'faisalwebprogramer@yahoo.com', 'this is test mail against this message thank you', '2014-02-04', 'spotlight 	', 1),
(6, 6, 2, 'faisal', 'faisalwebprogramer@yahoo.com', 'fsdfdsf', '2014-02-04', 'spotlight 	', 1),
(7, 4, 1, 'faisal', 'faisalwebprogrammer@gmail.com', 'hsdkjfskjhfsjdhf', '2014-02-04', 'urgent', 0),
(8, 6, 5, 'test', 'faisalhtc85@gmail.com', 'this is testing message<br>', '2014-02-05', 'spotlight', 0),
(9, 6, 2, 'faisal', 'faisalwebprogramer@yahoo.com', 'reply testing', '2014-02-05', '', 8),
(10, 6, 5, 'test', 'faisalhtc85@gmail.com', 'hfljsdhfshf', '2014-02-05', '', 8),
(11, 6, 5, 'test', 'faisalhtc85@gmail.com', 'test against post ', '2014-02-05', '', 8),
(12, 6, 5, 'test', 'faisalhtc85@gmail.com', 'hiii', '2014-02-05', '', 8),
(13, 6, 5, 'test', 'faisalhtc85@gmail.com', 'hiii', '2014-02-05', '', 8),
(14, 6, 5, 'test', 'faisalhtc85@gmail.com', 'dlkflsdkfs', '2014-02-05', '', 8),
(15, 6, 2, 'faisal', 'faisalwebprogramer@yahoo.com', 'this is testing msg send to gmail shehzad', '2014-02-10', '', 1),
(16, 6, 5, 'test', 'faisalhtc85@gmail.com', 'nvsdlvhlsdkhvlsdhf', '2014-02-27', '', 8);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pages`
--


-- --------------------------------------------------------

--
-- Table structure for table `postcode_location`
--

CREATE TABLE IF NOT EXISTS `postcode_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `main_cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `sub_sub_cat` int(11) NOT NULL,
  `sub_cat_child_child` int(11) NOT NULL,
  `sub_cat_child_child_child` int(11) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `companyname` varchar(500) NOT NULL,
  `house_name` varchar(500) NOT NULL,
  `town` varchar(500) NOT NULL,
  `map` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `item_price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `postcode_location`
--

INSERT INTO `postcode_location` (`id`, `user_id`, `main_cat_id`, `sub_cat_id`, `sub_sub_cat`, `sub_cat_child_child`, `sub_cat_child_child_child`, `postcode`, `companyname`, `house_name`, `town`, `map`, `date`, `status`, `item_price`) VALUES
(1, 1, 1, 8, 11, 0, 0, 'AA1 1AB', 'MARKETING DEPT, THE BIG COMPANY', '', 'BIG CITY', 0, '2014-02-02', 1, '15.50'),
(2, 2, 2, 60, 0, 0, 0, 'AA1 1AB', 'THE SMALL COMPANY', '', 'BIG CITY', 0, '2014-02-02', 1, '0'),
(3, 2, 1, 8, 13, 0, 0, 'AA1 1AB', 'THE SMALL COMPANY', '', 'BIG CITY', 0, '2014-02-02', 1, '15000'),
(4, 2, 1, 8, 14, 0, 0, 'AA1 1AB', 'MARKETING DEPT, THE BIG COMPANY', '', 'BIG CITY', 0, '2014-02-03', 1, '10000'),
(5, 2, 1, 8, 15, 0, 0, 'AA1 1AB', 'MARKETING DEPT, THE BIG COMPANY', '', 'BIG CITY', 0, '2014-02-06', 1, '1000'),
(6, 2, 1, 8, 16, 0, 0, 'AA1 1AB', 'MARKETING DEPT, THE BIG COMPANY', '', 'BIG CITY', 0, '2014-02-06', 0, '1000'),
(7, 1, 1, 33, 0, 0, 0, 'AA1 1AB', 'MARKETING DEPT, THE BIG COMPANY', '', 'BIG CITY', 0, '2014-02-27', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `prime_price`
--

CREATE TABLE IF NOT EXISTS `prime_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `days` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `prime_price`
--


-- --------------------------------------------------------

--
-- Table structure for table `property_holiday_rent`
--

CREATE TABLE IF NOT EXISTS `property_holiday_rent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postcode_loaction_id` int(11) NOT NULL,
  `date_available` date NOT NULL,
  `rent_price` varchar(255) NOT NULL,
  `rent_period` varchar(100) NOT NULL,
  `property_type` varchar(100) NOT NULL,
  `no_rooms` varchar(100) NOT NULL,
  `acting_agent` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `property_holiday_rent`
--


-- --------------------------------------------------------

--
-- Table structure for table `quick_price`
--

CREATE TABLE IF NOT EXISTS `quick_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `days` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quick_price`
--


-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `region_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `state_id`, `region_name`) VALUES
(1, 1, 'Bedfordshire');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `newsletter` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `first_name`, `last_name`, `phone`, `country`, `email`, `password`, `newsletter`, `status`, `date`) VALUES
(1, 'gmail', 'shehzad', '03368819287', 'Pakistan', 'faisalwebprogrammer@gmail.com', '802f627328a4d36efb6045d4c52f75eb', 0, 1, '2013-11-18'),
(2, 'faisal', 'shehzad', '033688198287', '', 'faisalwebprogramer@yahoo.com', '802f627328a4d36efb6045d4c52f75eb', 1, 1, '2013-11-18'),
(5, 'test', 'test', '1234567', '', 'faisalhtc85@gmail.com', '802f627328a4d36efb6045d4c52f75eb', 1, 1, '2014-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `sponsored_links`
--

CREATE TABLE IF NOT EXISTS `sponsored_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `weblink` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `show_hide` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sponsored_links`
--


-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`) VALUES
(1, 'England'),
(2, 'Scotland'),
(3, 'Wales'),
(4, 'Northern Ireland');

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE IF NOT EXISTS `town` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `county_id` int(11) NOT NULL,
  `town_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`id`, `county_id`, `town_name`) VALUES
(1, 1, 'town test123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `status`) VALUES
(1, 'Muzzamil', 'Faiz', 'muzzamal16@gmail.com', 'demo', 'demo', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users_images`
--

CREATE TABLE IF NOT EXISTS `users_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postcode_loaction_id` int(11) NOT NULL,
  `file_id` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users_images`
--

INSERT INTO `users_images` (`id`, `postcode_loaction_id`, `file_id`, `file_name`) VALUES
(12, 7, '', 'o_18hp4bg00o8jbf1hno1h0sr6b.jpg'),
(2, 2, '', 'o_18fptqphe4gv141v2s67av107eb.jpg'),
(3, 3, '', 'o_18fptvf0btbj1ume1jvk1o0l4n0b.jpg'),
(4, 4, '', 'o_18fs49nkb1dhn1fnrbsv1cs71h1ob.jpg'),
(5, 5, '', 'o_18g3puhnuhn01bqutff12urtkid.jpg'),
(6, 5, '', 'o_18g3puhnuc7p1ded18mj1b7n1jdae.jpg'),
(7, 5, '', 'o_18g3puhnvjna1911dnu10v51he7f.jpg'),
(8, 6, '', 'o_18g3q5iil109v1fja1cv61tcp1f2se.jpg'),
(9, 6, '', 'o_18g3q5iil3ukfrv82c1phha8uf.jpg'),
(10, 6, '', 'o_18g3q5iim1nmv91u95fhna1nqqg.jpg'),
(11, 6, '', 'o_18g3q5iimpjv5giu4l128g19teh.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_make_mode`
--

CREATE TABLE IF NOT EXISTS `vehicle_make_mode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postcode_loaction_id` int(11) NOT NULL,
  `make_id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `body_type` varchar(255) NOT NULL,
  `transmission` varchar(255) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `engine_size` varchar(255) NOT NULL,
  `mileage` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `dealer` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `vehicle_make_mode`
--

INSERT INTO `vehicle_make_mode` (`id`, `postcode_loaction_id`, `make_id`, `year`, `model`, `fuel_type`, `body_type`, `transmission`, `colour`, `engine_size`, `mileage`, `price`, `dealer`) VALUES
(1, 1, 11, '2014', '2013', 'Petrol', '4 Door Saloon', 'Manual', 'Black', '1800', '13000', '15.50', 'No'),
(2, 3, 13, '2014', '2014', 'Petrol', 'Coupe', 'Automatic', 'white', '2000', '1000', '15000', 'No'),
(3, 4, 14, '2013', '2013', 'Petrol', '2 Door Saloon', 'Automatic', 'Black', '2000', '10000', '10000', 'No'),
(4, 5, 15, '2013', '2013', 'Petrol', '4 Door Saloon', 'Manual', 'white', '2000', '3000', '1000', 'No'),
(5, 6, 16, '2014', '2013', 'Petrol', '4 Door Saloon', 'Manual', 'black', '1300', '3000', '1000', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `your_web_link`
--

CREATE TABLE IF NOT EXISTS `your_web_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postcode_loaction_id` int(11) NOT NULL,
  `link_site` varchar(500) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `your_web_link`
--

