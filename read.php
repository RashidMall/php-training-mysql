<?php session_start (); ?>
<?php require('./log/check_login.php'); ?>
<?php
include './functions.php';
include "./includes/header.php";
include "./includes/navbar.php";
?>
<div class="container">
  <div class="col-sm-9">
    <h1>Liste des randonnées</h1>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">id</th>
          <th scope="col">Nom</th>
          <th scope="col">Difficulté</th>
          <th scope="col">Distance</th>
          <th scope="col">Durée</th>
          <th scope="col">Dénivelé</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php readRows() ?>
      </tbody>
    </table>
  </div>
</div>

<?php
include './includes/footer.php';
?>