-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 02:47 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tv_show`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `access` (IN `user` VARCHAR(30), IN `pass` VARCHAR(30))  NO SQL
SELECT COUNT(*) AS tot FROM users WHERE username=user and password=pass$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `first_name`, `last_name`) VALUES
(2, 'Jennifer', 'Aniston'),
(4, 'Mathew', 'Perry'),
(5, 'Courtney', 'Cox'),
(6, 'Matt', 'LeBlanc'),
(7, 'Lisa', 'Kudrow'),
(8, 'David', 'Schwimmer'),
(13, 'Nina', 'Dobrev'),
(14, 'Paul', 'Wesley'),
(15, 'Ian', 'Somerhalder'),
(16, 'Steven', 'McQueen'),
(17, 'Sara', 'Canning'),
(18, 'Kat', 'Graham'),
(19, 'Candice', 'King'),
(20, 'Zach', 'Roerig'),
(21, 'Kayla', 'Ewell'),
(22, 'Michael', 'Trevino'),
(23, 'Matt', 'Davis'),
(24, 'Joseph', 'Morgan'),
(25, 'Michael', 'Malarkey'),
(26, 'Johnny', 'Galecki'),
(27, 'Jim', 'Parsons'),
(28, 'Kaley', 'Cuoco'),
(29, 'Simon', 'Helberg'),
(30, 'Kunal', 'Nayyar'),
(31, 'Mayim', 'Bialik'),
(32, 'Melissa', 'Rauch'),
(33, 'Benedict', 'Cumberbatch'),
(34, 'Martin', 'Freeman'),
(35, 'Rupert', 'Graves'),
(36, 'Una', 'Stubbs'),
(37, 'Mark', 'Gatiss'),
(38, 'Louise', 'Brealey'),
(39, 'Andrew', 'Scott'),
(40, 'Amanda', 'Abbington'),
(41, 'Sian', 'Brooke'),
(42, 'Sean', 'Bean'),
(43, 'Mark', 'Addy'),
(44, 'Nikolaj', 'Waldau'),
(45, 'Michelle', 'Fairley'),
(46, 'Lena', 'Headey'),
(47, 'Emilia', 'Clarke'),
(48, 'Iain', 'Glen'),
(49, 'Harry', 'Lloyd'),
(50, 'Kit', 'Harrington'),
(51, 'Sophie', 'Turner'),
(52, 'Maisie', 'Williams'),
(53, 'Richard', 'Madden'),
(54, 'Alfie', 'Allen'),
(55, 'Isaac', 'Wright'),
(56, 'Jack', 'Gleeson'),
(57, 'Rory', 'McCann'),
(58, 'Peter', 'Dinklage'),
(59, 'Jason', 'Momoa'),
(60, 'Aiden', 'Gillen'),
(61, 'Liam', 'Cunningham'),
(62, 'John', 'Bradley'),
(63, 'Stephan', 'Dillane'),
(64, 'Carice', 'Houten'),
(65, 'James', 'Cosmo'),
(66, 'Jerome', 'Flynn'),
(67, 'Conleth', 'Hill'),
(68, 'Sibel', 'Kekilli'),
(69, 'Natalie', 'Dormer'),
(70, 'Charles', 'Dance'),
(71, 'Oona', 'Chaplin'),
(72, 'Rose', 'Leslie'),
(73, 'Joe', 'Dempsey'),
(74, 'Kristofer', 'Hivju'),
(75, 'Gwendoline', 'Christie'),
(76, 'Iwan', 'Rheon'),
(77, 'Hannah', 'Murray'),
(78, 'Michiel', 'Huisman'),
(79, 'Nathalie', 'Emmanuel'),
(80, 'Indira', 'Varma'),
(81, 'Dean', 'Chapman'),
(82, 'Tom', 'Wlaschiha'),
(83, 'Michael', 'McElhatton'),
(84, 'Jonathan', 'Pryce'),
(85, 'Jacob', 'Anderson'),
(87, 'Thomas', 'Middleditch'),
(88, 'TJ', 'Miller'),
(89, 'Josh', 'Brenner'),
(90, 'Martin', 'Starr'),
(91, 'Kumail', 'Nanjiani'),
(92, 'Christopher', 'Welch'),
(93, 'Amanda', 'Crew'),
(94, 'Zach', 'Woods'),
(95, 'Matt', 'Ross'),
(96, 'Suzzanne', 'Cryer'),
(97, 'Jimmy', 'Yang'),
(98, 'Stephen', 'Tobolowsky'),
(99, 'Chris', 'Diamantopoulos');

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin`
-- (See below for the actual view)
--
CREATE TABLE `admin` (
`username` varchar(30)
,`password` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `creators`
--

CREATE TABLE `creators` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creators`
--

INSERT INTO `creators` (`id`, `first_name`, `last_name`) VALUES
(18, 'David', 'Crane'),
(19, 'Marta', 'Kauffman'),
(20, 'Kevin', 'Williamson'),
(21, 'Julie', 'Plec'),
(22, 'Chuck', 'Lorre'),
(23, 'Bill', 'Prady'),
(24, 'Mark', 'Gatiss'),
(25, 'Steven', 'Moffat'),
(26, 'David', 'Benioff'),
(27, 'DB', 'Weiss'),
(28, 'Mike', 'Judge'),
(29, 'John', 'Altschuler'),
(30, 'Dave', 'Krinsky');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `synopsis` varchar(1000) NOT NULL,
  `seasons` int(11) NOT NULL,
  `episodes` int(11) NOT NULL,
  `air_date` date NOT NULL,
  `genre` varchar(30) NOT NULL,
  `lang` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `end_date` date DEFAULT NULL,
  `channel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`id`, `title`, `synopsis`, `seasons`, `episodes`, `air_date`, `genre`, `lang`, `status`, `end_date`, `channel`) VALUES
