<?php
include("InicioBD.php");

$sql = "SELECT libros.id, libros.titulo, libros.descripcion, categorias.nombre AS categoria, imagenes_libros.ruta_imagen
        FROM libros
        INNER JOIN libro_categoria ON libros.id = libro_categoria.id_libro
        INNER JOIN categorias ON libro_categoria.id_categoria = categorias.id
        LEFT JOIN imagenes_libros ON libros.id = imagenes_libros.id_libro";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $libros_por_categoria = array();

    while ($fila = $resultado->fetch_assoc()) {
        $categoria = $fila['categoria'];
        if (!isset($libros_por_categoria[$categoria])) {
            $libros_por_categoria[$categoria] = array();
        }
        $libros_por_categoria[$categoria][] = $fila;
    }

    foreach ($libros_por_categoria as $categoria => $libros) {
        echo "<div class='categoria'>";
        echo "<h2>{$categoria}</h2>";

        foreach ($libros as $libro) {
            echo "<div class='libro'>";
            echo "<h3>{$libro['titulo']}</h3>";
            echo "<p>{$libro['descripcion']}</p>";
            echo "<img class='imagen-libro' src='{$libro['ruta_imagen']}' alt='Portada del libro'>";
            echo "</div>";
        }

        echo "</div>";
    }
} else {
    echo "No se encontraron libros.";
}
?>
