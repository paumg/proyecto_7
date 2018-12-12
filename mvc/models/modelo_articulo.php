<?php

  class articulo{

    private $db;
    private $noticia;

    public function __construct(){
        $this->db=Conectar::conexion();
        $this->noticias=array();
    }

    public function get_articulo($id){
        $consulta=$this->db->query("select * from articulos where idarticulo=$id;");

        while($filas=$consulta->fetch_assoc()){
            $this->noticias[]=$filas;
        }
        return $this->noticias;
    }

    public function get_seccion($id){
        $consulta=$this->db->query("select * from seccion where id_seccion=$id;");

        while($filas=$consulta->fetch_assoc()){
            $this->noticias[]=$filas;
        }
        return $this->noticias;
    }

    public function get_keywords($id){
        $consulta=$this->db->query("select * from keywords where idnoticia=$id;");

        while($filas=$consulta->fetch_assoc()){
            $this->noticias[]=$filas;
        }
        return $this->noticias;
    }

    public function get_all_news(){
        $consulta=$this->db->query("select * from articulos");

        while($filas=$consulta->fetch_assoc()){
            $this->noticias[]=$filas;
        }
        return $this->noticias;
    }

    public function get_all_news_user($id_usuario){
        $consulta=$this->db->query("select * from articulos
        where autor=$id_usuario");

        while($filas=$consulta->fetch_assoc()){
            $this->noticias[]=$filas;
        }
        return $this->noticias;
    }

    public function set_keywords($idnoticia, $keyword){
        $consulta=$this->db->query("insert into keywords(idnoticia, keyword)
        values ('" . $idnoticia . "', '" . $keyword . "')");
        if($consulta){
          return true;
        }else{
          return false;
        }
    }

    public function set_articulo($autor, $editor, $titulo, $subtitulo, $idsecc, $fecha_creacion, $cuerpo, $imagen){
        $consulta=$this->db->query("insert into articulos(autor, editor, titulo, subtitulo, idsecc, fecha_creacion, cuerpo, imagen)
        values('" . $autor . "', '" . $editor . "', '" . $titulo . "', '" . $subtitulo . "', '" . $idsecc . "', '" . $fecha_creacion . "', '" . $cuerpo . "', '" . $imagen . "')");
        if($consulta){
          return true;
        }else{
          return false;
        }
    }

    public function get_id_seccion($nombre){
        $consulta=$this->db->query("select id_seccion from seccion where nombre='$nombre'");
        while($filas=$consulta->fetch_assoc()){
            $this->noticias[]=$filas;
        }
        return $this->noticias;
    }

    public function get_ultimo_articulo(){
      $consulta=$this->db->query("select idarticulo from articulos where idarticulo=(select max(idarticulo) from articulos)");
      while($filas=$consulta->fetch_assoc()){
          $this->personas[]=$filas;
      }
      return $this->personas;
    }

    public function modificar_articulo($titulo, $subtitulo, $seccion, $fecha, $cuerpo, $imagen, $id){
      $consulta=$this->db->query("update articulos set titulo='$titulo', subtitulo='$subtitulo', idsecc='$seccion', fecha_modificacion=$fecha, cuerpo='$cuerpo', imagen='$imagen' where idarticulo='$id'");
      if($consulta){
        return true;
      }else{
        return false;
      }
    }

    public function borrar_keywords($id){
      $consulta=$this->db->query("delete from keywords where idnoticia='$id'");
      if($consulta){
        return true;
      }else{
        return false;
      }
    }
  }
 ?>
