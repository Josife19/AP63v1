<?php
class GestorPublicacion {
    

    public function __construct() {
        $this->biblioteca = [];
        if (!isset($_SESSION['publicaciones'])){
            $_SESSION['publicaciones'] = [];
        }
    }

    public function anyadir ($publicacion) {
        $_SESSION['publicaciones'][] = $publicacion;
    }
   
    

      public function listarLibros() {
        $libros = [];
        for ($i=0;$i<count($_SESSION['publicaciones']);$i++){
            if(get_class($_SESSION['publicaciones'][$i]) == "Libro"){
                $libros[] = $_SESSION['publicaciones'][$i];
            }
      }
      return $libros;
    }

    public function listarRevistas() {
        $revistas = [];
        for ($i=0;$i<count($_SESSION['publicaciones']);$i++){
            if(get_class($_SESSION['publicaciones'][$i]) == "Revista"){
                $revistas[] = $_SESSION['publicaciones'][$i];
            }
      }
      return $revistas;
    }

    public function buscar($isbn){
        foreach($_SESSION['publicaciones'] as $publicacion){
            if($publicacion->getIsbn() == $isbn){
                return $publicacion;
            }
        }
        
    }

    public function actualizarLibro ($isbn, $editorial, $paginas){
        foreach($_SESSION['publicaciones'] as $i => $publicacion){
            if($publicacion->getIsbn() == $isbn){
                $_SESSION['publicaciones'][$i]-> setEditorial($editorial);
                $_SESSION['publicaciones'][$i]-> setPaginas($paginas);
            }
        }
    }
      public function actualizarRevista ($isbn, $color, $tematica){
        foreach($_SESSION['publicaciones'] as $i => $publicacion){
            if($publicacion->getIsbn() == $isbn){
                $_SESSION['publicaciones'][$i]-> setColor($color);
                $_SESSION['publicaciones'][$i]-> setTematica($tematica);
            }
        }
    }
    public function eliminar($isbn){
        foreach($_SESSION['publicaciones'] as $i => $publicacion){
            if($publicacion->getIsbn() == $isbn){
                unset($_SESSION['publicaciones'][$i]);
            }
        }
        // Reindexar el array para evitar huecos en los índices
        $_SESSION['publicaciones'] = array_values($_SESSION['publicaciones']);
    }



}


?>