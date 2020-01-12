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
<<<<<<< HEAD
            require('server/config.php');
=======
            require(__DIR__.'/../config.php');
>>>>>>> Juliendevelop
            try
            {
                // Connexion à la base de données.
                $dsn = 'mysql:host=' . $host . ';dbname=' . $databaseName;
                self::$database = new PDO($dsn, $databaseId, $databasePassword);
<<<<<<< HEAD
=======

>>>>>>> Juliendevelop
                // Codage de caractères.
                self::$database->exec('SET CHARACTER SET utf8');
                // Gestion des erreurs sous forme d'exceptions.
                self::$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connected = true;
            }
            catch(PDOException $e)
            {
                // Affichage de l'erreur.
<<<<<<< HEAD
                die('Erreur à la ligne' . $e->getLine() . ' : ' . $e->getMessage());
=======
                die('Erreur : ' . $e->getMessage());
>>>>>>> Juliendevelop
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
    public function execute($query/*, $var*/)
    {
        $this->databaseConnection();
        // $q = self::$database->prepare($query);
        // $q->execute($var);
        $result = self::$database->query($query);
<<<<<<< HEAD
=======
        

>>>>>>> Juliendevelop
        if(!preg_match('/^(UPDATE).*$/', $query) || !preg_match('/^(INSERT).*$/', $query))
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
<<<<<<< HEAD
                        // while ($row = $result->fetch())
                        foreach($result->fetchAll(PDO::FETCH_ASSOC) as $row)
=======
                        while ($row = $result->fetch())
>>>>>>> Juliendevelop
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
<<<<<<< HEAD
    }
}
=======
    }


        /*
        name : update
        author : Hugo.L
        brief : update queries
        input parameters : string $query
        return : booleanS
    */
    public function update($query) {
        $this->databaseConnection();

        if(!($dbResult = self::$database->query($query))) {
            echo 'Erreur dans requête<br />';
            // Affiche le type d'erreur.
            echo 'Erreur : ' . mysqli_error($dbLink) . '<br/>';
            // Affiche la requête envoyée.
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }   else return $dbResult;
    }

    public function insert($query) {
        $this->databaseConnection();

        self::$database->query($query);

        return self::$database->lastInsertId();
    }
}
>>>>>>> Juliendevelop
