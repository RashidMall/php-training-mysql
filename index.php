<?php session_start (); ?>
<?php require('./log/check_login.php'); ?>
<?php
include './functions.php';
include './includes/header.php';
include './includes/navbar.php';
?>
<a href="./read.php">Les randonnées de l'île de la Réunion</a>
<?php 
include './includes/footer.php';
?>