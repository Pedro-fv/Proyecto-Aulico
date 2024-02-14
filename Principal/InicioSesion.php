<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="../css/mystyle.css">
</head>
<body>
<?php
if (isset($_GET['exito']) && $_GET['exito'] == 1) {
    echo '<div class="mensaje1">
    <p>Contraseña y/o usuario incorrecto</p>
</div>';}
?>
<br>
<div class="formulario">
    <h2>Iniciar sesión</h2>
    <form action="Verificar_Sesion.php" method="post">
 
        <div class="container">
            <label for="nombre_usuario"><b>Nombre de usuario</b></label>
            <input type="text"   placeholder="Ingrese su nombre de usuario" name="nombre_usuario" required autocomplete="new-password">

            <label for="contrasena"><b>Contraseña</b></label>
            <input type="password"  autocomplete="off" placeholder="Ingrese su contraseña" name="contrasena" required>

            <button type="submit">Iniciar sesión</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Recordarme
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
        
             <span class="psw">No tienes cuenta <a href="#">Registrate</a></span>
         </div>
    </form>
</div>
</body>
</html>