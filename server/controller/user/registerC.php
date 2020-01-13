<?php
/*
    title : registerC.php
    author : Julien
    started on :
    brief : controller page d'inscription
*/
require_once(__DIR__.'/../../model/popup/popupM.php');

require_once(__DIR__ . '/../../model/user/registerM.php');
require_once(__DIR__ . '/../../model/user/UserM.php');

define('SITE_KEY' , '6Ld108wUAAAAAP8VfLcpYm7Fqos4wYGJLGfFuk_-');
define('SECRET_KEY', '6Ld108wUAAAAAFlQfX9ZQ3RQF7PsnQi-GGNyIVKt');
// Creation d'un compte

class register {
    function __construct() {
        if(isset($_POST['submit'])) {

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
            if ($pseudo != NULL AND $email != NULL AND $password != NULL AND $password2 != NULL) {

                if ($password != $password2) {
                    $_SESSION['popup'] = new PopUp('error', 'Inscription', 'Mot de passe différents');
                    header('Location: /user/register');
                    exit;
                }
                else {
                    $registration = new registerM();
                    $_SESSION['popup'] = new PopUp('success', 'Inscription', 'Vous êtes maintenant inscrit !');
                    if (($registration->checkEmail($email)) == 0 AND ($registration->checkPseudo($pseudo)) == 0)
                    {
                        $password = password_hash($password, PASSWORD_DEFAULT);
                        $newUser = new User($pseudo, $email,  $password, $status, $communityrank,
                            $languagecode, $portrait, $civility, $surname,
                            $firstname, $adress, $city, $phone, $birthday,
                            $presentation);
                        $registration->register($newUser);
                        header('Location: /user/register');
                        exit;
                    }
                    else if (($registration->checkPseudo($pseudo)) != 0)
                    {
                        $_SESSION['popup'] = new PopUp('error', 'Inscription', 'Le pseudo est déjà existant');
                        header('Location: /user/register');
                        exit;
                    }
                    else if (($registration->checkEmail($email)) != 0)
                    {
                        $_SESSION['popup'] = new PopUp('error', 'Inscription', 'L\'email est déjà existant');
                        header('Location: /user/register');
                        exit;
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
        }

        require __DIR__.'/../../../public/view/user/registerV.php';
    }
}

?>