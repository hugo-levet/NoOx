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

    public function loginTry ($mailt, $pwd) {
        $this->mail = $mailt;
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