<?php 
// MySQL version
/* $connection = mysqli_connect('host', 'db', 'pwd', 'username');

if(!$connection){
    die("Database connection failed!");
} */

// PDO version
try{
    $connection = new PDO('mysql:host=myhost;dbname=mydbname', 'myname', 'pwd');
}catch(PDOException $e){
    echo "Database connection failed: " . $e->getMessage;
    die();
}
?>
