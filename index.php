<?php
include 'c:\xampp\htdocs\git\bd\bd.php';
$partenome = explode(" ", $_SESSION['usuario']);
$primeironome = $partenome[0];


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
            <img src="" alt="Logo">
        </div>
        <nav class="navbar">
            <a class="navbaritem" href="home/home.php#slider_section">Início</a>
            <a class="navbaritem" href="home/home.php#service_section">Serviços</a>
            <a class="navbaritem" href="home/home.php#about_section">Sobre Nós</a>
            <?php if (isset($_SESSION['usuario'])): ?>
                <a class="navbaritem" href="#"><?php echo htmlspecialchars($primeironome); ?></a>
            <?php else: ?>
                <a class="navbaritem" href="#">Entrar</a>
            <?php endif; ?>
            <a class="navbaritem" href="#">Ingredientes</a>
        </nav>
    </header>
</body>
</html>