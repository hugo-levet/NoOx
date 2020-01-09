<?php
    /*
        title : lostpwdV.php
        author : Celia.H
        started on :
        brief : view page lost password
    */

if(!isset($_GET['token'])){ ?>
    <form method="POST">
        <input style="border: 0px" type="text" name="lostPwdMail" placeholder="Adressse mail" required>
        <input type="submit" placeholder="Envoyer" name="lostPwdSubmit" value="Envoyer">
    </form>

<?php }

elseif(isset($_GET['token'])){ ?>
    <form method="POST">
        <input style="border: 0px" type="password" name="newPwd" placeholder="Nouveau mot de passe">
        <input style="border: 0px" type="password" name="verifPwd" placeholder="Confirmation mot de passe">
        <input type="submit" placeholder="Confirmer" name="ConfPwd" value="Confirmer">
    </form>

<?php } ?>