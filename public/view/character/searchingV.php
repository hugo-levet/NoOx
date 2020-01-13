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
            <a href="/character/homepage&character=<?=$searchingList[$i]['id']?>" class="pnjStyle">
                <div class="pnjStyle"> 
                    <div class="pnjTitle">
                    <?= $searchingList[$i]['name']; ?>
                    </div> 
                    <div class="imgDesPnj">
                        <div class="pnjImage">
                            <img src="../../../public/assets/other/<?=$searchingList[$i]['race']?>.PNG" alt="image du pnj" class="img">
                        </div>
                    </div>
                    <div class="pnjAutDat">
                        <div class="charAuthor">
                            <p><?=$searchingList[$i]['gender']?>  </p>    
                            <p><?=$searchingList[$i]['years']?>  </p>                        
                            <p><?=$searchingList[$i]['race']?> </p>                        
                        </div>
                    </div>
                </div>
            </a>    
            <?php } ?>
       
            <div id="addPnj">
                <a href="/createCharacter/name" class="linkAdd">
                    <i class="fas fa-plus pnjPlus"></i>
                    <div>
                        Ajoutez votre propre personnage !
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