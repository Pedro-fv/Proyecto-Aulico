<?php
include("InicioBD.php");
function obtenerRutaImagen($conexion, $id_libro) {
    $sql_imagen = "SELECT ruta_imagen FROM imagenes_libros WHERE id_libro = ?";
    $stmt = $conexion->prepare($sql_imagen);
    $stmt->bind_param("i", $id_libro);
    $stmt->execute();
    $stmt->bind_result($ruta_imagen);
    $stmt->fetch();
    $stmt->close();
    return $ruta_imagen;
}
?>