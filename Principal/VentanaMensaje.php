<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería Virtual</title>
    <link rel="stylesheet" href="../css/mystyle.css">
    <style>
      /* s */
.formu1 {
    display: flex;
    flex-direction: column;
 /*    align-items: center; 
    text-align: left; */
    margin: 0 auto; /* Centra el contenedor horizontalmente en la página */
    max-width: 600px; /* Define el ancho máximo del contenedor */
    padding: 20px; /* Añade espaciado interno al contenedor */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Añade una sombra al contenedor */
    border-radius: 10px; /* Añade bordes redondeados al contenedor */
}
.mensajes1{
    text-align: left;
}
/* Estilos para el formulario de enviar mensaje */
.EnviarMensaje1 {
    align-items: center
    width: 100%; 
    padding: 20px; /* Añade espaciado interno al formulario */
    /* background-color: #555; /* Define el color de fondo del formulario */ 
   
    margin-top: 140px; /* Añade un espacio superior al formulario */
}


.enviar-button1 {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}
.EnviarMensaje1 textarea{
  color: white;
  width: 95%;
  height: 30px; 
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 10px;
}
.formu1 h2{
    text-align: center;
}
    </style>
</head>
<body>
<?php
$id_amigo = isset($_GET['id_amigo']) ? $_GET['id_amigo'] : ''; 
?>
<div class="formu1">
<h2>Mensajes</h2>

<div id="mensajes" class="mensajes1">
<?php
 session_start();
include("ProcesarMensaje.php");
?>
</div>
<div class="EnviarMensaje1">

    <form id="formulario-mensaje" action="EnviarMensaje.php" method="post">
    <input type="hidden" name="id_amigo" value="<?php echo htmlspecialchars($id_amigo); ?>">
        <label for="mensaje"></label><br>
        <textarea id="mensaje" name="mensaje" rows="4" cols="50"></textarea><br>
        <div class="button-container">
        <input type="submit" value="Enviar" class="enviar-button1">
        </div>
    </form>
    </div>
    </div>
</body>
</html>