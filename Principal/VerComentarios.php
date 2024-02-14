<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios del Libro</title>
    <style>
        .ventana-emergente {
        position: fixed;
        top: 35%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        h2 {
            color: #333;
        }
        p {
            color: #666;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
            padding: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="ventana-emergente">
        <?php
        include("InicioBD.php");

        if (isset($_GET['id_libro'])) {
            $id_libro = $_GET['id_libro'];

            $sql = "SELECT comentario, nombre_usuario FROM comentarios c
                    INNER JOIN usuarios u ON c.id_usuario = u.id
                    WHERE c.id_libro = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("i", $id_libro);
            $stmt->execute();
            $resultados = $stmt->get_result();

            echo "<h2>Comentarios del Libro</h2><ul>";
            while ($row = $resultados->fetch_assoc()) {
                $comentario = $row['comentario'];
                $nombre_usuario = $row['nombre_usuario'];
                echo "<li><strong>$nombre_usuario:</strong> $comentario</li>";
            }
            echo "</ul>";

            $stmt->close();
            $conexion->close();
        } else {
            echo "<p>Error: No se proporcionó el ID del libro.</p>";
        }
        ?>
    </div>
    
</body>
</html>
