-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2025 at 01:35 AM
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
-- Database: `web_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`) VALUES
(1, 1, 'lShFu4rc79uaQluFGlq2'),
(2, 1, 'KuVp 9cLlMXMgDxmRRWO'),
(3, 1, 'ibv6yPQVVym3GaQVz6r6'),
(4, 1, 'RtUNxw2V9cXPflqqF8VG'),
(5, 1, 'rlYAgfssuCdIqn1u4CJb'),
(6, 1, '943Uz0h2niNz6kcpynlQ'),
(7, 1, 'f0gakw9ZlndZtY4UtGfv'),
(8, 2, 'DFPX1GNULOsIsO85kmdR'),
(9, 2, 'CrjEIj0uA28gbuFavW5o'),
(10, 2, 'fZGWLDg3A813c5JsbMYQ'),
(11, 2, '6IsttGObYfhan1tPSRn4'),
(12, 2, 'dnNIbayIely1GUKqUyG9'),
(13, 2, '9vCUIVbMwMf82d4 PXpw'),
(14, 3, 'E2qEbLsjR rRkYiFHCkg'),
(15, 3, 'hGjvusBcLXy6kJhYgipo'),
(16, 3, 'rHdeDFGOXcq5weYjjhId'),
(17, 3, 'p2hFUW5yEtOKtqyZVz0r'),
(18, 3, 'DBTnMFKe2n6ytkFmRe7o'),
(19, 3, '9xTfEZUCWQsScDDBo0E '),
(20, 4, 'QPL0TEw7eg2D5CtjjTKC'),
(21, 4, 'F6PP2vo1nB67hVNa6Nmk'),
(22, 4, 'cKMGbqkPUMhAP4JZH8YS'),
(23, 4, 'aliQUBJiezMGygjVsIRT'),
(24, 4, 'uGyAeAWQH7vGP3rcfxrr'),
(25, 5, 'wFROSTe BlIsMLyd1n3O'),
(26, 5, 'NooAYF9YEmT2LiNgMR7K'),
(27, 5, 'XLjFX 1zeM9yciV1Abkn'),
(28, 5, '4hHLk4cuHLZD i6CjbKi'),
(29, 5, 'oqlhyiHld23t3OVAGtMo'),
(30, 5, 'LC1g6vunMKulBj 4imlt'),
(31, 5, 'iRyOeeXV unedubiIyqI'),
(32, 6, '44sXvr4rqly1z0AfOXps'),
(33, 6, 'sFNY1HhVriay156p6NDn'),
(34, 6, 'Nz2nR0xPEpDlXWs5rEPr'),
(35, 6, 'XM mykfNsmoDMMjksOng'),
(36, 6, 'HVVN11gTL9DcgLFq7hOv'),
(37, 6, 'u4yovazaNzKatsz5yKKz'),
(38, 6, 'ZI4mTNuNuJVqXCLqXV4Z'),
(39, 7, 'QPxNojsaDRsp4YUCJjjo'),
(40, 7, '24ILpYJDOTyNbFPUmLxU'),
(41, 7, 'Y  APnGybceX9J4w5Yyo'),
(42, 7, 'daUXZRjjP3XjSQaLlze9'),
(43, 7, 'Wfkk 7eullFfodgYAReX'),
(44, 7, 'ct09zTHHlQoeHkkxtsPB'),
(45, 8, 'PxQZwBlJe MYcBjwufXj'),
(46, 8, 'uyUVL0aI8TmnoYLogzbP'),
(47, 8, 'jxBdlxK0aWPTfE8QbvS5'),
(48, 8, 'ep6A2OMYbg4gpxyLNuFo'),
(49, 8, 'VS Y5yYOVdul7IFhIBoN'),
(50, 8, 'NOxPW PGyNhWhZClD7rD'),
(51, 9, '1jxtG7QzX2XHrpeCtCAE'),
(52, 9, 'aSZgPd6y1QF2k18xZgVS'),
(53, 9, 'ei5FqnM2sM08fRHt6sck'),
(54, 9, 'jRQOUrsq 3fRQyjUYSum'),
(55, 9, 'zPYlxUEC2W7BuClkWXJe'),
(56, 9, '0oFbz99ItZSZBsIPU1aB'),
(57, 10, 'LqSxx9cVjITh5VWEy5Fh'),
(58, 10, 'RY7jCw4u6dHcgceNATFf'),
(59, 10, 'VYJgPEKWBTc4p1SgapOd'),
(60, 10, 'g1BCXDjHOaQy9cTIIL0 '),
(61, 10, 'bolPthyQQJnGYfZUKRMa'),
(62, 10, ' W84sHY40NdL O3kw7yx'),
(63, 11, 'tyUme2XsTtTjYhOMtTgI'),
(64, 11, 'nwO8eugUllwcsx5tZ2Wd'),
(65, 11, 'uqHiER6U AMk3lhytTIZ'),
(66, 11, 'bDLuedWi ClIJ3voxGsM'),
(67, 11, 'd8Z ap7cfzHVhFWeSpZh'),
(68, 11, 'lywnHSU3A3TEfCN9T16O'),
(69, 11, 'oVk0uIXAgAHKoXSz0hD4'),
(70, 12, 'Vc zBpjHS3eRwMI5MZJk'),
(71, 12, 'sGIaibs7lFAUuT1y7uo4'),
(72, 12, 'RBBMDuIOR50Fykwd0Py '),
(73, 12, 'BZiubGU8zz SqtY62oUv'),
(74, 12, '5CE5bPs0zAMRaWMvxLQd'),
(75, 12, '6Bbc9DaM2kAOIpZHtb6o'),
(76, 13, 'P1GdHRR8QS6iqe6IULSV'),
(77, 13, '2qhdq1bg06RWK5iQDmzZ'),
(78, 13, 'rDDGHA9t1nxNkbxQdw4g'),
(79, 13, 'Jx7z9VfbArHghpWGV3ur'),
(80, 13, 'JFN9BIxB43qoxHcGi2cI'),
(81, 13, 'vZBlYObI HT62rQy6qu9'),
(82, 14, 'ZIvJmE3sdmR2xLzAJKP '),
(83, 14, 'FN JngB5st9sIEx4ICOP'),
(84, 14, 'PB464gHEY2Y81ypin43W'),
(85, 14, 'klSwtseHOGVTydjP073L'),
(86, 14, 'EhB7P Qwhi1FEkm9Rx24'),
(87, 14, 'ZrZhbPSgk4kK4ViUPmwX'),
(88, 15, '01g0O3M5QVMc7uNsFJam'),
(89, 15, 'jf9of4xy6Pq4nzYrNhQY'),
(90, 15, 'unQinXp7xn3RcP2bEkqa'),
(91, 15, 'CnMwqSaJphgvdQNJ2PKr'),
(92, 15, 'For8YyK MIy35HzEgo20'),
(93, 15, 'HId8N6iqkF7tTbm9pff3'),
(94, 16, 'z8J0qzBaICBTB7tbp29p'),
(95, 16, 'Q9VYyyAcALhJMMVlulF4'),
(96, 16, 'l2vdpua6vgc RHoKOYTl'),
(97, 16, 'GG4MzUPfVHq5J5 A7vUL'),
(98, 16, 'NI9YeeP3HKZcz7blN0Qo'),
(99, 17, 'Doicxyff3YdkuIFG9S5H'),
(100, 17, 'EiJPDt8XrKIKgNaefbPD'),
(101, 17, 'R LpTOIMLBw85OT7SXR4'),
(102, 17, '5wa9PxvvYIjH1g3aH6us'),
(103, 17, 'd4e3RRgOSmFxgUQUXJO5'),
(104, 18, 'DynVy4WIB3RQ8GHcLvwW'),
(105, 18, 'meGcrzgz64RbmcIMQy5E'),
(106, 18, '2uDJwV48CqwrBOVGEkN9'),
(107, 18, '2dUW0GjfgsHAasLPVZZY'),
(108, 18, '2TB1wHajDn MW5ouEwcb'),
(109, 18, 'rLorfvW2VwhOP2erVkFc'),
(110, 18, 'cOqeO7YVOVcyFvx7k0DG'),
(111, 19, 'SlRvoJGmYjUxtksHbQnx'),
(112, 19, 'qovGMfNn 3FwJAWJVNCe'),
(113, 19, 'GFnDpx52BeAjHlOXHFSr'),
(114, 19, 'TqVbj9cjncB90OjPprwH'),
(115, 19, 'RA1I43MXPTbVdoeAOg8B'),
(116, 19, 'JmvhyNyD5FRUaKzejgMo');

