<?php
    require_once('../Modelo/Administradores.php');

    if($_POST){
        $ID = $_POST['ID'];
        $NOMBRE = $_POST['NOMBRE'];
        $APELLIDO = $_POST['APELLIDO'];
        $USUARIO = $_POST['USUARIO'];
        $CONTRA = $_POST['CONTRASEÑA'];
        $ESTADO = $_POST['ESTADO'];
    
        $Modelo_Admin = new ADMINISTRADORES();
        $Modelo_Admin->Actu_Admin($ID,$NOMBRE,$APELLIDO,$USUARIO,$CONTRA,$ESTADO);
    }else{
        echo "No se encontraron resultados.";
    }
?>