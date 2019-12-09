<?php
/*
    title : lostpwdM.php
    author : Celia.H
    started on :
    brief : model page lost password
*/

class lostpwd extends Model {
    private $mail;
    private $login;

    public function __construct($mailc) {
        $this->mail = $mailc;
    }

    public function getLogin() {
        $this->databaseConnection();
        $sql = "SELECT login FROM user WHERE mail = $this->mail . ";
        $res = $this->execute($sql);
        return $res;
    }

    public function setLogin() {
        if ($this->getLogin() != null) {
            $this->login->getLogin();
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
        $tmpPwd = randPwd();
        $this->databaseConnection();
        $sql = "UPDATE user SET password = ' $tmpPwd 'WHERE login = ' $this->login'";
        $this->execute($sql);
        return $tmpPwd;
    }

    public function sendMail() {
        $message = 'Bonjour ' . $this->login . ',  \n\n';
        $message .= 'Suite à votre signalement du mot de passe perdu, ';
        $message .= 'voici votre nouveau mot de passe : ' . $this->bddPwd() . '\n';
        $message .= 'Pensez à le changer.';
        mail($this->mail, 'Mot de passe perdu', $message);
    }
}