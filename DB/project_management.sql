-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 05:51 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `showMe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Name`, `email`, `password`, `code`, `showMe`) VALUES
(0, 'ab', 'nilshad74@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0),
(1, 'A', 'a@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1),
(2, 'B', 'b@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0),
(3, 'C', 'c@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0),
(4, 'D', 'd@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0),
(5, 'E', 'e@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0),
(6, 'F', 'f@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `memberId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `createdOn` datetime NOT NULL,
  `show_comment` int(11) NOT NULL,
  `delete_id` int(11) NOT NULL,
  `deleted_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `memberId`, `comment`, `createdOn`, `show_comment`, `delete_id`, `deleted_date`) VALUES
(223, 0, 'hii', '2022-06-23 12:25:54', 1, 0, '2022-10-04 18:40:08'),
(224, 0, 'test ok', '2022-06-23 12:27:25', 1, 2, '0000-00-00 00:00:00'),
(229, 27, 'working', '2022-06-23 12:44:58', 1, 2, '0000-00-00 00:00:00'),
(230, 0, 'update', '2022-06-23 12:54:27', 1, 2, '0000-00-00 00:00:00'),
(231, 0, 'hii', '2022-06-23 13:47:06', 1, 2, '0000-00-00 00:00:00'),
(233, 25, 'working', '2022-06-23 14:15:39', 1, 2, '0000-00-00 00:00:00'),
(234, 25, 'hii', '2022-06-23 17:28:00', 1, 1, '0000-00-00 00:00:00'),
(235, 0, 'hii', '2022-06-23 18:23:09', 1, 1, '0000-00-00 00:00:00'),
(236, 0, 'sfsdfdxf', '2022-06-23 18:24:59', 1, 1, '0000-00-00 00:00:00'),
(237, 0, 'szfsdfsdf', '2022-06-23 18:25:57', 1, 1, '2022-06-23 15:02:51'),
(238, 0, 'fgdf', '2022-06-23 18:32:54', 1, 1, '2022-06-23 15:02:55'),
(239, 25, 'working', '2022-06-27 16:58:18', 1, 1, '2022-07-23 11:21:07'),
(240, 0, 'dfvd', '2022-07-17 15:22:48', 0, 0, '0000-00-00 00:00:00'),
(241, 0, 'ffc', '2022-07-17 15:25:56', 0, 0, '0000-00-00 00:00:00'),
(242, 28, 'hii', '2022-08-01 11:09:15', 0, 0, '0000-00-00 00:00:00'),
(243, 0, 'gdgted', '2022-10-04 22:10:02', 1, 0, '2022-10-04 18:40:05'),
(244, 37, 'What is Java ?', '2022-10-05 20:53:53', 1, 2, '2022-10-05 17:50:40'),
(245, 0, 'how', '2022-10-05 21:20:18', 1, 2, '2022-10-05 17:50:32'),
(246, 0, 'Nilshad', '2022-10-05 22:48:53', 0, 0, '0000-00-00 00:00:00'),
(247, 25, 'nil', '2022-10-05 22:54:35', 0, 0, '0000-00-00 00:00:00'),
(248, 0, 'dtgdtgfd', '2022-10-05 22:58:17', 0, 0, '0000-00-00 00:00:00'),
(249, 0, 'hiiiiiii', '2022-10-05 22:58:22', 0, 0, '0000-00-00 00:00:00'),
(250, 25, 'fcgfgf', '2022-10-05 23:07:35', 0, 0, '0000-00-00 00:00:00'),
(251, 0, 'dftd', '2022-10-05 23:10:37', 0, 0, '0000-00-00 00:00:00'),
(252, 0, 'fgfg', '2022-10-05 23:20:10', 0, 0, '0000-00-00 00:00:00'),
(253, 25, 'nilshad', '2022-10-05 23:23:34', 0, 0, '0000-00-00 00:00:00'),
(254, 25, 'xdfsdf', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
(255, 25, 'fdstdfx', '2022-10-08 03:06:03', 0, 0, '0000-00-00 00:00:00'),
(256, 25, 'bbb', '2022-10-08 03:06:11', 0, 0, '0000-00-00 00:00:00'),
(257, 25, 'gdfgsd', '2022-10-08 15:14:05', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `CoursrsName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `CoursrsName`) VALUES
(0, 'null'),
(1, 'Higher National Diploma in English'),
(2, 'Higher National Diploma in Management'),
(3, 'Higher National Diploma in Accountancy'),
(4, 'Higher National Diploma in Information Technology'),
(5, 'Higher National Diploma in Tourism and Hospitality Management'),
(6, 'Higher National Diploma in Business Administration');

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `showMe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`id`, `firstName`, `lastName`, `email`, `password`, `showMe`) VALUES
(6, 'Mohamed', 'Nilshad', 'nilshad74@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(10, 'Nuwan', 'Jayasekara', 'nilshad73@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nicnum` varchar(12) NOT NULL,
  `reg_num` varchar(18) NOT NULL,
  `course_id` int(11) NOT NULL,
  `batch` int(4) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `code` int(10) NOT NULL,
  `block` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `nicnum`, `reg_num`, `course_id`, `batch`, `Type`, `email`, `pass`, `code`, `block`) VALUES
(0, 'Lecturer', 'null', 'null', 0, 0, 'null', 'null', 'null', 0, 0),
(25, 'Nilshad', '1234567988v', 'KAN/IT/2020/F/0009', 4, 2020, 'FULL TIME', 'nilshad74@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 0),
(26, 'Supun', '1234567815V', 'KAN/M/2019/F/0015', 2, 2019, 'FULL TIME', 'kafilo8439@vysolar.com', '25d55ad283aa400af464c76d713c07ad', 0, 0),
(27, 'Nakeeb', '1234567987v', 'KAN/IT/2020/F/0010', 4, 2020, 'FULL TIME', 'kafilo8439@vysolar.com', '25d55ad283aa400af464c76d713c07ad', 0, 0),
(28, 'aviska', '1234567986v', 'KAN/IT/2020/F/0011', 4, 2020, 'FULL TIME', 'kafilo8439@vysolar.com', '25d55ad283aa400af464c76d713c07ad', 0, 0),
(29, 'Gayathri', '123456786v', 'KAN/IT/2020/F/0006', 4, 2020, 'FULL TIME', 'kafilo8439@vysolar.com', '25d55ad283aa400af464c76d713c07ad', 0, 0),
(31, 'Sudahar', '1234567670v', 'KAN/IT/2020/P/0003', 4, 2020, 'PART TIME', 'kafilo8439@vysolar.com', '25d55ad283aa400af464c76d713c07ad', 0, 0),
(36, 'Mohamed Naveed', '123456780', 'KAN/IT/2020/F/0060', 4, 2020, 'FULL TIME', 'nilshadfawmy@gmail.com', '25d55ad283aa400af464c76d713c07ad', 502020, 0),
(37, 'Mohamed Nasik', '01234567', 'KAN/IT/2020/F/0008', 4, 2020, 'FULL TIME', 'adambrize9@gmail.com', '25d55ad283aa400af464c76d713c07ad', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `minicourse`
--

CREATE TABLE `minicourse` (
  `id` int(11) NOT NULL,
  `srl_No` int(255) NOT NULL,
  `Admin_ID` int(11) NOT NULL,
  `Course_Name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `myfile` varchar(255) NOT NULL,
  `deleteNo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `minicourse`
--

INSERT INTO `minicourse` (`id`, `srl_No`, `Admin_ID`, `Course_Name`, `description`, `myfile`, `deleteNo`) VALUES
(107, 1, 1, 'Word3', 'This is Word tutorials', 'videoplayback.mp4', 0),
(108, 2, 1, 'Word3', 'This is Word tutorials', 'videoplayback.mp4', 0),
(109, 3, 6, 'Excel2', 'This is Excel tutorials', 'throwingfootball.mp4', 0),
(110, 4, 1, 'Word III', 'This is Word tutorials', 'videoplayback.mp4', 0),
(111, 5, 1, 'Excel Work', 'This is excel tutorials', 'pexels-kindel-media-6573628.mp4', 1),
(112, 6, 1, 'Word', 'This is Word tutorials', 'throwingfootball.mp4', 0),
(113, 6, 1, 'Word', 'This is Word tutorials', 'videoplayback.mp4', 0),
(115, 8, 1, 'Power point', 'This is Power point tutorial', 'pexels-kindel-media-6573628.mp4', 1),
(116, 8, 1, 'Power point', 'This is Power point tutorial', 'videoplayback.mp4', 1),
(117, 9, 1, 'Word 3', 'This is Word tutorial', 'throwingfootball.mp4', 1),
(118, 9, 1, 'Word 3', 'This is Word tutorial', 'videoplayback.mp4', 1),
(119, 10, 2, 'Word', 'This is Word tutorial', 'throwingfootball.mp4', 0),
(121, 11, 1, 'New Word', 'This is New Word tutorial', 'throwingfootball.mp4', 1),
(122, 11, 1, 'New Word', 'This is New Word tutorial', 'videoplayback.mp4', 1),
(123, 12, 1, 'Old Word', 'This is old Word tutorial', 'pexels-kindel-media-6573628.mp4', 1),
(124, 13, 2, 'java', 'This is java tutorial', 'video.mp4', 1),
(125, 13, 2, 'java', 'This is java tutorial', 'videoplayback.mp4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `rdate` datetime NOT NULL,
  `status` varchar(15) NOT NULL,
  `notify_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `course_id`, `sub_id`, `batch`, `type`, `message`, `file`, `rdate`, `status`, `notify_num`) VALUES
(88, 4, 122, 2020, 'FULL TIME', 'fi', ' ', '2022-03-31 02:46:00', 'read', 18),
(89, 4, 122, 2020, 'FULL TIME', 'fi', '164-155-1557974_engine-pistons-clip-art-png-download-pistones-motos.png', '2022-03-31 02:48:02', 'read', 19),
(90, 4, 123, 2020, 'FULL TIME', 'do', '07. Sorting Algorithms (1).pdf', '2022-03-31 02:48:47', 'read', 20),
(91, 4, 123, 2020, 'FULL TIME', 'ax', '', '2022-03-31 02:50:01', 'read', 21),
(92, 4, 134, 2020, 'FULL TIME', 'pdf', 'v.pdf', '2022-03-31 09:08:32', 'read', 22),
(93, 4, 122, 2020, 'FULL TIME', 'hii', '', '2022-03-31 11:05:09', 'read', 23),
(94, 4, 125, 2020, 'FULL TIME', 'Ball', '', '2022-03-31 11:06:37', 'read', 24),
(95, 4, 122, 2020, 'FULL TIME', 'asfdf', '', '2022-03-31 11:07:43', 'read', 25),
(96, 4, 122, 2020, 'FULL TIME', 'hii', '', '2022-03-31 11:14:13', 'read', 26),
(97, 4, 122, 2020, 'FULL TIME', 'do this', 'videoplayback.mp4', '2022-03-31 11:17:19', 'read', 27),
(100, 4, 122, 2020, 'FULL TIME', '', 'production ID_5192157.mp4', '2022-03-31 11:21:08', 'read', 30),
(101, 4, 126, 2020, 'FULL TIME', 'abcd', '', '2022-04-02 12:31:02', 'read', 31),
(102, 4, 126, 2020, 'FULL TIME', 'abcd', '', '2022-04-02 12:32:03', 'read', 32),
(103, 4, 123, 2020, 'FULL TIME', 'efg', '164-155-1557974_engine-pistons-clip-art-png-download-pistones-motos.png', '2022-04-02 12:32:49', 'read', 33),
(104, 4, 122, 2020, 'FULL TIME', 'worknig', '07. Sorting Algorithms (1) (1).pdf', '2022-04-03 02:24:39', 'read', 34),
(105, 4, 122, 2020, 'FULL TIME', 'assignment 2', '', '2022-04-19 09:04:03', 'read', 35),
(106, 4, 127, 2020, 'FULL TIME', 'Hii', '', '2022-04-24 10:04:44', 'read', 36),
(107, 4, 126, 2020, 'FULL TIME', 'Hii Nasik', '139 HNDIT1105-Database Management System MS.pdf', '2022-10-05 09:23:48', 'read', 37);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `course_type` varchar(30) NOT NULL,
  `Topic` varchar(255) NOT NULL,
  `pNo` int(11) NOT NULL,
  `project_code` varchar(255) NOT NULL,
  `uploadDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `files` blob NOT NULL,
  `Marks` double NOT NULL,
  `Release_Marks` int(11) NOT NULL,
  `publish` int(11) NOT NULL,
  `watched` int(11) NOT NULL,
  `deletePro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `member_id`, `course_id`, `sub_id`, `admin_id`, `course_type`, `Topic`, `pNo`, `project_code`, `uploadDate`, `files`, `Marks`, `Release_Marks`, `publish`, `watched`, `deletePro`) VALUES
(53, 25, 4, 121, 2, 'FULL TIME', 'Test', 22, '1Y1S2A', '2022-06-25 08:08:52', 0x63616d706169676e2d63726561746f72732d4f474f5744564c624d53632d756e73706c6173682e6a7067, 55.5, 0, 0, 1, 0),
(54, 25, 4, 121, 2, 'FULL TIME', 'PCA 2.1', 23, '1Y1S2A', '2022-06-25 08:09:05', 0x63616d706169676e2d63726561746f72732d4f474f5744564c624d53632d756e73706c6173682e6a7067, 0, 0, 0, 1, 0),
(55, 25, 4, 121, 2, 'FULL TIME', 'PCA 3.1', 24, '1Y1S3A', '2022-06-25 05:57:08', 0x63616d706169676e2d63726561746f72732d4f474f5744564c624d53632d756e73706c6173682e6a7067, 0, 0, 0, 1, 0),
(56, 25, 4, 129, 2, 'FULL TIME', 'java 1.1', 25, '1Y1S1A', '2022-06-25 16:48:11', 0x63616d706169676e2d63726561746f72732d4f474f5744564c624d53632d756e73706c6173682e6a7067, 50, 0, 0, 1, 0),
(57, 27, 4, 129, 2, 'FULL TIME', 'java 1.1', 26, '1Y1S1A', '2022-06-26 14:13:23', 0x63616d706169676e2d63726561746f72732d4f474f5744564c624d53632d756e73706c6173682e6a7067, 55, 0, 1, 1, 1),
(58, 27, 4, 129, 2, 'FULL TIME', 'java 1.2', 27, '1Y1S1A', '2022-06-25 16:50:30', 0x4861726477617265202d2073686f7274204e6f746520322e706466, 60, 0, 0, 1, 0),
(59, 25, 4, 121, 1, 'FULL TIME', 'PCA 2', 28, '1Y1S1A', '2022-06-25 18:26:28', 0x63616d706169676e2d63726561746f72732d4f474f5744564c624d53632d756e73706c6173682e6a7067, 50, 0, 0, 1, 0),
(60, 25, 4, 121, 2, 'FULL TIME', 'PCA 1', 29, '1Y1S1A', '2022-06-26 11:29:35', 0x63616d706169676e2d63726561746f72732d4f474f5744564c624d53632d756e73706c6173682e6a7067, 60, 0, 0, 1, 0),
(61, 25, 4, 126, 2, 'FULL TIME', 'html', 30, '1Y1S1A', '2022-06-26 11:31:03', 0x63616d706169676e2d63726561746f72732d4f474f5744564c624d53632d756e73706c6173682e6a7067, 65, 0, 0, 1, 0),
(62, 25, 4, 130, 2, 'FULL TIME', 'flash Animation', 31, '1Y2S1A', '2022-06-27 11:48:05', 0x4e462073747564696f2e6d7034, 85.5, 0, 0, 1, 0),
(63, 28, 4, 121, 2, 'FULL TIME', 'PCA 2', 32, '1Y1S1A', '2022-08-01 05:43:46', 0x31333920484e444954313130352d4461746162617365204d616e6167656d656e742053797374656d204d532e706466, 85, 0, 1, 1, 0),
(64, 37, 4, 123, 2, 'FULL TIME', 'c++Project', 33, '1Y1S2A', '2022-10-05 15:58:13', 0x32303138204d61726b696e672044424d53202d312e706466, 85, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `Question` text NOT NULL,
  `answer_1` text NOT NULL,
  `answer_2` text NOT NULL,
  `answer_3` text NOT NULL,
  `answer_4` int(11) NOT NULL,
  `correct_answer` int(11) NOT NULL,
  `miniCourse_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `Question`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer`, `miniCourse_Id`) VALUES
(7, 'what is 5+1 is ?', '4', '6', '8', 5, 2, 10),
(8, 'what is 4+4 is ?', '4', '10', '8', 0, 3, 10),
(9, 'what is 45+4 is ?', '50', '60', '10', 49, 4, 6),
(10, 'What is 5 x 5 ?', '25', '20', '15', 5, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commentID` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `createdOn` datetime NOT NULL,
  `memberId` int(11) NOT NULL,
  `show_comment` int(11) NOT NULL,
  `delete_id` int(11) NOT NULL,
  `deleted_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `commentID`, `comment`, `createdOn`, `memberId`, `show_comment`, `delete_id`, `deleted_date`) VALUES
('R0', 223, '', '0000-00-00 00:00:00', 0, 0, 0, '0000-00-00 00:00:00'),
('R1', 257, 'dfvsdfsd', '2022-10-08 15:26:44', 25, 1, 2, '2022-10-08 12:00:11'),
('R2', 256, 'working', '2022-10-08 15:26:55', 25, 0, 0, '0000-00-00 00:00:00'),
('R3', 257, 'sdsdasd', '2022-10-08 15:30:03', 0, 1, 2, '2022-10-08 12:00:10'),
('R4', 255, 'fgdfgd', '2022-10-08 15:30:41', 25, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Name` varchar(255) NOT NULL,
  `reg_num` varchar(20) NOT NULL,
  `nic_num` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Name`, `reg_num`, `nic_num`, `email`) VALUES
('Mohamed Nasik', 'KAN/IT/2020/F/0008', '01234567', 'adambrize9@gmail.com'),
('Sudahar', 'KAN/IT/2020/P/0003', '1234567670v', ''),
('Mohamed Naveed', 'KAN/IT/2020/F/0060', '123456780', 'nilshadfawmy@gmail.com'),
('Supun', 'KAN/M/2019/F/0015', '1234567815V', ''),
('Virajini', 'KAN/IT/2020/F/0003', '123456783v', ''),
('Gayathri', 'KAN/IT/2020/F/0006', '123456786v', ''),
('aviska', 'KAN/IT/2020/F/0011', '1234567986v', ''),
('Nakeeb', 'KAN/IT/2020/F/0010', '1234567987v', ''),
('Nilshad', 'KAN/IT/2020/F/0009', '1234567988v', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subCode` varchar(15) NOT NULL,
  `SubName` varchar(255) NOT NULL,
  `course_Id` int(11) NOT NULL,
  `Semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subCode`, `SubName`, `course_Id`, `Semester`) VALUES
(1, 'EN1111', 'Reading & Vocabulary Development', 1, 1),
(2, 'EN1112', 'Effective Communication Skills I', 1, 1),
(3, 'EN1113', 'Listening Skills I', 1, 1),
(4, 'EN1114', 'Language Structure, Usage & Linguistics I', 1, 1),
(5, 'EN1115', 'Introduction to Literature', 1, 1),
(6, 'EN1116', 'Professional Writing I', 1, 1),
(7, 'EN1117', 'Computer Assisted Language Learning & Study Skills I', 1, 1),
(8, 'EN1211', 'Intermediate Reading & Vocabulary Development', 1, 2),
(9, 'EN1212', 'Effective Communication Skills II', 1, 2),
(10, 'EN1213', 'Listening Skills II', 1, 2),
(11, 'EN1214', 'Language Structure, Usage & Linguistics II', 1, 2),
(12, 'EN1215', 'British & American literature', 1, 2),
(13, 'EN1216', 'Professional Writing II', 1, 2),
(14, 'EN1217', 'Computer Assisted Language Learning & Study Skills II', 1, 2),
(15, 'EN2111', 'Advanced Reading & Vocabulary Development I', 1, 3),
(16, 'EN2112', 'Technology basedCommunication Skills', 1, 3),
(17, 'EN2113', 'Language Structure, Usage & Linguistics III', 1, 3),
(18, 'EN2114', 'Commonwealth Literature', 1, 3),
(19, 'EN2115', 'Professional Writing III', 1, 3),
(20, 'EN2116', 'Research Methodology', 1, 3),
(21, 'EN2117', 'English Language Teaching Methodology I', 1, 3),
(22, 'EN2118', 'Fundamental Business English I', 1, 3),
(23, 'EN2119', 'Fundamental Journalism I', 1, 3),
(24, 'EN2211', 'Advanced Reading & Vocabulary Development II', 1, 4),
(25, 'EN2212', 'Language Structure, Usage & Linguistics IV', 1, 4),
(26, 'EN2213', 'Sri Lankan Literature', 1, 4),
(27, 'EN2214', 'Advanced Professional Writing.', 1, 4),
(28, 'EN2215', 'English Language Teaching Methodology II', 1, 4),
(29, 'EN2216', 'Fundamental Business English II', 1, 4),
(30, 'EN2217', ' Fundamental Journalism II', 1, 4),
(31, 'EN2218', 'Principles of education', 1, 4),
(32, 'EN2219', 'Intermediate Business English', 1, 4),
(33, 'EN2220', 'Intermediate Journalism', 1, 4),
(34, 'EN2221', 'Educational Measurement ', 1, 4),
(35, 'EN2222', 'Advanced Business English I ', 1, 4),
(36, 'EN2223', 'Advanced Journalism I ', 1, 4),
(37, 'EN2224', 'Educational Psychology', 1, 4),
(38, 'EN2225', 'Advanced Business English II', 1, 4),
(39, 'EN2226', 'Advanced Journalism II', 1, 4),
(40, 'EN3111', 'Implant Training/Project', 1, 4),
(41, 'MAN1101', 'Writing Business Documents', 2, 1),
(42, 'MAN1102', 'Introduction to Computing', 2, 1),
(43, 'MAN1103', 'Management', 2, 1),
(44, 'MAN1104', 'Maintaining Financial Records', 2, 1),
(45, 'MAN1105', 'Applying Statistical Techniques For Business Decision Making', 2, 1),
(46, 'MAN1106', 'Fundamentals of Marketing Management', 2, 1),
(47, 'MAN1207', 'Making Presentations', 2, 2),
(48, 'MAN1208', 'Introduction to Information Technology', 2, 2),
(49, 'MAN1210', 'Cost and Management Accounting', 2, 2),
(50, 'MAN1209', 'Fundamentals of Human Resource Management', 2, 2),
(51, 'MAN1211', 'Business Economics', 2, 2),
(52, 'MAN1212', 'Business Law', 2, 2),
(53, 'MAN2113', 'Writing Specialized Business Documents', 2, 3),
(54, 'MAN2114', 'Understanding Individual Behavior at Work', 2, 3),
(55, 'MAN2115', 'Information Technology Application', 2, 3),
(56, 'MAN2121', 'Employee Resourcing', 2, 3),
(57, 'MAN2131', 'Promotional Marketing', 2, 3),
(58, 'MAN2122', 'Managing Human Resources Training and Development', 2, 3),
(59, 'MAN2132', 'Marketing Research', 2, 3),
(60, 'MAN2123', 'Labor Law', 2, 3),
(61, 'MAN2133', 'Planning and Conducting Electronic Marketing Communications', 2, 3),
(62, 'MAN2216', 'Managing Organizational Change', 2, 4),
(63, 'MAN2217', 'Teamwork and Diversity Management', 2, 4),
(64, 'MAN2224', 'Ensuring a Safe Workplace', 2, 4),
(65, 'MAN2234', 'Merchandising and Logistics Management', 2, 4),
(66, 'MAN2225', 'Managing Industrial Relations', 2, 4),
(67, 'MAN2235', 'Implementing and Monitoring Marketing Activities', 2, 4),
(68, 'MAN2226', 'Reward Management', 2, 4),
(69, 'MAN2236', 'Analyzing Consumer Behavior for Specific Markets', 2, 4),
(70, 'MAN3118', 'Research Methodology', 2, 5),
(71, 'MAN3119', 'Managerial Economics', 2, 5),
(72, 'MAN3120', 'Strategic Management', 2, 5),
(73, 'MAN3228', 'Contemporary HRM Issues', 2, 5),
(74, 'MAN3237', 'Small Business Marketing', 2, 5),
(75, 'MAN3221', 'Research Project', 2, 6),
(76, 'MAN3222', 'Total Quality Management', 2, 6),
(77, 'MAN3227', 'Managing International HRM Policy and Processes', 2, 6),
(78, 'MAN3238', 'Evaluating and Managing International Marketing Programs', 2, 6),
(79, 'MAN4101', 'Managing Workplace Information and Knowledge Management Systems', 2, 7),
(80, 'MAN4102', 'Researching International Business Opportunities', 2, 7),
(81, 'MAN4103', 'Managing Risk', 2, 7),
(82, 'MAN4104', 'Leadership', 2, 7),
(83, 'MAN4105', 'Managing a Small Business', 2, 7),
(84, 'MAN4106', 'Project Management', 2, 7),
(85, 'HNDA1101', 'Fundamentals of Financial Accounting', 3, 1),
(86, 'HNDA1102', 'Business Mathematics', 3, 1),
(87, 'HNDA1103', 'Commercial Awareness', 3, 1),
(88, 'HNDA1104', 'Business Communication I', 3, 1),
(89, 'HNDA1105', 'Introduction to Computers', 3, 1),
(90, 'HNDA1201', 'Intermediate Financial Accounting', 3, 2),
(91, 'HNDA1202', 'Statistical Analysis for Management', 3, 2),
(92, 'HNDA1203', 'Micro & Macro Economics', 3, 2),
(93, 'HNDA1204', 'Business Communication II', 3, 2),
(94, 'HNDA1205', 'Computer Applications', 3, 2),
(95, 'HNDA2101', 'Advanced Financial Accounting', 3, 3),
(96, 'HNDA2102', 'Operations Research', 3, 3),
(97, 'HNDA2103', 'Principles of Auditing & Taxation', 3, 3),
(98, 'HNDA2104', 'Business Communication III', 3, 3),
(99, 'HNDA2105', 'Database Management Systems & Data Analysis', 3, 3),
(100, 'HNDA2201', 'Cost & Management Accounting', 3, 4),
(101, 'HNDA2202', 'Computer Applications for Accounting', 3, 4),
(102, 'HNDA2203', 'Marketing Management', 3, 4),
(103, 'HNDA2204', 'Business Communication IV', 3, 4),
(104, 'HNDA2205', 'Project Management Tools & Programming', 3, 4),
(105, 'HNDA3101', 'Advanced Management Accounting', 3, 5),
(106, 'HNDA3102', 'Financial Reporting', 3, 5),
(107, 'HNDA3103', 'Business Law', 3, 5),
(108, 'HNDA3104', 'Advanced Taxation', 3, 5),
(109, 'HNDA3201', 'Advanced Financial Reporting', 3, 6),
(110, 'HNDA3202', 'Corporate Law', 3, 6),
(111, 'HNDA3203', 'Organizational Behaviour and Human Resources Management', 3, 6),
(112, 'HNDA3204', 'Business System I', 3, 6),
(113, 'HNDA4101', 'Financial Management', 3, 7),
(114, 'HNDA4102', 'Strategic Management', 3, 7),
(115, 'HNDA4103', 'Business System II', 3, 7),
(116, 'HNDA4104', 'Computer Based Accounting', 3, 7),
(117, 'HNDA4201', 'Strategic Management Accounting', 3, 8),
(118, 'HNDA4202', 'Financial Statement Analysis', 3, 8),
(119, 'HNDA4203', 'Strategic Financial Management', 3, 8),
(120, 'HNDA4204', 'Advanced Auditing & Assurance', 3, 8),
(121, 'HNDIT11012', 'Personal Computer Applications', 4, 1),
(122, 'HNDIT11023', 'Computer Hardware', 4, 1),
(123, 'HNDIT11034', 'Structured Programming', 4, 1),
(124, 'HNDIT11042', 'Data Representation and Organization', 4, 1),
(125, 'HNDIT11052', 'Database Management Systems', 4, 1),
(126, 'HNDIT11062', 'Web Development', 4, 1),
(127, 'HNDIT11072', 'Mathematics for Computing', 4, 1),
(128, 'HNDIT11081', 'Communication Skills I', 4, 1),
(129, 'HNDIT12094', 'Object OrientedProgramming', 4, 2),
(130, 'HNDIT12103', 'Graphics and Multimedia', 4, 2),
(131, 'HNDIT12112', 'Data Structures and Algorithms', 4, 2),
(132, 'HNDIT12123', 'Systems Analysis and Design', 4, 2),
(133, 'HNDIT12133', 'Data Communications and Networks', 4, 2),
(134, 'HNDIT12142', 'Statistics for IT', 4, 2),
(135, 'HNDIT12151', 'Communication Skills II', 4, 2),
(136, 'HNDIT12162', 'Leadership Skills and Development', 4, 2),
(137, 'HNDIT23012', 'Operating Systems and Computer Security', 4, 3),
(138, 'HNDIT23022', 'Project Management', 4, 3),
(139, 'HNDIT23032', 'Principles of Management and Applied Economics', 4, 3),
(140, 'HNDIT23042', 'Technical Writing', 4, 3),
(141, 'HNDIT23051', 'Mini Project', 4, 3),
(142, 'HNDIT23061', 'Communication Skills III', 4, 3),
(143, 'HNDIT23073', 'Rapid Application Development', 4, 3),
(144, 'HNDIT23082', 'Principals of Software Engineering', 4, 3),
(145, 'HNDIT23093', 'Object Oriented Analysis and Design', 4, 3),
(146, 'HNDIT23103', 'AdvanceDatabase Management Systems', 4, 3),
(147, 'HNDIT23122', 'InternetworkingTrack Elective', 4, 3),
(148, 'HNDIT23133', 'Enterprise Information Security Systems', 4, 3),
(149, 'HNDIT23142', 'Introduction to Business Analysis', 4, 3),
(150, 'HNDIT23153', 'Management Information Systems', 4, 3),
(151, 'HNDIT23163', 'E-Commerce', 4, 3),
(152, 'HNDIT24012', 'Computer Architecture', 4, 4),
(153, 'HNDIT24022', 'Open Source Systems', 4, 4),
(154, 'HNDIT24032', 'IT and Society', 4, 4),
(155, 'HNDIT24044', 'Project', 4, 4),
(156, 'HNDIT24052', 'Communication Skills IV', 4, 4),
(157, 'HNDIT24113', 'Multi-tiered Application Development', 4, 4),
(158, 'HNDIT24123', 'Software Configuration Management', 4, 4),
(159, 'HNDIT24133', 'Web Programming', 4, 4),
(160, 'HNDIT24143', 'Computer Graphics and Animation Design', 4, 4),
(161, 'HNDIT24153', 'Digital Image Processing', 4, 4),
(162, 'HNDIT24163', 'Digital Video and Audio', 4, 4),
(163, 'HNDIT24213', 'Server Installation and Management', 4, 4),
(164, 'HNDIT24223', 'Network and Data Centre Operations', 4, 4),
(165, 'HNDIT24233', 'Disaster Recovery & Business Continuity Planning', 4, 4),
(166, 'HNDIT24243', 'DB Server Installation and Management', 4, 4),
(167, 'HNDIT24253', 'Database Programming Project', 4, 4),
(168, 'HNDIT24313', 'Software Testing', 4, 4),
(169, 'HNDIT24323', 'Technical Report Writing', 4, 4),
(170, 'HNDIT24333', 'Software Quality Management', 4, 4),
(171, 'HNDIT24343', 'Business Analysis - Tools & Processes', 4, 4),
(172, 'HNDIT24353', 'System Analysis Case Study', 4, 4),
(173, 'HNDIT24413', 'Educational Psychology', 4, 4),
(174, 'HNDIT24423', 'Teaching Methodology', 4, 4),
(175, 'HNDIT24433', 'Educational Measurement and Evaluation', 4, 4),
(176, 'THM11013', 'Principals of Tourism Studies', 5, 1),
(177, 'THM11023', 'Principals of Tourism Studies', 5, 1),
(178, 'THM11033', 'Legal Framework for Tourism Industry', 5, 1),
(179, 'THM11043', 'Heritage Tourism', 5, 1),
(180, 'THM11053', 'Information Technology I', 5, 1),
(181, 'THM11063', 'Professional Communication II', 5, 1),
(182, 'THM12063', 'Introducation to the Hospitality', 5, 2),
(183, 'THM12073', 'Tourism Policy, Planning and Development', 5, 2),
(184, 'THM12083', 'Information Technology II', 5, 2),
(185, 'THM12093', 'Professional Communication II', 5, 2),
(186, 'THM12113', 'German Language Proficiency Level', 5, 2),
(187, 'THM12123', 'Japanese Language Proficiency Level', 5, 2),
(188, 'THM12133', 'French Language Proficiency Level', 5, 2),
(189, 'THM21153', 'Houese Keeping Management', 5, 3),
(190, 'THM21163', 'Front Office Management', 5, 3),
(191, 'THM21173', 'Restuarent Operation Management', 5, 3),
(192, 'THM21183', 'Information Technolog III', 5, 3),
(193, 'THM21193', 'Professional Communication III', 5, 3),
(194, 'THM21203', 'German Language Proficiency Level II', 5, 3),
(195, 'THM21214', 'Japanese Language Proficiency Level', 5, 3),
(196, 'THM21215', 'French Language Proficiency Level', 5, 3),
(197, 'THM22233', 'Human Resource Management in Hospitality', 5, 4),
(198, 'THM22243', 'Hospitality and Catering', 5, 4),
(199, 'THM22253', 'Accounting for Hotel Management', 5, 4),
(200, 'THM22263', 'Information Technology IV', 5, 4),
(201, 'THM22273', 'Professional Commnication', 5, 4),
(202, 'THM22283', 'German Language Proficiency Level III', 5, 4),
(203, 'THM22293', 'Japanese Language Proficiency Level III', 5, 4),
(204, 'THM22303', 'French Language Proficiency Level III', 5, 4),
(205, 'THM31313', 'Food & Beverage Management', 5, 5),
(206, 'THM31323', 'Marketing for Hospitality & Tourism', 5, 5),
(207, 'THM31333', 'Advertising in Tourism & Leisure', 5, 5),
(208, 'THM31343', 'Information Technology V', 5, 5),
(209, 'THM31353', 'Professional Communication V', 5, 5),
(210, 'THM31363', 'German Language Proficiency Level IV', 5, 5),
(211, 'THM31373', 'Japanese Language Proficiency Level IV', 5, 5),
(212, 'THM31383', 'French Language Proficiency Level IV', 5, 5),
(213, 'BA1113', 'Business Economics', 6, 1),
(214, 'BA1123', 'Management Process', 6, 1),
(215, 'BA1133', 'Business Mathematics and Statistics', 6, 1),
(216, 'BA1143', 'Business English I', 6, 1),
(217, 'BA1153', 'Financial Accounting', 6, 1),
(218, 'BA1213', 'Managerial Accounting', 6, 2),
(219, 'BA1223', 'Information Technology', 6, 2),
(220, 'BA1233', 'Business Law', 6, 2),
(221, 'BA1243', 'Business English II', 6, 2),
(222, 'BA1253', 'Marketing Management', 6, 2),
(223, 'BA2113', 'Business Finance', 6, 3),
(224, 'BA2122', 'Computer Application for Business', 6, 3),
(225, 'BA2133', 'Operations Management', 6, 3),
(226, 'BA2143', 'Professional Communication', 6, 3),
(227, 'BA2153', 'Organizational Behavior', 6, 3),
(228, 'BA2212', 'Project Management', 6, 4),
(229, 'BA2222', 'Management of Technology for Business', 6, 4),
(230, 'BA2233', 'Banking and Insurance', 6, 4),
(231, 'BA2243', 'Human Resource Management', 6, 4),
(232, 'BA2253', 'Business Strategy and Entrepreneurship', 6, 4),
(233, 'BA3113', 'Internship', 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `temp_data`
--

CREATE TABLE `temp_data` (
  `id` int(11) NOT NULL,
  `member_ID` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `assign_Code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_data`
--

INSERT INTO `temp_data` (`id`, `member_ID`, `type`, `value`, `assign_Code`) VALUES
(59, 0, 0, 6, 'a@gmail.com'),
(85, 1, 0, 121, '1Y1S1A'),
(96, 0, 0, 10, 'b@gmail.com'),
(107, 2, 0, 129, '1Y1S1A'),
(108, 0, 0, 13, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memberId` (`memberId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `minicourse`
--
ALTER TABLE `minicourse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Admin_ID` (`Admin_ID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member` (`member_id`),
  ADD KEY `admin` (`admin_id`),
  ADD KEY `course` (`course_id`),
  ADD KEY `subject` (`sub_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `miniCourse_Id` (`miniCourse_Id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentID` (`commentID`),
  ADD KEY `userID` (`memberId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`nic_num`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courseToSub` (`course_Id`);

--
-- Indexes for table `temp_data`
--
ALTER TABLE `temp_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `editor`
--
ALTER TABLE `editor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `minicourse`
--
ALTER TABLE `minicourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `temp_data`
--
ALTER TABLE `temp_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`memberId`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `minicourse`
--
ALTER TABLE `minicourse`
  ADD CONSTRAINT `minicourse_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `courseToSub` FOREIGN KEY (`course_Id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
