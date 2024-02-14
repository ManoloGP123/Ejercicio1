<?php
error_reporting(0);
require_once('../Models/libros.model.php');

$libros = new ClaseLibros;

switch ($_GET['op']) {
    case 'todos':
        $datos = array();
        $datos = $libros->todos();
        while ($fila = mysqli_fetch_assoc($datos)) {
            $todos[] = $fila;
        }
        echo json_encode($todos);
        break;
    case 'uno':
        $id = $_POST['id'];
        $datos = array();
        $datos = $libros->uno($id);
        $uno = mysqli_fetch_assoc($datos);
        echo json_encode($uno);
        break;
    case 'insertar':
        $titulo = $_POST["titulo"];
        $autor = $_POST["autor"];
        $año_publicacion = $_POST["año_publicacion"];
        $leido = $_POST["leido"] === 'true' ? 1 : 0; // Asumiendo que el valor enviado es 'true' o 'false' como string

        $datos = array();
        $datos = $libros->insertar($titulo, $autor, $año_publicacion, $leido);
        echo json_encode($datos);
        break;

    case 'actualizar':
        $id = $_POST['id'];
        $titulo = $_POST["titulo"];
        $autor = $_POST["autor"];
        $año_publicacion = $_POST["año_publicacion"];
        $leido = $_POST["leido"] === 'true' ? 1 : 0;

        $datos = array();
        $datos = $libros->actualizar($id, $titulo, $autor, $año_publicacion, $leido);
        echo json_encode($datos);
        break;
    case 'eliminar':
        $id = $_POST['id'];
        $datos = array();
        $datos = $libros->eliminar($id);
        if($datos) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
        break;
}
/**
 * GET    => URL externo
 * POST   => envío de datos por interno
 */
