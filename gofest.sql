-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  ven. 16 fév. 2018 à 18:27
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `gofest`
--

-- --------------------------------------------------------

--
-- Structure de la table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `artist`
--

INSERT INTO `artist` (`id`, `name`) VALUES
(1, 'Ozzy Osbourne'),
(2, 'Marilyn Manson'),
(3, 'Foo Fighters'),
(4, 'Guns N\' Roses'),
(5, 'The Offspring'),
(6, 'Bears\' Den'),
(7, 'David August'),
(8, 'Her'),
(9, 'Ibeyi'),
(10, 'Lewis Capaldi'),
(11, 'Hardwell'),
(12, 'Steve Aoki'),
(13, 'Fatboy Slim'),
(14, 'Martin Garrix'),
(15, 'Axwell'),
(16, 'Aldous Harding'),
(17, 'Gurr'),
(18, 'Ama Lou'),
(19, 'Benjamin Clementine'),
(20, 'Between Mountains'),
(21, 'The Weeknd'),
(22, 'Beyoncé'),
(23, 'Eminem'),
(24, 'Kygo'),
(25, 'Post Malone'),
(26, 'Skrillex'),
(27, 'MGMT'),
(28, 'N.E.R.D'),
(29, 'Kendrick Lamar'),
(30, 'Jack Johnson'),
(31, 'Ziggy Marley'),
(32, 'Fever Ray'),
(33, 'Alice Merton'),
(34, 'Slaves'),
(35, 'Bombers'),
(36, 'The XX'),
(37, 'Queens of the Stone Age'),
(38, 'Royal Blood'),
(39, 'LCD Soundsystem'),
(40, 'Haim'),
(41, 'The Killers'),
(42, 'Liam Gallagher'),
(43, 'Travis Scott'),
(44, 'Bastille'),
(45, 'The Vaccines'),
(46, 'Depeche mode'),
(47, 'Jain'),
(48, 'Gorillaz'),
(49, 'Massive Attack'),
(50, 'Robert Plant'),
(51, 'Arctic Monkeys'),
(52, 'Lorde'),
(53, 'Alabama Shakes'),
(54, 'Die Antwoord'),
(55, 'Muse'),
(56, 'Tegan and Sara'),
(57, 'Alesso'),
(58, 'Loco Dice'),
(59, 'Paul Van Dyk'),
(60, 'Judas Priest'),
(61, 'Deftones'),
(62, 'Iron Maiden'),
(63, 'Nightwish'),
(64, 'Fall Out Boy'),
(65, 'Sum 41'),
(66, 'Kings of Leon'),
(67, 'Black Tiger Sex Machine'),
(68, 'Video Girl'),
(69, 'Tone Depth'),
(70, 'Joachim Pastor'),
(71, 'Binocle'),
(72, 'Red Hot Chili Peppers'),
(73, 'Imagine Dragons'),
(74, 'Lana Del Rey'),
(75, 'Camille'),
(76, 'David Guetta'),
(77, 'Shaka Ponk'),
(78, 'IAM'),
(79, 'Afrojack'),
(80, 'DVBBS'),
(81, 'Vini Vici'),
(82, 'Yellow Claw');

-- --------------------------------------------------------

--
-- Structure de la table `concert`
--

