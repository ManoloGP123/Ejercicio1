<?php

// Importar archivo de conexión
require_once('conexion.php');

class ClaseLibros
{
    // Función para obtener todos los libros
    public function todos()
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT * FROM `libros`;";
        $resultado = mysqli_query($con, $cadena);
        return $resultado;
    }

    // Función para obtener un libro específico por ID
    public function uno($id)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `libros` WHERE `id`=$id";
            $resultado = mysqli_query($con, $cadena);
            return $resultado;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    // Función para insertar un nuevo libro
    public function insertar($titulo, $autor, $año_publicacion, $Leido)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `libros`(`titulo`, `autor`, `año_publicacion`, `leido`) VALUES ('$titulo','$autor', '$año_publicacion','$leido')";
            $resultado = mysqli_query($con, $cadena);
            return $resultado;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    // Función para actualizar un libro existente
    public function actualizar($id, $titulo, $autor, $año_publicacion, $leido)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `libros` SET `titulo`='$titulo',`autor`='$autor',`año_publicacion`='$año_publicacion',`leido`='$leido' WHERE `id`=$id";
            $resultado = mysqli_query($con, $cadena);
            return $resultado;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    // Función para eliminar un libro
    public function eliminar($id)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoConectar();
            $cadena = "DELETE FROM `libros` WHERE `id`=$id";
            $resultado = mysqli_query($con, $cadena);
            return $resultado;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
