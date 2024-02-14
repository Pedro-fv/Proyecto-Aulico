<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aceptar Solicitud</title>
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

.container {
    width: 50%;
    margin: 50px auto; 
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


.pending-requests {
    list-style-type: none;
    padding: 0;
}

.accept-button {
    background-color: #4CAF50;
 
  padding: 14px 20px;
  margin: 8px auto; 
  border: none;
  cursor: pointer;
  display: block;
  box-sizing: border-box;
  border-radius: 20px;
} 


.accept-button:hover {
    background-color: #45a049;
}
.container ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
  text-align: center;
  padding: 10px;

  color: white;
  background-color: #555;
  border-radius: 20px;
  display: block;
  margin-bottom: 10px;
}

    </style>
</head>
<body>
<div class="icon-bar2">
  <a  href="EnviarSoli.php">Enviar</a>
  <a class="active" href="Solicitudes.php">Aceptar</a>
</div>
<div class = "container">
    <?php
    include("MostrarSoli.php");
    ?>
    </div>
</body>
</html>