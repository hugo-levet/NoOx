<?php

/*
    title : announceC.php
    author : Audrey
    date : 24/12/2019
    brief : announce controller

*/

require('../../model/announce/announceM.php');
require('../../model/popup/popupM.php');

$announce = new Announce();

class Announce{
    function __construct() {

        $announceList = new announceM();

        if (!isset($_GET['page']) ||$_GET['page'] == '1') {
            $start = 0;
            $page = 1;
            if (4 > sizeof($announceList->getIds())-1) {
                $end = sizeof($announceList->getIds())-1;
            } else {
                $end = 4;
            }
        } else {
            $page = $_GET['page'];

            if ($page*5-5 > sizeof($announceList->getIds())-1) {
                $_SESSION['popup'] = new PopUp('error', 'ANNONCE', 'il n\' a pas assez d\'annonces
                                                         pour accéder à cette page');
                header('location:/server/controller/announce/announceC.php?page=1');
            } else {
                $start = $page*5-5;
            }

            if ($page*5 > sizeof($announceList->getIds())-1) {
                $end = sizeof($announceList->getIds())-1;
            } else {
                $end = $page*5;
            }

        }
        require('../../../public/view/announce/announceV.php');

    }
}

