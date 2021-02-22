-- Creador: Juan pablo Basualdo
-- Fecha: 19-07-2020
-- version: cliente
-- Menu: maestros
-- Estructura de tabla para la tabla `ca_productos_categoria`
--

CREATE TABLE `ca_productos_categoria` (
    `id` bigint(20) UNSIGNED NOT NULL,
    `estado` int(1) NOT NULL,
    `nombre` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
    `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `empresa_id` bigint(20) UNSIGNED NOT NULL,
    `user_create_id` bigint(20) UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indices de la tabla `ca_productos_categoria`
--
ALTER TABLE `ca_productos_categoria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de la tabla `ca_productos_categoria`
--
ALTER TABLE `ca_productos_categoria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;



--
-- Filtros para la tabla `ca_productos_categoria`
--
ALTER TABLE `ca_productos_categoria`
  ADD CONSTRAINT `productos_categoria_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `productos_categoria_user_id_foreign` FOREIGN KEY (`user_create_id`) REFERENCES `users` (`id`);  