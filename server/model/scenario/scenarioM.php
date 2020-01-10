<?php
    /*
        title : scenarioM.php
        author : Audrey
        brief : model scenario
        started-on : 03/01/2019
    */

//include

require __DIR__.'/commentM.php';

class scenarioM extends Model {

    protected $id=[];
    protected $user_id;

    protected $name =[];
    protected $description = [];
    protected $date_post = [];
    protected $location =[];
    protected $document =[];
    protected $cycle =[];
    protected $author = [];
    protected $grade = [];
    

    protected $listCom = [];
    function __construct(){
        $request = "SELECT scenario.id, scenario.name, scenario.description,
                        scenario.date_post, scenario.location, scenario.document,
                        user.pseudo, AVG(grade) as grade
                        FROM `scenario` 
                        JOIN `user` on `user_id` = user.id
                        JOIN `scenario_grade`ON `scenario_grade`.`scenario_id` = `scenario`.`id`
                        ORDER BY `date_post` DESC";
        $request = $this->execute($request);

        for ($i = 0; $i < sizeof($request); ++$i){
            $this->id[$i] = $request[$i]['id'];
            $this->name[$i] = $request[$i]['name'];
            $this->description[$i] = $request[$i]['description'];
            $this->date_post[$i] = $request[$i]['date_post'];
            $this->cycle[$i] = $request[$i]['cycle'];
            $this->listCom[$i] = new commentM($request[$i]['id']);
            $this->author[$i] = $request[$i]['pseudo'];
            $this->grade[$i] = $request[$i]['grade'];
        }
    }

    //id
    public function getIds() {
        return $this->id;
    }

    //Title

    public function getName($id){
        return $this->name[$id];
    }

    public function setName($name, $id){
        $this->name[$id] = $name;
    }

    //Description

    public function getDescription($id){
        return $this->description[$id];
    }

    public function setDescription($description, $id){
        $this->description[$id] = $description;
    }

    //Date

    public function getDate($id){
        return $this->date_post[$id];
    }

    public function setDate($date, $id){
        $this->date_post[$id] = $date_post;
    }

    public function getAuthor($id) {
        return $this->author[$id];
    }


    public static function insertInBdd($user_id) {
        $request = "INSERT INTO `scenario` (`id`,
                                            `user_id`,
                                            `document`, 
                                            `canonical`, 
                                            `name`,
                                            `cycle`, 
                                            `location`,
                                            `average grade`,
                                            `date_post`,
                                            `description`) 
                                            VALUES 
                                            (NULL, 
                                            $user_id, 
                                            $document, 
                                            '0',
                                            $name, 
                                            $cycle, 
                                            $location, 
                                            '1', 
                                            $date_post, 
                                            $description')";
        $request = $this->execute($request);
        
        $lastId = $this->getDatabase()->lastInsertId();
    }
}
