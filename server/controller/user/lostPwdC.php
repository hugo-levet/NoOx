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

    function __construct()
    {
        if(!isset($_GET['token'])) {
            $url = './HomePage';
            $this->automaticConnection($url);
            if (isset($_POST['lostPwdSubmit'])) {
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
        }
        elseif (isset($_GET['token'])) {
            $lostPwd = new LostPwdM(null);
            $lostPwd->
        }
        require_once('./public/view/template/template.php');
    }
}

