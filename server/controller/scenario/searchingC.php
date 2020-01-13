<?php

/*
    title : scenarioC.php
    author : Audrey
    date : 03/01/2018
    brief : scenario controller

*/

require(__DIR__.'/../../model/scenario/scenarioM.php');
require(__DIR__.'/../../model/popup/popupM.php');


class searching{
    function __construct($url) {

        $searchingList = new scenarioM('list');

        if (!isset($_GET['page']) || $_GET['page'] == '1') {
            $start = 0;
            $page = 1;
            if (5 > sizeof($searchingList->getIds())-1) {
                $end = sizeof($searchingList->getIds())-1;
            } else {
                $end = 4;
            }
        } else {
            $page = $_GET['page'];

            if ($page*5-5 > sizeof($searchingList->getIds())-1) {
                $_SESSION['popup'] = new PopUp('error', 'ANNONCE', 'il n\' a pas assez de scénarios pour accéder à cette page');
                header('location:/scenario/searching&page=1');
                exit;
            } else {
                $start = $page*5-5;
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