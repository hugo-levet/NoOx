<?php
/*
    title : accessC.php
    author : Audrey
    started on :

    brief : Controller access character 
*/

require(__DIR__.'/../../model/character/characterM.php');
require(__DIR__.'/../../model/popup/popupM.php');


class access {
    const ACCESSLIST = ['combat accreditation', 'nature accreditation', 'psychurgy accreditation', 'science accreditation',
                       'social accreditation', 'support accreditation', 'technical accreditation'];

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
        //$userID = $_SESSION['user_id'];
        $userID=1;


        // test if character belongs to the user
        if ($userID != $character->getUserId()) {
            $_SESSION['popup'] = new PopUp ('error', 'Personnage', 'Désolé, le personnage recherché ne vous appartient pas.');
            die();//todo redirect index
        }

        if (isset($_POST['categorie'])) {
            if (!in_array($_POST['categorie'], SELF::ACCESSLIST)) {
                $_SESSION['popup'] = new PopUp('error', $_POST['categorie'], 'Catégorie ou valeur non modifiable');
            
            } else {
                
                $character->setAccess($_POST['categorie'], $_POST['valueInput']);



            }

            header("location:/character/access&character=$charID");
            exit;
        }
        
        // include la vue
        require(__DIR__.'/../../../public/view/character/accessV.php');
    }
}