<?php
    require_once('../../USUARIOS/Modelo/Usuarios.php');

    $modelo_usuario = new USUARIOS();
    $modelo_usuario->validar_sesion_admin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Sistema de notas</title>
</head>
<body>
    <h1>Registrar Materia</h1>
    <form action="../Controladores/proce_insert.php" method="post">
        <label for="NOMBRE">Materia</label><br>
        <input type="text" name="NOMBRE" placeholder="Materia" required><br><br>

        <input type="submit" value="Registrar">
    </form>
</body>
</html> 