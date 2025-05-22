# Sistema de información Materias
###### Mi primer README
[TOCM]

- [1. ¿En qué consiste?](#1-en-qué-consiste)
<p>
Este sistema de información básico y sencillo estructurado en mvc consiste en **registrar las materias, usuarios y estudiantes** de una manera organizada junto a un *sistema de roles* básico delimitado por los administradores y docentes del sistema.
</p>

- [2. ¿Qué se utilizó?](#2-qué-se-utilizó)
<span>Algunas herramientas utilizadas fueron:</span>
<ol>
	<li>*Visual studio code*</li>
	<li>**Html:** Para la estructura del sistema.</li>
	<li>**PHP:** La creación de funciones como la conexión a la BD principalmente.</li>
	<li>***PhpMyAdmin:*** La creación de la base de datos.</li>
	<li>[Xammp: Servidor local.](https://www.apachefriends.org/es/index.html)</li>
</ol>

<h3>3. Visualización conexión a la BD</h3>

***<span>[Mirar mejor en el repositorio](https://github.com/Branndon-Suarez/Repositorio_proy_diplo/blob/main/CONEXION.php)</span>***

	'''<?php
		class CONEXION{
				protected $BD;
				private $TIPO_BD="mysql";
				private $SERVIDOR="localhost";
				private $BD_NAME="notas";
				private $USUARIO="root";
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
	?>'''


<h3>10. Otras herramientas</h3>

