-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2019 at 03:48 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acme`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(10) UNSIGNED NOT NULL,
  `categoryName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Category classifications of inventory items';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`) VALUES
(1, 'Cannon'),
(2, 'Explosive'),
(3, 'Misc'),
(4, 'Rocket'),
(5, 'Trap'),
(13, 'Projectile'),
(20, 'Big Guns');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` int(10) UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comments`) VALUES
(4, 'Bucky', 'Barnes', 'roadrunner2@acme.com', '$2y$10$ldIAl6Gyr867EMe82Fkc8OCejYC5Zrgq1uQTJg.UYuDwf3MGcmWp2', '1', NULL),
(10, 'Elmer', 'Fudd', 'wabbits@acme.com', '$2y$10$qA3Yx8fekGNLcbOjx00I1.DBEFRKt0d4/zYauk5FW0LzOSMW4WVz6', '1', NULL),
(11, 'Peter', 'Parker', 'admin@cit336.net', '$2y$10$qA3Yx8fekGNLcbOjx00I1.DBEFRKt0d4/zYauk5FW0LzOSMW4WVz6', '3', NULL),
(12, 'Tony', 'Stark', 'ironman@gmail.com', '$2y$10$tdXwt6OGYm4L8MP9vIyTAuTAzaz02Qx0a71PpNpi2UDKd0ImJehBe', '1', NULL),
(13, 'Steve', 'Rogers', 'captain@america.com', '$2y$10$wHbntZ2dRROof5qRZRRNROVcVusuONC5lTKUXD6zCJyCoEl4BXeJG', '1', NULL),
(14, 'Bugs', 'Bunny', 'bugs@bunny.com', '$2y$10$hZHsrV1RpRZ0HjLGKSkjYu3rde2fTNWAAuJsiobDQuatW9.CCNgqm', '1', NULL),
(15, 'Daffy', 'Duck', 'daffy@duck.com', '$2y$10$x.JJdHaIpHpWXOOxOEH52.JBvSJflMNJBJvZjgMpheSQYAyF4WOme', '1', NULL),
(16, 'Dwight', 'Schrute', 'dwight@shcrutefarms.com', '$2y$10$FunMh/4xfFu4SiF/kWxckuPNTvmcv0PZaUnGdZi5hD2xSd.HvTIsm', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(10) UNSIGNED NOT NULL,
  `invId` int(10) UNSIGNED NOT NULL,
  `imgName` varchar(100) NOT NULL,
  `imgPath` varchar(150) NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`) VALUES
(5, 8, 'anvil.png', '/acme/images/products/anvil.png', '2019-03-24 00:11:34'),
(6, 8, 'anvil-tn.png', '/acme/images/products/anvil-tn.png', '2019-03-24 00:11:34'),
(7, 3, 'catapult.png', '/acme/images/products/catapult.png', '2019-03-24 00:11:53'),
(8, 3, 'catapult-tn.png', '/acme/images/products/catapult-tn.png', '2019-03-24 00:11:53'),
(9, 14, 'helmet.png', '/acme/images/products/helmet.png', '2019-03-24 00:12:09'),
(10, 14, 'helmet-tn.png', '/acme/images/products/helmet-tn.png', '2019-03-24 00:12:09'),
(11, 4, 'roadrunner.jpg', '/acme/images/products/roadrunner.jpg', '2019-03-24 00:12:18'),
(12, 4, 'roadrunner-tn.jpg', '/acme/images/products/roadrunner-tn.jpg', '2019-03-24 00:12:18'),
(13, 5, 'trap.jpg', '/acme/images/products/trap.jpg', '2019-03-24 00:12:28'),
(14, 5, 'trap-tn.jpg', '/acme/images/products/trap-tn.jpg', '2019-03-24 00:12:28'),
(15, 13, 'piano.jpg', '/acme/images/products/piano.jpg', '2019-03-24 00:12:36'),
(16, 13, 'piano-tn.jpg', '/acme/images/products/piano-tn.jpg', '2019-03-24 00:12:36'),
(17, 6, 'hole.png', '/acme/images/products/hole.png', '2019-03-24 00:12:46'),
(18, 6, 'hole-tn.png', '/acme/images/products/hole-tn.png', '2019-03-24 00:12:46'),
(19, 7, 'no-image.png', '/acme/images/products/no-image.png', '2019-03-24 00:13:04'),
(20, 7, 'no-image-tn.png', '/acme/images/products/no-image-tn.png', '2019-03-24 00:13:04'),
(21, 10, 'mallet.png', '/acme/images/products/mallet.png', '2019-03-24 00:13:12'),
(22, 10, 'mallet-tn.png', '/acme/images/products/mallet-tn.png', '2019-03-24 00:13:12'),
(23, 9, 'rubberband.jpg', '/acme/images/products/rubberband.jpg', '2019-03-24 00:13:26'),
(24, 9, 'rubberband-tn.jpg', '/acme/images/products/rubberband-tn.jpg', '2019-03-24 00:13:26'),
(25, 2, 'mortar.jpg', '/acme/images/products/mortar.jpg', '2019-03-24 00:13:36'),
(26, 2, 'mortar-tn.jpg', '/acme/images/products/mortar-tn.jpg', '2019-03-24 00:13:36'),
(27, 15, 'rope.jpg', '/acme/images/products/rope.jpg', '2019-03-24 00:13:46'),
(28, 15, 'rope-tn.jpg', '/acme/images/products/rope-tn.jpg', '2019-03-24 00:13:46'),
(29, 12, 'seed.jpg', '/acme/images/products/seed.jpg', '2019-03-24 00:13:53'),
(30, 12, 'seed-tn.jpg', '/acme/images/products/seed-tn.jpg', '2019-03-24 00:13:53'),
(31, 1, 'rocket.png', '/acme/images/products/rocket.png', '2019-03-24 00:14:06'),
(32, 1, 'rocket-tn.png', '/acme/images/products/rocket-tn.png', '2019-03-24 00:14:06'),
(33, 17, 'bomb.png', '/acme/images/products/bomb.png', '2019-03-24 00:14:13'),
(34, 17, 'bomb-tn.png', '/acme/images/products/bomb-tn.png', '2019-03-24 00:14:13'),
(35, 16, 'fence.png', '/acme/images/products/fence.png', '2019-03-24 00:14:19'),
(36, 16, 'fence-tn.png', '/acme/images/products/fence-tn.png', '2019-03-24 00:14:19'),
(37, 11, 'tnt.png', '/acme/images/products/tnt.png', '2019-03-24 00:14:25'),
(38, 11, 'tnt-tn.png', '/acme/images/products/tnt-tn.png', '2019-03-24 00:14:25'),
(39, 11, 'apples.jpg', '/acme/images/products/apples.jpg', '2019-03-24 02:05:34'),
(40, 11, 'apples-tn.jpg', '/acme/images/products/apples-tn.jpg', '2019-03-24 02:05:34'),
(41, 14, 'white-helmet.png', '/acme/images/products/white-helmet.png', '2019-03-24 02:41:09'),
(42, 14, 'white-helmet-tn.png', '/acme/images/products/white-helmet-tn.png', '2019-03-24 02:41:09'),
(49, 14, 'bhelmet.png', '/acme/images/products/bhelmet.png', '2019-03-24 02:55:53'),
(50, 14, 'bhelmet-tn.png', '/acme/images/products/bhelmet-tn.png', '2019-03-24 02:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int(10) UNSIGNED NOT NULL,
  `invName` varchar(50) NOT NULL DEFAULT '',
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL DEFAULT '',
  `invThumbnail` varchar(50) NOT NULL DEFAULT '',
  `invPrice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `invStock` smallint(6) NOT NULL DEFAULT '0',
  `invSize` smallint(6) NOT NULL DEFAULT '0',
  `invWeight` smallint(6) NOT NULL DEFAULT '0',
  `invLocation` varchar(35) NOT NULL DEFAULT '',
  `categoryId` int(10) UNSIGNED NOT NULL,
  `invVendor` varchar(20) NOT NULL DEFAULT '',
  `invStyle` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Acme Inc. Inventory Table';

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invName`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invSize`, `invWeight`, `invLocation`, `categoryId`, `invVendor`, `invStyle`) VALUES
(1, 'Rocket', 'Rocket for multiple purposes. This can be launched independently to deliver a payload or strapped on to help get you to where you want to be FAST!!! Really Fast!', '/acme/images/products/rocket.png', '/acme/images/products/rocket-tn.png', '1320.00', 5, 60, 90, 'California', 4, 'Goddard', 'metal'),
(2, 'Mortar', 'Our Mortar is very powerful. This cannon can launch a projectile or bomb 3 miles. Made of solid steel and mounted on cement or metal stands [not included].', '/acme/images/products/mortar.jpg', '/acme/images/products/mortar-tn.jpg', '1500.00', 26, 250, 750, 'San Jose', 1, 'Smith & Wesson', 'Metal'),
(3, 'Catapult', 'Our best wooden catapult. Ideal for hurling objects for up to 1000 yards. Payloads of up to 300 lbs.', '/acme/images/products/catapult.png', '/acme/images/products/catapult-tn.png', '2500.00', 4, 1569, 400, 'Cedar Point, IO', 1, 'Wooden Creations', 'Wood'),
(4, 'Female RoadRunner Cutout', 'This carbon fiber backed cutout of a female roadrunner is sure to catch the eye of any male roadrunner.', '/acme/images/products/roadrunner.jpg', '/acme/images/products/roadrunner-tn.jpg', '20.00', 500, 27, 2, 'San Jose', 5, 'Picture Perfect', 'Carbon Fiber'),
(5, 'Giant Mouse Trap', 'Our big mouse trap. This trap is multifunctional. It can be used to catch dogs, mountain lions, road runners or even muskrats. Must be staked for larger varmints [stakes not included] and baited with approptiate bait [sold seperately].\r\n', '/acme/images/products/trap.jpg', '/acme/images/products/trap-tn.jpg', '20.00', 34, 470, 28, 'Cedar Point, IO', 5, 'Rodent Control', 'Wood'),
(6, 'Instant Hole', 'Instant hole - Wonderful for creating the appearance of openings.', '/acme/images/products/hole.png', '/acme/images/products/hole-tn.png', '25.00', 269, 24, 2, 'San Jose', 3, 'Hidden Valley', 'Ether'),
(7, 'Koenigsegg CCX', 'This high performance car is sure to get you where you are going fast. It holds the production car land speed record at an amazing 250mph.', '/acme/images/products/no-image.png', '/acme/images/products/no-image.png', '500000.00', 1, 25000, 3000, 'San Jose', 3, 'Koenigsegg', 'Metal'),
(8, 'Anvil', '50 lb. Anvil - perfect for any task requireing lots of weight. Made of solid, tempered steel.', '/acme/images/products/anvil.png', '/acme/images/products/anvil-tn.png', '150.00', 15, 80, 50, 'San Jose', 5, 'Steel Made', 'Metal'),
(9, 'Monster Rubber Band', 'These are not tiny rubber bands. These are MONSTERS! These bands can stop a train locamotive or be used as a slingshot for cows. Only the best materials are used!', '/acme/images/products/rubberband.jpg', '/acme/images/products/rubberband-tn.jpg', '4.00', 4589, 75, 1, 'Cedar Point, IO', 3, 'Rubbermaid', 'Rubber'),
(10, 'Mallet', 'Ten pound mallet for bonking roadrunners on the head. Can also be used for bunny rabbits.', '/acme/images/products/mallet.png', '/acme/images/products/mallet-tn.png', '25.00', 100, 36, 10, 'Cedar Point, IA', 3, 'Wooden Creations', 'Wood'),
(11, 'TNT', 'The biggest bang for your buck with our nitro-based TNT. Price is per stick.', '/acme/images/products/tnt.png', '/acme/images/products/tnt-tn.png', '10.00', 1000, 25, 2, 'San Jose', 2, 'Nobel Enterprises', 'Plastic'),
(12, 'Roadrunner Custom Bird Seed Mix', 'Our best varmint seed mix - varmints on two or four legs can\'t resist this mix. Contains meat, nuts, cereals and our own special ingredient. Guaranteed to bring them in. Can be used with our monster trap.', '/acme/images/products/seed.jpg', '/acme/images/products/seed-tn.jpg', '8.00', 150, 24, 3, 'San Jose', 5, 'Acme', 'Plastic'),
(13, 'Grand Piano', 'This grand piano is guaranteed to play well and smash anything beneath it if dropped from a height.', '/acme/images/products/piano.jpg', '/acme/images/products/piano-tn.jpg', '3500.00', 36, 500, 1200, 'Cedar Point, IA', 3, 'Wulitzer', 'Wood'),
(14, 'Crash Helmet', 'This carbon fiber and plastic helmet is the ultimate in protection for your head. comes in assorted colors.', '/acme/images/products/helmet.png', '/acme/images/products/helmet-tn.png', '100.00', 25, 48, 9, 'San Jose', 3, 'Suzuki', 'Carbon Fiber'),
(15, 'Nylon Rope', 'This nylon rope is ideal for all uses. Each rope is the highest quality nylon and comes in 100 foot lengths.', '/acme/images/products/rope.jpg', '/acme/images/products/rope-tn.jpg', '15.00', 200, 200, 6, 'San Jose', 3, 'Marina Sales', 'Nylon'),
(16, 'Sticky Fence', 'This fence is covered with Gorilla Glue and is guaranteed to stick to anything that touches it and is sure to hold it tight.', '/acme/images/products/fence.png', '/acme/images/products/fence-tn.png', '75.00', 15, 48, 2, 'San Jose', 3, 'Acme', 'Nylon'),
(17, 'Small Bomb', 'Bomb with a fuse - A little old fashioned, but highly effective. This bomb has the ability to devistate anything within 30 feet.', '/acme/images/products/bomb.png', '/acme/images/products/bomb-tn.png', '275.00', 58, 30, 12, 'San Jose', 2, 'Nobel Enterprises', 'Metal');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(10) UNSIGNED NOT NULL,
  `reviewText` text NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invId` int(10) UNSIGNED NOT NULL,
  `clientId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(1, 'Wow, I&#39;m impressed!', '2019-04-10 22:58:12', 11, 11),
