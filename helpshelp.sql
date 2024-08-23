-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 03:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpshelp`
--

-- --------------------------------------------------------

--
-- Table structure for table `addhospital`
--

CREATE TABLE `addhospital` (
  `id` int(11) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addhospital`
--

INSERT INTO `addhospital` (`id`, `hospital`, `status`) VALUES
(1, 'International Hospital Sahiwal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Web Development'),
(3, 'Graphic Design'),
(4, 'Digital Marketing'),
(5, 'Web Design sdfdsfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `ID` int(11) NOT NULL,
  `User` int(255) NOT NULL,
  `Task` int(255) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`ID`, `User`, `Task`, `Message`) VALUES
(1, 16, 16, 'Hey! How r u'),
(2, 17, 16, 'I\'m Fine'),
(3, 16, 16, 'hey'),
(20, 16, 16, 'how r u'),
(21, 16, 16, 'bhai'),
(22, 16, 0, 'bhai'),
(23, 16, 16, 'how r u');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `User` int(255) NOT NULL,
  `Task` int(255) NOT NULL,
  `Comment` varchar(255) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `User`, `Task`, `Comment`, `Date`) VALUES
(1, 16, 16, 'I will Give u 5000 Rupees', '2024-03-30'),
(2, 16, 10, 'Can u Contact me on Whatsapp?', '2024-03-30'),
(3, 16, 10, 'Can u Contact me on Whatsapp?', '2024-03-30'),
(4, 13, 16, 'Can i get this service in Sahiwal?', '2024-03-30'),
(5, 13, 12, 'I want This Service is it Available in Sahiwal?', '2024-03-30'),
(6, 16, 0, 'hello world', '2024-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `emergency`
--

CREATE TABLE `emergency` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Number` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency`
--

INSERT INTO `emergency` (`ID`, `Name`, `Number`, `Address`, `City`) VALUES
(1, 'Hospital', '1122', 'All Over', 'Islamabad');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `ID` int(11) NOT NULL,
  `User` int(255) NOT NULL,
  `Patient` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Number` varchar(255) NOT NULL,
  `Disease` varchar(1000) NOT NULL,
  `Hospital` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Date` int(255) NOT NULL,
  `Month` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`ID`, `User`, `Patient`, `Email`, `Number`, `Disease`, `Hospital`, `Address`, `City`, `Date`, `Month`) VALUES
(1, 0, 'Zain Imran', 'zainimranofficial@gmail.com', '3192523617', 'no disease', 'random', 'Home:193B6,Street:4, Ghala Mandi', 'Sahiwal', 12, 'August'),
(2, 0, 'Zain Imran', 'zainimranofficial@gmail.com', '3192523617', 'no disease', 'random', 'Home:193B6,Street:4, Ghala Mandi', 'Sahiwal', 12, 'August'),
(3, 0, 'Zain Imran', 'zainsh3ikh@gmail.com', '3192523617', 'aa', 'aa', 'Home:193B6,Street:4,Sahiwal', 'Sahiwal', 16, 'July'),
(4, 16, 'Zain Imran', 'zainimranofficial@gmail.com', '3192523617', 'aa', 'aa', 'Home:193B6,Street:4,Sahiwal', 'Sahiwal', 12, 'August');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `ID` int(11) NOT NULL,
  `User` int(255) NOT NULL,
  `Comment` int(255) NOT NULL,
  `Reply` varchar(255) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`ID`, `User`, `Comment`, `Reply`, `Date`) VALUES
