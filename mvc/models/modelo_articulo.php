<?php

  class articulo{

    private $db;
    private $noticia;

    public function __construct(){
        $this->db=Conectar::conexion();
        $this->noticias=array();
    }

    public function get_articulo($id){
        $consulta=$this->db->query("select * from ((articulos
        inner join keywords on articulos.idarticulo = keywords.idnoticia)
        inner join seccion on articulos.idsecc = seccion.id_seccion)
        where idarticulo=$id;");

        while($filas=$consulta->fetch_assoc()){
            $this->noticias[]=$filas;
        }
        return $this->noticias;
    }

    public function get_all_news($id_usuario){
        $consulta=$this->db->query("select * from articulos
        where autor=$id_usuario");

        while($filas=$consulta->fetch_assoc()){
            $this->noticias[]=$filas;
        }
        return $this->noticias;
    }
  }
 ?>
