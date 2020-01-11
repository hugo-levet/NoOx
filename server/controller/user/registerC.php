<?php
/*
    title : registerC.php
    author : Julien
    started on :
    brief : controller page d'inscription
*/

require('../../model/popup/popupM.php');

define('SITE_KEY' , '6Ld108wUAAAAAP8VfLcpYm7Fqos4wYGJLGfFuk_-');
define('SECRET_KEY', '6Ld108wUAAAAAFlQfX9ZQ3RQF7PsnQi-GGNyIVKt');

// Cration d'un compte

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
    if ($pseudo != NULL AND $email != NULL AND $password != NULL AND $password2 != NULL)
    {
        if ($password != $password2)
        {
            header('Location: ../../../server/controller/user/registerC.php?error=password');
        }
        else
        {
            require (__DIR__ . '/../../model/user/registerM.php');
            require (__DIR__ . '/../../model/user/User.php');
            $registration = new registration();

            if (($registration->checkEmail($email)) == 0 AND ($registration->checkPseudo($pseudo)) == 0)
            {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $newUser = new User($pseudo, $email,  $password, $status, $communityrank,
                    $languagecode, $portrait, $civility, $surname,
                    $firstname, $adress, $city, $phone, $birthday,
                    $presentation);
                $registration->register($newUser);
                header('Location: ../../../server/controller/user/registerC.php');

            }

            else if (($registration->checkPseudo($pseudo)) != 0)
            {
                header('Location: ../../../server/controller/user/registerC.php?error=pseudo');
            }

            else if (($registration->checkEmail($email)) != 0)
            {
                header('Location: ../../../server/controller/user/registerC.php?error=email');
            }
        }

        function getCaptcha($SecretKey){
            $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
            $Return = json_decode($Response);
            return $Return;
        }
        $Return = getCaptcha($_POST['g-recaptcha-response']);
        if($Return->success == true && $Return->score > 0.5){
            echo "Succes!";
        }
        else {
            echo "You are a Robot!!";
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
    else
        $error = '';
}
else
    $error = '';

require '../../../public/view/user/registerV.php';

?>

