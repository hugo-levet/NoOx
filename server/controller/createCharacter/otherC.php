<?php
    /*
        title : otherC.php
        author : Audrey
        started-on : 19/12/2020

        brief : controller create Character other race.
    */

    require(__DIR__.'/../../model/popup/popupM.php');
    require(__DIR__.'/../../model/createCharacter/createCharactM.php'); 


    class other {
        const LISTLIFEM = ['Paria', 'Xenox', 'Bas', 'Normal', 'Elevé', 'Luxueux'];
        const LISTGENDER = ['Femme', 'Homme', 'Autre'];
        const ACCESSLIST = ['combat accreditation', 'nature accreditation', 'psychurgy accreditation', 'science accreditation',
                            'social accreditation', 'support accreditation', 'technical accreditation'];
        
        function __construct($url) {

            if (!isset($_SESSION['creationCharacter']['racePage'])) {
                $_SESSION['popup'] = new PopUp('error', 'RACE', 'Il faut que vous ayez renseigné votre constitution pour acceder à cette page');
            

                header("location:/createCharacter/race");
                exit;
            }

            
            // On récupère les accreditations qqui valent 0 et 1 
            if ($_SESSION['creationCharacter']['belief'] == [1,2] || 
                $_SESSION['creationCharacter']['belief'] == [1,3] || 
                $_SESSION['creationCharacter']['belief'] == [2,3] ) {

                $listAcc0 = [];
                $listAcc1 = [];

                for ($i = 0; $i < sizeof(SELF::ACCESSLIST); ++$i) {


                    if ($_SESSION['creationCharacter'][SELF::ACCESSLIST[$i]] == 0) {
                        array_push($listAcc0, SELF::ACCESSLIST[$i]);

                    }
                    else if ($_SESSION['creationCharacter'][SELF::ACCESSLIST[$i]] == 1) {
                        array_push($listAcc1, SELF::ACCESSLIST[$i]);
                    }
                    
                }
            }


            if (isset($_POST['submit'])) {

                if (!in_array($_POST['gender'], SELF::LISTGENDER)) {
                    $_SESSION['popup'] = new PopUp('error', 'SEXE', 'Il faut entrer un sexe valide.');

                    header("location:/createCharacter/other");
                    exit;
                }

                if(!isset($_POST['age'])){
                    $_SESSION['popup'] = new PopUp('error', 'AGE', 'Il faut entrer un age.');
                    header("location:/createCharacter/other");
                }

                if ($_POST['age'] < 0 || $_POST['age'] > 100) {
                    $_SESSION['popup'] = new PopUp('error', 'AGE', 'Il faut entrer un age valide.');
                    header("location:/createCharacter/other");

    
                    exit;
                }

                if (!in_array($_POST['LevelOfLife'], SELF::LISTLIFEM )) {
                    $_SESSION['popup'] = new PopUp('error', 'NIVEAU DE VIE', 'Il faut entrer un niveau de vie valide');
                    header("location:/createCharacter/other");

            
                    exit;
                }


                $_SESSION['creationCharacter']['gender'] = $_POST['gender'];
                $_SESSION['creationCharacter']['age'] = $_POST['age'];
                $_SESSION['creationCharacter']['LevelOfLife'] = $_POST['LevelOfLife'];

                if ($_SESSION['creationCharacter']['belief'] == [1,2] || 
                    $_SESSION['creationCharacter']['belief'] == [1,3] || 
                    $_SESSION['creationCharacter']['belief'] == [2,3]  )  {
                    
                        if (!in_array($_POST['beliefChoice1'], $listAcc0)) {
                            $_SESSION['popup'] = new PopUp('error', 'Croyance', 'Il faut entrer une croyance valide');


                            header("location:/createCharacter/other");
                            exit;
                        }

                        if (sizeof($listAcc1) != 0 && !in_array($_POST['beliefChoice2'], $listAcc1)) {
                            $_SESSION['popup'] = new PopUp('error', 'Croyance', 'Il faut entrer une croyance valide');

                            header("location:/createCharacter/other");
                            exit;
                        } 


                        if(isset($_POST['beliefChoice2'])) {
                            
                            $_SESSION['creationCharacter'][$_POST['beliefChoice2']] += 1;
                        }
                        
                        $_SESSION['creationCharacter'][$_POST['beliefChoice1']] += 1;

                }

                if ($_SESSION['creationCharacter']['race'] == 'incube' ) {
                    if(!in_array($_POST['incubeChoice1'], SELF::ACCESSLIST)) {
                        $_SESSION['popup'] = new PopUp('error', 'incube', 'Il faut entrer un choix valide');

                        header("location:/createCharacter/other");
                        exit;
                    }

                    $_SESSION['creationCharacter'][$_POST['incubeChoice1']] += 1;
                }

                if ($_SESSION['creationCharacter']['belief'] == [1,2,3]) {
                    if($_POST['PKVC1'] != 'metabolism' && $_POST['PKVC1'] != 'endurance' && $_POST['PKVC1'] != 'reflex') {
                        $_SESSION['popup'] = new PopUp('error', 'PKV', 'Il faut entrer un choix valide');

                        header("location:/createCharacter/other");
                        exit;
                    }

                    if($_POST['PKVC2'] != 'instinct_char' && $_POST['PKVC2'] != 'will_char' && $_POST['PKVC2'] != 'perception_char') {
                        $_SESSION['popup'] = new PopUp('error', 'PKV', 'Il faut entrer un choix valide');

                        header("location:/createCharacter/other");
                        exit;
                    }

                    $_SESSION['creationCharacter'][$_POST['PKVC1']] = 1;
                    $_SESSION['creationCharacter'][$_POST['PKVC2']] = 2;
                }

                $belief = $_SESSION['creationCharacter']['belief'];

                if ($belief == [1]) {
                    $_SESSION['creationCharacter']['belief'] = 3;

                } else if ($belief == [2]) {
                    $_SESSION['creationCharacter']['belief'] = 5;
                } else if ($belief == [3]) {
                    $_SESSION['creationCharacter']['belief'] = 7;
                } else if ($belief == [1,2]) {
                    $_SESSION['creationCharacter']['belief'] = 4;
                }
                else if ($belief == [1,3]) {
                    $_SESSION['creationCharacter']['belief'] = 2;
                }
                else if ($belief == [2,3]) {
                    $_SESSION['creationCharacter']['belief'] = 6; 
                } else {
                    $belief = 1;
                }


                $char = new CreateChar($_SESSION['creationCharacter']);

                unset($_SESSION['creationCharacter']);
                
                header('location:/character/homepage&character='.$char->getCharId());

            }


            require(__DIR__.'/../../../public/view/createCharacter/createCharactOtherV.php');

        }

        
    }
?>