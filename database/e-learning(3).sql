-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 05:20 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `cat_id` int(10) NOT NULL,
  `cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`cat_id`, `cat_name`) VALUES
(1, 'Teaching '),
(2, 'Marketing'),
(3, 'Development'),
(4, 'Office Productivity'),
(6, 'IT & Software');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `add1` varchar(100) NOT NULL,
  `add2` varchar(100) NOT NULL,
  `fb` varchar(20) NOT NULL,
  `ln` varchar(20) NOT NULL,
  `gp` varchar(20) NOT NULL,
  `tw` varchar(20) NOT NULL,
  `phn` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`con_id`, `email`, `add1`, `add2`, `fb`, `ln`, `gp`, `tw`, `phn`) VALUES
(1, 'LearnEd@gmail.com', 'Thane(w)', 'Mulund(e)', 'facebook', 'linkedIn', 'google', 'Twitter', '0 11 1234 5678');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `thumbnail` varchar(50) NOT NULL,
  `decription` text NOT NULL,
  `level` varchar(25) NOT NULL,
  `UID` int(11) NOT NULL,
  `price` varchar(60) NOT NULL,
  `discount` int(25) NOT NULL,
  `submitted` tinyint(4) NOT NULL DEFAULT 0,
  `approved` tinyint(4) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CID`, `name`, `sub_cat_id`, `thumbnail`, `decription`, `level`, `UID`, `price`, `discount`, `submitted`, `approved`, `date`) VALUES
(1, 'Spanish', 1, 'Spanish-Words-2.jpg', '\r\nYou will rapidly build a solid foundation of Spanish. \r\n   You will have practical usage of basic Spanish in a matter of weeks.\r\n   You will produce and speak thousands of perfectly constructed phrases.\r\n   You will speak with good pronunciation due to constant repetition and imitation of native Spanish speaker.\r\n   You will remember at least 98% of the everything taught, due to the system of constant repetition and recycling of new language.', 'Beginner', 4, '0', 0, 1, 1, '2020-08-11 09:38:48'),
(6, 'Excel - Beginner to Advance', 3, '94ed3a40f594eb63c446d37462fc8428.png', 'Master Microsoft Excel from Beginner to Advanced\r\nBuild a solid understanding on the Basics of Microsoft Excel\r\nLearn the most common Excel functions used in the Office\r\nHarness the full power of Microsoft Excel by automating your day to day tasks through Macros and VBA\r\nMaintain large sets of Excel data in a list or table\r\nCreate dynamic reports by mastering one of the most popular tools, PivotTables\r\nWow your boss by unlocking dynamic formulas with IF, VLOOKUP, INDEX, MATCH functions and many more\r\nAccess to a Professional Trainer with 10+ years of Excel Training', 'Beginner', 4, '420', 10, 1, 1, '2020-08-12 17:32:49'),
(8, 'Advanced Amazon Marketing', 4, '33ef79a74c5fc84564433daa6b701275.png', ' Three reasons to TAKE THIS COURSE right now!\r\n\r\n    You get lifetime access to lectures.\r\n\r\n    You can ask me questions and see me respond to every single one of them thoughtfully in the course discussions section!\r\n\r\n    What you will learn in this course is original, tested, and very detailed! Learn the Amazon seller strategies I implement for my Amazon FBA clients daily.\r\n\r\n\r\nIn this course, you will learn How to Advertise on Amazon! Learn how to MASTER Amazon\'s advertising platform and get your Amazon products appearing on the first page of Amazon search results!\r\n\r\n', 'Intermediate', 6, '400', 0, 1, 1, '2020-08-12 17:56:26'),
(10, 'Chat App with React, Redux, and Firebase', 2, '4c949f178433e1dde153f3771246b295.jpg', 'Interested in building impressive full-stack apps with React, Redux and Firebase? This is the course for you!\r\n\r\nHere\'s what we will cover:\r\n\r\n    Creating a complete Slack chat application with React, Redux, and Firebase 5 from scratch\r\n\r\n    Sending and receiving messages instantly with the real-time Firebase Database\r\n\r\n    Uploading and displaying image messages using Firebase Storage\r\n\r\n    Notifications to display new messages in other channels\r\n\r\n    Sending Direct Messages to other users in our chat\r\n\r\n    Tracking / showing when users are online / offline\r\n\r\n    Searching messages within created channels\r\n\r\n    Custom animations to see when other users are typing in the same channel\r\n\r\n    Creating, cropping and uploading user avatars\r\n\r\n    The ability to favorite / unfavorite public channels\r\n\r\n    Add emojis to our messages with an Emoji Picker component\r\n\r\n    User authentication with Firebase\r\n\r\n    Form validation for our Login and Register forms\r\n\r\n    State management with Redux, with simple, straightforward patterns\r\n\r\n    Creating stunning user interfaces with Semantic UI React\r\n\r\n    Essential features of React Router 4 (Switch component, withRouter HOC, history object)', 'Advance', 4, '500', 20, 1, 1, '2020-08-13 18:59:44'),
(15, 'Raspberry-Pi', 5, 'd8a2b0e74433a7bf989f9a1b50b53a4c.png', 'Welcome to Raspberry Pi: Full Stack, a hands-on project designed to teach you how to build an Internet-of-Things application based on the world’s most popular embedded computer.\r\n\r\nThis is an updated and improved remake of the original Raspberry Pi Full Stack. In this new course, I have updated all of the technologies involved in the current state of the Art, and have also added new content.\r\n\r\nThis course will expose you to the full process of developing a web application.\r\n\r\nYou will integrate LEDs, buttons and sensors with Javascript, HTML, web servers, database servers, routers and schedulers.\r\n\r\nYou will understand why the Raspberry Pi is such a versatile tinkering platform by experiencing first hand how well it combines:\r\n\r\n    open hardware, that includes wireless and wired networking and the ability to connect sensors and actuators,\r\n    the powerful Linux/Debian operating system, which gives you access to high-level programming languages and desktop-level software applications\r\n    and, the flexibility of open source development software which, literally, powers the cloud applications that you use every day\r\n\r\nAs you progress through the sections, you will learn how to complete a single step of the application development process.', 'Beginner', 8, '720', 10, 1, 1, '2020-08-18 19:44:42'),
(18, 'Go language', 6, '7891c18ee6863fbd157db25d6ce6d4e9.png', 'This course is the ultimate comprehensive resource for learning the Go Programming Language.\r\nThis course is perfect for both beginners and experienced developers. The course is full of examples, hands-on exercises, solutions to the hands-on exercises, and an amazing code repository.\r\n', 'Intermidiate', 6, '550', 20, 1, 1, '2020-08-27 03:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE `enrolled` (
  `EID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `TID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`EID`, `CID`, `UID`, `price`, `TID`) VALUES
