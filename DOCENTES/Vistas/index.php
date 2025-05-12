<?php
    require_once('../../USUARIOS/Modelo/Usuarios.php');
    require_once('../Modelo/Docentes.php');

    $Modelo_Usuario = new USUARIOS();
    $Modelo_Usuario->validar_sesion_admin();

    $Modelo_Docente = new DOCENTES();
    $Info_Docente = $Modelo_Docente->Consultar_Docente();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de notas</title>
</head>
<body>
    <a href="../../ADMINISTRADORES/Vistas/index.php"><b>ADMINISTRADORES - </b></a>
    <a href="../../ESTUDIANTES/Vistas/index.php"><b>ESTUDIANTES - </b></a>
    <a href="../../MATERIAS/Vistas/index.php"><b>MATERIAS</b></a>
    <h1>DOCENTES</h1>

    <h3>
        <?php echo "Bienvenido(a): {$Modelo_Usuario->get_Nombre()} - {$Modelo_Usuario->get_Perfil()}"; ?><br>
    </h3>

    <a href="insertar.php" target="_blank">Insertar</a><br><br>
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
            if(!empty($Info_Docente)){
                foreach($Info_Docente as $fila_docente){
        ?>
                    <tr>
                        <td><?php echo $fila_docente['Id_Usuario'];?></td>
                        <td><?php echo $fila_docente['Nombre'];?></td>
                        <td><?php echo $fila_docente['Apellido'];?></td>
                        <td><?php echo $fila_docente['Usuario'];?></td>
                        <td><?php echo $fila_docente['Estado'];?></td>
                        <td><a href="actualizar.php?GET_ID=<?php echo $fila_docente['Id_Usuario'];?>">Actualizar</a></td>
                        <td><a href="eliminar.php?GET_ID=<?php echo $fila_docente['Id_Usuario'];?>">Eliminar</a></td>
                    </tr>
        <?php
                }
            }else{
        ?>
                <td colspan="6"><?php echo "No se encontraron resultados...";?></td>
        <?php
            }
        ?>
    </table>
</body>
</html>