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
    id_receita INT,
    nome_ingrediente VARCHAR(255) NOT NULL,
    quantidade VARCHAR(50),
    FOREIGN KEY (id_receita) REFERENCES tb_receitas(id_receita) ON DELETE CASCADE
);

INSERT INTO tb_receitas (nome_Receita, descricao, fotoReceita) VALUES
('Torta de Frango', 'Torta de frango cremosa e fácil de fazer', '../img/receitas/torta.webp');

INSERT INTO tb_ingredientes (id_receita, nome_ingrediente, quantidade) VALUES
(1, 'Peito de frango desfiado', '500g'),
(1, 'Cebola picada', '1 unidade'),
(1, 'Alho picado', '2 dentes'),
(1, 'Óleo ou azeite', '2 colheres de sopa'),
(1, 'Tomate picado', '1 unidade (sem pele e sementes)'),
(1, 'Milho verde', '1/2 xícara'),
(1, 'Ervilha', '1/2 xícara (opcional)'),
(1, 'Azeitonas picadas', '1/2 xícara (opcional)'),
(1, 'Requeijão cremoso', '1/2 xícara (opcional)'),
(1, 'Sal', 'a gosto'),
(1, 'Pimenta-do-reino', 'a gosto'),
(1, 'Cheiro-verde picado', 'a gosto');

INSERT INTO tb_receitas (nome_Receita, descricao, fotoReceita) VALUES
('Hamburger', 'Hamburger saboroso com cheddar', '../img/receitas/lanche.jpg');

INSERT INTO tb_ingredientes (id_receita, nome_ingrediente, quantidade)
VALUES 
(2, 'Pão de hambúrguer', '2 unidades'),
(2, 'Carne bovina moída', '200g'),
(2, 'Queijo cheddar', '2 fatias'),
(2, 'Alface', '2 folhas'),
(2, 'Tomate', '2 rodelas'),
(2, 'Cebola roxa', '1 rodela'),
(2, 'Picles', '2 fatias (opcional)'),
(2, 'Maionese', '1 colher de sopa'),
(2, 'Ketchup', 'a gosto'),
(2, 'Mostarda', 'a gosto'),
(2, 'Sal', 'a gosto'),
(2, 'Pimenta-do-reino', 'a gosto');

--drop database cozinhaDescomplica;