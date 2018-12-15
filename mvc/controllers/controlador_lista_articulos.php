<?php
require_once("models/modelo_usuario.php");
session_start();
$per=new usuario();
$tipous= $per->get_usuario('idusuario', $_SESSION['iduser']);
foreach ($tipous as $dato){
    $tipousuario=$dato['tipousuario'];
}

require_once("models/modelo_articulo.php");
$art=new articulo();
if($tipousuario=='admin'){
  $noticias=$art->get_all_news();
}else if($tipousuario=='editor'){
  $noticias=$art->get_articulos_no_publicados();
}else if($tipousuario=='periodista'){
  $noticias=$art->get_all_news_user($_SESSION['iduser']);
}

require_once("views/vista_lista_articulos.phtml");

 ?>
