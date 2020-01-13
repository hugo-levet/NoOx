<?php
    /*
        title : insertPnjM.php
        author : Audrey
        brief : model pnj creation
        started-on : 03/01/2019
    */
    include __DIR__.'/../ModelM.php';

    class createPnjM extends Model {
        protected $idInsert;

        function __construct($request) {
            $this->idInsert = $this->insert($request);
        }

        public function getIdInsert() {
            return $this->idInsert;
        }
    }
?>