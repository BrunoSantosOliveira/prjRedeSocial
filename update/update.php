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

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $nomeCompleto = $_POST['nomeCompleto'];
    $email = $_POST['email'];
    $biography = $_POST['biography'];

    $sql = "SELECT * FROM tb_users WHERE  email = '$email' and  id != '$id'";

    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $mensagem = "Email já cadastrado";
    } else{
        $sql = "SELECT * FROM tb_users WHERE username = '$username' and  id != '$id'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            $mensagem = "Username já cadastrado";
        } else{
            $sql = "UPDATE tb_users SET username = '$username', nomeCompleto = '$nomeCompleto'
            , email = '$email', biography = '$biography' WHERE id = '$id'";
            if($conn->query($sql) === TRUE){
                header("Location:  ../user/user.php");
            } else{
                $mensagem = "Erro ao atualizar dados";
            }
        }
    }


}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - Editar</title>
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
                <a href="../user/user.php"><ion-icon name="arrow-back-circle-outline"></ion-icon></a>
            </div>
            <h2>Editar</h2>
            <form action="update.php" method="post" autocomplete="off">
                <div class="message">
                    <?php if (!empty($mensagem)) echo '<span class="message-text">' . htmlspecialchars($mensagem) . '</span>'; ?>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="person"></ion-icon>
                    </span>
                    <input type="text" name="username" placeholder="" class="align inp" value="<?php echo $username;?>">
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="finger-print"></ion-icon>
                    </span>
                    <input type="text" name="nomeCompleto" placeholder="" class="align inp" value="<?php echo $nomeCompleto;?>">
                    <label>Nome Completo</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <input type="email" name="email" placeholder="" value="<?php echo  $email;?>">
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon">
                        <ion-icon name="book"></ion-icon>
                    </span>
                    <input type="text" name="biography" placeholder="" class="align inp" value="<?php echo $biography;?>">
                    <label>Biografia</label>
                </div> 
                <button type="submit" class="btn">Confirmar Edições</button>
            </form>
        </div>
    </div>
</body>

</html>