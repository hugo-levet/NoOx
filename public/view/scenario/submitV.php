<?php
    /*  
        title : submitV.php
        author : Audrey
        started-on : 03/01/2020

        brief : view scenario submit
    */

    $listStyles = ['scenario/submit.css'];
    $listJS = [];
    ob_start();
?>

<main>
    <div class="PageTitle">
        Soumettre son scénario
    </div>
    <section class="submitScenario">
        <form action="" id="infoForm" method="post" enctype="multipart/form-data">
            <div class="lineForm">
                <label for="nameInput">Nom de votre scénario :</label>
                <input type="text" name="name" id="nameInput" placeholder="Nom du scénario">   
                <label for="campaignInput">Nom de votre campagne :</label>
                <input type="text" name="campaign" id="campaignInput" placeholder="Nom de la campagne">
            </div>
            <div class="lineForm">
                <label for="keywordInput">Donnez des mots clé :</label>
                <input type="text" name="keyword" id="keywordInput" placeholder="Mots clé du scénario">
                <label for="cycleInput">Cycle de votre scénario ?</label>
                <input type="text" name="cycle" id="cycleInput" placeholder="Cycle du scénario">
            </div>
            <div class="line" class="lineForm">
                <label for="alignmentInput">Alignement de l'avatar ?</label>
                <select name="alignement" id="alignmentInput" class="formInput">
                    <option value="agni">Agni</option>
                    <option value="surya">Sũrya</option>
                    <option value="vayu">Vãyu</option>
                </select>
                <label for="localisationInput">Localisation du scénario ?</label>
                <select name="localisation" id="localisationInput" class="formInput">
                    <option value="solarus">Solarus</option>
                    <option value="avalonia">Avalonia</option>
                    <option value="ur">Ur</option>
                    <option value="babylonia">Babylonia</option>
                    <option value="lemuria">Lemuria</option>
                    <option value="columbia">Columbia</option>
                    <option value="mu">Mu</option>
                    <option value="atlantis">Atlantis</option>
                    <option value="sanctuaire">Sanctuaire</option>
                    <option value="secret">Secret</option>
                    <option value="other">Autre</option>
                </select>
            </div>
            <div class="line">
                <label for="descriptionInput">Décrivez votre scénario : </label>
                <textarea name="description" id="descriptionInput" placeholder="Description du scénario"></textarea>
            </div>
            
            <div class="line">
                <label for="downloadImInput" class="labelFile">Téléchargez une image pour votre scénario  <i class="fas fa-file-image icon"></i></label>
                <input type="file" name="downloadImg" class="inputFile"id="downloadImInput">
                
            </div>
            <div class="line"> 
                <label for="downloadPdfInput" class="labelFile">Téléchargez le pdf de votre scénario  <i class="fas fa-file-download icon"></i></label>
                <input type="file" name="downloadPdf" class="inputFile"id="downloadPdfInput">
            </div>
            <button type="submit" id="button" name="submit">
                <b>ENVOYER</b> votre scénario
                <i class="fas fa-share icon"></i>
            </button>
        </form>


    </section>
</main>

<?php 
    $content = ob_get_clean();
    require(__DIR__.'/../template.php') 
?>