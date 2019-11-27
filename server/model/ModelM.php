<?php
/*
    title : ModelM.php
    author : Hugo.L
    started on : 27/11/2019
    brief : global model
*/
abstract class MModel{
    private static $db;
    private static $connected;
    
    // TODO
    public function connexionBdd()
    {
        if(!self::$connected)
        {
            require('server/config.php');
            // $link = mysqli_connect('localhost', 'mysql_username', 'mysql_passwd') or die('Pb de connexion au serveur: ' . mysqli_connect_error());
            // mysqli_select_db($link, 'my_dbname') or die ('Pb de sélection BD : ' . mysqli_error($link));
            self::$bdd = mysqli_connect($host, $identifiantBdd, $mdpBdd, $dbname) or die('Server connection error : ' . mysqli_connect_error());
            self::$connected = true;
        }
    }
    
    // TODO
    public function execute($query)
    {
        $result = mysqli_query(self::$bdd, $query);
        if (!$result)
        {
            echo 'Can\'t execute the query ', $query, ' : ', mysqli_error(self::$bdd);
        }
        else
        {
            if (mysqli_num_rows($result) != 0)
            {
                return mysqli_fetch_assoc($result);
            }
        }
    }
}
?>