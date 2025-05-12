<?php
    require_once('../../USUARIOS/Modelo/Usuarios.php');
    require_once('../../metodos.php');

    $modelo_usuario = new USUARIOS();
    $modelo_usuario->validar_sesion();

    $modelo_metodos = new METODOS();
    /*Para buscar en este caso las materias y docentes existentes 
    y ponerlas en el select del formulario*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Sistema de notas</title>
</head>
<body>
    <h1>Registrar estudiante</h1>
    <form action="../Controladores/proce_insert.php" method="post">
        <label for="NOMBRE">Nombre</label><br>
        <input type="text" name="NOMBRE" placeholder="Nombre" required><br><br>

        <label for="APELLIDO">Apellido</label><br>
        <input type="text" name="APELLIDO" placeholder="Apellido" required><br><br>

        <label for="DOCUMENTO">Documento</label><br>
        <input type="text" name="DOCUMENTO" placeholder="Documento" required><br><br>

        <label for="CORREO">Correo</label><br>
        <input type="email" name="CORREO" placeholder="Correo" required><br><br>

        <label for="MATERIA">Materia</label><br>
            <?php
                $BD_Materias = $modelo_metodos->Consultar_Materia();

                if(!empty($BD_Materias)){
            ?>
                    <select name="MATERIA" required>
                        <option>Seleccione</option>
            <?php
                        foreach($BD_Materias as $fila){
            ?>
                            <option value="<?php echo $fila['Id_Materia']; ?>"><?php echo $fila['Id_Materia']." - ".$fila['Materia']; ?></option>
            <?php
                        }
            ?>
                    </select><br><br>
            <?php
                }else{
            ?>
                    <span>No se encontraron materias en la base de datos</span><br><br>
            <?php
                }
            ?>

        <label for="USUARIO_DOCENTE">Usuario Docente</label><br>
            <?php
                $BD_Docentes = $modelo_metodos->Consultar_Docentes();

                if(!empty($BD_Docentes)){
            ?>
                    <select name="USUARIO_DOCENTE" required>
                        <option>Seleccione</option>
            <?php
                        foreach($BD_Docentes as $fila){
            ?>
                            <option value="<?php echo $fila['Id_Usuario']; ?>"><?php echo $fila['Id_Usuario']." - ".$fila['Nombre']; ?></option>
            <?php
                        }
            ?>
                    </select><br><br>
            <?php
                }else{
            ?>
                    <span>No se encontraron docentes en la base de datos</span><br><br>
            <?php
                }
            ?>
        

        <label for="PROMEDIO">Promedio</label><br>
        <input type="number" name="PROMEDIO" placeholder="Promedio" required><br><br>

        <input type="submit" value="Registrar">
    </form>
</body>
</html> 