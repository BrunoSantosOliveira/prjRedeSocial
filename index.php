<?php
include 'bd\bd.php';

$expiracao = 30 * 60; 

if (isset($_SESSION['expiracao'])) {
    if (time() > $_SESSION['expiracao']) {
        session_destroy();
    }
} else {
    $_SESSION['expiracao'] = time() + $expiracao;
}
if (isset($_SESSION['nomeCompleto'])) {
    $partenome = explode(" ", $_SESSION['nomeCompleto']);
    $primeironome = $partenome[0];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cozinha Descomplica</title>
    <link rel="stylesheet" href="style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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
            <?php if (isset($_SESSION['nomeCompleto'])): ?>
                <a class="navbaritem" href="<?php if($_SESSION['id'] == 1 ){ echo "admin/admin.php";}else{ echo "user/user.php";}?>"><?php echo htmlspecialchars($primeironome); ?></a>
            <?php else: ?>
                <a class="navbaritem" href="login/login.php">Entrar</a>
            <?php endif; ?>
            <a class="navbaritem" href="#">Ingredientes</a>
        </nav>
    </header>
    
    <div class="content">
        <div class="title">
            <h1>Bem-Vindo ao <br>
            Cozinha Descomplica</h1>
            <h5><?php if (isset($_SESSION['nomeCompleto'])){echo htmlspecialchars($primeironome) . ", ";} ?>Veja as receitas que preparamos para você</h5>
        </div>

        <div class="categorys">
            <a href="cafe/cafe.php"> <div class="category">
                <img src="img/imgIndexCategory/cafeCategory.jpg" alt="Café">
            
                <h2>Café</h2>
            </div> </a>

            <a href=""> <div class="category">
                <img src="img/imgIndexCategory/refeicaoCategory.jpg" alt="Refeições">
            
                <h2>Refeições</h2>
            </div> </a>

            <a href=""> <div class="category">
                <img src="img/imgIndexCategory/lancheCategory.png" alt="Lanches">
            
                <h2>Lanches</h2>
            </div> </a>

            <a href=""> <div class="category">
                <img src="img/imgIndexCategory/sobremesaCategory.png" alt="Sobremesas">
            
                <h2>Sobremesas</h2>
            </div> </a>
        </div>

        <div class="title">
            <h1>Mais populares</h1>
        </div>

        <div class="maisPopulares">
            <div class="popular">
                <h2>Bolo de Milho cremoso</h2>

                <img src="img/imgMaisPopulares/fiveStars.png" id="stars" alt="Estrelas">

                <a href="receita/receita.php"> <img src="img/imgMaisPopulares/boloDeMihoCremoso.png" id="imgReceita" alt="Imagem Receita"> </a>
            </div>

            <div class="popular">
                <h2>Salada de Penne</h2>

                <img src="img/imgMaisPopulares/fiveStars.png" id="stars" alt="Estrelas">

                <a href="receita/receita.php"> <img src="img/imgMaisPopulares/saladaDePenne.png" id="imgReceita" alt="Imagem Receita"> </a>
            </div>

            <div class="popular">
                <h2>Torta de Frango</h2>

                <img src="img/imgMaisPopulares/fiveStars.png" id="stars" alt="Estrelas">

                <a href="receita/receita.php"> <img src="img/imgMaisPopulares/tortaDeFrango.png" id="imgReceita" alt="Imagem Receita"> </a>
            </div>
        </div>
    </div>
</body>
</html>