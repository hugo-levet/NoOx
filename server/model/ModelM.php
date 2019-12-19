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
            self::$database = mysqli_connect($host, $databaseId, $databasePassword, $databaseName) or die('Server connection error : ' . mysqli_connect_error());
            self::$connected = true;
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
        $result = mysqli_query(self::$database, $query);
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
                        while ($row = mysqli_fetch_assoc($result))
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