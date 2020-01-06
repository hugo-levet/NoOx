<?php
/*
    title : lostPwdC.php
    author : Celia.H
    started on :
    brief : controller page lost password
*/

require ('./public/view/user/lostPwdV.php');
require_once ('./server/model/user/lostpwdM.php');
require_once ('./server/controller/ControllerC.php');


class LostPwd extends Controller {

    function __construct()
    {
        if (isset($_POST['lostPwdSubmit'])) {
            $mail = htmlspecialchars($_POST['lostPwdMail']);
            if(filter_var($mail,FILTER_VALIDATE_EMAIL)) {
                $lostPwd = new LostpwdM($mail);

                echo($lostPwd->setLogin());

                if ($lostPwd->setLogin() == 1) {
                    $lostPwd->sendMail();
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
}

