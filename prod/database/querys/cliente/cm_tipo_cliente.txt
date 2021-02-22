-- Creador: Juan pablo Basualdo
-- Fecha: 19-07-2020
-- version: cliente
-- Menu: maestros
-- Estructura de tabla para la tabla `tipo_clientes`
--

CREATE TABLE `cm_tipo_clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` int(1) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indices de la tabla `cm_tipo_clientes`
--
ALTER TABLE `cm_tipo_clientes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de la tabla `cm_tipo_clientes`
--
ALTER TABLE `cm_tipo_clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- insertar registro base tabla:cm_tipo_clientes
--
INSERT INTO `cm_tipo_clientes` (`id`, `estado`, `descripcion`, `created_at`, `updated_at`) VALUES
(1,1, 'Persona Natural', '2020-07-19 11:57:50', '2020-07-19 11:57:50'),
(2,1, 'Empresa', '2020-07-19 11:58:50', '2020-07-19 11:58:50')