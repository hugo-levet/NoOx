<?php
require_once('./server/controller/ControllerC.php');
require_once('./server/model/parangon/SkillsManagerM.php');
class RemoveSkill extends Controller
{
    function __construct($url)
    {
        $skillsManager = new SkillsManager(1); //1 = DEV
        echo $skillsManager->removeSkill($_POST['comp_id']);
        echo '/';
        echo $skillsManager->getSkill($_POST['comp_id'])[0]['level'];//TODO
    }
}
?>