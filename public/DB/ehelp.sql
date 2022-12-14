-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2020 at 11:33 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehelp`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultas`
--
Create Database ehelp;
USE ehelp;

CREATE TABLE `consultas` (
  `Id` int(11) NOT NULL,
  `Usuario` varchar(255) NOT NULL,
  `Doctor` varchar(255) NOT NULL,
  `Fecha` varchar(255) NOT NULL,
  `Consultorio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `datosusuario`
--

CREATE TABLE `datosusuario` (
  `IdUsuario` int(11) NOT NULL,
  `Usuario` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Edad` int(10) NOT NULL,
  `Sexo` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Alergias` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Enfermedades` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `datosusuario`
--

INSERT INTO `datosusuario` (`IdUsuario`, `Usuario`, `Edad`, `Sexo`, `Alergias`, `Enfermedades`) VALUES
(1, 'root', 22, 'masculino', 'ninguna', 'ninguna');

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `IdEmpleados` int(11) NOT NULL,
  `Nombre` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Apellidos` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Puesto` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Correo` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`IdEmpleados`, `Nombre`, `Apellidos`, `Puesto`, `Correo`) VALUES
(2, 'Ana', 'Perez', 'Medico', 'Perez@hotmail.com'),
(7, 'Luis', 'Mendoza', 'medico', 'juan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usuariosadmin`
--

CREATE TABLE `usuariosadmin` (
  `Id` int(11) NOT NULL,
  `adminuser` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuariosadmin`
--

INSERT INTO `usuariosadmin` (`Id`, `adminuser`, `correo`, `contrasena`) VALUES
(1, 'admin1', 'admin@gmail.com', '$2y$10$kKSzM.UdEEpzJ8OSuUV.3e6thoRxUFcN4iZsbRInp9pl4l0D8TD4K'),
(2, 'admin2', 'admin2@gmail.com', '$2y$10$/TwqAiLfPzzCF0InyiA5lu6tH1lqxlP8nxz29a30LlMvHi.BS3Up2');

-- --------------------------------------------------------

--
-- Table structure for table `usuariosclientes`
--

CREATE TABLE `usuariosclientes` (
  `IdUsuario` int(11) NOT NULL,
  `Usuario` varchar(255) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellidos` varchar(255) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuariosclientes`
--

INSERT INTO `usuariosclientes` (`IdUsuario`, `Usuario`, `Nombre`, `Apellidos`, `Correo`, `Contrasena`) VALUES
(1, 'root', 'javier', 'garcia', 'javgarcu@gmail.com', '96e79218965eb72c92a549dd5a330112');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `datosusuario`
--
ALTER TABLE `datosusuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `Usuario` (`Usuario`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`IdEmpleados`);

--
-- Indexes for table `usuariosadmin`
--
ALTER TABLE `usuariosadmin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `usuariosclientes`
--
ALTER TABLE `usuariosclientes`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `Correo` (`Correo`),
  ADD KEY `Usuario` (`Usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultas`
--
ALTER TABLE `consultas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datosusuario`
--
ALTER TABLE `datosusuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `IdEmpleados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuariosadmin`
--
ALTER TABLE `usuariosadmin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuariosclientes`
--
ALTER TABLE `usuariosclientes`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datosusuario`
--
ALTER TABLE `datosusuario`
  ADD CONSTRAINT `datosusuario_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuariosclientes` (`Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
