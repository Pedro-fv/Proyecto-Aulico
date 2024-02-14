<?php
include("InicioBD.php");
if(isset($_GET['id'])) {
    $id_libro = $_GET['id'];
    $consulta = "SELECT ruta_archivo FROM libros WHERE id = $id_libro";
    $resultado = $conexion->query($consulta);
    if($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $ruta_archivo = $fila['ruta_archivo'];

        if(file_exists($ruta_archivo)) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . basename($ruta_archivo) . '"');  
            readfile($ruta_archivo);
            exit;
        } else {
            echo "El archivo no existe o no es accesible.";
        }
    } else {
        echo "No se encontró ningún libro con el ID proporcionado.";
    }
} else {
    echo "No se proporcionó un ID de libro válido.";
}
$conexion->close();
?>





