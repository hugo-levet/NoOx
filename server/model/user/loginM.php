<?php
/*
    title : loginM.php
    author : Celia.H
    started on :
    brief : model page login
*/

require_once ('./server/model/ModelM.php');

class LoginM extends Model
{

    public function loginTry ($login, $pwd) {
        $sql = "SELECT password FROM user WHERE pseudo = ' $login ' ";
        $res = $this->execute($sql);
        echo($res[0]['password']);
        if ($res[0]['password'] == $pwd){
            return 1;
        }
        else {
            return 0;
        }
    }

    public function adminTry($login) {
        $sql = "SELECT admin FROM USER WHERE pseudo = ' $login' ";
        $res = $this->exucute($sql);
        if ($res == 1)
            return 1;
        else
            return 0;
    }

}

?>