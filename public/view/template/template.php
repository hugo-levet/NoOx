<?php
/*
    title : template.php
    author : Audrey
    started on : 20/11
    brief : template du site 
*/
// session_start();


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../../../public/assets/css/templateG.css">
    <?php
        for ( $i= 0 ; $i < sizeof ($listStyles); ++$i)
        {
            $linkcss = '../../../public/assets/css/'.$listStyles[$i];
            echo '<link rel="stylesheet" href="'.$linkcss.'">';
        }

        for ($i = 0; $i < sizeof($listJS); ++$i) {
            echo '<script src="../../../public/assets/js/'.$listJS[$i].'.js" defer></script>';
        }
    ?>

    <script src="https://kit.fontawesome.com/b18ab37082.js" crossorigin="anonymous"></script>
    <script src="../../../public/assets/js/template.js" defer></script>

    <title><?= $title ?> | NoOx</title>
</head>
<body>
    <section id="logoNavContainer">
        <button id="navbarTrigger" class="buttonNavND">
            <i class="fas fa-bars"></i>
        </button>

        <!-- logo -->
        <img src="./NoOxLogo.png" id="logoTopImg" alt="NoOx logo">
    </section>

    <!-- si utilisateur connecté -->
    <section id="header" class="navND">
        <nav id="navbarContainer">

            <div id="navUser">
                <label for="navUser" class="navLabel">Utilisateur</label>

                <?php
                    if (!isset($_SESSION['id'])) {
                        echo '<a href="" class="navLink"><i class="fas fa-sign-in-alt"></i> S\'inscrire</a>';
                        echo '</div>';
                    }
                    else {
                ?>
                    <a href="" class="navLink"> <i class="far fa-user"></i> Mon profil</a>
                    <a href="" class="navLink"> <i class="fas fa-sign-out-alt"></i> Deconnexion</a>
                </div>

                <div id="navParangon">
                    <label for="navParangon" class="navLabel">Paragons</label>
                    <a href="" class="navLink"><i class="far fa-eye"></i> Mes Parangons</a>
                </div> 

                <div id="navAvatar">
                    <label for="navAvatar" class="navLabel">Avatars</label>
                    <a href="" class="navLink"><i class="far fa-eye"></i> Mes Avatars</a>
                </div>

                <div id="navScenario">
                    <label for="navScenario" class="navLabel">Scénarios</label>
                    <a href="" class="navLink"><i class="far fa-file-alt"></i> Mes scénarios</a>
                </div>
                    <?php
                        }
                    ?>

            </nav>
        <div id="footerContainer">
            2019 - NoOx
        </div>
    </section>

    <?= $content ?>

</body>
</html>
