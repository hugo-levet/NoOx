<?php
/*  
    title : creareCharact.php
    author : Audrey
    started-on : 24/12/2019

    brief : view announce
*/

$listStyles = ['announce/announce.css'] ;
$listJS =[];
ob_start();

?>

<main>
    <div class="PageTitle">
        Dernières annonces
    </div>
    <section id=announceContainer>
    <?php
        for ($i = $start ; $i <= $end; ++$i) {
    ?>
        <div class="announce">
            <div class="announceIcon">
                <i class="fas fa-bullhorn"></i>
            </div>
            <div class="announceContent">
                <div class="announceTitle">
                    <h1> <?= $announceList->getTitle($i); ?> </h1>
                </div>
                <div class="announceDescription">
                    <p> 
                        <?=
                            $announceList->getDescription($i);
                        ?>
                    </p>
                </div>
                <div class="announceDate">
                    <p>posté le <?= $announceList->getDate($i); ?></p>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
    <div id="pageControl">
        <?php if ($start != 0) {
            
        ?>

            <a href="/server/controller/announce/announceC.php?page=<?=($page - 1)?>">
                <i class="fas fa-arrow-left announceIcon"></i>
            </a>
        <?php } ?>
        <?php if (($start-$end) != 4) {     
        ?>
            <a href="/server/controller/announce/announceC.php?page=<?=($page + 1)?>">
                <i class="fas fa-arrow-right announceIcon"></i>
            </a>
        <?php } ?>

    </div>
    </section>
    <section id="linkContainer"> 
        <div class= "PageTitle">
            Liens divers
        </div>
        <a id="linkWiki" class="banner" target="_blank" href="">
            <i class="fab fa-wikipedia-w icon"></i>
            Wikipédia
        </a>
        <a id="linkShop" class="banner" target="_blank" href="">
            <i class="fas fa-shopping-bag icon"></i>
            Boutique 
        </a>
        <a id="feedback" class="banner" target="_blank" href="https://goo.gl/forms/vBgB5sDCZS">
            <i class="fas fa-comment-dots icon"></i>
            Retour d'expérience
        </a>
        

    </section>


</main>

<?php
    $content=ob_get_clean();
    require(__DIR__.'/../template.php');
?>