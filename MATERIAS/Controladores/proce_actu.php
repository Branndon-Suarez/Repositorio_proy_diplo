<?php
    require_once('../Modelo/Materias.php');

    $Modelo_Materia = new MATERIAS();

    if($_POST){
        $ID = $_POST['ID'];
        $NOMBRE = $_POST['NOMBRE'];

        $Modelo_Materia->Actu_Materia($ID, $NOMBRE);
    }else{
        header('location: ../../index.php');
    }
?>