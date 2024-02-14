<?php
include("InicioBD.php");
session_start();
$id_usuario_actual = $_SESSION['id_usuario'];

$sql_solicitudes_pendientes = "SELECT id, id_usuario1, id_usuario2 FROM amigos WHERE (id_usuario1 = $id_usuario_actual OR id_usuario2 = $id_usuario_actual) AND estado = 'pendiente'";

$resultado_solicitudes = $conexion->query($sql_solicitudes_pendientes);

if ($resultado_solicitudes->num_rows > 0) {
    echo "<h2>Solicitudes</h2>";
    echo "<ul>";
    while ($fila = $resultado_solicitudes->fetch_assoc()) {
        $id_solicitud = $fila['id'];
        $id_usuario_solicitante = $fila['id_usuario1'] == $id_usuario_actual ? $fila['id_usuario2'] : $fila['id_usuario1'];
        
        $sql_nombre_usuario = "SELECT nombre_usuario FROM usuarios WHERE id = $id_usuario_solicitante";
        $resultado_nombre_usuario = $conexion->query($sql_nombre_usuario);
        $fila_nombre_usuario = $resultado_nombre_usuario->fetch_assoc();
        $nombre_usuario_solicitante = $fila_nombre_usuario['nombre_usuario'];

        echo "<li class='pending-request-item'>$nombre_usuario_solicitante 
        <form method='post' action='AceptarSoli.php'>
            <input type='hidden' name='id_solicitud' value='$id_solicitud' />
            <button type='submit' class='accept-button'>Aceptar</button>
        </form>
    </li>";
        }
    echo "</ul>";
} else {
    echo "No tienes solicitudes de amistad pendientes.";
}

// Cerrar la conexión a la base de datos
?>
