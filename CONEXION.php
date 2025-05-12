<?php

    class CONEXION{
            protected $BD;
            private $TIPO_BD="mysql";
            private $SERVIDOR="localhost";
            private $BD_NAME="notas";
            private $USUARIO="rootttt";
            private $CONTRASEÑA="";
        

        public function __construct(){
            try {
                $this->BD = new PDO(
                    "{$this->TIPO_BD}:host={$this->SERVIDOR};dbname={$this->BD_NAME}",$this->USUARIO,$this->CONTRASEÑA
                );

                $this->BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->BD;
            } catch (PDOException $e) {
                echo "Ha surgido un error: ".$e->getMessage();
            }
        }
    }
?>