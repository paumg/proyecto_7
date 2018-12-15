<?php
require_once("db/db.php");
require_once("controllers/controlador_registro.php");
if ((isset($_POST['nombre'])) && ($_POST['nombre'] != '') && (isset($_POST['pass'])) && ($_POST['pass'] != '') && (isset($_POST['mail']))) {

    //include "controllers/controlador_registro.php";
    $per = new usuario();

    //obtenemos el ultimo registro de la tabla tipousuarios
    $tipo=$per->get_ultimo_usuario();
    foreach ($tipo as $id_tipousuario) {
      $id_tipou=$id_tipousuario['id_tipousuario'];
    }

    $datos_us = $per->set_tipo_usuario();
    $_SESSION['id_tipou']=$id_tipou + 1;

    $user = $per->set_usuario($_SESSION['id_tipou'], $_SESSION['id_tipou'], $_POST['nombre'], $_POST['pass'], $_POST['mail']);

    $datos_user= $per->get_usuario('nombre_usuario',$_POST['nombre']);

    foreach ($datos_user as $dato) {
      $iduser= $dato['idusuario'];
    }

    session_start();
    $_SESSION['iduser']=$iduser;
    header ('Location: usuario_registrado.php');
}


?>
