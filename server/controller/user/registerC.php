<?php
/*
    title : registerC.php
    author : Julien
    started on :
    brief : controller page d'inscription
*/

require '../../../public/view/user/registerV.php';

// Cration d'un compte
require (__DIR__ . '/../../model/user/registerM.php');
require (__DIR__ . '/../../model/user/User.php');

$registration = new registration();

if(isset($_POST['submit']))
{
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $status = $_POST['status'];
    $communityrank = 1;
    $languagecode = $_POST['languagecode'];
    $portrait = $_POST['portrait'];
    $civility = $_POST['civility'];
    $surname = $_POST['surname'];
    $firstname = $_POST['firstname'];
    $adress = $_POST['adress'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    $presentation = $_POST['presentation'];
    if ($pseudo != NULL AND $email != NULL AND $password != NULL AND $password2 != NULL AND $status != NULL
        AND $portrait != NULL AND $civility != NULL AND $surname != NULL AND $firstname != NULL AND $adress != NULL
        AND $city != NULL AND $phone != NULL AND $birthday != NULL)
    {
        if ($password != $password2)
        {
            header('Location: ../../../server/controller/user/registerC.php?error=password');
        }
        else
        {
            if (strlen($password) > 0)
            {
                if (($registration->checkEmail($email)) == 0 AND ($registration->checkPseudo($pseudo)) == 0)
                {
                    $Password = password_hash($password, PASSWORD_DEFAULT);
                    $newUser = new User($pseudo, $email,  $password, $status, $communityrank,
                        $languagecode, $portrait, $civility, $surname,
                        $firstname, $adress, $city, $phone, $birthday,
                        $presentation);
                    $registration->register($newUser);
                    print 'Vous avez été correctement inscrit';
                }

                else if (($registration->checkPseudo($pseudo)) == 1)
                {
                    header('Location: ../../../server/controller/user/registerC.php?error=pseudo');
                }

                else if (($registration->checkEmail($email)) == 1)
                {
                    header('Location: ../../../server/controller/user/registerC.php?error=email');
                }
            }
            else
            {
                header('Location : ../../../server/controller/user/registerC.php?error=wrongPassword');
            }
        }
    }
    else
    {
        header('Location: ../../../server/controller/user/registerC.php?error=wrong');
    }
}

if (isset($_GET['error']))
{
    if ($_GET['error'] == 'wrong')
        $error = 'Vous n\'avez pas rempli un des champs.';
    else if ($_GET['error'] == 'password')
        $error = 'Les mots de passe sont différents.';
    else if ($_GET['error'] == 'pseudo')
        $error = 'Le pseudo que vous avez choisi est déjà utilisé.';
    else if ($_GET['error'] == 'email')
        $error = 'L\'email que vous avez choisi est déjà utilisé';
    else if ($_GET['error'] == 'wrongPassword')
        $error = 'Le mot de passe doit contenir au moins 8 caractères';
    else
        $error = '';
}
else
    $error = '';


?>

