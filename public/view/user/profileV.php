<?php
/*
        title : profileV.php
        author : Hugo.P
        started on : 12/11/2019
        brief : view page profile
    */
?>
<!DOCTYPE html>
<head>
</head>
<body>
    <!-- Modifier de mot de passe -->
    <form method="post" action="#">
        <fieldset>
            <legend>modification mot de passe</legend>
            <div>
                <label for="ancienMdp">Ancien mot de passe :</label><input type="password" name="ancienMdp">
            </div>
            <div>
                <label for="nouveauMdp">Nouveau mot de passe :</label><input type="password" name="nouveauMdp">
            </div>
            <div>
                <label for="nouveauMdpBis">Répéter votre mot de passe :</label><input type="password" name="nouveauMdpBis">
            </div>
            <button type="submit" name="modificationMdp" value="modificationMdp">modifier</button>
        </fieldset>
    </form>

    <!-- Modifier de pseudo -->
    <form method="post" action="#">
        <fieldset>
            <legend>modification pseudo</legend>
            <div>
                <label for="ancienPseudo">Pseudo actuel :</label>
            </div>
            <div>
                <label for="nouveauPseudo">Nouveau Pseudo :</label><input type="text" name="nouveauPseudo">
            </div>
            <button type="submit" name="modificationPseudo" value="modificationPseudo">modifier</button>
        </fieldset>
    </form>

    <!-- Modifier de Mail -->
    <form method="post" action="#">
        <fieldset>
            <legend>modification mail</legend>
            <div>
                <label for="ancienMdp">Adresse mail actuelle :</label>
            </div>
            <div>
                <label for="nouveauMail">Nouvelle adresse mail :</label><input type="email" name="nouveauMail">
            </div>
            <button type="submit" name="modificationMail" value="modificationMail">modifier</button>
        </fieldset>
    </form>

    <form class="deconnexion" action="" method="post">
        <button class="deconnexion" type="submit" name="deconnexion" value="deconnexion">se deconnecter</button>
    </form>
</body>
</html>
