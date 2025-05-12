<?php
    require_once('../Modelo/Materias.php');

    $Modelo_Materia = new MATERIAS();

    if($_POST){
        $NOMBRE = $_POST['NOMBRE'];

        $Modelo_Materia->Insetar_Materia($NOMBRE);
    }else{
        header('location: ../../index.php');
    }
?>