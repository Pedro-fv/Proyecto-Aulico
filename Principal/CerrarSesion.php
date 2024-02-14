<?php
// Iniciar o reanudar la sesión
session_start();

// Destruir todas las variables de sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión u otra página
header("Location: InicioSesion.php");
exit();
?>
