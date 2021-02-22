-- Creador: Juan pablo Basualdo
-- Fecha: 20-07-2020
-- version: cliente
-- Menu: maestros
-- Estructura de tabla para la tabla `ca_ventas_cotizaciones_estados`
--

CREATE TABLE `ca_ventas_cotizaciones_estados` (
    `id` bigint(20) UNSIGNED NOT NULL,
    `nombre` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
    `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `estado` int(1) UNSIGNED NOT NULL,
    `user_create_id` bigint(20) UNSIGNED NOT NULL,
    `empresa_id` bigint(20) UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indices de la tabla `ca_ventas_cotizaciones_estados`
--
ALTER TABLE `ca_ventas_cotizaciones_estados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de la tabla `ca_ventas_cotizaciones_estados`
--
ALTER TABLE `ca_ventas_cotizaciones_estados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;



--
-- Filtros para la tabla `ca_ventas_cotizaciones_estados`
--
ALTER TABLE `ca_ventas_cotizaciones_estados`
    ADD CONSTRAINT `ca_venta_cotizaciones_estado_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`),
    ADD CONSTRAINT `ca_venta_cotizaciones_estado_user_id_foreign` FOREIGN KEY (`user_create_id`) REFERENCES `users` (`id`);