CREATE TABLE `concert` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `festival_id` int(11) NOT NULL,
  `concert_reference` int(11) DEFAULT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `isCancelled` tinyint(1) DEFAULT NULL,
  `isValid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `concert`
--

INSERT INTO `concert` (`id`, `artist_id`, `location_id`, `festival_id`, `concert_reference`, `title`, `start`, `end`, `isCancelled`, `isValid`) VALUES
(1, 1, 1, 1, NULL, 'Ozzy Osbourne @ Download', '2018-06-15 21:00:00', '2018-06-15 22:30:00', NULL, 1),
(2, 2, 1, 1, NULL, 'Marilyn Manson @ Download', '2018-06-16 21:00:00', '2018-06-16 22:30:00', NULL, 1),
(3, 3, 1, 1, NULL, 'Foo Fighters @ Download', '2018-06-17 21:00:00', '2018-06-17 22:30:00', NULL, 1),
(4, 4, 1, 1, NULL, 'Guns N\' Roses @ Download', '2018-06-18 21:00:00', '2018-06-18 22:30:00', NULL, 1),
(5, 5, 1, 1, NULL, 'The Offspring @ Download', '2018-06-16 18:00:00', '2018-06-16 19:30:00', NULL, 1),
(6, 6, 2, 2, NULL, 'Bears\' Den @ Reeperbahn Festival', '2018-09-21 20:00:00', '2018-09-21 22:00:00', NULL, 1),
(7, 7, 2, 2, NULL, 'David August @ Reeperbahn Festival', '2018-09-22 20:00:00', '2018-09-22 21:00:00', NULL, 1),
(8, 8, 2, 2, NULL, 'Her @ Reeperbahn Festival', '2018-09-19 19:00:00', '2018-09-19 21:30:00', NULL, 1),
(9, 9, 2, 2, NULL, 'Ibeyi @ Reeperbahn Festival', '2018-09-20 20:00:00', '2018-09-20 22:00:00', NULL, 1),
(10, 10, 2, 2, NULL, 'Lewis Capaldi @ Reeperbahn Festival', '2018-09-21 18:00:00', '2018-09-21 19:30:00', NULL, 1),
(11, 11, 3, 3, NULL, 'Hardwell @ Tomorrowland', '2018-07-20 16:30:00', '2018-07-20 17:30:00', NULL, 1),
(12, 12, 3, 3, NULL, 'Steve Aoki @ Tomorrowland', '2018-07-20 20:30:00', '2018-07-20 21:30:00', NULL, 1),
(13, 13, 3, 3, NULL, 'Fatboy Slim @ Tomorrowland', '2018-07-21 20:30:00', '2018-07-21 21:30:00', NULL, 1),
(14, 14, 3, 3, NULL, 'Martin Garrix @ Tomorrowland', '2018-07-22 20:30:00', '2018-07-22 21:30:00', NULL, 1),
(15, 15, 3, 3, NULL, 'Axwell @ Tomorrowland', '2018-07-21 21:00:00', '2018-07-21 22:30:00', NULL, 1),
(16, 16, 4, 4, NULL, 'Aldous Harding @ Iceland Airwaves', '2018-11-07 17:30:00', '2018-11-07 18:30:00', NULL, 1),
(17, 17, 4, 4, NULL, 'Gurr @ Iceland Airwaves', '2018-11-08 19:30:00', '2018-11-08 21:30:00', NULL, 1),
(18, 18, 4, 4, NULL, 'Ama Lou @ Iceland Airwaves', '2018-11-09 17:30:00', '2018-11-09 19:30:00', NULL, 1),
(19, 19, 4, 4, NULL, 'Benjamin Clementine @ Iceland Airwaves', '2018-11-10 20:00:00', '2018-11-10 21:30:00', NULL, 1),
(20, 20, 4, 4, NULL, 'Between Mountains @ Iceland Airwaves', '2018-11-11 17:30:00', '2018-11-11 18:30:00', NULL, 1),
(21, 21, 5, 5, NULL, 'The Weeknd @ Coachella', '2018-04-20 22:00:00', '2018-04-20 23:30:00', NULL, 1),
(22, 22, 5, 5, NULL, 'Beyoncé @ Coachella', '2018-04-21 21:00:00', '2018-04-21 22:30:00', NULL, 1),
(23, 23, 5, 5, NULL, 'Eminem @ Coachella', '2018-04-22 19:00:00', '2018-04-22 20:30:00', NULL, 1),
(24, 24, 5, 5, NULL, 'Kygo @ Coachella', '2018-04-20 17:00:00', '2018-04-20 18:30:00', NULL, 1),
(25, 25, 5, 5, NULL, 'Post Malone @ Coachella', '2018-04-21 16:00:00', '2018-04-21 18:30:00', NULL, 1),
(26, 26, 6, 6, NULL, 'Skrillex @ Fuji Rock', '2018-07-27 23:00:00', '2018-07-28 00:30:00', NULL, 1),
(27, 27, 6, 6, NULL, 'MGMT @ Fuji Rock', '2018-07-28 22:00:00', '2018-07-28 23:30:00', NULL, 1),
(28, 28, 6, 6, NULL, 'N.E.R.D @ Fuji Rock', '2018-07-29 19:00:00', '2018-07-29 20:30:00', NULL, 1),
(29, 29, 6, 6, NULL, 'Kendrick Lamar @ Fuji Rock', '2018-07-29 21:00:00', '2018-07-29 22:00:00', NULL, 1),
(30, 30, 6, 6, NULL, 'Jack Johnson @ Fuji Rock', '2018-07-28 17:30:00', '2018-07-28 19:30:00', NULL, 1),
(31, 31, 7, 7, NULL, 'Ziggy Marley @ Exit', '2018-07-12 21:00:00', '2018-07-12 22:00:00', NULL, 1),
(32, 32, 7, 7, NULL, 'Fever Ray @ Exit', '2018-07-13 18:00:00', '2018-07-13 19:00:00', NULL, 1),
(33, 33, 7, 7, NULL, 'Alice Merton @ Exit', '2018-07-14 21:30:00', '2018-07-14 22:30:00', NULL, 1),
(34, 34, 7, 7, NULL, 'Slaves @ Exit', '2018-07-15 19:00:00', '2018-07-15 20:30:00', NULL, 1),
(35, 35, 7, 7, NULL, 'Bombers @ Exit', '2018-07-13 20:30:00', '2018-07-13 22:00:00', NULL, 1),
(36, 36, 8, 8, NULL, 'The XX @ Splendour in the Grass', '2108-07-21 21:00:00', '2108-07-21 22:30:00', NULL, 1),
(37, 37, 8, 8, NULL, 'Queens of the Stone Age @ Splendour in the Grass', '2108-07-22 21:00:00', '2108-07-22 23:00:00', NULL, 1),
(38, 38, 8, 8, NULL, 'Royal Blood @ Splendour in the Grass', '2108-07-22 18:00:00', '2108-07-22 19:00:00', NULL, 1),
(39, 39, 8, 8, NULL, 'LCD Soundsystem @ Splendour in the Grass', '2108-07-23 20:00:00', '2108-07-23 22:00:00', NULL, 1),
(40, 40, 8, 8, NULL, 'Haim @ Splendour in the Grass', '2108-07-21 18:30:00', '2108-07-21 19:30:00', NULL, 1),
(41, 41, 11, 11, NULL, 'The Killers @ Benicàssim', '2018-07-19 20:00:00', '2018-07-19 21:30:00', NULL, 1),
(42, 42, 11, 11, NULL, 'Liam Gallagher @ Benicàssim', '2018-07-20 21:00:00', '2018-07-20 22:30:00', NULL, 1),
(43, 43, 11, 11, NULL, 'Travis Scott @ Benicàssim', '2018-07-21 18:00:00', '2018-07-21 20:30:00', NULL, 1),
(44, 44, 11, 11, NULL, 'Bastille @ Benicàssim', '2018-07-22 20:00:00', '2018-07-22 22:00:00', NULL, 1),
(45, 45, 11, 11, NULL, 'The Vaccines @ Benicàssim', '2018-07-20 18:30:00', '2018-07-20 19:30:00', NULL, 1),
(46, 46, 14, 14, NULL, 'Depeche mode @ Les Vieilles Charrues', '2018-07-19 21:00:00', '2018-07-19 22:30:00', NULL, 1),
(47, 47, 14, 14, NULL, 'Jain @ Les Vieilles Charrues', '2018-07-20 21:00:00', '2018-07-20 22:30:00', NULL, 1),
(48, 48, 14, 14, NULL, 'Gorillaz @ Les Vieilles Charrues', '2018-07-21 21:00:00', '2018-07-21 22:30:00', NULL, 1),
(49, 49, 14, 14, NULL, 'Massive Attack @ Les Vieilles Charrues', '2018-07-21 23:00:00', '2018-07-22 00:30:00', NULL, 1),
(50, 50, 14, 14, NULL, 'Robert Plant @ Les Vieilles Charrues', '2018-07-22 21:00:00', '2018-07-22 22:30:00', NULL, 1),
(51, 48, 15, 15, NULL, 'Gorillaz @ Rock Werchter', '2018-07-05 19:00:00', '2018-07-05 21:00:00', NULL, 1),
(52, 37, 15, 15, NULL, 'Queens of the Stone Age @ Rock Werchter', '2018-07-05 22:00:00', '2018-07-05 23:30:00', NULL, 1),
(53, 41, 15, 15, NULL, 'The Killers @ Rock Werchter', '2018-07-06 22:00:00', '2018-07-06 23:30:00', NULL, 1),
(54, 30, 15, 15, NULL, 'Jack Johnson @ Rock Werchter', '2018-07-07 19:00:00', '2018-07-07 20:30:00', NULL, 1),
(55, 51, 15, 15, NULL, 'Arctic Monkeys @ Rock Werchter', '2018-07-08 19:30:00', '2018-07-08 20:30:00', NULL, 1),
(56, 52, 16, 16, NULL, 'Lorde @ Osheaga', '2018-08-04 21:45:00', '2018-08-04 22:50:00', NULL, 1),
(57, 53, 16, 16, NULL, 'Alabama Shakes @ Osheaga', '2018-08-06 20:20:00', '2018-08-06 21:20:00', NULL, 1),
(58, 54, 16, 16, NULL, 'Die Antwoord @ Osheaga', '2018-08-06 20:20:00', '2018-08-06 21:20:00', NULL, 1),
(59, 55, 16, 16, NULL, 'Muse @ Osheaga', '2018-08-05 21:20:00', '2018-08-05 21:50:00', NULL, 1),
(60, 56, 16, 16, NULL, 'Tegan and Sara @ Osheaga', '2018-08-06 16:55:00', '2018-08-06 17:40:00', NULL, 1),
(61, 13, 17, 17, NULL, 'Fatboy Slim @ Mysteryland', '2018-08-24 20:00:00', '2018-08-24 21:00:00', NULL, 1),
(62, 11, 17, 17, NULL, 'Hardwell @ Mysteryland', '2018-08-25 22:00:00', '2018-08-25 23:30:00', NULL, 1),
(63, 57, 17, 17, NULL, 'Alesso @ Mysteryland', '2018-08-26 22:00:00', '2018-08-26 23:30:00', NULL, 1),
(64, 58, 17, 17, NULL, 'Loco Dice @ Mysteryland', '2018-08-25 19:00:00', '2018-08-25 20:30:00', NULL, 1),
(65, 59, 17, 17, NULL, 'Paul Van Dyk @ Mysteryland', '2018-08-24 18:00:00', '2018-08-24 20:00:00', NULL, 1),
(66, 60, 18, 18, NULL, 'Judas Priest @ Hellfest', '2018-06-22 19:30:00', '2018-06-22 21:00:00', NULL, 1),
(67, 61, 18, 18, NULL, 'Deftones @ Hellfest', '2018-06-23 19:30:00', '2018-06-23 21:00:00', NULL, 1),
(68, 62, 18, 18, NULL, 'Iron Maiden @ Hellfest', '2018-06-24 19:30:00', '2018-06-24 21:00:00', NULL, 1),
(69, 63, 18, 18, NULL, 'Nightwish @ Hellfest', '2018-06-24 20:45:00', '2018-06-24 22:00:00', NULL, 1),
(70, 2, 18, 18, NULL, 'Marilyn Manson @ Hellfest', '2018-06-24 21:30:00', '2018-06-24 23:00:00', NULL, 1),
(71, 64, 19, 19, NULL, 'Fall Out Boy @ Reading Festival', '2018-08-24 21:30:00', '2018-08-24 23:00:00', NULL, 1),
(72, 25, 19, 19, NULL, 'Post Malone @ Reading Festival', '2018-08-24 19:30:00', '2018-08-24 21:00:00', NULL, 1),
(73, 29, 19, 19, NULL, 'Kendrick Lamar @ Reading Festival', '2018-08-25 19:30:00', '2018-08-25 21:00:00', NULL, 1),
(74, 65, 19, 19, NULL, 'Sum 41 @ Reading Festival', '2018-08-25 17:30:00', '2018-08-25 19:00:00', NULL, 1),
(75, 66, 19, 19, NULL, 'Kings of Leon @ Reading Festival', '2018-08-26 21:30:00', '2018-08-26 23:00:00', NULL, 1),
(76, 67, 20, 20, NULL, 'Black Tiger Sex Machine @ Igloofest', '2018-02-01 21:45:00', '2018-02-01 23:00:00', NULL, 1),
(77, 68, 20, 20, NULL, 'Video Girl @ Igloofest', '2018-02-01 20:15:00', '2018-02-01 21:30:00', NULL, 1),
(78, 69, 20, 20, NULL, 'Tone Depth @ Igloofest', '2018-02-02 19:30:00', '2018-02-02 21:30:00', NULL, 1),
(79, 70, 20, 20, NULL, 'Joachim Pastor @ Igloofest', '2018-02-03 20:30:00', '2018-02-03 21:30:00', NULL, 1),
(80, 71, 20, 20, NULL, 'Binocle @ Igloofest', '2018-02-03 20:00:00', '2018-02-03 21:30:00', NULL, 1),
(81, 44, 21, 21, NULL, 'Bastille @ Sziget', '2018-08-09 18:00:00', '2018-08-09 19:00:00', NULL, 1),
(82, 51, 21, 21, NULL, 'Arctic Monkeys @ Sziget', '2018-08-14 20:00:00', '2018-08-14 21:30:00', NULL, 1),
(83, 42, 21, 21, NULL, 'Liam Gallagher @ Sziget', '2018-08-10 19:00:00', '2018-08-10 21:00:00', NULL, 1),
(84, 29, 21, 21, NULL, 'Kendrick Lamar @ Sziget', '2018-08-11 20:00:00', '2018-08-11 21:30:00', NULL, 1),
(85, 24, 21, 21, NULL, 'Kygo @ Sziget', '2018-08-12 19:00:00', '2018-08-12 21:00:00', NULL, 1),
(86, 72, 23, 23, NULL, 'Red Hot Chili Peppers @ Lollapalooza Chile', '2018-03-17 21:00:00', '2018-03-17 23:00:00', NULL, 1),
(87, 73, 23, 23, NULL, 'Imagine Dragons @ Lollapalooza Chile', '2018-03-17 19:00:00', '2018-03-17 21:00:00', NULL, 1),
(88, 39, 23, 23, NULL, 'LCD Soundsystem @ Lollapalooza Chile', '2018-03-16 19:00:00', '2018-03-16 21:00:00', NULL, 1),
(89, 41, 23, 23, NULL, 'The Killers @ Lollapalooza Chile', '2018-03-18 19:00:00', '2018-03-18 21:00:00', NULL, 1),
(90, 74, 23, 23, NULL, 'Lana Del Rey @ Lollapalooza Chile', '2018-03-18 20:00:00', '2018-03-18 21:30:00', NULL, 1),
(91, 47, 24, 24, NULL, 'Jain @ Solidays', '2018-06-22 22:00:00', '2018-06-22 23:15:00', NULL, 1),
(92, 75, 24, 24, NULL, 'Camille @ Solidays', '2018-06-22 18:00:00', '2018-06-22 19:30:00', NULL, 1),
(93, 76, 24, 24, NULL, 'David Guetta @ Solidays', '2018-06-23 23:00:00', '2018-06-24 00:30:00', NULL, 1),
(94, 77, 24, 24, NULL, 'Shaka Ponk @ Solidays', '2018-06-23 20:00:00', '2018-06-24 21:30:00', NULL, 1),
(95, 78, 24, 24, NULL, 'IAM @ Solidays', '2018-06-24 20:00:00', '2018-06-25 21:30:00', NULL, 1),
(96, 79, 25, 25, NULL, 'Afrojack @ Alfa Future People', '2018-08-12 22:00:00', '2018-08-12 23:30:00', NULL, 1),
(97, 12, 25, 25, NULL, 'Steve Aoki @ Alfa Future People', '2018-08-11 22:00:00', '2018-08-11 23:30:00', NULL, 1),
(98, 80, 25, 25, NULL, 'DVBBS @ Alfa Future People', '2018-08-12 19:00:00', '2018-08-12 20:30:00', NULL, 1),
(99, 81, 25, 25, NULL, 'Vini Vici @ Alfa Future People', '2018-08-10 19:00:00', '2018-08-10 20:30:00', NULL, 1),
(100, 82, 25, 25, NULL, 'Yellow Claw @ Alfa Future People', '2018-08-10 21:00:00', '2018-08-10 23:30:00', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `festival`
--

CREATE TABLE `festival` (
  `id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `festival_reference` int(11) DEFAULT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `budget` double DEFAULT NULL,
  `linkWebsite` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkFbEvent` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkFbPage` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkInstagram` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkTickets` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imageIcon` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imageBanner` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isCancelled` tinyint(1) DEFAULT NULL,
  `isSoldOut` tinyint(1) DEFAULT NULL,
  `isValid` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `festival`
--

INSERT INTO `festival` (`id`, `location_id`, `genre_id`, `festival_reference`, `title`, `description`, `start`, `end`, `budget`, `linkWebsite`, `linkFbEvent`, `linkFbPage`, `linkInstagram`, `linkTickets`, `imageIcon`, `imageBanner`, `isCancelled`, `isSoldOut`, `isValid`) VALUES
(1, 1, 1, NULL, 'Download', 'Download Festival is a rock festival. It is a popular summer rock and heavy metal festival and has hosted some of the genres\' biggest names, including Black Sabbath, Slipknot, Metallica, Iron Maiden, Motörhead, Aerosmith, AC/DC, and Guns N\' Roses.', '2018-06-08', '2018-06-10', 69, 'http://www.downloadfestival.fr/en', 'https://www.facebook.com/pg/DownloadFestivalFR/events/', 'https://www.facebook.com/DownloadFestivalFR', 'https://www.instagram.com/downloadfestfr/', 'http://www.downloadfestival.fr/fr/billets', 'http://www.deadpress.co.uk/wp-content/uploads/2016/06/downloadfestival_logo-300x300.jpg', 'https://cdn.2017bestnine.com/user_images/downloadfestfr.jpg', NULL, NULL, 1),
(2, 2, 2, NULL, 'Reeperbahn Festival', 'The Reeperbahn Festival is a music festival held in Hamburg, Germany over 4 days at the end of September.', '2018-09-19', '2018-09-23', 99, 'http://www.reeperbahnfestival.com', 'https://www.facebook.com/events/165917984004747/', 'https://www.facebook.com/reeperbahnfestival/', 'https://www.instagram.com/reeperbahn_festival/', 'https://www.reeperbahnfestival.com/en/tickets', 'https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/16864557_1276073765846890_1246899853149261249_n.png?oh=3107e54e3468a5d58c61eb4e1ba779e2&oe=5AB20A60', 'https://2017bestnine.s3-us-west-2.amazonaws.com/user_images/reeperbahn_festival.jpg', NULL, NULL, 1),
(3, 3, 3, NULL, 'Tomorrowland', 'Tomorrowland is an electronic dance music festival held in Boom, Belgium. Tomorrowland was first held in 2005, and has since become one of the world\'s largest and most notable music festivals.', '2018-07-20', '2018-07-22', 90, 'https://www.tomorrowland.com/global/', 'https://www.facebook.com/pg/tomorrowland/events/', 'https://www.facebook.com/tomorrowland/', 'https://www.instagram.com/tomorrowland/', 'https://www.tomorrowland.com/en/festival/tickets', 'https://i.imgur.com/tFsTptQ.png', 'https://2017bestnine.s3-us-west-2.amazonaws.com/user_images/tomorrowland.jpg', NULL, NULL, 1),
(4, 4, 2, NULL, 'Iceland Airwaves', 'Iceland Airwaves is an annual music festival held in Reykjavík, Iceland in early November.\nThe festival spans five days (Wednesday - Sunday) and its main focus is showcasing new music, both Icelandic and international. The festival\'s main sponsors ar', '2018-11-07', '2018-11-10', 115, 'http://icelandairwaves.is/', 'https://www.facebook.com/pg/icelandairwavesfestival/events/?ref=page_internal', 'https://www.facebook.com/icelandairwavesfestival', 'https://www.instagram.com/icelandairwaves/', 'http://icelandairwaves.is/ticket-info/', 'https://pbs.twimg.com/profile_images/930785586218225664/-ETeh4gI.jpg', 'https://cdn.2017bestnine.com/user_images/icelandairwaves.jpg', NULL, NULL, 1),
(5, 5, 1, NULL, 'Coachella', 'The Coachella Valley Music and Arts Festival (commonly referred to as Coachella or the Coachella Festival) is an annual music and arts festival held at the Empire Polo Club in Indio, California, located in the Inland Empire\'s Coachella Valley in the ', '2018-04-20', '2018-04-22', 355, 'https://www.coachella.com/', 'https://www.facebook.com/pg/coachella/events/?ref=page_internal', 'https://www.facebook.com/coachella/', 'https://www.instagram.com/coachella/', 'https://www.coachella.com/guidebook/passes/', 'https://consequenceofsound.files.wordpress.com/2016/04/coachella.png', 'https://cdn.2017bestnine.com/user_images/coachella.jpg', NULL, NULL, 1),
(6, 6, 2, NULL, 'Fuji Rock', 'Fuji Rock Festival is an annual rock festival held in Naeba Ski Resort, in Niigata Prefecture, Japan. The three-day event, features more than 200 Japanese and international musicians, making it the largest outdoor music event in Japan.', '2018-07-27', '2018-07-29', 150, 'http://fujirock-eng.com/', 'https://www.facebook.com/pg/fujirockfestival/events/?ref=page_internal', 'https://www.facebook.com/fujirockfestival', 'https://www.instagram.com/fujirock_jp/', 'http://fujirock-eng.com/ticket.html', 'https://s3-eu-west-1.amazonaws.com/skiddlecdn-images-listings/festivals/7368_1504103073_fest.jpg', 'https://cdn.2017bestnine.com/user_images/fujirock_jp.jpg', NULL, NULL, 1),
(7, 7, 2, NULL, 'Exit', 'Exit is an award-winning summer music festival which is held at the Petrovaradin Fortress in the city of Novi Sad, Serbia. It was officially proclaimed as the \'Best Major European festival\' at the EU Festival Awards, which were held in Groningen in J', '2018-07-12', '2018-07-15', 100, 'https://www.exitfest.org/en', 'https://www.facebook.com/pg/exit.festival/events/?ref=page_internal', 'https://www.facebook.com/exit.festival', 'https://www.instagram.com/exitfestival/', 'https://exitfest.org/en', 'https://s3-eu-west-1.amazonaws.com/skiddlecdn-images-listings/festivals/7075_1485773524_fest.jpg', 'https://2017bestnine.s3-us-west-2.amazonaws.com/user_images/exitfestival.jpg', NULL, NULL, 1),
(8, 8, 2, NULL, 'Splendour in the Grass', 'Splendour in the Grass is an Australian music festival that has been held annually since 2001. The festival has been held near Byron Bay, New South Wales for all but two years since its inauguration. ', '2018-07-20', '2018-07-22', 110, 'https://www.splendourinthegrass.com/', 'https://fr-fr.facebook.com/pg/splendourinthegrass/events/?ref=page_internal', 'https://fr-fr.facebook.com/splendourinthegrass/', 'https://www.instagram.com/splendourinthegrass/', 'https://www.splendourinthegrass.com/event-info/tickets/', 'https://consequenceofsound.files.wordpress.com/2017/03/splendour.jpg?quality=80&w=400&h=400&crop=1', 'https://cdn.2017bestnine.com/user_images/splendourinthegrass.jpg', NULL, NULL, 1),
(9, 9, 2, NULL, 'Mawazine', 'Mawazine is a music festival held annually in Rabat, Morocco, featuring many international and local music artists.', '2018-06-22', '2018-06-30', 150, 'http://www.festivalmawazine.ma/en/accueil/', 'https://www.facebook.com/pg/festivalmawazineofficiel/events/?ref=page_internal', 'https://www.facebook.com/festivalmawazineofficiel/', 'https://www.instagram.com/mawazine/', 'http://www.festivalmawazine.ma/16-ans-de-festival/billetterie-points-de-vente/tarification/', 'https://www.descubremarruecos.com/blog/wp-content/uploads/2015/05/Mawazine-rabat.jpg', 'https://2017bestnine.s3-us-west-2.amazonaws.com/user_images/mawazine.jpg', NULL, NULL, 1),
(10, 10, 2, NULL, 'Glastonbury', 'Glastonbury Festival is a five-day festival of contemporary performing arts that takes place near Pilton, Somerset, England. In addition to contemporary music, the festival hosts dance, comedy, theatre, circus, cabaret, and other arts.', '2019-06-26', '2019-06-30', 190, 'http://www.glastonburyfestivals.co.uk/', 'https://www.facebook.com/pg/glastonburyofficial/events/?ref=page_internal', 'https://www.facebook.com/glastonburyofficial/?ref=ts', '\nhttps://www.instagram.com/glastofest/?hl=fr', 'http://www.glastonburyfestivals.co.uk/information/tickets/', 'https://consequenceofsound.files.wordpress.com/2017/03/glasto.jpg?quality=80', 'https://2017bestnine.s3-us-west-2.amazonaws.com/user_images/glastofest.jpg', NULL, NULL, 1),
(11, 11, 2, NULL, 'Benicàssim', 'The Festival Internacional de Benicàssim, is an annual music festival which takes place in the town of Benicàssim, in the Valencian Community (Spain). It focuses mainly on pop, rock and electronica artists, as well as having other elements including ', '2018-07-19', '2018-07-22', 155, 'https://fiberfib.com/en/home.php', 'https://www.facebook.com/pg/fibfestival/events/?ref=page_internal', 'https://www.facebook.com/fibfestival/', 'https://www.instagram.com/fiberfib/', 'https://fiberfib.com/en/tickets/tickets-2.php', 'https://pbs.twimg.com/profile_images/344390781/fibface_400x400.gif', 'https://cdn.2017bestnine.com/user_images/fiberfib.jpg', NULL, NULL, 1),
(12, 12, 3, NULL, 'Burning Man', 'Burning Man is an annual gathering in the western United States at Black Rock City – a temporary city erected in the Black Rock Desert of northwest Nevada, approximately 100 miles (160 km) north-northeast of Reno. The late summer event is described a', '2018-08-26', '2018-09-03', 360, 'https://burningman.org/', 'https://fr-fr.facebook.com/pg/burningman/events/?ref=page_internal', 'https://fr-fr.facebook.com/burningman/', 'https://www.instagram.com/burningman/', 'https://tickets.burningman.org/', 'https://d31fr2pwly4c4s.cloudfront.net/5/2/7/826373_0_burning-man-2016_400.jpg', 'https://cdn.2017bestnine.com/user_images/burningman.jpg', NULL, NULL, 1),
(13, 13, 1, NULL, 'Rock en Seine', 'The Rock en Seine festival is a three-day rock music festival, held at Domaine National de Saint-Cloud, the Château de Saint-Cloud\'s park, west of Paris, inside the garden designed by André Le Nôtre.', '2018-08-24', '2018-08-26', 45, 'https://www.rockenseine.com/wait2018/', 'https://www.facebook.com/pg/rockenseine/events/?ref=page_internal', 'https://www.facebook.com/rockenseine?fref=ts', 'https://www.instagram.com/rockenseine/?hl=fr', 'https://www.rockenseine.com/wait2018/', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlwQGDqBXyOqhgX0FKjiBACnVSDDUEYy7GVO459aZUeOWao0Nm', 'https://cdn.2017bestnine.com/user_images/rockenseine.jpg', NULL, NULL, 1),
(14, 14, 2, NULL, 'Les Vieilles Charrues', 'The Vieilles Charrues Festival is held every year in mid-July in the city of Carhaix located in the west of Brittany, France. This festival is the largest music festival in France, attracting more than 200,000 festival-goers every year (270,000 in 20', '2018-07-19', '2018-07-22', 44, 'https://www.vieillescharrues.asso.fr/', 'https://www.facebook.com/pg/lesvieillescharruesofficiel/events/?ref=page_internal', 'https://www.facebook.com/lesvieillescharruesofficiel', 'instagram.com/vieillescharruesofficiel', 'https://www.vieillescharrues.asso.fr/billetterie/', 'http://www.emmadeschandol.com/wp-content/uploads/2015/09/vieilles-charrues.jpg', 'https://cdn.2017bestnine.com/user_images/vieillescharruesofficiel.jpg', NULL, NULL, 1),
(15, 15, 1, NULL, 'Rock Werchter', 'Rock Werchter is an annual music festival held in the village of Werchter, near Leuven, since 1976 and is a large sized annual rock music festival.', '2018-07-05', '2018-07-08', 102, 'https://www.rockwerchter.be/en/', 'https://www.facebook.com/pg/rockwerchterfestival/events/?ref=page_internal', 'https://www.facebook.com/rockwerchterfestival', 'https://www.instagram.com/rockwerchterfestival/', 'https://www.rockwerchter.be/en/tickets', 'http://d1marr3m5x4iac.cloudfront.net/images/edpborder500/I0-001/039/755/139-1.png_/rock-werchter-2018-sunday-39.png', 'https://2017bestnine.s3-us-west-2.amazonaws.com/user_images/rockwerchterfestival.jpg', NULL, NULL, 1),
(16, 16, 2, NULL, 'Osheaga', 'The Osheaga Music and Arts Festival is a multi-day indie music festival in Montreal, Quebec, that is held annually at Parc Jean-Drapeau on Île Sainte-Hélène every summer.', '2018-08-03', '2018-08-05', 75, 'https://www.osheaga.com/en', 'https://www.facebook.com/pg/osheaga/events/?ref=page_internal', 'https://www.facebook.com/osheaga', 'https://www.instagram.com/osheaga/', 'https://www.osheaga.com/en/passes', 'http://www.parcjeandrapeau.com/medias/images/visuals/festival_osheaga_musique_et_arts.jpg', 'https://cdn.2017bestnine.com/user_images/osheaga.jpg', NULL, NULL, 1),
(17, 17, 3, NULL, 'Mysteryland', 'Mysteryland is a series of electronic dance music festivals. Being the first of its kind in the country when it was established, its organizers have billed the event as the oldest dance music festival in the Netherlands. ', '2018-08-24', '2018-08-26', 75, 'http://www.mysteryland.nl/', 'https://www.facebook.com/pg/Mysteryland/events/?ref=page_internal', 'https://www.facebook.com/Mysteryland/', 'https://www.instagram.com/mysteryland_official/', 'http://tickets.mysteryland.nl/', 'https://pbs.twimg.com/profile_images/963370054665596929/iPl3KqAy_400x400.jpg', 'https://cdn.2017bestnine.com/user_images/mysteryland_official.jpg', NULL, NULL, 1),
(18, 18, 1, NULL, 'Hellfest', 'Hellfest, also called Hellfest Summer Open Air, is a French rock festival focusing on heavy metal music, held annually in June in Clisson in Loire-Atlantique. Its high attendance makes it the French music festival with the largest turnover. It is als', '2018-06-22', '2018-06-24', 95, 'https://www.hellfest.fr/content/hellfest-landing', 'https://www.facebook.com/pg/hellfest/events/?ref=page_internal', 'https://www.facebook.com/hellfest', 'https://www.instagram.com/hellfestopenair/', 'https://tickets.hellfest.fr/event/hellfest-2018/clisson-france/1151363', 'http://www.touslesfestivals.com/uploads/4cd66dfabbd964f8c6c4414b07cdb45dae692e19/55602b4260bde2d02869fedb047d6a59ceeca480.png', 'https://2017bestnine.s3-us-west-2.amazonaws.com/user_images/hellfestopenair.jpg', NULL, NULL, 1),
(19, 19, 2, NULL, 'Reading Festival', 'The Reading and Leeds Festivals are a pair of annual rock music festivals that take place in Reading and Leedsin England. The events take place simultaneously on the Friday, Saturday and Sunday of the August bank holidayweekend, sharing the same bill', '2018-08-24', '2018-08-26', 85, 'https://www.readingfestival.com/', 'https://www.facebook.com/pg/OfficialReadingFestival/events/?ref=page_internal', 'https://www.facebook.com/OfficialReadingFestival', 'https://www.instagram.com/officialrandl/', 'https://www.readingfestival.com/information-category/tickets/', 'https://s3-eu-west-1.amazonaws.com/skiddlecdn-images-listings/festivals/3597_1506695650_fest.jpg', 'https://2017bestnine.s3-us-west-2.amazonaws.com/user_images/officialrandl.jpg', NULL, NULL, 1),
(20, 20, 3, NULL, 'Igloofest', 'Igloofest is an annual outdoor music festival which takes place at the Old Port of Montreal in Montreal, Quebec, Canada. Co-produced by Piknic Electronik and the Quays of the Old Port, it began in January 2007 and now draws crowds in the tens of thou', '2018-02-01', '2018-02-03', 100, 'https://igloofest.ca/', 'https://fr-fr.facebook.com/pg/igloofest/events/?ref=page_internal', 'https://fr-fr.facebook.com/igloofest/', 'https://www.instagram.com/igloofest_mtl/', 'https://igloofest.ca/achat-en-ligne/', 'http://cdn.oboxeditions.com/sites/prod/files/styles/gallery/public/pictures/igloofest-821-169231.jpg', 'https://cdn.2017bestnine.com/user_images/igloofest_mtl.jpg', NULL, NULL, 1),
(21, 21, 2, NULL, 'Sziget', 'The Sziget Festival is one of the largest music and cultural festivals in Europe. It is held every August in northern Budapest, Hungary, on Óbudai-sziget (\"Old Buda Island\"), a leafy 108-hectare (266-acre) island on the Danube. More than 1,000 perfor', '2018-08-08', '2018-08-15', 70, 'https://en.szigetfestival.com/', 'https://www.facebook.com/pg/SzigetFestival/events/?ref=page_internal', 'https://www.facebook.com/SzigetFestival/', 'https://www.instagram.com/szigetofficial/', 'https://en.szigetfestival.com/tickets/category/entry-ticket', 'https://d31fr2pwly4c4s.cloudfront.net/3/5/8/772092_0_sziget-festival-2016_400.jpg', 'https://2017bestnine.s3-us-west-2.amazonaws.com/user_images/szigetofficial.jpg', NULL, NULL, 1),
(22, 22, 4, NULL, 'Rainforest World Music Festival', 'The Rainforest World Music Festival is an annual three-day music festival celebrating the diversity of world music, held in Kuching, Sarawak, Malaysia, with daytime music workshops, cultural displays, craft displays, food stalls, and main-stage eveni', '2018-07-13', '2018-07-15', 20, 'http://rwmf.net/', 'https://www.facebook.com/pg/rwmf.official/events/?ref=page_internal', 'https://www.facebook.com/rwmf.official/', 'https://www.instagram.com/sarawaktravel/', 'http://rwmf.net/tickets/', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkIqAsSlFwx5YD-4OfWa7trys9dTG4tzxmXVfEGRHMSwlAcpsB2g', 'https://cdn.2017bestnine.com/user_images/sarawaktravel.jpg', NULL, NULL, 1),
(23, 23, 2, NULL, 'Lollapalooza Chile', 'Lollapalooza Chile is a South American outpost of the legendary Lollapalooza festival series in Santiago. The festival is world renowned for presenting some of the biggest names in all genres of popular music.', '2018-03-16', '2018-03-18', 100, 'https://www.lollapaloozacl.com/', 'https://www.facebook.com/pg/lollapaloozachile/events/?ref=page_internal', 'https://www.facebook.com/lollapaloozachile', 'https://www.instagram.com/lollapaloozacl/', 'https://www.lollapaloozacl.com/tickets/', 'http://d1marr3m5x4iac.cloudfront.net/images/block250/I0-001/039/667/106-9.png_/lollapalooza-chile-2018-06.png', 'https://cdn.2017bestnine.com/user_images/lollapaloozacl.jpg', NULL, NULL, 1),
(24, 24, 2, NULL, 'Solidays', 'The Solidays music festival is an annual solidarity event that takes place at the Longchamp Racecourse in France. Organized by Solidarité sida, the event brings together more than 150 artists and 170 000 festival-goers for three days.', '2018-06-22', '2018-06-24', 45, 'http://www.solidays.org/', 'https://fr-fr.facebook.com/pg/FestivalSolidays/events/?ref=page_internal', 'https://fr-fr.facebook.com/FestivalSolidays/', 'https://www.instagram.com/solidays/', 'http://www.solidays.org/infos-pratiques/billetterie/', 'http://www.parisetudiant.com/uploads/assets/evenements/recto_fiche/2017/06/42468_festival-solidays.png', 'https://cdn.2017bestnine.com/user_images/solidays.jpg', NULL, NULL, 1),
(25, 25, 3, NULL, 'Alfa Future People', 'Alfa Future People is a huge EDM and dance music festival in Russia. The lineup covers everything from stadium house to bass, with AFP creating some of the most impressive staging around.\nExpect some of the biggest DJs in the world, with full-throttl', '2018-08-10', '2018-08-12', 70, 'https://afp.ru/', 'https://www.facebook.com/pg/alfafuture/events/?ref=page_internal', 'https://www.facebook.com/alfafuture', 'http://instagram.com/alfafuturepeople', 'https://tickets.afp.ru/?_ga=2.168575585.1724827072.1518778720-814430576.1518778720', 'http://www.clubbinghouse.com/images/photos/lieux/alfafuturepeople_26042017111755.jpg', 'https://cdn.2017bestnine.com/user_images/alfafuturepeople.jpg', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Rock'),
(2, 'General'),
(3, 'Electronic'),
(4, 'World');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id`, `name`, `address`, `latitude`, `longitude`) VALUES
(1, 'Download', 'Base Aérienne 217 Plessis-Pâté, France', 48.3546, 2.1955),
(2, 'Reeperbahn Festival', 'Reeperbahn, Hambourg, Allemagne', 53.5495698, 9.9626144),
(3, 'Tomorrowland', 'PRC de Schorre, Schommelei, 2850 Boom, Belgium', 51.08608, 4.36633),
(4, 'Iceland Airwaves', '101 Reykjavik, Islande', 64.1431613, -21.93752),
(5, 'Coachella', 'Empire Polo Club 81-800 Avenue 51, Indio, CA', 33.682329, -116.2389),
(6, 'Fuji Rock', 'Naeba Ski Resort, Yuzawa-cho, Niigata Pref', 36.789592, 138.78368),
(7, 'Exit', 'Exit Festival, Novi Sad, Serbie', 45.2522472, 19.86251949),
(8, 'Splendour in the Grass', 'North Byron Parklands, NSW', -28.4817672, 153.515322),
(9, 'Mawazine', 'Rabat, Maroc', 33.9715904, -6.849812),
(10, 'Glastonbury', 'Glastonbury Festival Site, Glastonbury, Royaume-Uni', 51.156002, -2.6131),
(11, 'Benicassim', 'FIB Festival international Benicassim, N-340, Benicàssim, Espagne', 40.0476248, 0.0474415),
(12, 'Burning Man', 'Burning Man, Nevada, États-Unis', 40.7886448, -119.20301),
(13, 'Rock en Seine', 'Domaine national de Saint-Cloud', 48.837714, 2.2167153),
(14, 'Les Vieilles Charrues', 'Dépendances de Persivien, 29800 Carhaix', 48.271149, -3.550575),
(15, 'Rock Werchter', 'Rock Werchter, Werchter, Belgique', 50.9680955, 4.68348089),
(16, 'Osheaga', 'Osheaga, Chemin Macdonald, Montréal, QC, Canada', 45.511526, -73.53314),
(17, 'Mysteryland', 'Paviljoenlaan 1, 2131 LZ Hoofddorp, Pays-Bas', 52.3296563, 4.6694704),
(18, 'Hellfest', 'Hellfest, Rue du Champ Louet, Clisson', 47.09717, -1.2712027),
(19, 'Reading Festival', 'Richfield Avenue, Reading, Royaume-Uni', 51.464204, -0.989361),
(20, 'Igloofest', 'Rue de la Commune E, Montréal, QC H3C, Canada', 45.507473, -73.54842),
(21, 'Sziget', 'Budapest, Óbudai-sziget, Hongrie', 47.551944, 19.054659),
(22, 'Rainforest', 'Sarawak Cultural Village Kuching', 1.7492316, 110.31646),
(23, 'Lolla Chile', 'Parque O`higgins, Santiago, Santiago, Chili', -33.460464, -70.65686),
(24, 'Longchamps', 'Hippodrome de Longchamp, Route des Tribunes, Paris', 48.8576958, 2.2337),
(25, 'Alfa Future People', 'Alfa Future People, Oblast de Nijni Novgorod, Russie', 56.4170559, 43.74408319),
(26, '11 Rue de Poissy', '11 Rue de Poissy, Paris, France', 48.8490723, 2.3526002),
(27, 'Neuilly Lab', 'Neuilly Lab, Avenue Charles de Gaulle, Neuilly-sur-Seine, France', 48.8835789, 2.2630624);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `wishlist_id` int(11) DEFAULT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `imageIcon` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `location_id`, `wishlist_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `imageIcon`) VALUES
(1, 26, 1, 'root', 'root', 'helene.telliez@gmail.com', 'helene.telliez@gmail.com', 1, NULL, '$2y$13$NpXHFZCOcEk9DhZAfxTHh.DqDI9JbdvLaL4zuVGItMBib69x7UKwq', '2018-02-16 18:21:12', 'Fyr7fA2LIRbkoJTQcXTsAYx2-8ybAoNATQ2e0_DqP5k', NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', NULL),
(2, 27, 2, 'demo', 'demo', 'test@gmail.com', 'test@gmail.com', 0, NULL, '$2y$13$Vfa1cinKFovutfu63Toq4.ZmqmKB7v75rmWnO.wm15YiSGUMWyF6K', NULL, '9xUrWRdBFtj3aDCUOzbgUU86DT8LVesT9-4Kihwkuus', NULL, 'a:0:{}', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `wishlist_artist`
--

CREATE TABLE `wishlist_artist` (
  `wishlist_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `wishlist_concert`
