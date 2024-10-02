CREATE DATABASE cozinhaDescomplica;
USE cozinhaDescomplica;

CREATE TABLE tb_users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(60) NOT NULL UNIQUE,
    nomeCompleto VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    fotoPerfil VARCHAR(255)
);

create table tb_receitas(
    id_Receita INT AUTO_INCREMENT PRIMARY KEY,
    nome_Receita VARCHAR(80) NOT NULL,
    descricao VARCHAR(200) NOT NULL,
    ingredientes VARCHAR(200) NOT NULL,
    fotoReceita VARCHAR(255)
);