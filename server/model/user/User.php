<?php
/*
    title : User.php
    author : Hugo.P
    started on : 12/12/2019
    brief : class User
*/

require_once('./server/model/ModelM.php');

class User extends Model {

    private $surname;
    private $name;
    private $pseudo;
    private $mail;
    private $passWd;
    private $status;
    private $rank;
    private $language;
    private $address;
    private $phone;
    private $birthDate;
    private $webSite;
    private $firstConnection;
    private $lastConnection;
    private $portrait;
    private $civility;
    private $signature;
    private $presentation;
    private $timeZone;
    private $currency;

    /**
     * User constructor.
     * @param $surname
     * @param $name
     * @param $pseudo
     * @param $mail
     * @param $passWd
     * @param $status
     * @param $rank
     * @param $language
     * @param $address
     * @param $phone
     * @param $birthDate
     * @param $webSite
     * @param $firstConnection
     * @param $lastConnection
     * @param $portrait
     * @param $civility
     * @param $signature
     * @param $presentation
     * @param $timeZone
     * @param $currency
     */
    public function __construct($surname, $name, $pseudo, $mail, $passWd, $status, $rank, $language, $address, $phone, $birthDate, $webSite, $firstConnection, $lastConnection, $portrait, $civility, $signature, $presentation, $timeZone, $currency)
    {
        $this->surname = $surname;
        $this->name = $name;
        $this->pseudo = $pseudo;
        $this->mail = $mail;
        $this->passWd = $passWd;
        $this->status = $status;
        $this->rank = $rank;
        $this->language = $language;
        $this->address = $address;
        $this->phone = $phone;
        $this->birthDate = $birthDate;
        $this->webSite = $webSite;
        $this->firstConnection = $firstConnection;
        $this->lastConnection = $lastConnection;
        $this->portrait = $portrait;
        $this->civility = $civility;
        $this->signature = $signature;
        $this->presentation = $presentation;
        $this->timeZone = $timeZone;
        $this->currency = $currency;

    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getPassWd()
    {
        return $this->passWd;
    }

    /**
     * @param mixed $mdp
     */
    public function setPassWd($passWd)
    {
        $this->passWd = $passWd;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @param mixed $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param mixed $birthDate
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return mixed
     */
    public function getWebSite()
    {
        return $this->webSite;
    }

    /**
     * @param mixed $webSite
     */
    public function setWebSite($webSite)
    {
        $this->webSite = $webSite;
    }

    /**
     * @return mixed
     */
    public function getFirstConnection()
    {
        return $this->firstConnection;
    }

    /**
     * @param mixed $firstConnection
     */
    public function setFirstConnection($firstConnection)
    {
        $this->firstConnection = $firstConnection;
    }

    /**
     * @return mixed
     */
    public function getLastConnection()
    {
        return $this->lastConnection;
    }

    /**
     * @param mixed $lastConnection
     */
    public function setLastConnection($lastConnection)
    {
        $this->lastConnection = $lastConnection;
    }

    /**
     * @return mixed
     */
    public function getPortrait()
    {
        return $this->portrait;
    }

    /**
     * @param mixed $portrait
     */
    public function setPortrait($portrait)
    {
        $this->portrait = $portrait;
    }

    /**
     * @return mixed
     */
    public function getCivility()
    {
        return $this->civility;
    }

    /**
     * @param mixed $civility
     */
    public function setCivility($civility)
    {
        $this->civility = $civility;
    }

    /**
     * @return mixed
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * @param mixed $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }

    /**
     * @return mixed
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * @param mixed $presentation
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;
    }

    /**
     * @return mixed
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * @param mixed $timeZone
     */
    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }
}
=======
    /*  
        title : User.php
        author : 
        started on : 
        brief : class user
    */
>>>>>>> origin/develop:server/model/user/UserM.php

?>