<?php
/*
    name : statePage
    author : Audrey
    brief : display & post traitment of the states page
    input parameters : character
    return : none
*/
require_once(__DIR__.'/../../model/character/characterM.php');
require_once(__DIR__.'/../../model/popup/popupM.php');

class state {
    const STATESLIST = ['stunned_stat', 'seek_stat', 'hungry_stat', 'asphyxia_stat', 
                        'hypothermia_stat', 'hyperthermia_stat', 'terrified_stat', 
                        'desperate_stat', 'exhausted_stat', 'thirst_stat'];

    const STATESNAME = ['Sonné', 'Malade', 'Affamé', 'Assoifé', 
                        'Asphixié', 'Hypothermie', 'Hyperthermie', 
                        'Terrifié', 'Desespéré', 'Epuisé'];

    const TRAITSNAME = ['strenght' => 'Force',
                        'agility' => 'Agilité',
                        'dexterity' => 'Dextérité',
                        'metabolism' => 'Metabolisme',
                        'endurance' => 'Endurance',
                        'reflex' => 'Reflexe',
                        'instinct_char' => 'Instinct',
                        'will_char' => 'Volonté',
                        'perception_char' => 'Perception',
                        'ingenuity_char' => 'Ingéniosité',
                        'charisma_char' => 'Charisme',
                        'intelligence_char' => 'Intelligence'];

                        // m1 chandelier m2 omega, p1 montagne, p2 phi
    const STATEICONS = [ ['P1', 'P2'],
                         ['P2', 'M2'],
                         ['P2', 'M2'],
                         ['P1', 'M1'],
                         ['P2', 'M1'],
                         ['P1', 'M2'],
                         ['P1', 'M1'],
                         ['P1', 'M2'],
                         ['M1', 'M2'],
                         ['P2', 'M1']];

    const STATETOTRAITS = ['stunned_stat' => ['strenght', 'agility', 'dexterity', 'metabolism', 'endurance', 'reflex'],
                            'exhausted_stat' => ['metabolism', 'endurance', 'dexterity', 'instinct_char', 'will_char', 'perception_char'],
                            'seek_stat' => ['metabolism', 'endurance', 'reflex', 'will_char', 'instinct_char', 'perception_char'],
                            'hungry_stat' => ['metabolism', 'endurance', 'reflex', 'will_char', 'instinct_char', 'perception_char'],
                            'hyperthermia_stat' => ['metabolism', 'endurance', 'reflex', 'instinct_char', 'will_char', 'perception_char'],
                            'hypothermia_stat' => ['strenght', 'agility', 'dexterity', 'ingenuity_char', 'intelligence_char', 'charisma_char'],
                            'terrified_stat' => ['strenght', 'agility', 'dexterity', 'ingenuity_char', 'intelligence_char', 'charisma_char'],
                            'desperate_stat' => ['instinct_char', 'will_char', 'perception_char', 'ingenuity_char', 'charisma_char', 'intelligence_char'],
                            'exhausted_stat' => ['metabolism', 'endurance', 'dexterity', 'instinct_char', 'will_char', 'perception_char'],
                            'asphyxia_stat' => ['metabolism', 'endurance', 'dexterity', 'instinct_char', 'will_char', 'perception_char'],
                            'thirst_stat' => ['metabolism', 'endurance', 'reflex', 'instinct_char', 'will_char', 'perception_char']];

    function __construct($url) {
        if (!isset($_REQUEST['character'])) {
            $_SESSION['popup'] = new PopUp ('error', 'Personnage', 'Nous ne pouvez pas accéder à cette page de cette manière.');
            die();//todo : redirect index
        }
        

        // get character informations
        $charID = $_REQUEST['character'];
        $character = new CharacterM($charID);


        if(!isset($character)) {               
            $_SESSION['popup'] = new PopUp ('error', 'Personnage', 'Désolé, le personnage recherché n\'existe pas.');
            die();//todo redirect index
        }


        // get user id
        $userID = $_SESSION['userID'];


        // test if character belongs to the user
        if ($userID != $character->getUserId()) {
            $_SESSION['popup'] = new PopUp ('error', 'Personnage', 'Désolé, le personnage recherché ne vous appartient pas.');
            die();//todo redirect index
        }

        if (isset($_POST['categorie'])) {
            if (!in_array($_POST['categorie'], SELF::STATESLIST)) {
                $_SESSION['popup'] = new PopUp('error', $_POST['categorie'], 'Catégorie ou valeur non modifiable');
            
            } else {
                
                $character->setAccess($_POST['categorie'], $_POST['valueInput']);



            }

            header("location:/character/state&character=$charID");
            exit;
        }
        
        // include la vue
        require_once(__DIR__.'/../../../public/view/character/stateV.php');
    }
}