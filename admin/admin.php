<!DOCTYPE html>
<html lang="pt-br">

<?php
    include "../bd/bd.php";

    $resultNewUsers = $conn->query("SELECT * FROM tb_users ORDER BY dataCriacao DESC LIMIT 4");
    $resultNewReceitas = $conn->query("SELECT * FROM tb_receitas ORDER BY dataCriacao DESC LIMIT 4");

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

    if($resultNewReceitas->num_rows > 0) {
        $recentFotoReceitas = [];
        $recentNomeReceitas = [];
        $recentDescricaoReceitas = [];

        while($row = $resultNewReceitas->fetch_assoc()) {
            $recentFotoReceitas[] = $row['fotoReceita'];
            $recentNomeReceitas[] = $row['nome_Receita'];
            $recentDescricaoReceitas[] = $row['descricao'];
        }

        $recentFotoReceita1 = $recentFotoReceitas[0] ?? null;
        $recentFotoReceita2 = $recentFotoReceitas[1] ?? null;
        $recentFotoReceita3 = $recentFotoReceitas[2] ?? null;
        $recentFotoReceita4 = $recentFotoReceitas[3] ?? null;

        $recentNomeReceita1 = $recentNomeReceitas[0] ?? null;
        $recentNomeReceita2 = $recentNomeReceitas[1] ?? null;
        $recentNomeReceita3 = $recentNomeReceitas[2] ?? null;
        $recentNomeReceita4 = $recentNomeReceitas[3] ?? null;

        $recentDescricaoReceita1 = $recentDescricaoReceitas[0] ?? null;
        $recentDescricaoReceita2 = $recentDescricaoReceitas[1] ?? null;
        $recentDescricaoReceita3 = $recentDescricaoReceitas[2] ?? null;
        $recentDescricaoReceita4 = $recentDescricaoReceitas[3] ?? null;
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Cozinha Descomplica</title>
    <link rel="stylesheet" href="style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <header>
        <div class="logo">
            <a href="../index.php" id="aLogo"> <h2>Cozinha Descomplica</h2> </a>
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
                    if($resultNewUsers->num_rows > 0){ 
                        if($recentUsernameUser1 == null){
                            echo "Nenhum Usuário!";
                        } else {
                            echo "@",$recentUsernameUser1;
                        }
                    } else {
                        echo "Nenhum Usuário!";
                    }
                    ?>
                </h1>

                <h3>Biografia:</h3>
                <p><?php if($resultNewUsers->num_rows > 0) {echo $recentBiographyUser1;}?></p>
            </div>

            <div class="user">
                <img src="<?php echo $recentProfilePictureUser2; ?>" alt="Usuário Recente">
            
                <h1>
                    <?php
                    if($resultNewUsers->num_rows > 0){ 
                        if($recentUsernameUser2 == null){
                            echo "Nenhum Usuário!";
                        } else {
                            echo "@",$recentUsernameUser2;
                        }
                    } else {
                        echo "Nenhum Usuário!";
                    }
                    ?>
                </h1>

                <h3>Biografia:</h3>
                <p><?php if($resultNewUsers->num_rows > 0) {echo $recentBiographyUser2;}?></p>
            </div>

            <div class="user">
                <img src="<?php echo $recentProfilePictureUser3; ?>" alt="Usuário Recente">
            
                <h1>
                    <?php
                    if($resultNewUsers->num_rows > 0){ 
                        if($recentUsernameUser3 == null){
                            echo "Nenhum Usuário!";
                        } else {
                            echo "@",$recentUsernameUser3;
                        }
                    } else {
                        echo "Nenhum Usuário!";
                    }
                    ?>
                </h1>

                <h3>Biografia:</h3>
                <p><?php if($resultNewUsers->num_rows > 0) {echo $recentBiographyUser3;}?></p>
            </div>

            <div class="user">
                <img src="<?php echo $recentProfilePictureUser4; ?>" alt="Usuário Recente">
            
                <h1>
                    <?php
                    if($resultNewUsers->num_rows > 0){ 
                        if($recentUsernameUser4 == null){
                            echo "Nenhum Usuário!";
                        } else {
                            echo "@",$recentUsernameUser4;
                        }
                    } else {
                        echo "Nenhum Usuário!";
                    }
                    ?>
                </h1>

                <h3>Biografia:</h3>
                <p><?php if($resultNewUsers->num_rows > 0) {echo $recentBiographyUser4;}?></p>
            </div>
        </div>

        <div class="newReceitas">
            <div class="receita">
                <img src="<?php echo $recentFotoReceita1;?>" alt="Receita Recente">

                <h1>
                    <?php
                        if($resultNewReceitas->num_rows > 0){
                            if($recentNomeReceita1 == null){
                                echo "Nenhuma Receita!";
                            } else {
                                echo $recentNomeReceita1;
                            }
                        } else {
                            echo "Nenhuma Receita!";
                        }
                    ?>
                </h1>
                <h3>Biografia:</h3>
                <p><?php if($resultNewReceitas->num_rows > 0) {echo $recentDescricaoReceita1;}?></p>
            </div>

            <div class="receita">
                <img src="<?php echo $recentFotoReceita2;?>" alt="Receita Recente">

                <h1>
                    <?php 
                        if($resultNewReceitas->num_rows > 0){
                            if($recentNomeReceita2 == null){
                                echo "Nenhuma Receita!";
                            } else {
                                echo $recentNomeReceita2;
                            }
                        } else {
                            echo "Nenhuma Receita!";
                        }
                    ?>
                </h1>
                <h3>Biografia:</h3>
                <p><?php if($resultNewReceitas->num_rows > 0) {echo $recentDescricaoReceita2;}?></p>
            </div>

            <div class="receita">
                <img src="<?php echo $recentFotoReceita3;?>" alt="Receita Recente">

                <h1>
                    <?php 
                        if($resultNewReceitas->num_rows > 0){
                            if($recentNomeReceita3 == null){
                                echo "Nenhuma Receita!";
                            } else {
                                echo $recentNomeReceita3;
                            }
                        } else {
                            echo "Nenhuma Receita!";
                        }
                    ?>
                </h1>
                <h3>Biografia:</h3>
                <p><?php if($resultNewReceitas->num_rows > 0) {echo $recentDescricaoReceita3;}?></p>
            </div>

            <div class="receita">
                <img src="<?php echo $recentFotoReceita4;?>" alt="Receita Recente">

                <h1>
                    <?php 
                        if($resultNewReceitas->num_rows > 0){
                            if($recentNomeReceita4 == null){
                                echo "Nenhuma Receita!";
                            } else {
                                echo $recentNomeReceita4;
                            }
                        } else {
                            echo "Nenhuma Receita!";
                        }
                    ?>
                </h1>
                <h3>Biografia:</h3>
                <p><?php if($resultNewReceitas->num_rows > 0) {echo $recentDescricaoReceita4;}?></p>
            </div>

        </div>
    </div>    
</body>

</html>
