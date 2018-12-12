<?php
//Llamada al modelo
require("models/modelo_usuario.php");
/*$per=new usuario();
$datos=$per->get_usuario(1);*/


require("models/modelo_articulo.php");
$art=new articulo();
$datos_art=$art->get_articulo(1);
$noticias=$art->get_all_news();


//Llamada a la vista
require("views/vista_index.phtml");
?>
