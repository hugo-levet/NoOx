<?php
    /*  
        title : characterHomepageV.php
        author : Audrey
        started-on : 27/11/2019

        brief : view homepage character
    */
    $listStyles = ['character/homepageFP.css', 'character/templateFP.css'];
    $listJS = [];

    $listConst = ['Kapha-Pitta-Vata', 'Vata-Kapha', 'Kapha', 'Kapha-Pitta', 'Pitta', 'Pitta-Vata', 'Vata'];


    ob_start();
?>

<main>
    <div class="row">
        <section id="profileContainer">
            <label id="profileLabel" for="profileContainer" class="categLabel">PROFIL</label>
            <div id="photoContainer">
                <img src="../../../public/assets/other/<?=$character->getRace()?>.PNG" id="profileImg" alt="photo du personnage">
            </div>
            <div id="listProfile">
                <p class="profileInfo">
                    <span class="profileC">
                        Joueur : 
                    </span>
                    <span class="profileValue">

                    </span>
                </p>
                <p class="profileInfo">
                    <span class="profileC">
                        Nom : 
                    </span>
                    <span class="profileValue">
                        <?= $character->getName()?>
                    </span>
                </p>
                <div class="profileInfo">
                    <span class="profileC">
                        Alias : 
                    </span>
                    <form action="" method="post" class="profileValue">
                        <input type="hidden" name="categorie" value="alias">
                        <input class="valInput" type="text" name="valueInput" value="<?= $character->getAlias()?>"> 
                    </form>
                </div>
                <p class="profileInfo">
                    <span class="profileC">
                        Type : 
                    </span>
                    <span class="profileValue">
                        <?= $listConst[$character->getConstitution()-1]?>
                    </span>
                </p>
                <p class="profileInfo">
                    <span class="profileC">
                        Race :
                    </span>
                    <span class="profileValue">
                    <?= $character->getRace()?>
                    </span>
                </p>
                <p class="profileInfo">
                    <span class="profileC">
                        Sexe :
                    </span>
                    <span class="profileValue">
                    <?= $character->getGender()?>
                    </span>
                </p>
                <div class="profileInfo">
                    <span class="profileC">
                        Age : 
                    </span>
                    <form action="" method="post" class="profileValue">
                        <input type="hidden" name="categorie" value="years">
                        <input class="valInput" type="text" name="valueInput" value="<?= $character->getYears()?>"> 
                    </form>
                </div>
            </div>
        </section>

        <section id="physiqueContainer">
            <label for="physiqueContainer" id="physiqueLabel" class="categLabel">PHYSIQUE</label>
        
            <table id="physiqueTable">
                <tr>
                    <td class="titleTR">
                        Taille
                    </td>
                    <td class="valueTR">
                        <form action="" method="post">
                            <input type="hidden" name="categorie" value="size">
                            <input type="text" name="valueInput"  value="  <?= $character->getSize()?>"> cm
                        </form>
                    </td>
                </tr>
                <tr>
                    <td class="titleTR">
                        Corpulence
                    </td>
                    <td class="valueTR">
                        <form action="" method="post">
                            <input type="hidden" name="categorie" value="corpulence">
                            <input type="text" name="valueInput" value="<?= $character->getCorpulence()?>">kg
                        </form>
                    </td>
                </tr>
                <tr>
                    <td class="titleTR">
                        Expérience
                    </td>
                    <td class="valueTR" id="xpTR">
                        <form action="" method="post">
                            <input type="hidden" name="categorie" value="xp">
                            <input type="text" name="valueInput" value="<?= $character->getXp()?>"> /
                        </form>
                        <form action="" method="post">
                            <input type="hidden" name="categorie" value="total xp">
                            <input type="text" name="valueInput" value="<?= $character->getTotal_xp()?>">
                        </form>

                    </td>
                </tr>
                <tr>
                    <td class="titleTR">
                        Genération
                    </td>
                    <td class="valueTR">
                        <form action="" method="post">
                            <input type="hidden" name="categorie" value="generation">
                            <input type="text" name="valueInput" value="<?= $character->getGeneration()?>"> eme
                        </form>
                    </td>
                </tr>
            </table>
        </section>

        <section id="constitutionSection">
            <label for="constitutionSection" id="constitutionLabel" class="categLabel">CONSTITUTION</label>
            <div id="constitutionContainer">
                <div id="constitutionName">
                    <div id="Vata" class="constitution">
                        <p>
                            VATA
                        </p>
                    </div>
                    <div id="Kapha" class="constitution">
                        <p>
                            KAPHA
                        </p>
                    </div>
                    <div id="Pitta" class="constitution">
                        <p>
                            PITTA
                        </p>
                    </div>
                    <div id="constitution" class="constitution">
                        <?php
                            for ($i=0;$i<8;++$i){
                                if($character->getConstitution() == $i) { 
                                $active = 'constCircle active';
                            } else {$active='constCircle'; }
                        ?>  
                            <div class="<?= $active ?>" id="circle<?=$i?>"></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="row">
        <section id="socialContainer">
            <label id="socialLabel" class="categLabel" for="socialContainer">Social</label>
            <div id="socialList">
                <div class="line">
                    Reputation
                </div>
                <div class="TLine">
                    <p>
                        Publique
                    </p>
                    <form method="POST"  class="formRating">
                        <input type="hidden" name="categorie" value="public reputation">
                        <fieldset class="rating">
                            <?php
                                for ($i=7;$i>0;--$i){
                                    if($character->getPublic_reputation() == $i) { 
                                        $checked = 'checked="checked"';
                                    } else {$checked=''; }
                            ?>  
                                <input type="radio" id="PUB<?=$i?>" name="valueInput" class="rating" value="<?=$i?>" <?=$checked?> /><label for="PUB<?=$i?>"><i class="fas fa-circle"></i></label>
                            <?php } ?>
                            <span class="radioSpan">
                                <?= $character->getPublic_reputation(); ?>
                            </span>
                        </fieldset>
                    </form>
                </div>
                <div class="TLine">
                    <p>
                        Secrète
                    </p>
                    <form method="POST" class="formRating">
                        <fieldset class="rating">
                            <input type="hidden" name="categorie" value="private reputation">
                            <?php
                                for ($i=7;$i>0;--$i){
                                    if($character->getPrivate_reputation() == $i) { 
                                        $checked = 'checked="checked"';
                                    } else {$checked=''; }
                            ?>  
                                <input type="radio" id="SEC<?=$i?>" name="valueInput" class="rating" value="<?=$i?>" <?=$checked?> /><label for="SEC<?=$i?>"><i class="fas fa-circle"></i></label>
                            <?php } ?>
                            <span class="radioSpan">
                                <?= $character->getPrivate_reputation(); ?>
                            </span>
                        </fieldset>
                    </form>
                </div>
                <div class="line">
                    Niveau de vie <p>  <?= $character->getQuality_of_life()?></p>
                </div>
                <div class="line">
                    Croyance
                    <p>
                        <form action="" method="post" class="socialForm">
                            <input type="hidden" name="categorie" value="belief">
                            <input type="text" name="valueInput" class="nanitiereInput" value="<?=$character->getBelief()?>">
                        </form> 
                    </p>    
                </div>
                <div class="line">
                    Parangon
                    <form method="POST" class="formRating">
                        <input type="hidden" name="categorie" value="paragon level">
                        <fieldset class="rating">
                            <?php
                                for ($i=7;$i>0;--$i){
                                    if($character->getParagon_level() == $i) { 
                                        $checked = 'checked="checked"';
                                    } else {$checked=''; }
                            ?>  
                                <input type="radio" id="PAR<?=$i?>" name="valueInput" class="rating" value="<?=$i?>" <?=$checked?> /><label for="PAR<?=$i?>"><i class="fas fa-circle"></i></label>
                            <?php } ?>
                            <span class="radioSpan">
                                <?= $character->getParagon_level(); ?>
                            </span>
                        </fieldset>
                    </form>
                </div>
                <div class="line">
                    Dissidence
                    <form method="POST" class="formRating">
                        <fieldset class="rating">
                            <input type="hidden" name="categorie" value="dissidence">
                            <?php
                                for ($i=7;$i>0;--$i){
                                    if($character->getDissidence() == $i) { 
                                        $checked = 'checked="checked"';
                                    } else {$checked=''; }
                            ?>  
                            <input type="radio" id="DIS<?=$i?>" name="valueInput" class="rating" value="<?=$i?>" <?=$checked?> /><label for="DIS<?=$i?>"><i class="fas fa-circle"></i></label>
                            <?php } ?>
                            <span class="radioSpan">
                                <?= $character->getDissidence(); ?>
                            </span>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>

        <section id="blocnoteContainer">
            <label for="blocnoteContainer" class="categLabel">
                Notes
            </label>
            <form id="notesForm" action="" method="post">
                <input type="hidden" name="categorie" value="portrait">
                <textarea name="valueInput" id="notesTextarea" rows="10"><?=$character->getPortrait()?></textarea>
            </form>
        </section>

        <section id="signeVoieContainer">
            <div id="signeContainer">
                <label for="signeContainer" class="categLabel" id="signeLabel">Signe</label>
                <p class="signeTitle">
                    Védique
                    <span class="radioSpan signSpan">
                        <?= $character->getSign_category(); ?>
                    </span>
                </p>
                <form method="POST" class="signeRating">
                    <fieldset class="Srating">
                        <input type="hidden" name="categorie" value="sign_category">
                        <?php
                            for ($i=7;$i>0;--$i){
                                if($character->getSign_category() == $i) { 
                                    $checked = 'checked="checked"';
                                } else {$checked=''; }
                        ?>  
                        <input type="radio" id="VED<?=$i?>" name="valueInput" class="Srating" value="<?= $i?>" <?= $checked ?> /><label for="VED<?=$i?>" id="LVED<?=$i?>" class="SratLabel"><i class="fas fa-circle"></i></label>
                        <?php } ?>
                    </fieldset>
                </form>
            </div>
            <div id="voieContainer">
                <label for="voieContainer" id="signeLabel" class="categLabel">Voie</label>
                <p class="signeTitle">
                    Karmique
                    <span class="radioSpan signSpan">
                        <?= $character->getSign(); ?>
                    </span>
                </p>
                <form method="POST" class="signeRating">
                    <input type="hidden" name="categorie" value="sign">
                    <fieldset class="Srating">
                        <?php
                            for ($i=7;$i>0;--$i){
                                if($character->getSign() == $i) { 
                                    $checked = 'checked="checked"';
                                } else {$checked=''; }
                        ?>  
                        <input type="radio" id="KAR<?=$i?>" name="valueInput" class="Srating" value="<?= $i?>" <?= $checked ?> /><label for="KAR<?=$i?>" id="LKAR<?=$i?>" class="SratLabel"><i class="fas fa-circle"></i></label>
                        <?php } ?>
                    </fieldset>
                </form>
            </div>
        </section>
    </div>

    <section id="nanitiereContainer">
        <div id="LSNanitiere">
            <?php
                if ($character->getNanitiere() >= 0 && $character->getNanitiere() < 100) {
                    $class='fas fa-hand-holding-usd';
                }
                else if ($character->getNanitiere() >= 100 && $character->getNanitiere() < 200) {
                    $class = 'fas fa-coins';
                }
                else if ($character->getNanitiere() >= 200) {
                    $class = 'fas fa-money-bill-wave';
                    
                }
            ?>
            <i class="<?=$class?>"></i>
        </div>
        <div id="RSNanitiere">
            <p id="nanitiereValue">
                <form action="" method="post">
                    <input type="hidden" name="categorie" value="nanitiere">
                    <input type="text" name="valueInput" class="nanitiereInput" value="<?= $character->getNanitiere()?>"> /
                </form>
            </p>

            <p id="maxNanitiereValue">
                <form action="" method="post">
                    <input type="hidden" name="categorie" value="nanitiere_max">
                    <input type="text" name="valueInput" class="nanitiereInput" value="<?= $character->getNanitiere_max()?>"> 
                </form>
            </p>
        </div>
    </section>
</main>


<?php
    $content = ob_get_clean();

    require(__DIR__.'/templateV.php');
?>