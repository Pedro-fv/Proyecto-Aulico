<?php 
include("InicioBD.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nombre_usuario"]) && isset($_POST["contrasena"])) {
        $nombre_usuario = $_POST["nombre_usuario"];
        $contrasena = $_POST["contrasena"];
        
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
        
        $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario' AND contrasena = '$contrasena'";
    
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $_SESSION['id_usuario'] = $fila['id']; 
            header("Location: Inicio.php");
            exit;
        } else {
            header("Location: InicioSesion.php?exito=1");
            exit;
        }
        
        $conexion->close();
    } else {
        echo "Por favor, complete todos los campos";
    }
}
?>
