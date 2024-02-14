<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería Virtual</title>
    <link rel="stylesheet" href="../css/mystyle.css">
</head>
<body>
  

<div class="icon-bar">
  <a class="active" href="Inicio.php">Inicio</a>
  <a href="Pagina2.php">Subir Libro</a>
  <!-- <a href="#">Buscar</a> -->
  <a href="Pagina3.php">Categoría</a>
  <a href="MiBiblio.php">Mi Biblioteca</a>
  <a href="CerrarSesion.php">Salir</a>
</div>

  <br>
  <div class="contenedor-flex">
  <div class="slideshow-container">
  <?php
  session_start();
  if (!isset($_SESSION['id_usuario'])) {
      header("Location: InicioSesion.php");
      exit;
  }

  include("InicioBD.php");
  include("ObtenerImg.php");
  $autores_por_libro = include("Autores.php");

  if ($libros) {
    foreach ($libros as $libro) {
        $id_libro_actual= $libro['id'];
     
        echo "<div>";
        echo "<h2>" . $libro['titulo'] . "</h2>";

        if (isset($autores_por_libro[$libro['id']])) {
          echo "<p>Autor: " . implode(", ", $autores_por_libro[$libro['id']]) . "</p>";
      } else {
          echo "<p>Sin información de autor.</p>";
      }

        $ruta_imagen = obtenerRutaImagen($conexion, $id_libro_actual);
        if ($ruta_imagen) {
            echo "<img class='imagen-libro' src='" . $ruta_imagen . "' alt='Portada del libro'>";
        } else {
            echo "<p>No se encontró imagen para este libro.</p>";
        }
     
        echo "<p>" . $libro['descripcion'] . "</p>";

        echo "<form action='DescargarPDF.php' method='get'>";
        echo "<input type='hidden' name='id' value='" . $libro['id'] . "'>";
        echo "<button type='submit' id='descargar-libro'>Descargar Libro</button>";
        echo "</form>";

        echo "<button class='comentar' type='button' onclick='toggleComentarioForm($id_libro_actual)'>Comentar</button>";
        "<button class='comentar' type='button' onclick='toggleComentarioForm($id_libro_actual)'>Comentar</button>";
        echo "<div id='formulario-comentario-$id_libro_actual' style='display: none;'>";
        echo "<form action='GuardarComentario.php' method='post'>";
        echo "<input type='hidden' name='id_libro' value='$id_libro_actual'>";
        echo "<input type='hidden' name='id_usuario' value='" . $_SESSION['id_usuario'] . "'>"; 
        echo "<textarea name='comentario' placeholder='Escribe tu comentario aquí' required></textarea>";
        echo "<button type='submit' id='enviar-comentario'>Comentar</button>";
        echo "</form>";
        echo "</div>";

          echo "<button class='mostrar-comentarios' onclick='abrirVentana(\"VerComentarios.php?id_libro=$id_libro_actual\")'>Mostrar Comentarios</button>";
        
          echo "<form action='BiblioGuardar.php' method='post'>";
          echo "<input type='hidden' name='id_libro' value='" . $id_libro_actual . "'>";
          echo "<button type='submit'>Agregar a mi biblioteca</button>";
          echo "</form>";
      echo "</div>";
    }
  } else {
    echo "No se encontraron libros.";
  }
  ?>
</div>
<div class="contenedor-amigos">

<button onclick="abrirVentanaEmergente('EnviarSoli.php')">Solicitudes de Amistad</button>

    <h2>Amigos</h2>
    <?php include 'MostrarAmigos.php'; ?>
   
 
</div>
</div>

<script>
function abrirVentanaEmergente(url) {
  var windowWidth = 400; // Ancho de la ventana emergente
    var windowHeight = 400; // Altura de la ventana emergente
    var screenHeight = window.screen.availHeight; // Altura disponible de la pantalla
    var halfScreenHeight = screenHeight / 2; // Mitad de la altura de la pantalla
    var topPosition = halfScreenHeight - (windowHeight / 2); // Posición superior para centrar la ventana
    var leftPosition = 10; 
    window.open(url, "EnviarSolicitudAmistad", "width=" + windowWidth + ",height=" + windowHeight + ",left=" + leftPosition + ",top=" + topPosition);
};


document.addEventListener("DOMContentLoaded", function() {
    var enviarMensajeButtons = document.querySelectorAll(".enviar-mensaje");
    enviarMensajeButtons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            event.preventDefault();
            var idAmigo = this.getAttribute("data-id-amigo");
            var windowWidth = 400; // Ancho de la ventana emergente
    var windowHeight = 460;
            var screenHeight = window.screen.availHeight; // Altura disponible de la pantalla
    var halfScreenHeight = screenHeight / 2; // Mitad de la altura de la pantalla
    var topPosition = halfScreenHeight - (windowHeight / 2); // Posición superior para centrar la ventana
    var leftPosition = 10;             
              window.open("VentanaMensaje.php?id_amigo=" + idAmigo, "Enviar Mensaje", "width=" + windowWidth + ",height=" + windowHeight + ",left=" + leftPosition + ",top=" + topPosition);
        });
    });
});








</script>
<script>
    function abrirVentana(url) {
        var ventanaAnchura = 300;
        var ventanaAltura = 400;
        var left = (screen.width - ventanaAnchura) / 2;
        var top = (screen.height - ventanaAltura) / 2;
        var opciones = "width=" + ventanaAnchura + ",height=" + ventanaAltura + ",top=" + top + ",left=" + left + ",location=no,toolbar=no,menubar=no,scrollbars=no,resizable=no,status=no";
        var nuevaVentana = window.open(url, "Comentarios", opciones);
        nuevaVentana.moveTo(left, top);
    }
</script>
<!-- <script src="../js/VerComentario.js"></script> -->
<script src="../js/ComentarVer.js"></script>
</body>
</html>

