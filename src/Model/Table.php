<?php

namespace App\Model;

use App\Db\Connection;
use App\Model\Table;
use PDO;
use Exception;

// require '../Db/Connection.php';

abstract class Table{

    protected $pdo;
    protected $table = null;
    protected $class = null;

    public function __construct()
    {
        $pdo = new Connection();
        if($this->table === null){
            throw new Exception("La class" . get_class($this) . "n'a pas de propriété \$table");
        }
        if($this->class === null){
            throw new Exception("La class" . get_class($this) . "n'a pas de propriété \$class");
        }
        if($this->pdo === null){
            $this->pdo = $pdo->connection;
        }
    }

    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM $this->table WHERE id= :id");
        $query->execute(['id' => $id]);
        $query->setFetchMode(\PDO::FETCH_CLASS,$this->class);
        $result = $query->fetch();
        if($result === false){
            throw new NotFoundException($this->table,$id);
        }
        return  $result;
    }

    public function all($order_by= 'ASC'): array 
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY id ".$order_by;
        // // die($sql);
        // var_dump($this->pdo);
        // die();
        return $this->pdo->query($sql,PDO::FETCH_CLASS,$this->class)->fetchAll();
    }

    public function searchBy($key_word, array $options){
        $sql = "SELECT * FROM {$this->table} WHERE $options[0] LIKE '%".$key_word."%'";

        $search_word = "";

        for($i=1 ; $i< count($options); $i++){
            $search_word = $search_word." OR $options[$i] LIKE '%".$key_word."%'";
        }

        $sql = $sql.$search_word;

        return $this->pdo->query($sql,PDO::FETCH_CLASS,$this->class)->fetchAll();


    }

    public function lastObject()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY id DESC";
        return $this->pdo->query($sql,PDO::FETCH_CLASS,$this->class)->fetch();
    }

    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id= :id");
        $ok = $query->execute([':id' => $id]);
        if ($ok === false){
            throw new Exception("Impossible de supprimer l'enregistrement $id dans la table {$this->table}");
        }
    }

    public function create(array $data): int
    {
        $sqlfields = [];
        foreach($data as $key => $value){
            $sqlfields[] = "$key =  :$key";
        }
        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET " . implode(',',$sqlfields));
       //  var_dump( $data);
       // die();
        $ok = $query->execute($data);
        if ($ok === false){
            throw new Exception("Impossible de créer l'enregistrement  dans la table {$this->table}");
        } 
        return (int)$this->pdo->lastInsertId();
    }

    public function update(array $data, int $id){
        $sqlfields = [];
        foreach($data as $key => $value){
            $sqlfields[] = "$key =  :$key";
        }
        $query = $this->pdo->prepare("UPDATE  {$this->table} SET " . implode(',',$sqlfields) . " WHERE  id= :id");

        // var_dump($query);

        // var_dump(array_merge($data,['id' => $id]));

        // die();
        $ok = $query->execute(array_merge($data,['id' => $id]));
        if ($ok === false){
            throw new Exception("Impossible de modifier l'enregistrement  dans la table {$this->table}");
        } 
    }

    /**
     * verifie si une valeur existe dans la table 
     *
     * @param string $field champs à rechercher
     * @param mixed $value valeur associé au champs 
     * @return boolean
     */
    public function exists(string $field,$value, ?int $except = null): bool
    {
        $sql = "SELECT COUNT(id) FROM {$this->table} where $field = ?";
        $params = [$value];
        if($except !== null){
            $sql .= " AND id != ?";
            $params[] = $except; 
        }
        $query = $this->pdo->prepare($sql);
        $query->execute($params);
        return (int)$query->fetch(PDO::FETCH_NUM)[0] > 0;
    }


    public function findBy($field,$value){

        $query = $this->pdo->prepare("SELECT * FROM $this->table WHERE $field= :$field");
        $query->execute(["$field" => $value]);
        $query->setFetchMode(\PDO::FETCH_CLASS,$this->class);
        $result = $query->fetch();
        if($result === false){
            throw new NotFoundException($this->table,$value);
        }
        return  $result;

    }
}

/**
 * 
 */


