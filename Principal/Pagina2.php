<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Libro</title>
    <link rel="stylesheet" href="../css/mystyle.css">
</head>
<body>
<div class="icon-bar">
  <a  href="Inicio.php">Inicio</a>
  <a class="active" href="Pagina2.php">Subir Libro</a>
  <!-- <a href="#">Buscar</a> -->
  <a href="Pagina3.php">Categoría</a>
  <a href="MiBiblio.php">Mi Biblioteca</a>
  <a href="CerrarSesion.php">Salir</a>
</div>
<?php
if (isset($_GET['exito']) && $_GET['exito'] == 1) {
    echo '<div class="mensaje">
    <p>Se subió correctamente</p>
</div>';}
?>
<br>
<div class="formulario">
    <h2>Subir Libro</h2>
    <form action="subir_archivo.php" method="post" enctype="multipart/form-data">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" autocomplete="off"><br><br>
        <label for="autor">Autor:</label>
        <input type="text" name="autor" id="autor" autocomplete="off"><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" rows="4" cols="50" autocomplete="off"></textarea><br><br>
        <label for="archivo">Seleccione un libro:</label>
        <input type="file" name="archivo" id="archivo"><br><br>
        <label for="imagen">Seleccione una imagen:</label>
        <input type="file" name="imagen" id="imagen"><br><br>
        
       <?php
      include("InicioBD.php");
$consulta_categorias = $conexion->query("SELECT id, nombre FROM categorias");

echo "<label for='categoria'>Selecciona una categoría:</label>";
echo "<select name='categoria' id='categoria'>";
while ($fila = $consulta_categorias->fetch_assoc()) {
    echo "<option value='" . $fila['id'] . "'>" . $fila['nombre'] . "</option>";
}
echo "</select>";

       ?>
        <button type="submit">Subir Archivo</button>
    </form>
</div>

</body>
</html>
