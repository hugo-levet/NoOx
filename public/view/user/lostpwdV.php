<?php
    /*
        title : profileV.php
        author : Celia.H
        started on :
        brief : view page lostpwd
    */
?>
 <form method="POST" action="../../../server/controller/user/loginC.php">
     <label>Mail : </label>
     <input type="text" name="lostPwdMail" required>
     <input type="submit" placeholder="Envoyer" name="lostPwdSubmit" value="submit">
 </form>