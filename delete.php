<?php session_start (); ?>
<?php require('./log/check_login.php'); ?>
<?php if(isUserConnected()){ ?>
<?php
include './functions.php';
deleteRow();
?>
<?php } ?>
