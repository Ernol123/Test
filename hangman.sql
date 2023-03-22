-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 18 Lut 2023, 22:16
-- Wersja serwera: 8.0.31
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `hangman`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `score` int NOT NULL,
  `word_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `players`
--

INSERT INTO `players` (`id`, `nickname`, `score`, `word_id`) VALUES
(25, 'fsd', 100, 97),
(26, 'sf', 209, 97),
(27, 'dsf', 123, 97),
(28, 'fwe', 67, 97);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `words`
--

DROP TABLE IF EXISTS `words`;
CREATE TABLE IF NOT EXISTS `words` (
  `id` int NOT NULL AUTO_INCREMENT,
  `word` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `words`
--

INSERT INTO `words` (`id`, `word`) VALUES
(2, 'łopata'),
(3, 'kiełbasa'),
(4, 'samochód'),
(5, 'kanapka'),
(6, 'baran'),
(7, 'programista'),
(8, 'komputer'),
(9, 'zegarek'),
(10, 'telefon'),
(11, 'apartament'),
(12, 'sołtys'),
(13, 'prześladowanie'),
(14, 'antykoncepcja'),
(15, 'helikopter'),
(16, 'nabuchodonozor'),
(17, 'słoń'),
(18, 'świnia'),
(19, 'żyrafa'),
(20, 'osioł'),
(21, 'narciarz'),
(22, 'onomatopeja'),
(23, 'woźnica'),
(24, 'chrystus'),
(25, 'zbawiciel'),
(26, 'łóżko'),
(27, 'kinematografia'),
(28, 'przerębel'),
(29, 'ciężarówka'),
(30, 'magistrala'),
(31, 'belzebub'),
(32, 'siłownia'),
(33, 'nożyczki'),
(34, 'obwarzanek'),
(35, 'gniazdo'),
(36, 'ołówek'),
(37, 'gęś'),
(38, 'wieloryb'),
(39, 'alkoholizm'),
(40, 'polak'),
(41, 'wschód'),
(42, 'monitor'),
(43, 'klawiatura'),
(44, 'interpreter'),
(45, 'kompilator'),
(46, 'przedłużacz'),
(47, 'watomierz'),
(48, 'piorunochron'),
(49, 'spadochron'),
(50, 'węgry'),
(51, 'elementarz'),
(52, 'cmentarz'),
(53, 'polar'),
(54, 'ernest'),
(55, 'jamajka'),
(56, 'seler'),
(57, 'pszczoła'),
(58, 'marchewka'),
(59, 'cebula'),
(60, 'ogórek'),
(61, 'grzejnik'),
(62, 'aparat'),
(63, 'kamień'),
(64, 'projektor'),
(65, 'ładowarka'),
(66, 'butelka'),
(67, 'dywan'),
(68, 'pomarańcza'),
(69, 'wiaderko'),
(70, 'krowa'),
(71, 'pasztet'),
(72, 'skarbonka'),
(73, 'holandia'),
(74, 'diabeł'),
(75, 'anioł'),
(76, 'przeglądarka'),
(77, 'wyszukiwarka'),
(78, 'kreskówka'),
(79, 'szwajcaria'),
(80, 'wisielec'),
(81, 'zasilacz'),
(82, 'samolot'),
(83, 'śmigłowiec'),
(84, 'czołgista'),
(85, 'rzeczoznawca'),
(86, 'kierownik'),
(87, 'dziecko'),
(88, 'odbiornik'),
(89, 'żydzi'),
(90, 'petardy'),
(91, 'fajerwerki'),
(92, 'fotowoltaika'),
(93, 'szuflada'),
(94, 'pieniądze'),
(95, 'piżama'),
(96, 'garderoba'),
(97, 'motorówka'),
(98, 'matematyka'),
(99, 'błogosławieństwo'),
(100, 'sułtan');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
