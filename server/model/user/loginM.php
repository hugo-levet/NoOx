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
    
    public function test () {
        $sql = "SELECT * FROM user WHERE id = '$this->mail'";
        echo $sql;
        $res = $this->execute($sql);
        print_r($res);
    }
    
    public function loginTry ($mailt, $pwd) {
        $this->mail = $mailt;
        $sql = "SELECT password FROM user WHERE email = ' $mailt ' ";
        echo $sql;
        $res = $this->execute($sql);
        echo $res;
        print_r($res);
        echo($res[0]['password']);
        if ($res[0]['password'] == $pwd){
            echo('yes');
            return 1;
        }
        else {
            echo('noo');
            return 0;
        }
    }

    public function adminTry() {
        $email = $this->mail;
        $sql = "SELECT admin FROM USER WHERE email = ' $email' ";
        $res = $this->exucute($sql);
        if ($res == 1)
            return 1;
        else
            return 0;
    }
    
    public function getID() {
        $email = $this->mail;
        $sql = "SELECT id FROM USER WEHRE email = '$email'";
        $res = $this->excute($sql);
        return $res[0]['id'];
    } 

}

?>