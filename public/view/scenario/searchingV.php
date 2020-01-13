<?php
    /*  
        title : searchingV.php
        author : Audrey
        started-on : 03/01/2020

        brief : view scenario searching
    */

    $listStyles = ['scenario/scenario.css'];
    $listJS = [];
    ob_start();
?>

<main>
    <div id="PageTitle">
        Scénarios
    </div>
    <section id="scenario">
        <div class="line">
            <?php
                for ($i = $start; $i <= $end; ++$i) {
                    
            ?>
            <a href="/scenario/viewing&scenario=<?=$searchingList->getId($i)?>" class="scenarioStyle">
                <div class="scenarioStyle"> 
                    <div class="scenarioTitle">
                    <?= $searchingList->getName($i); ?>
                    </div> 
                    <div class="imgDesScenario">
                        <div class="scenarioImage">
                            <img src="/../../../public/assets/other/upload/<?=$searchingList->getImage($i);?>" alt="image du scenario" class="img">
                        </div>
                        <div class="scenarioDescription">
                        <?= $searchingList->getDescription($i); ?>
                        </div>
                    </div>
                    <div class="scenarioStar">
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
                    <div class="scenarioAutDat">
                        <div class="scenarioauthor">
                            <p><?=$searchingList->getAuthor($i)?></p>                        
                        </div>
                        <div class="scenariodate">
                            <p><?= $searchingList->getDate($i); ?></p>
                        </div>
                    </div>
                </div>
            </a>    
            <?php } ?>
       
            <div id="addScenario">
                <a href="/scenario/submit" class="linkAdd">
                    <i class="fas fa-plus scenarioPlus"></i>
                    <div>
                        Ajoutez votre propre scénario !
                    </div>
                </a>
            </div>
        </div>
     
        <div id="pageControl">
            <?php if ($start != 0) {
                
            ?>

                <a href="/scenario/searching&page=<?=($page - 1)?>">
                    <i class="fas fa-arrow-left searchingIcon"></i>
                </a>
            <?php } ?>
            <?php if (($start-$end) != 4) {     
            ?>
                <a href="/scenario/searching&page=<?=($page + 1)?>">
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