<?php
require_once("db/db.php");
require_once("controllers/controlador_inicio_sesion.php");

if((isset($_POST['nombre'])) && ($_POST['nombre'] != '') && (isset($_POST['pass'])) && ($_POST['pass'] != '')){
    //session_start();
    //echo $_SESSION['id_tipou'];
    $per = new usuario();
    $datos_user= $per->get_usuario('nombre_usuario',$_POST['nombre']);

    foreach ($datos_user as $dato) {
      $nombre= $dato['nombre_usuario'];
      $pass= $dato['pass'];
      $iduser= $dato['idusuario'];
    }

    if((@ $nombre == $_POST['nombre']) && ($pass == $_POST['pass'])){
      session_start();
      $_SESSION['iduser']=$iduser;

      header ('Location: usuario_registrado.php');
    }else{
      echo 'Usuario o contraseña incorrectos';
    }
}

 ?>
