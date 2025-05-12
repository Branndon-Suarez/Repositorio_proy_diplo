<?php
    require_once('../../USUARIOS/Modelo/Usuarios.php');
    require_once('../Modelo/Estudiantes.php');

    $Modelo_Usuarios = new USUARIOS();
    $Modelo_Usuarios->validar_sesion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de notas</title>
</head>
<body>
    <?php if ($Modelo_Usuarios->get_Perfil() == 'Administrador' or 'administrador'): ?>
        <a href="../../ADMINISTRADORES/Vistas/index.php"><b>ADMINISTRADORES - </b></a>
        <a href="../../DOCENTES/Vistas/index.php"><b>DOCENTES - </b></a>
        <a href="../../MATERIAS/Vistas/index.php"><b>MATERIAS</b></a>
        <h1>ESTUDIANTES</h1>
    <?php else: ?>
        <h1>ESTUDIANTES</h1>
    <?php endif; ?>

    <h3>
        <?php echo "Bienvenido(a): {$Modelo_Usuarios->get_Nombre()} - {$Modelo_Usuarios->get_Perfil()}"; ?><br>
    </h3>

    <a href="insertar.php" target="_blank">Insertar</a><br><br>
    <a href="../../USUARIOS/Controladores/cerrar_sesion.php">Cerrar Sesión</a><br><br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>DOCUMENTO</th>
            <th>CORREO</th>
            <th>MATERIA</th>
            <th>DOCENTE</th>
            <th>PROMEDIO</th>
            <th>FECHA DE REGISTRO</th>
            <th colspan="2">ACCIONES</th>
        </tr>

            <?php
                $estudiante = new ESTUDIANTES();
                $consulta_estudiantes = $estudiante->Consultar_Estudiante();

                if(!empty($consulta_estudiantes)){
                    foreach($consulta_estudiantes as $fila){
            ?>
                        <tr>
                            <td><?php echo $fila['Id_Estudiante']; ?></td>
                        <!--Como hay dos campos llamados iguales, el de "Nombre" de la tabla
                            ESTUDIATNES y el de "Nombre" de la tabla USUARIOS, consigo el 
                            nombre de estudiante poniendo la posicion del elemento en el array
                            en vez de accederlo meddiante la clase del array ['Nombre']
                            porque me traeria el nombre es del usuario-->
                            <td><?php echo $fila[1]; ?></td>
                            <td><?php echo $fila['Apellido']; ?></td>
                            <td><?php echo $fila['Documento']; ?></td>
                            <td><?php echo $fila['Correo']; ?></td>
                            <td><?php echo $fila['Id_Materia']."-".$fila['Materia']; ?></td>
                            <td><?php echo $fila['Id_Usuario']."-".$fila['Nombre']; ?></td>
                            <td><?php echo $fila['Promedio']."%"; ?></td>
                            <td><?php echo $fila['Fecha_Registro']; ?></td>
                        <!--Crear variable Id que se envie por método get para obtener de el registro
                            especifico que se desea actualizar. Este Id se iguala al ID que está en
                            la tabla de consutlas : < ? php echo $fila['Id_Estudiante']; ?>-->
                            <td><a href="actualizar.php?GET_Id=<?php echo $fila['Id_Estudiante']; ?>" target="_blank">Actualizar</a></td>
                            <td><a href="eliminar.php?GET_Id=<?php echo $fila['Id_Estudiante']; ?>" target="_blank">Eliminar</a></td>
                        </tr>
            <?php
                    }
                }else{
            ?>
                    <td colspan="11"><?php echo "No se encontraron resultados..."; ?></td>
            <?php
                }
            ?>
    </table>
</body>
</html>