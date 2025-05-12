<?php

    require_once('../Modelo/Usuarios.php');

    /**NOTAS: Se verifica que el formulario de iniciar sesion se haya enviado por metodo post
     * y no por get (modificar la URL).
     * Posteriormente, se verifica si los datos ingresados EXISTEN EN LA TABLA usuarios y de
     * ser así inicia sesión, de lo contrario no.
     */
    if($_POST){
        $USUARIO = $_POST['usuario'];
        $CONTRASEÑA =$_POST['contrasena'];

        $Modelo = new USUARIOS();
        if($Modelo->Login($USUARIO,$CONTRASEÑA)){
            header('location: ../../ESTUDIANTES/Vistas/index.php');
        }else{
            header('location: ../../index.php');
        }
    }else{
        header('location: ../../index.php');
    }
?>