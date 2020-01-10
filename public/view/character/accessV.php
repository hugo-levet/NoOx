<?php
/*  
    title : accessV.php
    author : Audrey
    started-on : 20/12/2019

    brief : view access Charact page
*/

$listStyles = ['character/accessFP.css', 'character/templateFP.css'];
$listJS = [];


ob_start();

?>


<main>
    <section id="accessContainer">
        <div id="mainCircle">
            <div class="access" id="combat">
                <p class="accessTitle">Combat</p>
                <form action="" method="post" class="formRating">
                    <input type="hidden" name="categorie" value="combat accreditation">
                    <fieldset class="rating">
                        <?php
                            for($i = 4; $i !=0; --$i) {
                                if ($character->getAccess('combat accreditation') == $i) {
                                    $checked = 'checked="checked';
                                } else {
                                    $checked = '';
                                }
                        ?>
                            <input type="radio" id="COM<?=$i?>" name="valueInput" <?=$checked?>class="rating" value="<?=$i?>"><label for="COM<?=$i?>"><i class="fas fa-circle"></i></label>
                        <?php
                            }
                        ?>
                    </fieldset>
                </form>
            </div>
            <div class="access" id="nature">
                <p class="accessTitle">Nature</p>
                <form action="" method="post" class="formRating">
                    <input type="hidden" name="categorie" value="nature accreditation">
                    <fieldset class="rating">
                        <?php
                            for($i = 4; $i !=0; --$i) {
                                if ($character->getAccess('nature accreditation') == $i) {
                                    $checked = 'checked="checked';
                                } else {
                                    $checked = '';
                                }
                        ?>
                            <input type="radio" id="NAT<?=$i?>" name="valueInput" <?=$checked?>class="rating" value="<?=$i?>"><label for="NAT<?=$i?>"><i class="fas fa-circle"></i></label>
                        <?php
                            }
                        ?>
                    </fieldset>
                </form>
            </div>            
            <div class="access" id="psychurgie">
                <p class="accessTitle">Psychurgie</p>
                <form action="" method="post" class="formRating">
                    <input type="hidden" name="categorie" value="psychurgy accreditation">
                    <fieldset class="rating">
                        <?php
                            for($i = 4; $i !=0; --$i) {
                                if ($character->getAccess('psychurgy accreditation') == $i) {
                                    $checked = 'checked="checked';
                                } else {
                                    $checked = '';
                                }
                        ?>
                            <input type="radio" id="PSY<?=$i?>" name="valueInput" <?=$checked?>class="rating" value="<?=$i?>"><label for="PSY<?=$i?>"><i class="fas fa-circle"></i></label>
                        <?php
                            }
                        ?>
                        
                    </fieldset>
                </form>
            </div>            
            <div class="access" id="sciences">
                <p class="accessTitle">Sciences</p>
                <form action="" method="post" class="formRating">
                    <input type="hidden" name="categorie" value="science accreditation">
                    <fieldset class="rating">
                        <?php
                            for($i = 4; $i !=0; --$i) {
                                if ($character->getAccess('science accreditation') == $i) {
                                    $checked = 'checked="checked';
                                } else {
                                    $checked = '';
                                }
                        ?>
                            <input type="radio" id="SCI<?=$i?>" name="valueInput" <?=$checked?>class="rating" value="<?=$i?>"><label for="SCI<?=$i?>"><i class="fas fa-circle"></i></label>
                        <?php
                            }
                        ?>
                    </fieldset>
                </form>
            </div>
            <div class="access" id="social">
                <p class="accessTitle">Social</p>
                <form action="" method="post" class="formRating">
                    <input type="hidden" name="categorie" value="social accreditation">
                    <fieldset class="rating">
                        <?php
                            for($i = 4; $i !=0; --$i) {
                                if ($character->getAccess('social accreditation') == $i) {
                                    $checked = 'checked="checked';
                                } else {
                                    $checked = '';
                                }
                        ?>
                            <input type="radio" id="SOC<?=$i?>" name="valueInput" <?=$checked?>class="rating" value="<?=$i?>"><label for="SOC<?=$i?>"><i class="fas fa-circle"></i></label>
                        <?php
                            }
                        ?>
                    </fieldset>
                </form>
            </div>
            <div class="access" id="soutien">
                <p class="accessTitle">Soutien</p>
                <form action="" method="post" class="formRating">
                    <input type="hidden" name="categorie" value="support accreditation">
                    <fieldset class="rating">
                        <?php
                            for($i = 4; $i !=0; --$i) {
                                if ($character->getAccess('support accreditation') == $i) {
                                    $checked = 'checked="checked';
                                } else {
                                    $checked = '';
                                }
                        ?>
                            <input type="radio" id="SOU<?=$i?>" name="valueInput" <?=$checked?>class="rating" value="<?=$i?>"><label for="SOU<?=$i?>"><i class="fas fa-circle"></i></label>
                        <?php
                            }
                        ?>
                    </fieldset>
                </form>
            </div>
            <div class="access" id="technologie">
                <p class="accessTitle">Technologie</p>
                <form action="" method="post" class="formRating">
                    <input type="hidden" name="categorie" value="technical accreditation">
                    <fieldset class="rating">
                        <?php
                            for($i = 4; $i !=0; --$i) {
                                if ($character->getAccess('technical accreditation') == $i) {
                                    $checked = 'checked="checked';
                                } else {
                                    $checked = '';
                                }
                        ?>
                            <input type="radio" id="TEC<?=$i?>" name="valueInput" <?=$checked?>class="rating" value="<?=$i?>"><label for="TEC<?=$i?>"><i class="fas fa-circle"></i></label>
                        <?php
                            }
                        ?>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>

</main>

<?php
$content=ob_get_clean();
require('templateV.php');
?>