<?php
class usuario{
    private $db;
    private $personas;

    public function __construct(){
        $this->db=Conectar::conexion();
        $this->personas=array();
    }

    public function get_usuario($columna, $valor){
        $consulta=$this->db->query("select * from usuarios inner join tipousuarios on usuarios.idtipou = tipousuarios.id_tipousuario where $columna='$valor';");
        while($filas=$consulta->fetch_assoc()){
            $this->personas[]=$filas;
        }
        return $this->personas;
    }

    public function set_tipo_usuario(){
        $consulta=$this->db->query("insert into tipousuarios(tipousuario) VALUES('periodista')");
        if($consulta){
          return true;
        }else{
          return false;
          /*$consulta="insert into tipousuarios(tipousuario) VALUES('periodista')";
          mysqli_query($this->db=Conectar::conexion(),$consulta);*/
      }
    }

    public function set_usuario($idusuario, $idtipou, $nombre, $pass, $mail){
      $consulta=$this->db->query("insert into usuarios(idusuario, idtipou, nombre_usuario, pass, mail)
      values('" . $idusuario . "', '" . $idtipou . "','" . $nombre . "','" . $pass . "', '" . $mail . "')");
      if($consulta){
        return true;
      }else{
        return false;
    }
  }

    public function get_ultimo_usuario(){
      $consulta=$this->db->query("select id_tipousuario from tipousuarios where id_tipousuario=(select max(id_tipousuario) from tipousuarios)");
      while($filas=$consulta->fetch_assoc()){
          $this->personas[]=$filas;
      }
      return $this->personas;
    }
}
?>
