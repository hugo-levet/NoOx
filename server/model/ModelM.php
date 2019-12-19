<?php
/*
    title : ModelM.php
    author : Hugo.L
    started on : 27/11/2019
    brief : global model
*/
abstract class Model{
    private static $database;
    private static $connected;
    
    /*
        name : databaseConnection
        author : Hugo.L
        brief : connection to the database
        input parameters : void
        return : void
    */
    public function databaseConnection()
    {
        if(!self::$connected)
        {
            require('server/config.php');
            try
            {
                // Connexion à la base de données.
                $dsn = 'mysql:host=' . $host . ';dbname=' . $databaseName;
                self::$database = new PDO($dsn, $databaseId, $databasePassword);
                // Codage de caractères.
                self::$database->exec('SET CHARACTER SET utf8');
                // Gestion des erreurs sous forme d'exceptions.
                self::$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connected = true;
            }
            catch(PDOException $e)
            {
                // Affichage de l'erreur.
                die('Erreur : ' . $e->getMessage());
            }
        }
    }
    
    /*
        name : execute
        author : Hugo.L
        brief : execute the query to the database
        input parameters : string $query
        return : array of result or null
    */
    public function execute($query)
    {
        $this->databaseConnection();
        $result = self::$database->query($query);
        if(!preg_match('/^(UPDATE).*$/', $query))
        {
            if (!$result)
            {
                echo 'Can\'t execute the query ', $query, ' : ', mysqli_error(self::$bdd);
            }
            else
            {
                    if (gettype($result) != "boolean")
                    {
                        $table = [];
                        while ($row = $result->fetch())
                        {
                            array_push ($table, $row);
                        }
                    }
                    else
                    {
                        return null;
                    }
            }
            return $table;
        }
    }
}