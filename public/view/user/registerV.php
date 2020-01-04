<?php
/*
    title : registerV.php
    author : Julien
    started on :
    brief : view page d'inscription
*/

$listStyles = ['user/register.css'] ;
$listJS =[''];
$title = 'Inscription';

ob_start();

?>
<div id="Register">
    <main>
        <div id="LogoRegister">
            <a href="#"><img src="../../../public/assets/other/NoOxLogo.png" id="Nooxlogo"></a>
        </div>
        <section id="FormRegister">
            <form method="POST" action="/../../../server/controller/user/registerC.php">
                <input type="text" name="pseudo" placeholder="*Pseudo" required="required" class="FormInput">
                <input type="email" name="email" placeholder="*E-mail" required="required" class="FormInput">
                <input type="password" pattern=".{8,}" name="password" placeholder="*Mot de passe" required title="Le mot de passe doit contenir au moins 8 caractères" class="FormInput">
                <input type="password" pattern=".{8,}" name="password2" placeholder="*Confirmer Mot de passe" required title="Le mot de passe doit contenir au moins 8 caractères" class="FormInput">
                <input type="date" name="birthday" required="required" class="FormInput">
                <select name="status" class="FormInput">
                    <option value="Parangon" name="Parangon">Parangon</option>
                    <option value="Avatar" name="Avatar">Avatar</option>
                    <option value="Aéraphin" name="Aéraphin">Aéraphin</option>
                    <option value="Architecte" name="Architecte">Architecte</option>
                    <option value="Ishvara" name="Ishvara">Ishvara</option>
                </select>
                <select name="languagecode" class="FormInput">
                    <option value="0" name="0">Choisissez votre langue</option>
                    <option value="fr" name="French">fr</option>
                    <option value="en" name="English">en</option>
                </select>
                <input type="text" name="civility" placeholder="Civilité" maxlength="7" class="FormInput">
                <input type="text" name="surname" placeholder="Nom" class="FormInput">
                <input type="text" name="firstname" placeholder="Prénom" class="FormInput">
                <input type="text" name="adress" placeholder="Adresse" class="FormInput">
                <input type="text" name="city" placeholder="Ville" class="FormInput">
                <input type="tel" name="phone" placeholder="Téléphone" class="FormInput">
                <input type="text" name="portrait" placeholder="Portrait" class="FormInput">
                <textarea name="presentation" placeholder="Présentez vous !" rows="4" cols="40" class="FormInput"></textarea><br>
                <div id="SubmitRegister">
                    <input type="submit" value="S'inscrire" name="submit" class="ButtonRegister">
                </div>
                <?php echo $error; ?>
            </form>
            <p id="LoginRegister">
                Vous possédez déjà un compte ? <a id="LoginButton" href="#">Se connecter</a>
            </p>
        </section>
    </main>
</div>

<?php
$content=ob_get_clean();
require(__DIR__.'/../template.php')
?>





