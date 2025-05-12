<?php
    require_once('../Modelo/Estudiantes.php');

    if($_POST){
        $Modelo_estudiantes = new ESTUDIANTES;

        //Obtener la información de los input del formulario insertar estudiante
        $NOMBRE = $_POST['NOMBRE'];
        $APELLIDO = $_POST['APELLIDO'];
        $DOCUMENTO = $_POST['DOCUMENTO'];
        $CORREO = $_POST['CORREO'];
        $MATERIA = $_POST['MATERIA'];
        $USUARIO_DOCENTE = $_POST['USUARIO_DOCENTE'];
        $PROMEDIO = $_POST['PROMEDIO'];
        /*Nota : En lugar de que se digite la fecha, mejor obtenemos la fecha de registro
        en el momento del registro del estudiane mediane la funcion date()*/
        $FECHA_REGISTRO = date('Y-m-d'); //Formato dia-mes-año

        $Modelo_estudiantes->Insertar_Estudiante($NOMBRE,$APELLIDO,$DOCUMENTO,$CORREO,$MATERIA,$USUARIO_DOCENTE,$PROMEDIO,$FECHA_REGISTRO);

    }else{
        header('location: ../../index.php');
    }
?>