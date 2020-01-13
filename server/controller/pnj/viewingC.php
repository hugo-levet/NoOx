<?php
    /*
        title : viewingC.php
        author : Audrey
        started-on : 3/01/2020

        brief : controller pnj viewing
    */  


    require(__DIR__.'/../../model/pnj/pnjM.php');
    require(__DIR__.'/../../model/popup/popupM.php');


    class viewing {
        function __construct($url) {

            // $userID = $_SESSION['userID']
            $userID = 102;

            if (!isset($_GET['pnj']) || !is_numeric($_GET['pnj'])) {
                echo 'pnj introuvable';
                die();
            }
    
            $viewingList = new pnjM($_GET['pnj']);
    
    
            if (sizeof($viewingList->getIds()) == 0) {
                $_SESSION['popup'] = new PopUp('error', 'PNJ', 'Le pnj n\'existe pas ou n\'a pas encore été validé.');
                header('location:/pnj/searchingC.php');
                exit;    
            }
    
            if (isset($_POST['submit'])) {
                if (!isset($_POST["message"])) {
                    $_SESSION['popup'] = new PopUp('error', 'message', 'Vous devez saisir un message');
                    header('location:/pnj/viewing&pnj='.$_GET['pnj']);
                    exit;
                }

                if(!isset($_POST['rating']) || $_POST['rating'] < 1 || $_POST['rating'] > 5) {
                    $_SESSION['popup'] = new PopUp('error', 'note', 'Vous devez saisir une note valide');
                    header('location:/pnj/viewing&pnj='.$_GET['pnj']);
                    exit;
                }

                if (!($viewingList->getComs()->setGrade($_GET['pnj'], $userID, $_POST['message'], $_POST['rating']))) {
                    $_SESSION['popup'] = new PopUp('error', 'Commentaire', 'Vous ne pouvez pas publier plusieurs commentaires');
                    header('location:/pnj/viewing&pnj='.$_GET['pnj']);
                    exit;
                } 

                $_SESSION['popup'] = new PopUp('success', 'Commentaire', 'Votre commentaire a bien été pris en compte');

                header('location:/pnj/viewing&pnj='.$_GET['pnj']);
                exit;
            }
    
            require(__DIR__.'/../../../public/view/pnj/viewingV.php');
        }
    }

?>