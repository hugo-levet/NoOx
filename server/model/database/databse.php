<?php
abstract class database {
    private $bd;


    public function getBd()
    {
        if ($this->bd == null) {
            try
            {
                $bdd = new PDO('mysql:host=projet-noox_databse;dbname=log', '193036', 'Projetnoox');
            }
            catch (Exception $e) // Si erreur
            {
                die('Erreur : ' . $e->getMessage());
            }
        }
        return $this->bd;
    }

    public function Request($sql) {
        $res = $this->getBd()->query($sql);
        return $res;
    }

}


