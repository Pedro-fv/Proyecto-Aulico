<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id_amigo"])) {
        $id_amigo = $_POST["id_amigo"];
       
        if (isset($_POST["mensaje"]) && !empty($_POST["mensaje"])) {
            $mensaje = $_POST["mensaje"];
            
            include("InicioBD.php");
            session_start(); 
            $id_usuario = $_SESSION['id_usuario'];
            $sql = "INSERT INTO mensajes (id_emisor, id_receptor, contenido) VALUES (?, ?, ?)";
            $stmt = $conexion->prepare($sql);
            
            $stmt->bind_param("iis",$id_usuario , $id_amigo, $mensaje);
            if ($stmt->execute()) {
                echo "Mensaje enviado correctamente a tu amigo con ID $id_amigo";
            } else {
                echo "Error al enviar el mensaje: " . $stmt->error;
            }
            
            $stmt->close();
            $conexion->close();
        } else {
            echo "El mensaje está vacío";
        }
    } else {
        echo "No se recibió el ID del amigo";
    }
} else {
    echo "Error: no se recibieron datos del formulario";
}
?>
