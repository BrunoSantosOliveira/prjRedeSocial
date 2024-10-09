CREATE DATABASE cozinhaDescomplica;
USE cozinhaDescomplica;

CREATE TABLE tb_users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(60) NOT NULL UNIQUE,
    nomeCompleto VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    fotoPerfil VARCHAR(255),
    biography VARCHAR(100),
    dataCriacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create table tb_receitas(
    id_Receita INT AUTO_INCREMENT PRIMARY KEY,
    nome_Receita VARCHAR(80) NOT NULL,
    descricao VARCHAR(200) NOT NULL,
    dataCriacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fotoReceita VARCHAR(255)
);

CREATE TABLE tb_ingredientes (
    id_ingrediente INT AUTO_INCREMENT PRIMARY KEY,
    nome_ingrediente VARCHAR(255) NOT NULL
);

CREATE TABLE tb_receita_ingrediente (
	id_quantidade_ingredientes INT PRIMARY KEY AUTO_INCREMENT,
    id_receita INT,
    id_ingrediente INT,
    quantidade VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_receita) REFERENCES tb_receitas(id_Receita) ON DELETE CASCADE,
    FOREIGN KEY (id_ingrediente) REFERENCES tb_ingredientes(id_ingrediente) ON DELETE CASCADE
);

-- select * from tb_ingredientes;
-- select * from tb_receitas;
-- select * from tb_receita_ingrediente;
-- drop database cozinhaDescomplica;