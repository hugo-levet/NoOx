<?php
    /*
        title : loginV.php 
        author : Celia.H
        started on : 
        brief : view page login
    */
?>

<form method="POST">

    <input style="border:0px" type="text" name="mail" placeholder="Adresse mail">
    <input style="border:0px" type="password" name="pwd" placeholder="Mot de passe">
    <input type="submit" value="Valider" name="submit">
    <input type="submit" value="Mot de passe oublié" name="lostpwd">

</form>

<?php
if(isset($error)){
    echo'<font  color="red">'.$error.'</font>';
}
else{
    echo'<br>';
}
?>