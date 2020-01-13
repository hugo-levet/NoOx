<?php

/*
    name : homepageV.php
    author : Celia & Audrey
    started on : 07/01/2020
    brief : view hoempage

*/

    $listStyles = ['homepage.css'];
    $listJS = [];

    ob_start();
?>

<main>
<section id="homepageContainer">
    <div class="logo">
        <img src="../../public/assets/other/NoOxLogo.png" alt="logo de Noox" id="logoNoox">
    </div>
    <div class="part">
        <ul>
            <li>
               <p>
                 Ce site web est destiné à l’univers de NoOx, un jeu de rôle se déroulant
                 dans un endroit fantastique avec des personnages uniques en leur genre.
               </p> 
            </li>
            <li>
                <p>
                    Vous pouvez configurer leurs attributs tel que leur charisme afin d'être le plus beau
                    ou la plus belle dans NoOx, et aussi leur métabolisme pour devenir invincible fasse aux maladies.
                </p>
            </li>
            <li>
                <p>
                    Mais ce n'est pas tout vous pouvez aussi devenir un Dieu Sensus ou
                    une Ombre de la mort.
                </p>
            </li>
            <li>
                <p>
                    Et cela n’est qu’un avant-goût, pour pouvoir réellement
                     profiter de cet univers !
                </p>     
            </li>
        </ul>
    </div>

    <div>
        <a href="user/Login"><button type="button" class="button">Se connecter</button></a>
        <a href="user/Register"><button type="button" class="button">S'inscrire</button></a>

    </div>

</main>



<?php

    $content = ob_get_clean();
    require_once(__DIR__.'/./template.php');
?>