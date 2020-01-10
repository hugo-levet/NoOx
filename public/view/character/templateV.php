<?php
/*
    title : charTemplateV
    author : Audrey
    started on :

    brief : view template part character

*/

include (__DIR__.'/../popup/popupV.php');

array_push($listStyles, 'popup/popup.css');
array_push($listJS, 'character/character.js');
array_push($listJS, 'popup/popup.js');
?>


<div id="informationsBannerContainer">
    <span>
        <b>Nom : </b><?= $character->getName()?>  
    </span>
    <span>
        <b>Race : </b><?= $character->getRace()?>  
    </span>
    <span>
        <b>Sexe : </b><?= $character->getGender()?>
    </span>
</div>

<?=$content ?>


<section id="navbarFPContainer">
    <nav id="charNavbar">
        <a class="charNavLink" href="/server/controller/character/homepageC.php?character=<?=$charID?>">
            <i class="far fa-address-card"></i>
            <p class="linkText">General</p>
        </a>
        <a class="charNavLink" href="/server/controller/character/traitC.php?character=<?=$charID?>">
            <i class="fas fa-users"></i>
            <p class="linkText">Traits</p>
        </a>
        <a class="charNavLink" href="/server/controller/character/accessC.php?character=<?=$charID?>">
            <i class="fas fa-brain"></i>
            <p class="linkText">Accreditation</p>
        </a>
        <a class="charNavLink" href="/server/controller/character/stateC.php?character=<?=$charID?>">
            <p id="etatIcon">
                <i class="far fa-smile-beam"></i>
                <i class="far fa-dizzy"></i>
                <i class="far fa-angry"></i>
                <i class="far fa-flushed"></i>
            </p>
            <p class="linkText">États</p>    
        </a>
    </nav>
</section>

<?php
    $content = ob_get_clean();
    require(__DIR__.'/../template.php');
?>