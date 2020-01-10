<?php
    /*
        title : createCharactRaceC.php
        author : Audrey
        started-on : 19/12/2020

        brief : controller create Character page race.
    */
    require('../../model/popup/popupM.php');

    new createCharactRace();

    class createCharactRace {
        const LISTRACE = ['rogue', 'valonien', 'limien', 'chrysaor', 'incube', 'mentis', 'lictarien'];
        const LISTACCREDITATION = ['social accreditation', 'combat accreditation', 'science accreditation',
                                   'technical accreditation', 'psychurgy accreditation', 'support accreditation',
                                   'nature accreditation'];

        function __construct() {
            //Si la constitution n'a pas été renseigné

            if (!isset($_SESSION['creationCharacter']['constitutionPage'])) {
                $_SESSION['popup'] = new PopUp('error', 'RACE', 'Il faut que vous ayez renseigné votre constitution pour acceder à cette page');
                header("location:/server/controller/createCharacter/constitutionC.php");
                exit;
            }

            //selection d'une des 7 races

            if (isset($_POST['raceRadio'])) {
                if (!isset($_POST['raceRadio']) || !in_array($_POST['raceRadio'], SELF::LISTRACE)) {
                    $_SESSION['popup'] = new PopUp('error', 'RACE', 'il faut entrer une valeur de race valide.');
                    header("location:/server/controller/createCharacter/raceC.php");                    
                    exit;
                }


                // initialisation des accréditations
                for ($i = 0; $i < sizeof(SELF::LISTACCREDITATION); ++$i) {
                    $_SESSION['creationCharacter'][SELF::LISTACCREDITATION[$i]] = 0;   
                }


                $_SESSION['creationCharacter']['race'] = $_POST['raceRadio'];
                $_SESSION['creationCharacter']['racePage'] = true;
                
                if ($_POST['raceRadio'] == 'rogue') {
                    $_SESSION['creationCharacter']['agility'] += 1;
                    $_SESSION['creationCharacter']['dexterity'] += 1;
                    $_SESSION['creationCharacter']['ingenuity_char'] -= 1;
                    $_SESSION['creationCharacter']['perception_char'] += 1;
                    $_SESSION['creationCharacter']['will_char'] += 1;

                    $_SESSION['creationCharacter']['combat accreditation'] += 2;
                    $_SESSION['creationCharacter']['social accreditation'] += 1;
                }
                else if ($_POST['raceRadio'] == 'valonien') {
                    $_SESSION['creationCharacter']['charisma_char'] += 2;
                    $_SESSION['creationCharacter']['intelligence_char'] += 1;

                    $_SESSION['creationCharacter']['science accreditation'] += 1;
                    $_SESSION['creationCharacter']['social accreditation'] += 2;
                }
                else if ($_POST['raceRadio'] == 'limien') {
                    $_SESSION['creationCharacter']['strenght'] -= 1;
                    $_SESSION['creationCharacter']['dexterity'] += 2;
                    $_SESSION['creationCharacter']['endurance'] -= 2;
                    $_SESSION['creationCharacter']['charisma_char'] += 1;
                    $_SESSION['creationCharacter']['ingenuity_char'] += 2;

                    $_SESSION['creationCharacter']['technical accreditation'] += 2;
                    $_SESSION['creationCharacter']['support accreditation'] += 1;
                }
                else if ($_POST['raceRadio'] == 'chrysaor') {
                    $_SESSION['creationCharacter']['strenght'] += 2;
                    $_SESSION['creationCharacter']['metabolism'] += 1;
                    $_SESSION['creationCharacter']['endurance'] += 1;
                    $_SESSION['creationCharacter']['charisma_char'] -= 1;

                    $_SESSION['creationCharacter']['support accreditation'] += 2;

                }
                else if ($_POST['raceRadio'] == 'incube') {
                    $_SESSION['creationCharacter']['psychurgie accreditation'] += 1;
                }
                else if ($_POST['raceRadio'] == 'mentis') {
                    $_SESSION['creationCharacter']['charisma_char'] += 1;
                    $_SESSION['creationCharacter']['intelligence_char'] += 2;
                    $_SESSION['creationCharacter']['ingenuity_char'] -= 1;
                    $_SESSION['creationCharacter']['perception_char'] -= 1;
                    $_SESSION['creationCharacter']['will_char'] += 2;

                    $_SESSION['creationCharacter']['psychurgie accreditation'] += 2;

                }
                else if ($_POST['raceRadio'] == 'lictarien') {
                    $_SESSION['creationCharacter']['agility'] += 2;
                    $_SESSION['creationCharacter']['metabolism'] += 2;
                    $_SESSION['creationCharacter']['reflex'] += 1;
                    $_SESSION['creationCharacter']['charisma_char'] -= 2;
                    $_SESSION['creationCharacter']['intelligence_char'] -= 1;
                    $_SESSION['creationCharacter']['perception_char'] += 1;
                    $_SESSION['creationCharacter']['instinct_char'] += 1;

                    $_SESSION['creationCharacter']['nature accreditation'] += 2;

                }


                header("location:/server/controller/createCharacter/otherC.php");
                exit;
            
            }
            require(__DIR__.'/../../../public/view/createCharacter/createCharactRaceV.php');
        }

    }

?>
