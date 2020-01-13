<?php
    /*
        title : loginC.php
        author : Audrey, Celia
        started-on 

        brief : controller login page
    */

    require(__DIR__.'/../../model/user/loginM.php');
    require_once(__DIR__.'/../../model/user/UserM.php');
    require_once(__DIR__.'/../../model/popup/popupM.php');

    class login {

        function __construct() {
            if(isset($_POST['submit'])) {
                if (!isset($_POST['mail']) || !isset($_POST['pwd'])) {
                    $_SESSION['popup'] = new PopUp('error', 'Connexion', 'Vous devez remplir les champs');
                
                    header('location: /user/login');
                    exit;
                }

                $loginTry = new loginM($_POST['mail'], $_POST['pwd']);



                if (!$loginTry->getIsExist()) {
                    $_SESSION['popup'] = new PopUp('error', 'Connexion', 'Mot de passe ou email/pseudo erronés');
                    header('location: /user/login');
                    exit;
                }

                $_SESSION['userID'] = $loginTry->getUserID();
                $_SESSION['popup'] = new PopUp('success', 'Connexion', 'Vous êtes connecté !');

                header('location: /homepage');
                exit;
            }
            
            require (__DIR__.'/../../../public/view/user/loginV.php');
        }


    }

?>