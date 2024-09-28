<?php
include 'C:\xampp\htdocs\git\prjRedeSocial\bd\bd.php';
if (isset($_SESSION['usuario'])) {
    $partenome = explode(" ", $_SESSION['usuario']);
    $primeironome = $partenome[0];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cozinha Descomplica</title>
    <link rel="stylesheet" href="/styles/style.css">
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
            <?php if (isset($_SESSION['usuario'])): ?>
                <a class="navbaritem" href="#"><?php echo htmlspecialchars($primeironome); ?></a>
            <?php else: ?>
                <a class="navbaritem" href="login/login.php">Entrar</a>
            <?php endif; ?>
            <a class="navbaritem" href="#">Ingredientes</a>
        </nav>
    </header>
</body>
</html>