<?php
    require_once('../../USUARIOS/Modelo/Usuarios.php');
    require_once('../Modelo/Materias.php');

    $Modelo_Usuario =  new USUARIOS();
    $Modelo_Usuario->validar_sesion_admin();

    $Modelo_Materia = new MATERIAS();
    $Info_Materia = $Modelo_Materia->Consultar_Materia();
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
    <a href="../../DOCENTES/Vistas/index.php"><b>DOCENTES</b></a>
    <h1>MATERIAS</h1>

    <h3>
        <?php echo "Bienvenido(a): {$Modelo_Usuario->get_Nombre()} - {$Modelo_Usuario->get_Perfil()}"; ?><br>
    </h3>

    <a href="insertar.php">Insertar</a><br><br>
    <a href="../../USUARIOS/Controladores/cerrar_sesion.php">Cerrar Sesión</a><br><br>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>MATERIAS</th>
            <th colspan="2">ACCIONES</th>
        </tr>

        <?php
            if(!empty($Info_Materia)){
                foreach($Info_Materia as $fila_Materia){
        ?> 
                    <tr>
                        <td><?php echo $fila_Materia['Id_Materia'];?></td>
                        <td><?php echo $fila_Materia['Materia'];?></td>
                        <td><a href="actualizar.php?GET_ID=<?php echo $fila_Materia['Id_Materia'];?>">Actualizar</a></td>
                        <td><a href="eliminar.php?GET_ID=<?php echo $fila_Materia['Id_Materia'];?>">Eliminar</a></td>
                    </tr>
        <?php
                }
            }
        ?>
    </table>
</body>
</html>