<?php
require_once('./server/controller/ControllerC.php');
require_once('./server/model/parangon/SkillsManagerM.php');
class RecupBd extends Controller
{
    function __construct($url)
    {
        $skillsManager = new SkillsManager(1); //1 = DEV
        echo $skillsManager->addSkill($_POST['comp_id']);
        echo '/';
        echo $skillsManager->getSkills()[0]['level'];//TODO
    }
}
?>