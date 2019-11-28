<?php
    require '../../../public/view/user/lostPwdV.php';
    if (isset($_POST['lostPwdSubmit'])) {
        $lostPwd = new lostpwd($mail);
        if ($lostPwd->getLogin() == 1) {
            $lostPwd->sendMail();
        }
        else {
            echo('Mail non existant');
        }

    }