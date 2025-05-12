<?php
    require_once('../Modelo/Administradores.php');

    $ID = $_POST['ID'];

    $Modelo_Admin = new ADMINISTRADORES();
    $Modelo_Admin->Elim_Admin($ID);
?>