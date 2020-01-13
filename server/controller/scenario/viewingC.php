<?php
    /*
        title : viewingC.php
        author : Audrey
        started-on : 3/01/2020

        brief : controller scenario viewing
    */  


    require(__DIR__.'/../../model/scenario/scenarioM.php');
    require_once(__DIR__.'/../../model/popup/popupM.php');

    class viewing {
        function __construct($url) {
            $userID = $_SESSION['userID'];
            
            
            if (!isset($_GET['scenario']) || !is_numeric($_GET['scenario'])) {
                $_SESSION['popup'] = new PopUp('error', 'SCENARIO', 'Le scénario n\'existe pas ou n\'a pas encore été validé.');
                header('location:/scenario/searching');
            }
    
            $viewingList = new scenarioM($_GET['scenario']);
    
    
            if (sizeof($viewingList->getIds()) == 0) {
                $_SESSION['popup'] = new PopUp('error', 'SCENARIO', 'Le scénario n\'existe pas ou n\'a pas encore été validé.');
                header('location:/scenario/searching');
                exit;   
            }
    
            if (isset($_POST['submit'])) {
                if (!isset($_POST["message"])) {
                    $_SESSION['popup'] = new PopUp('error', 'message', 'Vous devez saisir un message');
                    header('location:/scenario/viewing&scenario='.$_GET['scenario']);
                    exit;
                }

                if(!isset($_POST['rating']) || $_POST['rating'] < 1 || $_POST['rating'] > 5) {
                    $_SESSION['popup'] = new PopUp('error', 'note', 'Vous devez saisir une note valide');
                    header('location:/scenario/viewing&scenario='.$_GET['scenario']);
                    exit;
                }

                if (!($viewingList->getComs()->setGrade($_GET['scenario'], $userID, $_POST['message'], $_POST['rating']))) {
                    $_SESSION['popup'] = new PopUp('error', 'Commentaire', 'Vous ne pouvez pas publier plusieurs commentaires');
                    header('location:/scenario/viewing&scenario='.$_GET['scenario']);
                    exit;
                } 

                $_SESSION['popup'] = new PopUp('success', 'Commentaire', 'Votre commentaire a bien été pris en compte');

                header('location:/scenario/viewing&scenario='.$_GET['scenario']);
                exit;
            }
    
            require(__DIR__.'/../../../public/view/scenario/viewingV.php');
        }
    }

?>