(2, 'It&#39;s Amazing!', '2019-04-10 23:01:26', 6, 11),
(3, 'Fantastic', '2019-04-10 23:04:55', 7, 11),
(4, 'Best ever', '2019-04-10 23:06:24', 17, 11),
(5, 'Weighs a ton', '2019-04-11 19:01:31', 13, 11),
(6, 'Weights a LOT', '2019-04-11 19:14:15', 13, 11),
(7, 'Weights a LOT', '2019-04-11 19:15:28', 13, 11),
(8, 'very useful', '2019-04-11 19:15:45', 15, 11),
(9, 'This comes with more rope than I expected!', '2019-04-11 19:20:41', 15, 11),
(10, 'great for hitting', '2019-04-11 19:23:12', 10, 11),
(11, 'smashing', '2019-04-11 19:24:21', 10, 11),
(12, 'big hammer', '2019-04-11 19:25:36', 10, 11),
(14, 'Black hole ', '2019-04-11 19:47:28', 6, 11),
(15, 'giant rubber band works great', '2019-04-11 19:51:31', 9, 11),
(17, 'Smash it with a hammer!', '2019-04-11 20:28:53', 10, 11),
(18, 'great wall', '2019-04-11 20:32:16', 16, 11),
(19, 'fast', '2019-04-11 20:33:48', 1, 11),
(20, 'boom goes the dynamite', '2019-04-11 20:36:00', 11, 11),
(21, 'Light is trapped', '2019-04-11 21:42:26', 6, 11),
(22, 'GOAT', '2019-04-11 21:44:50', 6, 11),
(23, 'This thing is incredible!', '2019-04-11 21:47:48', 6, 11),
(24, 'Gweat fow Getting Wabbits', '2019-04-11 22:37:21', 6, 10),
(28, 'Howdy Partner!!!', '2019-04-11 22:48:58', 13, 10),
(29, 'sups heav', '2019-04-11 22:50:51', 13, 10),
(31, 'work', '2019-04-11 22:54:47', 13, 10),
(33, 'fat book', '2019-04-11 22:59:28', 9, 10),
(34, 'fat book oh yeah', '2019-04-11 23:00:14', 9, 10),
(35, 'big fence', '2019-04-11 23:00:27', 16, 10),
(39, 'NO INFO', '2019-04-11 23:17:58', 7, 10),
(40, 'Big bang', '2019-04-11 23:18:50', 2, 10),
(41, 'heavy', '2019-04-11 23:20:19', 2, 10),
(42, 'expensive', '2019-04-11 23:21:02', 2, 10),
(43, 'oh yeha', '2019-04-11 23:22:11', 2, 10),
(45, 'tastes good too', '2019-04-12 01:42:55', 12, 10),
(46, 'Do not attempt to ride.', '2019-04-12 01:46:50', 1, 10),
(47, 'Nice and sturdy!!! Five Stars!', '2019-04-12 01:49:56', 14, 10),
(48, 'I can barely lift this thing!', '2019-04-12 09:30:12', 10, 14),
(49, 'You can take a real blow to the head while wearing this.  Highly recommend.', '2019-04-12 23:15:53', 14, 16),
(50, 'The different color options make me look quite stylish while riding my motorcycle.', '2019-04-12 23:24:07', 14, 14),
(51, 'Mine was good while it lasted it, but I had to run and left it somewhere... ', '2019-04-12 23:25:40', 14, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`),
  ADD UNIQUE KEY `clientEmail` (`clientEmail`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `FOREIGN` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `FK_1` (`invId`),
  ADD KEY `FK_2` (`clientId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_image` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews_clients` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reviews_inventory` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
