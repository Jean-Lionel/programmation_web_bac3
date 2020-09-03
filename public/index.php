<?php
use App\Model\ClientTable;
use App\Model\CompteTable;
require '../vendor/autoload.php';

require_once('layout/_header.php');

if($_POST['save_client'] == 'Enregistre'){
	extract($_POST);

	if(empty($nom) || empty($prenom) || empty($telephone)){
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

		$compterManager = new CompteTable();
		$numer_account = $compterManager->getLastId();

		$id_compte = $compterManager->create([
			'montant' => 0,
			'numero' => 'C-'.($numer_account +1)
		]);

		$clientManager = new ClientTable();

		$res = $clientManager->create([
			'nom'=> $nom,
			'telephone'=>$telephone,
			'prenom'=>$prenom,
			'compte_id' =>$id_compte

		]);

		echo "
		<script>
		Swal.fire(
		'Good job!',
		'Enrégistrement réussi',
		'success'
		)
		</script>
		";
		

	}

	

}

if($_POST['save_client'] == 'Modifier'){
	extract($_POST);

	if(empty($nom) || empty($prenom) || empty($telephone)){
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


		$clientManager = new ClientTable();

		$res = $clientManager->update([
			'nom'=> $nom,
			'telephone'=>$telephone,
			'prenom'=>$prenom,

		],$id);

		echo "
		<script>
		Swal.fire(
		'Good job!',
		'Modification réussi',
		'success'
		)
		</script>
		";
		

	}

	


}




$clienttable =  new ClientTable;

$clients = $clienttable->all();



// die();

if(isset($_GET['search_key'])){
	$val = $_GET['search_key'];
	$clienttable =  new ClientTable;
	$clients = $clienttable->searchBy($val , ['nom','prenom','telephone']);

		
}
?>


<div class="row">
	<div class="col-md-5">
		<?php require_once('layout/clients/_form.php'); ?>

		<div class="card">
			
			<div class="card-body">
				<div class="card-text"><h3 class="text-center">Information sur le compte</h3>
				</div>

				<div class="widget-content-wrapper text-white">
					<div class="widget-content-left">
						<div class="widget-heading"><span class="full-name"></span></div>
						<div class="widget-subheading">Total Clients Profit</div>
					</div>
					<div class="widget-content-right">
						<div class="widget-numbers text-white"><span class="montant"> </span></div>
					</div>
				</div>

				<ul class="list-group">
					<li class="list-group-item"><span>Nom:</span> <span class="info-nom info-client"></span></li>
					<li class="list-group-item"><span>Prénom :</span> <span class="info-prenom info-client"></span></li>
					<li class="list-group-item"><span>Télephone:</span> <span class="info-telephone info-client"></span></li>
					<li class="list-group-item"><span>Compte No:</span> <span class="info-compte info-client"></span></li>
					<li class="list-group-item"><span>Date de creation:</span> <span class="info-created info-client"></span></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-md-7">
		<form action=""  method="get">
			<input type="text" name="search_key" value="<?= $_GET['search_key'] ?>" placeholder="Tapez votre  rechercher">
		</form>
		<table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered table-responsive" role="grid" aria-describedby="example_info">
			<thead>
				<tr>
					<th>Numero</th>
					<th>Nom</th>
					<th>Prenom</th>
					<th>Telephone</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>

				<?php $x = 0; foreach ($clients  as $client) : ?> 
				<tr>
					<td><?= ++$x ?></td>
					<td>
						<?= $client->getNom() ?>
					</td>
					<td>
						<?= $client->getPrenom()  ?>
					</td>
					<td>
						<?= $client->getTelephone()  ?>
					</td>

					<td>
						<button onclick="load_client_info(<?= $client->getId()  ?> )" class="btn-sm btn-info">affiche</button>

						<button onclick="modifier('<?= $client->getID(); ?>','<?= $client->getNom(); ?>','<?= $client->getPrenom(); ?>','<?= $client->getTelephone()  ?>','<?= $client->getCompteId()  ?>', '<?= $client->getCreated()  ?>')" class="btn-sm btn-warning">Modifier</button>
						<!-- <a href="" class="btn-sm btn-danger">Supprimer</a> -->

					</td>

				</tr>
			<?php endforeach; ?>

		</tbody>

	</table>
</div>
</div>

<script>
	

	// function showValue(id){
		

	// 	console.log(id)

	// 	$.ajax({
	// 		url: 'ajaxRequest/client.php?id_client='+id,
	// 		type: 'GET',
	// 	})
	// 	.done(function() {
	// 		console.log("success");
	// 	})
	// 	.fail(function() {
	// 		console.log("error");
	// 	})
	// 	.always(function() {
	// 		console.log("complete");
	// 	});
		
	// }


	function modifier(id,nom,prenom,telephone,compte_id,created_at){

		$('input#nom').val(nom)
		$('input#prenom').val(prenom)
		$('input#telephone').val(telephone)
		$('input#id').val(id)
		$('input#valider').val('Modifier')
		

	}
</script>

<script>
	function load_client_info(id)
	{

		$.ajax({
			url: 'ajaxRequest/client.php?id_client='+id,
			type: 'GET',
	
		})
		.done(function(data) {

			const info = JSON.parse(data)

			console.log(info) 

			$('.info-nom').html(`${info.client.nom}`)
			$('.info-prenom').html(`${info.client.prenom}`)
			$('.info-telephone').html(`${info.client.telephone}`)
			$('.info-created').html(`${info.client.created}`)
			$('.info-compte').html(`${info.compte.numero}`)
			$('.montant').html(`${info.compte.montant} <span>FBU</span>`)
			$('.full-name').html(`<span>Nom et prénom : </span><b> ${info.client.nom} ${info.client.prenom}  </b>`)
			
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}
</script>

<?php
require_once('layout/_footer.php');
?>