-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2022 at 04:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(20) NOT NULL,
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_name`, `admin_username`, `admin_password`) VALUES
('Administrator', 'admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `res_id` int(6) NOT NULL,
  `mov_id` int(4) NOT NULL,
  `th_id` int(5) NOT NULL,
  `show_date` date NOT NULL,
  `show_time` varchar(10) NOT NULL,
  `seat_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`res_id`, `mov_id`, `th_id`, `show_date`, `show_time`, `seat_id`) VALUES
(100062, 1004, 10001, '2021-01-26', '14:30PM', '8D'),
(100062, 1004, 10001, '2021-01-26', '14:30PM', '8E'),
(100062, 1004, 10001, '2021-01-26', '14:30PM', '8F'),
(100063, 1002, 10001, '2021-01-24', '14:30PM', '4F'),
(100063, 1002, 10001, '2021-01-24', '14:30PM', '4G'),
(100064, 1000, 10000, '2021-01-26', '10:00AM', '1D'),
(100065, 1006, 10002, '2021-01-26', '19:00PM', '4D'),
(100065, 1006, 10002, '2021-01-26', '19:00PM', '4E'),
(100065, 1006, 10002, '2021-01-26', '19:00PM', '4F'),
(100065, 1006, 10002, '2021-01-26', '19:00PM', '4G'),
(100065, 1006, 10002, '2021-01-26', '19:00PM', '4H'),
(100065, 1006, 10002, '2021-01-26', '19:00PM', '4I'),
(100066, 1000, 10000, '2021-01-26', '10:00AM', '1B'),
(100066, 1000, 10000, '2021-01-26', '10:00AM', '1C'),
(100067, 1000, 10000, '2021-01-26', '10:00AM', '5F'),
(100067, 1000, 10000, '2021-01-26', '10:00AM', '5G'),
(100067, 1000, 10000, '2021-01-26', '10:00AM', '5H'),
(100068, 1000, 10000, '2021-01-26', '10:00AM', '8E'),
(100068, 1000, 10000, '2021-01-26', '10:00AM', '8F'),
(100069, 1002, 10002, '2021-01-25', '14:30PM', '4F'),
(100069, 1002, 10002, '2021-01-25', '14:30PM', '5E'),
(100069, 1002, 10002, '2021-01-25', '14:30PM', '5F'),
(100069, 1002, 10002, '2021-01-25', '14:30PM', '5G'),
(100070, 1002, 10002, '2021-01-25', '14:30PM', '5H'),
(100070, 1002, 10002, '2021-01-25', '14:30PM', '5I'),
(100070, 1002, 10002, '2021-01-25', '14:30PM', '6G'),
(100070, 1002, 10002, '2021-01-25', '14:30PM', '6H'),
(100071, 1000, 10000, '2021-01-26', '10:00AM', '7J'),
(100071, 1000, 10000, '2021-01-26', '10:00AM', '7K'),
(100072, 1001, 10002, '2021-01-24', '14:30PM', '7F'),
(100072, 1001, 10002, '2021-01-24', '14:30PM', '7G'),
(100072, 1001, 10002, '2021-01-24', '14:30PM', '7H'),
(100073, 1007, 10002, '2021-01-24', '10:00AM', '8F'),
(100073, 1007, 10002, '2021-01-24', '10:00AM', '8G'),
(100075, 1007, 10002, '2021-01-24', '14:30PM', '7D'),
(100075, 1007, 10002, '2021-01-24', '14:30PM', '7E'),
(100075, 1007, 10002, '2021-01-24', '14:30PM', '7F'),
(100075, 1007, 10002, '2021-01-24', '14:30PM', '7G'),
(100077, 1003, 10000, '2021-01-25', '14:30PM', '4A'),
(100077, 1003, 10000, '2021-01-25', '14:30PM', '4B'),
(100077, 1003, 10000, '2021-01-25', '14:30PM', '4F'),
(100078, 1008, 10000, '2021-01-26', '19:00PM', '5E'),
(100078, 1008, 10000, '2021-01-26', '19:00PM', '5F'),
(100078, 1008, 10000, '2021-01-26', '19:00PM', '5G'),
(100079, 1000, 10001, '2021-01-25', '10:00AM', '1F'),
(100079, 1000, 10001, '2021-01-25', '10:00AM', '2D'),
(100079, 1000, 10001, '2021-01-25', '10:00AM', '2F'),
(100080, 1003, 10000, '2021-01-26', '14:30PM', '3E'),
(100080, 1003, 10000, '2021-01-26', '14:30PM', '3F'),
(100080, 1003, 10000, '2021-01-26', '14:30PM', '3G'),
(100080, 1003, 10000, '2021-01-26', '14:30PM', '3H'),
(100081, 1000, 10001, '2021-01-25', '19:00PM', '7E'),
(100081, 1000, 10001, '2021-01-25', '19:00PM', '7F'),
(100081, 1000, 10001, '2021-01-25', '19:00PM', '7G'),
(100081, 1000, 10001, '2021-01-25', '19:00PM', '7H'),
(100081, 1000, 10001, '2021-01-25', '19:00PM', '7I'),
(100082, 1000, 10001, '2021-01-25', '19:00PM', '6D'),
(100082, 1000, 10001, '2021-01-25', '19:00PM', '6E'),
(100082, 1000, 10001, '2021-01-25', '19:00PM', '6F'),
(100082, 1000, 10001, '2021-01-25', '19:00PM', '6G'),
(100082, 1000, 10001, '2021-01-25', '19:00PM', '6H'),
(100082, 1000, 10001, '2021-01-25', '19:00PM', '6I'),
(100084, 1003, 10000, '2021-01-26', '14:30PM', '6F');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(3) NOT NULL,
  `cust_name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `email`, `phno`) VALUES
(148, 'Ishaan Srivastava', 'ishaan@gmail.com', 981887546),
(149, 'Samarth Joseph', 'sam@gmail.com', 981823453),
(150, 'Aditya Gupta', 'adi@gmail.com', 838290161),
(151, 'Arin Tiwari', 'arin@gmail.com', 837602900),
(152, 'Layaprada', 'laya@gmail.com', 852771227),
(153, 'Anshul Prajapati', 'anshul@gmail.com', 987654321),
(154, 'Sahil Kumar', 'sahil@gmail.com', 123456789),
(155, 'Mohd. Anas', 'anas@gmail.com', 823647128),
(156, 'Amrit Raj', 'amrit@gmail.com', 875435234),
(157, 'Abhishek', 'Ab@gmail.com', 123456789);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `mov_id` int(4) NOT NULL,
  `mov_name` varchar(30) NOT NULL,
  `mov_lang` varchar(10) NOT NULL,
  `mov_duration` varchar(6) NOT NULL,
  `mov_director` varchar(20) NOT NULL,
  `release_date` date NOT NULL,
  `genre` varchar(20) NOT NULL,
  `mov_img` varchar(100) NOT NULL,
  `mov_banner` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`mov_id`, `mov_name`, `mov_lang`, `mov_duration`, `mov_director`, `release_date`, `genre`, `mov_img`, `mov_banner`) VALUES
(1000, '83', 'hindi', '02h32m', 'kabir khan', '2021-12-24', 'drama,sports', 'https://files.prokerala.com/movies/pics/800/first-look-poster-of-hindi-movie-83-112004.jpg', 'https://i.ytimg.com/vi/hgzjJjlXOdU/maxresdefault.jpg'),
(1001, 'Spiderman : No Way Home', 'English', '02h28m', 'Jon Watts', '2021-12-16', 'action,sci-fi', 'https://wallpapercave.com/wp/wp10252727.jpg', 'https://images7.alphacoders.com/116/thumb-1920-1160712.jpg'),
(1002, 'The Matrix Resurrections', 'english', '02h28m', 'lana wachowski', '2021-12-22', 'action,scifi', 'https://preview.redd.it/1gqy66uzux581.jpg?auto=webp&s=e062acfd4b25a20fc20b0674c158f1fc7a488fd2', 'https://images4.alphacoders.com/118/thumb-1920-1185748.jpg'),
(1003, 'Pushpa : The Rise Part-1', 'telugu', '02h59m', 'sukumar bandreddi', '2021-12-17', 'action,thriller', 'https://wallpapercave.com/wp/wp8444590.jpg', 'https://st1.latestly.com/wp-content/uploads/2021/12/pushpa.jpg'),
(1004, 'Sing 2', 'english', '01h50m', 'garth jennings', '2021-12-31', 'animation,comedy', 'https://m.media-amazon.com/images/I/71MLt4LEEZL._SL1464_.jpg', 'https://images3.alphacoders.com/112/thumb-1920-1122131.png'),
(1005, 'Encanto', 'english', '01h40m', 'byron howard', '2021-11-26', 'animation,fantasy', 'https://preview.redd.it/xirq8whg5eq71.jpg?auto=webp&s=4b7fa804dd65b048d2d4c8a2f2881807a743c5fe', 'https://images.wallpapersden.com/image/download/disney-encanto_bGtqZWuUmZqaraWkpJRobWllrWdma2U.jpg'),
(1006, 'Chandigarh Kare Aashiqui', 'english', '01h57m', 'abhishek kapoor', '2021-12-10', 'comedy,drama', 'https://cdn.bollywoodmdb.com/movies/largethumb/2021/chandigarh-kare-aashiqui/poster.jpg', 'https://s3images.zee5.com/wp-content/uploads/sites/7/2021/12/Untitled-design-2021-12-10T191521.328.jpg'),
(1007, 'Shyam Singha Roy', 'telugu,tam', '02h37m', 'rahul sankrityayan', '2021-12-24', 'period,thriller', 'https://www.filmibeat.com/ph-big/2021/02/shyam-singha-roy_16142320951.jpg', 'https://di5qs4dv32t01.cloudfront.net/wp-content/uploads/2021/12/Shyam.jpg'),
(1008, '1945', 'telugu,tam', '02h02m', 'sathyasiva', '2022-01-07', 'action,drama', 'https://in.bmscdn.com/events/moviecard/ET00321071.jpg', 'https://www.koimoi.com/wp-content/new-galleries/2021/12/rana-daggubatis-1945-to-finally-release-after-long-delay-001.jpg');

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(7) NOT NULL,
  `res_id` int(6) NOT NULL,
  `amount` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `res_id` int(6) NOT NULL,
  `cust_id` int(3) NOT NULL,
  `no_of_tickets` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`res_id`, `cust_id`, `no_of_tickets`) VALUES
(100062, 148, 3),
(100063, 149, 2),
(100064, 148, 1),
(100065, 150, 6),
(100066, 151, 2),
(100067, 149, 3),
(100068, 152, 2),
(100069, 148, 4),
(100070, 153, 4),
(100071, 151, 2),
(100072, 152, 3),
(100073, 148, 2),
(100074, 148, 2),
(100075, 150, 4),
(100076, 150, 4),
(100077, 153, 3),
(100078, 150, 3),
(100079, 154, 3),
(100080, 155, 4),
(100081, 156, 5),
(100082, 157, 6),
(100083, 148, 3),
(100084, 149, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `seat_id` varchar(2) NOT NULL,
  `seat_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`seat_id`, `seat_type`) VALUES
