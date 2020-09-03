<?php

namespace App\Model\Classes;

// use App\Model\Classes\Operation;

class Operation
{
	private $id;
	private $client_id;
	private $compte_id;
	private $agent_id;
	private $created_at;
	private $type_operation;
	private $montant;

    

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
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * @param mixed $client_id
     *
     * @return self
     */
    public function setClientId($client_id)
    {
        $this->client_id = $client_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCompteId()
    {
        return $this->compte_id;
    }

    /**
     * @param mixed $compte_id
     *
     * @return self
     */
    public function setCompteId($compte_id)
    {
        $this->compte_id = $compte_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAgentId()
    {
        return $this->agent_id;
    }

    /**
     * @param mixed $agent_id
     *
     * @return self
     */
    public function setAgentId($agent_id)
    {
        $this->agent_id = $agent_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTypeOperation()
    {
        return $this->type_operation;
    }

    /**
     * @param mixed $type_operation
     *
     * @return self
     */
    public function setTypeOperation($type_operation)
    {
        $this->type_operation = $type_operation;

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

    public function getJson(){
        
    }
}