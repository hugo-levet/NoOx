<?php
/*
    title : lostPwdC.php
    author : Celia.H
    started on :
    brief : controller page lost password
*/

require '../../../public/view/user/lostPwdV.php';

class LosstPwdC extends Controller {

    function __construct()
    {
        if (isset($_POST['lostPwdSubmit'])) {
            $mail = $_POST['lostPwdMail'];
            $lostPwd = new lostpwd($mail);
            if ($lostPwd->getLogin() == 1) {
                $lostPwd->sendMail();
            }
            else {
                echo('Mail non existant');
            }

        }
    }
}

