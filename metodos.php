<?php
    require_once('CONEXION.php');

    class METODOS extends CONEXION{
        public function __construct(){
            $this->BD = parent::__construct();
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

        public function Consultar_Docentes(){
            $i=0;
            $rows=null;
            $statement = $this->BD->prepare(
                "SELECT * FROM USUARIOS WHERE Perfil = 'Docente'"
            );

            $statement->execute();

            while($resultado = $statement->fetch()){
                $rows[$i]=$resultado;
                $i++;
            }
            return $rows;
        }

    }
?>