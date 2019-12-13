<?php
/*
    title : login.php
    author : Celia.H
    started on :
    brief : controller page profile
*/

class login extends database
{

    public function loginTry ($login, $pwd) {
        $sql = 'SELECT password FROM user WHERE login = '.'$login'.';';
        $res = $this->Request($sql);
        if ($res == $pwd)
            return 1;
        else
            return 0;
    }

    public function adminTry($login) {
        $sql = 'SELECT admin FROM USER WHERE login =$login;';
        $res = $this->Request($sal);
        if ($res == 1)
            return 1;
        else
            return 0;
    }

}


?>