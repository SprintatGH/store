-- Creador: Juan pablo Basualdo
-- Fecha: 19-07-2020
-- version: cliente
-- Menu: maestros
-- Estructura de tabla para la tabla `ca_productos_stock`
--

CREATE TABLE `ca_productos_stock` (
    `id` bigint(20) UNSIGNED NOT NULL,
    `estado` int(1) NOT NULL,
    `cantidad` int(9) NOT NULL,
    `producto_id` bigint(20) UNSIGNED NOT NULL,
    `empresa_id` bigint(20) UNSIGNED NOT NULL,
    `user_create_id` bigint(20) UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indices de la tabla `ca_productos_stock`
--
ALTER TABLE `ca_productos_stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de la tabla `ca_productos_stock`
--
ALTER TABLE `ca_productos_stock`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;



--
-- Filtros para la tabla `ca_productos_stock`
--
ALTER TABLE `ca_productos_stock`
    ADD CONSTRAINT `productos_stock_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`),
    ADD CONSTRAINT `productos_stock_user_id_foreign` FOREIGN KEY (`user_create_id`) REFERENCES `users` (`id`),
    ADD CONSTRAINT `productos_stock_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `ca_productos` (`id`);