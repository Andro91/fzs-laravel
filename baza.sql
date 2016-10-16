-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2016 at 11:21 AM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fzs`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivni_ispitni_rokovi`
--

DROP TABLE IF EXISTS `aktivni_ispitni_rokovi`;
CREATE TABLE IF NOT EXISTS `aktivni_ispitni_rokovi` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rok_id` int(11) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pocetak` date NOT NULL,
  `kraj` date NOT NULL,
  `tipRoka_id` int(11) NOT NULL,
  `komentar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `indikatorAktivan` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aktivni_ispitni_rokovi`
--

INSERT INTO `aktivni_ispitni_rokovi` (`id`, `rok_id`, `naziv`, `pocetak`, `kraj`, `tipRoka_id`, `komentar`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, 5, 'sssss', '2016-09-01', '2016-09-30', 1, '', 0, '2016-10-06 05:34:31', '2016-10-06 05:34:31'),
(2, 5, 'Вежбање у парку', '2016-10-06', '2016-10-29', 1, 'uuuuuu', 1, '2016-10-06 05:34:56', '2016-10-06 05:34:56');

-- --------------------------------------------------------

--
-- Table structure for table `arhiv_indeksa`
--

DROP TABLE IF EXISTS `arhiv_indeksa`;
CREATE TABLE IF NOT EXISTS `arhiv_indeksa` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `indeks` int(11) NOT NULL,
  `tipStudija_id` int(11) NOT NULL,
  `skolskaGodinaUpisa_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `arhiv_indeksa`
--

INSERT INTO `arhiv_indeksa` (`id`, `indeks`, `tipStudija_id`, `skolskaGodinaUpisa_id`, `created_at`, `updated_at`) VALUES
(1, 88, 1, 1, '2016-09-01 06:30:48', '2016-10-12 08:40:25'),
(2, 8, 2, 1, '2016-10-02 16:33:13', '2016-10-13 09:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `bodovanje`
--

DROP TABLE IF EXISTS `bodovanje`;
CREATE TABLE IF NOT EXISTS `bodovanje` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `poeniMax` int(11) DEFAULT NULL,
  `poeniMin` int(11) DEFAULT NULL,
  `ocena` int(11) DEFAULT NULL,
  `opisnaOcena` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indikatorAktivan` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bodovanje`
--

INSERT INTO `bodovanje` (`id`, `poeniMax`, `poeniMin`, `ocena`, `opisnaOcena`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, 100, 91, 10, 'изузетан', 1, '2016-08-29 20:03:53', '2016-09-25 13:56:06'),
(2, 90, 81, 9, 'одличан', 1, '2016-08-29 20:03:53', '2016-09-25 13:56:27'),
(3, 80, 71, 8, 'врло добар', 1, '2016-08-29 20:03:53', '2016-09-25 13:56:56'),
(4, 70, 61, 7, 'добар', 1, '2016-09-25 13:57:24', '2016-09-25 13:57:24'),
(5, 60, 51, 6, 'довољан', 1, '2016-09-25 13:57:47', '2016-09-25 13:57:47'),
(6, 50, 0, 5, 'није положио', 1, '2016-09-25 13:58:10', '2016-09-25 13:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `diploma`
--

DROP TABLE IF EXISTS `diploma`;
CREATE TABLE IF NOT EXISTS `diploma` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kandidat_id` int(11) DEFAULT NULL,
  `datumOdbrane` datetime DEFAULT NULL,
  `broj` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lice` int(11) DEFAULT NULL,
  `funkcija` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diplomski_rad`
--

DROP TABLE IF EXISTS `diplomski_rad`;
CREATE TABLE IF NOT EXISTS `diplomski_rad` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kandidat_id` int(11) DEFAULT NULL,
  `predmet_id` int(11) DEFAULT NULL,
  `mentor_id` int(11) DEFAULT NULL,
  `predsednik_id` int(11) DEFAULT NULL,
  `clan_id` int(11) DEFAULT NULL,
  `ocenaOpis` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ocenaBroj` double DEFAULT NULL,
  `datumPrijave` datetime DEFAULT NULL,
  `datumOdbrane` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `godina_studija`
--

DROP TABLE IF EXISTS `godina_studija`;
CREATE TABLE IF NOT EXISTS `godina_studija` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nazivRimski` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nazivSlovimaUPadezu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `redosledPrikazivanja` int(10) UNSIGNED NOT NULL,
  `indikatorAktivan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `godina_studija`
--

