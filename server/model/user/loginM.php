<?php
/*
    title : LoginM.php
    author : Celia.H
    started on :
    brief : model page login
*/
require_once ('./server/model/ModelM.php');
class loginM extends Model
{
    private $mail;
    private $login;
    public function loginTry ($bool, $var, $pwd) {
        if($bool == 1) { //dans le cas où c'est un mail
            $this->mail = $var;
            $sql = "SELECT password FROM user WHERE email = '$this->mail'";
            $res = $this->execute($sql);
            if (password_verify($pwd,$res[0]['password'])){
                $_SESSION['connected'] = true;
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
            if (password_verify($pwd,$res[0]['password'])){
                $_SESSION['connected'] = true;
                return 1;
            }
            else {
                return 0;
            }
        }
    }
    public function adminTry() {
        $sql = "SELECT admin FROM user WHERE email = '$this->mail'";
        $res = $this->execute($sql);
        if ($res == 1)
            return 1;
        else
            return 0;
    }
    
    public function getID() {
        $sql = "SELECT id FROM user WHERE email = '$this->mail'";
        $req = $this->execute($sql);
        $res = $req[0]['id'];
        $_SESSION['connected'] = true;

        return $res;
    } 
}
?>