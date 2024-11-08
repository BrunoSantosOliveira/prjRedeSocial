<?php
include '../bd/bd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeReceita = $_POST['nomeReceita'];
    $descricao = $_POST['descricao'];
    $caminhoFinal = '../img/receitas/fotoPadrao.jpg';

    if (isset($_FILES['fotoReceita']) && $_FILES['fotoReceita']['error'] === UPLOAD_ERR_OK) {
        $arquivoTmp = $_FILES['fotoReceita']['tmp_name'];
        $nomeArquivoUnico = uniqid() . '_' . basename($_FILES['fotoReceita']['name']);
        $caminhoCompleto = '../img/receitas/' . $nomeArquivoUnico;

        if (!is_dir('../img/receitas')) {
            if (!mkdir('../img/receitas', 0777, true)) {
                echo "Erro ao criar o diretório";
            }
        }

        if (move_uploaded_file($arquivoTmp, $caminhoCompleto)) {
            $caminhoFinal = $caminhoCompleto;
        } else {
            echo "Erro ao mover o arquivo!";
        }
    }

    $sql = "INSERT INTO tb_receitas (nome_Receita, descricao, fotoReceita) VALUES (?, ?, ?)";
    $result = $conn->prepare($sql);
    $result->bind_param("sss", $nomeReceita, $descricao, $caminhoFinal);
    $result->execute();
    
    $idReceita = $result->insert_id; 

    foreach ($_POST['ingrediente'] as $index => $nomeIngrediente) {
        $sql = "SELECT id_ingrediente FROM tb_ingredientes WHERE nome_ingrediente = ?";
        $result = $conn->prepare($sql);
        $result->bind_param("s", $nomeIngrediente);
        $result->execute();
        $result = $result->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $idIngrediente = $row['id_ingrediente'];
        } else {
            $sql = "INSERT INTO tb_ingredientes (nome_ingrediente) VALUES (?)";
            $result = $conn->prepare($sql);
            $result->bind_param("s", $nomeIngrediente);
            $result->execute();
            $idIngrediente = $result->insert_id;
        }
        $quantidade = $_POST['quantidade'][$index];
        $sql = "INSERT INTO tb_receita_ingrediente (id_receita, id_ingrediente, quantidade) VALUES ('$idReceita', '$idIngrediente', '$quantidade')";
        $result = $conn->query($sql);
    }
    echo "Receita adicionada com sucesso!";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Receita</title>
    <link rel="stylesheet" href="style.css"> <!-- Link para o CSS -->
</head>
<body>
    <header>
        <div class="logo"><h2>Cozinha Descomplica</h2></div>
        <nav class="navbar">
            <a class="navbaritem" href="../index.php">Início</a>
            <a class="navbaritem" href="#">Categorias</a>
            <a class="navbaritem" href="#">Sobre Nós</a>
        </nav>
    </header>
    <div class="wrap">
        <div class="form-box login">
            <h2>Adicionar Receita</h2>
            <form id="form-receita" method="POST" action="insertReceita.php" enctype="multipart/form-data">
                <div class="input-box">
                    <label>Nome da Receita</label>
                    <input type="text" id="nomeReceita" name="nomeReceita" placeholder="Digite o nome da receita" required>
                </div>

                <div class="input-box">
                    <label>Descrição</label>
                    <textarea id="descricao" name="descricao" placeholder="Digite uma breve descrição de sua receita" required></textarea>
                </div>

                <div class="input-box">
                    <input type="file" id="fotoReceita" name="fotoReceita">
                    <label>Foto</label>
                </div>

                <h3>Ingredientes</h3>
                <div id="ingredientes-container">
                    <div class="ingrediente-item">
                        <button id="btn" type="button" onclick="adicionarIngrediente()">Adicionar outro ingrediente</button>
                        <button id="btn" type="button" onclick="excluirIngrediente()">Excluir ingrediente</button>
                        <div class="input-box">
                            <label>Ingrediente</label>
                            <input type="text" class="ingrediente-nome" name="ingrediente[]" required placeholder="Digite ou busque um ingrediente" onkeyup="buscarIngrediente(this)">
                        </div>
                        <div class="input-box">
                            <label>Quantidade</label>
                            <input type="text" class="ingrediente-quantidade" name="quantidade[]" required placeholder="Quantidade">
                        </div>
                        
                    </div>
                </div>

                <input  type="submit" id="btn" value="Adicionar Receita">
            </form>
        </div>
    </div>

    <script>
        function buscarIngrediente(input) {
            let query = input.value;
            if (query.length > 2) {
                fetch('pesqIngrediente.php?query=' + query)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                    });
            }
        }

        function adicionarIngrediente() {
            let container = document.getElementById('ingredientes-container');
            let div = document.createElement('div');
            div.classList.add('ingrediente-item');
            div.innerHTML = `
                <div class="input-box">
                    <input type="text" class="ingrediente-nome" name="ingrediente[]" required placeholder="Digite ou busque um ingrediente" onkeyup="buscarIngrediente(this)">
                    <label>Ingrediente</label>
                </div>
                <div class="input-box">
                    <input type="text" class="ingrediente-quantidade" name="quantidade[]" required placeholder="Quantidade">
                    <label>Quantidade</label>
                </div>
            `;
            container.appendChild(div);
        }

        function excluirIngrediente(){
            let container = document.getElementById('ingredientes-container');
            container.removeChild(container.lastChild);
        }
    </script>
</body>
</html>