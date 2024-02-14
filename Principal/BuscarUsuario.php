<?php
  include("InicioBD.php");
 session_start();
$nombre_usuario_destinatario = $_POST['nombre_usuario'];
$id_usuario = $_SESSION['id_usuario'];
// Consultar el ID del usuario por su nombre de usuario
$sql = "SELECT id FROM usuarios WHERE nombre_usuario = '$nombre_usuario_destinatario'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // El usuario con el nombre de usuario proporcionado fue encontrado
    $fila = $resultado->fetch_assoc();
    $id_usuario_destinatario = $fila['id'];

    // Insertar una nueva fila en la tabla amigos con el estado pendiente
    $id_usuario_enviador =$id_usuario ; // Reemplaza esto con tu ID de usuario
    $estado_pendiente = 'pendiente';

    $sql_insertar_solicitud = "INSERT INTO amigos (id_usuario1, id_usuario2, estado) 
                              VALUES ($id_usuario_enviador, $id_usuario_destinatario, '$estado_pendiente')";

    if ($conexion->query($sql_insertar_solicitud) === TRUE) {
        // La solicitud de amistad se envió correctamente
        echo "Solicitud de amistad enviada correctamente.";
    } else {
        // Hubo un error al enviar la solicitud de amistad
        echo "Error al enviar la solicitud de amistad: " . $conexion->error;
    }
} else {
    // No se encontró ningún usuario con el nombre de usuario proporcionado
    echo "No se encontró ningún usuario con el nombre de usuario proporcionado.";
    echo"$nombre_usuario_destinatario";
    echo"$id_usuario";
}

?>