-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: mysql-elvin10.alwaysdata.net
-- Generation Time: Nov 29, 2020 at 07:38 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elvin10_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `Accounting`
--

CREATE TABLE `Accounting` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('F','M') NOT NULL,
  `university` enum('ADA','Khazar','DIA','AZMIU','BBU','BDU','ADNSU','ADAU','ADIU','AzTU','OTDU','UFAZ','Ankara','BMU','ADU','Istanbul') NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `degree` enum('Associate','Bachelor','Master','Doctoral','Phd') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Accounting`
--

INSERT INTO `Accounting` (`id`, `name`, `username`, `email`, `age`, `gender`, `university`, `faculty`, `degree`) VALUES
(1, 'Aygun Resulova', 'aygunrasulova', 'aygunrasulova@mail.ru', 19, 'F', 'BDU', 'Finance', 'Bachelor'),
(2, 'Ayten Ceferova', 'aytancafarova', 'aytancafarova@mail.ru', 19, 'F', 'ADIU', 'Finance', 'Bachelor'),
(3, 'Cavad Mustafayev', 'cavadmustafayev', 'cavadmustafayev@mail.ru', 18, 'M', 'ADIU', 'Industry Administration and Management', 'Bachelor'),
(4, 'Elcan Durmushov', 'elcandurmushov', 'elcandurmushov@mail.ru', 17, 'M', 'ADNSU', 'Business Administration', 'Bachelor'),
(5, 'Fidan Cafarli', 'fidanceferli', 'fidan01@mail.ru', 18, 'F', 'ADIU', 'Finance', 'Bachelor'),
(6, 'Taleh Memmedov', 'taleh10', 'taleh_mammad@gmail.com', 29, 'M', 'ADA', 'Finance', 'Bachelor'),
(7, 'Vahid Qasimov', 'vahidqas10', 'vahid_qas@gmail.com', 22, 'M', 'ADIU', 'Finance', 'Bachelor');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `start` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `title`, `start`) VALUES
(1, 'Future Event', '2020-11-30T22:27'),
(2, 'Birthday Party', '2020-12-01T15:37');

-- --------------------------------------------------------

--
-- Table structure for table `HR`
--

CREATE TABLE `HR` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('F','M') NOT NULL,
  `university` enum('ADA','Khazar','DIA','AZMIU','BBU','BDU','ADNSU','ADAU','ADIU','AzTU','OTDU','UFAZ','Ankara','BMU','ADU','Istanbul') NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `degree` enum('Associate','Bachelor','Master','Doctoral','Phd') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `HR`
--

INSERT INTO `HR` (`id`, `name`, `username`, `email`, `age`, `gender`, `university`, `faculty`, `degree`) VALUES
(1, 'Fidan Ismayilova', 'fidan10', 'fidan.ism@gmail.com', 20, 'F', 'ADU', 'Translation', 'Bachelor'),
(2, 'Sadig Aghalarov', 'sadiq10', 'sadig.aghalarov@bk.ru', 22, 'M', 'ADIU', 'Finance', 'Bachelor'),
(3, 'Afsana Abbaszada', 'afsanaabbaszada', 'afsana01@mail.ru', 21, 'F', 'ADA', 'Public Affairs', 'Bachelor'),
(4, 'Aysel Elizade', 'ayselelizada', 'ayselalizada@mail.ru', 21, 'F', 'BDU', 'Public Affairs', 'Bachelor'),
(5, 'Bahar Aghayeva', 'baharagayeva', 'baharaghalarova@mail.ru', 21, 'F', 'BDU', 'History', 'Master'),
(6, 'Esmer Heziyeva', 'esmerhezi', 'esmer1@mail.ru', 22, 'F', 'BDU', 'Economics', 'Bachelor'),
(7, 'Fidan Ismayilova', 'fidanismayilova', 'fidan011@mail.ru', 19, 'F', 'ADIU', 'Translation', 'Bachelor'),
(8, 'Fidan Sadigova', 'fidansadigova', 'fidan02@mail.ru', 17, 'F', 'ADIU', 'Economics', 'Bachelor'),
(9, 'Govher Agayeva', 'govharaghayeva', 'govher01@mail.ru', 25, 'F', 'AzTU', 'Industry Organization and Management', 'Bachelor'),
(10, 'Gulchin Huseynova', 'gulchin', 'gulchin01@mail.ru', 20, 'F', 'ADIU', 'Accounting', 'Bachelor'),
(11, 'Natig Ibrahimov', 'natigg', 'natig01@mail.ru', 19, 'M', 'ADNSU', 'Industrial Engineering', 'Bachelor'),
(12, 'Vusale Mammadova', 'vusale10', 'vusale.mammad@gmail.com', 42, 'F', 'UFAZ', 'Chemical Engineering', 'Master'),
(13, 'Aysu Mecidli', 'aysumecidli10', 'aysu_mecid@gmail.com', 20, 'F', 'UFAZ', 'Chemical Engineering', 'Bachelor');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `user_id`) VALUES
(7, 'elvin1.jpeg', 48),
(8, 'elvin1.jpeg', 16),
(9, 'elvin.jpeg', 51),
(10, 'WhatsApp Image 2018-08-20 at 3.07.52 PM.jpeg', 50),
(11, 'elvin.jpeg', 53);

-- --------------------------------------------------------

--
-- Table structure for table `IT`
--

CREATE TABLE `IT` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('F','M') NOT NULL,
  `university` enum('ADA','Khazar','DIA','AZMIU','BBU','BDU','ADNSU','ADAU','ADIU','AzTU','OTDU','UFAZ','Ankara','BMU','ADU','Istanbul') NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `degree` enum('Associate','Bachelor','Master','Doctoral','Phd') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `IT`
--

INSERT INTO `IT` (`id`, `name`, `username`, `email`, `age`, `gender`, `university`, `faculty`, `degree`) VALUES
(2, 'Elvin Aqalarov', 'elvin10', 'elvin.aqalarov@bk.ru', 21, 'M', 'UFAZ', 'Chemical Engineering', 'Bachelor'),
(3, 'Aidan Atakishieva', 'aydanatakishiyeva', 'atakishievvaidan@mail.ru', 20, 'F', 'ADNSU', 'IT', 'Bachelor'),
(4, 'Elmar Karimov', 'elmarkarimov', 'elmarkarimov@mail.ru', 21, 'M', 'ADA', 'IT', 'Bachelor'),
(5, 'Elmar Khalilov', 'elmarkhalilov', 'elmar01@mail.ru', 17, 'M', 'ADIU', 'Business', 'Bachelor'),
(6, 'Elvin Qurbanov', 'elvingurbanov', 'elvin1@mail.ru', 22, 'M', 'ADIU', 'IT', 'Bachelor'),
(7, 'Fatime Agasiyeva', 'fatimaaghasiyeva', 'fatima@mail.ru', 20, 'F', 'ADNSU', 'IT', 'Bachelor'),
(8, 'Oruc Ismayilov', 'orucismayil', 'oruc01@mail.ru', 21, 'M', 'Ankara', 'Economics', 'Master'),
(9, 'Orkhan Tahirov', 'orkhantahirov', 'orkhan01@mail.ru', 22, 'M', 'BDU', 'IT', 'Bachelor'),
(10, 'Teymur Kosayev', 'teymur10', 'teymur.kos@gmail.com', 20, 'M', 'UFAZ', 'Chemical Engineering', 'Bachelor'),
(11, 'Rashad Mammadzade', 'rashad10', 'rashad.mammad@gmail.com', 20, 'M', 'UFAZ', 'Chemical Engineering', 'Bachelor'),
(12, 'Cavidan Resul', 'cavidan10', 'cavidan_resul@gmail.com', 20, 'M', 'UFAZ', 'Chemical Engineering', 'Bachelor'),
(13, 'Nusret Kebab', 'nusret10', 'nuaret_keb@gmail.com', 52, 'M', 'Khazar', 'Chemical Engineering', 'Phd'),
(14, 'Aidan', 'aydan_atakishieva', 'atakishievvaidan@mail.ru', 20, 'F', 'ADNSU', 'IT', 'Bachelor'),
(15, 'Эльвин Агаларов', 'elvin101', 'elvin.aqalarov2@gmail.com', 20, 'M', 'ADU', 'Finance', 'Bachelor'),
(16, 'Orxan Tahirov', 'orxantahirov310', 'orxantahirov310@gmail.com', 22, 'M', 'BDU', 'Tetbiqi riyaziyyatkibernetika', 'Bachelor');

-- --------------------------------------------------------

--
-- Table structure for table `Procurement`
--

CREATE TABLE `Procurement` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('F','M') NOT NULL,
  `university` enum('ADA','Khazar','DIA','AZMIU','BBU','BDU','ADNSU','ADAU','ADIU','AzTU','OTDU','UFAZ','Ankara','BMU','ADU','Istanbul') NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `degree` enum('Associate','Bachelor','Master','Doctoral','Phd') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Procurement`
