<?php

use App\Db\Validation;
use App\Model\CompteTable;
use App\Model\OperationTable;
require '../vendor/autoload.php';
require_once('layout/_header.php');



// array(5) { ["operation"]=> string(7) "RETRAIT" ["montant"]=> string(5) "40000" ["client_id"]=> string(1) "4" ["compte_id"]=> string(1) "1" ["save"]=> string(10) "Enregistre" }

if(isset($_POST['save'])){
	

	if(Validation::is_empty_field($_POST)){
		echo "
				<script>
				Swal.fire(
				'Error',
				'Champs vide',
				'error'
				)
				</script>
				";
	}else{
		$operationTable = new OperationTable();

		extract($_POST);

		$compteTable = new CompteTable();

		$compte = $compteTable->find($compte_id);

		$error = false;

		if($compte){

			if($operation === 'RETRAIT'){

				if($compte->getMontant() < $montant){
					$error = true;
					// header('Location: operation.php');
					// exit;
				}else{
					$compteTable->update([
						'montant' => ($compte->getMontant() - $montant)
					], $compte_id);
				}

			}else{

				$compteTable->update([
					'montant' => ($compte->getMontant() + $montant)
				], $compte_id);

			}


			if($error){
				echo "
				<script>
				Swal.fire(
				'Error',
				'Montant insufisant',
				'error'
				)
				</script>
				";
			}else{

				$data = [
					'client_id' => $client_id,
					'compte_id' => $compte_id,
					'agent_id' => $_SESSION['user']['id'], 
					'type_operation' => $operation, 
					'montant' => $montant
				];

				$res = $operationTable->create($data);

				if($res ){
					echo "Ok je suis cool";
				}

			}

			

		}else{
			echo "
			<script>
			Swal.fire(
			'Error',
			'Numero de compte invalide',
			'error'
			)
			</script>
			";
		} 
	}

}


$operationTables = new OperationTable();

$operationsData = $operationTables->all('DESC'); 

?>


<div class="row">

	<div class="col-md-3">
		<div class="form-group">
			<label for="">
				Numéro de compte
			</label>
			<input type="text" id="num_compte"  class="form-control">
		</div>
		<div class="card bg-danger">
			<form action="" method="post">
				<div class="form-group">
					<label for="">
						Numéro de compte
					</label>
					<select name="operation" id="operation" class="form-control">
						<option value="">...selectoption</option>
						<option value="RETRAIT">RETRAIT</option>
						<option value="VERSEMENT">VERSEMENT</option>
					</select>
				</div>
				<div class="form-group">
					<label for="">
						Montant
					</label>
					<input type="text" name="montant" class="form-control">
				</div>

				<div class="form-group">
					<input type="hidden" id="client_id" name="client_id" id="client_id">
					<input type="hidden" id="compte_id" name="compte_id" id="compte_id">
				</div>

				<div class="form-group">
					<input type="submit" id="submit" name="save" class="btn-sm btn-info" value="Enregistre">
				</div>
			</form>

		</div>
	</div>

	<div class="col-md-3">
		<h4  class="text-center">Information du client</h4>
		<div class="card-body">
			<span id="nom_client"></span> <br>
			<span id="prenom_client"></span> <br>
			<span id="telephone_client"></span> <br>
			<span id="compte_numero"></span> <br>
			<span id="compte_motant"></span> <br>
		</div>

	</div>

	<div class="col-md-6">
		<table class="table">
			<thead>
				<tr>
					<th>
						Compte
					</th>
					<th>
						Operation
					</th>
					<th>Montant</th>
					<th>Date</th>
				</tr>
				
			</thead>

			<tbody>

				<?php foreach($operationsData as $operation): ?>
					<tr>
						<td><?php 
						$compteTable = new CompteTable();

						echo $compteTable->getNameById($operation->getCompteId());
						?></td>
						<td><?= $operation->getTypeOperation()?></td>
						<td><?= $operation->getMontant()?></td>
						<td><?= $operation->getCreatedAt()?></td>
					</tr>

				<?php endforeach;?>
				
			</tbody>
		</table>
	</div>
</div>


<script>

	$('document').ready(function(){
		let  num_compte = $('#num_compte')
		// let  save = $('#submit')


		// save.on('click',function(event){
		// 	event.preventDefault()
		// 	operation= $('#operation').val()
		// 	montant= $('#montant').val()
		// 	client_id= $('#client_id').val()
		// 	compte_id= $('#compte_id').val()
		// 	if(operation == "" ||client_id == "" ){

		// 		swal.fire('Hello')
		// 	}else{
		// 		$.ajax({
		// 			url: 'ajaxRequest/operation.php',
		// 			type: 'POST',
		// 			data: {
		// 				operation,
		// 				montant,
		// 				client_id,
		// 				compte_id
		// 			}
		// 		})
		// 		.done(function() {
		// 			console.log("success");
		// 		})
		// 		.fail(function() {
		// 			console.log("error");
		// 		})
		// 		.always(function() {
		// 			console.log("complete");
		// 		});

		// 	}

		// 	console.log()
		// })

		num_compte.on('keyup', function(event) {
			event.preventDefault();
			/* Acti on the event */
			// console.log()
			$.ajax({
				url: 'ajaxRequest/operation.php',
				type: 'GET',
				data: {num_compte: num_compte.val()},
			})
			.done(function(data) {
				let info = JSON.parse(data)
				// console.log(info)
				console.log("success");

				$('#nom_client').html(`<b> Nom :  </b> ${info.client.nom} `)
				$('#prenom_client').html(`<b> Prenom : </b> ${info.client.prenom} `)

				$('#telephone_client').html(`<b> Telephone : </b> ${info.client.telephone} `)
				$('#compte_numero').html(`<b>Compte : </b> ${info.compte.numero}`)
				$('#compte_motant').html(`<b>Montant : </b> ${info.compte.montant} <b> #FBU</b>`)



				$('#compte_id').val(info.compte.id)
				$('#client_id').val(info.client.id)

				


			})
			.fail(function() {
				
				$('#nom_client').html(`Pas de client disponible avec <b>${num_compte.val()} </b>`)
				console.log("error");
			})
			
		});
	})
</script>


<?php
require_once('layout/_footer.php');
?>