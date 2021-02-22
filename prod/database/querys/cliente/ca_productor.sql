-- Creador: Juan pablo Basualdo
-- Fecha: 19-07-2020
-- version: cliente
-- Menu: maestros
-- Estructura de tabla para la tabla `ca_productos`
--

CREATE TABLE `ca_productos` (
    `id` bigint(20) UNSIGNED NOT NULL,
    `estado` int(1) NOT NULL,
    `nombre` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
    `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NULL,
    `codigo` int(12) NOT NULL,
    `stock_minimo` int(9) NOT NULL,
    `stock_actual` int(9) NOT NULL,
    `precio_por_mayor` int(10) NOT NULL,
    `precio_unitario` int(10) NOT NULL,
    `subcategoria_id` bigint(20) UNSIGNED NOT NULL,
    `empresa_id` bigint(20) UNSIGNED NOT NULL,
    `user_create_id` bigint(20) UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indices de la tabla `ca_productos`
--
ALTER TABLE `ca_productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de la tabla `ca_productos`
--
ALTER TABLE `ca_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;



--
-- Filtros para la tabla `ca_productos`
--
ALTER TABLE `ca_productos`
    ADD CONSTRAINT `productos__empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`),
    ADD CONSTRAINT `productos_user_id_foreign` FOREIGN KEY (`user_create_id`) REFERENCES `users` (`id`),
    ADD CONSTRAINT `productos_subcategoria_id_foreign` FOREIGN KEY (`subcategoria_id`) REFERENCES `ca_productos_subcategoria` (`id`);