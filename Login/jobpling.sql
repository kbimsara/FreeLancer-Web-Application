-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 05:38 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobpling`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_name` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `service_charge` varchar(10) NOT NULL,
  `gig_count` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_name`, `password`, `service_charge`, `gig_count`) VALUES
('admin', 'admin', '5', '3');

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `bid_id` varchar(10) NOT NULL,
  `rq_id` varchar(10) NOT NULL,
  `seller_id` varchar(10) NOT NULL,
  `description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'Graphic design'),
(2, 'Digital Marketing'),
(3, 'Video & Animation'),
(4, 'Music & Audio');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `seller_id` varchar(10) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `sender` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gig`
--

CREATE TABLE `gig` (
  `gig_id` varchar(10) NOT NULL,
  `s_id` varchar(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `p1_title` varchar(10) NOT NULL,
  `p2_title` varchar(10) NOT NULL,
  `p3_title` varchar(10) NOT NULL,
  `package_1` varchar(50) NOT NULL,
  `package_2` varchar(50) NOT NULL,
  `package_3` varchar(50) NOT NULL,
  `p1_delivery` varchar(50) NOT NULL,
  `p2_delivery` varchar(50) NOT NULL,
  `p3_delivery` varchar(50) NOT NULL,
  `p1_description` varchar(150) NOT NULL,
  `p2_description` varchar(150) NOT NULL,
  `p3_description` varchar(150) NOT NULL,
  `seller_id` varchar(10) NOT NULL,
  `img` varchar(50) NOT NULL,
  `img2` varchar(50) NOT NULL,
  `img3` varchar(50) NOT NULL,
  `crt_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `seller_id` varchar(10) NOT NULL,
  `gig_id` varchar(10) NOT NULL,
  `pk` varchar(10) NOT NULL,
  `pk_short` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `qt` int(10) NOT NULL,
  `est_time` varchar(10) NOT NULL,
  `od_date` date NOT NULL,
  `ord_cnfrm_sl` varchar(10) NOT NULL,
  `tot` varchar(10) NOT NULL,
  `order_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rate_id` varchar(10) NOT NULL,
  `gig_id` varchar(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `sl_rate` varchar(5) NOT NULL,
  `user_rate` varchar(5) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `rp_id` varchar(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `seller_id` varchar(10) NOT NULL,
  `rp_type` varchar(10) NOT NULL,
  `rp_description` varchar(150) NOT NULL,
  `rp_status` varchar(10) NOT NULL,
  `rp_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request_post`
--

CREATE TABLE `request_post` (
  `rq_id` varchar(10) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_id` varchar(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `time` date NOT NULL,
  `subtot` varchar(10) NOT NULL,
  `tot` varchar(10) NOT NULL,
  `rq_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `user_id` varchar(10) NOT NULL,
  `seller_id` varchar(10) NOT NULL,
  `acc_description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `s_id` varchar(10) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`s_id`, `s_name`, `c_id`) VALUES
('s1', 'Logo', 1),
('s2', 'Social media post Design', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(10) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tp_number` varchar(10) NOT NULL,
  `home_add` varchar(50) NOT NULL,
  `work_add` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_img` varchar(50) NOT NULL,
  `verification` varchar(20) NOT NULL,
  `nic_bck` varchar(20) NOT NULL,
  `nic_frnt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `f_name`, `m_name`, `l_name`, `nic`, `email`, `tp_number`, `home_add`, `work_add`, `password`, `user_img`, `verification`, `nic_bck`, `nic_frnt`) VALUES
('2307U70758', 'Sahan', 'Arunapriya', 'gg', '1234567890v', 'sample@gmail.com', '6478356789', 'ASD', 'ASD', '12345', '2307U70758.jpeg ', '', '2307U70758nicbk.jpg', '2307U70758nicfn.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`bid_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gig`
--
ALTER TABLE `gig`
  ADD PRIMARY KEY (`gig_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`rp_id`);

--
-- Indexes for table `request_post`
--
ALTER TABLE `request_post`
  ADD PRIMARY KEY (`rq_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
