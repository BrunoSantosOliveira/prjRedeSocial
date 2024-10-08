<?php
include '..\bd\bd.php';

$id = $_SESSION['id'];

$sql = "SELECT * FROM tb_users WHERE id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$username = $row['username'];
$nomeCompleto = $row['nomeCompleto'];
$email = $row['email'];
$biography = $row['biography'];
$profile = $row['fotoPerfil'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
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
            <a class="navbaritem" href="/prjPW2/home/home.php">Início</a>
            <a class="navbaritem" href="/prjPW2/home/home.php#service_section">Serviços</a>
            <a class="navbaritem" href="/prjPW2/home/home.php#about_section">Sobre Nós</a>
        </nav>
    </header>
    <div class="wrap">
        <div class="form-box login">
            <div class="btn-voltar">
                <a href="../index.php"><ion-icon name="arrow-back-circle-outline"></ion-icon></a>
            </div>
            <h2>Perfil</h2>
            <div class="foto">
                <img src="<?php echo $profile; ?>" alt="Foto de Perfil">
            </div>
            <form action="user.php" method="post" autocomplete="off">
                <div class="message">
                    <?php if (!empty($mensagem)) echo '<span class="message-text">' . htmlspecialchars($mensagem) . '</span>'; ?>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" name="username" placeholder="" class="align inp" readonly value="<?php echo $username;?>">
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="finger-print"></ion-icon>
                    </span>
                    <input type="text" name="nomeCompleto" placeholder="" class="align inp" readonly value="<?php echo $nomeCompleto;?>">
                    <label>Nome Completo</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="email" placeholder="" readonly value="<?php echo  $email;?>">
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="book"></ion-icon>
                    </span>
                    <input type="text" name="biography" placeholder="" class="align inp" readonly value="<?php echo $biography;?>">
                    <label>Biografia</label>
                </div> 
            </form><br>
            <div class="voltar">
                <a href="../update/update.php"><button class="btn">Editar Perfil</button></a>
            </div>

            <div class="voltar">
                    <a href="../passwordChange/passwordChange.php"><button class="btn">Alterar Senha</button></a>
            </div>
            <div class="voltar">
                <span>Clique <a href="../login/login.php" class="cadastro-link"> Aqui </a>
                    para sair da conta</span>
            </div>
        </div>
    </div>
</body>

</html>