<?php
require_once("models/modelo_usuario.php");
$per=new usuario();
$tipous=$per->get_usuario('idusuario', 1);
$usuarios=$per->get_all_usuarios();


require_once("views/vista_lista_usuarios.phtml");
 ?>
