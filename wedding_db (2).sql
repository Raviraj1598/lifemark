-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 04:59 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_tb`
--

CREATE TABLE `about_tb` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_tb`
--

INSERT INTO `about_tb` (`id`, `message`) VALUES
(10, 'What is Wedding At One Touch...?'),
(11, 'Wedding At One Touch Has Referrals , Attending Service Provider meetings and coordinating and managing  right up to overseeing the execution of Service Provider services on the Wedding At One Touch.'),
(12, 'What Is The Work Of This..?'),
(13, 'Wedding At One Touch  offers those ever so important services related to wedding.we love all things weddings to such an extent that we take pleasure in managing all aspects in a bid to make your special day an extraordinary one that will be forever remembered.'),
(14, 'Why  you should choose..? '),
(15, 'You will be choose This Wedding At One Touch site in a easily choose you will be require service provider and  for Wedding. It Has been manage And Provide  wedding services in your Budget.');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `b_id` int(11) NOT NULL,
  `sp_id` varchar(10) NOT NULL,
  `u_id` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rating` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`b_id`, `sp_id`, `u_id`, `time`, `rating`, `status`) VALUES
(1, '1', '10', '2022-02-21 18:52:51', '5', 'Booking Reject');

-- --------------------------------------------------------

--
-- Table structure for table `booking_tb`
--

CREATE TABLE `booking_tb` (
  `b_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `u_budget` double NOT NULL,
  `u_date` date NOT NULL,
  `b_status` enum('Active','Deactive') NOT NULL,
  `b_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_tb`
--

