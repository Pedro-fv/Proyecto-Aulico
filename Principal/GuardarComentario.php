<?php
include("InicioBD.php");

$id_libro = $_POST['id_libro'];
$id_usuario = $_POST['id_usuario']; 
$comentario = $_POST['comentario'];

$sql_insertar_comentario = "INSERT INTO comentarios (id_libro, id_usuario, comentario) VALUES ('$id_libro', '$id_usuario', '$comentario')";

if ($conexion->query($sql_insertar_comentario) === TRUE) {
    header("Location: Inicio.php?exito=1");
            exit;
} else {
    echo "Error al guardar el comentario: " . $conexion->error;
}

$conexion->close();
?>
