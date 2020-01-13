<?php
    /*
        title : homepageC.php
        author : Audrey
        started on :

        brief : Controller homepage character
    */
require_once(__DIR__.'/../../model/character/characterM.php');
require_once(__DIR__.'/../../model/popup/popupM.php');


class homepage  {
    function __construct($url) {
        if (!isset($_REQUEST['character'])) {
            $_SESSION['popup'] = new PopUp ('error', 'Personnage', 'Nous ne pouvez pas accéder à cette page de cette manière.');
            die();//todo : redirect index
        }

        // get character informations
        $charID = $_REQUEST['character'];
        $character = new CharacterM($charID);


        if(!isset($character)) {               
            $_SESSION['popup'] = new PopUp ('error', 'Personnage', 'Désolé, le personnage recherché n\'existe pas.');
            die();//todo redirect index
        }


        // get user id
        $userID = $_SESSION['userID'];


        // test if character belongs to the user
        if ($userID != $character->getUserId()) {
            $_SESSION['popup'] = new PopUp ('error', 'Personnage', 'Désolé, le personnage recherché ne vous appartient pas.');
            die();//todo redirect index
        }

        if (isset($_POST['categorie'])) {
            $listSubject = array('size', 'corpulence', 'xp', 'total xp', 'sign_category', 'sign', 'generation', 'portrait', 'public reputation', 'private reputation',
                                    'paragon level', 'dissidence', 'quality of life', 'nanitiere', 'nanitiere_max', 'belief', 'years', 'alias');
            $categorie = $_POST['categorie'];
    
            if (!in_array($categorie, $listSubject) || !isset($_POST['valueInput'])) {
                $_SESSION['popup'] = new PopUp('error', $_POST['categorie'], 'Catégorie ou valeur non modifiable');
            } else {
                $fncName = ucfirst($categorie);
                $fncName = str_replace(' ', '_', $fncName);
                $fncName = 'set'.$fncName;
            


                $character->$fncName($_POST['valueInput']);
            }
            
            header("location:/character/homepage&character=$charID");
            exit;
        }
    
        require_once(__DIR__.'/../../../public/view/character/homepageV.php');
    }
} 

