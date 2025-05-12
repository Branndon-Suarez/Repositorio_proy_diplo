<?php
    require_once('../Modelo/Docentes.php');

    $Modelo_Docente = new DOCENTES();

    if($_POST){
        $ID = $_POST['ID'];

        $Modelo_Docente->Elim_Docente($ID);
    }
?>