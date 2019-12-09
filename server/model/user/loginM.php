<?php
/*
    title : loginM.php
    author : Celia.H
    started on :
    brief : model page login
*/

class login extends Model
{

    public function loginTry ($login, $pwd) {
    $this->databaseConnection();
    $sql = "SELECT password FROM user WHERE login = ' $login ' ";
        $res = $this->execute($sql);
        if ($res == $pwd)
            return 1;
        else
            return 0;
    }

    public function adminTry($login) {
        $this->databaseConnection();
        $sql = "SELECT admin FROM USER WHERE login = ' $login' ";
        $res = $this->exucute($sql);
        if ($res == 1)
            return 1;
        else
            return 0;
    }

}


?>