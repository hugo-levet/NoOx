<?php
    /*
        title : nameC.php
        author : Audrey
        started-on : 19/12/2019

        brief : 1rst page of Character Creation controller
    */
require('../../model/popup/popupM.php');


new CreateCharactName();

class CreateCharactName {
    
    function __construct() {
        unset($_SESSION['creationCharacter']);

        // savoir si l'utilisateur est connecté
        $userID = 1;

        // si form submit
        if (isset($_POST['name'])) {
            
            if (!isset($_POST['name']) || strlen($_POST['name']) == 0 ) {
                $_SESSION['popup'] = new PopUp('error', 'NOM', 'Le champ Nom doit être complété et sa taille ne doit pas être nulle');

                // redirection vers la page name
                header("location:/server/controller/createCharacter/nameC.php");
                exit;
            } 
            
            $_SESSION['creationCharacter']['name'] = $_POST['name'];
            $_SESSION['creationCharacter']['namePage'] = true;
            
            $_SESSION['popup'] = new PopUp('success', 'NOM', 'Le nom a été renseigné avec succès : '+$_POST['name']+'.');
            header("location:/server/controller/createCharacter/constitutionC.php");
            exit;
        }

        require(__DIR__.'/../../../public/view/createCharacter/createCharactNameV.php');
    }


}

