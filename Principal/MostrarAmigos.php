<?php

if (!isset($_SESSION['id_usuario'])) {
    header("Location: InicioSesion.php");
    exit;
}

$id_usuario = $_SESSION['id_usuario'];

$sql_obtener_amigos = "SELECT u.id, u.nombre_usuario 
                       FROM usuarios u
                       JOIN amigos a ON (u.id = CASE WHEN a.id_usuario1 = $id_usuario THEN a.id_usuario2 ELSE a.id_usuario1 END)
                       WHERE (a.id_usuario1 = $id_usuario OR a.id_usuario2 = $id_usuario)
                       AND a.estado = 'aceptada'";

include("InicioBD.php");

$resultado = $conexion->query($sql_obtener_amigos);

if ($resultado->num_rows > 0) {
    echo "<ul>";
    while($fila = $resultado->fetch_assoc()) {
        echo "<li>" . $fila['nombre_usuario'] . " </li>";
      echo"  <button class='enviar-mensaje' data-id-amigo='" . $fila['id'] . "'>Enviar mensaje</button>";
    }
    echo "</ul>";
} else {
    echo "No tienes amigos aún.";
}

$conexion->close();
?>
