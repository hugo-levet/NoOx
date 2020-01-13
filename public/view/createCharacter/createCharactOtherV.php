<?php
/*  
    title : creareCharact.php
    author : Audrey
    started-on : 19/12/2019

    brief : view create Charact 2nd page
*/

$listStyles = ['character/createCharacter.css'] ;
$listJS =[];
ob_start();

?>

<main>
        <div id="PageTitle">
            Création du personnage
        </div>
        <form action="" id="infoForm" method="post" >
            <div class="lineForm">
                <label for="sexeInput">Choissisez votre sexe :</label>
                <select name="gender" id="sexeInput">
                    <option value="Femme">Femme</option>
                    <option value="Homme">Homme</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>

            <div class="lineForm">
                <label for="yearsInput">Choissisez votre âge :</label>
                <input type="number" name="age" id="yearsInput">
            </div>
            <div id="social">
                <label for="levelOfLifeInput">Choissisez votre niveau de vie</label>
                <select name="LevelOfLife" id="levelOfLifeInput">
                    <option value="Paria">Paria : 0 PC</option>
                    <option value="Xenos">Xenos : 2 PC</option>
                    <option value="Bas">Bas : 4 PC</option>
                    <option value="Normal">Normal : 6 PC</option>
                    <option value="Elevé">Elevé : 8 PC</option>
                    <option value="Luxueux">Luxueux : 10 PC</option>
                </select>
            </div>
        
            <?php if ($_SESSION['creationCharacter']['belief'] == [1,2,3]) { ?>
                <div id="PKVcontainer">
                    <label for="PKVChoice1">Choisissez un trait parmis cette liste</label>
                    <select name="PKVC1" id="PKVChoice1">
                        <option value="metabolism">METabolisme</option>
                        <option value="endurance">ENDurance</option>
                        <option value="reflex">REFlexe</option>
                    </select>

                    <label for="PKVChoice2">Choisissez un trait parmis cette liste</label>
                    <select name="PKVC2" id="PKVChoice2">
                        <option value="instinct_char">INStinct</option>
                        <option value="will_char">VOLonté</option>
                        <option value="perception_char">PERception</option>
                    </select>
                </div>

            <?php } ?>

            <?php if ($_SESSION['creationCharacter']['race'] == 'incube' ) {?>
                <div id="incubeContainer">
                    <label for="incubeChoice1">Choisissez votre accréditation à augmenter de +1</label>
                    <select name="incubeChoice1" id="incubeChoice1">
                        <option value="support accreditation">Soutien</option>
                        <option value="technical accreditation">Technologie</option>
                        <option value="combat accreditation">Combat</option>
                        <option value="nature accreditation">Nature</option>
                        <option value="psychurgy accreditation">Psychurgie</option>
                        <option value="science accreditation">Sciences</option>
                        <option value="social accreditation">Social</option>
                    </select>
                </div>
            <?php } ?>

            <?php  if ($_SESSION['creationCharacter']['belief'] == [1,2] || 
                       $_SESSION['creationCharacter']['belief'] == [1,3] || 
                       $_SESSION['creationCharacter']['belief'] == [2,3] ) {
            ?>
                <div id="beliefContainer">
                    <label for="beliefChoice1">Choisissez une compétence à élever à 1</label>
                    <select name="beliefChoice1" id="beliefChoice1">
                        <?php for($i = 0; $i < sizeof($listAcc0); ++$i) {?>
                            <option value="<?=$listAcc0[$i]?>"><?=$listAcc0[$i]?></option>
                        <?php } ?>
                    </select>


                    <?php  if (sizeof($listAcc1) != 0 ) {?> 
                        <label for="beliefChoice2">Choisissez une compétence à élever à 2</label>
                        <select name="beliefChoice2" id="beliefChoice2">
                            <?php for($i = 0; $i < sizeof($listAcc1); ++$i) {?>
                                <option value="<?=$listAcc1[$i]?>"><?=$listAcc1[$i]?></option>
                            <?php } ?>
                        </select>
                    <?php } ?>
                </div>
            <?php } ?>

            <button id="arrow" type="submit" name="submit">
                    <i class="fas fa-arrow-right arrowR"></i>
            </button>

        </form>
    </main>
<?php
    $content=ob_get_clean();
    require(__DIR__.'/../template.php')
?>