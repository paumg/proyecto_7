<?php
require_once("models/modelo_usuario.php");
session_start();
$per=new usuario();
$tipous=$per->get_usuario('idusuario', $_SESSION['iduser']);
$usuarios=$per->get_all_usuarios();


require_once("views/vista_lista_usuarios.phtml");
 ?>
