<?php
/*
title : spheringSkillsV.php
author : Hugo.L
started on : 03/12/2019
brief : sphering skills view
*/
<<<<<<< HEAD
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Test map image cliquable</title>
        <!-- <script>
            function openPopup()
            {
                console.log('ouverture');
                var popup = document.getElementById('popup');
                popup.style.display = "block";
            }

            function closePopup()
            {
                console.log('fermeture');
                var popup = document.getElementById('popup');
                popup.style.display = "none";
            }
        </script> -->
        <style type="text/css">
            area:hover  
            {
                cursor: pointer;
            }

            #popup
            {
                display: none;
                position: fixed;
                bottom: 0;
                background: white;
                border: 2px solid black;
                padding: 5px;
            }

            #lesronds{
                display: flex;
                flex-direction: row;
            }

            .rond{
                width : 10px;
                height : 10px;
                background: grey;
                margin: 2px;
                border-radius: 99px;
            }

            .knowledge{
                background: green;
            }

            .hermetic_capacity{
                background: purple;
            }

            .skill{
                background: blue;
            }

            .acquis{
                border: 2px solid black;
            }
        </style>
    </head>
    
    <body>
        <h1>Sphérier de compétences</h1>
        <!-- <img src="../public/assets/images/sphering_skills.jpg" alt="sphering_skills" usemap="#map" /> -->
        <!-- <img src="../public/assets/images/sphérié-de-compétance-revus-24032019.svg" usemap="#image-map"> -->
        <img src="../public/assets/images/sherier.png" usemap="#image-map"/>
=======

$title = 'Sphérier de compétences';
?>
        <h1>Sphérier de compétences</h1>
<<<<<<< HEAD
        <!-- <img src="<?= $this->getRootReturn(); ?>public/assets/images/sphering_skills.jpg" alt="sphering_skills" usemap="#map" /> -->
        <!-- <img src="<?= $this->getRootReturn(); ?>public/assets/images/sphérié-de-compétance-revus-24032019.svg" usemap="#image-map"> -->
        <img src="<?= $this->getRootReturn(); ?>public/assets/images/sherier.png" usemap="#image-map" id="spheringSkillsImg">
>>>>>>> origin/develop
=======
        <img src="<?= $this->getRootReturn(); ?>public/assets/images/spherier.png" usemap="#image-map" id="spheringSkillsImg">
>>>>>>> 14b10e2f0c9abc274c54406cea182f7076ca72e4
        
        <map name="image-map">
                <?php
                //load file json
<<<<<<< HEAD
<<<<<<< HEAD
                $contentFileJson = file_get_contents('public/assets/js/skills.json');
=======
                $contentFileJson = file_get_contents('./public/assets/js/skills.json');
>>>>>>> origin/develop
=======
                $contentFileJson = file_get_contents('./public/assets/js/parangon/skills.json');
>>>>>>> 14b10e2f0c9abc274c54406cea182f7076ca72e4
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
<<<<<<< HEAD

<<<<<<< HEAD
        <script src="..\public\assets\js\ajax.js"></script>
        <script src="..\public\assets\js\skills.js"></script>
=======
        <script src="<?= $this->getRootReturn(); ?>public\assets\js\ajax.js"></script>
        <script src="<?= $this->getRootReturn(); ?>public\assets\js\skills.js"></script>
>>>>>>> origin/develop


        <script>
        function updateBd()
        {
<<<<<<< HEAD
            lesCompetences = <?php echo json_encode($controller->getSkills()); ?>;
=======
            lesCompetences = <?php echo json_encode($this->getSkills()); ?>; //TRANSLATE
>>>>>>> origin/develop
        }
        updateBd();
        </script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        
        <script>
            $(function(){
                console.log('jQuery est prêt !');
<<<<<<< HEAD
=======
                
                //le rapport de  map pour l'image
                reduction = $('#spheringSkillsImg').width() / 1587;
                $('map').children('area').each(function(index){
                    console.log('une area');

                    // divise la chaine de caractere des coordonnées en tableau
                    tabCoords = $(this).attr('coords').split(',');
                    console.log(tabCoords);

                    // multiplie chaque coordonnées
                    tabCoords.forEach(function(element, index){
                        tabCoords[index] = Math.floor(element * reduction);
                    });
                    console.log(tabCoords);
=======
        <div id="controlButton">
                <button id="zoom" onclick="zoom()">+</button>
                <button id="zoomOut" onclick="zoomOut()">-</button>
        </div>

        <script>
            var requestURL = '<?= $this->getRootReturn(); ?>public/assets/js/parangon/skills.json';
        </script>
        <script src="<?= $this->getRootReturn(); ?>public\assets\js\parangon\spheringImageManagement.js"></script>
>>>>>>> 14b10e2f0c9abc274c54406cea182f7076ca72e4

        <script src="<?= $this->getRootReturn(); ?>public\assets\js\parangon\ajax.js"></script>

<<<<<<< HEAD
                });
>>>>>>> origin/develop

                $("#plus").click(function(){
                    console.log('plus');
                    console.log('currentComp[\'id\']' + currentComp['id']);
                    $.ajax({
<<<<<<< HEAD
                        url : '<?= $controller->getRootReturn(); ?>../parangon/recupBd', // La ressource ciblée
=======
                        url : '<?= $this->getRootReturn(); ?>parangon/AddSkill', // La ressource ciblée
>>>>>>> origin/develop
                        type : 'POST', // Le type de la requête HTTP.
                        data : 'comp_id=' + currentComp['id'],
                        dataType : 'text',
                        success : function(text, statut){
                            console.log(text);
                            if(text[0] != '/')
                            {
                                console.log('text[2] ' + text[2]);
                                currentComp['level'] = text[2];//TO AMELIORE
<<<<<<< HEAD
                                
                                // closePopup(); //TO DELETE
                                // openPopup(currentComp['id']);
=======
                            
>>>>>>> origin/develop
                                createRond(currentCompJson);
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
<<<<<<< HEAD
            });
        </script>

    </body>
</html>
=======

                $("#moins").click(function(){
                    console.log('moins');
                    console.log('currentComp[\'id\']' + currentComp['id']);
                    $.ajax({
                        url : '<?= $this->getRootReturn(); ?>parangon/RemoveSkill', // La ressource ciblée
                        type : 'POST', // Le type de la requête HTTP.
                        data : 'comp_id=' + currentComp['id'],
                        dataType : 'text',
                        success : function(text, statut){
                            console.log(text);
                            if(text[0] != '/')
                            {
                                console.log('text[2] ' + text[2]);
                                currentComp['level'] = text[2];//TO AMELIORE
                            
                                createRond(currentCompJson);
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
            });
        </script>
>>>>>>> origin/develop
=======
        <script src="<?= $this->getRootReturn(); ?>public\assets\js\parangon\skills.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        
        <script>
            var urlRemoveSkill = '<?= $this->getRootReturn(); ?>parangon/RemoveSkill';
            var urlAddSkill = '<?= $this->getRootReturn(); ?>parangon/AddSkill';
            var urlUpdateDb = '<?= $this->getRootReturn(); ?>parangon/updateDb';
        </script>
        <script src="<?= $this->getRootReturn(); ?>public\assets\js\parangon\skillsManagement.js"></script>
>>>>>>> 14b10e2f0c9abc274c54406cea182f7076ca72e4
