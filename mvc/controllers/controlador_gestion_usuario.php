<?php
require_once("models/modelo_usuario.php");
$per=new usuario();

if($_GET['tipo']=='periodista'){
  echo "usuario promocionado" . $_GET['id'];
  $gestion_us=$per->promocionar_usuario($_GET['id']);

}else if($_GET['tipo']=='editor'){
  echo "usuario degradado" . $_GET['id'];
  $gestion_us=$per->degradar_usuario($_GET['id']);

}

  header("Location: lista_usuarios.php");
require_once("views/vista_gestion_usuarios.phtml");
 ?>
