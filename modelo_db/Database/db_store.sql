-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2023 a las 02:45:02
-- Versión del servidor: 10.4.28-MariaDB
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

--
-- Volcado de datos para la tabla `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_password`, `admin_email`) VALUES
(1, '1', '1', '');

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
-- Estructura de tabla para la tabla `tbl_notes`
--

CREATE TABLE `tbl_notes` (
  `note_id` int(11) NOT NULL,
  `note_tittle` varchar(256) NOT NULL,
  `note_text` varchar(400) NOT NULL,
  `note_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_notes`
--

INSERT INTO `tbl_notes` (`note_id`, `note_tittle`, `note_text`, `note_created_at`) VALUES
(3, 'Recordatorio 2', 'Este es un segundo recordatorio, para ver como funcionan los estilos al alargar un poco mas el texto ingresado en el imput de \"crear nota\"', '2023-10-19 00:07:17'),
(5, 'MYSQL', 'Recordatorio creado con mysql y php\r\n', '2023-10-19 00:41:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_products`
--

CREATE TABLE `tbl_products` (
  `prod_id` int(11) NOT NULL,
  `prod_img` varchar(300) DEFAULT NULL,
  `prod_name` varchar(80) NOT NULL,
  `prod_desc` varchar(300) DEFAULT 'No se ha proporcionado información',
  `prod_price` int(11) DEFAULT NULL,
  `prod_stock` int(11) DEFAULT 1,
  `prod_estado` varchar(50) DEFAULT 'Activo',
  `prod_categoria` varchar(100) DEFAULT NULL,
  `prod_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_products`
--

INSERT INTO `tbl_products` (`prod_id`, `prod_img`, `prod_name`, `prod_desc`, `prod_price`, `prod_stock`, `prod_estado`, `prod_categoria`, `prod_created_at`) VALUES
(1, 'hola.png', 'zapato', 'hola', 150000, 4, 'Activo', NULL, '2023-10-07 17:36:17'),
(2, '../../vista_front/img/Products/DreamShaper_v7_Logo_DesignThe_corporate_logo_for_DeliveryJob_i_3.jpg', 'Zapato Re-gud 2', 'descripcion de zapato re gud', 230000, 245, 'Activo', NULL, '2023-10-18 23:51:04');

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
  `user_address` varchar(80) DEFAULT 'No se ha agregado una dirección',
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_username`, `user_password`, `user_ident`, `user_realname`, `user_email`, `user_phonenumber`, `user_address`, `user_created_at`) VALUES
(1, 'ByDiegreeN', '123456789', 0, 'Diego', 'diegoalejandrogarcia140902@gmail.com', '+57 3214867673', 'No se ha proporcionado una dirección', '2023-10-07 17:35:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users_cart`
--

CREATE TABLE `tbl_users_cart` (
  `prod_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_venta`
--

CREATE TABLE `tbl_venta` (
  `venta_id` int(11) NOT NULL,
  `venta_cantidad` int(11) DEFAULT NULL,
  `venta_precio` int(11) DEFAULT NULL,
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
-- Indices de la tabla `tbl_notes`
--
ALTER TABLE `tbl_notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indices de la tabla `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `CheckUniqueEmail` (`user_email`);

--
-- Indices de la tabla `tbl_users_cart`
--
ALTER TABLE `tbl_users_cart`
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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_notes`
--
ALTER TABLE `tbl_notes`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_venta`
--
ALTER TABLE `tbl_venta`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_users_cart`
--
ALTER TABLE `tbl_users_cart`
  ADD CONSTRAINT `tbl_users_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`),
  ADD CONSTRAINT `tbl_users_cart_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `tbl_products` (`prod_id`);

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
