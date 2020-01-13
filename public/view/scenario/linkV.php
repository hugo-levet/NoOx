<?php
    /*
        title : linkV.php
        author : Audrey
        started-on : 6/01/2020

        brief : view link
    */

    $listStyles = ['scenario/link.css'];
    $listJS = [];
    ob_start();

?>

<main>
    <div id="scenarioContainer">

    </div>

    <div id="listPNJ">
        <form action="" method="post">
            <?php for ($i = 0; $i < sizeof($pnjList->getIds()); ++$i) {?>
                <div class="pnj">
                    <input type="checkbox" name="PNJ[]" class="PNJCheckbox" value="<?=$pnjList->getId($i)?>" id="PNJ<?=$i?>">
                    <label class="PNJLabel" for="PNJ<?=$i?>">
                        <p>
                            <?=$pnjList->getName($i)?>
                        </p>
                        <p>
                            <a class="linkPDF" target="_blank" href="../../../public/assets/other/upload/<?=$pnjList->getDocument($i)?>">
                                PDF Explicatif
                            </a>
                        </p>
                    </label>
                </div>
            <?php } ?>

            <button type="submit" name="submit" class="submitButton">
                Lier les pnjs au scénario
            </button>
        </form>
    </div>
</main>

<?php
    $content = ob_get_clean();
    require(__DIR__.'/../template.php');
?>