<?php
/*
    title : loginC.php
    author : Celia.H
    started on :
    brief : controller page login
*/

require_once ('./server/model/user/loginM.php');
require_once ('./server/controller/ControllerC.php');

class Login extends Controller {
    function __construct($url)
    {
        $this->automaticConnection($url);
        if(isset($_POST['submit'])) {
            $mail = htmlspecialchars($_POST['mail']);
            $pwd = $_POST['pwd'];

            if (!empty($pwd) AND !empty($mail)) {

                if(filter_var($mail,FILTER_VALIDATE_EMAIL)) {
                    $loginnow = new LoginM();
                    $res = $loginnow->loginTry(1,$mail,$pwd);

                    if($res == 1){
                        $_SESSION['idcurrentUser'] = $loginnow->getId();
                        header('Location: homePage');

                    }
                    else{
                        echo('Adresse mail ou mot de passe invalide');
                    }

                }
                else{
                    echo('Adresse mail non valide');
                }

            }
            else {
                echo('Tous les champs doivent être complétés');
            }
        }
        if (isset($_POST['lostpwd'])) {
            header('Location: LostPwd');
        }
        
        //display view
        require_once('./public/view/template/template.php');
    }
}