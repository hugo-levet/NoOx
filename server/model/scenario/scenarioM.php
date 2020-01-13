<?php
    /*
        title : scenarioM.php
        author : Audrey
        brief : model scenario
        started-on : 03/01/2019
    */

//include

require_once __DIR__.'/commentM.php';

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
    protected $image = [];
    

    protected $listCom = [];




    function __construct($form){
        if ($form == 'list') {
            $request = $this->getListFromDB();
        } 
        else if ($form == 'admin') {
            $request = $this->getAdminListFromDB();
        }
        else if ($form == 'user') {
            // $request = $this->getUserListFromDB($_SESSION['user_id']);
            $request = $this->getUserListFromDB(1);
        }
        else if(is_array($form)) {
            $request = $this->getSingleUserFromDB($form[0], $form[1]);
        }
        else {
            $request = $this->getSingleFromDB($form);

            if (empty($request)) {
                header ('location:/page404.php');
            }
            $this->listCom = new commentM($request[0]['id']);
        }

        for ($i = 0; $i < sizeof($request); ++$i){
            $this->id[$i] = $request[$i]['id'];
            $this->name[$i] = $request[$i]['name'];
            $this->description[$i] = $request[$i]['description'];
            $this->date_post[$i] = $request[$i]['date_post'];
            $this->cycle[$i] = $request[$i]['cycle'];
            $this->author[$i] = $request[$i]['pseudo'];
            $this->grade[$i] = $request[$i]['average grade'];
            $this->image[$i] = $request[$i]['imageName'];
            $this->location[$i] = $request[$i]['location'];
            $this->document[$i] = $request[$i]['document'];
        }
    }

    public function getDocument($id) {
        return $this->document[$id];
    }


    public function getComs() {
        return $this->listCom;
    }
    //id
    public function getIds() {
        return $this->id;
    }

    public function getId($i) {
        return $this->id[$i];
    }

    public function getLocation($id) {
        return $this->location[$id];
    }

    //Title

    public function getName($id){
        return $this->name[$id];
    }

    public function setName($name, $id){
        $this->name[$id] = $name;
    }


    public function getImage($id) {
        return $this->image[$id];
    }
    //Description

    public function getDescription($id){
        return $this->description[$id];
    }

    public function setDescription($description, $id){
        $this->description[$id] = $description;
    }

    // grade
    public function getGrade($id) {
        return $this->grade[$id];
    }

    //Date

    public function getDate($id){
        return $this->date_post[$id];
    }

    public function setDate($date, $id){
        $this->date_post[$id] = $date_post;
    }

    //author

    public function getAuthor($id) {
        return $this->author[$id];
    }

    //cycle

    public function getCycle($id){
        return $this->cycle[$id];
    }


    public static function insertInBdd($user_id) {
        $request = $this->execute($request);
        
        $lastId = $this->getDatabase()->lastInsertId();
    }

    public function getListFromDB() {
        $request = "SELECT scenario.id, scenario.name, scenario.description,
                            scenario.date_post, scenario.location, scenario.document,
                            user.pseudo, `average grade`, imageName, cycle
                            FROM `scenario` 
                            JOIN `user` on `user_id` = user.id
                            WHERE validate = 1;
                            ORDER BY `date_post` DESC";
        return $this->execute($request);
    }

    public function getSingleFromDB($id) {
        $request = "SELECT scenario.id, scenario.name, scenario.description,
                        scenario.date_post, scenario.location, scenario.document,
                        user.pseudo, `average grade`, imageName, cycle
                        FROM `scenario` 
                        JOIN `user` on `user_id` = user.id
                        WHERE validate = 1
                        AND scenario.id = ".$id;
        return $this->execute($request);
    }

    public function getSingleUserFromDB($user_id, $id) {
        $request = "SELECT scenario.id, scenario.name, scenario.description,
                        scenario.date_post, scenario.location, scenario.document,
                        user.pseudo, `average grade`, imageName, cycle
                        FROM `scenario` 
                        JOIN `user` on `user_id` = user.id
                        WHERE validate = 1
                        AND scenario.id = $id
                        AND scenario.user_id = $user_id ";
        return $this->execute($request);
    }

    public function getAdminListFromDB() {
        $request = "SELECT scenario.id, scenario.name, scenario.description,
                            scenario.date_post, scenario.location, scenario.document,
                            user.pseudo, `average grade`, imageName, cycle
                            FROM `scenario` 
                            JOIN `user` on `user_id` = user.id
                            WHERE validate = 0;
                            ORDER BY `date_post` DESC";
        return $this->execute($request);
    }

    public function getUserListFromDB($userID) {
        $request = "SELECT scenario.id, scenario.name, scenario.description,
                            scenario.date_post, scenario.location, scenario.document,
                            user.pseudo, `average grade`, imageName, cycle
                            FROM `scenario` 
                            JOIN `user` on `user_id` = user.id
                            WHERE validate = 1;
                            AND scenario.user_id = $userID
                            ORDER BY `date_post` DESC";
        return $this->execute($request);
    }


    public function setValidation($id) {
        $request = "UPDATE scenario SET validate = 1
                    WHERE ID = ".$id;
        $request = $this->update($request);
    }

    public function setDecline($id) {
        $request = "DELETE FROM scenario WHERE ID = ".$id;
        $request = $this->update($request);
    }


    public function deleteLinks($scenario_id) {
        $request = "DELETE FROM scenario_pnj
                    WHERE scenario_id = $scenario_id";

        $request = $this->update($request);
    }

    public function addLinks($scenario_id, $listPNJ) {
        $srtInsert;
        for ($i = 0; $i < sizeof($listPNJ); ++$i) {
            $srtInsert .= '('.$scenario_id.', '.$listPNJ[$i].')';
            if ($i != sizeof($listPNJ)-1) $srtInsert .= ', ';
        }

        if (empty($srtInsert)) {
            return;
        }

        $request = "INSERT INTO scenario_pnj VALUES $srtInsert";
        $request = $this->insert($request);
    }
}
