-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Dec 30, 2024 at 08:33 AM
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
-- Database: `webdailyjournal`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(2, 'Soto Banjar', 'Soto ayam adalah makanan khas Indonesia yang berupa sejenis sup ayam dengan kuah yang berwarna kekuningan.', 'soto banjar.png', '2024-12-20 05:40:21', 'admin'),
(3, 'Soto Betawi', 'Soto Betawi adalah soto khas Jakarta yang menggunakan santan sebagai salah satu bahan utama kuahnya, memberikan rasa yang kaya dan creamy.', 'soto betawi.png', '2024-12-20 05:40:21', 'admin'),
(4, 'Soto Daging Sapi', 'Soto daging sapi adalah variasi soto yang menggunakan daging sapi sebagai bahan utamanya.', 'soto-daging sapi.png', '2024-12-20 05:40:21', 'admin'),
(5, 'Soto Lamongan', 'Soto Lamongan berasal dari Jawa Timur dan terkenal dengan kuahnya yang bening dan rasa yang segar.', 'soto-lamongan.png', '2024-12-20 05:40:21', 'admin'),
(6, 'Soto Ayam', 'Soto ayam adalah makanan khas Indonesia yang berupa sejenis sup ayam dengan kuah yang berwarna kekuningan.', 'soto_ayam11.png', '2024-12-20 05:40:21', 'admin'),
(7, 'Soto Padang', 'Soto padang adalah hidangan berkuah kaldu sapi dengan bahan irisan daging sapi yang sudah digoreng kering, bihun, ditambah perkedel kentang dan dihidangkan panas-panas. Hidangan ini berasal dari kota Padang, Sumatera Barat.', 'soto padang.png', '2024-12-20 05:40:21', 'admin'),
(8, 'Soto Kudus', 'Soto Kudus  soto yang berasal dari Kudus, Jawa Tengah . Soto kudus, hampir mirip dengan soto Lamongan, soto kudus berisi suwiran ayam dan taoge. Terkadang soto kudus juga menggunakan daging kerbau. Kuahnya lebih bening.', '20241228141744.jpg', '2024-12-28 14:17:44', 'admin'),
(10, 'Soto Bandung', 'Soto Bandung, hidangan khas dari Kota Kembang, menawarkan kesegaran unik dengan kuah beningnya yang kaya akan rasa. Isi dari soto ini mencakup daging sapi yang empuk, irisan lobak yang memberikan tekstur renyah, dan kacang kedelai yang digoreng hingga garing, menambahkan dimensi rasa dan tekstur yang menyenangkan. Penambahan Soto Bandung ke dalam daftar menu Anda dapat menarik pelanggan yang mencari alternatif makanan yang menyegarkan namun penuh cita rasa. ', '20241230141421.jpg', '2024-12-30 14:14:21', 'admin'),
(11, 'Soto Lenthok', 'Soto lenthok ini berasal dari kota Yogyakarta. Lenthok memiliki arti singkong. Di mana soto ini terbuat dari singkong yang diberi bumbu, dibentuk menjadi bulat, lalu digoreng. Soto ini memiliki rasa gurih dan cocok dimakan di siang hari.', '20241230142356.jpg', '2024-12-30 14:23:56', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
