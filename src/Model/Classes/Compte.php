<?php

namespace App\Model\Classes;

class Compte{

	private $id;
	private $montant;
	private $numero; 
	private $date_Creation;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param mixed $montant
     *
     * @return self
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero$
     *
     * @return self
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->date_Creation;
    }

    /**
     * @param mixed $date_Creation
     *
     * @return self
     */
    public function setDateCreation($date_Creation)
    {
        $this->date_Creation = $date_Creation;

        return $this;
    }


     public function getInfoLikeJson(){

        $compte_info = [
            "id" => $this->getId(),
            "montant" => $this->getMontant(),
            "numero" => $this->getNumero(),
            "date_Creation" => $this->getDateCreation()
        ];

        return $compte_info;
    }
}