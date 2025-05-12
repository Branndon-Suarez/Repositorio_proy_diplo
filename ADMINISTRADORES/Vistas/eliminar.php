<?php
    require_once('../../USUARIOS/Modelo/Usuarios.php');

    $Modelo_Usuario = new USUARIOS();
    $Modelo_Usuario->validar_sesion_admin();

    $GET_ID = $_GET['GET_Id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de notas</title>
</head>
<body>
    <h1>Eliminar Administrador</h1>
    <form action="../Controladores/proce_elim.php" method="post">
        <input type="hidden" name="ID" value="<?php echo $GET_ID; ?>">
        <p>¿Estás seguro que deseas eliminar este administrador?</p>

        <input type="submit" value="Eliminar">
    </form>
</body>
</html>