<?php
    /*
        title : commentM.php
        author : Audrey
        brief : model scenario
        started-on : 03/01/2019
    */
//include
require_once __DIR__.'/../ModelM.php';

class commentM extends Model {
    protected $id=[];

    protected $date =[];
    protected $message = [];
    protected $grade = [];
    protected $userID = [];

    function __construct($id) {
        $request = "SELECT scenario_comment.id, user.id as userID, message, grade, pseudo, date 
                    FROM scenario_comment 
                    JOIN scenario_grade ON  scenario_grade.scenario_id = scenario_comment.scenario_id
                    JOIN user ON scenario_comment.user_id = user.id
                    WHERE scenario_comment.scenario_id = ".$id;
        $request = $this->execute($request);
        
        for ($i = 0; $i < sizeof($request); ++$i) {
            $this->id[$i] = $request[$i]['id'];
            $this->date[$i] = $request[$i]['date'];
            $this->message[$i] = $request[$i]['message'];
            $this->grade[$i] = $request[$i]['grade'];
            $this->user[$i] = $request[$i]['pseudo'];
            $this->userID[$i] = $request[$i]['userID'];
        }
    }
    public function getIds() {
        return $this->id;
    }

    public function getDate($i) {
        return $this->date[$i];
    }

    public function getMessage($i) {
        return $this->message[$i];
    }

    public function getGrade($i) {
        return $this->grade[$i];
    }

    public function getUser($i) {
        return $this->user[$i];
    }

    public function getUserIds() {
        return $this->userID;
    }

    public function setGrade($scenario_id, $user_id, $message, $grade) {
        if (in_array($user_id, $this->getUserIds())) {
            return false;
        } 

        $request = "INSERT INTO scenario_comment (scenario_id, `user_id`, `message`) VALUES ($scenario_id, $user_id, \"$message\")";
        $request = $this->insert($request);

        $request = "INSERT INTO scenario_grade (scenario_id, `user_id`, `grade`) VALUES ($scenario_id, $user_id, $grade)";
        $request = $this->insert($request);

        $avgGrade = "UPDATE scenario s
                    JOIN (select r.scenario_id, AVG(r.grade) as avgG 
                        FROM scenario_grade r
                        WHERE r.scenario_id = $scenario_id
                        GROUP BY r.scenario_id) r
                        on s.id = r.scenario_id
                    SET s.`average grade` = r.avgG";
        $avgGrade = $this->update($avgGrade);

        return true;    
    }
}