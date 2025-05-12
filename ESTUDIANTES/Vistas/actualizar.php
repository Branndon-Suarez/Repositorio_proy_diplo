<?php
    require_once('../../USUARIOS/Modelo/Usuarios.php');
    require_once('../Modelo/Estudiantes.php');

    /**Para obtener de la clase METODOS la funcion de consultar materia y docente
     * para ponerlos como <option> en el formulario de editar
    */
    require_once('../../metodos.php');

    $GET_ID = $_GET['GET_Id'];

    $Modelo_usuario = new USUARIOS();
    $Modelo_usuario->validar_sesion();

    $Modelo_Estudiante = new ESTUDIANTES();
    $Info_Estudiante = $Modelo_Estudiante->get_Id_Estudiante($GET_ID);

    $Modelo_Metodo = new METODOS();
    $Registro_Materia = $Modelo_Metodo->Consultar_Materia();
    $Registro_Docente = $Modelo_Metodo->Consultar_Docentes();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Actualizar estudiante</title>
</head>
<body>
    <h1>Actualizar estudiante</h1>
    <form action="../Controladores/proce_actu.php" method="post">
        <input type="hidden" name="ID" value="<?php echo $GET_ID; ?>">

        <?php
            if(!empty($Info_Estudiante)){
                foreach($Info_Estudiante as $fila_Estu){
        ?>
                    <label for="NOMBRE">Nombre</label><br>
                    <input type="text" name="NOMBRE" value="<?php echo $fila_Estu['1']; ?>" placeholder="Nombre" required><br><br>

                    <label for="APELLIDO">Apellido</label><br>
                    <input type="text" name="APELLIDO" value="<?php echo $fila_Estu['Apellido']; ?>" placeholder="Apellido" required><br><br>

                    <label for="DOCUMENTO">Documento</label><br>
                    <input type="text" name="DOCUMENTO" value="<?php echo $fila_Estu['Documento']; ?>" placeholder="Documento" required><br><br>

                    <label for="CORREO">Correo</label><br>
                    <input type="email" name="CORREO" value="<?php echo $fila_Estu['Correo']; ?>" placeholder="Correo" required><br><br>

                    <label for="MATERIA">Materia</label><br>
                    <select name="MATERIA">
                        <option value="<?php echo $fila_Estu['Id_Materia']; ?>"> <?php echo $fila_Estu['Materia']; ?></option>
                        <?php
                            if(!empty($Registro_Materia)){
                                foreach($Registro_Materia as $fila_Materia){
                        ?>
                                    <option value="<?php echo $fila_Materia['Id_Materia']; ?>">
                                        <?php echo $fila_Materia['Id_Materia']." - ".$fila_Materia['Materia'] ?>
                                    </option>
                        <?php
                                }
                            }
                        ?>
                    </select><br><br>

                    <label for="USUARIO">Usuario Docente</label><br>
                    <select name="USUARIO">
                        <option value="<?php echo $fila_Estu['Id_Usuario']; ?>"> <?php echo $fila_Estu[1]; ?></option>
                        <?php
                            if(!empty($Registro_Docente)){
                                foreach($Registro_Docente as $fila_Docente){
                        ?>
                                    <option value="<?php echo $fila_Docente['Id_Usuario']; ?>">
                                        <?php echo $fila_Docente['Id_Usuario']." - ".$fila_Docente['Nombre'] ?>
                                    </option>
                        <?php
                                }
                            }
                        ?>
                    </select><br><br>

                    <label for="PROMEDIO">Promedio</label><br>
                    <input type="number" name="PROMEDIO" value="<?php echo $fila_Estu['Promedio']; ?>" placeholder="Promedio" required><br><br>
        <?php
                }
            }
        ?>

        <input type="submit" value="Actualizar">
    </form>
</body>
</html> 