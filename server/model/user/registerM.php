<?php
/*
    title : register.php
    author : Julien
    started on : 03/12/19
    brief : controller page d'inscription
*/

require(__DIR__."/../ModelM.php");

class registration extends Model
{
    public function register($newUser) {
        $sql = 'INSERT INTO user ( pseudo, email, password, status, community_rank, language_code, portrait, civility, surname, firstname, address, city, phone, birthday, presentation) 
            VALUES (\'' . $newUser->getMyPseudo() . '\',
                    \'' . $newUser->getMyEmail() . '\',
                    \'' . $newUser->getMyPassword() . '\',
                    \'' . $newUser->getMyStatus() . '\',
                    \'' . $newUser->getMyCommunityRank() . '\',
                    \'' . $newUser->getMyLanguageCode() . '\',
                    \'' . $newUser->getMyPortrait() . '\',
                    \'' . $newUser->getMyCivility() . '\',
                    \'' . $newUser->getMySurname() . '\',
                    \'' . $newUser->getMyFirstName() . '\',
                    \'' . $newUser->getMyAdress() . '\',  
                    \'' . $newUser->getMyCity() . '\',
                    \'' . $newUser->getMyPhone() . '\',
                    \'' . $newUser->getMyBirthday() . '\',                                                                                                                               
                    \'' . $newUser->getMyPresentaion() . '\')';
        $this->insert($sql);
    }//register()

    public function checkEmail ( $email ) {
        $this->databaseConnection();
        $sql = 'SELECT email FROM user WHERE email = \'' . $email . '\'';
        $res = $this->execute($sql);
        if ($res[0]['email'] == $email)
            return 1;
        else
            return 0;
    }//checkEmail()

    public function checkPseudo ( $pseudo ) {
        $this->databaseConnection();
        $sql = 'SELECT pseudo FROM user WHERE pseudo = \'' . $pseudo . '\'';
        $res = $this->execute($sql);
        if ($res[0]['pseudo'] == $pseudo)
            return 1;
        else
            return 0;
    }//checkPseudo()
}
?>