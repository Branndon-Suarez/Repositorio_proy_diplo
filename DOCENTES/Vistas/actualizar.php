<?php
    require_once('../../USUARIOS/Modelo/Usuarios.php');
    require_once('../Modelo/Docentes.php');

    $Modelo_Usuario = new USUARIOS();
    $Modelo_Usuario->validar_sesion_admin();

    $GET_ID = $_GET['GET_ID'];
    $Modelo_Docente = new DOCENTES();
    $Info_Docente = $Modelo_Docente->get_Id_Docente($GET_ID);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Sistema de notas</title>
</head>
<body>
    <h1>Editar Docente</h1>
    <form action="../Controladores/proce_actu.php" method="post">
        <?php
            if(!empty($Info_Docente)){
                foreach($Info_Docente as $fila_docente){
        ?>
                    <input type="hidden" name="ID" value="<?php echo $GET_ID; ?>">

                    <label for="NOMBRE">Nombre</label><br>
                    <input type="text" name="NOMBRE" value="<?php echo $fila_docente['Nombre']; ?>" placeholder="Nombre" required><br><br>

                    <label for="APELLIDO">Apellido</label><br>
                    <input type="text" name="APELLIDO" value="<?php echo $fila_docente['Apellido']; ?>" placeholder="Apellido" required><br><br>

                    <label for="USUARIO">Usuario</label><br>
                    <input type="text" name="USUARIO" value="<?php echo $fila_docente['Usuario']; ?>" placeholder="Usuario" required><br><br>

                    <label for="CONTRASEÑA">Contraseña</label><br>
                    <input type="password" name="CONTRASEÑA" value="<?php echo $fila_docente['Comtraseña']; ?>" placeholder="Contraseña" required><br><br>

                    <label for="ESTADO">Estado</label><br>
                    <select name="ESTADO">
                        <option value="<?php echo $fila_docente['Estado']; ?>"><?php echo $fila_docente['Estado']; ?></option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select><br><br>
        <?php
                }
            }
        ?>
        <input type="submit" value="Actualizar">
    </form>
</body>
</html> 