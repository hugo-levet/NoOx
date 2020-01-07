<?php
/*
    title : User.php
    author : Hugo.P
    started on : 12/12/2019
    brief : model profile
*/

require('User.php');

class profile extends Model{

    function changeSurname ($newSurname)
    {
        if($newSurname == NULL)
        {
            header('Location: ../../controller/user/profileC.php?error=Nom de famille invalide');
        }
        $query = 'UPDATE `User` SET surname = \'' . $newSurname . '\' WHERE pseudo = \'' . $_SESSION['idcurrentUser']->getPseudo() . '\'' ;
        $this->execute($query);
        exit();
    }

}


/*if($_SESSION['login'] != 'ok')
{
    die('Erreur d\'authentification');
}

function changeName ($newName)
{
    if($newName == NULL)
    {
        header('Location: ../../controller/user/profileC.php?error=Prénom invalide');
    }
    $database = databaseConnection();
    $query = 'UPDATE `User` SET firstname = \'' . $newName . '\' WHERE pseudo = \'' . $_SESSION['idcurrentUser']->getPseudo() . '\'' ;
    if (!($dbResult = mysqli_query($database, $query)))
    {
        echo 'Erreur de requête<br/>';
        //Affiche le type d'erreur.
        echo 'Erreur : ' . mysqli_error($database) . '<br>';
        //Affiche la requête envoyée.
        echo 'Requête : ' . $query . '<br>';
        exit();
    }
}

function changePseudo ($newPseudo)
{
    $database = databaseConnection();
    $query = 'UPDATE `User` SET pseudo = \'' . $newPseudo . '\' WHERE id = \'' . $_SESSION['idcurrentUser']->getPseudo() . '\'';
    if (!($dbResult = mysqli_query($database, $query))) {
        echo 'Erreur de requête<br/>';
        //Affiche le type d'erreur.
        echo 'Erreur : ' . mysqli_error($database) . '<br>';
        //Affiche la requête envoyée.
        echo 'Requête : ' . $query . '<br>';
        exit();
    }
}

function changeMail ($newMail)
{
    $database = databaseConnection();
    $query = 'UPDATE `User` SET email = \'' . $newMail . '\' WHERE id = \'' . $_SESSION['idcurrentUser']->getPseudo() . '\'';
    if (!($dbResult = mysqli_query($database, $query))) {
        echo 'Erreur de requête<br/>';
        //Affiche le type d'erreur.
        echo 'Erreur : ' . mysqli_error($database) . '<br>';
        //Affiche la requête envoyée.
        echo 'Requête : ' . $query . '<br>';
        exit();
    }
}

function changePassword($newPassword)
{
    $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $database = databaseConnection();
    $query = 'UPDATE `User` SET password = \'' . $newPassword . '\' WHERE pseudo = \'' . $_SESSION['idcurrentUser']->getPseudo() . '\'' ;
    if (!($dbResult = mysqli_query($database, $query)))
    {
        echo 'Erreur de requête<br/>';
        //Affiche le type d'erreur.
        echo 'Erreur : ' . mysqli_error($database) . '<br>';
        //Affiche la requête envoyée.
        echo 'Requête : ' . $query . '<br>';
        exit();
    }
}

function changeBirth ($newBirth)
{
    if($newBirth == NULL)
    {
        header('Location: ../controller/profileC.php?error=Date vide');
    }
    $database = databaseConnection();
    $query = 'UPDATE `User` SET birthday = \'' . $newBirth . '\' WHERE pseudo = \'' . $_SESSION['idcurrentUser']->getPseudo() . '\'' ;
    if (!($dbResult = mysqli_query($database, $query)))
    {
        echo 'Erreur de requête<br/>';
        //Affiche le type d'erreur.
        echo 'Erreur : ' . mysqli_error($database) . '<br>';
        //Affiche la requête envoyée.
        echo 'Requête : ' . $query . '<br>';
        exit();
    }
}

function changeCivility ($newCivility)
{
    $database = databaseConnection();
    $query = 'UPDATE `User` SET civility = \'' . $newCivility . '\' WHERE pseudo = \'' . $_SESSION['idcurrentUser']->getPseudo() . '\'' ;
    if (!($dbResult = mysqli_query($database, $query)))
    {
        echo 'Erreur de requête<br>';
        //Affiche le type d'erreur.
        echo 'Erreur : ' . mysqli_error($database) . '<br>';
        //Affiche la requête envoyée.
        echo 'Requête : ' . $query . '<br>';
        exit();
    }
}




    private $status;
    private $rank;
    private $language;
    private $address;
    private $phone;

    private $birthDate;

    private $webSite;
    private $portrait;

    private $civility;
    private $signature;
    private $presentation;
    private $timeZone;
    private $currency; */