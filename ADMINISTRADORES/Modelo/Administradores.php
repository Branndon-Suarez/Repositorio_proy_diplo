<?php
    require_once('../../CONEXION.php');

    class ADMINISTRADORES extends CONEXION{
        
        public function __construct(){
            $this->BD = parent::__construct();
        }

        public function Insertar_Admin($GET_NOMBRE,$GET_APELLIDO,$GET_USUARIO,$GET_CONTRA){
            $statement = $this->BD->prepare(
                "INSERT INTO USUARIOS (Nombre,Apellido,Usuario,Comtraseña,Perfil,Estado)
                VALUES (:1_Nom, :2_Apellido, :3_Usuario, :4_Contra, 'Administrador', 'Activo')"
            );

            $statement->bindParam(':1_Nom',$GET_NOMBRE);
            $statement->bindParam(':2_Apellido',$GET_APELLIDO);
            $statement->bindParam(':3_Usuario',$GET_USUARIO);
            $statement->bindParam(':4_Contra',$GET_CONTRA);

            if($statement->execute()){
                header('location: ../Vistas/index.php');
            }else{
                header('location: ../Vistas/insertar.php');
            }
        }

        public function Consultar_Admin(){
            $i=0;
            $rows = null;
            $statement = $this->BD->prepare(
                "SELECT * FROM USUARIOS WHERE Perfil = 'Administrador'"
            );
            $statement->execute();

            while($resultado=$statement->fetch()){
                $rows[$i] = $resultado;
                $i++;
            }
            return $rows;
        }

        public function get_Id_Admin($GET_ID){
            $i=0;
            $rows = null;
            $statement = $this->BD->prepare(
                "SELECT * FROM USUARIOS WHERE Perfil = 'Administrador' AND Id_Usuario = :1_Id"
            );

            $statement->bindParam(':1_Id',$GET_ID);

            $statement->execute();

            while($resultado=$statement->fetch()){
                $rows[$i] = $resultado;
                $i++;
            }
            return $rows;
        }

        public function Actu_Admin($GET_ID,$GET_NOMBRE,$GET_APELLIDO,$GET_USUARIO,$GET_CONTRA,$GET_ESTADO){
            $statement = $this->BD->prepare(
                "UPDATE USUARIOS SET
                Nombre = :2_Nombre,
                Apellido = :3_Apellido,
                Usuario = :4_Usuario,
                Comtraseña = :5_Comtra,
                Estado = :6_Estado
                WHERE Id_Usuario = :1_Id"
            );

            $statement->bindParam(':1_Id',$GET_ID);
            $statement->bindParam(':2_Nombre',$GET_NOMBRE);
            $statement->bindParam(':3_Apellido',$GET_APELLIDO);
            $statement->bindParam(':4_Usuario',$GET_USUARIO);
            $statement->bindParam(':5_Comtra',$GET_CONTRA);
            $statement->bindParam(':6_Estado',$GET_ESTADO);

            if($statement->execute()){
                header('location: ../Vistas/index.php');
            }else{
                header('location: ../Vistas/actualizar.php');
            }

        }

        public function Elim_Admin($GET_ID){
            $statement = $this->BD->prepare(
                "DELETE FROM USUARIOS WHERE Id_Usuario = :1_Id_Usuario"
            );

            $statement->bindParam(':1_Id_Usuario',$GET_ID);

            if($statement->execute()){
                header('location: ../Vistas/index.php');
            }else{
                header('location: ../Vistas/eliminar.php');
            }
        }
    }
?>