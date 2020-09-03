<?php 

namespace App\Db;

use PDO;

class Connection {

	private $_host = 'localhost';
    private $_username = 'admin';
    private $_password = 'admin';
    private $_database = 'ult_programation_web';
    public $connection ;


    public function __construct()
    {
        if (!isset($this->connection)) {

            
            $this->connection = new PDO('mysql:dbname=ult_programation_web;host=localhost', 'admin', 'admin' , [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
            
            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
        return $this->connection;
    }


    public static function getPDO(): PDO
    {
        return new PDO('mysql:dbname=ult_programation_web;host=localhost', 'admin', 'admin' , [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}
