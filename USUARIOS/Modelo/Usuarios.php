<?php

    require_once('../../CONEXION.php');
    session_start();

    class USUARIOS extends CONEXION{

        public function __construct(){
            $this->BD = parent::__construct();//Guardar la conexion exitosa que realiza el __contruct de la clase CONEXION
        }

        public function Login($GET_usuario,$GET_contraseña){
            $rows=null;
            $statement = $this->BD->prepare(
                "SELECT * FROM USUARIOS WHERE Id_Usuario = :1_Id AND Comtraseña = :2_Contrasena"
            );

            $statement->bindParam('1_Id',$GET_usuario);
            $statement->bindParam('2_Contrasena',$GET_contraseña);

            $statement->execute();

            /**rowCount() :  Permite verificar (luego de ejecutar con execute() )
             * la CANTIDAD DE DATOS encontrados en prepare().
             * NOTA: Deberia ser 1 porque solo debe haber 1 usuario con
             * un nom usuario y contraseña únicos
            */
            if($statement->rowCount()==1){
                /**fetch() : Es un método que OBTIENE una fila de resultados de una consulta a una base de datos 
                * y lo devuelve como un ARRAY ASOCIATIVO y este a su vez, es almacenado en la variable $resultado.
                */
                $resultado=$statement->fetch();

                /**$_SESSION[nom_var] : Son variables globales que permiten almacenar
                 * en arrays (si es el caso) la INFORMACIÓN de USUARIO EN EL SERVIDOR*/
                $_SESSION['NOMBRE']= $resultado["Nombre"]." ".$resultado["Apellido"];
                $_SESSION['ID']= $resultado["Id_Usuario"];
                $_SESSION['PERFIL']= $resultado["Perfil"];
                /*/NOTA 2: El $resultado al ser un array que contiene el registro,
                simplemente se el especifica con "[]" el campo que queremos de la tabla
                de la BD*/
                return true;
            }
            return false;
        }

        public function get_Nombre(){
            return $_SESSION['NOMBRE'];
        }

        public function get_Id(){
            return $_SESSION['ID'];
        }

        public function get_Perfil(){
            return $_SESSION['PERFIL'];
        }

        public function validar_sesion(){
            if(empty($_SESSION['ID']) || $_SESSION['ID'] == null){
                session_unset();
                session_destroy();
                header('location: ../../index.php');
            }
        }

        public function validar_sesion_admin(){
            if(!empty($_SESSION['ID'])){
                if($_SESSION['PERFIL'] == 'Docente'){
                    header('location: ../../ESTUDIANTES/Vistas/index.php');
                }
            }else{
                session_unset();
                session_destroy();
                header('location: ../../index.php');
            }
        }
    }
?>