('1A', 'gold'),
('1B', 'gold'),
('1C', 'gold'),
('1D', 'gold'),
('1E', 'gold'),
('1F', 'gold'),
('1G', 'gold'),
('1H', 'gold'),
('1I', 'gold'),
('1J', 'gold'),
('1K', 'gold'),
('1L', 'gold'),
('2A', 'gold'),
('2B', 'gold'),
('2C', 'gold'),
('2D', 'gold'),
('2E', 'gold'),
('2F', 'gold'),
('2G', 'gold'),
('2H', 'gold'),
('2I', 'gold'),
('2J', 'gold'),
('2K', 'gold'),
('2L', 'gold'),
('3A', 'gold'),
('3B', 'gold'),
('3C', 'gold'),
('3D', 'gold'),
('3E', 'gold'),
('3F', 'gold'),
('3G', 'gold'),
('3H', 'gold'),
('3I', 'gold'),
('3J', 'gold'),
('3K', 'gold'),
('3L', 'gold'),
('4A', 'gold'),
('4B', 'gold'),
('4C', 'gold'),
('4D', 'gold'),
('4E', 'gold'),
('4F', 'gold'),
('4G', 'gold'),
('4H', 'gold'),
('4I', 'gold'),
('4J', 'gold'),
('4K', 'gold'),
('4L', 'gold'),
('5A', 'gold'),
('5B', 'gold'),
('5C', 'gold'),
('5D', 'gold'),
('5E', 'gold'),
('5F', 'gold'),
('5G', 'gold'),
('5H', 'gold'),
('5I', 'gold'),
('5J', 'gold'),
('5K', 'gold'),
('5L', 'gold'),
('6A', 'platinum'),
('6B', 'platinum'),
('6C', 'platinum'),
('6D', 'platinum'),
('6E', 'platinum'),
('6F', 'platinum'),
('6G', 'platinum'),
('6H', 'platinum'),
('6I', 'platinum'),
('6J', 'platinum'),
('6K', 'platinum'),
('6L', 'platinum'),
('7A', 'platinum'),
('7B', 'platinum'),
('7C', 'platinum'),
('7D', 'platinum'),
('7E', 'platinum'),
('7F', 'platinum'),
('7G', 'platinum'),
('7H', 'platinum'),
('7I', 'platinum'),
('7J', 'platinum'),
('7K', 'platinum'),
('7L', 'platinum'),
('8A', 'platinum'),
('8B', 'platinum'),
('8C', 'platinum'),
('8D', 'platinum'),
('8E', 'platinum'),
('8F', 'platinum'),
('8G', 'platinum'),
('8H', 'platinum'),
('8I', 'platinum'),
('8J', 'platinum'),
('8K', 'platinum'),
('8L', 'platinum');

