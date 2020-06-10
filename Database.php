<?php

class Database
{
    const DB_HOST = 'mysql:host=localhost;dbname=forteroche;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';

    //DB connection method
    public function getConnection()
    {
        //Ties to connect to DB
        try{
            $connection = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS); // self refers to the class itself
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
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
            $result = $this->getConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->getConnection()->query($sql);
        return $result;
    }
}
