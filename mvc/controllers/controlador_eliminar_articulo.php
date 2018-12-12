<?php
require_once("models/modelo_articulo.php");

$art=new articulo();

$art->borrar_articulo($_GET['id']);
$art->borrar_keywords($_GET['id']);


 ?>
