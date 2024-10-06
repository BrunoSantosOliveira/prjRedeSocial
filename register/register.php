<?php
include '..\bd\bd.php';
session_destroy();

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $nomeCompleto = $_POST['nomeCompleto'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senhaCript = password_hash($senha, PASSWORD_DEFAULT);
    $caminhoPadrao = '../img/profilesPictures/userPadrao.png';

    $sql = "SELECT * FROM tb_users WHERE email = '$email' OR username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $mensagem = $result->fetch_assoc()['email'] === $email ? "Email já existe!" : "Username não disponível!";
    } else {
        $sql = "INSERT INTO tb_users(username, nomeCompleto, email, senha) VALUES('$username', '$nomeCompleto', '$email', '$senhaCript')";
        if ($conn->query($sql) === TRUE) {
            $userId = $conn->insert_id;
            
            if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] === UPLOAD_ERR_OK) {
                $arquivoTmp = $_FILES['profilePicture']['tmp_name'];
                $nomeArquivoUnico = uniqid() . '_' . basename($_FILES['profilePicture']['name']);
                $caminhoCompleto = '../img/profilesPictures/' . $nomeArquivoUnico;

                if (!is_dir('../img/profilesPictures')) {
                    mkdir('../img/profilesPictures', 0777, true);
                }

                if (move_uploaded_file($arquivoTmp, $caminhoCompleto)) {
                    $sql = "UPDATE tb_users SET fotoPerfil = ? WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('si', $caminhoCompleto, $userId);
                    $stmt->execute();
                } else {
                    echo "Erro ao mover o arquivo!";
                }
            } else {
                $caminhoFinal = $caminhoPadrao;
                $sql = "UPDATE tb_users SET fotoPerfil = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('si', $caminhoFinal, $userId);
                $stmt->execute();
            }

            $_SESSION['mensagem'] = "Cadastrado com sucesso";
            header("Location: ../login/login.php");
            exit;
        } else {
            $mensagem = "Erro ao cadastrar";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <header>
        <div class="logo"><h2>Cozinha Descomplica</h2></div>
        <nav class="navbar">
            <a class="navbaritem" href="#">Início</a>
            <a class="navbaritem" href="#">Categorias</a>
            <a class="navbaritem" href="#">Sobre Nós</a>
        </nav>
    </header>
    <div class="wrap">
        <div class="form-box login">
            <h2>Cadastrar</h2>
            <form action="register.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <div class="message">
                    <?php if (!empty($mensagem)) echo '<span class="message-text">' . htmlspecialchars($mensagem) . '</span>'; ?>
                </div>
                <div class="input-box">
                    <input type="text" name="username" placeholder="" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <input type="text" name="nomeCompleto" placeholder="" value="<?php echo isset($_POST['nomeCompleto']) ? htmlspecialchars($_POST['nomeCompleto']) : ''; ?>" required>
                    <label>Nome Completo</label>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input type="password" name="senha" placeholder="" minlength="3" required>
                    <label>Senha</label>
                </div>
                <button type="submit" class="btn">Cadastrar</button>
                <div class="login">
                    <span>Já possui uma conta? <a href="../login/login.php" class="login-link">Faça Login</a> aqui</span>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
