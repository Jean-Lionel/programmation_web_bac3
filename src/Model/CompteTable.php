<?php

namespace App\Model;

use App\Model\Classes\Compte;
use App\Model\Table;


/**
 * 
 */
class CompteTable extends Table
{
	protected $table = 'comptes';
    protected $class = Compte::class;

    public function __construct()
    {
    	// echo "Hello";
        parent::__construct();
    }

    public function getLastId() 
    {
    	//var_dump($this->lastObject());
    	return $this->lastObject()->getId();
    }


    public function getNameById($id)
    {
        //var_dump($this->find($id)->getNumero());
        return $this->find($id)->getNumero();
    }

    //La function d'extraire les information dans le json type

    public function getInfoLikeJson($id){
        $compte = $this->find($id);

        $compte_info = [
            "id" => $compte->getId(),
            "montant" => $compte->getMontant(),
            "numero" => $compte->getNumero(),
            "date_Creation" => $compte->getDateCreation()
        ];

        return $compte_info;
    }

   
}