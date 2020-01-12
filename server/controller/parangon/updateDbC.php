<?php
require_once('./server/controller/ControllerC.php');
require_once('./server/model/parangon/SkillsManagerM.php');
class UpdateDb extends Controller
{
    function __construct($url)
    {
        $skillsManager = new SkillsManager(1); //1 = DEV
        echo json_encode($skillsManager->getSkills());
    }
}
?>