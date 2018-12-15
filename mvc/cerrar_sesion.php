<?php
require_once("db/db.php");

require_once("controllers/controlador_cerrar_sesion.php");

session_start();
session_destroy();

header("Location:index.php");

 ?>
