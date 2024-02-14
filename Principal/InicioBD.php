<?php
$host = "localhost"; 
$usuario = "root"; 
$contrasena = ""; 
$base_datos = "bd_veterinaria"; 

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
$sql = "SELECT * FROM libros";
$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    $libros = array();
    while ($fila = $resultado->fetch_assoc()) {
        $libros[] = $fila;
    }

    foreach ($libros as $indice => $libro) {
        //esto no expliques nada
      // echo "Título: " . $libro['titulo'] . "<br>";
       // echo "Descripción: " . $libro['descripcion'] . "<br>";
     
       //echo "Ruta del archivo PDF: " . $libro['ruta_archivo'] . "<br>";
      //  echo "<hr>";
    }
} else {
    echo "No se encontraron libros.";
}
?>
