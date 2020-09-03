<?php


namespace App\Model;

use App\Model\Classes\Operation;
use App\Model\Table;




/**
 * 
 */
class OperationTable extends Table
{
	
	protected $table = 'operations';
    protected $class = Operation::class;


    public function __construct()
    {
    	// echo "Hello";
        parent::__construct();
    }

    public function getCompteName(){
    	
    }


}