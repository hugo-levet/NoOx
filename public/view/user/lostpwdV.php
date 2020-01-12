<?php
    /*
        title : lostpwdV.php
        author : Celia.H
        started on :
        brief : view page lost password
    */
?>
<form method="POST">
    <input style="border: 0px" type="text" name="lostPwdMail" placeholder="Adressse mail">
    <input type="submit" placeholder="Envoyer" name="lostPwdSubmit" value="Envoyer">
</form>

<?php
if(isset($error)){
    echo'<font color="red">'.$error.'</font>';
}
elseif (isset($send)){
    echo $send;
}
else{
    echo'<br>';
}