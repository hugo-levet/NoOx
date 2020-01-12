<?php
/*
    title : lostpwdM.php
    author : Celia.H
    started on :
    brief : model page lost password
*/

require_once ('./server/model/ModelM.php');

class LostpwdM extends Model {
    private $mail;
    private $login;
    private $id;



    public function __construct($mailc) {
        $this->mail = $mailc;

    }

    public function getMail(){
        return $this->mail;
    }

    public function getId() {
        return $this->id;
    }

    public function setId(){
        $sql = "SELECT id FROM user WHERE pseudo = '$this->login'";
        $req = $this->execute($sql);
        $res = $req[0]['id'];
        $this->id = $res;
    }

    public function getLogin() {
        $sql = "SELECT pseudo FROM user WHERE email = '$this->mail'";
        $res = $this->execute($sql);
        return $res;
    }

    public function setLogin() {
        $res = $this->getLogin();
        if ($res != null) {
            $this->login = $res[0]['pseudo'];
            return 1;
        }
        return 0;

    }

    public function randPwd() {
        $alphabet = 'azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789';
        $tmpPwd = array();
        for ($i = 0; $i < 10; ++$i) {
            $k = rand(0,strlen($alphabet));
            $tmpPwd[$i] = $alphabet[$k];
        }
        return implode($tmpPwd);
    }


    public function createToken(){
        $token = password_hash($this->randPwd());
        $date = date('Y-m-d');
        $sql = "INSERT INTO token (token, pseudo, date) VALUES ($token, '$this->login','$date')";
        $this->execute($sql);
    }


    public function tokenValid($token){
        $sql = "SELECT * FROM token WHERE token = '$token'";
        $req = $this->execute($sql);
        if(!empty($req[0]['pseudo'])) {
            $today = explode('-', date('Y-m-d'));
            $tokenDate = $req[0]['date'];
            $date = explode('-',$tokenDate);
            if($today[0] == $date[0]) {

                if ($today[1] == $date[1]) {

                    if ($today[2] == $date[2]){

                        $this->id = $req[0]['id'];
                        $this->login = $req[0]['pseudo'];
                        //token valide
                        return 2;
                    }
                }
                //token invalide
                return 1;
            }
            //token invalide
            return 1;
        }
        else{
            //token non existant
            return 0;
        }

    }

    public function changePwd($newPwd){
        $new = password_hash($newPwd);
        $sql = "UPDATE USER SET password = '$new' WHERE pseudo = '$this->login'";
        $this->execute($sql);
    }

    public function destroyToken(){
        $sql = "DELETE FROM token WHERE pseudo ='$this->login'";
        $req = $this->execute($sql);
    }


    public function bddPwd() {
        $tmpPwd = $this->randPwd();
        $sql = "UPDATE user SET password = '$tmpPwd' WHERE pseudo = '$this->login'";
        $this->execute($sql);
        return $tmpPwd;
    }

    public function sendMail() {
        $tmp = $this->bddPwd();
        $message = 'Bonjour ' . $this->login . ', '." \n\n";
        $message .= 'Suite à votre signalement du mot de passe perdu, ';
        $message .= 'voici votre nouveau mot de passe : ' . $tmp . "\n";
        $message .= "Pensez à le changer";
        $to = $this->mail;
        $subject = 'Mot de passe perdu';
        mail($to, $subject, $message);
    }

}
