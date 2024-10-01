<?php
include 'C:\xampp\htdocs\git\prjRedeSocial\bd\bd.php';

$erroMensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $nomeCompleto = $_POST['nomeCompleto'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senhaCript = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM tb_users WHERE email = '$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $erroMensagem = "Email já cadastrado!";
    } else {
        $sql = "SELECT * FROM tb_users WHERE username = '$username'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $erroMensagem = "Username não disponível!";
        } else {
            $sql = "INSERT INTO tb_users(username, nomeCompleto, email, senha) VALUES('$username', '$nomeCompleto', '$email', '$senhaCript')";
            
            if ($conn->query($sql) === TRUE) {
                header("Location: /git/prjRedeSocial/login/login.php?message=".urlencode("Cadastrado com sucesso!"));
                exit();
            } else {
                $erroMensagem = "Erro ao cadastrar.";
            }
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
            <h2>Cadastrar</h2>
            <form action="register.php" method="post" autocomplete="off">
                <div class="message">
                    <?php
                    if (!empty($erroMensagem)) {
                        echo '<span class="message-text">' . htmlspecialchars($erroMensagem) . '</span>';
                    }
                    ?>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" name="username" placeholder="" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" name="nomeCompleto" placeholder="" value="<?php echo isset($_POST['nomeCompleto']) ? htmlspecialchars($_POST['nomeCompleto']) : ''; ?>" required>
                    <label>Nome Completo</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="email" placeholder="" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="senha" minlength="3" placeholder="" required>
                    <label>Senha</label>
                </div>
                <button type="submit" class="btn">Cadastrar</button>
                <div class="login">
                    <span>Já possui uma conta? <a href="/git/prjRedeSocial/login/login.php" class="login-link">Faça Login</a>
                        aqui</span>
                </div>
        </form>
        </div>
    </div>
</body>
</html>