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
  <!-- esta es la barra de navegacion la que esta arriba de todo cada uno de apartado redireciona
a cada archivo php correspondiente
-->
  <a href="Inicio.php">Inicio</a>
  <a href="Pagina2.php">Subir Libro</a>
  <!-- <a href="#">Buscar</a> -->
  <a class="active"  href="Pagina3.php">Categoría</a>
  <a href="MiBiblio.php">Mi Biblioteca</a>
  <a href="CerrarSesion.php">Salir</a>
</div>
<div class="slideshow-container">
    <?php
    /* aqui se abre el archivo Obtenercate.php */
    include("ObtenerCate.php");

    ?>
</div>
</body>
</html>