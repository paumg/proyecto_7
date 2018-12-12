<?php
require_once("db/db.php");

require_once("controllers/controlador_modificar_articulo.php");

if(isset($_POST['btn'])){
if(isset($_POST['titulo']) && (isset($_POST['subtitulo'])) && isset($_POST['seccion']) && isset($_POST['cuerpo']) && isset($_POST['keywords'])){
    $keys=explode(" ", $_POST['keywords']);

    $art=new articulo();
    $idsecc=$art->get_id_seccion($_POST['seccion']);
    foreach ($idsecc as $secc) {
      $seccion=$secc['id_seccion'];
    }

    $a=$art->modificar_articulo($_POST['titulo'], $_POST['subtitulo'], $seccion, date('Y-m-d'), $_POST['cuerpo'], $_POST['imagen'], $_GET['id']);

    $art->borrar_keywords($_GET['id']);
    for($i = 0; $i<count($keys); $i++ ){
      $art->set_keywords($_GET['id'],$keys[$i]);
      header("Location: lista_articulos.php");
    }
  }else{
    echo "Falta algún campo obligatorio por rellenar";
  }

}
 ?>
