<?php
/*
    title : loginC.php
    author : Celia.H
    started on :
    brief : controller page login
*/

// require_once ('./public/view/user/loginV.php');
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


                    $res = $loginnow->loginTry($mail,$pwd);

                    echo "TEEESST \n ";

                    $loginnow->test();
                    //echo($res);

                    if($res == 1){
                        echo('logintry reussi');
                        // session_start();
                        $_SESSION['idcurrentUser'] = $loginnow->getId();
                        echo('login marche');
                        header('Location : NoOx/user/profileC.php?id =' . $_SESSION['idcurrentUser'] );

//                if($loginnow->adminTry($login) == 1) {
//                    session_start();
//                    $_SESSION['admin'] = 1;
//                    header('Location: NoOx/user/profile');
//                    echo('admin');
//                }
//                else {
//                    session_start();
//                    $_SESSION['login'] = 1;
//                    echo('admin');
//                    header('Location: NoOx/user/profile');
//                }

                    }
                    else {
                        echo('Adresse mail ou mot de passe incorect');
                    }
                }
                else {
                    echo('Adresse mail non valide');
                }

            }
            else {
                echo('Tous les cahmps doivent être complété');
            }
        }
        if (isset($_POST['lostpwd'])) {
            header('Location: NoOx/user/lostPwd');
        }
        
        //display view
        require_once('./public/view/template/template.php');
    }
}