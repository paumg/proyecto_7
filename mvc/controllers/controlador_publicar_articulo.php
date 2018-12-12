<?php
require_once("models/modelo_articulo.php");

$art=new articulo();

$art->publicar_articulo($_GET['id'], date('Y-m-d'));



 ?>
