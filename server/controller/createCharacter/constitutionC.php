<?php
    /*
        title : constitutionC.php
        author : Audrey
        started-on : 19/12/2019

        brief : 2nd page of Character Creation controller
    */

require(__DIR__.'/../../model/popup/popupM.php');


class constitution {
    const LISTTRAITS = ['strength', 'dexterity', 'agility', 'metabolism', 'endurance',
                        'reflex', 'instinct_char', 'perception_char', 'ingenuity_char', 'intelligence_char',
                        'charisma_char', 'will_char', 'sign'];

    function __construct($url) {
        
        // si l'utilisateur n'a pas entré de nom
        if (!isset($_SESSION['creationCharacter']['namePage']) || !$_SESSION['creationCharacter']['namePage']) {
            $_SESSION['popup'] = new PopUp('error', 'NOM', 'Il faut que vous ayez entré un nom pour pouvoir accéder à cette page');
            header("location:/createCharacter/name");
            exit;
        }


        //si l'utilisateur ne choisis pas de constitution

        if (isset($_POST['constitutionRadio'])) {


            if (!isset($_POST['constitutionRadio']) || sizeof($_POST['constitutionRadio']) == 0) {
                $_SESSION['popup'] =  new PopUp('error', 'CONSTITUTION', 'Il faut que vous ayez choisi au moins 1 constitution.');
                header("location:/createCharacter/constitution");
                exit;
            }

            $constitution = $_POST['constitutionRadio'];

            for ($i = 0; $i < sizeof(SELF::LISTTRAITS); ++$i) {
                $_SESSION['creationCharacter'][SELF::LISTTRAITS[$i]] = 0;
            }


            
            if ($constitution == [1]){
                $_SESSION['creationCharacter']['strength']=2;
                $_SESSION['creationCharacter']['agility']=1;
                $_SESSION['creationCharacter']['endurance']=1;
                $_SESSION['creationCharacter']['will_char']=1;
                $_SESSION['creationCharacter']['perception_char']=1;
                $_SESSION['creationCharacter']['charisma_char']=2;
                //manque 1
                
            }
            else if($constitution==[2]){
                $_SESSION['creationCharacter']['strength']=1;
                $_SESSION['creationCharacter']['metabolism']=2;
                $_SESSION['creationCharacter']['instinct_char']=1;
                $_SESSION['creationCharacter']['will_char']=1;
                $_SESSION['creationCharacter']['ingenuity_char']=1;
                $_SESSION['creationCharacter']['intelligence_char']=2;
                //manque 1
                
            }
            else if($constitution==[3]){
                $_SESSION['creationCharacter']['agility']=1;
                $_SESSION['creationCharacter']['dexterity']=2;
                $_SESSION['creationCharacter']['reflex']=2;
                $_SESSION['creationCharacter']['instinct_char']=1;
                $_SESSION['creationCharacter']['perception_char']=1;
                $_SESSION['creationCharacter']['ingenuity_char']=1;
                //manque 1
                
            }
            else if($constitution == [1,2]){
                $_SESSION['creationCharacter']['strenght']=1;
                $_SESSION['creationCharacter']['metabolism']=1;
                $_SESSION['creationCharacter']['endurance']=1;
                $_SESSION['creationCharacter']['will_char']=1;
                $_SESSION['creationCharacter']['intelligence_char']=1;
                $_SESSION['creationCharacter']['charisma_char']=1;
                //manque 3
            }
            else if ($constitution == [1,3]){
                $_SESSION['creationCharacter']['agility']=1;
                $_SESSION['creationCharacter']['dexterity']=1;
                $_SESSION['creationCharacter']['endurance']=1;
                $_SESSION['creationCharacter']['reflex']=1;
                $_SESSION['creationCharacter']['perception_char']=1;
                $_SESSION['creationCharacter']['charisma_char']=1;
                //manque 3
            }
            
            else if ($constitution == [2,3]){
                $_SESSION['creationCharacter']['dexterity']=1;
                $_SESSION['creationCharacter']['metabolism']=1;
                $_SESSION['creationCharacter']['reflex']=1;
                $_SESSION['creationCharacter']['instinct_char']=1;
                $_SESSION['creationCharacter']['ingenuity_char']=1;
                $_SESSION['creationCharacter']['intelligence_char']=1;
                //manque 3
            }
            
            else if($constitution == [1,2,3]){
                $_SESSION['creationCharacter']['strenght']=1;
                $_SESSION['creationCharacter']['agility']=1;
                $_SESSION['creationCharacter']['dexterity']=1;
                $_SESSION['creationCharacter']['ingenuity_char']=1;
                $_SESSION['creationCharacter']['intelligence_char']=1;
                $_SESSION['creationCharacter']['charisma_char']=1;
                $_SESSION['creationCharacter']['sign']=1;
                //manque 2
            }

            $_SESSION['creationCharacter']['constitutionPage'] = true;
            $_SESSION['creationCharacter']['belief'] = $constitution;
        
            $_SESSION['popup'] = new PopUp('success', 'CONSTITUTION', 'La constitution a été renseignée avec succès.');
            header("location:/createCharacter/race");
        }

        require(__DIR__.'/../../../public/view/createCharacter/createCharactConstitutionV.php');
    }
}