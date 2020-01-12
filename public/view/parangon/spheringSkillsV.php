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
            var requestURL = '<?= $this->getRootReturn(); ?>public/assets/js/parangon/skills.json';
        </script>
        <script src="<?= $this->getRootReturn(); ?>public\assets\js\parangon\spheringImageManagement.js"></script>

        <script src="<?= $this->getRootReturn(); ?>public\assets\js\parangon\ajax.js"></script>

        <script src="<?= $this->getRootReturn(); ?>public\assets\js\parangon\skills.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        
        <script>
            var urlRemoveSkill = '<?= $this->getRootReturn(); ?>parangon/RemoveSkill';
            var urlAddSkill = '<?= $this->getRootReturn(); ?>parangon/AddSkill';
            var urlUpdateDb = '<?= $this->getRootReturn(); ?>parangon/updateDb';
        </script>
        <script src="<?= $this->getRootReturn(); ?>public\assets\js\parangon\skillsManagement.js"></script>