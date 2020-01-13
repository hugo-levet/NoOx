<?php
     /*  
        title : scenarioC.php
        author : Audrey
        started-on : 03/12/2020

        brief : admin scenario controller
    */

    require(__DIR__.'/../../model/scenario/scenarioM.php');
    require_once(__DIR__.'/../../model/popup/popupM.php');


    class scenario{

        function __construct($url) {
            $listScenario = new scenarioM('admin');

            if (isset($_POST['accept'])) {
                $ArrIds = $listScenario->getIds();


                if (!isset($_POST['id'])) {
                    $_SESSION['popup'] = new PopUp('error', 'refus d\'un scénario', 'erreur identifiant');
                    header('location:/admin/scenario');
                    exit;
                }

                if (!in_array($_POST['id'], $ArrIds)) {
                    $_SESSION['popup'] = new PopUp('error', 'validation d\'un scénario', 'l\'identifiant du scénario que vous voulez valider n\'existe pas');
                    header('location:/admin/scenario');
                    exit;
                }

                $listScenario->setValidation($_POST['id']);

                $_SESSION['popup'] = new PopUp('success', 'validation d\'un scénario', 'Vous venez de valider le scénario !');
                header('location:/admin/scenario');
                exit;
            }



            // die();
            if (isset($_POST['decline'])) {
                if (!isset($_POST['id'])) {
                    $_SESSION['popup'] = new PopUp('error', 'refus d\'un scénario', 'erreur identifiant');
                    header('location:/admin/scenario');
                    exit;
                }
                
                if (!in_array($_POST['id'], $listScenario->getIds())) {
                    $_SESSION['popup'] = new PopUp('error', 'refus d\'un scénario', 'l\'identifiant du scénario que vous voulez refuser n\'existe pas');
                    header('location:/admin/scenario');
                    exit;
                }
                

                unlink(__DIR__.'/../../../public/assets/other/upload/'.$listScenario->getDocument(array_search($_POST['id'], $listScenario->getIds())));
                unlink(__DIR__.'/../../../public/assets/other/upload/'.$listScenario->getImage(array_search($_POST['id'], $listScenario->getIds())));

                $listScenario->setDecline($_POST['id']);

                $_SESSION['popup'] = new PopUp('success', 'Refus d\'un scénario', 'Vous venez de refuser le scénario !');
                header('location:/admin/scenario');
                exit;
            }

            require(__DIR__.'/../../../public/view/admin/scenarioV.php');
        }

    }
?>