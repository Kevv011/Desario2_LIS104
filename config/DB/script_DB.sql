CREATE DATABASE validacion_php;
USE validacion_php;

CREATE TABLE usuarios (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(100),
 correo VARCHAR(100),
 telefono VARCHAR(20),
 direccion VARCHAR(255),
 cod_postal VARCHAR(10)
);
