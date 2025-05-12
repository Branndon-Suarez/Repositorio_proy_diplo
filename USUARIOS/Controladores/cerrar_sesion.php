<?php
    require_once('../Modelo/Usuarios.php');
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CERRAR SESIÓN</title>
</head>
<body>
    <h4>Se a cerrado sesión.</h4>
    <a href="../../index.php">Iniciar sesión</a>
</body>
</html>