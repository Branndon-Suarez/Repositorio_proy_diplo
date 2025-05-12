CREATE DATABASE notas;
use notas;
CREATE TABLE USUARIOS
(
    Id_Usuario INT(15) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    Nombre VARCHAR(60) NOT NULL,
    Apellido VARCHAR(60) NOT NULL,
    Usuario VARCHAR(40) NOT NULL,
    Comtraseña VARCHAR(80) NOT NULL,
    Perfil VARCHAR(30) NOT NULL,
    Estado VARCHAR(20) NOT NULL
);

CREATE TABLE MATERIA
(
    Id_Materia INT(15) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    Materia VARCHAR(30) NOT NULL
);

CREATE TABLE ESTUDIANTES
(
    Id_Estudiante INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    Nombre VARCHAR(60) NOT NULL,
    Apellido VARCHAR(60) NOT NULL,
    Documento VARCHAR(12) NOT NULL,
    Correo VARCHAR(60) NOT NULL,
    Id_Materia_FK_Estudiante INT(15) NOT NULL,
    CONSTRAINT Id_Materia_FK_Estudiante FOREIGN KEY (Id_Materia_FK_Estudiante) REFERENCES MATERIA (Id_Materia),
    Id_Usuario_Docente_FK_Estudiante INT(15) NOT NULL,
    CONSTRAINT Id_Usuario_Docente_FK_Estudiante FOREIGN KEY (Id_Usuario_Docente_FK_Estudiante) REFERENCES USUARIOS (Id_Usuario), 
    Promedio INT(3) NOT NULL,
    Fecha_Registro DATE NOT NULL
);
/*INSERT INTO `estudiantes`(`Nombre`, `Apellido`, `Documento`, `Correo`, `Id_Materia_FK_Estudiante`, `Id_Usuario_Docente_FK_Estudiante`, `Promedio`, `Fecha_Registro`) VALUES ('Diego','Alejandro','121212','Diegon´t@gmail.com',1,123,'98%','2025/03/18')*/