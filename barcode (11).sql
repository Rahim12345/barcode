-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Hazırlanma Vaxtı: 20 İyun, 2020 saat 22:59
-- Server versiyası: 10.4.10-MariaDB
-- PHP Versiyası: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Verilənlər Bazası: `barcode`
--

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `bmk`
--

DROP TABLE IF EXISTS `bmk`;
CREATE TABLE IF NOT EXISTS `bmk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bmkNo` int(11) NOT NULL,
  `sellStyle` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `realTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `cash`
--

DROP TABLE IF EXISTS `cash`;
CREATE TABLE IF NOT EXISTS `cash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `telno` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `timer` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `productDetails` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rejectedProducts` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `price` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `realTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `given` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `givenID` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `givenName` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sellerID` int(11) NOT NULL,
  `sellerName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `rejectId` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rejectName` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `qaliqiOdeyen` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rasot` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `realbmk` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `creditdetails`
--

DROP TABLE IF EXISTS `creditdetails`;
CREATE TABLE IF NOT EXISTS `creditdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `productDetails` text COLLATE utf8_unicode_ci NOT NULL,
  `rejectedProducts` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `productPrice` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `firstPrice` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `countMonth` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `sellerTime` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `creditTable` varchar(1200) COLLATE utf8_unicode_ci NOT NULL,
  `avaragePay` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `remindMoney` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `amountPaid` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `amountPaidDebbe` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `debbeDays` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `totalDebbeDays` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `debbe` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `given` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `sellerId` int(11) NOT NULL,
  `seller` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `rejectId` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rejectName` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `realTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payDetails` varchar(5000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `fin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `zemanet` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sonEsas` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sonCerime` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `zamin1` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zamin2` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `gonderen` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `realbmk` varchar(11) COLLATE utf8_unicode_ci DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `debbe`
--

DROP TABLE IF EXISTS `debbe`;
CREATE TABLE IF NOT EXISTS `debbe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `debbe` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `deliveryproducts`
--

DROP TABLE IF EXISTS `deliveryproducts`;
CREATE TABLE IF NOT EXISTS `deliveryproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `telno` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `productDetails` text COLLATE utf8_unicode_ci NOT NULL,
  `bmk` int(11) NOT NULL,
  `givenID` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `givenName` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `hotcall`
--

DROP TABLE IF EXISTS `hotcall`;
CREATE TABLE IF NOT EXISTS `hotcall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telno` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Sxemi çıxarılan cedvel `hotcall`
--

INSERT INTO `hotcall` (`id`, `telno`) VALUES
(1, '0212852612');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `kassa`
--

DROP TABLE IF EXISTS `kassa`;
CREATE TABLE IF NOT EXISTS `kassa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bmk` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `profit` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `realTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `kassaplus`
--

DROP TABLE IF EXISTS `kassaplus`;
CREATE TABLE IF NOT EXISTS `kassaplus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `accounterID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `accounterName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `realTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `entryExit` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `limitedcredittime`
--

DROP TABLE IF EXISTS `limitedcredittime`;
CREATE TABLE IF NOT EXISTS `limitedcredittime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
CREATE TABLE IF NOT EXISTS `manufacturer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `models`
--

DROP TABLE IF EXISTS `models`;
CREATE TABLE IF NOT EXISTS `models` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sellerID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `operationType` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `clock` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `partnormoney`
--

DROP TABLE IF EXISTS `partnormoney`;
CREATE TABLE IF NOT EXISTS `partnormoney` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sellerID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `partnyorID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `money` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `partnyor`
--

DROP TABLE IF EXISTS `partnyor`;
CREATE TABLE IF NOT EXISTS `partnyor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `warehouse` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `partnor` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `manufacturer` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `factura` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `seria` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dimension` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `memoryDimension` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `productDate` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `wholesale` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `selling` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `credit` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `selledPrice` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bmk` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rejectId` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `selled` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `realProTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `qebz`
--

DROP TABLE IF EXISTS `qebz`;
CREATE TABLE IF NOT EXISTS `qebz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomre` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `muqavileN` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `fin` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `saticiAdi` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `odeyenAdi` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `odenisEsas` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `odenisCerime` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `ToplamBorc` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `cerime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `toplamOdenilib` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `store` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `hotCall` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `realDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `regular`
--

DROP TABLE IF EXISTS `regular`;
CREATE TABLE IF NOT EXISTS `regular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SAA` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `dogumTarixi` varchar(12) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `cins` varchar(12) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dogumYeri` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `seria` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Pincode` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `qeydiyyatUnvan` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `verilmeTarixi` varchar(12) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `bitmeTarixi` varchar(12) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `verenOrqan` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `aileVeziyyeti` varchar(22) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mobil1` varchar(22) COLLATE utf8_unicode_ci NOT NULL,
  `mobil2` varchar(22) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mobil3` varchar(22) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ev` varchar(22) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `teskilatAdi` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `vezife` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `isYeriUnvani` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `emekHaqqi` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `elaveGelir` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `rejected`
--

DROP TABLE IF EXISTS `rejected`;
CREATE TABLE IF NOT EXISTS `rejected` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bmk` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `rejectExecName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `rejectExecID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `salarytable`
--

DROP TABLE IF EXISTS `salarytable`;
CREATE TABLE IF NOT EXISTS `salarytable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sellerID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `workerID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `salary` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `bonus` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `priz` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `selledproducts`
--

DROP TABLE IF EXISTS `selledproducts`;
CREATE TABLE IF NOT EXISTS `selledproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `productDetails` text COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `bmkID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `sellerID` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `sellerName` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `reject` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `store`
--

DROP TABLE IF EXISTS `store`;
CREATE TABLE IF NOT EXISTS `store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `topdan`
--

DROP TABLE IF EXISTS `topdan`;
CREATE TABLE IF NOT EXISTS `topdan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `telno` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `timer` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `productDetails` text COLLATE utf8_unicode_ci NOT NULL,
  `rejectedProducts` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `price` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `realTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `given` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `givenID` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `givenName` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sellerID` int(11) NOT NULL,
  `sellerName` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `rejectId` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rejectName` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `qaliqiOdeyen` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rasot` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `realbmk` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `store` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` varchar(55) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `doorKey` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `krediPastDatePermit` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `limitedDate` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Sxemi çıxarılan cedvel `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `store`, `status`, `doorKey`, `krediPastDatePermit`, `limitedDate`) VALUES
(1, 'admin', 'admin123', 'BÜTÜN', 'admin', '0', '0', '0');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `warehouse`
--

DROP TABLE IF EXISTS `warehouse`;
CREATE TABLE IF NOT EXISTS `warehouse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