-- --------------------------------------------------------

--
-- Table structure for table `show_details`
--

CREATE TABLE `show_details` (
  `show_date` date NOT NULL,
  `show_time` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `show_details`
--

INSERT INTO `show_details` (`show_date`, `show_time`) VALUES
('2021-01-24', '10:00AM'),
('2021-01-24', '14:30PM'),
('2022-01-24', '19:00PM'),
('2022-01-25', '10:00AM'),
('2022-01-25', '14:30PM'),
('2022-01-25', '19:00PM'),
('2022-01-26', '10:00AM'),
('2022-01-26', '14:30PM'),
('2022-01-26', '19:00PM');

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE `theatre` (
  `th_id` int(5) NOT NULL,
  `th_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`th_id`, `th_name`) VALUES
(10000, 'Cinepolis, ETA Namma Mall , Binnypet'),
(10001, 'PVR , Golden Globes Mall , Kormangala'),
(10002, 'PVR Gold, Vega City , Bannergata Road'),
(10003, 'INOX: Garuda, Swagath Mall, Jayanagar ');

-- --------------------------------------------------------

--
-- Structure for view `movie_seats`
--
DROP TABLE IF EXISTS `movie_seats`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `movie_seats`  AS SELECT `m`.`mov_id` AS `mov_id`, `s`.`th_id` AS `th_id`, `s`.`seat_id` AS `seat_id`, `s`.`seat_status` AS `seat_status` FROM (`movie` `m` join `seats` `s`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_username`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`mov_id`,`th_id`,`show_date`,`show_time`,`seat_id`),
  ADD KEY `res_id` (`res_id`),
  ADD KEY `th_id` (`th_id`),
  ADD KEY `seat_id` (`seat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`mov_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `res_id` (`res_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `show_details`
--
ALTER TABLE `show_details`
  ADD PRIMARY KEY (`show_date`,`show_time`);

--
-- Indexes for table `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`th_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `mov_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `res_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100085;

--
-- AUTO_INCREMENT for table `theatre`
--
ALTER TABLE `theatre`
  MODIFY `th_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10004;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`mov_id`) REFERENCES `movie` (`mov_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`res_id`) REFERENCES `reservations` (`res_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`th_id`) REFERENCES `theatre` (`th_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`seat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`res_id`) REFERENCES `reservations` (`res_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
