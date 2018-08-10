<?php session_start (); ?>
<?php require('./log/check_login.php'); ?>
<?php if(isUserConnected()){ ?>
<?php 
include './functions.php';
include './includes/header.php';
include './includes/navbar.php';

createRow();
?>
<div class="container">
	<div class="col-sm-6">
		<h1>Ajouter une randonnée</h1>
		<form action="./create.php" method="post">
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label">Name</label>
				<input type="text" name="name" value="">
			</div>

			<div class="form-group row">
				<label for="difficulty" class="col-sm-2 col-form-label">Difficulté</label>
				<select name="difficulty">
					<option value="très facile">Très facile</option>
					<option value="facile">Facile</option>
					<option value="moyen">Moyen</option>
					<option value="difficile">Difficile</option>
					<option value="très difficile">Très difficile</option>
				</select>
			</div>

			<div class="form-group row">
				<label for="distance" class="col-sm-2 col-form-label">Distance</label>
				<input type="text" name="distance" value="">
			</div>
			<div class="form-group row">
				<label for="duration" class="col-sm-2 col-form-label">Durée</label>
				<input type="duration" name="duration" value="">
			</div>
			<div class="form-group row">
				<label for="height_difference" class="col-sm-2 col-form-label">Dénivelé</label>
				<input type="text" name="height_difference" value="">
			</div>
			<button class="btn btn-primary" type="submit" name="submit">Envoyer</button>
		</form>
	</div>
</div>

<?php 
include './includes/footer.php';
?>
<?php } ?>