<?php
/*
    title : login.php
    author : Celia.H
    started on :
    brief : controller page profile
*/

require_once '../databse/databse.php';

class login
{

    public function LoginTry ($login, $pwd) {
        $sql1 = 'SELECT login FROM user WHERE login = $login;';
        $req1 = query($sql1);
        $sql2 = 'SELECT login FROM user WHERE password = $pwd;';
        $req2 = query($sql2);
        if ($req1 == $req2)
            $res = true;
        else
            $res = false;
        return $res;
    }



}


?>