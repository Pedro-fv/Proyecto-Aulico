<?php
include("InicioBD.php");
session_start();
$id_usuario = $_SESSION['id_usuario'];

$sql_biblioteca = "SELECT id_libro FROM biblioteca WHERE id_usuario = ?";
$consulta_biblioteca = $conexion->prepare($sql_biblioteca);
$consulta_biblioteca->bind_param("i", $id_usuario);
$consulta_biblioteca->execute();
$resultado_biblioteca = $consulta_biblioteca->get_result();

$ids_libros_biblioteca = [];
while ($fila_biblioteca = $resultado_biblioteca->fetch_assoc()) {
    $ids_libros_biblioteca[] = $fila_biblioteca['id_libro'];
}

$sql_libros_biblioteca = "SELECT * FROM libros WHERE id IN (" . implode(',', $ids_libros_biblioteca) . ")";
$resultado_libros_biblioteca = $conexion->query($sql_libros_biblioteca);

if ($resultado_libros_biblioteca->num_rows > 0) {
    foreach ($resultado_libros_biblioteca as $libro_biblioteca) {
        $id_libro_actual = $libro_biblioteca['id'];
        echo "<div >";
        echo "<h2>" . $libro_biblioteca['titulo'] . "</h2>";
        $sql_imagen = "SELECT ruta_imagen FROM imagenes_libros WHERE id_libro = $id_libro_actual";
        $resultado_imagen = $conexion->query($sql_imagen);
        $imagen = $resultado_imagen->fetch_assoc();
       if ($imagen && isset($imagen['ruta_imagen'])) {
            echo "<img class='imagen-libro' src='" . $imagen['ruta_imagen'] . "' alt='Portada del libro'>";
        } else {
            echo "<p>No se encontró imagen para este libro.</p>";
        }     
        echo "<p>" . $libro_biblioteca['descripcion'] . "</p>";
        echo "<form action='DescargarPDF.php' method='get'>";
        echo "<input type='hidden' name='id' value='" . $libro_biblioteca['id'] . "'>";
        echo "<button type='submit' id='descargar-libro'>Descargar Libro</button>";
        echo "</form>";
        echo "<button class='comentar' type='button' onclick='toggleComentarioForm($id_libro_actual)'>Comentar</button>";
        "<button class='comentar' type='button' onclick='toggleComentarioForm($id_libro_actual)'>Comentar</button>";
        echo "<div id='formulario-comentario-$id_libro_actual' style='display: none;'>";
        echo "<form action='GuardarComentario.php' method='post'>";
        echo "<input type='hidden' name='id_libro' value='$id_libro_actual'>";
        echo "<input type='hidden' name='id_usuario' value='" . $_SESSION['id_usuario'] . "'>"; 
        echo "<textarea name='comentario' placeholder='Escribe tu comentario aquí' required></textarea>";
        echo "<button type='submit' id='enviar-comentario'>Comentar</button>";
        echo "</form>";
        echo "</div>";
        echo "<button class='mostrar-comentarios' onclick='abrirVentana(\"VerComentarios.php?id_libro=$id_libro_actual\")'>Mostrar Comentarios</button>";
        echo "</div>";
    }
} else {
    echo "No se encontraron libros en tu biblioteca.";
}
$conexion->close();
?>
