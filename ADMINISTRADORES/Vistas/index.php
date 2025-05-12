<?php
    require_once('../../USUARIOS/Modelo/Usuarios.php');
    require_once('../Modelo/Administradores.php');

    $Modelo_Usuario = new USUARIOS();
    $Modelo_Usuario->validar_sesion_admin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de notas</title>
</head>
<body>
    <a href="../../DOCENTES/Vistas/index.php"><b>DOCENTES - </b></a>
    <a href="../../ESTUDIANTES/Vistas/index.php"><b>ESTUDIANTES - </b></a>
    <a href="../../MATERIAS/Vistas/index.php"><b>MATERIAS</b></a>
    <h1>ADMINISTRADORES</h1>

    <h3>
        <?php echo "Bienvenido(a): {$Modelo_Usuario->get_Nombre()} - {$Modelo_Usuario->get_Perfil()}"; ?><br>
    </h3>

    <a href="insertar.php" target="_blank">Insertar</a><br><br>
    <a href="../../USUARIOS/Controladores/cerrar_sesion.php">Cerrar Sesión</a><br><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>USUARIO</th>
            <th>ESTADO</th>
            <th colspan="2">ACCIONES</th>
        </tr>
        <?php
            $Modelo_Admin = new ADMINISTRADORES();
            $Info_Admin = $Modelo_Admin->Consultar_Admin();
        
            if(!empty($Info_Admin)){
                foreach($Info_Admin as $fila){
        ?>
                    <tr>
                        <td><?php echo $fila['Id_Usuario']; ?></td>
                        <td><?php echo $fila['Nombre']; ?></td>
                        <td><?php echo $fila['Apellido']; ?></td>
                        <td><?php echo $fila['Usuario']; ?></td>
                        <td><?php echo $fila['Estado']; ?></td>

                        <td><a href="actualizar.php?GET_Id=<?php echo $fila['Id_Usuario']; ?>" target="_blank">Actualizar</a></td>
                        <td><a href="eliminar.php?GET_Id=<?php echo $fila['Id_Usuario']; ?>" target="_blank">Eliminar</a></td>
                    </tr>
        <?php
                }
            }else{
        ?>
                <tr>
                    <td colspan="7">No se encontraron resultados...</td>
                </tr>
        <?php
            }
        ?>

    </table>
</body>
</html>