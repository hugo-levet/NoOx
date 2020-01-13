<?php
/*
    title : loginC.php
    author : Celia.H
    started on :
    brief : controller page login
*/
require_once (__DIR__.'/../../model/user/loginM.php');
require_once (__DIR__.'/../ControllerC.php');
class login extends Controller {
    function __construct($url)
    {
        $this->automaticConnection($url);
        if(isset($_POST['submit'])) {
            $mail = htmlspecialchars($_POST['mail']);
            $pwd = $_POST['pwd'];
            if (!empty($pwd) AND !empty($mail)) {
                if(filter_var($mail,FILTER_VALIDATE_EMAIL)) {
                    $loginnow = new loginM($mail);
                    $res = $loginnow->loginTry(1, $mail,$pwd);
                    if($res == 1){
                        $_SESSION['idcurrentUser'] = $loginnow->getID();
                        $_SESSION['userID'] = $loginnow->getID();
                        header('Location:/homepage');
                    }
                    else{
                        $error = 'Adresse mail ou mot de passe invalide';
                    }
                }
                else{
                    $error = 'Adresse mail non valide';
                }
            }
            else {
                $error = 'Tous les champs doivent être complétés';
            }
        }
        if (isset($_POST['lostpwd'])) {
            header('Location: LostPwd');
        }
        
        //display view
        require_once(__DIR__.'/../../../public/view/user/loginV.php');
    }
}