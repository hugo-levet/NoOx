<?php
    /*
        title : charFeatureV.php
        author : Audrey
        started on :

        brief : Controller Trait page character
    */
    require_once(__DIR__.'/../../model/character/characterM.php');
    require_once(__DIR__.'/../../model/popup/popupM.php');


    class traits {
        const TRAITSLIST = ['strength', 'agility', 'metabolism', 'endurance', 'reflex', 'dexterity',
                            'instinct_char','perception_char', 'ingenuity_char', 'intelligence_char', 'charisma_char', 'will_char'];

        const TRAITSNAME = ['strength' => 'Force',
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

        const STATETOTRAITS = ['stunned_stat' => ['strength', 'agility', 'dexterity', 'metabolism', 'endurance', 'reflex'],
                            'exhausted_stat' => ['metabolism', 'endurance', 'dexterity', 'instinct_char', 'will_char', 'perception_char'],
                            'seek_stat' => ['metabolism', 'endurance', 'reflex', 'will_char', 'instinct_char', 'perception_char'],
                            'hungry_stat' => ['metabolism', 'endurance', 'reflex', 'will_char', 'instinct_char', 'perception_char'],
                            'hyperthermia_stat' => ['metabolism', 'endurance', 'reflex', 'instinct_char', 'will_char', 'perception_char'],
                            'hypothermia_stat' => ['strength', 'agility', 'dexterity', 'ingenuity_char', 'intelligence_char', 'charisma_char'],
                            'terrified_stat' => ['strength', 'agility', 'dexterity', 'ingenuity_char', 'intelligence_char', 'charisma_char'],
                            'desperate_stat' => ['instinct_char', 'will_char', 'perception_char', 'ingenuity_char', 'charisma_char', 'intelligence_char'],
                            'exhausted_stat' => ['metabolism', 'endurance', 'dexterity', 'instinct_char', 'will_char', 'perception_char'],
                            'asphyxia_stat' => ['metabolism', 'endurance', 'dexterity', 'instinct_char', 'will_char', 'perception_char'],
                            'thirst_stat' => ['metabolism', 'endurance', 'reflex', 'instinct_char', 'will_char', 'perception_char']];

        const STATESLIST = ['stunned_stat', 'seek_stat', 'hungry_stat', 'asphyxia_stat', 
                            'hypothermia_stat', 'hyperthermia_stat', 'terrified_stat', 
                            'desperate_stat', 'exhausted_stat', 'thirst_stat'];


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
            //$userID = $_SESSION['user_id'];
            $userID=1;
    
    
            // test if character belongs to the user
            if ($userID != $character->getUserId()) {
                $_SESSION['popup'] = new PopUp ('error', 'Personnage', 'Désolé, le personnage recherché ne vous appartient pas.');
                die();//todo redirect index
            }



            // calculter traits physique
            $traitPhysic = $character->getTrait('strength') 
                         + $character->getTrait('agility') 
                         + $character->getTrait('metabolism')
                         + $character->getTrait('endurance')
                         + $character->getTrait('reflex')
                         + $character->getTrait('dexterity');
            
            // calculter traits mentaux

            $traitMental = $character->getTrait('instinct_char')
                         + $character->getTrait('perception_char')
                         + $character->getTrait('ingenuity_char')
                         + $character->getTrait('intelligence_char')
                         + $character->getTrait('charisma_char')
                         + $character->getTrait('will_char');

            // on récupère le plus petit d'entre les 2
            if ($traitMental<= $traitPhysic){
                $traitmin  = $traitMental;
            } 
            else {
                $traitmin=$traitPhysic;
            }
            // on le compare pour savoir qu'elle niveau d'ame il est
            if ($traitmin < 6) $soul = -1;
            else if (6 <= $traitmin && $traitmin < 8) $soul = 0;
            else if (8 <= $traitmin && $traitmin < 12) $soul = 1;
            else if (12 <= $traitmin && $traitmin < 20) $soul = 2;
            else if (20 <= $traitmin && $traitmin < 30) $soul = 3;
            else if (30 <= $traitmin && $traitmin < 40) $soul = 4;
            elseif (40 <= $traitmin && $traitmin < 41) $soul = 5;
            else $soul = 6;

            // calculer malus etat;
            $malusArr = [];
            for($i = 0; $i < sizeof(SELF::TRAITSLIST); ++$i) {
                $malusArr[SELF::TRAITSLIST[$i]] = 0;
            }

            

            $cpt = 0;
            for ($i = 0; $i < sizeof(SELF::STATESLIST); ++$i) {
                if ($character->getState(SELF::STATESLIST[$i]) > 0) {
                    for ($j = 0; $j < sizeof(SELF::STATETOTRAITS[SELF::STATESLIST[$i]]); ++$j) {
                        $malusArr[SELF::STATETOTRAITS[SELF::STATESLIST[$i]][$j]] += 1;
                    }
                }
            }          

            // if form submit

            if (isset($_POST['categorie'])) {
                if (!in_array($_POST['categorie'], SELF::TRAITSLIST)) {
                    $_SESSION['popup'] = new PopUp('error', $_POST['categorie'], 'Catégorie ou valeur non modifiable');
                
                } else {
                    $character->setTrait($_POST['categorie'], $_POST['rating']);

                }

                header("location:/character/traits&character=$charID");
                exit;
            }
            
            // include la vue
            require_once(__DIR__.'/../../../public/view/character/traitV.php');
        }

    }

?>