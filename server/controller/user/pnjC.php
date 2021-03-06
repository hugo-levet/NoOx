<?php
     /*  
        title : pnjC.php
        author : Audrey
        started-on : 03/12/2020

        brief : user pnj controller
    */
    require(__DIR__.'/../../model/pnj/pnjM.php');
    require_once(__DIR__.'/../../model/popup/popupM.php');

    
    class pnj {

        function __construct() {
            $userID = $_SESSION['userID']; 

            $searchingList = new pnjM('user');
            if (!isset($_GET['page']) || $_GET['page'] == '1') {
                $start = 0;
                $page = 1;
                if (5 > sizeof($searchingList->getIds())-1) {
                    $end = sizeof($searchingList->getIds())-1;
                } else {
                    $end = 5;
                }
            } else {
                $page = $_GET['page'];
    
                if ($page*5-5 > sizeof($searchingList->getIds())-1) {
                    $_SESSION['popup'] = new PopUp('error', 'ANNONCE', 'il n\' a pas assez de pnjs pour accéder à cette page');
                    header('location:/pnj/searching&page=1');
                    exit;
                } else {
                    $start = $page*5-6;
                }
    
                if ($page*5 > sizeof($searchingList->getIds())-1) {
                    $end = sizeof($searchingList->getIds())-1;
                } else {
                    $end = $page*5;
                }
    
            }

            require(__DIR__.'/../../../public/view/pnj/searchingV.php');

        }
    }
?>