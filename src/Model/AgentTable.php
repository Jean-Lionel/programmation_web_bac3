<?php


namespace App\Model;

use App\Model\Classes\Agent;
use App\Model\Table;
/**
 * 
 */
class AgentTable extends Table
{
	
	protected $table = 'agents';
    protected $class = Agent::class;

     public function __construct()
    {
    	// echo "Hello";
        parent::__construct();
    }
}