(1, 'F.R.I.E.N.D.S', 'Follow the lives of six reckless adults living in Manhattan, as they indulge in adventures which make their lives both troublesome and happening.', 10, 236, '1994-09-22', 'Comedy', 'English', 1, '2004-05-06', 'NBC'),
(2, 'The Vampire Diaries', 'On her first day at high school, Elena meets Stefan and immediately feels a connection with him. However, what she does not know is that Stefan and his brother, Damon, are in fact vampires.', 8, 171, '2009-09-10', 'Drama', 'English', 1, '2017-03-10', 'The CW'),
(3, 'The Big Bang Theory', 'The lives of four socially awkward friends, Leonard, Sheldon, Howard and Raj, take a wild turn when they meet beautiful and free-spirited Penny.', 12, 279, '2007-09-24', 'Comedy', 'English', 1, '2019-05-16', 'CBS'),
(4, 'Sherlock', 'Dr. Watson, a former army doctor, finds himself sharing a flat with Sherlock Holmes, an eccentric individual with a knack for solving crimes. Together, they take on the most unusual cases.', 4, 13, '2010-07-25', 'Drama', 'English', 0, '0000-00-00', 'BBC'),
(5, 'Game of Thrones', 'Nine noble families wage war against each other in order to gain control over the mythical land of Westeros. Meanwhile, a force is rising after millenniums and threatens the existence of living men.', 8, 73, '2011-04-17', 'Drama', 'English', 1, '2019-05-19', 'HBO'),
(6, 'Silicon Valley', 'Richard, a programmer, creates an app called the Pied Piper and tries to get investors for it. Meanwhile, five other programmers struggle to make their mark in Silicon Valley.', 5, 47, '2014-04-06', 'Comedy', 'English', 0, '0000-00-00', 'HBO');

-- --------------------------------------------------------

--
-- Table structure for table `show_actors`
--

