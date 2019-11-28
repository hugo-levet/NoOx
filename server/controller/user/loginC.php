<?php
/*
    title : profileC.php
    author : Hugo.P
    started on :
    brief : controller page profile
*/

    require '../../../public/view/user/loginV.php';

    session_start();

    if(isset($_POST['submit'])) {
            $loginnow = new login();
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