-- --------------------------------------------------------

--
-- Table structure for table `related_post`
--

CREATE TABLE `related_post` (
  `id` int(11) NOT NULL,
  `post_1_id` int(11) NOT NULL,
  `post_2_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `related_post`
--

INSERT INTO `related_post` (`id`, `post_1_id`, `post_2_id`) VALUES
(1, 83, 106),
(2, 44, 5),
(3, 82, 96),
(4, 46, 34),
(5, 38, 67),
(6, 21, 103),
(7, 84, 66),
(8, 42, 84),
(9, 45, 81),
(10, 59, 22),
(11, 89, 54),
(12, 105, 14),
(13, 114, 27),
(14, 5, 9),
(15, 55, 7),
(16, 91, 86),
(17, 47, 78),
(18, 24, 12),
(19, 12, 69),
(20, 72, 68),
(21, 38, 112),
(22, 44, 3),
(23, 40, 107),
(24, 27, 61),
(25, 100, 15),
(26, 41, 31),
(27, 56, 55),
(28, 88, 42),
(29, 17, 105),
(30, 31, 116),
(31, 108, 111),
(32, 34, 75),
(33, 110, 109),
(34, 65, 108),
(35, 2, 68),
(36, 71, 29),
(37, 102, 112),
(38, 66, 38),
(39, 45, 27),
(40, 17, 22),
(41, 75, 26),
(42, 30, 46),
(43, 87, 71),
(44, 20, 78),
(45, 79, 46),
(46, 83, 27),
(47, 64, 9),
(48, 100, 16),
(49, 50, 93),
(50, 111, 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Matineh Mousavi', 'matineh.mousavi8200@gmail.com', '2c015826c4d36371c55b1bf3289172429c185ca5fb09f975662eb924bf41654e'),
(2, 'Mobina mahdavi', 'mobina.mahdavi.web@gmail.com', '6fa608ae81932a17764462bf3a96e25700add54c7fc4be8856f118c604d36d24'),
(3, 'Parmida Mehrnikoo', 'Mehrnikoo.net@gmail.com', '3a2b85b241607ae1f82c26cd7719b40fcff4c733e04b04be614faba3e7f95e13'),
(4, 'Sara Sarfi', 'sarasarfi79@gmail.com', 'e866bac05a8f059eb53288540d3ad33f0bd1cc7bff8bfc887d43de423ca11c2d'),
(5, 'Fatemeh Binesh', 'fatemehbinesh17@gmail.com', '013a5d3dfc26f833765e2648b2dabc44a744d5672f5ecf3f9366021e47a322ab'),
(6, 'Danial Isaabadi', 'danial.isaabadi81@gmail.com', '83e4354226a875622a09125f3be4b8de9d95d7f4fe3dbbd7f4038afff9955de8'),
(7, 'Aida Sadeghi', 'asv94974@gmail.com', '7a6592cf2f8d9969835ee63bc663256b0aeb5c300e1c4dbbdc3dba44d59cb1ff'),
(8, 'Masoud Taghipour', 'mtaghipourj@gmail.com', '68bdb07e1a4ec14102a90b32daefd5f7969a548edbacb819f291bb8f2d049230'),
(9, 'Mostafa Montazery', 'Mostafamtz@gmail.com', '6460662e217c7a9f899208dd70a2c28abdea42f128666a9b78e6c0c064846493'),
(10, 'Omid Haghgoo', 'O.Haghgoo@gmail.com', 'b15caa49288a3ff544fb8b48db5a964497e723873c60e79db5b5b449ad5ebe09'),
(11, 'Ali Daneshmand', 'daneshmanda8@gmail.com', '30813398562f7ad5417336436c6345e0bb48abb37d2dcad75450bb47269573c9'),
(12, 'Shakila Shaker', 'shakilashaker80@gmail.com', '03040fbd48cfb066b45e2c35dd53c9e9210c02ace1789a7f69227d3dd0fa8a6a'),
(13, 'fatemeh khajeh', 'fatemeh.khajeh1404@gmail.com', '134bfe69fd22718affaa678b518638faaa82ab83a512718dd2dd2b8cd8e1b223'),
(14, 'Mobina Amini', 'mobina.amini.web@gmail.com', '095e799daf0b7a8e79cc477ef93418ac5309536ac4afd97b7464067ae3d33f51'),
(15, 'Shahed Shirazi', 'shirazishaheds926@gmail.com', '46c703b3eff86136971a774f66fbaa17410d51ce7ae79308b71ee779b6764f77'),
(16, 'amirhosseinasadi', 'amirhosseinasadi162@gmail.com', '6460662e217c7a9f899208dd70a2c28abdea42f128666a9b78e6c0c064846493'),
(17, 'Ghazal Rezaei', 'rezaeighazal432@gmail.com', '3191e532d5f5bc5a33cb79abe97f23e20ed2aa9428fb17210944f24aa994b570'),
(18, 'Mobina Fallah', 'flhmobinaa@gmail.com', '7c2523c985881fb2c2b4cfbe917eb12c4c4b61e898ad4e7160cfca487ca3c4f3'),
(19, 'Mahdieh panjei', 'mahdiehpanjei@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `related_post`
--
ALTER TABLE `related_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `related_post`
--
ALTER TABLE `related_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
