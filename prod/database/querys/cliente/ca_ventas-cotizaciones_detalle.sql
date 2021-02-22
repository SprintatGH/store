-- Creador: Juan pablo Basualdo
-- Fecha: 19-07-2020
-- version: cliente
-- Menu: maestros
-- Estructura de tabla para la tabla `ca_ventas_cotizaciones_detalle`
--

CREATE TABLE `ca_ventas_cotizaciones_detalle` (
    `id` bigint(20) UNSIGNED NOT NULL,
    `estado` int(1) UNSIGNED NOT NULL,
    `producto_id` bigint(20) UNSIGNED NOT NULL,
    `precio` int(20) UNSIGNED NOT NULL,
    `cantidad` int(20) UNSIGNED NOT NULL,
    `cotizacion_id` bigint(20) UNSIGNED NOT NULL,
    `empresa_id` bigint(20) UNSIGNED NOT NULL,
    `user_create_id` bigint(20) UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indices de la tabla `ca_ventas_cotizaciones_detalle`
--
ALTER TABLE `ca_ventas_cotizaciones_detalle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de la tabla `ca_ventas_cotizaciones_detalle`
--
ALTER TABLE `ca_ventas_cotizaciones_detalle`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;



--
-- Filtros para la tabla `ca_ventas_cotizaciones_detalle`
--
ALTER TABLE `ca_ventas_cotizaciones_detalle`
    ADD CONSTRAINT `ca_ventas_cotizaciones_detalle_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`),
    ADD CONSTRAINT `ca_ventas_cotizaciones_detalle_user_id_foreign` FOREIGN KEY (`user_create_id`) REFERENCES `users` (`id`),
    ADD CONSTRAINT `ca_ventas_cotizaciones_detalle_cotizacion_id_foreign` FOREIGN KEY (`cotizacion_id`) REFERENCES `ca_ventas_cotizaciones` (`id`),
    ADD CONSTRAINT `ca_ventas_cotizaciones_detalle_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `ca_productos` (`id`);