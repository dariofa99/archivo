-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2019 a las 01:29:54
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `archivo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'elimina_carpetas', 'Eliminar carpetas', 'carpetas', '2019-09-24 09:53:48', '2019-09-25 02:30:48'),
(2, 'ver_administracion', 'Ver Administración', 'administrar', '2019-09-24 21:07:07', '2019-09-25 02:31:02'),
(3, 'ver_archivo', 'Ver Archivo', 'archivo', '2019-09-25 01:52:58', '2019-09-25 02:23:42'),
(4, 'ver_historico', 'Ver Arch. Histórico', 'archivo', '2019-09-25 01:55:20', '2019-09-25 02:23:22'),
(5, 'ver_central', 'Ver Arch. Central', 'archivo', '2019-09-25 02:13:01', '2019-09-25 02:23:10'),
(6, 'ver_gestion', 'Ver Arch. Gestión', 'archivo', '2019-09-25 02:15:24', '2019-09-25 02:22:59'),
(7, 'ver_usuarios', 'Ver usuarios', 'usuarios', '2019-09-25 02:22:40', '2019-09-25 02:22:40'),
(8, 'ver_roles_permisos', 'Ver roles y permisos', 'roles_permisos', '2019-09-25 02:30:25', '2019-09-25 02:30:25'),
(9, 'ver_tipos_documentales', 'Ver tipos de documentos', 'tipos_documento', '2019-09-25 02:31:44', '2019-09-25 08:49:53'),
(10, 'ver_dependencias', 'Ver dependencias', 'dependencias', '2019-09-25 02:32:23', '2019-09-25 02:32:23'),
(11, 'crear_archivos', 'Crear archivos', 'archivos', '2019-09-25 02:40:06', '2019-09-25 02:41:01'),
(12, 'crear_carpetas', 'Crear carpetas', 'carpetas', '2019-09-25 02:40:53', '2019-09-25 02:40:53'),
(13, 'edit_carpetas', 'Editar carpetas', 'carpetas', '2019-09-25 02:59:54', '2019-09-25 02:59:54'),
(14, 'edit_archivos', 'Editar archivos', 'archivos', '2019-09-25 03:04:05', '2019-09-25 03:04:05'),
(15, 'delete_archivos', 'Eliminar archivos', 'archivos', '2019-09-25 03:04:35', '2019-09-25 03:07:56'),
(16, 'edit_usuarios', 'Editar usuarios', 'usuarios', '2019-09-25 03:22:02', '2019-09-25 03:28:43'),
(17, 'delete_usuarios', 'Eliminar usuarios', 'usuarios', '2019-09-25 03:22:27', '2019-09-25 03:28:38'),
(18, 'crear_usuarios', 'Crear usuarios', 'usuarios', '2019-09-25 03:23:10', '2019-09-25 03:23:10'),
(19, 'asig_dependencia', 'Asignar dependencia a usuario', 'dependencias', '2019-09-25 03:24:00', '2019-09-25 08:46:29'),
(20, 'asig_rol', 'Asignar rol a usuario', 'usuarios', '2019-09-25 03:25:11', '2019-09-25 08:48:58'),
(21, 'crear_permisos', 'Crear permisos', 'permisos', '2019-09-25 08:18:50', '2019-09-25 08:18:50'),
(22, 'crear_roles', 'Crear roles', 'roles', '2019-09-25 08:19:10', '2019-09-25 08:19:10'),
(23, 'edit_roles', 'Editar roles', 'roles', '2019-09-25 08:19:30', '2019-09-25 08:19:30'),
(24, 'delete_roles', 'Eliminar roles', 'roles', '2019-09-25 08:20:38', '2019-09-25 08:20:38'),
(25, 'asig_rol_permisos', 'Asignar rol - permisos', 'roles', '2019-09-25 08:21:31', '2019-09-25 08:21:31'),
(26, 'crear_tipos_documentales', 'Crear tipos de documento', 'tipos_documento', '2019-09-25 08:35:27', '2019-09-25 08:35:27'),
(27, 'delete_tipos_documentales', 'Eliminar tipos de documento', 'tipos_documento', '2019-09-25 08:36:11', '2019-09-25 08:36:11'),
(28, 'edit_tipos_documentales', 'Editar tipos de documento', 'tipos_documento', '2019-09-25 08:36:43', '2019-09-25 08:36:43'),
(29, 'crear_dependencias', 'Crear dependencias', 'dependencias', '2019-09-25 08:42:07', '2019-09-25 08:42:07'),
(30, 'edit_dependencias', 'Editar dependencias', 'dependencias', '2019-09-25 08:42:28', '2019-09-25 08:43:26'),
(33, 'delete_dependencias', 'Eliminar dependencias', 'dependencias', '2019-09-25 08:44:07', '2019-09-25 08:44:07'),
(34, 'ver_roles', 'Ver roles', 'roles', '2019-09-25 10:32:39', '2019-09-25 10:32:39');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
