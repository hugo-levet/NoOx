<?php
    /*
        name : popupM.php
        author : Audrey
        started on :

        brief : model of the popups (error & success)
    */
    session_start();

    class PopUp {

        protected $theme;
        protected $target;
        protected $message;

        function __construct($theme, $target, $message) {
            $this->theme = $theme;
            $this->target = $target;
            $this->message = $message;
        }


        public function getTheme() {
            return $this->theme;
        }
        
        public function getTarget() {
            return $this->target;
        }

        public function getMessage() {
            return $this->message;
        }

    }
?>