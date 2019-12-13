<?php
    /*
        title : characterM
        author : Audrey
        brief : model character
        started-on : 27/11/2019


    */


    // include
    require(__DIR__."/../ModelM.php");

    class characterM extends Model {
        
        protected $id;
        protected $userID;
        protected $informations = [];
        

        /*
            name : __construct
            author : Audrey
            params : $id (id of character)
            return : none
        */
        function __construct($id) {
            $this->id = $id;
            $this->table = 'character';

            $this->databaseConnection();

            $informations = $this->getCharacter($id);
            $this->informations = $informations[0];
            
            $this->userID = $this->informations['user_id'];            
        } // __construct($id)


        /*
            name : getCharacter
            author : Audrey
            params : $id (id of character)
            return : array
        */
        function getCharacter($id) {
            $DBRequest = "SELECT * FROM `character`WHERE `id`=".$id;
            return $this->execute($DBRequest);
        } // getCharacter($id)


        /*
            name : setCharacter
            author : Audrey
            params : $id (id of character), $atr (database attributs), $value
            return : none 

        */
        function setCharacter($id, $atr, $value){
            $DBRequest = 'UPDATE character SET '.$atr.' = '.$value. ' WHERE id = '.$id;
            $this->execute($DBRequest);
        } // setCharacter($id, $atr, $value)


        public function getUserId() {
            return $this->userID;
        }
    }





?>