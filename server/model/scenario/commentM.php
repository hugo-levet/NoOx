<?php
    /*
        title : commentM.php
        author : Audrey
        brief : model scenario
        started-on : 03/01/2019
    */
//include
require __DIR__.'/../ModelM.php';

class commentM extends Model {
    protected $id=[];

    protected $date =[];
    protected $original_comment =[];
    
    protected $reference=[];

    function __construct($id) {
        $request = "SELECT `reference`, COUNT(`reference`) as `numRef`, `date` FROM `scenario_comment` 
                        JOIN `scenario_comment_react` ON `scenario_comment`.`id`  = 
                        `scenario_comment_react`.`scenario_comment_id` 
                        WHERE `scenario_id` = $id
                        GROUP BY `reference`";
        $request = $this->execute($request);
        
        for ($i = 0; $i < sizeof($request); ++$i) {
            $this->id[$i] = $request[$i]['id'];
            $this->date[$i] = $request[$i]['id'];
            $this->original_comment[$i] = $request[$i]['id'];
            $this->id[$request[$i]['reference']] = $request[$i][$request[$i]['numRef']];
        }
    }
}