<?php
/*
title : spheringSkillsV.php
author : Hugo.L
started on : 03/12/2019
brief : sphering skills view
*/

$title = 'Sphérier de compétences';
?>
        <h1>Sphérier de compétences</h1>
        <!-- <img src="<?= $this->getRootReturn(); ?>public/assets/images/sphering_skills.jpg" alt="sphering_skills" usemap="#map" /> -->
        <!-- <img src="<?= $this->getRootReturn(); ?>public/assets/images/sphérié-de-compétance-revus-24032019.svg" usemap="#image-map"> -->
        <img src="<?= $this->getRootReturn(); ?>public/assets/images/spherier.png" usemap="#image-map" id="spheringSkillsImg">
        
        <map name="image-map">
                <?php
                //load file json
                $contentFileJson = file_get_contents('./public/assets/js/parangon/skills.json');
                $skills = json_decode($contentFileJson, true);
                for($i = 0; $i < count($skills); $i++)
                {
                    echo '<area shape="poly" coords="' . $skills[$i]['coords'] . '" alt="' . $skills[$i]['name'] . '" title="' . $skills[$i]['name'] . '" onclick="openPopup(' . $skills[$i]['id'] . ')"/>';
                }
                ?>
        </map>

        <div id="popup">
            <button onclick="closePopup()">x</button>
            <h2>Compétence ???</h2>
            <div id="lesronds"></div>
            <div>
                <button id="moins">-</button>
                <button id="plus">+</button>
            </div>
        </div>
        <div id="controlButton">
                <button id="zoom" onclick="zoom()">+</button>
                <button id="zoomOut" onclick="zoomOut()">-</button>
        </div>
        <script>
            spheringSkillsImg = document.getElementById('spheringSkillsImg');
            spheringSkillsImg.width = window.innerWidth;
            
        function changeCoordsArea()
        {
            //modifier chaque coordonnée de la map de l'image
            
            //recuperer les coords en json
            var requestURL = '<?= $this->getRootReturn(); ?>public/assets/js/parangon/skills.json';
            var request = new XMLHttpRequest();
            request.open('GET', requestURL);
            request.responseType = 'json';
            request.send();
            request.onload = function() {
                areaJson = request.response;

                resolution = spheringSkillsImg.width / 1587;
                //for tous les area
                for(var i = 0; i < document.getElementsByName('image-map')[0].children.length-1; i++)
                {
                    aArea = document.getElementsByName('image-map')[0].children[i];
                    //on prend se qui correspond en json
                    aAreaJson = areaJson[i];

                    coords = aAreaJson['coords'].split(',');
                    //on y multiplie par la resolution
                    coords.forEach(function(element, index){
                        coords[index] = Math.floor(element * resolution);
                    });
                    //on y remet dans coords
                    aArea.coords = coords.join(',');
                }
            }
        }

        function zoom()
        {
            console.log('zoom');
            spheringSkillsImg.width *= 1.16666;

            //modifier chaque coordonnée de la map de l'image
            changeCoordsArea();
        }

        function zoomOut()
        {
            console.log('zoomOut');
            spheringSkillsImg.width *= 0.85714775513;

            if(spheringSkillsImg.width < window.innerWidth)
            {
                spheringSkillsImg.width = window.innerWidth;
                //modifier chaque coordonnée de la map de l'image
                changeCoordsArea();
            }
            else
            {
                //modifier chaque coordonnée de la map de l'image en mettant ceux de l'image de base TODO
                changeCoordsArea();
            }
        }
        </script>


        <script src="<?= $this->getRootReturn(); ?>public\assets\js\parangon/ajax.js"></script>
        <script src="<?= $this->getRootReturn(); ?>public\assets\js\parangon/skills.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        
        <script>
            $(function(){
                console.log('jQuery est prêt !');
                
                //le rapport de  map pour l'image
                reduction = $('#spheringSkillsImg').width() / 1587;
                $('map').children('area').each(function(index){
                    // divise la chaine de caractere des coordonnées en tableau
                    tabCoords = $(this).attr('coords').split(',');

                    // multiplie chaque coordonnées
                    tabCoords.forEach(function(element, index){
                        tabCoords[index] = Math.floor(element * reduction);
                    });

                    //applique les changements
                    $(this).attr('coords', tabCoords.join(','));

                });

                $("#plus").click(function(){
                    console.log('plus');
                    console.log('currentComp[\'id\']' + currentCompJson['id']);
                    $.ajax({
                        url : '<?= $this->getRootReturn(); ?>parangon/AddSkill', // La ressource ciblée
                        type : 'POST', // Le type de la requête HTTP.
                        data : 'comp_id=' + currentCompJson['id'],
                        dataType : 'text',
                        success : function(text, statut){
                            console.log(text);
                            if(text[0] != '/')
                            {
                                console.log('text[2] ' + text[2]);
                                
                                updateBd();
                            }
                            else
                            {
                                console.log('Cette compétence ne peut pas être ajouté.');
                            }
                            
                        },
                        error : function(resultat, statut, erreur){
                            
                        },

                        complete : function(resultat, statut){

                        }
                    });
                });

                $("#moins").click(function(){
                    console.log('moins');
                    console.log('currentComp[\'id\']' + currentCompJson['id']);
                    $.ajax({
                        url : '<?= $this->getRootReturn(); ?>parangon/RemoveSkill', // La ressource ciblée
                        type : 'POST', // Le type de la requête HTTP.
                        data : 'comp_id=' + currentCompJson['id'],
                        dataType : 'text',
                        success : function(text, statut){
                            console.log(text);
                            if(text[0] != '/')
                            {
                                console.log('text[2] ' + text[2]);
                                updateBd();
                            }
                            else
                            {
                                console.log('Cette compétence ne peut pas être enlevé.');
                            }
                            
                        },
                        error : function(resultat, statut, erreur){
                            
                        },

                        complete : function(resultat, statut){

                        }
                    });
                });

                function updateBd()
                {
                    $.ajax({
                        url : '<?= $this->getRootReturn(); ?>parangon/updateDb', // La ressource ciblée
                        type : 'POST', // Le type de la requête HTTP.
                        dataType : 'json',
                        success : function(text, statut){
                            console.log(text);
                            lesCompetences = text;
                            if(typeof currentCompJson != 'undefined')
                            {
                                currentComp = trouverComp(currentCompJson["id"]);
                                // currentComp['level'] = text[2];//TO AMELIORE
                                createRond(currentCompJson);
                            }
                        },
                        error : function(resultat, statut, erreur){
                            console.log('json : erreur' + erreur);    
                        },
                        complete : function(resultat, statut){
                        
                        }
                    });
                }
                updateBd();
            });
        </script>