INSERT INTO `godina_studija` (`id`, `naziv`, `nazivRimski`, `nazivSlovimaUPadezu`, `redosledPrikazivanja`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, 'Прва', 'I', 'прву', 1, 1, '2016-08-29 20:03:53', '2016-08-30 07:00:54'),
(2, 'Друга', 'II', 'другу', 0, 1, '2016-08-29 20:03:53', '2016-08-30 07:02:15'),
(3, 'Трећа', 'III', 'трећу', 0, 1, '2016-08-29 20:03:53', '2016-08-30 07:02:50'),
(4, 'Четврта', 'IV', 'четврту', 0, 1, '2016-08-29 20:03:53', '2016-08-30 07:03:26'),
(5, 'Пета', 'V', 'пету', 0, 1, '2016-08-30 07:03:48', '2016-08-30 07:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `ispiti`
--

DROP TABLE IF EXISTS `ispiti`;
CREATE TABLE IF NOT EXISTS `ispiti` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `predmet_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `ispitni_rok_id` int(11) NOT NULL,
  `ocena` int(11) NOT NULL,
  `godina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `polozen` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ispitni_rok`
--

DROP TABLE IF EXISTS `ispitni_rok`;
CREATE TABLE IF NOT EXISTS `ispitni_rok` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `indikatorAktivan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ispitni_rok`
--

INSERT INTO `ispitni_rok` (`id`, `naziv`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, 'Јануар', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(2, 'Јун', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(3, 'Октобар', 0, '2016-08-29 20:03:53', '2016-08-30 07:08:46'),
(4, 'Април', 1, '2016-08-30 07:08:26', '2016-08-30 07:08:26'),
(5, 'Септембар', 1, '2016-08-30 07:08:37', '2016-08-30 07:08:37'),
(6, 'Новембар', 1, '2016-08-30 07:08:59', '2016-08-30 07:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

DROP TABLE IF EXISTS `kandidat`;
CREATE TABLE IF NOT EXISTS `kandidat` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `imeKandidata` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prezimeKandidata` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jmbg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datumRodjenja` datetime DEFAULT NULL,
  `mestoRodjenja` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `krsnaSlava_id` int(10) UNSIGNED NOT NULL,
  `kontaktTelefon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresaStanovanja` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imePrezimeJednogRoditelja` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontaktTelefonRoditelja` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `srednjeSkoleFakulteti` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mestoZavrseneSkoleFakulteta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smerZavrseneSkoleFakulteta` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uspehSrednjaSkola_id` int(10) UNSIGNED NOT NULL,
  `opstiUspehSrednjaSkola_id` int(10) UNSIGNED NOT NULL,
  `srednjaOcenaSrednjaSkola` double DEFAULT NULL,
  `sportskoAngazovanje_id` int(10) UNSIGNED DEFAULT NULL,
  `telesnaTezina` double DEFAULT NULL,
  `visina` double DEFAULT NULL,
  `prilozenaDokumentaPrvaGodina_id` int(10) UNSIGNED DEFAULT NULL,
  `statusUpisa_id` int(10) UNSIGNED DEFAULT NULL,
  `brojBodovaTest` double DEFAULT NULL,
  `brojBodovaSkola` double DEFAULT NULL,
  `prosecnaOcena` double DEFAULT NULL,
  `upisniRok` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brojIndeksa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skolskaGodinaUpisa_id` int(10) UNSIGNED NOT NULL,
  `indikatorAktivan` int(10) UNSIGNED NOT NULL,
  `studijskiProgram_id` int(10) UNSIGNED NOT NULL,
  `tipStudija_id` int(10) UNSIGNED NOT NULL,
  `godinaStudija_id` int(10) UNSIGNED NOT NULL,
  `mesto_id` int(10) UNSIGNED NOT NULL,
  `uplata` tinyint(1) DEFAULT '0',
  `upisan` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ukupniBrojBodova` double DEFAULT NULL,
  `drzavaZavrseneSkole` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `drzavaRodjenja` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `godinaZavrsetkaSkole` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diplomski` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slika` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datumStatusa` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kandidat_jmbg_unique` (`jmbg`),
  UNIQUE KEY `kandidat_brojindeksa_unique` (`brojIndeksa`),
  KEY `kandidat_mestorodjenja_id_index` (`mestoRodjenja`),
  KEY `kandidat_krsnaslava_id_index` (`krsnaSlava_id`),
  KEY `kandidat_mestozavrseneskolefakulteta_id_index` (`mestoZavrseneSkoleFakulteta`),
  KEY `kandidat_uspehsrednjaskola_id_index` (`uspehSrednjaSkola_id`),
  KEY `kandidat_opstiuspehsrednjaskola_id_index` (`opstiUspehSrednjaSkola_id`),
  KEY `kandidat_skolskagodinaupisa_id_index` (`skolskaGodinaUpisa_id`),
  KEY `kandidat_studijskiprogram_id_index` (`studijskiProgram_id`),
  KEY `kandidat_tipstudija_id_index` (`tipStudija_id`),
  KEY `kandidat_godinastudija_id_index` (`godinaStudija_id`),
  KEY `kandidat_mesto_id_index` (`mesto_id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kandidat`
--

INSERT INTO `kandidat` (`id`, `imeKandidata`, `prezimeKandidata`, `jmbg`, `datumRodjenja`, `mestoRodjenja`, `krsnaSlava_id`, `kontaktTelefon`, `adresaStanovanja`, `email`, `imePrezimeJednogRoditelja`, `kontaktTelefonRoditelja`, `srednjeSkoleFakulteti`, `mestoZavrseneSkoleFakulteta`, `smerZavrseneSkoleFakulteta`, `uspehSrednjaSkola_id`, `opstiUspehSrednjaSkola_id`, `srednjaOcenaSrednjaSkola`, `sportskoAngazovanje_id`, `telesnaTezina`, `visina`, `prilozenaDokumentaPrvaGodina_id`, `statusUpisa_id`, `brojBodovaTest`, `brojBodovaSkola`, `prosecnaOcena`, `upisniRok`, `brojIndeksa`, `skolskaGodinaUpisa_id`, `indikatorAktivan`, `studijskiProgram_id`, `tipStudija_id`, `godinaStudija_id`, `mesto_id`, `uplata`, `upisan`, `created_at`, `updated_at`, `ukupniBrojBodova`, `drzavaZavrseneSkole`, `drzavaRodjenja`, `godinaZavrsetkaSkole`, `diplomski`, `slika`, `datumStatusa`) VALUES
(2, 'Мирољуб', 'Којадиновић', '1608974790043', '1974-08-16 10:58:28', 'Ужице', 2, '064 8920094', 'Димитрија Туцовића 56.', 'kojamfam@gmail.com', '', '', 'Висока спортска  и здравствена  школа', 'Београд', '', 0, 1, 0, NULL, 0, 0, NULL, 1, 0, 0, NULL, '', '1001/2016', 1, 0, 2, 1, 4, 0, 1, 1, '2016-09-01 06:55:07', '2016-10-12 08:58:28', 0, '', '', '', NULL, NULL, '2016-09-27 10:58:28'),
(4, 'Стефан', 'Бранежац', '1409993892504', '1993-09-14 10:13:13', 'Барајево, Београд', 4, '066 9166923', 'Вашарска бб. Лаћарак', 'branezacst@gmail.com', 'Соња Бранежац', '064 994547', 'Медицинска школа "Драгиња Никшић"', 'Сремска Митровица', 'Медицинска сестра - техничар', 0, 3, 3.09, NULL, 75, 173, NULL, 1, 52, 24.72, NULL, 'јунски', '1003/2016', 1, 0, 1, 1, 1, 0, 1, 1, '2016-09-01 07:34:45', '2016-10-13 08:13:13', 76.72, '', 'Srbija', '', NULL, NULL, '2016-10-13 10:13:13'),
(5, 'Јелена ', 'Благојевић', '0112988178058', '1988-12-01 19:49:25', 'Барајево, Београд', 1, '064 1945852', 'Пуковнк Миленка Павловић 147 б Батајница, Земун', 'lejla-14@yahoo.com', 'Радивије Благојевић', '', 'Факултет спорта и физичког баспитања', 'Београд', 'Спорт, Одбојка', 0, 1, 0, NULL, 0, 0, NULL, 1, 0, 0, NULL, '', '1002/2016', 1, 0, 2, 1, 3, 0, 1, 1, '2016-09-01 07:36:26', '2016-09-27 17:49:25', 0, '', '', '', NULL, NULL, '2016-09-27 19:49:25'),
(9, 'Вук', 'Станковић', '2305997300176', '1997-05-23 17:06:28', 'Барајево, Београд', 4, '+385997947553', '', 'stankela122@hotmail.com', 'Душка Станковић', '+385996881728', 'Економска  школа Вуковар,  Хрватска', 'Барајево, Београд', '', 0, 2, 4, NULL, 114, 194, NULL, 1, 50, 32, NULL, 'јунски', '1007/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-01 08:07:05', '2016-09-25 15:06:28', 0, '', '', '', NULL, NULL, NULL),
(10, 'Урош', 'Селенић', '0811997770011', '1997-11-08 19:52:58', 'Ваљево', 42, '062 408225', 'Милорада Ристића 45, Ваљево', 'uros.selenic@gmail.com', 'Божидар Селенић', '063 8838179', 'Пољопривредна школа са домом ученика', 'Ваљево', 'ветеринарски техничар', 0, 2, 4.49, NULL, 84, 188, NULL, 1, 46, 35.94, NULL, 'јунски', '1006/2016', 1, 0, 3, 1, 1, 0, 1, 0, '2016-09-01 08:12:53', '2016-09-27 17:52:58', 0, '', '', '', NULL, NULL, '2016-09-27 19:52:58'),
(7, 'Стефан', 'Дацић', '2612997710145', '1997-12-26 19:50:42', 'Београд', 36, '060 444 83 64', 'Исмета Мујезиновића 19/7. Београд', 'ljiljanadacic68@hotmail.com', 'Љиљана Дацић', '060 4641909', 'Београд, Колеџ Београд', 'Београд', 'Општи', 0, 2, 4.33, NULL, 82, 192, NULL, 1, 52, 34.66, NULL, 'јунски', '1004/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-01 07:52:24', '2016-09-27 17:50:42', 0, '', '', '', NULL, NULL, '2016-09-27 19:50:42'),
(8, 'Димитрос', 'Џиновић', '1409997772066', '1997-09-14 17:06:06', 'Барајево, Београд', 1, '011 2310787', 'Кнеза Вишеслава 142 /36', 'dimtzino@gmail.com', 'Милутин Џиновић', '063375332', 'Лицеј , гимназија ', 'Барајево, Београд', '', 0, 3, 0, NULL, 72, 179, NULL, 1, 26, 24, NULL, 'јунски', '1005/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-01 07:58:07', '2016-09-25 15:06:06', 0, '', '', '', NULL, NULL, NULL),
(11, 'Дејан', 'Каровић', '2110994870162', '1994-10-21 17:25:24', 'Вршац', 41, '065 8809626', 'Жарка Зрењанина 14. Вршац', 'tamarakarovic@gmail.com', 'Тамара Каровић', '060 5704120', 'Гимназија "Борислав Петров-Браца"  Вршац', 'Вршац', 'Друштвено језички', 0, 2, 4.35, NULL, 73, 178, NULL, 1, 60, 34.82, NULL, 'јунски', '1008/2016', 1, 0, 3, 1, 1, 0, 1, 0, '2016-09-01 08:13:10', '2016-09-25 15:25:24', 0, '', '', '', NULL, NULL, NULL),
(12, 'Александар', 'Неранџић', '2002997710282', '1997-02-20 17:23:54', 'Савски Венац, Београд', 1, '065 3434573', '7. Српске бригаде 23. Београд', 'acamirijevo@gmail.com', 'Славиша Неранџић', '063 277085', 'Спортска гимназија Београд', 'Београд', '', 0, 3, 3.21, NULL, 78, 180, NULL, 1, 52, 25.68, NULL, 'јунски', '1009/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-01 08:18:28', '2016-09-25 15:23:54', 0, '', '', '', NULL, NULL, NULL),
(13, 'Милан', 'Бунчић', '3010997100057', '1997-10-30 00:00:00', 'Барајево, Београд', 12, '060 322 2580', 'Војвођанска 370ј. Сурчин', 'milan.buncic90@gmail.com', 'Стево Бунчић', '064 1116548', 'Правно-биротехничка школа "Димитрије Давидовић" Земун', 'Београд', 'Техничар обезбеђења', 0, 3, 0, NULL, 76, 184, NULL, 1, 46, 28, NULL, 'јунски', '1011/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-01 08:28:48', '2016-09-25 15:12:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Златко ', 'Јовановић', '1501984850002', '1984-01-15 17:05:41', 'Зрењанин', 35, '063 896602', 'Жарка Зрењанина 28 , Нови Бечеј', 'zlaja.jovanovic@gmail.com', 'Радица Јовановић', '062 1082842', 'Електротехничка и грађевинска школа "Никола Тесла"', 'Зрењанин', 'Грађевински техничар за високоградњу', 0, 1, 3.11, NULL, 84, 181, NULL, 1, 38, 24.9, NULL, 'јунски', '1010/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-01 08:30:59', '2016-09-25 15:05:41', 0, '', '', '', NULL, NULL, NULL),
(15, 'Дарко', 'Стевановић', '0301997710118', '1997-01-03 10:40:49', 'Лазаревац, Београд', 41, '062 9604236', 'Краља Петра Првог 25/11. Лазаревац', 'darestevanovic3@gmail.com', 'Игор Стевановић', '062 44 55 56', 'Зуботехничка  школа', 'Београд', 'Зубни техничар', 0, 3, 3.13, NULL, 88, 201, NULL, 1, 36, 25.02, NULL, 'јунски', '1012/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-01 08:40:49', '2016-09-25 15:17:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Огњен', 'Бјеличић', '2907997710161', '1997-07-29 17:22:36', 'Звездара, Београд', 2, '060 4467222', 'Краља Уроша Првог 12. Батајница', 'ognjen.bjelic@gmail.com', 'Драгана Бјеличић', '066 8300469', 'Спортска гимназија Београд', 'Београд', '', 0, 3, 3.05, NULL, 72, 182, NULL, 1, 48, 23.16, NULL, 'јунски', '1014/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-01 08:55:43', '2016-09-25 15:22:36', 0, '', '', '', NULL, NULL, NULL),
(17, 'Василије', 'Новаковић', '0709997260014', '1997-09-07 10:58:56', 'Барајево, Београд', 4, '069812887', 'Обрена Перишића 2', 'vnovaković0@gmail.com', 'Владан Новаковић', '069 218790', 'Економско угоститељска школа', 'Барајево, Београд', 'техничар продаје', 0, 3, 2.55, NULL, 83, 181, NULL, 1, 40, 20, NULL, 'јунски', '1013/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-01 08:58:56', '2016-09-25 15:18:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Никола', 'Круљ', '2312996710202', '1996-12-23 17:28:30', 'Савски Венац, Београд', 4, '062 230794', 'Сретена Младеновића Мике 12. Београд', 'Kruljn@gmail.com', 'Милорад Круљ', '063 230794', 'ЕТШ "Раде Коначр" Београд', 'Београд', 'Електротехничар рачунара', 0, 3, 3.02, NULL, 72, 179, NULL, 1, 56, 24.18, NULL, 'јунски', '1015/2016', 1, 0, 3, 1, 1, 0, 1, 0, '2016-09-01 09:00:56', '2016-09-25 15:28:30', 0, '', '', '', NULL, NULL, NULL),
(19, 'Милош', 'Баруџић', '2105997710111', '1997-05-21 11:10:50', 'Савски Венац, Београд', 50, '064 5489537 ', 'Каменичка 33. Крагујевац', 'mbarudzic@gmail.com', 'Славића  Баруџић', '063 609860', 'Друга Крагујевачка гимназија', 'Крагујевац', 'Општи', 0, 2, 3.75, NULL, 76, 184, NULL, 1, 58, 30, NULL, 'јунски', '1017/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-01 09:10:50', '2016-09-25 15:28:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Милан', 'Копривица', '0910997860248', '1997-10-09 19:54:09', 'Панчево', 42, '065 4669575', 'Вука Караџића 88, Ковин', 'molekoprivica@gmail.com', 'Горан Копривица', '063 7702832', 'Ваздухопловна академија ', 'Барајево, Београд', 'авио техничар- оглед', 0, 2, 4.34, NULL, 68, 177, NULL, 1, 58, 34.72, NULL, 'јунски', '1016/2016', 1, 0, 3, 1, 1, 0, 1, 0, '2016-09-01 09:12:29', '2016-09-27 17:54:09', 0, '', '', '', NULL, NULL, '2016-09-27 19:54:09'),
(21, 'Петар', 'Јовић', '0602997710002', '1997-02-06 11:20:27', 'Звездара, Београд', 50, '063 1946175', 'Драгана Ракића 35/18. Земун', 'petarn.jovic@gmail.com', 'Ненад Јовић', '064 2382763', 'Економска  школа "Нада Димић" Земун', 'Земун, Београд', 'Финансијски администратор', 0, 2, 3.79, NULL, 86, 179, NULL, 1, 54, 30.34, NULL, 'јунски', '1018/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-01 09:20:27', '2016-09-25 15:29:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Немања', 'Јелић', '0312996710124', '1996-12-03 11:24:18', 'Савски Венац, Београд', 4, '064 5012657', 'Стублине к.б. 216.', 'jelicnemanja8@gmail.com', 'Драгомир Јелић', '064 3504307', 'Техничка школа Обреновац', 'Обреновац, Београд', 'Машински техничар за компјутерско конструисање', 0, 3, 3.23, NULL, 80, 198, NULL, 1, 58, 25, NULL, 'јунск', '1019/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-01 09:24:18', '2016-09-25 15:29:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Ђорђе', 'Дуловић', '1701998270016', '1998-01-17 19:29:30', 'Барајево, Београд', 2, '067 510838', 'Ваљевска бб. Мојковац', 'dulovic689@gmail.com', 'Зоран Дуловић', '069 031654', 'Јавна  установа средња мјешовита школа', 'Барајево, Београд', 'Туристички техничар', 0, 5, 0, NULL, 81, 192, NULL, 1, 30, 28.78, NULL, 'јунски', '1020/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-01 09:29:52', '2016-09-27 17:29:30', 0, '', 't', '', NULL, NULL, '2016-09-27 19:29:30'),
(24, 'Јована', 'Милчић', '2711994715233', '1994-11-27 19:06:44', 'Савски Венац, Београд', 4, '060 3239900', 'Првомајска 28. Земун', 'Milcic.jovana@gmail.com', 'Ксенија Милчић', '060 3371787', 'Висока школа струковних студија', 'Београд', 'Менаџмент и бизнис', 0, 1, 0, NULL, 48, 160, NULL, 1, 0, 0, NULL, 'јунски', '1021/2016', 1, 0, 1, 1, 4, 0, 1, 0, '2016-09-01 09:36:11', '2016-09-27 17:06:44', 0, '', '', '', NULL, NULL, '2016-09-27 19:06:44'),
(26, 'Филип', 'Живојиновић', '1001997710231', '1997-01-10 19:05:24', 'Барајево, Београд', 1, '069 4775087', 'Сланачки пут 102а, Вишњичка бања', 'zikica.dragana@gmail.com', 'Драгана Живојиновић', '062 8007618', 'Трговачка Школа', 'Барајево, Београд', 'трговински техничар', 0, 3, 3.06, NULL, 73, 178, NULL, 1, 50, 24, NULL, 'јунски', '1022/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-01 09:42:56', '2016-09-27 17:05:24', 0, '', '', '', NULL, NULL, '2016-09-27 19:05:24'),
(27, 'Ненад', 'Павловић', '2810974710047', '1974-10-28 11:49:12', 'Савски Венац, Београд', 50, '060 3325053', 'Беле Барток 18. Борча', 'nenad.pavlovic@mfub.bg.ac.rs', 'Мирослав Павловић', '011 3325053', 'Висока спортска  и здравствена  школа', 'Београд', '', 0, 1, 0, NULL, 1, 178, NULL, 1, 0, 0, NULL, 'јунски', '1025/2016', 1, 0, 2, 1, 4, 0, 1, 0, '2016-09-01 09:49:12', '2016-09-27 17:14:03', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:14:03'),
(28, 'Кристијан ', 'Сарић', '0511997780013', '1997-11-05 11:53:17', 'Барајево, Београд', 50, '069 5440679', 'Грдичка 85, Краљево', 'KritijanSaric@hotmail.com', 'Олгица Сарић', '060 4296502', 'Економско трговачка школа', 'Краљево', 'економски техничар', 0, 5, 0, NULL, 71, 187, NULL, 1, 48, 26, NULL, 'јунски', '1024/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-01 09:53:17', '2016-09-27 17:13:24', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:13:24'),
(29, 'Ивана', 'Србиноски', '0610997715120', '1997-10-06 11:55:22', 'Звездара, Београд', 36, '064 2848165', 'Љубе Шерцера 22. Београд', 'ivannasrbinoski@gmail.com', 'Сузана Србиноски', '063 316211', 'Пољопривредно хемијска школа Обреновац', 'Обреновац, Београд', 'Техничар за заштиту животне средне', 0, 2, 4.44, NULL, 62, 165, NULL, 1, 38, 35.64, NULL, 'јунски', '1026/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-01 09:55:22', '2016-09-27 17:18:24', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:18:24'),
(30, 'Јован', 'Пантић', '3011991710046', '1991-11-30 12:04:30', 'Савски Венац, Београд', 4, '061 6599949', 'Господар Јованова 39-41.', 'jovanpanticfj.91@gmail.com', 'Марија Пантић', '064 2020209 ', 'Школа за пејзажну архитектуру', 'Врачар, Београд', 'Техничар за обколивање   намештаја и ентеријера', 0, 5, 0, NULL, 85, 192, NULL, 1, 42, 50.6, NULL, 'јунски', '1028/2016', 1, 0, 3, 1, 1, 0, 1, 0, '2016-09-01 10:04:30', '2016-09-27 17:19:54', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:19:54'),
(31, 'Душан', 'Радовић', '0810996710329', '1996-10-08 12:13:07', 'Савски Венац, Београд', 12, '064 1059402', 'Милана Предића 18 б', 'radovici@sbb.rs', 'Илија Радовић', '064 1524930', 'Пета београдска гимназија', 'Звездара, Београд', 'природно математички', 0, 2, 3.51, NULL, 80, 185, NULL, 1, 58, 28, NULL, 'јунски', '1027/2016', 1, 0, 3, 1, 1, 0, 1, 0, '2016-09-01 10:13:07', '2016-09-27 17:19:08', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:19:08'),
(32, 'Лука', 'Митровић', '0711997780012', '1997-11-07 12:13:57', 'Краљево', 36, '03 455177', 'Златиборска 49. Земун', 'mitrovicluka07@gmail.com', 'Снежана Митровић', '062 552 938', 'Економско-трговинска школа Краљево', 'Краљево', 'Економски техничар', 0, 2, 3.77, NULL, 65, 177, NULL, 1, 56, 30.12, NULL, 'јунски', '1029/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-01 10:13:57', '2016-09-27 17:20:12', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:20:12'),
(33, 'Јована', 'Прековић', '2001996726820', '1996-01-20 12:22:02', 'Барајево, Београд', 36, '065 2557407', '', 'јovana.prekovic96@gmail.com', 'Mипослав Прековић', '062 8021905', 'Гимназија " Милош Савковић"', 'Аранђеловац', 'друштвено-језички', 0, 2, 4.31, NULL, 61, 165, NULL, 1, 58, 34, NULL, 'јунски', '1030/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-01 10:22:02', '2016-09-27 17:20:28', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:20:28'),
(34, 'Никола', 'Стаменковић', '2901998710213', '1998-01-29 12:28:12', 'Савски Венац, Београд', 1, '', 'Сплитска 12. Београд', 'nikolastamenovic@gmail.com', 'Предраг Стаменковић', '063 8389927', 'Трговачка школа', 'Београд', 'Комерцијалиста', 0, 3, 3.49, NULL, 0, 0, NULL, 1, 56, 27.88, NULL, 'јунском', '1031/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-01 10:28:12', '2016-09-27 17:20:46', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:20:46'),
(35, 'Јована', 'Вулиновић', '2707995726835', '1995-07-27 12:31:34', 'Аранђеловац', 12, '064 9654186', 'Церска 20. Аранђеловац', 'vulinovicj@gmail.com', 'Бојана Вулиновић', '063638077', 'Гимназија "Милош Савковић" Аранђеловац', 'Аранђеловац', 'Друштвено-језички', 0, 1, 4.95, NULL, 61, 167, NULL, 1, 60, 39.58, NULL, 'јунски', '1033/2016', 1, 0, 3, 1, 1, 0, 1, 0, '2016-09-01 10:31:34', '2016-09-27 17:21:23', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:21:23'),
(36, 'Ивана', 'Чомагић', '1610991715025', '1991-10-16 12:32:04', 'Савски Венац, Београд', 1, '062 438442', 'Благајска 3, Београд', 'ivanica-bg-91@hotmail.com', 'Горан Чомагић', '063 217349', 'Спортска гимназија', 'Барајево, Београд', 'општи', 0, 3, 3.29, NULL, 61, 166, NULL, 1, 60, 26, NULL, 'јунски', '1032/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-01 10:32:04', '2016-09-27 17:21:02', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:21:02'),
(37, 'Павле', 'Ђокић', '2901997722218', '1997-01-29 12:39:15', 'Јагодина', 50, '064 7002270 ', 'Славке Ђурђевић Б1 1/27. Јагодина', 'paaice@gmail.com', 'Љиљана Ђокић', '065 5455225', 'Гимназија Светозар Марковић Јагодина', 'Јагодина', 'Општи тип - спортско одељење', 0, 4, 2.49, NULL, 0, 0, NULL, 1, 44, 19.9, NULL, 'јунски', '1034/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-01 10:39:15', '2016-09-27 17:21:38', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:21:38'),
(38, 'Вељко', 'Бажалац', '2604997780019', '1997-04-26 12:52:27', 'Краљево', 42, '064 0697868', 'Конарево 791. Краљево', 'veljkobazalac@gmail.com', 'Живан Бажалац', '060 3824999', 'Техничка  школа Чачак', 'Чачак', 'Грађевински техничар за високоградњу', 0, 2, 4.25, NULL, 83, 187, NULL, 1, 40, 33.96, NULL, 'јунски', '1035/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-01 10:52:27', '2016-09-27 17:22:03', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:22:03'),
(39, 'Алекса', 'Димитријевић', '2403997710066', '1997-03-24 12:57:10', 'Савски Венац, Београд', 50, '060 0220339', 'Земунска 15. Нови Београд', 'aleksadimitrijevic@gmail.com', 'Бранислав Димитријевић', '063 8808630', 'Техничка школа "Нови Београд"', 'Барајево, Београд', 'Машински техничар за  компјутерско конструисање', 0, 3, 3.12, NULL, 65, 173, NULL, 1, 40, 24.92, NULL, 'јунски', '1036/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-01 10:57:10', '2016-09-27 17:22:15', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:22:15'),
(40, 'Давид ', 'Војновић', '1412997710215', '1997-12-14 10:59:31', 'Савски Венац, Београд', 12, '062 8322737', 'Видиковачки венац 67а. Београд', 'davidvojnovic18@gmail.com', 'Љиљана Војновић', '065 6572713', 'Техничко саобраћајна школа Београд', 'Београд', 'Електромеханичар електромоторних погона', 0, 3, 3.37, NULL, 0, 0, NULL, 1, 46, 26.94, NULL, 'јунски', '1037/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-01 11:01:32', '2016-09-27 17:22:35', 0, '', 'Србија', '', NULL, NULL, '2016-09-27 19:22:35'),
(41, 'Невена', 'Иванов', '0801994715006', '1994-01-08 13:05:50', 'Савски Венац, Београд', 50, '063 1296492', 'Ђорђа Павловића11. Београд', 'ivanovnevena@gmail.com', 'Драган Иванов', '066 296493', 'Академија фудбала у Београду', 'Београд', 'Струковни менаџер', 0, 1, 0, NULL, 0, 0, NULL, 1, 0, 0, NULL, 'јунски', '1038/2016', 1, 0, 1, 1, 4, 0, 1, 0, '2016-09-01 11:05:50', '2016-09-27 17:23:29', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:23:29'),
(42, 'Стефан', 'Миличевић', '1603997173236', '1997-03-16 10:59:30', 'Соколац', 50, '066 056 912', 'Миланка Витомира бб. Соколац', 'radenkomilicevic@rocketman.com', 'Сања Миличевић', '065 377554', 'Јавна установа средњошколски центар "Василије Острошки"', 'Барајево, Београд', '', 0, 3, 2.56, NULL, 60, 175, NULL, 1, 44, 20.48, NULL, 'јунски', '1039/2016', 1, 0, 3, 1, 1, 0, 1, 0, '2016-09-01 11:12:48', '2016-09-27 17:23:45', 0, '', 'БиХ', '', NULL, NULL, '2016-09-27 19:23:45'),
(43, 'Иван', 'Стевановић', '0309997710046', '1997-09-03 13:16:52', 'Савски Венац, Београд', 10, '064 4954539', 'Булевар Арсенија Чарнојевића 145.', 'ivan.stevanovic97@gmail.com', 'Зоран Стевановић', '066 8551008', 'Спортска гимназија Београд', 'Београд', 'Општи', 0, 3, 2.61, NULL, 108, 203, NULL, 1, 40, 20.86, NULL, 'јунски', '1040/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-01 11:16:52', '2016-09-27 17:24:00', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:24:00'),
(44, 'Никола', 'Кочановић', '1912994210028', '1994-12-19 10:24:26', 'Беране', 1, '+38267507646', '', '', 'Милутин Кочановић', '', 'Факултет за спорт', 'Београд', 'Менаџмент у спорту', 0, 1, 0, NULL, 0, 0, NULL, 1, 0, 0, NULL, 'јунски', '1041/2016', 1, 0, 1, 1, 4, 0, 1, 0, '2016-09-02 04:45:35', '2016-09-27 17:24:19', 0, '', 'цг', '', NULL, NULL, '2016-09-27 19:24:19'),
(45, 'Никола', 'Коматина', '2504994271968', '1994-04-25 10:48:24', 'Барајево, Београд', 1, '0038267411806', '', '', '', '', '', 'Барајево, Београд', '', 0, 1, 0, NULL, 0, 0, NULL, 1, 0, 0, NULL, 'јунски', '1042/2016', 1, 0, 1, 1, 4, 0, 1, 0, '2016-09-02 04:47:34', '2016-10-12 08:48:24', 0, '', '', '', NULL, NULL, '2016-09-27 10:48:24'),
(46, 'Алекса', 'Димитријевић', '1903995710149', '1995-03-19 06:51:37', 'Београд', 4, '061 1598696', 'Народних хероја 13.', 'aleksa.dimke@hotmail.com', 'Андрија Димитријевић', '060 3606650', 'Доситеј', 'Београд', 'Општи', 0, 3, 2.94, NULL, 97, 197, NULL, 1, 40, 24.92, NULL, 'јунски', '1043/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-02 04:51:37', '2016-09-27 17:24:50', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:24:50'),
(47, 'Милан', 'Сарић', '1309986710331', '1986-09-13 06:56:20', 'Савски Венац, Београд', 1, '066 6639555', 'Книнска 11, Обреновац', 'msaric@kkcrvenazvezda.rs', 'Божидар Сарић', '', 'Високо хотелијерска школа', 'Барајево, Београд', '', 0, 1, 0, NULL, 0, 0, NULL, 1, 0, 0, NULL, 'јунски', '1044/2016', 1, 0, 1, 1, 3, 0, 1, 0, '2016-09-02 04:56:20', '2016-09-27 17:25:11', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:25:11'),
(48, 'Урош', 'Малешевић', '0609997710155', '1997-09-06 07:06:26', 'Савски Венац, Београд', 33, '061 2027456', 'Железничка 3, Нови Бановци', 'urkemilesevic14@gmail.com', 'Зоран Милешевић', '060 3212151', 'Tехнучка школа', 'Земун, Београд', 'машински техничар за компијутерско управљање', 0, 2, 3.51, NULL, 92, 196, NULL, 1, 36, 26, NULL, 'јунски', '1046/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-02 05:06:26', '2016-09-27 17:25:42', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:25:42'),
(49, 'Александар', 'Стојковић', '2605996710021', '1996-05-26 07:10:53', 'Звездара, Београд', 42, '064 2480454', 'Мирослава Пешића 1. Београд', 'aleksandar.stojkovic26@gmail.com', 'Драган Стојковић', '065 2480454', 'Политехника  - школа за нове технологије', 'Барајево, Београд', 'Техничар за компјутерско управљање', 0, 5, 0, NULL, 70, 180, NULL, 1, 46, 22, NULL, 'јунски', '1045/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-02 05:10:53', '2016-09-27 17:25:25', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:25:25'),
(50, 'Предраг', 'Ранковић', '0703977710015', '1977-03-07 09:08:52', 'Савски Венац, Београд', 41, '060 3939089', 'Посавских Партизана 2. Београд', 'mikaela.stevicgmail.com', 'Зоран Ранковић', '', 'Техничка школа "Иво Лола Рибар" Железник', 'Београд', 'Техничар НУ машина', 0, 3, 3.12, NULL, 83, 187, NULL, 1, 30, 40, NULL, 'јунски', '1048/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-02 05:17:59', '2016-10-13 07:08:52', 70, '', '', '', NULL, NULL, '2016-09-27 09:08:52'),
(51, 'Милан', 'Јовановић', '0811996710031', '1996-11-08 07:18:49', 'Савски Венац, Београд', 4, '069 4172494', 'Краља Милана 7/11 Београд', 'kikithebro@gmail.com', 'Бранко Јовановић', '069 4172494', 'Гимназија "Стефан Немања"', 'Барајево, Београд', 'општи', 0, 2, 3.78, NULL, 90, 202, NULL, 1, 42, 30, NULL, 'јунски', '1047/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-02 05:18:49', '2016-09-27 17:25:59', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:25:59'),
(52, 'Никола', 'Ђоковић', '2407997790049', '1997-07-24 00:00:00', 'Ужице', 12, '065 8090996', 'Тодора Дукина  66. Београд', 'nikoladjokovic@gmail.com', 'Љубинка Делић', '061 1490058', 'Туристичко-угоститељска школа', 'Ужице', 'Туристички техничар', 0, 3, 2.57, NULL, 75, 188, NULL, 1, 38, 20.53, NULL, 'јунски', '1050/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-02 05:31:47', '2016-09-27 17:27:19', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:27:19'),
(53, 'Вукашин ', 'Зиројевић', '0408996740020', '1996-08-04 07:34:09', 'Лесковац', 50, '064 5588218', 'Кривошиска 9/03, Звездара', 'vukasinzirojevic70@gmail.com', 'Војин Зиројевић', '063 241891', 'Спортска гимназија', 'Барајево, Београд', 'општи', 0, 3, 2.76, NULL, 70, 179, NULL, 1, 38, 22, NULL, 'јунски', '1049/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-02 05:34:09', '2016-09-27 17:26:58', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:26:58'),
(54, 'Ђорђе', 'Лазић', '1905996710080', '1996-05-19 07:45:56', 'Звездара, Београд', 2, '064 4926684', 'Ђоке Павићевића 18. Београд', 'djordje886@gmail.com', 'Милош Лазић', '064 2831049', 'ЕТШ "Раде Кончар"', 'Београд', 'Електротехничар рачунара', 0, 3, 3.09, NULL, 98, 196, NULL, 1, 42, 24, NULL, 'јунски', '1051/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-02 05:45:56', '2016-09-27 17:27:33', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:27:33'),
(55, 'Душан', 'Истодоровић', '0910995752510', '1995-10-09 07:46:12', 'Кладово', 4, '062 311012', 'Смедеревска 31', 'vulsa1@gmail.com', 'Саша Истодоровић', '063 443044', 'Техничка школа ', 'Зајечар', 'техничар друмског саобраћаја', 0, 3, 2.99, NULL, 71, 187, NULL, 1, 34, 23, NULL, 'јунски', '1052/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-02 05:46:12', '2016-09-27 17:27:47', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:27:47'),
(56, 'Дејан', 'Одавић', '1301984710147', '1984-01-13 00:00:00', 'Савски Венац, Београд', 2, '065 400084', 'Добрачина 26', 'оdavicdejan@yahoo.com', 'Миодраг Одавић', '063 209667', 'Академија фудбала ', 'Барајево, Београд', 'стуковни менаџер', 0, 1, 0, NULL, 0, 0, NULL, 1, 0, 0, NULL, 'јунски', '1054/2016', 1, 0, 1, 1, 4, 0, 1, 0, '2016-09-02 05:55:24', '2016-09-27 17:30:32', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:30:32'),
(57, 'Матија', 'Драшковић', '1101992710149', '1992-01-11 10:47:57', 'Барајево, Београд', 1, '064 4773434', 'Игњата Јова', 'matija.draskovic34@yahoo.com', 'Веско Драшковић', '', 'Факултет за менаџмент у спорту " Алфа Унииверзитет"', 'Барајево, Београд', '', 0, 1, 0, NULL, 0, 0, NULL, 1, 0, 0, NULL, 'јунски', '1055/2016', 1, 0, 1, 1, 4, 0, 1, 0, '2016-09-02 06:09:34', '2016-10-12 08:47:57', 0, '', '', '', NULL, NULL, '2016-09-27 10:47:57'),
(58, 'Бојана ', 'Боричић', '2009989726824', '1989-09-20 00:00:00', 'Аранђеловац', 42, '064 3374972', 'Булевар Михаила Пупина 29/13, Нови Београд', 'bojanaboricic.boba@hotmal.com', 'Веселин Боричић ', '064 1938601', 'Гимназија " Милош Савковић"', 'Барајево, Београд', '', 0, 1, 0, NULL, 47, 169, NULL, 1, 0, 0, NULL, 'септембарском', '1056/2016', 1, 0, 1, 1, 2, 0, 1, 0, '2016-09-02 06:56:28', '2016-09-27 17:33:21', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:33:21'),
(59, 'Стефан', 'Боричић', '1406993721816', '1993-06-14 00:00:00', 'Аранђеловац', 42, '065 9911074', 'Краља Петра 1 52/101', 'stefikralj@gmail.com', 'Веселин Боричић ', '064 1938601', 'Гимназија " Милош Савковић"', 'Барајево, Београд', '', 0, 1, 0, NULL, 88, 182, NULL, 1, 0, 0, NULL, 'септембарском', '1057/2016', 1, 0, 1, 1, 2, 0, 1, 0, '2016-09-02 07:03:39', '2016-09-27 17:33:37', 0, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:33:37'),
(60, 'Милош ', 'Стојадиновић', '1006996800042', '1996-06-10 09:13:46', 'Нови Сад', 50, '069 1996001', 'Светозара Милетића 13, Ковиљ', 'milos.stojadinovic1996@gmail.com', 'Стеван', '063 1036187', 'Саобраћајна школа " Пинки" ', 'Нови Сад', 'техничар за безбедност саобраћаја', 0, 3, 3.45, NULL, 67, 170, NULL, 1, 58, 27, NULL, 'септембарском', '1058/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-02 07:13:46', '2016-09-27 17:33:50', NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:33:50'),
(61, 'Стефан', 'Дангубић', '2211992250028', '1992-11-22 00:00:00', 'Савски Венац, Београд', 0, '065 5732720', 'Жоржа Клеменсоа 18,Београд', 'stefanhn@hotmail.com', NULL, NULL, '"Алфа БК" Универзитет', 'Барајево, Београд', 'менаџмент у спорту', 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, 'јунски', '2006/2016', 1, 0, 4, 2, 1, 0, 1, 0, '2016-09-02 07:27:37', '2016-10-03 07:59:41', NULL, '', '', '', NULL, NULL, '2016-10-03 09:59:41'),
(62, 'Игор', 'Куљић', '1106987170073', '1987-06-11 00:00:00', 'Барајево, Београд', 0, '062 675224', 'Браће Рибникара 8, Нови Сад', 'kuljicigor12@gmail.com', NULL, NULL, 'Факултет спорта и физичког васпитања', 'Нови Сад', 'дипломирани професор физичког васпитања', 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, 'јунски', '2002/2016', 1, 0, 6, 2, 0, 0, 1, 0, '2016-09-02 07:38:59', '2016-10-02 16:37:23', NULL, '', '', '', NULL, NULL, '2016-10-02 18:37:23'),
(63, 'Роксанда ', 'Атанасов', '1003979726832', '1979-03-10 00:00:00', 'Барајево, Београд', 0, '064 1699534', 'Булевар Арсенија Чарнојевића 136', 'roxandalazarevic@hotmail.com', NULL, NULL, 'Aкадемија лепих уметности', 'Барајево, Београд', 'менаџер у уметности', 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, 'јунски', '2003/2016', 1, 0, 6, 2, 0, 0, 1, 0, '2016-09-02 07:45:27', '2016-10-02 16:37:04', NULL, '', '', '', NULL, NULL, '2016-10-02 18:37:04'),
(64, 'Милош', 'Арсов', '1106996710196', '1996-06-11 12:17:24', 'Барајево, Београд', 1, '063 370496', 'Војни пут 197', 'arsov.1996@gmail.com', 'Иван', '063 2366313', 'Грађевинско техничка школа', 'Барајево, Београд', '', 0, 3, 2.69, NULL, 76, 191, NULL, 1, 50, 43.04, NULL, 'септембарском', '1059/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-05 10:08:24', '2016-09-27 17:34:08', 0, '', '', '', NULL, NULL, '2016-09-27 19:34:08'),
(65, 'Марко', 'Јеленковић', '2805997710253', '1997-05-28 00:00:00', 'Савски Венац, Београд', 4, '063 734 6231', 'Маршала Тита 148. Добановци', 'crvenazvezdanumber1@gmail.com', 'Зоран Јеленковић ', '063 228 970', 'Х Гимнаѕија "Михаило Пупин" ', 'Барајево, Београд', 'Општи', 0, 3, 2.81, NULL, 68, 178, NULL, 1, 52, 0, NULL, 'септембарски', '1060/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-07 04:39:17', '2016-09-27 17:34:23', 0, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:34:23'),
(66, 'Радомир', 'Драшовић', '2207997710054', '1997-07-22 11:54:17', 'Савски Венац, Београд', 4, '066 412352', 'Цара Душана 72 , Београд', 'rasa.drasovic@gmail.com', 'Горан Драшовић', '063 235339', 'Спортска гимназија , Београд', 'Барајево, Београд', 'Општи', 0, 3, 3.48, NULL, 96, 193, NULL, 1, 46, 41.73, NULL, 'септембарски', '1061/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-07 09:54:17', '2016-09-27 17:34:36', 0, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:34:36'),
(67, 'Mилан ', 'Ракић', '2409995730025', '1995-09-24 19:36:33', 'Барајево, Београд', 1, '064 3906780', 'Грмечка 10, Земун', 'djomlan95@gmail.com', 'Mиле Ракић', '064 1671464', 'ПБШ "Димитрије Ракић" ,Земун', 'Барајево, Београд', 'пословни администратор', 0, 1, 3.32, NULL, 66, 171, NULL, 1, 32, 39.78, NULL, 'септембарски', '1062/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-09 05:33:22', '2016-09-27 17:36:59', 0, 'Србија', '', '', NULL, NULL, '2016-09-27 19:36:59'),
(68, 'Немања', 'Николић', '0504982710055', '1982-04-05 10:01:47', 'Савски Венац, Београд', 50, '065 2377881', 'Далматинска 84 ', 'nemanjakameni@gmail.com', 'Слободан Николић', '', '11. Београдска гимназија', 'Барајево, Београд', '', 0, 1, 0, NULL, 82, 172, NULL, 1, 44, 0, NULL, 'септембарски', '1063/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-09 08:01:47', '2016-09-27 17:37:17', 0, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:37:17'),
(69, 'Владимир', 'Чепзановић', '1910981710177', '1981-10-19 00:00:00', 'Савски Венац, Београд', 0, '065 8441481', 'Бојвођанска 253', 'vladimircepzanovic@yahoo.com', NULL, NULL, 'Факултет за спрт', 'Барајево, Београд', 'тренер у спорту', 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, 'септембарски', '2004/2016', 1, 0, 6, 2, 0, 0, 1, 0, '2016-09-09 08:21:15', '2016-10-02 16:36:45', NULL, '', '', '', NULL, NULL, '2016-10-02 18:36:45'),
(70, 'Виктор', 'Немеш', '2107993820454', '1993-07-21 07:56:46', 'Сента', 1, '063 7286894', 'Кошут Лајоша бб, Сента', 'viktornemes93@gmail.com', 'Пирош Немеш', '024 814608', 'Техничка школа "Ада" 2012', 'Сента', 'машински техничар за компијутерско управљање', 0, 1, 5, NULL, 0, 0, NULL, 1, 54, 60, NULL, 'септембарски', '1064/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-12 05:56:46', '2016-09-27 17:37:29', 0, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:37:29'),
(71, 'Давор', 'Штефанек', '1209985820007', '1985-09-12 00:00:00', 'Суботица', 1, '063 8952401', '27 марта 26', 'wrestlevdavor@gmail.com', 'Дамир Штефанек', '024 530320', 'Економска школа Суботица', 'Суботица', 'економски техничар', 0, 3, 3.45, NULL, 0, 0, NULL, 1, 54, 41.46, NULL, 'септембарски', '1065/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-12 06:08:25', '2016-09-27 17:37:42', 0, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:37:42'),
(72, 'Немања', 'Стоилковић', '2703997710329', '1997-03-27 07:52:21', 'Савски Венац, Београд', 50, '063 552582', 'Марчанска 3', 'nemanjastoilkovic78@gmail.com', 'Александар Стоилковић', '063 200984', 'Доситеј ', 'Врачар, Београд', 'економски техничар', 0, 3, 3.01, NULL, 107, 184, NULL, 1, 36, 36.15, NULL, 'септембарски', '1066/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-14 05:52:21', '2016-09-27 17:37:58', 72.15, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:37:58'),
(73, 'Момчило', 'Мучибабић', '2804996820288', '1996-04-28 08:06:38', 'Суботица', 42, '063 7418792', 'Озораи Арпаца 10', 'momcilomuca@gmail.com', 'Мирослав Мучибабић', '063 596730', 'Српска гимназија Никола Тесла', 'Будимпешта', '', 0, 2, 3.53, NULL, 92, 193, NULL, 1, 56, 42.3, NULL, 'септембарски', '1067/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-14 06:06:38', '2016-09-27 17:38:16', 98.3, NULL, NULL, NULL, NULL, NULL, '2016-09-27 19:38:16'),
(74, 'Вук', 'Стевановић', '3108995710265', '1995-08-31 10:06:25', 'Београд', 2, '061 14448000', 'Арчибалда Рајса 7/3.', 'vukstevanovic@gmail.com', 'Драгољуб', '062 506350', 'Гимназија Обреновац', 'Обреновац', 'Друштвено језички', 0, 3, 3.14, NULL, 60, 172, NULL, 1, 56, 37.62, NULL, 'септембарски', '1068/2016', 1, 0, 3, 1, 1, 0, 1, 0, '2016-09-15 08:06:25', '2016-09-27 17:38:33', 93.62, 'Србија', 'Србија', '2014.', NULL, NULL, '2016-09-27 19:38:33'),
(75, 'Ирена', 'Арбајтер -Јанковић', '2306973715002', NULL, 'Звездара, Београд', 0, '063 8113447', 'Владетина 8, Београд', 'arbajter.jankovic@gmail.com', NULL, NULL, 'Факултет за спорт" Унион Никола Тесла', 'Нови Београд, Београд', 'тренер у спорту', 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, 'септембарски', '2005/2016', 1, 0, 6, 2, 1, 0, 1, 1, '2016-09-15 08:23:36', '2016-10-02 16:36:23', NULL, 'Србија', 'Србија', '2016', NULL, NULL, '2016-10-02 18:36:23'),
(76, 'Maтија', 'Новковић', '2804996710369', '1996-04-28 11:14:07', 'Савски Венац, Београд', 42, '062 363403', 'Веспучијева 16', 'matijanovakovic4@gmail.com', 'Миливоје Новаковић', '064 6113869', 'Спортска гимназија', 'Врачар, Београд', 'Општи', 0, 2, 3.57, NULL, 88, 192, NULL, 1, 42, 42.84, NULL, 'септембарски', '1074/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-20 05:22:37', '2016-10-13 09:14:07', 84.84, 'Србија', 'Србија', '2015', NULL, NULL, '2016-10-12 11:14:07'),
(77, 'Немања', 'Живковић', '0401998790020', '1998-01-04 11:56:21', 'Ужице', 50, '069 5551998', 'Светомира Павловића 6, Бајина Башта', 'zilenecobb1998@gmail.com', 'Предраг Живковић', '063 8361408', 'Техничка школа ', 'Чачак', 'Грађевински техничар за високоградњу', 0, 3, 3.03, NULL, 75, 182, NULL, 1, 36, 36.36, NULL, 'септембарски', '1080/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-20 09:56:21', '2016-10-12 08:39:23', 72.36, 'Србија', 'Србија', '2016', NULL, NULL, '2016-10-12 10:39:23'),
(78, 'Андрија', 'Зиројевић', '0410996210042', '1996-10-04 18:30:00', 'Подгорица', 50, '0642296643', 'Љуба Вучковића 13, Београд', 'andrijazirojevic@yahoo.com', 'Маја Ђурановић', '38269 338295', 'ЈУ Средња медицинска школа', 'Подгорица', 'фармацеутски техничар', 0, 5, 1.68, NULL, 84, 189, NULL, 1, 44, 20.13, NULL, 'септембарски', '1088/2016', 1, 0, 3, 1, 1, 0, 1, 0, '2016-09-21 05:38:39', '2016-10-12 08:40:25', 64.13, 'Црна Гора', 'Црна Гора', '2016', NULL, NULL, '2016-10-12 10:40:25'),
(79, 'Mилош', 'Буторовић', '0411994710141', '1994-11-04 07:57:13', 'Савски Венац, Београд', 0, '062 218080', 'Булевар ослобођења 116', 'milos.buturovic@gmail.com', 'Александар Бутуровић', '060 050570', 'Школа за економију право и администрацију', 'Вождовац, Београд', 'економски техничар', 0, 2, 4.16, NULL, 74, 180, NULL, 1, 42, 49.89, NULL, 'септембарски', '1081/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-21 05:57:13', '2016-10-12 08:39:30', 91.89, 'Србија', 'Србија', '2014', NULL, NULL, '2016-10-12 10:39:30'),
(80, 'Игор', 'Рађеновић', '2404990710024', '1990-04-24 07:53:01', 'Звездара, Београд', 1, '061 6188349', 'Акробате Алексића 11, Земун', 'igorrandenovic@yahoo.com', 'Миодраг Рађеновић', '061 6188350', 'Технича школа ', '', 'техничар за пејзажну архитектуру', 0, 3, 2.65, NULL, 88, 190, NULL, 1, 54, 31.83, NULL, 'септембарски', '1082/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-23 05:47:50', '2016-10-12 08:39:36', 85.83, 'Србија', 'Србија', '2010', NULL, NULL, '2016-10-12 10:39:36'),
(81, 'Лазар', 'Добожанов', '2112995800071', '1995-12-21 11:49:20', 'Нови Сад', 22, '0621223069', 'Здавка Гложанског 11, Бечеј', 'lazardobozanov@yahoo.com', 'Ивана Иванић Добожанов', '063 8858225', 'Економско трговачка школа', 'Бечеј', 'економски техничар', 0, 2, 4.39, NULL, 81, 187, NULL, 1, 50, 52.68, NULL, 'септембарски', '1075/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-27 09:49:20', '2016-10-12 08:38:56', 102.68, 'Србија', 'Србија', '2014', NULL, NULL, '2016-10-12 10:38:56'),
(82, 'Небојша', 'Тохољ', '1602997800072', '1997-02-16 11:59:42', 'Нови Сад', 12, '064 9168002', 'Карађорђева 14/б , Ђурђево', 'tolja97@gmail.com', 'Владислав Тохољ', '064 1612806', 'Друга крагујевачка гимназија, Крагујевац', 'Крагујевац', 'Општи', 0, 2, 3.63, NULL, 97, 192, NULL, 1, 50, 43.53, NULL, 'септембарски', '1072/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-27 09:59:42', '2016-09-28 09:14:09', 93.53, 'Србија', 'Србија', '2015', NULL, NULL, '2016-09-28 11:14:09'),
(83, 'Горан ', 'Грујић', '2711982840008', '1982-11-27 11:07:56', 'Кикинда', 4, '063 7319886', 'Максима Горког 30', 'biggrujic@gmail.com', 'Драган', '063 8278423', 'ТИМС', 'Нови Сад', '', 0, 1, 0, NULL, 74, 181, NULL, 1, 0, 0, NULL, 'септембарски', '1083/2016', 1, 0, 2, 1, 4, 0, 1, 0, '2016-09-28 09:50:28', '2016-10-12 09:07:56', 0, '', 'Србија', '2014', NULL, NULL, '2016-10-12 11:07:56'),
(84, 'Милтин', 'Боројевић', '2411994710092', '1994-11-24 09:02:58', 'Савски Венац, Београд', 8, '065 2691095', 'Палмира Тољатија 60', 'milutinb94@gmail.com', 'Зоран', '069 698131', 'Гимназија "Др.Коста Цукић"', 'Земун, Београд', 'Општи', 0, 4, 2.08, NULL, 0, 0, NULL, 1, 40, 24.99, NULL, 'септембарски', '1076/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-29 07:02:58', '2016-10-12 08:38:59', 64.99, 'Србија', '', '2013', NULL, NULL, '2016-10-12 10:38:59'),
(85, 'Драган ', 'Влајковић', '0508997780012', '1997-08-05 11:24:18', 'Краљево', 0, '', '', '', 'Милан', '', '', '', '', 0, 1, 0, NULL, 0, 0, NULL, 1, 0, 0, NULL, '', '1077/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-29 09:24:18', '2016-10-12 08:39:01', 0, '', 'Србија', '', NULL, NULL, '2016-10-12 10:39:01'),
(86, 'Александар', 'Максимовић', '2602988710323', '1988-02-26 11:30:23', 'Савски Венац, Београд', 3, '063 7168012', 'Плитвичка 57', 'a.maksimovic@gmail.com', 'Душан', '064 2371333', 'Грађевинско техничка школа', 'Београд', '', 0, 1, 0, NULL, 76, 174, NULL, 1, 40, 0, NULL, 'септембарски', '1084/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-29 09:30:23', '2016-10-12 08:39:54', 0, 'Србија', 'Србија', '2007', NULL, NULL, '2016-10-12 10:39:54'),
(87, 'Павле', 'Рогановић', '2708995230011', '1995-08-27 10:15:32', 'Котор', 50, '062 8162246', 'Љубише Веснића 24, Ужице', 'pavleroganovic@hotmail.com', 'Жељко', '38263213311', 'Ренаиссанце Академија', 'Лос Анђелес', '', 0, 2, 3.84, NULL, 84, 187, NULL, 1, 30, 46.11, NULL, 'септембарском', '1085/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-30 08:15:32', '2016-10-12 08:40:12', 76.11, 'Америка', 'Црна Гора', '', NULL, NULL, '2016-10-12 10:40:12'),
(88, 'Владмир ', 'Данко', '2307996800062', '1996-07-23 10:39:43', 'Нови Сад', 50, '061 6213556', 'Романијска 18 , Футог', 'dankovladimir@rocketmail.com', 'Снежана', '060 6101064', 'Економска школа " Свети Никола"', 'Нови Сад', 'кулинарски техничар', 0, 1, 0, NULL, 61, 172, NULL, 1, 0, 0, NULL, '', '1086/2016', 1, 0, 2, 1, 2, 0, 1, 0, '2016-09-30 08:28:21', '2016-10-14 08:39:43', 0, 'Србија', 'Србија', '', NULL, NULL, '2016-10-12 10:39:43'),
(89, 'Стефан ', 'Милић', '3101997710136', '1997-01-31 12:05:10', 'Савски Венац, Београд', 38, '061 1358240', 'Стевана Христића 5', 'stefan10milic@gmail.com', 'Милић Лепосава', '061 1358240', 'Прва економска школа ', 'Београд', '', 0, 1, 0, NULL, 81, 180, NULL, 1, 52, 0, NULL, '', '1078/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-09-30 10:05:10', '2016-10-12 08:39:03', 0, 'Србија', 'Србија', '', NULL, NULL, '2016-10-12 10:39:03'),
(90, 'Марко', 'Караклић', '2801997710266', '1997-01-28 12:16:30', 'Савски Венац, Београд', 50, '063 1073782', 'Марка Челедоновића 39', 'markokaraklic97@gmail.com', 'Тијана', '063 371275', 'Земунска гимназија', 'Земун, Београд', 'природно математички', 0, 3, 2.77, NULL, 0, 0, NULL, 1, 56, 33.27, NULL, 'септембарски', '1087/2016', 1, 0, 2, 1, 1, 0, 1, 0, '2016-09-30 10:16:30', '2016-10-12 08:40:20', 89.27, 'Србија', 'Србија', '2015', NULL, NULL, '2016-10-12 10:40:20'),
(92, 'Андрија', 'Шљукић', '0809995710254', '1995-09-08 09:05:41', 'Савски Венац, Београд', 50, '062 822222', 'Мајора Бранка Вукосављевића126', 'andrija.sljukic95@gmail.com', 'Ивана', '063 411711', 'Гимназија" Руђер Бошковић"', 'Београд', 'Општи', 0, 3, 3.06, NULL, 96, 196, NULL, 1, 0, 36.72, NULL, '', '1079/2016', 1, 0, 1, 1, 1, 0, 1, 0, '2016-10-12 07:05:41', '2016-10-12 08:39:11', 0, 'Србија', 'Србија', '', NULL, NULL, '2016-10-12 10:39:11'),
(93, 'Оливера', 'Мутић', '0301975715272', '1975-01-03 08:55:55', 'Савски Венац, Београд', 1, '0611784420', 'Градиште 23,Београд', 'olivera.mutic@gmail.com', 'Бранко', '011 3434504', '', '', '', 0, 1, 0, NULL, 62, 169, NULL, 1, 0, 0, NULL, '', NULL, 1, 0, 2, 1, 4, 0, 1, 0, '2016-10-12 09:42:36', '2016-10-13 06:55:55', 0, '', 'Србија', '', NULL, NULL, '2016-10-12 08:55:55'),
(94, 'Марко', 'Миљковић', '0903991710086', NULL, 'Савски Венац, Београд', 0, '064 8141034', '7 улица Грге Андријановића 16', 'misko.nestor1@gmai.com', NULL, NULL, 'Факултет за спорт" Унион Никола Тесла"', 'Београд', 'тренер у спорту', 0, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, 'септембарски', '2008/2016', 1, 0, 4, 2, 1, 0, 1, 0, '2016-10-13 09:12:21', '2016-10-13 09:12:31', NULL, 'Србија', 'Србија', '2016', NULL, NULL, '2016-10-13 11:12:31'),
(95, 'Вељко', 'Савичевић', '1908978710196', '1978-08-19 10:39:06', 'Савски Венац, Београд', 35, '064 1654753', 'Милутина Миланковића124/72 ', 'savazemun@hotmail.com', 'Бранислав', '/', 'Виша туристичка школа', 'Нови Београд, Београд', '', 0, 2, 3.74, NULL, 117, 186, NULL, 1, 0, 44.91, NULL, 'септембарски', NULL, 1, 0, 2, 1, 2, 0, 1, 0, '2016-10-14 08:35:34', '2016-10-14 08:39:06', 0, 'Србија', 'Србија', '', NULL, NULL, '2016-10-14 10:39:06'),
(96, 'Слободан ', 'Јовановић', '1902997710166', '1997-02-19 11:29:45', 'Савски Венац, Београд', 43, '064 1630135', 'Народних Хероја 5/45', 'springtield.dec.1891@gmail.com', 'Слађана', '064 6121803', 'Девета гимназија "Михајло Петровић Алас"', 'Београд', 'природно математички', 0, 2, 4.1, NULL, 84, 193, NULL, 1, 50, 49.2, NULL, 'септембарски', NULL, 1, 0, 2, 1, 1, 0, 1, 0, '2016-10-14 09:24:23', '2016-10-14 09:29:45', 99.2, 'Србија', 'Србија', '2015', NULL, NULL, '2016-10-14 11:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `kandidat_prilozena_dokumenta`
--

DROP TABLE IF EXISTS `kandidat_prilozena_dokumenta`;
CREATE TABLE IF NOT EXISTS `kandidat_prilozena_dokumenta` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kandidat_id` int(10) UNSIGNED NOT NULL,
  `prilozenaDokumenta_id` int(10) UNSIGNED NOT NULL,
  `indikatorAktivan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kandidat_prilozena_dokumenta_prilozenadokumenta_id_index` (`prilozenaDokumenta_id`)
) ENGINE=MyISAM AUTO_INCREMENT=602 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kandidat_prilozena_dokumenta`
--

INSERT INTO `kandidat_prilozena_dokumenta` (`id`, `kandidat_id`, `prilozenaDokumenta_id`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(553, 2, 8, 1, '2016-10-12 08:58:28', '2016-10-12 08:58:28'),
(552, 2, 7, 1, '2016-10-12 08:58:28', '2016-10-12 08:58:28'),
(551, 2, 6, 1, '2016-10-12 08:58:28', '2016-10-12 08:58:28'),
(550, 2, 5, 1, '2016-10-12 08:58:28', '2016-10-12 08:58:28'),
(571, 4, 4, 1, '2016-10-13 08:13:13', '2016-10-13 08:13:13'),
(570, 4, 3, 1, '2016-10-13 08:13:13', '2016-10-13 08:13:13'),
(569, 4, 2, 1, '2016-10-13 08:13:13', '2016-10-13 08:13:13'),
(568, 4, 1, 1, '2016-10-13 08:13:13', '2016-10-13 08:13:13'),
(427, 8, 4, 1, '2016-09-25 15:06:06', '2016-09-25 15:06:06'),
(426, 8, 3, 1, '2016-09-25 15:06:06', '2016-09-25 15:06:06'),
(425, 8, 2, 1, '2016-09-25 15:06:06', '2016-09-25 15:06:06'),
(424, 8, 1, 1, '2016-09-25 15:06:06', '2016-09-25 15:06:06'),
(495, 7, 4, 1, '2016-09-27 17:50:42', '2016-09-27 17:50:42'),
(494, 7, 3, 1, '2016-09-27 17:50:42', '2016-09-27 17:50:42'),
(493, 7, 2, 1, '2016-09-27 17:50:42', '2016-09-27 17:50:42'),
(492, 7, 1, 1, '2016-09-27 17:50:42', '2016-09-27 17:50:42'),
(431, 9, 4, 1, '2016-09-25 15:06:28', '2016-09-25 15:06:28'),
(430, 9, 3, 1, '2016-09-25 15:06:28', '2016-09-25 15:06:28'),
(429, 9, 2, 1, '2016-09-25 15:06:28', '2016-09-25 15:06:28'),
(428, 9, 1, 1, '2016-09-25 15:06:28', '2016-09-25 15:06:28'),
(439, 11, 4, 1, '2016-09-25 15:25:24', '2016-09-25 15:25:24'),
(438, 11, 3, 1, '2016-09-25 15:25:24', '2016-09-25 15:25:24'),
(437, 11, 2, 1, '2016-09-25 15:25:24', '2016-09-25 15:25:24'),
(436, 11, 1, 1, '2016-09-25 15:25:24', '2016-09-25 15:25:24'),
(499, 10, 4, 1, '2016-09-27 17:52:58', '2016-09-27 17:52:58'),
(498, 10, 3, 1, '2016-09-27 17:52:58', '2016-09-27 17:52:58'),
(497, 10, 2, 1, '2016-09-27 17:52:58', '2016-09-27 17:52:58'),
(496, 10, 1, 1, '2016-09-27 17:52:58', '2016-09-27 17:52:58'),
(83, 13, 4, 1, '2016-09-01 08:48:28', '2016-09-01 08:48:28'),
(82, 13, 3, 1, '2016-09-01 08:48:28', '2016-09-01 08:48:28'),
(81, 13, 2, 1, '2016-09-01 08:48:28', '2016-09-01 08:48:28'),
(80, 13, 1, 1, '2016-09-01 08:48:28', '2016-09-01 08:48:28'),
(423, 14, 4, 1, '2016-09-25 15:05:41', '2016-09-25 15:05:41'),
(422, 14, 3, 1, '2016-09-25 15:05:41', '2016-09-25 15:05:41'),
(421, 14, 2, 1, '2016-09-25 15:05:41', '2016-09-25 15:05:41'),
(420, 14, 1, 1, '2016-09-25 15:05:41', '2016-09-25 15:05:41'),
(72, 15, 1, 1, '2016-09-01 08:44:06', '2016-09-01 08:44:06'),
(73, 15, 2, 1, '2016-09-01 08:44:06', '2016-09-01 08:44:06'),
(74, 15, 3, 1, '2016-09-01 08:44:06', '2016-09-01 08:44:06'),
(75, 15, 4, 1, '2016-09-01 08:44:06', '2016-09-01 08:44:06'),
(435, 16, 4, 1, '2016-09-25 15:22:36', '2016-09-25 15:22:36'),
(434, 16, 3, 1, '2016-09-25 15:22:36', '2016-09-25 15:22:36'),
(433, 16, 2, 1, '2016-09-25 15:22:36', '2016-09-25 15:22:36'),
(432, 16, 1, 1, '2016-09-25 15:22:36', '2016-09-25 15:22:36'),
(88, 17, 1, 1, '2016-09-01 09:01:31', '2016-09-01 09:01:31'),
(89, 17, 2, 1, '2016-09-01 09:01:31', '2016-09-01 09:01:31'),
(90, 17, 3, 1, '2016-09-01 09:01:31', '2016-09-01 09:01:31'),
(443, 18, 4, 1, '2016-09-25 15:28:30', '2016-09-25 15:28:30'),
(442, 18, 3, 1, '2016-09-25 15:28:30', '2016-09-25 15:28:30'),
(441, 18, 2, 1, '2016-09-25 15:28:30', '2016-09-25 15:28:30'),
(440, 18, 1, 1, '2016-09-25 15:28:30', '2016-09-25 15:28:30'),
(95, 19, 1, 1, '2016-09-01 09:12:18', '2016-09-01 09:12:18'),
(96, 19, 2, 1, '2016-09-01 09:12:18', '2016-09-01 09:12:18'),
(97, 19, 3, 1, '2016-09-01 09:12:18', '2016-09-01 09:12:18'),
(98, 19, 4, 1, '2016-09-01 09:12:18', '2016-09-01 09:12:18'),
(503, 20, 4, 1, '2016-09-27 17:54:09', '2016-09-27 17:54:09'),
(502, 20, 3, 1, '2016-09-27 17:54:09', '2016-09-27 17:54:09'),
(501, 20, 2, 1, '2016-09-27 17:54:09', '2016-09-27 17:54:09'),
(500, 20, 1, 1, '2016-09-27 17:54:09', '2016-09-27 17:54:09'),
(103, 21, 1, 1, '2016-09-01 09:21:43', '2016-09-01 09:21:43'),
(104, 21, 2, 1, '2016-09-01 09:21:43', '2016-09-01 09:21:43'),
(105, 21, 3, 1, '2016-09-01 09:21:43', '2016-09-01 09:21:43'),
(106, 21, 4, 1, '2016-09-01 09:21:43', '2016-09-01 09:21:43'),
(107, 22, 1, 1, '2016-09-01 09:26:43', '2016-09-01 09:26:43'),
(108, 22, 2, 1, '2016-09-01 09:26:43', '2016-09-01 09:26:43'),
(109, 22, 3, 1, '2016-09-01 09:26:43', '2016-09-01 09:26:43'),
(110, 22, 4, 1, '2016-09-01 09:26:43', '2016-09-01 09:26:43'),
(479, 24, 8, 1, '2016-09-27 17:06:44', '2016-09-27 17:06:44'),
(478, 24, 7, 1, '2016-09-27 17:06:44', '2016-09-27 17:06:44'),
(477, 24, 6, 1, '2016-09-27 17:06:44', '2016-09-27 17:06:44'),
(476, 24, 5, 1, '2016-09-27 17:06:44', '2016-09-27 17:06:44'),
(475, 26, 4, 1, '2016-09-27 17:05:24', '2016-09-27 17:05:24'),
(474, 26, 3, 1, '2016-09-27 17:05:24', '2016-09-27 17:05:24'),
(473, 26, 2, 1, '2016-09-27 17:05:24', '2016-09-27 17:05:24'),
(472, 26, 1, 1, '2016-09-27 17:05:24', '2016-09-27 17:05:24'),
(557, 83, 8, 1, '2016-10-12 09:07:56', '2016-10-12 09:07:56'),
(556, 83, 7, 1, '2016-10-12 09:07:56', '2016-10-12 09:07:56'),
(555, 83, 6, 1, '2016-10-12 09:07:56', '2016-10-12 09:07:56'),
(554, 83, 5, 1, '2016-10-12 09:07:56', '2016-10-12 09:07:56'),
(123, 27, 5, 1, '2016-09-01 09:50:18', '2016-09-01 09:50:18'),
(124, 27, 6, 1, '2016-09-01 09:50:18', '2016-09-01 09:50:18'),
(125, 27, 7, 1, '2016-09-01 09:50:18', '2016-09-01 09:50:18'),
(126, 27, 8, 1, '2016-09-01 09:50:18', '2016-09-01 09:50:18'),
(127, 28, 1, 1, '2016-09-01 09:56:03', '2016-09-01 09:56:03'),
(128, 28, 2, 1, '2016-09-01 09:56:03', '2016-09-01 09:56:03'),
(129, 28, 3, 1, '2016-09-01 09:56:03', '2016-09-01 09:56:03'),
(130, 28, 4, 1, '2016-09-01 09:56:03', '2016-09-01 09:56:03'),
(131, 29, 1, 1, '2016-09-01 09:57:52', '2016-09-01 09:57:52'),
(132, 29, 2, 1, '2016-09-01 09:57:52', '2016-09-01 09:57:52'),
(133, 29, 3, 1, '2016-09-01 09:57:52', '2016-09-01 09:57:52'),
(134, 29, 4, 1, '2016-09-01 09:57:52', '2016-09-01 09:57:52'),
(135, 30, 1, 1, '2016-09-01 10:06:17', '2016-09-01 10:06:17'),
(136, 30, 2, 1, '2016-09-01 10:06:17', '2016-09-01 10:06:17'),
(137, 30, 3, 1, '2016-09-01 10:06:17', '2016-09-01 10:06:17'),
(138, 30, 4, 1, '2016-09-01 10:06:17', '2016-09-01 10:06:17'),
(139, 32, 1, 1, '2016-09-01 10:15:10', '2016-09-01 10:15:10'),
(140, 32, 2, 1, '2016-09-01 10:15:10', '2016-09-01 10:15:10'),
(141, 32, 3, 1, '2016-09-01 10:15:10', '2016-09-01 10:15:10'),
(142, 32, 4, 1, '2016-09-01 10:15:10', '2016-09-01 10:15:10'),
(143, 31, 1, 1, '2016-09-01 10:15:33', '2016-09-01 10:15:33'),
(144, 31, 2, 1, '2016-09-01 10:15:33', '2016-09-01 10:15:33'),
(145, 31, 3, 1, '2016-09-01 10:15:33', '2016-09-01 10:15:33'),
(146, 31, 4, 1, '2016-09-01 10:15:33', '2016-09-01 10:15:33'),
(147, 33, 1, 1, '2016-09-01 10:25:09', '2016-09-01 10:25:09'),
(148, 33, 2, 1, '2016-09-01 10:25:09', '2016-09-01 10:25:09'),
(149, 33, 3, 1, '2016-09-01 10:25:09', '2016-09-01 10:25:09'),
(150, 33, 4, 1, '2016-09-01 10:25:09', '2016-09-01 10:25:09'),
(151, 34, 1, 1, '2016-09-01 10:28:57', '2016-09-01 10:28:57'),
(152, 34, 2, 1, '2016-09-01 10:28:57', '2016-09-01 10:28:57'),
(153, 34, 3, 1, '2016-09-01 10:28:57', '2016-09-01 10:28:57'),
(154, 34, 4, 1, '2016-09-01 10:28:57', '2016-09-01 10:28:57'),
(155, 35, 1, 1, '2016-09-01 10:32:31', '2016-09-01 10:32:31'),
(156, 35, 2, 1, '2016-09-01 10:32:31', '2016-09-01 10:32:31'),
(157, 35, 3, 1, '2016-09-01 10:32:31', '2016-09-01 10:32:31'),
(158, 35, 4, 1, '2016-09-01 10:32:32', '2016-09-01 10:32:32'),
(159, 36, 1, 1, '2016-09-01 10:35:03', '2016-09-01 10:35:03'),
(160, 36, 2, 1, '2016-09-01 10:35:03', '2016-09-01 10:35:03'),
(161, 36, 3, 1, '2016-09-01 10:35:03', '2016-09-01 10:35:03'),
(162, 36, 4, 1, '2016-09-01 10:35:03', '2016-09-01 10:35:03'),
(163, 37, 1, 1, '2016-09-01 10:41:24', '2016-09-01 10:41:24'),
(164, 37, 2, 1, '2016-09-01 10:41:24', '2016-09-01 10:41:24'),
(165, 37, 3, 1, '2016-09-01 10:41:24', '2016-09-01 10:41:24'),
(166, 37, 4, 1, '2016-09-01 10:41:24', '2016-09-01 10:41:24'),
(167, 38, 1, 1, '2016-09-01 10:54:05', '2016-09-01 10:54:05'),
(168, 38, 2, 1, '2016-09-01 10:54:05', '2016-09-01 10:54:05'),
(169, 38, 3, 1, '2016-09-01 10:54:05', '2016-09-01 10:54:05'),
(170, 38, 4, 1, '2016-09-01 10:54:05', '2016-09-01 10:54:05'),
(171, 39, 1, 1, '2016-09-01 10:58:30', '2016-09-01 10:58:30'),
(172, 39, 2, 1, '2016-09-01 10:58:30', '2016-09-01 10:58:30'),
(173, 39, 3, 1, '2016-09-01 10:58:30', '2016-09-01 10:58:30'),
(447, 40, 4, 1, '2016-09-26 08:59:31', '2016-09-26 08:59:31'),
(446, 40, 3, 1, '2016-09-26 08:59:31', '2016-09-26 08:59:31'),
(445, 40, 2, 1, '2016-09-26 08:59:31', '2016-09-26 08:59:31'),
(444, 40, 1, 1, '2016-09-26 08:59:31', '2016-09-26 08:59:31'),
(178, 41, 5, 1, '2016-09-01 11:06:43', '2016-09-01 11:06:43'),
(179, 41, 6, 1, '2016-09-01 11:06:43', '2016-09-01 11:06:43'),
(180, 41, 7, 1, '2016-09-01 11:06:43', '2016-09-01 11:06:43'),
(181, 41, 8, 1, '2016-09-01 11:06:43', '2016-09-01 11:06:43'),
(372, 42, 4, 1, '2016-09-15 08:59:30', '2016-09-15 08:59:30'),
(371, 42, 3, 1, '2016-09-15 08:59:30', '2016-09-15 08:59:30'),
(370, 42, 2, 1, '2016-09-15 08:59:30', '2016-09-15 08:59:30'),
(369, 42, 1, 1, '2016-09-15 08:59:30', '2016-09-15 08:59:30'),
(186, 43, 1, 1, '2016-09-01 11:18:20', '2016-09-01 11:18:20'),
(187, 43, 2, 1, '2016-09-01 11:18:20', '2016-09-01 11:18:20'),
(188, 43, 3, 1, '2016-09-01 11:18:20', '2016-09-01 11:18:20'),
(189, 43, 4, 1, '2016-09-01 11:18:20', '2016-09-01 11:18:20'),
(360, 44, 8, 1, '2016-09-15 08:24:26', '2016-09-15 08:24:26'),
(359, 44, 7, 1, '2016-09-15 08:24:26', '2016-09-15 08:24:26'),
(358, 44, 6, 1, '2016-09-15 08:24:26', '2016-09-15 08:24:26'),
(357, 44, 5, 1, '2016-09-15 08:24:26', '2016-09-15 08:24:26'),
(194, 46, 1, 1, '2016-09-02 04:55:41', '2016-09-02 04:55:41'),
(195, 46, 2, 1, '2016-09-02 04:55:41', '2016-09-02 04:55:41'),
(196, 46, 3, 1, '2016-09-02 04:55:41', '2016-09-02 04:55:41'),
(197, 46, 4, 1, '2016-09-02 04:55:41', '2016-09-02 04:55:41'),
(198, 48, 1, 1, '2016-09-02 05:10:34', '2016-09-02 05:10:34'),
(199, 48, 2, 1, '2016-09-02 05:10:34', '2016-09-02 05:10:34'),
(200, 48, 3, 1, '2016-09-02 05:10:34', '2016-09-02 05:10:34'),
(201, 48, 4, 1, '2016-09-02 05:10:34', '2016-09-02 05:10:34'),
(202, 49, 1, 1, '2016-09-02 05:13:07', '2016-09-02 05:13:07'),
(203, 49, 2, 1, '2016-09-02 05:13:07', '2016-09-02 05:13:07'),
(204, 49, 3, 1, '2016-09-02 05:13:07', '2016-09-02 05:13:07'),
(205, 49, 4, 1, '2016-09-02 05:13:07', '2016-09-02 05:13:07'),
(206, 51, 1, 1, '2016-09-02 05:24:45', '2016-09-02 05:24:45'),
(207, 51, 2, 1, '2016-09-02 05:24:45', '2016-09-02 05:24:45'),
(208, 51, 3, 1, '2016-09-02 05:24:45', '2016-09-02 05:24:45'),
(209, 51, 4, 1, '2016-09-02 05:24:45', '2016-09-02 05:24:45'),
(567, 50, 4, 1, '2016-10-13 07:08:52', '2016-10-13 07:08:52'),
(566, 50, 3, 1, '2016-10-13 07:08:52', '2016-10-13 07:08:52'),
(565, 50, 2, 1, '2016-10-13 07:08:52', '2016-10-13 07:08:52'),
(564, 50, 1, 1, '2016-10-13 07:08:52', '2016-10-13 07:08:52'),
(229, 52, 4, 1, '2016-09-02 05:48:51', '2016-09-02 05:48:51'),
(228, 52, 3, 1, '2016-09-02 05:48:51', '2016-09-02 05:48:51'),
(227, 52, 2, 1, '2016-09-02 05:48:51', '2016-09-02 05:48:51'),
(226, 52, 1, 1, '2016-09-02 05:48:51', '2016-09-02 05:48:51'),
(218, 53, 1, 1, '2016-09-02 05:37:07', '2016-09-02 05:37:07'),
(219, 53, 2, 1, '2016-09-02 05:37:07', '2016-09-02 05:37:07'),
(220, 53, 3, 1, '2016-09-02 05:37:07', '2016-09-02 05:37:07'),
(221, 53, 4, 1, '2016-09-02 05:37:07', '2016-09-02 05:37:07'),
(222, 54, 1, 1, '2016-09-02 05:47:09', '2016-09-02 05:47:09'),
(223, 54, 2, 1, '2016-09-02 05:47:09', '2016-09-02 05:47:09'),
(224, 54, 3, 1, '2016-09-02 05:47:09', '2016-09-02 05:47:09'),
(225, 54, 4, 1, '2016-09-02 05:47:09', '2016-09-02 05:47:09'),
(230, 55, 1, 1, '2016-09-02 05:49:43', '2016-09-02 05:49:43'),
(231, 55, 2, 1, '2016-09-02 05:49:43', '2016-09-02 05:49:43'),
(232, 55, 3, 1, '2016-09-02 05:49:43', '2016-09-02 05:49:43'),
(233, 55, 4, 1, '2016-09-02 05:49:43', '2016-09-02 05:49:43'),
(254, 56, 8, 1, '2016-09-02 07:21:40', '2016-09-02 07:21:40'),
(253, 56, 7, 1, '2016-09-02 07:21:40', '2016-09-02 07:21:40'),
(252, 56, 6, 1, '2016-09-02 07:21:40', '2016-09-02 07:21:40'),
(251, 56, 5, 1, '2016-09-02 07:21:40', '2016-09-02 07:21:40'),
(243, 58, 8, 1, '2016-09-02 06:59:17', '2016-09-02 06:59:17'),
(242, 58, 7, 1, '2016-09-02 06:59:17', '2016-09-02 06:59:17'),
(241, 58, 6, 1, '2016-09-02 06:59:17', '2016-09-02 06:59:17'),
(282, 59, 8, 1, '2016-09-07 07:45:47', '2016-09-07 07:45:47'),
(281, 59, 7, 1, '2016-09-07 07:45:47', '2016-09-07 07:45:47'),
(280, 59, 6, 1, '2016-09-07 07:45:47', '2016-09-07 07:45:47'),
(247, 60, 1, 1, '2016-09-02 07:17:31', '2016-09-02 07:17:31'),
(248, 60, 2, 1, '2016-09-02 07:17:31', '2016-09-02 07:17:31'),
(249, 60, 3, 1, '2016-09-02 07:17:31', '2016-09-02 07:17:31'),
(250, 60, 4, 1, '2016-09-02 07:17:31', '2016-09-02 07:17:31'),
(546, 61, 11, 1, '2016-10-02 16:37:37', '2016-10-02 16:37:37'),
(545, 61, 10, 1, '2016-10-02 16:37:37', '2016-10-02 16:37:37'),
(544, 61, 9, 1, '2016-10-02 16:37:37', '2016-10-02 16:37:37'),
(543, 62, 11, 1, '2016-10-02 16:37:23', '2016-10-02 16:37:23'),
(542, 62, 10, 1, '2016-10-02 16:37:23', '2016-10-02 16:37:23'),
(541, 62, 9, 1, '2016-10-02 16:37:23', '2016-10-02 16:37:23'),
(540, 63, 11, 1, '2016-10-02 16:37:04', '2016-10-02 16:37:04'),
(539, 63, 10, 1, '2016-10-02 16:37:04', '2016-10-02 16:37:04'),
(538, 63, 9, 1, '2016-10-02 16:37:04', '2016-10-02 16:37:04'),
(395, 64, 4, 1, '2016-09-22 10:17:24', '2016-09-22 10:17:24'),
(394, 64, 3, 1, '2016-09-22 10:17:24', '2016-09-22 10:17:24'),
(393, 64, 2, 1, '2016-09-22 10:17:24', '2016-09-22 10:17:24'),
(392, 64, 1, 1, '2016-09-22 10:17:24', '2016-09-22 10:17:24'),
(302, 65, 4, 1, '2016-09-07 09:13:30', '2016-09-07 09:13:30'),
(301, 65, 3, 1, '2016-09-07 09:13:30', '2016-09-07 09:13:30'),
(300, 65, 2, 1, '2016-09-07 09:13:30', '2016-09-07 09:13:30'),
(299, 65, 1, 1, '2016-09-07 09:13:30', '2016-09-07 09:13:30'),
(303, 66, 1, 1, '2016-09-07 10:00:02', '2016-09-07 10:00:02'),
(304, 66, 2, 1, '2016-09-07 10:00:02', '2016-09-07 10:00:02'),
(305, 66, 3, 1, '2016-09-07 10:00:02', '2016-09-07 10:00:02'),
(306, 66, 4, 1, '2016-09-07 10:00:02', '2016-09-07 10:00:02'),
(487, 67, 4, 1, '2016-09-27 17:36:33', '2016-09-27 17:36:33'),
(486, 67, 3, 1, '2016-09-27 17:36:33', '2016-09-27 17:36:33'),
(485, 67, 2, 1, '2016-09-27 17:36:33', '2016-09-27 17:36:33'),
(484, 67, 1, 1, '2016-09-27 17:36:33', '2016-09-27 17:36:33'),
(311, 68, 1, 1, '2016-09-09 08:04:25', '2016-09-09 08:04:25'),
(312, 68, 2, 1, '2016-09-09 08:04:25', '2016-09-09 08:04:25'),
(313, 68, 3, 1, '2016-09-09 08:04:25', '2016-09-09 08:04:25'),
(314, 68, 4, 1, '2016-09-09 08:04:25', '2016-09-09 08:04:25'),
(537, 69, 11, 1, '2016-10-02 16:36:45', '2016-10-02 16:36:45'),
(536, 69, 10, 1, '2016-10-02 16:36:45', '2016-10-02 16:36:45'),
(535, 69, 9, 1, '2016-10-02 16:36:45', '2016-10-02 16:36:45'),
(318, 70, 1, 1, '2016-09-12 05:59:31', '2016-09-12 05:59:31'),
(319, 70, 2, 1, '2016-09-12 05:59:31', '2016-09-12 05:59:31'),
(320, 70, 3, 1, '2016-09-12 05:59:31', '2016-09-12 05:59:31'),
(321, 70, 4, 1, '2016-09-12 05:59:31', '2016-09-12 05:59:31'),
(325, 71, 2, 1, '2016-09-12 06:14:34', '2016-09-12 06:14:34'),
(324, 71, 1, 1, '2016-09-12 06:14:34', '2016-09-12 06:14:34'),
(326, 72, 1, 1, '2016-09-14 05:55:06', '2016-09-14 05:55:06'),
(327, 72, 2, 1, '2016-09-14 05:55:06', '2016-09-14 05:55:06'),
(328, 72, 3, 1, '2016-09-14 05:55:06', '2016-09-14 05:55:06'),
(329, 72, 4, 1, '2016-09-14 05:55:06', '2016-09-14 05:55:06'),
(330, 73, 1, 1, '2016-09-14 06:09:48', '2016-09-14 06:09:48'),
(331, 73, 2, 1, '2016-09-14 06:09:48', '2016-09-14 06:09:48'),
(332, 73, 3, 1, '2016-09-14 06:09:48', '2016-09-14 06:09:48'),
(333, 73, 4, 1, '2016-09-14 06:09:48', '2016-09-14 06:09:48'),
(338, 74, 1, 1, '2016-09-15 08:08:59', '2016-09-15 08:08:59'),
(339, 74, 2, 1, '2016-09-15 08:08:59', '2016-09-15 08:08:59'),
(340, 74, 3, 1, '2016-09-15 08:08:59', '2016-09-15 08:08:59'),
(341, 74, 4, 1, '2016-09-15 08:08:59', '2016-09-15 08:08:59'),
(534, 75, 11, 1, '2016-10-02 16:36:23', '2016-10-02 16:36:23'),
(533, 75, 10, 1, '2016-10-02 16:36:23', '2016-10-02 16:36:23'),
(532, 75, 9, 1, '2016-10-02 16:36:23', '2016-10-02 16:36:23'),
(578, 76, 4, 1, '2016-10-13 09:14:07', '2016-10-13 09:14:07'),
(577, 76, 3, 1, '2016-10-13 09:14:07', '2016-10-13 09:14:07'),
(576, 76, 2, 1, '2016-10-13 09:14:07', '2016-10-13 09:14:07'),
(575, 76, 1, 1, '2016-10-13 09:14:07', '2016-10-13 09:14:07'),
(377, 77, 1, 1, '2016-09-20 09:58:57', '2016-09-20 09:58:57'),
(378, 77, 2, 1, '2016-09-20 09:58:57', '2016-09-20 09:58:57'),
(379, 77, 3, 1, '2016-09-20 09:58:57', '2016-09-20 09:58:57'),
(380, 77, 4, 1, '2016-09-20 09:58:57', '2016-09-20 09:58:57'),
(525, 78, 4, 1, '2016-10-02 16:30:00', '2016-10-02 16:30:00'),
(524, 78, 3, 1, '2016-10-02 16:30:00', '2016-10-02 16:30:00'),
(523, 78, 1, 1, '2016-10-02 16:30:00', '2016-10-02 16:30:00'),
(384, 79, 1, 1, '2016-09-21 05:59:12', '2016-09-21 05:59:12'),
(385, 79, 2, 1, '2016-09-21 05:59:12', '2016-09-21 05:59:12'),
(386, 79, 3, 1, '2016-09-21 05:59:12', '2016-09-21 05:59:12'),
(387, 79, 4, 1, '2016-09-21 05:59:12', '2016-09-21 05:59:12'),
(403, 80, 4, 1, '2016-09-23 05:53:01', '2016-09-23 05:53:01'),
(402, 80, 3, 1, '2016-09-23 05:53:01', '2016-09-23 05:53:01'),
(401, 80, 2, 1, '2016-09-23 05:53:01', '2016-09-23 05:53:01'),
(400, 80, 1, 1, '2016-09-23 05:53:01', '2016-09-23 05:53:01'),
(448, 81, 1, 1, '2016-09-27 09:52:23', '2016-09-27 09:52:23'),
(449, 81, 2, 1, '2016-09-27 09:52:23', '2016-09-27 09:52:23'),
(450, 81, 3, 1, '2016-09-27 09:52:23', '2016-09-27 09:52:23'),
(451, 81, 4, 1, '2016-09-27 09:52:23', '2016-09-27 09:52:23'),
(452, 82, 1, 1, '2016-09-27 10:01:02', '2016-09-27 10:01:02'),
(453, 82, 2, 1, '2016-09-27 10:01:02', '2016-09-27 10:01:02'),
(454, 82, 3, 1, '2016-09-27 10:01:02', '2016-09-27 10:01:02'),
(455, 82, 4, 1, '2016-09-27 10:01:02', '2016-09-27 10:01:02'),
(508, 84, 1, 1, '2016-09-29 07:04:28', '2016-09-29 07:04:28'),
(509, 84, 2, 1, '2016-09-29 07:04:28', '2016-09-29 07:04:28'),
(510, 84, 3, 1, '2016-09-29 07:04:28', '2016-09-29 07:04:28'),
(511, 84, 4, 1, '2016-09-29 07:04:28', '2016-09-29 07:04:28'),
(512, 87, 1, 1, '2016-09-30 08:19:30', '2016-09-30 08:19:30'),
(513, 87, 2, 1, '2016-09-30 08:19:30', '2016-09-30 08:19:30'),
(514, 87, 3, 1, '2016-09-30 08:19:30', '2016-09-30 08:19:30'),
(515, 87, 4, 1, '2016-09-30 08:19:30', '2016-09-30 08:19:30'),
(593, 88, 8, 1, '2016-10-14 08:39:43', '2016-10-14 08:39:43'),
(592, 88, 7, 1, '2016-10-14 08:39:43', '2016-10-14 08:39:43'),
(591, 88, 6, 1, '2016-10-14 08:39:43', '2016-10-14 08:39:43'),
(519, 90, 1, 1, '2016-09-30 10:18:10', '2016-09-30 10:18:10'),
(520, 90, 2, 1, '2016-09-30 10:18:10', '2016-09-30 10:18:10'),
(521, 90, 3, 1, '2016-09-30 10:18:10', '2016-09-30 10:18:10'),
(522, 90, 4, 1, '2016-09-30 10:18:10', '2016-09-30 10:18:10'),
(547, 92, 1, 1, '2016-10-12 07:07:49', '2016-10-12 07:07:49'),
(548, 92, 2, 1, '2016-10-12 07:07:49', '2016-10-12 07:07:49'),
(549, 92, 3, 1, '2016-10-12 07:07:49', '2016-10-12 07:07:49'),
(563, 93, 8, 1, '2016-10-13 06:55:55', '2016-10-13 06:55:55'),
(562, 93, 7, 1, '2016-10-13 06:55:55', '2016-10-13 06:55:55'),
(561, 93, 6, 1, '2016-10-13 06:55:55', '2016-10-13 06:55:55'),
(572, 94, 9, 1, '2016-10-13 09:12:21', '2016-10-13 09:12:21'),
(573, 94, 10, 1, '2016-10-13 09:12:21', '2016-10-13 09:12:21'),
(574, 94, 11, 1, '2016-10-13 09:12:21', '2016-10-13 09:12:21'),
(590, 95, 8, 1, '2016-10-14 08:39:06', '2016-10-14 08:39:06'),
(589, 95, 7, 1, '2016-10-14 08:39:06', '2016-10-14 08:39:06'),
(588, 95, 6, 1, '2016-10-14 08:39:06', '2016-10-14 08:39:06'),
(587, 95, 5, 1, '2016-10-14 08:39:06', '2016-10-14 08:39:06'),
(601, 96, 4, 1, '2016-10-14 09:29:45', '2016-10-14 09:29:45'),
(600, 96, 3, 1, '2016-10-14 09:29:45', '2016-10-14 09:29:45'),
(599, 96, 2, 1, '2016-10-14 09:29:45', '2016-10-14 09:29:45'),
(598, 96, 1, 1, '2016-10-14 09:29:45', '2016-10-14 09:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `krsna_slava`
--

DROP TABLE IF EXISTS `krsna_slava`;
CREATE TABLE IF NOT EXISTS `krsna_slava` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datumSlave` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `indikatorAktivan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `krsna_slava`
--

INSERT INTO `krsna_slava` (`id`, `naziv`, `datumSlave`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, 'Свети Игњатије Богоносац', '02.01.', 0, NULL, NULL),
(2, 'Свети Стефан', '09.01.', 0, NULL, NULL),
(3, 'Свети Василије', '14.01.', 0, NULL, NULL),
(4, 'Свети Јован Крститељ', '20.01.', 0, NULL, NULL),
(5, 'Свети Сава', '27.01.', 0, NULL, NULL),
(6, 'Часне вериге Светог Петра', '29.01.', 0, NULL, NULL),
(7, 'Света Три Јерарха', '12.02.', 0, NULL, NULL),
(8, 'Свети Трифун', '14.02.', 0, NULL, NULL),
(9, 'Сретење Господње', '15.02.', 0, NULL, NULL),
(10, 'Свети Симеон', '16.02.', 0, NULL, NULL),
(11, 'Светих 40 мученика - Младенци', '22.03.', 0, NULL, NULL),
(12, 'Свети Георгије - Ђурђевдан', '06.05.', 0, NULL, NULL),
(13, 'Свети Марко', '08.05.', 0, NULL, NULL),
(14, 'Свети Василије Острошки', '12.05.', 0, NULL, NULL),
(15, 'Свети пророк Јеремија', '14.05.', 0, NULL, NULL),
(16, 'Свети Јован Богослов', '21.05.', 0, NULL, NULL),
(17, 'Свети Никола летњи', '22.05.', 0, NULL, NULL),
(18, 'Свети Ћирило и Методије', '24.05.', 0, NULL, NULL),
(19, 'Свети Цар Константин и Царица', '03.06.', 0, NULL, NULL),
(20, 'Свети Цар Лазар - Видовдан', '28.06.', 0, NULL, NULL),
(21, 'Ивањдан', '07.07.', 0, NULL, NULL),
(22, 'Петровдан', '12.07.', 0, NULL, NULL),
(23, 'Свети Прокопије', '21.07.', 0, NULL, NULL),
(24, 'Свети Арханђел Гаврило', '26.07.', 0, NULL, NULL),
(25, 'Огњена Марија', '30.07.', 0, NULL, NULL),
(26, 'Свети Илија', '02.08.', 0, NULL, NULL),
(27, 'Блага Марија', '04.08.', 0, NULL, NULL),
(28, 'Свети Пантелејмон', '09.08.', 0, NULL, NULL),
(29, 'Свети Јован - Усековање', '11.09.', 0, NULL, NULL),
(30, 'Свети Јоаким и Ана', '22.09.', 0, NULL, NULL),
(31, 'Михољдан', '12.10.', 0, NULL, NULL),
(32, 'Покров Превете Богородице', '14.10.', 0, NULL, NULL),
(33, 'Свети Тома - Томиндан', '19.10.', 0, NULL, NULL),
(34, 'Свети Сергеј и Вакхо-Срђевдан', '20.10.', 0, NULL, NULL),
(35, 'Свети Петка - Параскева', '27.10.', 0, NULL, NULL),
(36, 'Свети Лука', '31.10.', 0, NULL, NULL),
(37, 'Свети Прохор Пчињски', '01.11.', 0, NULL, NULL),
(38, 'Свети Димитрије - Митровдан', '08.11.', 0, NULL, NULL),
(39, 'Свети Аврамије', '11.11.', 0, NULL, NULL),
(40, 'Свети Козма и Дамјан - Врачеви', '14.11.', 0, NULL, NULL),
(41, 'Свети Георгије - Ђурђиц', '16.11.', 0, NULL, NULL),
(42, 'Свети Арханђел Михајло', '21.11', 0, NULL, NULL),
(43, 'Свети Мрата - Мратиндан', '24.11.', 0, NULL, NULL),
(44, 'Свети Јован Милостиви', '25.11.', 0, NULL, NULL),
(45, 'Свети Јован Златоусти', '26.11.', 0, NULL, NULL),
(46, 'Свети Матеј', '29.11.', 0, NULL, NULL),
(47, 'Ваведење Пресвете Богородице', '04.12.', 0, NULL, NULL),
(48, 'Свети Алимпије', '09.12.', 0, NULL, NULL),
(49, 'Свети Андреј', '13.12.', 0, NULL, NULL),
(50, 'Свети Никола - Никољдан', '19.12.', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mesto`
--

