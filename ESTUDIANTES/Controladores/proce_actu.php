<?php
    require_once('../Modelo/Estudiantes.php');

    if($_POST){
        $Modelo_Estudiante = new ESTUDIANTES;

        //Obtener la información de los input del formulario insertar estudiante
        $ID= $_POST['ID'];
        $NOMBRE = $_POST['NOMBRE'];
        $APELLIDO = $_POST['APELLIDO'];
        $DOCUMENTO = $_POST['DOCUMENTO'];
        $CORREO = $_POST['CORREO'];
        $MATERIA = $_POST['MATERIA'];
        $USUARIO_DOCENTE = $_POST['USUARIO'];
        $PROMEDIO = $_POST['PROMEDIO'];
        /*Nota : En lugar de que se digite la fecha, mejor obtenemos la fecha de registro
        en el momento del registro del estudiane mediane la funcion date()*/
        $FECHA_REGISTRO = date('Y-m-d'); //Formato dia-mes-año

        $Modelo_Estudiante->Actu_Estudiante($ID,$NOMBRE,$APELLIDO,$DOCUMENTO,$CORREO,$MATERIA,$USUARIO_DOCENTE,$PROMEDIO,$FECHA_REGISTRO);

    }else{
        header('location: ../../index.php');
    }
?>