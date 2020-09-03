<?php

use App\Model\ClientTable;
use App\Model\CompteTable;
require '../../vendor/autoload.php';



if(isset($_GET['id_client'])){
	$id = intval($_GET['id_client']);
	$clientTable = new ClientTable();
	$compteTable = new CompteTable();
	$client = $clientTable->getArrayObject($id);

	$compte = $compteTable->getInfoLikeJson($client['compte_id']);


	$data = [
		'client' => $client,
		'compte' => $compte
	];

	echo json_encode($data);

}


