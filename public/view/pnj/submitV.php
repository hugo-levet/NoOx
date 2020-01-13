<?php
    /*  
        title : submitV.php
        author : Audrey
        started-on : 03/01/2020

        brief : view PNJ submit
    */

    $listStyles = ['pnj/submit.css'];
    $listJS = [];
    ob_start();
?>

<main>
    <div class="PageTitle">
        Soumettre son PNJ
    </div>
    <section class="submitPnj">
        <form action="" id="infoForm" method="post" enctype="multipart/form-data">
            <div class="lineForm">
                <label for="nameInput">Nom de votre PNJ :</label>
                <input type="text" name="name" id="nameInput" placeholder="Nom du scénario">   
            </div>
            <div class="lineForm">
                <label for="keywordInput">Donnez des mots clé :</label>
                <input type="text" name="keyword" id="keywordInput" placeholder="Mots clé du scénario">
                <label for="cycleInput">Cycle de votre PNJ ?</label>
                <input type="text" name="cycle" id="cycleInput" placeholder="Cycle du scénario">
            </div>
            <div class="line" class="lineForm"> 
                <label for="localisationInput">Localisation du PNJ ?</label>
                <select name="localisation" id="localisationInput" class="formInput">
                    <option value="Solarus">Solarus</option>
                    <option value="Avalonia">Avalonia</option>
                    <option value="Ur">Ur</option>
                    <option value="Babylonia">Babylonia</option>
                    <option value="Lemuria">Lemuria</option>
                    <option value="Columbia">Columbia</option>
                    <option value="Mu">Mu</option>
                    <option value="Atlantis">Atlantis</option>
                    <option value="Sanctuaire">Sanctuaire</option>
                    <option value="Secret">Secret</option>
                    <option value="Autre">Autre</option>
                </select>
            </div>
            
            <div class="line">
                <label for="downloadImInput" class="labelFile">Téléchargez une image pour votre PNJ  <i class="fas fa-file-image icon"></i></label>
                <input type="file" name="downloadImg" class="inputFile"id="downloadImInput">
                
            </div>
            <div class="line"> 
                <label for="downloadPdfInput" class="labelFile">Téléchargez le pdf de votre PNJ  <i class="fas fa-file-download icon"></i></label>
                <input type="file" name="downloadPdf" class="inputFile"id="downloadPdfInput">
            </div>
            <button type="submit" id="button" name="submit">
                <b>ENVOYER</b> votre PNJ
                <i class="fas fa-share icon"></i>
            </button>
        </form>


    </section>
</main>

<?php 
    $content = ob_get_clean();
    require(__DIR__.'/../template.php') 
?>