--

CREATE TABLE `wishlist_concert` (
  `wishlist_id` int(11) NOT NULL,
  `concert_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `wishlist_festival`
--

CREATE TABLE `wishlist_festival` (
  `wishlist_id` int(11) NOT NULL,
  `festival_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `wishlist_genre`
--

CREATE TABLE `wishlist_genre` (
  `wishlist_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `wishlist_location`
--

CREATE TABLE `wishlist_location` (
  `wishlist_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `concert`
--
ALTER TABLE `concert`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D57C02D2942937C1` (`concert_reference`),
  ADD KEY `IDX_D57C02D2B7970CF8` (`artist_id`),
  ADD KEY `IDX_D57C02D264D218E` (`location_id`),
  ADD KEY `IDX_D57C02D28AEBAF57` (`festival_id`);

--
-- Index pour la table `festival`
--
ALTER TABLE `festival`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_57CF789A27FCFEE` (`festival_reference`),
  ADD KEY `IDX_57CF78964D218E` (`location_id`),
  ADD KEY `IDX_57CF7894296D31F` (`genre_id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`),
  ADD UNIQUE KEY `UNIQ_8D93D649FB8E54CD` (`wishlist_id`),
  ADD KEY `IDX_8D93D64964D218E` (`location_id`);

--
-- Index pour la table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_9CE12A31A76ED395` (`user_id`);

--
-- Index pour la table `wishlist_artist`
--
ALTER TABLE `wishlist_artist`
  ADD PRIMARY KEY (`wishlist_id`,`artist_id`),
  ADD KEY `IDX_B26B49C1FB8E54CD` (`wishlist_id`),
  ADD KEY `IDX_B26B49C1B7970CF8` (`artist_id`);

--
-- Index pour la table `wishlist_concert`
--
ALTER TABLE `wishlist_concert`
  ADD PRIMARY KEY (`wishlist_id`,`concert_id`),
  ADD KEY `IDX_4A70D4A8FB8E54CD` (`wishlist_id`),
  ADD KEY `IDX_4A70D4A883C97B2E` (`concert_id`);

--
-- Index pour la table `wishlist_festival`
--
ALTER TABLE `wishlist_festival`
  ADD PRIMARY KEY (`wishlist_id`,`festival_id`),
  ADD KEY `IDX_B533637DFB8E54CD` (`wishlist_id`),
  ADD KEY `IDX_B533637D8AEBAF57` (`festival_id`);

--
-- Index pour la table `wishlist_genre`
--
ALTER TABLE `wishlist_genre`
  ADD PRIMARY KEY (`wishlist_id`,`genre_id`),
  ADD KEY `IDX_D7F55B00FB8E54CD` (`wishlist_id`),
  ADD KEY `IDX_D7F55B004296D31F` (`genre_id`);

--
-- Index pour la table `wishlist_location`
--
ALTER TABLE `wishlist_location`
  ADD PRIMARY KEY (`wishlist_id`,`location_id`),
  ADD KEY `IDX_EED11D3FFB8E54CD` (`wishlist_id`),
  ADD KEY `IDX_EED11D3F64D218E` (`location_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT pour la table `concert`
--
ALTER TABLE `concert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT pour la table `festival`
--
ALTER TABLE `festival`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `concert`
--
ALTER TABLE `concert`
  ADD CONSTRAINT `FK_D57C02D264D218E` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `FK_D57C02D28AEBAF57` FOREIGN KEY (`festival_id`) REFERENCES `festival` (`id`),
  ADD CONSTRAINT `FK_D57C02D2942937C1` FOREIGN KEY (`concert_reference`) REFERENCES `concert` (`id`),
  ADD CONSTRAINT `FK_D57C02D2B7970CF8` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`);

--
-- Contraintes pour la table `festival`
--
ALTER TABLE `festival`
  ADD CONSTRAINT `FK_57CF7894296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `FK_57CF78964D218E` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `FK_57CF789A27FCFEE` FOREIGN KEY (`festival_reference`) REFERENCES `festival` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D64964D218E` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `FK_8D93D649FB8E54CD` FOREIGN KEY (`wishlist_id`) REFERENCES `wishlist` (`id`);

--
-- Contraintes pour la table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `FK_9CE12A31A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `wishlist_artist`
--
ALTER TABLE `wishlist_artist`
  ADD CONSTRAINT `FK_B26B49C1B7970CF8` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B26B49C1FB8E54CD` FOREIGN KEY (`wishlist_id`) REFERENCES `wishlist` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `wishlist_concert`
--
ALTER TABLE `wishlist_concert`
  ADD CONSTRAINT `FK_4A70D4A883C97B2E` FOREIGN KEY (`concert_id`) REFERENCES `concert` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4A70D4A8FB8E54CD` FOREIGN KEY (`wishlist_id`) REFERENCES `wishlist` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `wishlist_festival`
--
ALTER TABLE `wishlist_festival`
  ADD CONSTRAINT `FK_B533637D8AEBAF57` FOREIGN KEY (`festival_id`) REFERENCES `festival` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B533637DFB8E54CD` FOREIGN KEY (`wishlist_id`) REFERENCES `wishlist` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `wishlist_genre`
--
ALTER TABLE `wishlist_genre`
  ADD CONSTRAINT `FK_D7F55B004296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D7F55B00FB8E54CD` FOREIGN KEY (`wishlist_id`) REFERENCES `wishlist` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `wishlist_location`
--
ALTER TABLE `wishlist_location`
  ADD CONSTRAINT `FK_EED11D3F64D218E` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_EED11D3FFB8E54CD` FOREIGN KEY (`wishlist_id`) REFERENCES `wishlist` (`id`) ON DELETE CASCADE;
