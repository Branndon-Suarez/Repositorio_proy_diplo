<?php
    require_once('../Modelo/Administradores.php');

    if($_POST){
        $NOMBRE = $_POST['NOMBRE'];
        $APELLIDO = $_POST['APELLIDO'];
        $USUARIO = $_POST['USUARIO'];
        $CONTRASEÑA = $_POST['CONTRASEÑA'];
    
        $Modelo_Admin = new ADMINISTRADORES();
        $Modelo_Admin->Insertar_Admin($NOMBRE,$APELLIDO,$USUARIO,$CONTRASEÑA);
    }
?>