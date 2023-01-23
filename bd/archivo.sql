-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2019 a las 18:22:15
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
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_cambio_estado` date NOT NULL,
  `documento_id` int(10) UNSIGNED NOT NULL,
  `carpeta_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `nombre`, `descripcion`, `codigo`, `url_file`, `file_name`, `fecha_cambio_estado`, `documento_id`, `carpeta_id`, `user_id`, `created_at`, `updated_at`) VALUES
(23, 'Hoja de vida', 'gestion', '1569354516489', 'files/1569354530_carta ciesju.docx', 'carta ciesju.docx', '2019-09-24', 5, 57, 3, '2019-09-25 00:48:50', '2019-09-25 00:48:50'),
(24, 'Documentos importantes', 'desc', '1569356121418', 'files/1569356134_dejure.sql', 'dejure.sql', '2027-09-29', 5, 60, 3, '2019-09-25 01:15:35', '2019-09-25 01:15:35'),
(25, 'Ventas', 'ventas', '1569357602551', 'files/1569357635_hoja de vida.docx', 'hoja de vida.docx', '2019-09-24', 4, 58, 3, '2019-09-25 01:40:35', '2019-09-25 01:40:35'),
(26, 'Ventas', 'das', '1569362913781', 'files/1569362925_Formato-proyecto-TG-7-CC.docx', 'Formato-proyecto-TG-7-CC.docx', '2019-09-24', 5, 60, 1, '2019-09-25 03:08:45', '2019-09-25 03:08:45'),
(27, 'Ventas', 'cs', '1569362975631', 'files/1569362984_carta ciesju.docx', 'carta ciesju.docx', '2019-09-24', 6, 60, 1, '2019-09-25 03:09:44', '2019-09-25 03:09:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpetas`
--

CREATE TABLE `carpetas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `estado_id` int(10) UNSIGNED NOT NULL,
  `dependencia_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carpetas`
--

INSERT INTO `carpetas` (`id`, `nombre`, `user_id`, `estado_id`, `dependencia_id`, `created_at`, `updated_at`) VALUES
(47, 'Mis archivos', 1, 3, 1, '2019-09-24 23:48:18', '2019-09-24 23:48:18'),
(48, 'Mis archivos', 1, 2, 1, '2019-09-24 23:50:46', '2019-09-24 23:50:46'),
(49, 'Documentos importantes', 1, 3, 1, '2019-09-25 00:00:51', '2019-09-25 00:00:51'),
(50, 'Mis archivos', 3, 1, 1, '2019-09-25 00:15:26', '2019-09-25 00:15:26'),
(51, 'Unavi', 1, 3, 1, '2019-09-25 00:17:40', '2019-09-25 00:17:40'),
(52, 'Contratación', 3, 2, 1, '2019-09-25 00:24:05', '2019-09-25 00:24:05'),
(53, 'Contrataciónes', 3, 2, 1, '2019-09-25 00:24:14', '2019-09-25 00:24:14'),
(54, 'Mis archivos', 1, 3, 3, '2019-09-25 00:27:57', '2019-09-25 00:27:57'),
(55, 'Contrataciónes', 1, 3, 3, '2019-09-25 00:28:32', '2019-09-25 00:28:32'),
(56, 'Mis archivos', 1, 2, 3, '2019-09-25 00:32:02', '2019-09-25 00:32:02'),
(57, 'Mis archivos', 1, 1, 3, '2019-09-25 00:33:21', '2019-09-25 00:33:21'),
(58, 'Mis archivos', 3, 3, 2, '2019-09-25 01:03:38', '2019-09-25 01:03:38'),
(59, 'Mis archivos', 3, 2, 2, '2019-09-25 01:04:00', '2019-09-25 01:04:00'),
(60, 'Mis archivos', 3, 1, 2, '2019-09-25 01:04:02', '2019-09-25 01:04:02'),
(61, 'Ventas', 3, 3, 2, '2019-09-25 01:39:57', '2019-09-25 01:39:57'),
(62, 'Contratación', 3, 1, 2, '2019-09-25 02:57:52', '2019-09-25 02:57:52'),
(63, 'Hoja de vida', 1, 1, 2, '2019-09-25 03:02:05', '2019-09-25 03:02:05'),
(64, 'Documentos importantes', 1, 1, 1, '2019-09-25 09:54:12', '2019-09-25 09:54:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE `dependencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dependencias`
--

INSERT INTO `dependencias` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Contratación', 'des', '2019-09-24 07:06:19', '2019-09-24 07:06:19'),
(2, 'Ventas', 'ventas', '2019-09-24 07:06:29', '2019-09-24 07:06:29'),
(3, 'Recepción', 'Recepción', '2019-09-25 00:27:32', '2019-09-25 00:27:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_27_033228_create_dependencias_table', 1),
(4, '2019_08_27_060727_entrust_setup_tables', 1),
(5, '2019_08_28_021451_create_categorias_table', 1),
(6, '2019_08_28_021908_create_referencias_table', 1),
(7, '2019_08_28_025626_create_carpetas_table', 1),
(8, '2019_08_28_025711_create_subcarpetas_table', 1),
(9, '2019_09_28_025739_create_archivos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(21, 1),
(21, 2),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencias`
--

CREATE TABLE `referencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `ref_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tabla` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siguiente_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duracion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no_aplica',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `referencias`
--

INSERT INTO `referencias` (`id`, `ref_nombre`, `categoria`, `tabla`, `descripcion`, `siguiente_estado`, `duracion`, `created_at`, `updated_at`) VALUES
(1, 'Histórico', 'tipo_estado', 'archivos', 'creado por sistema', 'no_aplica', 'no_aplica', '2019-09-17 10:00:00', '2019-09-17 10:00:00'),
(2, 'Central', 'tipo_estado', 'archivos', 'creado por sistema', '1', '3', '2019-09-17 10:00:00', '2019-09-17 10:00:00'),
(3, 'Gestión', 'tipo_estado', 'archivos', 'creado por sistema', '2', '5', '2019-09-17 10:00:00', '2019-09-17 10:00:00'),
(4, 'Rut', 'tipo_documento', 'archivos', 'Rut', NULL, 'no_aplica', '2019-09-18 14:53:13', '2019-09-18 14:53:13'),
(5, 'Cámara de comercio', 'tipo_documento', 'archivos', 'Cámara', NULL, 'no_aplica', '2019-09-18 14:53:34', '2019-09-18 14:53:34'),
(6, 'Vehículos transportadores', 'tipo_documento', 'archivos', 'Vehículos', NULL, 'no_aplica', '2019-09-18 14:54:06', '2019-09-18 14:54:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrador', 'Administrador', '2019-09-24 09:54:13', '2019-09-24 09:54:13'),
(2, 'vendedor', 'Vendedor', 'Vendedor de mercancia', '2019-09-24 20:55:52', '2019-09-24 20:55:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcarpetas`
--

CREATE TABLE `subcarpetas` (
  `id` int(10) UNSIGNED NOT NULL,
  `padre_id` int(10) UNSIGNED NOT NULL,
  `hija_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subcarpetas`
--

INSERT INTO `subcarpetas` (`id`, `padre_id`, `hija_id`, `created_at`, `updated_at`) VALUES
(7, 47, 49, NULL, NULL),
(8, 49, 51, NULL, NULL),
(9, 48, 52, NULL, NULL),
(10, 52, 53, NULL, NULL),
(11, 54, 55, NULL, NULL),
(12, 58, 61, NULL, NULL),
(13, 60, 62, NULL, NULL),
(14, 60, 63, NULL, NULL),
(15, 50, 64, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `direccion`, `telefono`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dario', 'Valor', 'xcxc', 'darioj99@gmail.com', NULL, '$2y$10$d3LviPM6ZG7XJWCAjtJo4e6m1CHXUJVExsYVWUgGs8wP274pcAgOa', 'Zu6ZMRUDwm7p6T3cislgGIBLdlQQD5VjGsWaVLIrIJ46uweprJODFgfdQ2Ug', '2019-09-24 06:56:27', '2019-09-24 20:45:53'),
(2, 'Favier', 'Valor por defecto', '00000', 'dariojavier99@hotmail.com', NULL, '$2y$10$XKGisK0IxzI6qn71U6AtKeuCNLfFuIYIECOJnV87GEqOtbkbcaU4y', NULL, '2019-09-24 07:30:41', '2019-09-24 07:30:41'),
(3, 'Dario favier', 'Valor por defecto', '00000', 'estudiante1@gmail.com', NULL, '$2y$10$v97r9rtGRlS4c0iNo2Ti3erjmMCjgkyPKOOQrSVfefum87RvVtmcO', 'jkbkQINFx1IBd3KyiIQYE3JspQKwyjldwiTOzwe2uDHd4GXdDnOVEl0wMHY6', '2019-09-24 21:04:36', '2019-09-25 03:47:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_has_dependencias`
--

CREATE TABLE `user_has_dependencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `dependencia_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_has_dependencias`
--

INSERT INTO `user_has_dependencias` (`id`, `user_id`, `dependencia_id`, `created_at`, `updated_at`) VALUES
(19, 1, 1, NULL, NULL),
(20, 3, 2, NULL, NULL),
(21, 2, 2, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archivos_documento_id_foreign` (`documento_id`),
  ADD KEY `archivos_carpeta_id_foreign` (`carpeta_id`),
  ADD KEY `archivos_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `carpetas`
--
ALTER TABLE `carpetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carpetas_user_id_foreign` (`user_id`),
  ADD KEY `carpetas_estado_id_foreign` (`estado_id`),
  ADD KEY `carpetas_dependencia_id_foreign` (`dependencia_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorias_email_unique` (`email`);

--
-- Indices de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `referencias`
--
ALTER TABLE `referencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `subcarpetas`
--
ALTER TABLE `subcarpetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcarpetas_padre_id_foreign` (`padre_id`),
  ADD KEY `subcarpetas_hija_id_foreign` (`hija_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `user_has_dependencias`
--
ALTER TABLE `user_has_dependencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_has_dependencias_user_id_foreign` (`user_id`),
  ADD KEY `user_has_dependencias_dependencia_id_foreign` (`dependencia_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `carpetas`
--
ALTER TABLE `carpetas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `referencias`
--
ALTER TABLE `referencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `subcarpetas`
--
ALTER TABLE `subcarpetas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user_has_dependencias`
--
ALTER TABLE `user_has_dependencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_carpeta_id_foreign` FOREIGN KEY (`carpeta_id`) REFERENCES `carpetas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `archivos_documento_id_foreign` FOREIGN KEY (`documento_id`) REFERENCES `referencias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `archivos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `carpetas`
--
ALTER TABLE `carpetas`
  ADD CONSTRAINT `carpetas_dependencia_id_foreign` FOREIGN KEY (`dependencia_id`) REFERENCES `dependencias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carpetas_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `referencias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carpetas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subcarpetas`
--
ALTER TABLE `subcarpetas`
  ADD CONSTRAINT `subcarpetas_hija_id_foreign` FOREIGN KEY (`hija_id`) REFERENCES `carpetas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subcarpetas_padre_id_foreign` FOREIGN KEY (`padre_id`) REFERENCES `carpetas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_has_dependencias`
--
ALTER TABLE `user_has_dependencias`
  ADD CONSTRAINT `user_has_dependencias_dependencia_id_foreign` FOREIGN KEY (`dependencia_id`) REFERENCES `dependencias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_has_dependencias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
