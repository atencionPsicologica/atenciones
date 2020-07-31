-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 31-07-2020 a las 21:41:30
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acompaniante`
--

CREATE TABLE `acompaniante` (
  `id` int(255) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `pregunta` varchar(255) DEFAULT NULL,
  `respuesta` varchar(255) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acompaniante`
--

INSERT INTO `acompaniante` (`id`, `alias`, `nombres`, `apellidos`, `email`, `clave`, `pregunta`, `respuesta`, `create_at`, `deleted_at`) VALUES
(4, 'Alejandro', 'Alejandro T', 'Torrez', 'alejandro7.ts7@gmail.com', '$2y$10$/Xy9aixYd/Ol7MSuI5hUNegIL42Pg2BZ/xSepsxFNSwwkS56r1AyC', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antfamiliares`
--

CREATE TABLE `antfamiliares` (
  `id` int(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `paciente` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `antfamiliares`
--

INSERT INTO `antfamiliares` (`id`, `descripcion`, `paciente`, `created_at`, `deleted_at`) VALUES
(21, 'hola', 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antpersonales`
--

CREATE TABLE `antpersonales` (
  `id` int(255) NOT NULL,
  `vsexualactiva` varchar(255) DEFAULT NULL,
  `embarazos` int(5) DEFAULT NULL,
  `abortos` int(1) DEFAULT NULL,
  `abusoPsico` int(5) DEFAULT NULL,
  `abusoFis` int(5) DEFAULT NULL,
  `abadono` int(5) DEFAULT NULL,
  `vicios` int(5) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `paciente` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `antpersonales`
--

INSERT INTO `antpersonales` (`id`, `vsexualactiva`, `embarazos`, `abortos`, `abusoPsico`, `abusoFis`, `abadono`, `vicios`, `descripcion`, `paciente`, `created_at`, `deleted_at`) VALUES
(8, 'SI', 0, 0, 0, NULL, 0, 0, 'Negativo', 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(255) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `enfactual` varchar(255) DEFAULT NULL,
  `diagnostico` varchar(255) DEFAULT NULL,
  `prescripcion` varchar(255) DEFAULT NULL,
  `paciente` int(255) DEFAULT NULL,
  `acompaniante_id` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `fecha`, `fin`, `enfactual`, `diagnostico`, `prescripcion`, `paciente`, `acompaniante_id`, `created_at`, `deleted_at`) VALUES
(33, '2020-07-31 03:38:22', '2020-07-31 04:38:22', 'Violación', 'Hace 3 meses', 'Caso crítico', 12, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(255) NOT NULL,
  `fregistro` date NOT NULL,
  `numero` varchar(255) NOT NULL,
  `paciente` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `fregistro`, `numero`, `paciente`, `created_at`, `deleted_at`) VALUES
(19, '2020-07-31', '1233', 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(255) NOT NULL,
  `cedula` varchar(255) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `ocupacion` varchar(255) DEFAULT NULL,
  `estcivil` varchar(255) DEFAULT NULL,
  `genero` varchar(1) DEFAULT NULL,
  `fnacimiento` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tposangre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `cedula`, `nombres`, `apellidos`, `ocupacion`, `estcivil`, `genero`, `fnacimiento`, `email`, `tposangre`, `direccion`, `created_at`, `deleted_at`) VALUES
(12, '1234134', 'Edwin', 'Vargas', 'Ingeniero', 'Soltero', 'M', '2019-02-11', 'edwin@gmail.com', 'A+', 'Guanuca', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendaciones`
--

CREATE TABLE `recomendaciones` (
  `id` int(255) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `tareas` varchar(255) DEFAULT NULL,
  `indicaciones` varchar(255) DEFAULT NULL,
  `consultas_id` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sigvitales`
--

CREATE TABLE `sigvitales` (
  `id` int(255) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `prearterial` decimal(5,2) DEFAULT NULL,
  `pulso` decimal(5,2) DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `talla` decimal(5,2) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `paciente` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

CREATE TABLE `telefonos` (
  `id` int(255) NOT NULL,
  `numero` int(255) DEFAULT NULL,
  `paciente` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acompaniante`
--
ALTER TABLE `acompaniante`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_uniquies_fields` (`email`,`alias`);

--
-- Indices de la tabla `antfamiliares`
--
ALTER TABLE `antfamiliares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_antfamiliares_pacientes` (`paciente`);

--
-- Indices de la tabla `antpersonales`
--
ALTER TABLE `antpersonales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_antpersonales_pacientes` (`paciente`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_consultas_pacientes` (`paciente`),
  ADD KEY `fk_consultas_acompaniante1_idx` (`acompaniante_id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente` (`paciente`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recomendaciones_consultas1_idx` (`consultas_id`);

--
-- Indices de la tabla `sigvitales`
--
ALTER TABLE `sigvitales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sigvitales_pacientes` (`paciente`);

--
-- Indices de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_telefonos_paciente` (`paciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acompaniante`
--
ALTER TABLE `acompaniante`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `antfamiliares`
--
ALTER TABLE `antfamiliares`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `antpersonales`
--
ALTER TABLE `antpersonales`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sigvitales`
--
ALTER TABLE `sigvitales`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `antfamiliares`
--
ALTER TABLE `antfamiliares`
  ADD CONSTRAINT `fk_antfamiliares_pacientes` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `antpersonales`
--
ALTER TABLE `antpersonales`
  ADD CONSTRAINT `fk_antpersonales_pacientes` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `fk_consultas_acompaniante1` FOREIGN KEY (`acompaniante_id`) REFERENCES `acompaniante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_consultas_pacientes` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `recomendaciones`
--
ALTER TABLE `recomendaciones`
  ADD CONSTRAINT `fk_recomendaciones_consultas1` FOREIGN KEY (`consultas_id`) REFERENCES `consultas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sigvitales`
--
ALTER TABLE `sigvitales`
  ADD CONSTRAINT `fk_sigvitales_pacientes` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `fk_telefonos_paciente` FOREIGN KEY (`paciente`) REFERENCES `pacientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
