<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Solicitud</title>
    <link rel="stylesheet" href="../css/mystyle.css">
    <style>

        .icon-bar2 { 
    width: 100%;
    background-color: #555;
    overflow: auto;
    text-align: center;
}

.icon-bar2 a {
   display: inline-block;
    /* float: left; */
    width: auto;
    text-align: center;
    padding: 12px 0;
    transition: all 0.3s ease;
    color: white;
    font-size: 20px;
    text-decoration: none;
}

.icon-bar2 a:hover {
    background-color: #4CAF50;
}

.active {
    background-color: #4CAF50 !important;
}
.enviar-solicitud-form {
    width: 50%;
    margin: 50px auto; 
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Estilos para los campos del formulario */
.enviar-solicitud-form input[type="text"] {
    width: 200px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

/* Estilos para el botón de enviar solicitud */
.enviar-solicitud-form button[type="submit"] {
    background-color: #4CAF50;
 
  padding: auto;
  margin:  auto; 
  border: none;
  cursor: pointer;
  display: block;
  box-sizing: border-box;
  border-radius: 20px;
}

/* Estilos para el botón de enviar solicitud al pasar el cursor */
.enviar-solicitud-form button[type="submit"]:hover {
    background-color: #45a049;
}
.enviar-solicitud-form h2{
    text-align: center;
}
    </style>
</head>
<body>
<div class="icon-bar2">
  <a class="active" href="EnviarSoli.php">Enviar</a>
  <a href="Solicitudes.php">Aceptar</a>

</div>
<div class="enviar-solicitud-form">
    <h2>Buscar</h2>
    <form method="post" action="BuscarUsuario.php">

        <input type="text" name="nombre_usuario" placeholder="Nombre de usuario" required>
        <button class="accept-button" type="submit">Enviar</button>
    </form>
</div>
</body>
</html>