<?php
/*
    title : loginM.php
    author : Audrey, Celia.H
    started on :
    brief :  model page login
*/
require_once ('./server/model/ModelM.php');
class loginM extends Model
{
    private $passwordHash;
    private $isExist;
    private $userID;
    private $rank;

    function __construct($topInput, $pwd) {

        $var = $this->loginTry($topInput, $pwd);
        $this->passwordHash = $var[0]['password']; 

        if (password_verify($pwd, $this->passwordHash)) {
            $this->isExist = true;
            $this->userID = $var[0]['id'];
            $this->rank = $var[0]['community_rank'];
        } else {
            $this->isExist = false;
        }

    }

    public function loginTry ($topInput, $pwd) {
        $request = "SELECT id, `password`, community_rank FROM user WHERE 
                    pseudo = '$topInput' OR email = '$topInput'";
        $request = $this->execute($request);

        if (empty($request)) {
            return 0;
        }

        return $request;
    } 

    function getUserID() {
        return $this->userID;
    }
    function getIsExist() {
        return $this->isExist;
    }
}

