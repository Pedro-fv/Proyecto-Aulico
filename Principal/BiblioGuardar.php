<?php
// Verificar si se recibió el ID del libro a agregar a la biblioteca
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_libro'])) {
    // Obtener el ID del libro desde el formulario
    $id_libro = $_POST['id_libro'];
    
    // Aquí incluirías tu archivo de conexión a la base de datos
    include("InicioBD.php");

    // Verificar si el usuario está autenticado y obtener su ID de usuario
    session_start();
    if (isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];

        // Verificar si el libro ya está en la biblioteca del usuario
        $consulta_verificar = $conexion->prepare("SELECT id FROM biblioteca WHERE id_usuario = ? AND id_libro = ?");
        $consulta_verificar->bind_param("ii", $id_usuario, $id_libro);
        $consulta_verificar->execute();
        $resultado_verificar = $consulta_verificar->get_result();

        // Si el libro no está en la biblioteca del usuario, insertarlo
        if ($resultado_verificar->num_rows == 0) {
            $consulta_insertar = $conexion->prepare("INSERT INTO biblioteca (id_usuario, id_libro) VALUES (?, ?)");
            $consulta_insertar->bind_param("ii", $id_usuario, $id_libro);
            if ($consulta_insertar->execute()) {
                header("Location: Inicio.php?exito=1");
            exit;
            } else {
                echo "Error al agregar el libro a tu biblioteca.";
            }
        } else {
            echo "El libro ya está en tu biblioteca.";
        }
    } else {
        echo "Debes iniciar sesión para agregar libros a tu biblioteca.";
    }
} else {
    echo "Error: no se recibió el ID del libro.";
}
?>
