-- Creador: Juan pablo Basualdo
-- Fecha: 19-07-2020
-- version: cliente
-- Menu: maestros
-- Estructura de tabla para la tabla `ca_ventas_cotizaciones`
--

CREATE TABLE `ca_ventas_cotizaciones` (
    `id` bigint(20) UNSIGNED NOT NULL,
    `estado` int(1) UNSIGNED NOT NULL,
    `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `valor_despacho` int(12) UNSIGNED NOT NULL,
    `estado_id` bigint(20) UNSIGNED NOT NULL,
    `cliente_id` bigint(20) UNSIGNED NOT NULL,
    `empresa_id` bigint(20) UNSIGNED NOT NULL,
    `user_create_id` bigint(20) UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indices de la tabla `ca_ventas_cotizaciones`
--
ALTER TABLE `ca_ventas_cotizaciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de la tabla `ca_ventas_cotizaciones`
--
ALTER TABLE `ca_ventas_cotizaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;



--
-- Filtros para la tabla `ca_ventas_cotizaciones`
--
ALTER TABLE `ca_ventas_cotizaciones`
    ADD CONSTRAINT `ca_ventas_cotizaciones_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`),
    ADD CONSTRAINT `ca_ventas_cotizaciones_user_id_foreign` FOREIGN KEY (`user_create_id`) REFERENCES `users` (`id`),
    ADD CONSTRAINT `ca_ventas_cotizaciones_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `ca_clientes` (`id`),
    ADD CONSTRAINT `ca_ventas_cotizaciones_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `ca_ventas_cotizaciones_estados` (`id`);