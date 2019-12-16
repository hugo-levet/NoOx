<?php
    /*
        title : characterC.php
        author : Audrey
        started-on : 27/11/2019

        brief : controller character
    */

    // includes
    require('../../model/character/characterM.php');

    $char = new character('homePage');

    class Character {

        function __construct($url) {
            // get character id
            if (!isset($_REQUEST['character'])) {
                echo "ERREUR IL FAUT CHAR EN URL";
                die();
            }

            $charID = $_REQUEST['character'];
            $character = new CharacterM($charID);

            if(!isset($character)) {               
                echo "ERREUR IL FAUT QUE LE PERSONNAGE EXISTE";
                die();
            }

            // get user id
            //$userID = $_SESSION['user_id'];
            $userID=1;

            // test if character belongs to the user
            if ($userID != $character->getUserId()) {
                echo "ERREUR IL FAUT QUE LE PERSONNAGE VOUS APPARTIENNE";
                die();
            }

            // redirect to function 
            $url='homePage'; // test en attendant les routes
            
            switch ($url) {
                case 'homePage' : 
                    $this->homePage($character);
                break;
            }

        
        } // __construct($url)


        /*
            name : homePage
            author : Audrey
            brief : display of the character Homepage
            input parameters : character    
            return : none
        */
        public function homePage($character) {
            // test if user submit a form
            if (isset($_POST['categorie'])) {
                $atr = $_POST['subject'];
                $value =$_POST['valueInput'];
                $character->setCharacter($character->id, $atr, $value);
            }
    

        } // homePage()

    }




?>