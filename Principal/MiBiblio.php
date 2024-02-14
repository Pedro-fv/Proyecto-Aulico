<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería Virtua</title>
    <link rel="stylesheet" href="../css/mystyle.css">

</head>
<body>
<div class="icon-bar">
  <a href="Inicio.php">Inicio</a>
  <a href="Pagina2.php">Subir Libro</a>
 <!--  <a href="#">Buscar</a> -->
  <a href="Pagina3.php">Categoría</a>
  <a class="active" href="MiBiblio.php">Mi Biblioteca</a>
  <a href="CerrarSesion.php">Salir</a>
</div>
<div>
<div class ="slideshow-container">
    <?php
    include("ObteBiblio.php");
    ?>
    </div>
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
<script src="../js/ComentarVer.js"></script>
</body>
</html>