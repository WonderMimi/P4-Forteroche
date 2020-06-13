<?php
namespace P4\src\manager;
use PDO;
use Exception;

abstract class DatabaseManager  // set to abstract so it cannot be instanciated
{

    private $connection; // saves the connexion otherwise returns null

    private function checkConnection()
    {
        //checks if there is no connexion opened, then calls getConnection method
        if($this->connection === null) {
            return $this->getConnection();
        }
        // If a connexion already exists it returns it
        return $this->connection;
    }

    //DB connection method
    private function getConnection()  // private so it is only called from inside the class (eg. checkConnection())
    {
        //Ties to connect to DB
        try{
            $this->connection = new PDO(DB_HOST, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        }
        //catches an error in case of connection failure
        catch(Exception $errorConnection)
        {
            die ('Erreur de connection :'.$errorConnection->getMessage());
        }
    }

    protected function createQuery($sql, $parameters = null)
    {
        if($parameters)
        {
            $result = $this->checkConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnection()->query($sql);
        return $result;
    }
}
