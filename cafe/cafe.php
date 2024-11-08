<?php
include '/xampp/htdocs/prjRedeSocial/bd/bd.php';

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
            <a class="navbaritem" href="../index.php">Início</a>
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
            <h1>Receitas para café da manhã</h1>
            <h5><?php if (isset($_SESSION['nomeCompleto'])){echo htmlspecialchars($primeironome) . ", ";} ?> as melhores receitas para você acordar com pé direito</h5>
        </div>

        <div class="container">
        <img src="../img/imgCafe/image_10.png" alt="Imagem" class="img">
        </div>

        <div class="receitas">
            <div class="tit">
                
            </div>
        </div>