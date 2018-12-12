<?php
require_once("models/modelo_usuario.php");

require_once("models/modelo_articulo.php");
$art=new articulo();
$articulo=$art->get_articulo($_GET['id']);
foreach($articulo as $idsecc){
    $id=$idsecc['idsecc'];
}

$seccion=$art->get_seccion($id);

$keys=$art->get_keywords($id);

require_once("views/vista_modificar_articulo.phtml");
 ?>
