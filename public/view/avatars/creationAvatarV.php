<?php
/*
    title : creationAvatarV.php
    author : Hugo.L
    started on : 10/11/2019
    brief : view avatar creating page
*/
?>
<section id="avatarCreation">
    <h2>Avatar creation.</h2>
    <form method="post" action="../../../server/controller/avatar/CreationAvatarC.php">
        <div>
            <?php
            if($controller->isError('nameType'))
            {
            ?>
            <p class="error">Error nameType</p>
            <?php
            }
            if($controller->isError('nameLenght'))
            {
            ?>
            <p class="error">Error nameLenght</p>
            <?php
            }
            ?>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" maxlength="63" required>
        </div>

        <div>
            <?php
            if($controller->isError('alignement'))
            {
            ?>
            <p class="error">Error alignement</p>
            <?php
            }
            ?>
            <label for="alignement">Alignement</label>
            <select id="alignement" name="alignement" required>
                <option value="">Select</option>
                <option value="agni">Agni</option>
                <option value="sûrya">Sûrya</option>
                <option value="vâyu">Vûyu</option>
            </select>
        </div>

        <div>
            <label for="notes">Notes (optional)</label>
            <input type="text" id="notes" name="notes">
        </div>

        <div>
            <button type="submit" name="creationAvatar" value="creationAvatar">Create your avatar</button>
        </div>
    </form>
</section>
