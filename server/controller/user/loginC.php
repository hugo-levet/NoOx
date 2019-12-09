<?php
/*
    title : loginC.php
    author : Celia.H
    started on :
    brief : controller page login
*/

    require '../../../public/view/user/loginV.php';

    session_start();

    if(isset($_POST['submit'])) {
            $loginnow = new login();
            $login = $_POST['login'];
            $pwd = $_POST['pwd'];
            if($loginnow->loginTry($login,$pwd) == 1){
                if($loginnow->adminTry($login) == 1) {
                    $_SESSION['admin'] = 1;
                }
                else {
                    session_start();
                    $_SESSION['login'] = 1;
                }
            }
            else {
                echo('Identifiant ou mot de passe incorect');
            }
    }
    elseif (isset($_POST[lostpwd])) {
        $_SESSION['lostpwd'] = 1;
        header('Location: lostpwdC');
    }

?>