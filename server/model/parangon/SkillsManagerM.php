<?php
/*
    title : ModelM.php
    author : Hugo.L
    started on : 09/12/2019
    brief : SkillsManager model
*/
require_once('./server/model/ModelM.php');
class SkillsManager extends Model
{
    private $skills;
    private $userId;

    function __construct($userId)
    {
        $this->userId = $userId;

        self::databaseConnection();
        
        //CHANGE user to parangon
        $this->skills = $this->execute("SELECT * FROM skill WHERE user_id = $userId");
    }

    /*
        name : addSkill
        author : Hugo.L
        brief : add a level of a skill
        input parameters : integer $id
        return : boolean
    */
    public function addSkill($id)
    {
        //selectionnne les infos des compétences
        $contentFileJson = file_get_contents('public/assets/js/parangon/skills.json');
        $skills = json_decode($contentFileJson, true);

        // select la comp dans bd
        $compDansBD = $this->execute("SELECT * FROM skill WHERE user_id = $this->userId AND comp_id = $id");
        // echo "compdans db : " . sizeof($compDansBD);
        // si existe
        if($compDansBD)
        {
            // si on peut la modifier
            if(strlen($skills[$id-1]['pattern']) > $compDansBD[0]['level'])
            {
                // la modifie dans la base de donnée
                $var =$this->execute("UPDATE skill SET level = level+1 WHERE user_id = $this->userId AND comp_id = $id");
                //update $this-skills   
                //CHANGE user to parangon
                $this->skills = $this->execute("SELECT * FROM skill WHERE user_id = $this->userId");
                //return true
                return true;
            }
            //sinon return false
            else
            {
                return false;
            }
        }
        //si existe pas
        else
        {
            // si on peut la modif TODO
                // l'ajoute dans la BD
                $var = $this->execute("INSERT INTO skill (user_id, comp_id, level) VALUES ($this->userId, $id, 1)");

                //update $this-skills   
                //CHANGE user to parangon
                $this->skills = $this->execute("SELECT * FROM skill WHERE user_id = $this->userId");

                //return true
                return true;
            //sinon return false
        }
    }

    /*
<<<<<<< HEAD
=======
        name : addSkill
        author : Hugo.L
        brief : add a level of a skill
        input parameters : integer $id
        return : boolean
    */
    public function removeSkill($id)
    {
        //selectionnne les infos des compétences
        $contentFileJson = file_get_contents('public/assets/js/parangon/skills.json');
        $skills = json_decode($contentFileJson, true);

        // select la comp dans bd
        $compDansBD = $this->execute("SELECT * FROM skill WHERE user_id = $this->userId AND comp_id = $id");
        // si existe
        if($compDansBD)
        {
            // si on peut la modifier
            if($compDansBD[0]['level'] > 0)
            {
                // la modifie dans la base de donnée
                $var = $this->execute("UPDATE skill SET level = level-1 WHERE user_id = $this->userId AND comp_id = $id");
                //update $this-skills   
                //CHANGE user to parangon
                $this->skills = $this->execute("SELECT * FROM skill WHERE user_id = $this->userId");
                //return true
                return true;
            }
            //sinon return false
            else
            {
                return false;
            }
        }
        //si existe pas
        else
        {
            //sinon return false
            return false;
        }
    }

    /*
>>>>>>> origin/develop
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
    public function setSkills($skills)
    {
        $this->skills = $skills;
    }

    /*
        name : getSkills
        author : Hugo.L
        brief : Get the value of skills
        return : mixed
    */
    public function getSkill($id)
    {
        //recherche dans bdd
        $comp = $this->execute("SELECT * FROM skill WHERE user_id = $this->userId AND comp_id = $id");
        return $comp;
    }
}

?>