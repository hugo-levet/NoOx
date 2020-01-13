<?php
    /*
        title : insertScenarioM.php
        author : Audrey
        brief : model scenario creation
        started-on : 03/01/2019
    */
    include __DIR__.'/../ModelM.php';

    class createScenarioM extends Model {
        protected $idInsert;

        function __construct($request) {
            $this->idInsert = $this->insert($request);
        }

        public function getIdInsert() {
            return $this->idInsert;
        }
    }
?>