CREATE TABLE `show_actors` (
  `show_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `show_actors`
--

INSERT INTO `show_actors` (`show_id`, `actor_id`, `role`) VALUES
(2, 13, 'Elena Gilbert'),
(2, 13, 'Katherine Pierce'),
(2, 14, 'Stefan Salvatore'),
(2, 15, 'Damon Salvatore'),
(2, 16, 'Jeremy Gilbert'),
(2, 17, 'Jenna Sommers'),
(2, 18, 'Bonnie Bennett'),
(2, 19, 'Caroline Forbes'),
(2, 20, 'Matt Donovan'),
(2, 21, 'Vicki Donovan'),
(2, 22, 'Tyler Lockwood'),
(2, 23, 'Alaric Saltzman'),
(2, 24, 'Klaus Mikaelson'),
(2, 25, 'Enzo St. John'),
(3, 26, 'Leonard Hofstadter'),
(3, 27, 'Sheldon Cooper'),
(3, 28, 'Penny'),
(3, 29, 'Howard Wolowitz'),
(3, 30, 'Rajesh Koothrappali'),
(3, 31, 'Amy Farrah Fowler'),
(3, 32, 'Bernadette Rostenkowski'),
(4, 33, 'Sherlock Holmes'),
(4, 34, 'Dr. John Watson'),
(4, 35, 'Greg Lestrade'),
(4, 36, 'Mrs. Hudson'),
(4, 37, 'Mycroft Holmes'),
(4, 38, 'Molly Hooper'),
(4, 39, 'Jim Moriarty'),
(4, 40, 'Mary Morstan'),
(4, 41, 'Eurus Holmes'),
(6, 87, 'Richard Hendricks'),
(6, 88, 'Erlich Bachman'),
(6, 89, 'Nelson Bighetti'),
(6, 90, 'Bertram Gilfoyle'),
(6, 91, 'Dinesh Chugtai'),
(6, 92, 'Peter Gregory'),
(6, 93, 'Monica Hall'),
(6, 94, 'Donald Dunn'),
(6, 95, 'Gavin Belson'),
(6, 96, 'Laurie Bream'),
(6, 97, 'Jian Yang'),
(6, 98, 'Jack Barker'),
(6, 99, 'Russ Hanneman'),
(5, 42, 'Eddard Stark'),
(5, 43, 'Robert Baratheon'),
(5, 44, 'Jaime Lannister'),
(5, 45, 'Catelyn Stark'),
(5, 46, 'Cersei Lannister'),
(5, 47, 'Daenerys Targaryen'),
(5, 48, 'Jorah Mormont'),
(5, 49, 'Viserys Targaryen'),
(5, 50, 'Jon Snow'),
(5, 51, 'Sansa Stark'),
(5, 52, 'Arya Stark'),
(5, 53, 'Robb Stark'),
(5, 54, 'Theon Greyjoy'),
(5, 55, 'Bran Stark'),
(5, 56, 'Joffrey Baratheon'),
(5, 57, 'Sandor Clegane'),
(5, 58, 'Tyrion Lannister'),
(5, 59, 'Khal Drogo'),
(5, 60, 'Peter Baelish'),
(5, 61, 'Davos Seaworth'),
(5, 62, 'Samwell Tarly'),
(5, 63, 'Stannis Baratheon'),
(5, 64, 'Melisandre'),
(5, 65, 'Jeor Mormont'),
(5, 66, 'Bronn'),
(5, 67, 'Varys'),
(5, 68, 'Shae'),
(5, 69, 'Margaery Tyrell'),
(5, 70, 'Tywin Lannister'),
(5, 71, 'Talisa Stark'),
(5, 72, 'Ygritte'),
(5, 73, 'Gendry'),
(5, 74, 'Tormund Giantsbane'),
(5, 75, 'Brienne of Tarth'),
(5, 76, 'Ramsay Bolton'),
(5, 77, 'Gilly'),
(5, 78, 'Daario Naharis'),
(5, 79, 'Missandei'),
(5, 80, 'Ellaria Sand'),
(5, 81, 'Tommen Baratheon'),
(5, 82, 'Jaqen Hghar'),
(5, 83, 'Roose Bolton'),
(5, 84, 'The High Sparrow'),
(5, 85, 'Grey Worm'),
(1, 2, 'Rachel Green'),
(1, 4, 'Chandler Bing'),
(1, 5, 'Monica Geller'),
(1, 6, 'Joey Tribbiani'),
(1, 7, 'Phoebe Buffay'),
(1, 8, 'Ross Geller');

-- --------------------------------------------------------

--
-- Table structure for table `show_creators`
--

CREATE TABLE `show_creators` (
  `show_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `show_creators`
--

INSERT INTO `show_creators` (`show_id`, `creator_id`) VALUES
(2, 20),
(2, 21),
(3, 22),
(3, 23),
(4, 24),
(4, 25),
(6, 28),
(6, 29),
(6, 30),
(5, 26),
(5, 27),
(1, 18),
(1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `gender`, `email`, `username`, `password`, `country`, `dob`, `is_admin`) VALUES
('hhgkj', 'kjh', 0, 'kjh@ygh.com', 'qwerty', 'qwerty', 'India', '1999-11-30', 0),
('Om', 'Kapoor', 0, 'om@gmail.com', 'om', 'om', 'India', '1947-08-15', 0),
('Shilpa', 'R', 1, 'shilpa.snkr@gmail.com', 'shilpa', '1234', 'India', '2019-11-05', 1),
('Shreyas', 'Ananth', 0, 'shreyas.ananth@gmail.com', 'shreyas', '787723', 'India', '2000-01-01', 0),
('Srivalli', 'SB', 1, 'srivalli.akshatha@gmail.com', 'valli', '11111', 'India', '2000-02-26', 0),
('Srivalli', 'SB', 1, 'srivalli@gmail.com', 'srivalli', '123', 'India', '2000-02-26', 0),
('Supra', 'Parasha', 0, 'suprad.parashar@gmail.com', 'alpha', '123', 'India', '2019-11-04', 0),
('Suprad', 'Parashar', 0, 'suprad.s.parashar@gmail.com', 'suprad', '787723', 'India', '2000-01-01', 0);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `check_email` BEFORE INSERT ON `users` FOR EACH ROW IF (SELECT COUNT(*) FROM users WHERE email=new.email OR username=new.username) > 1  THEN SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'ERROR: CREDENTIALS ALREADY EXISTED!';
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_watchlist`
--

CREATE TABLE `user_watchlist` (
  `username` varchar(30) NOT NULL,
  `show_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `rating` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_watchlist`
--

INSERT INTO `user_watchlist` (`username`, `show_id`, `status`, `rating`) VALUES
('shreyas', 3, 1, 1),
('valli', 1, 1, 1),
('valli', 2, 0, 1),
('qwerty', 1, 1, 1),
('alpha', 1, 2, 1),
('alpha', 4, 2, 1),
('alpha', 2, 0, 1),
('suprad', 5, 2, 3),
('suprad', 6, 2, 5),
('suprad', 3, 0, 1),
('suprad', 2, 1, 1),
('om', 3, 2, 1),
('srivalli', 6, 1, -1);

-- --------------------------------------------------------

--
-- Structure for view `admin`
--
DROP TABLE IF EXISTS `admin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin`  AS  select `users`.`username` AS `username`,`users`.`password` AS `password` from `users` where `users`.`is_admin` = 1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creators`
--
ALTER TABLE `creators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `show_actors`
--
ALTER TABLE `show_actors`
  ADD KEY `show_id` (`show_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Indexes for table `show_creators`
--
ALTER TABLE `show_creators`
  ADD KEY `show_id` (`show_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`,`username`);

--
-- Indexes for table `user_watchlist`
--
ALTER TABLE `user_watchlist`
  ADD KEY `show_id` (`show_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `creators`
--
ALTER TABLE `creators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `show_actors`
--
ALTER TABLE `show_actors`
  ADD CONSTRAINT `show_actors_ibfk_1` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`),
  ADD CONSTRAINT `show_actors_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`);

--
-- Constraints for table `show_creators`
--
ALTER TABLE `show_creators`
  ADD CONSTRAINT `show_creators_ibfk_1` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`),
  ADD CONSTRAINT `show_creators_ibfk_2` FOREIGN KEY (`creator_id`) REFERENCES `creators` (`id`);

--
-- Constraints for table `user_watchlist`
--
ALTER TABLE `user_watchlist`
  ADD CONSTRAINT `user_watchlist_ibfk_1` FOREIGN KEY (`show_id`) REFERENCES `shows` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
