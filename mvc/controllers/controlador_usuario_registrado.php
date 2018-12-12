<?php
require("models/modelo_usuario.php");
$per=new usuario();
$tipous= $per->get_usuario('idusuario', 24);




require("models/modelo_articulo.php");
$art=new articulo();
$noticias=$art->get_all_news();

require("views/vista_usuario_registrado.phtml");
 ?>
