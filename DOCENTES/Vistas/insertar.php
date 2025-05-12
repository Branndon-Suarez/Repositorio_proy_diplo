<?php
    require_once('../../USUARIOS/Modelo/Usuarios.php');

    $Modelo_Usuario = new USUARIOS();
    $Modelo_Usuario->validar_sesion_admin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Sistema de notas</title>
</head>
<body>
    <h1>Registrar Docente</h1>
    <form action="../Controladores/proce_insert.php" method="post">
        <label for="NOMBRE">Nombre</label><br>
        <input type="text" name="NOMBRE" placeholder="Nombre" required><br><br>

        <label for="APELLIDO">Apellido</label><br>
        <input type="text" name="APELLIDO" placeholder="Apellido" required><br><br>

        <label for="USUARIO">Usuario</label><br>
        <input type="text" name="USUARIO" placeholder="Usuario" required><br><br>

        <label for="CONTRASEÑA">Contraseña</label><br>
        <input type="password" name="CONTRASEÑA" placeholder="Contraseña" required><br><br>

        <input type="submit" value="Registrar">
    </form>
</body>
</html> 