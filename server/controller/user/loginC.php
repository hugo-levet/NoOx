<?php
/*
    title : loginC.php
    author : Celia.H
    started on :
    brief : controller page login
*/

require_once ('./public/view/user/loginV.php');
require_once ('./server/model/user/loginM.php');
require_once ('./server/controller/ControllerC.php');

class LoginC extends Controller {
    function __construct($url)
    {
        echo('constructeur');
        //$this->automaticConnection($url);
        if(isset($_POST['submit'])) {
            echo('submit marche');
//            $loginnow = new Login();
//            $login = $_POST['idcurrentUser'];
//            $pwd = $_POST['pwd'];
//            if($loginnow->loginTry($login,$pwd) == 1){
//                echo('logintry');
//
////                if($loginnow->adminTry($login) == 1) {
////                    session_start();
////                    $_SESSION['admin'] = 1;
////                    //header('Location: NoOx/user/profile');
////                    echo('admin');
////                }
////                else {
//                session_start();
//                $_SESSION['login'] = 1;
//                echo('admin');
//                //header('Location: NoOx/user/profile');

//            }
//            else {
//                echo('Identifiant ou mot de passe incorect');
//            }
        }
//        if (isset($_POST['lostpwd'])) {
//            $_SESSION['lostpwd'] = 1;
//            header('Location: NoOx/user/lostPwd');
        //}
    }
}


?>