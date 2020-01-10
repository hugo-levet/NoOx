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
                for ($i = 0; $i < sizeof($searchingList->getIds()); ++$i) {
                    
            ?>
            <div class="scenarioStyle"> 
                <div class="scenarioTitle">
                <?= $searchingList->getName($i); ?>
                </div> 
                <div class="imgDesScenario">
                    <div class="scenarioImage">
                        <img src="./dès.png" alt="image du scenario" class="img">
                    </div>
                    <div class="scenarioDescription">
                    <?= $searchingList->getDescription($i); ?>
                    </div>
                </div>
                <div class="scenarioStar">
                    <i class="far fa-star star"></i>
                    <i class="far fa-star star"></i>
                    <i class="far fa-star star"></i>
                    <i class="far fa-star star"></i>
                    <i class="far fa-star star"></i>
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
            <?php } ?>
       
        <div id="addScenario">
            <i class="fas fa-plus scenarioPlus"></i>
            <div>
                Ajoutez votre propre scénario !
            </div>
        </div>
     
    <div id="pageControl">
        <?php if ($start != 0) {
            
        ?>

            <a href="/server/controller/scenario/searchingC.php?page=<?=($page - 1)?>">
                <i class="fas fa-arrow-left searchingIcon"></i>
            </a>
        <?php } ?>
        <?php if (($start-$end) != 4) {     
        ?>
            <a href="/server/controller/scenario/searchingC.php?page=<?=($page + 1)?>">
                <i class="fas fa-arrow-right searchingIcon"></i>
            </a>
        <?php } ?>
        
    </section>
</main>

<?php 
    $content = ob_get_clean();
    require(__DIR__.'/../template.php') 
?>