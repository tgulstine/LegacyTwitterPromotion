USE [negra]
-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2015 at 12:50 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `twitterapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `nm_config`
--

CREATE TABLE IF NOT EXISTS `nm_config` (
`Id` mediumint(9) NOT NULL,
  `ConfigKey` varchar(32) COLLATE utf8_bin NOT NULL,
  `ConfigValue` varchar(128) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nm_config`
--

INSERT INTO `nm_config` (`Id`, `ConfigKey`, `ConfigValue`) VALUES
(1, 'SearchTags', '#chicago'),
(2, 'TweetCount', '0');

-- --------------------------------------------------------

--
-- Table structure for table `trigger_information`
--

CREATE TABLE IF NOT EXISTS `trigger_information` (
  `TriggerLevel` int(11) NOT NULL,
  `PrizeDescription` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `trigger_information`
--

INSERT INTO `trigger_information` (`TriggerLevel`, `PrizeDescription`) VALUES
(50, 'NEGRA MODELO BOTTLE OPENER'),
(100, 'NEGRA MODELO GLASSWARE'),
(150, 'SIGNED COOKBOOKS'),
(200, 'NEGRA MODELO CUTTING BOARD');

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE IF NOT EXISTS `tweets` (
`Id` mediumint(9) NOT NULL,
  `TweetText` varchar(256) COLLATE utf8_bin NOT NULL,
  `TweetAuthor` varchar(64) COLLATE utf8_bin NOT NULL,
  `ProfileImageUrl` varchar(256) COLLATE utf8_bin NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`Id`, `TweetText`, `TweetAuthor`, `ProfileImageUrl`, `DateCreated`) VALUES
(1, 'New #job opening at Creative Circle in #Chicago - #SEO #Content Manager / Writer #jobs http://t.co/X33kuscFoE', 'NeuvooSEOUS', 'http://pbs.twimg.com/profile_images/537344339450425344/MbMDSbRf_normal.png', '2015-04-03 02:46:30'),
(2, 'RT @WeAreHipHopFest: SAVE THE DATE: AUGUST 8th 2015, @ElevarteStudio''s 10th Annual We Are Hip Hop Festival! #WeAreHipHop #Pilsen #Chicago h…', 'ElevarteStudio', 'http://pbs.twimg.com/profile_images/2921253277/1133f7882374d3ac3935d9cf00c5f073_normal.jpeg', '2015-04-03 02:46:33'),
(3, '😱😱 “@SPOTNEWSonIG: a person w/ a gun, everywhere.\n#Chicago”', 'DaKiddTP2', 'http://pbs.twimg.com/profile_images/578185171393994752/oKlXDMm-_normal.jpeg', '2015-04-03 02:46:42'),
(4, 'Just one more week with the #Jumamosi company of #BookofMormon here in #Chicago. Savoring every moment!', 'kgdwyer', 'http://pbs.twimg.com/profile_images/378800000781197355/52a6f651cfe44a57013b251d1da64053_normal.jpeg', '2015-04-03 02:46:46'),
(5, 'Deloitte is hiring a #Health #Plan Technology - Manager, apply now! (#Chicago) #jobs http://t.co/irsetB7JoO', 'NeuvooHeaChi', 'http://pbs.twimg.com/profile_images/578938289798811648/FUWxhYie_normal.png', '2015-04-03 02:46:46'),
(6, 'Domino''s Pizza is hiring! #Delivery #Driver(02712) - 2455 W Fullerton Ave in #Chicago, apply now! #jobs http://t.co/JWoqzfa1i3', 'NeuvooTraChi', 'http://pbs.twimg.com/profile_images/578937057596174336/qCnWHRs1_normal.png', '2015-04-03 02:46:46'),
(7, 'Deloitte is looking for a #Broad #Based Compensation Senior Consultant in #Chicago, apply now! #jobs http://t.co/m0n8q6QEJi', 'NeuvooHRChi', 'http://pbs.twimg.com/profile_images/570320558126927872/3Z-eygCO_normal.png', '2015-04-03 02:46:57'),
(8, 'You guys! Warm weather really is around the corner in #Chicago! @chgowatertaxi is back: http://t.co/byChXinvgz', 'ChicagoWonk', 'http://pbs.twimg.com/profile_images/458698041575239680/2jmNfuwO_normal.png', '2015-04-03 02:47:05'),
(9, 'Check out this #job: #Business #Development Associate at Zippy Shell in #Chicago #jobs http://t.co/zMhPOYW6g4', 'NeuvooSalChi', 'http://pbs.twimg.com/profile_images/570657408096022528/Q5MasGjW_normal.png', '2015-04-03 02:47:09'),
(10, '#IceHockey #Livescore @ScoresPro: (-NHL) #Chicago Blackhawks vs #Vancouver Canucks: 2-1 ...', 'ScoresProLive', 'http://pbs.twimg.com/profile_images/477438698322022401/C1OBtw65_normal.png', '2015-04-03 02:47:10'),
(11, 'CVS is looking for a #Retail #Store Shift Supervisor in #Chicago, apply now! #jobs http://t.co/FSO1qHcRkw http://t.co/4A7Ffllp2s', 'NeuvooRetChi', 'http://pbs.twimg.com/profile_images/578931666158247936/_PCYh3lK_normal.png', '2015-04-03 02:47:11'),
(12, 'Northrop Grumman Corporation is looking for a #Manager #Supply Chain Planning 3 - ATS in #Chicago, apply now! #jobs http://t.co/RPB0qi5u3j', 'NeuvooChicago', 'http://pbs.twimg.com/profile_images/539533737763954691/ksLjDZ3-_normal.png', '2015-04-03 02:47:16'),
(13, 'RT alfonsoseiva: RT plussone: Viernes 3 de Abril: #Caravana43 #Ayotzinapa en #Chicago | https://t.co/lwp5bVLArM 6… http://t.co/7bZCTYkuzi', 'AyotzinapaFeed', 'http://pbs.twimg.com/profile_images/531987950616064000/rPSn1nRf_normal.jpeg', '2015-04-03 02:47:18'),
(14, 'RT MorenaIllinois: RT plussone: Viernes 3 de Abril: #Caravana43 #Ayotzinapa en #Chicago | https://t.co/lwp5bVLArM… http://t.co/7bZCTYkuzi', 'AyotzinapaFeed', 'http://pbs.twimg.com/profile_images/531987950616064000/rPSn1nRf_normal.jpeg', '2015-04-03 02:47:18'),
(15, 'RT balamkitze77: RT plussone: Viernes 3 de Abril: #Caravana43 #Ayotzinapa en #Chicago | https://t.co/lwp5bVLArM 6… http://t.co/7bZCTYkuzi', 'AyotzinapaFeed', 'http://pbs.twimg.com/profile_images/531987950616064000/rPSn1nRf_normal.jpeg', '2015-04-03 02:47:19'),
(16, 'http://t.co/0977bm8ozN #NewYorkCity #Chicago #Dallas #Houston #philadelphia #Atlanta #Boston http://t.co/JCWuyzBgGN . 03.04 04:47', 'DHEdomains', 'http://pbs.twimg.com/profile_images/577942484556341248/_g5nJ4pX_normal.jpeg', '2015-04-03 02:47:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nm_config`
--
ALTER TABLE `nm_config`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
 ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nm_config`
--
ALTER TABLE `nm_config`
MODIFY `Id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
MODIFY `Id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;