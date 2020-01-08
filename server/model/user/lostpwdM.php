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

    public function __construct($mailc) {
        $this->mail = $mailc;
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

    public function bddPwd() {
        $tmpPwd = $this->randPwd();
        $sql = "UPDATE user SET password = '$tmpPwd'WHERE pseudo = '$this->login'";
        $this->execute($sql);
        return $tmpPwd;
    }

    public function sendMail() {
        $tmp = $this->bddPwd();
        $message = 'Bonjour ' . $this->login . ', '." \n\n";
        $message .= 'Suite à votre signalement du mot de passe perdu, ';
        $message .= 'voici votre nouveau mot de passe : ' . $tmp . "\n";
        $message .= 'Pensez à le changer.';
        $to = $this->mail;
        $subject = 'Mot de passe perdu';
        mail($to, $subject, $message);
    }
}