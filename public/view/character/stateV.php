<?php
    /*
        title : stateV.php
        author : Audrey
        started on : 

        brief : view state page
    */

    $listStyles = ['character/stateFP.css', 'character/templateFP.css'];
    $listJS = [];

    ob_start();
?>



    <main>
        <div class="listStats">
            <p class="titleStats">
                États
            </p>
            <div class="tableContainer">
                <table class="tableCaract">
                    <thead>
                        <tr>
                            <td>
                                Nom
                            </td>
                            <td>
                                Cible
                            </td>
                            <td class="pointTDC">
                                <span class="pointTD">∅</span>
                                <span class="pointTD">NA</span>
                                <span class="pointTD">-1D8</span>
                                <span class="pointTD">|+0/+1|</span>
                                <span class="pointTD">INC.</span>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i=0; $i< sizeof(SELF::STATESLIST); ++$i) { ?>
                            <tr>
                                <td>
                                    <?= SELF::STATESNAME[$i];?>
                                </td>
                                <td>
                                    <img src="../../../public/assets/other/<?=SELF::STATEICONS[$i][0]?>.svg" class="statIcon" alt="icon stat">
                                    <img src="../../../public/assets/other/<?=SELF::STATEICONS[$i][1]?>.svg" class="statIcon" alt="icon stat">
                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="categorie" value="<?= SELF::STATESLIST[$i]?>">
                                        <fieldset class="rating">
                                            <?php
                                                $titleFeature = substr(SELF::STATESNAME[$i], 0, 3);
                                                $valueState = $character->getState(SELF::STATESLIST[$i]);
                                                for ($j = 4; $j >= 0; --$j) {
                                                    if ($valueState == $j) {
                                                        $checked = 'checked="checked"';
                                                    } else {
                                                        $checked = '';
                                                }
                                            ?>
                                            <input type="radio" id="<?=$titleFeature?><?=$j?>" name="valueInput" <?=$checked?> class="rating" value="<?=$j?>"><label for="<?=$titleFeature?><?=$j?>"><i class="fas fa-circle"></i></label>
                                            <?php } ?>
                                        </fieldset>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="listContainer">
            <?php 
                for ($i = 0; $i < sizeof(SELF::STATESLIST); ++$i) {
                
                    if ($character->getState(SELF::STATESLIST[$i]) > 0) {    
            ?>
                <p class="stateEffect">
                        <b><?= SELF::STATESNAME[$i]?></b>
                        <?php for ($j = 0; $j < sizeof(SELF::STATETOTRAITS[SELF::STATESLIST[$i]]); ++$j) {?>
                            -1 <?= SELF::TRAITSNAME[SELF::STATETOTRAITS[SELF::STATESLIST[$i]][$j]]?>;
                            
                        <?php } ?>
                </p>
                <?php } ?>
            <?php } ?>
        </div>

    </main>
<?php
    $content = ob_get_clean();
    require('templateV.php');
?>  

