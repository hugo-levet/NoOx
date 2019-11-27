<?php
/*
        title : profileV.php
        author : Hugo.P
        started on : 12/11/2019
        brief : view page profile
    */
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil | NoOx</title>
</head>
<body>
<header>
    <div id="HeaderContainer"></div>
</header>
<main>
    <section id="ProfileContainer">
        <div id="ProfileTitle"> Mon profil </div>
        <div id="ListProfile">
            <div class="ProfileLine">
                <p class="CategoryName"> Nom </p>
                <p class="Value"><?php //getlastName(); ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Prénom </p>
                <p class="Value"><?php //getName(); ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Pseudo </p>
                <p class="Value"><?php //getPseudo() ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> e-mail </p>
                <p class="Value"><?php //getMail() ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Mot de passe </p>
                <p class="Value"><?php //getPassword() ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Statut </p>
                <p class="Value"><?php //getStatus() ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Rang communautaire </p>
                <p class="Value"><?php //getRank() ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Langue </p>
                <p class="Value"><?php //getLanguage() ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Adresse </p>
                <p class="Value"><?php //getAdresse() ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Téléphone </p>
                <p class="Value"><?php //getPhone() ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Date de naissance </p>
                <p class="Value"><?php //getBirthDate() ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Site web </p>
                <p class="Value"><?php //getWebSite() ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Première connexion </p>
                <p class="Value"><?php //getFirstConnexion() ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Dernière connexion </p>
                <p class="Value"><?php //getLastConnexion() ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Portrait </p>
                <p class="Value"><?php //getPortrait() ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Civilité </p>
                <p class="Value"><?php //getCivility() ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Signature </p>
                <p class="Value"><?php //getSignature() ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Présentation </p>
                <p class="Value"><?php //getPresentation() ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Fuseau horaire </p>
                <p class="Value"><?php //getTimeZone() ?></p>
            </div>
            <div class="ProfileLine">
                <p class="CategoryName"> Devise </p>
                <p class="Value"><?php //getCurrency() ?></p>
            </div>
        </div>
    </section>
</main>
<footer>
</footer>
</body>
</html>