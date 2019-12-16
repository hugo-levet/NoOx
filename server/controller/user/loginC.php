<?php
/*
    title : loginC.php
    author : Celia.H
    started on :
    brief : controller page login
*/

require_once '../../../public/view/user/loginV.php';

class loginC extends Controller {
    function __construct()
    {
        $this->automaticConnection('NoOx/user/login');
        if(isset($_POST['submit'])) {
            $loginnow = new login();
            $login = $_POST['idcurrentUser'];
            $pwd = $_POST['pwd'];
            if($loginnow->loginTry($login,$pwd) == 1){
                if($loginnow->adminTry($login) == 1) {
                    session_start();
                    $_SESSION['admin'] = 1;
                    header('Location: NoOx/user/profile');
                }
                else {
                    session_start();
                    $_SESSION['login'] = 1;
                    header('Location: NoOx/user/profile');
                }
            }
            else {
                echo('Identifiant ou mot de passe incorect');
            }
        }
        elseif (isset($_POST['lostpwd'])) {
            $_SESSION['lostpwd'] = 1;
            header('Location: NoOx/user/lostPwd');
        }
    }
}

?>