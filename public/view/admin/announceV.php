<?php

    /*  
        title : scenarioV.php
        author : Audrey
        started-on : 03/12/2020

        brief : admin scenario view
    */

    $listStyles = ['admin/announce.css']; 
    $listJS= [];
    ob_start();
?>

<main>
    <p id="pageTitle">
        NOUVELLE ANNONCE
    </p>
    <div id="announceCreationContainer">
        <form action="" method="post">
            <label for="titleInput" class="inputLabel">Titre</label>
            <input type="text" name="title" id="titleInput">

            <label for="descriptionInput" class="inputLabel">Message</label>
            <textarea name="description" id="descriptionInput" cols="30" rows="10"></textarea>
            <button type="submit" name="submit" class="submitButton">Envoyer</button>
        </form>
    </div>
</main>


<?php 
    $content = ob_get_clean();
    require(__DIR__.'/../template.php') 
?>