<?php

class PublicacionController {

private $gestor;

public function __construct($gestor) {
    $this->gestor = $gestor;
}

public function index() {
    $libros = $this->gestor->listarLibros();
    $totalLibros = count ($libros);
    $librosPorPagina = 3;
    $totalPaginasLibros = ceil($totalLibros / $librosPorPagina);
    $paginaActualLibros = $_GET['pActualLibros'] ?? 1;
    $librosAcortados = array_slice($libros, ($paginaActualLibros - 1) * $librosPorPagina, $librosPorPagina);

      $revistas = $this->gestor->listarRevistas();
    $totalRevistas = count ($revistas);
    $revistasPorPagina = 3;
    $totalPaginasRevistas = ceil($totalRevistas / $revistasPorPagina);
    $paginaActualRevistas = $_GET['pActualRevistas'] ?? 1;
    $revistasAcortadas = array_slice($revistas, ($paginaActualRevistas - 1) * $revistasPorPagina, $revistasPorPagina);
    include "views/listar.php";
    
}

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $isbn = $_POST['isbn'];
        if($_POST['editorial'] != null){
            $editorial=$_POST['editorial'];
            $paginas=$_POST['paginas'];
            $publicacion=new Libro($isbn, $editorial, $paginas);
        } else {
            $color=$_POST['color'];
            $tematica=$_POST['tematica'];
            $publicacion=new Revista($isbn, $color, $tematica);
        
        }
        $this->gestor->anyadir($publicacion);



        header("Location: index.php");
        exit();
        }

    include "views/crear.php";

    }

    public function editarLibro() {
        $this->gestor->actualizarLibro($_POST['isbn'], $_POST['editorial'], $_POST['paginas']);
        header("Location: index.php");
        exit();
    }

    public function editarRevista() {
        $this->gestor->actualizarRevista($_POST['isbn'], $_POST['color'], $_POST['tematica']);
        header("Location: index.php");
        exit();
    }

    public function eliminar() {

        $this->gestor->eliminar($_GET['isbn']);
        header("Location: index.php");
        exit();
    }
}
