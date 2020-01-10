<?php

/*
    title : scenarioC.php
    author : Audrey
    date : 03/01/2018
    brief : scenario controller

*/

require('../../model/scenario/scenarioM.php');
require('../../model/popup/popupM.php');

$searching = new Searching();

class Searching{
    function __construct() {

        $searchingList = new scenarioM();

        if (!isset($_GET['page']) ||$_GET['page'] == '1') {
            $start = 0;
            $page = 1;
            if (4 > sizeof($searchingList->getIds())-1) {
                $end = sizeof($searchingList->getIds())-1;
            } else {
                $end = 4;
            }
        } else {
            $page = $_GET['page'];

            if ($page*5-5 > sizeof($searchingList->getIds())-1) {
                $_SESSION['popup'] = new PopUp('error', 'ANNONCE', 'il n\' a pas assez de scénarios pour accéder à cette page');
                header('location:/server/controller/scenario/searchingC.php?page=1');
            } else {
                $start = $page*5-5;
            }

            if ($page*5 > sizeof($searchingList->getIds())-1) {
                $end = sizeof($searchingList->getIds())-1;
            } else {
                $end = $page*5;
            }

        }
        require('../../../public/view/scenario/searchingV.php');

    }
}