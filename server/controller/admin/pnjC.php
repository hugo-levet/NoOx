<?php
     /*  
        title : scenarioC.php
        author : Audrey
        started-on : 03/12/2020

        brief : admin scenario controller
    */

    require(__DIR__.'/../../model/pnj/pnjM.php');
    require(__DIR__.'/../../model/popup/popupM.php');


    class pnj{

        function __construct($url) {
            $listPNJ = new pnjM('admin');

            if (isset($_POST['accept'])) {
                $ArrIds = $listPNJ->getIds();


                if (!isset($_POST['id'])) {
                    $_SESSION['popup'] = new PopUp('error', 'refus d\'un pnj', 'erreur identifiant');
                    header('location:/admin/pnj');
                    exit;
                }

                if (!in_array($_POST['id'], $ArrIds)) {
                    $_SESSION['popup'] = new PopUp('error', 'validation d\'un pnj', 'l\'identifiant du pnj que vous voulez valider n\'existe pas');
                    header('location:/admin/pnj');
                    exit;
                }

                $listPNJ->setValidation($_POST['id']);

                $_SESSION['popup'] = new PopUp('success', 'validation d\'un pnj', 'Vous venez de valider le pnj !');
                header('location:/admin/pnj');
                exit;
            }



            // die();
            if (isset($_POST['decline'])) {
                if (!isset($_POST['id'])) {
                    $_SESSION['popup'] = new PopUp('error', 'refus d\'un pnj', 'erreur identifiant');
                    header('location:/admin/pnj');
                    exit;
                }
                
                if (!in_array($_POST['id'], $listPNJ->getIds())) {
                    $_SESSION['popup'] = new PopUp('error', 'refus d\'un pnj', 'l\'identifiant du pnj que vous voulez refuser n\'existe pas');
                    header('location:/admin/pnj');
                    exit;
                }
                

                unlink(__DIR__.'/../../../public/assets/other/upload/'.$listPNJ->getDocument(array_search($_POST['id'], $listPNJ->getIds())));
                unlink(__DIR__.'/../../../public/assets/other/upload/'.$listPNJ->getImage(array_search($_POST['id'], $listPNJ->getIds())));

                $listPNJ->setDecline($_POST['id']);

                $_SESSION['popup'] = new PopUp('success', 'Refus d\'un pnj', 'Vous venez de refuser le pnj !');
                header('location:/admin/pnj');
                exit;
            }

            require(__DIR__.'/../../../public/view/admin/pnjV.php');
        }

    }
?>