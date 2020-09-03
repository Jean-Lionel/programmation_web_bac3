
<!-- `nom`, `prenom`, `compte_id`, `created`, `telephone -->
<div class="card bg-danger">
	
	<div class="card-body">
		<h2 class="card-title text-center">Enregistrement d'un Client</h2>
		<form action="" method="POST">
			<input type="hidden" id="id" name="id">
			<div class="row form-group">
				<div class="col-sm-2">
					<label for="">Nom</label>
				</div>
				<div class="col-sm-10">
					<input type="text" id="nom" name="nom" class="form-control">
				</div>
			</div>

			<div class="row form-group">
				<div class="col-sm-2">
					<label for="">Prénom</label>
				</div>
				<div class="col-sm-10">
					<input type="text" id="prenom" name="prenom" class="form-control">
				</div>
			</div>

			<div class="row form-group">
				<div class="col-sm-2">
					<label for="">Télephone</label>
				</div>
				<div class="col-sm-10">
					<input type="text" id="telephone" name="telephone" class="form-control">
				</div>
			</div>

			<div class="row form-group">
				<div class="col-sm-2">
					
				</div> 
				<div class="col-sm-10">
					<input type="submit" id="valider" name="save_client" value="Enregistre" name="" class="form-control btn-info">
				</div>
			</div>

		</form>
	</div>
</div>