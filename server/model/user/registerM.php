<?php
/*
    title : register.php
    author : Celia.H
    started on :
    brief : controller page profile
*/

require_once '../databse/databse.php';

class register {

    public function MailTry ($mail) {
        $sql = 'select email from user where email= $mail;';
        $req = query($sql);
        return $req;
    }

    public function login_try ($login) {
        $sql = 'select login from user where login= $login;';
        $req = query($sql);
        return $req;
    }

}

?>