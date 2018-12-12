<?php
require_once("db/db.php");
require_once("controllers/controlador_crear_articulo.php");

if(isset($_POST['titulo']) && (isset($_POST['subtitulo'])) && isset($_POST['seccion']) && isset($_POST['cuerpo']) && isset($_POST['keywords'])){
    $keys=explode(",", $_POST['keywords']);

    //sesion aqui------------------------------------------------
    $per=new usuario();
    $datouser= $per->get_usuario('idusuario', 26);
    foreach ($datouser as $dato) {
      $autor=$dato['idusuario'];
    }

    $art=new articulo();
    $secc=$art->get_id_seccion($_POST['seccion']);
    foreach ($secc as $id) {
      $id_seccion=$id['id_seccion'];
    }
    $a=$art->set_articulo($autor, 1, $_POST['titulo'], $_POST['subtitulo'], $id_seccion, date('Y-m-d'), $_POST['cuerpo'], $_POST['imagen']);

    $ultimo=$art->get_ultimo_articulo();
    foreach ($ultimo as $dato) {
      $idarticulo=$dato['idarticulo'];
    }

    for($i = 0; $i<count($keys); $i++ ){
      $art->set_keywords($idarticulo,$keys[$i]);
    }
}
?>
