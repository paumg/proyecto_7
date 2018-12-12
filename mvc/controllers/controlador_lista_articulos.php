<?php
require_once("models/modelo_usuario.php");
$per=new usuario();
$tipous= $per->get_usuario('idusuario', 1);

require_once("models/modelo_articulo.php");
$art=new articulo();
$noticias=$art->get_all_news();





require_once("views/vista_lista_articulos.phtml");

 ?>
