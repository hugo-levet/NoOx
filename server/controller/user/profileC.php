<?php
    /*
        title : profileC.php
        author : Hugo.P
        started on : 27/11/2019
        brief : controller page profile
    */

require_once('./server/controller/ControllerC.php');
<<<<<<< HEAD
require_once('./server/model/ModelM.php');

if ($_SESSION['login']!='ok')
{
    header('Location: ./public/server/controller/user/loginC.php');
}
=======
class profile extends Controller
{

    private $lastName;
    private $name;
    private $pseudo;
    private $mail;
    private $mdp;
    private $status;
    private $rank;
    private $language;
    private $address;
    private $phone;
    private $birthDate;
    private $webSite;
    private $firstConnexion;
    private $lastConnexion;
    private $portrait;
    private $civility;
    private $signature;
    private $presentation;
    private $timeZone;
    private $currency;

    /**
     * profileC constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
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
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
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
    public function getFirstConnexion()
    {
        return $this->firstConnexion;
    }

    /**
     * @param mixed $firstConnexion
     */
    public function setFirstConnexion($firstConnexion)
    {
        $this->firstConnexion = $firstConnexion;
    }

    /**
     * @return mixed
     */
    public function getLastConnexion()
    {
        return $this->lastConnexion;
    }

    /**
     * @param mixed $lastConnexion
     */
    public function setLastConnexion($lastConnexion)
    {
        $this->lastConnexion = $lastConnexion;
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
>>>>>>> origin/develop

$isConnected = $_SESSION['login'];

if (isset($_GET['error']))
    $s_error = $_GET['error'];
else
    $s_error = 0;

if (isset($_GET['success']))
    $s_success = $_GET['success'];
else
    $s_success = '';

$surname = $_SESSION['idcurrentUser']->getSurname();
$name = $_SESSION['idcurrentUser']->getName();
$pseudo = $_SESSION['idcurrentUser']->getPseudo();
$mail = $_SESSION['idcurrentUser']->getMail();
$passWd = $_SESSION['idcurrentUser']->getPassWd();
$status = $_SESSION['idcurrentUser']->getStatus();
$rank = $_SESSION['idcurrentUser']->getRank();
$language = $_SESSION['idcurrentUser']->getLanguage();
$address = $_SESSION['idcurrentUser']->getAddress();
$phone = $_SESSION['idcurrentUser']->getPhone();
$birthDate = $_SESSION['idcurrentUser']->getBrthDate();
$webSite = $_SESSION['idcurrentUser']->getWebSite();
$firstConnection = $_SESSION['idcurrentUser']->getFirstConnection();
$lastConnection = $_SESSION['idcurrentUser']->getLastConnection();
$portrait = $_SESSION['idcurrentUser']->getPortrait();
$civility = $_SESSION['idcurrentUser']->getCivility();
$signature = $_SESSION['idcurrentUser']->getSignature();
$presentation = $_SESSION['idcurrentUser']->getPresentation();
$timeZone = $_SESSION['idcurrentUser']->getTimeZone();
$currency = $_SESSION['idcurrentUser']->getCurrency();

require ('./public/view/user/profileV.php');

?>