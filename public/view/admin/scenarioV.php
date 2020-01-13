<?php

    /*  
        title : scenarioV.php
        author : Audrey
        started-on : 03/12/2020

        brief : admin scenario view
    */

    $listStyles = ['admin/scenario.css']; 
    $listJS= [];
    ob_start();
?>

<main>
    <?php for ($i = 0; $i < sizeof($listScenario->getIds()); ++$i) { ?>
        <div class="scenario">
            <p>
                <?= $listScenario->getName($i);?>
            </p>
            <p>
                <a  class="pdfLink" href="/public/assets/other/upload/<?=$listScenario->getDocument($i)?>">Lien vers le pdf</a>
            </p>

            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $listScenario->getId($i) ?>">
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