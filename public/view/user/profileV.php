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
        <div id="ProfileTitle"> Modifier mon profil </div>
        <br>
        <div id="ListProfile">
            <!-- Modifier le nom -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Nom</legend>
                    <div>
                        <label for="oldSurname">Nom actuel : <?php echo $surname; ?> </label>
                    </div>
                    <div>
                        <label for="newSurname">Nouveau nom :</label><input type="text" name="newSurname">
                    </div>
                    <button type="submit" name="modificationSurname" value="modificationSurname">modifier</button>
                </fieldset>
            </form>
            <br>
            <!-- Modifier le prenom -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Prénom</legend>
                    <div>
                        <label for="oldName">Prénom actuel : <?php echo $name; ?></label>
                    </div>
                    <div>
                        <label for="newName">Nouveau prénom :</label><input type="text" name="newName">
                    </div>
                    <button type="submit" name="modificationName" value="modificationName">modifier</button>
                </fieldset>
            </form>
            <br>
            <!-- Modifier le pseudo -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Pseudo</legend>
                    <div>
                        <label for="oldPseudo">Pseudo actuel : <?php echo $pseudo; ?></label>
                    </div>
                    <div>
                        <label for="newPseudo">Nouveau pseudo :</label><input type="text" name="newPseudo">
                    </div>
                    <button type="submit" name="modificationPseudo" value="modificationPseudo">modifier</button>
                </fieldset>
            </form>
            <br>
            <!-- Modifier le Mail -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Adresse e-mail</legend>
                    <div>
                        <label for="oldMdp">Mail actuel : <?php echo $mail; ?></label>
                    </div>
                    <div>
                        <label for="newMail">Nouveau mail :</label><input type="email" name="newMail">
                    </div>
                    <button type="submit" name="modificationMail" value="modificationMail">modifier</button>
                </fieldset>
            </form>
            <br>
            <!-- Modifier le mot de passe -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Mot de passe</legend>
                    <div>
                        <label for="oldPasWd">Mot de passe actuel :</label><input type="password" name="ancienPassWd">
                    </div>
                    <div>
                        <label for="newPassWd">Nouveau mot de passe :</label><input type="password" name="newPassWd">
                    </div>
                    <div>
                        <label for="newPassWdBis">Répétez votre mot de passe :</label><input type="password" name="newPassWdBis">
                    </div>
                    <button type="submit" name="modificationPassWd" value="modificationPassWd">modifier</button>
                </fieldset>
            </form>
            <br>
            <!-- Modifier le statut -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Statut</legend>
                    <div>
                        <label for="oldStatus">Statut actuel : <?php echo $status; ?></label>
                    </div>
                    <div>
                        <label for="newStatus">Nouveau statut :</label><input type="text" name="newStatus">
                    </div>
                    <button type="submit" name="modificationStatus" value="modificationStatus">modifier</button>
                </fieldset>
            </form>
            <br>
            <!-- Modifier le rang communautaire -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Rang communautaire</legend>
                    <div>
                        <label for="oldRank">Rang actuel : <?php echo $rank; ?></label>
                    </div>
                    <div>
                        <label for="newRank">Nouveau rang :</label><input type="text" name="newRank">
                    </div>
                    <button type="submit" name="modificationRank" value="modificationRank">modifier</button>
                </fieldset>
            </form>
            <br>
            <!-- Modifier la langue -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Langue</legend>
                    <div>
                        <label for="oldLanguage">Langue actuelle : <?php echo $language; ?></label>
                    </div>
                    <div>
                        <label for="newLanguage">Nouvelle langue :</label><input type="text" name="newLanguage">
                    </div>
                    <button type="submit" name="modificationLanguage" value="modificationLanguage">modifier</button>
                </fieldset>
            </form>
            <br>
            <!-- Modifier  l'adresse -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Adresse</legend>
                    <div>
                        <label for="oldAddress">Adresse actuelle : <?php echo $address; ?></label>
                    </div>
                    <div>
                        <label for="newAddress">Nouvelle Adresse :</label><input type="text" name="newAddress">
                    </div>
                    <button type="submit" name="modificationAddress" value="modificationAddress">modifier</button>
                </fieldset>
            </form>
            <br>
            <!-- Modifier le telephone -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Numéro de téléphone</legend>
                    <div>
                        <label for="oldPhone">Numéro actuel : <?php echo $phone; ?></label>
                    </div>
                    <div>
                        <label for="newPhone">Nouveau numéro :</label><input type="text" name="newPhone">
                    </div>
                    <button type="submit" name="modificationPhone" value="modificationPhone">modifier</button>
                </fieldset>
            </form>
            <br>
            <!-- Modifier la date de naissance -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Date de naissance</legend>
                    <div>
                        <label for="oldBirthDate">Date de naissance actuelle : <?php echo $birthDate; ?></label>
                    </div>
                    <div>
                        <label for="newBirthDate">Nouvelle date de naissance :</label><input type="text" name="newBirthDate">
                    </div>
                    <button type="submit" name="modificationBirthDate" value="modificationBirthDate">modifier</button>
                </fieldset>
            </form>
            <br>
            <!-- Modifier le site Web -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Site Web</legend>
                    <div>
                        <label for="oldWebSite">Site actuel : <?php echo $webSite; ?></label>
                    </div>
                    <div>
                        <label for="newWebSite">Nouveau site :</label><input type="text" name="newWebSite">
                    </div>
                    <button type="submit" name="modificationWebSite" value="modificationWebSite">modifier</button>
                </fieldset>
            </form>
            <br>
            <!-- première connexion -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Première connexion</legend>
                    <div>
                        <label for="oldFirstConnection">Première connexion le <?php echo $firstConnection; ?></label>
                    </div>
                </fieldset>
            </form>
            <br>
            <!-- dernière connexion -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Dernière connexion</legend>
                    <div>
                        <label for="oldLastConnection">Dernière connexion le <?php echo $lastConnection; ?></label>
                    </div>
                </fieldset>
            </form>
            <br>
            <!-- Modifier le portrait -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Portrait</legend>
                    <div>
                        <label for="oldPortrait">Portrait actuel : <?php echo $portrait; ?></label>
                    </div>
                    <div>
                        <label for="newPortrait">Nouveau portrait :</label><input type="text" name="newPortrait">
                    </div>
                    <button type="submit" name="modificationPortrait" value="modificationPortrait">modifier</button>
                </fieldset>
            </form>
            <br>
            <!-- Modifier la civilité -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Civilité</legend>
                    <div>
                        <label for="oldCivility">Civilité actuelle : <?php echo $civility; ?></label>
                    </div>
                    <div>
                        <label for="newCivility">Nouvelle civilité :</label><input type="text" name="newCivility">
                    </div>
                    <button type="submit" name="modificationCivility" value="modificationCivility">modifier</button>
                </fieldset>
            </form>
            <br>
            <!-- Modifier la signature -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Signature</legend>
                    <div>
                        <label for="oldSignature">Signature actuelle : <?php echo $signature; ?></label>
                    </div>
                    <div>
                        <label for="newSignature">Nouvelle signature :</label><input type="text" name="newSignature">
                    </div>
                    <button type="submit" name="modificationSignature" value="modificationSignature">modifier</button>
                </fieldset>
            </form>
            <br>
            <!-- Modifier la presentation -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Présentation</legend>
                    <div>
                        <label for="oldPresentation">Présentation actuelle : <?php echo $presentation; ?></label>
                    </div>
                    <div>
                        <label for="newPresentation">Nouvelle présentation :</label><input type="text" name="newPresentation">
                    </div>
                    <button type="submit" name="modificationPresentation" value="modificationPresentation">modifier</button>
                </fieldset>
            </form>
            <br>
            <!-- Modifier le fuseau horaire -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Fuseau horaire</legend>
                    <div>
                        <label for="oldTimeZone">Fuseau actuel : <?php echo $timeZone; ?></label>
                    </div>
                    <div>
                        <label for="newTimeZone">Nouveau fuseau :</label><input type="text" name="newTimeZone">
                    </div>
                    <button type="submit" name="modificationTimeZone" value="modificationTimeZone">modifier</button>
                </fieldset>
            </form>
            <br>
            <!-- Modifier la devise -->
            <form method="post" action="#">
                <fieldset>
                    <legend>Devise</legend>
                    <div>
                        <label for="oldCurrency">Devise actuelle : <?php echo $currency; ?></label>
                    </div>
                    <div>
                        <label for="newCurrency">Nouvelle devise :</label><input type="text" name="newCurrency">
                    </div>
                    <button type="submit" name="modificationCurrency" value="modificationCurrency">modifier</button>
                </fieldset>
            </form>
            <br>
        </div>
    </section>
</main>
<footer>
</footer>
</body>
</html>