<?php
/*
    title : template.php
    author : Audrey
    started on : 20/11
    brief : template du site 
*/
// session_start();

include (__DIR__.'/popup/popupV.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../../../public/assets/css/templateG.css">
    <link rel="stylesheet" href="../../../public/assets/css/popup/popup.css">

    <?php
        for ( $i= 0 ; $i < sizeof ($listStyles); ++$i)
        {
            $linkcss = '../../../public/assets/css/'.$listStyles[$i];
            echo '<link rel="stylesheet" href="'.$linkcss.'">';
        }

        for ($i = 0; $i < sizeof($listJS); ++$i) {
            echo '<script src="../../../public/assets/js/'.$listJS[$i].'" defer></script>';
        }
    ?>

    <script src="https://kit.fontawesome.com/b18ab37082.js" crossorigin="anonymous"></script>
    <script src="../../../public/assets/js/template.js" defer></script>
    <script src="../../../public/assets/js/popup/popup.js" defer></script>


    <title><?= $title ?> | NoOx</title>
</head>
<body>
    <section id="logoNavContainer">
        <button id="navbarTrigger" class="buttonNavND">
            <i class="fas fa-bars"></i>
        </button>

        <!-- logo -->
        <img src="../../../public/assets/other/NoOxLogo.png" id="logoTopImg" alt="NoOx logo">
    </section>

    <!-- si utilisateur connecté -->
    <section id="header" class="navND">
        <nav id="navbarContainer">

            <div id="navUser">
                <label for="navUser" class="navLabel">Utilisateur</label>

                <?php
                    if (!isset($_SESSION['userID'])) {
                        echo '<a href="/user/register" class="navLink"><i class="fas fa-user-plus"></i> S\'inscrire</a>';
                        echo '<a href="/user/login" class="navLink"><i class="fas fa-sign-in-alt"></i> Se connecter </a>';
                        echo '</div>';
                    }
                    else {
                ?>
                    <a href="/user/profile" class="navLink"> <i class="far fa-user"></i> Mon profil</a>
                    <a href="/user/logout" class="navLink"> <i class="fas fa-sign-out-alt"></i> Deconnexion</a>
                </div>

                <div id="navParangon">
                    <label for="navParangon" class="navLabel">Personnages</label>
                    <a href="/user/character" class="navLink"><i class="far fa-eye"></i> Mes personnages</a>
                </div> 
                <div id="navAvatar">
                    <label for="navAvatar" class="navLabel">PNJ</label>
                    <a href="/user/pnj" class="navLink"><i class="far fa-eye"></i> Mes PNJS</a>
                    <a href="/pnj/searching" class="navLink"><i class="far fa-eye"></i> Parcourir les PNJS</a>
                </div>

                <div id="navScenario">
                    <label for="navScenario" class="navLabel">Scénarios</label>
                    <a href="/user/scenario" class="navLink"><i class="far fa-file-alt"></i> Mes scénarios</a>
                    <a href="/scenario/searching" class="navLink"><i class="far fa-file-alt"></i> Parcourir les scénarios</a>
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