--

INSERT INTO `Procurement` (`id`, `name`, `username`, `email`, `age`, `gender`, `university`, `faculty`, `degree`) VALUES
(1, 'Aftab Kelenterli', 'aftabkalantarli', 'aftab.kalantarli@gmail.com', 21, 'F', 'ADA', 'International Affairs', 'Bachelor'),
(2, 'Aide Isgenderova', 'aidaisgenderova', 'aidaisgenderova@mail.ru', 19, 'F', 'ADIU', 'Business Administration', 'Bachelor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `university` enum('ADA','Khazar','DIA','AZMIU','BBU','BDU','ADNSU','ADAU','ADIU','AzTU','OTDU','UFAZ','Ankara','BMU','ADU','Istanbul') NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `degree` enum('Associate','Bachelor','Master','Doctoral','Phd') NOT NULL,
  `department` enum('HR','IT','Accounting','Procurement') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `age`, `gender`, `university`, `faculty`, `degree`, `department`, `created_at`) VALUES
(18, 'Sadig Aghalarov', 'sadiq10', 'sadig.aghalarov@bk.ru', '$2y$10$PGGLyfsl8TC6SkbwGyelOO87pws7iUbHLXTfzFHDTpPmBABfh.d6G', 22, 'M', 'ADIU', 'Finance', 'Bachelor', 'HR', '2020-11-25 05:55:19'),
(19, 'Aidan Atakishieva', 'aydanatakishiyeva', 'atakishievvaidan@mail.ru', '$2y$10$5yl0s.ecKBTKDi99aCIbs.V8lVhIKLRl6/vEfpsIBkm5BifLfVzWG', 20, 'F', 'ADNSU', 'IT', 'Bachelor', 'IT', '2020-11-25 08:24:36'),
(20, 'Afsana Abbaszada', 'afsanaabbaszada', 'afsana01@mail.ru', '$2y$10$ZyH.g5yUOZWu78PUYeKU0OrfCaklEMqwG9Nm31Asmab7yt666NzFa', 21, 'F', 'ADA', 'Public Affairs', 'Bachelor', 'HR', '2020-11-25 08:27:39'),
(21, 'Aftab Kelenterli', 'aftabkalantarli', 'aftab.kalantarli@gmail.com', '$2y$10$o2WrTsRToxkv0r/ZmEuZ1OKHz6yFX0bkI/IfSe2ZkeBUnw27a3ol2', 21, 'F', 'ADA', 'International Affairs', 'Bachelor', 'Procurement', '2020-11-25 08:34:47'),
(22, 'Aide Isgenderova', 'aidaisgenderova', 'aidaisgenderova@mail.ru', '$2y$10$IaK5fixoCa0j1VP94OXjt.D/knBNZMttosR631Yz5omiaM9x8Fmym', 19, 'F', 'ADIU', 'Business Administration', 'Bachelor', 'Procurement', '2020-11-25 08:42:07'),
(23, 'Aygun Resulova', 'aygunrasulova', 'aygunrasulova@mail.ru', '$2y$10$itpOGMjMFRqnJCEI1bXunuRIvtNGNAGRL3wZg00Wd0GYxSJx6OPtG', 19, 'F', 'BDU', 'Finance', 'Bachelor', 'Accounting', '2020-11-25 08:44:51'),
(24, 'Aysel Elizade', 'ayselelizada', 'ayselalizada@mail.ru', '$2y$10$2ArfctX8Ebe//RSCoEc.9eT4IcBdQLz3FgkRrtjVHFr2xIXONAtQO', 21, 'F', 'BDU', 'Public Affairs', 'Bachelor', 'HR', '2020-11-25 08:46:47'),
(25, 'Ayten Ceferova', 'aytancafarova', 'aytancafarova@mail.ru', '$2y$10$dbPEtLiNqrh1ECHCmISpbu/kMO53DtCAYtU2JR1weTs2vS7VaBzvK', 19, 'F', 'ADIU', 'Finance', 'Bachelor', 'Accounting', '2020-11-25 08:49:21'),
(26, 'Bahar Aghayeva', 'baharagayeva', 'baharaghalarova@mail.ru', '$2y$10$BEM7uvxr7AsoWC0TdZzhaeqoOCG2/Bha2tFjRzxyDbHDYT0Vzly7W', 21, 'F', 'BDU', 'History', 'Master', 'HR', '2020-11-25 08:51:39'),
(27, 'Cavad Mustafayev', 'cavadmustafayev', 'cavadmustafayev@mail.ru', '$2y$10$IjRxy5.tKDSuYkTq0CYUHOuZkrE3XmnFS/459AYJJe5uqoz63jY/u', 18, 'M', 'ADIU', 'Industry Administration and Management', 'Bachelor', 'Accounting', '2020-11-25 08:53:38'),
(28, 'Elcan Durmushov', 'elcandurmushov', 'elcandurmushov@mail.ru', '$2y$10$1qRyA24eM3bBP5EurVFFe.nSsX6UwCrUaMnJ1wan1VysVI2nxT7Wu', 17, 'M', 'ADNSU', 'Business Administration', 'Bachelor', 'Accounting', '2020-11-25 08:55:46'),
(29, 'Elmar Karimov', 'elmarkarimov', 'elmarkarimov@mail.ru', '$2y$10$MrJs4ySAf5g.BvT3bsNg7eTkXzLRokqSq.R8pzHhsNp3yZUyQKI62', 21, 'M', 'ADA', 'IT', 'Bachelor', 'IT', '2020-11-25 08:57:21'),
(30, 'Elmar Khalilov', 'elmarkhalilov', 'elmar01@mail.ru', '$2y$10$ebSux3bE09WI.2utloFQNubGe89Ok/ol5UCsGbxo5o1nTTzmmKqUu', 17, 'M', 'ADIU', 'Business', 'Bachelor', 'IT', '2020-11-25 08:59:12'),
(31, 'Elvin Qurbanov', 'elvingurbanov', 'elvin1@mail.ru', '$2y$10$2zQkPEN5YPIJVocHY3FOkeWHU.TWvsZN7y2r3xenRHm0s3I99HteG', 22, 'M', 'ADIU', 'IT', 'Bachelor', 'IT', '2020-11-25 09:01:18'),
(32, 'Esmer Heziyeva', 'esmerhezi', 'esmer1@mail.ru', '$2y$10$bdAsIRW2VGa/..vwGbDtiO39Qz2LXdZ.EbScI/AJa0qSBMqIJzdk.', 22, 'F', 'BDU', 'Economics', 'Bachelor', 'HR', '2020-11-25 09:04:30'),
(33, 'Fatime Agasiyeva', 'fatimaaghasiyeva', 'fatima@mail.ru', '$2y$10$ET5cislQ76Y6p30daTtkNuqsq5/xQea5mLWtYg1ATzCEgU08OoZpq', 20, 'F', 'ADNSU', 'IT', 'Bachelor', 'IT', '2020-11-25 09:05:59'),
(34, 'Fidan Cafarli', 'fidanceferli', 'fidan01@mail.ru', '$2y$10$ALIFeQwy7tmCFxIJIz70VehLkpf5oChDqBg2e5Mk64Xf622s.jOlm', 18, 'F', 'ADIU', 'Finance', 'Bachelor', 'Accounting', '2020-11-25 09:07:30'),
(35, 'Fidan Ismayilova', 'fidanismayilova', 'fidan011@mail.ru', '$2y$10$lqdZ.wQJJuuFUqsS5E8eUOfBTBRtHD1zYF6.0pxAsv9kwDfRXzDVK', 19, 'F', 'ADIU', 'Translation', 'Bachelor', 'HR', '2020-11-25 09:09:15'),
(36, 'Fidan Sadigova', 'fidansadigova', 'fidan02@mail.ru', '$2y$10$2hwFjXNpqkeaRHnImzfCM.bJTcefo6HBhMJUe/s66uT4QXv57LZU6', 17, 'F', 'ADIU', 'Economics', 'Bachelor', 'HR', '2020-11-25 09:10:47'),
(37, 'Govher Agayeva', 'govharaghayeva', 'govher01@mail.ru', '$2y$10$Pbimksz5dEzdGr/WDWVadeyz.cjyyvKhviTJRoWeKD0FIHZtiDa7O', 25, 'F', 'AzTU', 'Industry Organization and Management', 'Bachelor', 'HR', '2020-11-25 09:12:59'),
(38, 'Gulchin Huseynova', 'gulchin', 'gulchin01@mail.ru', '$2y$10$k0BXY5CErAqRbr5GG2K.f.fk/VUqZxeNJMIOx.pLW//Y4m40w1nZi', 20, 'F', 'ADIU', 'Accounting', 'Bachelor', 'HR', '2020-11-25 09:14:34'),
(39, 'Natig Ibrahimov', 'natigg', 'natig01@mail.ru', '$2y$10$6pmiAQy6n0/8AMkO7KiIFeup8pV0NxMBZrhFlsEmY2rVSJcurNd9O', 19, 'M', 'ADNSU', 'Industrial Engineering', 'Bachelor', 'HR', '2020-11-25 09:16:24'),
(40, 'Oruc Ismayilov', 'orucismayil', 'oruc01@mail.ru', '$2y$10$uUuakYosPUut/E2vVlgdAO12.66Nb4D019NM5DFTW9sZpxCUxZ1kC', 21, 'M', 'Ankara', 'Economics', 'Master', 'IT', '2020-11-25 09:18:43'),
(41, 'Orkhan Tahirov', 'orkhantahirov', 'orkhan01@mail.ru', '$2y$10$qFchk1imXfl.3LnR0GSkhe3bjwAdY5jsXLB.k8tE1m5PwR6XtNYhi', 22, 'M', 'BDU', 'IT', 'Bachelor', 'IT', '2020-11-25 09:20:07'),
(42, 'Vusale Mammadova', 'vusale10', 'vusale.mammad@gmail.com', '$2y$10$oKyz0525dgVGIUBukE2hwOB3o6P9YE6jhwN5cxeDKXatmFnL.f3nK', 42, 'F', 'UFAZ', 'Chemical Engineering', 'Master', 'HR', '2020-11-26 18:28:52'),
(43, 'Nazim Aghalarov', 'nazim10', 'nazim_aga@bk.ru', '$2y$10$tHuFX.jdb9cu0LodD9DfsO51Dbe3lzDsHhXf1z1K3/czy7.B8tFnu', 52, 'M', 'ADIU', 'Finance', 'Bachelor', 'Procurement', '2020-11-26 19:12:19'),
(44, 'Taleh Memmedov', 'taleh10', 'taleh_mammad@gmail.com', '$2y$10$WITvQZoX3CBuGrO1hf65.OjSCdgPe71sx/mh3wLT25eza7GSrpEqe', 29, 'M', 'ADA', 'Finance', 'Bachelor', 'Accounting', '2020-11-26 19:16:39'),
(45, 'Teymur KosayevvV', 'teymur10123', 'teymur.kos@gmail.com', '$2y$10$1TYBB2K3RidaFYi8PbVstu5u6PFAYTibezM4t43lKOPvWL9L13lki', 21, 'M', 'UFAZ', 'Chemical Engineering', 'Bachelor', 'IT', '2020-11-26 19:18:43'),
(46, 'Rashad Mammadzade', 'rashad10', 'rashad.mammad@gmail.com', '$2y$10$v74xBjOMTZFq8XC8wKm2le2qzt3m55tkdbcsjQqrFHVGrE85v/Aue', 50, 'M', 'UFAZ', 'Chemical Engineering', 'Bachelor', 'IT', '2020-11-27 20:09:39'),
(47, 'Aysu Mecidli', 'aysumecidli10', 'aysu_mecid@gmail.com', '$2y$10$RxfgDt8p6qYtpwM4i1KVZ.aBliL5huxaTg6v1NitEwKWTSkp2CjU6', 20, 'F', 'UFAZ', 'Chemical Engineering', 'Doctoral', 'HR', '2020-11-27 21:05:38'),
(48, 'Cavidan Resul', 'cavidan10', 'cavidan_resul@gmail.com', '$2y$10$mdBNBuk94Er9u/ZG/S8pV.ia5IZH27566t8WU/QDR4xHMWDzb1x9W', 20, 'M', 'UFAZ', 'Chemical Engineering', 'Bachelor', 'Procurement', '2020-11-27 21:20:01'),
(49, 'Nusret Kebab', 'nusret10', 'nuaret_keb@gmail.com', '$2y$10$l1yJZAHYq58rACxDyh9bneSsh0UdFWdtjpOnHnorF1WjP7qLQ3ZuG', 52, 'M', 'Khazar', 'Chemical Engineering', 'Phd', 'IT', '2020-11-28 03:46:57'),
(53, 'Vahid Qasimov', 'vahidqas10', 'vahid_qas@gmail.com', '$2y$10$.dWilc/2bN3EX.dkp6FUjevAPxe.ul5NZE/3PTt622YwtiPCqCrwW', 22, 'M', 'ADIU', 'Finance', 'Bachelor', 'Accounting', '2020-11-29 19:32:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Accounting`
--
ALTER TABLE `Accounting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `HR`
--
ALTER TABLE `HR`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `IT`
--
ALTER TABLE `IT`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `Procurement`
--
ALTER TABLE `Procurement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Accounting`
--
ALTER TABLE `Accounting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `HR`
--
ALTER TABLE `HR`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `IT`
--
ALTER TABLE `IT`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Procurement`
--
ALTER TABLE `Procurement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
