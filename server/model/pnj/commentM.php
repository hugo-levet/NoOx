<?php
    /*
        title : commentM.php
        author : Audrey
        brief : model pnj comment
        started-on : 03/01/2019
    */
//include
require_once __DIR__.'/../ModelM.php';

class commentPNJM extends Model {
    protected $id=[];

    protected $date =[];
    protected $message = [];
    protected $grade = [];
    protected $userID = [];

    function __construct($id) {
        $request = "SELECT pnj_comment.id, user.id as userID, message, grade, pseudo, date 
                    FROM pnj_comment 
                    JOIN pnj_grade ON  pnj_grade.pnj_id = pnj_comment.pnj_id
                    JOIN user ON pnj_comment.user_id = user.id
                    WHERE pnj_comment.pnj_id = ".$id;
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

    public function setGrade($pnj_id, $user_id, $message, $grade) {
        if (in_array($user_id, $this->getUserIds())) {
            return false;
        } 

        $request = "INSERT INTO pnj_comment (pnj_id, `user_id`, `message`) VALUES ($pnj_id, $user_id, \"$message\")";
        $request = $this->insert($request);

        $request = "INSERT INTO pnj_grade (pnj_id, `user_id`, `grade`) VALUES ($pnj_id, $user_id, $grade)";
        $request = $this->insert($request);

        $avgGrade = "UPDATE pnj s
                    JOIN (select r.pnj_id, AVG(r.grade) as avgG 
                        FROM pnj_grade r
                        WHERE r.pnj_id = $pnj_id
                        GROUP BY r.pnj_id) r
                        on s.id = r.pnj_id
                    SET s.`average grade` = r.avgG";
        $avgGrade = $this->update($avgGrade);

        return true;    
    }
}