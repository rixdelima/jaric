-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2025 at 02:05 AM
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
-- Database: `db_form`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_response`
--

CREATE TABLE `tbl_response` (
  `q_id` int(50) NOT NULL,
  `q_fname` varchar(200) NOT NULL,
  `q_basket` varchar(200) NOT NULL,
  `q_bplayers` varchar(200) NOT NULL,
  `q_goals` varchar(200) NOT NULL,
  `q_team` varchar(200) NOT NULL,
  `q_pointer` varchar(200) NOT NULL,
  `q_champion` varchar(200) NOT NULL,
  `q_sports` varchar(200) NOT NULL,
  `q_main` varchar(200) NOT NULL,
  `q_fav` varchar(200) NOT NULL,
  `q_nba` varchar(200) NOT NULL,
  `q_experience` varchar(200) NOT NULL,
  `q_shot` varchar(200) NOT NULL,
  `q_skills` varchar(200) NOT NULL,
  `q_improve` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_response`
--

INSERT INTO `tbl_response` (`q_id`, `q_fname`, `q_basket`, `q_bplayers`, `q_goals`, `q_team`, `q_pointer`, `q_champion`, `q_sports`, `q_main`, `q_fav`, `q_nba`, `q_experience`, `q_shot`, `q_skills`, `q_improve`) VALUES
(1, 'Nostrud sed molestia', 'Provident dolor rem', 'Debitis illum ut do', 'Ut odio eum quaerat ', '7', 'A shot made from close range', 'Los Angeles Lakers', 'Tennis', 'Doloribus et sapient', 'Ut eos repudiandae e', 'Quia voluptatem qui ', 'Mollitia quaerat ut ', 'Rebound', 'Good', 'rebounding'),
(3, 'Enim quod tempore p1212', 'Aut explicabo Exerc', 'Molestias atque pari', 'Id est quos sint in', '5', 'A shot made from far away', 'Los Angeles Lakers', 'Mobile Legends', 'Aut debitis eligendi', 'Quia distinctio Nos', 'Iusto atque qui nost', 'Ea aut et sint fugi', 'Steal', 'Good', 'dribbling'),
(4, 'Enim quod tempore p', 'Aut explicabo Exerc', 'Molestias atque pari', 'Id est quos sint in', '5', 'A shot made from far away', 'Los Angeles Lakers', 'Mobile Legends', 'Aut debitis eligendi', 'Quia distinctio Nos', 'Iusto atque qui nost', 'Ea aut et sint fugi', 'Steal', 'Good', 'dribbling'),
(5, 'Enim quod tempore p', 'Aut explicabo Exerc', 'Molestias atque pari', 'Id est quos sint in', '5', 'A shot made from far away', 'Los Angeles Lakers', 'Mobile Legends', 'Aut debitis eligendi', 'Quia distinctio Nos', 'Iusto atque qui nost', 'Ea aut et sint fugi', 'Steal', 'Good', 'dribbling'),
(6, 'Enim quod tempore p', 'Aut explicabo Exerc', 'Molestias atque pari', 'Id est quos sint in', '5', 'A shot made from far away', 'Los Angeles Lakers', 'Mobile Legends', 'Aut debitis eligendi', 'Quia distinctio Nos', 'Iusto atque qui nost', 'Ea aut et sint fugi', 'Steal', 'Good', 'dribbling'),
(7, 'Enim quod tempore p', 'Aut explicabo Exerc', 'Molestias atque pari', 'Id est quos sint in', '5', 'A shot made from far away', 'Los Angeles Lakers', 'Mobile Legends', 'Aut debitis eligendi', 'Quia distinctio Nos', 'Iusto atque qui nost', 'Ea aut et sint fugi', 'Steal', 'Good', 'dribbling'),
(8, 'Enim quod tempore p', 'Aut explicabo Exerc', 'Molestias atque pari', 'Id est quos sint in', '5', 'A shot made from far away', 'Los Angeles Lakers', 'Mobile Legends', 'Aut debitis eligendi', 'Quia distinctio Nos', 'Iusto atque qui nost', 'Ea aut et sint fugi', 'Steal', 'Good', 'dribbling'),
(9, 'Enim quod tempore p', 'Aut explicabo Exerc', 'Molestias atque pari', 'Id est quos sint in', '5', 'A shot made from far away', 'Los Angeles Lakers', 'Mobile Legends', 'Aut debitis eligendi', 'Quia distinctio Nos', 'Iusto atque qui nost', 'Ea aut et sint fugi', 'Steal', 'Good', 'dribbling'),
(10, 'Enim quod tempore p', 'Aut explicabo Exerc', 'Molestias atque pari', 'Id est quos sint in', '5', 'A shot made from far away', 'Los Angeles Lakers', 'Mobile Legends', 'Aut debitis eligendi', 'Quia distinctio Nos', 'Iusto atque qui nost', 'Ea aut et sint fugi', 'Steal', 'Good', 'dribbling'),
(11, 'Placeat ullamco ull', 'In laudantium rerum', 'Voluptatem quod magn', 'Voluptatem tempora d', '6', 'A shot made while falling', 'Milwaukee Bucks', 'Basketball', 'Ut lorem velit dolo', 'Voluptatibus debitis', 'Placeat est do qua', 'Magnam qui voluptate', 'Steal', 'Average', 'dribbling'),
(12, 'Enim tempor commodo ', 'Tempora pariatur Eo', 'Delectus laborum eo', 'Quam inventore cumqu', '6', 'A shot made after a rebound', 'Phoenix Suns', 'Volleyball', 'Rerum quaerat fugit', 'Reprehenderit vel fu', 'Neque facere laborum', 'Dicta dignissimos do', 'Steal', 'Poor', 'dribbling');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_response`
--
ALTER TABLE `tbl_response`
  ADD PRIMARY KEY (`q_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_response`
--
ALTER TABLE `tbl_response`
  MODIFY `q_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
