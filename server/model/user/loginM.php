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

    public function loginTry ($mail, $pwd) {
        $this->mail = $mail;
        $sql = "SELECT password FROM user WHERE email ='$this->mail'";
        $res = $this->execute($sql);
        if (password_verify($pwd,$res[0]['password'])){
            return 1;
        }
        else {
            return 0;
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
    
    public function getId() {
        $sql = "SELECT id FROM user WHERE email = '$this->mail'";
        $req = $this->execute($sql);
        $res = $req[0]['id'];
        return $res;
    } 

}

?>