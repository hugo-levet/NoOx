<?php
    /*
        title : gradeM.php
        author : Audrey
        brief : model scenario
        started-on : 03/01/2019
    */

//include

require __DIR__.'/scenario.php';

class gradeM extends Model {
    protected $scenario_id =[];
    protected $user_id;
    protected $grade;
    protected $comment;

    function __construct(){
        $request = "SELECT * FROM `scenario_grade`
                    JOIN `user` on 'user_id' = user.id
                    JOIN `scenario` on 'scenario_id' = scenario.id";

    $request = $this->execute($request);
    
    for ($i = 0; $i < sizeof($request); ++$i){
        $this->grade[$i] = $request[$i]['grade'];
        $this->comment[$i] = $request[$i]['comment'];
    }

    
