<?php
    include '../bd/bd.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM tb_users WHERE email = '$email'";

        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if(password_verify($senha, $row['senha'])) {
                $_SESSION['nomeCompleto'] = $row['nomeCompleto'];
                $_SESSION['id'] = $row['id'];
                if($row['id'] == 1) {
                    header("Location: /prjRedeSocial/admin/admin.php");
                    exit();
                } else{
                    header("Location: /prjRedeSocial/index.php");
                    exit();
                }
        } else {
            header("Location: login.php?message=" . urlencode("Senha inválida!"));
            exit();
        }
    } else {
        header("Location: login.php?message=" . urlencode("Email não encontrado!"));
        exit();
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
<header>
        <div class="logo">
            <h2>Cozinha Descomplica</h2>
        </div>
        <nav class="navbar">
            <a class="navbaritem" href="#">Início</a>
            <a class="navbaritem" href="#">Categorias</a>
            <a class="navbaritem" href="#">Sobre Nós</a>
        </nav>
    </header>
    <div class="wrap">
        <div class="form-box login">
            <h2>Entrar</h2>
            <form action="login.php" method="post" autocomplete="off">
                <div class="message">
                    <?php
                        if (isset($_GET['message'])) {
                            echo '<span class="message-text">' . htmlspecialchars($_GET['message']) . '</span>';
                        }
                    ?>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="email" name="name" placeholder="" required>
                    <label>Login</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="senha" minlength="3" placeholder="" required>
                    <label>Senha</label>
                </div>
                <div class="forgot">
                    <a href="/prjRedeSocial/forgot/forgot.php">Esqueceu a senha?</a>
                </div>
                <button type="submit" class="btn">Entrar</button>
                <div class="cadastro">
                    <span>Não tem conta? <a href="/prjRedeSocial/register/register.php" class="cadastro-link">Cadastre-se</a>
                        aqui</span>
                </div>
            </form>
        </div>
    </div>
</body>
</html>