<?php
include("InicioBD.php");

// Realizar la consulta para obtener los autores de los libros
$sql = "SELECT libros.id, libros.titulo, autores.nombre AS autor
        FROM libros
        LEFT JOIN libro_autor ON libros.id = libro_autor.id_libro
        LEFT JOIN autores ON libro_autor.id_autor = autores.id";

$resultado = $conexion->query($sql);

// Crear un array asociativo para almacenar los autores por libro
$autores_por_libro = array();
if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $id_libro = $fila['id'];
        // Verificar si ya existe una entrada para este libro en el array
        if (!array_key_exists($id_libro, $autores_por_libro)) {
            $autores_por_libro[$id_libro] = array();
        }
        // Agregar el autor a la lista de autores del libro
        $autores_por_libro[$id_libro][] = $fila['autor'];
    }
}

// Cerrar la conexión a la base de datos si es necesario
// $conexion->close();

// Devolver el array de autores por libro
return $autores_por_libro;
?>
