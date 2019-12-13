<?php
/*
    title : profileC.php
    author : Hugo.P
    started on :
    brief : controller page profile
*/

    require '../../../public/view/user/loginV.php';
    $loginnow = new login();

    if(isset($_POST['submit'])) {
        if($loginnow->loginTry($login,$pwd) == 1){
            if($loginnow->adminTry($login) == 1) {
                $_SESSION['admin'] = 1;
            }
            else {
                $_SESSION['login'] = 1;
            }
        }
        else {
            echo('Identifiant ou mot de passe incorect');
        }
    }

?>