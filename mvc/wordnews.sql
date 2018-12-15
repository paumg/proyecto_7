-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2018 a las 13:43:42
-- Versión del servidor: 5.7.22-log
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wordnews`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `idarticulo` int(11) NOT NULL COMMENT 'Valor autonumérico que identifica unívocamente a cada noticia.',
  `autor` int(11) NOT NULL COMMENT 'Clave foránea al campo id_usuario de la tabla usuarios. Identifica al usuario registrado autor de la noticia.',
  `editor` int(11) NOT NULL COMMENT 'Clave foránea al campo id_usuario de la tabla usuarios. Identifica al usuario registrado editor de la noticia.',
  `titulo` varchar(120) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Título de la noticia.',
  `subtitulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Subtítulo de la noticia.',
  `idsecc` int(11) NOT NULL COMMENT 'Clave foránea al campo id_seccion de la tabla seccion. Identifica el nombre de la sección en el que irá integrada la noticia.',
  `fecha_creacion` date NOT NULL COMMENT 'Fecha en la que se creó la noticia.',
  `fecha_modificacion` date DEFAULT NULL COMMENT 'Fecha en la que se realizó la última modificación.',
  `fecha_publicacion` date DEFAULT NULL COMMENT 'Fecha en la que se realizó la publicación.',
  `cuerpo` longtext COLLATE utf8_spanish_ci NOT NULL COMMENT 'Texto de la noticia.',
  `imagen` varchar(235) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Imagen que acompaña al texto del artículo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Aquí se recogen las noticias redactadas, publicadas o no, para su posterior edición, revisión, publicación o eliminación.';

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`idarticulo`, `autor`, `editor`, `titulo`, `subtitulo`, `idsecc`, `fecha_creacion`, `fecha_modificacion`, `fecha_publicacion`, `cuerpo`, `imagen`) VALUES
(7, 28, 1, 'La noticia de Manolo modificada por Manolo', 'Esta noticia ha sido creada y modificada por Manolo', 2, '2018-12-15', '2018-12-15', '2018-12-15', 'La noticia de Manolo no tiene nada importante a destacar porqué Manolo solo es un usuario de prueba que ni siquiera existe en la vida real, solo soy yo probando las sesiones de usuario y escribiendo un texto lo suficientemente largo como para comprobar que tal funciona el frontend. Sin Manolo esta web no podría funcionar correctamente. El texto que se vaya a mostrar a continuación formará parte del la prueba de modificación de artículos. Los articulos de usuario se mostraban correctamente, si se puede ver este texto es que la modificación de Manolo funciona muy bien. ', 'images14.jpg'),
(8, 28, 1, 'La segunda noticia de Manolo versión editor', 'La segunda noticia de Manolo ha llegado por fin a nuestras pantallas en calidad de editor', 4, '2018-12-15', '2018-12-15', '2018-12-15', 'Esta noticia sirve para comprobar que las keywords se almacenan correctamente, ya que debido a un error de sintaxis se guardaban todas en una misma fila, ahora deberían guardarse individualmente. \r\n\r\nLas keywords se han guardado correctamente y ordenadas, todo gracias al sacrificio de Manolo.\r\n\r\nTras el duro trabajo de Manolo haciendo pruebas en la web, el administrador ha decidido promocionarle a editor, por lo que si estás leyendo esto es que la modificación del editor se guarda correctamente. Tras esta modificación, Manolo tratará de publicar esta noticia, y si todo va bien, el adminstrador felicitará a Manolo a través de esta noticia. <b>El todopoderoso administrador felicita a Manolo por ayudar al desarrollo de esta web</b>\r\n\r\nPD: Las fechas de modificación también se guardan bien, gracias a Manolo.\r\n\r\n', 'melendi.jpg'),
(9, 27, 1, 'Última prueba para Manolo', 'A ver de que es capaz Manolo', 5, '2018-12-15', '2018-12-15', '2018-12-15', 'Esta última prueba para Manolo servirá para comprobar si los editores también pueden modificar y publicar noticias que no hayan sido creadas previamente por ellos cuando eran periodistas.<br><br> Por el momento Manolo ha podido ver la noticia y en estos momentos está trabajando duro para modificar la noticia de otro usuario.<br><br><b>El administrador todopoderoso certifica que la noticia ha sido publicada correctamente. El trabajo de Manolo acaba aquí, pero su dedicación estará siempre presente entre nosotros.</b>', 'images14.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `keywords`
--

CREATE TABLE `keywords` (
  `idnoticia` int(11) NOT NULL COMMENT 'Clave principal y foránea al campo id_articulo de la tabla articulos.',
  `keyword` varchar(45) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Palabra clave asociaciada a la noticia.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Guarda las palabras clave de cada noticia.';

--
-- Volcado de datos para la tabla `keywords`
--

INSERT INTO `keywords` (`idnoticia`, `keyword`) VALUES
(7, 'manolo'),
(7, 'prueba'),
(7, 'test'),
(8, 'a'),
(8, 'keywords'),
(8, 'las'),
(8, 'probar'),
(8, 'vamos'),
(9, 'prueba'),
(9, 'ultima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL COMMENT 'Identifica cada sección.',
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la sección.',
  `descripcion` varchar(150) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripción de la sección.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Guarda las distintas categorías o secciones en las que es posible dividir las noticias.';

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id_seccion`, `nombre`, `descripcion`) VALUES
(1, 'deportes', 'noticias sobre deportes'),
(2, 'politica', 'noticias sobre política'),
(3, 'cultura', 'noticias sobre cultura'),
(4, 'internacional', 'noticias internacionales'),
(5, 'economia', 'noticias sobre economia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuarios`
--

CREATE TABLE `tipousuarios` (
  `id_tipousuario` int(11) NOT NULL COMMENT 'Clave primaria autonumérica para identificar cada tipo de usuario.',
  `tipousuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Tipo de usuario del usuario registrado.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='En esta tabla se guardan los distintos tipos de usuarios posibles que conducen a distintos tipos de sesión.';

--
-- Volcado de datos para la tabla `tipousuarios`
--

INSERT INTO `tipousuarios` (`id_tipousuario`, `tipousuario`) VALUES
(1, 'admin'),
(24, 'periodista'),
(26, 'editor'),
(27, 'periodista'),
(28, 'editor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL COMMENT 'Valor autonumérico que identifica a cada usuario.',
  `idtipou` int(11) NOT NULL COMMENT 'Clave foránea al campo id_tipousuario de la tabla tipousuarios.',
  `nombre_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre del usuario registrado.',
  `pass` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Contraseña de acceso a la cuenta del usuario registrado.',
  `mail` varchar(70) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Dirección de correo electrónico del usuario registrado. Sirve para referenciar la cuenta del usuario registrado cuando accede a la aplicación web.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla que recoge la información acerca de los usuarios registrados en la aplicación web WordNews.';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `idtipou`, `nombre_usuario`, `pass`, `mail`) VALUES
(1, 1, 'admin', 'admin', 'p@mail.com'),
(24, 24, 'periodista', 'periodista', 'd@mail.com'),
(26, 26, 'editor', 'editor', 'm@mail.com'),
(27, 27, 'usuario', '1234', 'user@mail.com'),
(28, 28, 'Manolo', 'manolo1', 'manolo@mail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`idarticulo`),
  ADD KEY `F_autor_idx` (`autor`),
  ADD KEY `F_editor_idx` (`editor`),
  ADD KEY `F_seccion_idx` (`idsecc`);

--
-- Indices de la tabla `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`idnoticia`,`keyword`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id_seccion`);

--
-- Indices de la tabla `tipousuarios`
--
ALTER TABLE `tipousuarios`
  ADD PRIMARY KEY (`id_tipousuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `mail_UNIQUE` (`mail`),
  ADD KEY `F_tipousuarios_idx` (`idtipou`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `idarticulo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Valor autonumérico que identifica unívocamente a cada noticia.', AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tipousuarios`
--
ALTER TABLE `tipousuarios`
  MODIFY `id_tipousuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria autonumérica para identificar cada tipo de usuario.', AUTO_INCREMENT=29;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `F_autor` FOREIGN KEY (`autor`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `F_editor` FOREIGN KEY (`editor`) REFERENCES `usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `F_seccion` FOREIGN KEY (`idsecc`) REFERENCES `seccion` (`id_seccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `F_tipousuarios` FOREIGN KEY (`idtipou`) REFERENCES `tipousuarios` (`id_tipousuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
