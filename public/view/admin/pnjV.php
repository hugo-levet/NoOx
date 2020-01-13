<?php

    /*  
        title : pnjV.php
        author : Audrey
        started-on : 03/12/2020

        brief : admin pnj view
    */

    $listStyles = ['admin/pnj.css']; 
    $listJS= [];
    ob_start();
?>

<main>
    <?php for ($i = 0; $i < sizeof($listPNJ->getIds()); ++$i) { ?>
        <div class="pnj">
            <p>
                <?= $listPNJ->getName($i);?>
            </p>
            <p>
                <a  class="pdfLink" href="/public/assets/other/upload/<?=$listPNJ->getDocument($i)?>">Lien vers le pdf</a>
            </p>

            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $listPNJ->getId($i) ?>">
                <button type="submit" class="submit accept" name="accept">Accepter</button>
                <button type="submit" class="submit decline" name="decline">Refuser</button>
            </form>
        </div>
        
    <?php   }    ?>
    <p id="endResult">
        - Fin des résultats - 
    </p>

</main>


<?php 
    $content = ob_get_clean();
    require(__DIR__.'/../template.php') 
?>