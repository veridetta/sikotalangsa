-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:1235
-- Generation Time: Dec 07, 2023 at 01:36 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikotalangsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `idakun` int NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`idakun`, `nama`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `idjabatan` int NOT NULL,
  `nama` text NOT NULL,
  `nip` varchar(25) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `tanggallahir` date NOT NULL,
  `usia` varchar(3) NOT NULL,
  `tugas` text NOT NULL,
  `relasi` text,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`idjabatan`, `nama`, `nip`, `pangkat`, `jabatan`, `tanggallahir`, `usia`, `tugas`, `relasi`, `keterangan`) VALUES
(4, 'Sugeng', '444', 'IV/c', 'Kabag', '2023-10-06', '22', 'aasa', '0', NULL),
(8, 'Alex', '3', 'III/d', 'Pelaksana', '2000-01-01', '5', '0055', '0', NULL),
(9, 'Yanto', '0592850821', 'IV/c', 'Pengelola/Pengawas', '1995-10-13', '25', 'Mengawasi', '11', NULL),
(10, 'Budi', '058215921', 'IV/c', 'Analisis', '2000-10-16', '20', '-', '0', NULL),
(11, 'Udin', '05298521', 'III/b', 'Kasubbag', '2000-10-16', '23', '-', '0', NULL),
(12, 'Contoh Kasubbag', '31232131312', 'IV/b', 'Kasubbag', '2023-12-02', '22', 'Tugasnya banyak', '0', 'Contoh'),
(13, 'Contoh Bawahan', '2312312312', 'IV/c', 'Pengelola/Pengawas', '2023-12-16', '20', 'Tugas', '12', 'Bawahan Akut');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`idakun`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`idjabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `idakun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `idjabatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
