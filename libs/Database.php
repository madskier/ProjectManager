<?php

class Database extends PDO
{
    protected static $connection;
    
    public function __construct()
    {        
        $this->connect();
    }
    
    public function connect()
    {
        try
        {
            $config = parse_ini_file('config/config.ini');
            $host = $config['server'];
            $dbname = $config['dbname'];
            $user = $config['username'];
            $pass = $config['password'];            
            parent::__construct('mysql:host='.$host.';dbname='.$dbname, $user, $pass);
        } 
        catch (PDOException $ex) {
            echo $ex;
        }
    } 
    
    function error($errMsg)
    {
        //if it can't find the file in the system, throw an error
        require 'controllers/error.php';
        $controller = new Error();
        $controller->index($errMsg);
        return false;
    } 

}


