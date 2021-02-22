-- Creador: Juan pablo Basualdo
-- Fecha: 19-07-2020
-- version: cliente
-- Menu: administrador
-- Estructura de tabla para la tabla `ca_clientes`
--

CREATE TABLE `ca_clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` int(1) NOT NULL,
  `Nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa_id` bigint(20) UNSIGNED NOT NULL,
  `tipo_cliente_id` bigint(20) UNSIGNED NOT NULL,
  `user_create_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

 
--
-- Indices de la tabla `ca_clientes`
--
ALTER TABLE `ca_clientes`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT de la tabla `ca_clientes`
--
ALTER TABLE `ca_clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


--
-- Filtros para la tabla `ca_clientes`
--
ALTER TABLE `ca_clientes`
  ADD CONSTRAINT `cliente_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `cliente_user_id_foreign` FOREIGN KEY (`user_create_id`) REFERENCES `users` (`id`),  
  ADD CONSTRAINT `cliente_tipo_cliente_id_foreign` FOREIGN KEY (`tipo_cliente_id`) REFERENCES `cm_tipo_clientes` (`id`);  