(1, 1, 1, 0, 4),
(2, 10, 5, 475, 4),
(3, 6, 1, 378, 4),
(4, 8, 5, 400, 6),
(5, 6, 7, 378, 4),
(6, 8, 7, 400, 6),
(7, 15, 10, 648, 8),
(8, 15, 1, 648, 8),
(9, 6, 10, 378, 4),
(10, 18, 10, 523, 6),
(11, 1, 10, 0, 4),
(12, 18, 7, 523, 6);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `msg`, `created_on`) VALUES
(1, 'sonik sarungale', 'sonik@gmail.com', 'Request For an IOT course.', '2020-08-26 15:19:40'),
(2, 'Rishikesh', 'rishi@gmail.com', 'request for digital marketing course', '2020-08-30 07:15:31'),
(3, 'hey adsaD', 'DADA@DSFSSAdFDSA', 'DWFW', '2020-09-07 09:41:31');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `LID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `video` varchar(100) NOT NULL,
  `lec_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`LID`, `CID`, `title`, `video`, `lec_no`) VALUES
(2, 6, 'Introduction', 'd65e804ca26b960f4b4683706a956b06.mp4', 1),
(3, 6, 'Launching Excel', '6f353ea394dcb128972524b4f7289c42.mp4', 2),
(4, 6, 'Introduction to the Excel Interface', '2784ed208a1191dfcbca52d5f692d1b1.mp4', 3),
(5, 6, 'Saving an Excel Document', 'c521b3e4b4b038f778ed8882525c218d.mp4', 4),
(6, 6, 'Create Spreadsheet Titles', '0b2fb156fb12f321f749b566ecbc54a2.mp4', 5),
(7, 6, 'Working with Numeric Data', 'deeaf3f721c0151ac961ba540b327e3d.mp4', 6),
(8, 6, 'Structure of an Function', '76138c632f61d9d156cadbcbd7fa7507.mp4', 7),
(9, 6, 'Font Formatting Commands', 'd5c31a7ff8d551a8a4ea445daf0d5bcb.mp4', 8),
(10, 6, 'Inserting Images', '44c441fde19c1aa899041bfc4ee25b6e.mp4', 9),
(11, 6, 'Congratulations', 'bdb0429bad510b79da89f1f3f73484f4.mp4', 10),
(12, 8, 'Introduction', 'b22864e3688b721c71c48f7bdee49454.mp4', 1),
(13, 8, 'Launching a Product', 'c7c19c8510e47c8d7f529d2a96cdb6a0.mp4', 2),
(14, 8, 'Algorithm Ranking Factors', '40920273cd65b98804133a0f419f01a3.mp4', 3),
(15, 8, 'Amazon Ads Lingo', '632df406a218425e289854a7ecab6518.mp4', 4),
(16, 8, 'Amazon Paid Advertising', '2fd67f431781d46b7b1065c91dd6c87c.mp4', 5),
(17, 8, 'Amazon Reports', '64cfcdeb4686edd3d9ec881e5dbea5be.mp4', 6),
(18, 8, 'Enhanced Brand Content', '33ab5e4edb634e9a141c3eedc197f801.mp4', 7),
(19, 15, 'Introduction', '73e8f699c7959e9d1676beb237a0c166.mp4', 1),
(20, 15, 'Raspberry Pi vs Arduino', '3dcf0dc29c6f31f3930f52932d914d48.mp4', 2),
(21, 15, 'Restore an SD card', 'f020e928dec4b3a681b220ffad189e06.mp4', 3),
(22, 15, 'Python on the Command Line', '951a5c49166fd47c7661f15f95c2334c.mp4', 4),
(23, 15, 'Web Application Stack', '15ee38c19d2252d3bed6ff0acda275e7.mp4', 5),
(24, 1, 'Alphabets', 'a9c9b521b3a3cca1c9df7553d8b8c6d2.mp4', 1),
(25, 10, 'Requiered Tools', '7ccef23ce9efc3e54305c21a78faf8b5.mp4', 1),
(26, 1, 'Pronouns', '57330a5c2a11b6387a7e8f4b88f2eb26.mp4', 2),
(27, 1, 'Vocabulary', 'b584f490dba5fe9cd9952db3af7b7702.mp4', 3),
(28, 1, 'Sentence Formation', 'c49a68e64a0e77df480c7d39c3855c14.mp4', 4),
(29, 1, 'Accent', '42421fb98b69d07d1318c4c7d6f7415c.mp4', 5),
(30, 10, 'Install Redux ', '155ab799956a68c87e66eebb819de7e7.mp4', 2),
(31, 10, 'Set up Git', '72b4dd18271f5f6b202f40f84674f652.mp4', 3),
(32, 18, 'Go Installation _Golang', '53d4545495091e55ba86b0ddca95784b.mp4', 1),
(33, 18, 'First Code In Go _ Golang', '130538d2d6670ab655019b5328f9b399.mp4', 2),
(34, 18, 'Functions in Go _ Golang', '616c0407fa803844b41d734608d7addd.mp4', 3),
(35, 18, 'Exported Names _ Golang', '1d08287c9f946102db653484feb1a9c4.mp4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `signup_user`
--

CREATE TABLE `signup_user` (
  `UID` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `level` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `answer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup_user`
--

INSERT INTO `signup_user` (`UID`, `fname`, `lname`, `email`, `level`, `password`, `answer`) VALUES
(1, 'Rishikesh', 'Sharma', 'sharma@gmail.com', 'student', 'sharma', 'cricket'),
(2, 'Ankita', 'Yadav', 'admin@gmail.com', 'admin', 'admin', 'football'),
(4, 'Jenny', 'Fernandes', 'Jenny@gmail.com', 'teacher', 'jenny', 'basketball'),
(5, 'Rishemi', 'Nath', 'nath@yahoo.com', 'student', 'nath', 'tennis'),
(6, 'Ritu', 'sharma', 'ritu@hotmail.com', 'teacher', 'ritu', 'cricket'),
(7, 'Atish', 'Manala', 'atish@gmail.com', 'student', 'atish', 'hockey'),
(8, 'Thomas', 'Crane', 'thomas@gmail.com', 'teacher', 'thomas', 'cricket'),
(10, 'Mahima', 'Chuadhari', 'mahima@gmail.com', 'student', 'mahima', 'cricket'),
(18, 'sonik', 'sarungale', 'sonik@gmail.com', 'teacher', 'Sonik@123', 'cricket');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat_name` text NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`sub_cat_id`, `sub_cat_name`, `cat_id`) VALUES
(1, 'Languages', 1),
(2, 'Mobile Apps', 3),
(3, 'Excel', 4),
(4, 'Company Marketing', 2),
(5, 'Hardware', 6),
(6, 'Programming languages', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD PRIMARY KEY (`EID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`LID`);

--
-- Indexes for table `signup_user`
--
ALTER TABLE `signup_user`
  ADD PRIMARY KEY (`UID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `enrolled`
--
ALTER TABLE `enrolled`
  MODIFY `EID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `LID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `signup_user`
--
ALTER TABLE `signup_user`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
