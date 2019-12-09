<?php
/*
    title : lostPwdC.php
    author : Celia.H
    started on :
    brief : controller page lost password
*/


    require '../../../public/view/user/lostPwdV.php';
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