<?php
/*
    title : registerV.php
    author : Julien
    started on :
    brief : view page d'inscription
*/
?>

<html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Mon Site</title>
</head>
<body>
<form method="POST" action="/../../../server/controller/user/registerC.php">
    <label>Pseudo : </label>
    <input type="text" name="pseudo"> <br>
    <label>E-mail : </label>
    <input type="email" name="email"><br>
    <label>Mot de passe : </label>
    <input type="password" name="password"><br>
    <label>Vérification du mot de passe : </label>
    <input type="password" name="password2"><br>
    <select name="status">
        <option value="">Selectionner un statut</option>
        <option value="Parangon" name="Parangon">Parangon</option>
        <option value="Avatar" name="Avatar">Avatar</option>
        <option value="Aéraphin" name="Aéraphin">Aéraphin</option>
        <option value="Architecte" name="Architecte">Architecte</option>
        <option value="Ishvara" name="Ishvara">Ishvara</option>
    </select><br>
    <label>Langue : </label>
    <input type="text" name="languagecode"><br>
    <label>Civilité : </label>
    <input type="text" name="civility"><br>
    <label>Nom : </label>
    <input type="text" name="surname"><br>
    <label>Prénom : </label>
    <input type="text" name="firstname"><br>
    <label>Adresse : </label>
    <input type="text" name="adress"><br>
    <label>Ville : </label>
    <input type="text" name="city"><br>
    <label>Numéro de téléphone : </label>
    <input type="tel" name="phone"><br>
    <label>Date de naissance : </label>
    <input type="date" name="birthday"><br>
    <label>Portrait : </label>
    <input type="text" name="portrait"><br>
    <textarea name="presentation" rows="4" cols="40">Présentez vous !</textarea><br>
    <input type="submit" value="S'inscrire" name="submit"> <br>

    <?php echo $error; ?>

</form>
</body>
</html>




