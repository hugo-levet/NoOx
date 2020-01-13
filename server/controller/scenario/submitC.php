<?php

/*
    title : scenarioC.php
    author : Audrey
    date : 03/01/2018
    brief : scenario controller

*/

require(__DIR__.'/../../model/scenario/insertScenarioM.php');
require_once(__DIR__.'/../../model/popup/popupM.php');


class submit{

    const LISTALIGNEMENT = ['agni', 'surya', 'vayu'];
    const LISTLOCAL = ['solarus', 'avalonia', 'ur',
                       'babylonia', 'lemuria', 'mu',
                       'atlantis', 'sanctuaire', 'secret', 'columbia',
                       'other'];

    function __construct($url) {
        // get user id
        //$userID = $_SESSION['user_id'];
        $userID=1;

        // test if character belongs to the user
        if (!isset($userID)) {
            $_SESSION['popup'] = new PopUp ('error', 'Scenario', 'Il faut vous connecter pour pouvoir accéder à cette page.');
            header('location:/homepage');
            exit;
        }
        if(isset($_POST['submit'])){
            if(!isset($_POST['name']) || 
               !isset($_POST['campaign']) ||
               !isset($_POST['keyword']) || 
               !isset($_POST['cycle']) ||
               !isset($_POST['description'])) {

                $_SESSION['popup']= new PopUp ('error' , 'Scenario', 'Il faut saisir toutes les champs demandés.');
                header('location:/scenario/submit');
                exit;
            }

            if(!in_array($_POST['alignement'], SELF::LISTALIGNEMENT)) {
                $_SESSION['popup'] = new PopUp ('error', 'alignement', 'Valeur incorrecte');
                header('location:/scenario/submit');
                exit;
            }

            if (!in_array($_POST['localisation'], SELF::LISTLOCAL)) {
                $_SESSION['popup'] = new PopUp ('error', 'localisation', 'Valeur incorrecte');
                header('location:/scenario/submit');
                exit;
            }


            if(!strlen($_FILES['downloadImg']['name'])){
                $_SESSION['imgFile'] ='des.png';
            }
            else {
                $file = $_FILES['downloadImg'];
                $legalExtension = ['PNG', 'png'];
                
                if (!$this->uploadFile($file, $legalExtension, 'imgFile')) {
                    $_SESSION ['popup'] = new Popup ('error', 'SCENARIO', 'il faut fournir un fichier png valide !');
                    header("location:/scenario/submit");
                    exit;
                }
            }




            if(!isset($_FILES['downloadPdf'])) {
                $_SESSION ['popup'] = new Popup ('error', 'Scenario', 'Il faut saisir tous les champs demandés');
                header("location:/scenario/submit");
                exit;
                
            }
            else{
                $file = $_FILES['downloadPdf'];
                $legalExtension = ['PDF', 'pdf'];
                if(!$this->uploadFile($file, $legalExtension, 'pdfFile')) {
                    $_SESSION ['popup'] = new Popup ('error', 'SCENARIO', 'il faut fournir un fichier pdf valide !');
                    header("location:/scenario/submit");
                    exit;
                }

            }

            // bdd insert
            $document = $_SESSION['pdfFile'];
            $name = $_POST['name'];
            $cycle = $_POST['cycle'];
            $location = $_POST['localisation'];
            $description = $_POST['description'];
            $description = htmlspecialchars($description);
            $imageName = $_SESSION['imgFile'];

            unset($_SESSION['pdfFile']);
            unset($_SESSION['imgFile']);
            $request = "INSERT INTO scenario (`user_id`, document, `name`, cycle, `location`, `description`, imageName) VALUES 
                                              ($userID, '$document', '$name', '$cycle', '$location', '$description', '$imageName')";

            $request = new createScenarioM($request);
            $_SESSION['popup'] = new PopUp('success', 'Scenario', 'Le scénario a été renseigné avec succès');
            header("location:/scenario/viewing&scenario=".$request->getIdInsert());
            
            exit;
            
        }
        
        require(__DIR__.'/../../../public/view/scenario/submitV.php');
    }


    protected function uploadFile ($file, $extensionsAutho, $sessionName) {
        // Varibale d'erreur par soucis de lisibilité
        // Evite d'imbriquer trop de if/else, on pourrait aisément s'en passer

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $newName = substr(str_shuffle($permitted_chars), 0, 20);
        $path = __DIR__."/../../../public/assets/other/upload";
        $legalSize = "5000000";

        // On récupères les infos
        $actualName = $file['tmp_name'];
        $actualSize = $file['size'];
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);



        // On s'assure que le fichier n'est pas vide
        if (strlen($actualName) == 0 || $actualSize == 0) {
            return false;
        }

        // On vérifie qu'un fichier portant le même nom n'est pas présent sur le serveur
        if (file_exists($path.'/'.$newName.'.'.$extension)) {
            return false;
        }

        // On effectue nos vérifications réglementaires
        if (!$error) {
            if ($actualSize < $legalSize) {
                if (in_array($extension, $extensionsAutho)) {
                    move_uploaded_file($actualName, $path.'/'.$newName.'.'.$extension);
                    $_SESSION[$sessionName] = $newName.'.'.$extension;
                    return true;
                }
            
                return false;
            }

            return false;
        }
        else {
            
            // On supprime le fichier du serveur
            @unlink($path.'/'.$newName.'.'.$extension);
            return false;            
        }


    }

}