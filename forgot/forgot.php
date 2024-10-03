<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Recuperar Senha</title>
</head>
<body>
    <header>
        <div class="logo">
            <h2>Cozinha Descomplica</h2>
        </div>
        <nav class="navbar">
            <a class="navbaritem" href="../index.php">Início</a>
            <a class="navbaritem" href="#">Categorias</a>
            <a class="navbaritem" href="#">Sobre Nós</a>
        </nav>
    </header>
    <div class="wrap">
        <div class="form-box forgot">
            <h2>Recuperar Senha</h2>
            <form action="forgot.php" method="post" autocomplete="off">
                <div class="message">
                    <?php
                    if (isset($_SESSION['mensagem'])) {
                        $mensagem = $_SESSION['mensagem'];
                    }
                    if (!empty($mensagem)) {
                        echo '<span class="message-text">' . htmlspecialchars($mensagem) . '</span>';
                    }
                    unset($_SESSION['mensagem']);
                    ?>
                </div>
                <div class="input-box">
                    <input type="text" name="entrada" placeholder="" value="<?php echo isset($_POST['entrada']) ? htmlspecialchars($_POST['entrada']) : ''; ?>" required>
                    <label>Email ou Usuário</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="lock-closed"></ion-icon>
                    </span>
                    <input type="password" name="senha" minlength="3" placeholder="" required>
                    <label>Nova Senha</label>
                </div>
                <button type="submit" class="btn">Recuperar</button>
            </form>
        </div>
    </div>
</body>
</html>