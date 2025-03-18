CREATE DATABASE AdoptaGatitos;

USE AdoptaGatitos;

CREATE TABLE Personalidad (
    id_personalidad INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    descripcion VARCHAR(100) NOT NULL
);

CREATE TABLE Raza (
    id_raza INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    descripcion VARCHAR(100) NOT NULL
);

CREATE TABLE Categoria_Producto (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    descripcion VARCHAR(100) NOT NULL
);

CREATE TABLE Refugio (
    id_refugio INT AUTO_INCREMENT PRIMARY KEY,
    direccion VARCHAR(100) NOT NULL,
    telefono VARCHAR(10) NOT NULL,
    email VARCHAR(50) NOT NULL
);

CREATE TABLE Ciudadano (
    id_ciudadano INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL UNIQUE,
    email VARCHAR(30) NOT NULL UNIQUE,
    password VARCHAR(200) NOT NULL,
    fecha_registro DATE NOT NULL,
    telefono VARCHAR(10),
    genero VARCHAR(20),
    foto_perfil VARCHAR(200)
);

CREATE TABLE Encargado (
    id_encargado INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    username VARCHAR(30) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(200) NOT NULL,
    telefono VARCHAR(10) NOT NULL,
    foto_perfil VARCHAR(200),
    fecha_ingreso DATE NOT NULL,
    id_refugio INT NOT NULL,
    FOREIGN KEY (id_refugio) REFERENCES Refugio (id_refugio)
);

CREATE TABLE Producto (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    descripcion VARCHAR(200) NOT NULL,
    caducidad DATE NOT NULL,
    cantidad INT NOT NULL,
    fecha_donacion DATE NOT NULL,
    status_donacion VARCHAR(20) NOT NULL,
    id_ciudadano INT NOT NULL,
    id_categoria INT NOT NULL,
    id_refugio INT NOT NULL,
    FOREIGN KEY (id_ciudadano) REFERENCES Ciudadano (id_ciudadano),
    FOREIGN KEY (id_categoria) REFERENCES Categoria_Producto (id_categoria),
    FOREIGN KEY (id_refugio) REFERENCES Refugio (id_refugio)
);

CREATE TABLE Cartilla_Salud (
    id_cartilla INT AUTO_INCREMENT PRIMARY KEY,
    vacunas_aplicadas VARCHAR(100) NOT NULL,
    estado_general VARCHAR(40) NOT NULL,
    ultima_revision DATE NOT NULL,
    id_ciudadano INT DEFAULT NULL,
    FOREIGN KEY (id_ciudadano) REFERENCES Ciudadano (id_ciudadano)
);

CREATE TABLE Supervision (
    id_supervisa INT AUTO_INCREMENT PRIMARY KEY,
    id_cartilla INT NOT NULL,
    id_encargado INT NOT NULL,
    fecha_supervision DATE NOT NULL,
    comentarios_supervision VARCHAR(200) NOT NULL,
    FOREIGN KEY (id_cartilla) REFERENCES Cartilla_Salud (id_cartilla),
    FOREIGN KEY (id_encargado) REFERENCES Encargado (id_encargado)
);

CREATE TABLE Gato (
    id_gato INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    genero VARCHAR(15) NOT NULL,
    foto VARCHAR(200) NOT NULL,
    fecha_ingreso DATE NOT NULL,
    descripcion VARCHAR(200) NOT NULL,
    estado VARCHAR(20) NOT NULL,
    edad int NOT NULL,
    color VARCHAR(20) NOT NULL,
    fecha_adopcion DATE DEFAULT NULL,
    id_cartilla INT DEFAULT NULL,
    id_ciudadano INT DEFAULT NULL,
    id_personalidad INT NOT NULL,
    id_raza INT NOT NULL,
    id_refugio INT NOT NULL,
    FOREIGN KEY (id_cartilla) REFERENCES Cartilla_Salud (id_cartilla),
    FOREIGN KEY (id_ciudadano) REFERENCES Ciudadano (id_ciudadano),
    FOREIGN KEY (id_personalidad) REFERENCES Personalidad (id_personalidad),
    FOREIGN KEY (id_raza) REFERENCES Raza (id_raza),
    FOREIGN KEY (id_refugio) REFERENCES Refugio (id_refugio)
);

DROP TABLE producto;
DROP TABLE categoria_producto;
DROP TABLE supervision;
DROP TABLE encargado;
DROP TABLE gato;
DROP TABLE personalidad;
DROP TABLE raza;
DROP TABLE refugio;
DROP TABLE cartilla_salud;
DROP TABLE ciudadano;