(2, 16, 1, 'hello world my name is zain', '2024-03-30'),
(3, 16, 4, 'Yes Ofcourse we will provide services all-over the Pakistan', '2024-03-30'),
(4, 16, 2, 'Yes Ofcoarse', '2024-03-30'),
(5, 16, 5, 'Yes Why Not!', '2024-03-30'),
(6, 16, 5, 'Where r u From?', '2024-03-30'),
(7, 16, 4, 'Give me your contact number!', '2024-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `ID` int(11) NOT NULL,
  `User` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Number` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Latitude` varchar(255) NOT NULL,
  `Longitude` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Budget` varchar(255) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`ID`, `User`, `Title`, `Number`, `Description`, `Category`, `Latitude`, `Longitude`, `Location`, `Budget`, `Date`, `Status`) VALUES
(9, '12', ' I want a Web Developer For Full Time', '', 'Hey There! I want a Web Developer For Full Time Who Makes Ecommerce , Blogging , Portfolio Websites.', 'Web Developer', '30.654716', '73.108827', 'Sahiwal, Pakistan', '40000', '2024-03-24', 0),
(10, '13', 'I want a Graphic Designer who Design My Logo & YouTube Thumbnail', '', 'Hey There! I want a Graphic Designer who Design My Logo & YouTube Thumbnail. If Anyone Serious Contact Me.', 'Graphic Designer', '30.654693', '73.108827', 'Sahiwal , Pakistan', '2000', '2024-03-24', 0),
(12, '16', 'I want a Professional Electrician who fix my Electric Board', '', 'Hey There! I want a Professional Electrician who fix my Electric Board. Only Serious Person Contact me.', 'Electrician', '30.6545189', '73.1091706', 'Islamabad, Pakistan', '4500', '2024-03-24', 2),
(16, '17', 'I am a Web Developer and want to get a Job', '', 'Hey There! I am a Web Developer and want to get a Job. If anyone have a Job then Contact me.', 'Jobs & Others', '30.6545124', '73.1091736', '', '45000', '2024-03-24', 0),
(18, '17', 'My Car is Stuck i Want a Auto Mechanic who Set my Car', '', 'Hey There! My Car is Stuck i Want a Auto Mechanic who Set my Car. If Anyone interested then Contact Me.', 'Auto Mechanic', '30.6545367', '73.1091606', '', '1000', '2024-03-24', 0),
(21, '18', 'I need a web developer', '3192523617', 'i need senior web developer', 'Web Developer', '30.654514', '73.1091928', 'Sahiwal, Pakistan', '50000', '2024-04-05', 0),
(22, '13', 'I need a Web Developer', '3192523617', 'Hey There! I need a Web Developer and i need a Job', 'Web Developer', '30.654467', '73.109261', 'Sahiwal , Pakistan', '40000', '2024-04-05', 0),
(23, '20', 'a', '1', '', 'Web Developer', '30.6545179', '73.1092008', 'Sahiwal, Pakistan', '5000', '2024-04-06', 0),
(24, '16', 'hello', '3192523617', '', 'Web Developer', '30.6545171', '73.1091998', 'Sahiwal, Pakistan', '5000', '2024-04-06', 0),
(25, '16', 'hey', '3192523617', '', 'Web Developer', '30.6545171', '73.1091998', 'Sahiwal, Pakistan', '10000', '2024-04-06', 0),
(26, '20', 'a', '3192523617', '', 'Web Developer', '30.6544816', '73.109181', 'Sahiwal, Pakistan', '', '2024-04-07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `First Name` varchar(255) NOT NULL,
  `Last Name` varchar(255) NOT NULL,
  `Bio` varchar(1000) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Number` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Skills` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CPassword` varchar(255) NOT NULL,
  `Google ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Image`, `First Name`, `Last Name`, `Bio`, `Email`, `Number`, `Gender`, `Skills`, `Category`, `Location`, `Password`, `CPassword`, `Google ID`) VALUES
(13, 'https://lh3.googleusercontent.com/a/ACg8ocILPXUbCH5cq73vDlHLv8k002DDRSUbVzYaUTg6biSmXCI=s96-c', 'PANTHER', '', '', 'xhykzain@gmail.com', '', '', '', 'Web Developer', 'SWL , Pakistan', '', '', '105139900666291262067'),
(16, 'IMG_20230131_181231_928.jpg', 'Zain', 'Imran', '', 'zainimranofficial@gmail.com', '', '', 'Developer', '', 'Sahiwal, Pakistan', 'zain8019', 'zain8019', ''),
(20, 'IMG_20230425_021721_037.jpg', 'Sʜɘɩĸʜ', 'Zain', '', 'zainsh3ikh@gmail.com', '', '', '', '', 'Lahore, Pakistan', '', '', '118094610119376765022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addhospital`
--
ALTER TABLE `addhospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `emergency`
--
ALTER TABLE `emergency`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addhospital`
--
ALTER TABLE `addhospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `emergency`
--
ALTER TABLE `emergency`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
