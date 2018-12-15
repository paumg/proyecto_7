<?php
require("models/modelo_usuario.php");
$per=new usuario();
session_start();
$tipous= $per->get_usuario('idusuario', $_SESSION['iduser']);




require("models/modelo_articulo.php");
$art=new articulo();
$noticias=$art->get_articulos_publicados();

require("views/vista_usuario_registrado.phtml");
 ?>
