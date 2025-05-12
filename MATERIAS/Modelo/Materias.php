<?php
    require_once('../../CONEXION.php');

    class MATERIAS extends CONEXION{
        public function __construct(){
            $this->BD = parent::__construct();
        }

        public function Insetar_Materia($GET_MATERIA){
            $statement = $this->BD->prepare(
                "INSERT INTO MATERIA (Materia)
                VALUES(:1_Materia)"
            );

            $statement->bindParam(':1_Materia',$GET_MATERIA);

            if($statement->execute()){
                header('location: ../Vistas/index.php');
            }else{
                header('location: ../Vistas/insertar.php');
            }
        }

        public function Consultar_Materia(){
            $i=0;
            $rows=null;
            $statement = $this->BD->prepare("SELECT * FROM MATERIA");
            $statement->execute();

            while($resultado = $statement->fetch()){
                $rows[$i]=$resultado;
                $i++;
            }
            return $rows;
        }

        public function get_Id_Materia($GET_ID){
            $i=0;
            $rows=null;
            $statement = $this->BD->prepare("SELECT * FROM MATERIA WHERE Id_Materia = :1_Id");

            $statement->bindParam(':1_Id',$GET_ID);

            $statement->execute();

            while($resultado = $statement->fetch()){
                $rows[$i]=$resultado;
                $i++;
            }
            return $rows;
        }

        public function Actu_Materia($GET_ID,$GET_MATERIA){
            $statement = $this->BD->prepare(
                "UPDATE MATERIA SET
                Materia = :2_Materia
                WHERE Id_Materia = :1_Id"
            );

            $statement->bindParam(':1_Id',$GET_ID);
            $statement->bindParam(':2_Materia',$GET_MATERIA);
            
            if($statement->execute()){
                header('location: ../Vistas/index.php');
            }else{
                header('location: ../Vistas/actualizar.php');
            }
        }

        public function Elim_Materia($GET_ID){
            $statement = $this->BD->prepare("DELETE FROM MATERIA WHERE Id_Materia = :1_Id");

            $statement->bindParam(':1_Id',$GET_ID);

            if($statement->execute()){
                header('location: ../Vistas/index.php');
            }else{
                header('location: ../Vistas/eliminar.php');
            }
        }
    }
?>