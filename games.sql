-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 01, 2023 at 06:12 PM
-- Server version: 10.3.22-MariaDB-1ubuntu1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `games_in_holding`
--

CREATE TABLE `games_in_holding` (
  `id` int(11) NOT NULL,
  `submitter` varchar(255) DEFAULT NULL,
  `link_to_game` varchar(255) DEFAULT NULL,
  `name_of_game` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `game_icon_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games_in_holding`
--

INSERT INTO `games_in_holding` (`id`, `submitter`, `link_to_game`, `name_of_game`, `description`, `tags`, `game_icon_url`) VALUES
(6, 't', 't', 't', 't', 't', 't');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `directory_created` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `directory_created`) VALUES
(2, 'Griff', '$2y$10$ssk2xQ2PHC/4YFrSqjLRbO0WS0SNW.rQ2O.C/gHk1hWvhor4P7s0q', '2023-05-29 23:16:02', 0),
(3, 'test', '$2y$10$9hKSNMF0pkFkuDu9GTtJ0eCjY5JzNu/QI9Q3zzpmjk.BvUTLqsLfG', '2023-06-08 01:21:14', 0),
(4, 'test1', '$2y$10$tRtM.6y/KtDMilpC5n62De3j6INR9dEAmB7GsFdXySibUz/N0kp7q', '2023-06-08 01:25:12', 0),
(5, 'admin', '$2y$10$oZMyuHAReAxaW7OS1127yO5XyNV5qNcQOcSRTuaoJ0hn0F2.8RbKi', '2023-08-01 16:47:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `your_table_name`
--

CREATE TABLE `your_table_name` (
  `ID` int(11) NOT NULL,
  `Date_Added` date NOT NULL,
  `Submitter` varchar(255) NOT NULL,
  `link_to_game` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `thumbnail_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `your_table_name`
--

INSERT INTO `your_table_name` (`ID`, `Date_Added`, `Submitter`, `link_to_game`, `description`, `tags`, `thumbnail_url`) VALUES
(1, '2023-05-11', 'Hungry Giraffe Games', 'https://v6p9d9t4.ssl.hwcdn.net/html/6565980/polyrun/GameData/index.html', 'Polyrun', 'unity', 'https://img.itch.zone/aW1nLzEwMTQxOTgyLnBuZw==/315x250%23c/B5eZOp.png'),
(2, '2023-05-11', 'Hungry Giraffe Games', 'https://arcade.makecode.com/47432-80093-12157-98586', 'Climate Combat', 'makecode', 'assets/icons/climate-combat/icon.jpg'),
(3, '2023-05-11', 'Dolphin Coders', 'roblox://placeId=6375756571', 'Dolphin\'s DCO (Roblox)', 'roblox', 'https://tr.rbxcdn.com/465eb228ede4742b5de5ea307fd1fc61/150/150/Image/Png'),
(4, '2023-05-13', 'HungryGiraffeGames', 'https://v6p9d9t4.ssl.hwcdn.net/html/8057523/Build1.2/index.html', 'Mario Party - Black Belt Project', 'unity', 'https://img.itch.zone/aW1nLzEyMDg4Mzc4LnBuZw==/347x500/QoGP%2FP.png'),
(5, '2023-05-11', 'Zombie Island', 'https://gdp.code.ninja/Public/Play/WA4KYm8dPk', 'Zombie Island', 'gdp', 'assets/icons/zombie-island/icon.jpg'),
(6, '2023-05-15', 'Business Tycoon', 'https://scratch.mit.edu/projects/315791076/embed', 'Business Tycoon', 'scratch', 'assets/icons/business-tycoon/icon.jpg'),
(12, '2023-06-07', 'Voxel Game', 'assets/games/voxel/index.html', 'Voxel Game', 'web', 'assets/icons/voxel/icon.jpg'),
(13, '2023-06-07', 'Circle Game', 'assets/games/circle/index.html', 'Circle Game', 'web', 'assets/icons/circle/circle.jpg'),
(14, '2023-06-08', 'King of the hill - Roblox', 'roblox://placeId=5658651217', 'King of the hill - Roblox', 'roblox', 'https://tr.rbxcdn.com/bd1cd8c17127205364a4c04b8c563146/768/432/Image/Png'),
(15, '2023-06-08', 'Racing - Roblox', 'roblox://placeId=4382862134', 'Racing - Roblox', 'roblox', 'https://tr.rbxcdn.com/9eee16734b959911b128d9fc3fec9424/150/150/Image/Png'),
(16, '2023-06-08', 'Stranded - Roblox', 'roblox://placeId=5664506069', 'Stranded- Roblox', 'roblox', 'https://tr.rbxcdn.com/231cec87bdd28b8479f08ed3b7dd4199/768/432/Image/Png'),
(17, '2023-06-08', 'McDonalds Simulator - Roblox', 'roblox://placeId=6418182032', 'McDonalds Simulator - Roblox', 'roblox', 'https://t6.rbxcdn.com/df24feec0aae3d42d244d0fe6046d508');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games_in_holding`
--
ALTER TABLE `games_in_holding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `your_table_name`
--
ALTER TABLE `your_table_name`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games_in_holding`
--
ALTER TABLE `games_in_holding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `your_table_name`
--
ALTER TABLE `your_table_name`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
