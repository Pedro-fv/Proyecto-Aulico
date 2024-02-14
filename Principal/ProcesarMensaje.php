<?php
    include("InicioBD.php");

    $id_amigo = isset($_GET['id_amigo']) ? $_GET['id_amigo'] : '';
    $id_usuario = $_SESSION['id_usuario'];
    $sql = "SELECT contenido FROM mensajes WHERE id_receptor = ? AND id_emisor = ?";
    
    $stmt = $conexion->prepare($sql);
    
    $stmt->bind_param("ii", $id_usuario , $id_amigo);
    
    $stmt->execute();
    
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $contenido = $fila["contenido"];
        
            echo "<p>$contenido</p>";
           
        }
    } else {
        echo "No hay mensajes recibidos.";

    }
    
    $resultado->close();
    $stmt->close();

    $conexion->close();
?>
