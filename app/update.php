<?php session_start (); ?>
<?php require('./log/check_login.php'); ?>
<?php if(isUserConnected()){ ?>
<?php
include './functions.php';
include './includes/header.php';
include './includes/navbar.php';

updateRow();
?>
	<div class="container">
		<div class="col-sm-6">
			<h1>Modifier la randonnée n°<?php showIfSet('id'); ?></h1>
			<form action="./update.php" method="post">
				<div class="form-group row d-none">
					<label for="id" class="col-sm-2 col-form-label">ID</label>
					<input type="text" name="id" value="<?php showIfSet('id'); ?>">
				</div>

				<div class="form-group row">
					<label for="name" class="col-sm-2 col-form-label">Name</label>
					<input type="text" name="name" value="<?php showIfSet('name'); ?>">
				</div>

				<div class="form-group row">
					<label for="difficulty" class="col-sm-2 col-form-label">Difficulté</label>
					<select name="difficulty">
						<?php showUpdateOptions(); ?>
					</select>
				</div>

				<div class="form-group row">
					<label for="distance" class="col-sm-2 col-form-label">Distance</label>
					<input type="text" name="distance" value="<?php showIfSet('distance'); ?>">
				</div>
				<div class="form-group row">
					<label for="duration" class="col-sm-2 col-form-label">Durée</label>
					<input type="duration" name="duration" value="<?php showIfSet('duration'); ?>">
				</div>
				<div class="form-group row">
					<label for="height_difference" class="col-sm-2 col-form-label">Dénivelé</label>
					<input type="text" name="height_difference" value="<?php showIfSet('height_difference'); ?>">
				</div>
				<button class="btn btn-primary" type="submit" name="submit">Envoyer</button>
			</form>
		</div>
	</div>
<?php
include './includes/footer.php';
?>
<?php } ?>