<?php
include '../bd/bd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeReceita = $_POST['nomeReceita'];
    $descricao = $_POST['descricao'];
    
    if (isset($_FILES['fotoReceita']) && $_FILES['fotoReceita']['error'] === UPLOAD_ERR_OK) {
        $arquivoTmp = $_FILES['fotoReceita']['tmp_name'];
        $nomeArquivoUnico = uniqid() . '_' . basename($_FILES['fotoReceita']['name']);
        $caminhoCompleto = '../img/receitas/' . $nomeArquivoUnico;

        if (!is_dir('../img/receitas')) {
            mkdir('../img/receitas', 0777, true);
        }

        if (move_uploaded_file($arquivoTmp, $caminhoCompleto)) {
            $sql = "UPDATE tb_users SET fotoPerfil = ? WHERE id = ?";
            $result = $conn->prepare($sql);
            $result->bind_param('si', $caminhoCompleto, $userId);
            $result->execute();
        } else {
            echo "Erro ao mover o arquivo!";
        }

    } else {
        $caminhoFinal = '../img/receitas/fotoPadrao.jpg';
        $sql = "UPDATE tb_users SET fotoPerfil = ? WHERE id = ?";
        $result = $conn->prepare($sql);
        $result->bind_param('si', $caminhoFinal, $userId);
        $result->execute();
    }
    
    $sql = "INSERT INTO tb_receitas (nome_Receita, descricao, fotoReceita) VALUES (?, ?, ?)";
    $result = $conn->prepare($sql);
    $result->bind_param("sss", $nomeReceita, $descricao, $fotoReceita);
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
        $sql = "INSERT INTO tb_receita_ingrediente (id_receita, id_ingrediente, quantidade) VALUES (?, ?, ?)";
        $result = $conn->prepare($sql);
        $result->bind_param("iis", $idReceita, $idIngrediente, $quantidade);
        $result->execute();
    }
    echo "Receita adicionada com sucesso!";
}
$conn->close();