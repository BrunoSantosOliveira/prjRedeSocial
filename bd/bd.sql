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
	cd_quantidade_ingredientes INT,
    cd_receita INT,
    PRIMARY KEY (id_quantidade_ingredientes, id_receita),
    quantidade VARCHAR(40) NOT NULL,
    FOREIGN KEY (cd_receita) REFERENCES tb_receitas(id_Receita) ON DELETE CASCADE
    FOREIGN KEY (cd_quantidade_ingredientes) REFERENCES tb_ingredientes(id_ingrediente) ON DELETE CASCADE
);

INSERT INTO tb_receitas (nome_Receita, descricao, fotoReceita) VALUES
('Torta de Frango', 'Torta de frango cremosa e fácil de fazer', '../img/receitas/torta.webp');

INSERT INTO tb_receitas (nome_Receita, descricao, fotoReceita) VALUES
('Hamburger', 'Hamburger saboroso com cheddar', '../img/receitas/lanche.jpg');

-- select * from tb_users;
-- drop database cozinhaDescomplica;