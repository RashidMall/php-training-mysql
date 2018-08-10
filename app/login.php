<?php
include './log/check_login.php';
include './includes/header.php';
checkUser();
?>
<div class="container">
  <div class="col-sm-6">
    <form action="./login.php" method="post">
      <div class="form-group">
        <label for="username">Identifiant</label>
        <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Se connecter</button>
    </form>
  </div>
</div>

<?php 
include './includes/footer.php';
?>