<?php
    include '../bd/bd.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';


    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $sql = "SELECT * FROM tb_users WHERE  email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'igorcs1104@gmail.com';
            $mail->Password = 'mzxs ztjk yojj lcrw';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('igorcs1104@gmail.com');

            $mail->addAddress($email);

            $mail->isHTML(false);

            $mail->Subject = "Alterar senha";
            $mail->Body = "Link de alteração de senha: http://localhost/prjRedeSocial/passwordchange/passwordchange.php?id=".$row['id']." se não foi você que solicitou ignore este email.";

            $mail->send();

            $mensagem = '<span class="message-text">Email enviado com sucesso!<br>Confira a caixa de span</span>';
        }  else {
            $mensagem = '<span class="message-text">Email não encontrado!</span>';
        }

    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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
            <h2>Recuperar Senha</h2><br><br>
            <form action="forgot.php" method="post" autocomplete="off">
                <div class="message">
                    <?php
                    if (isset($_SESSION['mensagem'])) {
                        $mensagem = $_SESSION['mensagem'];
                    }
                    if (!empty($mensagem)) {
                        echo $mensagem;
                    }
                    unset($_SESSION['mensagem']);
                    ?>
                </div>
                <div class="input-box">
                    <input type="text" name="email" placeholder="" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                    <label>Email</label>
                </div><br><br>
                <button type="submit" class="btn">Recuperar</button>
                <div class="login">
                    <span>Retornar ao <a href="../login/login.php" class="login-link">Login</a> aqui</span>
                </div>
            </form>
        </div>
    </div>
</body>
</html>