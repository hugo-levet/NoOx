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


class LosstPwd extends Controller {

    function __construct()
    {
        if (isset($_POST['lostPwdSubmit'])) {
            $mail = $_POST['lostPwdMail'];
            $lostPwd = new lostpwd($mail);
            if ($lostPwd->setLogin() == 1) {
                echo('hello');
                $lostPwd->sendMail();
            }
            else {
                echo('Mail non existant');
            }

        }
    }
}

