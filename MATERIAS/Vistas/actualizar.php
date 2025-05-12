<?php
    require_once('../../USUARIOS/Modelo/Usuarios.php');
    require_once('../Modelo/Materias.php');

    $modelo_usuario = new USUARIOS();
    $modelo_usuario->validar_sesion_admin();

    $GET_ID = $_GET['GET_ID'];

    $Modelo_Materias = new MATERIAS();
    $Info_Materia = $Modelo_Materias->get_Id_Materia($GET_ID);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Sistema de notas</title>
</head>
<body>
    <h1>Actualizar Materia</h1>
    <form action="../Controladores/proce_actu.php" method="post">
        <input type="hidden" name="ID" value="<?php echo $GET_ID; ?>">

        <?php
            if(!empty($Info_Materia)){
                foreach($Info_Materia as $fila_Materia){
        ?>
                    <label for="NOMBRE">Materia</label><br>
                    <input type="text" name="NOMBRE" value="<?php echo $fila_Materia['Materia']; ?>" placeholder="Materia" required><br><br>
        <?php
                }
            }else{
                echo "No se encontraron resultados...";
            }
        ?>
        <input type="submit" value="Registrar">
    </form>
</body>
</html> 