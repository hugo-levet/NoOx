<?php
    /*
        title : charFeatureV.php
        author : Audrey
        started on :

        brief : View page character features.
    */
 
    $listStyles = ['character/traitFP.css', 'character/templateFP.css'];
    $listJS = [];


    $listFeatures = array('FORce', 'AGIlité', 'DEXtérité',
                          'METabolisme', 'ENDurence', 'REFlexe',
                          'INStinct', 'VOLonté', 'PERception',
                          'INGéniosité', 'INTelligence', 'CHArisme');
    $listDB = ['strength', 'agility', 'dexterity', 'metabolism', 'endurance', 'reflex',
               'instinct_char','will_char','perception_char', 'ingenuity_char', 'intelligence_char', 'charisma_char'];

    ob_start();

?>

<main>
        <section id="caracteristiqueSection">
            <div id="ameTraitContainer">
                <div id="ameContainer">
                    <label for="ameContainer" class="categCaracContainer">
                            Ame
                    </label>
                        
                    <div id="ame">
                        <?php
                            for ($i = 0; $i < 7; ++$i) {
                                if ($soul >= $i) {
                                    $className = 'ameCircle SoulActive';
                                } else {
                                    $className = 'ameCircle';
                                }
                                ?>
                                <div class="<?= $className ?>" id="circle<?=$i+1;?>"></div>
                        <?php 
                            } 
                        ?>
                                  
                    </div>
                </div>
                <div id="traitsContainer">
                    <label for="traitsContainer" id="traitLabel" class="categCaracContainer">
                        Traits
                    </label>
                    <div class="trait">
                        <p class="traitCpt">
                            <?=$traitPhysic?>
                        </p>
                        <p class="traitTitle">
                            Physique
                        </p>
                    </div>
                    <div class="trait">
                        <p class="traitCpt">
                            <?=$traitMental?>
                        </p>
                        <p class="traitTitle">
                            Mental
                        </p>
                    </div>
                </div>
            </div>

            <div id="listCaracContainer">
                <div class="listCaract">
                    <p class="titleCaract">
                        Physique
                    </p>
                    <div class="tableContainer">

                        <table class="tableCaract">
                            <thead>
                                <tr>
                                    <td>
                                        Categorie
                                    </td>
                                    <td>
                                        Caractéristique
                                    </td>
                                    <td>
                                        Points
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                for ($i=0; $i<6; ++$i) {
                                    echo '<tr>';

                                    // title 3 features
                                    if ($i%3 == 0) {
                                        echo    '<td rowspan="3" class="categTD">
                                                    <img src="../../../public/assets/other/P'
                                                    .($i/3+1).'.svg" class="iconTrait" ></td>';
                                    }

                                    ?>
                                    <td>
                                        <?= $listFeatures[$i];?>
                                    </td>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="categorie" value="<?=$listDB[$i];?>">
                                            <fieldset class="rating">
                                                <?php
                                                    $titleFeature = substr($listFeatures[$i], 0, 3);



                                                    for ($j=7; $j > -1; --$j) {
                                                        if ($j >  $character->getTrait($listDB[$i]) - $malusArr[$listDB[$i]] && $j <=  $character->getTrait($listDB[$i])) {
                                                            $class = 'ratingMalus';
                                                        }
                                                        else {
                                                            $class=  '';
                                                        }
                                                        if($j == $character->getTrait($listDB[$i])) {
                                                            $checked = 'checked="checked"';
                                                        } else {
                                                            $checked = '';
                                                        }
                                                        
                                                        echo '<input type="radio" id="'.$titleFeature.$j.'" name="rating" class="rating" value="'.$j.'" '.$checked.' /><label class="'.$class.'" for="'.$titleFeature.$j.'"><i class="fas fa-circle"></i></label>';
                                                    } ?>
                                                        <?php
                                                            if ($malusArr[$listDB[$i]] != 0) {
                                                                if ($character->getTrait($listDB[$i]) - $malusArr[$listDB[$i]] < 0) {
                                                                   $color = 'malusText';
                                                                   $value = 0; 
                                                                } else {
                                                                    $color = 'malusText';
                                                                    $value = $character->getTrait($listDB[$i]) - $malusArr[$listDB[$i]];
                                                                }
                                                            } else {
                                                                $color = '';
                                                                $value = $character->getTrait($listDB[$i]);
                                                            }
                                                            
                                                        ?>
                                                    <span class="valueR <?= $color;?>">
                                                        <?=$value?>
                                                    </span>
                                            </fieldset>
                                        </form>
                                    </td>
                                </tr>


                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="listCaract">
                    <p class="titleCaract">
                        Mental
                    </p>
                    <div class="tableContainer">
                        <table class="tableCaract">
                            <thead>
                                <tr>
                                    <td>
                                        Categorie
                                    </td>
                                    <td>
                                        Caractéristique
                                    </td>
                                    <td>
                                        Points
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                for ($i=6; $i<12; ++$i) {
                                    echo '<tr>';

                                    // title 3 features
                                    if ($i%3 == 0) {
                                        echo    '<td rowspan="3" class="categTD">
                                                    <img src="../../../public/assets/other/M'
                                                    .($i/3-1).'.svg" class="iconTrait" ></td>';
                                    }
                                    ?>

                                    <td>
                                        <?= $listFeatures[$i];?>
                                    </td>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="categorie" value="<?=$listDB[$i];?>">
                                            <fieldset class="rating">

                                                <?php
                                                    $titleFeature = substr($listFeatures[$i], 0, 3);

                                                    for ($j=7; $j > -1; --$j) {
                                                        if ($j >  $character->getTrait($listDB[$i]) - $malusArr[$listDB[$i]] && $j <=  $character->getTrait($listDB[$i])) {
                                                            $class = 'ratingMalus';
                                                        }
                                                        else {
                                                            $class=  '';
                                                        }
                                                        if($j == $character->getTrait($listDB[$i])) {
                                                            $checked = 'checked="checked"';
                                                        } else {
                                                            $checked = '';
                                                        }
                                                        
                                                        echo '<input type="radio" id="'.$titleFeature.$j.'" name="rating" class="rating" value="'.$j.'" '.$checked.' /><label class="'.$class.'" for="'.$titleFeature.$j.'"><i class="fas fa-circle"></i></label>';
                                                    } ?>
                                                        <?php
                                                            if ($malusArr[$listDB[$i]] != 0) {
                                                                if ($character->getTrait($listDB[$i]) - $malusArr[$listDB[$i]] < 0) {
                                                                   $color = 'malusText';
                                                                   $value = 0; 
                                                                } else {
                                                                    $color = 'malusText';
                                                                    $value = $character->getTrait($listDB[$i]) - $malusArr[$listDB[$i]];
                                                                }
                                                            } else {
                                                                $color = '';
                                                                $value = $character->getTrait($listDB[$i]);
                                                            }
                                                            
                                                        ?>
                                                    <span class="valueR <?= $color;?>">
                                                        <?=$value?>
                                                    </span>
                                            </fieldset>
                                        </form>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>    
    </main>



<?php
    $content = ob_get_clean();
    require('templateV.php');
?>