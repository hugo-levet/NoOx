<?php
    /*
        title : loginV.php 
        author : Celia.H
        started on : 
        brief : view page login
    */
?>

<form method="POST">
    <label>Identifiant : </label>
    <input type="text" name="login" required>
    <label>Mot de passe : </label>
    <input type="text" name="pwd">
    <input type="submit" value="Valider" name="submit">
    <input type="submit" value="Mot de passe oublié" name="lostpwd">
</form>
