<?php
    /*
        title : createCharactM.php
        author : Audrey
        started-on : 19/12/2019

        brief : Character Creation model
    */
    require(__DIR__.'/../ModelM.php');

    class CreateChar extends Model {
        private $charId;

        function __construct($t){
            $this->charId = $this->insertBdd($t);
            // $this->constitution = 
        }

        public function getCharId() {
            return $this->charId;
        }




        public function insertBdd($t) {          

            $request = " INSERT INTO `character` (`user_id`, `quality of life`, 
                            `social accreditation`, `combat accreditation`, 
                            `technical accreditation`, `science accreditation`, 
                            `support accreditation`, `nature accreditation`, 
                            `psychurgy accreditation`, 
                            `race`, 
                            `gender`, `name`, `years`, 
                            `strength`, `agility`, 
                            `metabolism`, `dexterity`, 
                            `endurance`, `reflex`, `instinct_char`, 
                            `will_char`, `perception_char`, `constitution`) 
                        VALUES (1, '".$t['LevelOfLife']."', '".$t['social accreditation']."', '".$t['combat accreditation']."', '".$t['technical accreditation']."',
                        '".$t['science accreditation']."', '".$t['support accreditation']."', '".$t['nature accreditation']."', '".$t['psychurgy accreditation']."',
                        '".$t['race']."', '".$t['gender']."', '".$t['name']."', '".$t['age']."', '".$t['strength']."', '".$t['agility']."', '".$t['metabolism']."',
                        '".$t['dexterity']."', '".$t['endurance']."', '".$t['reflex']."', '".$t['instinct_char']."', '".$t['will_char']."', '".$t['perception_char']."',
                        '".$t['belief']."');";

            
            $charId = $this->insert($request);
            
            return $charId;
        }
    }
    
?>
