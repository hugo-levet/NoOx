<?php
/*
    title : lostPwdC.php
    author : Celia.H
    started on :
    brief : controller page lost password
*/

require_once ('./server/model/user/lostpwdM.php');
require_once ('./server/controller/ControllerC.php');


class LostPwd extends Controller {

    function __construct($url)
    {
        $this->automaticConnection($url);
        if(!isset($_GET['token'])) {
            if (isset($_POST['lostPwdSubmit'])) {
                if(!empty($_POST['lostPwdMail'])) {
                    $mail = htmlspecialchars($_POST['lostPwdMail']);
                    if(filter_var($mail,FILTER_VALIDATE_EMAIL)) {
                        $lostPwd = new LostpwdM($mail);

                        if ($lostPwd->setLogin() == 1) {
                            $lostPwd->sendMail();
                            echo('Un mail vient de vous être envoyer veuillez suivre les étapes indiquées');
                        }
                        else {
                            echo('Mail non existant');
                        }
                    }
                    else {
                        echo('Adresse mail invalide');
                    }
                }
                else{
                    echo('Veuillez remplir tous les champs');
                }

            }
        }
        elseif (isset($_GET['token'])) {
            $lostPwd = new LostPwdM(null);
            $token = $_GET['token'];
            $res = $this->validToken($token);
            if($res == 0){
                header('Location: HomePage');
            }
            if($res == 1) {
                echo('Lien périmé, veuillez refaire la demande');
                $lostPwd->destroyToken();
            }
            if($res == 2) {
                if(isset($_POST['ConfPwd'])) {
                    if(!empty($_POST['newPwd']) && !empty($_POST['verifPwd'])){
                        $new = htmlspecialchars($_POST['newPwd']);
                        $conf = htmlspecialchars(($_POST['ConfPwd']));
                        if($new == $conf){
                            $this->changePwd($new);
                            echo('Votre mot de passe a bien été changé');
                            header('Location: HomePage');
                        }

                    }
                    else{
                        echo('Tous les champs doivent être complets');
                    }
                }
            }
        }
        require_once('./public/view/template/template.php');
    }
}

