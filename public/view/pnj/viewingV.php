<?php
    /*  
        title : viewingV.php
        author : Audrey
        started-on : 03/12/2020

        brief : view PNJ viewing
    */

    $listStyles = ['scenario/viewing.css']; 
    $listJS= [];
    ob_start();
?>

<main>
    <div class="PageTitle">
         <?= $viewingList->getName(0); ?>
    </div>
    <section id="viewingContainer">
        <div id="leftSide">
            <img src="../../../public/assets/other/upload/<?=$viewingList->getImage(0);?>" alt="Image du scénario" id="imageScenario">
            <div>
                <a href="/public/assets/other/upload/<?=$viewingList->getDocument(0);?>" target="_blank">
                    <img src="../../../public/assets/other/pdf.png" alt="PDF" id="pdf">
                </a>
            </div>
        </div>
        <div id="rightSide">
            <div id=bloc>
                <p class="paragraph">
                    Cycle : <?= $viewingList->getCycle(0) ; ?>
                </p>
                <p class="paragraph">
                    Note : <?= $viewingList->getGrade(0)?> / 5
                </p>
                <p class="paragraph">
                    Auteur : <?= $viewingList->getAuthor(0); ?>
                </p>
                <p class="paragraph">
                    Localisation : <?= $viewingList->getLocation(0);?>
                </p>
            </div>
        </div>
    </section>
    <section id=comment>
        <p id="sectionTitle">
            Espace commentaires
        </p>
        <?php
            $listCom = $viewingList->getComs();
            for ($i = 0; $i < sizeof($listCom->getIds()); ++$i) {
        ?>
            <div class="numCom">
                <p class="commentText">
                    <?= $listCom->getMessage($i); ?>
                </p>
                <div class="bottomPart">
                    <p>
                        <?= $listCom->getUser($i); ?>
                    </p>
                    <p>
                        <?php
                            $grade = $listCom->getGrade($i);
                            
                            ?>
                                <span class="gradeNumber"><?=$grade ?></span>
                            <?php
                            for ($j = 0; $j < 5; ++$j) {
                                if ($grade == 0) {
                                    $class = '';
                                } else if ($grade > 0 && $grade < 1) {
                                    $class = ' statDemi';
                                    $grade = 0;
                                } else {
                                    $class = ' statAll';
                                    $grade -= 1;
                                }
                            ?>
                                <i class="fas fa-star star <?=$class?>"></i>
                            <?php }
                        ?>
                    </p>
                    <p>
                        <?= $listCom->getDate($i); ?>
                    </p> 
                </div>
            </div>
            <?php } ?>

            <?php 

            if (!in_array($_SESSION['userID'], $listCom->getUserIds())) {?>
                <div id="createCommentContainer">
                    <form action="" method="post">
                        <div id="leftSide">
                            <label for="messageInput" class="formLabel">Votre Message</label>
                            <textarea name="message" id="messageInput" cols="30" rows="10"></textarea>
                        </div>
                        <div id="rightSide">
                            <label for="ratingContainer" class="formLabel">Votre note</label>
                            <div id="ratingContainer" class="rating">
                                <?php
                                    for ($i = 5; $i > 0; --$i) {
                                ?>
                                    <input type="radio" name="rating" id="ratingStar<?=$i?>" value="<?=$i?>">
                                    <label for="ratingStar<?=$i?>" class="rating"><i class="fas fa-star star"></i></label>
                                <?php } ?>
                            </div>
                            <button type="submit" id="submitButton" name="submit">Commenter</button>
                        </div>
                    </form>
                </div>
            <?php } else {?>
                    <p class="alreadyVote">
                        Vous avez déja voté ce scénario.
                    </p>
            <?php } ?>
    </section>
</main> 
    


<?php 
    $content = ob_get_clean();
    require(__DIR__.'/../template.php') 
?>