DROP TABLE IF EXISTS `mesto`;
CREATE TABLE IF NOT EXISTS `mesto` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opstina_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mesto_opstina_id_index` (`opstina_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_05_12_144040_create_kandidat_table', 1),
('2016_05_14_121238_create_tip_studija_table', 1),
('2016_05_14_121602_create_studijski_program_table', 1),
('2016_05_14_121641_create_godina_studija_table', 1),
('2016_05_14_121738_create_skolska_god_upisa_table', 1),
('2016_05_14_121825_create_kandidat_prilozena_dokumenta_table', 1),
('2016_05_14_121933_create_prilozena_dokumenta_table', 1),
('2016_05_14_122005_create_sport_table', 1),
('2016_05_14_122113_create_sportsko_angazovanje_table', 1),
('2016_05_14_122139_create_status_studiranja_table', 1),
('2016_05_14_122356_create_srednje_skole_fakulteti_table', 1),
('2016_05_14_122417_create_uspeh_srednja_skola_table', 1),
('2016_05_14_122652_create_Opsti_Uspeh_table', 1),
('2016_05_14_122709_create_Krsna_Slava_table', 1),
('2016_05_14_122810_create_Region_table', 1),
('2016_05_14_122816_create_Opstina_table', 1),
('2016_05_14_122854_create_Mesto_table', 1),
('2016_05_14_122909_create_Predmet_table', 1),
('2016_07_03_071628_create_semestar_table', 1),
('2016_07_03_090503_create_ispitni_rok_table', 1),
('2016_07_03_100900_create_oblik_nastave_table', 1),
('2016_07_03_105335_create_tip_predmeta_table', 1),
('2016_07_03_112446_create_bodovanje_table', 1),
('2016_07_05_162918_create_status_kandidata_table', 1),
('2016_07_11_140927_create_status_ispita_table', 1),
('2016_07_11_161053_create_tip_semestra_table', 1),
('2016_07_19_071605_create_status_profesora_table', 1),
('2016_07_19_112308_create_tip_prijave_table', 1),
('2016_08_11_062414_create_ispiti_table', 1),
('2016_08_11_091208_create_upis_godine_table', 1),
('2016_08_15_083752_create_profesor_table', 1),
('2016_08_16_110404_create_profesor_predmet_table', 1),
('2016_08_18_150005_create_arhiv_indeksa_table', 1),
('2016_08_18_200117_create_prijava_ispita_table', 1),
('2016_08_19_210900_create_aktivni_ispitni_rokovi_table', 1),
('2016_08_21_161843_create_diploma_table', 1),
('2016_08_23_104623_create_diplomski_rad_table_create', 1),
('2016_08_24_144429_create_zapisnik_o_polaganju_ispita_table', 1),
('2016_08_24_164520_create_zapisnik_o_polaganju__student_table', 1),
('2016_08_24_164537_create_zapisnik_o_polaganju__studijski_program_table', 1),
('2016_08_25_195243_create_polozeni_ispiti_table', 1),
('2016_09_07_145028_create_predmet_program_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oblik_nastave`
--

DROP TABLE IF EXISTS `oblik_nastave`;
CREATE TABLE IF NOT EXISTS `oblik_nastave` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skrNaziv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indikatorAktivan` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oblik_nastave`
--

INSERT INTO `oblik_nastave` (`id`, `naziv`, `skrNaziv`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, 'предавања', 'П', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(2, 'вежбе', 'В', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(3, 'други облик наставе', 'ДОН', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `opstina`
--

DROP TABLE IF EXISTS `opstina`;
CREATE TABLE IF NOT EXISTS `opstina` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `opstina_region_id_index` (`region_id`)
) ENGINE=MyISAM AUTO_INCREMENT=205 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `opstina`
--

INSERT INTO `opstina` (`id`, `naziv`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 'Барајево, Београд', 1, NULL, NULL),
(2, 'Вождовац, Београд', 1, NULL, NULL),
(3, 'Врачар, Београд', 1, NULL, NULL),
(4, 'Гроцка, Београд', 1, NULL, NULL),
(5, 'Звездара, Београд', 1, NULL, NULL),
(6, 'Земун, Београд', 1, NULL, NULL),
(7, 'Лазаревац, Београд', 1, NULL, NULL),
(8, 'Младеновац, Београд', 1, NULL, NULL),
(9, 'Нови Београд, Београд', 1, NULL, NULL),
(10, 'Обреновац, Београд', 1, NULL, NULL),
(11, 'Палилула, Београд', 1, NULL, NULL),
(12, 'Раковица, Београд', 1, NULL, NULL),
(13, 'Савски Венац, Београд', 1, NULL, NULL),
(14, 'Сопот, Београд', 1, NULL, NULL),
(15, 'Стари град, Београд', 1, NULL, NULL),
(16, 'Сурчин, Београд', 1, NULL, NULL),
(17, 'Чукарица, Београд', 1, NULL, NULL),
(18, 'Шабац', 2, NULL, NULL),
(19, 'Богатић', 2, NULL, NULL),
(20, 'Лозница', 2, NULL, NULL),
(21, 'Владимирци', 2, NULL, NULL),
(22, 'Коцељева', 2, NULL, NULL),
(23, 'Мали Зворник', 2, NULL, NULL),
(24, 'Крупањ', 2, NULL, NULL),
(25, 'Љубовија', 2, NULL, NULL),
(26, 'Ваљево', 3, NULL, NULL),
(27, 'Осечина', 3, NULL, NULL),
(28, 'Уб', 3, NULL, NULL),
(29, 'Лајковац', 3, NULL, NULL),
(30, 'Мионица', 3, NULL, NULL),
(31, 'Љиг', 3, NULL, NULL),
(32, 'Смедерево', 4, NULL, NULL),
(33, 'Смедеревска Паланка', 4, NULL, NULL),
(34, 'Велика Плана', 4, NULL, NULL),
(35, 'Велико Градиште', 5, NULL, NULL),
(36, 'Пожаревац', 5, NULL, NULL),
(37, 'Голубац', 5, NULL, NULL),
(38, 'Мало Црниће', 5, NULL, NULL),
(39, 'Жабари', 5, NULL, NULL),
(40, 'Петровац на Млави', 5, NULL, NULL),
(41, 'Кучево', 5, NULL, NULL),
(42, 'Жагубица', 5, NULL, NULL),
(43, 'Крагујевац', 6, NULL, NULL),
(44, 'Аранђеловац', 6, NULL, NULL),
(45, 'Топола', 6, NULL, NULL),
(46, 'Рача', 6, NULL, NULL),
(47, 'Аеродром, Крагујевац', 6, NULL, NULL),
(48, 'Пивара, Крагујевац', 6, NULL, NULL),
(49, 'Станово, Крагујевац', 6, NULL, NULL),
(50, 'Стари град, Крагујевац', 6, NULL, NULL),
(51, 'Страгари, Крагујевац', 6, NULL, NULL),
(52, 'Баточина', 6, NULL, NULL),
(53, 'Кнић', 6, NULL, NULL),
(54, 'Лапово', 6, NULL, NULL),
(55, 'Јагодина', 7, NULL, NULL),
(56, 'Ћуприја', 7, NULL, NULL),
(57, 'Параћин', 7, NULL, NULL),
(58, 'Свилајнац', 7, NULL, NULL),
(59, 'Деспотовац', 7, NULL, NULL),
(60, 'Рековац', 7, NULL, NULL),
(61, 'Бор', 8, NULL, NULL),
(62, 'Кладово', 8, NULL, NULL),
(63, 'Мајданпек', 8, NULL, NULL),
(64, 'Неготин', 8, NULL, NULL),
(65, 'Бољевац', 9, NULL, NULL),
(66, 'Књажевац', 9, NULL, NULL),
(67, 'Зајечар', 9, NULL, NULL),
(68, 'Сокобања', 9, NULL, NULL),
(69, 'Бајина Башта', 10, NULL, NULL),
(70, 'Косјерић', 10, NULL, NULL),
(71, 'Ужице', 10, NULL, NULL),
(72, 'Пожега', 10, NULL, NULL),
(73, 'Чајетина', 10, NULL, NULL),
(74, 'Ариље', 10, NULL, NULL),
(75, 'Прибој', 10, NULL, NULL),
(76, 'Нова Варош', 10, NULL, NULL),
(77, 'Пријепоље', 10, NULL, NULL),
(78, 'Сјеница', 10, NULL, NULL),
(79, 'Чачак', 11, NULL, NULL),
(80, 'Горњи Милановац', 11, NULL, NULL),
(81, 'Лучани', 11, NULL, NULL),
(82, 'Ивањица', 11, NULL, NULL),
(83, 'Краљево', 12, NULL, NULL),
(84, 'Врњачка Бања', 12, NULL, NULL),
(85, 'Рашка', 12, NULL, NULL),
(86, 'Нови Пазар', 12, NULL, NULL),
(87, 'Тутин', 12, NULL, NULL),
(88, 'Варварин', 13, NULL, NULL),
(89, 'Трстеник', 13, NULL, NULL),
(90, 'Ћићевац', 13, NULL, NULL),
(91, 'Крушевац', 13, NULL, NULL),
(92, 'Александровац', 13, NULL, NULL),
(93, 'Брус', 13, NULL, NULL),
(94, 'Ниш', 14, NULL, NULL),
(95, 'Алексинац', 14, NULL, NULL),
(96, 'Сврљиг', 14, NULL, NULL),
(97, 'Мерошина', 14, NULL, NULL),
(98, 'Ражањ', 14, NULL, NULL),
(99, 'Медијана, Ниш', 14, NULL, NULL),
(100, 'Нишка Бања, Ниш', 14, NULL, NULL),
(101, 'Палилула, Ниш', 14, NULL, NULL),
(102, 'Пантелеј, Ниш', 14, NULL, NULL),
(103, 'Црвени Крст, Ниш', 14, NULL, NULL),
(104, 'Дољевац', 14, NULL, NULL),
(105, 'Гаџин Хан', 14, NULL, NULL),
(106, 'Прокупље', 15, NULL, NULL),
(107, 'Блаце', 15, NULL, NULL),
(108, 'Куршумлија', 15, NULL, NULL),
(109, 'Житорађа', 15, NULL, NULL),
(110, 'Бела Паланка', 16, NULL, NULL),
(111, 'Пирот', 16, NULL, NULL),
(112, 'Бабушница', 16, NULL, NULL),
(113, 'Димитровград', 16, NULL, NULL),
(114, 'Лесковац', 17, NULL, NULL),
(115, 'Бојник', 17, NULL, NULL),
(116, 'Лебане', 17, NULL, NULL),
(117, 'Медвеђа', 17, NULL, NULL),
(118, 'Власотинце', 17, NULL, NULL),
(119, 'Црна Трава', 17, NULL, NULL),
(120, 'Владичин Хан', 18, NULL, NULL),
(121, 'Сурдулица', 18, NULL, NULL),
(122, 'Босилеград', 18, NULL, NULL),
(123, 'Трговиште', 18, NULL, NULL),
(124, 'Врање', 18, NULL, NULL),
(125, 'Бујановац', 18, NULL, NULL),
(126, 'Прешево', 18, NULL, NULL),
(127, 'Подујево', 19, NULL, NULL),
(128, 'Обилић', 19, NULL, NULL),
(129, 'Приштина', 19, NULL, NULL),
(130, 'Косово Поље', 19, NULL, NULL),
(131, 'Глоговац', 19, NULL, NULL),
(132, 'Штимље', 19, NULL, NULL),
(133, 'Штрпце', 19, NULL, NULL),
(134, 'Урошевац', 19, NULL, NULL),
(135, 'Качаник', 19, NULL, NULL),
(136, 'Липљан', 19, NULL, NULL),
(137, 'Исток', 20, NULL, NULL),
(138, 'Пећ', 20, NULL, NULL),
(139, 'Клина', 20, NULL, NULL),
(140, 'Дечани', 20, NULL, NULL),
(141, 'Ђаковица', 20, NULL, NULL),
(142, 'Сува Река', 21, NULL, NULL),
(143, 'Ораховац', 21, NULL, NULL),
(144, 'Призрен', 21, NULL, NULL),
(145, 'Гора', 21, NULL, NULL),
(146, 'Зубин Поток', 22, NULL, NULL),
(147, 'Лепосавић', 22, NULL, NULL),
(148, 'Звечан', 22, NULL, NULL),
(149, 'Косовска Митровица', 22, NULL, NULL),
(150, 'Србица', 22, NULL, NULL),
(151, 'Вучитрн', 22, NULL, NULL),
(152, 'Косовска Каменица', 23, NULL, NULL),
(153, 'Ново Брдо', 23, NULL, NULL),
(154, 'Гњилане', 23, NULL, NULL),
(155, 'Витина', 23, NULL, NULL),
(156, 'Шид', 24, NULL, NULL),
(157, 'Стара Пазова', 24, NULL, NULL),
(158, 'Сремска Митровица', 24, NULL, NULL),
(159, 'Рума', 24, NULL, NULL),
(160, 'Пећинци', 24, NULL, NULL),
(161, 'Ириг', 24, NULL, NULL),
(162, 'Инђија', 24, NULL, NULL),
(163, 'Ада', 25, NULL, NULL),
(164, 'Кањижа', 25, NULL, NULL),
(165, 'Кикинда', 25, NULL, NULL),
(166, 'Нови Кнежевац', 25, NULL, NULL),
(167, 'Сента', 25, NULL, NULL),
(168, 'Чока', 25, NULL, NULL),
(169, 'Алибунар', 26, NULL, NULL),
(170, 'Бела Црква', 26, NULL, NULL),
(171, 'Вршац', 26, NULL, NULL),
(172, 'Ковачица', 26, NULL, NULL),
(173, 'Ковин', 26, NULL, NULL),
(174, 'Опово', 26, NULL, NULL),
(175, 'Панчево', 26, NULL, NULL),
(176, 'Пландиште', 26, NULL, NULL),
(177, 'Житиште', 27, NULL, NULL),
(178, 'Зрењанин', 27, NULL, NULL),
(179, 'Нова Црња', 27, NULL, NULL),
(180, 'Нови Бечеј', 27, NULL, NULL),
(181, 'Сечањ', 27, NULL, NULL),
(182, 'Бачка Топола', 28, NULL, NULL),
(183, 'Мали Иђош', 28, NULL, NULL),
(184, 'Суботица', 28, NULL, NULL),
(185, 'Апатин', 29, NULL, NULL),
(186, 'Кула', 29, NULL, NULL),
(187, 'Оџаци', 29, NULL, NULL),
(188, 'Сомбор', 29, NULL, NULL),
(189, 'Бач', 30, NULL, NULL),
(190, 'Бачка Паланка', 30, NULL, NULL),
(191, 'Бачки Петровац', 30, NULL, NULL),
(192, 'Беочин', 30, NULL, NULL),
(193, 'Бечеј', 30, NULL, NULL),
(194, 'Врбас', 30, NULL, NULL),
(195, 'Жабаљ', 30, NULL, NULL),
(196, 'Град Нови Сад', 30, NULL, NULL),
(197, 'Нови Сад', 30, NULL, NULL),
(198, 'Петроварадин, Нови Сад', 30, NULL, NULL),
(199, 'Србобран', 30, NULL, NULL),
(200, 'Сремски Карловци', 30, NULL, NULL),
(201, 'Темерин', 30, NULL, NULL),
(202, 'Тител', 30, NULL, NULL),
(204, 'Београд', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `opsti_uspeh`
--

DROP TABLE IF EXISTS `opsti_uspeh`;
CREATE TABLE IF NOT EXISTS `opsti_uspeh` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `opsti_uspeh`
--

INSERT INTO `opsti_uspeh` (`id`, `naziv`, `created_at`, `updated_at`) VALUES
(1, 'Одличан', '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(2, 'Врло добар', '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(3, 'Добар', '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(4, 'Довољан', '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(5, 'Недовољан', '2016-08-29 20:03:53', '2016-08-29 20:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polozeni_ispiti`
--

DROP TABLE IF EXISTS `polozeni_ispiti`;
CREATE TABLE IF NOT EXISTS `polozeni_ispiti` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prijava_id` int(11) NOT NULL,
  `zapisnik_id` int(11) NOT NULL,
  `kandidat_id` int(11) NOT NULL,
  `predmet_id` int(11) NOT NULL,
  `ocenaPismeni` int(11) NOT NULL,
  `ocenaUsmeni` int(11) NOT NULL,
  `konacnaOcena` int(11) NOT NULL,
  `brojBodova` int(11) NOT NULL,
  `statusIspita` int(11) NOT NULL,
  `odluka_id` int(11) NOT NULL,
  `indikatorAktivan` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `predmet`
--

DROP TABLE IF EXISTS `predmet`;
CREATE TABLE IF NOT EXISTS `predmet` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `predmet`
--

INSERT INTO `predmet` (`id`, `naziv`, `created_at`, `updated_at`) VALUES
(2, 'Агенцијско новинарство', NULL, '2016-09-12 13:31:42'),
(3, 'Mенаџмент у спортској рекреацији', NULL, '2016-09-12 13:35:18'),
(4, 'Безбедност у спорту', NULL, NULL),
(5, 'Биомеханика спорта', NULL, NULL),
(6, 'Дијагностика у спорту', NULL, NULL),
(7, 'Дипломски рад', NULL, NULL),
(8, 'Други страни  језик у спорту', NULL, NULL),
(9, 'Економика спорта', NULL, NULL),
(10, 'Енглески језик 1', NULL, NULL),
(11, 'Енглески језик 2', NULL, NULL),
(12, 'Етика и кодекс новинарства', NULL, NULL),
(13, 'Етика у спорту', NULL, NULL),
(14, 'Индустрија спорта', NULL, NULL),
(15, 'Информатика са статистиком у спорту', NULL, NULL),
(16, 'Историја спорта и олимпизам', NULL, NULL),
(17, 'Јавно мњење', NULL, NULL),
(18, 'Комуникологија', NULL, NULL),
(19, 'Кондиционирање  спортиста по изабраном спорту', NULL, NULL),
(20, 'Кризни менаџмент', NULL, NULL),
(21, 'Лидерство у спорту', NULL, NULL),
(22, 'Маркетинг и промоција у спорту', NULL, NULL),
(23, 'Маркетинг у спорту', NULL, NULL),
(24, 'Менаџмент спортских објеката', NULL, NULL),
(25, 'Менаџмент спортских организација', NULL, NULL),
(26, 'Менаџмент спортских такмичења', NULL, NULL),
(27, 'Менаџмент у медијима', NULL, NULL),
(28, 'Менаџмент у спортској рекреацији', NULL, NULL),
(29, 'Менаџмент у спорту', NULL, NULL),
(30, 'Мултимедији и графика', NULL, NULL),
(31, 'Новинарске форме', NULL, NULL),
(32, 'Основи новинарства', NULL, NULL),
(33, 'Педагогија спорта', NULL, NULL),
(34, 'Писмено и усмено изражавање', NULL, NULL),
(35, 'Пословна комуникација', NULL, NULL),
(36, 'ПР у новинарству', NULL, NULL),
(37, 'ПР у спорту', NULL, NULL),
(38, 'Правила по спортовима', NULL, NULL),
(39, 'Правила у индивидуалним спортовима', NULL, NULL),
(40, 'Правила у колективним спортовима', NULL, NULL),
(41, 'Право новинарства', NULL, NULL),
(42, 'Предузетништво у спорту', NULL, NULL),
(43, 'Програмирање такмичарске форме', NULL, NULL),
(44, 'Промоција у спорту', NULL, NULL),
(45, 'Психологија спорта', NULL, NULL),
(46, 'Развијање истраживачких вештина у новинарству', NULL, NULL),
(47, 'Селекција у спорту', NULL, NULL),
(48, 'Скаутинг у спорту', NULL, NULL),
(49, 'Социологија спорта', NULL, NULL),
(50, 'Спонзорство у спорту', NULL, NULL),
(51, 'Спорстко право', NULL, NULL),
(52, 'Спорт посебних група', NULL, NULL),
(53, 'Спортска медицина', NULL, NULL),
(54, 'Спортске вести и извештавање', NULL, NULL),
(55, 'Спортски туризам', NULL, NULL),
(56, 'Спортско новинарство у он-лине магазинима и интернету', NULL, NULL),
(57, 'Спортско новинарство у штампаним медијима', NULL, NULL),
(58, 'Спортско право', NULL, NULL),
(59, 'Спортско радио новинарство', NULL, NULL),
(60, 'Спортско ТВ новинарство', NULL, NULL),
(61, 'Стилистика и реторика', NULL, NULL),
(62, 'Стратегијски менаџмент', NULL, NULL),
(63, 'Стручна пракса', NULL, NULL),
(64, 'Теорија и технике новинарства', NULL, NULL),
(65, 'Теорија спорта', NULL, NULL),
(66, 'Теорија спортског тренинга', NULL, NULL),
(67, 'Техника и тактика у спорту', NULL, NULL),
(68, 'Увод у менаџмент', NULL, NULL),
(69, 'Управљање квалитетом у спорту', NULL, NULL),
(70, 'Управљање људским ресурсима', NULL, NULL),
(71, 'Управљање променама', NULL, NULL),
(72, 'Уређивачка политика', NULL, NULL),
(73, 'Физиологија са биохемијом спорта', NULL, NULL),
(74, 'Физичке припреме по спортовима', NULL, NULL),
(75, 'Фитнес и здравље', NULL, NULL),
(76, 'Функционална анатомија', NULL, NULL),
(77, 'Хигијена и исхрана спортиста', NULL, NULL),
(78, 'Антропомоторика', '2016-09-12 13:35:26', '2016-09-12 13:35:26'),
(79, 'Пословне финансије', '2016-10-16 08:28:32', '2016-10-16 08:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `predmet_program`
--

DROP TABLE IF EXISTS `predmet_program`;
CREATE TABLE IF NOT EXISTS `predmet_program` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `studijskiProgram_id` int(11) DEFAULT NULL,
  `godinaStudija_id` int(10) UNSIGNED NOT NULL,
  `semestar` int(10) UNSIGNED NOT NULL,
  `predmet_id` int(11) DEFAULT NULL,
  `tipPredmeta_id` int(11) NOT NULL,
  `tipStudija_id` int(11) NOT NULL,
  `espb` int(11) NOT NULL,
  `statusPredmeta` int(11) NOT NULL,
  `predavanja` int(11) NOT NULL,
  `vezbe` int(11) NOT NULL,
  `indikatorAktivan` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `skolskaGodina_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `predmet_program_godinastudija_id_index` (`godinaStudija_id`),
  KEY `predmet_program_semestar_index` (`semestar`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `predmet_program`
--

INSERT INTO `predmet_program` (`id`, `studijskiProgram_id`, `godinaStudija_id`, `semestar`, `predmet_id`, `tipPredmeta_id`, `tipStudija_id`, `espb`, `statusPredmeta`, `predavanja`, `vezbe`, `indikatorAktivan`, `created_at`, `updated_at`, `skolskaGodina_id`) VALUES
(15, 1, 1, 1, 15, 1, 1, 7, 1, 2, 2, 1, '2016-10-16 07:48:18', '2016-10-16 07:48:18', 2),
(16, 1, 1, 1, 68, 1, 1, 8, 1, 3, 3, 1, '2016-10-16 07:48:52', '2016-10-16 07:48:52', 3),
(17, 1, 1, 1, 49, 1, 1, 7, 1, 2, 2, 1, '2016-10-16 07:49:32', '2016-10-16 07:49:32', 2),
(18, 1, 1, 1, 76, 1, 1, 7, 1, 2, 2, 1, '2016-10-16 07:50:04', '2016-10-16 07:50:04', 2),
(19, 1, 1, 2, 73, 1, 1, 8, 1, 3, 3, 1, '2016-10-16 07:50:45', '2016-10-16 07:50:45', 3),
(20, 1, 1, 2, 65, 1, 1, 8, 1, 3, 3, 1, '2016-10-16 07:51:15', '2016-10-16 07:51:15', 3),
(21, 1, 1, 2, 16, 1, 1, 8, 1, 3, 3, 1, '2016-10-16 07:51:45', '2016-10-16 07:51:45', 3),
(22, 1, 1, 2, 10, 1, 1, 7, 1, 2, 2, 1, '2016-10-16 07:52:18', '2016-10-16 07:52:18', 2),
(23, 1, 2, 3, 45, 1, 1, 7, 1, 2, 2, 1, '2016-10-16 07:59:56', '2016-10-16 07:59:56', 2),
(24, 1, 2, 3, 42, 1, 1, 8, 1, 3, 3, 1, '2016-10-16 08:00:50', '2016-10-16 08:00:50', 3),
(25, 1, 2, 3, 29, 1, 1, 8, 1, 3, 3, 1, '2016-10-16 08:03:40', '2016-10-16 08:03:40', 3),
(26, 1, 2, 3, 58, 2, 1, 7, 1, 2, 2, 1, '2016-10-16 08:04:47', '2016-10-16 08:04:47', 2),
(27, 1, 2, 3, 5, 2, 1, 7, 1, 2, 2, 1, '2016-10-16 08:05:17', '2016-10-16 08:05:17', 2),
(28, 1, 2, 4, 23, 1, 1, 8, 1, 3, 3, 1, '2016-10-16 08:05:48', '2016-10-16 08:05:48', 3),
(29, 1, 2, 4, 11, 1, 1, 7, 1, 2, 2, 1, '2016-10-16 08:25:30', '2016-10-16 08:25:30', 2),
(30, 1, 2, 4, 13, 1, 1, 8, 1, 3, 3, 1, '2016-10-16 08:26:15', '2016-10-16 08:26:15', 3),
(31, 1, 2, 4, 9, 2, 1, 7, 1, 2, 2, 1, '2016-10-16 08:26:50', '2016-10-16 08:26:50', 2),
(32, 1, 2, 4, 66, 2, 1, 7, 1, 2, 2, 1, '2016-10-16 08:27:21', '2016-10-16 08:27:21', 2),
(33, 1, 3, 5, 79, 1, 1, 7, 1, 2, 2, 1, '2016-10-16 08:28:58', '2016-10-16 08:28:58', 2),
(46, 1, 4, 7, 24, 1, 1, 8, 1, 3, 4, 1, '2016-10-16 08:41:56', '2016-10-16 08:41:56', 4),
(35, 1, 3, 5, 70, 1, 1, 8, 1, 3, 3, 1, '2016-10-16 08:29:53', '2016-10-16 08:29:53', 3),
(36, 1, 3, 5, 35, 1, 1, 7, 1, 2, 2, 1, '2016-10-16 08:30:32', '2016-10-16 08:30:32', 2),
(37, 1, 3, 5, 62, 1, 1, 8, 1, 3, 3, 1, '2016-10-16 08:31:07', '2016-10-16 08:31:07', 3),
(38, 1, 3, 6, 8, 1, 1, 7, 1, 2, 2, 1, '2016-10-16 08:31:44', '2016-10-16 08:31:44', 2),
(39, 1, 3, 6, 44, 2, 1, 8, 1, 3, 3, 1, '2016-10-16 08:32:26', '2016-10-16 08:32:26', 3),
(40, 1, 3, 6, 37, 2, 1, 8, 1, 3, 3, 1, '2016-10-16 08:32:48', '2016-10-16 08:32:48', 3),
(41, 1, 3, 6, 28, 2, 1, 7, 1, 2, 2, 1, '2016-10-16 08:33:25', '2016-10-16 08:33:25', 2),
(42, 1, 3, 6, 55, 2, 1, 7, 1, 2, 2, 1, '2016-10-16 08:33:58', '2016-10-16 08:33:58', 2),
(43, 1, 3, 6, 50, 2, 1, 8, 1, 3, 3, 1, '2016-10-16 08:34:37', '2016-10-16 08:34:37', 3),
(44, 1, 3, 6, 14, 2, 1, 8, 1, 3, 3, 1, '2016-10-16 08:35:10', '2016-10-16 08:35:10', 3),
(45, 1, 4, 7, 69, 1, 1, 8, 1, 3, 4, 1, '2016-10-16 08:38:18', '2016-10-16 08:38:18', 4),
(47, 1, 4, 7, 26, 1, 1, 7, 1, 2, 2, 1, '2016-10-16 08:42:37', '2016-10-16 08:42:37', 2),
(48, 1, 4, 7, 25, 1, 1, 7, 1, 2, 2, 1, '2016-10-16 08:43:14', '2016-10-16 08:43:14', 2),
(49, 1, 4, 8, 8, 1, 1, 7, 1, 2, 2, 1, '2016-10-16 08:43:56', '2016-10-16 08:43:56', 2),
(50, 1, 4, 8, 21, 2, 1, 8, 1, 4, 4, 1, '2016-10-16 08:46:27', '2016-10-16 08:46:27', 1),
(51, 1, 4, 8, 20, 2, 1, 8, 1, 4, 4, 1, '2016-10-16 08:46:59', '2016-10-16 08:46:59', 1),
(52, 1, 4, 8, 4, 2, 1, 7, 1, 2, 2, 1, '2016-10-16 08:49:57', '2016-10-16 08:49:57', 1),
(53, 1, 4, 8, 71, 2, 1, 7, 1, 2, 2, 1, '2016-10-16 08:50:30', '2016-10-16 08:50:30', 1),
(54, 1, 4, 8, 63, 1, 1, 4, 1, 1, 1, 1, '2016-10-16 08:51:48', '2016-10-16 08:51:48', 1),
(55, 1, 4, 8, 7, 1, 1, 4, 1, 1, 1, 1, '2016-10-16 08:52:15', '2016-10-16 08:52:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prijava_ispita`
--

DROP TABLE IF EXISTS `prijava_ispita`;
CREATE TABLE IF NOT EXISTS `prijava_ispita` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kandidat_id` int(11) NOT NULL,
  `predmet_id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL,
  `rok_id` int(11) NOT NULL,
  `brojPolaganja` int(11) NOT NULL,
  `datum` date NOT NULL,
  `tipPrijave_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prilozena_dokumenta`
--

DROP TABLE IF EXISTS `prilozena_dokumenta`;
CREATE TABLE IF NOT EXISTS `prilozena_dokumenta` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `skolskaGodina_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `redniBrojDokumenta` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prilozena_dokumenta`
--

INSERT INTO `prilozena_dokumenta` (`id`, `skolskaGodina_id`, `naziv`, `redniBrojDokumenta`, `created_at`, `updated_at`) VALUES
(1, '1', 'Диплома о завршено средњој школи', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(2, '1', 'Сведочанства из средње школе (све четири године)', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(3, '1', 'Извод из матичне књиге рођених', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(4, '1', '3 фотографије', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(5, '2', 'Диплома о завршеној високој школи', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(6, '2', 'Уверење о положеним испитима', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(7, '2', 'Извод из матичне књиге рођених', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(8, '2', '3 фотографије', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(9, '3', 'Уверење о дипломирању', 1, '2016-09-01 07:08:20', '2016-09-01 07:10:00'),
(10, '3', 'Извод из матичне књиге рођених', 2, '2016-09-01 07:09:28', '2016-09-01 07:09:28'),
(11, '3', '3 фотографије', 3, '2016-09-01 07:10:20', '2016-09-01 07:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
CREATE TABLE IF NOT EXISTS `profesor` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `jmbg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prezime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `zvanje` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kabinet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indikatorAktivan` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profesor`
--

INSERT INTO `profesor` (`id`, `jmbg`, `ime`, `prezime`, `telefon`, `status_id`, `zvanje`, `kabinet`, `mail`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, '', 'Радивоје', 'Петровић', '', 2, '', '', '', 0, '2016-08-29 20:03:53', '2016-08-30 07:38:06'),
(3, '2512985840006', 'Немања', 'Ћопић', '063661 996', 4, '', '12', 'nemanja.copic@fzs.edu.rs', 1, '2016-08-30 07:39:38', '2016-08-30 07:39:38'),
(4, '', 'Игор', 'Радошевић', '', 4, '', '', '', 1, '2016-08-30 07:40:17', '2016-08-30 07:40:17'),
(5, '', 'Иванка', 'Гајић', '', 1, '', '', '', 0, '2016-09-14 18:45:46', '2016-09-14 18:50:56'),
(6, '', 'Милан ', 'Михајловић', '', 1, '', '', '', 1, '2016-09-14 18:47:44', '2016-09-14 18:47:44'),
(8, '', 'Татјана', 'Ћитић', '', 1, '', '', '', 1, '2016-09-14 19:07:12', '2016-09-14 19:07:12'),
(9, '', 'Миодраг', 'Јеленковић', '', 1, '', '', '', 1, '2016-09-14 19:07:45', '2016-09-14 19:07:45'),
(10, '', 'Фрања', 'Фратрић', '', 1, '', '', '', 1, '2016-09-14 19:08:26', '2016-09-14 19:08:26'),
(11, '', 'Александар', 'Вулетић', '', 1, '', '', '', 1, '2016-09-14 19:09:36', '2016-09-14 19:09:36'),
(12, '', 'Мирјана', 'Вуксановић', '', 1, '', '', '', 1, '2016-09-14 19:10:24', '2016-09-14 19:10:24'),
(13, '', 'Жељко', 'Турчиновић', '', 1, '', '', '', 1, '2016-09-14 19:11:01', '2016-09-14 19:11:01'),
(14, '', 'Урош', 'Митровић', '', 1, '', '', '', 1, '2016-09-14 19:11:41', '2016-09-14 19:11:41'),
(15, '', 'Дејан', 'Нешић', '', 1, '', '', '', 1, '2016-09-14 19:12:12', '2016-09-14 19:12:12'),
(16, '', 'Ана', 'Гавриловић', '', 1, '', '', '', 1, '2016-09-14 19:12:53', '2016-09-14 19:12:53'),
(17, '', 'Гордана ', 'Будимир Нинковић', '', 1, '', '', '', 1, '2016-09-14 19:36:47', '2016-09-14 19:36:47'),
(18, '', 'Драган', 'Атанасов', '', 1, '', '', '', 1, '2016-09-14 19:37:25', '2016-09-14 19:37:25'),
(19, '', 'Драган', 'Гостовић', '', 1, '', '', '', 1, '2016-09-14 19:43:28', '2016-09-14 19:43:28'),
(20, '', 'Александар', 'Павловић', '', 1, '', '', '', 1, '2016-09-14 19:44:08', '2016-09-14 19:44:08'),
(21, '', 'Милка', 'Ђукић', '', 1, '', '', '', 1, '2016-09-14 19:45:02', '2016-09-14 19:45:02'),
(22, '', 'Веско', 'Драшковић', '', 1, '', '', '', 1, '2016-09-14 19:47:18', '2016-09-14 19:47:18'),
(23, '', 'Дејан', 'Шупут', '', 1, '', '', '', 1, '2016-09-14 19:49:44', '2016-09-14 19:49:44'),
(24, '', 'Томислав', 'Обрадовић', '', 1, '', '', '', 1, '2016-09-14 19:50:20', '2016-09-14 19:50:20'),
(25, '', 'Лела', 'Марић', '', 1, '', '', '', 1, '2016-09-14 19:56:18', '2016-09-14 19:56:18'),
(26, '', 'Марјан', 'Маринковић', '', 1, '', '', '', 1, '2016-09-14 19:56:52', '2016-09-14 19:56:52'),
(27, '', 'Никола', 'Чикириз', '', 1, '', '', '', 1, '2016-09-14 19:57:23', '2016-09-14 19:57:23'),
(28, '', 'Душан', 'Јоксимовић', '', 1, '', '', '', 1, '2016-09-14 19:57:54', '2016-09-14 19:57:54'),
(29, '', 'Изабела', 'Лацмановић', '', 1, '', '', '', 1, '2016-09-14 19:58:33', '2016-09-14 19:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `profesor_predmet`
--

DROP TABLE IF EXISTS `profesor_predmet`;
CREATE TABLE IF NOT EXISTS `profesor_predmet` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profesor_id` int(11) DEFAULT NULL,
  `predmet_id` int(11) DEFAULT NULL,
  `oblik_nastave_id` int(11) DEFAULT NULL,
  `indikatorAktivan` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `naziv`, `created_at`, `updated_at`) VALUES
(1, 'Град Београд', NULL, NULL),
(2, 'Мачвански управни округ', NULL, NULL),
(3, 'Колубарски управни округ', NULL, NULL),
(4, 'Подунавски управни округ', NULL, NULL),
(5, 'Браничевски управни округ', NULL, NULL),
(6, 'Шумадијски управни округ', NULL, NULL),
(7, 'Поморавски управни округ', NULL, NULL),
(8, 'Борски управни округ', NULL, NULL),
(9, 'Зајечарски управни округ', NULL, NULL),
(10, 'Златиборски управни округ', NULL, NULL),
(11, 'Моравички управни округ', NULL, NULL),
(12, 'Рашки управни округ', NULL, NULL),
(13, 'Расински управни округ', NULL, NULL),
(14, 'Нишавски управни округ', NULL, NULL),
(15, 'Топлички управни округ', NULL, NULL),
(16, 'Пиротски управни округ', NULL, NULL),
(17, 'Јабланички управни округ', NULL, NULL),
(18, 'Пчињски управни округ', NULL, NULL),
(19, 'Косовски управни округ', NULL, NULL),
(20, 'Пећки управни округ', NULL, NULL),
(21, 'Призренски управни округ', NULL, NULL),
(22, 'Косовскомитровачки управни округ', NULL, NULL),
(23, 'Косовскопоморавски управни округ', NULL, NULL),
(24, 'Сремски управни округ', NULL, NULL),
(25, 'Севернобанатски управни округ', NULL, NULL),
(26, 'Јужнобанатски управни округ', NULL, NULL),
(27, 'Средњобанатски управни округ', NULL, NULL),
(28, 'Севернобачки управни округ', NULL, NULL),
(29, 'Западнобачки управни округ', NULL, NULL),
(30, 'Јужнобачки управни округ', NULL, NULL),
(31, 'Ван Србије', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `semestar`
--

DROP TABLE IF EXISTS `semestar`;
CREATE TABLE IF NOT EXISTS `semestar` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nazivRimski` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nazivBrojcano` int(11) NOT NULL,
  `indikatorAktivan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `semestar`
--

INSERT INTO `semestar` (`id`, `naziv`, `nazivRimski`, `nazivBrojcano`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, 'Први', 'I', 1, 1, '2016-08-29 20:03:53', '2016-08-30 07:06:45'),
(2, 'Други', 'II', 2, 1, '2016-08-29 20:03:53', '2016-08-30 07:06:53'),
(3, 'Трећи', 'III', 3, 1, '2016-08-29 20:03:53', '2016-08-30 07:07:02'),
(4, 'Четврти', 'IV', 4, 1, '2016-08-29 20:03:53', '2016-08-30 07:07:10'),
(5, 'Пети', 'V', 5, 1, '2016-08-29 20:03:53', '2016-08-30 07:07:19'),
(6, 'Шести', 'VI', 6, 1, '2016-08-30 07:05:02', '2016-08-30 07:05:02'),
(7, 'Седми', 'VII', 7, 1, '2016-08-30 07:06:09', '2016-08-30 07:06:09'),
(8, 'Осми', 'VIII', 8, 1, '2016-08-30 07:06:25', '2016-08-30 07:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `skolska_god_upisa`
--

DROP TABLE IF EXISTS `skolska_god_upisa`;
CREATE TABLE IF NOT EXISTS `skolska_god_upisa` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skolska_god_upisa`
--

INSERT INTO `skolska_god_upisa` (`id`, `naziv`, `created_at`, `updated_at`) VALUES
(1, '2016/2017', '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(2, '2017/2018', '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(3, '2018/2019', '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(4, '2019/2020', '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(5, '2020/2021', '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(6, '2021/2022', '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(7, '2022/2023', '2016-08-29 20:03:53', '2016-08-29 20:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

DROP TABLE IF EXISTS `sport`;
CREATE TABLE IF NOT EXISTS `sport` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `indikatorAktivan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=123 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`id`, `naziv`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, 'Амерички фудбал', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(2, 'Аустралијски фудбал', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(3, 'Бејзбол', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(4, 'Баскијска пелота', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(5, 'Канадски фудбал', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(6, 'Крикет', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(7, 'Карлинг', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(8, 'Кошарка', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(9, 'Одбојка', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(10, 'Пејнтбол', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(11, 'Пентак', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(12, 'Поло', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(13, 'Рукомет', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(14, 'Рагби', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(15, 'Софтбол', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(16, 'Фаутсал', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(17, 'Флорбол', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(18, 'Фудбал', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(19, 'Футсал', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(20, 'Хокеј', 1, '2016-08-29 20:03:52', '2016-09-25 14:11:49'),
(21, 'Хокеј на трави', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(22, 'Хурлинг', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(23, 'Хокеј на леду', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(24, 'Хокеј на ролерима', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(25, 'Аикидо', 1, '2016-09-25 14:13:13', '2016-09-25 14:13:13'),
(26, 'Аеробик', 1, '2016-09-25 14:13:38', '2016-09-25 14:13:38'),
(27, 'Атлетика', 1, '2016-09-25 14:13:50', '2016-09-25 14:13:50'),
(28, 'Бадмингтон', 1, '2016-09-25 14:14:10', '2016-09-25 14:14:10'),
(29, 'Банди', 1, '2016-09-25 14:14:17', '2016-09-25 14:14:17'),
(30, 'Бијатлон', 1, '2016-09-25 14:14:39', '2016-09-25 14:14:39'),
(31, 'Бициклизам', 1, '2016-09-25 14:14:54', '2016-09-25 14:14:54'),
(32, 'Билијар', 1, '2016-09-25 14:15:08', '2016-09-25 14:15:08'),
(33, 'Боб', 1, '2016-09-25 14:15:22', '2016-09-25 14:15:22'),
(34, 'Боди билдинг', 1, '2016-09-25 14:15:33', '2016-09-25 14:15:33'),
(35, 'Бокс', 1, '2016-09-25 14:15:40', '2016-09-25 14:15:40'),
(36, 'Боћање', 1, '2016-09-25 14:15:59', '2016-09-25 14:15:59'),
(37, 'Бриџ', 1, '2016-09-25 14:16:11', '2016-09-25 14:16:11'),
(38, 'Ваздухопловни спорт', 1, '2016-09-25 14:16:43', '2016-09-25 14:16:43'),
(39, 'Ватерполо', 1, '2016-09-25 14:16:59', '2016-09-25 14:16:59'),
(40, 'Веслање', 1, '2016-09-25 14:17:10', '2016-09-25 14:17:10'),
(41, 'Гимнастика', 1, '2016-09-25 14:17:28', '2016-09-25 14:17:28'),
(42, 'Го', 1, '2016-09-25 14:17:35', '2016-09-25 14:17:35'),
(43, 'Голф', 1, '2016-09-25 14:17:44', '2016-09-25 14:17:44'),
(44, 'Даме', 1, '2016-09-25 14:18:24', '2016-09-25 14:18:24'),
(45, 'Дизање тегова', 1, '2016-09-25 14:18:37', '2016-09-25 14:18:37'),
(46, 'Екстремни спортови', 1, '2016-09-25 14:19:06', '2016-09-25 14:19:06'),
(47, 'Електронски пикадо', 1, '2016-09-25 14:19:19', '2016-09-25 14:19:19'),
(48, 'Једрење', 1, '2016-09-25 14:19:39', '2016-09-25 14:19:39'),
(49, 'Јога', 1, '2016-09-25 14:19:46', '2016-09-25 14:19:46'),
(50, 'Кајак-ќану', 1, '2016-09-25 14:20:01', '2016-09-25 14:20:01'),
(51, 'Карате', 1, '2016-09-25 14:20:19', '2016-09-25 14:20:19'),
(52, 'Кендо', 1, '2016-09-25 14:20:27', '2016-09-25 14:20:27'),
(53, 'Кик бокс', 1, '2016-09-25 14:20:40', '2016-09-25 14:20:40'),
(54, 'Кинолошки спорт', 1, '2016-09-25 14:21:04', '2016-09-25 14:21:04'),
(55, 'Кјокушинкаи', 1, '2016-09-25 14:21:22', '2016-09-25 14:21:22'),
(56, 'Клизање', 1, '2016-09-25 14:21:40', '2016-09-25 14:21:40'),
(57, 'Коњички спорт', 1, '2016-09-25 14:22:08', '2016-09-25 14:22:08'),
(58, 'Корфбол', 1, '2016-09-25 14:22:24', '2016-09-25 14:22:24'),
(59, 'Куглање', 1, '2016-09-25 14:22:43', '2016-09-25 14:22:43'),
(60, 'Кунг фу - Вушу', 1, '2016-09-25 14:23:11', '2016-09-25 14:23:11'),
(61, 'Летеће мете', 1, '2016-09-25 14:23:30', '2016-09-25 14:23:30'),
(62, 'Маи таи', 1, '2016-09-25 14:23:44', '2016-09-25 14:23:44'),
(63, 'Мачевање', 1, '2016-09-25 14:23:53', '2016-09-25 14:23:53'),
(64, 'Мини голф', 1, '2016-09-25 14:24:16', '2016-09-25 14:24:16'),
(65, 'ММА Борилачки спорт', 1, '2016-09-25 14:24:30', '2016-09-25 14:24:30'),
(66, 'Модерни петатлон', 1, '2016-09-25 14:24:49', '2016-09-25 14:24:49'),
(67, 'Мото спорт', 1, '2016-09-25 14:25:13', '2016-09-25 14:25:13'),
(68, 'Мотонаутика', 1, '2016-09-25 14:25:23', '2016-09-25 14:25:23'),
(69, 'Оријентиринг', 1, '2016-09-25 14:25:41', '2016-09-25 14:25:41'),
(70, 'Пикадо', 1, '2016-09-25 14:26:00', '2016-09-25 14:26:00'),
(71, 'Планинарство', 1, '2016-09-25 14:26:12', '2016-09-25 14:26:12'),
(72, 'Плес (спортски, модерни)', 1, '2016-09-25 14:26:37', '2016-09-25 14:26:37'),
(73, 'Пливање', 1, '2016-09-25 14:26:54', '2016-09-25 14:26:54'),
(74, 'Подводни спорт', 1, '2016-09-25 14:27:06', '2016-09-25 14:27:06'),
(75, 'Практично стрељаштво', 1, '2016-09-25 14:27:50', '2016-09-25 14:27:50'),
(76, 'Рагби 13', 1, '2016-09-25 14:29:55', '2016-09-25 14:29:55'),
(77, 'Рафтинг', 1, '2016-09-25 14:30:19', '2016-09-25 14:30:19'),
(78, 'Рвање', 1, '2016-09-25 14:31:33', '2016-09-25 14:31:33'),
(79, 'Рекреативни спорт', 1, '2016-09-25 14:32:02', '2016-09-25 14:32:02'),
(80, 'Савате', 1, '2016-09-25 14:33:01', '2016-09-25 14:33:01'),
(81, 'Самбо', 1, '2016-09-25 14:33:12', '2016-09-25 14:33:12'),
(82, 'Санкашки спортови', 1, '2016-09-25 14:33:33', '2016-09-25 14:33:33'),
(83, 'Сеоски спорт', 1, '2016-09-25 14:34:08', '2016-09-25 14:34:08'),
(84, 'Синхроно пливање', 1, '2016-09-25 14:34:26', '2016-09-25 14:34:26'),
(85, 'Скај бол', 1, '2016-09-25 14:35:20', '2016-09-25 14:35:20'),
(86, 'Сквош', 1, '2016-09-25 14:35:29', '2016-09-25 14:35:29'),
(87, 'Ски алпинизам', 1, '2016-09-25 14:35:51', '2016-09-25 14:35:51'),
(88, 'Скијање', 1, '2016-09-25 14:36:10', '2016-09-25 14:36:10'),
(89, 'Скијање на води', 1, '2016-09-25 14:36:21', '2016-09-25 14:36:21'),
(90, 'Скокови у воду', 1, '2016-09-25 14:36:39', '2016-09-25 14:36:39'),
(91, 'Соколски спорт', 1, '2016-09-25 14:36:57', '2016-09-25 14:36:57'),
(92, 'Спид бадминтон', 1, '2016-09-25 14:37:22', '2016-09-25 14:37:22'),
(93, 'Спорт за све', 1, '2016-09-25 14:37:37', '2016-09-25 14:37:37'),
(94, 'Спорт особа са инвалидитетом', 1, '2016-09-25 14:38:03', '2016-09-25 14:38:03'),
(95, 'Спорт у војсци', 1, '2016-09-25 14:38:56', '2016-09-25 14:38:56'),
(96, 'Спорт у полицији', 1, '2016-09-25 14:39:09', '2016-09-25 14:39:09'),
(97, 'Спорт у дијаспори', 1, '2016-09-25 14:39:20', '2016-09-25 14:39:20'),
(98, 'Спорт у фирмама (раднички спорт)', 1, '2016-09-25 14:39:49', '2016-09-25 14:39:49'),
(99, 'Спортска спелеологија', 1, '2016-09-25 14:40:21', '2016-09-25 14:40:21'),
(100, 'Спортски ауто мото', 1, '2016-09-25 14:40:38', '2016-09-25 14:40:38'),
(101, 'Спортски лов', 1, '2016-09-25 14:40:48', '2016-09-25 14:40:48'),
(102, 'Спортски риболов', 1, '2016-09-25 14:40:58', '2016-09-25 14:40:58'),
(103, 'Спортско пењање', 1, '2016-09-25 14:41:20', '2016-09-25 14:41:20'),
(104, 'Стони тенис', 1, '2016-09-25 14:41:30', '2016-09-25 14:41:30'),
(105, 'Стреличарство', 1, '2016-09-25 14:41:47', '2016-09-25 14:41:47'),
(106, 'Стрељаштво', 1, '2016-09-25 14:41:58', '2016-09-25 14:41:58'),
(107, 'Стронг мен', 1, '2016-09-25 14:42:26', '2016-09-25 14:42:26'),
(108, 'Сумо', 1, '2016-09-25 14:42:34', '2016-09-25 14:42:34'),
(109, 'Теквондо', 1, '2016-09-25 14:42:48', '2016-09-25 14:42:48'),
(110, 'Тенис', 1, '2016-09-25 14:42:55', '2016-09-25 14:42:55'),
(111, 'Традиционални спортови', 1, '2016-09-25 14:43:21', '2016-09-25 14:43:21'),
(112, 'Триатлон', 1, '2016-09-25 14:43:35', '2016-09-25 14:43:35'),
(113, 'Универзитетски спорт', 1, '2016-09-25 14:43:49', '2016-09-25 14:43:49'),
(114, 'Фитнес', 1, '2016-09-25 14:44:02', '2016-09-25 14:44:02'),
(115, 'Џет ски', 1, '2016-09-25 14:44:30', '2016-09-25 14:44:30'),
(116, 'Џу Џицу', 1, '2016-09-25 14:44:44', '2016-09-25 14:44:44'),
(117, 'Џудо', 1, '2016-09-25 14:44:58', '2016-09-25 14:44:58'),
(118, 'Шах', 1, '2016-09-25 14:45:08', '2016-09-25 14:45:08'),
(119, 'Школски спорт', 1, '2016-09-25 14:45:19', '2016-09-25 14:45:19'),
(120, 'Сурфинг', 1, '2016-09-25 14:46:07', '2016-09-25 14:46:07'),
(121, 'Боулинг', 1, '2016-09-25 14:47:00', '2016-09-25 14:47:00'),
(122, 'Ролер спорт', 1, '2016-09-25 14:47:10', '2016-09-25 14:47:10');

-- --------------------------------------------------------

--
-- Table structure for table `sportsko_angazovanje`
--

DROP TABLE IF EXISTS `sportsko_angazovanje`;
CREATE TABLE IF NOT EXISTS `sportsko_angazovanje` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sport_id` int(10) UNSIGNED NOT NULL,
  `kandidat_id` int(10) UNSIGNED NOT NULL,
  `nazivKluba` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `odDoGodina` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ukupnoGodina` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sportsko_angazovanje_sport_id_index` (`sport_id`),
  KEY `sportsko_angazovanje_kandidat_id_index` (`kandidat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sportsko_angazovanje`
--

INSERT INTO `sportsko_angazovanje` (`id`, `sport_id`, `kandidat_id`, `nazivKluba`, `odDoGodina`, `ukupnoGodina`, `created_at`, `updated_at`) VALUES
(4, 3, 2, 'Слобода', '29-44', 0, '2016-09-01 06:57:00', '2016-09-01 06:57:00'),
(3, 8, 2, 'Плеј Оф', '29 - 44', 0, '2016-09-01 06:57:00', '2016-09-01 06:57:00'),
(5, 18, 2, 'Севојно', '29-44', 0, '2016-09-01 06:57:00', '2016-09-01 06:57:00'),
(9, 1, 4, 'КАФ Сирмиум Легионариес', '19-21', 2, '2016-09-01 07:38:07', '2016-09-01 07:38:07'),
(8, 18, 4, 'ФК Раднички Ср. Митровица', '10-17', 7, '2016-09-01 07:38:07', '2016-09-01 07:38:07'),
(10, 18, 7, 'Бродарац', '8-19', 11, '2016-09-01 07:53:56', '2016-09-01 07:53:56'),
(11, 18, 8, '', '', 0, '2016-09-01 08:03:27', '2016-09-01 08:03:27'),
(12, 18, 8, '', '', 0, '2016-09-01 08:03:27', '2016-09-01 08:03:27'),
(13, 18, 8, '', '', 0, '2016-09-01 08:03:27', '2016-09-01 08:03:27'),
(14, 8, 9, '"КК Боров"', '8-18', 10, '2016-09-01 08:09:16', '2016-09-01 08:09:16'),
(15, 18, 9, 'ФК "СЛОГА"', '6-8, 18-19', 3, '2016-09-01 08:09:16', '2016-09-01 08:09:16'),
(16, 18, 11, 'ФК "Вршац"', '6-21', 15, '2016-09-01 08:14:24', '2016-09-01 08:14:24'),
(17, 13, 10, 'Рукометни клуб Виаре', '12-14', 0, '2016-09-01 08:18:37', '2016-09-01 08:18:37'),
(18, 9, 10, 'Одбојкашки клуб Ва014', '13-18', 8, '2016-09-01 08:18:37', '2016-09-01 08:18:37'),
(19, 8, 14, 'Нафт абадан Иран', 'од 9', 0, '2016-09-01 08:35:07', '2016-09-01 08:35:07'),
(20, 8, 15, 'КК Колубара', '10-12', 2, '2016-09-01 08:44:06', '2016-09-01 08:44:06'),
(21, 13, 15, 'РК Партизан', '13-19', 6, '2016-09-01 08:44:06', '2016-09-01 08:44:06'),
(22, 18, 16, '"Синђелић" Београд', '4 и даље', 15, '2016-09-01 08:57:57', '2016-09-01 08:57:57'),
(23, 18, 17, 'Сутјеска', '7-18', 11, '2016-09-01 09:01:31', '2016-09-01 09:01:31'),
(24, 13, 19, 'РК Раднички ', '6-19', 13, '2016-09-01 09:12:18', '2016-09-01 09:12:18'),
(25, 13, 19, 'РК Динамо', '19', 0, '2016-09-01 09:12:18', '2016-09-01 09:12:18'),
(26, 8, 20, 'КК Баскет-ко', '14-17', 3, '2016-09-01 09:19:12', '2016-09-01 09:19:12'),
(27, 1, 21, 'Црвена З', 'од 8 године', 11, '2016-09-01 09:21:43', '2016-09-01 09:21:43'),
(28, 9, 22, 'ОК Обреновац', '9-18', 9, '2016-09-01 09:26:43', '2016-09-01 09:26:43'),
(29, 18, 23, 'Брсиово Језеро', '6-18', 12, '2016-09-01 09:32:19', '2016-09-01 09:32:19'),
(30, 8, 24, 'Младост Земун', '10-17', 7, '2016-09-01 09:37:15', '2016-09-01 09:37:15'),
(31, 18, 27, 'ФК Црвена Звезда', '7-30', 23, '2016-09-01 09:50:18', '2016-09-01 09:50:18'),
(32, 18, 27, 'Графичар', '26-42', 16, '2016-09-01 09:50:18', '2016-09-01 09:50:18'),
(33, 10, 29, '', '11-16', 5, '2016-09-01 09:57:52', '2016-09-01 09:57:52'),
(34, 8, 32, 'Слога Краљево ', '8-18', 10, '2016-09-01 10:15:10', '2016-09-01 10:15:10'),
(35, 7, 35, 'КК "Кујаз" Аранђеловац', 'од 4 и даље', 16, '2016-09-01 10:32:31', '2016-09-01 10:32:31'),
(36, 18, 37, 'Јагодина', '10-15', 5, '2016-09-01 10:41:23', '2016-09-01 10:41:23'),
(37, 10, 37, 'Јагодина', '7-10', 3, '2016-09-01 10:41:23', '2016-09-01 10:41:23'),
(38, 13, 37, 'Јагодина', '12-14', 2, '2016-09-01 10:41:23', '2016-09-01 10:41:23'),
(39, 18, 38, 'ФК "Слобода" Чачак', 'од 5 и даље', 14, '2016-09-01 10:54:05', '2016-09-01 10:54:05'),
(40, 18, 39, '', '6-19', 13, '2016-09-01 10:58:30', '2016-09-01 10:58:30'),
(41, 18, 40, 'БАСК', '14-16', 2, '2016-09-01 11:03:01', '2016-09-01 11:03:01'),
(42, 8, 40, '', '16-17', 1, '2016-09-01 11:03:01', '2016-09-01 11:03:01'),
(43, 15, 41, 'ПОИНТ', '', 2, '2016-09-01 11:06:43', '2016-09-01 11:06:43'),
(44, 18, 42, '', '10-12', 2, '2016-09-01 11:14:16', '2016-09-01 11:14:16'),
(45, 15, 42, '', '14-16', 2, '2016-09-01 11:14:16', '2016-09-01 11:14:16'),
(46, 8, 43, 'Партизан', '10-18', 8, '2016-09-01 11:18:20', '2016-09-01 11:18:20'),
(47, 18, 48, 'ФК Омладинац', 'Од 7 и далје', 12, '2016-09-02 05:10:34', '2016-09-02 05:10:34'),
(48, 18, 49, 'ФК Црвена Звезда', '5-20', 15, '2016-09-02 05:13:07', '2016-09-02 05:13:07'),
(49, 8, 51, 'Орион', '11-19', 2, '2016-09-02 05:24:45', '2016-09-02 05:24:45'),
(50, 8, 51, 'ВКК Раднички', '19', 3, '2016-09-02 05:24:45', '2016-09-02 05:24:45'),
(51, 8, 51, 'Динамик', '19 и даље', 6, '2016-09-02 05:24:45', '2016-09-02 05:24:45'),
(52, 3, 50, 'Партизан', '14-16', 2, '2016-09-02 05:24:55', '2016-09-02 05:24:55'),
(53, 18, 52, 'Хајдук Лион', '7-16', 9, '2016-09-02 05:35:58', '2016-09-02 05:35:58'),
(54, 18, 55, 'Ђердап', 'Од 7 и даље', 13, '2016-09-02 05:49:43', '2016-09-02 05:49:43'),
(55, 18, 60, 'ФК Југовић, ФК Војводина', '6-14', 8, '2016-09-02 07:17:31', '2016-09-02 07:17:31'),
(56, 18, 65, 'Бежанија', '8 и даље', 11, '2016-09-07 04:40:31', '2016-09-07 04:40:31'),
(58, 18, 72, 'ФК "Полет"', '6-12', 6, '2016-09-14 05:55:06', '2016-09-14 05:55:06'),
(59, 8, 73, 'СКСЕ Салготарјан', 'од 10', 20, '2016-09-14 06:09:48', '2016-09-14 06:09:48'),
(60, 13, 74, 'РК Посавски  партизани', '', 2, '2016-09-15 08:08:59', '2016-09-15 08:08:59'),
(61, 18, 74, '', '', 15, '2016-09-15 08:08:59', '2016-09-15 08:08:59'),
(62, 8, 76, 'ОККБеоград', '12-20', 8, '2016-09-20 05:25:24', '2016-09-20 05:25:24'),
(63, 18, 77, 'ФК Мачва', '6 и даље', 0, '2016-09-20 09:58:57', '2016-09-20 09:58:57'),
(64, 18, 78, 'ФК Могрен Будва', '6-16', 10, '2016-09-21 05:41:49', '2016-09-21 05:41:49'),
(65, 8, 79, 'КК Торлак', 'од 9 ', 13, '2016-09-21 05:59:12', '2016-09-21 05:59:12'),
(66, 18, 83, 'ФКПролетер Зрењанин', '10-16', 6, '2016-09-28 09:53:13', '2016-09-28 09:53:13'),
(67, 18, 83, 'ФК Бечеј', '17-21', 4, '2016-09-28 09:53:13', '2016-09-28 09:53:13'),
(68, 18, 83, 'ФК Грбаљ', '22-26', 4, '2016-09-28 09:53:13', '2016-09-28 09:53:13'),
(69, 8, 84, 'Мега Визура', '7-20', 13, '2016-09-29 07:04:28', '2016-09-29 07:04:28'),
(70, 8, 87, 'КК Приморје', '5-17', 12, '2016-09-30 08:19:30', '2016-09-30 08:19:30'),
(71, 8, 87, 'САД', '17-19', 2, '2016-09-30 08:19:30', '2016-09-30 08:19:30'),
(72, 8, 87, 'КК Слобода', '20 и даље', 0, '2016-09-30 08:19:30', '2016-09-30 08:19:30'),
(73, 18, 88, 'Металац ', '', 0, '2016-09-30 08:31:04', '2016-09-30 08:31:04'),
(74, 18, 89, 'БСК Борча', '5-18', 13, '2016-09-30 10:06:54', '2016-09-30 10:06:54'),
(75, 8, 90, 'Нови Београд', '10-17', 8, '2016-09-30 10:18:10', '2016-09-30 10:18:10'),
(76, 40, 92, 'Партизан', 'од 11', 10, '2016-10-12 07:07:49', '2016-10-12 07:07:49'),
(77, 109, 95, 'Теквондо клуб "Азија"', 'од 13', 0, '2016-10-14 08:37:53', '2016-10-14 08:37:53'),
(78, 8, 96, 'Партизан', '6-19', 14, '2016-10-14 09:28:52', '2016-10-14 09:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `srednje_skole_fakulteti`
--

DROP TABLE IF EXISTS `srednje_skole_fakulteti`;
CREATE TABLE IF NOT EXISTS `srednje_skole_fakulteti` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `indSkoleFakulteta` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_godine`
--

DROP TABLE IF EXISTS `status_godine`;
CREATE TABLE IF NOT EXISTS `status_godine` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datum` datetime DEFAULT NULL,
  `indikatorAktivan` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_godine`
--

INSERT INTO `status_godine` (`id`, `naziv`, `datum`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, 'уписан', NULL, 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(2, 'одустао', NULL, 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(3, 'није уписан', NULL, 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(4, 'обновио', NULL, 1, '2016-10-04 05:16:03', '2016-10-04 05:16:08'),
(5, 'завршио', NULL, 1, '2016-10-04 05:16:19', '2016-10-04 05:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `status_ispita`
--

DROP TABLE IF EXISTS `status_ispita`;
CREATE TABLE IF NOT EXISTS `status_ispita` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indikatorAktivan` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_ispita`
--

INSERT INTO `status_ispita` (`id`, `naziv`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, 'положио', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(2, 'није положио', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(3, 'одложио', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(4, 'није изашао', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(5, 'признат', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `status_profesora`
--

DROP TABLE IF EXISTS `status_profesora`;
CREATE TABLE IF NOT EXISTS `status_profesora` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indikatorAktivan` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_profesora`
--

INSERT INTO `status_profesora` (`id`, `naziv`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, 'редован', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(2, 'ванредан', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(3, 'асистент', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(4, 'доцент', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `status_studiranja`
--

DROP TABLE IF EXISTS `status_studiranja`;
CREATE TABLE IF NOT EXISTS `status_studiranja` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `indikatorAktivan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_studiranja`
--

INSERT INTO `status_studiranja` (`id`, `naziv`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, 'самофинансирајући', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(2, 'буџет', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52'),
(3, 'стипендија', 1, '2016-08-29 20:03:52', '2016-08-29 20:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `studijski_program`
--

DROP TABLE IF EXISTS `studijski_program`;
CREATE TABLE IF NOT EXISTS `studijski_program` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skrNazivStudijskogPrograma` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zvanje` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipStudija_id` int(10) UNSIGNED NOT NULL,
  `indikatorAktivan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studijski_program_tipstudija_id_index` (`tipStudija_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studijski_program`
--

INSERT INTO `studijski_program` (`id`, `naziv`, `skrNazivStudijskogPrograma`, `zvanje`, `tipStudija_id`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, 'Менаџмент у спорту', 'ОАС МС', '', 1, 1, '2016-08-29 20:03:52', '2016-09-25 13:48:54'),
(2, 'Тренер у спорту', 'ОАС ТС', '', 1, 1, '2016-08-29 20:03:52', '2016-09-25 13:49:04'),
(3, 'Спортско новинарство', 'ОАС СН', '', 1, 1, '2016-08-29 20:03:52', '2016-09-25 13:49:16'),
(4, 'Менаџмент  у спорту', 'МАС МС', '', 2, 1, '2016-08-30 06:56:26', '2016-09-25 13:53:55'),
(5, 'Менаџмент у туризуму и рекреацији', 'МАС МТР', '', 2, 1, '2016-08-30 06:56:59', '2016-09-25 13:49:39'),
(6, 'Тренер у спорту', 'МАС ТС', '', 2, 1, '2016-08-30 06:57:16', '2016-09-25 13:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `tip_predmeta`
--

DROP TABLE IF EXISTS `tip_predmeta`;
CREATE TABLE IF NOT EXISTS `tip_predmeta` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skrNaziv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indikatorAktivan` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tip_predmeta`
--

INSERT INTO `tip_predmeta` (`id`, `naziv`, `skrNaziv`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, 'обавезан', NULL, 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(2, 'изборни', NULL, 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(3, 'практични', NULL, 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `tip_prijave`
--

DROP TABLE IF EXISTS `tip_prijave`;
CREATE TABLE IF NOT EXISTS `tip_prijave` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indikatorAktivan` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tip_prijave`
--

INSERT INTO `tip_prijave` (`id`, `naziv`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, 'обавезан предмет', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(2, 'изборни предмет', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(4, 'дипломски рад тема', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(5, 'дипломски рад одбрана', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `tip_semestra`
--

DROP TABLE IF EXISTS `tip_semestra`;
CREATE TABLE IF NOT EXISTS `tip_semestra` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indikatorAktivan` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tip_semestra`
--

INSERT INTO `tip_semestra` (`id`, `naziv`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, 'летњи', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53'),
(2, 'зимски', 1, '2016-08-29 20:03:53', '2016-08-29 20:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `tip_studija`
--

DROP TABLE IF EXISTS `tip_studija`;
CREATE TABLE IF NOT EXISTS `tip_studija` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skrNaziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `indikatorAktivan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tip_studija`
--

INSERT INTO `tip_studija` (`id`, `naziv`, `skrNaziv`, `indikatorAktivan`, `created_at`, `updated_at`) VALUES
(1, 'Основне  академске студије', 'ОАС', 1, '2016-08-29 20:03:52', '2016-08-30 06:53:06'),
(2, 'Мастер академске  студије', 'МАС', 1, '2016-08-29 20:03:52', '2016-08-30 06:52:33'),
(3, 'Докторске Студије', 'ДС', 1, '2016-08-29 20:03:52', '2016-08-30 06:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `upis_godine`
--

DROP TABLE IF EXISTS `upis_godine`;
CREATE TABLE IF NOT EXISTS `upis_godine` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kandidat_id` int(11) NOT NULL,
  `godina` int(11) NOT NULL,
  `statusGodine_id` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pokusaj` int(255) DEFAULT NULL,
  `tipStudija_id` int(11) NOT NULL,
  `studijskiProgram_id` int(11) NOT NULL,
  `skolskaGodina_id` int(11) NOT NULL,
  `datumUpisa` date DEFAULT NULL,
  `datumPromene` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=350 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `upis_godine`
--

INSERT INTO `upis_godine` (`id`, `kandidat_id`, `godina`, `statusGodine_id`, `created_at`, `updated_at`, `pokusaj`, `tipStudija_id`, `studijskiProgram_id`, `skolskaGodina_id`, `datumUpisa`, `datumPromene`) VALUES
(8, 2, 4, 1, '2016-09-01 06:55:07', '2016-09-27 17:47:30', 1, 1, 2, 1, NULL, NULL),
(7, 2, 3, 3, '2016-09-01 06:55:07', '2016-09-01 06:55:07', 1, 1, 2, 1, NULL, NULL),
(6, 2, 2, 3, '2016-09-01 06:55:07', '2016-09-01 06:55:07', 1, 1, 2, 1, NULL, NULL),
(5, 2, 1, 3, '2016-09-01 06:55:07', '2016-09-01 06:57:59', 1, 1, 2, 1, NULL, NULL),
(16, 4, 4, 3, '2016-09-01 07:34:45', '2016-09-01 07:34:45', 1, 1, 1, 1, NULL, NULL),
(15, 4, 3, 3, '2016-09-01 07:34:45', '2016-09-01 07:34:45', 1, 1, 1, 1, NULL, NULL),
(14, 4, 2, 3, '2016-09-01 07:34:45', '2016-09-01 07:34:45', 1, 1, 1, 1, NULL, NULL),
(13, 4, 1, 1, '2016-09-01 07:34:45', '2016-09-15 08:14:00', 1, 1, 1, 1, NULL, NULL),
(17, 5, 1, 3, '2016-09-01 07:36:26', '2016-09-01 07:36:26', 1, 1, 2, 1, NULL, NULL),
(18, 5, 2, 3, '2016-09-01 07:36:26', '2016-09-01 07:36:26', 1, 1, 2, 1, NULL, NULL),
(19, 5, 3, 1, '2016-09-01 07:36:26', '2016-09-15 08:13:10', 1, 1, 2, 1, NULL, NULL),
(20, 5, 4, 3, '2016-09-01 07:36:26', '2016-09-01 07:36:26', 1, 1, 2, 1, NULL, NULL),
(36, 9, 4, 3, '2016-09-01 08:07:05', '2016-09-01 08:07:05', 1, 1, 1, 1, NULL, NULL),
(35, 9, 3, 3, '2016-09-01 08:07:05', '2016-09-01 08:07:05', 1, 1, 1, 1, NULL, NULL),
(34, 9, 2, 3, '2016-09-01 08:07:05', '2016-09-01 08:07:05', 1, 1, 1, 1, NULL, NULL),
(33, 9, 1, 1, '2016-09-01 08:07:05', '2016-09-25 15:03:41', 1, 1, 1, 1, NULL, NULL),
(25, 7, 1, 1, '2016-09-01 07:52:24', '2016-09-27 17:50:18', 1, 1, 2, 1, NULL, NULL),
(26, 7, 2, 3, '2016-09-01 07:52:24', '2016-09-01 07:52:24', 1, 1, 2, 1, NULL, NULL),
(27, 7, 3, 3, '2016-09-01 07:52:24', '2016-09-01 07:52:24', 1, 1, 2, 1, NULL, NULL),
(28, 7, 4, 3, '2016-09-01 07:52:24', '2016-09-01 07:52:24', 1, 1, 2, 1, NULL, NULL),
(29, 8, 1, 1, '2016-09-01 07:58:07', '2016-09-25 15:03:46', 1, 1, 1, 1, NULL, NULL),
(30, 8, 2, 3, '2016-09-01 07:58:07', '2016-09-01 07:58:07', 1, 1, 1, 1, NULL, NULL),
(31, 8, 3, 3, '2016-09-01 07:58:07', '2016-09-01 07:58:07', 1, 1, 1, 1, NULL, NULL),
(32, 8, 4, 3, '2016-09-01 07:58:07', '2016-09-01 07:58:07', 1, 1, 1, 1, NULL, NULL),
(37, 10, 1, 1, '2016-09-01 08:12:53', '2016-09-27 17:52:35', 1, 1, 3, 1, NULL, NULL),
(38, 10, 2, 3, '2016-09-01 08:12:53', '2016-09-01 08:12:53', 1, 1, 3, 1, NULL, NULL),
(39, 10, 3, 3, '2016-09-01 08:12:53', '2016-09-01 08:12:53', 1, 1, 3, 1, NULL, NULL),
(40, 10, 4, 3, '2016-09-01 08:12:53', '2016-09-01 08:12:53', 1, 1, 3, 1, NULL, NULL),
(41, 11, 1, 1, '2016-09-01 08:13:10', '2016-09-25 15:24:46', 1, 1, 3, 1, NULL, NULL),
(42, 11, 2, 3, '2016-09-01 08:13:10', '2016-09-01 08:13:10', 1, 1, 3, 1, NULL, NULL),
(43, 11, 3, 3, '2016-09-01 08:13:10', '2016-09-01 08:13:10', 1, 1, 3, 1, NULL, NULL),
(44, 11, 4, 3, '2016-09-01 08:13:10', '2016-09-01 08:13:10', 1, 1, 3, 1, NULL, NULL),
(45, 12, 1, 1, '2016-09-01 08:18:28', '2016-09-25 15:20:29', 1, 1, 2, 1, NULL, NULL),
(46, 12, 2, 3, '2016-09-01 08:18:28', '2016-09-01 08:18:28', 1, 1, 2, 1, NULL, NULL),
(47, 12, 3, 3, '2016-09-01 08:18:28', '2016-09-01 08:18:28', 1, 1, 2, 1, NULL, NULL),
(48, 12, 4, 3, '2016-09-01 08:18:28', '2016-09-01 08:18:28', 1, 1, 2, 1, NULL, NULL),
(49, 13, 1, 1, '2016-09-01 08:28:48', '2016-09-25 15:12:37', 1, 1, 2, 1, NULL, NULL),
(50, 13, 2, 3, '2016-09-01 08:28:48', '2016-09-01 08:28:48', 1, 1, 2, 1, NULL, NULL),
(51, 13, 3, 3, '2016-09-01 08:28:48', '2016-09-01 08:28:48', 1, 1, 2, 1, NULL, NULL),
(52, 13, 4, 3, '2016-09-01 08:28:48', '2016-09-01 08:28:48', 1, 1, 2, 1, NULL, NULL),
(53, 14, 1, 1, '2016-09-01 08:30:59', '2016-09-25 15:03:54', 1, 1, 1, 1, NULL, NULL),
(54, 14, 2, 3, '2016-09-01 08:30:59', '2016-09-01 08:30:59', 1, 1, 1, 1, NULL, NULL),
(55, 14, 3, 3, '2016-09-01 08:30:59', '2016-09-01 08:30:59', 1, 1, 1, 1, NULL, NULL),
(56, 14, 4, 3, '2016-09-01 08:30:59', '2016-09-01 08:30:59', 1, 1, 1, 1, NULL, NULL),
(57, 15, 1, 1, '2016-09-01 08:40:49', '2016-09-25 15:17:36', 1, 1, 2, 1, NULL, NULL),
(58, 15, 2, 3, '2016-09-01 08:40:49', '2016-09-01 08:40:49', 1, 1, 2, 1, NULL, NULL),
(59, 15, 3, 3, '2016-09-01 08:40:49', '2016-09-01 08:40:49', 1, 1, 2, 1, NULL, NULL),
(60, 15, 4, 3, '2016-09-01 08:40:49', '2016-09-01 08:40:49', 1, 1, 2, 1, NULL, NULL),
(61, 16, 1, 1, '2016-09-01 08:55:43', '2016-09-25 15:08:37', 1, 1, 1, 1, NULL, NULL),
(62, 16, 2, 3, '2016-09-01 08:55:43', '2016-09-01 08:55:43', 1, 1, 1, 1, NULL, NULL),
(63, 16, 3, 3, '2016-09-01 08:55:43', '2016-09-01 08:55:43', 1, 1, 1, 1, NULL, NULL),
(64, 16, 4, 3, '2016-09-01 08:55:43', '2016-09-01 08:55:43', 1, 1, 1, 1, NULL, NULL),
(65, 17, 1, 1, '2016-09-01 08:58:56', '2016-09-25 15:18:14', 1, 1, 2, 1, NULL, NULL),
(66, 17, 2, 3, '2016-09-01 08:58:56', '2016-09-01 08:58:56', 1, 1, 2, 1, NULL, NULL),
(67, 17, 3, 3, '2016-09-01 08:58:56', '2016-09-01 08:58:56', 1, 1, 2, 1, NULL, NULL),
(68, 17, 4, 3, '2016-09-01 08:58:56', '2016-09-01 08:58:56', 1, 1, 2, 1, NULL, NULL),
(69, 18, 1, 1, '2016-09-01 09:00:56', '2016-09-25 15:26:43', 1, 1, 3, 1, NULL, NULL),
(70, 18, 2, 3, '2016-09-01 09:00:56', '2016-09-01 09:00:56', 1, 1, 3, 1, NULL, NULL),
(71, 18, 3, 3, '2016-09-01 09:00:56', '2016-09-01 09:00:56', 1, 1, 3, 1, NULL, NULL),
(72, 18, 4, 3, '2016-09-01 09:00:56', '2016-09-01 09:00:56', 1, 1, 3, 1, NULL, NULL),
(73, 19, 1, 1, '2016-09-01 09:10:50', '2016-09-25 15:28:47', 1, 1, 2, 1, NULL, NULL),
(74, 19, 2, 3, '2016-09-01 09:10:50', '2016-09-01 09:10:50', 1, 1, 2, 1, NULL, NULL),
(75, 19, 3, 3, '2016-09-01 09:10:50', '2016-09-01 09:10:50', 1, 1, 2, 1, NULL, NULL),
(76, 19, 4, 3, '2016-09-01 09:10:50', '2016-09-01 09:10:50', 1, 1, 2, 1, NULL, NULL),
(77, 20, 1, 1, '2016-09-01 09:12:29', '2016-09-27 17:53:40', 1, 1, 3, 1, NULL, NULL),
(78, 20, 2, 3, '2016-09-01 09:12:29', '2016-09-01 09:12:29', 1, 1, 3, 1, NULL, NULL),
(79, 20, 3, 3, '2016-09-01 09:12:29', '2016-09-01 09:12:29', 1, 1, 3, 1, NULL, NULL),
(80, 20, 4, 3, '2016-09-01 09:12:29', '2016-09-01 09:12:29', 1, 1, 3, 1, NULL, NULL),
(81, 21, 1, 1, '2016-09-01 09:20:27', '2016-09-25 15:29:23', 1, 1, 2, 1, NULL, NULL),
(82, 21, 2, 3, '2016-09-01 09:20:27', '2016-09-01 09:20:27', 1, 1, 2, 1, NULL, NULL),
(83, 21, 3, 3, '2016-09-01 09:20:27', '2016-09-01 09:20:27', 1, 1, 2, 1, NULL, NULL),
(84, 21, 4, 3, '2016-09-01 09:20:27', '2016-09-01 09:20:27', 1, 1, 2, 1, NULL, NULL),
(85, 22, 1, 1, '2016-09-01 09:24:18', '2016-09-25 15:29:31', 1, 1, 2, 1, NULL, NULL),
(86, 22, 2, 3, '2016-09-01 09:24:18', '2016-09-01 09:24:18', 1, 1, 2, 1, NULL, NULL),
(87, 22, 3, 3, '2016-09-01 09:24:18', '2016-09-01 09:24:18', 1, 1, 2, 1, NULL, NULL),
(88, 22, 4, 3, '2016-09-01 09:24:18', '2016-09-01 09:24:18', 1, 1, 2, 1, NULL, NULL),
(89, 23, 1, 1, '2016-09-01 09:29:52', '2016-09-25 15:08:37', 1, 1, 1, 1, NULL, NULL),
(90, 23, 2, 3, '2016-09-01 09:29:52', '2016-09-01 09:29:52', 1, 1, 1, 1, NULL, NULL),
(91, 23, 3, 3, '2016-09-01 09:29:52', '2016-09-01 09:29:52', 1, 1, 1, 1, NULL, NULL),
(92, 23, 4, 3, '2016-09-01 09:29:52', '2016-09-01 09:29:52', 1, 1, 1, 1, NULL, NULL),
(93, 24, 1, 3, '2016-09-01 09:36:11', '2016-09-01 09:36:11', 1, 1, 1, 1, NULL, NULL),
(94, 24, 2, 3, '2016-09-01 09:36:11', '2016-09-01 09:36:11', 1, 1, 1, 1, NULL, NULL),
(95, 24, 3, 3, '2016-09-01 09:36:11', '2016-09-01 09:36:11', 1, 1, 1, 1, NULL, NULL),
(96, 24, 4, 1, '2016-09-01 09:36:11', '2016-09-27 16:59:57', 1, 1, 1, 1, NULL, NULL),
(313, 83, 4, 3, '2016-09-28 09:50:28', '2016-09-28 09:50:28', 1, 1, 2, 1, NULL, NULL),
(312, 83, 3, 3, '2016-09-28 09:50:28', '2016-09-28 09:50:28', 1, 1, 2, 1, NULL, NULL),
(311, 83, 2, 3, '2016-09-28 09:50:28', '2016-09-28 09:50:28', 1, 1, 2, 1, NULL, NULL),
(310, 83, 1, 1, '2016-09-28 09:50:28', '2016-10-12 08:39:48', 1, 1, 2, 1, '2016-10-12', NULL),
(101, 26, 1, 1, '2016-09-01 09:42:56', '2016-09-27 17:03:20', 1, 1, 2, 1, NULL, NULL),
(102, 26, 2, 3, '2016-09-01 09:42:56', '2016-09-01 09:42:56', 1, 1, 2, 1, NULL, NULL),
(103, 26, 3, 3, '2016-09-01 09:42:56', '2016-09-01 09:42:56', 1, 1, 2, 1, NULL, NULL),
(104, 26, 4, 3, '2016-09-01 09:42:56', '2016-09-01 09:42:56', 1, 1, 2, 1, NULL, NULL),
(105, 27, 1, 3, '2016-09-01 09:49:12', '2016-09-01 09:49:12', 1, 1, 2, 1, NULL, NULL),
(106, 27, 2, 3, '2016-09-01 09:49:12', '2016-09-01 09:49:12', 1, 1, 2, 1, NULL, NULL),
(107, 27, 3, 3, '2016-09-01 09:49:12', '2016-09-01 09:49:12', 1, 1, 2, 1, NULL, NULL),
(108, 27, 4, 1, '2016-09-01 09:49:12', '2016-09-27 17:14:03', 1, 1, 2, 1, NULL, NULL),
(109, 28, 1, 1, '2016-09-01 09:53:17', '2016-09-27 17:13:24', 1, 1, 1, 1, NULL, NULL),
(110, 28, 2, 3, '2016-09-01 09:53:17', '2016-09-01 09:53:17', 1, 1, 1, 1, NULL, NULL),
(111, 28, 3, 3, '2016-09-01 09:53:17', '2016-09-01 09:53:17', 1, 1, 1, 1, NULL, NULL),
(112, 28, 4, 3, '2016-09-01 09:53:17', '2016-09-01 09:53:17', 1, 1, 1, 1, NULL, NULL),
(113, 29, 1, 1, '2016-09-01 09:55:22', '2016-09-27 17:18:24', 1, 1, 2, 1, NULL, NULL),
(114, 29, 2, 3, '2016-09-01 09:55:22', '2016-09-01 09:55:22', 1, 1, 2, 1, NULL, NULL),
(115, 29, 3, 3, '2016-09-01 09:55:22', '2016-09-01 09:55:22', 1, 1, 2, 1, NULL, NULL),
(116, 29, 4, 3, '2016-09-01 09:55:22', '2016-09-01 09:55:22', 1, 1, 2, 1, NULL, NULL),
(117, 30, 1, 1, '2016-09-01 10:04:30', '2016-09-27 17:19:54', 1, 1, 3, 1, NULL, NULL),
(118, 30, 2, 3, '2016-09-01 10:04:30', '2016-09-01 10:04:30', 1, 1, 3, 1, NULL, NULL),
(119, 30, 3, 3, '2016-09-01 10:04:30', '2016-09-01 10:04:30', 1, 1, 3, 1, NULL, NULL),
(120, 30, 4, 3, '2016-09-01 10:04:30', '2016-09-01 10:04:30', 1, 1, 3, 1, NULL, NULL),
(121, 31, 1, 1, '2016-09-01 10:13:07', '2016-09-27 17:19:08', 1, 1, 3, 1, NULL, NULL),
(122, 31, 2, 3, '2016-09-01 10:13:07', '2016-09-01 10:13:07', 1, 1, 3, 1, NULL, NULL),
(123, 31, 3, 3, '2016-09-01 10:13:07', '2016-09-01 10:13:07', 1, 1, 3, 1, NULL, NULL),
(124, 31, 4, 3, '2016-09-01 10:13:07', '2016-09-01 10:13:07', 1, 1, 3, 1, NULL, NULL),
(125, 32, 1, 1, '2016-09-01 10:13:57', '2016-09-27 17:20:12', 1, 1, 1, 1, NULL, NULL),
(126, 32, 2, 3, '2016-09-01 10:13:57', '2016-09-01 10:13:57', 1, 1, 1, 1, NULL, NULL),
(127, 32, 3, 3, '2016-09-01 10:13:57', '2016-09-01 10:13:57', 1, 1, 1, 1, NULL, NULL),
(128, 32, 4, 3, '2016-09-01 10:13:57', '2016-09-01 10:13:57', 1, 1, 1, 1, NULL, NULL),
(129, 33, 1, 1, '2016-09-01 10:22:02', '2016-09-27 17:20:28', 1, 1, 2, 1, NULL, NULL),
(130, 33, 2, 3, '2016-09-01 10:22:02', '2016-09-01 10:22:02', 1, 1, 2, 1, NULL, NULL),
(131, 33, 3, 3, '2016-09-01 10:22:02', '2016-09-01 10:22:02', 1, 1, 2, 1, NULL, NULL),
(132, 33, 4, 3, '2016-09-01 10:22:02', '2016-09-01 10:22:02', 1, 1, 2, 1, NULL, NULL),
(133, 34, 1, 1, '2016-09-01 10:28:12', '2016-09-27 17:20:46', 1, 1, 1, 1, NULL, NULL),
(134, 34, 2, 3, '2016-09-01 10:28:12', '2016-09-01 10:28:12', 1, 1, 1, 1, NULL, NULL),
(135, 34, 3, 3, '2016-09-01 10:28:12', '2016-09-01 10:28:12', 1, 1, 1, 1, NULL, NULL),
(136, 34, 4, 3, '2016-09-01 10:28:12', '2016-09-01 10:28:12', 1, 1, 1, 1, NULL, NULL),
(137, 35, 1, 1, '2016-09-01 10:31:34', '2016-09-27 17:21:23', 1, 1, 3, 1, NULL, NULL),
(138, 35, 2, 3, '2016-09-01 10:31:34', '2016-09-01 10:31:34', 1, 1, 3, 1, NULL, NULL),
(139, 35, 3, 3, '2016-09-01 10:31:34', '2016-09-01 10:31:34', 1, 1, 3, 1, NULL, NULL),
(140, 35, 4, 3, '2016-09-01 10:31:34', '2016-09-01 10:31:34', 1, 1, 3, 1, NULL, NULL),
(141, 36, 1, 1, '2016-09-01 10:32:04', '2016-09-27 17:21:02', 1, 1, 2, 1, NULL, NULL),
(142, 36, 2, 3, '2016-09-01 10:32:04', '2016-09-01 10:32:04', 1, 1, 2, 1, NULL, NULL),
(143, 36, 3, 3, '2016-09-01 10:32:04', '2016-09-01 10:32:04', 1, 1, 2, 1, NULL, NULL),
(144, 36, 4, 3, '2016-09-01 10:32:04', '2016-09-01 10:32:04', 1, 1, 2, 1, NULL, NULL),
(145, 37, 1, 1, '2016-09-01 10:39:15', '2016-09-27 17:21:38', 1, 1, 1, 1, NULL, NULL),
(146, 37, 2, 3, '2016-09-01 10:39:15', '2016-09-01 10:39:15', 1, 1, 1, 1, NULL, NULL),
(147, 37, 3, 3, '2016-09-01 10:39:15', '2016-09-01 10:39:15', 1, 1, 1, 1, NULL, NULL),
(148, 37, 4, 3, '2016-09-01 10:39:15', '2016-09-01 10:39:15', 1, 1, 1, 1, NULL, NULL),
(149, 38, 1, 1, '2016-09-01 10:52:27', '2016-09-27 17:22:03', 1, 1, 2, 1, NULL, NULL),
(150, 38, 2, 3, '2016-09-01 10:52:27', '2016-09-01 10:52:27', 1, 1, 2, 1, NULL, NULL),
(151, 38, 3, 3, '2016-09-01 10:52:27', '2016-09-01 10:52:27', 1, 1, 2, 1, NULL, NULL),
(152, 38, 4, 3, '2016-09-01 10:52:27', '2016-09-01 10:52:27', 1, 1, 2, 1, NULL, NULL),
(153, 39, 1, 1, '2016-09-01 10:57:10', '2016-09-27 17:22:15', 1, 1, 2, 1, NULL, NULL),
(154, 39, 2, 3, '2016-09-01 10:57:10', '2016-09-01 10:57:10', 1, 1, 2, 1, NULL, NULL),
(155, 39, 3, 3, '2016-09-01 10:57:10', '2016-09-01 10:57:10', 1, 1, 2, 1, NULL, NULL),
(156, 39, 4, 3, '2016-09-01 10:57:10', '2016-09-01 10:57:10', 1, 1, 2, 1, NULL, NULL),
(157, 40, 1, 1, '2016-09-01 11:01:32', '2016-09-27 17:22:35', 1, 1, 1, 1, NULL, NULL),
(158, 40, 2, 3, '2016-09-01 11:01:32', '2016-09-01 11:01:32', 1, 1, 1, 1, NULL, NULL),
(159, 40, 3, 3, '2016-09-01 11:01:32', '2016-09-01 11:01:32', 1, 1, 1, 1, NULL, NULL),
(160, 40, 4, 3, '2016-09-01 11:01:32', '2016-09-01 11:01:32', 1, 1, 1, 1, NULL, NULL),
(161, 41, 1, 3, '2016-09-01 11:05:50', '2016-09-01 11:05:50', 1, 1, 1, 1, NULL, NULL),
(162, 41, 2, 3, '2016-09-01 11:05:50', '2016-09-01 11:05:50', 1, 1, 1, 1, NULL, NULL),
(163, 41, 3, 3, '2016-09-01 11:05:50', '2016-09-01 11:05:50', 1, 1, 1, 1, NULL, NULL),
(164, 41, 4, 1, '2016-09-01 11:05:50', '2016-09-27 17:23:29', 1, 1, 1, 1, NULL, NULL),
(165, 42, 1, 1, '2016-09-01 11:12:48', '2016-09-27 17:23:44', 1, 1, 3, 1, NULL, NULL),
(166, 42, 2, 3, '2016-09-01 11:12:48', '2016-09-01 11:12:48', 1, 1, 3, 1, NULL, NULL),
(167, 42, 3, 3, '2016-09-01 11:12:48', '2016-09-01 11:12:48', 1, 1, 3, 1, NULL, NULL),
(168, 42, 4, 3, '2016-09-01 11:12:48', '2016-09-01 11:12:48', 1, 1, 3, 1, NULL, NULL),
(169, 43, 1, 1, '2016-09-01 11:16:52', '2016-09-27 17:24:00', 1, 1, 2, 1, NULL, NULL),
(170, 43, 2, 3, '2016-09-01 11:16:52', '2016-09-01 11:16:52', 1, 1, 2, 1, NULL, NULL),
(171, 43, 3, 3, '2016-09-01 11:16:52', '2016-09-01 11:16:52', 1, 1, 2, 1, NULL, NULL),
(172, 43, 4, 3, '2016-09-01 11:16:52', '2016-09-01 11:16:52', 1, 1, 2, 1, NULL, NULL),
(173, 44, 1, 3, '2016-09-02 04:45:35', '2016-09-02 04:45:35', 1, 1, 1, 1, NULL, NULL),
(174, 44, 2, 3, '2016-09-02 04:45:35', '2016-09-02 04:45:35', 1, 1, 1, 1, NULL, NULL),
(175, 44, 3, 3, '2016-09-02 04:45:35', '2016-09-02 04:45:35', 1, 1, 1, 1, NULL, NULL),
(176, 44, 4, 1, '2016-09-02 04:45:35', '2016-09-27 17:24:19', 1, 1, 1, 1, NULL, NULL),
(177, 45, 1, 3, '2016-09-02 04:47:34', '2016-09-02 04:47:34', 1, 1, 1, 1, NULL, NULL),
(178, 45, 2, 3, '2016-09-02 04:47:34', '2016-09-02 04:47:34', 1, 1, 1, 1, NULL, NULL),
(179, 45, 3, 3, '2016-09-02 04:47:34', '2016-09-02 04:47:34', 1, 1, 1, 1, NULL, NULL),
(180, 45, 4, 1, '2016-09-02 04:47:34', '2016-09-27 17:24:36', 1, 1, 1, 1, NULL, NULL),
(181, 46, 1, 1, '2016-09-02 04:51:37', '2016-09-27 17:24:50', 1, 1, 1, 1, NULL, NULL),
(182, 46, 2, 3, '2016-09-02 04:51:37', '2016-09-02 04:51:37', 1, 1, 1, 1, NULL, NULL),
(183, 46, 3, 3, '2016-09-02 04:51:37', '2016-09-02 04:51:37', 1, 1, 1, 1, NULL, NULL),
(184, 46, 4, 3, '2016-09-02 04:51:37', '2016-09-02 04:51:37', 1, 1, 1, 1, NULL, NULL),
(185, 47, 1, 3, '2016-09-02 04:56:20', '2016-09-02 04:56:20', 1, 1, 1, 1, NULL, NULL),
(186, 47, 2, 3, '2016-09-02 04:56:20', '2016-09-02 04:56:20', 1, 1, 1, 1, NULL, NULL),
(187, 47, 3, 1, '2016-09-02 04:56:20', '2016-09-27 17:25:11', 1, 1, 1, 1, NULL, NULL),
(188, 47, 4, 3, '2016-09-02 04:56:20', '2016-09-02 04:56:20', 1, 1, 1, 1, NULL, NULL),
(189, 48, 1, 1, '2016-09-02 05:06:26', '2016-09-27 17:25:42', 1, 1, 2, 1, NULL, NULL),
(190, 48, 2, 3, '2016-09-02 05:06:26', '2016-09-02 05:06:26', 1, 1, 2, 1, NULL, NULL),
(191, 48, 3, 3, '2016-09-02 05:06:26', '2016-09-02 05:06:26', 1, 1, 2, 1, NULL, NULL),
(192, 48, 4, 3, '2016-09-02 05:06:26', '2016-09-02 05:06:26', 1, 1, 2, 1, NULL, NULL),
(193, 49, 1, 1, '2016-09-02 05:10:53', '2016-09-27 17:25:25', 1, 1, 1, 1, NULL, NULL),
(194, 49, 2, 3, '2016-09-02 05:10:53', '2016-09-02 05:10:53', 1, 1, 1, 1, NULL, NULL),
(195, 49, 3, 3, '2016-09-02 05:10:53', '2016-09-02 05:10:53', 1, 1, 1, 1, NULL, NULL),
(196, 49, 4, 3, '2016-09-02 05:10:53', '2016-09-02 05:10:53', 1, 1, 1, 1, NULL, NULL),
(197, 50, 1, 1, '2016-09-02 05:17:59', '2016-09-27 17:26:44', 1, 1, 2, 1, NULL, NULL),
(198, 50, 2, 3, '2016-09-02 05:17:59', '2016-09-02 05:17:59', 1, 1, 2, 1, NULL, NULL),
(199, 50, 3, 3, '2016-09-02 05:17:59', '2016-09-02 05:17:59', 1, 1, 2, 1, NULL, NULL),
(200, 50, 4, 3, '2016-09-02 05:17:59', '2016-09-02 05:17:59', 1, 1, 2, 1, NULL, NULL),
(201, 51, 1, 1, '2016-09-02 05:18:49', '2016-09-27 17:25:59', 1, 1, 1, 1, NULL, NULL),
(202, 51, 2, 3, '2016-09-02 05:18:49', '2016-09-02 05:18:49', 1, 1, 1, 1, NULL, NULL),
(203, 51, 3, 3, '2016-09-02 05:18:49', '2016-09-02 05:18:49', 1, 1, 1, 1, NULL, NULL),
(204, 51, 4, 3, '2016-09-02 05:18:49', '2016-09-02 05:18:49', 1, 1, 1, 1, NULL, NULL),
(205, 52, 1, 1, '2016-09-02 05:31:47', '2016-09-27 17:27:18', 1, 1, 1, 1, NULL, NULL),
(206, 52, 2, 3, '2016-09-02 05:31:47', '2016-09-02 05:31:47', 1, 1, 1, 1, NULL, NULL),
(207, 52, 3, 3, '2016-09-02 05:31:47', '2016-09-02 05:31:47', 1, 1, 1, 1, NULL, NULL),
(208, 52, 4, 3, '2016-09-02 05:31:47', '2016-09-02 05:31:47', 1, 1, 1, 1, NULL, NULL),
(209, 53, 1, 1, '2016-09-02 05:34:09', '2016-09-27 17:26:57', 1, 1, 2, 1, NULL, NULL),
(210, 53, 2, 3, '2016-09-02 05:34:09', '2016-09-02 05:34:09', 1, 1, 2, 1, NULL, NULL),
(211, 53, 3, 3, '2016-09-02 05:34:09', '2016-09-02 05:34:09', 1, 1, 2, 1, NULL, NULL),
(212, 53, 4, 3, '2016-09-02 05:34:09', '2016-09-02 05:34:09', 1, 1, 2, 1, NULL, NULL),
(213, 54, 1, 1, '2016-09-02 05:45:56', '2016-09-27 17:27:32', 1, 1, 1, 1, NULL, NULL),
(214, 54, 2, 3, '2016-09-02 05:45:56', '2016-09-02 05:45:56', 1, 1, 1, 1, NULL, NULL),
(215, 54, 3, 3, '2016-09-02 05:45:56', '2016-09-02 05:45:56', 1, 1, 1, 1, NULL, NULL),
(216, 54, 4, 3, '2016-09-02 05:45:56', '2016-09-02 05:45:56', 1, 1, 1, 1, NULL, NULL),
(217, 55, 1, 1, '2016-09-02 05:46:12', '2016-09-27 17:27:47', 1, 1, 2, 1, NULL, NULL),
(218, 55, 2, 3, '2016-09-02 05:46:12', '2016-09-02 05:46:12', 1, 1, 2, 1, NULL, NULL),
(219, 55, 3, 3, '2016-09-02 05:46:12', '2016-09-02 05:46:12', 1, 1, 2, 1, NULL, NULL),
(220, 55, 4, 3, '2016-09-02 05:46:12', '2016-09-02 05:46:12', 1, 1, 2, 1, NULL, NULL),
(221, 56, 1, 3, '2016-09-02 05:55:24', '2016-09-02 05:55:24', 1, 1, 1, 1, NULL, NULL),
(222, 56, 2, 3, '2016-09-02 05:55:24', '2016-09-02 05:55:24', 1, 1, 1, 1, NULL, NULL),
(223, 56, 3, 3, '2016-09-02 05:55:24', '2016-09-02 05:55:24', 1, 1, 1, 1, NULL, NULL),
(224, 56, 4, 1, '2016-09-02 05:55:24', '2016-09-27 17:30:32', 1, 1, 1, 1, NULL, NULL),
(225, 57, 1, 1, '2016-09-02 06:09:34', '2016-09-27 17:33:04', 1, 1, 1, 1, NULL, NULL),
(226, 57, 2, 3, '2016-09-02 06:09:34', '2016-09-02 06:09:34', 1, 1, 1, 1, NULL, NULL),
(227, 57, 3, 3, '2016-09-02 06:09:34', '2016-09-02 06:09:34', 1, 1, 1, 1, NULL, NULL),
(228, 57, 4, 3, '2016-09-02 06:09:34', '2016-09-02 06:09:34', 1, 1, 1, 1, NULL, NULL),
(229, 58, 1, 3, '2016-09-02 06:56:28', '2016-09-02 06:56:28', 1, 1, 1, 1, NULL, NULL),
(230, 58, 2, 1, '2016-09-02 06:56:28', '2016-09-27 17:33:21', 1, 1, 1, 1, NULL, NULL),
(231, 58, 3, 3, '2016-09-02 06:56:28', '2016-09-02 06:56:28', 1, 1, 1, 1, NULL, NULL),
(232, 58, 4, 3, '2016-09-02 06:56:28', '2016-09-02 06:56:28', 1, 1, 1, 1, NULL, NULL),
(233, 59, 1, 3, '2016-09-02 07:03:39', '2016-09-02 07:03:39', 1, 1, 1, 1, NULL, NULL),
(234, 59, 2, 1, '2016-09-02 07:03:39', '2016-09-27 17:33:37', 1, 1, 1, 1, NULL, NULL),
(235, 59, 3, 3, '2016-09-02 07:03:39', '2016-09-02 07:03:39', 1, 1, 1, 1, NULL, NULL),
(236, 59, 4, 3, '2016-09-02 07:03:39', '2016-09-02 07:03:39', 1, 1, 1, 1, NULL, NULL),
(237, 60, 1, 1, '2016-09-02 07:13:46', '2016-09-27 17:33:50', 1, 1, 1, 1, NULL, NULL),
(238, 60, 2, 3, '2016-09-02 07:13:46', '2016-09-02 07:13:46', 1, 1, 1, 1, NULL, NULL),
(239, 60, 3, 3, '2016-09-02 07:13:46', '2016-09-02 07:13:46', 1, 1, 1, 1, NULL, NULL),
(240, 60, 4, 3, '2016-09-02 07:13:46', '2016-09-02 07:13:46', 1, 1, 1, 1, NULL, NULL),
(241, 64, 1, 1, '2016-09-05 10:08:24', '2016-09-27 17:34:08', 1, 1, 2, 1, NULL, NULL),
(242, 64, 2, 3, '2016-09-05 10:08:24', '2016-09-05 10:08:24', 1, 1, 2, 1, NULL, NULL),
(243, 64, 3, 3, '2016-09-05 10:08:24', '2016-09-05 10:08:24', 1, 1, 2, 1, NULL, NULL),
(244, 64, 4, 3, '2016-09-05 10:08:24', '2016-09-05 10:08:24', 1, 1, 2, 1, NULL, NULL),
(245, 65, 1, 1, '2016-09-07 04:39:17', '2016-09-27 17:34:23', 1, 1, 2, 1, NULL, NULL),
(246, 65, 2, 3, '2016-09-07 04:39:17', '2016-09-07 04:39:17', 1, 1, 2, 1, NULL, NULL),
(247, 65, 3, 3, '2016-09-07 04:39:17', '2016-09-07 04:39:17', 1, 1, 2, 1, NULL, NULL),
(248, 65, 4, 3, '2016-09-07 04:39:17', '2016-09-07 04:39:17', 1, 1, 2, 1, NULL, NULL),
(249, 66, 1, 1, '2016-09-07 09:54:17', '2016-09-27 17:34:36', 1, 1, 1, 1, NULL, NULL),
(250, 66, 2, 3, '2016-09-07 09:54:17', '2016-09-07 09:54:17', 1, 1, 1, 1, NULL, NULL),
(251, 66, 3, 3, '2016-09-07 09:54:17', '2016-09-07 09:54:17', 1, 1, 1, 1, NULL, NULL),
(252, 66, 4, 3, '2016-09-07 09:54:17', '2016-09-07 09:54:17', 1, 1, 1, 1, NULL, NULL),
(253, 67, 1, 1, '2016-09-09 05:33:22', '2016-09-27 17:36:59', 1, 1, 1, 1, NULL, NULL),
(254, 67, 2, 3, '2016-09-09 05:33:22', '2016-09-09 05:33:22', 1, 1, 1, 1, NULL, NULL),
(255, 67, 3, 3, '2016-09-09 05:33:22', '2016-09-09 05:33:22', 1, 1, 1, 1, NULL, NULL),
(256, 67, 4, 3, '2016-09-09 05:33:22', '2016-09-09 05:33:22', 1, 1, 1, 1, NULL, NULL),
(257, 68, 1, 1, '2016-09-09 08:01:47', '2016-09-27 17:37:17', 1, 1, 2, 1, NULL, NULL),
(258, 68, 2, 3, '2016-09-09 08:01:47', '2016-09-09 08:01:47', 1, 1, 2, 1, NULL, NULL),
(259, 68, 3, 3, '2016-09-09 08:01:47', '2016-09-09 08:01:47', 1, 1, 2, 1, NULL, NULL),
(260, 68, 4, 3, '2016-09-09 08:01:47', '2016-09-09 08:01:47', 1, 1, 2, 1, NULL, NULL),
(261, 70, 1, 1, '2016-09-12 05:56:46', '2016-09-27 17:37:29', 1, 1, 2, 1, NULL, NULL),
(262, 70, 2, 3, '2016-09-12 05:56:46', '2016-09-12 05:56:46', 1, 1, 2, 1, NULL, NULL),
(263, 70, 3, 3, '2016-09-12 05:56:46', '2016-09-12 05:56:46', 1, 1, 2, 1, NULL, NULL),
(264, 70, 4, 3, '2016-09-12 05:56:46', '2016-09-12 05:56:46', 1, 1, 2, 1, NULL, NULL),
(265, 71, 1, 1, '2016-09-12 06:08:25', '2016-09-27 17:37:42', 1, 1, 2, 1, NULL, NULL),
(266, 71, 2, 3, '2016-09-12 06:08:25', '2016-09-12 06:08:25', 1, 1, 2, 1, NULL, NULL),
(267, 71, 3, 3, '2016-09-12 06:08:25', '2016-09-12 06:08:25', 1, 1, 2, 1, NULL, NULL),
(268, 71, 4, 3, '2016-09-12 06:08:25', '2016-09-12 06:08:25', 1, 1, 2, 1, NULL, NULL),
(269, 72, 1, 1, '2016-09-14 05:52:21', '2016-09-27 17:37:58', 1, 1, 2, 1, NULL, NULL),
(270, 72, 2, 3, '2016-09-14 05:52:21', '2016-09-14 05:52:21', 1, 1, 2, 1, NULL, NULL),
(271, 72, 3, 3, '2016-09-14 05:52:21', '2016-09-14 05:52:21', 1, 1, 2, 1, NULL, NULL),
(272, 72, 4, 3, '2016-09-14 05:52:21', '2016-09-14 05:52:21', 1, 1, 2, 1, NULL, NULL),
(273, 73, 1, 1, '2016-09-14 06:06:38', '2016-09-27 17:38:16', 1, 1, 2, 1, NULL, NULL),
(274, 73, 2, 3, '2016-09-14 06:06:38', '2016-09-14 06:06:38', 1, 1, 2, 1, NULL, NULL),
(275, 73, 3, 3, '2016-09-14 06:06:38', '2016-09-14 06:06:38', 1, 1, 2, 1, NULL, NULL),
(276, 73, 4, 3, '2016-09-14 06:06:38', '2016-09-14 06:06:38', 1, 1, 2, 1, NULL, NULL),
(277, 74, 1, 1, '2016-09-15 08:06:25', '2016-09-27 17:38:33', 1, 1, 3, 1, NULL, NULL),
(278, 74, 2, 3, '2016-09-15 08:06:25', '2016-09-15 08:06:25', 1, 1, 3, 1, NULL, NULL),
(279, 74, 3, 3, '2016-09-15 08:06:25', '2016-09-15 08:06:25', 1, 1, 3, 1, NULL, NULL),
(280, 74, 4, 3, '2016-09-15 08:06:25', '2016-09-15 08:06:25', 1, 1, 3, 1, NULL, NULL),
(281, 75, 1, 1, '2016-09-15 08:23:36', '2016-09-15 08:23:36', 1, 2, 6, 1, NULL, NULL),
(282, 76, 1, 1, '2016-09-20 05:22:37', '2016-10-12 08:38:50', 1, 1, 2, 1, '2016-10-12', NULL),
(283, 76, 2, 3, '2016-09-20 05:22:37', '2016-09-20 05:22:37', 1, 1, 2, 1, NULL, NULL),
(284, 76, 3, 3, '2016-09-20 05:22:37', '2016-09-20 05:22:37', 1, 1, 2, 1, NULL, NULL),
(285, 76, 4, 3, '2016-09-20 05:22:37', '2016-09-20 05:22:37', 1, 1, 2, 1, NULL, NULL),
(286, 77, 1, 1, '2016-09-20 09:56:21', '2016-10-12 08:39:23', 1, 1, 2, 1, '2016-10-12', NULL),
(287, 77, 2, 3, '2016-09-20 09:56:21', '2016-09-20 09:56:21', 1, 1, 2, 1, NULL, NULL),
(288, 77, 3, 3, '2016-09-20 09:56:21', '2016-09-20 09:56:21', 1, 1, 2, 1, NULL, NULL),
(289, 77, 4, 3, '2016-09-20 09:56:21', '2016-09-20 09:56:21', 1, 1, 2, 1, NULL, NULL),
(290, 78, 1, 1, '2016-09-21 05:38:40', '2016-10-12 08:40:25', 1, 1, 3, 1, '2016-10-12', NULL),
(291, 78, 2, 3, '2016-09-21 05:38:40', '2016-09-21 05:38:40', 1, 1, 3, 1, NULL, NULL),
(292, 78, 3, 3, '2016-09-21 05:38:40', '2016-09-21 05:38:40', 1, 1, 3, 1, NULL, NULL),
(293, 78, 4, 3, '2016-09-21 05:38:40', '2016-09-21 05:38:40', 1, 1, 3, 1, NULL, NULL),
(294, 79, 1, 1, '2016-09-21 05:57:13', '2016-10-12 08:39:30', 1, 1, 2, 1, '2016-10-12', NULL),
(295, 79, 2, 3, '2016-09-21 05:57:13', '2016-09-21 05:57:13', 1, 1, 2, 1, NULL, NULL),
(296, 79, 3, 3, '2016-09-21 05:57:13', '2016-09-21 05:57:13', 1, 1, 2, 1, NULL, NULL),
(297, 79, 4, 3, '2016-09-21 05:57:13', '2016-09-21 05:57:13', 1, 1, 2, 1, NULL, NULL),
(298, 80, 1, 1, '2016-09-23 05:47:50', '2016-10-12 08:39:36', 1, 1, 2, 1, '2016-10-12', NULL),
(299, 80, 2, 3, '2016-09-23 05:47:50', '2016-09-23 05:47:50', 1, 1, 2, 1, NULL, NULL),
(300, 80, 3, 3, '2016-09-23 05:47:50', '2016-09-23 05:47:50', 1, 1, 2, 1, NULL, NULL),
(301, 80, 4, 3, '2016-09-23 05:47:50', '2016-09-23 05:47:50', 1, 1, 2, 1, NULL, NULL),
(302, 81, 1, 1, '2016-09-27 09:49:20', '2016-10-12 08:38:56', 1, 1, 1, 1, '2016-10-12', NULL),
(303, 81, 2, 3, '2016-09-27 09:49:20', '2016-09-27 09:49:20', 1, 1, 1, 1, NULL, NULL),
(304, 81, 3, 3, '2016-09-27 09:49:20', '2016-09-27 09:49:20', 1, 1, 1, 1, NULL, NULL),
(305, 81, 4, 3, '2016-09-27 09:49:20', '2016-09-27 09:49:20', 1, 1, 1, 1, NULL, NULL),
(306, 82, 1, 1, '2016-09-27 09:59:42', '2016-09-28 09:14:09', 1, 1, 1, 1, NULL, NULL),
(307, 82, 2, 3, '2016-09-27 09:59:42', '2016-09-27 09:59:42', 1, 1, 1, 1, NULL, NULL),
(308, 82, 3, 3, '2016-09-27 09:59:42', '2016-09-27 09:59:42', 1, 1, 1, 1, NULL, NULL),
(309, 82, 4, 3, '2016-09-27 09:59:42', '2016-09-27 09:59:42', 1, 1, 1, 1, NULL, NULL),
(314, 84, 1, 1, '2016-09-29 07:02:58', '2016-10-12 08:38:59', 1, 1, 1, 1, '2016-10-12', NULL),
(315, 84, 2, 3, '2016-09-29 07:02:58', '2016-09-29 07:02:58', 1, 1, 1, 1, NULL, NULL),
(316, 84, 3, 3, '2016-09-29 07:02:58', '2016-09-29 07:02:58', 1, 1, 1, 1, NULL, NULL),
(317, 84, 4, 3, '2016-09-29 07:02:58', '2016-09-29 07:02:58', 1, 1, 1, 1, NULL, NULL),
(318, 85, 1, 1, '2016-09-29 09:24:18', '2016-10-12 08:39:01', 1, 1, 1, 1, '2016-10-12', NULL),
(319, 85, 2, 3, '2016-09-29 09:24:18', '2016-09-29 09:24:18', 1, 1, 1, 1, NULL, NULL),
(320, 85, 3, 3, '2016-09-29 09:24:18', '2016-09-29 09:24:18', 1, 1, 1, 1, NULL, NULL),
(321, 85, 4, 3, '2016-09-29 09:24:18', '2016-09-29 09:24:18', 1, 1, 1, 1, NULL, NULL),
(322, 86, 1, 1, '2016-09-29 09:30:24', '2016-10-12 08:39:54', 1, 1, 2, 1, '2016-10-12', NULL),
(323, 86, 2, 3, '2016-09-29 09:30:24', '2016-09-29 09:30:24', 1, 1, 2, 1, NULL, NULL),
(324, 86, 3, 3, '2016-09-29 09:30:24', '2016-09-29 09:30:24', 1, 1, 2, 1, NULL, NULL),
(325, 86, 4, 3, '2016-09-29 09:30:24', '2016-09-29 09:30:24', 1, 1, 2, 1, NULL, NULL),
(326, 87, 1, 1, '2016-09-30 08:15:33', '2016-10-12 08:40:12', 1, 1, 2, 1, '2016-10-12', NULL),
(327, 87, 2, 3, '2016-09-30 08:15:33', '2016-09-30 08:15:33', 1, 1, 2, 1, NULL, NULL),
(328, 87, 3, 3, '2016-09-30 08:15:33', '2016-09-30 08:15:33', 1, 1, 2, 1, NULL, NULL),
(329, 87, 4, 3, '2016-09-30 08:15:33', '2016-09-30 08:15:33', 1, 1, 2, 1, NULL, NULL),
(330, 88, 1, 3, '2016-09-30 08:28:21', '2016-09-30 08:28:21', 1, 1, 2, 1, NULL, NULL),
(331, 88, 2, 1, '2016-09-30 08:28:21', '2016-10-12 08:40:17', 1, 1, 2, 1, '2016-10-12', NULL),
(332, 88, 3, 3, '2016-09-30 08:28:21', '2016-09-30 08:28:21', 1, 1, 2, 1, NULL, NULL),
(333, 88, 4, 3, '2016-09-30 08:28:21', '2016-09-30 08:28:21', 1, 1, 2, 1, NULL, NULL),
(334, 89, 1, 1, '2016-09-30 10:05:10', '2016-10-12 08:39:03', 1, 1, 1, 1, '2016-10-12', NULL),
(335, 89, 2, 3, '2016-09-30 10:05:10', '2016-09-30 10:05:10', 1, 1, 1, 1, NULL, NULL),
(336, 89, 3, 3, '2016-09-30 10:05:10', '2016-09-30 10:05:10', 1, 1, 1, 1, NULL, NULL),
(337, 89, 4, 3, '2016-09-30 10:05:10', '2016-09-30 10:05:10', 1, 1, 1, 1, NULL, NULL),
(338, 90, 1, 1, '2016-09-30 10:16:30', '2016-10-12 08:40:20', 1, 1, 2, 1, '2016-10-12', NULL),
(339, 90, 2, 3, '2016-09-30 10:16:30', '2016-09-30 10:16:30', 1, 1, 2, 1, NULL, NULL),
(340, 90, 3, 3, '2016-09-30 10:16:30', '2016-09-30 10:16:30', 1, 1, 2, 1, NULL, NULL),
(341, 90, 4, 3, '2016-09-30 10:16:30', '2016-09-30 10:16:30', 1, 1, 2, 1, NULL, NULL),
(342, 61, 1, 1, '2016-10-03 07:55:10', '2016-10-03 07:59:40', 1, 2, 4, 1, NULL, NULL),
(345, 62, 1, 1, '2016-10-06 10:44:12', '2016-10-06 10:44:12', 1, 2, 6, 1, NULL, NULL),
(346, 63, 1, 1, '2016-10-06 10:44:25', '2016-10-06 10:44:25', 1, 2, 6, 1, NULL, NULL),
(347, 69, 1, 1, '2016-10-06 10:44:34', '2016-10-06 10:44:34', 1, 2, 6, 1, NULL, NULL),
(348, 92, 1, 1, '2016-10-12 08:39:05', '2016-10-12 08:39:11', 1, 1, 1, 1, '2016-10-12', NULL),
(349, 94, 1, 1, '2016-10-13 09:12:21', '2016-10-13 09:12:31', 1, 2, 4, 1, '2016-10-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'FZS', 'fzs@fzs.rs', '$2y$10$3WVSg3aqW2z6z7iQi9Qn8egVt99pEAxBfHk57CPr0a42DTwaZXI/K', 'qp3qnQO44by2SKmtL4IPzwsBGKZLpWUQ2pQSA1CRA5ikKT7sJ1oiF4ckiY9C', '', '2016-08-29 20:23:28', '2016-10-03 04:59:02'),
(2, 'novi', 'novi@novi.com', '$2y$10$Pf9Y3A.9CmJoBUzy7/oaMePx8v/tzAeGtCi7zkwcbDM527RKw4Cde', 'JWOUU7kCgNDD5ezF7TuijwY3cCb7LgMSzUVxGNYt7gIWfTBnPr95vC5jzuUq', '', '2016-09-01 06:50:06', '2016-09-01 06:51:17'),
(3, 'Drasko', 'dragomix2001@gmail.com', '$2y$10$E1voDJOgmwfpaDOd0FAJsuoq2xrON.1WaAxIKnAkbs/80eKdgRtEK', 'TiUICOpfE1f0qO9CJtwtEeXlql8NOE7akr5v7obZ22lIBaAnreCfNZ6hWI8x', '', '2016-09-14 16:56:55', '2016-09-14 16:57:02'),
(4, 'snezana', 'snezanacica@gmail.com', '$2y$10$EVCbZDDzLZ8s.aD4182oaeWh2y3D8xIIbzW/.gnq74/iVD0ouX056', '1030eRwh6EFMStnLqGik31p0CyYNLb0TDDcsVDhydoTkn7zjVGhybDxHTX9k', '', '2016-09-20 05:16:03', '2016-10-13 06:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `uspeh_srednja_skola`
--

DROP TABLE IF EXISTS `uspeh_srednja_skola`;
CREATE TABLE IF NOT EXISTS `uspeh_srednja_skola` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kandidat_id` int(10) UNSIGNED NOT NULL,
  `srednjeSkoleFakulteti_id` int(10) UNSIGNED NOT NULL,
  `opstiUspeh_id` int(10) UNSIGNED NOT NULL,
  `srednja_ocena` double NOT NULL,
  `RedniBrojRazreda` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uspeh_srednja_skola_kandidat_id_index` (`kandidat_id`),
  KEY `uspeh_srednja_skola_srednjeskolefakulteti_id_index` (`srednjeSkoleFakulteti_id`),
  KEY `uspeh_srednja_skola_opstiuspeh_id_index` (`opstiUspeh_id`)
) ENGINE=MyISAM AUTO_INCREMENT=357 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uspeh_srednja_skola`
--

INSERT INTO `uspeh_srednja_skola` (`id`, `kandidat_id`, `srednjeSkoleFakulteti_id`, `opstiUspeh_id`, `srednja_ocena`, `RedniBrojRazreda`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 1, 4.56, 1, '2016-08-30 07:48:34', '2016-08-30 07:48:34'),
(2, 1, 0, 3, 3.41, 2, '2016-08-30 07:48:34', '2016-08-30 07:48:34'),
(3, 1, 0, 4, 2.31, 3, '2016-08-30 07:48:34', '2016-08-30 07:48:34'),
(4, 1, 0, 1, 4.85, 4, '2016-08-30 07:48:34', '2016-08-30 07:48:34'),
(5, 2, 0, 1, 0, 1, '2016-09-01 06:57:00', '2016-10-12 08:58:28'),
(6, 2, 0, 1, 0, 2, '2016-09-01 06:57:00', '2016-10-12 08:58:28'),
(7, 2, 0, 1, 0, 3, '2016-09-01 06:57:00', '2016-10-12 08:58:28'),
(8, 2, 0, 1, 0, 4, '2016-09-01 06:57:00', '2016-10-12 08:58:28'),
(9, 3, 0, 3, 3.18, 1, '2016-09-01 07:30:43', '2016-09-01 07:30:43'),
(10, 3, 0, 3, 2.8, 2, '2016-09-01 07:30:43', '2016-09-01 07:30:43'),
(11, 3, 0, 3, 3.17, 3, '2016-09-01 07:30:43', '2016-09-01 07:30:43'),
(12, 3, 0, 3, 3.21, 4, '2016-09-01 07:30:43', '2016-09-01 07:30:43'),
(13, 4, 0, 3, 3.18, 1, '2016-09-01 07:38:07', '2016-09-01 07:38:07'),
(14, 4, 0, 3, 2.8, 2, '2016-09-01 07:38:07', '2016-10-13 08:13:13'),
(15, 4, 0, 3, 3.17, 3, '2016-09-01 07:38:07', '2016-09-01 07:38:07'),
(16, 4, 0, 3, 3.21, 4, '2016-09-01 07:38:07', '2016-09-01 07:38:07'),
(17, 6, 0, 1, 0, 1, '2016-09-01 07:47:27', '2016-09-01 07:47:27'),
(18, 6, 0, 1, 0, 2, '2016-09-01 07:47:27', '2016-09-01 07:47:27'),
(19, 6, 0, 1, 0, 3, '2016-09-01 07:47:27', '2016-09-01 07:47:27'),
(20, 6, 0, 1, 0, 4, '2016-09-01 07:47:27', '2016-09-01 07:47:27'),
(21, 7, 0, 1, 4.53, 1, '2016-09-01 07:53:56', '2016-09-01 07:53:56'),
(22, 7, 0, 1, 4.5, 2, '2016-09-01 07:53:56', '2016-09-27 17:50:42'),
(23, 7, 0, 2, 4, 3, '2016-09-01 07:53:56', '2016-09-27 17:50:42'),
(24, 7, 0, 2, 4.3, 4, '2016-09-01 07:53:56', '2016-09-27 17:50:42'),
(25, 8, 0, 1, 0, 1, '2016-09-01 08:03:27', '2016-09-25 15:06:06'),
(26, 8, 0, 1, 0, 2, '2016-09-01 08:03:27', '2016-09-25 15:06:06'),
(27, 8, 0, 1, 0, 3, '2016-09-01 08:03:27', '2016-09-25 15:06:06'),
(28, 8, 0, 1, 0, 4, '2016-09-01 08:03:27', '2016-09-25 15:06:06'),
(29, 9, 0, 2, 4, 1, '2016-09-01 08:09:16', '2016-09-25 15:06:28'),
(30, 9, 0, 2, 4, 2, '2016-09-01 08:09:16', '2016-09-25 15:06:28'),
(31, 9, 0, 2, 4, 3, '2016-09-01 08:09:16', '2016-09-25 15:06:28'),
(32, 9, 0, 2, 4, 4, '2016-09-01 08:09:16', '2016-09-25 15:06:28'),
(33, 11, 0, 2, 4.27, 1, '2016-09-01 08:14:24', '2016-09-01 08:14:24'),
(34, 11, 0, 1, 4.56, 2, '2016-09-01 08:14:24', '2016-09-01 08:14:24'),
(35, 11, 0, 2, 4.29, 3, '2016-09-01 08:14:24', '2016-09-01 08:14:24'),
(36, 11, 0, 2, 4.29, 4, '2016-09-01 08:14:24', '2016-09-01 08:14:24'),
(37, 10, 0, 1, 4.6, 1, '2016-09-01 08:18:37', '2016-09-27 17:52:58'),
(38, 10, 0, 2, 4.31, 2, '2016-09-01 08:18:37', '2016-09-01 08:18:37'),
(39, 10, 0, 1, 4.56, 3, '2016-09-01 08:18:37', '2016-09-01 08:18:37'),
(40, 10, 0, 1, 4.5, 4, '2016-09-01 08:18:37', '2016-09-27 17:52:58'),
(41, 12, 0, 3, 3.26, 1, '2016-09-01 08:20:02', '2016-09-01 08:20:02'),
(42, 12, 0, 2, 3.5, 2, '2016-09-01 08:20:02', '2016-09-25 15:23:54'),
(43, 12, 0, 3, 3.15, 3, '2016-09-01 08:20:02', '2016-09-01 08:20:02'),
(44, 12, 0, 3, 2.93, 4, '2016-09-01 08:20:02', '2016-09-01 08:20:02'),
(45, 13, 0, 2, 4, 1, '2016-09-01 08:30:49', '2016-09-01 08:30:49'),
(46, 13, 0, 2, 4, 2, '2016-09-01 08:30:49', '2016-09-01 08:30:49'),
(47, 13, 0, 3, 3, 3, '2016-09-01 08:30:49', '2016-09-01 08:30:49'),
(48, 13, 0, 3, 3, 4, '2016-09-01 08:30:49', '2016-09-01 08:30:49'),
(49, 14, 0, 3, 3.19, 1, '2016-09-01 08:35:07', '2016-09-01 08:35:07'),
(50, 14, 0, 3, 3.36, 2, '2016-09-01 08:35:07', '2016-09-01 08:35:07'),
(51, 14, 0, 3, 2.75, 3, '2016-09-01 08:35:07', '2016-09-01 08:35:07'),
(52, 14, 0, 3, 3.15, 4, '2016-09-01 08:35:07', '2016-09-01 08:35:07'),
(53, 15, 0, 3, 3.19, 1, '2016-09-01 08:44:06', '2016-09-01 08:44:06'),
(54, 15, 0, 2, 3.5, 2, '2016-09-01 08:44:06', '2016-09-01 08:44:06'),
(55, 15, 0, 3, 3, 3, '2016-09-01 08:44:06', '2016-09-01 08:44:06'),
(56, 15, 0, 3, 2.82, 4, '2016-09-01 08:44:06', '2016-09-01 08:44:06'),
(57, 16, 0, 3, 3.4, 1, '2016-09-01 08:57:57', '2016-09-25 15:22:36'),
(58, 16, 0, 3, 3, 2, '2016-09-01 08:57:57', '2016-09-25 15:22:36'),
(59, 16, 0, 3, 3, 3, '2016-09-01 08:57:57', '2016-09-25 15:22:36'),
(60, 16, 0, 3, 2.79, 4, '2016-09-01 08:57:57', '2016-09-01 08:57:57'),
(61, 17, 0, 3, 2.75, 1, '2016-09-01 09:01:31', '2016-09-01 09:01:31'),
(62, 17, 0, 3, 2.76, 2, '2016-09-01 09:01:31', '2016-09-01 09:01:31'),
(63, 17, 0, 4, 2.33, 3, '2016-09-01 09:01:31', '2016-09-01 09:01:31'),
(64, 17, 0, 4, 2.36, 4, '2016-09-01 09:01:31', '2016-09-01 09:01:31'),
(65, 18, 0, 3, 3.13, 1, '2016-09-01 09:03:02', '2016-09-01 09:03:02'),
(66, 18, 0, 3, 3.13, 2, '2016-09-01 09:03:02', '2016-09-01 09:03:02'),
(67, 18, 0, 3, 2.83, 3, '2016-09-01 09:03:02', '2016-09-01 09:03:02'),
(68, 18, 0, 3, 3, 4, '2016-09-01 09:03:02', '2016-09-25 15:28:30'),
(69, 19, 0, 2, 3.67, 1, '2016-09-01 09:12:18', '2016-09-01 09:12:18'),
(70, 19, 0, 2, 3.87, 2, '2016-09-01 09:12:18', '2016-09-01 09:12:18'),
(71, 19, 0, 2, 3.54, 3, '2016-09-01 09:12:18', '2016-09-01 09:12:18'),
(72, 19, 0, 2, 3.92, 4, '2016-09-01 09:12:18', '2016-09-01 09:12:18'),
(73, 20, 0, 1, 4.87, 1, '2016-09-01 09:19:12', '2016-09-01 09:19:12'),
(74, 20, 0, 2, 4.35, 2, '2016-09-01 09:19:12', '2016-09-01 09:19:12'),
(75, 20, 0, 2, 4.07, 3, '2016-09-01 09:19:12', '2016-09-01 09:19:12'),
(76, 20, 0, 2, 4.07, 4, '2016-09-01 09:19:12', '2016-09-01 09:19:12'),
(77, 21, 0, 2, 4.14, 1, '2016-09-01 09:21:43', '2016-09-01 09:21:43'),
(78, 21, 0, 2, 3.86, 2, '2016-09-01 09:21:43', '2016-09-01 09:21:43'),
(79, 21, 0, 2, 3.86, 3, '2016-09-01 09:21:43', '2016-09-01 09:21:43'),
(80, 21, 0, 3, 3.31, 4, '2016-09-01 09:21:43', '2016-09-01 09:21:43'),
(81, 22, 0, 3, 3.08, 1, '2016-09-01 09:26:43', '2016-09-01 09:26:43'),
(82, 22, 0, 3, 2.79, 2, '2016-09-01 09:26:43', '2016-09-01 09:26:43'),
(83, 22, 0, 2, 3.54, 3, '2016-09-01 09:26:43', '2016-09-01 09:26:43'),
(84, 22, 0, 2, 3.5, 4, '2016-09-01 09:26:43', '2016-09-01 09:26:43'),
(85, 23, 0, 2, 3.71, 1, '2016-09-01 09:32:19', '2016-09-01 09:32:19'),
(86, 23, 0, 2, 3.84, 2, '2016-09-01 09:32:19', '2016-09-01 09:32:19'),
(87, 23, 0, 2, 3.61, 3, '2016-09-01 09:32:19', '2016-09-01 09:32:19'),
(88, 23, 0, 3, 3.23, 4, '2016-09-01 09:32:19', '2016-09-01 09:32:19'),
(89, 24, 0, 1, 0, 1, '2016-09-01 09:37:15', '2016-09-27 17:06:44'),
(90, 24, 0, 1, 0, 2, '2016-09-01 09:37:15', '2016-09-27 17:06:44'),
(91, 24, 0, 1, 0, 3, '2016-09-01 09:37:15', '2016-09-27 17:06:44'),
(92, 24, 0, 1, 0, 4, '2016-09-01 09:37:15', '2016-09-27 17:06:44'),
(93, 26, 0, 3, 3.07, 1, '2016-09-01 09:46:07', '2016-09-01 09:46:07'),
(94, 26, 0, 3, 3.08, 2, '2016-09-01 09:46:07', '2016-09-01 09:46:07'),
(95, 26, 0, 3, 3, 3, '2016-09-01 09:46:07', '2016-09-27 17:05:24'),
(96, 26, 0, 3, 3.08, 4, '2016-09-01 09:46:07', '2016-09-01 09:46:07'),
(97, 25, 0, 2, 4.33, 1, '2016-09-01 09:46:16', '2016-09-01 09:46:16'),
(98, 25, 0, 1, 4.5, 2, '2016-09-01 09:46:16', '2016-09-27 17:09:34'),
(99, 25, 0, 1, 4.5, 3, '2016-09-01 09:46:16', '2016-09-27 17:09:34'),
(100, 25, 0, 1, 4.5, 4, '2016-09-01 09:46:16', '2016-09-27 17:09:34'),
(101, 27, 0, 1, 0, 1, '2016-09-01 09:50:18', '2016-09-01 09:50:18'),
(102, 27, 0, 1, 0, 2, '2016-09-01 09:50:18', '2016-09-01 09:50:18'),
(103, 27, 0, 1, 0, 3, '2016-09-01 09:50:18', '2016-09-01 09:50:18'),
(104, 27, 0, 1, 0, 4, '2016-09-01 09:50:18', '2016-09-01 09:50:18'),
(105, 28, 0, 2, 3.69, 1, '2016-09-01 09:56:03', '2016-09-01 09:56:03'),
(106, 28, 0, 2, 3.67, 2, '2016-09-01 09:56:03', '2016-09-01 09:56:03'),
(107, 28, 0, 3, 2.92, 3, '2016-09-01 09:56:03', '2016-09-01 09:56:03'),
(108, 28, 0, 3, 2.92, 4, '2016-09-01 09:56:03', '2016-09-01 09:56:03'),
(109, 29, 0, 2, 4.38, 1, '2016-09-01 09:57:52', '2016-09-01 09:57:52'),
(110, 29, 0, 2, 4.38, 2, '2016-09-01 09:57:52', '2016-09-01 09:57:52'),
(111, 29, 0, 1, 4.5, 3, '2016-09-01 09:57:52', '2016-09-01 09:57:52'),
(112, 29, 0, 1, 4.5, 4, '2016-09-01 09:57:52', '2016-09-01 09:57:52'),
(113, 30, 0, 3, 2.54, 1, '2016-09-01 10:06:17', '2016-09-01 10:06:17'),
(114, 30, 0, 3, 2.58, 2, '2016-09-01 10:06:17', '2016-09-01 10:06:17'),
(115, 30, 0, 4, 2.18, 3, '2016-09-01 10:06:17', '2016-09-01 10:06:17'),
(116, 30, 0, 3, 3.1, 4, '2016-09-01 10:06:17', '2016-09-01 10:06:17'),
(117, 32, 0, 2, 3.54, 1, '2016-09-01 10:15:10', '2016-09-01 10:15:10'),
(118, 32, 0, 2, 3.67, 2, '2016-09-01 10:15:10', '2016-09-01 10:15:10'),
(119, 32, 0, 2, 3.62, 3, '2016-09-01 10:15:10', '2016-09-01 10:15:10'),
(120, 32, 0, 2, 4.23, 4, '2016-09-01 10:15:10', '2016-09-01 10:15:10'),
(121, 31, 0, 2, 4, 1, '2016-09-01 10:15:33', '2016-09-01 10:15:33'),
(122, 31, 0, 2, 3.6, 2, '2016-09-01 10:15:33', '2016-09-01 10:15:33'),
(123, 31, 0, 3, 2.77, 3, '2016-09-01 10:15:33', '2016-09-01 10:15:33'),
(124, 31, 0, 2, 3.69, 4, '2016-09-01 10:15:33', '2016-09-01 10:15:33'),
(125, 33, 0, 2, 4.27, 1, '2016-09-01 10:25:09', '2016-09-01 10:25:09'),
(126, 33, 0, 2, 4.31, 2, '2016-09-01 10:25:09', '2016-09-01 10:25:09'),
(127, 33, 0, 2, 4.36, 3, '2016-09-01 10:25:09', '2016-09-01 10:25:09'),
(128, 33, 0, 2, 4.29, 4, '2016-09-01 10:25:09', '2016-09-01 10:25:09'),
(129, 34, 0, 2, 3.58, 1, '2016-09-01 10:28:57', '2016-09-01 10:28:57'),
(130, 34, 0, 2, 4.08, 2, '2016-09-01 10:28:57', '2016-09-01 10:28:57'),
(131, 34, 0, 3, 2.92, 3, '2016-09-01 10:28:57', '2016-09-01 10:28:57'),
(132, 34, 0, 3, 3.36, 4, '2016-09-01 10:28:57', '2016-09-01 10:28:57'),
(133, 35, 0, 1, 5, 1, '2016-09-01 10:32:31', '2016-09-01 10:32:31'),
(134, 35, 0, 1, 5, 2, '2016-09-01 10:32:31', '2016-09-01 10:32:31'),
(135, 35, 0, 1, 4.86, 3, '2016-09-01 10:32:31', '2016-09-01 10:32:31'),
(136, 35, 0, 1, 4.93, 4, '2016-09-01 10:32:31', '2016-09-01 10:32:31'),
(137, 36, 0, 3, 3.2, 1, '2016-09-01 10:35:03', '2016-09-01 10:35:03'),
(138, 36, 0, 2, 3.94, 2, '2016-09-01 10:35:03', '2016-09-01 10:35:03'),
(139, 36, 0, 3, 3.23, 3, '2016-09-01 10:35:03', '2016-09-01 10:35:03'),
(140, 36, 0, 3, 2.79, 4, '2016-09-01 10:35:03', '2016-09-01 10:35:03'),
(141, 37, 0, 3, 2.53, 1, '2016-09-01 10:41:23', '2016-09-01 10:41:23'),
(142, 37, 0, 4, 2.38, 2, '2016-09-01 10:41:23', '2016-09-01 10:41:23'),
(143, 37, 0, 3, 2.54, 3, '2016-09-01 10:41:23', '2016-09-01 10:41:23'),
(144, 37, 0, 3, 2.5, 4, '2016-09-01 10:41:23', '2016-09-01 10:41:23'),
(145, 38, 0, 1, 4.69, 1, '2016-09-01 10:54:05', '2016-09-01 10:54:05'),
(146, 38, 0, 1, 4.5, 2, '2016-09-01 10:54:05', '2016-09-01 10:54:05'),
(147, 38, 0, 2, 4, 3, '2016-09-01 10:54:05', '2016-09-01 10:54:05'),
(148, 38, 0, 2, 3.79, 4, '2016-09-01 10:54:05', '2016-09-01 10:54:05'),
(149, 39, 0, 3, 3.17, 1, '2016-09-01 10:58:30', '2016-09-01 10:58:30'),
(150, 39, 0, 3, 2.61, 2, '2016-09-01 10:58:30', '2016-09-01 10:58:30'),
(151, 39, 0, 3, 2.85, 3, '2016-09-01 10:58:30', '2016-09-01 10:58:30'),
(152, 39, 0, 2, 3.83, 4, '2016-09-01 10:58:30', '2016-09-01 10:58:30'),
(153, 40, 0, 2, 3.8, 1, '2016-09-01 11:03:01', '2016-09-26 08:59:31'),
(154, 40, 0, 2, 3.67, 2, '2016-09-01 11:03:01', '2016-09-01 11:03:01'),
(155, 40, 0, 3, 3.08, 3, '2016-09-01 11:03:01', '2016-09-01 11:03:01'),
(156, 40, 0, 3, 2.92, 4, '2016-09-01 11:03:01', '2016-09-01 11:03:01'),
(157, 41, 0, 1, 0, 1, '2016-09-01 11:06:43', '2016-09-01 11:06:43'),
(158, 41, 0, 1, 0, 2, '2016-09-01 11:06:43', '2016-09-01 11:06:43'),
(159, 41, 0, 1, 0, 3, '2016-09-01 11:06:43', '2016-09-01 11:06:43'),
(160, 41, 0, 1, 0, 4, '2016-09-01 11:06:43', '2016-09-01 11:06:43'),
(161, 42, 0, 3, 2.57, 1, '2016-09-01 11:14:16', '2016-09-01 11:14:16'),
(162, 42, 0, 3, 2.57, 2, '2016-09-01 11:14:16', '2016-09-01 11:14:16'),
(163, 42, 0, 3, 2.5, 3, '2016-09-01 11:14:16', '2016-09-15 08:59:30'),
(164, 42, 0, 3, 2.6, 4, '2016-09-01 11:14:16', '2016-09-15 08:59:30'),
(165, 43, 0, 4, 2.4, 1, '2016-09-01 11:18:20', '2016-09-01 11:18:20'),
(166, 43, 0, 3, 2.69, 2, '2016-09-01 11:18:20', '2016-09-01 11:18:20'),
(167, 43, 0, 3, 2.77, 3, '2016-09-01 11:18:20', '2016-09-01 11:18:20'),
(168, 43, 0, 3, 2.57, 4, '2016-09-01 11:18:20', '2016-09-01 11:18:20'),
(169, 44, 0, 1, 0, 1, '2016-09-02 04:46:55', '2016-09-15 08:24:26'),
(170, 44, 0, 1, 0, 2, '2016-09-02 04:46:55', '2016-09-15 08:24:26'),
(171, 44, 0, 1, 0, 3, '2016-09-02 04:46:55', '2016-09-15 08:24:26'),
(172, 44, 0, 1, 0, 4, '2016-09-02 04:46:55', '2016-09-15 08:24:26'),
(173, 45, 0, 1, 0, 1, '2016-09-02 04:47:46', '2016-10-12 08:48:24'),
(174, 45, 0, 1, 0, 2, '2016-09-02 04:47:46', '2016-10-12 08:48:24'),
(175, 45, 0, 1, 0, 3, '2016-09-02 04:47:46', '2016-10-12 08:48:24'),
(176, 45, 0, 1, 0, 4, '2016-09-02 04:47:46', '2016-10-12 08:48:24'),
(177, 46, 0, 3, 3.27, 1, '2016-09-02 04:55:41', '2016-09-02 04:55:41'),
(178, 46, 0, 4, 2.4, 2, '2016-09-02 04:55:41', '2016-09-02 04:55:41'),
(179, 46, 0, 3, 2.92, 3, '2016-09-02 04:55:41', '2016-09-02 04:55:41'),
(180, 46, 0, 3, 3.15, 4, '2016-09-02 04:55:41', '2016-09-02 04:55:41'),
(181, 47, 0, 1, 0, 1, '2016-09-02 04:56:35', '2016-09-02 04:56:35'),
(182, 47, 0, 1, 0, 2, '2016-09-02 04:56:35', '2016-09-02 04:56:35'),
(183, 47, 0, 1, 0, 3, '2016-09-02 04:56:35', '2016-09-02 04:56:35'),
(184, 47, 0, 1, 0, 4, '2016-09-02 04:56:35', '2016-09-02 04:56:35'),
(185, 48, 0, 4, 2.42, 1, '2016-09-02 05:10:34', '2016-09-02 05:10:34'),
(186, 48, 0, 2, 4.2, 2, '2016-09-02 05:10:34', '2016-09-02 05:10:34'),
(187, 48, 0, 2, 3.92, 3, '2016-09-02 05:10:34', '2016-09-02 05:10:34'),
(188, 48, 0, 2, 3.5, 4, '2016-09-02 05:10:34', '2016-09-02 05:10:34'),
(189, 49, 0, 3, 2.69, 1, '2016-09-02 05:13:07', '2016-09-02 05:13:07'),
(190, 49, 0, 3, 2.93, 2, '2016-09-02 05:13:07', '2016-09-02 05:13:07'),
(191, 49, 0, 2, 3.83, 3, '2016-09-02 05:13:07', '2016-09-02 05:13:07'),
(192, 49, 0, 3, 2.55, 4, '2016-09-02 05:13:07', '2016-09-02 05:13:07'),
(193, 51, 0, 2, 4, 1, '2016-09-02 05:24:45', '2016-09-02 05:24:45'),
(194, 51, 0, 2, 3.56, 2, '2016-09-02 05:24:45', '2016-09-02 05:24:45'),
(195, 51, 0, 2, 4.42, 3, '2016-09-02 05:24:45', '2016-09-02 05:24:45'),
(196, 51, 0, 3, 3.15, 4, '2016-09-02 05:24:45', '2016-09-02 05:24:45'),
(197, 50, 0, 3, 2.9, 1, '2016-09-02 05:24:55', '2016-10-13 07:08:52'),
(198, 50, 0, 3, 3.28, 2, '2016-09-02 05:24:55', '2016-09-02 05:24:55'),
(199, 50, 0, 3, 3.31, 3, '2016-09-02 05:24:55', '2016-09-02 05:24:55'),
(200, 50, 0, 3, 3, 4, '2016-09-02 05:24:55', '2016-10-13 07:08:52'),
(201, 52, 0, 3, 2.66, 1, '2016-09-02 05:35:58', '2016-09-02 05:35:58'),
(202, 52, 0, 4, 2.4, 2, '2016-09-02 05:35:58', '2016-09-02 05:35:58'),
(203, 52, 0, 4, 2.2, 3, '2016-09-02 05:35:58', '2016-09-02 05:35:58'),
(204, 52, 0, 3, 3, 4, '2016-09-02 05:35:58', '2016-09-02 05:35:58'),
(205, 53, 0, 3, 3.13, 1, '2016-09-02 05:37:07', '2016-09-02 05:37:07'),
(206, 53, 0, 3, 2.94, 2, '2016-09-02 05:37:07', '2016-09-02 05:37:07'),
(207, 53, 0, 3, 2.54, 3, '2016-09-02 05:37:07', '2016-09-02 05:37:07'),
(208, 53, 0, 4, 2.43, 4, '2016-09-02 05:37:07', '2016-09-02 05:37:07'),
(209, 54, 0, 2, 3.53, 1, '2016-09-02 05:47:09', '2016-09-02 05:47:09'),
(210, 54, 0, 3, 3, 2, '2016-09-02 05:47:09', '2016-09-02 05:47:09'),
(211, 54, 0, 3, 2.75, 3, '2016-09-02 05:47:09', '2016-09-02 05:47:09'),
(212, 54, 0, 3, 3.08, 4, '2016-09-02 05:47:09', '2016-09-02 05:47:09'),
(213, 55, 0, 3, 3.31, 1, '2016-09-02 05:49:43', '2016-09-02 05:49:43'),
(214, 55, 0, 3, 3.25, 2, '2016-09-02 05:49:43', '2016-09-02 05:49:43'),
(215, 55, 0, 3, 2.69, 3, '2016-09-02 05:49:43', '2016-09-02 05:49:43'),
(216, 55, 0, 3, 2.71, 4, '2016-09-02 05:49:43', '2016-09-02 05:49:43'),
(217, 56, 0, 5, 0, 1, '2016-09-02 05:55:45', '2016-09-02 05:55:45'),
(218, 56, 0, 1, 0, 2, '2016-09-02 05:55:45', '2016-09-02 05:55:45'),
(219, 56, 0, 1, 0, 3, '2016-09-02 05:55:45', '2016-09-02 05:55:45'),
(220, 56, 0, 1, 0, 4, '2016-09-02 05:55:45', '2016-09-02 05:55:45'),
(221, 57, 0, 1, 0, 1, '2016-09-02 06:09:41', '2016-10-12 08:47:57'),
(222, 57, 0, 1, 0, 2, '2016-09-02 06:09:41', '2016-10-12 08:47:57'),
(223, 57, 0, 1, 0, 3, '2016-09-02 06:09:41', '2016-10-12 08:47:57'),
(224, 57, 0, 1, 0, 4, '2016-09-02 06:09:41', '2016-10-12 08:47:57'),
(225, 58, 0, 1, 0, 1, '2016-09-02 06:58:28', '2016-09-02 06:58:28'),
(226, 58, 0, 1, 0, 2, '2016-09-02 06:58:28', '2016-09-02 06:58:28'),
(227, 58, 0, 1, 0, 3, '2016-09-02 06:58:28', '2016-09-02 06:58:28'),
(228, 58, 0, 1, 0, 4, '2016-09-02 06:58:28', '2016-09-02 06:58:28'),
(229, 59, 0, 1, 0, 1, '2016-09-02 07:04:49', '2016-09-02 07:04:49'),
(230, 59, 0, 1, 0, 2, '2016-09-02 07:04:49', '2016-09-02 07:04:49'),
(231, 59, 0, 1, 0, 3, '2016-09-02 07:04:49', '2016-09-02 07:04:49'),
(232, 59, 0, 1, 0, 4, '2016-09-02 07:04:49', '2016-09-02 07:04:49'),
(233, 60, 0, 2, 3.71, 1, '2016-09-02 07:17:31', '2016-09-02 07:17:31'),
(234, 60, 0, 2, 3.57, 2, '2016-09-02 07:17:31', '2016-09-02 07:17:31'),
(235, 60, 0, 3, 3, 3, '2016-09-02 07:17:31', '2016-09-02 07:17:31'),
(236, 60, 0, 2, 3.5, 4, '2016-09-02 07:17:31', '2016-09-02 07:17:31'),
(237, 64, 0, 2, 3.5, 1, '2016-09-05 10:10:50', '2016-09-22 10:17:24'),
(238, 64, 0, 3, 2.71, 2, '2016-09-05 10:10:50', '2016-09-05 10:10:50'),
(239, 64, 0, 4, 2.33, 3, '2016-09-05 10:10:50', '2016-09-05 10:10:50'),
(240, 64, 0, 4, 2.22, 4, '2016-09-05 10:10:50', '2016-09-05 10:10:50'),
(241, 65, 0, 1, 0, 1, '2016-09-07 04:40:31', '2016-09-07 04:40:31'),
(242, 65, 0, 3, 2.5, 2, '2016-09-07 04:40:31', '2016-09-07 04:40:31'),
(243, 65, 0, 3, 2.58, 3, '2016-09-07 04:40:31', '2016-09-07 04:40:31'),
(244, 65, 0, 3, 2.92, 4, '2016-09-07 04:40:31', '2016-09-07 04:40:31'),
(245, 66, 0, 2, 3.73, 1, '2016-09-07 10:00:02', '2016-09-07 10:00:02'),
(246, 66, 0, 2, 3.5, 2, '2016-09-07 10:00:02', '2016-09-07 10:00:02'),
(247, 66, 0, 2, 3.54, 3, '2016-09-07 10:00:02', '2016-09-07 10:00:02'),
(248, 66, 0, 3, 3.14, 4, '2016-09-07 10:00:02', '2016-09-07 10:00:02'),
(249, 67, 0, 2, 3.62, 1, '2016-09-09 05:37:28', '2016-09-09 05:37:28'),
(250, 67, 0, 3, 3.31, 2, '2016-09-09 05:37:28', '2016-09-09 05:37:28'),
(251, 67, 0, 2, 3.5, 3, '2016-09-09 05:37:28', '2016-09-27 17:36:33'),
(252, 67, 0, 3, 2.83, 4, '2016-09-09 05:37:28', '2016-09-09 05:37:28'),
(253, 68, 0, 3, 2.92, 1, '2016-09-09 08:04:25', '2016-09-09 08:04:25'),
(254, 68, 0, 4, 2.33, 2, '2016-09-09 08:04:25', '2016-09-09 08:04:25'),
(255, 68, 0, 1, 0, 3, '2016-09-09 08:04:25', '2016-09-09 08:04:25'),
(256, 68, 0, 1, 0, 4, '2016-09-09 08:04:25', '2016-09-09 08:04:25'),
(257, 70, 0, 1, 5, 1, '2016-09-12 05:59:31', '2016-09-12 05:59:31'),
(258, 70, 0, 1, 5, 2, '2016-09-12 05:59:31', '2016-09-12 05:59:31'),
(259, 70, 0, 1, 5, 3, '2016-09-12 05:59:31', '2016-09-12 05:59:31'),
(260, 70, 0, 1, 5, 4, '2016-09-12 05:59:31', '2016-09-12 05:59:31'),
(261, 71, 0, 2, 3.5, 1, '2016-09-12 06:09:53', '2016-09-12 06:09:53'),
(262, 71, 0, 2, 3.6, 2, '2016-09-12 06:09:53', '2016-09-12 06:09:53'),
(263, 71, 0, 3, 3.36, 3, '2016-09-12 06:09:53', '2016-09-12 06:09:53'),
(264, 71, 0, 3, 3.36, 4, '2016-09-12 06:09:53', '2016-09-12 06:09:53'),
(265, 72, 0, 3, 2.92, 1, '2016-09-14 05:55:06', '2016-09-14 05:55:06'),
(266, 72, 0, 3, 2.58, 2, '2016-09-14 05:55:06', '2016-09-14 05:55:06'),
(267, 72, 0, 4, 2.38, 3, '2016-09-14 05:55:06', '2016-09-14 05:55:06'),
(268, 72, 0, 2, 4.17, 4, '2016-09-14 05:55:06', '2016-09-14 05:55:06'),
(269, 73, 0, 3, 3.4, 1, '2016-09-14 06:09:48', '2016-09-14 06:09:48'),
(270, 73, 0, 2, 3.6, 2, '2016-09-14 06:09:48', '2016-09-14 06:09:48'),
(271, 73, 0, 3, 3.47, 3, '2016-09-14 06:09:48', '2016-09-14 06:09:48'),
(272, 73, 0, 2, 3.63, 4, '2016-09-14 06:09:48', '2016-09-14 06:09:48'),
(273, 74, 0, 3, 3, 1, '2016-09-15 08:08:59', '2016-09-15 08:08:59'),
(274, 74, 0, 3, 3.18, 2, '2016-09-15 08:08:59', '2016-09-15 08:08:59'),
(275, 74, 0, 3, 3.07, 3, '2016-09-15 08:08:59', '2016-09-15 08:08:59'),
(276, 74, 0, 3, 3.29, 4, '2016-09-15 08:08:59', '2016-09-15 08:08:59'),
(277, 76, 0, 2, 4, 1, '2016-09-20 05:25:24', '2016-10-13 09:14:07'),
(278, 76, 0, 2, 3.63, 2, '2016-09-20 05:25:24', '2016-09-20 05:25:24'),
(279, 76, 0, 3, 3.15, 3, '2016-09-20 05:25:24', '2016-09-20 05:25:24'),
(280, 76, 0, 2, 3.5, 4, '2016-09-20 05:25:24', '2016-10-13 09:14:07'),
(281, 77, 0, 3, 2.93, 1, '2016-09-20 09:58:57', '2016-09-20 09:58:57'),
(282, 77, 0, 3, 3, 2, '2016-09-20 09:58:57', '2016-09-20 09:58:57'),
(283, 77, 0, 3, 3.19, 3, '2016-09-20 09:58:57', '2016-09-20 09:58:57'),
(284, 77, 0, 3, 3, 4, '2016-09-20 09:58:57', '2016-09-20 09:58:57'),
(285, 78, 0, 5, 0, 1, '2016-09-21 05:41:49', '2016-10-02 16:30:00'),
(286, 78, 0, 4, 2.28, 2, '2016-09-21 05:41:49', '2016-09-21 05:41:49'),
(287, 78, 0, 4, 2.25, 3, '2016-09-21 05:41:49', '2016-09-21 05:41:49'),
(288, 78, 0, 4, 2.18, 4, '2016-09-21 05:41:49', '2016-09-21 05:41:49'),
(289, 79, 0, 2, 4.15, 1, '2016-09-21 05:59:12', '2016-09-21 05:59:12'),
(290, 79, 0, 2, 4.25, 2, '2016-09-21 05:59:12', '2016-09-21 05:59:12'),
(291, 79, 0, 2, 4, 3, '2016-09-21 05:59:12', '2016-09-21 05:59:12'),
(292, 79, 0, 2, 4.23, 4, '2016-09-21 05:59:12', '2016-09-21 05:59:12'),
(293, 80, 0, 3, 2.67, 1, '2016-09-23 05:49:47', '2016-09-23 05:49:47'),
(294, 80, 0, 3, 2.53, 2, '2016-09-23 05:49:47', '2016-09-23 05:49:47'),
(295, 80, 0, 4, 2.27, 3, '2016-09-23 05:49:47', '2016-09-23 05:49:47'),
(296, 80, 0, 3, 3.14, 4, '2016-09-23 05:49:47', '2016-09-23 05:49:47'),
(297, 81, 0, 1, 4.75, 1, '2016-09-27 09:52:23', '2016-09-27 09:52:23'),
(298, 81, 0, 1, 4.64, 2, '2016-09-27 09:52:23', '2016-09-27 09:52:23'),
(299, 81, 0, 2, 4, 3, '2016-09-27 09:52:23', '2016-09-27 09:52:23'),
(300, 81, 0, 2, 4.17, 4, '2016-09-27 09:52:23', '2016-09-27 09:52:23'),
(301, 82, 0, 2, 3.87, 1, '2016-09-27 10:01:02', '2016-09-27 10:01:02'),
(302, 82, 0, 2, 3.5, 2, '2016-09-27 10:01:02', '2016-09-27 10:01:02'),
(303, 82, 0, 2, 3.57, 3, '2016-09-27 10:01:02', '2016-09-27 10:01:02'),
(304, 82, 0, 2, 3.57, 4, '2016-09-27 10:01:02', '2016-09-27 10:01:02'),
(305, 5, 0, 1, 0, 1, '2016-09-27 17:49:25', '2016-09-27 17:49:25'),
(306, 5, 0, 1, 0, 2, '2016-09-27 17:49:25', '2016-09-27 17:49:25'),
(307, 5, 0, 1, 0, 3, '2016-09-27 17:49:25', '2016-09-27 17:49:25'),
(308, 5, 0, 1, 0, 4, '2016-09-27 17:49:25', '2016-09-27 17:49:25'),
(309, 83, 0, 1, 0, 1, '2016-09-28 09:53:13', '2016-10-12 09:07:56'),
(310, 83, 0, 1, 0, 2, '2016-09-28 09:53:13', '2016-10-12 09:07:56'),
(311, 83, 0, 1, 0, 3, '2016-09-28 09:53:13', '2016-10-12 09:07:56'),
(312, 83, 0, 1, 0, 4, '2016-09-28 09:53:13', '2016-10-12 09:07:56'),
(313, 84, 0, 3, 2.93, 1, '2016-09-29 07:04:28', '2016-09-29 07:04:28'),
(314, 84, 0, 3, 2.69, 2, '2016-09-29 07:04:28', '2016-09-29 07:04:28'),
(315, 84, 0, 3, 2.71, 3, '2016-09-29 07:04:28', '2016-09-29 07:04:28'),
(316, 84, 0, 1, 0, 4, '2016-09-29 07:04:28', '2016-09-29 07:04:28'),
(317, 85, 0, 1, 0, 1, '2016-09-29 09:24:42', '2016-09-29 09:24:42'),
(318, 85, 0, 1, 0, 2, '2016-09-29 09:24:42', '2016-09-29 09:24:42'),
(319, 85, 0, 1, 0, 3, '2016-09-29 09:24:42', '2016-09-29 09:24:42'),
(320, 85, 0, 1, 0, 4, '2016-09-29 09:24:42', '2016-09-29 09:24:42'),
(321, 86, 0, 1, 0, 1, '2016-09-29 09:31:04', '2016-09-29 09:31:04'),
(322, 86, 0, 1, 0, 2, '2016-09-29 09:31:04', '2016-09-29 09:31:04'),
(323, 86, 0, 1, 0, 3, '2016-09-29 09:31:04', '2016-09-29 09:31:04'),
(324, 86, 0, 1, 0, 4, '2016-09-29 09:31:04', '2016-09-29 09:31:04'),
(325, 87, 0, 2, 3.5, 1, '2016-09-30 08:19:30', '2016-09-30 08:19:30'),
(326, 87, 0, 2, 3.69, 2, '2016-09-30 08:19:30', '2016-09-30 08:19:30'),
(327, 87, 0, 2, 3.58, 3, '2016-09-30 08:19:30', '2016-09-30 08:19:30'),
(328, 87, 0, 1, 4.6, 4, '2016-09-30 08:19:30', '2016-09-30 08:19:30'),
(329, 88, 0, 1, 0, 1, '2016-09-30 08:31:48', '2016-10-14 08:39:43'),
(330, 88, 0, 1, 0, 2, '2016-09-30 08:31:48', '2016-10-14 08:39:43'),
(331, 88, 0, 1, 0, 3, '2016-09-30 08:31:48', '2016-10-14 08:39:43'),
(332, 88, 0, 1, 0, 4, '2016-09-30 08:31:48', '2016-10-14 08:39:43'),
(333, 89, 0, 1, 0, 1, '2016-09-30 10:06:54', '2016-09-30 10:06:54'),
(334, 89, 0, 1, 0, 2, '2016-09-30 10:06:54', '2016-09-30 10:06:54'),
(335, 89, 0, 1, 0, 3, '2016-09-30 10:06:54', '2016-09-30 10:06:54'),
(336, 89, 0, 1, 0, 4, '2016-09-30 10:06:54', '2016-09-30 10:06:54'),
(337, 90, 0, 3, 3, 1, '2016-09-30 10:18:10', '2016-09-30 10:18:10'),
(338, 90, 0, 3, 2.67, 2, '2016-09-30 10:18:10', '2016-09-30 10:18:10'),
(339, 90, 0, 4, 2.42, 3, '2016-09-30 10:18:10', '2016-09-30 10:18:10'),
(340, 90, 0, 3, 3, 4, '2016-09-30 10:18:10', '2016-09-30 10:18:10'),
(341, 92, 0, 3, 2.87, 1, '2016-10-12 07:07:49', '2016-10-12 07:07:49'),
(342, 92, 0, 2, 3.5, 2, '2016-10-12 07:07:49', '2016-10-12 07:07:49'),
(343, 92, 0, 3, 3.08, 3, '2016-10-12 07:07:49', '2016-10-12 07:07:49'),
(344, 92, 0, 3, 2.79, 4, '2016-10-12 07:07:49', '2016-10-12 07:07:49'),
(345, 93, 0, 1, 0, 1, '2016-10-12 09:43:17', '2016-10-13 06:55:55'),
(346, 93, 0, 1, 0, 2, '2016-10-12 09:43:17', '2016-10-13 06:55:55'),
(347, 93, 0, 1, 0, 3, '2016-10-12 09:43:17', '2016-10-13 06:55:55'),
(348, 93, 0, 1, 0, 4, '2016-10-12 09:43:17', '2016-10-13 06:55:55'),
(349, 95, 0, 3, 3.42, 1, '2016-10-14 08:37:53', '2016-10-14 08:37:53'),
(350, 95, 0, 2, 3.85, 2, '2016-10-14 08:37:53', '2016-10-14 08:37:53'),
(351, 95, 0, 2, 3.61, 3, '2016-10-14 08:37:53', '2016-10-14 08:37:53'),
(352, 95, 0, 2, 4.09, 4, '2016-10-14 08:37:53', '2016-10-14 08:37:53'),
(353, 96, 0, 2, 4.4, 1, '2016-10-14 09:28:52', '2016-10-14 09:29:45'),
(354, 96, 0, 2, 4.07, 2, '2016-10-14 09:28:52', '2016-10-14 09:28:52'),
(355, 96, 0, 2, 4.08, 3, '2016-10-14 09:28:52', '2016-10-14 09:28:52'),
(356, 96, 0, 2, 3.85, 4, '2016-10-14 09:28:52', '2016-10-14 09:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `zapisnik_o_polaganju_ispita`
--

DROP TABLE IF EXISTS `zapisnik_o_polaganju_ispita`;
CREATE TABLE IF NOT EXISTS `zapisnik_o_polaganju_ispita` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `predmet_id` int(11) NOT NULL,
  `rok_id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `vreme` time NOT NULL,
  `ucionica` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profesor_id` int(11) NOT NULL,
  `kandidat_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zapisnik_o_polaganju__student`
--

DROP TABLE IF EXISTS `zapisnik_o_polaganju__student`;
CREATE TABLE IF NOT EXISTS `zapisnik_o_polaganju__student` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kandidat_id` int(11) NOT NULL,
  `prijavaIspita_id` int(11) NOT NULL,
  `zapisnik_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zapisnik_o_polaganju__studijski_program`
--

DROP TABLE IF EXISTS `zapisnik_o_polaganju__studijski_program`;
CREATE TABLE IF NOT EXISTS `zapisnik_o_polaganju__studijski_program` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `zapisnik_id` int(11) NOT NULL,
  `StudijskiProgram_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
