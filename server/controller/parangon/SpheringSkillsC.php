<?php
/*
<<<<<<< HEAD
title : spheringSkillsV.php
=======
title : spheringSkillsC.php
>>>>>>> origin/develop
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
<<<<<<< HEAD
=======

        //display view
        require_once('./public/view/template/template.php');
>>>>>>> origin/develop
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
<<<<<<< HEAD

    public function ditMoiOui()
    {
        echo 'OUI';
    }
=======
>>>>>>> origin/develop
}
?>
