<?php
    /*  
        title : viewingV.php
        author : Audrey
        started-on : 03/12/2020

        brief : view scenario viewing
    */

    $listStyles = ['scenario/viewing.css']; 
    $listJS= [];
    ob_start();
?>

<main>
    <div class="PageTitle">
        Nom du scénario
    </div>
    <section id="viewingContainer">
        <div id="leftSide">
            <img src="./dès.png" alt="Image du scénario" id="imageScenario">
            <div>
                <img src="../../assets/other/pdf.png" alt="PDF" id="pdf">
            </div>
        </div>
        <div id="rightSide">
            <div id=bloc>
                <p class="paragraph">
                    Campagne :
                </p>
                <p class="paragraph">
                    Cycle :
                </p>
                <p class="paragraph">
                    Note :
                </p>
                <p class="paragraph">
                    Autheur :
                </p>
                <p class="paragraph">
                    Date :
                </p>
                <p class="paragraph">
                    Localisation :
                </p>
            </div>
            <div id="description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita voluptatibus eaque architecto itaque voluptatum tempora. Quam ad nemo, aspernatur incidunt molestiae ipsa. Doloribus nostrum necessitatibus dignissimos voluptas aspernatur rem nesciunt.</p>
            </div>
        </div>
    </section>
    <section id=comment>
        <p>
            Espace commentaire
        </p>
        <div class="numCom">
            <p class="commentText">
                1 er commentaire
            </p>
            <div class="bottomPart">
                <p>
                    author
                </p>
                <p>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                </p>
                <p>
                   date
                </p> 
            </div>
        </div>
        <div class="numCom">
            <p>
                2 eme commentaire
            </p>
            <div>
                <p>
                    author
                </p>
                <p>
                    date
                </p>
                <p>
                    note
                </p>
            </div>
        </div>

    </section>
</main>
    


<?php 
    $content = ob_get_clean();
    require(__DIR__.'/../template.php') 
?>