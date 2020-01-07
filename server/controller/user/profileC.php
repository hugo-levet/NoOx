<?php
    /*
        title : profileC.php
        author : Hugo.P
        started on : 27/11/2019
        brief : controller page profile
    */
?>

<?php

require_once('./server/controller/ControllerC.php');
require_once('./server/model/ModelM.php');

if ($_SESSION['login']!='ok')
{
    header('Location: ./public/server/controller/user/loginC.php');
}

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