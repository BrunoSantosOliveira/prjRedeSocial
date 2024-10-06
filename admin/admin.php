<!DOCTYPE html>
<html lang="pt-br">

<?php
    include "../bd/bd.php";

    $resultNewUsers = $conn->query("SELECT * FROM tb_users ORDER BY dataCriacao DESC LIMIT 4");

    if($resultNewUsers->num_rows > 0) {
        $recentProfilePictures = [];
        $recentUsernames = [];
        $recentBiographys = [];

        while($row = $resultNewUsers->fetch_assoc()) {
            $recentProfilePictures[] = $row['fotoPerfil'];
            $recentUsernames[] = $row['username'];
            $recentBiographys[] = $row['biography'];
        }

        $recentProfilePictureUser1 = $recentProfilePictures[0] ?? null;
        $recentProfilePictureUser2 = $recentProfilePictures[1] ?? null;
        $recentProfilePictureUser3 = $recentProfilePictures[2] ?? null;
        $recentProfilePictureUser4 = $recentProfilePictures[3] ?? null;

        $recentUsernameUser1 = $recentUsernames[0] ?? null;
        $recentUsernameUser2 = $recentUsernames[1] ?? null;
        $recentUsernameUser3 = $recentUsernames[2] ?? null;
        $recentUsernameUser4 = $recentUsernames[3] ?? null;

        $recentBiographyUser1 = $recentBiographys[0] ?? null;
        $recentBiographyUser2 = $recentBiographys[1] ?? null;
        $recentBiographyUser3 = $recentBiographys[2] ?? null;
        $recentBiographyUser4 = $recentBiographys[3] ?? null;
    };
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Cozinha Descomplica</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="logo">
            <h2>Cozinha Descomplica</h2>
        </div>
        <nav class="navbar">
            <a class="navbaritem" href="#">Usuários</a>
            <a class="navbaritem" href="#">Receitas</a>
            <a class="navbaritem" href="#">Recentes</a>
            <a class="navbaritem" href="#">Pedidos</a>
        </nav>
    </header>

    <div class="content">
        <div class="newUsers">
            <div class="user">
                <img src="<?php echo $recentProfilePictureUser1; ?>" alt="Usuário Recente">
            
                <h1>
                    <?php 
                        if($recentUsernameUser1 == null){
                            echo "Nenhum Usuário!";
                        } else {
                            echo $recentUsernameUser1;
                        }
                    ?>
                </h1>

                <h3>Biografia:</h3>
                <p><?php echo $recentBiographyUser1 ?></p>
            </div>

            <div class="user">
                <img src="<?php echo $recentProfilePictureUser2; ?>" alt="Usuário Recente">
            
                <h1>
                    <?php 
                        if($recentUsernameUser2 == null){
                            echo "Nenhum Usuário!";
                        } else {
                            echo $recentUsernameUser2;
                        }
                    ?>
                </h1>

                <h3>Biografia:</h3>
                <p><?php echo $recentBiographyUser2 ?></p>
            </div>

            <div class="user">
                <img src="<?php echo $recentProfilePictureUser3; ?>" alt="Usuário Recente">
            
                <h1>
                    <?php 
                        if($recentUsernameUser3 == null){
                            echo "Nenhum Usuário!";
                        } else {
                            echo $recentUsernameUser3;
                        }
                    ?>
                </h1>

                <h3>Biografia:</h3>
                <p><?php echo $recentBiographyUser3 ?></p>
            </div>

            <div class="user">
                <img src="<?php echo $recentProfilePictureUser4; ?>" alt="Usuário Recente">
            
                <h1>
                    <?php 
                        if($recentUsernameUser4 == null){
                            echo "Nenhum Usuário!";
                        } else {
                            echo $recentUsernameUser4;
                        }
                    ?>
                </h1>

                <h3>Biografia:</h3>
                <p><?php echo $recentBiographyUser4 ?></p>
            </div>
        </div>

        <div class="newReceitas">
        </div>
    </div>    
</body>

</html>
