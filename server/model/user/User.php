<?php
/*
    title : User.php
    author : Julien
    started on : 03/12/19
    brief : class user
*/

class User
{
    private $myId;
    private $myPseudo;
    private $myEmail;
    private $myPassword;
    private $myStatus;
    private $myCommunityRank;
    private $myLanguageCode;
    private $myPortrait;
    private $myCivility;
    private $mySurname;
    private $myFirstName;
    private $myAdress;
    private $myCity;
    private $myPhone;
    private $myBirthday;
    private $myPresentaion;

    public function __construct($pseudo, $email,  $password, $status, $communityrank,
                                $languagecode, $portrait, $civility, $surname,
                                $firstname, $adress, $city, $phone, $birthday,
                                 $presentation)
    {
        $this->myPseudo = $pseudo;
        $this->myEmail = $email;
        $this->myPassword = $password;
        $this->myStatus = $status;
        $this->myCommunityRank = $communityrank;
        $this->myLanguageCode = $languagecode;
        $this->myPortrait = $portrait;
        $this->myCivility = $civility;
        $this->mySurname = $surname;
        $this->myFirstName = $firstname;
        $this->myAdress = $adress;
        $this->myCity = $city;
        $this->myPhone = $phone;
        $this->myBirthday = $birthday;
        $this->myPresentaion = $presentation;
    }

    public function getMyId()
    {
        return $this->myId;
    }

    public function getMyPseudo()
    {
        return $this->myPseudo;
    }

    public function getMyEmail()
    {
        return $this->myEmail;
    }

    public function getMyPassword()
    {
        return $this->myPassword;
    }

    public function getMyStatus()
    {
        return $this->myStatus;
    }

    public function getMyCommunityRank()
    {
        return $this->myCommunityRank;
    }

    public function getMyLanguageCode()
    {
        return $this->myLanguageCode;
    }

    public function getMyPortrait()
    {
        return $this->myPortrait;
    }

    public function getMyCivility()
    {
        return $this->myCivility;
    }

    public function getMySurname()
    {
        return $this->mySurname;
    }

    public function getMyFirstName()
    {
        return $this->myFirstName;
    }

    public function getMyAdress()
    {
        return $this->myAdress;
    }

    public function getMyCity()
    {
        return $this->myCity;
    }

    public function getMyPhone()
    {
        return $this->myPhone;
    }

    public function getMyBirthday()
    {
        return $this->myBirthday;
    }

    public function getMyPresentaion()
    {
        return $this->myPresentaion;
    }

    public function setMyId($myId)
    {
        $this->myId = $myId;
    }

    public function setMyPseudo($myPseudo)
    {
        $this->myPseudo = $myPseudo;
    }

    public function setMyEmail($myEmail)
    {
        $this->myEmail = $myEmail;
    }

    public function setMyPassword($myPassword)
    {
        $this->myPassword = $myPassword;
    }

    public function setMyStatus($myStatus)
    {
        $this->myStatus = $myStatus;
    }

    public function setMyCommunityRank()
    {
        $this->myCommunityRank = 1;
    }

    public function setMyLanguageCode($myLanguageCode)
    {
        $this->myLanguageCode = $myLanguageCode;
    }

    public function setMyPortrait($myPortrait)
    {
        $this->myPortrait = $myPortrait;
    }

    public function setMyCivility($myCivility)
    {
        $this->myCivility = $myCivility;
    }

    public function setMySurname($mySurname)
    {
        $this->mySurname = $mySurname;
    }

    public function setMyFirstName($myFirstName)
    {
        $this->myFirstName = $myFirstName;
    }

    public function setMyAdress($myAdress)
    {
        $this->myAdress = $myAdress;
    }

    public function setMyCity($myCity)
    {
        $this->myCity = $myCity;
    }

    public function setMyPhone($myPhone)
    {
        $this->myPhone = $myPhone;
    }

    public function setMyBirthday($myBirthday)
    {
        $this->myBirthday = $myBirthday;
    }

    public function setMyPresentaion($myPresentaion)
    {
        $this->myPresentaion = $myPresentaion;
    }
}
?>