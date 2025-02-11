-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2025 at 10:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `construction`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `published_date` date NOT NULL,
  `image` varchar(150) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `published_date`, `image`, `Created_at`) VALUES
(1, '4bhk', 'this id fully furrsed home', '2024-06-05', 'image/home-2.jpg', '2025-02-11 06:23:22'),
(2, 'New Farm house', 'The new farmous with all thing it happen', '2024-01-11', 'image/home5.jpg', '2025-02-11 06:33:29'),
(3, '8 BHK', 'this is luxiryous bunglo', '2025-01-27', 'image/about.jpg', '2025-02-11 06:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `title_home` varchar(55) NOT NULL,
  `description_home` varchar(255) NOT NULL,
  `button_home` varchar(255) NOT NULL,
  `link_home` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `addedtime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `title_home`, `description_home`, `button_home`, `link_home`, `image`, `addedtime`, `status`, `createdAt`) VALUES
(4, 'Welcome to Our Luxurious', '        Experience comfornt and eleganse construction    ', 'Add This', 'https://www.youtube.com/results?search_query=dynamic+carousel+php', 'image/home6.jpg', '2025-02-07 17:30:47', 0, '2025-02-07 12:00:47'),
(5, 'Enjoy a Relaxing Stay', '                                        A paradise for your dream vacation                    ', 'Expolre This', 'http://localhost:8080/construction%20website/index.php', 'image/home7.jpg', '2025-02-07 17:32:50', 0, '2025-02-07 12:02:50'),
(6, 'Luxury Rooms & Suites', '        Elegance and comfort blended perfectly    ', 'view More', 'construction websiteadminadmin.php', 'image/home8.jpg', '2025-02-07 17:34:30', 0, '2025-02-07 12:04:30'),
(7, 'Unlock Amazing Benefits', '        All members enjoy unlimited travel possibilities and the more you stay, the more benefits you unlock.    ', 'Expolre This', 'construction websiteadminadmin.php', 'image/5.webp', '2025-02-08 12:05:08', 0, '2025-02-08 06:35:08'),
(8, 'Unlock Amazing Benefits', '        You’re just a few nights away from bigger rewards.    ', 'view More', 'D:xampp2htdocsconstruction websiteindex.php', 'image/6.webp', '2025-02-08 12:13:26', 0, '2025-02-08 06:43:26');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `image`, `title`, `created_at`) VALUES
(1, 'image/logo.png', '', '2025-02-11 09:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

CREATE TABLE `navbar` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`id`, `name`, `link`, `status`, `created_at`) VALUES
(1, 'Home', '#home', 'inactive', '2025-02-11 09:10:49'),
(2, 'Services', '#services', 'active', '2025-02-11 09:12:21'),
(3, 'Contact', '#contact', 'active', '2025-02-11 09:13:02'),
(4, 'Popular', '#popular', 'active', '2025-02-11 09:26:13'),
(5, 'Blog', '#blog', 'active', '2025-02-11 09:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `small_heading` varchar(100) NOT NULL,
  `large_heading` varchar(255) NOT NULL,
  `length_m` int(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `size` int(122) NOT NULL,
  `modifydate` datetime NOT NULL,
  `cratedaAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `button_name` varchar(25) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `small_heading`, `large_heading`, `length_m`, `location`, `price`, `size`, `modifydate`, `cratedaAt`, `button_name`, `image`) VALUES
(1, 'Popular', 'Our Popular Residence', 2000, 'wakad,pune', 150100, 8, '0000-00-00 00:00:00', '2025-02-10 07:56:42', 'Book Room', 'image/home-3.jpg'),
(2, '', '', 2000, 'bandra,mumbai', 450000, 8, '0000-00-00 00:00:00', '2025-02-10 08:08:40', 'Book Room', 'image/home5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services_`
--

CREATE TABLE `services_` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `size` int(255) NOT NULL,
  `length` int(255) NOT NULL,
  `buttonname` varchar(255) NOT NULL,
  `price` int(15) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_`
--

INSERT INTO `services_` (`id`, `location`, `title`, `size`, `length`, `buttonname`, `price`, `image`, `created_at`) VALUES
(7, 'Punjab', 'villa New', 12, 10000, 'Book Now', 450000, 'image/home3.jpg', '2025-02-11 05:50:46'),
(8, 'Mumbai', 'Lavish Home ', 16, 6500, 'Book Now ', 8977770, 'image/home1.jpg', '2025-02-11 06:06:14'),
(9, 'fgfg', 'dgdg', 55, 6500, 'Book Now', 100, 'image/home4.jpg', '2025-02-11 06:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `silder_demo`
--

CREATE TABLE `silder_demo` (
  `id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `heading` text NOT NULL,
  `url` text NOT NULL,
  `status` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  `modified_data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `role`, `description`, `image`, `Created_at`) VALUES
(1, 'Amar Malikv', 'Lead Designer', 'This is a wider card with supporting text below as a natural lead-in to additional longer.', 'image/team-1.png', '2025-02-11 07:17:20'),
(2, 'Manve desoxa', 'Lead Enginer', 'This is a wider card with supporting text below as a natural lead-in to additional longer.', 'image/team-2.png', '2025-02-11 07:19:10'),
(3, 'lenn karvka', 'Designer', 'his is a wider card with supporting text below as a natural lead-in to additional longer', 'image/team-3.png', '2025-02-11 07:19:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_`
--
ALTER TABLE `services_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `silder_demo`
--
ALTER TABLE `silder_demo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `navbar`
--
ALTER TABLE `navbar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services_`
--
ALTER TABLE `services_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `silder_demo`
--
ALTER TABLE `silder_demo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
