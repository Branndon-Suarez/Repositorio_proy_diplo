<?php
    require_once('../../CONEXION.php');

    class ESTUDIANTES extends CONEXION{
        public function __construct(){
            $this->BD = parent::__construct();
        }

        public function Insertar_Estudiante($GET_NOM,$GET_APELLIDO,$GET_DOCUMENTO,$GET_CORREO,$GET_MATERIA_FK,$GET_DOCENTE_FK,$GET_PROMEDIO,$GET_FECHA_REGISTRO){
            $statement= $this->BD->prepare(
                "INSERT INTO ESTUDIANTES 
                (Nombre,Apellido,Documento,Correo,Id_Materia_FK_Estudiante,Id_Usuario_Docente_FK_Estudiante,Promedio,Fecha_Registro)
                VALUES (:1_Nom, :2_Apellido, :3_Documento, :4_Correo, :5_Materia_FK, :6_Docente_FK, :7_Promedio, :8_Fecha_Registro)"
            );

            $statement->bindParam(':1_Nom', $GET_NOM);
            $statement->bindParam(':2_Apellido', $GET_APELLIDO);
            $statement->bindParam(':3_Documento', $GET_DOCUMENTO);
            $statement->bindParam(':4_Correo', $GET_CORREO);
            $statement->bindParam(':5_Materia_FK', $GET_MATERIA_FK);
            $statement->bindParam(':6_Docente_FK', $GET_DOCENTE_FK);
            $statement->bindParam(':7_Promedio', $GET_PROMEDIO);
            $statement->bindParam(':8_Fecha_Registro', $GET_FECHA_REGISTRO);


            if($statement->execute()){
                header('location: ../Vistas/index.php');
            }else{
                header('location: ../Vistas/insertar.php');
            }
        }

        public function Consultar_Estudiante(){
            $i=0;
            $rows = null;
            $statement = $this->BD->prepare(
                "SELECT E.Id_Estudiante, E.Nombre, E.Apellido, E.Documento, E.Correo,
                E.Id_Materia_FK_Estudiante, E.Id_Usuario_Docente_FK_Estudiante,
                E.Promedio, E.Fecha_Registro, M.Id_Materia, M.Materia, U.Id_Usuario, U.Nombre
                FROM ESTUDIANTES E INNER JOIN MATERIA M INNER JOIN USUARIOS U 
                ON E.Id_Materia_FK_Estudiante = M.Id_Materia
                AND E.Id_Usuario_Docente_FK_Estudiante = U.Id_Usuario"
            );
            $statement->execute();

            while($resultado=$statement->fetch()){
                $rows[$i]=$resultado;
                $i++;
            }
            return $rows;
        }

        public function get_Id_Estudiante($GET_ID){
            $i=0;
            $rows=null;
            $statement = $this->BD->prepare(
                "SELECT E.Id_Estudiante, E.Nombre, E.Apellido, E.Documento, E.Correo,
                E.Id_Materia_FK_Estudiante, E.Id_Usuario_Docente_FK_Estudiante,
                E.Promedio, E.Fecha_Registro, M.Id_Materia, M.Materia, U.Id_Usuario, U.Nombre
                FROM ESTUDIANTES E INNER JOIN MATERIA M INNER JOIN USUARIOS U 
                ON E.Id_Materia_FK_Estudiante = M.Id_Materia
                AND E.Id_Usuario_Docente_FK_Estudiante = U.Id_Usuario
                WHERE E.Id_Estudiante = :1_Id"
            );

            $statement->bindParam(':1_Id',$GET_ID);
            $statement->execute();

            while($resultado=$statement->fetch()){
                $rows[$i]=$resultado;
                $i++;
            }
            return $rows;
        }

        public function Search_Estudiante($GET_SEARCH){
            $i=0;
            $rows=null;
            $statement = $this->BD->prepare(
                "SELECT Id_Estudiante, Nombre, Apellido, Documento, Correo,
                Id_Materia_FK_Estudiante, Id_Usuario_Docente_FK_Estudiante,
                Promedio, Fecha_Registro FROM ESTUDIANTES WHERE 
                Nombre LIKE concat('%', :Search, '%') OR
                Apellido LIKE concat('%', :Search, '%') OR
                Documento LIKE concat('%', :Search, '%') OR
                Correo LIKE concat('%', :Search, '%') OR
                Id_Materia_FK_Estudiante LIKE concat('%', :Search, '%') OR
                Id_Usuario_Docente_FK_Estudiante LIKE concat('%', :Search, '%') OR"
            );
            $statement->bindParam(':Search',$GET_SEARCH);
            $statement->execute();

            while($resultado=$statement->fetch()){
                $rows[$i]=$resultado;
                $i++;
            }
            return $rows;
        }

        public function Actu_Estudiante($GET_ID,$GET_NOM,$GET_APELLIDO,$GET_DOCUMENTO,$GET_CORREO,$GET_MATERIA_FK,$GET_DOCENTE_FK,$GET_PROMEDIO,$GET_FECHA_REGISTRO){
            $statement = $this->BD->prepare(
                "UPDATE ESTUDIANTES SET
                Nombre = :2_Nombre,
                Apellido = :3_Apellido,
                Documento = :4_Documento,
                Correo = :5_Correo,
                Id_Materia_FK_Estudiante = :6_Materia_FK,
                Id_Usuario_Docente_FK_Estudiante = :7_Docente_FK,
                Promedio = :8_Promedio,
                Fecha_Registro = :9_Fecha_Registro
                WHERE Id_Estudiante = :1_Id"
            );

            $statement->bindParam(':1_Id',$GET_ID);
            $statement->bindParam(':2_Nombre',$GET_NOM);
            $statement->bindParam(':3_Apellido',$GET_APELLIDO);
            $statement->bindParam(':4_Documento',$GET_DOCUMENTO);
            $statement->bindParam(':5_Correo',$GET_CORREO);
            $statement->bindParam(':6_Materia_FK',$GET_MATERIA_FK);
            $statement->bindParam(':7_Docente_FK',$GET_DOCENTE_FK);
            $statement->bindParam(':8_Promedio',$GET_PROMEDIO);
            $statement->bindParam(':9_Fecha_Registro',$GET_FECHA_REGISTRO);

            if($statement->execute()){
                header('location: ../Vistas/index.php');
            }else{
                header('location: ../Vistas/actualizar.php');
            }

        }

        public function Elim_Estudiante($GET_ID){
            $statement = $this->BD->prepare("DELETE FROM ESTUDIANTES WHERE Id_Estudiante = :1_Id");

            $statement->bindParam(':1_Id',$GET_ID);

            if($statement->execute()){
                header('location: ../Vistas/index.php');
            }else{
                header('location: ../Vistas/eliminar.php');
            }
        }
    }
?>