<?php

use App\Model\ClientTable;
use App\Model\CompteTable;
use App\Model\OperationTable;

require '../../vendor/autoload.php';



if(isset($_GET['num_compte'])){

	$compte_name = $_GET['num_compte'];


	$compteTable = new CompteTable();
	$clientTable = new ClientTable();

	$compte  = $compteTable->findBy('numero',$compte_name);
	$client = "";

	if($compte){
		$client = $clientTable->findBy('compte_id', $compte->getId());
	}


	echo json_encode([
		'compte' => $compte->getInfoLikeJson(),
		'client' => $client->getArrayObject()

	]);

	return;

}

// array(3) { [""]=> string(7) "RETRAIT" ["client_id"]=> string(1) "2" ["compte_id"]=> string(1) "2" } 
// if(isset($_POST)){
// 	extract($_POST);

	// $operation = new OperationTable();

	// $res = $operation->create([
	// 	'client_id' => $client_id,
	// 	'compte_id' => $compte_id,
	// 	'agent_id' => '1', 
	// 	'type_operation' => $operation, 
	// 	'montant' => $montant
	// ]);

	// if($res ){
	// 	echo "Ok je suis cool";
	// }

// 	return;
// }