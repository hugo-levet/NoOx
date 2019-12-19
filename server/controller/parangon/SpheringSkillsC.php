<?php
/*
title : spheringSkillsC.php
author : Hugo.L
started on : 03/12/2019
brief : sphering skills controller
*/
require_once('./server/controller/ControllerC.php');
require_once('./server/model/parangon/SkillsManagerM.php');
class SpheringSkills extends Controller
{
    private $skills;
    
    function __construct($url)
    {
        $this->automaticConnection($url);
        
        $skillsManager = new SkillsManager(1); //1 = DEV
        $this->skills = $skillsManager->getSkills();
    }

    /*
        name : getSkills
        author : Hugo.L
        brief : Get the value of skills
        return : mixed
    */
    public function getSkills()
    {
        return $this->skills;
    }

    /*
        name : setSkills
        author : Hugo.L
        brief : Set the value of skills
        input parameters : mixed $skills  
        return : null
    */
    public function setSkills()
    {
        $this->skills = $skills;
    }
}
?>
