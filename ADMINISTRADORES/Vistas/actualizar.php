<?php
    require_once('../../USUARIOS/Modelo/Usuarios.php');
    require_once('../Modelo/Administradores.php');

    $GET_ID = $_GET['GET_Id'];

    $Modelo_Usuario = new USUARIOS();
    $Modelo_Usuario->validar_sesion_admin();

    $Modelo_Admin = new ADMINISTRADORES();
    $Info_Admin = $Modelo_Admin->get_Id_Admin($GET_ID);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Sistema de notas</title>
</head>
<body>
    <h1>Editar Administrador</h1>
    <form action="../Controladores/proce_actu.php" method="post">
        <input type="hidden" name="ID" value="<?php echo $GET_ID; ?>">
        <?php
            if(!empty($Info_Admin)){
                foreach($Info_Admin as $fila_Admin){
        ?>
                    <label for="NOMBRE">Nombre</label><br>
                    <input type="text" name="NOMBRE" value="<?php echo $fila_Admin['Nombre']; ?>" placeholder="Nombre" required><br><br>

                    <label for="APELLIDO">Apellido</label><br>
                    <input type="text" name="APELLIDO" value="<?php echo $fila_Admin['Apellido']; ?>" placeholder="Apellido" required><br><br>

                    <label for="USUARIO">Usuario</label><br>
                    <input type="text" name="USUARIO" value="<?php echo $fila_Admin['Usuario']; ?>" placeholder="Usuario" required><br><br>

                    <label for="CONTRASEÑA">Contraseña</label><br>
                    <input type="password" name="CONTRASEÑA" value="<?php echo $fila_Admin['Comtraseña']; ?>" placeholder="Contraseña" required><br><br>

                    <label for="ESTADO">Estado</label><br>
                    <select name="ESTADO">
                        <option value="<?php echo $fila_Admin['Estado']; ?>"><?php echo $fila_Admin['Estado']; ?></option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select><br><br>
        <?php
                }
            }else{
                echo "No se encontraron resultados.";
            }
        ?>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html> 