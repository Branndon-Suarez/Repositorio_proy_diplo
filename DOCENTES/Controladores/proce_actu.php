<?php
    require_once('../Modelo/Docentes.php');

    $Modelo_Docente = new DOCENTES();

    if($_POST){
        $ID = $_POST['ID'];
        $NOMBRE = $_POST['NOMBRE'];
        $APELLIDO = $_POST['APELLIDO'];
        $USUARIO = $_POST['USUARIO'];
        $CONTRA = $_POST['CONTRASEÑA'];
        $ESTADO = $_POST['ESTADO'];

        $Modelo_Docente->Actu_Docente($ID, $NOMBRE, $APELLIDO, $USUARIO, $CONTRA, $ESTADO);
    }else{
        header('location: ../../index.php');
    }
?>