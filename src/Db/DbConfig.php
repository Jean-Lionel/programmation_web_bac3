<?php

// namespace App\Db;

// use PDO;

class DbConfig 
{    
    private $_host = 'localhost';
    private $_username = 'admin';
    private $_password = 'admin';
    private $_database = 'ult_programation_web';
    
    protected $connection;
    
    public function __construct()
    {
        if (!isset($this->connection)) {
            
            $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
            
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
        return $this->connection;
    }
}