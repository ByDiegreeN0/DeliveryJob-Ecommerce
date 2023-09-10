-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-08-2023 a las 16:53:05
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_store`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_message` (IN `id` INT)   begin
	delete from  tbl_message where message_id = id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_products` (IN `id` INT)   begin

delete from tbl_products where prod_id = id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_users` (IN `id` INT)   begin
	delete from  tbl_users where user_id = id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_message` (IN `msg_name` VARCHAR(100), IN `msg_asunto` VARCHAR(100), IN `msg_email` VARCHAR(150), IN `msg_text` VARCHAR(300))   begin
	insert into tbl_message(message_name, message_asunto, message_email, message_m) values (msg_name, msg_asunto, msg_email, msg_text);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_products` (IN `prod_img` VARCHAR(300), IN `prod_name` VARCHAR(80), IN `prod_desc` VARCHAR(300), IN `prod_price` INT, IN `prod_stock` INT)   begin
	insert into tbl_products (prod_img, prod_name, prod_desc, prod_price, prod_stock) values (prod_img, prod_name, prod_desc, prod_price, prod_stock);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_users` (IN `username` VARCHAR(80), `pass` VARCHAR(100), `ident` INT, `realname` VARCHAR(200), `email` VARCHAR(200), `phone` VARCHAR(15), `address` VARCHAR(80))   begin
	insert into tbl_users(user_username, user_password, user_ident, user_realname, user_email, user_phonenumber, user_address) values (username, pass, ident, realname, email, phone, address);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_products` (IN `id` INT, IN `prod_img` VARCHAR(300), IN `prod_name` VARCHAR(80), IN `prod_desc` VARCHAR(300), IN `prod_price` INT, IN `prod_stock` INT)   begin
	update tbl_products set 
    prod_img = prod_img,
    prod_name = prod_name,
	prod_desc = prod_desc,
	prod_price = prod_price,
	prod_stock = prod_stock
                            
	where prod_id = id;
                            
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_users` (IN `id` INT, IN `username` VARCHAR(80), IN `pass` VARCHAR(100), IN `ident` INT, IN `realname` VARCHAR(200), IN `email` VARCHAR(200), IN `phonenumber` VARCHAR(15), `address` VARCHAR(80))   begin
	update tbl_users set 
    user_username = username,
    user_password = pass,
    user_ident = ident,
    user_realname = realname,
    user_email = email,
    user_phonenumber = phonenumber,
    user_address = address
    
    where user_id = id;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(80) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_message`
--

CREATE TABLE `tbl_message` (
  `message_id` int(11) NOT NULL,
  `message_name` varchar(100) NOT NULL,
  `message_asunto` varchar(100) NOT NULL,
  `message_email` varchar(150) NOT NULL,
  `message_m` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_products`
--

CREATE TABLE `tbl_products` (
  `prod_id` int(11) NOT NULL,
  `prod_img` varchar(300) DEFAULT NULL,
  `prod_name` varchar(80) NOT NULL,
  `prod_desc` varchar(300) DEFAULT NULL,
  `prod_price` int(11) DEFAULT NULL,
  `prod_stock` int(11) DEFAULT NULL,
  `prod_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(80) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_ident` int(11) DEFAULT NULL,
  `user_realname` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_phonenumber` varchar(15) NOT NULL,
  `user_address` varchar(80) DEFAULT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users_products`
--

CREATE TABLE `tbl_users_products` (
  `prod_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_venta`
--

CREATE TABLE `tbl_venta` (
  `venta_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `venta_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indices de la tabla `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `tbl_users_products`
--
ALTER TABLE `tbl_users_products`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indices de la tabla `tbl_venta`
--
ALTER TABLE `tbl_venta`
  ADD PRIMARY KEY (`venta_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_venta`
--
ALTER TABLE `tbl_venta`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_users_products`
--
ALTER TABLE `tbl_users_products`
  ADD CONSTRAINT `tbl_users_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_users_products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_users_products_ibfk_3` FOREIGN KEY (`prod_id`) REFERENCES `tbl_products` (`prod_id`);

--
-- Filtros para la tabla `tbl_venta`
--
ALTER TABLE `tbl_venta`
  ADD CONSTRAINT `tbl_venta_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `tbl_products` (`prod_id`),
  ADD CONSTRAINT `tbl_venta_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
