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
                $contentFileJson = file_get_contents('./public/assets/js/skills.json');
                $skills = json_decode($contentFileJson, true);
                for($i = 0; $i < count($skills); $i++)
                {
                    echo '<area shape="poly" coords="' . $skills[$i]['coords'] . '" alt="' . $skills[$i]['name'] . '" title="' . $skills[$i]['name'] . '" onclick="openPopup(' . $skills[$i]['id'] . ')"/>';
                }
                ?>

            <!-- <area target="" alt="Art martial" title="Art martial" onclick="openPopup(1)" coords="159,252,232,217,261,243,181,279" shape="poly">
            <area target="" alt="" title="" href="#2" coords="289,260,274,229,352,204,366,235" shape="poly">
            <area target="" alt="" title="" href="#3" coords="201,340,277,302,295,328,218,368" shape="poly">
            <area target="" alt="" title="" href="#4" coords="288,299,296,327,371,303,361,276" shape="poly">
            <area target="" alt="" title="" href="#5" coords="368,273,445,254,461,280,380,302" shape="poly">
            <area target="" alt="" title="" href="#6" coords="394,222,455,207,464,235,403,252" shape="poly">
            <area target="" alt="" title="" href="#7" coords="413,350,481,328,499,356,419,381" shape="poly">
            <area target="" alt="" title="" href="#8" coords="303,450,323,480,396,422,370,394" shape="poly">
            <area target="" alt="" title="" href="#9" coords="240,443,260,478,333,420,307,394" shape="poly">
            <area target="" alt="" title="" href="#10" coords="187,413,207,448,280,390,254,364" shape="poly">
            <area target="" alt="" title="" href="#11" coords="81,374,105,411,182,349,154,325" shape="poly">
            <area target="" alt="" title="" href="#12" coords="498,242,500,274,600,258,584,230" shape="poly">
            <area target="" alt="" title="" href="#13" coords="531,194,538,229,631,220,614,187" shape="poly">
            <area target="" alt="" title="" href="#14" coords="570,266,577,301,670,290,653,259" shape="poly">
            <area target="" alt="" title="" href="#15" coords="613,299,620,334,713,323,696,292" shape="poly">
            <area target="" alt="" title="" href="#16" coords="659,180,661,218,745,215,742,180" shape="poly">
            <area target="" alt="" title="" href="#17" coords="703,91,705,129,789,126,786,91" shape="poly">
            <area target="" alt="" title="" href="#18" coords="873,139,870,174,958,179,954,144" shape="poly">
            <area target="" alt="" title="" href="#19" coords="789,214,791,249,882,247,877,214" shape="poly">
            <area target="" alt="" title="" href="#20" coords="842,251,919,251,917,286,847,281" shape="poly">
            <area target="" alt="" title="" href="#21" coords="834,292,905,294,901,325,835,322" shape="poly">
            <area target="" alt="" title="" href="#22" coords="763,319,828,320,830,352,764,349" shape="poly">
            <area target="" alt="" title="" href="#23" coords="1022,192,1101,204,1091,236,1015,225" shape="poly">
            <area target="" alt="" title="" href="#24" coords="941,297,1022,308,1015,339,934,330" shape="poly">
            <area target="" alt="" title="" href="#25" coords="975,342,1063,361,1052,391,963,370" shape="poly">
            <area target="" alt="" title="" href="#26" coords="1054,274,1123,289,1112,319,1040,302" shape="poly">
            <area target="" alt="" title="" href="#27" coords="1107,203,1100,238,1161,249,1167,214" shape="poly">
            <area target="" alt="" title="" href="#28" coords="1138,171,1129,205,1205,217,1210,182" shape="poly">
            <area target="" alt="" title="" href="#29" coords="1201,222,1187,253,1268,278,1282,248" shape="poly">
            <area target="" alt="" title="" href="#30" coords="1163,257,1150,285,1222,308,1236,278" shape="poly">
            <area target="" alt="" title="" href="#31" coords="1129,292,1119,320,1175,338,1189,310" shape="poly">
            <area target="" alt="" title="" href="#32" coords="1074,320,1064,348,1120,366,1134,338" shape="poly">-->
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
            var requestURL = '<?= $this->getRootReturn(); ?>public/assets/js/skills.json';
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


        <script src="<?= $this->getRootReturn(); ?>public\assets\js\ajax.js"></script>
        <script src="<?= $this->getRootReturn(); ?>public\assets\js\skills.js"></script>

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