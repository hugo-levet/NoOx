<?php
     /*  
        title : scenarioC.php
        author : Audrey
        started-on : 03/12/2020

        brief : admin scenario controller
    */

    require(__DIR__.'/../../model/scenario/scenarioM.php');
    require_once(__DIR__.'/../../model/popup/popupM.php');

    
    class scenario {

        function __construct() {
            $userID = $_SESSION['userID'];

            $searchingList = new scenarioM('user');
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
                    $_SESSION['popup'] = new PopUp('error', 'ANNONCE', 'il n\' a pas assez de scénarios pour accéder à cette page');
                    header('location:/scenario/searching&page=1');
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

            require(__DIR__.'/../../../public/view/scenario/searchingV.php');

        }
    }
?>