INSERT INTO `booking_tb` (`b_id`, `sp_id`, `u_id`, `s_id`, `cat_id`, `u_budget`, `u_date`, `b_status`, `b_date`) VALUES
(2, 2, 6, 7, 3, 30000, '2018-12-31', 'Active', '2018-12-28 04:23:16'),
(3, 1, 2, 9, 3, 5000, '2019-03-15', 'Active', '2019-03-08 02:43:50'),
(4, 1, 2, 8, 3, 10000, '2019-03-14', 'Deactive', '2019-03-11 12:04:29'),
(5, 1, 2, 8, 3, 5000, '2019-03-15', 'Deactive', '2019-03-11 12:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_list`
--

CREATE TABLE `cancel_list` (
  `can_id` int(11) NOT NULL,
  `u_id` varchar(10) NOT NULL,
  `u_cid` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category_tb`
--

CREATE TABLE `category_tb` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_status` enum('Active','Deactive') NOT NULL,
  `cat_created` datetime NOT NULL,
  `cat_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_tb`
--

INSERT INTO `category_tb` (`cat_id`, `cat_name`, `cat_status`, `cat_created`, `cat_updated`) VALUES
(2, 'Flower', 'Active', '2018-10-16 02:31:27', '2019-02-01 12:17:07'),
(3, 'Music System', 'Active', '2018-12-15 11:22:23', '2018-12-15 11:22:23'),
(5, 'Decoration', 'Active', '2019-02-20 12:20:09', '2019-02-20 12:20:09'),
(6, 'Catering', 'Active', '2019-02-20 12:20:52', '2019-02-20 12:20:52'),
(7, 'Photography', 'Active', '2019-02-20 12:22:22', '2019-02-20 12:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `c_id` int(11) NOT NULL,
  `send` varchar(10) NOT NULL,
  `rec` varchar(10) NOT NULL,
  `msg` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `seen` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city_tb`
--

CREATE TABLE `city_tb` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_status` enum('Active','Deactive') NOT NULL,
  `created_date` datetime NOT NULL,
  `new_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_tb`
--

INSERT INTO `city_tb` (`c_id`, `c_name`, `c_status`, `created_date`, `new_date`) VALUES
(1, 'Ladol', 'Active', '2018-10-18 11:30:47', '2018-10-18 11:30:47'),
(2, 'vijapur', 'Active', '2018-10-20 11:29:49', '2018-10-20 11:29:49'),
(3, 'gandhiagar', 'Active', '2018-10-20 11:30:03', '2018-10-20 11:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

CREATE TABLE `connections` (
  `c_id` int(11) NOT NULL,
  `u_id` varchar(10) NOT NULL,
  `u_id2` varchar(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_tb`
--

CREATE TABLE `contact_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `contact` double NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_tb`
--

INSERT INTO `contact_tb` (`id`, `name`, `address`, `contact`, `email`, `website`) VALUES
(1, 'Atul Polytechnic', 'Khadat, Mahudi Road,Near Psl Factory, Mansa, Mahudi, Gujarat 382855', 6352832116, 'info@atulpolytechnic.com', 'http://www.atulpolytechnic.com');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tb`
--

CREATE TABLE `feedback_tb` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `f_email` varchar(100) NOT NULL,
  `f_message` text NOT NULL,
  `f_created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_tb`
--

INSERT INTO `feedback_tb` (`f_id`, `f_name`, `f_email`, `f_message`, `f_created_date`) VALUES
(3, 'Raviraj', 'ravirajchauhan1598@gmail.com', 'nice', '2018-10-15 04:21:20'),
(9, 'rcc', 'raviraj@gmail.com', 'nic', '2019-01-18 01:29:34'),
(8, 'rcc', 'Email', 'Message', '2019-01-18 01:27:27'),
(10, 'Raviraj', 'raj@gmail.com', 'At', '2019-03-09 11:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `login_tb`
--

CREATE TABLE `login_tb` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `l_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_tb`
--

INSERT INTO `login_tb` (`id`, `username`, `password`, `image`, `l_time`) VALUES
(1, 'Shaini', '12345', 'img13.jpg', '2019-01-11 12:12:07'),
(2, 'Raviraj', '1598', '_DSC8583.jpg', '2022-02-16 01:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `rating_tb`
--

CREATE TABLE `rating_tb` (
  `r_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `r_rating` int(5) NOT NULL,
  `r_message` text NOT NULL,
  `r_date` datetime NOT NULL,
  `r_status` enum('Active','Deactive') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_tb`
--

INSERT INTO `rating_tb` (`r_id`, `u_id`, `sp_id`, `r_rating`, `r_message`, `r_date`, `r_status`) VALUES
(1, 2, 1, 3, 'nice work', '2018-12-21 02:16:01', 'Active'),
(3, 2, 6, 3, 'Your Service Are Good And Excellent...', '2019-03-02 02:16:55', 'Active'),
(4, 2, 6, 4, 'Nice Work and Service...', '2019-03-02 02:19:21', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider_tb`
--

CREATE TABLE `serviceprovider_tb` (
  `sp_id` int(11) NOT NULL,
  `sp_name` varchar(50) NOT NULL,
  `sp_address` text NOT NULL,
  `sp_contact` double NOT NULL,
  `sp_email` varchar(100) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `service_type` varchar(20) DEFAULT NULL,
  `shop_address` text NOT NULL,
  `shop_image` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sp_password` text NOT NULL,
  `hash` text NOT NULL,
  `sp_status` enum('Active','Deactive') NOT NULL,
  `bio` text NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serviceprovider_tb`
--

INSERT INTO `serviceprovider_tb` (`sp_id`, `sp_name`, `sp_address`, `sp_contact`, `sp_email`, `shop_name`, `service_type`, `shop_address`, `shop_image`, `cat_id`, `sp_password`, `hash`, `sp_status`, `bio`, `created_date`, `updated_date`) VALUES
(1, 'Rajeshwari Sharma', 'At-LAdol', 9876543210, 'rajpatel@gmail.com', 'Rajeshwari DJ', NULL, 'Vijapur', 'images.jpg', 3, 'e65bb04dd08bd2550f02e2518aca618b6130dd1faf48326375a7c50588693003', '69e2351b6', 'Active', '', '2018-10-18 06:00:00', '2019-03-09 12:27:16'),
(2, 'Shaini', 'At Vijapr', 9876543210, 'shaini12@gmail.com', 'Event', NULL, 'Vijapur', 'img3.jpg', 5, '12345', '', 'Deactive', '', '2018-12-22 00:00:00', '2019-03-08 12:51:41'),
(4, 'Jaimin ', 'at- ladol', 8899776655, 'jaimin@gmail.com', 'Jaimin Protography', NULL, 'Ladol', 'pedroquintela.jpg', 7, '12345', '', 'Active', '', '2019-02-02 12:01:40', '2019-03-08 01:32:09'),
(5, 'Stephin', 'Mansa', 8320731982, 'stephin@gmail.com', 'Stephin Decoration', NULL, 'Mansa', 'pop-of-colour-tarun-chawla.jpg', 5, '12345', '', 'Active', '', '2019-02-20 12:25:30', '2019-03-08 01:31:06'),
(6, 'Nishi', 'Vijapur', 8200496747, 'nishipatel@gmail.com', 'Nishi Catering', NULL, 'Vijapur', 'wedding-catering-services-125x125.jpg', 6, '12345', '', 'Active', '', '2019-02-20 12:27:10', '2019-03-09 11:03:09'),
(8, 'rcc', 'Ladol', 9876543210, 'raviraj1@gmail.com', 'rc', NULL, 'Gandhinagar', 'catering-services-500x500.jpg', 2, '123456', '', 'Active', '', '2019-03-09 11:34:15', '2019-03-09 11:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `services_tb`
--

CREATE TABLE `services_tb` (
  `s_id` int(11) NOT NULL,
  `s_title` varchar(50) NOT NULL,
  `s_desc` text NOT NULL,
  `s_image` varchar(255) NOT NULL,
  `s_status` enum('Active','Deactive') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services_tb`
--

INSERT INTO `services_tb` (`s_id`, `s_title`, `s_desc`, `s_image`, `s_status`, `created_date`, `updated_date`) VALUES
(1, '24/7 Services', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero a', '101.png', 'Active', '2018-11-02 01:28:44', '2019-02-09 04:07:17'),
(2, 'Save the date of your wedding', 'Wedding At One Touch  offers those ever-so-important services related to weddings. In fact, we love all things weddings to such an extent that we take pleasure in managing all aspects ', '92.jpg', 'Active', '2019-01-26 01:27:06', '2019-03-02 11:31:31'),
(3, 'Find the perfect destination', 'Wedding At One Touch  offers those ever-so-important services related to weddings. In fact, we love all things weddings to such an extent that we take pleasure in managing all aspects ', '91.png', 'Active', '2019-01-26 01:32:26', '2019-02-09 04:11:09'),
(4, 'Tell US your budget', 'Wedding At One Touch  offers those ever-so-important services related to weddings. In fact, we love all things weddings to such an extent that we take pleasure in managing all aspects ', '100.jpg', 'Active', '2019-01-26 01:35:40', '2019-02-09 04:13:02'),
(5, 'One-Stop Shop', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero a', 'images.png', 'Active', '2019-02-09 04:14:11', '2019-02-09 04:14:11'),
(6, 'Delivery of Commitments', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero a', 'download.png', 'Active', '2019-02-09 04:15:30', '2019-02-09 04:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `service_tb`
--

CREATE TABLE `service_tb` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_details` text NOT NULL,
  `s_image1` varchar(255) NOT NULL,
  `s_image2` varchar(255) NOT NULL,
  `s_image3` varchar(255) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `s_status` enum('Active','Deactive') NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_tb`
--

INSERT INTO `service_tb` (`s_id`, `s_name`, `s_details`, `s_image1`, `s_image2`, `s_image3`, `sp_id`, `s_status`, `created_date`, `updated_date`) VALUES
(6, 'Catering Service for Wedding', 'caterers is managed by qualified and experienced persons having a proven track record in this field.The company is managed in a professional way with adequate organization.\r\n', 'catering-services-500x500.jpg', 'wedding-catering-services-125x125.jpg', 'wedding-party-catering-service-250x250.jpg', 6, 'Active', '2018-11-02 11:56:58', '2019-03-08 01:01:14'),
(7, 'Wedding Party Catering Service', 'We are master in creating the food exactly as per your needs. The one thing that guests remember long after the party is certainly the food.We at Toran Caterers mainly focus on our prestigious client satisfaction. Stay in touch with our experienced and highly dedicated team to make your event a memorable one.', 'download (1).jpg', 'download (2).jpg', 'download.jpg', 6, 'Active', '2018-12-26 05:15:30', '2019-03-08 01:00:18'),
(8, 'DJ', 'While the first phase of the discussions gives the DJ a glimpse into what you are looking for, once you get closer to your wedding date the details need to be fleshed out. Typically about 60 days out from your wedding I have a series of forms that will get filled that help me guide some of the key elements of your wedding, from the pronunciation of your wedding party guests to if you are going to have a bouquet toss.', 'dj.jpg', 'dj-mixer-with-headphones-picture-Gospel-DJ-Divine.jpeg', 'images.jpg', 1, 'Active', '2019-03-08 12:43:22', '2019-03-08 12:43:22'),
(9, 'Band', 'Your wedding, from the pronunciation of your wedding party guests to if you are going to have a bouquet toss. I have to admit, the list can be a bit tedious for some, but itâ€™s very important for me to know all the ins and outs so I can help ensure that you have a great night of entertainment.', 'band-baaja-baraat.jpg', 'IMG-20150324-WA0004.jpg', 'maharashtra_dosti_brass_band_brass_band_mumbai_7644.jpg', 1, 'Active', '2019-03-08 12:46:34', '2019-03-08 12:46:34'),
(10, 'Wedding Photography', 'It is said that a newcomer in professional photography begins his/her career by practicing a wedding or event photography. But that does not mean that this type of photographer does not require and any skill.', 'photo-1517887433267-127c316d81a6.jpg', 'wedding-event-photography.jpg', 'pedroquintela.jpg', 4, 'Active', '2019-03-08 12:53:00', '2019-03-08 12:53:55'),
(11, 'Wedding Decoration', 'These minimalistic ideas are trendier than ever and to the execution of your grand wedding cannot be done with these. Letâ€™s have a look at these trendy ideas for grand weddings in Bangaloreâ€“ Host your wedding in a unique venue, like an aquarium or a stadium. How about some cut-outs of trending Bollywood dialogue or pictures.', 'lin-jirsa-photography.jpg', 'whatknot.jpg', 'pop-of-colour-tarun-chawla.jpg', 5, 'Active', '2019-03-08 01:08:13', '2019-03-08 01:08:13'),
(12, 'Decoration ', 'These ideas are trendier than ever and to the execution of your grand wedding cannot be done with these. Letâ€™s have a look at these trendy ideas for grand weddings in Bangaloreâ€“ Host your wedding in a unique venue, like an aquarium or a stadium. How about some cut-outs of trending Bollywood dialogue or pictures.', 'download (4).jpg', 'download (3).jpg', 'images (1).jpg', 5, 'Active', '2019-03-08 01:12:59', '2019-03-08 01:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `story_tb`
--

CREATE TABLE `story_tb` (
  `st_id` int(11) NOT NULL,
  `st_title` varchar(50) NOT NULL,
  `st_desc` text NOT NULL,
  `st_image` varchar(100) NOT NULL,
  `st_date` varchar(50) NOT NULL,
  `st_status` enum('Active','Deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `story_tb`
--

INSERT INTO `story_tb` (`st_id`, `st_title`, `st_desc`, `st_image`, `st_date`, `st_status`) VALUES
(3, 'Best Wedding This Year 2018', 'Well, you wouldn’t have to worry about all this for the wedding that you are planning to have in the near future, Amrit Dugar, a very young but experienced wedding planner assures you through his service.', 'a1.jpeg', '2019-02-13', 'Active'),
(4, 'Best Wedding This Year 2019', 'He understands that this industry is facing scanty skilled resources and manpower, leading to people’s belief that the wedding planning business is highly unorganized and all over the place.', 'pexels-photo-1199605.jpeg', '2019-02-19', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `tid` int(11) NOT NULL,
  `u_id` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `pack` varchar(10) NOT NULL,
  `od_id` varchar(50) NOT NULL,
  `tx_id` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`tid`, `u_id`, `status`, `pack`, `od_id`, `tx_id`, `date`) VALUES
(2, '10', 'Success', '', 'ORDS99972172', '20220219111212800110168623204875753', '2022-02-19 23:57:20'),
(3, '', 'Success', '', 'ORDS99972172', '20220219111212800110168623204875753', '2022-02-19 23:57:20'),
(4, '10', 'Success', '', 'ORDS84574504', '20220219111212800110168973103487057', '2022-02-19 23:59:14'),
(5, '10', 'Success', '', 'ORDS84574504', '20220219111212800110168973103487057', '2022-02-19 23:59:14'),
(6, '10', 'Success', 'pro', 'ORDS98838516', '20220220111212800110168705903457350', '2022-02-20 12:56:22'),
(7, '10', 'Success', '20', 'ORDS18665390', '20220220111212800110168425603433624', '2022-02-20 14:10:50'),
(8, '10', 'Success', '20', 'ORDS18665390', '20220220111212800110168425603433624', '2022-02-20 14:10:50'),
(9, '10', 'Failed', '0', '', '00', '0000-00-00 00:00:00'),
(10, '10', 'Success', 'pro', 'ORDS15829205', '20220220111212800110168547203457930', '2022-02-20 23:07:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_des` varchar(20) NOT NULL,
  `u_city` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `u_address` text NOT NULL,
  `u_contact` double NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_gender` enum('Male','Female') NOT NULL,
  `u_image` varchar(100) NOT NULL,
  `c_id` int(11) NOT NULL,
  `u_password` varchar(100) NOT NULL,
  `hash` varchar(50) DEFAULT NULL,
  `u_otp` double NOT NULL,
  `u_status` enum('Active','Deactive') NOT NULL,
  `u_type` varchar(15) NOT NULL,
  `u_connects` int(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  `user_bio` text NOT NULL,
  `onfeed` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`u_id`, `u_name`, `u_des`, `u_city`, `dob`, `u_address`, `u_contact`, `u_email`, `u_gender`, `u_image`, `c_id`, `u_password`, `hash`, `u_otp`, `u_status`, `u_type`, `u_connects`, `created_date`, `updated_date`, `user_bio`, `onfeed`) VALUES
(2, 'Ravi Gol', 'Founder & CEO', 'Vijapur', '2001-01-21', 'Rohitvas', 6352832116, 'ravirajchauhan1598@gmail.com', 'Male', 'men13.jpg', 1, 'e65bb04dd08bd2550f02e2518aca618b6130dd1faf48326375a7c50588693003\r\n', '69e2351b6', 2333, 'Active', 'normal', 0, '2018-10-18 06:00:00', '2019-02-23 12:53:00', 'Web Developer at SK Webuild', ''),
(9, 'Raviraj Chauhan', 'Goverment Job', 'Sarkhej', '2001-01-21', 'ladol', 8758101593, 'rajchauhan@gmail.com', 'Male', 'men11.jpg', 2, 'e65bb04dd08bd2550f02e2518aca618b6130dd1faf48326375a7c50588693003\r\n', '69e2351b6', 2524, 'Active', 'normal', 0, '2019-02-01 06:03:07', '2019-02-01 06:03:07', 'Web Developer at SK Webuild', ''),
(6, 'Shaini Kumari', 'Goverment Job', 'Nadiad', '2000-04-02', 'vij', 6352832344, 'shainipatel@gmail.com', 'Female', 'f11.jpg', 2, 'e65bb04dd08bd2550f02e2518aca618b6130dd1faf48326375a7c50588693003\r\n', '69e2351b6', 2522, 'Active', 'normal', 0, '2018-10-29 06:00:00', '2018-10-18 09:00:00', 'Web Developer at SK Webuild', ''),
(10, 'Komal Sharma', 'Developer', 'Gandhinagar', '2001-01-27', '302 Gandhinagar', 9723001502, 'komal@gmail.com', 'Male', 'men12.jpg', 3, '8306a03a8eb975e5f9ee4888d309362d426749377085fb11a4e3df0613fe21be', '1d53baaa4', 2523, 'Active', 'normal', 100, '2019-03-09 12:15:25', '2019-03-09 12:15:25', 'Whatever You Think', 'y'),
(19, 'Nisha Yadav ', 'Police Officer', 'Rajkot', '0000-00-00', '564/15, Pushpanjali Society, Rajkot, Gujarat', 3256987412, 'nishayadav3@gmail.com', 'Female', 'f4.jpg', 1, 'hgdvcbnxufygf', 'hdbvgvjdjdcmnc', 54698, 'Active', 'normal', 10, '2022-02-19 11:23:23', '2022-02-19 11:23:23', 'Police Officer ', 'y'),
(12, 'Monika Makwana', 'Teacher', 'Ahemdabad', '2001-11-01', '377/22, Sarkhej, Ahemdabad, Gujarat', 1234567890, 'monikamakwana@gmail.com', 'Female', 'f1.jpg', 1, 'hhsgdgdgdhdjhdgh', 'dsfsdfdsfs', 1234, 'Active', 'normal', 10, '2022-02-19 10:44:50', '2022-02-19 10:44:50', 'Teacher At School', 'y'),
(13, 'Kishan Gujjar', 'Professor', 'Junagadh', '1998-06-23', '211/12, Gir-Somnath, Junagadh, Gujarat', 2354125452, 'kishangujjar23@gmail.com', 'Male', 'men1.jpg', 1, 'monikamakwana', 'monikamakwana', 1235, 'Active', 'normal', 10, '2022-02-19 10:48:16', '2022-02-19 10:48:16', 'Professor At College', 'y'),
(14, 'Shenan Kenzi', 'Software Engineer', 'Gandhinagar', '2001-01-21', '950/52, Sector-13, Gandhinagar, Gujarat', 1254785785, 'shenankenzi@gmail.com', 'Male', 'men2.jpg', 1, 'jhdhfhbdsbvdj', 'jdhdhggdh', 2541, 'Active', 'normal', 10, '2022-02-19 10:54:50', '2022-02-19 10:54:50', 'Software Engineer ', 'y'),
(15, 'Reshma Vaghela', 'Nurse', 'Ahemdabad', '1996-12-23', '710, Vrajdham, Ujala, Ahemdabad, Gujarat', 6523147895, 'reshmavaghela23@gmail.com', 'Female', 'f2.jpg', 1, 'hhdbhvmxhhfjbbv', 'jdjjhjdhdvbj', 65412, 'Active', 'normal', 10, '2022-02-19 10:59:39', '2022-02-19 10:59:39', 'Nurse At Shrey Hospital', 'y'),
(16, 'Abhishek Aacharya', 'Technician', 'Surendranagar', '1995-05-12', '142/21, Joravarnagar, Suredranagar, Gujarat', 4512369854, 'abhishekaacharya@gmail.com', 'Male', 'men3.jpg', 1, 'hgdshgdcghgcdh', 'hjdsjchdjhh', 541275, 'Active', 'normal', 10, '2022-02-19 11:03:42', '2022-02-19 11:03:42', 'Technician At Skwebuild', 'y'),
(17, 'Vipul Rathod', 'Cashier', 'Ahemdabad', '1994-03-18', '652/52, Shashtrinagar, Ahemdabad, Gujarat', 5469857412, 'vipulrathod@gmail.com', 'Male', 'men4.jpg', 1, 'hdhgbbcvjdj', 'dhhggdscjchjs', 4512, 'Active', 'normal', 10, '2022-02-19 11:09:52', '2022-02-19 11:09:52', 'Cashier At SBI Bank', 'y'),
(18, 'Sarika Patel', 'Designer', 'Surat', '1993-02-02', '145/14, Muglisara, Surat, Guajarat', 5425178456, 'sarikapatel01@gmail.com', 'Female', 'f3.jpg', 1, 'hdshbbjvjjvjfk', 'jdhdjdvbjbvjd', 8754, 'Active', 'normal', 10, '2022-02-19 11:15:27', '2022-02-19 11:15:27', 'Designer ', 'y'),
(20, 'Chhaya Jadav ', 'Lawyer', 'Ahemdabad', '1994-12-02', '211/21, Sarkhej, Ahemdabad, Gujarat', 7484512545, 'chhayajadav32@gmail.com', 'Female', 'f5.jpg', 1, 'gfdhghyttfgghgh', 'vvhggggffggf', 124422, 'Active', 'normal', 10, '2022-02-19 11:28:12', '2022-02-19 11:28:12', 'Lawyer At Highcourt', 'y'),
(21, 'Zeel Makwana', 'Dentist', 'Ahemdabad', '1998-06-29', '478/01, NavaVadaj, Ahmedabad, Gujarat', 2541639774, 'zeelmakwana12@gmail.com', 'Female', 'f6.jpg', 1, 'sdghdsvndbcdjkhdf', 'djfjdhdjfjhhfhj', 56478, 'Active', 'normal', 10, '2022-02-19 11:31:21', '2022-02-19 11:31:21', 'Dentist At V.S. Hospital', 'y'),
(22, 'Yancy Rana ', 'Doctor', 'Gandhinagar', '2000-01-14', '654/15, Sector-23, Gandhinagar, Gujarat', 6389541257, 'yancyrana14@gmail.com', 'Female', 'f7.jpg', 1, 'jdhfbdvhfdffhjvj', 'nchvhdhhhjf', 6584, 'Active', 'normal', 10, '2022-02-19 11:43:40', '2022-02-19 11:43:40', 'Doctor At Civil Hospital', 'y'),
(23, 'Jaymuni Vadoda', 'Actor', 'Ahemdabad', '2002-08-04', '988/32, Ranip, Ahemdabad, Guajarat', 8457963245, 'jaymuni12k@gmail.com', 'Male', 'men5.jpg', 1, 'hjdfgdfjjgfj', 'hhdfdjfhfkuf', 65454, 'Active', 'normal', 10, '2022-02-19 11:49:43', '2022-02-19 11:49:43', 'Actor At Gujarati theater', 'y'),
(24, 'Nilesh Rathod', 'Estate Agent', 'Gandhinagar', '1991-04-15', '930/54, Sector-7, Gandhinagar, Gujarat', 3652897415, 'nileshrathod2@gmail.com', 'Male', 'men6.jpg', 1, 'kknmcueruhfhghdfh', 'andbcbxbjcdhvh', 45887, 'Active', 'normal', 10, '2022-02-19 11:55:00', '2022-02-19 11:55:00', 'Estate Agent At Skwebuild ', 'y'),
(25, 'Suman Algotar', 'Medical Assistant', 'Surendranagar', '1999-04-18', '333/33, Dudhrej, Surendranagar, Guajrat', 6665412745, 'sumanalgotar18@gmail.com', 'Female', 'f8.jpg', 1, 'mnbnkdjgtkgh', 'nvdvhdfhgfghhf', 44558, 'Active', 'normal', 10, '2022-02-19 11:59:48', '2022-02-19 11:59:48', 'Medical Asistant At Gujarat Pharmecy', 'y'),
(26, 'Krishna Shah', 'zoologist', 'Junagadh', '1995-05-14', '211/41, devsheri, Una, Junagadh, Gujarat', 9696857414, 'krishnashah14@gmail.com', 'Female', 'f9.jpg', 1, 'nddudfhrgrfjh', 'ncdjkfdgrek', 22554, 'Active', 'normal', 10, '2022-02-19 12:05:27', '2022-02-19 12:05:27', 'Zoologist ', 'y'),
(27, 'Rajal Katara', 'Dance Teacher', 'Ahemdabad', '1995-04-09', '741/51, Chandkheda, Ahemdabad, Gujarat', 6545857412, 'rajalkatara54@gmail.com', 'Female', 'f10.jpg', 1, 'nfkuffgdvhfjk', 'kkdmfnfkkghkg', 8989, 'Active', 'normal', 10, '2022-02-19 12:12:29', '2022-02-19 12:12:29', 'Dance Teacher At Natraaj Academy', 'y'),
(28, 'Harish Ahir', 'Forest Officer', 'Navsari', '1994-05-31', '145/98, Sanket Apartment, Navsari, Gujarat', 5897456215, 'hareshahir31@gmail.com', 'Male', 'men7.jpg', 1, 'nknfiuffdkfdk', 'jnejkffjkdfkjd', 23651, 'Active', 'normal', 10, '2022-02-19 12:16:37', '2022-02-19 12:16:37', 'Forest Officer ', 'y'),
(29, 'Rajesh Zala', 'Accountant', 'Ahemdabad', '1992-02-18', '687/11, Paldi, Ahemdabad, Gujarat', 5565454745, 'rajeshzala21@gmail.com', 'Male', 'men8.jpg', 1, 'ncksfkdfjdkjfdlkg', 'lwekwdshdsdidf', 99472, 'Active', 'normal', 10, '2022-02-19 12:23:30', '2022-02-19 12:23:30', 'Accountant At Sanghavi Commercial Estate Ltd.', 'y'),
(30, 'Sachin Trivedi', 'Scientist', 'Ahemdabad', '1999-08-01', '710/10, Danilimda, Ahemdabad, Gujarat', 4458745845, 'sachintrivedi08@gmail.com', 'Male', 'men9.jpg', 1, 'smfjdkhriohfdkh', 'mlskfjdlfdlild', 665814, 'Active', 'normal', 10, '2022-02-19 12:30:25', '2022-02-19 12:30:25', 'Scientist At Isro ', 'y'),
(31, 'Karan Shilpi', 'LIC Agent', 'Ahemdabad', '2001-11-20', '445/77, Pakwan Road, S.G Highway, Ahemadabad, Gujarat', 6321457895, 'karanshilpi280@gmail.com', 'Male', 'men10.jpg', 1, 'mndksfuiurfgjdkfjdjjf', 'mvndkjfdfdkdk', 8854745, 'Active', 'normal', 10, '2022-02-19 12:35:35', '2022-02-19 12:35:35', 'LIC Agent At LIC jivan Beema Nigam Ltd.', 'y'),
(32, 'Shenan Kenzi', 'Founder', 'Gandhianagar', '2000-03-16', '950/2', 9408668983, 'shenankenzi2001@gmail.com', 'Male', '1645384032123.jpg', 0, '7aef92d2f6b349c0db412da4f2caa1a7eece8d6348c5df5f402093459790d991', '378eb5060', 1234, 'Active', 'normal', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NOT', 'y'),
(36, 'goldenfairy', 'Founder', 'Gandhianagar', '2022-02-03', '123', 9408668983, 'shenan@skwebuild.in', 'Male', '1645426551electricity-bill.png', 0, 'a4872f506ff72fc06f72ca75f5db48c61e53f34140394059ba7a3781c4598985', 'c3a37941d', 1234, 'Active', 'normal', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'asda', 'y'),
(37, 'goldenfairy', 'Founder', 'Gandhianagar', '2022-02-03', '123', 9408668983, 'shenan@skwebuild.in', 'Male', '1645426722electricity-bill.png', 0, 'f7c84e1394bec1d5fdbb95a067ef57e87284c53c22f70131d81a0365e1033e09', '0f06355ec', 1234, 'Active', 'normal', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'asda', 'y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_tb`
--
ALTER TABLE `about_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `booking_tb`
--
ALTER TABLE `booking_tb`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `cancel_list`
--
ALTER TABLE `cancel_list`
  ADD PRIMARY KEY (`can_id`);

--
-- Indexes for table `category_tb`
--
ALTER TABLE `category_tb`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `city_tb`
--
ALTER TABLE `city_tb`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `connections`
--
ALTER TABLE `connections`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `contact_tb`
--
ALTER TABLE `contact_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `login_tb`
--
ALTER TABLE `login_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_tb`
--
ALTER TABLE `rating_tb`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `serviceprovider_tb`
--
ALTER TABLE `serviceprovider_tb`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `services_tb`
--
ALTER TABLE `services_tb`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `service_tb`
--
ALTER TABLE `service_tb`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `story_tb`
--
ALTER TABLE `story_tb`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_tb`
--
ALTER TABLE `about_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_tb`
--
ALTER TABLE `booking_tb`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cancel_list`
--
ALTER TABLE `cancel_list`
  MODIFY `can_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_tb`
--
ALTER TABLE `category_tb`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city_tb`
--
ALTER TABLE `city_tb`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `connections`
--
ALTER TABLE `connections`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_tb`
--
ALTER TABLE `contact_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login_tb`
--
ALTER TABLE `login_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating_tb`
--
ALTER TABLE `rating_tb`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `serviceprovider_tb`
--
ALTER TABLE `serviceprovider_tb`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services_tb`
--
ALTER TABLE `services_tb`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_tb`
--
ALTER TABLE `service_tb`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `story_tb`
--
ALTER TABLE `story_tb`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
