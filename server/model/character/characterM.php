<?php
    /*
        title : characterM
        author : Audrey
        brief : model character
        started-on : 27/11/2019


    */

    // include
    require __DIR__.'/../ModelM.php';

    class characterM extends Model {
        
        protected $id;
        protected $userID;

        // homepage
        protected $portrait;

        protected $alias;
        
        protected $public_reputation;
        protected $private_reputation;
        protected $quality_of_life;
        protected $paragon_level;
        protected $belief;
        protected $dissidence;

        protected $sign_category;
        protected $sign;
        
        protected $size;
        protected $corpulence;
        protected $xp;
        protected $total_xp;
        protected $generation;
        
        protected $name;
        protected $years;
        protected $gender;
        protected $race;
        protected $type;

        protected $initiative;

        protected $nanitiere;
        protected $nanitiere_max;
        
        protected $constitution;

        // traits
        protected $traitsList = [];

        // access
        protected $accessList = [];

        // states
        protected $statesList = [];

        

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

            $informations = $this->getCharacterGEN($id)[0];

            $this->portrait = $informations['portrait'];

            $this->public_reputation = $informations['public reputation'];
            $this->private_reputation = $informations['private reputation'];
            $this->quality_of_life =$informations['quality of life'];
            $this->paragon_level = $informations['paragon level'];
            $this->belief = $informations['belief'];
            $this->dissidence = $informations['dissidence'];
    
            $this->sign_category = $informations['sign_category'];
            $this->sign = $informations['sign'];
            
            $this->size = $informations['size'];
            $this->corpulence = $informations['corpulence'];
            $this->xp = $informations['xp'];
            $this->total_xp = $informations['total xp'];
            $this->alias = $informations['alias'];
            $this->generation = $informations['generation'];
            
            $this->name = $informations['name'];
            $this->years = $informations['years'];
            $this->gender = $informations['gender'];
            $this->race = $informations['race'];
            $this->type = $informations['type'];
    
            $this->initiative = $informations['initiative'];
    
            $this->nanitiere = $informations['nanitiere'];
            $this->nanitiere_max = $informations['nanitiere_max'];
            
            $this->constitution = $informations['constitution'];

            $this->userID = $informations['user_id'];  
            
            // traits
            $this->traitsList['strength'] = $informations['strength'];
            $this->traitsList['dexterity']=$informations['dexterity'];
            $this->traitsList['agility'] = $informations['agility'];
            $this->traitsList['metabolism'] = $informations['metabolism'];
            $this->traitsList['endurance'] = $informations['endurance'];
            $this->traitsList['reflex'] = $informations['reflex'];

            $this->traitsList['instinct_char'] = $informations['instinct_char'];
            $this->traitsList['perception_char'] = $informations['perception_char'];
            $this->traitsList['ingenuity_char'] = $informations['ingenuity_char'];
            $this->traitsList['intelligence_char'] = $informations['intelligence_char'];
            $this->traitsList['charisma_char'] = $informations['charisma_char'];
            $this->traitsList['will_char'] = $informations['will_char'];

            // access
            $this->accessList['combat accreditation'] = $informations['combat accreditation'];
            $this->accessList['nature accreditation'] = $informations['nature accreditation'];
            $this->accessList['psychurgy accreditation'] = $informations['psychurgy accreditation'];
            $this->accessList['science accreditation'] = $informations['science accreditation'];
            $this->accessList['social accreditation'] = $informations['social accreditation'];
            $this->accessList['support accreditation'] = $informations['support accreditation'];
            $this->accessList['technical accreditation'] = $informations['technical accreditation'];
            
            

            $this->statesList['stunned_stat'] = $informations['stunned_stat'];
            $this->statesList['seek_stat'] = $informations['seek_stat'];
            $this->statesList['hungry_stat'] = $informations['hungry_stat'];
            $this->statesList['asphyxia_stat'] = $informations['asphyxia_stat'];
            $this->statesList['hypothermia_stat'] = $informations['hypothermia_stat'];
            $this->statesList['hyperthermia_stat'] = $informations['hyperthermia_stat'];
            $this->statesList['terrified_stat'] = $informations['terrified_stat'];
            $this->statesList['desperate_stat'] = $informations['desperate_stat'];
            $this->statesList['exhausted_stat'] = $informations['exhausted_stat'];
            $this->statesList['thirst_stat'] = $informations['thirst_stat'];


        } // __construct($id)


        /*
            name : getCharacterGEN
            author : Audrey
            params : $id (id of character)
            return : array

            brief : getCharacter for __construct
        */
        function getCharacterGEN($id) {
            $DBRequest = 'SELECT * FROM `character`WHERE `id`='.$id;
            return $this->execute($DBRequest);
        } // getCharacter($id)


        /*
            title : all getters & setters
            author : Audrey
        */
        
        // portrait
        public function getPortrait(){
            return $this->portrait;
        }
        public function setPortrait($portrait){
            $this->setText('portrait', $portrait, 'portrait');
            $this->portrait = $portrait;

            $_SESSION['popup'] = new popUp('success', 'Portrait', 'Modification avec succes !');
        }
    

        // public reputation
        public function getPublic_reputation(){
            return $this->public_reputation;
        }
        public function setPublic_reputation($public_reputation){
            $this->setRadio('public_reputation', $public_reputation, 'public reputation', 7);
        }

        // private reputation
        public function getPrivate_reputation(){
            return $this->private_reputation;
        }
        public function setPrivate_reputation($private_reputation){
            $this->setRadio('private_reputation', $private_reputation, 'private reputation', 7);
        }
    
        // quality of lige
        public function getQuality_of_life(){
            return $this->quality_of_life;
        }

        // paragon level
        public function getParagon_level(){
            return $this->paragon_level;
        }
        public function setParagon_level($paragon_level){
            $this->setRadio('paragon_level', $paragon_level, 'paragon level', 7);       
        }

        // belief
        public function getBelief(){
            return $this->belief;
        }
        public function setBelief($belief){
            $this->setText('Croyance', $belief, 'belief');
            $this->belief = $belief;
        } 

        // dissidence
        public function getDissidence(){
            return $this->dissidence;
        }
        public function setDissidence($dissidence){
            $this->setRadio('dissidence', $dissidence, 'dissidence', 7);       
        }
        
        // sign_category
        public function getSign_category(){
            return $this->sign_category;
        }
        public function setSign_category($sign_category){
            $this->setRadio('sign_category', $sign_category, 'sign_category', 7);
        }

        // sign
        public function getSign(){
            return $this->sign;
        }
        public function setSign($sign){
            $this->setRadio('sign', $sign, 'sign', 7);     
        }

        // size
        public function getSize(){
            return $this->size;
        }
        public function setSize($size){
            $this->setNumber('size', $size, 'size');         
        }
    
        // corpulence
        public function getCorpulence(){
            return $this->corpulence;
        }
        public function setCorpulence($corpulence){
            $this->setNumber('corpulence', $corpulence, 'corpulence');          
        }
    
        // xp
        public function getXp(){
            return $this->xp;
        }
        public function setXp($xp){

            if ($xp > $this->getTotal_xp()) {
                $_SESSION['popup'] = new popUp('error', 'XP', 'La valeur ne peut pas être supérieure.');
                return;
            }

            $this->setNumber('xp', $xp, 'xp');  

        }
    
        // total xp
        public function getTotal_xp(){
            return $this->total_xp;
        }
        public function setTotal_xp($total_xp){
            $this->setNumber('total_xp', $total_xp, 'total xp');  
        }

        // generation
        public function getGeneration(){
            return $this->generation;
        }
        public function setGeneration($generation){
            $this->setNumber('generation', $generation, 'generation');  
        }

        // name
        public function getName(){
            return $this->name;
        }


        // alias
        public function getAlias() {
            return $this->alias;
        }
        public function setAlias($alias) {
            $this->setText('Alias', $alias, 'alias');
            $this->alias = $alias;

        }
    
        // years
        public function getYears(){
            return $this->years;
        }
        public function setYears($years) {
            $this->setNumber('age', $years, 'years');  
        }
    
        // gender
        public function getGender(){
            return $this->gender;
        }
    
        // race
        public function getRace(){
            return $this->race;
        }
    
        // type
        public function getType(){
            return $this->type;
        }
    
        // initative
        public function getInitiative(){
            return $this->initiative;
        }
        public function setInitiative($initiative){
            $this->initiative = $initiative;
        }
    
        // nanitiere
        public function getNanitiere(){
            return $this->nanitiere;
        }
        public function setNanitiere($nanitiere){
            if ($nanitiere > $this->getNanitiere_max()) {
                $_SESSION['popup'] = new popUp('error', 'Nanitière', 'La valeur ne peut pas être supérieure.');
                return;       
            }

            $this->setNumber('nanitiere', $nanitiere, 'nanitiere');  
        }
    
        // nanitiere_max
        public function getNanitiere_max(){
            return $this->nanitiere_max;
        }
        public function setNanitiere_max($nanitiere_max){
            $this->setNumber('nanitiere_max', $nanitiere_max, 'nanitiere_max');  
        }
    
        // constitution
        public function getConstitution(){
            return $this->constitution;
        }
        public function setConstitution($constitution){
            $this->constitution = $constitution;
        }

        public function getUserId() {
            return $this->userID;
        } // getUserId()

        /*
            TRAITS
        */

        public function getTrait($stat){
            return $this->traitsList[$stat];
        }
        public function setTrait($stat, $valueStat) {
            $this->setRadio($stat, $valueStat, $stat, 7); 
        }


        /*
            ACCESS
        */
        public function getAccess($access) {
            return $this->accessList[$access];
        }
        public function setAccess($access, $valueAccess) {
            $this->setRadio($access, $valueAccess, $access, 4);
        }

        /*
            States
        */
        public function getState($state) {
            return $this->statesList[$state];
        }
        public function setState($state, $stateValue) {
            $this->setRadio($state, $stateValue, $state, 4);
        }

        private function setRadio($item, $itemValue, $itemDBName, $radioSize) {
            if ($itemValue < 0 || !is_numeric($itemValue) || $itemValue > $radioSize) {
                $_SESSION['popup'] = new popUp('error', $item, 'La valeur ne peut pas être inférieure à 0');        
                return;
            }

            $this->$item = $itemValue;    

            $id = $this->id;
            $DBRequest = 'Update `character` SET `'.$itemDBName.'` = '.$itemValue.' WHERE `id` = '.$id;
            $this->update($DBRequest);
        
            $_SESSION['popup'] = new popUp('success', $item, 'Modification avec succes !'); 
        }

        private function setNumber($item, $itemValue, $itemDBName) {
            if ($itemValue < 0 || !is_numeric($itemValue)) {
                $_SESSION['popup'] = new popUp('error', $item, 'La taille ne peut pas être inférieure à 0');        
                return;
            }

            $this->$item = $itemvalue;    

            $id = $this->id;
            $DBRequest = 'Update `character` SET `'.$itemDBName.'` = '.$itemValue.' WHERE `id` = '.$id;
            echo ($DBRequest);
            $this->update($DBRequest);
        
            $_SESSION['popup'] = new popUp('success', $item, 'Modification avec succes !');   
        }



        private function setText($item, $itemValue, $itemDBName) {
            $id = $this->id;
            
            $DBRequest = 'UPDATE `character` SET '.$itemDBName.' = "'.$itemValue.'" WHERE `id`='.$id;
            $this->update($DBRequest);


            $_SESSION['popup'] = new popUp('success', $item, 'Modification avec succes !');   

        }
    }
?>