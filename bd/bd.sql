CREATE DATABASE cozinhaDescomplica;
USE cozinhaDescomplica;

CREATE TABLE tb_users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(60) NOT NULL UNIQUE,
    nomeCompleto VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(300) NOT NULL,
    fotoPerfil BLOB
);