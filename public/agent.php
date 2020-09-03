<?php

use App\Db\Validation;
use App\Model\AgentTable;
require '../vendor/autoload.php';
require_once('layout/_header.php');


if($_POST['save'] == 'Enregistre'){

	extract($_POST);

	//Validation::is_empty_field(extract($_POST)
	if(Validation::is_empty_field($_POST)){
		echo "
		<script>
		Swal.fire(
		'Error',
		'Champ vide',
		'error'
		)
		</script>
		";
	}else{
		$agentTable = new AgentTable;

		$agentTable->create([
			'nom' => $nom,
			'prenom' => $prenom,
			'login' => $login,
			'password' => sha1($password),
			'role' => $role
		]);
	}


}

if($_POST['save'] == 'Modifier'){

	unset($_POST['password']);

	extract($_POST);

	//Validation::is_empty_field(extract($_POST)
	if(Validation::is_empty_field($_POST)){
		echo "
		<script>
		Swal.fire(
		'Error',
		'Champ vide',
		'error'
		)
		</script>
		";
	}else{
		$agentTable = new AgentTable;

		$agentTable->update([
			'nom' => $nom,
			'prenom' => $prenom,
			'login' => $login,
			'password' => sha1($password),
			'role' => $role
		],$id);
	}


}


$agentTable = new AgentTable;

$agents = $agentTable->all();
?>

<div class="row">
	<div class="col-md-3">
		<fieldset>
			

			<div class="card bg-dark">
				<div class="card-header">
					<legend>Enregistre un nouvel agent</legend>
				</div>

				<div class="card-body">
					<form action="" method="post">

						<input type="hidden" id="id" name="id" value="2">
						
						<div class="form-group">
							<label for="nom">Nom</label>
							<input type="text" id="nom" name="nom" class="form-control">
						</div>
						<div class="form-group">
							<label for="prenom">Prénom</label>
							<input type="text" id="prenom" name="prenom" class="form-control">
						</div>

						<div class="form-group">
							<label for="login">Login</label>
							<input type="text" id="login" name="login" class="form-control">
						</div>

						<div class="form-group">
							<label for="password">Mot de pass</label>
							<input type="text" name="password" id="password" class="form-control">
						</div>

						<div class="form-group">
							<label for="role">Rôle</label>
							<input type="text" id="role" name="role" class="form-control">
						</div>

						<div class="form-group">
							<input type="submit" id="save" name="save" class="btn-sm btn-primary btn form-control" value="Enregistre">
						</div>

					</form>
				</div>
			</div>
		</fieldset>
	</div>


	<div class="col-md-9">
		<h3 class="text-center">Liste des agents bancaires de mon MINI-BANQUE</h3>
		<table class="table-responsive table-hover table table-bordered table-striped ">
			<thead>
				<tr>
					<th>numero</th>
					<th>Nom</th>
					<th>Prenom</th>
					<th>Nom d'utilisateur</th>
					<th>Rôle</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				<?php $x=0; foreach ($agents as $agent): ?>
					<tr>
						<td><?= ++$x?></td>
						<td> <?= $agent->getNom() ?></td>
						<td> <?= $agent->getPrenom() ?></td>
						<td> <?= $agent->getLogin() ?></td>
						<td> <?= $agent->getRole() ?></td>
						<td> 
							<button class="btn-sm btn-warning" onclick="modifier('<?= $agent->getId() ?>','<?= $agent->getNom() ?>','<?= $agent->getPrenom() ?>','<?= $agent->getLogin() ?>','<?= $agent->getRole() ?>')">Modifier</button>
							<button class="btn-sm btn-danger" onclick="deleteAgent('<?= $agent->getId() ?>')">Supprimer</button>

							<?php
							var_dump();
							?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		
	</div>
</div>


<script>
	
	function modifier(id,nom,prenom,login,role){
		console.log(id+nom+prenom+login+role)
		$('#id').val(id)
		$('#nom').val(nom)
		$('#prenom').val(prenom)
		$('#login').val(login)
		$('#role').val(role)		
		$('#save').val("Modifier")		
	}
	function deleteAgent(id){

		const response  = confirm('do you want to delete ? #'+id)

		if(response){
			$.ajax({
				url: 'ajaxRequest/agent.php',
				type: 'GET',
				data: {id_agent : id}
			})
			.done(function(data) {
				console.log(data)
				console.log("success");
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}
	}
</script>




<?php
require_once('layout/_footer.php');
?>