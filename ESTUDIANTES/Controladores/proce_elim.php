<?php
    require_once('../Modelo/Estudiantes.php');

    if($_POST){
        $Modelo_Estudiante = new ESTUDIANTES();

        $ID=$_POST['ID'];
        $Modelo_Estudiante->Elim_Estudiante($ID);
    }else{
        header('location: ../../index.php');
    }
?>