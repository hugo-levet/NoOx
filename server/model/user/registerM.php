<?php
/*
    title : register.php
    author : Julien
    started on :
    brief : controller page profile
*/

include_once '../ModelM.php';

class registration extends Model
{
    public function register($newUser) {
        $this->databaseConnection();
        $sql = 'INSERT INTO user ( pseudo, email, password, status, "community rank", "language code", portrait, civility, surname, firstname, address, city, phone, birthday, presentation) 
            VALUES (\'' . $newUser->getMyPseudo() . '\',
                    \'' . $newUser->getMyEmail() . '\',
                    \'' . $newUser->getMyPassword() . '\',
                    \'' . $newUser->getMyStatus() . '\',
                    \'' . $newUser->getMyCommunityRank() . '\',
                    \'' . $newUser->getMyPortrait() . '\',
                    \'' . $newUser->getMyCivility() . '\',
                    \'' . $newUser->getMySurname() . '\',
                    \'' . $newUser->getMyFirstName() . '\',
                    \'' . $newUser->getMyAdress() . '\',  
                    \'' . $newUser->getMyCity() . '\',
                    \'' . $newUser->getMyPhone() . '\',
                    \'' . $newUser->getMyBirthday() . '\',                                                                                                                               
                    \'' . $newUser->getMyPresentaion() . '\')';
        if (!($dbResult = mysqli_query($this, $sql)))
        {
            echo 'Erreur de requête<br/>';
            //Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($this) . '<br/>';
            //Affiche la requête envoyée.
            echo 'Requête : ' . $sql . '<br/>';
            exit();
        }
    }



    public function checkEmail ( $email ) {
        $this->databaseConnection();
        $sql = "SELECT email FROM user WHERE email = '$email'";
        $res = $this->execute($sql);
        if ($res == 1)
            return 1;
        else
            return 0;
    }

    public function checkPseudo ( $pseudo ) {
        $this->databaseConnection();
        $sql = "SELECT pseudo FROM user WHERE pseudo = '$pseudo'";
        $res = $this->execute($sql);
        if ($res == 1)
            return 1;
        else
            return 0;
    }

}
?>