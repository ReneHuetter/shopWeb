<?php

class Database 
{
    private $database = 'shop';
    private $dbuser = 'root';
    private $dbpass = '';
    private $dbhost = 'localhost';    

    function conn () 
    {
        try 
        {
            $dsn = 'mysql:host=' . $this->dbhost . '; database=' . $this->database;
            $pdo = new PDO($dsn, $this->dbuser, $this->dbpass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }
        catch(Exception $e) 
        {
            die('Failed to connect to database' . $e->getMessage());
        }
    }
}
?>