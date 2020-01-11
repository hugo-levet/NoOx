<?php
/*
    title : LoginM.php
    author : Celia.H
    started on :
    brief : model page login
*/
require_once ('./server/model/ModelM.php');
class LoginM extends Model
{
    private $mail;
    private $login;
    public function loginTry ($bool, $var, $pwd) {
        if($bool == 1) { //dans le cas où c'est un mail
            $this->mail = $var;
            $sql = "SELECT password FROM user WHERE email = '$this->mail'";
            $res = $this->execute($sql);
            if ($res[0]['password'] == $pwd){
                echo'yes';
                return 1;
            }
            else {
                return 0;
            }
        }
        if($bool == 0) { //dans le cas où c'est un pseudo
            $this->login = $var;
            $sql = "SELECT password FROM user WHERE pseudo = '$this->login'";
            $res = $this->execute($sql);
            $sql2 = "SELECT email FROM user WHERE pseudo = '$this->login'";
            $res2 = $this->execute($sql2);
            $this->mail = $res2[0]['email'];
            if ($res[0]['password'] == $pwd){
                echo'yes';
                return 1;
            }
            else {
                return 0;
            }
        }
    }
    public function adminTry() {
        $sql = "SELECT admin FROM user WHERE email = '$this->mail'";
        $res = $this->exucute($sql);
        if ($res == 1)
            return 1;
        else
            return 0;
    }

    public function getID() {
        $sql = "SELECT id FROM user WHERE email = ' .$this->mail'";
        echo $sql;
        $req = $this->execute($sql);
        $res = $req[0]['id'];
        echo $res;
        return $res;
    }
}
?>