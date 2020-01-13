<?php
    /*
        title : linkC.php
        author : Audrey
        started-on : 6/01/2020

        brief : link between pnj & scenario
    */
    require_once(__DIR__.'/../../model/pnj/pnjM.php');
    require_once( __DIR__.'/../../model/scenario/scenarioM.php');
    require_once(__DIR__.'/../../model/popup/popupM.php');


    class LinkC {

        function __construct($url) {
            // $userID = $_SESSION['user_id'];
            $userID = 1; // debug

            if (!isset($_GET['scenario']) || !is_numeric($_GET['scenario'])) {
                $_SESSION['popup'] = new PopUp('error', 'PNJ - SCENARIO', 'Le scenario n\'existe pas');
            }


            $scenario = new scenarioM([$userID, $_GET['scenario']]);

            if (sizeof($scenario->getIds()) == 0) {
                $_SESSION['popup'] = new PopUp('error', 'PNJ - SCENARIO', 'Le scenario n\'existe pas ou vous n\'êtes pas
                son propriétaire');

                header('location:/user/scenario');
                exit;
            }

            $pnjList = new pnjM('user');

            if (isset($_POST['submit'])) {

                if (!isset($_POST['PNJ'])) {
                    $listForm = [];
                } else {
                    $listForm = $_POST['PNJ'];
                }

                $scenario->deleteLinks($_GET['scenario']);
                $scenario->addLinks($_GET['scenario'], $listForm);

                $_SESSION['popup'] = new PopUp('success', 'PNJ - SCENARIO', 'Le pnj a été lié au scénario');
                header('location:/user/scenario');
                exit;
            
            }

            require_once(__DIR__.'/../../../public/view/scenario/linkV.php');
        }
    }

?>