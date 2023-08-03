-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 12:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$JuzQ12qb1bCUJvJD9KNg4e7KUtolZkbL47YL3f3wNAiE4ZpzUQsxu');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `judul`, `pengarang`, `genre`, `stok`) VALUES
(1, 'Secrets Of Divine Love', 'A. Helwa', 'Religion', 10),
(2, 'Sejarah Dunia Yang Disembunyikan', 'Jonathan Black', 'Sejarah', 10),
(3, 'Reinventing Your Life', 'Jeffrey E. Young Ph.D.', 'Self-Improvement', 10),
(4, 'Atomic Habbits', 'James Clear', 'Self-Improvement', 10),
(5, 'Becoming Supernatural', 'Dr. Joe Dizpenza', 'Self-Improvement', 10),
(6, 'Fihi Ma Fihi', 'Jalaludin Rumi', 'Religion', 10);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_peminjam` varchar(30) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `tanggal_meminjam` date NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `status_pengembalian` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `nama_peminjam`, `judul_buku`, `tanggal_meminjam`, `tanggal_pengembalian`, `status_pengembalian`) VALUES
(1, 'User1', 'Secrets Of Divine Love', '2023-07-28', '2023-07-28', 1),
(2, 'User1', 'Sejarah Dunia Yang Disembunyikan', '2023-07-28', '2023-07-28', 1),
(3, 'User1', 'Reinventing Your Life', '2023-07-28', '2023-07-28', 1),
(4, 'User2', 'Secrets Of Divine Love', '2023-07-28', '2023-07-28', 1),
(5, 'User2', 'Sejarah Dunia Yang Disembunyikan', '2023-07-28', '2023-07-28', 1),
(6, 'User2', 'Reinventing Your Life', '2023-07-28', '2023-07-28', 1),
(7, 'User3', 'Secrets Of Divine Love', '2023-07-28', '2023-07-28', 1),
(8, 'User3', 'Sejarah Dunia Yang Disembunyikan', '2023-07-28', '2023-07-28', 1),
(9, 'User3', 'Reinventing Your Life', '2023-07-28', '2023-07-28', 1),
(10, 'User3', 'Secrets Of Divine Love', '2023-07-28', '2023-07-28', 1),
(11, 'User3', 'Secrets Of Divine Love', '2023-07-28', '2023-07-28', 1),
(12, 'User3', 'Sejarah Dunia Yang Disembunyikan', '2023-07-28', '2023-07-28', 1),
(13, 'User3', 'Reinventing Your Life', '2023-07-28', '2023-07-28', 1),
(14, 'User3', 'Sejarah Dunia Yang Disembunyikan', '2023-07-28', '2023-07-28', 1);

--
-- Triggers `transaction`
--
DELIMITER $$
CREATE TRIGGER `update_status_pengembalian` BEFORE INSERT ON `transaction` FOR EACH ROW BEGIN
    IF NEW.tanggal_pengembalian IS NOT NULL THEN
        SET NEW.status_pengembalian = TRUE;
    ELSE
        SET NEW.status_pengembalian = FALSE;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `jenis_kelamin`, `username`, `password`, `pekerjaan`, `no_hp`, `alamat`) VALUES
(1, 'User1', 'L', 'user1', '$2y$10$LsBYsM.PJgnBDuyte6kAau.U1nDnGPkqacNBY/R7YTbAL9F/0ZKRq', 'Pekerjaan1', '081234567891', 'Alamat1'),
(2, 'User2', 'P', 'user2', '$2y$10$iMA3Ij3AB36nom9LU04MO.Clh1I7MKWVCb7YtCwO8YOT.rA4T8Qqq', 'Pekerjaan2', '081234567892', 'Alamat2'),
(3, 'User3', 'L', 'user3', '$2y$10$b.m8HcAvxKkj7j1bIdB5Su4zmliDgJ6oQVTFdd2Cgs7WYC0Urqk/K', 'Pekerjaan3', '081234567893', 'Alamat3'),
(4, 'User4', 'P', 'user4', '$2y$10$zloAcxee/vxilPgwYoL3f.tPd971N5LBJ4cD0hRuRlkBdo8YqWT4K', 'Pekerjaan4', '081234567894', 'Alamat4'),
(5, 'User5', 'L', 'user5', '$2y$10$t0RM7PK6PFe5N3yjisgE2.WywB/NJLYlyDP9AmJ8dkfLLUjtpO1t.', 'Pekerjaan5', '081234567895', 'Alamat5'),
(6, 'User6', 'P', 'user6', '$2y$12$V5xkWTmw8IuJ9VrUa7/ZwueSBYgh14MZqI5sHBW7xw2OGzyW6lyh2', 'Pekerjaan6', '081234567896', 'Alamat6'),
(7, 'User7', 'L', 'user7', '$2y$12$V5xkWTmw8IuJ9VrUa7/ZwueSBYgh14MZqI5sHBW7xw2OGzyW6lyh2', 'Pekerjaan7', '081234567897', 'Alamat7'),
(8, 'User8', 'P', 'user8', '$2y$12$V5xkWTmw8IuJ9VrUa7/ZwueSBYgh14MZqI5sHBW7xw2OGzyW6lyh2', 'Pekerjaan8', '081234567898', 'Alamat8'),
(9, 'User9', 'L', 'user9', '$2y$12$V5xkWTmw8IuJ9VrUa7/ZwueSBYgh14MZqI5sHBW7xw2OGzyW6lyh2', 'Pekerjaan9', '081234567899', 'Alamat9'),
(10, 'User10', 'P', 'user10', '$2y$12$V5xkWTmw8IuJ9VrUa7/ZwueSBYgh14MZqI5sHBW7xw2OGzyW6lyh2', 'Pekerjaan10', '0812345678910', 'Alamat10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
