<?php

namespace App\Model;
use App\Model\Classes\Client;
use App\Model\Table;


/**
 * 
 */
class ClientTable extends Table
{
	protected $table = 'clients';
    protected $class = Client::class;

    public function __construct()
    {
    	// echo "Hello";
        parent::__construct();
    }

    public function getCompteName(){
    	
    }

    public function getArrayObject($id){
        $client = $this->find($id);

        $cleintArray = [
             'id' => $client->getId(), 
             'nom' => $client->getNom(), 
             'prenom' => $client->getPrenom(), 
             'telephone' => $client->getTelephone(), 
             'compte_id' => $client->getCompteId(),
             'created' => $client->getCreated(),

        ];
        return $cleintArray;

    }
    //get compte by compte ID

   


}