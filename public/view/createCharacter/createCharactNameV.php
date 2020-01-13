<?php
/*  
    title : creareCharactNameV.php
    author : Audrey
    started-on : 19/12/2019

    brief : view create Charact 1st page
*/

$listStyles = ['character/createCharacter.css'] ;
$listJS =['character/createChar.js'];
ob_start();

?>
<main>
    <div id="PageTitle">
        Création du personnage
    </div>
    <form action="" id="infoForm" method="post" >
        <div class="lineForm">
            <label for="nameInput">Choissisez votre nom/alias :</label>
            <input type="text" name="name" id="nameInput" placeholder="Votre nom">   
        </div>
        <button type="submit" id="arrow">
            <i class="fas fa-arrow-right arrowR"></i>
        </button>
    </form>
</main>
<?php
    $content = ob_get_clean();
    require(__DIR__.'/../template.php') 
 ?>