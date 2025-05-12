<?php
    require_once('../Modelo/Materias.php');

    $Modelo_Materias = new MATERIAS();

    if($_POST){
        $ID = $_POST['ID'];

        $Modelo_Materias->Elim_Materia($ID);
    }

?>