<?php
include("InicioBD.php");
session_start();
$id_usuario_actual = $_SESSION['id_usuario'];
$id_solicitud = $_POST['id_solicitud'];

$sql_actualizar_solicitud = "UPDATE amigos SET estado = 'aceptada' WHERE id = $id_solicitud";
if ($conexion->query($sql_actualizar_solicitud) === TRUE) {
    header("Location: MostrarSoli.php");
    exit;
} else {
    echo "Error al aceptar la solicitud de amistad: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>