
-- Creador: Juan pablo Basualdo
-- Fecha: 19-07-2020
-- version: cliente
-- Menu: administrador
-- Estructura de tabla para la tabla `ca_cliente_ contacto`
--

CREATE TABLE `ca_cliente_contacto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` int(1) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indices de la tabla `ca_cliente_ contacto`
--
ALTER TABLE `ca_cliente_ contacto`
  ADD PRIMARY KEY (`id`);

-- 
-- AUTO_INCREMENT de la tabla `ca_cliente_ contacto`
--
ALTER TABLE `ca_cliente_ contacto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
