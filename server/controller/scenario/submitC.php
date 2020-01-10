<?php

/*
    title : scenarioC.php
    author : Audrey
    date : 03/01/2018
    brief : scenario controller

*/

require('../../model/scenario/scenarioM.php');
require('../../model/popup/popupM.php');

$submit = new Submit();

class Submit{

    const LISTALIGNEMENT = ['agni', 'surya', 'vayu'];
    const LISTLOCAL = ['solarus', 'avalonia', 'ur',
                       'babylonia', 'lemuria', 'mu',
                       'atlantis', 'sanctuaire', 'secret',
                       'other'];

    function __construct() {
        // get user id
        //$userID = $_SESSION['user_id'];
        $userID=1;

        // test if character belongs to the user
        if (!isset($userID)) {
            $_SESSION['popup'] = new PopUp ('error', 'Scenario', 'Il faut vous connecter pour pouvoir accéder à cette page.');
            die();//todo redirect index
        }
        if(isset($_POST['submit'])){
            if(!isset($_POST['name']) || 
               !isset($_POST['campaign']) ||
               !isset($_POST['keyword']) || 
               !isset($_POST['cycle']) ||
               !isset($_POST['description'])) {

                $_SESSION['popup']= new PopUp ('error' , 'Scenario' 'Il faut saisir toutes les champs demandés.');
                die();
            }

            if(!in_array($_POST['alignement'], SELF::LISTALIGNEMENT)) {
                $_SESSION['popup'] = new PopUp ('error', 'alignement', 'Valeur incorrecte');
                header('location:/server/scenario/submitC.php');
                exit;
            }

            if (!in_array($_POST['localisation'], SELF::LISTLOCAL)) {
                $_SESSION['popup'] = new PopUp ('error', 'localisation', 'Valeur incorrecte');
                header('location:/server/scenario/submitC.php');
                exit;
            }

            if(!isset($_POST['downloadIm'])){
                $img ='defaultimg.png';
            }
            else {
                //todo

            }

            if(!isset($_POST['dowloadPdf'])) {
                $_SESSION ['popup'] = new Popup ('error', 'Scenario', 'Il faut saisir tous les champs demandés')
            }
            else{
                //todo
            }
            $_SESSION['popup'] = new PopUp('success', 'Scenario', 'Le scénario a été renseigné avec succès';
            header("location:/server/controller/scenario/searchingC.php");
            exit;


            
        }
        
        require(__DIR__.'/../../../public/view/scenario/searchingV.php');


        
    }

}