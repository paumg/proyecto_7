<?php
require("models/modelo_usuario.php");

require("models/modelo_articulo.php");
$art=new articulo();
$datos_art=$art->get_articulo(1);
$noticias=$art->get_all_news(1);

require("views/vista_usuario_registrado.phtml");
 ?>
