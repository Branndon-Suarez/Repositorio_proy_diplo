<?php
    require_once('../Modelo/Docentes.php');

    $Modelo_Docente = new DOCENTES();

    if($_POST){
        $NOMBRE = $_POST['NOMBRE'];
        $APELLIDO = $_POST['APELLIDO'];
        $USUARIO = $_POST['USUARIO'];
        $CONTRA = $_POST['CONTRASEÑA'];

        $Modelo_Docente->Insertar_Docente($NOMBRE, $APELLIDO, $USUARIO, $CONTRA);
    }else{
        header('location: ../../index.php');
    }

?>