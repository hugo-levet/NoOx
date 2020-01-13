<?php
    /*  
        title : searchingV.php
        author : Audrey
        started-on : 03/01/2020

        brief : view PNJ searching
    */

    $listStyles = ['pnj/pnj.css'];
    $listJS = [];
    ob_start();
?>

<main>
    <div id="PageTitle">
        PNJs
    </div>
    <section id="pnj">
        <div class="line">
            <?php
                for ($i = $start; $i <= $end; ++$i) {
                    
            ?>
            <a href="/pnj/viewing&pnj=<?=$searchingList->getId($i)?>" class="pnjStyle">
                <div class="pnjStyle"> 
                    <div class="pnjTitle">
                    <?= $searchingList->getName($i); ?>
                    </div> 
                    <div class="imgDesPnj">
                        <div class="pnjImage">
                            <img src="../../../public/assets/other/upload/<?=$searchingList->getImage($i)?>" alt="image du pnj" class="img">
                        </div>
                    </div>
                    <div class="pnjStar">
                        <?php
                            $grade = $searchingList->getGrade($i);
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
                    </div>
                    <div class="pnjAutDat">
                        <div class="pnjAuthor">
                            <p><?=$searchingList->getAuthor($i)?></p>                        
                        </div>
                    </div>
                </div>
            </a>    
            <?php } ?>
       
            <div id="addPnj">
                <a href="/pnj/submit" class="linkAdd">
                    <i class="fas fa-plus pnjPlus"></i>
                    <div>
                        Ajoutez votre propre PNJ !
                    </div>
                </a>
            </div>
        </div>
     
        <div id="pageControl">
            <?php if ($start != 0) {
                
            ?>

                <a href="/pnj/searching&page=<?=($page - 1)?>">
                    <i class="fas fa-arrow-left searchingIcon"></i>
                </a>
            <?php } ?>
            <?php if (($start-$end) != 4) {     
            ?>
                <a href="/pnj/searching&page=<?=($page + 1)?>">
                    <i class="fas fa-arrow-right searchingIcon"></i>
                </a>
            <?php } ?>
        </div>
        
    </section>
</main>

<?php 
    $content = ob_get_clean();
    require(__DIR__.'/../template.php') 
?>