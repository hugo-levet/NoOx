<?php
    /*
        title : nameC.php
        author : Audrey
        started-on : 19/12/2019

        brief : 1rst page of Character Creation controller
    */
    require_once(__DIR__.'/../../model/popup/popupM.php');


class name {
    
    function __construct($url) {

        if (!isset($_SESSION['userID'])) {
            $_SESSION['popup'] = new PopUp('error', 'connexion', 'Vous devez être connecté pour avoir acces à cette page');
            header("location:/homepage");
            exit;
        }
        // savoir si l'utilisateur est connecté
        $userID = $_SESSION['userID'];

        // si form submit
        if (isset($_POST['name'])) {
            
            if (!isset($_POST['name']) || strlen($_POST['name']) == 0 ) {
                $_SESSION['popup'] = new PopUp('error', 'NOM', 'Le champ Nom doit être complété et sa taille ne doit pas être nulle');

                // redirection vers la page name
                header("location:/createCharacter/name");
                exit;
            } 
            
            $_SESSION['creationCharacter']['name'] = $_POST['name'];
            $_SESSION['creationCharacter']['namePage'] = true;
            
            $_SESSION['popup'] = new PopUp('success', 'NOM', 'Le nom a été renseigné avec succès : '+$_POST['name']+'.');
            header("location:/createCharacter/constitution");
            exit;
        }

        require(__DIR__.'/../../../public/view/createCharacter/createCharactNameV.php');
    }


}

